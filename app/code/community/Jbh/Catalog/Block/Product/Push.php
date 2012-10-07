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
 * Product_Push Block
 * @package Jbh_Catalog
 *
 * @method Jbh_Catalog_Block_Product_Push setProduct(Mage_Catalog_Model_Product $product)
 * @method Mage_Catalog_Model_Product getProduct()
 * @method Jbh_Catalog_Block_Product_Push setMode(string $mode)
 * @method string getMode()
 */
class Jbh_Catalog_Block_Product_Push extends Mage_Catalog_Block_Product_Abstract
{

    /**
     * Retreive the configuration
     * @access protected
     * @return Jbh_Catalog_Model_Product_Push_Config
     */
    protected function _getConfig()
    {
        return Mage::getSingleton('jbh_catalog/product_push_config');
    }

    /**
     * To HTML
     * @access protected
     * @thrown Mage_Core_Exception
     * @return string
     */
    protected function _toHtml()
    {
        // Which template?
        if (!$this->getTemplate()) {
            $templates = $this->_getConfig()->getTemplates($this->getMode());
            $typeId = $this->getProduct()->getTypeId();
            if (array_key_exists($typeId, $templates)) {
                $this->setTemplate($templates[$typeId]);
            } else {
                // No default template?
                if (!array_key_exists('default', $templates)) {
                    Mage::throwException('Please specify the default template for the product push.');
                }
                $this->setTemplate($templates['default']);
            }
        }

        return parent::_toHtml();
    }

}