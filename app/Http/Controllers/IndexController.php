<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class IndexController extends Controller
{

public function showIndex()
{
    $flag=false;
    $username = null; // Inizializza username a null
    //permettiamo anche agli utenti non loggati di vedere la pagina index

    $user_id = Session::get(key: "user_id"); //recuperiamo l'ID dell'utente dalla sessione

if($user_id)
{
        $user=User::find($user_id); //ritorna l'oggetto(record) di quell'utente con l'id specificato
    if($user)
    {
        $username = $user->username;
        $flag = true;// in modo da visualizzare il nome utente nella navbar
    }

}

return view("index")->with("username",$username)->with("flag",$flag); //passiamo alla view index i dati recuperati


}

public function showTestimonials()
{

    $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://randomuser.me/api/?results=5");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);




    $result=curl_exec($curl); // Esegue la richiesta cURL e memorizza il risultato
    $err=curl_error($curl);

    curl_close($curl);

    if($err)
    {
            /* Se c'è un errore nella richiesta, restituisce un messaggio di errore,creiamo una risposta
            HTTP in formato JSON */
        return response() ->json(["error" =>" Errore nella richiesta:" .$err],500);

    }


    $data=json_decode($result, true); // Decodifica la risposta JSON in un array associativo

    if(!isset($data["results"])|| empty($data["results"]))

    {
        return response()->json(["error" =>"Dati non validi"],500);
    }


    return response()->json($data); // Restituisce i dati come risposta JSON






}

}
