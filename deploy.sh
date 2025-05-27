#!/bin/env bash
# This script deploys the application to the specified environment.
ENDPOINT="tweban.dii.univpm.it"
USER="grp09"
GROUP="apache"
PORT="60022"

# Part 1: Copy the application files to the remote server
rclone sync ~/src/ProgettoTWEB tweb:www/laraProject/ -c -v --no-update-modtime --exclude=".git/**" --exclude="vendor/**" --exclude="storage/**" --exclude="node_modules/**" --exclude=".env" --exclude="config/**"

# Part 2: SSH into the remote server and run the deployment commands
ssh -p $PORT $USER@$ENDPOINT -i ~/.ssh/id_ed25519 << EOF
cd www/laraProject
composer install
chown -R $USER:$GROUP .
bash remakeDB.sh
EOF
