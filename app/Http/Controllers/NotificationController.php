<?php

namespace App\Http\Controllers;

use App\Models\Notifica;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{

    public function notificantion_amount(Request $request): JsonResponse
    {
        // Count the number of unread notifications for the user
        $unreadCount = Notifica::where('username', $request->user()->username)
            ->where('letto', false)
            ->count();

        return response()->json(['unread_count' => $unreadCount]);
    }


    public function get_notifications(Request $request)
    {
        $notifications = Notifica::where('username', $request->user()->username)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        foreach ($notifications as $notification) {
            // Mark the notification as read if it is not already
            if (!$notification->letto) {
                $notification->letto = true;
                $notification->save();
            }
        }

        return $notifications;
    }
}
