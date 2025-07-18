<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class ValidationController extends Controller
{

public function checkEmail(Request $request)
{
    $email = $request->input('email');

    // Controlla nel database se l'email esiste

    if(User::where("email",$email)->exists())
    {
        return response()->json(["flag" =>true,"message" => "Email già esistente"]);
    }
else
{
    return response()->json(["flag" => false,"message" =>""]);
}

}


public function checkUsername(Request $request)
{
    $username= $request->input("username");

    // Controlla nel database se l'username esiste
    if(User::where("username",$username)->exists())
    {
        return response()->json(["flag" =>true,"message" => "Username già esistente"]);
    }
    else
    {
        return response()->json(["flag" => false,"message" => ""]);
    }
}



}
