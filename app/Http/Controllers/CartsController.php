<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Provider;
use App\Models\Recipe;
use App\Models\State_brazil;
use App\User;

class CartsController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $cart = Cart::where([
            'user_id' => Auth::user()->id,
            'concluded' => false
        ])->get();

        return view('cart.index',[
            'cart' => $cart
        ]);
    }

    public function store($recipe_id){
        $user_id = Auth::user()->id;

        Cart::create([
            'user_id' => $user_id,
            'recipe_id' => $recipe_id
        ]);

        return redirect()->route('user.recipe.show',['id' => $recipe_id]);
    }

    public function updateQuantity(Request $request ,$id){
        $item = Cart::find($id);
        $quantity = $request->input('quantity');

        if($quantity == 0){
            $item->deleted_at = NOW();
        }

        $item->quantity = $quantity;
        $item->save();
        return redirect()->route('cart.index');
    }

    public function destroyRecipe($recipe_id){

        Cart::where([
            ['user_id',Auth::user()->id],
            ['recipe_id' , $recipe_id]
        ])->update([
            'deleted_at' => NOW()
        ]);

        return redirect()->route('user.recipe.show',['id' => $recipe_id]);
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->deleted_at = NOW();
        $cart->save();
        return redirect()->route('cart.index');
    }

    public function calculateShipping($zip_code){
        $zipCodeSource = "04705000";
        $zipCodeDestiny = $zip_code;

        $weight          = 1;
        $value         = 0;
        $typeShipping = '40010'; //Sedex: 40010   |  Pac: 41106
        $height        = 5;
        $width       = 15;
        $length   = 16;


        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&sCepOrigem=" . $zipCodeSource;
        $url .= "&sCepDestino=" . $zipCodeDestiny;
        $url .= "&nVlPeso=" . $weight;
        $url .= "&nVlLargura=" . $width;
        $url .= "&nVlAltura=" . $height;
        $url .= "&nCdFormato=1";
        $url .= "&nVlComprimento=" . $length;
        $url .= "&sCdMaoProria=n";
        $url .= "&nVlValorDeclarado=" . $value;
        $url .= "&sCdAvisoRecebimento=n";
        $url .= "&nCdServico=" . $typeShipping;
        $url .= "&nVlDiametro=0";
        $url .= "&StrRetorno=xml";


        $xml = simplexml_load_file($url);

        $shipping =  $xml->cServico;

        return json_encode($shipping);
    }

    public function confirmation(){
        $cart = Cart::where([
            'user_id' => Auth::user()->id,
            'concluded' => false
        ])->get();

        $addresses = Auth::user()->address()->get();

        $address = Auth::user()->address()->first();

        if(Auth::user()->address_delivery != null){
            $address = Address::find(Auth::user()->address_delivery);
        }

        $state = false;
        if ($address) {
            $state = State_brazil::where('id',$address->state_id)->first();
        }

        return view('cart.confirmation.index',[
            'cart' => $cart,
            'address' => $address,
            'state' => $state,
            'addresses' => $addresses
        ]);
    }

    public function alterAddress(Request $request){
        $data = $request->input('address_delivery');
        $user = User::find(Auth::user()->id);
        $user->address_delivery = $data;
        $user->save();
        return redirect()->route('cart.confirmation');
    }
}
