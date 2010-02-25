<?php

include("../lib/Pdgen.inc.php");

// Pdgen
// Generates XHTML documents

$sTitle = "My first Pdgen document";

$pdg = new Pdgen($sTitle);

$pdg->Tag("a")->Attr("href")->Val("http://www.github.com")->Content("github.com");

$pdg->Insert()

$pdg->Flush();


?>