<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<section class="hero-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="hero-content">
                    <h1 class='heading'>Willkommen bei <br /> Niedrigzins24</h1>
                    <p class='paragaph'>Ob als Kapitalanlage oder zur Selbstnutzung – wir finden die passende Immobilie
                        für Sie.</p>
                    <button>
                        <a href="#">mehr erfahren</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End  -->
<!-- Vertical Slider -->


<!-- Start About Section -->

<section class="about-section">
    <div class="swiper vertical-slider desktop-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slider-slide">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about-box" data-aos="fade-right">
                                <h1 class='heading'>Ihr Weg zu finanzieller Sicherheit</h1>
                                <div class="content">
                                    <p class="paragaph">Denken Sie heute an morgen – und bauen Sie Ihr Vermögen mit
                                        Immobilien systematisch auf. In einer Zeit, in der Altersvorsorge und
                                        finanzielle Sicherheit immer wichtiger werden, bieten Immobilien eine stabile
                                        und krisensichere Grundlage.</p>
                                    <p class='paragraph'>Mit Niedrigzins24 erhalten Sie ein durchdachtes Konzept für
                                        Ihren Vermögensaufbau. Wir übernehmen den kompletten Prozess – von der Auswahl
                                        der passenden Immobilie über die Finanzierung bis hin zur Abwicklung. Sie
                                        profitieren von einem Full-Service-Paket, bei dem Sie entspannt die Füße
                                        hochlegen können, während Ihre Immobilie und die Zeit für Sie arbeiten.</p>
                                    <p class='paragraph'>So schaffen Sie sich Schritt für Schritt mehr Unabhängigkeit
                                        und eine sichere Basis für die Zukunft.</p>
                                </div>

                                <button class='about-btn'>
                                    <a href="#kontakt">Jetzt kontaktieren</a>
                                </button>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class='about-img' data-aos="fade-left">
                                <img src="/images/about.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slider-slide">
                <div class="container">
                    <div class="row">
                        <div class=" col-xl-6">
                            <div class="about-box">
                                <h1 class='heading'>Ihr starker Partner für Verkauf und Kauf von Immobilien</h1>

                                <div class="content">
                                    <p class="paragaph">Eine Immobilie zu kaufen oder zu verkaufen ist eine wichtige
                                        Entscheidung – und genau dabei stehen wir Ihnen mit Erfahrung und Marktkenntnis
                                        zur Seite. Als Ihr persönlicher Immobilienmakler begleiten wir Sie von der
                                        ersten Besichtigung bis zum erfolgreichen Abschluss.</p>
                                    <p class="paragraph">Unser Vorteil für Sie: Wir verbinden tiefes Fachwissen über
                                        Immobilien mit einem sicheren Gespür für den Markt. Das bedeutet für Sie eine
                                        realistische Einschätzung von Wert und Potenzial, eine professionelle
                                        Präsentation Ihrer Immobilie und eine zielgerichtete Vermittlung an passende
                                        Käufer oder Verkäufer.</p>
                                    <p class="paragaph">Mit Niedrigzins24 sparen Sie Zeit, vermeiden unnötige Risiken
                                        und gewinnen einen Partner, der Ihre Interessen zuverlässig vertritt. So wird
                                        Ihre Immobilienvermittlung effizient, transparent und erfolgreich.</p>
                                </div>

                                <button class='about-btn'>
                                    <a href="#">Jetzt kontaktieren</a>
                                </button>
                            </div>
                        </div>

                        <div class=" col-xl-6">
                            <div class='about-img'>
                                <img src="/images/slide6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slider-slide">
                <div class="container">
                    <div class="row">
                        <div class=" col-xl-6">
                            <div class="about-box">
                                <h1 class='heading'>Individuelle Baufinanzierung statt Standardlösung</h1>

                                <div class="content">
                                    <p class="paragaph">Die richtige Finanzierung ist der Schlüssel zu einer sicheren
                                        Investition. Als freier und unabhängiger Vermittler haben wir Zugriff auf über
                                        500 Banken – und vergleichen für Sie neutral die besten Angebote am Markt.</p>
                                    <p class="paragaph">Bei Niedrigzins24 gibt es keine Standardlösungen. Gemeinsam mit
                                        Ihnen entwickeln wir ein Finanzierungskonzept, das exakt zu Ihrer Situation
                                        passt – flexibel, transparent und auf Ihre Ziele zugeschnitten. So profitieren
                                        Sie nicht nur von Top-Konditionen, sondern auch von einer Baufinanzierung, die
                                        langfristig Sicherheit bietet.</p>
                                    <p>Ihr Vorteil: Sie behalten die volle Kontrolle, während wir Ihnen die Arbeit der
                                        Recherche und Verhandlung abnehmen. Das Ergebnis: die optimale Finanzierung für
                                        Ihr Immobilienprojekt – unabhängig, individuell und fair.</p>
                                </div>


                                <button class='about-btn'>
                                    <a href="#kontakt">Jetzt kontaktieren</a>
                                </button>
                            </div>
                        </div>

                        <div class=" col-xl-6">
                            <div class='about-img'>
                                <img src="/images/slide7.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="swiper-pagination"></div>
    </div>


    <div class="mobile-slider">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-box" data-aos="fade-right">
                        <h1 class='heading'>Ihr Weg zu finanzieller Sicherheit</h1>
                        <!-- <div class="content"> -->
                            <div class="text-wrapper ">
                                <p class="paragraph">Denken Sie heute an morgen – und bauen Sie Ihr Vermögen mit
                                    Immobilien
                                    systematisch auf. In einer Zeit, in der Altersvorsorge und finanzielle Sicherheit
                                    immer
                                    wichtiger werden, bieten Immobilien eine stabile und krisensichere Grundlage.</p>
                                <p class="paragraph">Mit Niedrigzins24 erhalten Sie ein durchdachtes Konzept für Ihren
                                    Vermögensaufbau. Wir übernehmen den kompletten Prozess – von der Auswahl der
                                    passenden
                                    Immobilie über die Finanzierung bis hin zur Abwicklung. Sie profitieren von einem
                                    Full-Service-Paket, bei dem Sie entspannt die Füße hochlegen können, während Ihre
                                    Immobilie und die Zeit für Sie arbeiten.</p>
                                <p class="paragraph">So schaffen Sie sich Schritt für Schritt mehr Unabhängigkeit und
                                    eine
                                    sichere Basis für die Zukunft.</p>
                            </div>

                        <!-- </div> -->
                        <button class='about-btn'>
                            <a href="#kontakt">Jetzt kontaktieren</a>
                        </button>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class='about-img' data-aos="fade-left">
                        <img src="/images/about.png" alt="">
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class=" col-xl-6">
                    <div class="about-box">
                        <h1 class='heading'>Ihr starker Partner für Verkauf und Kauf von Immobilien</h1>

                        <div class="content">
                            <p class="paragaph">Eine Immobilie zu kaufen oder zu verkaufen ist eine wichtige Entscheidung – und genau dabei stehen wir Ihnen mit Erfahrung und Marktkenntnis zur Seite. Als Ihr
                                persönlicher Immobilienmakler begleiten wir Sie von der ersten Besichtigung bis zum
                                erfolgreichen Abschluss.</p>
                            <p class="paragraph">Unser Vorteil für Sie: Wir verbinden tiefes Fachwissen über Immobilien
                                mit
                                einem sicheren Gespür für den Markt. Das bedeutet für Sie eine realistische Einschätzung
                                von
                                Wert und Potenzial, eine professionelle Präsentation Ihrer Immobilie und eine
                                zielgerichtete
                                Vermittlung an passende Käufer oder Verkäufer.</p>
                            <p class="paragaph">Mit Niedrigzins24 sparen Sie Zeit, vermeiden unnötige Risiken und
                                gewinnen
                                einen Partner, der Ihre Interessen zuverlässig vertritt. So wird Ihre
                                Immobilienvermittlung
                                effizient, transparent und erfolgreich.</p>
                        </div>




                        <button class='about-btn'>
                            <a href="#">Jetzt kontaktieren</a>
                        </button>
                    </div>
                </div>

                <div class=" col-xl-6">
                    <div class='about-img'>
                        <img src="/images/slide6.png" alt="">
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class=" col-xl-6">
                    <div class="about-box">
                        <h1 class='heading'>Individuelle Baufinanzierung statt Standardlösung</h1>

                        <div class="content">
                            <p class="paragaph">Die richtige Finanzierung ist der Schlüssel zu einer sicheren
                                Investition.
                                Als freier und unabhängiger Vermittler haben wir Zugriff auf über 500 Banken – und
                                vergleichen für Sie neutral die besten Angebote am Markt.</p>
                            <p class="paragaph">Bei Niedrigzins24 gibt es keine Standardlösungen. Gemeinsam mit Ihnen
                                entwickeln wir ein Finanzierungskonzept, das exakt zu Ihrer Situation passt – flexibel,
                                transparent und auf Ihre Ziele zugeschnitten. So profitieren Sie nicht nur von
                                Top-Konditionen, sondern auch von einer Baufinanzierung, die langfristig Sicherheit
                                bietet.
                            </p>
                            <p>Ihr Vorteil: Sie behalten die volle Kontrolle, während wir Ihnen die Arbeit der Recherche
                                und
                                Verhandlung abnehmen. Das Ergebnis: die optimale Finanzierung für Ihr Immobilienprojekt
                                –
                                unabhängig, individuell und fair.</p>
                        </div>




                        <button class='about-btn'>
                            <a href="#kontakt">Jetzt kontaktieren</a>
                        </button>
                    </div>
                </div>

                <div class=" col-xl-6">
                    <div class='about-img'>
                        <img src="/images/slide7.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>

