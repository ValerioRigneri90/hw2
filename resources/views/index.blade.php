<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreame</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,98.4,300..800;1,98.4,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("css/index.css") }}">
    <script src="{{ asset("js/index.js") }}" defer></script>
    <script>
        window.productUrl3 = "{{ route('product', ['id' => 3]) }}";
        window.productUrl12 = "{{ route('product', ['id' => 12]) }}";
        window.loginUrl = "{{ route('login') }}";
        @if ($flag)
            window.flag = true; // utente loggato
        @else
            window.flag = false; // utente non loggato

        @endif




</script>
</head>

<body>
    <input type="checkbox" id="menu-toggle">
    <label class="hamburger" for="menu-toggle">
        <span></span>
        <span></span>
        <span></span>

    </label>

    <div class="menu-container">
        <nav>
            <ul class="menu">
                <li><a href="#"><span>Dove Comprare</span></a></li>
                <li><a href="#"><span>Per Affari</span></a></li>
                <li><a href="#"><img src="{{ asset('immagini/forum.png') }}" alt="forum"><span>Forum</span></a></li>

@if($flag)
    <li><a href="#"><img src="{{ asset('immagini/account.png') }}" alt="utente">
    <span> {{$username}}</span>
</a>
</li>

<li><a href="{{ route('logout') }}">
    <img src="{{ asset('immagini/logout.png') }}" alt="logout">
    <span>Esci</span>
</a></li>


@else
        <li>
        <a href="{{ route("login") }}"><img src="{{ asset('immagini/accedi.png') }}" alt="login">
    <span>Accedi</span>

    </a>
        </li>
@endif


            </ul>
        </nav>
        <nav>
            <ul class="second-menu">
                <li class="has-submenu">
                    <a href="{{ route('products',["categoria"=>"all"]) }}">
                        <i id="i2">Nuovi</i>
                        <span>Prodotti</span>
                        <button class="toggle-btn">+</button>
                    </a>


                    <div class="submenu">
                        <div class="submenu-item">
                             <a href="{{ route("product",["id" =>3]) }}">
                            <img src="{{ asset('immagini/icone/prima_icona.png') }}" alt=" Dreame X50 Ultra Complete">
                            <span>X50 Ultra Complete</span>
                            </a>
                        </div>

                        <div class="submenu-item">
                             <a href="{{ route("product",["id" =>15]) }}">
                            <img src="{{ asset('immagini/icone/seconda_icona.png') }}" alt="Dreame A2">
                            <span>Robot Tagliaerba A2</span>
                            </a>
                        </div>

                        <div class="submenu-item">
                            <a href="{{ route("product",["id" =>12 ]) }}">
                            <img src="{{ asset('immagini/icone/terza_icona.png') }}" alt="Dreame H15 Pro">
                            <span>H15 Pro</span>
                            </a>
                        </div>

                        <div class="submenu-item">
                            <a href="{{ route("product",["id" =>16]) }}">
                            <img src="{{ asset('immagini/icone/quarta_icona.png') }}" alt="Dreame Z1 Pro">
                            <span>Z1 Pro</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li><a href="#"><span>Contattaci</span></a></li>
                <li class="search-container">
                    <form name="ricerca-form" class="search-form" action="{{ route('searchProduct') }}" method="GET">
                        <input type="text" name="search" id="ricerca" placeholder="Cerca...">
                    </form>

                </li>

                <li>
                    <a href="{{ route('cart.show') }}" class="cart-link">
                        <img src="{{ asset('immagini/carrello.png') }}" alt="carrello"><span>Carrello</span></a>
                    </li>
            </ul>
        </nav>

        <img src="{{ asset('immagini/logo.png') }}" alt="logo">
    </div>

    <header>

        <div>
            <span>Novità</span>
            <h1>Dreame H15 Pro</h1>
            <h3>Lava con il calore, pulisci con l'IA</h3>
            <a href="{{ route("product",["id" =>12]) }}"><button>Compra Ora</button></a>
        </div>
    </header>


    <section class="first-section">
        <div>
            <h1>Dreame Robot tagliaerba A2</h1>
            <h3>Il taglio intelligente al massimo delle prestazioni</h3>
            <br>
            <span>2499€</span>
            <span id="price-div">2799€</span>
            <h4>Offerta Limitata: &nbsp;8-30 Giugno</h4>
            <a href="{{ route("product",["id"=>15]) }}"><button class="button-outline">Scopri di più</button></a>
        </div>
    </section>

    <section class="content-wrapper">
        <div>
            <h1>Dreame H14 Pro</h1>
            <h2>Una pulizia completa, senza macchie e senza residui</h2>
            <br>
            <a href="{{ route("product",["id" => 11]) }}"><button>Di Più</button></a>
        </div>
    </section>

