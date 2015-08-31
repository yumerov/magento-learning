<?php

class Lzy_Admin_AdminController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction ()
	{
		$block = $this->getLayout()
      ->createBlock('core/text', 'example-block')
      ->setText('<h1>This is a text block</h1>');
    $this->loadLayout();
    $this->_addContent($block);
    $this->renderLayout();
	}

	protected function _addContent(Mage_Core_Block_Abstract $block)
	{
		$this->getLayout()->getBlock('content')->append($block);
    return $this;
	}
}