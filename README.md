>> Pdgen by Cyb3r
>>
>> Version 0.1
>>
>> Quick HTML Document Creation / PHP 5

## Usage

    include("Pdgen.inc.php");
	
	$sTitle = "My HTML document";
	
	$oPdgen = new Pdgen($sTitle);
	
	$oPdgen->Tag("h1")->Content("Hello World!");
	
	$oPdgen->Tag("a")->Attr("href", "http://www.github.com")->Content("github.com");
	
	// Echoes XML/HTML document
	$oPdgen->Flush();

## Still Needs Some Work



~::~ Cyb3r ~::~