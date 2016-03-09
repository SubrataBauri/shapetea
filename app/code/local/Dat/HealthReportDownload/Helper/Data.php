<?php

class Dat_HealthReportDownload_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getAddress() { 
      
        $email = Mage::getStoreConfig('healthreportdownload/healthreportdownload_group/healthreportdownload_field_email');
        $name = Mage::getStoreConfig('healthreportdownload/healthreportdownload_group/healthreportdownload_field_name');
        $address = array($email,$name);
        return $address;
    }

}
