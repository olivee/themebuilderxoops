<?php

if ($_POST['brand']){


$brnadd = $_POST['brand'];

		if (file_exists("../../../../mainfile.php")) {   
		include("../../../../mainfile.php");  
		} elseif (file_exists("../../../../../mainfile.php")) {   
		include("../../../../../mainfile.php");  
		} 
		global $xoopsDB;
		
		$sql = "SELECT distinct id, label FROM ".$xoopsDB->prefix("config_theme_menu")." WHERE catmenu = ".$brnadd." ORDER BY id DESC";
									$result = $xoopsDB->query($sql); 
									
									echo '<option value="0">-----------------</option>';
										while (list($id, $label) = $xoopsDB->fetchRow($result)) {
										echo '<option value="' . $id . '">' . $label . '</option>';
										}
}

if ($_POST['brandfont'] && $_POST['size']){

		if( in_array($_POST['brandfont'], array('amiri','tharlon','dhyana', 'droidarabickufi', 'droidarabicnaskh', 'droidsansethiopic', 'droidsanstamil', 'droidsansthai', 'droidserifthai', 'hanna', 'karlatamilinclined', 'karlatamilupright', 'laomuangdon', 'laomuangkhong', 'laosanspro', 'lateef', 'lohitbengali', 'lohitdevanagari', 'lohittamil', 'nanumbrushscript', 'nanumgothic', 'thabit', 'scheherazade')) ){

							echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/'.$_POST['brandfont'].'.css">';
				
											echo '<style>
							.font-effect-'.$_POST['brandfont'].' {
							font-family: '.$_POST['brandfont'].', serif;
							font-size: '.$_POST['size'].';

							}
							</style>';

							$g_text = '0123456789 <br> ABCDEFGHIJKLMNOPQRSTUVWXYZ <br> abcdefghijklmnopqrstuvwxyz <br> أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';

							echo ' <p class="font-effect-'.$_POST['brandfont'].'" '. $g_size .'>'. $g_text .'</p>';
							echo '<div class="font-effect-'.$_POST['brandfont'].'" style="font-family:Rancho; font-size: 72px; text-align: center;">This is a font effect!</div>';

		}else{

				if ($_POST['effect'] != 'none'){
				
								echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$_POST['brandfont'].'&effect='.$_POST['effect'].'">';
								echo '<style>
								.font-effect-'.$_POST['effect'].' {
								font-family: '.$_POST['brandfont'].', serif;
								font-size: '.$_POST['size'].';
								}
								</style>';

								$g_text = '0123456789 <br> ABCDEFGHIJKLMNOPQRSTUVWXYZ <br> abcdefghijklmnopqrstuvwxyz <br> أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';

								echo ' <p class="font-effect-'.$_POST['effect'].'" '. $g_size .'>'. $g_text .'</p>';
								echo ' <br> <div class="font-effect-'.$_POST['effect'].'" style="font-family:Rancho; font-size: 72px; text-align: center;">This is a font effect!</div>';

				
				}else{
							echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$_POST['brandfont'].'">';
							echo '<style>
							.font-effect-'.$_POST['brandfont'].' {
							font-family: '.$_POST['brandfont'].', serif;
							font-size: '.$_POST['size'].';

							}
							</style>';

							$g_text = '0123456789  <br> ABCDEFGHIJKLMNOPQRSTUVWXYZ  <br> abcdefghijklmnopqrstuvwxyz  <br> أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';
							echo ' <p class="font-effect-'.$_POST['brandfont'].'" '. $g_size .'>'. $g_text .'</p>';
							echo ' <br> <div class="font-effect-'.$_POST['brandfont'].'" style="font-family:Rancho; font-size: 72px; text-align: center;">This is a font effect!</div>';			
				}
		}
}

