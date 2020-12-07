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
defined('_JEXEC') or die;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class PlgSystemLoadImageOnScroll extends CMSPlugin
{
	protected $page;
	protected $loadtype;
	
	public function onAfterRender()
	{
		$app = Factory::getApplication();
		$input = $app->input;
	    
			  
			  $uri = Uri::getInstance();
			  $uri = $uri->toString();
			  
	
			 if($app->isClient('site'))	:
			  	$allowed_pages = $this->params->get("allowed_pages", "");
		            if(preg_match("({$allowed_pages})", $uri) !== 1) { 
			                   return; 
		               }
					   
					   $this->page = $app->getBody(false);	
					  
					  if(preg_match('/<img/', $this->page)==1):
					   
					   $loadtype = $this->params->get("loadtype", "lazy");
					    $exclude = $this->params->get("exclude");
                       

					   
					
                      
				if(!empty($exclude)){
                $patterns = explode(" ", $exclude);
                 
                   preg_match_all('/<img\s[^>]+>/', $this->page, $matches);
                   
                   
						foreach($matches[0] as $image):
                        
                      $flag = 0;
                      foreach($patterns as $pattern){
                     
						if( strpos( $image, $pattern)){
                        
                            $flag = 1;
                           break;
						      
						}
                        
                        }
                        if($flag==0){
                           $newimage = str_replace('<img' , "<img loading='".$loadtype."' ", $image);
								 $this->page = str_replace($image, $newimage, $this->page);
                                }
						     				
						endforeach;
						}else{			   
                          
					  
					  $this->page = preg_replace('/<img/', "<img loading='".$loadtype."'", $this->page);
					   
					   }
					   $app->setBody($this->page);
					   
					   endif;

				endif;	   
					   
			  
	}
	
}