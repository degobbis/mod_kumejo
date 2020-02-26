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

// Include the kumejo functions only once
JLoader::register('ModKumejoHelper', __DIR__ . '/helper.php');

$params = ModKumejoHelper::getParams($params);

$load            = $params->get('load');
$url             = htmlspecialchars($params->get('url'), ENT_COMPAT, 'UTF-8');
$target          = htmlspecialchars($params->get('target'), ENT_COMPAT, 'UTF-8');
$width           = htmlspecialchars($params->get('width'), ENT_COMPAT, 'UTF-8');
$height          = htmlspecialchars($params->get('height'), ENT_COMPAT, 'UTF-8');
$scroll          = htmlspecialchars($params->get('scrolling'), ENT_COMPAT, 'UTF-8');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$frameborder     = htmlspecialchars($params->get('frameborder'), ENT_COMPAT, 'UTF-8');
$ititle          = $module->title;
$id              = $module->id;

require ModuleHelper::getLayoutPath('mod_kumejo', $params->get('layout', 'default'));
