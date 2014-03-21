<?php

if ($_POST['brand']){


$brnadd = $_POST['brand'];

		if (file_exists("../../mainfile.php")) {   
		include("../../mainfile.php");  
		} elseif (file_exists("../../../mainfile.php")) {   
		include("../../../mainfile.php");  
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

		if( in_array($_POST['brandfont'], array('amiri','tharlon','dhyana', 'droidarabickufi', 'droidarabicnaskh', 'droidsansethiopic', 'droidsanstamil', 'droidsansthai', 'droidserifthai', 'hanna', 'karlatamilinclined', 'karlatamilupright', 'laomuangdon', 'laomuangkhong', 'laosanspro', 'lateef', 'lohitbengali', 'lohitdevanagari', 'lohittamil', 'nanumbrushscript', 'nanumgothic', 'thabit', 'Scheherazade')) ){

							echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/'.$_POST['brandfont'].'.css">';
				
											echo '<style>
							.font-effect-'.$_POST['brandfont'].' {
							font-family: '.$_POST['brandfont'].', serif;
							font-size: '.$_POST['size'].';

							}
							</style>';

							$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';

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

								$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';

								echo ' <p class="font-effect-'.$_POST['effect'].'" '. $g_size .'>'. $g_text .'</p>';
								echo '<div class="font-effect-'.$_POST['effect'].'" style="font-family:Rancho; font-size: 72px; text-align: center;">This is a font effect!</div>';

				
				}else{
							echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$_POST['brandfont'].'">';
							echo '<style>
							.font-effect-'.$_POST['brandfont'].' {
							font-family: '.$_POST['brandfont'].', serif;
							font-size: '.$_POST['size'].';

							}
							</style>';

							$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz أ	ب	ج	د	ﻫ	و	ز	ح	ط	ي	ك	ل	م	ن	س	ع	ف	ص	ق	ر	ش	ت	ث	خ	ذ	ض	ظ	غ';
							echo ' <p class="font-effect-'.$_POST['brandfont'].'" '. $g_size .'>'. $g_text .'</p>';
							echo '<div class="font-effect-'.$_POST['brandfont'].'" style="font-family:Rancho; font-size: 72px; text-align: center;">This is a font effect!</div>';			
				}
		}
}

if ($_POST['brandtexture'] && $_POST['repeat'] && $_POST['bgpos'] && $_POST['bgscroll']){
								echo '<style>
								body { 
										background-image:url("texture/'.$_POST['brandtexture'].'");
										background-repeat:'.$_POST['repeat'].';
										background-attachment:'.$_POST['bgscroll'].';
										background-position:'.$_POST['bgpos'].'; 
								}
								</style>';
								echo '<img style="width:60px;" src="texture/'.$_POST['brandtexture'].'" alt="apercu texture">';
}



if ($_POST['brandicon']){
								//appercu icon
								echo '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">';
								echo '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">';
								echo '<i class="' . $_POST['brandicon'] . '"></i>';
}



?>