<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    public function register_form()
    {

        /*
        se l'utente è già loggato, reindirizza alla home
        */

        if(Session::get("user_id")) {
            return redirect()->route("index");// Se l'utente è già loggato, reindirizza alla home
        }

        $error= Session::get('error'); // Recupera eventuali errori dalla sessione
        Session::forget('error'); /*
        alla prossima richiesta potrebbe esserci un altro tipo di errore ,altrimenti
        l'utente visualizza sempre lo stesso errore quando l'utente torna alla registrazione cioè alla view */
        return view('register')->with("error",$error); // Mostra la pagina di registrazione
    }




public function do_register()
{

   /*
        se l'utente è già loggato, reindirizza alla home
        */

        if(Session::get("user_id"))
        {
            return redirect()->route("index"); // Se l'utente è già loggato, reindirizza alla home
        }

    /*controlla se i campi email,username,password e confermaPassword sono vuoti */

    if(strlen(request("email"))==0 || strlen(request("username")) ==0 || strlen(request("password"))==0  || strlen(request("confirm_password"))==0 )
    {
            Session::put('error', 'empty_fields');
            return redirect()->route("register") -> withInput(); // Reindirizza alla pagina di registrazione con gli input precedenti


    }



       /* cerca nella colonna username della tabella users se esiste già un utente con lo stesso username,se
    la trova exists restituisce true altrimenti false */

    else if(User::where("username",request("username"))->exists())
    {
        Session::put('error', 'username_already_exists');
         return redirect()->route("register") -> withInput();
    }



    /* controlla se l'username è troppo corto */

    else if(strlen(request("username"))<3)
    {
        Session::put('error', 'username_too_short'); // Username troppo corto
        return redirect()->route("register") -> withInput();
    }



/* controlla se l'username contiene caratteri speciali escluso l'uderscore */

    else if(preg_match('/[^\w]/',request("username")))
    {
        Session::put('error', 'invalid_username');
        return redirect()->route("register") -> withInput();
    }




 /* controlla se l'email rispetta un formato valido */
    else if(!filter_var(request("email"), FILTER_VALIDATE_EMAIL)) /* ritorna false se l'email non rispetta un formato valido */
  {
     Session::put('error', 'invalid_email'); // Email non valida
     return redirect()->route("register") -> withInput();
  }



    /* cerca nella colonna email della tabella users se esiste già un utente con la stessa email,se
    la trova exists restituisce true altrimenti false */

    else if(User::where("email",request("email"))->exists())
    {
        Session::put('error', 'email_already_exists');
        return redirect()->route("register") -> withInput();
    }



    /* controlla se la lunghezza della password è <8 */
    else if(strlen(request("password"))<8)
    {
        Session::put('error', 'password_too_short'); // Password troppo corta
         return redirect()->route("register") -> withInput();
    }


    /* controlla se la password contiene almeno un carattere maiuscolo*/


    else if(!preg_match('/[A-Z]/',request("password")))
  {
    Session::put('error', 'password_missing_uppercase'); // Password DEVE contenere almeno una lettera maiuscola
    return redirect()->route("register") -> withInput();

  }

  /* controlla se la password contiene almeno un carattere minuscolo */

  else if(!preg_match('/[a-z]/',request("password")))
  {
    Session::put('error', 'password_missing_lowercase'); // Password DEVE contenere almeno una lettera minuscola
     return redirect()->route("register") -> withInput();

  }



/* controlla se la password contiene almeno un numero */

  else if(!preg_match('/[0-9]/',request("password")))
  {
     Session::put('error', 'password_missing_number'); // Password DEVE contenere almeno un numero
     return redirect()->route("register") -> withInput();

  }


/* controlla se la password contiene almeno un carattere speciale */

  else if(!preg_match('/[\W_]/', request("password")))
  {
    Session::put('error', 'password_missing_special_char'); // Password DEVE contenere almeno un carattere speciale
     return redirect()->route("register") -> withInput();
  }



  /* controlla se la password e la conferma password sono uguali */
     else if(request("password") != request("confirm_password"))
    {
         Session::put('error', 'password_mismatch');
         return redirect()->route("register") -> withInput();
    }



    // se tutti i controlli sono passati, crea un nuovo utente


    $user = new User();
    $user->email = request("email");
    $user->username = request("username");
    $user->password = password_hash(request("password"),PASSWORD_BCRYPT); // Cripta la password
    $user->save(); // Salva l'utente nel database

    Mail::raw("Ciao " . $user->username . "! \nGrazie per esserti registrato! \nBenvenuto nella nostra community e buono shopping!", function ($message) use ($user) {
        $message->to($user->email)->subject("🎉 Benvenuto nel mondo Dreame!");
    });


    //login

    Session::put("user_id",$user->id); // Salva l'id dell'utente nella sessione

    return redirect()->route("index"); // Reindirizza alla home page dopo la registrazione

}




}
