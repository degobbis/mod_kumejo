<?php
/**
 * @package         Joomla.Site
 * @subpackage      mod_kumejo
 *
 * @author          Guido De Gobbis <domainservice@kunze-medien.de>
 * @copyright   (c) 2020 Guido De Gobbis - All rights reserved.
 * @license         GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Language\Text;

/**
 * Script file of Joomla CMS
 *
 * @since  1.0.0
 */
class ModKumejoInstallerScript
{
	/**
	 * Minimum Joomla version to install
	 *
	 * @var   string
	 *
	 * @since   1.0.0
	 */
	public $minimumJoomla = '3.9';
	/**
	 * Minimum PHP version to install
	 *
	 * @var   string
	 *
	 * @since   1.0.0
	 */
	public $minimumPhp = '7.1';

	/**
	 * Function to act prior to installation process begins
	 *
	 * @param string     $action    Which action is happening (install|uninstall|discover_install|update)
	 * @param JInstaller $installer The class calling this method
	 *
	 * @return   boolean  True on success
	 * @throws   Exception
	 *
	 * @since   1.0.0
	 */
	public function preflight($action, $installer)
	{
		$notDeleted = '';
		$app        = Factory::getApplication();
		$pluginPath = JPATH_BASE . '/modules/mod_kumejo';

		Factory::getLanguage()->load('mod_kumejo', dirname(__FILE__));

		if (version_compare(PHP_VERSION, $this->minimumPhp, 'lt'))
		{
			$app->enqueueMessage(Text::sprintf('MOD_KUMEJO_SCRIPT_MINPHPVERSION', $this->minimumPhp), 'error');

			return false;
		}

		if (version_compare(JVERSION, $this->minimumJoomla, 'lt'))
		{
			$app->enqueueMessage(Text::sprintf('MOD_KUMEJO_SCRIPT_MINJVERSION', $this->minimumJoomla), 'error');

			return false;
		}

		if ($action === 'update')
		{
			$deletes = [];

			$deletes['folder'] = array();

			$deletes['file'] = array();

			foreach ($deletes as $key => $orphans)
			{
				$notDeleted .= $this->deleteOrphans($key, $orphans);
			}

			if (!empty($notDeleted))
			{
				$app->enqueueMessage($notDeleted, 'error');
			}
		}

		return true;
	}

	/**
	 * @param string $type    Wich type are orphans of (file or folder)
	 * @param array  $orphans Array of files or folders to delete
	 *
	 * @return   string
	 *
	 * @since   1.0.0
	 */
	private function deleteOrphans($type, array $orphans)
	{
		$notDeleted = '';

		foreach ($orphans as $item)
		{
			if ($type == 'folder')
			{
				if (is_dir($item))
				{
					if (Folder::delete($item) === false)
					{
						$notDeleted .= Text::sprintf('MOD_KUMEJO_SCRIPT_NOT_DELETED', $item);
					}
				}
			}
			if ($type == 'file')
			{
				if (is_file($item))
				{
					if (File::delete($item) === false)
					{
						$notDeleted .= Text::sprintf('MOD_KUMEJO_SCRIPT_NOT_DELETED', $item);
					}
				}
			}
		}

		return $notDeleted;
	}
}