if ($_POST['brandtexture'] && $_POST['repeat'] && $_POST['bgpos'] && $_POST['bgscroll']){
								/*echo '<style>
								body { 
										background-image:url("texture/'.$_POST['brandtexture'].'");
										background-repeat:'.$_POST['repeat'].';
										background-attachment:'.$_POST['bgscroll'].';
										background-position:'.$_POST['bgpos'].'; 
								}
								</style>';*/
								echo '<img style="width:60px;" src="admin/themebuilder/test/texture/'.$_POST['brandtexture'].'" alt="apercu texture">';
}



if ($_POST['brandicon']){
								//appercu icon
								echo '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">';
								echo '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">';
								echo '<i class="' . $_POST['brandicon'] . '"></i>';
}

if ($_POST['x_optionslider'] == 'flexslider'){
	if(isset($_POST['x_sliderid'])){
		if (file_exists("../../../../mainfile.php")) {   
		include("../../../../mainfile.php");  
		} elseif (file_exists("../../../../../mainfile.php")) {   
		include("../../../../../mainfile.php");  
		} 	
	global $xoopsDB;
								$sql21 = "SELECT distinct conf_id, conf_name,conf_value, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $_POST['x_sliderid'];
									$result21 = $xoopsDB -> query($sql21);
									 $video_array = $xoopsDB -> fetchArray( $result21 );
									 $unserilise = unserialize($video_array['conf_desc']);
									 //var_dump( $unserilise);
									 
	}								 
									 
				$data = array(
					'slider_animation' => array('des' => 'slider animation', 'options' => array('fade' => 'fade', 'slide' => 'slide'),'option'=>'tn'),
					'direction' => array('des' => 'direction of animation', 'options' => array('horizontal' => 'horizontal', 'vertical' => 'vertical'),'option'=>'tn'),
					'animationSpeed' => array('des' => 'animationSpeed between transitions', 'options' => array('600', '500', '400', "300"), 'option'=>'tn'),
					'slideshowSpeed' => array('des' => 'slideshowSpeed', 'options' => array('6000', '5000', '4000', "3000"),'option'=>'tn'),
					'controlNav' => array('des' => 'controlNav', 'options' => array("true", "false"),'option'=>'tn'),
					'pauseOnHover' => array('des' => 'pauseOnHover', 'options' => array("true", "false"),'option'=>'tn'),
					'directionNav' => array('des' => 'directionNav', 'options' => array("true", "false"),'option'=>'tn'),
					);

				foreach($data as $linha => $value){
				
					echo "<tr class='myTableRow'>
							
							 <td class='head' style='padding-left: 15px; font-family:Arial; font-size: 10px;'>'".$value['des']."'</td>
								<td class='even'>";
								

								if ($value['option'] == 'tn') {
								
								echo "
								<select name='flexslider_".$linha."' id='flexslider_".$linha."'>";
									foreach ($value['options'] as $kesy=>$valuerr){							
									$selected = ($valuerr == $unserilise[$linha]) ? ' selected="selected"' : '';
								echo "<option value=".$valuerr." ".$selected.">".$valuerr."</option>";
									}					  echo "</select>";						
								}

								echo "
							</td>
						</tr>";
				}


				
}
if ($_POST['x_optionslider'] == 'orbit'){
		if(isset($_POST['x_sliderid'])){
		if (file_exists("../../../../mainfile.php")) {   
		include("../../../../mainfile.php");  
		} elseif (file_exists("../../../../../mainfile.php")) {   
		include("../../../../../mainfile.php");  
		} 	
	global $xoopsDB;
								$sql21 = "SELECT distinct conf_id, conf_name,conf_value, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $_POST['x_sliderid'];
									$result21 = $xoopsDB -> query($sql21);
									 $video_array = $xoopsDB -> fetchArray( $result21 );
									 $unserilise = unserialize($video_array['conf_desc']);
									 //var_dump( $unserilise);
									 
	}									

				$data = array(
					'slider_animation' => array('des' => 'slider animation', 'options' => array('fade' => 'fade', 'horizontal-slide' => 'horizontal-slide', 'vertical-slide' => 'vertical-slide'),'option'=>'tn'),
					'animationSpeed' => array('des' => 'animationSpeed between transitions', 'options' => array('600', '500', '400', "300"), 'option'=>'tn'),
					'timer' => array('des' => 'timer', 'options' => array("true", "false"),'option'=>'tn'),
					'advanceSpeed' => array('des' => 'advanceSpeed', 'options' => array('6000', '5000', '4000', "3000"),'option'=>'tn'),
					'pauseOnHover' => array('des' => 'pauseOnHover', 'options' => array("true", "false"),'option'=>'tn'),
					'startClockOnMouseOut' => array('des' => 'startClockOnMouseOut', 'options' => array("true", "false"),'option'=>'tn'),
					'startClockOnMouseOutAfter' => array('des' => 'startClockOnMouseOutAfter', 'options' => array('6000', '5000', '4000', "3000"),'option'=>'tn'),
					'directionalNav' => array('des' => 'directionalNav', 'options' => array("true", "false"),'option'=>'tn'),
					'captions' => array('des' => 'directionalNav', 'options' => array("true", "false"),'option'=>'tn'),
					'captionAnimation' => array('des' => 'captionAnimation animation', 'options' => array('fade' => 'fade', 'slideOpen' => 'slideOpen', 'none' => 'none'),'option'=>'tn'),
					'controlNav' => array('des' => 'controlNav', 'options' => array("true", "false"),'option'=>'tn'),
					'bullets' => array('des' => 'bullets', 'options' => array("true", "false"),'option'=>'tn'),			
					);

				foreach($data as $linha => $value) 
				{
				?>
				
				<tr class='myTableRow'>
					 <td class='head' style="padding-left: 15px; font-family:Arial; font-size: 10px;"><?php echo $value['des'];?></td>
						<td class='even'>
						<?php
						if ($value['option'] == 'tn') {
						?>
						<select name="orbit_<?php echo $linha;?>" id="orbit_<?php echo $linha;?>"><?php
							foreach ($value['options'] as $kesy=>$valuerr){							
									$selected = ($valuerr == $unserilise[$linha]) ? ' selected="selected"' : '';
								echo "<option value=".$valuerr." ".$selected.">".$valuerr."</option>";
									}?>					  </select>
						<?php
						}
						?>
					</td>
				</tr>
		
				
				<?php

				}	

}
if ($_POST['x_optionslider'] == 'bxslider'){
		if(isset($_POST['x_sliderid'])){
		if (file_exists("../../../../mainfile.php")) {   
		include("../../../../mainfile.php");  
		} elseif (file_exists("../../../../../mainfile.php")) {   
		include("../../../../../mainfile.php");  
		} 	
	global $xoopsDB;
								$sql21 = "SELECT distinct conf_id, conf_name,conf_value, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $_POST['x_sliderid'];
									$result21 = $xoopsDB -> query($sql21);
									 $video_array = $xoopsDB -> fetchArray( $result21 );
									 $unserilise = unserialize($video_array['conf_desc']);
									 //var_dump( $unserilise);
									 
	}		

				$data = array(
					'mode' => array('des' => 'slider animation', 'options' => array('fade' => 'fade', 'horizontal' => 'horizontal', 'vertical' => 'vertical'),'option'=>'tn'),
					'animationSpeed' => array('des' => 'animationSpeed between transitions', 'options' => array('600', '500', '400', "300"), 'option'=>'tn'),
					'autoControls' => array('des' => 'autoControls', 'options' => array("true", "false"),'option'=>'tn'),
					'auto' => array('des' => 'auto', 'options' => array("true", "false"),'option'=>'tn'),
					
					/*
					plus d'option a ajouter
					'advanceSpeed' => array('des' => 'advanceSpeed', 'options' => array('6000', '5000', '4000', "3000"),'option'=>'tn'),
					'pauseOnHover' => array('des' => 'pauseOnHover', 'options' => array("true", "false"),'option'=>'tn'),
					'startClockOnMouseOut' => array('des' => 'startClockOnMouseOut', 'options' => array("true", "false"),'option'=>'tn'),
					'startClockOnMouseOutAfter' => array('des' => 'startClockOnMouseOutAfter', 'options' => array('6000', '5000', '4000', "3000"),'option'=>'tn'),
					'directionalNav' => array('des' => 'directionalNav', 'options' => array("true", "false"),'option'=>'tn'),
					'captions' => array('des' => 'directionalNav', 'options' => array("true", "false"),'option'=>'tn'),
					'captionAnimation' => array('des' => 'captionAnimation animation', 'options' => array('fade' => 'fade', 'slideOpen' => 'slideOpen', 'none' => 'none'),'option'=>'tn'),
					'controlNav' => array('des' => 'controlNav', 'options' => array("true", "false"),'option'=>'tn'),
					'bullets' => array('des' => 'bullets', 'options' => array("true", "false"),'option'=>'tn'),
					*/
					
					
					);

				foreach($data as $linha => $value) 
				{
				?>
				
				<tr class='myTableRow'>
					
					 <td class='head' style="padding-left: 15px; font-family:Arial; font-size: 10px;"><?php echo $value['des'];?></td>
						<td class='even'>
						<?php

						if ($value['option'] == 'tn') {

						?>
						
						<select name="bxslider_<?php echo $linha;?>" id="bxslider_<?php echo $linha;?>"><?php
							foreach ($value['options'] as $kesy=>$valuerr){							
									$selected = ($valuerr == $unserilise[$linha]) ? ' selected="selected"' : '';
								echo "<option value=".$valuerr." ".$selected.">".$valuerr."</option>";
									}?>					  </select>
						<?php

						}

						?>
					</td>
				</tr>
		
				
				<?php

				}	
							
}
if ($_POST['x_optionslider'] == 'nivoslider'){
?>
<tr class='myTableRow'>
<td class='head'>pas d'option</td>
<td class='even'>pas d'option</td>
</tr>								

<?php

}
if ($_POST['x_optionslider'] == 'skitter_slider'){

		if(isset($_POST['x_sliderid'])){
		if (file_exists("../../../../mainfile.php")) {   
		include("../../../../mainfile.php");  
		} elseif (file_exists("../../../../../mainfile.php")) {   
		include("../../../../../mainfile.php");  
		} 	
	global $xoopsDB;
								$sql21 = "SELECT distinct conf_id, conf_name,conf_value, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $_POST['x_sliderid'];
									$result21 = $xoopsDB -> query($sql21);
									 $video_array = $xoopsDB -> fetchArray( $result21 );
									 $unserilise = unserialize($video_array['conf_desc']);
									 //var_dump( $unserilise);									 
	}		


				$data = array(
				'slider_animation' => array('des' => 'slider animation', 'options' => array('random' => 'random', 'cube' => 'cube', 'cubeRandom' => 'cubeRandom', 'block' => 'block', 'cubeStop' => 'cubeStop', 'cubeHide' => 'cubeHide', 'cubeSize' => 'cubeSize', 'horizontal' => 'horizontal', 'showBars' => 'showBars', 'showBarsRandom' => 'showBarsRandom', 'tube' => 'tube', 'fade' => 'fade', 'fadeFour' => 'fadeFour', 'paralell' => 'paralell', 'blind' => 'blind', 'blindHeight' => 'blindHeight', 'blindWidth' => 'blindWidth', 'directionTop' => 'directionTop', 'directionBottom' => 'directionBottom', 'directionRight' => 'directionRight', 'directionLeft' => 'directionLeft', 'cubeStopRandom' => 'cubeStopRandom', 'cubeSpread' => 'cubeSpread', 'cubeJelly' => 'cubeJelly', 'glassCube' => 'glassCube', 'glassBlock' => 'glassBlock', 'circles' => 'circles', 'circlesInside' => 'circlesInside', 'circlesRotate' => 'circlesRotate', 'cubeShow' => 'cubeShow', 'upBars' => 'upBars', 'downBars' => 'downBars', 'hideBars' => 'hideBars', 'swapBars' => 'swapBars', 'swapBarsBack' => 'swapBarsBack', 'swapBlocks' => 'swapBlocks', 'cut' => 'cut', 'randomSmart' => 'randomSmart'),'option'=>'tn'),
					'velocity' => array('des' => 'Velocity of animation', 'options' => array('0.5', '1', '1.5', "2"),'option'=>'tn'),
					'interval' => array('des' => 'Interval between transitions', 'options' => array('2500', "3000"), 'option'=>'tn'),
					'navigation' => array('des' => 'Navigation type/display', 'options' => array('none', 'numbers', 'thumbs', 'dots', 'dots_with_preview'),'option'=>'tn'),
					'numbers_align' => array('des' => 'Alignment of numbers/dots/thumbs', 'options' => array("left", "center", 'right'),'option'=>'tn'),
					'label' => array('des' => 'Label display/animation', 'options' => array('none', 'slideUp', 'left', 'right', 'fixed'),'option'=>'tn'),
					'easing_default' => array('des' => 'Easing default', 'options' => array('null', "easeOutBack", "linear", "easeInSine", "easeOutSine", "easeInOutSine", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce" ),'option'=>'tn'),
					'animateNumberOut' => array('des' => 'Animation/style number', 'options' => array("null", "{backgroundColor:'#000', color:'#ccc'}"),'option'=>'tn'),
					'animateNumberOver' => array('des' => 'Animation/style hover number', 'options' => array("null", "{backgroundColor:'#000', color:'#ccc'}"),'option'=>'tn'),
					'animateNumberActive' => array('des' => 'Animation/style active number', 'options' => array("null", "{backgroundColor:'#000', color:'#ccc'}"),'option'=>'tn'),
					'controls_position' => array('des' => 'Option play/pause manually Position of button controls', 'options' => array("none", "center", 'leftTop', 'rightTop', 'leftBottom', 'rightBottom'),'option'=>'tn'),
					'focus_position' => array('des' => 'Focus slideshow Position of button focus slideshow', 'options' => array('none', 'center', 'center', 'leftTop', 'rightTop', 'leftBottom', 'rightBottom'),'option'=>'tn'),
					'stop_over' => array('des' => 'Stop animation to move mouse over it.', 'options' => array("false", "true"),'option'=>'tn'),
					'auto_play' => array('des' => 'Sets whether the slideshow will start automatically', 'options' => array("true", "false"),'option'=>'tn'),
					'enable_navigation_keys' => array('des' => 'Enable navigation keys', 'options' => array("true", "false"),'option'=>'tn'),
					'progressbar' => array('des' => 'Displays progress bar', 'options' => array("true", "false"),'option'=>'tn'),
					'theme' => array('des' => 'Slideshow theme', 'options' => array('null', 'minimalist', 'round', 'clean', 'square'),'option'=>'tn'),
					);

				foreach($data as $linha => $value) 
				{
				?>
				
				<tr class='myTableRow'>
					
					 <td class='head' style="padding-left: 15px; font-family:Arial; font-size: 10px;"><?php echo $value['des'];?></td>
						<td class='even'>
						<?php

						if ($value['option'] == 'tn') {

						?>
						
						<select name="skitter_slider_<?php echo $linha;?>" id="skitter_<?php echo $linha;?>"><?php
							foreach ($value['options'] as $kesy=>$valuerr){							
									$selected = ($valuerr == $unserilise[$linha]) ? ' selected="selected"' : '';
								echo "<option value=".$valuerr." ".$selected.">".$valuerr."</option>";
									}?>					  </select>
						<?php

						}

						?>
					</td>
				</tr>
		
				
				<?php

				}


								
}
if ($_POST['x_optionslider'] == 'camera'){
?>
<tr class='myTableRow'>
<td class='head'>pas d'option</td>
<td class='even'>pas d'option</td>
</tr>								

<?php
}
if ($_POST['x_optionslider'] == 's3Slider'){
?>
<tr class='myTableRow'>
<td class='head'>pas d'option</td>
<td class='even'>pas d'option</td>
</tr>								

<?php								
}



?>