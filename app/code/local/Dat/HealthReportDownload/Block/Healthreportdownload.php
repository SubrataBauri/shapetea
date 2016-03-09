<?php

class Dat_HealthReportDownload_Block_Healthreportdownload extends Mage_Core_Block_Template {

    public function __construct() {
        parent::__construct();
        $this->setTemplate('HealthReportDownload/healthreportdownload.phtml');
    }

    public function test() {
        $a = 10;
        echo 'hii';
        return $a;
    }

}
