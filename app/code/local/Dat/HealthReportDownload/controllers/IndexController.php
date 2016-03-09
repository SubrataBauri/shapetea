<?php

class Dat_HealthReportDownload_IndexController extends Mage_Core_Controller_Front_Action {

    public function reportdownloadAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

    public function getfreereportAction() {
        $this->loadLayout();
        $this->renderLayout();
        $post = $this->getRequest()->getPost();
        $customerEmail = $post['email'];
        $customerFirstName = $post['fname'];
        $customerLastName = $post['lname'];

        $address = Mage::helper('healthreportdownload')->getAddress();
        $email = $address[0]; /* Receiver Email */
        $name = $address[1]; /* Receiver Name */
        try {
            echo $foo;
            $emailTemplate = Mage::getModel('core/email_template')->loadDefault('health_report_download_email');

            $emailTemplate->setSenderName($name);  /* Sender Name */
            $emailTemplate->setSenderEmail($email); /* Sender Email */

            $templateParams = array("customerEmail" => $customerEmail, "customerFirstName" => $customerFirstName, "customerLastName" => $customerLastName, "name" => $name, "email" => $email);

            $emailTemplate->send($email, $name, $templateParams);
        } catch (Exception $e) {
            
            Mage::getSingleton('core/session')->addError('Error sending mail ' . $e->getMessage());
           
        }
    }

}
