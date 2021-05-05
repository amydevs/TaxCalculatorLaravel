<?php
// Gets Page
$page = file_get_contents('https://www.ato.gov.au/rates/individual-income-tax-rates/');

// Shortens Page
$exp = '/(<Div class="widgetBody"><span class="accesspoint"><\/span><h1>).*?(<\/div>)/is';
preg_match($exp, mb_convert_encoding($page, 'HTML-ENTITIES', "UTF-8"), $matches);
$shortenedPage = $matches[0];
$shortenedPage = (str_replace('id="Residents"'," ", $shortenedPage));
$shortenedPage = (str_replace('id="Children"'," ", $shortenedPage));
$shortenedPage = (str_replace('id="Calculators"'," ", $shortenedPage));

$dom = new DOMDocument();
//methods to load HTML
$dom->loadHTML($shortenedPage);
$documentElement = $dom->documentElement;
echo $documentElement;


