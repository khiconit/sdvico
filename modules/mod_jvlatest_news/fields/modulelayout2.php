<?php
/**
 # MOD_JVLATEST_NEWS - JV Latest News
 # @version		3.x
 # ------------------------------------------------------------------------
 # author    Open Source Code Solutions Co
 # copyright Copyright (C) 2013 joomlavi.com. All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL or later.
 # Websites: http://www.joomlavi.com
 # Technical Support:  http://www.joomlavi.com/my-tickets.html
-------------------------------------------------------------------------*/

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');

/**
 * Form Field to display a list of the layouts for a module view from the module or template overrides.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */

class JFormFieldModuleLayout2 extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'ModuleLayout2';

	/**
	 * Method to get the field input.
	 *
	 * @return	string	The field input.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.

		// Get the client id.
		$clientName = $this->element['client_id'];

		// Get the client id.
		$clientId = $this->element['client_id'];

		if (is_null($clientId) && $this->form instanceof JForm) {
			$clientId = $this->form->getValue('client_id');
		}
		$clientId = (int) $clientId;

		$client	= JApplicationHelper::getClientInfo($clientId);

		// Get the module.
		$module = (string) $this->element['module'];

		if (empty($module) && ($this->form instanceof JForm)) {
			$module = $this->form->getValue('module');
		}

		$module = preg_replace('#\W#', '', $module);

		// Get the template.
		$jvtmpl = (string) $this->element['template'];
		$jvtmpl = preg_replace('#\W#', '', $jvtmpl);

		// Get the style.
		if ($this->form instanceof JForm) {
			$jvtmpl_style_id = $this->form->getValue('template_style_id');
		}

		$jvtmpl_style_id = preg_replace('#\W#', '', $jvtmpl_style_id);

		// If an extension and view are present build the options.
		if ($module && $client) {

			// Load language file
			$lang = JFactory::getLanguage();
				$lang->load($module.'.sys', $client->path, null, false, false)
			||	$lang->load($module.'.sys', $client->path.'/modules/'.$module, null, false, false)
			||	$lang->load($module.'.sys', $client->path, $lang->getDefault(), false, false)
			||	$lang->load($module.'.sys', $client->path.'/modules/'.$module, $lang->getDefault(), false, false);

			// Get the database object and a new query object.
			$db		= JFactory::getDBO();
			$query	= $db->getQuery(true);

			// Build the query.
			$query->select('element, name');
			$query->from('#__extensions as e');
			$query->where('e.client_id = '.(int) $clientId);
			$query->where('e.type = '.$db->quote('template'));
			$query->where('e.enabled = 1');

			if ($jvtmpl) {
				$query->where('e.element = '.$db->quote($jvtmpl));
			}

			if ($jvtmpl_style_id) {
				$query->join('LEFT', '#__template_styles as s on s.template=e.element');
				$query->where('s.id='.(int)$jvtmpl_style_id);
			}

			// Set the query and load the templates.
			$db->setQuery($query);
			$jvtmpls = $db->loadObjectList('element');

			// Check for a database error.
			if ($db->getErrorNum()) {
				JError::raiseWarning(500, $db->getErrorMsg());
			}

			// Build the search paths for module layouts.
			$module_path = JPath::clean($client->path.'/modules/'.$module.'/tmpl');

			// Prepare array of component layouts
			$module_layouts = array();

			// Prepare the grouped list
			$groups=array();
           
			// Add the layout options from the module path.
			if (is_dir($module_path) && ($module_layouts = JFolder::folders($module_path))) {
				// Create the group for the module
				$groups['_']=array();
				$groups['_']['id']=$this->id.'__';
				$groups['_']['text']=JText::sprintf('JOPTION_FROM_MODULE');
				$groups['_']['items']=array();

				foreach ($module_layouts as $file)
				{
					// Add an option to the module group
					$value = JFile::stripExt($file);
					$text = $lang->hasKey($key = strtoupper($module.'_LAYOUT_'.$value)) ? JText::_($key) : $value;
					$groups['_']['items'][]	= JHtml::_('select.option', '_:'.$value, $text);
				}
			}
            
			// Loop on all templates
			if ($jvtmpls) {
				foreach ($jvtmpls as $jvtmpl)
				{
					// Load language file
						$lang->load('tpl_'.$jvtmpl->element.'.sys', $client->path, null, false, false)
					||	$lang->load('tpl_'.$jvtmpl->element.'.sys', $client->path.'/templates/'.$jvtmpl->element, null, false, false)
					||	$lang->load('tpl_'.$jvtmpl->element.'.sys', $client->path, $lang->getDefault(), false, false)
					||	$lang->load('tpl_'.$jvtmpl->element.'.sys', $client->path.'/templates/'.$jvtmpl->element, $lang->getDefault(), false, false);

					$jvtmpl_path = JPath::clean($client->path.'/templates/'.$jvtmpl->element.'/html/'.$module);
                  
					// Add the layout options from the template path.
					if (is_dir($jvtmpl_path) && ($files = JFolder::folders($jvtmpl_path))) {

						foreach ($files as $i=>$file)
						{
							// Remove layout that already exist in component ones
							if (in_array($file, $module_layouts)) {
								unset($files[$i]);
							}
						}

						if (count($files)) {
							// Create the group for the template
							$groups[$jvtmpl->element]=array();
							$groups[$jvtmpl->element]['id']=$this->id.'_'.$jvtmpl->element;
							$groups[$jvtmpl->element]['text']=JText::sprintf('JOPTION_FROM_TEMPLATE', $jvtmpl->name);
							$groups[$jvtmpl->element]['items']=array();

							foreach ($files as $file)
							{
								// Add an option to the template group
								$value = JFile::stripExt($file);
								$text = $lang->hasKey($key = strtoupper('TPL_'.$jvtmpl->element.'_'.$module.'_LAYOUT_'.$value)) ? JText::_($key) : $value;
								$groups[$jvtmpl->element]['items'][]	= JHtml::_('select.option', $jvtmpl->element.':'.$value, $text);
							}
						}
					}
				}
			}
			// Compute attributes for the grouped list
			$attr = $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';

			// Prepare HTML code
			$html = array();

			// Compute the current selected values
			$selected = array($this->value);

			// Add a grouped list
			$html[] = JHtml::_('select.groupedlist', $groups, $this->name, array('id'=>$this->id, 'group.id'=>'id', 'list.attr'=>$attr, 'list.select'=>$selected));
			return implode($html);
		}
		else {
			return '';
		}
	}
}
