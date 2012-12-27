# HelperCollection

## What does it do?

The module makes some Helper globally accessible, which is very useful for Module Development within Magento.

## How to use?

You can access the helper stuff within your Templates via

	$this->helper('helper_collection/classname');

or from elsewhere via

	Mage::helper('helper_collection/classname');