<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{




    public function login_form()
    {

        /*
        se l'utente è già loggato, reindirizza alla home
        controlliamo se nella sessione c'è un user_id
        */

        $flag = false;
        if(Session::get("user_id"))
    {
            $flag=true;
            return redirect()->route("index"); // Se l'utente è già loggato, reindirizza alla home
        }



        $error= Session::get('error'); // Recupera eventuali errori dalla sessione
        Session::forget('error'); /*
        alla prossima richiesta potrebbe esserci un altro tipo di errore ,altrimenti
        l'utente visualizza sempre lo stesso errore quando l'utente torna al login cioè alla view */
        return view('login')->with("error",$error)->with("flag",$flag); // Mostra la pagina di login
    }



public function do_login()
{

   /*
        se l'utente è già loggato, reindirizza alla home
        */

        if(Session::get("user_id"))

        {
            return redirect()->route("index"); // Se l'utente è già loggato, reindirizza alla home
        }

    /*controlla se i campi email e password sono vuoti */

    if(strlen(request("email"))==0 || strlen(request("password"))==0)
    {
            Session::put('error', 'empty_fields');
            return redirect()->route("login") -> withInput(); // Reindirizza alla pagina di login mantendo i

    }

    $user = User::where('email', request("email"))->first(); // Recupera l'utente con l'email specificata

    // verifichiamo se l'utente esiste e se la password è corretta
    if(!$user || !password_verify(request("password"), $user->password))
    {
        Session::put('error', 'invalid_credentials');
        return redirect()->route("login")->withInput();
    }

    //se le credenziali sono corrette, salviamo l'utente nella sessione

    Session::put("user_id",$user->id);

    return redirect()->route("index");// Reindirizza alla home page dopo il login

}

public function logout()
{
    //distrugge la sessione corrente
    Session::flush(); //
    return redirect()->route("index"); // Reindirizza alla home page dopo il logout



}

}
