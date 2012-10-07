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
 * Product Helper
 * @package Jbh_Catalog
 */
class Jbh_Catalog_Helper_Product extends Mage_Core_Helper_Abstract
{

    /**
     * Retreive the push
     * @access public
     * @return string
     */
    public function getPush($product, $mode = null)
    {
        // Product required
        if (!$product instanceof Mage_Catalog_Model_Product) {
            $product = Mage::getModel('catalog/product')->load((int) $product);
        }

        // The block
        $block = Mage::app()->getLayout()->createBlock('jbh_catalog/product_push');
        $block->setProduct($product);
        $block->setMode($mode);

        return $block;
    }

    /**
     * Retreive the push's HTML
     * @access public
     * @return string
     */
    public function getPushHtml($product, $mode = null)
    {
        return ($block = $this->getPush($product, $mode)) ? $block->toHtml() : null;
    }

}