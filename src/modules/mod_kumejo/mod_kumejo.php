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

use Joomla\CMS\Helper\ModuleHelper;

$provider = $params->get('provider', 0);
$userId   = (int) $params->get('userId', 0);

if (empty($provider) || empty($userId))
{
	return;
}

$url = 'https://';
$url .= $provider;
$url .= '/jobsuche.html?tmpl=component#';
$url .= 'attr.author.value=' . $userId;
$url .= '&sort=' . $params->get('sort', 'name');
$url .= '&sortdir=' . $params->get('sortdir', 'desc');
$url .= '&limiter=' . (int) $params->get('limiter', 4);

$url             = htmlspecialchars($url, ENT_COMPAT, 'UTF-8');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$headerTag       = $params->get('header_tag', 'h3');
$headerClass     = $params->get('header_class', '');
$headerClass     = $headerClass != '' ? ' class="' . $headerClass . '"' : '';
$id              = $module->id;

require ModuleHelper::getLayoutPath('mod_kumejo', $params->get('layout', 'default'));
