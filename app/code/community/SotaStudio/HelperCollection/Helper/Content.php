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
 * Content Helper functions
 *
 * @author     Andy Hausmann <andy@sota-studio.de>
 */

class SotaStudio_HelperCollection_Helper_Content extends Mage_Core_Helper_Abstract
{

	/**
	 * Wrapping a string.
	 *
	 * Example: $content = "HELLO WORLD" and $wrap = "<strong> | </strong>", result: "<strong>HELLO WORLD</strong>"
	 *
	 * @param string $content The content to wrap
	 * @param string $wrap The wrap value, eg. "<strong> | </strong>"
	 * @param string $char The char used to split the wrapping value, default is "|"
	 * @return string The wrapped output.
	 */
	public function wrap($content, $wrap, $char = '|')
	{
		if ($wrap) {
			$wrapArr = explode($char, $wrap);
			return trim($wrapArr[0]) . $content . trim($wrapArr[1]);
		} else return $content;
	}

	/**
	 * Shortens a string to the defined length taking account into NOT cutting words.
	 *
	 * The output can be defined trough several parameters.
	 *
	 * @param $str String to shorten.
	 * @param $length The desired length of the output string.
	 * @param int $minword Amount of mininmal words to keep.
	 * @param string $extension String which should wrap the end of the output string, e.g.: ...
	 * @return string
	 */
	public function shorten($str, $length, $minword = 3, $extension = '...')
	{
		$sub = '';
		$len = 0;

		foreach (explode(' ', $str) as $word)
		{
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);

			if (strlen($word) > $minword && strlen($sub) >= $length)
			{
				break;
			}
		}

		return $sub . (($len < strlen($str)) ? $extension : '');
	}

}