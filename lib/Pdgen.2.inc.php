<?php

include("XHTMLValidElement.inc.php");

class GTInsertException extends Exception
{
	public function __construct($sMsg)
	{
		parent::__construct("Invalid chain call: ".$sMsg);
	}
}





class PdgenXHTMLElement extends XHTMLElementRule
{
	function public __construct($sTag, $sId, $aAttr = null, $vContent = null)
	{
		parent::__construct($sTag);
	
		$this->_sTag = $sTag;
		$this->_sId = $sId;
	
		if ($aAttr != null)
			if (is_array($aAttr))
				$this->_aAttrs = array();
			else
				throw new Exception('PdgenMLElement $aAttr not an array');
		
		if ($vContent != null)
			parent::InsertContent($vContent);
	}
	
	function public AddAttr($sAttr, $sVal)
	{
		$this->_aAttrs[$sAttr] = $sVal;
	}
}


class Pdgen2
{
	const iGTIStep1 = 1;
	const iGTIStep2 = 2;
	const iGTIStep3 = 3;
	const iGTIStep4 = 4;
	const iGTIStep5 = 5;
	
	////
	// get functions
	////

	private function _gAttrValsGT()
	{
		return array(array());
	}

	private function _gAttrsGT()
	{
		return array($this->_getAttrValsGT());
	}

	private function _gTagGT()
	{
		return array($this->_getAttrsGT());
	}

	private function _gFullGT()
	{
		return array($this->_getTagGT());
	}
	
	//// Get last step
	//
	private function _gLS()
	{
		return $this->_iLS;
	}
	
	////
	// set functions
	////
	
	//// Set last step
	//
	private function _sLS($i)
	{
		$this->_iLS = $i;
	}
	
	////
	//// PUBLIC
	////

	public function __construct()
	{
		$this->_aGT = $this->_getFullGT();

		// last inserted id
		$this->_lid = "";
		// last inserted tag
		$this->_ltag = "";
		// last inserted attr
		$this->_lat = "";
		// last inserted val
		$this->_lval = "";
		
		$this->_sLS(0);
	}
	
	//// GT Insert Step 1: Set Id in GenTree
	//
	public function &Id($sId)
	{
		$this->_lid = $sId;
		
		$this->_aGT[$sId] = $this->_getTagGT();
		
		echo "1";
		
		return $this;
	}
	
	//// GT Insert Step 2: Set Tag in GenTree
	//
	public function &Tag($sTag)
	{
		$this->_ltag = $sTag;
		
		$this->_aGT[$this->_lId][$sTag] = $this->_getAttrsGT();
		
		echo "2";
		
		return $this;
	}

	//// GT Insert Step 3: Set Attribute in GenTree
	//
	public function &Attr($sAttr)
	{
		$this->_lat = $sAttr;
		
		$this->_aGT[$this->_lid][$this->_ltag][$sAttr] = $this->_getAttrValsGT();
		
		echo "3";
		
		return $this;
	}

	//// GT Insert Step 4: Set Attribute Value in GenTree
	//
	public function &Val($sVal)
	{
		$this->_aGT[$this->_lid][$this->_ltag][$this->_lat][$sVal] = array();
		
		echo "4";
		
		return $this;
	}

	//// GT Insert Step 5: Set Id in GenTree
	//
	public function Content($sCntnt)
	{
		switch ($this->_gLS())
		{
			case self::iGTIStep1:
			case self::iGTIStep2:
			case self::iGTIStep4:
				$this->_aGT[$this->_lid][$this->_ltag][$this->_lat][$this->_lval][$sCntnt];
			break;
			default:
				throw new GTInsertException("");
		}
	}

	public function GetGenTree()
	{
		return $this->_aGT;
	}
}

$t = new TestRef();

$t->Tag("a")->Attr("href")->Val("http://www.github.com")->Content("github.com");
//$t->setRef("a")["title"]["github.com"];

print_r($t->GetGenTree());

?>