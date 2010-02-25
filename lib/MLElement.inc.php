<?php


class MLElement
{
	// has no closing tag
	const isempty = 0;
	// has a closing tag
	const closed = 1;

	private $_bHasEnd;
	
	private $_sTag;
	private $_aAttrs;
	private $_sContent;
	
	private function _gAttrsStr()
	{
		$sAttrs = "";
	
		foreach ($this->_aAttrs as $sKey => $sVal)
		{
			if (is_string($sKey) && is_string($sVal))
				$sAttrs .= ' '.$sKey.'="'.$sVal.'"';
			else
				throw new Exception('MLElement::_gAttrsStr $sKey or/and $sVal is/are not a string');
		}
		
		return $sAttrs;
	}
	

	public function __construct($cClosing, $sTag, $aAttrs = array(), $sContent = "")
	{
		switch ($cClosing)
		{
			case self::isempty:
				$this->_bHasEnd = false;
			break;
			case self::closed:
				$this->_bHasEnd = true;
			break;
			default:
				throw new Excecption('MLElement::__construct $cClosing is not one of valid constants');
		}
	
		$this->_sTag = $sTag;
		
		if (is_array($aAttrs))
			$this->_aAttrs = $aAttrs;
		else
			throw new Exception('MLElement::__construct $aAttrs is not an array');
		
		if (is_string($sContent))
		{
			if (!$this->_bHasEnd and strlen($sContent))
				throw new Exception('MLElement::__construct $cClosing does not match with value of $sContent');
				
			$this->_sContent = $sContent;
		}
		else
			throw new Exception('MLElement::__construct $sContent is not string');
	}

	
	public function ReplaceContent($sContent)
	{
		if (is_string($sContent))
			$this->_sContent =  $sContent;
		else
			throw new Exception('MLElement::ReplaceContent $sContent is not a string');
	}
	
	
	public function AppendContent($sContent)
	{
		if (is_string($sContent))
			$this->_sContent .= $sContent;
		else
			throw new Exception('MLElement::AppendContent $sContent is not a string');
	}

	
	public function AddAttr($sAttr, $sVal)
	{
		if (is_string($sAttr) && is_string($sVal))
			$this->_aAttrs[$sAttr] = $sVal;
		else
			throw new Exception('MLElement::AddAttr $sAttr or/and $sVal is/are not a string');
	}

	
	public function __toString()
	{
		if ($this->_bHasEnd)
			$sML = '<'.$this->_sTag.' '.$this->_gAttrsStr().'>'.$this->_sContent.'</'.$this->_sTag.'>';
		else
			$sML = '<'.$this->_sTag.' '.$this->_gAttrsStr().' />';
		
		return $sML;
	}
}

?>