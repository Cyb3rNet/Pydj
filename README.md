>> Pydj by Cyb3r
>>
>> Version 0.1
>>
>> Quick HTML Document Creation / PHP 5

## Usage

    include("Pydj.inc.php");
	
	$sTitle = "My HTML document";
	
	$oPydj = new Pydj($sTitle);
	
	$oPydj->Tag("h1")->Content("Hello World!");
	
	$oPydj->Tag("a")->Attr("href", "http://www.github.com")->Content("github.com");
	
	// Echoes XML/HTML document
	$oPydj->Flush();

## Still Needs Some Work



~::~ Cyb3r ~::~