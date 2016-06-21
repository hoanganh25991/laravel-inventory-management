<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Ingredient;
use App\Drink;
use App\Recipe;
use App\Record;

define("STATUS_CODE", "statusCode");
define("STATUS_MSG", "statusMsg");
define("DATA", "data");
Route::get('/', function (){
    return view('welcome');
});

/** get ingredient for a "drink" */
Route::post("drink/{drinkId}/recipe", function ($drinkId){
    $drink = Drink::with("recipe")->where("id", $drinkId)->first();
//    return res($drink->toArray());
    return Response::json([
        STATUS_CODE => 200,
        STATUS_MSG => "",
        DATA => $drink->toArray()
    ], 200);
});

function res(array $data, $statusMsg = "success", $statusCode = 200){
    return Response::json([
        STATUS_CODE => $statusCode,
        STATUS_MSG => $statusMsg,
        DATA => $data
    ], $statusCode);
}
