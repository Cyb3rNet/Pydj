<?php

//include("../lib/Pdgen.inc.php");

//// Array actualisation through reference by a class method
//
class TestRef
{
	private function _getAttrValsGT()
	{
		return array(array());
	}

	private function _getAttrsGT()
	{
		return array($this->_getAttrValsGT());
	}

	private function _getTagGT()
	{
		return array($this->_getAttrsGT());
	}

	private function _getFullGT()
	{
		return array($this->_getTagGT());
	}

	public function __construct()
	{
		$this->_aGT = $this->_getFullGT();

		$this->_lid = "";
		$this->_ltag = "";
		$this->_lat = "";
	}
	
	public function &Id($sId)
	{
		$this->_lid = $sId;
		
		$this->_aGT[$sId] = $this->_getTagGT();
		
		echo "1";
		
		return $this;
	}
	
	public function &Tag($sTag)
	{
		$this->_ltag = $sTag;
		
		$this->_aGT[$this->_lId][$sTag] = $this->_getAttrsGT();
		
		echo "2";
		
		return $this;
	}

	public function &Attr($sAttr)
	{
		$this->_lat = $sAttr;
		
		$this->_aGT[$this->_lid][$this->_ltag][$sAttr] = $this->_getAttrValsGT();
		
		echo "3";
		
		return $this;
	}

	public function &Val($sVal)
	{
		$this->_aGT[$this->_lid][$this->_ltag][$this->_lat][$sVal] = array();
		
		echo "4";
		
		return $this;
	}

	public function Content($sCntnt)
	{
		$this->_aGT[$this->_lid][$this->_ltag][$this->_lat][$sVal][$sCntnt];
		
		echo "5";
	}

	public function GetArray()
	{
		return $this->_aGT;
	}
}

$t = new TestRef();

$t->Tag("a")->Attr("href")->Val("http://www.github.com")->Content("github.com");
//$t->setRef("a")["title"]["github.com"];

print_r($t->GetArray());

?>