<?php


class BasePdgen
{
	private $_oXW;
	
	
	private function _startXMLWriter()
	{		
		$this->_oXW = new XMLWriter();	
		$this->_oXW->openMemory();
		$this->_oXW->startDocument("1.0");
	}
	
	
	private function _openTag($sTag, $aAttrs = array())
	{
		$this->_oXW->startElement($sTag);
		
		foreach ($aAttrs as $sAttr => $sVal)
		{
			$this->_genAttr($sAttr, $sVal);
		}
	}
	
	
	private function _closeTag()
	{
		$this->_oXW->endElement();
	}
	
	
	private function _genTag($sTag, $sContent)
	{
		$this->_oXW->writeElement($sTag, $sContent);
	}
	
	
	private function _genAttr($sAttr, $sVal)
	{
		$this->_oXW->writeAttribute($sAttr, $sVal);
	}
		
	
	////
	// PUBLIC
	////

	
	public function __construct()
	{		
		$this->_startXMLWriter();
	}
	
	
	public function &Tag($sTag)
	{
		$sId = $this->_gUniqId();
		
		$this->_openTag($sTag, array('id' => $sId));
		
		return $this;
	}
	
	public function &Attr($sAttr, $sVal)
	{
		$this->_genAttr($sAttr, $sVal);
		
		return $this;
	}
	
	
	public function Content($sContent)
	{
		$this->_oXW->text($sContent);
		
		$this->_closeTag();
	}
	
	
	public function Flush()
	{
		$this->_oXW->endDocument();
		
		echo $this->_oXW->flush();
	}
}


class Pdgen extends BasePdgen
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
		
	
	private function _gUniqId()
	{
		return rand(0, time());
	}
	
	
	private function _genHead()
	{
		$this->_openTag("head");
		
		$this->_genTag("title", $this->_sDT);
		
		$this->_closeTag();
	}
	
	private function _startHTML()
	{
		$this->_openTag("html");
		
		$this->_genHead();
		
		$this->_openTag("body");
	}
	
	
	private function _endHTML()
	{
		// body
		$this->_closeTag();
		
		// html
		$this->_closeTag();
	}
	
	
	////
	// PUBLIC
	////

	
	public function __construct($sTitle, $sLang = 'en')
	{
		$this->_sDT = $sTitle;
		$this->_sDL = $sLang;
		
		parent::__construct();
		
		$this->_startHTML();
	}
	
	
	public function &Id($sId)
	{
		parent::Tag(self::defaultTag, array('id' => $sId));
		
		return $this;
	}
	
	
	public function &Tag($sTag)
	{
		$sId = $this->_gUniqId();
		
		parent::Tag($sTag, array('id' => $sId));
		
		return $this;
	}
	
	public function &Attr($sAttr, $sVal)
	{
		parent::Attr($sAttr, $sVal);
		
		return $this;
	}
	
	
	public function Content($sContent)
	{
		parent::Content($sContent);
	}
	
	
	public function Flush()
	{
		$this->_oXW->_endHTML();
		
		echo parent::Flush();
	}
}


?>