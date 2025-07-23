<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
{
    // Solo gli utenti loggati possono vedere il carrello
    public function showCart()
    {
        $flag = false;
        $username = null;

        $user_id = Session::get("user_id");
        if ($user_id) {
            $user = User::find($user_id);
            if ($user) {
                $username = $user->username;
                $flag = true;
            }
        } else {
            return redirect()->route("login");
        }

        $carrello_items = $this->getCarrelloItems();
        $totale = $this->getTotaleCarrello();

        return view("cart")->with("carrello_items", $carrello_items)
                          ->with("totale", $totale)
                          ->with("username", $username)
                          ->with("flag", $flag);
    }



    private function inizializzaCarrello()
    {
        if (!Session::has('carrello')) {
            Session::put('carrello', []);
        }
    }

    private function aggiungiAlCarrello($prodotto_id, $quantita = 1)
    {
        $this->inizializzaCarrello();

        $carrello = Session::get('carrello', []);

        if (isset($carrello[$prodotto_id])) {
            $carrello[$prodotto_id] += $quantita;
        } else {
            $carrello[$prodotto_id] = $quantita;
        }

        Session::put('carrello', $carrello);
        return true;
    }

    private function getCarrelloItems()
    {
        $this->inizializzaCarrello();
        $carrello = Session::get('carrello', []);
        $items = [];

        foreach ($carrello as $prodotto_id => $quantita) {
            $product = Product::find($prodotto_id);

            if ($product) {
                $item = $product->toArray();
                $item['quantita'] = $quantita;
                $item['carrello_id'] = $prodotto_id;
                $items[] = $item;
            }
        }

        return $items;
    }

    private function rimuoviDalCarrello($prodotto_id)
    {
        $this->inizializzaCarrello();
        $carrello = Session::get('carrello', []);
        unset($carrello[$prodotto_id]);
        Session::put('carrello', $carrello);
        return true;
    }

    private function aggiornaQuantitaCarrello($prodotto_id, $quantita)
    {
        $this->inizializzaCarrello();

        if ($quantita <= 0) {
            return $this->rimuoviDalCarrello($prodotto_id);
        }

        $carrello = Session::get('carrello', []);
        $carrello[$prodotto_id] = $quantita;
        Session::put('carrello', $carrello);
        return true;
    }

    private function getTotaleCarrello()
    {
        $items = $this->getCarrelloItems();
        $totale = 0;

        foreach ($items as $item) {
            $totale += $item['price'] * $item['quantita'];
        }

        return $totale;
    }

    public function handleCartAction(Request $request)
    {
        $azione = $request->input('azione');

        if ($azione === 'aggiungi') {
            if ($request->input('prodotto_id') && $request->input('quantita')) {
                $this->aggiungiAlCarrello($request->input('prodotto_id'), $request->input('quantita'));

                // Restituisce sempre JSON per l'alert
                return response()->json(['success' => true, 'message' => 'Prodotto aggiunto al carrello!']);
            }
        } elseif ($azione === 'rimuovi') {
            if ($request->input('carrello_id')) {
                $this->rimuoviDalCarrello($request->input('carrello_id'));
            }
        } elseif ($azione === 'aggiorna') {
            if ($request->input('carrello_id') && $request->input('quantita')) {
                $this->aggiornaQuantitaCarrello($request->input('carrello_id'), $request->input('quantita'));
            }
        }

        return redirect()->route('cart.show');
    }
}