<!-- Section 3 Start -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4 stats-section">
            <div class="col-md-4">
                <div class="stat-card text-center" data-aos="zoom-in">
                    <div class="icon-circle">
                        <img src="/images/icons/icons1.png" alt="Finanzierung">
                    </div>
                    <div class="stat-content">
                        <h2 class="counter heading" data-count="400">0</h2>
                        <p class="">Projektfinanzierungen</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card text-center" data-aos="zoom-in">
                    <div class="icon-circle">
                        <img src="/images/icons/icons1.png" alt="Finanzierung">
                    </div>
                    <div class="stat-content">
                        <h2 class="counter heading" data-count="1029">0</h2>
                        <p class="">Zufriedene Kunden</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card text-center" data-aos="zoom-in">
                    <div class="icon-circle">
                        <img src="/images/icons/icons1.png" alt="Finanzierung">
                    </div>
                    <div class="stat-content">
                        <h2 class="counter heading" data-count="500">0</h2>
                        <p class="">Jahre Erfahrung</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Fouth Section Start Here -->
<section id="Überuns" class='section-fourth'>
    <div class="">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="fourth-section-box" data-aos="fade-right" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                    <h1 class='heading'>Über Niedrigzins24</h1>
                    <p class="paragraph">
                        Bei Niedrigzins24 verbinden wir Fachwissen aus der Baupraxis mit langjähriger Erfahrung in der
                        Immobilienvermittlung und Finanzierung. Unser Ziel ist es, Ihnen eine Beratung zu bieten, die
                        weit über das Übliche hinausgeht.
                    </p>

                    <p class="paragraph">
                        Der Gründer von Niedrigzins24 blickt auf eine fundierte Ausbildung und jahrelange
                        Berufserfahrung im Bauwesen zurück: vom Zimmermann über die Tätigkeit als staatlich geprüfter
                        Bautechniker bis hin zur Spezialisierung auf Immobilienvermittlung und Baufinanzierungen. Dieses
                        Zusammenspiel aus praktischer Baukompetenz und mehr als zehn Jahren Markterfahrung macht unsere
                        Beratung einzigartig.
                    </p>

                    <p class="paragraph">Für Sie bedeutet das: Wir wissen genau, worauf es beim Erwerb einer Immobilie
                        ankommt – ob als Kapitalanlage oder zur Eigennutzung. Von der ersten Besichtigung bis zum
                        Vertragsabschluss prüfen wir nicht nur Lage, Potenzial und Rendite, sondern auch die Bausubstanz
                        und den technischen Zustand. So erhalten Sie eine umfassende Einschätzung, die Sicherheit
                        schafft und Fehlentscheidungen vermeidet.</p>
                    <p class="paragraph">Mit Niedrigzins24 haben Sie einen Partner an Ihrer Seite, der den
                        Immobilienmarkt kennt, den Wert von Substanz einschätzen kann und Sie Schritt für Schritt durch
                        den gesamten Prozess begleitet – transparent, kompetent und zuverlässig.</p>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class='fourth-img' data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <img src="/images/slide2.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faq Section Start Here -->
