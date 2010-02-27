>> Pydj by Serafim Junior Dos Santos Fagundes Cyb3r Web
>>
>> Version 0.2
>>
>> Quick HTML Document Creation / PHP 5
>>
>> Uses PHP 5 / XMLWriter

## Usage

    include("Pydj.inc.php");

	// Pydj
	// Generates HTML documents

	$sTitle = "My first Pydj 0.2 document 0.2";

	$pydj = new Pydj($sTitle, "en", $oHead);

	$pydj->Head()->Style("@import 'test.css';");

	$pydj->Head()->ScriptFile("test.js");

	$sScript = <<<SCRIPT

	window.onload = function () {
		alert("I'm Script()");
		withinOnLoad();
	}

	SCRIPT;

	$pydj->Head()->Script($sScript);

	$sStyle = <<<STYLE
		color:#666;
		text-decoration:underline;
	STYLE;

	$pydj->Tag("h1")->Attr("style", $sStyle)->Content("Hello World!");

	$pydj->Tag("a")->Attr("href", "http://www.github.com")->Content("github.com");

	$sStyle = <<<STYLE
		border:1px solid #000;
		margin:10px;
		padding:10px;
	STYLE;

	$pydj->Tag("div")->Tag("p")->Attr("style", $sStyle)->Content("This is a paragraph in a div.");

	$pydj->Tag("code")->Content("This is code");

	$pydj->Flush();

## Still Needs Some Work