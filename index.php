<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require __DIR__.'/vendor/autoload.php';

use Dompdf\Dompdf;

$foo = new Dompdf();

$encodedString = mb_convert_encoding('João', 'windows-1252');

$html = "<table border='1'><tr><td>a</td><td>{$encodedString}</td><td>a</td><td>a</td><td>a</td></tr><tr><td>b</td><td>b</td><td>b</td><td>b</td><td>b</td></tr></table>";

// $foo->loadHtml('hello'.$html);
$foo->loadHtml('hello'.$html, 'windows-1252');

die(var_dump($foo->getDom()->textContent));

$foo->setPaper('A4', 'landscape');
$foo->render();
$foo->stream();

// die(var_dump($foo));