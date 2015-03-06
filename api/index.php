<?php

/*
 * The MIT License
 *
 * Copyright 2015 Ricardo.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

require ("./vendor/autoload.php");
include ("./includes/APIconfig.php");


//instatiate guzzle and slim objects
$slim = new \Slim\Slim();
$guzzle = new GuzzleHttp\Client();

//configure slim parameters
$slim->contentType('application/json');

//Slim router calls
$slim->get('/', 'onMain');
$slim->get('/summoner/:nameId', 'getSummonerByName');
$slim->get('/featured/', 'getFeaturedGames');

//run the slim app
$slim->run();

//Guzzle client configuration


function getFeaturedGames() {
    $client = $GLOBALS['guzzle'];

    $response = $client->get("https://euw.api.pvp.net/observer-mode/rest/featured?api_key=" . API_KEY, ['verify' => false]);
    $body = $response->getBody();
    //jsonP protect string see: https://docs.angularjs.org/api/ng/service/$http#get
    echo ")]}',\n".$body;
    
}

function onMain() {
    global $slim;
    $slim->response->setStatus(404);
    echo "Nothing to see here, move along!";
}

;

function getSummonerByName() {
    
}
