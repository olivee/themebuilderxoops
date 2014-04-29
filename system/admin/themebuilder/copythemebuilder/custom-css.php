<?php
header("Content-type: text/css; charset=utf-8");

 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
}

 global $xoopsDB;
	$sql = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 4";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
	$unserialise = unserialize($css_arr['conf_value']);
	//var_dump( $unserialise['textalign_blockTitle']);
	//echo $unserialise['boxedfullwidthwrapper'];


	$body_background_texture = $unserialise['body_background_texture'];
	$body_repeat = $unserialise['body_repeat'];
	$body_bgscroll = $unserialise['body_bgscroll'];
	$body_pos = $unserialise['body_pos'];
	$body_background_bg = $unserialise['body_background_bg'];
	$body_background_color = $unserialise['body_background_color'];
	$body_background_img_repeat = $unserialise['body_background_img_repeat'];
	$body_background_img_scroll = $unserialise['body_background_img_scroll'];
	$body_background_img_position = $unserialise['body_background_img_position'];
	$body_background_bgbgrotate = $unserialise['body_background_bgbgrotate'];
if ($body_background_texture != 'none'){
$body = 'body {
			background-color: '.$body_background_color.';
			background-image:url("texture/'.$body_background_texture.'");
			background-repeat:'.$body_repeat.';
			background-attachment:'.$body_bgscroll.';
			background-position:'.$body_pos.'; 
			}';
}

if ($body_background_bg != 'none'){

if ($body_background_bgbgrotate == 'on'){
$bgrotate = 'background-image:url(texture/bg/rotate.php);';
}else{
$bgrotate = 'background-image:url(texture/bg/'.$body_background_bg.');';
}

$body = 'body {
			color: #000;
			background-color: '.$body_background_color.';
			'.$bgrotate.'
			background-repeat: '.$body_background_img_repeat.';
			background-attachment:'.$body_background_img_scroll.';
			background-position:'.$body_background_img_position.';
			}';
}
?>
@media only screen and (min-width: 1212px) {


	<?php echo $body; ?>
	
	
	div.wrapper{
	
			<?php if ($unserialise['boxedfullwidthwrapper'] == 'Activate'){
			echo 'width: 1000px;';
		}else{
		echo 'width: 100%;';
		}		?>
	
	
	}
	
	
	.olivee-itemq-BlockcolumnLeft{
	background-color: <?php echo $unserialise['olivee-itemq-BlockcolumnLeft']; ?> ;
	}
	
	.blockdiv {
	
	background-color: blanchedalmond;
	margin-bottom: 20px;
	border-bottom-style:solid;
	border-bottom-color:#ff0000;
	
	
	}
	
	.blockContent {
	border: 1px solid #DDD;
	
	}
	
	.blockTitle{
	color: <?php echo $unserialise['blockTitlecolor']; ?> ;
	background-color: <?php echo $unserialise['blockTitlebackgroundcolor']; ?> ;
	font-family: '<?php echo $unserialise['font_apercu_blockTitle']; ?>' ;
	font-size: <?php echo $unserialise['fontsize_blockTitle']; ?> ;
	text-align: <?php echo $unserialise['textalign_blockTitle']; ?> ;
	}
	
	.olivee-itemq-BlockcolumnCenter{
	
	background-color: <?php echo $unserialise['olivee-itemq-BlockcolumnCenter']; ?> ;
	
	}
	
	<?php echo $unserialise['css_text_extra']; ?>
	
	
}

@media only screen and (max-width: 1024px) and (min-width: 480px) {


}

@media only screen and (max-width: 479px) {


}