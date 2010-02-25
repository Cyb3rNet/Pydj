<?php


class Pdgen
{
	const defaultTag = 'div';

	private $_sDT;
	private $_sDL;
	
	private $_slId;
	
	private $_oXW;
	
	private function _startXMLWriter()
	{		
		$this->_oXW = new XMLWriter();	
		$this->_oXW->openMemory();
		$this->_oXW->startDocument("1.0");
	}

	
	private function _genTag($sTag, $sAttrs, $sContent)
	{
		
	}
	
	
	private function _gUniqId()
	{
		return rand(0, time());
	}

	
	////
	//// PUBLIC
	////

	
	public function __construct($sTitle, $sLang)
	{
		$this->_sDT = $sTitle;
		$this->_sDL = $sLang;
		
		$this-_startXMLWriter();
	}
	
	
	public function &Id($sId)
	{
		$this->_genTag(self::defaultTag, array('id' => $sId));
		
		return $this;
	}
	
	
	public function &Tag($sTag)
	{
		$this->_genTag($sTag, array('id' => $sId));
	
		return $this;
	}
	
	public function &Attr($sAttr)
	{
		
		return $this;
	}
	
	public function &Val($sVal)
	{
	
		return $this;
	}
	
	public function Content($sContent)
	{
	
	}
	
	public function Flush()
	{
	
	}
}


?>