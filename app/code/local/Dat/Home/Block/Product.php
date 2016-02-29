<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dat_Home_Block_Product extends Mage_Core_Block_Template {

    public function __construct() {
        parent::__construct();
    }

    public function getLoadedProductCollection() {
        $product_collection = array();

        $products = Mage::getModel('catalog/product')->getCollection()
                ->addAttributeToSelect(array('name', 'price', 'special_price', 'show_in_homepage', 'small_image'))
                //->addAttributeToFilter('special_price', array('neq' => 0))
                ->addAttributeToFilter('show_in_homepage', 1);
        $products->getSelect()->limit(4);
        return $products;
    }

}
