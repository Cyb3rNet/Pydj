<?php

include("XHTMLValidElement.inc.php");

include("GenTree.inc.php");


class Pdgen extends GenTree implements IChainCall
{
	// document title
	private $_sDT;
	// document language
	private $_sDL;

	
	// Root Id Body Element Tree
	private $_sRtId_BET;

	
	//// 
	//
	private function _insertGT()
	{
		$sXHTML = "";
	
		foreach ($this->_axGT as $sId => $axGT)
		{
			foreach ($axGT as $sTag => $_axGT)
			{
				$asAttrs = array('id' => $sId);
			
				foreach ($_axGT as $sAttr => $__axGT)
				{
					foreach ($__axGT as $sVal => $aCntnt)
					{
						$sContent = "";
					
						foreach ($aContent as $sCntnt)
						{
							$sContent .= $sCntnt;
						}
						
						$asAttrs[$sAttr] .= $sVal.';';
					}
				}
				
				$sXHTML .= $this->_genTag($sTag, $aAttrs, $sContent);
			}
		}
		
		
	}

	
	//// Generate markup
	//
	private function _genTag($sTag, $aAttrs, $sContent)
	{
		$oEl = new XHTMLValidElement($sTag, $aAttrs, $sContent);
		
		return $oEl;
	}
	
	
	//// Assembles and returns the document head
	//
	private function _gHead()
	{
		$oTitle = _genTag("title", array(), $this->_sDT);

		$oHead = _genTag("head", array(), $sTitle);
		
		return $sHead;
	}


	//// Get Document
	//
	private function _gDoc()
	{
		$sB = $this->_oBET;
	
		$sH = _gHead();

		$oDoc = XHTMLDTD10Strict::GetDocType();
	
		$sDoc .= $sH.$sB.'</html>';
	
		return $sDoc;
	}

	
	////
	// set functions
	////

	
	//// Set init step
	//
	private function _sInitStep()
	{
		$this->_oCS = new ChainStep();
		
		$oCS = new CallStep();

		$this->SetLastStep($oCS);
	}
	
	////
	//// PUBLIC
	////

	
	public function __construct($sTitle, $sLang = "en")
	{
		$this->_sDT = $sTitle;
		$this->_sDL = $sLang;
		
		$this->_sRtId_BET = $this->_gUniqId();
		
		$this->_oBET = $this->_genTag("body", array("id", $this->_sRtId_BET));
		
		$this->_oAET = $this->_oBET;

		parent::__construct($this->_sRtId_BET);
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

	
	public function &Insert($axGT = null)
	{
		if ($axGT instanceof GenTree)
		{
			// Parse through GenTree
			// Generate XHTML tags
			// Insert at

			$this->_insertGT();
		}
		else
		{
			$oCS = new CallStep(10, 'Insert', array(11, 12, 15));
	
			$this->_tAS($oCS);

		}
		
		return $this;
	}

	
	//// Pdgen Insert Step 11: Set Id in GenTree
	//
	public function &Id($sId)
	{
		$oCS = new CallStep(11, 'Id', array(10));
	
		$this->TryAllowStep($oCS);

		parent::Id($sId);
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	
	//// Pdgen Insert Step 12: Set Tag in GenTree
	//
	public function &Tag($sTag)
	{
		$oCS = new CallStep(12, 'Tag', array(10, 11));

		$oStep = $this->GetLastStep();
		
		$iLSNo = $oStep->GetNfo(CallStep::StepNo);
		
		// Init, Tag on first call
		if ($iLSNo == -1)
		{
			parent::Tag($sTag);
		}
		else if ($iLSNo == 12)
		{
			
		}
		else
		{
			$this->TryAllowStep($oCS);
			
			parent::Tag($sTag);
		}
			
		$this->SetLastStep($oCS);
		
		return $this;
	}

	
	//// Pdgen Insert Step 13: Set Attribute in GenTree
	//
	public function &Attr($sAttr)
	{
		$oCS = new CallStep(13, 'Attr', array(10, 11, 12));
	
		parent::Attr($sAttr)
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	
	//// Pdgen Insert Step 14: Set Attribute Value in GenTree
	//
	public function &Val($sVal)
	{
		$oCS = new CallStep(14, 'Val', array(10, 11, 12, 13));
	
		parent::Val($sVal);
		
		$this->SetLastStep($oCS);
		
		return $this;
	}

	
	//// Pdgen Insert Step 15: Set Id in GenTree
	//
	public function &Content($sCntnt)
	{
		$oCS = new CallStep(15, 'Content', array(10, 11, 12, 14));
	
		parent::Content($sCntnt);
		
		$this->SetLastStep($oCS);
		
		return $this;
	}


	public function Flush()
	{
		return $this->_gDoc();
	}
}


?>