<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class StreetController extends Controller
{
    public function index()
    {
        $response = Http::get('https://t.me/s/VahidOnline');

        $crawler = new Crawler($response->body());
        $nodeValues = $crawler->filter('.js-message_text')->each(function (Crawler $node, $i) {
            if(str_contains($node->text(),'تجمع')){
                return $node->text();
            }

        });

        dd(array_filter($nodeValues));

    }
}
