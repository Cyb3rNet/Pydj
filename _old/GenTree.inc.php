<?php


interface IGenTreeChain
{
	public function TryAllowStep($oCallStep);
	public function GetLastStep();
	public function SetLastStep($oCallStep);
	
	public function &Id($sId);
	public function &Tag($sTag);
	public function &Attr($sAttr);
	public function &Val($sVal);
	public function &Content($sContent);
}


class CallStep
{

	const StepNo = 0;
	const StepName = 1;
	const StepsAllwPrv = 2;

	
	// Step no
	private $_iNo;
	// Step name
	private $_sName;
	// Previous allowed step nos
	private $_aiPrvAllw;
	
	
	public function __construct($iNo = -1, $sName = "_init_", $aiPrvAllw = array())
	{
		$this->_iNo = $iNo;
		$this->_sName = $sName;
		$this->_aiPrvAllw = $aiPrvAllw;
	}
	
	
	public function GetNfo($cStepNfo)
	{
		switch ($cStepNfo)
		{
			case self::StepNo:
				return $this->_iNo;
			break;
			case self::StepName:
				return $this->_sName;
			break;
			case self::StepsAllwPrv:
				return $this->_aiPrvAllw;
			break;
		}
	}
}


class ChainStep
{
	// Last step
	private $_oLastStep;
	
	
	public function __construct()
	{
		$this->_oLastStep = null;
	}
	
	
	public function SetStep($oStep)
	{
		$this->_oLastStep = $oStep;
	}
	
	
	public function GetLastStep()
	{
		return $this->_oLastStep;
	}
	
	
	public function TryAllowStep($oStep)
	{
		$iLastNo = $this->_oLastStep->GetNfo(CallStep::StepNo);
		$iLastName = $this->_oLastStep->GetNfo(CallStep::StepName);
		
		$sCurName = $oStep->GetNfo(CallStep::StepName);
		$aiPrvAllw = $oStep->GetNfo(CallStep::StepsAllwPrv);
		
		if (!in_array($iLastNo, $aiPrvAllw))
			throw new GTInsertException($sCurName.' cannot be called after '.$iLastName);
	}
}



class GTInsertException extends Exception
{
	public function __construct($sMsg)
	{
		parent::__construct("Invalid chain call: ".$sMsg);
	}
}



class GenTree implements IGenTreeChain
{
	const GTNil = 'empty';

	// GenTree axial array
	protected $_axGT;

	// last generated id
	private $_lgid;
	// last inserted id
	private $_lid;
	// last inserted tag
	private $_ltag;
	// last inserted attr
	private $_lat;
	// last inserted val
	private $_lval;
	
	
	////
	// get functions
	////

	
	//// Get random uniq id
	//
	protected function _gUniqId()
	{
		return rand(0, time());
	}
	
	
	//// Get initial GenTree
	//
	private function _gFullGT()
	{
		$aCntnt = array();
	
		$aVal = array($aCntnt);
	
		$aAttr = array($aVal);
	
		$aTag = array($aAttr);
	
		return array($aTag);
	}

	////
	// set functions
	////

	
	//// Set init step
	//
	protected function _sInitStep()
	{
		$this->_oCS = new ChainStep();
		
		$oCS = new CallStep();

		$this->SetLastStep($oCS);
	}

	
	////
	//// PUBLIC
	////
	
	
	public function __construct($sRootId)
	{
	
		$this->_axGT = $this->_gFullGT();

		// last inserted id
		$this->_lid = $this->_gUniqId();
		// last inserted tag
		$this->_ltag = "";
		// last inserted attr
		$this->_lat = "";
		// last inserted val
		$this->_lval = "";
		
		$this->_sIS();

	}
	
	
	//// Try allow step
	//
	public function TryAllowStep($oCallStep)
	{
		$this->_oCS->TryAllowStep($oCallStep);
	}

	
	//// Get last step
	//
	public function GetLastStep()
	{
		return $this->_oCS->GetLastStep();
	}
	
	
	//// Set last step
	//
	public function SetLastStep($oCallStep)
	{
		if ($oCallStep instanceof CallStep)
		{
			$this->_oCS->SetStep($oCallStep);
		}
	}

	
	////
	// GenTreeChainCall
	////
	
	
	//// GT Insert Step 1: Set Id in GenTree
	//
	public function &Id($sId)
	{
		$oCS = new CallStep(11, 'Id', array(11, 12));
	
		$this->TryAllowStep($oCS);

		$this->_lid = $sId;
		
		$this->_axGT[$sId];
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	
	//// GT Insert Step 2: Set Tag in GenTree
	//
	public function &Tag($sTag)
	{
		$oCS = new CallStep(12, 'Tag', array(11, 12));

		$oStep = $this->GetLastStep();
		
		$iLSNo = $oStep->GetNfo(CallStep::StepNo);
		
		// Init, Tag on first call
		if ($iLSNo == -1)
		{
			$this->_ltag = $sTag;
			
			$this->_axGT[$this->_lId][$sTag];
		}
		else if ($iLSNo == 11 || $iLSNo == 12)
		{
			if (in_array($this->_lId
		}
		else
		{
			$this->_ltag = $sTag;

			$this->TryAllowStep($oCS);
			
			$this->_axGT[$this->_lId][$sTag];
		}
			
		$this->SetLastStep($oCS);
		
		return $this;
	}

	//// GT Insert Step 3: Set Attribute in GenTree
	//
	public function &Attr($sAttr)
	{
		$oCS = new CallStep(3, 'Attr', array(11, 12));
	
		$this->TryAllowStep($oCS);
		
		$this->_axGT[$this->_lid][$this->_ltag][$sAttr];
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	//// GT Insert Step 4: Set Attribute Value in GenTree
	//
	public function &Val($sVal)
	{
		$oCS = new CallStep(4, 'Val', array(11, 12, 3));
	
		$this->TryAllowStep($oCS);

		$this->_axGT[$this->_lid][$this->_ltag][$this->_lat][$sVal];
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	//// GT Insert Step 5: Set Id in GenTree
	//
	public function Content($sCntnt)
	{
		$oCS = new CallStep(5, 'Content', array(11, 12, 4));
	
		$this->TryAllowStep($oCS);

		$oStep = $this->GetLastStep();
		
		$iLSNo = $oStep->GetNfo(CallStep::StepNo);
		
		switch ($iLSNo)
		{
			case 1:
			case 2:
				$this->_axGT[$this->_lid][$this->_ltag][self::GTNil][self::GTNil][$sCntnt];
			break;
			case 4:
			default:
				$this->_axGT[$this->_lid][$this->_ltag][$this->_lat][$this->_lval][$sCntnt];
		}
		
		$this->SetLastStep($oCS);
	}
}


?>