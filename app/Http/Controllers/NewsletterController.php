<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class NewsletterController extends Controller
{


    public function subscribe(Request $request)
    {
        $id = Session::get("user_id");
        $email = $request->input('email');

        // vuol dire che l'utente non è loggato oppure non esiste
        if (!$id || !User::where('id', $id)->exists()) {
            return response()->json([
                'flag' => false,
                'error' => 'non_loggato',
                'message' => 'Devi essere loggato per iscriverti alla newsletter.'
            ]);
        }

        if(Newsletter::where('userId', $id)->exists()) {
            return response()->json([
                'flag' => false,
                'error' => 'iscritto',
                'message' => 'Sei già iscritto alla newsletter.'
            ]);

        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'flag' => false,
                'error' => 'email_non_valida',
                'message' => 'Inserisci un\'email valida.'
            ]);
        }

        $newsletter = new Newsletter();
        $newsletter->userId = $id;
        $newsletter->email = $email;
        $newsletter->save();

        $idUtente = User::find($id);
        $nomeUtente = $idUtente->username;


Mail::raw("Ciao " . $nomeUtente . "! \nGrazie per esserti iscritto alla newsletter Dreame \nRiceverai le nostre migliori offerte sui nostri prodotti!", function ($message) use ($email) {
    $message->to($email)->subject("🎉 Benvenuto nella Newsletter Dreame!");
});

        return response()->json([
            'flag' => true,
            'success' => 'iscrizione_corretta',
            'message' => 'Iscrizione alla newsletter avvenuta con successo.'
        ]);

    }
}

