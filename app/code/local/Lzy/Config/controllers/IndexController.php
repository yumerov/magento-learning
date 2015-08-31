<?php

/**
 * Basic controller for module configuration value testing
 *
 * @author Levent Yumerov
 */
class Lzy_Config_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction ()
	{
		/** @var Lzy_Config_Helper_Data */
		$data = Mage::helper('lzy_config');
		$coolnessLevel = $data->getCoolnesslevel();
		$output = "Your coolness level is: ";
		$output .= $coolnessLevel . "\n";

		echo $output;
	}
}