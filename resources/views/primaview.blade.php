@extends('layouts/skelet')

@section('content')
<div class="container a">
   <section class="hero-section">
        <div class="container">
            <h1>Poliambulatorio Salus: La Tua Salute al Centro</h1>
            <p>Un centro medico all'avanguardia dedicato al tuo benessere completo, con un team di specialisti qualificati e tecnologie moderne.</p>
            <a href="{{ route('dipartimenti') }}" class="cta-button">Scopri i Nostri Servizi <i class="fas fa-arrow-right"></i></a>
            <a href="{{ asset('file/documentazione.pdf') }}" download> 📄Scarica la documentazione </a>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="container">
            <h2>Perché Scegliere Poliambulatorio Salus?</h2>
            <div class="advantages-grid">
                <div class="advantage-box">
                    <div class="icon"><i class="fas fa-user-md"></i></div>
                    <h3>Team Multidisciplinare</h3>
                    <p>Un'ampia rete di medici specialisti per una presa in carico completa e coordinata delle tue esigenze di salute.</p>
                </div>

                <div class="advantage-box">
                    <div class="icon"><i class="fas fa-clinic-medical"></i></div>
                    <h3>Struttura All'Avanguardia</h3>
                    <p>Ambienti moderni e accoglienti, dotati delle più recenti tecnologie diagnostiche e terapeutiche.</p>
                </div>

                <div class="advantage-box">
                    <div class="icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <h3>Cura Personalizzata</h3>
                    <p>Percorsi di cura studiati su misura per ogni paziente, garantendo attenzione, ascolto e un approccio umano.</p>
                </div>

                <div class="advantage-box">
                    <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                    <h3>Accesso Semplificato</h3>
                    <p>Sistema di prenotazione online intuitivo e gestione efficiente degli appuntamenti per ridurre i tempi di attesa.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="our-clinic" class="our-clinic-section">
        <div class="container our-clinic-content">
            <div class="clinic-image-wrapper">
                <img src="{{ asset('immagini/immagine.jpg') }}" alt="Il Nostro Team e Struttura">
            </div>
            <div class="clinic-info">
                <h2>Il Nostro Poliambulatorio</h2>
                <p>Poliambulatorio Salus è il tuo punto di riferimento per la prevenzione, la diagnosi e la cura. Il nostro centro medico è una struttura moderna e accogliente, strategicamente posizionata per essere facilmente raggiungibile.</p>

                <div class="info-item">
                    <div class="icon"><i class="fas fa-lightbulb"></i></div>
                    <div class="text">
                        <h3>Visione e Servizi</h3>
                        <p>Promuoviamo la salute attraverso un modello di assistenza integrato, dalla diagnostica avanzata alla riabilitazione, con un focus sulla qualità della vita del paziente.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text">
                        <h3>Dove Trovarci</h3>
                        <p>Ci trovi in Via della Salute 10, Città del Benessere. Per maggiori dettagli o prenotazioni, chiamaci al 081 1234567 o scrivi a info@poliambulatoriosalus.it.</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon"><i class="fas fa-laptop-medical"></i></div>
                    <div class="text">
                        <h3>Prenota Facilmente</h3>
                        <p>Il nostro portale online ti permette di prenotare visite ed esami in pochi click.</p>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="clinic-info">
                <h2>La nostra posizione</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10654.264953867845!2d13.513999989616215!3d43.585141077752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80239b2afbe3%3A0x3a016e41e6f4a48c!2sUNIVPM%20-%20Dipartimento%20di%20Scienze%20Agrarie%2C%20Alimentari%20ed%20Ambientali!5e0!3m2!1sit!2sit!4v1746536679183!5m2!1sit!2sit"
            width="600" height="450" style="border:0;" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </section>
    </div>
@endsection
