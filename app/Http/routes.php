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
use Illuminate\Http\Request as Request;
use App\Ingredient;
use App\Drink;
use App\Recipe;
use App\Record;

//use App\Traits\ApiResponse;
define("STATUS_CODE", "statusCode");
define("STATUS_MSG", "statusMsg");
define("DATA", "data");

function res(array $data, $statusMsg = "success", $statusCode = 200){
    return Response::json([
        STATUS_CODE => $statusCode,
        STATUS_MSG => $statusMsg,
        DATA => $data
    ], $statusCode);
}

Route::get('/', function (){
    return view('welcome');
});

/** get ingredient for a "drink" */
Route::post("drink/{drinkId}/recipe", function ($drinkId){
    $drink = Drink::with("recipe")->where("id", $drinkId)->first();
    return res($drink->toArray());
//    return Response::json([
//        STATUS_CODE => 200,
//        STATUS_MSG => "",
//        DATA => $drink->toArray()
//    ], 200);
});

Route::post("recipe", function (Request $request){
    $itemType = $request->get(Recipe::RECIPE_TYPE);
    $itemId = $request->get(Recipe::RECIPE_ID);
    if($itemType && $itemId){
        $item = $itemType::with("recipe")->where("id", $itemId)->first();
        return res($item->toArray());
    }
    return res($request->toArray(), "failed to find", 422);
});

Route::post("record", function (Request $request){
    $recordType = $request->get(Record::RECORD_TYPE);
    $recordId = $request->get(Record::RECORD_ID);
    if($recordType && $recordId){
//        $item = $recordType::with("")
        $item = $recordType::with("recipe")->where("id", $recordId)->first();
//        $item->record = [];
        $recordArray = [];
        foreach($item->recipe as $recipe){
            $record = new Record();
            $record->ingredient_id = $recipe->ingredient_id;
            $record->record_type = $recipe->item_type;
            $record->record_id = $recipe->item_id;
            $record->quanity = $recipe->quanity;
            $record->price = $item->price;
            $record->save();
//            $item->record[] = $record;
            $recordArray[] = $record;
        }
        /** build json */
        $itemArray = $item->toArray();
        $itemArray["record"] = $recordArray;
//        return res($itemArray);
        return res($recordArray);
    }
    return res($request->all(), "failed to record", 422);
});

Route::post("record/order", function (Request $request){
    $recordType = $request->get(Record::RECORD_TYPE);
    $recordId = $request->get(Record::RECORD_ID);
    if($recordType && $recordId){
        /*
         * unable to LOAD RECIPE
         * bcs order is morph, we DON'T KNOW what the hell it is
         * >order.recipe is meaningless
         * what sure that order HAS RECIPE?
         */
//        $order = $recordType::with("order.recipe")->find($recordId);
//        $order = $recordType::with(["order" => function($relation){
//            $relation->with("recipe");
//        }])->find($recordId);
        $order = $recordType::with("order")->find($recordId);
        /** get our type of drink from order */
        $drink = $order->order;

        $recordArray = [];
        foreach($drink->recipe as $recipe){
            $record = new Record();
            $record->ingredient_id = $recipe->ingredient_id;
            $record->record_type = $recordType;
            $record->record_id = $recordId;
            $record->quanity = $recipe->quanity;
            $record->price = $drink->price;
            $record->save();
//            $item->record[] = $record;
            $recordArray[] = $record;
//            $recordArray[] = $recipe;
        }
//        return res($order->toArray());
//        return res($drink->toArray());
        return res($recordArray);
    }
    return res($request->all(), "failed to record", 422);
});

