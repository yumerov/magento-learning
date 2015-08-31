<?php

class Lzy_AdminCustomColumn_Block_Catalog_Product_Grid
	extends Mage_Adminhtml_Block_Catalog_Product_Grid
{

	public function setCollection($collection)
	{
		$store = $this->_getStore();

		$joinAttribute = ($store->getId() &&
			!isset($this->_joinAttributes['short_description']));
		if ($joinAttribute) {
			$collection->joinAttribute(
				'short_description',
				'catalog_product/short_description',
				'entity_id',
				NULL,
				'left',
				$store->getId()
				);
		} else {
			$collection->addAttributeToSelect('short_description');
		}

		parent::setCollection($collection);
	}

	protected function _prepareColumns()
	{
		$renderer =
			'Lzy_AdminCustomColumn_Block_Catalog_Product_Renderer_Red';
		$column = array(
			'header'=> Mage::helper('catalog')->__('Short description'),
			'index'=> 'short_description',
			'renderer'  => $renderer,
		);
		$this->addColumnAfter('short_description', $column, 'name');

		return parent::_prepareColumns();
	}
}
