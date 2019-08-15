<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha
 * @developer MaWoScha
 * @version   0.1.0
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class German_LocalePackBr_Block_System_Config_Form_Fieldset_Instructions
    extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
    	$nodepath = "modules/German_LocalePackBr";
        $helper = Mage::helper("localepackbr");

        $modules = Mage::getConfig()->getNode('modules')->children();
        $section_link = Mage::helper('adminhtml')->getUrl('adminhtml/system_config/edit', array('section'=>'general'));

        $html  = $this->_getHeaderHtml($element);
        $html .= "<p style='font-weight:bold;'>";
        $html .= $helper->__("The %s language pack in version %s has been successfully installed.",
        		(string)Mage::app()->getConfig()->getNode($nodepath.'/locale'),
        		(string)Mage::app()->getConfig()->getNode($nodepath.'/version') );
        $html .= "</p>";
	if (!array_key_exists("German_LocaleFallback", $modules)) {
        $html .= "<p>".$helper->__("Note: Install the extension %s, so you can use %s as a <a href='%s'>fallback language</a>.",
        		"<a href='https://github.com/MaWoScha/German_LocaleFallback'>German LocaleFallback</a>",
        		"pt_PT",
        		$section_link )."</p>";
	} else if (!array_key_exists("German_LocalePackPt", $modules)) {
        $html .= "<p>".$helper->__("Note: Install the language package %s to use it as a <a href='%s'>fallback language</a>.",
        		"<a href='https://github.com/MaWoScha/German_LocalePack_pt_PT'>German LocalePackPt</a>",
        		$section_link )."</p>";
	}
        $html .= "<p style='margin-top:20pt;'>";
		$html .= $helper->__("On the <a href='%s'>Magento Connect page of the Brazilian language pack</a>, you can find more information on the latest versions.",
				(string)Mage::app()->getConfig()->getNode($nodepath.'/link_mage') );
        $html .= "</p>";
        $html .= "<p style='margin-top:20pt;'>";
		$html .= $helper->__("For those interested there is a <a href='%s'>GitHub repository</a>. It is provided for the following purposes:",
				(string)Mage::app()->getConfig()->getNode($nodepath.'/link_git') );
        $html .= "</p>";

		$html .= "<ul style='list-style-position: outside; list-style-type: disc; margin-left:18px;'>";
		$html .= "<li>".$helper->__("Development of current language pack versions")."</li>";
		$html .= "<li>".$helper->__("Report an error / send in patches, also happy for both published releases")."</li>";
		$html .= "<li>".$helper->__("Alternative Downloads (regardless of official sources)")."</li>";
		$html .= "<li>".$helper->__("Copy / forks for their own purposes")."</li>";
		$html .= "<li>".$helper->__("Active participation in the language pack")."</li>";
		$html .= "<li>".$helper->__("View Preview versions & test")."</li>";
		$html .= '</ul>';

        $html .= "<p style='margin-top:20pt;'>";
		$html .= $helper->__("Note for detailed information, the README file on the GitHub page.");
        $html .= "</p>";
        $html .= "<p style='font-weight:bold;'>";
		$html .= $helper->__("In order to ensure the translation Magento coverage, please see the information in the lower paragraphs!");
        $html .= "</p>";
        $html .= "<p style='text-align:right;'>";
        $html .= $helper->__("powered by")." <a href='http://blog.siempro.co/' target='_blank'>MaWoScha</a>";
        $html .= "</p>";
        $html .= $this->_getFooterHtml($element);

        return $html;
    }
}
