@extends('master')

@section('title', 'O lekovitim bijkama -')


@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ asset('images/lekovito-bilje.jpg') }}" alt="lekovito-bilje" class="img-responsive" >
</div>

<div class="container biljke-wrap">
    <div class="row">
        {{--Prvi--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/ANIS.jpg') }}" class="img-responsive margin-center" alt="anis">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>anis</h2>
                        <p>je višegodišnja biljka iz roda Burnet.
                            Divlji anis obično raste samo u Grčkoj,
                            ali se uzgaja širom sveta.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/GLOG.jpg') }}" class="img-responsive margin-center" alt="glog">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>glog</h2>
                        <p>Ukrasna i lekovita biljka iz roda mlečnih,
                            malo drvo ili visok grm. Glog se nalazi
                            uglavnom na severnoj hemisferi – i u
                            umerenim regionima u Evroaziji
                            i Severnoj Americi.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
         <div class="clearfix"></div>
        {{--Drugi--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/NEVEN.jpg') }}"  class="img-responsive margin-center" alt="neven">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>neven</h2>
                        <p>je godišnja biljka iz Aster porodice sa
                            žutim ili narandžastim cvetovima
                            sa jakom aromom.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/BRUSNICA.jpg') }}"  class="img-responsive margin-center" alt="brusnica">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>brusnica</h2>
                        <p>je lek grm iz porodice brusnica.
                            Ima izdužene listove i male roze cvetove
                            na dugim stabljikama .
                            Brusnica smanjuje groznicu i upalu,
                            poboljšava tonus tela,
                            bori se protiv bakterija.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
         <div class="clearfix"></div>
        {{--Treci--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/DIVLJIKESTEN.jpg') }}"  class="img-responsive margin-center" alt="divlji kesten">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>divlji kesten</h2>
                        <p>Plodovi i seme divljeg kestena je
                            puno glikozida - Esculin, fraksina,
                            escin, kao i tanina, flavonoida i skroba.
                            Zbog toga, oni se široko koriste u
                            medicinske svrhe, naročito uspešno
                            u bori protiv bolesti.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/LIMUN.jpg') }}"  class="img-responsive margin-center" alt="limun">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>limun</h2>
                        <p>Zimzelena voćka roda Citrus.
                            Živi do 45 godina,
                            raste u suptropskim klimama.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
         <div class="clearfix"></div>
        {{--Cetvrti--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/LIPA.jpg') }}"  class="img-responsive margin-center" alt="lipa">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>lipa</h2>
                        <p>Biljka porodičnog stabla koja ujedinjuje
                            više od 40 vrsta.  Uglavnom raste u
                            umerenim i suptropskih zonama
                            severne hemisfere.
                            Lipa se sadi u mnogim gradovima
                            i selima širom sveta u umerenoj zoni
                            na 55-60 geografske širine.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/MENTA.jpg') }}"  class="img-responsive margin-center" alt="mentol">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>mentol</h2>
                        <p>Organska supstanca izvedena iz
                            pepermintovog etarskog ulja.
                            U Japanu su znali o njemu još pre
                            2000 godina. Mentol je transparentan,
                            to je kristal koji se topi na sobnoj
                            temperaturi. Ima antiseptičko svojstva.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
         <div class="clearfix"></div>

        {{--Peti--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/NANA.jpg') }}"  class="img-responsive margin-center" alt="nana">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>nana</h2>
                        <p>Lekovita višegodišnja biljka. Postoji oko
                            25 različitih vrsta nane, neki su široko
                            koriste kao lekovi. Nana raste uglavnom
                            u umerenoj zoni severne hemisfere.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/GAVEZ.jpg') }}"  class="img-responsive margin-center" alt="gavez">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>gavez</h2>
                        <p>
                            Višegodišnja zeljasta biljka, visine je
                            oko jedan metar. Raste u vlažnim
                            zemljištima, dosta plodnim, često na
                            obalama reka ili potoka. Odomaćen u
                            celoj Evropi pa i u našim krajevima.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
         <div class="clearfix"></div>

        {{--Sesti--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/BOKVICA.jpg') }}"  class="img-responsive margin-center" alt="bokvica">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>bokvica</h2>
                        <p>
                            Snižava krvni pritisak, koristi se  u terapiji
                            bronhitisa i pleuritisa, astme i velikog
                            kašlja, i ulceroznih bolesti
                            gastrointestinalnog trakta.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/KANTARION.jpg') }}"  class="img-responsive margin-center" alt="kantarion">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>kantarion</h2>
                        <p>
                            Zeljasta višegodišnja  biljka.
                            Raste na Bliskom istoku, Evropi i
                            Centralnoj Aziji. Uglavnom raste na
                            obalama reka, livada i proplanaka.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        {{--Sedmi--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/RUZMARIN.jpg') }}"  class="img-responsive margin-center" alt="ruzmarin">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>ruzmarin</h2>
                        <p>
                            Višegodišnji zimzeleni žbun.
                            Veoma  voli toplotu, kao i sve egzotične
                            biljke dostiže 2 metra u visinu,
                            cveta u martu i ima jak miris kamfora.
                            Ruzmarin raste u Evropi i na Mediteranu,
                            nije baš sklon vlažnom tlu.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/KAMILICA.jpg') }}"  class="img-responsive margin-center" alt="kamilica">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>kamilica</h2>
                        <p>
                        je višegodišnja biljka , član porodice
                        Asteraceae ili Compositae.
                        Latinski naziv Kamilica - Matricia
                        potiče od reči "Matrik", što u prevodu
                        sa latinskog znači "materica".
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        {{--Osmi--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/TAMJAN.jpg') }}"  class="img-responsive margin-center" alt="tamjan">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>majčina dušica</h2>
                        <p>
                            Naziva se još i timijan i  njeno lišće se
                            koristiti  kao začin. Majčina dušica je
                            veoma ukusna. Majčina dušica voli
                            južne padine, kamenje i stepske  borove
                            šume i kamenite tundre.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/MORAC.jpg') }}"  class="img-responsive margin-center" alt="komorač">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>komorač</h2>
                        <p>
                        Zeljasta  višegodišnja biljka iz
                        porodice Umbelliferae. Naziva se još
                        i apotekarska mirođija.
                        Komorač se pojavio u Maloj Aziji i
                        južnoj Evropi, sada se uzgaja u južnoj
                        i zapadnoj Evropi, Južnoj Americi,
                        Indiji, Kini, Japanu, Novom Zelandu,
                        Južnoj Africi.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        {{--Deveti--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/MUDRAC.jpg') }}"  class="img-responsive margin-center" alt="salvia">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>salvia</h2>
                        <p>
                            Lekovita biljka poreklom iz Italije
                            i jugoistočne Evrope,
                            proširila  se širom sveta.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/EUKALIPTUS.jpg') }}"  class="img-responsive margin-center" alt="Ulje eukaliptusa">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>Ulje eukaliptusa</h2>
                        <p>
                        Snažan antiseptik, ima antiinflamatorno
                        dejstvo, ubija streptokoke i stafilokoke.
                        Eukaliptusovo ulje je deo mnogih
                        farmaceutskih preparata i koristitise
                        nezavisno ili u smeši sa drugim
                        eteričnim uljima - za inhalaciju, obloge,
                        kupke.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        {{--Deset--}}
        <div class="col-md-6 no-padding">
            <div class="biljka">
                <div class="col-md-6 no-padding">
                    <img src="{{ asset('images/lekovito-bilje/EHINACEA.jpg') }}"  class="img-responsive margin-center" alt="ehinacea">
                </div>
                <div class="col-md-6 no-padding">
                    <div class="biljka-opis">
                        <h2>ehinacea</h2>
                        <p>
                            Višegodišnja biljka sa velikim cvetovima
                            i ljubičastih i belih latica, dostiže visinu
                            od 1,5 m Ehinacea se često naziva
                            "prerija cvet", jer je rođen u prerijama u
                            Severnoj Americi. Njena lekovita
                            svojstva odavno su otkrivena od strane
                            američkih Indijanaca, široko se koristi
                            za lečenje mnogih bolesti i infekcija.
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
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
