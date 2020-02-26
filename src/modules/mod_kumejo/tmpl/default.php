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

use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('script', '/modules/mod_kumejo/js/iframeResizer.min.js', array('version' => 'auto', 'relative' => true), array('async' => 'async')); ?>

<style>
	iframe#blockrandom-<?php echo $id; ?> {
		width: 1px;
		min-width: 100%;
	}
</style>

<iframe id="blockrandom-<?php echo $id; ?>"
		src="<?php echo $url; ?>"
		width="<?php echo $width; ?>"
		scrolling="<?php echo $scroll; ?>"
		frameborder="<?php echo $frameborder; ?>"
>
</iframe>

<script type="text/javascript">
		iFrameResize({},'#blockrandom-<?php echo $id; ?>');
</script>
