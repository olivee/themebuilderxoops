<?php
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 

 global $xoopsDB;
/* $sqlslider = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image!=""';
$resultslider = $xoopsDB -> query( $sqlslider);
				while($video_arrslider = $xoopsDB -> fetchArray( $resultslider )){ 
				$treeslider[] = $video_arrslider;
				}

 $this->assign('treeslider',$treeslider);
 
 //j'abandonne cette methode je prend un autre chemin
 			<div id="slider1">
<ul id="slider1Content">
	<{foreach from=$treeslider key=ks item=slide}>
		<li class="slider1Image">
				<a href="<{$slide.link}>"><img src="<{$slide.image}>" alt="<{$slide.link}>" /></a>
                <span class="right"><strong>Quality Websites</strong><br />
				<font face="Tahoma" style="font-size: 10pt">Looking for quality websites? XOOPS is the best choice ! Try it now, it's free</font></span>
		
		</li>
	<{/foreach}>
</ul>
</div>*/
 
 
	$sql = "SELECT distinct conf_id, conf_name, conf_catid, conf_value, conf_desc FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 2 ORDER BY conf_id DESC";
	$result = $xoopsDB->query($sql); 
	while (list($conf_id, $conf_name, $conf_catid, $conf_value, $conf_desc) = $xoopsDB->fetchRow($result)) {

		if ($conf_value == 'flexslider'){

													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id;
													$slidediv = 'SLIDER_'.$arg .'_'. $val;												
											${'SLIDER'.$arg .'_'. $val} = "
															<link rel='stylesheet' href='http://flexslider.woothemes.com/css/flexslider.css'>
															<div class=".$slidediv.">
															<ul class='slides'>";
												$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
												$result33 = $xoopsDB -> query( $sql33 );
												while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
												$aaa = $video_arrtheme1['image'];
											${'SLIDER'.$arg .'_'. $val} .= "
																							<li>
																								<img src='$aaa'>
																							</li>";
												}
											${'SLIDER'.$arg .'_'. $val} .= "
																						</ul>
																					</div>";

											${'SLIDER'.$arg .'_'. $val} .= "<script src='http://flexslider.woothemes.com/js/jquery.flexslider.js'></script>
																						<script type='application/javascript'>
																						
																							jQuery(document).ready(function(){
																								jQuery('.".$slidediv."').flexslider({
																									 animation: 'slide',
																									 slideshowSpeed: 4000,
																									 directionNav: false,
																									 pauseOnHover: true,
																									 directionNav: false

																								});
																							});
																						</script>";


			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
													
													
		}
		
		elseif ($conf_value == 'orbit'){
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id;
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													${'SLIDER'.$arg .'_'. $val} = "
															<script src='https://b-templates4u-com.googlecode.com/svn/jquery.orbit-1.2.3.min.js' type='text/javascript'></script>
															<style>
															div.orbit-wrapper{width:1px;height:1px;position:relative}div.orbit{width:1px;height:1px;position:relative;overflow:hidden}div.orbit img{position:absolute;top:0;left:0;display:none}div.orbit a img{border:none}.orbit div{position:absolute;top:0;left:0;width:100%;height:100%}div.timer{width:40px;height:40px;overflow:hidden;position:absolute;top:10px;right:10px;opacity:.6;cursor:pointer;z-index:1001}span.rotator{display:block;width:40px;height:40px;position:absolute;top:0;left:-20px;background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/rotator-black.png) no-repeat;z-index:3}span.mask{display:block;width:20px;height:40px;position:absolute;top:0;right:0;z-index:2;overflow:hidden}span.rotator.move{left:0}span.mask.move{width:40px;left:0;background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/timer-black.png) repeat 0 0}span.pause{display:block;width:40px;height:40px;position:absolute;top:0;left:0;background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/pause-black.png) no-repeat;z-index:4;opacity:0}span.pause.active{background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/pause-black.png) no-repeat 0 -40px}div.timer:hover span.pause,span.pause.active{opacity:1}.orbit-caption{display:none}.orbit-wrapper .orbit-caption{background:#000;background:rgba(0,0,0,.6);z-index:1000;color:#fff;padding:7px 10px;font-size:13px;position:absolute;right:0;bottom:0;width:920px;text-align:center}div.slider-nav{display:block}div.slider-nav span{width:78px;height:100px;text-indent:-9999px;position:absolute;z-index:1000;top:50%;margin-top:-50px;cursor:pointer}div.slider-nav span.right{background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/right-arrow.png);right:0}div.slider-nav span.leftt{background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/left-arrow.png);left:0}.orbit-bullets{position:absolute;z-index:1000;list-style:none;bottom:-40px;left:50%;margin-left:-50px;padding:0}.orbit-bullets li{float:left;margin-left:5px;cursor:pointer;color:#999;text-indent:-9999px;background:url(http://zurb.com/playground/playground/jquery-image-slider-plugin/orbit/bullets.jpg) no-repeat 4px 0;width:13px;height:12px;overflow:hidden}.orbit-bullets li.has-thumb{background:none;width:100px;height:75px}.orbit-bullets li.active{color:#222;background-position:-8px 0}.orbit-bullets li.active.has-thumb{background-position:0 0;border-top:2px solid #000}@font-face{font-family:'ChunkFiveRegular';src:url(http://zurb.com/playground/fonts/Chunkfive-webfont.eot);src:url(http://zurb.com/playground/fonts/Chunkfive-webfont.woff) format('woff'),url(/playground/playground/fonts/Chunkfive-webfont.ttf) format('truetype'),url(/playground/fonts/Chunkfive-webfont.svg#webfont90E2uSjN) format('svg');font-weight:400!important;font-style:normal!important}
															</style>
																	<div id='feat' style='width: 900px;'>
																	<div id=".$slidediv.">";
											$sql1 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result1 = $xoopsDB -> query( $sql1 );
											while ( $video_arr144 = $xoopsDB -> fetchArray( $result1 ) ) {
											$bbb = $video_arr144['image'];
											$bbbb = $video_arr144['label'];
											$qq = $arr['conf_value'];
													${'SLIDER'.$arg .'_'. $val} .= "
														<img src='$bbb' title='$bbbb' alt='$bbbb' />
																	";
											}
																	${'SLIDER'.$arg .'_'. $val} .= "
																	</div> 
																	</div> 
																					<script type='application/javascript'>
																						jQuery(document).ready(function(){
																							jQuery('#".$slidediv."').orbit({          
																								 animation: 'fade', //fade, horizontal-slide, vertical-slide
																								 animationSpeed: 800, //how fast animations are
																								 advanceSpeed: 4000, //if timer advance is enabled, time between transitions 
																								 startClockOnMouseOut: true, //if timer should restart on MouseOut
																								 startClockOnMouseOutAfter: 3000, //how long after mouseout timer should start again
																								 directionalNav: true, //manual advancing directional navs
																								 captions: true, //if has a title, will be placed at bottom
																								 captionAnimationSpeed: 800, //how quickly to animate in caption on load and between captioned and uncaptioned photos
																								 timer: true, //if the circular timer is wanted
																								 bullets : true
																							});
																						});
																					</script>";
		
			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'bxslider'){
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id;
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													//<script src='http://bxslider.com/js/jquery.min.js'></script>
													${'SLIDER'.$arg .'_'. $val} = "
													<!-- bxSlider Javascript file -->
													<script src='http://bxslider.com/lib/jquery.bxslider.js'></script>
													<!-- bxSlider CSS file -->
													<link href='http://bxslider.com/lib/jquery.bxslider.css' rel='stylesheet' />
																	<ul class=".$slidediv.">";
																	
											$sql1 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result1 = $xoopsDB -> query( $sql1 );
											while ( $video_arr144 = $xoopsDB -> fetchArray( $result1 ) ) {
											$bbb2 = $video_arr144['image'];
											$bbbb = $video_arr144['label'];
											$qq = $arr['conf_value'];
													${'SLIDER'.$arg .'_'. $val} .= "
														<li>
														<a href='http://tounes' target='_blank'><img src='$bbb2' alt='$bbbb'/></a>
														<div class='sb-description'>
														<h3>Creative Lifesaver</h3>
														</div>
														</li>";
											}
																	${'SLIDER'.$arg .'_'. $val} .= "
																	</ul>
														<script type='text/javascript'>
															jQuery(document).ready(function(){
															  jQuery('.".$slidediv."').bxSlider({
															  auto: true,
															  autoControls: true
															});
															  
															});
			
														</script>";


			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'nivoslider'){ //probleme d'integration a refaire nivo-slider probleme css et js
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													//														<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>

													${'SLIDER'.$arg .'_'. $val} = "
													<link rel='stylesheet' href='http://www.100scripts.com/demo/php/nivo-slider/nivoslider/nivo-slider.css' type='text/css' media='screen' />
																<div id='slider' class='nivoSlider'>
																	<img src='http://www.100scripts.com/demo/php/nivo-slider/imgs/toystory.jpg' data-thumb='http://www.100scripts.com/demo/php/nivo-slider/imgs/toystory.jpg' alt='' />
																	<a href='http://dev7studios.com'><img src='http://www.100scripts.com/demo/php/nivo-slider/imgs/up.jpg' data-thumb='http://www.100scripts.com/demo/php/nivo-slider/imgs/up.jpg' alt='' title='This is an example of a caption' /></a>
																	<img src='http://www.100scripts.com/demo/php/nivo-slider/imgs/walle.jpg' data-thumb='http://www.100scripts.com/demo/php/nivo-slider/imgs/walle.jpg' alt='' data-transition='slideInLeft' />
																	<img src='http://www.100scripts.com/demo/php/nivo-slider/imgs/nemo.jpg' data-thumb='http://www.100scripts.com/demo/php/nivo-slider/imgs/nemo.jpg' alt='' title='#htmlcaption' />
																</div>
																<div id='htmlcaption' class='nivo-html-caption'>
																	<strong>This</strong> is an example of a <em>HTML</em> caption with <a href='#'>a link</a>. 
																</div>

														</div>
														<script type='text/javascript' src='http://u.jimdo.com/www54/o/sdfd33ca1d413f4c9/userlayout/js/jquery-nivo-slider-pack.js?t=1360184530'></script>
														<script type='text/javascript'>

														jQuery(window).load(function() {
														jQuery('#slider').nivoSlider();
													});
														</script>";

			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
										
										
		elseif ($conf_value == 'skitter_slider'){
											$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
											
											$unserialise = unserialize($conf_desc);
											//var_dump($unserialise);

if ( $unserialise['navigation'] == 'none'){
$nav = 'numbers: false,';
}elseif ( $unserialise['navigation'] == 'numbers'){
$nav = 'numbers: true,';
}elseif ( $unserialise['navigation'] == 'dots'){
$nav = 'dots: true,';
}elseif ( $unserialise['navigation'] == 'dots_with_preview'){
			$nav = 'dots: true, 
					preview: true,';
}elseif ( $unserialise['navigation'] == 'thumbs'){
$nav = 'thumbs: true,';
}

if ( $unserialise['navigation'] == 'none' ){
$numbers_align = '';
}else{
$numbers_align = "numbers_align: '".$unserialise['numbers_align']."',";
}


if ( $unserialise['label'] == 'none'){
$label = 'labelAnimation: false,';
}elseif ( $unserialise['label'] == 'slideUp'){
$label = "labelAnimation: 'slideUp',";
}elseif ( $unserialise['label'] == 'left'){
$label = "labelAnimation: 'left',";
}elseif ( $unserialise['label'] == 'right'){
			$label = "labelAnimation: 'right',";
}elseif ( $unserialise['label'] == 'fixed'){
$label = "labelAnimation: 'fixed',";
}

if ( $unserialise['easing_default'] == 'null' ){
$easing_default = '';
}else{
$easing_default = "easing_default: '".$unserialise['easing_default']."',";
}

if ( $unserialise['animateNumberOut'] == 'null' ){
$animateNumberOut = '';
}else{
$animateNumberOut = "animateNumberOut: '".$unserialise['animateNumberOut']."',";
}

if ( $unserialise['animateNumberOver'] == 'null' ){
$animateNumberOver = '';
}else{
$animateNumberOver = "animateNumberOver: '".$unserialise['animateNumberOver']."',";
}

if ( $unserialise['animateNumberActive'] == 'null' ){
$animateNumberActive = '';
}else{
$animateNumberActive = "animateNumberActive: '".$unserialise['animateNumberActive']."',";
}

if ( $unserialise['controls_position'] == 'none' ){
$controls_position = '';
}else{
$controls_position = '

controls_position: "'.$unserialise['controls_position'].'",
controls: true,';
}

if ( $unserialise['focus_position'] == 'none' ){
$focus_position = '';
}else{
$focus_position = "focus_position: '".$unserialise['focus_position']."',";
}

			
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													${'SLIDER'.$arg .'_'. $val} = '
													<link type="text/css" href="http://arabesk125.net/themes/maitscocorporate/skitter.styles.css" media="all" rel="stylesheet" />
												<script type="text/javascript" src="http://arabesk125.net/themes/maitscocorporate/js/jquery.easing.1.3.js"></script>
												<script type="text/javascript" src="http://arabesk125.net/themes/maitscocorporate/js/jquery.animate-colors-min.js"></script>
												<script type="text/javascript" src="http://arabesk125.net/themes/maitscocorporate/js/jquery.skitter.js"></script>
													
													<script type="text/javascript" language="javascript">
													jQuery(document).ready(function() {
														jQuery(".'.$slidediv.'").skitter({
														
															velocity: '.$unserialise['velocity'].',
															interval: '.$unserialise['interval'].',
															'.$nav.'
															'.$numbers_align.'
															'.$label.'
															'.$easing_default.'
															'.$animateNumberOut.'
															'.$animateNumberOver.'
															'.$animateNumberActive.'
															'.$controls_position.'
															stop_over: '.$unserialise['stop_over'].',
															auto_play: '.$unserialise['auto_play'].',
															enable_navigation_keys: '.$unserialise['enable_navigation_keys'].',
															progressbar: '.$unserialise['progressbar'].',
															theme: "'.$unserialise['theme'].'"
														
														});
													});
												</script>
													
													<div class="box_skitter '.$slidediv.'">
													<ul>';
													
													
											$sql18 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result18 = $xoopsDB -> query( $sql18 );
											while ( $video_arr1448 = $xoopsDB -> fetchArray( $result18 ) ) {
											$bbb3 = $video_arr1448['image'];
											$bbbb = $video_arr1448['label'];
											$bbblink = $video_arr1448['link'];
											$qq = $arr['conf_value'];
													/*${'SLIDER'.$arg .'_'. $val} .= "
														<li>
															<a href='".$bbblink."' title='test'>
															<img src='$bbb3' title='test' alt='test' width='550' height='220' /></a>
															<div class='sb-description'><h3>test</h3></div>
														</li>";*/
														
														
														$class_animation = (!empty($unserialise['slider_animation']) ? 'class="'.$unserialise['slider_animation'].'"' : '');
														$image_slider = '<img src="'.$bbb3.'" '.$class_animation.' />';
																			${'SLIDER'.$arg .'_'. $val} .= "<li>";							
																if (!empty($bbblink)) {
																
																${'SLIDER'.$arg .'_'. $val} .= "<a href='".$bbblink."' title='".$bbbb."'>'".$image_slider."'</a>";
																
																}
																else {
																	${'SLIDER'.$arg .'_'. $val} .= $image_slider;
																}


																if (!empty($bbbb)) {

																${'SLIDER'.$arg .'_'. $val} .= "<div class='label_text'>
																	<p>".$bbbb."</p>
																</div>";
																
																}
																${'SLIDER'.$arg .'_'. $val} .= "</li>";	
				
														
														
														
														
											}
												${'SLIDER'.$arg .'_'. $val} .= '
															</ul>
												</div>';

			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
				elseif ($conf_value == 'camera'){
											$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													${'SLIDER'.$arg .'_'. $val} = '
													<link type="text/css" href="http://www.webresourcesdepot.com/wp-content/uploads/file/free_bootstrap_template/css/camera.css" media="all" rel="stylesheet" />
												<script type="text/javascript" src="http://arabesk125.net/themes/maitscocorporate/js/jquery.easing.1.3.js"></script>
												<script type="text/javascript" src="http://www.webresourcesdepot.com/wp-content/uploads/file/free_bootstrap_template/js/camera.js"></script>
													<script type="text/javascript" language="javascript">
													jQuery(document).ready(function() {
														jQuery("#'.$slidediv.'").camera();
													});
												</script>													
													        <div id="main_slider">
															<div class="camera_wrap" id="'.$slidediv.'">';
															
											$sql188 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result188 = $xoopsDB -> query( $sql188 );
											while ( $video_arr14488 = $xoopsDB -> fetchArray( $result188 ) ) {
											$bbb38 = $video_arr14488['image'];
											$bbbb8 = $video_arr14488['label'];
											$qq = $arr['conf_value'];
													${'SLIDER'.$arg .'_'. $val} .= "<div data-src='$bbb38'></div>";
											}								
															${'SLIDER'.$arg .'_'. $val} .= '
															</div><!-- #camera_wrap_1 -->
															<div class="clear"></div>	
														</div>  ';
											


			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
		
		//A ajouter next version ++++ de slider skin
		elseif ($conf_value == 's3Slider'){

		
		//error_reporting(E_ALL);
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
															
		
		${'SLIDER'.$arg .'_'. $val} = '
		<style>
		#'.$slidediv.' {
width: 550px;
height: 220px;
position: relative;
overflow: hidden;
}
		</style>
		
		  <div id="'.$slidediv.'">
        <ul id="slider1Content">
            <li class="slider1Image">
                <a href=""><img src="http://arabesk125.net/themes/maitscocorporate/slides/1.jpg" alt="Quality Websites" /></a>
                <span class="right"><strong>Quality Websites</strong><br />
				<font face="Tahoma" style="font-size: 10pt">Looking for quality websites? XOOPS is the best choice ! Try it now, its free</font></span></li>
            <li class="slider1Image">
                <a href=""><img src="http://arabesk125.net/themes/maitscocorporate/slides/2.jpg" alt="Your Page is You" /></a>
                <span class="right"><strong>Personolize your page</strong><br />
				<font size="2" face="Tahoma">With XOOPS, you can easley and quickly personalize your website look ! Your site is You! </font></span></li>
            <li class="slider1Image">
                <img src="http://arabesk125.net/themes/maitscocorporate/slides/3.jpg" alt="XOOPS is powered by You" />
                <span class="right"><strong>When Business Matters</strong><br />
				<font face="Tahoma" size="2">XOOPS is your partner in the success.</font> </span></li>
		    <li class="slider1Image">
                <img src="http://arabesk125.net/themes/maitscocorporate/slides/4.jpg" alt="Partner in success" />
                <span class="right"><strong>When Business Matters</strong><br />
				<font face="Tahoma" size="2">XOOPS is your partner in the success.</font> </span></li>
            </ul>
    </div>';
													
													${'SLIDER'.$arg .'_'. $val} .= '
													    <script type="text/javascript" src="http://arabesk125.net/themes/maitscocorporate/js/s3Slider.js"> </script>
														
												<script type="text/javascript">
												   jQuery.noConflict();  
												jQuery(document).ready(function($) {
												alert("ffff");
														$("#'.$slidediv.'").s3Slider({
															timeOut: 5000 
														});
													});
												</script>  
													
													
													
													';

		
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'theme333'){
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'theme333'){
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'theme333'){
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'theme333'){
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'theme333'){
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}

										
	}


?>