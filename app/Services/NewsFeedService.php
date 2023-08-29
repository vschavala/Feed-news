<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsFeedService {

    private $feedUrl; 

    public function __construct()
    {
        $this->feedUrl = 'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=a5813d56377844fa9514e3ad80fee1fa';
    }
 
    public function newsFeed()
    {
        $response = Http::accept('application/json')->get($this->feedUrl);

        return $response->object();
    }
}