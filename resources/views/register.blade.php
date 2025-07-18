<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="{{ asset('css/registrazione.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="{{ asset("js/registrazione.js") }}" defer> </script>



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
                <li><a href="#"><img src="{{ asset('immagini/forum.png')}}" alt="forum"><span>Forum</span></a></li>
                <li><a href="{{ route("login") }}"><img src="{{ asset('immagini/accedi.png') }}" alt="accedi"><span>Accedi</span></a></li>
            </ul>
        </nav>
        <nav>
            <ul class="second-menu">
                <li><a href="{{ route("index") }}"> <img src="{{ asset('immagini/home.png')}}" alt="home">
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

        <img src="{{ asset('immagini/logo.png') }}" alt="logo">

    </div>






    <div class="register-container">
        <div class="register-form-wrapper">
            <h1>Registrati</h1>
            <p class="register-subtitle">Registrarti al tuo account Dreame</p>



            @if($error=="empty_fields")
                <div class="error-message">Per favore, compila tutti i campi obbligatori!</div>

                @elseif($error=="email_already_exists")
                <div class="error-message">Email già registrata!</div>

            @elseif($error=="username_already_exists")
                <div class="error-message">Username già in uso!</div>



            @elseif($error=="username_too_short")
                <div class="error-message">Username troppo corto, minimo 3 caratteri!</div>

            @elseif($error=="invalid_username")
                <div class="error-message">Username non valido, può contenere solo lettere, numeri e underscore!</div>


            @elseif($error=="invalid_email")
                <div class="error-message">Email non valida!</div>

            @elseif($error=="password_too_short")
                <div class="error-message">Password troppo corta, minimo 8 caratteri!</div>


            @elseif($error=="password_missing_uppercase")
                <div class="error-message">La password deve contenere almeno un carattere maiuscolo!</div>

            @elseif($error=="password_missing_lowercase")
                <div class="error-message">La password deve contenere almeno un carattere minuscolo!</div>

            @elseif($error=="password_missing_number")
                <div class="error-message">La password deve contenere almeno un numero!</div>

            @elseif($error=="password_missing_special_char")
                <div class="error-message">La password deve contenere almeno un carattere speciale!</div>

            @elseif($error=="password_mismatch")
                <div class="error-message">Le password non corrispondono!</div>



           @endif



            <form name="form-register" action="{{ route("register")}}" method="POST" class="register-form">
                @csrf
                 <div class="input-group">
                    <label>Username</label>  <!-- con old nel caso in cui fallisce il riempimento del
                        del form mantinee il valore inserito precedentemente dall'utente -->
                    <input type="text" name="username" id="username" value="{{ old("username") }}" required>
                    <span class="error-message"></span>
                </div>

            <div class="input-group">
                    <label>Email</label>
                   <input type="email" name="email" id="email" value="{{ old("email") }}" required>
                    <span class="error-message"></span>
                </div>

                <div class="input-group">
                    <label >Password</label>
                    <input type="password" name="password" id="password" required>
                    <span class="error-message"></span>
                </div>

               <div class="input-group">
                <label> Conferma Password</label>
                <input type="password" name="confirm_password" id="conferma_password" required >
                <span class="error-message"></span>
               </div>

                <input type="submit" value="Registrati" class="register-btn">
            </form>
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

</body>

</html>
