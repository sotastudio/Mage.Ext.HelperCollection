<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    SotaStudio
 * @package     SotaStudio_HelperCollection
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Date Helper functions
 *
 * @author     Andy Hausmann <andy@sota-studio.de>
 */

class SotaStudio_HelperCollection_Helper_Date extends Mage_Core_Helper_Abstract
{
	/**
	 * Evaluated a date
	 *
	 * @param mixed  $date  The desired date to evaluate.
	 * @return bool
	 */
	protected function isValidDate($date)
	{
		$date = $this->getArrayFromDate($date);
		return ( checkdate($date['m'], $date['d'], $date['y']) ) ? true : false;
	}

	/**
	 * Returns an array from the given date.
	 * The format reads as follows:
	 *  array('y' => x, 'm' => y, 'd' => z)
	 *
	 * @param string  $date  The given date as string.
	 * @return array  The generated Array from date.
	 */
	protected function getArrayFromDate($date)
	{
		$date = strtotime($date);
		$dateArray = array(
			'y' => date('y', $date),
			'm' => date('m', $date),
			'd' => date('d', $date),
		);
		return $dateArray;
	}
}