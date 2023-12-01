<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class PostController extends Controller
{
    public function index()
    {


        $client=new \GuzzleHttp\Client();

        $response=$client->request('GET', 'https://weatherapi-com.p.rapidapi.com/current.json?q=53.1%2C-0.13', [
            'headers'=>[
                'X-RapidAPI-Host'=>'weatherapi-com.p.rapidapi.com',
                'X-RapidAPI-Key'=>'3bd6d7ad4emsh86ebfc150ae8f03p1ddd41jsnda7f9651bce9',
            ],
        ]);

        echo $response->getBody();
    }
}
