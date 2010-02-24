<?php

include("../lib/Pdgen.inc.php");

// Pdgen
// Generates XHTML documents

$sTitle = "My first Pdgen document";

$oPiP = new Pdgen($sTitle);

// Reg defaults on a div
$oPiP->Reg("#myId");

// Retains last registered id myId
$oPiP->Insert($oPiP->Tag("a")["href"]["http://www.github.com"]);

$oPiP->Flush();

?>