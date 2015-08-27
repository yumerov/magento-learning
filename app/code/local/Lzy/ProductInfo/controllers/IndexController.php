<?php

/**
 * Basic controller for product info extracting
 *
 * @author Levent Yumerov
 */
class Lzy_ProductInfo_IndexController extends Mage_Core_Controller_Front_Action
{
	/**
	 * Basic action for product info extracting.
	 *
	 * Just 'curl' in CLI {domain}/productinfo/?id={id}
	 */
	public function indexAction ()
	{
		$productId = $this->getRequest()->getParam('id');

		/** @var Mage_Catalog_Model_Product */
		$product = Mage::getModel('catalog/product');
		$product->load($productId);

		$output = 'Product ID: ' . $product->getId() . "\n";
		$output .= "Product Name: " . $product->getName() . "\n";
		$output .= "Product Description: " . $product->getDescription() . "\n";
		$output .= "Product Status: " . $product->getStatus() . "\n";

		echo $output;
	}
}