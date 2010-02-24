>> Pdgen by Cyb3r
>>
>> Version 0.0
>>
>> XHTML 1.0 Document Generation in PHP 5

## Usage

    include("Pdgen.inc.php");
	
	$oPdgen = new Pdgen();
	
	// Reg defaults on a div
	// Inserts div in body, root of tree
	$oPdgen->Reg("#myId");
	
	// Insert into #myId
	$oPdgen->Insert($oPdgen->Tag("a")->Attr("href")->Val("http://www.github.com"));
	
	// Echoes XHTML document
	$oPdgen->Flush();