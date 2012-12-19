<?php
/**
 * Global Helper functions
 *
 * @category   Mage
 * @package    SotaStudio_HelperCollection
 * @author     Andy Hausmann <andy@sota-studio.de>
 */

class SotaStudio_HelperCollection_Helper_Div extends Mage_Core_Helper_Abstract
{

	/**
	 * Removes accents from string
	 *
	 * Used to e.g. remove german umlauts. It actually does not transfer Ã¤ to ae, and such, but it transfers into a, o and u.
	 *
	 * @param $string String to unaccent.
	 * @return string Unaccented string.
	 */
	public function unaccent($string)
	{
		if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false)
		{
			$string = html_entity_decode(
				preg_replace(
					'~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i',
					'$1',
					$string
				),
				ENT_QUOTES,
				'UTF-8'
			);
		}

		return $string;
	}

}