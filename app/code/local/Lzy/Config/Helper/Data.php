<?php

class Lzy_Config_Helper_Data extends Mage_Core_Helper_Abstract
{
	const COOLNESS_LEVEL_KEY = 'lzy_config_options/lzyconfigone/coolnesslevel';

	public function getCoolnessLevel()
	{
		return Mage::getStoreConfig(self::COOLNESS_LEVEL_KEY);
	}
}