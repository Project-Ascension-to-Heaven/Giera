{include file="header.tpl"}

        <div class="container-fluid">
            <div class="row" id="top">
                <div class="col-2">
                    Nick: {$playerLogin|default:"Anonim"}
                </div>
                <div class="col-2">
                    Gildia: brak
                </div>
                <div class="col-1">
                    Jedzenie: {$jedzenie}
                </div>
                <div class="col-1">
                    Drewno: {$drewno}
                </div>
                <div class="col-1">
                    Metale: {$metale}
                </div>
                <div class="col-1">
                    Monety: {$monety}
                </div>
                <div class="col-1">
                    Kryształy: 21
                </div>
            </div>
            <div class="row">
                <div class="col-10" id="lewo">
                    <img src="projekt.png" id="obrazTlo">
                </div>
                <div class="col-2">
                    <h2>Przychód:</h2> <br>
                    Jedzeniem zysk/h: {$jedzenieGain} <br>
                    <a href="/upgrade/farmy/">
                        <button>Rozbuduj Farmy</button>
                    </a><br>
                    Drewno, zysk/h: {$drewnoGain} <br>
                    <a href="/upgrade/tartak/">
                        <button>Rozbuduj Tartak</button>
                    </a><br>
                    Metale, zysk/h: {$metaleGain} <br>
                    <a href="/upgrade/kopalnia/">
                        <button>Rozbuduj Kopalnie</button>
                    </a><br>
                    Monety, zysk/h: {$monetyGain} <br>
                    <a href="/upgrade/skarbowka/">
                        <button>Rozbuduj Skarbówkę</button>
                    </a><br>
                </div>
            </div>
        
    <footer class="row mt-3">
        <div class="col-12">
            {include file="log.tpl"}
        </div>
    </footer>
    </div><!-- /container-fluid -->

{include file="footer.tpl"}