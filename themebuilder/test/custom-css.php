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
	/*echo $unserialise['boxedfullwidthwrapper'];
	echo $unserialise['fav_ico'];
	echo $unserialise['body_background_texture'];
	echo $unserialise['body_repeat'];
	echo $unserialise['body_pos'];
	echo $unserialise['body_bgscroll'];
	echo $unserialise['body_background_color'];
	echo $unserialise['body_background_img'];
	echo $unserialise['body_background_img_repeat'];
	echo $unserialise['body_background_img_position'];
	echo $unserialise['body_background_img_scroll'];
	echo $unserialise['scroll_top_enabled'];
	echo $unserialise['fontsize'];
	echo $unserialise['fonteffect'];
	echo $unserialise['font_apercu'];
	echo $unserialise['olivee-itemq-BlockcolumnLeft'];
	echo $unserialise['blockTitlecolor'];
	echo $unserialise['blockTitlebackgroundcolor'];
	echo $unserialise['font_apercu_blockTitle'];
	echo $unserialise['fontsize_blockTitle'];
	echo $unserialise['olivee-itemq-BlockcolumnCenter'];
	echo $unserialise['css_text_extra'];*/
	




?>
@media only screen and (min-width: 1212px) {
	@import url('http://fonts.googleapis.com/css?family=<?php echo $unserialise['font_apercu_blockTitle']; ?>');
	body
	{	
		background-color: <?php echo $unserialise['body_background_color'];  ?> !important;		 
		background-image: url('<?php echo 'admin/texture/'.$unserialise['body_background_texture']; ?>');
		background-repeat: <?php echo $unserialise['body_repeat']; ?>;
		background-attachment: <?php echo $unserialise['body_bgscroll']; ?> ;
		background-position: <?php echo $unserialise['body_pos']; ?>;
	}
	
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
	
	.blockTitle{
	color: <?php echo $unserialise['blockTitlecolor']; ?> ;
	background-color: <?php echo $unserialise['blockTitlebackgroundcolor']; ?> ;
	font-family: <?php echo $unserialise['font_apercu_blockTitle']; ?> ;
	font-size: <?php echo $unserialise['fontsize_blockTitle']; ?> ;
	text-align: <?php echo $unserialise['textalign_blockTitle']; ?> ;
	}
	
	.olivee-itemq-BlockcolumnCenter{
	
	background-color: <?php echo $unserialise['olivee-itemq-BlockcolumnCenter']; ?> ;
	
	}
	
}

@media only screen and (max-width: 1024px) and (min-width: 480px) {


}

@media only screen and (max-width: 479px) {


}