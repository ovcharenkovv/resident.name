<?php

/*
 * @version		$Id: view.html.php 1.2.1 2012-05-03 $
 * @package		Joomla
 * @copyright   Copyright (C) 2012-2013 MrVinoth
 * @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport( 'joomla.application.component.view');

class AllVideoShareViewCategory extends JView {

    function display($tpl = null) {
	    $mainframe = JFactory::getApplication();
		$model 	   = $this->getModel();
		
		$config = $model->getconfig();
		$this->assignRef('config', $config);
		
		if(!$category = $model->getcategory()) {
			echo JText::_('ITEM_NOT_FOUND');
			return;
		} else {
			$this->assignRef('category', $category);
		}
		
		$videos = $model->getvideos($category->name, $config[0]->rows * $config[0]->cols);
		$this->assignRef('videos', $videos);
		
		$pagination = $model->getpagination($category->name);
		$this->assignRef('pagination', $pagination);
		
		// Adds parameter handling
		$params = $mainframe->getParams();
		$this->assignRef('params',	$params);
				
        parent::display($tpl);
    }
	
}

?>