<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class HomeController extends Controller
{
    //
    function index(){
         
        $client = new Client();
        $respons=$client->request('GET','https://api.covid19api.com/summary');
        $respons->getBody();

        return view('index');
    }
}
