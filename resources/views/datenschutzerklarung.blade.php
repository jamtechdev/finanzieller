@extends('layouts.app')

@section('content')


<section class="impressum-section"></section>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="daten-main-box" data-aos="fade-up"
     data-aos-duration="2000">
                <div class="datenschutz">
  <h1 class='heading mb-4'>Datenschutzerklärung</h1>

  @if(!empty($content['body']))
      <div class="datenschutz-editable">
          {!! $content['body'] !!}
      </div>
  @else
  <h2 class='h4 mb-3'>1) Einleitung und Kontaktdaten des Verantwortlichen</h2 class='h4 mb-3'>
  <p><strong>1.1</strong> Wir freuen uns, dass Sie unsere Website besuchen, und bedanken uns für Ihr Interesse. Im Folgenden informieren wir Sie über den Umgang mit Ihren personenbezogenen Daten bei der Nutzung unserer Website. Personenbezogene Daten sind hierbei alle Daten, mit denen Sie persönlich identifiziert werden können.</p>
  <p><strong>1.2</strong> Verantwortlicher für die Datenverarbeitung auf dieser Website im Sinne der Datenschutz-Grundverordnung (DSGVO) ist Niedrigzins24 GmbH, Karlsruher Str. 20, 76287 Rheinstetten, Deutschland, Tel.: +4915780502830, E-Mail: niedrigzins24@gmail.com. Der für die Verarbeitung von personenbezogenen Daten Verantwortliche ist diejenige natürliche oder juristische Person, die allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten entscheidet.</p>

  <h2 class='h4 mb-3'>2) Datenerfassung beim Besuch unserer Website</h2 class='h4 mb-3'>
  <p><strong>2.1</strong> Bei der bloß informatorischen Nutzung unserer Website, also wenn Sie sich nicht registrieren oder uns anderweitig Informationen übermitteln, erheben wir nur solche Daten, die Ihr Browser an den Seitenserver übermittelt (sog. „Server-Logfiles“). Wenn Sie unsere Website aufrufen, erheben wir die folgenden Daten, die für uns technisch erforderlich sind, um Ihnen die Website anzuzeigen:</p>
  <ul style='list-style-type: disc;'>
    <li>Unsere besuchte Website</li>
    <li>Datum und Uhrzeit zum Zeitpunkt des Zugriffes</li>
    <li>Menge der gesendeten Daten in Byte</li>
    <li>Quelle/Verweis, von welchem Sie auf die Seite gelangten</li>
    <li>Verwendeter Browser</li>
    <li>Verwendetes Betriebssystem</li>
    <li>Verwendete IP-Adresse (ggf.: in anonymisierter Form)</li>
  </ul>
  <p>Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der Verbesserung der Stabilität und Funktionalität unserer Website. Eine Weitergabe oder anderweitige Verwendung der Daten findet nicht statt. Wir behalten uns allerdings vor, die Server-Logfiles nachträglich zu überprüfen, sollten konkrete Anhaltspunkte auf eine rechtswidrige Nutzung hinweisen.</p>

  <p><strong>2.2</strong> Diese Website nutzt aus Sicherheitsgründen und zum Schutz der Übertragung personenbezogener Daten und anderer vertraulicher Inhalte (z.B. Bestellungen oder Anfragen an den Verantwortlichen) eine SSL-bzw. TLS-Verschlüsselung. Sie können eine verschlüsselte Verbindung an der Zeichenfolge „https://“ und dem Schloss-Symbol in Ihrer Browserzeile erkennen.</p>

  <h2 class='h4 mb-3'>3) Hosting & Content-Delivery-Network</h2 class='h4 mb-3'>
  <p>Für das Hosting unserer Website und die Darstellung der Seiteninhalte nutzen wir einen Anbieter, der seine Leistungen selbst oder durch ausgewählte Sub-Unternehmer ausschließlich auf Servern innerhalb der Europäischen Union erbringt.</p>
  <p>Sämtliche auf unserer Website erhobenen Daten werden auf diesen Servern verarbeitet.</p>
  <p>Wir haben mit dem Anbieter einen Auftragsverarbeitungsvertrag geschlossen, der den Schutz der Daten unserer Seitenbesucher sicherstellt und eine unberechtigte Weitergabe an Dritte untersagt.</p>

  <h2 class='h4 mb-3'>4) Kontaktaufnahme</h2 class='h4 mb-3'>
  <p><strong>4.1</strong> Calendly</p>
  <p>Für die Bereitstellung einer Online-Terminbuchungsfunktion nutzen wir die Dienste des folgenden Anbieters: Calendly, LLC, BB&T Tower, 271 17th St NW, Atlanta, GA 30363, USA</p>
  <p>Zum Zwecke der Terminvergabe werden gemäß Art. 6 Abs. 1 lit. b DSGVO Vor- und Zuname sowie Mailadresse (und ggf. die Telefonnummer, sofern ein telefonischer Termin gewünscht ist) erhoben und gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an einem effektiven Kundenmanagement und einer effizienten Terminverwaltung an den Anbieter übermittelt und dort für die Terminorganisation gespeichert.</p>
  <p>Nach Abhaltung des Termins bzw. nach Ablauf des vereinbarten Terminzeitraums werden Ihre Daten vom Anbieter gelöscht.</p>
  <p>Wir haben mit dem Anbieter einen Auftragsverarbeitungsvertrag geschlossen, der den Schutz der Daten unserer Seitenbesucher sicherstellt und eine unberechtigte Weitergabe an Dritte untersagt.</p>

  <p><strong>4.2</strong> Google Calendar</p>
  <p>Für die Bereitstellung einer Online-Terminbuchungsfunktion nutzen wir die Dienste des folgenden Anbieters: Google Ireland Limited, Gordon House, 4 Barrow St, Dublin, D04 E5W5, Irland</p>
  <p>Daten können zudem übertragen werden an: Google LLC, USA</p>
  <p>Zum Zwecke der Terminvergabe werden gemäß Art. 6 Abs. 1 lit. b DSGVO Vor- und Zuname sowie Mailadresse (und ggf. die Telefonnummer, sofern ein telefonischer Termin gewünscht ist) erhoben und gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an einem effektiven Kundenmanagement und einer effizienten Terminverwaltung an den Anbieter übermittelt und dort für die Terminorganisation gespeichert.</p>

  <p><strong>4.3</strong> WhatsApp-Business</p>
  <p>Sie haben die Möglichkeit, mit uns über den Nachrichtendienst WhatsApp der WhatsApp Ireland Limited, 4 Grand Canal Square, Grand Canal Harbour, Dublin 2, Irland, in Kontakt zu treten. Hierfür verwenden wir die sog. „Business-Version“ von WhatsApp.</p>
  <p>Sofern Sie uns anlässlich eines konkreten Geschäfts (beispielsweise einer getätigten Bestellung) per WhatsApp kontaktieren, speichern und verwenden wir die von Ihnen bei WhatsApp genutzte Mobilfunknummer sowie – falls bereitgestellt – Ihren Vor- und Nachnamen gemäß Art. 6 Abs. 1 lit. b. DSGVO zur Bearbeitung und Beantwortung Ihres Anliegens. Auf Basis derselben Rechtsgrundlage werden wir Sie per WhatsApp gegebenenfalls um die Bereitstellung weiterer Daten (Bestellnummer, Kundennummer, Anschrift oder E-Mailadresse) bitten, um Ihre Anfrage einem bestimmten Vorgang zuordnen zu können.</p>
  <p>Nutzen Sie unseren WhatsApp-Kontakt für allgemeine Anfragen (etwa zum Leistungsspektrum, zu Verfügbarkeiten oder zu unserem Internetauftritt) speichern und verwenden wir die von Ihnen bei WhatsApp genutzte Mobilfunknummer sowie – falls bereitgestellt – Ihren Vor- und Nachnamen gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der effizienten und zeitnahen Bereitstellung der gewünschten Informationen.</p>
  <p>Ihre Daten werden stets nur zur Beantwortung Ihres Anliegens per WhatsApp verwendet. Eine Weitergabe an Dritte findet nicht statt.</p>
  <p>Bitte beachten Sie, dass WhatsApp Business Zugriff auf das Adressbuch des von uns hierfür verwendeten mobilen Endgeräts erhält und im Adressbuch gespeicherte Telefonnummern automatisch an einen Server des Mutterkonzerns Meta Platforms Inc. in den USA überträgt. Für den Betrieb unseres WhatsApp-Business-Kontos verwenden wir ein mobiles Endgerät, in dessen Adressbuch ausschließlich die WhatsApp-Kontaktdaten solcher Nutzer gespeichert werden, die mit uns per WhatsApp auch in Kontakt getreten sind.</p>
  <p>Hierdurch wird sichergestellt, dass jede Person, deren WhatsApp- Kontaktdaten in unserem Adressbuch gespeichert sind, bereits bei erstmaliger Nutzung der App auf seinem Gerät durch Akzeptanz der WhatsApp-Nutzungsbedingungen in die Übermittlung seiner WhatsApp-Telefonnummer aus den Adressbüchern seiner Chat-Kontakte gemäß Art. 6 Abs. 1 lit. a DSGVO eingewilligt hat. Eine Übermittlung von Daten solcher Nutzer, die WhatsApp nicht verwenden und/oder uns nicht über WhatsApp kontaktiert haben, wird insofern ausgeschlossen.</p>
  <p>Zweck und Umfang der Datenerhebung und die weitere Verarbeitung und Nutzung der Daten durch WhatsApp sowie Ihre diesbezüglichen Rechte und Einstellungsmöglichkeiten zum Schutz Ihrer Privatsphäre entnehmen Sie bitte den Datenschutzhinweisen von WhatsApp: <a href='https://www.whatsapp.com/legal/?eea=1#privacy-policy' style='color:#004d3d;'>https://www.whatsapp.com/legal/?eea=1#privacy-policy</a></p>
  <p>Wir haben mit dem Anbieter einen Auftragsverarbeitungsvertrag geschlossen, der die Daten unserer Seitenbesucher schützt und eine Weitergabe an Dritte untersagt.</p>
  <p>Im Rahmen der oben genannten Verarbeitungen kann es zu Datenübertragungen an Server von Meta Platforms Inc. in den USA kommen.</p>
  <p>Für Datenübermittlungen in die USA hat sich der Anbieter dem EU-US-Datenschutzrahmen (EU-US Data Privacy Framework) angeschlossen, das auf Basis eines Angemessenheitsbeschlusses der Europäischen Kommission die Einhaltung des europäischen Datenschutzniveaus sicherstellt.</p>


  <p><strong>4.4 </strong> Im Rahmen der Kontaktaufnahme mit uns (z.B. per Kontaktformular oder E-Mail) werden personenbezogene Daten erhoben. Welche Daten im Falle der Nutzung eines Kontaktformulars erhoben werden, ist aus dem jeweiligen Kontaktformular ersichtlich. Diese Daten werden ausschließlich zum Zweck der Beantwortung Ihres Anliegens bzw. für die Kontaktaufnahme und die damit verbundene technische Administration gespeichert und verwendet.s</p>
