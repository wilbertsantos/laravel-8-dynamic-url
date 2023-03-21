<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{dynamic_url}', function($dynamic_url, Illuminate\Http\Request $request) {
    $agent = $request->header('User-Agent');
    $host = $request->getHost();
    return "Dynamic URL: $dynamic_url | User Agent: $agent | Host: $host";
});
Route::post('/post-request', function(Illuminate\Http\Request $request) {
    $body = json_encode($request->all());
    $agent = $request->header('User-Agent');
    $host = $request->getHost();
    return "Body: $body | User Agent: $agent | Host: $host";
});

Route::post('/example', function (Illuminate\Http\Request $request) {
    $params = $request->all();
    $url = $request->url();
    $agent = $request->header('User-Agent');
    $host = $request->getHost();
    $json = json_encode($params);
    
    return response()->json([
        'message' => 'POST parameters and GET information converted to JSON successfully',
        'json' => $json,
        'url' => $url,
        'agent' => $agent,
        'host' => $host,
    ]);
});