<?php

/**
 * @package Plugin system - load image on scroll for Joomla! 3.x
 * @version $Id: system - load image on scroll 1.0.0 2020-11-24 23:26:33Z $
 * @author KWProductions Co.
 * @(C) 2020-2025.Kian William Productions Co. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of system - load image on scroll.
    system - load image on scroll is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    plugin system - load image on scroll is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with system - load image on scroll.  If not, see <http://www.gnu.org/licenses/>.
 
**/

?>
<?php
defined('_JEXEC') || die('Restricted access');
use Joomla\CMS\Factory;
class PlgSystemLoadimageonscrollInstallerScript
{
	 public function install($parent)
 {
  
   
  $db  = Factory::getDbo();
  $query = $db->getQuery(true);
  $query->update('#__extensions');
  $query->set($db->quoteName('enabled') . ' = 1');
  $query->where($db->quoteName('element') . ' = ' . $db->quote('loadimageonscroll'));
  $query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));
  $db->setQuery($query);
  $db->execute();
  
 
  
  
  
 }
   public function uninstall($parent) 
  {
	       
       
  }
}
