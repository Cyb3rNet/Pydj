<?php

class XHTMLValidator
{
	private $_oElementRules;

	
	public function __construct()
	{
		$this->_oElementRules = $oElementRules;
	}
	
	
	public function SetDTD($oXHTMLDTD)
	{
		$this->_oXHTMLDTD = $OXHTMLDTD;
	}
	
	
	public function GetElementRules()
	{
		return $this->_oElementRules;
	}
	
	
	public function Validate($sTag, $aAttrs, $aChildTags)
	{
		//$this->_oElementRules
	}
}


?>