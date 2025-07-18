<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\DescriptionProduct;
use App\Models\ProductImage;
class ProductController extends Controller
{
public function showProducst($categoria=null)
    {

    $flag=false;
    $username = null; // Inizializza username a null
    //permettiamo anche agli utenti non loggati di vedere la pagina index

    $user_id = Session::get("user_id"); //recuperiamo l'ID dell'utente dalla sessione

if($user_id)
{
    $user=User::find($user_id); //ritorna l'oggetto(record) di quell'utente con l'id specificato
    if($user)
    {
        $username = $user->username;
        $flag = true;
    }




}

if($categoria!="all" && $categoria!=null)

{
   $categorie_valide = ["robot_aspirapolvere", "aspirapolvere_senza_fili", "robot_tagliaerba",
                       "aspiraliquidi_aspirapolvere", "asciugacapelli", "robot_piscina"];



if(in_array($categoria,$categorie_valide))
{
    $products=Product::where("category",$categoria)->get(); //recupera i prodotti della categoria specificata

        $nomi_categorie = [
            "robot_aspirapolvere" => "Robot Aspirapolvere",
            "aspirapolvere_senza_fili" => "Aspirapolvere Senza Fili",
            "robot_tagliaerba" => "Robot Tagliaerba",
            "aspiraliquidi_aspirapolvere" => "Aspiraliquidi Aspirapolvere",
            "asciugacapelli" => "Asciugacapelli",
            "robot_piscina" => "Robot Piscina"
        ];
        $titolo_categoria = $nomi_categorie[$categoria];
}

else
{
    return redirect()->route('index'); //reindirizza alla pagina index se la categoria non è valida
}


}
else
{
    //visualizza tutti i prodotti se non è specificata una categoria

    $products=Product::orderBy('category', 'asc')
                      ->orderBy('name', 'asc')
                      ->get(); // Recupera tutti i prodotti ordinati per categoria e nome
    $titolo_categoria = "I nostri Prodotti";
    //$categoria = null; // Imposta la categoria a null se non è specificata


}

return view("products")->with("products",$products)
                        ->with("titolo_categoria",$titolo_categoria)
                        ->with("categoria",$categoria)
                        ->with("username",$username)
                        ->with("flag",$flag);

    }




    public function showProductDetails($id)
    {

    $percorso="immagini/prodotti/immagini_Prodotti/";
    $flag=false;
    $username = null; // Inizializza username a null
    //permettiamo anche agli utenti non loggati di vedere la pagina index
    $productId = null; // Inizializza productId a null

    $user_id = Session::get("user_id"); //recuperiamo l'ID dell'utente dalla sessione

if($user_id)
{
    $user=User::find($user_id); //ritorna l'oggetto(record) di quell'utente con l'id specificato
    if($user)
    {
        $username = $user->username;
        $flag = true;
    }
}

    $productId=$id; // Recupera l'ID del prodotto dalla route

    if($productId!=null && !empty($productId) && $productId!=0)
    {

        $result=Product::where("id",$productId)->get(["name","price"]);

        $product=$result->first(); // Recupera il primo prodotto corrispondente all'ID

        if($product)
        {
            $nameProduct=$product->name;
            $priceProduct=$product->price;
        }



        $result2=DescriptionProduct::where("productId",$productId)->get(["content"]);
        $temp=$result2->first(); // Recupera la prima descrizione del prodotto

        if($temp) //se la descrizione esiste
        {
            $descriptionProduct = $temp->content;
            $descriptionProduct=$descrizione=preg_split('/(?<=[.?!])\s+/', $descriptionProduct);// Divido la descrizione in un array di frasi, utilizzando il punto come delimitatore
            $descriptionProduct=array_map("trim", $descriptionProduct); // Rimuovo gli spazi vuoti all'inizio e alla fine di ogni frase
        }

        else
        {
            $descriptionProduct="Descrizione non disponibile";
        }

        $result3=ProductImage::where("productId",$productId)->orderBy("orderVisualisation","asc")->get(["nameImage"]);



        if($result3->count()>0)
        {
            $immagini=[];


            foreach($result3 as $img)
            {
                 $percorsoCompleto = $percorso . $productId . "/" . $img->nameImage;
                $immagini[] = $percorsoCompleto;

            }

        }
        else
        {
            $immagini=["Immagine non disponibile"];
        }
    }

        return view("detailsProduct")->with("nameProduct",$nameProduct)
        ->with("username",$username)->with("flag",$flag)->
        with("descriptionProduct",$descriptionProduct)->with("immagini",$immagini)
       ->with("priceProduct",$priceProduct)->with("idProduct",$productId);


    }

    public function searchProduct(Request $request)
    {
        $search = $request->input('search');
        $products = [];
        $titolo_categoria = "Risultati ricerca";
        $flag = false;
        $username = null;

        $user_id = Session::get("user_id");
        if ($user_id) {
            $user = User::find($user_id);
            if ($user) {
                $username = $user->username;
                $flag = true;
            }
        }

        if (!empty($search)) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        }

        return view('searchProduct')
            ->with('products', $products)
            ->with('titolo_categoria', $titolo_categoria)
            ->with('username', $username)
            ->with('flag', $flag)
            ->with('search', $search);
    }

}
