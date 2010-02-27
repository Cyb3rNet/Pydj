<?php


class BasePydj
{
	protected $_oXW;
	
	
	private function _startXMLWriter()
	{		
		$this->_oXW = new XMLWriter();	
		$this->_oXW->openMemory();
		$this->_oXW->startDocument("1.0");
		
		$this->_oXW->setIndent("\t");
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
	
	
	public function Raw($sContent)
	{
		$this->_oXW->writeRaw($sContent);
		
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
	
	
	private $_sDT;
	private $_sDL;
	
	
	private $_bHeadClosed;
	
	
	private function _gUniqId()
	{
		return rand(0, time());
	}
	
	
	private function _verifiyEndHead()
	{
		if (!$this->_bHeadClosed)
		{
			$this->_endHead();
			
			$this->_bHeadClosed = true;
		}
	}
		
	
	private function _endHead()
	{
		parent::_closeTag();
		
		parent::_openTag("body");
	}
	
	
	private function _startHead()
	{
		parent::_openTag("head");
		
		parent::_genTag("title", $this->_sDT);
	}
	
	
	private function _startHTML()
	{
		parent::_openTag("html");
		
		$this->_startHead();
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
		
		$this->_startHead();
		
		$this->_bHeadClosed = false;
	}
	
	
	public function &Head()
	{
		if ($this->_bHeadClosed)
			throw new Exception("Head is closed");
	
		return $this;
	}
	
	
	public function Style($sStyle)
	{
		parent::Tag("style")->Attr("type", "text/css")->Raw($sStyle);
	}
	
	
	public function Script($sScript, $sLanguage = "Javascript")
	{
		parent::Tag("script")->Attr("language", $sLanguage)->Raw($sScript);
	}
	
	
	public function ScriptFile($sScriptFile, $sLanguage = "Javascript")
	{
		parent::Tag("script")->Attr("language", $sLanguage)->Attr("src", $sScriptFile);
		
		parent::_closeTag();
	}
	
	
	public function &Id($sId)
	{
		$this->_verifiyEndHead();
		
		parent::Tag(self::defaultTag);
		
		parent::Attr("id", $sId);
		
		return $this;
	}
	
	
	public function &Tag($sTag)
	{
		$this->_verifiyEndHead();
		
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
	
	
	public function HTML($sHTML)
	{
		parent::Raw($sHTML);
	}
	
	
	public function Flush()
	{
		$this->_endHTML();
		
		echo parent::Flush();
	}
}


?>