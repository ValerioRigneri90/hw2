<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       @if(isset($nameProduct))
           {{ $nameProduct }}
       @else
           Prodotto non disponibile
       @endif
    </title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("css/prodotto.css") }}">
    <script src="{{ asset("js/prodotto.js") }}" defer></script>

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
                   <a href="{{ route("products",["categoria" =>"all"]) }}">
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

    <!-- Contenuto principale -->
    <main class="main">
        <div class="container">
            <div class="product-section">
                <!-- Sezione immagini -->
                <div class="product-images">
                    <!-- Immagine principale del prodotto -->

                    <div class="main-image">
                        @if(!empty($immagini)&& $immagini[0] !=="Immagine non disponibile" )
                        <img src="{{ asset($immagini[0]) }}" alt="{{ $nameProduct }}">

                        @else
                        <div class="no-image">Immagine non disponibile</div>
                        @endif

                    </div>

                    <!-- Miniature -->
                @if(count($immagini) > 1)
    <div class="thumbnail-gallery">
        @foreach($immagini as $i => $img)
            <div class="thumbnail{{ $i == 0 ? ' active' : '' }}">
                <img src="{{ asset($img) }}" alt="Miniatura">
            </div>
        @endforeach
    </div>
@endif

</div>
                <!-- Informazioni prodotto -->
                <div class="product-info">
                    <!-- Nome prodotto -->
                    <h1 class="product-title">{{ $nameProduct }}</h1>

                    <!-- Prezzo -->
                    <div class="product-price">
                        <span class="price">€ {{  number_format($priceProduct,2, ',', '.') }}</span>
                    </div>

                    <!-- Caratteristiche -->
                    <div class ="product-description">
                        <h3>Caratteristiche principale </h3>

                        <ul class="features-list">
                            @foreach($descriptionProduct as $feature)
                            @if(!empty(trim($feature)))
                            <li>{{ $feature }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>


                    <!-- Sezione acquisto -->
                    <div class="purchase-section">
                        <!-- Quantità -->
                        <div class="quantity-selector">
                            <label for="quantity">Quantità:</label>
                            <select id="quantity" name="quantity">
                                @for($i=1;$i<=5;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button class="add-to-cart-btn" data-product-id="{{ $idProduct }}">Aggiungi al carrello</button>
                    </div>



                    <!-- Info spedizione -->
                    <div class="shipping-info">
                        <div class="shipping-item">
                            <span class="icon">📦</span>
                            <span>Spedizione gratuita in 2-3 giorni lavorativi</span>
                        </div>
                        <div class="shipping-item">
                            <span class="icon">🔄</span>
                            <span>Reso gratuito entro 30 giorni</span>
                        </div>
                    </div>
                </div>
        </div>
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
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
          <div class="newsletter-container">
                <h4>Iscriviti alla Newsletter</h4>
                <p>Ricevi offerte esclusive e aggiornamenti</p>
                <form>
                    <input id="footer-input" type="email" placeholder="Inserisci la tua email">
                    <button id="footer-button" type="submit">Iscriviti</button>
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
        </body>
</html>
