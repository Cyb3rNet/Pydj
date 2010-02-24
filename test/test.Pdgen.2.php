<?php

include("../lib/Pdgen.inc.php");

// Pdgen
// Generates XHTML documents

$sTitle = "My first Pdgen document";

$t = new Pdgen();

$t->Tag("a")->Attr("href")->Val("http://www.github.com")->Content("github.com");

$t->Flush();


?>