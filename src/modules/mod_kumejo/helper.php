<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_kumejo
 *
 * @author      Guido De Gobbis <domainservice@kunze-medien.de>
 * @copyright   (c) 2020 Guido De Gobbis - All rights reserved.
 * @license     GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_kumejo
 *
 * @since  1.5
 */
class ModKumejoHelper
{
	/**
	 * Gets the parameters for the kumejo
	 *
	 * @param   mixed  &$params  The parameters set in the administrator section
	 *
	 * @return  mixed  &params  The modified parameters
	 *
	 * @since   1.5
	 */
	public static function getParams(&$params)
	{
		$params->def('url', '');
		$params->def('scrolling', 'auto');
		$params->def('height', '200');
		$params->def('height_auto', 0);
		$params->def('width', '100%');
		$params->def('add', 1);
		$params->def('name', 'kumejo');

		$url = $params->get('url');

		if ($params->get('add'))
		{
			// Adds 'http://' if none is set
			if (strpos($url, '/') === 0)
			{
				// Relative URL in component. use server http_host.
				$url = 'http://' . $_SERVER['HTTP_HOST'] . $url;
			}
			elseif (strpos($url, 'http') === false && strpos($url, 'https') === false)
			{
				$url = 'http://' . $url;
			}
		}

		// Auto height control
		if ($params->def('height_auto'))
		{
			$load = 'onload="iFrameHeight(this)"';
		}
		else
		{
			$load = '';
		}

		$params->set('load', $load);
		$params->set('url', $url);

		return $params;
	}
}
