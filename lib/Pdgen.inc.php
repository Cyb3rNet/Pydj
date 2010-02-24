<?php

include("XHTMLValidElement.inc.php");


class GTInsertException extends Exception
{
	public function __construct($sMsg)
	{
		parent::__construct("Invalid chain call: ".$sMsg);
	}
}


class PdgenStep
{
	const 

	public function __construct($iNo, $sName, $aNos)
	{
	
	}
	
	
	public function Get
}


class PdgenChainStep
{
	const StepInit	= -1;
	const StepId	= 0;
	const StepTag	= 1;
	const StepAttr	= 2;
	const StepVal	= 3;
	const StepCntnt	= 4;

	public function __construct()
	{
		$this->_iStep = 0;
	}
	
	public function SetStep($i)
	{
		$this->_iStep = $i;
	}
	
	public function GetLastStep()
}


class GenTree
{
	const GTIStep1 = 1;
	const GTIStep2 = 2;
	const GTIStep3 = 3;
	const GTIStep4 = 4;
	const GTIStep5 = 5;

	
	////
	// get functions
	////

	
	private function _gFullGT()
	{
		$aCntnt = array();
	
		$aVal = array($aCntnt);
	
		$aAttr = array($aVal);
	
		$aTag = array($aAttr);
	
		return array($aTag);
	}

	
	//// Get last chain step
	//
	private function _gLCS()
	{
		return $this->_iLS;
	}

	
	////
	// set functions
	////

	
	//// Set last chain step
	//
	private function _sLCS($v)
	{
		if ($v instanceof ChainStep)
		{
			$this->_oCS = $v;
		}
		else
			$this->_oCS->SetStep($v);
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
		
		$this->_sLCS(new ChainStep());

	}

		
	//// GT Insert Step 1: Set Id in GenTree
	//
	public function &Id($sId)
	{
		$this->_lid = $sId;
		
		$this->_aGT[$sId];
		
		$this->_sLCS(
		
		return $this;
	}

	
	//// GT Insert Step 2: Set Tag in GenTree
	//
	public function &Tag($sTag)
	{
		$this->_ltag = $sTag;
		
		$this->_aGT[$this->_lId][$sTag];
		
		echo "2";
		
		return $this;
	}

	//// GT Insert Step 3: Set Attribute in GenTree
	//
	public function &Attr($sAttr)
	{
		$this->_lat = $sAttr;
		
		$this->_aGT[$this->_lid][$this->_ltag][$sAttr];
		
		echo "3";
		
		return $this;
	}

	//// GT Insert Step 4: Set Attribute Value in GenTree
	//
	public function &Val($sVal)
	{
		$this->_aGT[$this->_lid][$this->_ltag][$this->_lat][$sVal];
		
		echo "4";
		
		return $this;
	}

	//// GT Insert Step 5: Set Id in GenTree
	//
	public function Content($sCntnt)
	{
		switch ($this->_gLCS())
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
}


class Pdgen extends GenTree
{
	// document title
	private $_sDT;
	// document language
	private $_sDL;


	
	////
	//// PUBLIC
	////

	
	public function __construct($sTitle, $sLang)
	{
		$this->_sDT = $sTitle;
		$this->_sDL = $sLang;
	}


	public function Flush()
	{
		return $this->_aGT;
	}
}


?>