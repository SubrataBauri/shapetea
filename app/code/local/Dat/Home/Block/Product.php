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

//    function getReviews() {
//
//        $reviews = Mage::getModel('review/review')->getResourceCollection();
//
//        $reviews->addStoreFilter(Mage::app()->getStore()->getId())
//                ->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
//                ->setDateOrder()
//                ->addRateVotes()
//                ->load();
//        return $reviews;
//    }
    public function getReviewsCollection() {

        $reviewscollection = Mage::getModel('review/review')->getCollection();
        $reviewscollection->getSelect()->joinLeft(array('rating' => Mage::getSingleton("core/resource")
                    ->getTableName('rating_option_vote')), 'main_table.review_id = rating.review_id', 
                        array('rating.percent'));
        $reviewscollection->getSelect()->order('rating.percent DESC')
                                        ->limit(3);
        //Mage::log($reviewscollection->getSelectSql(true));
        return $reviewscollection;
    }

    public function getRating($review_id) {
        $rating = Mage::getModel('rating/rating_option_vote')
                ->getResourceCollection()
                ->addFieldToFilter('review_id', $review_id);


        return $rating;
    }

}
