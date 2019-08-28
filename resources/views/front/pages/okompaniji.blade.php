@extends('master')

@section('title', 'O kompaniji -')


@section('content')

@include('front.partials._header')
<div style="padding-top: 65px;">
    <div class="container no-padding">

        <div class="col-md-6 about aboutcol1">
            <h2>DR THEISS DOO SRBIJA</h2>
            <p>
                deo je Dr. Theiss Naturwaren GmbH grupacije.
            </p>
             <p>Na tržištu smo prisutni više od 10 godina, i nadležni smo za teritoriju Srbije i Crne Gore.</p>
             <p>Stekli smo reputaciju pouzdane kompanije sa kvalitetnim proizvodima, u praksi dokazanim
                i odlično prihvaćeni od strane pacijenata.</p>
            <ul class="flags-list">
                <li><img src="{{ asset('images/serbian-flag.jpg') }}" alt="Serbia flag" class="img-responsive"></li>
                <li><img src="{{ asset('images/german-flag.jpg') }}" alt="German flag" class="img-responsive"></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6 about" style="padding-bottom: 25px;">
            <div class="col-md-6 no-padding">
                <h2>DR. THEISS</h2>
                <p>Dr. Theiss Naturwaren GmbH <br>
                    (Homburg, pokrajna Saar,<br>
                    35 godina tradicije i iskustva).</p>
                <p>Na svih 5 kontinenata poseduje partnere
                    za plasman u preko 60 zemalja
                    i 20 ćerka firmi u svetu.</p>
            </div>
            <div class="col-md-6 no-padding">
                <img src="{{asset('images/german-map.jpg')}}" alt="German map" class="img-responsive germamap">
            </div>

        </div>
         <div class="clearfix"></div>

        <div class="col-md-6 lab1">
            <img src="{{asset('images/lab1.jpg')}}" alt="Lab1" class="img-responsive">
        </div>
        <div class="col-md-6 about pb30">
            <h2>Dr Peter Theiss</h2>
            <p>Sve više i više ljudi veruje u moć prirode i imaju sklonost ka lekovima i kozmetici od prirodnih komponenti. Ovo je jedan od glavnih ključeva  uspeha u istoriji razvoja grupe preduzeća Dr. Theiss Naturwaren.</p>
            <p>Dr Peter Theiss rođen je 1944. godine u porodici farmaceuta.  Diplomirao je na Fakultetu za farmaciju Univerziteta Ludvig-Maximilians u Minhenu i odbranio doktorat na odeljenju za Neurofarmakologiju, Instituta za psihijatriju Maks Plank.</p>
            <p>Dr Peter Theiss ima doktorat iz prirodnih nauka. Više godina je na čelu Saveza farmaceuta  Nemačke.  Počasni je profesor na Univerzitetu u Beču, Berlinu, Trstu, Saarland’u.   Dr Petar Theiss je autor brojnih naučnih radova i popularnih materijala na temu fitoprevencije i fitoterapije. </p>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 lab2">
            <div class="whitebox">
                <p class="aboutitalic">Euforija prošlog veka,  neviđen razvoj hemijskih tretmana je iza nas. Sve manje i manje ljudi uzima lekove koji regulišu cirkulaciju krvi, san, eliminišu bol…. Ljudi, na sopstvenom iskustvu,  kao i na iskustvu njihovhi roditelja su uvideli kako je takva pomoć trenutna.</p>
                <p class="aboutitalic">Ponovo se javlja dosta pristalica "bakinih recepata" i iznenađujuće, takav tretman nije samo efikasan, već je od velikog značaja na opšte zdravlje. Tokom godina, fitomedicina je stekla sve veći broj pristalica. Ljudi uče da budu zdravi. Na kraju krajeva, zdravlje - to je sreća.  Stvarno želim da budete srećni i zdravi.</p>
                <img src="{{asset('images/peter-theiss.jpg')}}" alt="Dr. Peter Theiss" class="pull-left">
                <span class="signtext">Sa najboljim željama,<br>S poštovanjem,<br>Peter Theiss</span>
                <img src="{{ asset('images/signature.jpg') }}" alt="Signature" class="signature">
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 about pb30">
            <img src="{{ asset('images/nature.jpg') }}" alt="Nature" class="img-responsive">
            <img src="{{ asset('images/lab2.jpg') }}" alt="Lab2" class="img-responsive">
        </div>
        <div class="clearfix"></div>

        <div class="col-md-6 about aboutcol1">
            <h2>Proizvodnja</h2>

            <p>Godine 1978, dr Peter Theiss otvara svoj proizvodni pogon Naturwaren.   Ovde u Homburgu, ova zgrada najsavremenije infrastrukture, u potpunosti odgovara najvišim tehničkim standardima. Kompanija se ponosi na nju i želi da nastavi konstantno unapređenje, sa ciljem odgovora na sve zahtevnije stadarde izvoznog svetskog tržišta, ta da održe tradiciju proizvoda sa oznakom "Made in Germany".</p>
            <p>
                Danas, svi zaposleni rade za dobrobit pomenutih vrednosti. <br>
                Formula uspeha kompanije su pre svega četiri brenda: <br>
                 <span class="textbolder">Dr. Theiss</span> - asortiman lekova na bazi prirodnih sastojaka. <br>
                 <span class="textbolder">Lacalut</span>  - medicinskih proizvoda  koju stomatolozi preporučuju  za negu zuba i usne duplje.<br>
                 <span class="textbolder">Doliva</span>  - serija proizvoda za negu tela na bazi maslinovog ulja, kako za žene, tako i za muškarce.<br>
                 <span class="textbolder">ALLGA San</span>  - proizvodi za zglobove, mišiće, kao i za negu stopala.
            </p>
            <p>
                2009. godine proizvodnja je unapređena otvaranjem nove zgrade fabrike.  Dr. Theiss Naturvaren GmbH kompanija je opremljena najsavremenijom tehnologijom, zahvaljujući kojoj je moguće da se sačuvaju i unaprede lekovita svojstva bilja, koje su sastavni deo svih Dr Theiss preparata.
            </p>
            <p>
                Dr Peter Theiss, direktor fabrike je legenda moderne fitomedicine. Poznat je kao naučnik, profesor, koji vidi svoju misiju u tradiciji uzgajanja i korišćenja lekovitog bilja. Kolekcija tradicionalnih recepata ima za cilj da "omogući prirodi da izleči čovečanstvo od bolesti." Teško je naći specijalistu koji bi mogao bolje znati o metodama pripreme, ekstrakta, lekova, masti i melema više od dr Theiss-a. Nije slučajno da ga mnogi nazivaju "hodajuća enciklopedija lekovitog bilja."
            </p>
            <p class="textgray">
                Mnogi od Dr Theiss Naturwaren preparata  su došli u riznicu biljne medicinske nauke i u biljnoj medicini se smatraju klasikom.
            </p>
            <p>
                Proces stvaranja i proizvodnje novih prirodnih lekova  u fabrici je pod ličnim nadzorom direktora dr Peter Theiss-a. Uspeh svojih aktivnosti Peter Theiss objašnjava ne samo činjenicom da biljni lekovi dobijaju sve više pristalica, već i modernom tehnologijom prerade i proizvodnje i strogom kontrolom kvaliteta.
            </p>
            <p>
                Prvi koraci u dizajnu i razvoju lekova na bazi biljnih sirovina napravljeni su u gradskoj apoteci u  Homburgu, a koju je nasledio od svog oca, predsednika Udruženja farmaceuta pokrajne Saarland. Rad u apoteci potvrdio je ispravnost odabranog smera. Godine 1978, Peter Theiss je osnovao i vodio fabriku lekova Dr. Theiss Naturwaren GmbH, koja je počela da se specijalizuje u proizvodnju lekova i medicinske kozmetike na bazi bilja. Trenutna proizvodnja je vrlo brzo stekla poverenje potrošača u Nemačkoj, a od ranih 80-ih godina počeo je aktivni razvoj i na stranim tržištima.
            </p>
            <p>
                Vrlo brzo je proizvodnja premašila kapacitete apoteke, koja nije mogla da zadovolji povećanu potražnju za preparatima. Tako je nastala ideja o izgradnji farmaceutske kompanije Dr. Theiss Naturwaren GmbH. Razvoj projekta je u potpunosti uzeo u obzir filozofiju kompanije - "da se najbolje iz prirode iskoristi za ljudsko zdravlje". U izgradnji je što više moguće koristiti ekološki prihvatljive prirodne materijale. Čak i za farbanje pojedinih elemenata koristili su samo prirodne boje.
            </p>
            <p class="textgray">
                Proizvodni program obuhvata više od 130 vrsta lekova na bazi lekovitog bilja, upotpunjeni receptima tradicionalne medicine. Sirovine koje se koriste od strane biljnih vrsta sa visokim sadržajem vrednih materija, izvedeni su kao rezultat dugogodišnjeg uzgoja na plantažama biljaka, u ekološki čistim regionima u svetu.
            </p>
            <p>
                Na pogonu Dr. Theiss Naturwaren GmbH razvijena je kompozicija za prevenciju i nežno ali efikasno lečenje raznih bolesti.  Ovaj pristup omogućava farmaceutskoj kompaniji Dr. Theiss Naturwaren GmbH da održava lidersku poziciju među proizvođačima prirodnih lekova.
            </p>
        </div>
        <div class="col-md-6 about pb30">
            <h2>Uspeh preparata dr Theiss-a</h2>

            <p>Put ka uspehu dr Peter Theiss je počeo 1976. godine u apoteci svog oca u centru Homburga, Nemačka, pokrajna Saarbruecken,  kad je apoteku preuzeo kao mladi farmaceut i naučnik.</p>

            <p>Dve godine kasnije, 1978. godine, dr Peter Theiss sa suprugom Barbarom Theiss, koja je prirodnjak, osnovao je sopstveni proizvodni pogon za proizvodnju lekova na bazi prirodnih sastojaka.</p>

            <p>Od tada, kompanija je u stalnom porastu, te ne menja tok sve do danas.  Lekovi Dr. Theiss kompanije više od 20 godina se izvozi u više od 35 zemalja širom sveta, uključujući i Srbiju.</p>

            <img src="{{ asset('images/drtheiss-company.jpg') }}" alt="Dr Theiss Company" class="img-responsive">

            <img src="{{ asset('images/drtheiss-company2.jpg') }}" alt="Dr Theiss Facility" class="img-responsive">

            <img src="{{ asset('images/family.jpg') }}" alt="Family" class="img-responsive">
        </div>
        <div class="clearfix"></div>
    </div>
</div>





    @include('front.partials._footer')

@stop


@section('scripts')


<script>
  $(function() {



  });
</script>
@stop
