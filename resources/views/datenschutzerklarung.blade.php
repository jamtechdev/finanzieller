@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="heading mb-4">Datenschutzerklärung</h1>
            
            <div class="content-section">
                <h2 class="h4 mb-3">1. Datenschutz auf einen Blick</h2>
                
                <h3 class="h5 mb-2 mt-3">Allgemeine Hinweise</h3>
                <p class="paragraph">
                    Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren personenbezogenen 
                    Daten passiert, wenn Sie diese Website besuchen. Personenbezogene Daten sind alle Daten, mit denen 
                    Sie persönlich identifiziert werden können.
                </p>

                <h3 class="h5 mb-2 mt-3">Datenerfassung auf dieser Website</h3>
                <p class="paragraph">
                    <strong>Wer ist verantwortlich für die Datenerfassung auf dieser Website?</strong><br>
                    Die Datenverarbeitung auf dieser Website erfolgt durch den Websitebetreiber. Dessen Kontaktdaten 
                    können Sie dem Abschnitt „Hinweis zur Verantwortlichen Stelle" in dieser Datenschutzerklärung entnehmen.
                </p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">2. Hosting</h2>
                <p class="paragraph">
                    Diese Website wird bei [Ihr Hosting-Anbieter] gehostet. Der Hoster erhebt in sog. Logfiles 
                    folgende Daten, die Ihr Browser übermittelt:
                </p>
                <ul class="paragraph">
                    <li>IP-Adresse</li>
                    <li>Datum und Uhrzeit der Anfrage</li>
                    <li>Zeitzonendifferenz zur Greenwich Mean Time (GMT)</li>
                    <li>Inhalt der Anforderung (konkrete Seite)</li>
                    <li>Zugriffsstatus/HTTP-Statuscode</li>
                    <li>jeweils übertragene Datenmenge</li>
                    <li>Website, von der die Anforderung kommt</li>
                    <li>Browser</li>
                    <li>Betriebssystem und dessen Oberfläche</li>
                    <li>Sprache und Version der Browsersoftware</li>
                </ul>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">3. Allgemeine Hinweise und Pflichtinformationen</h2>
                
                <h3 class="h5 mb-2 mt-3">Datenschutz</h3>
                <p class="paragraph">
                    Die Betreiber dieser Seiten nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Wir behandeln 
                    Ihre personenbezogenen Daten vertraulich und entsprechend den gesetzlichen Datenschutzbestimmungen 
                    sowie dieser Datenschutzerklärung.
                </p>

                <h3 class="h5 mb-2 mt-3">Hinweis zur verantwortlichen Stelle</h3>
                <p class="paragraph">
                    Die verantwortliche Stelle für die Datenverarbeitung auf dieser Website ist:<br><br>
                    Niedrigzins24<br>
                    [Ihre Firmenadresse]<br>
                    [PLZ Ort]<br><br>
                    Telefon: [Ihre Telefonnummer]<br>
                    E-Mail: [Ihre E-Mail-Adresse]
                </p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">4. Datenerfassung auf dieser Website</h2>
                
                <h3 class="h5 mb-2 mt-3">Kontaktformular</h3>
                <p class="paragraph">
                    Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem 
                    Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung 
                    der Anfrage und für den Fall von Anschlussfragen bei uns gespeichert. Diese Daten geben 
                    wir nicht ohne Ihre Einwilligung weiter.
                </p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">5. Ihre Rechte</h2>
                <p class="paragraph">
                    Sie haben jederzeit das Recht, Auskunft über Ihre bei uns gespeicherten personenbezogenen 
                    Daten zu erhalten. Außerdem haben Sie ein Recht auf Berichtigung, Löschung oder Einschränkung 
                    der Verarbeitung sowie ein Widerspruchsrecht gegen die Verarbeitung sowie das Recht auf 
                    Datenübertragbarkeit.
                </p>
            </div>

            <div class="content-section mt-4">
                <h2 class="h4 mb-3">6. Widerspruch gegen Datenwerbung</h2>
                <p class="paragraph">
                    Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten zur Übersendung 
                    von nicht ausdrücklich angeforderter Werbung und Informationsmaterialien wird hiermit 
                    widersprochen. Die Betreiber der Seiten behalten sich ausdrücklich rechtliche Schritte im 
                    Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-E-Mails, vor.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
