@extends('layouts.app')

@section('content')
 <section class="impressum-section">
    
   </section>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class='impressum-main-box' data-aos="zoom-out-up">
            <h1 class="heading mb-4">Impressum</h1>

            @if(!empty($content['body']))
                <div class="content-section impressum-editable">
                    {!! $content['body'] !!}
                </div>
            @else
            <div class="content-section">
                <h2 class="h4 mb-3">Niedrigzins24 GmbH</h2>
                <p class="paragraph">
                    Karlsruher Str. 20<br>
                    76287 Rheinstetten<br>
                    Deutschland<br>
                </p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">Kontakt</h2>
                <p class="paragraph">
                    Tel.: +4915780502830<br>
                    E-Mail: niedrigzins24@gmail.com
                </p>
            </div>

            <div class="content-section mt-4">
                <p class="paragraph">Registergericht: Amtsgericht Mannheim</p>
                <p class="paragraph">
                    Registernummer: HRB 739518<br>
                    Geschäftsführer: Dominic Neu<br>
                    Umsatzsteuer-Identifikationsnummer: DE406684346

                </p>
                <p class="paragraph">Wir sind zur Teilnahme an einem Streitbeilegungsverfahren vor einer
                    Verbraucherschlichtungsstelle weder verpflichtet noch bereit.</p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">Aufsichtsbehörde</h2>
                <p class="paragraph">
                    Stadt Karlsruhe <br>
                    Ordnungs- und Bürgeramt<br>
                    Gewerbeangelegenheiten<br>
                    Kaiserallee 8<br>
                    76124 Karlsruhe<br>
                </p>
            </div>
            @endif
            </div>
            
        </div>
    </div>
</div>
@endsection