<p>Rechtsgrundlage für die Verarbeitung dieser Daten ist unser berechtigtes Interesse an der Beantwortung Ihres Anliegens gemäß Art. 6 Abs. 1 lit. f DSGVO. Zielt Ihre Kontaktierung auf den Abschluss eines Vertrages ab, so ist zusätzliche Rechtsgrundlage für die Verarbeitung Art. 6 Abs. 1 lit. b DSGVO. Ihre Daten werden nach abschließender Bearbeitung Ihrer Anfrage gelöscht. Dies ist der Fall, wenn sich aus den Umständen entnehmen lässt, dass der betroffene Sachverhalt abschließend geklärt ist und sofern keine gesetzlichen Aufbewahrungspflichten entgegenstehen.</p>

  <h2 class='h4 mb-3'>5) Rechte des Betroffenen</h2 class='h4 mb-3'>
  <p><strong>5.1</strong> Das geltende Datenschutzrecht gewährt Ihnen gegenüber dem Verantwortlichen hinsichtlich der Verarbeitung Ihrer personenbezogenen Daten die nachstehenden Betroffenenrechte (Auskunfts- und Interventionsrechte), wobei für die jeweiligen Ausübungsvoraussetzungen auf die angeführte Rechtsgrundlage verwiesen wird:</p>
  <ul style='list-style-type: disc;'>
    <li>Auskunftsrecht gemäß Art. 15 DSGVO;</li>
    <li>Recht auf Berichtigung gemäß Art. 16 DSGVO;</li>
    <li>Recht auf Löschung gemäß Art. 17 DSGVO;</li>
    <li>Recht auf Einschränkung der Verarbeitung gemäß Art. 18 DSGVO;</li>
    <li>Recht auf Unterrichtung gemäß Art. 19 DSGVO;</li>
    <li>Recht auf Datenübertragbarkeit gemäß Art. 20 DSGVO;</li>
    <li>Recht auf Widerruf erteilter Einwilligungen gemäß Art. 7 Abs. 3 DSGVO;</li>
    <li>Recht auf Beschwerde gemäß Art. 77 DSGVO.</li>
  </ul>

    <p><strong>5.2 </strong> WIDERSPRUCHSRECHT</p>
    <p>WENN WIR IM RAHMEN EINER INTERESSENABWÄGUNG IHRE PERSONENBEZOGENEN DATEN AUFGRUND UNSERES ÜBERWIEGENDEN BERECHTIGTEN INTERESSES VERARBEITEN, HABEN SIE DAS JEDERZEITIGE RECHT, AUS GRÜNDEN, DIE SICH AUS IHRER BESONDEREN SITUATION ERGEBEN, GEGEN DIESE VERARBEITUNG WIDERSPRUCH MIT WIRKUNG FÜR DIE ZUKUNFT EINZULEGEN.</p>
    <p>MACHEN SIE VON IHREM WIDERSPRUCHSRECHT GEBRAUCH, BEENDEN WIR DIE VERARBEITUNG DER BETROFFENEN DATEN. EINE WEITERVERARBEITUNG BLEIBT ABER VORBEHALTEN, WENN WIR ZWINGENDE SCHUTZWÜRDIGE GRÜNDE FÜR DIE VERARBEITUNG NACHWEISEN KÖNNEN, DIE IHRE INTERESSEN, GRUNDRECHTE UND GRUNDFREIHEITEN ÜBERWIEGEN, ODER WENN DIE VERARBEITUNG DER GELTENDMACHUNG, AUSÜBUNG ODER VERTEIDIGUNG VON RECHTSANSPRÜCHEN DIENT.</p>
    <p>WERDEN IHRE PERSONENBEZOGENEN DATEN VON UNS VERARBEITET, UM DIREKTWERBUNG ZU BETREIBEN, HABEN SIE DAS RECHT, JEDERZEIT WIDERSPRUCH GEGEN DIE VERARBEITUNG SIE BETREFFENDER PERSONENBEZOGENER DATEN ZUM ZWECKE DERARTIGER WERBUNG EINZULEGEN. SIE KÖNNEN DEN WIDERSPRUCH WIE OBEN BESCHRIEBEN AUSÜBEN.</p>
    <p>MACHEN SIE VON IHREM WIDERSPRUCHSRECHT GEBRAUCH, BEENDEN WIR DIE VERARBEITUNG DER BETROFFENEN DATEN ZU DIREKTWERBEZWECKEN.</p>

  <h2 class='h4 mb-3'>6) Dauer der Speicherung personenbezogener Daten</h2 class='h4 mb-3'>
  <p>Die Dauer der Speicherung von personenbezogenen Daten bemisst sich anhand der jeweiligen Rechtsgrundlage, am Verarbeitungszweck und – sofern einschlägig – zusätzlich anhand der jeweiligen gesetzlichen Aufbewahrungsfrist (z.B. handels- und steuerrechtliche Aufbewahrungsfristen).</p>
  <p>Bei der Verarbeitung von personenbezogenen Daten auf Grundlage einer ausdrücklichen Einwilligung gemäß Art. 6 Abs. 1 lit. a DSGVO werden die betroffenen Daten so lange gespeichert, bis Sie Ihre Einwilligung widerrufen.</p>
    <p>Existieren gesetzliche Aufbewahrungsfristen für Daten, die im Rahmen rechtsgeschäftlicher bzw. rechtsgeschäftsähnlicher Verpflichtungen auf der Grundlage von Art. 6 Abs. 1 lit. b DSGVO verarbeitet werden, werden diese Daten nach Ablauf der Aufbewahrungsfristen routinemäßig gelöscht, sofern sie nicht mehr zur Vertragserfüllung oder Vertragsanbahnung erforderlich sind und/oder unsererseits kein berechtigtes Interesse an der Weiterspeicherung fortbesteht.</p>
    <p>Bei der Verarbeitung von personenbezogenen Daten auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO werden diese Daten so lange gespeichert, bis Sie Ihr Widerspruchsrecht nach Art. 21 Abs. 1 DSGVO ausüben, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder die Verarbeitung dient der Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen.</p>
    <p>Bei der Verarbeitung von personenbezogenen Daten zum Zwecke der Direktwerbung auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO werden diese Daten so lange gespeichert, bis Sie Ihr Widerspruchsrecht nach Art. 21 Abs. 2 DSGVO ausüben.</p>
    <p>Sofern sich aus den sonstigen Informationen dieser Erklärung über spezifische Verarbeitungssituationen nichts anderes ergibt, werden gespeicherte personenbezogene Daten im Übrigen dann gelöscht, wenn sie für die Zwecke, für die sie erhoben oder auf sonstige Weise verarbeitet wurden, nicht mehr notwendig sind.</p>
    <p>Stand: 05.09.2025, 13:54:50 Uhr</p>
  @endif
</div>

            </div>
        </div>
    </div>
</div>
@endsection
