<?php

namespace App\Http\Controllers;

use App\Models\FavoriteDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class FavoriteDrinks extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(FavoriteDrink::all()->isEmpty()) {
            return [
                'success' => false,
                'message' => 'no drinks in favorites'
            ];
        }
        return FavoriteDrink::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'drink_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {

        $message = $validator->errors()->first();
        $errors=$validator->errors();
        $code='200';
        $response = array(
            'success' => false,
            'message' => $message,
            "errors" => $errors
        );
        return [$response, $code];
        }
        $data = $validator->validated();
        $result = Http::get("www.thecocktaildb.com/api/json/v1/1/lookup.php?i={$data['drink_id']}")->json();
        if(empty($result['drinks'])) {
            return [
                'success' => false,
                'message' => 'The id provided does not exist',
            ];
        }
        $FavoriteDrink = FavoriteDrink::firstOrCreate(['drink_id' => $data['drink_id']],['drink_id' => $data['drink_id']]);
        if(!$FavoriteDrink) {
            return [
                'success' => false,
                'message' => 'Error adding to favorites',
            ];
        }
        return [
            'success' => true,
            'message' => 'drink added to favorites',
            'drink_id' => $data['drink_id']
        ];
    }
    public function destroy(string $id)
    {
        $FavoriteDrink = FavoriteDrink::where('drink_id', '=',$id);

        if(!$FavoriteDrink) {
            return [
                'success' => false,
                'message' => 'Error when deleting drink',
            ];
        }

        if($FavoriteDrink->first()->delete()) {
        return [
            'success' => true,
            'message' => 'drink successfully deleted',
        ];
        }

        return [
            'success' => false,
            'message' => 'Error when deleting drink',
        ];
    }
}
