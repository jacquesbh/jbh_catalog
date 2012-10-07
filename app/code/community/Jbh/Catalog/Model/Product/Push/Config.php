<?php
/**
 * This file is part of Jbh_Catalog for Magento.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @category Jbh
 * @package Jbh_Catalog
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

/**
 * Product_Push_Config Model
 * @package Jbh_Catalog
 */
class Jbh_Catalog_Model_Product_Push_Config extends Mage_Core_Model_Abstract
{

    /**
     * Modes
     * @const XML_PATH_MODES string
     */
    const XML_PATH_MODES = 'jbh/catalog/product/push/modes';

    /**
     * Push block templates by types
     * @const XML_PATH_TEMPLATES string
     */
    const XML_PATH_TEMPLATES = 'jbh/catalog/product/push/modes/%1$s/templates';

    /**
     * Retreive the defined modes
     * @access public
     * @return array
     */
    public function getModes()
    {
        return array_keys((array) Mage::getConfig()->getNode(sprintf(self::XML_PATH_MODES)));
    }

    /**
     * Retreive templates by types for a specific mode
     * @param string $mode The mode (like grid, list or default for example)
     * @access public
     * @return array
     */
    public function getTemplates($mode)
    {
        $modes = $this->getModes();
        if (is_null($mode) || !in_array($mode, $modes)) {
            $mode = 'default';
        }
        return (array) Mage::getConfig()->getNode(sprintf(self::XML_PATH_TEMPLATES, $mode));
    }

}