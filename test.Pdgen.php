<?php


include("Pdgen.inc.php");


// Pdgen
// Generates XHTML documents


$sTitle = "My first Pdgen document";


$pdg = new Pdgen($sTitle);

$pdg->Tag("a")->Attr("href", "http://www.github.com")->Content("github.com");

$pdg->Tag("p")->Tag("div")->Tag("span")->Attr("style", "border:1px solid #000")->Tag("h1")->Content("Hello World!");

$pdg->Flush();


?>