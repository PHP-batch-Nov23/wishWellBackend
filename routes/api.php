 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllUserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    
    //Route::resource('/allusers', \App\Http\Controllers\AllUserController::class);//->middleware(\App\Http\Middleware\ValidateToken::class);

    Route::get('/get',[App\Http\Controllers\AllUserController::class, 'index']);

    Route::post('/register',[App\Http\Controllers\AllUserController::class, 'store']);

    Route::post('/donation',[App\Http\Controllers\DonationController::class, 'store']);

    Route::post('/campaign',[App\Http\Controllers\CampaignController::class, 'store']);


    
    Route::put('/update/{id}',[App\Http\Controllers\AllUserController::class, 'update']);
    
    Route::delete('/delete/{id}',[App\Http\Controllers\AllUserController::class, 'destroy']);
    
    
    

