<?php

namespace App\Http\Controllers;

use App\Models\FavoriteDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function home()
    {
        $drinks = Http::get('www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail')->json();
        $drinks = array_slice($drinks['drinks'], 0,10);

        return view('home',['cocktails' => $drinks]);
    }

    public function drink($id)
    {
        $result = Http::get("www.thecocktaildb.com/api/json/v1/1/lookup.php?i={$id}")->json();
        $drink = $result['drinks'][0];

            foreach($drink as $key=>$val) {
                if(substr($key, 0, 13) === 'strIngredient'){
                  if(!empty($val)) {
                    $val = str_replace(' ','%20',$val);
                    $getIngredients = Http::get("www.thecocktaildb.com/api/json/v1/1/search.php?i={$val}")->json();
                    $getIngredients['ingredients'][0]['ingredientThumb'] = "https://www.thecocktaildb.com/images/ingredients/{$val}-Medium.png";
                    $ingredients[] = $getIngredients['ingredients'][0];
                    }
                }
            }
        return view('drink', ['drink' => $drink, 'ingredients' => $ingredients]);
    }

    public function results()
    {
        $validator = Validator::make(request()->all(), [
            'drink_name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return Redirect::route('site.search')->withErrors($validator);
        }

        $data = $validator->validated();
        $result = Http::get("www.thecocktaildb.com/api/json/v1/1/search.php?s={$data['drink_name']}")->json();
        return view('result', ['drinks' => $result['drinks']]);
    }

    public function search()
    {
        return view('search');
    }

    public function favorites()
    {
       $favorites = FavoriteDrink::all();
       return view('favorites-list', ['favorites' => $favorites]);
    }
}
