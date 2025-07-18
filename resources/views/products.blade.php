
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreame</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,98.4,300..800;1,98.4,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/prodotti.css") }}">
    <script src="{{ asset("js/prodotti.js") }}" defer></script>

     <script>

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
                <li><a href="#"><img src="{{ asset("immagini/forum.png") }}" alt="forum"><span>Forum</span></a></li>




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
                 <li><a href="{{ route("index") }}"> <img src="{{ asset("immagini/home.png") }}" alt="home">
                    <span>Home</span></a>
                </li>
                <li class="has-submenu">

                      <a href="{{ route("products",["categoria"=>"all"]) }}">
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

        <img src="{{ asset("immagini/logo.png") }}" alt="logo">
    </div>


<main class="contenuto-principale">
    <h1 class="titolo-categoria">{{ $titolo_categoria }}</h1>

    <div class="griglia-prodotti">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="card-prodotto">
                    <img src="{{ asset("immagini/prodotti/prodottiCategoria/" . $product->category . '/' . $product->image) }}"
                         alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p class="prezzo">€{{ number_format($product->price, 2, ',', '.') }}</p>
                     <a href="{{ route('product', $product->id) }}" class="btn-dettagli">Vedi Dettagli</a>
                </div>
            @endforeach
        @else
            <p class="nessun-prodotto">Nessun prodotto trovato in questa categoria.</p>
        @endif
    </div>
</main>

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
