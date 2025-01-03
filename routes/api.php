<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', function(Request $request){
    $checkdata = User::where('email', $request->email)->first();
    if($checkdata){
        if(password_verify($request->password, $checkdata->password)){
            return response()->json(['status' => true, 'id' => $checkdata->id]);
        }else{
            return response()->json(['status' => false]);
        }
    }else{
        return response()->json(['status' => false]);
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
