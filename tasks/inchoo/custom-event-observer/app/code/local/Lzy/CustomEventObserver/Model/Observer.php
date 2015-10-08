<?php

class Lzy_CustomEventObserver_Model_Observer
{
	public function listen(Varien_Event_Observer $observer)
	{
		Mage::log($observer->getEvent()->getData(), NULL, 'products.log');
	}
}