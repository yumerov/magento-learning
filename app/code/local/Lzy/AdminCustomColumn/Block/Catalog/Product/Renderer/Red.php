<?php

class Lzy_AdminCustomColumn_Block_Catalog_Product_Renderer_Red
	extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render(Varien_Object $row)
	{
		$index = $this->getColumn()->getIndex();
		$value = $row->getData($index);
		return '<span style="color: red;">' . $value . '</span>';
	}
}