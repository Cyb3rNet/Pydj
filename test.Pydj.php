<?php


include("Pydj.inc.php");


// Pydj
// Generates HTML documents


$sTitle = "My first Pydj document";


$pydj = new Pydj($sTitle);

$pydj->Tag("a")->Attr("href", "http://www.github.com")->Content("github.com");

$pydj->Tag("p")->Tag("div")->Tag("span")->Attr("style", "border:1px solid #000")->Tag("h1")->Content("Hello World!");

$pydj->Flush();


?>