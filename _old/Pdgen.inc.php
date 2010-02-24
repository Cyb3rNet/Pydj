<?php

class Pdgen
{

####
#### CONSTANTS
####

	////
	//// Constnants for default values
	////
	
	// Default document title
	const _PDT = "Pdgen XHTML document generation";

	////
	//// Constants for comparison
	////
	
	// Resumes to null
	const undefined = null;
	
	// Resumes to empty string
	const nostr = "";
	
	// Defines closed Elements
	const closed = -255;

####
#### PRIVATE VARIABLES
####
	
	// Language of the document
	private $_sDL;
	
	// Title of the document
	private $_sDT;
	
	// Root Id of the body document/BET structure
	private $_sBId;
	
	####
	#### REF/STRUCT ARRAYS
	####

	// Generation Tree (GenTree) of Document Elements
	//
	//   axA
	//      [Id]
	//          [TagName]
	//                   [Attributes]
	//                               [Attribute values]
	//                                                 [Contents]
	//
	private $_axGT;
	
	// Body elements tree
	//
	//    Holds the body elements structure
	//
	private $_axBET;
	
	####
	#### REFERENCE VARIABLES
	####

	
	// Last called id and GenTree reference
	private $_sLId;
	private $_rLGT;

	
	// Last auto generated id, GenTree reference and TNTree reference
	private $_sLAId;
	private $_rLAGT;
	private $_rLATNT;

	
	// Last called Tag name
	private $_sLTN;

	// Last inserted
	
	// Last BET reference
	private $_rBET;
	
	
####
#### PRIVATE METHODS
####
	
	
	####
	#### UTILITARY METHODS
	####
	
	
	//// Insert a GenTree in the BET structure
	//
	private function _insert($rGT)
	{
		
	}

	
	//// Parses the GenTree
	//
	private function _parseGenTree($vaxT)
	{
		if (is_array($vaxT) && count($vaxT))
			foreach ($axT as $axST)
			{
				_parseGenTree($axST);
			}
		else
			return _genAxTag($vaxT);
	}

	
	####
	#### GENERATION METHODS
	####
	
	
	//// Generates a random Id
	//
	private function _genId()
	{
		return rand(0, time());
	}
	
	
	//// Generates the HTML Tag from axial GenTree
	//
	private function _genAxTag($sId)
	{
		$iT0 = 0;
		$iTax = 1;
	
		$axTNs = $_axLS[$sId];

		// Returns sub array: Attributes
		$axAts = reset($axTNs);

		// Pops first key: Tag Name
		$sTN = key($axTNs);
		
		$sAts = "";
		$sCntnt = "";
		
		foreach ($axAts as $sA => $axAV)
		{
			$sAtVals = "";
			
			foreach ($axAV as $sAV => $axCts)
			{
				$sCntnt = "";
				
				foreach ($axCts as $sCt)
				{
					$sCntnt .= $sCt;
				}
				
				$sAtVals .= ";".$aV;
			}
			
			$sAts .= " ".$sA.'="'.$sAtVals.'"';
		}
		
		_genTag($sTN, $sAts, $sCntnt);
	}

	
	//// Generates the HTML Tag string
	//
	private function _genTag($sTN, $aAts, $vTagTail = self::nostr)
	{	
		$sHead = '<'.$sTN.$aAts;
		
		switch ($vTagTail)
		{
			case self::nostr:
				$sTail = "></".$sTN.">";
			break;
			case self::closed:
				$sTail = " />";
			break;
			default:
				$sTail = ">".$vTTail."</".$sTN.">";
		}
		
		return $sHead.$sTail;
	}
	
		
	//// Generates the XHTML document 
	//
	function _genDoc()
	{
		_cleanGenTree();
	
		$sBodyCntnt = _parseGenTree($this->_axGT);
		
		$sDoc = _gDoc($sBodyCntnt);
		
		return $sDoc;
	}

	
	####
	#### GET METHODS
	####
	
	//// Return a GenTree through Tag name call
	//
	private function _gGTTN($sTN)
	{
		$this->_sLTN = $sTN;
	
		$this->_sLAId = $this->_genId();

		$this->_axGT[$this->_sLAId][$this->_sLTN] = array(array());
		
		$this->_rLAId = &$this->_axGT[$this->_sLAId];
		$this->_rLATNT = &$this->_axGT[$this->_sLAId][$this->_sLTN];
		
		return $this->_rLAId;
	}
	
	//// Return a GenTree through id call
	//
	private function _gGTId($sId)
	{
		$this->_sLTN = "div";
	
		$this->_sLAId = $sId;

		$this->_axGT[$this->_sLAId][$this->_sLTN] = array(array());
		
		$this->_rLAId = &$this->_axGT[$this->_sLAId];
		$this->_rLATNT = &$this->_axGT[$this->_sLAId][$this->_sLTN];
		
		return $this->_rLAId;
	}
	
	//// Assembles and returns the document head
	//
	private function _gHead()
	{
		$sHead = _genTag("head", self::nostr, $sBodyCntnt);
		
		return $sHead;
	}
	
	//// Assembles and returns the XHTML document
	//
	private function _gDoc($sBodyCntnt)
	{
		$sB = _genTag("body", self::nostr, $sBodyCntnt);
	
		$sH = _gHead();

		$sDoc = <<<XHTML
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$this->_sDL.'" lang="'.$this->_sDL.'">
XHTML;
	
		$sDoc .= $sH.$sB.'</html>';
	
		return $sDoc;
	}
	
	private function

####
#### PUBLIC METHODS
####
	
	//// PiP constructor
	//
	//   @param		Constant value indicating a read or write 
	//
	//
	public function __construct($cS, $sO = self::nostr, $sL = self::nostr)
	{
		$this->_sDT = (strlen($sT) ? $sT : self::_PdgenDT)
		
		if (strlen($sL))
			$this->_sDL = $
	
		$this->_axGT = array(array(array(array())));
		
		$this->_sBId = $this->_genId();
		
		$this->_axBET = array($this->_sBId => array());
	}
	
	//// Registers an Id for a default div Tag
	//
	//   @param		Id of the created div or Tag name if passed
	//   @param		Tag name associated with the passed Id
	//
	public function Reg($sId, $sTN)
	{
		$this->_sLId = $sId;
		$this->_aIds[] = $this->_sLId;
		$this->_oLId = &$this->_aAttributes[$sId];
	}
	
	//// Sets the Id of a current Tag
	//
	//   @param		Id to set to the current Tag
	//
	public function Set($sId)
	{
		
	}
	
	//// Insert a GenTree reference in the current element
	//
	//   @param		GenTree reference
	//
	//   @return	Returs the reference of the inserted GenTree
	//
	public function Insert($rGT)
	{
		_insert($rGT);
	
		return $rGT;
	}
	
	//// Sets a Tag element
	//
	//   @param		Tag name of the element to create
	//
	//   @return	Returns the element GenTree
	//
	public function Tag($sTagName)
	{
		return _gGTTN($sTagName);
	}
	
	//// Sets a content to a defined tag or id
	//
	//   @param		Content to tag or default div
	//
	public function Content($sCntnt)
	{
		$this->_axGT[$this->_lid][$this->_ltag][$this->_lat][$sVal][$sCntnt];
	}
	
	//// Prints the HTML string
	//
	//   @return	Returns the XHTML document
	//
	public function Flush()
	{
		$sHTML = _generateDocument();
	
		echo $sHTML;
	}
}


?>