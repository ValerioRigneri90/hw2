<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset("css/login.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="{{ asset("js/login.js") }}" defer></script>


     <script>

       window.flag = false; // utente non loggato


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
                <li><a href="{{ route("login") }}"><img src="{{ asset('immagini/accedi.png') }}" alt="accedi"><span>Accedi</span></a></li>
            </ul>
        </nav>
        <nav>
            <ul class="second-menu">
                     <li><a href="{{ route("index") }}"> <img src="{{ asset('immagini/home.png') }}" alt="home">
                    <span>Home</span></a>
                </li>
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


            <img src="{{ asset('immagini/logo.png') }}" alt="Logo Dreame">

    </div>


    <div class="login-container">
        <div class="login-form-wrapper">
            <h1>Accedi</h1>
            <p class="login-subtitle">Accedi al tuo account Dreame</p>


            @if($error=="empty_fields")
                <div class="error-message">
                    <p>Per favore, compila tutti i campi.</p>
                </div>

            @elseif($error=="invalid_credentials")
                <div class="error-message">
                    <p>Email o password errati.</p>
                </div>


@endif



            <form name="form-login" action="{{ route('do_login') }}" method="POST" class="login-form">
                @csrf

                <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" value="{{ old("email") }}" >
                </div>

                <div class="input-group">
                    <label >Password</label>
                    <input type="password" name="password" id="password" >
                </div>

                <div class="form-options">
                    <a href="#" onclick="openResetModal()" class="forgot-password">Password dimenticata?</a>
                </div>

                <input type="submit" value="Accedi" class="login-btn ">
            </form>

            <div class="signup-link">
                <p>Non hai un account? <a href="{{ route("register") }}">Registrati</a></p>
            </div>
        </div>
    </div>

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

    <!-- MODAL SEMPLICE PER RESET PASSWORD -->
    <div id="resetModal" class="reset-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Reset Password</h3>
                <span class="close-btn" onclick="closeResetModal()">&times;</span>
            </div>

            <div id="resetMessage" class="reset-message"></div>

            <!-- STEP 1: Inserisci Email -->
            <div id="step1" class="modal-step">
                <p class="step-title">Inserisci la tua email:</p>
                <input type="email" id="resetEmail" placeholder="La tua email" class="modal-input">
                <button onclick="sendCode()" class="btn btn-primary">Invia Codice</button>
            </div>

            <!-- STEP 2: Inserisci Codice e Nuova Password -->
            <div id="step2" class="modal-step" style="display:none;">
                <p class="step-title">Inserisci il codice e la nuova password:</p>
                <input type="text" id="resetCode" placeholder="Codice (6 cifre)" class="modal-input">
                <input type="password" id="newPassword" placeholder="Nuova Password" class="modal-input">
                <button onclick="resetPassword()" class="btn btn-success">Cambia Password</button>
            </div>

            <div class="modal-footer">
                <button onclick="closeResetModal()" class="btn btn-secondary">Chiudi</button>
            </div>
        </div>
    </div>

</body>
</html>

