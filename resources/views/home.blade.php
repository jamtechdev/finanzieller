<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
   <section class="hero-section"  data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="hero-content">
                    <h1 class='heading'>{!! nl2br(e($heroSection['title'] ?? 'Willkommen bei Niedrigzins24')) !!}</h1>
                    <p class='paragaph'>{{ $heroSection['subtitle'] ?? 'Ob als Kapitalanlage oder zur Selbstnutzung – wir finden die passende Immobilie für Sie.' }}</p>
                    <button>
                        <a href="{{ $heroSection['button_link'] ?? '#Überuns' }}">{{ $heroSection['button_text'] ?? 'mehr erfahren' }}</a>
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
        <div class="swiper vertical-slider">
            <div class="swiper-wrapper">
            @foreach(($slidesSection['items'] ?? []) as $index => $slide)
            <div class="swiper-slide slider-slide">
                <div class="container">
                    <div class="row">
                        <div class=" col-xl-6">
                            <div class="about-box" @if($index === 0) data-aos="fade-right" @endif>
                                <h1 class='heading'>{{ $slide['title'] ?? '' }}</h1>

                                <div class="content">
                                    @foreach(explode("\n\n", $slide['content'] ?? '') as $paragraph)
                                        <p class="paragraph">{{ $paragraph }}</p>
                                    @endforeach
                                </div>
                                
                                    <button>
                                        <a href="{{ $slide['button_link'] ?? '#kontakt' }}">{{ $slide['button_text'] ?? 'Jetzt kontaktieren' }}</a>
                                    </button>
                            </div>
                        </div>

                        <div class=" col-xl-6">
                            <div class='about-img' @if($index === 0) data-aos="fade-left" @endif>
                                <img src="{{ $slide['image'] ?? '/images/about.png' }}" alt="{{ $slide['title'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
        
            </div>
            <div class="swiper-pagination"></div>
        </div>
       
    </section>

<!-- Section 3 Start -->
 <section class="stats-section">
    <div class="container">
        <div class="row g-4 gx-xl-5 stats-section">
    @foreach(($statsSection['items'] ?? []) as $stat)
    <div class="col-md-4">
        <div class="stat-card text-center" data-aos="zoom-in">
            <div class="icon-circle">
                <img src="{{ $stat['icon'] ?? '/images/icons/icons1.png' }}" alt="{{ $stat['label'] ?? '' }}">
            </div>
            <div class="stat-content">
                <h2 class="counter heading" data-count="{{ $stat['value'] ?? '0' }}">0</h2>
                <p class="fw-bold">{{ $stat['label'] ?? '' }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

    </div>
</section>

<!-- Fouth Section Start Here -->
<section id="Überuns" class='section-fourth'>
    <div class="">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="fourth-section-box" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
                    <h1 class='heading'>{{ $aboutSection['title'] ?? 'Über Niedrigzins24' }}</h1>
                    <div class="content">
                        @foreach(explode("\n\n", $aboutSection['content'] ?? '') as $paragraph)
                            <p class="paragraph pt-3">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class='fourth-img' data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
                    <img src="{{ $aboutSection['image'] ?? '/images/slide2.png' }}" alt="{{ $aboutSection['title'] ?? 'Über uns' }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faq Section Start Here -->
<section class="faq-section" data-aos="fade-up"
     >
   <div class="container faq-container">
    <h1 class="heading">FAQ</h1>

    <div class="row">
        <div class="col-xl-8 col-md-12">
            
        <div class="accordion" id="faqAccordion">
            @foreach(($faqSection['items'] ?? []) as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                          {{ $faq['question'] ?? '' }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body paragraph">
                            {{ $faq['answer'] ?? '' }}
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
                </div>
            </div>

        
        </div>
        <div>
</section>


<section id="kontakt" name="contact-form"  class="contact">
    <div class="container contact-section">
    <h1 class="contact-title heading">{{ $contactSection['title'] ?? 'Kontakt' }}</h1>
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
            
           <div class="form-container"  >
             <form action="{{ route('contact.store') }}#kontakt" method="POST">
              @csrf
              <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
@error('name')
    <small class="error-text">{{ $message }}</small>
@enderror

<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
@error('email')
    <small class="error-text">{{ $message }}</small>
@enderror

<input type="tel" name="phone" class="form-control" placeholder="Telefon" value="{{ old('phone') }}">
@error('phone')
    <small class="error-text">{{ $message }}</small>
@enderror

<textarea name="message" class="form-control" placeholder="nachricht">{{ old('message') }}</textarea>
@error('message')
    <small class="error-text">{{ $message }}</small>
@enderror
              <p class="consent-text">
               Ich bin damit einverstanden, dass diese Daten zum Zwecke der Kontaktaufnahme gespeichert und verarbeitet werden. Mir ist bekannt, dass ich meine Einwilligung jederzeit widerrufen kann.*
              </p>
              <button type="submit" class="">Abschicken</button>
              </form>
            </div>

        </div>

        <div class="col-md-6" data-aos="fade-up-left">
            <div class="map-container">
                <iframe 
                    src="{{ $contactSection['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2616.485558450143!2d8.309068!3d48.963242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4797040445a60001%3A0x6b907172b9a7616b!2sForchheim%2C%20Rheinstetten!5e0!3m2!1sen!2sde!4v1700000000000!5m2!1sen!2sde' }}" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
</section>



   
   <!-- End About Section -->
@endsection
