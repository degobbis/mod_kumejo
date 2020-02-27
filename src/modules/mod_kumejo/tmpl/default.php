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

HTMLHelper::_('script', 'modules/mod_kumejo/js/iframeResizer.min.js', array('version' => 'auto'), array('async' => 'async'));

if ($module->showtitle) : ?>
	<<?php echo $headerTag . $headerClass; ?>>
		<?php echo $module->title; ?>
	</<?php echo $headerTag; ?>>
<?php endif; ?>

<style>
	iframe#kumejo-serp-<?php echo $id; ?> {
		width: 1px;
		min-width: 100%;
	}
</style>
<iframe id="kumejo-serp-<?php echo $id; ?>"
        allowfullscreen
        class="kumejo-serp <?php echo $moduleclass_sfx?>"
		src="<?php echo $url; ?>"
		width="100%"
		scrolling="auto"
		frameborder="0"
>
</iframe>
<script type="text/javascript">
		iFrameResize({log: true},'#kumejo-serp-<?php echo $id; ?>');
</script>
