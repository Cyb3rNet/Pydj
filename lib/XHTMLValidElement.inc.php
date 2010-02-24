<?php

include("MLElement.inc.php");

class XHTMLValidElement extends MLElement
{
	const emptyContent = '';
	const dataContent = '#PCDATA'

	
	private $_sTag;
	private $_aAttrs;
	private $_vContent;

	
	private $_aChildTags;

	
	private $_oXHTMLValidator;

	
	private function _getXHTMLElementRule()
	{
		return $this->_oXHTMLValidator->GetElementRule();
	}
	
	
	private function _validateXHTML()
	{
		try {
			
			$this->_oXHTMLValidator->Validate($this->_sTag, $this->_aAttrs, $this->_aChildTags);
		}
		catch (XHTMLException $e) {
			throw $e;
		}
	}

	
	public function __construct($sTag, $aAttrs = array(), $vContent = self::emptyContent)
	{
		$this->_oXHTMLValidator = new XHTMLValidator();
	
		$this->_sTag = $sTag;
		$this->_aAttrs = $aAttrs;
		$this->_vContent = $vContent;
		
		$this->_aChildTags = array();
	}

	
	public function SetValidator()
	{
		$this->_oXHTMLValidator = $oXHTMLValidator;
	}
	
	
	public function AppendContent($vContent)
	{
		if ($vContent instanceof XHTMLValidElement)
		{
			$this->_aChildTags[] = $vContent->GetTag();
		}
		else if (is_string($vContent))
		{
			$this->_aChildTags[] = self::dataContent;
		}
		else
		{
			throw new Exception('XHTMLValidElement::AppendContent $vContent is not a valid content');
		}
		
		$this->_vContent .= (string) $vContent;
	}
	
	
	public function GetTag()
	{
		return $this->_sTag;
	}
	
	
	public function __toString()
	{
		try {
			
			$this->_isValidXHTML()
			
			$oXHTMLElementRule = $this->_getXHTMLElementRule();
			
			parent::__contruct($oXHTMLElementRule->GetEnd(), $this->_sTag, $this->_aAttrs, $this->_vContent);
			
			parent::AppendContent($this->_vContent);
		}
		catch (XHTMLException $e) {
			throw $e;
		}
		
		return parent::__toString();
	}
}


?>