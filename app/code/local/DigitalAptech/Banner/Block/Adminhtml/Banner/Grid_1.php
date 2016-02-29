<?php

class DigitalAptech_Banner_Block_Adminhtml_Banner_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("bannerGrid");
				$this->setDefaultSort("banner_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("banner/banner")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("banner_id", array(
				"header" => Mage::helper("banner")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "banner_id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("banner")->__("Title"),
				"index" => "title",
				));
				$this->addColumn("url", array(
				"header" => Mage::helper("banner")->__("URL"),
				"index" => "url",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('banner')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>DigitalAptech_Banner_Block_Adminhtml_Banner_Grid::getOptionArray3(),				
						));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('banner_id');
			$this->getMassactionBlock()->setFormFieldName('banner_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_banner', array(
					 'label'=> Mage::helper('banner')->__('Remove Banner'),
					 'url'  => $this->getUrl('*/adminhtml_banner/massRemove'),
					 'confirm' => Mage::helper('banner')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray3()
		{
            $data_array=array(); 
			$data_array[0]='Enabled';
			$data_array[1]='Disabled';
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
			foreach(DigitalAptech_Banner_Block_Adminhtml_Banner_Grid::getOptionArray3() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}