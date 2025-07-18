<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titolo_categoria }}: {{ $search }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/searchProduct.css') }}">

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
                <li><a href="#"><img src="{{ asset('immagini/forum.png') }}" alt="forum"><span>Forum</span></a></li>

                @if($flag)
                    <li><a href="#"><img src="{{ asset('immagini/account.png') }}" alt="utente">
                        <span>{{ $username }}</span></a></li>
                    <li><a href="{{ route('logout') }}">
                        <img src="{{ asset('immagini/logout.png') }}" alt="logout">
                        <span>Esci</span></a></li>
                @else
                    <li><a href="{{ route('login') }}"><img src="{{ asset('immagini/accedi.png') }}" alt="login">
                        <span>Accedi</span></a></li>
                @endif
            </ul>
        </nav>

        <nav>
            <ul class="second-menu">
                <li><a href="{{ route('index') }}">
                    <img src="{{ asset('immagini/home.png') }}" alt="home">
                    <span>Home</span></a></li>
                <li><a href="{{ route('products', ['categoria' => 'all']) }}">
                    <span>Prodotti</span></a></li>
                <li><a href="#"><span>Contattaci</span></a></li>
                <li class="search-container">
                    <form name="ricerca-form" class="search-form" action="{{ route('searchProduct') }}" method="GET">
                        <input type="text" name="search" id="ricerca" placeholder="Cerca...">
                    </form>
                </li>
            </ul>
        </nav>

        <img src="{{ asset('immagini/logo.png') }}" alt="logo">
    </div>

    <main class="search-main">
        <div class="search-container-main">
            <h1 class="search-title">{{ $titolo_categoria }}</h1>
            @if(isset($search) && !empty($search))
                <p class="search-subtitle">Risultati per: "<strong>{{ $search }}</strong>"</p>
            @endif

            @if($products && count($products) > 0)
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-image">
                                @php
                                    $img = \App\Models\ProductImage::where('productId', $product->id)
                                        ->where("orderVisualisation", 1)
                                        ->value("nameImage");

                                    if ($img) {
                                        $imgPath = asset('immagini/prodotti/immagini_Prodotti/' . $product->id . '/' . $img);
                                    } else {
                                        $imgPath = null;
                                    }
                                @endphp
                                @if($imgPath)
                                    <img src="{{ $imgPath }}" alt="{{ $product->name }}">
                                @else
                                    <div class="no-image">Immagine non disponibile</div>
                                @endif
                            </div>
                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>
                                <p class="price">€ {{ number_format($product->price, 2, ',', '.') }}</p>
                                <a href="{{ route('product', ['id' => $product->id]) }}" class="details-btn">
                                    Vedi i dettagli
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-results">
                    @if(isset($search) && !empty($search))
                        <p>Nessun prodotto trovato per "{{ $search }}".</p>
                        <p>Prova con un termine di ricerca diverso.</p>
                    @else
                        <p>Inserisci un termine di ricerca.</p>
                    @endif
                </div>
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
        </div>
    </footer>
</body>
</html>
