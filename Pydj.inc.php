<?php


class BasePydj
{
	protected $_oXW;
	
	
	private function _startXMLWriter()
	{		
		$this->_oXW = new XMLWriter();	
		$this->_oXW->openMemory();
		$this->_oXW->startDocument("1.0");
	}
	
	
	protected function _openTag($sTag, $aAttrs = array())
	{
		$this->_oXW->startElement($sTag);
		
		foreach ($aAttrs as $sAttr => $sVal)
		{
			$this->_genAttr($sAttr, $sVal);
		}
	}
	
	
	protected function _closeTag()
	{
		$this->_oXW->endElement();
	}
	
	
	protected function _genTag($sTag, $sContent)
	{
		$this->_oXW->writeElement($sTag, $sContent);
	}
	
	
	protected function _genAttr($sAttr, $sVal)
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
		$this->_openTag($sTag);
		
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


class Pydj extends BasePydj
{
	const defaultTag = 'div';
	
	//private $_oXW;
	
	private $_sDT;
	private $_sDL;
		
	
	private function _gUniqId()
	{
		return rand(0, time());
	}
	
	
	private function _genHead()
	{
		parent::_openTag("head");
		
		parent::_genTag("title", $this->_sDT);
		
		parent::_closeTag();
	}
	
	private function _startHTML()
	{
		$this->_openTag("html");
		
		$this->_genHead();
		
		parent::_openTag("body");
	}
	
	
	private function _endHTML()
	{
		// body
		parent::_closeTag();
		
		// html
		parent::_closeTag();
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
		parent::Tag(self::defaultTag);
		
		parent::Attr("id", $sId);
		
		return $this;
	}
	
	
	public function &Tag($sTag)
	{
		$sId = $this->_gUniqId();
		
		parent::Tag($sTag);
		
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
		$this->_endHTML();
		
		echo parent::Flush();
	}
}


?>