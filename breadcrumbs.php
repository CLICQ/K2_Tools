<?php
/**
 * @version		$Id: breadcrumbs.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<ul class="breadcrumb<?php echo $moduleclass_sfx; ?>">
	<?php
	//Начало выода
	$output = '';
	if ($params->get('home')) {
		$output .= '<li class="showHere_css"><strong>'.JText::_('K2_YOU_ARE_HERE').'</strong></li>';
		$output .= '<li><a href="'.JURI::root().'">'.$params->get('home',JText::_('K2_HOME')).'</a></li>';
		//K2_YOU_ARE_HERE - ваще местонахождение
		//K2_HOME - Название главной
		//Состирока ссылок
		if (count($path)) {
			foreach ($path as $link) {
				$output .= '<li><span class="divider">'.$params->get('seperator','&raquo;').'</span>'.$link.'</li>';
			}
		}
		//Состирока Titile
		if($title){
			$output .= '<li><span class="divider">'.$params->get('seperator','&raquo;').'</span>'.$title.'</li>';
		}
	} else {
		if($title){
			$output .= '<span class="bcTitle">'.JText::_('K2_YOU_ARE_HERE').'</span>';
		}
		if (count($path)) {
		    $countmat = count($path);
			$countmati = 0;
         foreach ($path as $link) {
             if(strstr($link, "com_k2")){
                  $output .= '<span class="bcSeparator">'.$params->get('seperator','»').'</span>'.$link;
             }else{
                  if($countmati < ($countmat-1)){
                  $output .= '<span class="bcSeparator">'.$params->get('seperator','»').'</span>'.$link;
                  }
             }
     $countmati++;
     }
		}
		$output .= $title; 
	}

	echo $output;//Вывод сортировки
	?>
</ul>
<?php if (strpos( $params->get ('moduleclass_sfx'), 'show_header')!==false){ ?>
	 <h1 class="breadcrumb-header"><a href="/" class="b-h-a"></a><?php $last = end($path); echo $title; //Вывод Titile H2	 ?></h1>
<?php } ?>