<section class="faq-section" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
    <div class="container faq-container">
        <h1 class="heading mb-5">FAQ</h1>

        <div class="row">
            <div class="col-md-8">

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                Do you have a revenue share?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, we offer a buy-rate, interchange-plus pricing model giving you the most control over
                                your revenue.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo">
                                Do you have any minimum fees or fixed monthly fees?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, we offer a buy-rate, interchange-plus pricing model giving you the most control over
                                your revenue.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree">
                                Do you charge any PCI DSS program or non-compliance fees?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, we offer a buy-rate, interchange-plus pricing model giving you the most control over
                                your revenue.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour">
                                Can I set the pricing to my merchants?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, we offer a buy-rate, interchange-plus pricing model giving you the most control over
                                your revenue.

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <div>
</section>


<section id="kontakt" name="contact-form" class="contact">
    <div class="container contact-section">
        <h1 class="contact-title heading">Kontakt</h1>
        @if(session('success'))
        <div id="toast-overlay">
            <div class="toast-popup">
                <span class="toast-icon">✔</span>
                <p>{{ session('success') }}</p>
            </div>
        </div>
        @endif
        @if($errors->any())
        <div id="toast-overlay">
            <div class="toast-popup error">
                <span class="toast-icon">⚠</span>
                <p>Please fill all required fields correctly.</p>
            </div>
        </div>
        @endif

        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up-right">

                <div class="form-container">
                    <form action="{{ route('contact.store') }}#kontakt" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ old('name') }}">
                        @error('name')
                        <small class="error-text">{{ $message }}</small>
                        @enderror

                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                        <small class="error-text">{{ $message }}</small>
                        @enderror

                        <input type="tel" name="phone" class="form-control" placeholder="Telefon"
                            value="{{ old('phone') }}">
                        @error('phone')
                        <small class="error-text">{{ $message }}</small>
                        @enderror

                        <textarea name="message" class="form-control"
                            placeholder="nachricht">{{ old('message') }}</textarea>
                        @error('message')
                        <small class="error-text">{{ $message }}</small>
                        @enderror
                        <p class="paragraph">
                            Ich bin damit einverstanden, dass diese Daten zum Zwecke der Kontaktaufnahme gespeichert und
                            verarbeitet werden. Mir ist bekannt, dass ich meine Einwilligung jederzeit widerrufen kann.*
                        </p>
                        <button type="submit" class="">Abschicken</button>
                    </form>
                </div>

            </div>

            <div class="col-md-6" data-aos="fade-up-left">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2616.485558450143!2d8.309068!3d48.963242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4797040445a60001%3A0x6b907172b9a7616b!2sForchheim%2C%20Rheinstetten!5e0!3m2!1sen!2sde!4v1700000000000!5m2!1sen!2sde"
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- End About Section -->
@endsection