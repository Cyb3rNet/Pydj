<?php


class XHTMLAttributeRule
{
	public function __construct()
	{
	
	}
	
	public function InsertRule($sAttrName, $cAttrValueType, $aAttrValues, $cAttrRequirement)
	{
	
	}
}


class XHTMLElementRule
{
	public function __construct($sTag, $oAttrRule, $sContentRule)
	{
		$this->_sTag = $sTag;
		$this->_oAttrRule = $oAttrRule;
		$this->_sContentRule = 
	}
	
	
	public function AppendAttributeRule($oAttributeRule)
	{
	
	}
}


class XHTMLDTD10Strict
{
	private $_aoRules;

	public function __construct()
	{
		$this->_aoRules = array();
	}
	
	static function GetDocType($sLang = 'en')
	{
		$sDoc = <<<XHTML
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="$sLang" lang="$sLang">
XHTML;
		return $sDoc;
	}
	
	private function _initRules()
	{


# <!--=================== Generic Attributes ===============================-->

# <!ENTITY % coreattrs
#  "id          ID             #IMPLIED
#   class       CDATA          #IMPLIED
#   style       CDATA   #IMPLIED
#   title       CDATA         #IMPLIED"
#   >

# <!ENTITY % i18n
#  "lang        CDATA #IMPLIED
#   xml:lang    CDATA #IMPLIED
#   dir         (ltr|rtl)      #IMPLIED"
#   >

# <!ENTITY % events
#  "onclick     CDATA       #IMPLIED
#   ondblclick  CDATA       #IMPLIED
#   onmousedown CDATA       #IMPLIED
#   onmouseup   CDATA       #IMPLIED
#   onmouseover CDATA       #IMPLIED
#   onmousemove CDATA       #IMPLIED
#   onmouseout  CDATA       #IMPLIED
#   onkeypress  CDATA       #IMPLIED
#   onkeydown   CDATA       #IMPLIED
#   onkeyup     CDATA       #IMPLIED"
#   >

# <!ENTITY % focus
#  "accesskey   CDATA    #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED"
#   >

# <!ENTITY % attrs "%coreattrs %i18n %events">

# <!--================ Document Structure ==================================-->

##
#
# <!ELEMENT html (head, body)>
# <!ATTLIST html
#   %i18n
#   xmlns       CDATA          #FIXED 'http://www.w3.org/1999/xhtml'
#   >

# <!--================ Document Head =======================================-->

##
#
# <!ELEMENT head ((script|style|meta|link|object)*,
#      ((title, (script|style|meta|link|object)*, (base, (script|style|meta|link|object)*)?) |
#       (base, (script|style|meta|link|object)*, (title, (script|style|meta|link|object)*))))>

##
#
# <!ATTLIST head
#   %i18n
#   profile     CDATA          #IMPLIED
#   >

##
#
# <!ELEMENT title (#PCDATA)>
# <!ATTLIST title %i18n>

##
#
# <!ELEMENT base EMPTY>
# <!ATTLIST base
#   href        CDATA          #IMPLIED
#   >

##
#
# <!ELEMENT meta EMPTY>
# <!ATTLIST meta
#   %i18n
#   http-equiv  CDATA          #IMPLIED
#   name        CDATA          #IMPLIED
#   content     CDATA          #REQUIRED
#   scheme      CDATA          #IMPLIED
#   >

##
#
# <!ELEMENT link EMPTY>
# <!ATTLIST link
#   %attrs
#   charset     CDATA      #IMPLIED
#   href        CDATA          #IMPLIED
#   hreflang    CDATA #IMPLIED
#   type        CDATA  #IMPLIED
#   rel         CDATA    #IMPLIED
#   rev         CDATA    #IMPLIED
#   media       CDATA    #IMPLIED
#   >

##
#
# <!ELEMENT style (#PCDATA)>
# <!ATTLIST style
#   %i18n
#   type        CDATA  #REQUIRED
#   media       CDATA    #IMPLIED
#   title       CDATA         #IMPLIED
#   xml:space   (preserve)     #FIXED 'preserve'
#   >

##
#
# <!ELEMENT script (#PCDATA)>
# <!ATTLIST script
#   charset     CDATA      #IMPLIED
#   type        CDATA  #REQUIRED
#   src         CDATA          #IMPLIED
#   defer       (defer)        #IMPLIED
#   xml:space   (preserve)     #FIXED 'preserve'
#   >

##
#
# <!ELEMENT noscript (p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | ins | del | script | noscript)*>
# <!ATTLIST noscript
#   %attrs
#   >

# <!--=================== Document Body ====================================-->

##
#
# <!ELEMENT body (p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | ins | del | script | noscript)*>
# <!ATTLIST body
#   %attrs
#   onload          CDATA   #IMPLIED
#   onunload        CDATA   #IMPLIED
#   >

##
#
# <!ELEMENT div (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>  <!-- generic language/style container -->
# <!ATTLIST div
#   %attrs
#   >

# <!--=================== Paragraphs =======================================-->

##
#
# <!ELEMENT p (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST p
#   %attrs
#   >

# <!--=================== Headings =========================================-->

##
#
# <!ELEMENT h1  (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h1
#    %attrs
#    >

##
#
# <!ELEMENT h2 (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h2
#    %attrs
#    >

##
#
# <!ELEMENT h3 (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h3
#    %attrs
#    >

##
#
# <!ELEMENT h4 (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h4
#    %attrs
#    >

##
#
# <!ELEMENT h5 (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h5
#    %attrs
#    >

##
#
# <!ELEMENT h6 (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST h6
#    %attrs
#    >

# <!--=================== Lists ============================================-->

##
#
# <!ELEMENT ul (li)+>
# <!ATTLIST ul
#   %attrs
#   >

##
#
# <!ELEMENT ol (li)+>
# <!ATTLIST ol
#   %attrs
#   >

##
#
# <!ELEMENT li (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST li
#   %attrs
#   >

##
#
# <!ELEMENT dl (dt|dd)+>
# <!ATTLIST dl
#   %attrs
#   >

##
#
# <!ELEMENT dt (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST dt
#   %attrs
#   >

##
#
# <!ELEMENT dd (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST dd
#   %attrs
#   >

# <!--=================== Address ==========================================-->

##
#
# <!ELEMENT address (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST address
#   %attrs
#   >

# <!--=================== Horizontal Rule ==================================-->

##
#
# <!ELEMENT hr EMPTY>
# <!ATTLIST hr
#   %attrs
#   >

# <!--=================== Preformatted Text ================================-->

##
#
# <!ELEMENT pre (#PCDATA | a | br | span | bdo | map | tt | i | b | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button)*>
# <!ATTLIST pre
#   %attrs
#   xml:space (preserve) #FIXED 'preserve'
#   >

# <!--=================== Block-like Quotes ================================-->

##
#
# <!ELEMENT blockquote (p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | ins | del | script | noscript)*>
# <!ATTLIST blockquote
#   %attrs
#   cite        CDATA          #IMPLIED
#   >

# <!--=================== Inserted/Deleted Text ============================-->

##
#
# <!ELEMENT ins (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST ins
#   %attrs
#   cite        CDATA          #IMPLIED
#   datetime    CDATA     #IMPLIED
#   >

##
#
# <!ELEMENT del (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST del
#   %attrs
#   cite        CDATA          #IMPLIED
#   datetime    CDATA     #IMPLIED
#   >

# <!--================== The Anchor Element ================================-->

##
#
# <!ELEMENT a (#PCDATA | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST a
#   %attrs
#   charset     CDATA      #IMPLIED
#   type        CDATA  #IMPLIED
#   name        NMTOKEN        #IMPLIED
#   href        CDATA          #IMPLIED
#   hreflang    CDATA #IMPLIED
#   rel         CDATA    #IMPLIED
#   rev         CDATA    #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   shape       (rect|circle|poly|default)        "rect"
#   coords      CDATA       #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   >

# <!--===================== Inline Elements ================================-->

##
#
# <!ELEMENT span (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*> <!-- generic language/style container -->
# <!ATTLIST span
#   %attrs
#   >

##
#
# <!ELEMENT bdo (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>  <!-- I18N BiDi over-ride -->
# <!ATTLIST bdo
#   %coreattrs
#   %events
#   lang        CDATA #IMPLIED
#   xml:lang    CDATA #IMPLIED
#   dir         (ltr|rtl)      #REQUIRED
#   >

##
#
# <!ELEMENT br EMPTY>   <!-- forced line break -->
# <!ATTLIST br
#   %coreattrs
#   >

##
#
# <!ELEMENT em (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- emphasis -->
# <!ATTLIST em %attrs>

##
#
# <!ELEMENT strong (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- strong emphasis -->
# <!ATTLIST strong %attrs>

##
#
# <!ELEMENT dfn (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- definitional -->
# <!ATTLIST dfn %attrs>

##
#
# <!ELEMENT code (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- program code -->
# <!ATTLIST code %attrs>

##
#
# <!ELEMENT samp (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- sample -->
# <!ATTLIST samp %attrs>

##
#
# <!ELEMENT kbd (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>  <!-- something user would type -->
# <!ATTLIST kbd %attrs>

##
#
# <!ELEMENT var (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- variable -->
# <!ATTLIST var %attrs>

##
#
# <!ELEMENT cite (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- citation -->
# <!ATTLIST cite %attrs>

##
#
# <!ELEMENT abbr (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- abbreviation -->
# <!ATTLIST abbr %attrs>

##
#
# <!ELEMENT acronym (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- acronym -->
# <!ATTLIST acronym %attrs>

##
#
# <!ELEMENT q (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- inlined quote -->
# <!ATTLIST q
#   %attrs
#   cite        CDATA          #IMPLIED
#   >

##
#
# <!ELEMENT sub (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*> <!-- subscript -->
# <!ATTLIST sub %attrs>

##
#
# <!ELEMENT sup (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*> <!-- superscript -->
# <!ATTLIST sup %attrs>

##
#
# <!ELEMENT tt (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- fixed pitch font -->
# <!ATTLIST tt %attrs>

##
#
# <!ELEMENT i (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- italic font -->
# <!ATTLIST i %attrs>

##
#
# <!ELEMENT b (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- bold font -->
# <!ATTLIST b %attrs>

##
#
# <!ELEMENT big (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- bigger font -->
# <!ATTLIST big %attrs>

##
#
# <!ELEMENT small (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>   <!-- smaller font -->
# <!ATTLIST small %attrs>

# <!--==================== Object ======================================-->

##
#
# <!ELEMENT object (#PCDATA | param | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST object
#   %attrs
#   declare     (declare)      #IMPLIED
#   classid     CDATA          #IMPLIED
#   codebase    CDATA          #IMPLIED
#   data        CDATA          #IMPLIED
#   type        CDATA  #IMPLIED
#   codetype    CDATA  #IMPLIED
#   archive     CDATA      #IMPLIED
#   standby     CDATA         #IMPLIED
#   height      CDATA       #IMPLIED
#   width       CDATA       #IMPLIED
#   usemap      CDATA          #IMPLIED
#   name        NMTOKEN        #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   >

##
#
# <!ELEMENT param EMPTY>
# <!ATTLIST param
#   id          ID             #IMPLIED
#   name        CDATA          #IMPLIED
#   value       CDATA          #IMPLIED
#   valuetype   (data|ref|object) "data"
#   type        CDATA  #IMPLIED
#   >

# <!--=================== Images ===========================================-->

##
#
# <!ELEMENT img EMPTY>
# <!ATTLIST img
#   %attrs
#   src         CDATA          #REQUIRED
#   alt         CDATA         #REQUIRED
#   longdesc    CDATA          #IMPLIED
#   height      CDATA       #IMPLIED
#   width       CDATA       #IMPLIED
#   usemap      CDATA          #IMPLIED
#   ismap       (ismap)        #IMPLIED
#   >

# <!--================== Client-side image maps ============================-->

##
#
# <!ELEMENT map ((p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | ins | del | script | noscript)+ | area+)>
# <!ATTLIST map
#   %i18n
#   %events
#   id          ID             #REQUIRED
#   class       CDATA          #IMPLIED
#   style       CDATA   #IMPLIED
#   title       CDATA         #IMPLIED
#   name        NMTOKEN        #IMPLIED
#   >

##
#
# <!ELEMENT area EMPTY>
# <!ATTLIST area
#   %attrs
#   shape       (rect|circle|poly|default)        "rect"
#   coords      CDATA       #IMPLIED
#   href        CDATA          #IMPLIED
#   nohref      (nohref)       #IMPLIED
#   alt         CDATA         #REQUIRED
#   tabindex    CDATA       #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   >

# <!--================ Forms ===============================================-->

##
#
# <!ELEMENT form (p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | ins | del | script | noscript)*>   <!-- forms shouldn't be nested -->
# <!ATTLIST form
#   %attrs
#   action      CDATA          #REQUIRED
#   method      (get|post)     "get"
#   enctype     CDATA  "application/x-www-form-urlencoded"
#   onsubmit    CDATA       #IMPLIED
#   onreset     CDATA       #IMPLIED
#   accept      CDATA #IMPLIED
#   accept-charset CDATA  #IMPLIED
#   >

##
#
# <!ELEMENT label (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST label
#   %attrs
#   for         IDREF          #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   >

##
#
# <!ELEMENT input EMPTY>     <!-- form control -->
# <!ATTLIST input
#   %attrs
#   type        (text | password | checkbox | radio | submit | reset | file | hidden | image | button)    "text"
#   name        CDATA          #IMPLIED
#   value       CDATA          #IMPLIED
#   checked     (checked)      #IMPLIED
#   disabled    (disabled)     #IMPLIED
#   readonly    (readonly)     #IMPLIED
#   size        CDATA          #IMPLIED
#   maxlength   CDATA       #IMPLIED
#   src         CDATA          #IMPLIED
#   alt         CDATA          #IMPLIED
#   usemap      CDATA          #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   onselect    CDATA       #IMPLIED
#   onchange    CDATA       #IMPLIED
#   accept      CDATA #IMPLIED
#   >

##
#
# <!ELEMENT select (optgroup|option)+>  <!-- option selector -->
# <!ATTLIST select
#   %attrs
#   name        CDATA          #IMPLIED
#   size        CDATA       #IMPLIED
#   multiple    (multiple)     #IMPLIED
#   disabled    (disabled)     #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   onchange    CDATA       #IMPLIED
#   >

##
#
# <!ELEMENT optgroup (option)+>   <!-- option group -->
# <!ATTLIST optgroup
#   %attrs
#   disabled    (disabled)     #IMPLIED
#   label       CDATA         #REQUIRED
#   >

##
#
# <!ELEMENT option (#PCDATA)>     <!-- selectable choice -->
# <!ATTLIST option
#   %attrs
#   selected    (selected)     #IMPLIED
#   disabled    (disabled)     #IMPLIED
#   label       CDATA         #IMPLIED
#   value       CDATA          #IMPLIED
#   >

##
#
# <!ELEMENT textarea (#PCDATA)>     <!-- multi-line text field -->
# <!ATTLIST textarea
#   %attrs
#   name        CDATA          #IMPLIED
#   rows        CDATA       #REQUIRED
#   cols        CDATA       #REQUIRED
#   disabled    (disabled)     #IMPLIED
#   readonly    (readonly)     #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   onselect    CDATA       #IMPLIED
#   onchange    CDATA       #IMPLIED
#   >

##
#
# <!ELEMENT fieldset (#PCDATA | legend | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST fieldset
#   %attrs
#   >

##
#
# <!ELEMENT legend (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>     <!-- fieldset label -->
# <!ATTLIST legend
#   %attrs
#   accesskey   CDATA    #IMPLIED
#   >

##
#
# <!ELEMENT button (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | table | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | ins | del | script | noscript)*>  <!-- push button -->
# <!ATTLIST button
#   %attrs
#   name        CDATA          #IMPLIED
#   value       CDATA          #IMPLIED
#   type        (button|submit|reset) "submit"
#   disabled    (disabled)     #IMPLIED
#   tabindex    CDATA       #IMPLIED
#   accesskey   CDATA    #IMPLIED
#   onfocus     CDATA       #IMPLIED
#   onblur      CDATA       #IMPLIED
#   >

# <!--======================= Tables =======================================-->

# <!ENTITY %CAlign "(top|bottom|left|right)">

# <!ENTITY % cellhalign
#   "align      (left|center|right|justify|char) #IMPLIED
#    char       CDATA    #IMPLIED
#    charoff    CDATA       #IMPLIED"
#   >

# <!ENTITY % cellvalign
#   "valign     (top|middle|bottom|baseline) #IMPLIED"
#   >

##
#
# <!ELEMENT table
#      (caption?, (col*|colgroup*), thead?, tfoot?, (tbody+|tr+))>
# <!ATTLIST table
#   %attrs
#   summary     CDATA         #IMPLIED
#   width       CDATA       #IMPLIED
#   border      CDATA       #IMPLIED
#   frame       (void|above|below|hsides|lhs|rhs|vsides|box|border)       #IMPLIED
#   rules       (none | groups | rows | cols | all)       #IMPLIED
#   cellspacing CDATA       #IMPLIED
#   cellpadding CDATA       #IMPLIED
#   >

##
#
# <!ELEMENT caption  (#PCDATA | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST caption
#   %attrs
#   >

##
#
# <!ELEMENT thead    (tr)+>
# <!ATTLIST thead
#   %attrs
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT tfoot    (tr)+>
# <!ATTLIST tfoot
#   %attrs
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT tbody    (tr)+>
# <!ATTLIST tbody
#   %attrs
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT colgroup (col)*>
# <!ATTLIST colgroup
#   %attrs
#   span        CDATA       "1"
#   width       CDATA  #IMPLIED
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT col      EMPTY>
# <!ATTLIST col
#   %attrs
#   span        CDATA       "1"
#   width       CDATA  #IMPLIED
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT tr       (th|td)+>
# <!ATTLIST tr
#   %attrs
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT th       (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST th
#   %attrs
#   abbr        CDATA         #IMPLIED
#   axis        CDATA          #IMPLIED
#   headers     IDREFS         #IMPLIED
#   scope       (row|col|rowgroup|colgroup)        #IMPLIED
#   rowspan     CDATA       "1"
#   colspan     CDATA       "1"
#   %cellhalign
#   %cellvalign
#   >

##
#
# <!ELEMENT td       (#PCDATA | p | h1|h2|h3|h4|h5|h6 | div | ul | ol | dl | pre | hr | blockquote | address | fieldset | table | form | a | br | span | bdo | object | img | map | tt | i | b | big | small | em | strong | dfn | code | q | sub | sup | samp | kbd | var | cite | abbr | acronym | input | select | textarea | label | button | ins | del | script | noscript)*>
# <!ATTLIST td
#   %attrs
#   abbr        CDATA         #IMPLIED
#   axis        CDATA          #IMPLIED
#   headers     IDREFS         #IMPLIED
#   scope       (row|col|rowgroup|colgroup)        #IMPLIED
#   rowspan     CDATA       "1"
#   colspan     CDATA       "1"
#   %cellhalign
#   %cellvalign
#   >

		$this->_aoRules[$sTag] = $oXHTMLElementRule;
	}
	
	public function GetRuleByTagName($sTag)
	{
		return $this->_aoRules[$sTag];
	}
}


?>