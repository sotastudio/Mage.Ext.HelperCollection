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
 * Array Helper functions
 *
 * @author     Andy Hausmann <andy@sota-studio.de>
 */

class SotaStudio_HelperCollection_Helper_Array extends Mage_Core_Helper_Abstract
{

	/**
	 * Transforms an array into a string with optional wraps.
	 *
	 * @param mixed $array The array to process.
	 * @param string $itemWrap Wrap for each array item, eg. "<li> | </li>".
	 * @param string $allWrap Wrap for the whole output, eg. "<ul> | </ul>".
	 * @return string The output.
	 */
	public function getListFromArray($array, $itemWrap = '', $allWrap = '')
	{
		if (is_array($array)) {
			$o = '';
			foreach ($array as $key => $val) {
				$o .= (strlen($itemWrap) != 0) ? Mage::helper('helper_collection/content')->wrap($val, str_replace("%s", $val, $itemWrap)) : $val;
			}
			return (strlen($allWrap) != 0) ? Mage::helper('helper_collection/content')->wrap($o, $allWrap) : $o;

		} else {
			return (strlen($itemWrap) != 0)
				? Mage::helper('helper_collection/content')->wrap($array, str_replace("%s", $array, $itemWrap))
				: $array;
		}
	}

	/**
	 * Explodes a string and trims all values for whitespace in the ends.
	 * If $removeEmptyValues is set, then all blank ('') values are removed.
	 *
	 * @static
	 * @param string $delim Delimiter string to explode with
	 * @param string $string The string to explode
	 * @param bool $removeEmptyValues If set, all empty values will be removed in output
	 * @param int $limit If positive, the result will contain a maximum of $limit elements, if negative, all components except the last -$limit are returned, if zero (default), the result is not limited at all. Attention though that the use of this parameter can slow down this function.
	 * @return array Exploded values
	 */
	public static function trimExplode($delim, $string, $removeEmptyValues = FALSE, $limit = 0)
	{
		$explodedValues = explode($delim, $string);

		$result = array_map('trim', $explodedValues);

		if ($removeEmptyValues) {
			$temp = array();
			foreach ($result as $value) {
				if ($value !== '') {
					$temp[] = $value;
				}
			}
			$result = $temp;
		}

		if ($limit != 0) {
			if ($limit < 0) {
				$result = array_slice($result, 0, $limit);
			} elseif (count($result) > $limit) {
				$lastElements = array_slice($result, $limit - 1);
				$result = array_slice($result, 0, $limit - 1);
				$result[] = implode($delim, $lastElements);
			}
		}

		return $result;
	}

}