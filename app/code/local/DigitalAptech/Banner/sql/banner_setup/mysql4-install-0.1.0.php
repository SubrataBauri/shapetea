<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table banner(banner_id int not null auto_increment, 
title varchar(255) NOT NULL,
image varchar(255) NOT NULL,
details text NOT NULL,
url varchar(255) NOT NULL,
status int (11) NOT NULL,
primary key(banner_id));
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 