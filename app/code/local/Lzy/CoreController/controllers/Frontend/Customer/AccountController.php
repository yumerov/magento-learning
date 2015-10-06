<?php


require_once Mage::getModuleDir('controllers', 'Mage_Customer')
	. DS . 'AccountController.php';

class Lzy_CoreController_Frontend_Customer_AccountController
	extends Mage_Customer_AccountController
{
	public function loginPostAction()
	{
		// override here mage core's login post action behavior
	}
}