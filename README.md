>> Pdgen by Cyb3r
>>
>> Version 0.1
>>
>> Quick XML/HTML Document Creation / PHP 5

## Usage

    include("Pdgen.inc.php");
	
	$sTitle = "My XML/HTML document";
	
	$oPdgen = new Pdgen($sTitle);
	
	$oPdgen->Tag("a")->Attr("href", "http://www.github.com");
	
	$oPdgen->Tag("p")->Tag("span")->Content("Hello World!");
	
	// Echoes XML/HTML document
	$oPdgen->Flush();
	
## Methods