<section class="section-card">
    <div class="card-container">
        <div class="colonna-sinistra">
        <div class="card">

            <img src="{{ asset('immagini/card/Dreame_X50_Ultra_Complete_PC_1080x_2.png') }}" alt="Dreame X50 Ultra Complete">
            <h2>Robot Aspirapolvere</h2>
            <a href="{{ route('products', ['categoria' => 'robot_aspirapolvere']) }}">
            <button>Per saperne di più</button>
    </a>
        </div>

        <div class="card">
            <img src="{{ asset('immagini/card/aspirapolvere_senza_fili (1).png') }}" alt="Aspirapolvere senza fili">
            <h2>Aspirapolvere senza fili</h2>
            <a href="{{ route('products', ['categoria' => 'aspirapolvere_senza_fili']) }}">
            <button>Per saperne di più</button>
    </a>
        </div>


        <div class="card">
            <img src="{{ asset('immagini/card/robot_tagliaerba.png') }}" alt="Robot Tagliaerba">
            <h2>Robot Tagliaerba</h2>
            <a href="{{ route('products', ['categoria' => 'robot_tagliaerba']) }}">
            <button>Per saperne di più</button>
    </a>
         </div>

</div>
         <div class="colonna-destra">
            <div class="card">
                <img src="{{ asset('immagini/card/aspiraliquidi_e_aspirapolvere.png') }}" alt="Aspiraliquidi e Aspirapolvere">
                <h2>Aspiraliquidi e Aspirapolvere</h2>
                <a href="{{ route('products', ['categoria' => 'aspiraliquidi_aspirapolvere']) }}">
                    <button>Per saperne di più</button>
                </a>
            </div>

            <div class="card">
            <img src="{{ asset('immagini/card/asciugacapelli.png') }}" alt="Asciugacapelli">
            <h2>Asciugacapelli</h2>

            <a href="{{ route('products', ['categoria' => 'asciugacapelli']) }}">
                    <button>Per saperne di più</button>
                </a>
            </div>

            <div class="card">
            <img src="{{ asset('immagini/card/Z1_Pro.png') }}" alt="Robot Piscina">
            <h2>Robot Piscina</h2>
            <a href="{{ route('products', ['categoria' => 'robot_piscina']) }}">
                    <button>Per saperne di più</button>
                </a>

         </div>


    </div>


</div>


<div class="container-logo">

<div>
    <img src="{{ asset('immagini/loghi/primo_logo.png') }}" alt="Logo 1">

</div>

<div>
<img src="{{ asset('immagini/loghi/secondo_logo.png') }}" alt="Logo 2">

</div>

<div>

<img src="{{ asset('immagini/loghi/terzo_logo.png') }}" alt="Logo 3">

</div>

<div>

<img src="{{ asset('immagini/loghi/quarto_logo.png') }}" alt="Logo 4">
</div>

<div>

    <img src="{{ asset('immagini/loghi/quinto_logo.png') }}" alt="Logo 5">
</div>

</div>


<div class="testimonial-container">
    <button id="testimonial-button">Leggi di più</button>
    <h2>Cosa dicono i nostri utenti</h2>
    <div class="testimonial-wrapper">

    </div>


</div>


</section>

    <footer>
        <div class="footer-container">
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Assistenza</h4>
                    <ul>
                        <li><a href="#">Centro assistenza</a></li>
                        <li><a href="#">Garanzia</a></li>
                        <li><a href="#">Manuali</a></li>
                         <li><a href="#">Contattaci</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Informazioni</h4>
                    <ul>
                        <li><a href="#">Chi siamo</a></li>
                        <li><a href="#">Termini e condizioni</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Spedizioni</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Seguici</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/dreametechnology"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://x.com/DreameGlobal"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com/dreame_tech/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@DreameTech"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="newsletter-container">
                <h4>Iscriviti alla Newsletter</h4>
                <p>Ricevi offerte esclusive e aggiornamenti</p>
                <form>
                    <input id="footer-input" type="email" placeholder="Inserisci la tua email">
                    <button type="submit">Iscriviti</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-links-bottom">
                <a href="#">Ordine e Spedizione</a>
                <a href="#">Politica di Rimborso</a>
                <a href="#">Politica di Restituzione e Garanzia</a>
                <a href="#">Dichiarazione di conformità</a>
                <a href="#">Politica sulla Riservatezza</a>
                <a href="#">Condizioni di utilizzo</a>
                <a href="#">Condizioni generali di vendita</a>
                <a href="#">Informazioni Legali</a>
            </div>
        </div>
    </footer>

</body>
</html>
</html>
</html>
