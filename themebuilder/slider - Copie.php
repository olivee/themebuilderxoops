<?php
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 

 global $xoopsDB;

	$sql = "SELECT distinct conf_id, conf_name, conf_catid, conf_value, conf_desc FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 2 ORDER BY conf_id DESC";
	$result = $xoopsDB->query($sql); 
	while (list($conf_id, $conf_name, $conf_catid, $conf_value, $conf_desc) = $xoopsDB->fetchRow($result)) {

		if ($conf_value == 'flexslider'){

			$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
			$arg = $conf_name; 
			$val = $conf_id;
			$slidediv = 'SLIDER_'.$arg .'_'. $val;
			$unserialise = unserialize($conf_desc);
			//var_dump($unserialise);
												
				${'SLIDER'.$arg .'_'. $val} = "<link rel='stylesheet' href='http://flexslider.woothemes.com/css/flexslider.css'>
				<div class=".$slidediv.">
					<ul class='slides'>";
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
						$aaa = $video_arrtheme1['image'];
						${'SLIDER'.$arg .'_'. $val} .= "<li>
															<img src='$aaa'>
														</li>";
					}
						${'SLIDER'.$arg .'_'. $val} .= "</ul></div>
														<script src='http://flexslider.woothemes.com/js/jquery.flexslider.js'></script>
														<script type='application/javascript'>
															jQuery(document).ready(function(){
																jQuery('.".$slidediv."').flexslider({
																	animation: '".$unserialise['slider_animation']."',
																	direction: '.".$unserialise['direction'].".',
																	animationSpeed: ".$unserialise['animationSpeed'].",
																	slideshowSpeed: ".$unserialise['slideshowSpeed'].",
																	controlNav: ".$unserialise['controlNav'].",
																	pauseOnHover: ".$unserialise['pauseOnHover'].",
																	directionNav: ".$unserialise['directionNav']."

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
			$unserialise = unserialize($conf_desc);
													
				${'SLIDER'.$arg .'_'. $val} = "<script src='https://b-templates4u-com.googlecode.com/svn/jquery.orbit-1.2.3.min.js' type='text/javascript'></script>
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
												${'SLIDER'.$arg .'_'. $val} .= "</div></div> 
																					<script type='application/javascript'>
																						jQuery(document).ready(function(){
																							jQuery('#".$slidediv."').orbit({          
																								 animation: '".$unserialise['slider_animation']."', //fade, horizontal-slide, vertical-slide
																								 animationSpeed: ".$unserialise['animationSpeed'].", //how fast animations are
																								 advanceSpeed: ".$unserialise['advanceSpeed'].", //if timer advance is enabled, time between transitions 
																								 pauseOnHover: ".$unserialise['pauseOnHover'].",
																								 startClockOnMouseOut: ".$unserialise['startClockOnMouseOut'].", //if timer should restart on MouseOut
																								 startClockOnMouseOutAfter: ".$unserialise['startClockOnMouseOutAfter'].", //how long after mouseout timer should start again
																								 directionalNav: ".$unserialise['directionalNav'].", //manual advancing directional navs
																								 captions: ".$unserialise['captions'].", //if has a title, will be placed at bottom
																								 captionAnimation: '".$unserialise['captionAnimation']."', //how quickly to animate in caption on load and between captioned and uncaptioned photos
																								 timer: ".$unserialise['timer'].", //if the circular timer is wanted
																								 bullets : ".$unserialise['bullets']."
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
			$unserialise = unserialize($conf_desc);
				//<script src='http://bxslider.com/js/jquery.min.js'></script>
				${'SLIDER'.$arg .'_'. $val} = "<!-- bxSlider Javascript file -->
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
													${'SLIDER'.$arg .'_'. $val} .= "</ul>
														<script type='text/javascript'>
															jQuery(document).ready(function(){
																  jQuery('.".$slidediv."').bxSlider({
																  mode: '".$unserialise['mode']."', //if the circular timer is wanted
																  animationSpeed : ".$unserialise['autoControls'].",
																  auto: ".$unserialise['auto'].", //if the circular timer is wanted
																  autoControls : ".$unserialise['autoControls']."
																  
																});
															});			
														</script>";
			$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'nivoslider'){ //probleme d'integration a refaire nivo-slider probleme css et js
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id;
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
											

													${'SLIDER'.$arg .'_'. $val} = "
													<script type='text/javascript' src='http://demo.dev7studios.com/nivo-slider/wp-content/plugins/nivo-slider/scripts/nivo-slider/jquery.nivo.slider.pack.js?ver=3.8.1'></script>
													<link rel='stylesheet' href='http://www.100scripts.com/demo/php/nivo-slider/nivoslider/nivo-slider.css' type='text/css' media='screen' />
																<style>
#slider-wrapper {
/*    background:url(images/slider.png) no-repeat; */
    width:998px;
    height:392px;
    margin:0 auto;
    padding-top:74px;
    margin-top:50px;
}
#slider img {
	position:absolute;
	top:0px;
	left:0px;
	display:none;
}
#slider a {
	border:0;
	display:block;
}

.nivo-controlNav {
	position:absolute;
	left:260px;
	bottom:-42px;
}
.nivo-controlNav a {
	display:block;
	width:22px;
	height:22px;
	background:url(themes/themebuilder/images/bullets.png) no-repeat;
	text-indent:-9999px;
	border:0;
	margin-right:3px;
	float:left;
}
.nivo-controlNav a.active {
	background-position:0 -22px;
}

.nivo-directionNav a {
	display:block;
	width:30px;
	height:30px;
	background:url(themes/themebuilder/images/arrows.png) no-repeat;
	text-indent:-9999px;
	border:0;
}
a.nivo-nextNav {
	background-position:-30px 0;
	right:15px;
}
a.nivo-prevNav {
	left:15px;
}

.nivo-caption {
    text-shadow:none;
    font-family: Helvetica, Arial, sans-serif;
}
.nivo-caption a { 
    color:#efe9d1;
    text-decoration:underline;
}

/*====================*/
/*=== Other Styles ===*/
/*====================*/
.clear {
	clear:both;
}
 
/* The Nivo Slider styles */
.nivoSlider {
	position:relative;
	height: 300px;
}
.nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	height:300px;
}
/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:300px;
	border:0;
	padding:0;
	margin:0;
	z-index:60;
	display:none;
}
/* The slices in the Slider */
.nivo-slice {
	display:block;
	position:absolute;
	z-index:50;
	height:300px;
}
/* Caption styles */
.nivo-caption {
	position:absolute;
	left:0px;
	bottom:0px;
	background:#000;
	color:#fff;
	opacity:0.8; /* Overridden by captionOpacity setting */
	width:100%;
	z-index:89;
}
.nivo-caption p {
	padding:5px;
	margin:0;
}
.nivo-caption a {
	display:inline !important;
}
.nivo-html-caption {
    display:none;
}
/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {
	position:absolute;
	top:45%;
	z-index:99;
	cursor:pointer;
}
.nivo-prevNav {
	left:0px;
}
.nivo-nextNav {
	right:0px;
}
/* Control nav styles (e.g. 1,2,3...) */
.nivo-controlNav a {
	position:relative;
	z-index:99;
	cursor:pointer;
}
.nivo-controlNav a.active {
	font-weight:bold;
}																
																
																
																</style>
																	<div id='".$slidediv."' class='nivoSlider'>";
											$sql1 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result1 = $xoopsDB -> query( $sql1 );
											while ( $video_arr144 = $xoopsDB -> fetchArray( $result1 ) ) {
											$bbb2 = $video_arr144['image'];
											//var_dump($bbb2);
														${'SLIDER'.$arg .'_'. $val} .= "				
																		<img src='".$bbb2."' alt='' />
																		<img src='http://demo.dev7studios.com/nivo-slider/files/2013/02/3928848343_42443ae67d_o.jpg' alt='' />
																		<img src='http://demo.dev7studios.com/nivo-slider/files/2013/02/4207529693_d4f03f6dd7_o.jpg' alt='' />
																		<img src='http://demo.dev7studios.com/nivo-slider/files/2013/02/5896103449_fa2c7a168d_b.jpg' alt='' />
																		<img src='http://demo.dev7studios.com/nivo-slider/files/2013/02/03037_liverpool_1920x1080.jpg' alt='' />
";
											}
																	${'SLIDER'.$arg .'_'. $val} .= "</div>
																							<script type='text/javascript'>
																								jQuery(window).load(function(){
																									jQuery('#".$slidediv."').nivoSlider({
																										effect:'fade',
																										slices:10,
																										boxCols:10,
																										boxRows:10,
																										animSpeed:600,
																										pauseTime:5000,
																										startSlide:0,
																										directionNav:true,
																										controlNav:true,
																										controlNavThumbs:false,
																										pauseOnHover:false,
																										manualAdvance:false
																									});
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

		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '
													
<style>
#slider'.$val.' {
    width: 100%; /* important to be same as image width */
    height: 300px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; /* important */
}
#slider'.$val.'Content {
    width: 100%;
    position: absolute;
	top: 0;
	margin-left: 0;
}
.slider'.$val.'Image {
    float: left;
    position: relative;
	display: none;
}
.slider'.$val.'Image span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 100%;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}
.clear {
	clear: both;
}
.slider0Image span strong {
    font-size: 14px;
}
.top {
	top: 0;
	left: 0;
}
.bottom {
	bottom: 0;
	left: 0;
}
.left {
	top: 0;
	left: 0;
	width: 110px !important;
	height: 251px;
}
.right {
	right: 0;
	bottom: 0;
	width: 90px !important;
	height: 256px;
}
.offset {
	left: 30px;
}
.offsetRight {
	right: 40px;
}
</style>										
               <!-- JavaScripts-->
		<script type="text/javascript" src="http://s3slider-original.googlecode.com/svn/trunk/s3Slider.js"></script>
		<script type="text/javascript">
		    $(document).ready(function() {
				$("#slider'.$val.'").s3Slider({
					timeOut: 3000
				});
		    });
		</script>
               

                <div id="slider'.$val.'">
                    <ul id="slider'.$val.'Content">';
					
					$sql188 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE  image IS NOT NULL AND catmenu = '.$val.'';
											$result188 = $xoopsDB -> query( $sql188 );
											while ( $video_arr14488 = $xoopsDB -> fetchArray( $result188 ) ) {
											$bbb38 = $video_arr14488['image'];
											$bbbb8 = $video_arr14488['label'];
											$qq = $arr['conf_value'];
													${'SLIDER'.$arg .'_'. $val} .= '
													
													
						<li class="slider'.$val.'Image">
                            <img src="'.$bbb38.'" />
                            <span class="top"><strong>Lorem ipsum dolor</strong><br />"'.$bbbb8.'"</span>

                        </li>';		
													
											}
											
											
											
					
					
					${'SLIDER'.$arg .'_'. $val} .= '

                        <div class="clear slider'.$val.'Image"></div>
                    </ul>
                </div>
                <!-- // slider0 -->
				<br />
					
													
													
													';
													
													${'SLIDER'.$arg .'_'. $val} .= '';

		
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersimplebasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '
													<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/shuffle-rotate/engine1/style.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1" style="font-size: 10px;">
	<div class="ws_images"><div style="width: 100%; visibility: hidden; font-size: 0px; line-height: 0;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/columns.jpg" alt="Columns: image gallery code" title="Columns" id="wows1_0" style="width: 100%;"></div><ul style="position: absolute; top: 0px; -webkit-animation: none; width: 1000%; left: -400%; -webkit-transform: translate3d(0px, 0px, 0px);">
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/columns.jpg" alt="Columns: image gallery code" title="Columns" id="wows1_0" style="visibility: visible;"></li>
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/flower.jpg" alt="Flower: image gallery examples" title="Flower" id="wows1_1" style="visibility: visible;"></li>
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/olive_tree.jpg" alt="Olive tree: image gallery html" title="Olive tree" id="wows1_2" style="visibility: visible;"></li>
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/panorama.jpg" alt="Panorama: image gallery javascript" title="Panorama" id="wows1_3" style="visibility: visible;"></li>
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/sea.jpg" alt="Sea view: image gallery using javascript" title="Sea view" id="wows1_4" style="visibility: visible;"></li>
<li style="width: 10%; font-size: 0px;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/view.jpg" alt="Amazing view: image gallery css" title="Amazing view" id="wows1_5" style="visibility: visible;"></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Columns" class="">1</a>
<a href="#" title="Flower" class="">2</a>
<a href="#" title="Olive tree" class="">3</a>
<a href="#" title="Panorama" class="">4</a>
<a href="#" title="Sea view" class="ws_selbull">5</a>
<a href="#" title="Amazing view">6</a>
<div class="ws_bulframe"><div><div style="width: 700%;"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/columns.jpg" alt="Columns"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/flower.jpg" alt="Flower"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/olive_tree.jpg" alt="Olive tree"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/panorama.jpg" alt="Panorama"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/sea.jpg" alt="Sea view"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/view.jpg" alt="Amazing view"></div></div><span></span></div></div></div>
<a style="display:none" href="http://wowslider.com">image gallery free</a>
	<div class="ws_shadow"></div>
	<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 10; background-color: rgb(255, 255, 255); opacity: 0; background-position: initial initial; background-repeat: initial initial;"><a href="#" style="display: none; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"></a></div><a href="#" class="ws_next"></a><a href="#" class="ws_prev"></a><div class="ws-title" style="display: block;"><span style="position: relative; visibility: visible; left: 0px; top: 0px; opacity: 0.6000000238418579;">Sea view</span><div style="position: relative; visibility: visible; left: 0px; top: 0px; opacity: 0.6000000238418579;">Mediterranean Sea</div></div></div>


	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/shuffle-rotate/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
		
		
		
		
		
		
		
		';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpremiumpage'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section1 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/premium-page/engine1/style.css" />
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/premium-page/engine1/style.mod.css"/>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section1 -->
	<div id="wowslider-container1" class="playpause">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/boat.jpg" alt="Boat at sunset: js image slider" title="Boat at sunset" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/coast.jpg" alt="Coast: js slider code" title="Coast" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/evening.jpg" alt="Evening: js slider" title="Evening" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/stones.jpg" alt="Stones near ocean: js Foto Slider" title="Stones near ocean" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/waves.jpg" alt="Ocean waves: js Slider für Bilder" title="Ocean waves" id="wows1_4"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Boat at sunset"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/boat.jpg" alt="Boat at sunset"/>1</a>
<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/coast.jpg" alt="Coast"/>2</a>
<a href="#" title="Evening"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/evening.jpg" alt="Evening"/>3</a>
<a href="#" title="Stones near ocean"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/stones.jpg" alt="Stones near ocean"/>4</a>
<a href="#" title="Ocean waves"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/waves.jpg" alt="Ocean waves"/>5</a>
</div></div>
<a style="display: none;" href="http://wowslider.com">js curseur wordpress</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/wowslider.mod.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderchessblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section2 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/chess-blinds/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section2 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/airplane.jpg" alt="Landing of airplane: ansprechende Diashow" title="Landing of airplane" id="wows1_0"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/bridge.jpg" alt="Bridge: Design für ansprechende" title="Bridge" id="wows1_1"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/cityscape.jpg" alt="Amazing cityscape: Web-Design anspricht" title="Amazing cityscape" id="wows1_2"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/fireworks.jpg" alt="Bright fireworks: ansprechende Diashow-Vorlage" title="Bright fireworks" id="wows1_3"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/quay.jpg" alt="Quay: ansprechende Bild Diaschau" title="Quay" id="wows1_4"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/lasershow.jpg" alt="Fantastic laser show: ansprechende Foto Slider" title="Fantastic laser show" id="wows1_5"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/sunrise.jpg" alt="Sunrise: ansprechende Slider" title="Sunrise" id="wows1_6"/>Brisbane, Australia</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Landing of airplane"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/airplane.jpg" alt="" /></a>
<a href="#" title="Bridge"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/bridge.jpg" alt="" /></a>
<a href="#" title="Amazing cityscape"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/cityscape.jpg" alt="" /></a>
<a href="#" title="Bright fireworks"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/fireworks.jpg" alt="" /></a>
<a href="#" title="Quay"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/quay.jpg" alt="" /></a>
<a href="#" title="Fantastic laser show"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/lasershow.jpg" alt="" /></a>
<a href="#" title="Sunrise"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/sunrise.jpg" alt="" /></a>
</div>
</div>
<a style="display: none;" href="http://wowslider.com">curseur sensible</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/chess-blinds/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergothicdomino'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section3 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/gothic-domino/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/gothic-domino/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section3 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/landscape.jpg" alt="Wonderful landscape: CSS3 Slider" title="Wonderful landscape" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/watersurface.jpg" alt="Water surface: CSS3 image slider" title="Water surface" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/mountains.jpg" alt="Mountains: Responsive CSS3 Slider" title="Mountains" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/trees.jpg" alt="Autumn trees: Diashow CSS3" title="Autumn trees" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/water.jpg" alt="Water and mountains: CSS3 Foto Slider" title="Water and mountains" id="wows1_4"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Wonderful landscape"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/landscape.jpg" alt="Wonderful landscape"/>1</a>
<a href="#" title="Water surface"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/watersurface.jpg" alt="Water surface"/>2</a>
<a href="#" title="Mountains"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/mountains.jpg" alt="Mountains"/>3</a>
<a href="#" title="Autumn trees"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/trees.jpg" alt="Autumn trees"/>4</a>
<a href="#" title="Water and mountains"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/water.jpg" alt="Water and mountains"/>5</a>
</div></div>
<a style="display: none;" href="http://wowslider.com">CSS-seulement glisseur</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/gothic-domino/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermetrorotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section4 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/metro-rotate/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section4 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/boats.jpg" alt="Boats in Portugal" title="Boats in Portugal" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/coast.jpg" alt="Coast" title="Coast" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/landscape.jpg" alt="Beautiful landscape" title="Beautiful landscape" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/lighthouse.jpg" alt="Lighthouse" title="Lighthouse" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/panorama.jpg" alt="Panorama" title="Panorama" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/seascape.jpg" alt="Sea-scape" title="Sea-scape" id="wows1_5"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Boats in Portugal"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/boats.jpg" alt="Boats in Portugal"/>1</a>
<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/coast.jpg" alt="Coast"/>2</a>
<a href="#" title="Beautiful landscape"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/landscape.jpg" alt="Beautiful landscape"/>3</a>
<a href="#" title="Lighthouse"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/lighthouse.jpg" alt="Lighthouse"/>4</a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/panorama.jpg" alt="Panorama"/>5</a>
<a href="#" title="Sea-scape"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/seascape.jpg" alt="Sea-scape"/>6</a>
</div></div>
<a style="display: none;" href="http://wowslider.com">Image CSS diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/metro-rotate/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderelegantlinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section5 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/elegant-linear/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section5 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/coast.jpg" alt="Coast" title="Coast" id="wows1_0"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/christtheredeemer.jpg" alt="Christ the Redeemer" title="Christ the Redeemer" id="wows1_1"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/nightlights.jpg" alt="Night lights" title="Night lights" id="wows1_2"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/panorama.jpg" alt="Panorama" title="Panorama" id="wows1_3"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/sunset.jpg" alt="Sunset" title="Sunset" id="wows1_4"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/view.jpg" alt="View of the city" title="View of the city" id="wows1_5"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/waterscape.jpg" alt="Waterscape" title="Waterscape" id="wows1_6"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/night.jpg" alt="City ​​at night" title="City ​​at night" id="wows1_7"/>Rio de Janeiro, Brazil</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/coast.jpg" alt="" /></a>
<a href="#" title="Christ the Redeemer"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/christtheredeemer.jpg" alt="" /></a>
<a href="#" title="Night lights"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/nightlights.jpg" alt="" /></a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/panorama.jpg" alt="" /></a>
<a href="#" title="Sunset"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/sunset.jpg" alt="" /></a>
<a href="#" title="View of the city"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/view.jpg" alt="" /></a>
<a href="#" title="Waterscape"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/waterscape.jpg" alt="" /></a>
<a href="#" title="City ​​at night"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/night.jpg" alt="" /></a>
</div>
</div>
<a style="display: none;" href="http://wowslider.com">Diaporama de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/elegant-linear/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergeometrickenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section6 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/geometric-kenburns/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section6 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/architecture.jpg" alt="Japanese architecture" title="Japanese architecture" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/branches.jpg" alt="Branches with flowers" title="Branches with flowers" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/landscape.jpg" alt="Amazing landscape" title="Amazing landscape" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/cherry_blossom.jpg" alt="Cherry blossom" title="Cherry blossom" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/garden.jpg" alt="Japanese garden" title="Japanese garden" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/flower.jpg" alt="Pink flowers" title="Pink flowers" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/rock_garden.jpg" alt="The Japanese rock garden" title="The Japanese rock garden" id="wows1_6"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Japanese architecture"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/architecture.jpg" alt="Japanese architecture"/>1</a>
<a href="#" title="Branches with flowers"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/branches.jpg" alt="Branches with flowers"/>2</a>
<a href="#" title="Amazing landscape"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/landscape.jpg" alt="Amazing landscape"/>3</a>
<a href="#" title="Cherry blossom"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/cherry_blossom.jpg" alt="Cherry blossom"/>4</a>
<a href="#" title="Japanese garden"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/garden.jpg" alt="Japanese garden"/>5</a>
<a href="#" title="Pink flowers"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/flower.jpg" alt="Pink flowers"/>6</a>
<a href="#" title="The Japanese rock garden"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/rock_garden.jpg" alt="The Japanese rock garden"/>7</a>
</div></div>
<a style="display: none;" href="http://wowslider.com">rotateur bannière</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/geometric-kenburns/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersurfaceblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section7 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/surface-blur/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section7 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/fish.jpg" alt="Yellow fish" title="Yellow fish" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/coral.jpg" alt="Coral" title="Coral" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/seaturtle.jpg" alt="Sea turtle" title="Sea turtle" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/fantastic.jpg" alt="Fantastic view" title="Fantastic view" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/muraena.jpg" alt="Muraena" title="Muraena" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/surface-blur/data1/images/underwater.jpg" alt="Underwater" title="Underwater" id="wows1_5"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Yellow fish"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/fish.jpg" alt="Yellow fish"/>1</a>
<a href="#" title="Coral"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/coral.jpg" alt="Coral"/>2</a>
<a href="#" title="Sea turtle"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/seaturtle.jpg" alt="Sea turtle"/>3</a>
<a href="#" title="Fantastic view"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/fantastic.jpg" alt="Fantastic view"/>4</a>
<a href="#" title="Muraena"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/muraena.jpg" alt="Muraena"/>5</a>
<a href="#" title="Underwater"><img src="http://www.wowslider.com/images/demo/surface-blur/data1/tooltips/underwater.jpg" alt="Underwater"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Photo en Diaporama Créateur</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/surface-blur/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidervernisagestackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section8 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/vernisage-stack-v/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section8 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/bullfinch.jpg" alt="Bullfinch" title="Bullfinch" id="wows1_0"/>The Bullfinch is a small passerine bird</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/duck.jpg" alt="Duck" title="Duck" id="wows1_1"/>Ducks may be found in both fresh water and sea water</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/seagull.jpg" alt="Seagull" title="Seagull" id="wows1_2"/>Gulls are typically medium to large birds</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/raven.jpg" alt="Raven" title="Raven" id="wows1_3"/>Raven is a large, all-black passerine bird.</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/robin.jpg" alt="Robin" title="Robin" id="wows1_4"/>Robin is a small insectivorous passerine bird</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/seagulls.jpg" alt="Seagulls" title="Seagulls" id="wows1_5"/>Gulls nest in large, densely packed noisy colonies</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/stork.jpg" alt="Stork" title="Stork" id="wows1_6"/>European White Stork</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Bullfinch"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/bullfinch.jpg" alt="" /></a>
<a href="#" title="Duck"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/duck.jpg" alt="" /></a>
<a href="#" title="Seagull"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/seagull.jpg" alt="" /></a>
<a href="#" title="Raven"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/raven.jpg" alt="" /></a>
<a href="#" title="Robin"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/robin.jpg" alt="" /></a>
<a href="#" title="Seagulls"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/seagulls.jpg" alt="" /></a>
<a href="#" title="Stork"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/stork.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">Carrousels dimage CSS</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/vernisage-stack-v/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderplasticsquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section9 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/plastic-squares/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section9 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/jungle.jpg" alt="Jungle" title="Jungle" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/mountainlandscape.jpg" alt="Mountain landscape" title="Mountain landscape" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/nature.jpg" alt="Beautiful nature" title="Beautiful nature" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/smoke.jpg" alt="Mountain in the smoke" title="Mountain in the smoke" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/palms.jpg" alt="Palms" title="Palms" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/waterandmountains.jpg" alt="Water and mountains" title="Water and mountains" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/images/waterfall.jpg" alt="Waterfall in the jungle" title="Waterfall in the jungle" id="wows1_6"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Jungle"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/jungle.jpg" alt="Jungle"/>1</a>
<a href="#" title="Mountain landscape"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/mountainlandscape.jpg" alt="Mountain landscape"/>2</a>
<a href="#" title="Beautiful nature"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/nature.jpg" alt="Beautiful nature"/>3</a>
<a href="#" title="Mountain in the smoke"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/smoke.jpg" alt="Mountain in the smoke"/>4</a>
<a href="#" title="Palms"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/palms.jpg" alt="Palms"/>5</a>
<a href="#" title="Water and mountains"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/waterandmountains.jpg" alt="Water and mountains"/>6</a>
<a href="#" title="Waterfall in the jungle"><img src="http://www.wowslider.com/images/demo/plastic-squares/data1/tooltips/waterfall.jpg" alt="Waterfall in the jungle"/>7</a>
</div></div>
<a style="display:none" href="http://wowslider.com">diaporama photo</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/plastic-squares/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderflatslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section10 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/flat-slices/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section10 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/fiord.jpg" alt="Fiord" title="Fiord" id="wows1_0"/>Amazing nature, Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/ice.jpg" alt="Ice" title="Ice" id="wows1_1"/>In the mountains of Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/kjeragbolten.jpg" alt="Kjeragbolten" title="Kjeragbolten" id="wows1_2"/>Kjeragbolten is a boulder wedged in a mountain crevasse</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/norway.jpg" alt="Norway" title="Norway" id="wows1_3"/>City in Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/town.jpg" alt="Town" title="Town" id="wows1_4"/>Town by the sea</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/winter.jpg" alt="Winter" title="Winter" id="wows1_5"/>Snowy landscape</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Fiord"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/fiord.jpg" alt="Fiord"/>1</a>
<a href="#" title="Ice"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/ice.jpg" alt="Ice"/>2</a>
<a href="#" title="Kjeragbolten"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/kjeragbolten.jpg" alt="Kjeragbolten"/>3</a>
<a href="#" title="Norway"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/norway.jpg" alt="Norway"/>4</a>
<a href="#" title="Town"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/town.jpg" alt="Town"/>5</a>
<a href="#" title="Winter"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/winter.jpg" alt="Winter"/>6</a>
</div></div>
<a class="wsl" href="http://wowslider.com">image precedente slideshow</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/flat-slices/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderstudiofade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section11 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/studio-fade/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section11 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/bay.jpg" alt="Boats in the bay" title="Boats in the bay" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/ocean.jpg" alt="Palms and ocean" title="Palms and ocean" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sun.jpg" alt="Amazing sunset" title="Amazing sunset" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/shore.jpg" alt="Sandy shore by the ocean" title="Sandy shore by the ocean" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sea.jpg" alt="Pier and sea" title="Pier and sea" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/spray.jpg" alt="Ocean spray" title="Ocean spray" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sunset.jpg" alt="Coast at sunset" title="Coast at sunset" id="wows1_6"/></li>
<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/palms.jpg" alt="Palms and blue sky" title="Palms and blue sky" id="wows1_7"/></li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Boats in the bay"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/bay.jpg" alt="" /></a>
<a href="#" title="Palms and ocean"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/ocean.jpg" alt="" /></a>
<a href="#" title="Amazing sunset"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sun.jpg" alt="" /></a>
<a href="#" title="Sandy shore by the ocean"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/shore.jpg" alt="" /></a>
<a href="#" title="Pier and sea"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sea.jpg" alt="" /></a>
<a href="#" title="Ocean spray"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/spray.jpg" alt="" /></a>
<a href="#" title="Coast at sunset"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sunset.jpg" alt="" /></a>
<a href="#" title="Palms and blue sky"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/palms.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">jQuery diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/studio-fade/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpushstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section12 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/push-stack/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section12 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/mountains.jpg" alt="Mountains" title="Mountains" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/alps_range_france.jpg" alt="Alps range" title="Alps range" id="wows1_1"/>France</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/elbrus_mountain_russia.jpg" alt="Elbrus mountain" title="Elbrus mountain" id="wows1_2"/>Russia</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/everest_nepal.jpg" alt="Peak of Everest" title="Peak of Everest" id="wows1_3"/>Nepal</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/snow_on_the_top.jpg" alt="Snow on the top of a mountain" title="Snow on the top of a mountain" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/the_peak_of_mountain_lhotse_nepal.jpg" alt="The peak of mountain Lhotse" title="The peak of mountain Lhotse" id="wows1_5"/>Nepal</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/trees.jpg" alt="Trees" title="Trees" id="wows1_6"/>Trees in the mountains</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Mountains"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/mountains.jpg" alt="Mountains"/>1</a>
<a href="#" title="Alps range"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/alps_range_france.jpg" alt="Alps range"/>2</a>
<a href="#" title="Elbrus mountain"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/elbrus_mountain_russia.jpg" alt="Elbrus mountain"/>3</a>
<a href="#" title="Peak of Everest"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/everest_nepal.jpg" alt="Peak of Everest"/>4</a>
<a href="#" title="Snow on the top of a mountain"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/snow_on_the_top.jpg" alt="Snow on the top of a mountain"/>5</a>
<a href="#" title="The peak of mountain Lhotse"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/the_peak_of_mountain_lhotse_nepal.jpg" alt="The peak of mountain Lhotse"/>6</a>
<a href="#" title="Trees"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/trees.jpg" alt="Trees"/>7</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Galerie de photos CSS</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/push-stack/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderbalanceblast'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section13 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/balance-blast/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section13 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/dahlia.jpg" alt="Dahlia" title="Dahlia" id="wows1_0"/>The dahlia was declared the national flower of Mexico in 1963.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/daisy.jpg" alt="European Michaelmas Daisy" title="European Michaelmas Daisy" id="wows1_1"/>The genus name (Aster) comes from the Greek and means "star-shaped flower."</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/flower.jpg" alt="Yellow flower" title="Yellow flower" id="wows1_2"/>Yellow petals and green leafs</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/lily.jpg" alt="Lily" title="Lily" id="wows1_3"/>White lily is native to the Balkans and West Asia.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/chrysanthemums.jpg" alt="Chrysanthemums" title="Chrysanthemums" id="wows1_4"/>The name "chrysanthemum" is derived from the Greek words, chrysos (gold) and anthemon (flower).</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/marigold.jpg" alt="Marigold" title="Marigold" id="wows1_5"/>The genus is native to North and South America, but some species have become naturalized around the world.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/yellow.jpg" alt="Flower" title="Flower" id="wows1_6"/>Pretty yellow flower</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Dahlia"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/dahlia.jpg" alt="" /></a>
<a href="#" title="European Michaelmas Daisy"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/daisy.jpg" alt="" /></a>
<a href="#" title="Yellow flower"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/flower.jpg" alt="" /></a>
<a href="#" title="Lily"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/lily.jpg" alt="" /></a>
<a href="#" title="Chrysanthemums"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/chrysanthemums.jpg" alt="" /></a>
<a href="#" title="Marigold"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/marigold.jpg" alt="" /></a>
<a href="#" title="Flower"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/yellow.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">Diaporama dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/balance-blast/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercloudfly'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section14 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/cloud-fly/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section14 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/alder.jpg" alt="Alder branches" title="Alder branches" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/ashberry.jpg" alt="Frozen rowan berries" title="Frozen rowan berries" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/autumn.jpg" alt="Bright autumn leaves" title="Bright autumn leaves" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/branch.jpg" alt="Branch and rowan leaf" title="Branch and rowan leaf" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/leaf.jpg" alt="Autumn leaf in the water" title="Autumn leaf in the water" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/leaves.jpg" alt="Maple leafs" title="Maple leafs" id="wows1_5"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Alder branches"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/alder.jpg" alt="Alder branches"/>1</a>
<a href="#" title="Frozen rowan berries"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/ashberry.jpg" alt="Frozen rowan berries"/>2</a>
<a href="#" title="Bright autumn leaves"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/autumn.jpg" alt="Bright autumn leaves"/>3</a>
<a href="#" title="Branch and rowan leaf"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/branch.jpg" alt="Branch and rowan leaf"/>4</a>
<a href="#" title="Autumn leaf in the water"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/leaf.jpg" alt="Autumn leaf in the water"/>5</a>
<a href="#" title="Maple leafs"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/leaves.jpg" alt="Maple leafs"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Diaporama pour photo</a>
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/cloud-fly/engine1/script.js"></script>
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdriverotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section15 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/drive-rotate/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section15 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/forest.jpg" alt="Nature" title="Nature" id="wows1_0"/>Forest lake</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/nature.jpg" alt="Wonderful nature" title="Wonderful nature" id="wows1_1"/>Several trees near the water</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/stream.jpg" alt="Water stream" title="Water stream" id="wows1_2"/>Water stream flows through the forest</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/lake.jpg" alt="Shore of the lake" title="Shore of the lake" id="wows1_3"/>Return to nature</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/twilight.jpg" alt="Twilight" title="Twilight" id="wows1_4"/>Twilight on the lake</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/water.jpg" alt="Shore" title="Shore" id="wows1_5"/>Near the water</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Nature"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/forest.jpg" alt="Nature"/>1</a>
<a href="#" title="Wonderful nature"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/nature.jpg" alt="Wonderful nature"/>2</a>
<a href="#" title="Water stream"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/stream.jpg" alt="Water stream"/>3</a>
<a href="#" title="Shore of the lake"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/lake.jpg" alt="Shore of the lake"/>4</a>
<a href="#" title="Twilight"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/twilight.jpg" alt="Twilight"/>5</a>
<a href="#" title="Shore"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/water.jpg" alt="Shore"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Galerie dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/drive-rotate/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersubwaybasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section16 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/subway-basic/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section16 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/ears.jpg" alt="Ears" title="Ears" id="wows1_0"/>The sun shines through the ears</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/cloud.jpg" alt="Cloud" title="Cloud" id="wows1_1"/>Golden clouds at sunset</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/mist.jpg" alt="Mist" title="Mist" id="wows1_2"/>Misty sunset</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/seed.jpg" alt="Seed" title="Seed" id="wows1_3"/>Seed in the sun</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/sun.jpg" alt="Sun" title="Sun" id="wows1_4"/>A cloud covers the sun</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/tree.jpg" alt="Amazing landscape" title="Amazing landscape" id="wows1_5"/>Tree at sunset</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Ears"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/ears.jpg" alt="Ears"/>1</a>
<a href="#" title="Cloud"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/cloud.jpg" alt="Cloud"/>2</a>
<a href="#" title="Mist"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/mist.jpg" alt="Mist"/>3</a>
<a href="#" title="Seed"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/seed.jpg" alt="Seed"/>4</a>
<a href="#" title="Sun"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/sun.jpg" alt="Sun"/>5</a>
<a href="#" title="Amazing landscape"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/tree.jpg" alt="Amazing landscape"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">galerie photos pour votre site</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/subway-basic/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersilenceblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section17 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/silence-blur/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section17 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bug.jpg" alt="Bug : HTML slideshow" title="Bug" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bumblebee.jpg" alt="Bumblebee on the flower : html slideshow for website" title="Bumblebee on the flower" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/caterpillar.jpg" alt="Bright caterpillar : html slideshow maker" title="Bright caterpillar" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/fly.jpg" alt="Two flies : jquery html slideshow" title="Two flies" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bug1.jpg" alt="Bug und dewdrops : photo html slideshow" title="Bug und dewdrops" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/pondskater.jpg" alt="Pond skater : html slideshow with links" title="Pond skater" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/spider.jpg" alt="A spider makes a web : html slideshow with thumbnails" title="A spider makes a web" id="wows1_6"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Bug"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bug.jpg" alt="Bug"/>1</a>
<a href="#" title="Bumblebee on the flower"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bumblebee.jpg" alt="Bumblebee on the flower"/>2</a>
<a href="#" title="Bright caterpillar"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/caterpillar.jpg" alt="Bright caterpillar"/>3</a>
<a href="#" title="Two flies"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/fly.jpg" alt="Two flies"/>4</a>
<a href="#" title="Bug und dewdrops"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bug1.jpg" alt="Bug und dewdrops"/>5</a>
<a href="#" title="Pond skater"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/pondskater.jpg" alt="Pond skater"/>6</a>
<a href="#" title="A spider makes a web"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/spider.jpg" alt="A spider makes a web"/>7</a>
</div></div>
<a style="display:none" href="http://wowslider.com">HTML photo diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/silence-blur/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdominionblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section18 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/dominion-blinds/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section18 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/reflection.jpg" alt="Reflection : HTML gallery" title="Reflection" id="wows1_0"/>Sky reflected in water</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/field.jpg" alt="Field : html photo gallery creator" title="Field" id="wows1_1"/>Sunset in the field</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/landscape.jpg" alt="Lundscape : html gallery scroller" title="Lundscape" id="wows1_2"/>Beautiful nature</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/river.jpg" alt="River : html scrolling gallery" title="River" id="wows1_3"/>River und summer greens</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/cloud.jpg" alt="Clouds : html website gallery" title="Clouds" id="wows1_4"/>Cloudy sky</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/windvane.jpg" alt="Wind vane : html slideshow gallery" title="Wind vane" id="wows1_5"/>Wind vane at sunset</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/road.jpg" alt="Road : html gallery css" title="Road" id="wows1_6"/>Road near the forest</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sky.jpg" alt="Sky : html image gallery" title="Sky" id="wows1_7"/>Branches und amazing pink sky</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sun.jpg" alt="Sun : html gallery javascript" title="Sun" id="wows1_8"/>The sun sets over the horizon</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sunset.jpg" alt="Sunset : html gallery with captions" title="Sunset" id="wows1_9"/>Fantastic orange sky</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Reflection"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/reflection.jpg" alt="" /></a>
<a href="#" title="Field"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/field.jpg" alt="" /></a>
<a href="#" title="Lundscape"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/landscape.jpg" alt="" /></a>
<a href="#" title="River"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/river.jpg" alt="" /></a>
<a href="#" title="Clouds"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/cloud.jpg" alt="" /></a>
<a href="#" title="Wind vane"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/windvane.jpg" alt="" /></a>
<a href="#" title="Road"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/road.jpg" alt="" /></a>
<a href="#" title="Sky"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/sky.jpg" alt="" /></a>
<a href="#" title="Sun"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/sun.jpg" alt="" /></a>
<a href="#" title="Sunset"><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/tooltips/sunset.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">Galerie dimages HTML</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/dominion-blinds/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercalmkenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section19 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/calm-kenburns/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section19 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/camomile.jpg" alt="Camomile : HTML slider" title="Camomile" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/drops.jpg" alt="Drops : html image slider" title="Drops" id="wows1_1"/>Raindrops on the leaf</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/flower.jpg" alt="Purple flower : html slider jquery" title="Purple flower" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/green.jpg" alt="Forest green : responsive html slider" title="Forest green" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/leaf.jpg" alt="Leaf : html javascript image slider" title="Leaf" id="wows1_4"/>Autumn leaf on the water</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/physalis.jpg" alt="Physalis : html website slider" title="Physalis" id="wows1_5"/>Bright flowers</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/thistle.jpg" alt="Thistle : html thumbnail slider" title="Thistle" id="wows1_6"/></li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Camomile"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/camomile.jpg" alt="" /></a>
<a href="#" title="Drops"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg" alt="" /></a>
<a href="#" title="Purple flower"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/flower.jpg" alt="" /></a>
<a href="#" title="Forest green"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/green.jpg" alt="" /></a>
<a href="#" title="Leaf"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/leaf.jpg" alt="" /></a>
<a href="#" title="Physalis"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/physalis.jpg" alt="" /></a>
<a href="#" title="Thistle"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/thistle.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">HTML Diaporama sur limage</a>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/calm-kenburns/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderprimetimelinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section20 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/prime-time-linear/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section20 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/bay.jpg" alt="Bay" title="Bay" id="wows1_0"/>Boats in the bay</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/black_sea.jpg" alt="Black sea" title="Black sea" id="wows1_1"/>Rocky shore of the Black Sea</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/boats_near__the__shore.jpg" alt="Boats" title="Boats" id="wows1_2"/>Boats near the shore</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/motor_vessel.jpg" alt="Motor vessel" title="Motor vessel" id="wows1_3"/>River cruise</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/river.jpg" alt="River" title="River" id="wows1_4"/>Beautiful nature</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/rocky_shore.jpg" alt="Shore" title="Shore" id="wows1_5"/>Rocky shore</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/sea_birds.jpg" alt="Sea birds" title="Sea birds" id="wows1_6"/>Birds are walking along the coast</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/ship.jpg" alt="Ship" title="Ship" id="wows1_7"/>A ship goes</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/ship_at_sunset.jpg" alt="Ship at sunset" title="Ship at sunset" id="wows1_8"/>Amazing sea sunset</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/waterscape.jpg" alt="Waterscape" title="Waterscape" id="wows1_9"/>River on a sunny morning</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Bay"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/bay.jpg" alt="" />image scroller jquery</a>
<a href="#" title="Black sea"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/black_sea.jpg" alt="" />javascript image scroller</a>
<a href="#" title="Boats"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/boats_near__the__shore.jpg" alt="" />horizontal image scroller</a>
<a href="#" title="Motor vessel"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/motor_vessel.jpg" alt="" />jquery image scroller horizontal</a>
<a href="#" title="River"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/river.jpg" alt="" />jquery horizontal image scroller</a>
<a href="#" title="Shore"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/rocky_shore.jpg" alt="" />wordpress image scroller</a>
<a href="#" title="Sea birds"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/sea_birds.jpg" alt="" />vertical image scroller</a>
<a href="#" title="Ship"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/ship.jpg" alt="" />image scroller html</a>
<a href="#" title="Ship at sunset"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/ship_at_sunset.jpg" alt="" />html image scroller</a>
<a href="#" title="Waterscape"><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/tooltips/waterscape.jpg" alt="" />jquery vertical image scroller</a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">Scroller dimage</a>
	<div class="ws_shadow"></div>
	</div>
	
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/prime-time-linear/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdarkmattersquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section21 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/dark-matter-squares/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section21 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/beautiful_nature.jpg" alt="Beautiful nature" title="Beautiful nature" id="wows1_0"/>Near the castle</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/bridge.jpg" alt="Bridge" title="Bridge" id="wows1_1"/>Charles Bridge in Prague</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/cathedral.jpg" alt="Cathedral" title="Cathedral" id="wows1_2"/>Saint Vitus Cathedral in Prague</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/cityscape.jpg" alt="Cityscape" title="Cityscape" id="wows1_3"/>View of Prague, Czech</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/countryside.jpg" alt="Countryside" title="Countryside" id="wows1_4"/>Czech Republic</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/in_the_evening.jpg" alt="In the evening" title="In the evening" id="wows1_5"/>Prague in the evening</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/millwheel.jpg" alt="Mill-wheel" title="Mill-wheel" id="wows1_6"/>Mil- wheel on the Vltava river</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/panorama.jpg" alt="Panorama" title="Panorama" id="wows1_7"/>A view from Lookout Tower</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/river.jpg" alt="River" title="River" id="wows1_8"/>The Vltava is the longest river in the Czech Republic</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/twilight.jpg" alt="Twilight" title="Twilight" id="wows1_9"/>The Vltava in the evening</li>
<li><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/images/waterscape.jpg" alt="Waterscape" title="Waterscape" id="wows1_10"/>Boats on the river</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Beautiful nature"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/beautiful_nature.jpg" alt="Beautiful nature"/>Free Slider</a>
<a href="#" title="Bridge"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/bridge.jpg" alt="Bridge"/>Image Slider Free</a>
<a href="#" title="Cathedral"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/cathedral.jpg" alt="Cathedral"/>Free jQuery Slider</a>
<a href="#" title="Cityscape"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/cityscape.jpg" alt="Cityscape"/>Free Photo Slider</a>
<a href="#" title="Countryside"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/countryside.jpg" alt="Countryside"/>Free Javascript Slider</a>
<a href="#" title="In the evening"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/in_the_evening.jpg" alt="In the evening"/>Free jQuery Slideshow</a>
<a href="#" title="Mill-wheel"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/millwheel.jpg" alt="Mill-wheel"/>Free Wordpress Slider</a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/panorama.jpg" alt="Panorama"/>Free Website Slider</a>
<a href="#" title="River"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/river.jpg" alt="River"/>Free HTML Slider</a>
<a href="#" title="Twilight"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/twilight.jpg" alt="Twilight"/>Free Download Slider</a>
<a href="#" title="Waterscape"><img src="http://www.wowslider.com/images/demo/dark-matter-squares/data1/tooltips/waterscape.jpg" alt="Waterscape"/>Free Image Gallery</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Diaporama sur limage</a>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/dark-matter-squares/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercatalystfade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section22 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/catalyst-fade/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section22 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/alligator.jpg" alt="Alligator" title="Alligator" id="wows1_0"/>An alligator is swimming.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/antelope.jpg" alt="Antelope" title="Antelope" id="wows1_1"/>The addax, also known as the screwhorn antelope.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/bison.jpg" alt="Bison" title="Bison" id="wows1_2"/>A bison has a long, brown coat.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/cat.jpg" alt="Fishing cat" title="Fishing cat" id="wows1_3"/>Fishing cat is sleeping</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/clouded_leopard.jpg" alt="Clouded leopard" title="Clouded leopard" id="wows1_4"/>The clouded leopard is a felid found from the Himalayan foothills.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/deer.jpg" alt="Deer" title="Deer" id="wows1_5"/>The spotted deer or the Japanese deer.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/dog.jpg" alt="Dog" title="Dog" id="wows1_6"/>German shepherd dog</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/hippopotamus.jpg" alt="Hippopotamus" title="Hippopotamus" id="wows1_7"/>The hippopotamus is a large mammal in sub-Saharan Africa.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/lizard.jpg" alt="Lizard" title="Lizard" id="wows1_8"/>Nice green lizard</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/polar_bear.jpg" alt="Polar bear" title="Polar bear" id="wows1_9"/>Native largely within the Arctic Circle encompassing the Arctic Ocean.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/river_otter.jpg" alt="River otter" title="River otter" id="wows1_10"/>The otters diet mainly consists of fish.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/tortoise.jpg" alt="Tortoise" title="Tortoise" id="wows1_11"/>Galapagos giant tortoise.</li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/turtle_and_frogs.jpg" alt="Turtle and frogs" title="Turtle and frogs" id="wows1_12"/>The inhabitants of the pond.</li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Alligator"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/alligator.jpg" alt="" /></a>
<a href="#" title="Antelope"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/antelope.jpg" alt="" /></a>
<a href="#" title="Bison"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/bison.jpg" alt="" /></a>
<a href="#" title="Fishing cat"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/cat.jpg" alt="" /></a>
<a href="#" title="Clouded leopard"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/clouded_leopard.jpg" alt="" /></a>
<a href="#" title="Deer"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/deer.jpg" alt="" /></a>
<a href="#" title="Dog"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/dog.jpg" alt="" /></a>
<a href="#" title="Hippopotamus"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/hippopotamus.jpg" alt="" /></a>
<a href="#" title="Lizard"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/lizard.jpg" alt="" /></a>
<a href="#" title="Polar bear"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/polar_bear.jpg" alt="" /></a>
<a href="#" title="River otter"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/river_otter.jpg" alt="" /></a>
<a href="#" title="Tortoise"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/tortoise.jpg" alt="" /></a>
<a href="#" title="Turtle and frogs"><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/tooltips/turtle_and_frogs.jpg" alt="" /></a>
</div>
</div>
<a style="display:none" href="http://wowslider.com">jQuery bannière de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/catalyst-fade/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercatalystdigitalstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section23 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/catalyst-digital-stack/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section23 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/alley_in_autumn.jpg" alt="Alley in autumn : jQuery Picture Slider" title="Alley in autumn" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_landscape.jpg" alt="Autumn landscape : jQuery Picture Slideshow" title="Autumn landscape" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_leaf.jpg" alt="Autumn leaf : Free Picture Slider" title="Autumn leaf" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_trees.jpg" alt="Autumn trees : Javascript Picture Slider" title="Autumn trees" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/birch_trees_in_autumn.jpg" alt="Birch trees in autumn : HTML Picture Slider" title="Birch trees in autumn" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/forest_lake.jpg" alt="Forest lake : jQuery Picture Gallery" title="Forest lake" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/forest_path.jpg" alt="Forest path : CSS Picture Slider" title="Forest path" id="wows1_6"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/maple_leaf.jpg" alt="Maple leaf : jQuery Image Slider" title="Maple leaf" id="wows1_7"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/pond_in_autumn.jpg" alt="Pond in autumn : jQuery Picture Carousel" title="Pond in autumn" id="wows1_8"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/red_leaf.jpg" alt="Red leaf : Picture Slider" title="Red leaf" id="wows1_9"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Alley in autumn"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/alley_in_autumn.jpg" alt="Alley in autumn"/>1</a>
<a href="#" title="Autumn lundscape"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/autumn_landscape.jpg" alt="Autumn landscape"/>2</a>
<a href="#" title="Autumn leaf"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/autumn_leaf.jpg" alt="Autumn leaf"/>3</a>
<a href="#" title="Autumn trees"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/autumn_trees.jpg" alt="Autumn trees"/>4</a>
<a href="#" title="Birch trees in autumn"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/birch_trees_in_autumn.jpg" alt="Birch trees in autumn"/>5</a>
<a href="#" title="Forest lake"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/forest_lake.jpg" alt="Forest lake"/>6</a>
<a href="#" title="Forest path"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/forest_path.jpg" alt="Forest path"/>7</a>
<a href="#" title="Maple leaf"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/maple_leaf.jpg" alt="Maple leaf"/>8</a>
<a href="#" title="Pond in autumn"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/pond_in_autumn.jpg" alt="Pond in autumn"/>9</a>
<a href="#" title="Red leaf"><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/tooltips/red_leaf.jpg" alt="Red leaf"/>10</a>
</div></div>
<a style="display:none" href="http://wowslider.com">photo Diaporama jquery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/catalyst-digital-stack/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderquietrotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section24 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/quiet-rotate/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section24 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/white_peafowl.jpg" alt="White peafowl : Javascript Slideshow" title="White peafowl" id="wows1_0"/>Albino peafowl in the park</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/duck.jpg" alt="Duck : jQuery Image Slideshow" title="Duck" id="wows1_1"/>Duck stays near the pond</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/flamingo.jpg" alt="Flamingo : Javascript Photo Slideshow" title="Flamingo" id="wows1_2"/>Sleeping flamingo at Prague Zoo</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/nice_peafowl.jpg" alt="Nice peafowl : Javascript Slider" title="Nice peafowl" id="wows1_3"/>The peacock spreads its tail</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/swan.jpg" alt="Swan: Javascript Horizontal Slideshow" title="Swan" id="wows1_4"/>Swan is swimming on the lake</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/peafowl.jpg" alt="Peafowl : Javascript Code for Slideshow" title="Peafowl" id="wows1_5"/>Peafowl at Prague Zoo</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="White peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/white_peafowl.jpg" alt="White peafowl"/>Javascript Picture Slideshow</a>
<a href="#" title="Duck"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/duck.jpg" alt="Duck"/>Javascript Banner Slideshow</a>
<a href="#" title="Flamingo"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/flamingo.jpg" alt="Flamingo"/>Javascript Script for Slideshow</a>
<a href="#" title="Nice peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/nice_peafowl.jpg" alt="Nice peafowl"/>Javascript Gallery Slideshow</a>
<a href="#" title="Swan"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/swan.jpg" alt="Swan"/>Simple Javascript Slideshow</a>
<a href="#" title="Peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/peafowl.jpg" alt="Peafowl"/>JS Slideshow</a>
</div></div>
<a style="display:none" href="http://wowslider.com">jQuery diaporama dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/quiet-rotate/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderelementalslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section25 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/elemental-slices/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section25 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/lily.jpg" alt="lily" title="lily" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/beatiful_flowers.jpg" alt="beatiful flowers" title="beatiful flowers" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/bumblebee_on_the_mallow.jpg" alt="bumblebee on the mallow" title="bumblebee on the mallow" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/flowers.jpg" alt="flowers" title="flowers" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/lilies.jpg" alt="lilies" title="lilies" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/mallow.jpg" alt="mallow" title="mallow" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/red_roses.jpg" alt="red roses" title="red roses" id="wows1_6"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/phlox.jpg" alt="phlox" title="phlox" id="wows1_7"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/pink_flowers.jpg" alt="pink flowers" title="pink flowers" id="wows1_8"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/spring_flowers.jpg" alt="spring flowers" title="spring flowers" id="wows1_9"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/roses.jpg" alt="roses" title="roses" id="wows1_10"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/white_flowers.jpg" alt="white flowers" title="white flowers" id="wows1_11"/></li>
<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/yellow_dahlia.jpg" alt="yellow dahlia" title="yellow dahlia" id="wows1_12"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="lily"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/lily.jpg" alt="lily"/>jQuery CSS Slider</a>
<a href="#" title="beatiful flowers"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/beatiful_flowers.jpg" alt="beatiful flowers"/>CSS3 Slider</a>
<a href="#" title="bumblebee on the mallow"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/bumblebee_on_the_mallow.jpg" alt="bumblebee on the mallow"/>CSS Image Slider</a>
<a href="#" title="flowers"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/flowers.jpg" alt="flowers"/>Image Slider with CSS only</a>
<a href="#" title="lilies"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/lilies.jpg" alt="lilies"/>Pure CSS Slider</a>
<a href="#" title="mallow"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/mallow.jpg" alt="mallow"/>jQuery CSS Slideshow</a>
<a href="#" title="red roses"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/red_roses.jpg" alt="red roses"/>Pure CSS Slideshow</a>
<a href="#" title="phlox"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/phlox.jpg" alt="phlox"/>CSS Content Slider</a>
<a href="#" title="pink flowers"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/pink_flowers.jpg" alt="pink flowers"/>CSS HTML Slider</a>
<a href="#" title="spring flowers"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/spring_flowers.jpg" alt="spring flowers"/>CSS Photo Slider</a>
<a href="#" title="roses"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/roses.jpg" alt="roses"/>CSS Image Gallery</a>
<a href="#" title="white flowers"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/white_flowers.jpg" alt="white flowers"/>CSS HTML Gallery</a>
<a href="#" title="yellow dahlia"><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/tooltips/yellow_dahlia.jpg" alt="yellow dahlia"/>CSS-only Gallery</a>
</div></div>
<a style="display:none" href="http://wowslider.com">CSS Diaporama jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/elemental-slices/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidershadystackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section26 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/shady-stack-v/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section26 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/bream_bay.jpg" alt="Bream bay" title="Bream bay" id="wows1_0"/>Bream Bay From The Brynderwyn Ranges</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/dunes_and_harbour.jpg" alt="dunes and harbour" title="dunes and harbour" id="wows1_1"/>Mangawhais sund dunes are a dominant feature of the harbour.</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/head_rock.jpg" alt="Head Rock" title="Head Rock" id="wows1_2"/>Head Rock (Mangawhai Heads)</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/ligurian_sea.jpg" alt="Ligurian sea" title="Ligurian sea" id="wows1_3"/>Ligurian Sea from Vernazza, Cinque Terre, Italy. </li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/look_mangawhai_heads.jpg" alt="look Mangawhai heads" title="look Mangawhai heads" id="wows1_4"/>Looking Down at Mangawhai Heads</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/malibu_lagoon.jpg" alt="Malibu lagoon" title="Malibu lagoon" id="wows1_5"/>The Malibu Lagoon is both a freshwater und saltwater ecosystem.</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/mangawhai_heads.jpg" alt="Mangawhai heads" title="Mangawhai heads" id="wows1_6"/>Panorama of Mangawhai Heads, a beautiful coastal town.</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/ocean.jpg" alt="ocean" title="ocean" id="wows1_7"/></li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/ocean_rainbow.jpg" alt="ocean rainbow" title="ocean rainbow" id="wows1_8"/>Rainbow over the ocean.</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/sea_dragon.jpg" alt="sea dragon" title="sea dragon" id="wows1_9"/>Sea dragon close-up.</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/sea_fight.jpg" alt="sea fight" title="sea fight" id="wows1_10"/>A sea walter wave passing over rocks, mixing with calm water</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/sea_spray.jpg" alt="sea spray" title="sea spray" id="wows1_11"/>at the Ritz Half Moon Bay</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/sea_view.jpg" alt="sea view" title="sea view" id="wows1_12"/>Looking out towards the Hen und Chicken Islunds from Bream Tail Farm Northlund New Zealund</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/te_werahi_beach.jpg" alt="Te Werahi Beach" title="Te Werahi Beach" id="wows1_13"/>Overlooking Te Werahi Beach und Cape Maria van Dieman from Cape Reinga, New Zealund</li>
<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/whangarei_harbour.jpg" alt="Whangarei Harbour" title="Whangarei Harbour" id="wows1_14"/>Whangarei, 130 miles by rail north of Aucklund, is the capital of Northlund.</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Bream bay"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/bream_bay.jpg" alt="Bream bay"/>1</a>
<a href="#" title="dunes und harbour"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/dunes_and_harbour.jpg" alt="dunes und harbour"/>2</a>
<a href="#" title="Head Rock"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/head_rock.jpg" alt="Head Rock"/>3</a>
<a href="#" title="Ligurian sea"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/ligurian_sea.jpg" alt="Ligurian sea"/>4</a>
<a href="#" title="look Mangawhai heads"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/look_mangawhai_heads.jpg" alt="look Mangawhai heads"/>5</a>
<a href="#" title="Malibu lagoon"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/malibu_lagoon.jpg" alt="Malibu lagoon"/>6</a>
<a href="#" title="Mangawhai heads"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/mangawhai_heads.jpg" alt="Mangawhai heads"/>7</a>
<a href="#" title="ocean"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/ocean.jpg" alt="ocean"/>8</a>
<a href="#" title="ocean rainbow"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/ocean_rainbow.jpg" alt="ocean rainbow"/>9</a>
<a href="#" title="sea dragon"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/sea_dragon.jpg" alt="sea dragon"/>10</a>
<a href="#" title="sea fight"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/sea_fight.jpg" alt="sea fight"/>11</a>
<a href="#" title="sea spray"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/sea_spray.jpg" alt="sea spray"/>12</a>
<a href="#" title="sea view"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/sea_view.jpg" alt="sea view"/>13</a>
<a href="#" title="Te Werahi Beach"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/te_werahi_beach.jpg" alt="Te Werahi Beach"/>14</a>
<a href="#" title="Whangarei Harbour"><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/tooltips/whangarei_harbour.jpg" alt="Whangarei Harbour"/>15</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Réactif jquery Diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/shady-stack-v/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernumericbasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section27 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/numeric-basic/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section27 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/amazing_sunset.jpg" alt="amazing sunset : HTML5 Image Gallery" title="amazing sunset" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/apple_tree.jpg" alt="apple tree : HTML5 Image Slider" title="apple tree" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/beutiful_landscape.jpg" alt="beutiful landscape : HTML5 Image Slideshow" title="beautiful landscape" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/birch.jpg" alt="birch : HTML5 Image Banner" title="birch" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/nature.jpg" alt="nature : HTML5 Picture Gallery" title="nature" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/camomiles.jpg" alt="camomiles : HTML5 Photo Gallery" title="camomiles" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/sunset.jpg" alt="sunset : HTML 5 Image Gallery" title="sunset" id="wows1_6"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/cherry.jpg" alt="cherry : HTML5 Gallery" title="cherry" id="wows1_7"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/spoondrift.jpg" alt="spoondrift : CSS3 Image Gallery" title="spoondrift" id="wows1_8"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/in_the_forest.jpg" alt="in the forest : HTML5 Image Gallery" title="in the forest" id="wows1_9"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/stream.jpg" alt="stream : HTML5 Image Rotator" title="stream" id="wows1_10"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/sun_and_sea.jpg" alt="sun and sea : HTML5 Image Gallery Template" title="sun and sea" id="wows1_11"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/strobiles_on_spruce.jpg" alt="strobiles on a spruce : Image Gallery with HTML5 " title="strobiles on a spruce" id="wows1_12"/></li>
<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/sunset_on_the_river.jpg" alt="sunset on the river : Free Image Gallery HTML5" title="sunset on the river" id="wows1_13"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="amazing sunset"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/amazing_sunset.jpg" alt="amazing sunset"/>1</a>
<a href="#" title="apple tree"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="apple tree"/>2</a>
<a href="#" title="beautiful lundscape"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/beutiful_landscape.jpg" alt="beautiful lundscape"/>3</a>
<a href="#" title="birch"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/birch.jpg" alt="birch"/>4</a>
<a href="#" title="nature"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/nature.jpg" alt="nature"/>5</a>
<a href="#" title="camomiles"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/camomiles.jpg" alt="camomiles"/>6</a>
<a href="#" title="sunset"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/sunset.jpg" alt="sunset"/>7</a>
<a href="#" title="cherry"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/cherry.jpg" alt="cherry"/>8</a>
<a href="#" title="spoondrift"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/spoondrift.jpg" alt="spoondrift"/>9</a>
<a href="#" title="in the forest"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/in_the_forest.jpg" alt="in the forest"/>10</a>
<a href="#" title="stream"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/stream.jpg" alt="stream"/>11</a>
<a href="#" title="sun und sea"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/sun_and_sea.jpg" alt="sun und sea"/>12</a>
<a href="#" title="strobiles on a spruce"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/strobiles_on_spruce.jpg" alt="strobiles on a spruce"/>13</a>
<a href="#" title="sunset on the river"><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/tooltips/sunset_on_the_river.jpg" alt="sunset on the river"/>14</a>
</div></div>
<a style="display:none" href="http://wowslider.com">galerie HTML5</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/numeric-basic/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslideraquaflip'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section28 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/aqua-flip/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section28 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly1.jpg" alt="Beautiful butterfly : CSS Image Slider " title="Beautiful butterfly" id="wows0"/>A beautiful butterfly from the Botanic Garden of Montreal.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly2.jpg" alt="Dark butterfly : Image Slider CSS " title="Dark butterfly" id="wows1"/>A dark butterfly from the Botanic Garden of Montreal.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly3.jpg" alt="Butterfly : CSS Content Slider " title="Butterfly" id="wows2"/>A butterfly from the Botanic Garden of Montreal.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly4.jpg" alt="Green butterfly : jQuery Ui Slider CSS" title="Green butterfly" id="wows3"/>A green butterfly from the Botanic Garden of Montreal.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly5.jpg" alt="Butterfly on the ironweed : HTML CSS Slider " title="Butterfly on the ironweed" id="wows4"/>Butterfly set against grass und ironweed.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly6.jpg" alt="Butterfly : CSS jQuery Slider" title="Butterfly " id="wows5"/>Butterfly at the Durmitor National Park, Montenegro</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly7.jpg" alt="Blue morpho : CSS Photo Slider" title="Blue morpho" id="wows6"/>Butterfly garden Kwadendamme, NL</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly8.jpg" alt="Butterfly : CSS Slider Gallery " title="Butterfly" id="wows7"/>At Butterfly World, Klapmuts, near Cape </li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly9.jpg" alt="Fantastic butterfly : Content Slider CSS " title="Fantastic butterfly" id="wows8"/>In the butterfly pavilion at the pacific science center.</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly10.jpg" alt="Butterfly : Pure CSS Slider " title="Butterfly" id="wows9"/>One of many butterflies at the Chattanooga Aquarium</li>
<li><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/images/butterfly11.jpg" alt="Zebra Longwing Butterfly :  jQuery Slider CSS " title="Zebra Longwing Butterfly" id="wows10"/>Heliconius charithonia</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Beautiful butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly1.jpg" alt="Beautiful butterfly"/>1</a>
<a href="#" title="Dark butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly2.jpg" alt="Dark butterfly"/>2</a>
<a href="#" title="Butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly3.jpg" alt="Butterfly"/>3</a>
<a href="#" title="Green butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly4.jpg" alt="Green butterfly"/>4</a>
<a href="#" title="Butterfly on the ironweed"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly5.jpg" alt="Butterfly on the ironweed"/>5</a>
<a href="#" title="Butterfly "><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly6.jpg" alt="Butterfly "/>6</a>
<a href="#" title="Blue morpho"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly7.jpg" alt="Blue morpho"/>7</a>
<a href="#" title="Butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly8.jpg" alt="Butterfly"/>8</a>
<a href="#" title="Fantastic butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly9.jpg" alt="Fantastic butterfly"/>9</a>
<a href="#" title="Butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly10.jpg" alt="Butterfly"/>10</a>
<a href="#" title="Zebra Longwing Butterfly"><img src="http://www.wowslider.com/images/demo/aqua-flip/data1/tooltips/butterfly11.jpg" alt="Zebra Longwing Butterfly"/>11</a>
</div></div>
<a class="wsl" href="http://wowslider.com">jQuery CSS Slider CSS Bilderslider</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/aqua-flip/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderterseblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section29 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/terse-blur/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section29 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_51.jpg" alt="Mercedes Benz : jQuery Banner Rotator" title="Mercedes Benz" id="wows0"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/zenvost1danishsupercar.jpg" alt="Zenvo ST1 - Danish super car : jQuery Rotator" title="Zenvo ST1 - Danish super car" id="wows1"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/car023.jpg" alt="Concept Cars : jQuery random Image Rotator" title="Concept Cars" id="wows2"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_18.jpg" alt="Chevrolet Camaro : jQuery Image Rotator With Description" title="Chevrolet Camaro" id="wows3"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/audilocusconceptcaraudilocus1680x1260.jpg" alt="Audi Locus : jQuery Image Rotator With Text" title="Audi Locus" id="wows4"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/street_cars_wallpaper_ferraristreetcarwallpaper.jpg" alt="Ferrari : Html5 Image Rotator" title="Ferrari" id="wows5"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_15.jpg" alt="Street Cars : Header Image Rotator" title="Street Cars" id="wows6"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/gtravalanche06_07.jpg" alt="Racing cars : jQuery Image Rotator Plugin" title="Racing cars" id="wows7"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/muscle.jpg" alt="Muscle cars : jQuery Banner Rotator Fade" title="Muscle cars" id="wows8"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/maseratimc12racingcar.jpg" alt="Maserati-MC12 : Automatic Image Rotator" title="Maserati-MC12" id="wows9"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Mercedes Benz"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/cars_wallpapers_51.jpg" alt="Mercedes Benz"/>Automatic Image Rotator</a>
<a href="#" title="Zenvo ST1 - Danish super car"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/zenvost1danishsupercar.jpg" alt="Zenvo ST1 - Danish super car"/>jQuery Banner Rotator Fade</a>
<a href="#" title="Concept Cars"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/car023.jpg" alt="Concept Cars"/>jQuery Image Rotator Plugin</a>
<a href="#" title="Chevrolet Camaro"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/cars_wallpapers_18.jpg" alt="Chevrolet Camaro"/>Header Image Rotator</a>
<a href="#" title="Audi Locus"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/audilocusconceptcaraudilocus1680x1260.jpg" alt="Audi Locus"/>Html5 Image Rotator</a>
<a href="#" title="Ferrari"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/street_cars_wallpaper_ferraristreetcarwallpaper.jpg" alt="Ferrari"/>jQuery Image Rotator With Text</a>
<a href="#" title="Street Cars"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/cars_wallpapers_15.jpg" alt="Street Cars"/>jQuery Image Rotator With Description</a>
<a href="#" title="Racing cars"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/gtravalanche06_07.jpg" alt="Racing cars"/>jQuery random Image Rotator</a>
<a href="#" title="Muscle cars"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/muscle.jpg" alt="Muscle cars"/>jQuery Rotator</a>
<a href="#" title="Maserati-MC12"><img src="http://www.wowslider.com/images/demo/terse-blur/data1/tooltips/maseratimc12racingcar.jpg" alt="Maserati-MC12 : jQuery Banner Rotator"/>jQuery Banner Rotator</a>

</div></div>
<a class="wsl" href="http://wowslider.com">jQuery Bilder Rotator HTML5 Banner Rotator</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/terse-blur/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermacstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section30 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/mac-stack/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section30 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/rainbowchicks.jpg" alt="Rainbow Chicks : jQuery Carousel" title="Rainbow Chicks" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/tegu.jpg" alt="Tegu : jQuery Carousel With Text" title="Tegu" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/otter.jpg" alt="Otter : jQuery Ajax Carousel" title="Otter" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/sleepingkitties.jpg" alt="Sleeping Kitties : jQuery Carousel Pagination" title="Sleeping Kitties" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/alone.jpg" alt="Puppy : jQuery Carousel Autoscroll" title="Puppy" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/white_bear.jpg" alt="White Bear : jQuery Banner Carousel" title="White Bear" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/rabbits.jpg" alt="Rabbits : jQuery Content Slider Carousel" title="Rabbits" id="wows7"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Rainbow Chicks"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/rainbowchicks.jpg" alt="Rainbow Chicks : jQuery Carousel Image Slider"/>Free jQuery Carousel Slideshow</a>
<a href="#" title="Tegu"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/tegu.jpg" alt="Tegu : jQuery Carousel Slider Example"/>jQuery Carousel Horizontal Slider</a>
<a href="#" title="Otter"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/otter.jpg" alt="Otter : jQuery Carousel Horizontal Slider"/>jQuery Content Slider Carousel</a>
<a href="#" title="Sleeping Kitties"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/sleepingkitties.jpg" alt="Sleeping Kitties : jQuery Banner Carousel"/>jQuery Carousel Autoscroll</a>
<a href="#" title="Puppy"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/alone.jpg" alt="Puppy : jQuery Step Carousel"/>jQuery Carousel Pagination</a>
<a href="#" title="White Bear"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/white_bear.jpg" alt="White Bear : jQuery Ajax Carousel"/>jQuery Carousel With Text</a>
<a href="#" title="Rabbits"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/rabbits.jpg" alt="Rabbits : jQuery Carousel Ajax"/>jQuery Carousel</a>
</div></div>
<a class="wsl" href="http://wowslider.com">CSS Carousel slider JQuery</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/mac-stack/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercrystallinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section31 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/crystal-linear/engine1/style.css" media="screen" />
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section31 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/frosty.jpg" alt="Frosty : Best Image Slider" title="Frosty" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves3.jpg" alt="Leaves : Best jQuery Slideshow" title="Leaves" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/raindrops.jpg" alt="Rain drops : Best Wordpress Slideshow" title="Rain drops" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves2.jpg" alt="Autumn leaves : Best Joomla Slideshow" title="Autumn leaves" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leafinhorten.jpg" alt="Leaf in Horten : Best Slideshow jQuery" title="Leaf in Horten" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/mosaic.jpg" alt="Mosaic : Best Slideshow Plugin Wordpress" title="Mosaic" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaf.jpg" alt="Leaf : Best jQuery Slideshow 2011" title="Leaf" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves.jpg" alt="Bright leaves : Best jQuery Gallery" title="Bright leaves" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/geraniumleaves.jpg" alt="Geranium : Best jQuery Image Gallery" title="Geranium" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leavesandwater.jpg" alt="Leaves and Water : Best jQuery Photo Gallery" title="Leaves and Water" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Frosty"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/frosty.jpg" alt="Frosty"/>Best jQuery Photo Gallery</a>
<a href="#" title="Leaves"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leaves3.jpg" alt="Leaves"/>Best jQuery Image Gallery</a>
<a href="#" title="Rain drops"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/raindrops.jpg" alt="Rain drops"/>Best jQuery Gallery</a>
<a href="#" title="Autumn leaves"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leaves2.jpg" alt="Autumn leaves"/>Best jQuery Slideshow 2011</a>
<a href="#" title="Leaf in Horten"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leafinhorten.jpg" alt="Leaf in Horten"/>Best Slideshow Plugin Wordpress</a>
<a href="#" title="Mosaic"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/mosaic.jpg" alt="Mosaic"/>Best Slideshow Wordpress</a>
<a href="#" title="Leaf"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leaf.jpg" alt="Leaf"/>Best Joomla Slideshow</a>
<a href="#" title="Bright leaves"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leaves.jpg" alt="Bright leaves"/>Best Wordpress Slideshow</a>
<a href="#" title="Geranium"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/geraniumleaves.jpg" alt="Geranium"/>Best jQuery Slideshow</a>
<a href="#" title="Leaves und Water"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/tooltips/leavesandwater.jpg" alt="Leaves and Water"/>Best Image Slider</a>
</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama sur limage</a>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/crystal-linear/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdigitstackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section32 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/digit-stack-v/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section32 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowerongreen.jpg" alt="Flower on Green : jQuery Vertical Image Slider" title="Flower on Green" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/parkerflowers.jpg" alt="Parker Flowers : Vertical Slider" title="Parker Flowers" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowercloseup.jpg" alt="Flower close up : Vertical Slider jQuery" title="Flower close up" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/littledeeds.jpg" alt="Little Deeds : jQuery Slider Vertical" title="Little Deeds" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowersongreen.jpg" alt="Flowers on Green : Vertical Image Slider jQuery" title="Flowers on Green" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/3928026019_d940fe936e_z.jpg" alt="Flower on White : Vertical Image Slideshow" title="Flower on White" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/sensualityinaflower.jpg" alt="Sensuality in a flower : Vertical Slideshow" title="Sensuality in a flower" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/142195032_1267233bbd_b.jpg" alt="Blue Flowers : jQuery Vertical Panel Slider" title="Blue Flowers" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/whiteflower.jpg" alt="White Flower : Vertical Slider Flash" title="White Flower" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/73421372_0c8ecaf089_b.jpg" alt="Flowers : Vertical Slider Blinds" title="Flowers" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Flower on Green"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/flowerongreen.jpg" alt="Flower on Green : jQuery Vertical Slide Navigation"/>1</a>
<a href="#" title="Parker Flowers"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/parkerflowers.jpg" alt="Parker Flowers : jQuery Vertical Slider Content"/>2</a>
<a href="#" title="Flower close up"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/flowercloseup.jpg" alt="Flower close up : jQuery Vertical Slide Navigation"/>3</a>
<a href="#" title="Little Deeds"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/littledeeds.jpg" alt="Little Deeds : jQuery Vertical Image Slider"/>4</a>
<a href="#" title="Flowers on Green"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/flowersongreen.jpg" alt="Flowers on Green"/>5</a>
<a href="#" title="Flower on White"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/3928026019_d940fe936e_z.jpg" alt="Flower on White : jQuery Vertical Panel Slider"/>6</a>
<a href="#" title="Sensuality in a flower"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/sensualityinaflower.jpg" alt="Sensuality in a flower : Vertical Slider Blinds"/>7</a>
<a href="#" title="Blue Flowers"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/142195032_1267233bbd_b.jpg" alt="Blue Flowers : Vertical Image Slideshow"/>8</a>
<a href="#" title="White Flower"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/whiteflower.jpg" alt="White Flower : jQuery Slider Vertical"/>9</a>
<a href="#" title="Flowers"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/tooltips/73421372_0c8ecaf089_b.jpg" alt="Flowers : Vertical Slider"/>10</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Diaporama verticale de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/digit-stack-v/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernoblekenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section33 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noble-kenburns/engine1/style.css" />
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
	
	<!-- Start WOWSlider.com BODY section33 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4031507140_35ca846d90_b.jpg" alt="Coconut : Ken Burns Effect Slideshow" title="Coconut" id="wows0"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4030754229_6f97bdc5ee_b.jpg" alt="Winged beans : Ken Burns Effect" title="Winged beans" id="wows1"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/387781444_78b8f34fab_b.jpg" alt="Fruits brochettes : Jquery Ken Burns" title="Fruits brochettes" id="wows2"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4036900331_efcd523ded_b.jpg" alt="Ash Plantains : Ken Burns Effect Jquery" title="Ash Plantains" id="wows3"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/561152924_8b33927030_b.jpg" alt="Fruit Bowl : Jquery Ken Burns Effect" title="Fruit Bowl" id="wows4"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4912496232_e3c496b40b_b.jpg" alt="Fruit or Veg : Ken Burns Jquery" title="Fruit or Veg" id="wows5"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/1790683619_77a07afc63_b.jpg" alt="Juicy Fruit : Ken Burns Slideshow" title="Juicy Fruit" id="wows6"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/2521078045_8cd365d17c_o.jpg" alt="Dragon Fruit : Slideshow Ken Burns" title="Dragon Fruit" id="wows7"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/225232630_f99490b19a_o.jpg" alt="Fruits : Ken Burns Effect Software" title="Fruits" id="wows8"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/159160780_49c5c193eb_o.jpg" alt="Fruit Cocktail : Ken Burns Slideshow Software" title="Fruit Cocktail" id="wows9"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Coconut"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/4031507140_35ca846d90_b.jpg" alt="Coconut : Ken Burns Slideshow Software"/>Ken Burns Slideshow Software</a>
<a href="#" title="Winged beans"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/4030754229_6f97bdc5ee_b.jpg" alt="Winged beans : Ken Burns Software"/>Ken Burns Software</a>
<a href="#" title="Fruits brochettes"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/387781444_78b8f34fab_b.jpg" alt="Fruits brochettes : Ken Burns Effect Flash"/>Ken Burns Effect Flash</a>
<a href="#" title="Ash Plantains"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/4036900331_efcd523ded_b.jpg" alt="Ash Plantains : Ken Burns Effect Slideshow"/>Ken Burns Effect Slideshow</a>
<a href="#" title="Fruit Bowl"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/561152924_8b33927030_b.jpg" alt="Fruit Bowl : Ken Burns Effect"/>Ken Burns Effect</a>
<a href="#" title="Fruit or Veg"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/4912496232_e3c496b40b_b.jpg" alt="Fruit or Veg : Jquery Ken Burns"/>Jquery Ken Burns</a>
<a href="#" title="Juicy Fruit"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/1790683619_77a07afc63_b.jpg" alt="Juicy Fruit : Slider Ken Burns"/>Slider Ken Burns</a>
<a href="#" title="Dragon Fruit"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/2521078045_8cd365d17c_o.jpg" alt="Dragon Fruit : Ken Burns Slider"/>Ken Burns Slider</a>
<a href="#" title="Fruits"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/225232630_f99490b19a_o.jpg" alt="Fruits : Ken Burns Effect Jquery"/>Ken Burns Effect Jquery</a>
<a href="#" title="Fruit Cocktail"><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/tooltips/159160780_49c5c193eb_o.jpg" alt="Fruit Cocktail : Jquery Ken Burns Effect"/>Jquery Ken Burns Effect</a>
</div></div>
<a class="wsl" href="http://wowslider.com">Ken Burns effet Diaporama</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/noble-kenburns/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernoirsquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '<!-- Start WOWSlider.com HEAD section34 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noir-squares/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section34 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/clody.jpg" alt="Cloudy Lagoon : jQuery Automatic Slider	" title="Cloudy Lagoon" id="wows0"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/heaven.jpg" alt="heaven : Automatic Image Slider jQuery" title="heaven" id="wows1"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/park.jpg" alt="park : jQuery Auto Slider" title="park" id="wows2"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/pool.jpg" alt="pool : Auto Slider jQuery" title="pool" id="wows3"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/provence.jpg" alt="provence : jQuery Auto Image Slider" title="provence" id="wows4"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/reef.jpg" alt="reef : jQuery Auto Image Slider" title="reef" id="wows5"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/river.jpg" alt="river : jQuery Slider Auto" title="river" id="wows6"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/saarschleife.jpg" alt="saarschleife : jQuery Image Auto Slider" title="saarschleife" id="wows7"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/sur.jpg" alt="sur : Auto Image Slider jQuery" title="sur" id="wows8"/></a></li>
<li><img src="http://www.wowslider.com/images/demo/noir-squares/data/images/sweden.jpg" alt="sweden : Automatic Image Slider" title="sweden" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="clody"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/clody.jpg" alt="clody : Auto Image Slider"/>Simple jQuery Slider</a>
<a href="#" title="heaven"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/heaven.jpg" alt="heaven : Simple jQuery Slider"/>Auto Image Slider</a>
<a href="#" title="park"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/park.jpg" alt="park : jQuery Simple Slider"/>Simple Slider</a>
<a href="#" title="pool"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/pool.jpg" alt="pool : Simple Slider"/>jQuery Simple Slider</a>
<a href="#" title="provence"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/provence.jpg" alt="provence : Simple Image Slider"/>Simple Image Slider</a>
<a href="#" title="reef"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/reef.jpg" alt="reef: Simple Slider jQuery"/>jQuery Slider Simple</a>
<a href="#" title="river"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/river.jpg" alt="river : jQuery Slider Simple"/>Simple Slider jQuery</a>
<a href="#" title="saarschleife"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/saarschleife.jpg" alt="saarschleife : Simple jQuery Slider Tutorial"/>Simple Photo Slider</a>
<a href="#" title="sur"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/sur.jpg" alt="sur : Simple Image Slider Joomla"/>Simple jQuery Slider Tutorial</a>
<a href="#" title="sweden"><img src="http://www.wowslider.com/images/demo/noir-squares/data/tooltips/sweden.jpg" alt="sweden : Simple HTML Image Slider"/>Simple HTML Image Slider</a>
</div></div>
<a class="wsl"  href="http://wowslider.com">Slider Automático de jQuery</a>
	<div class="ws_shadow"></div>
	</div>
    <script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/noir-squares/engine/script.js"></script>

	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpulseblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section35 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/pulse-blinds/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section35 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/canyon.jpg" alt="Canyon: Ajax Slider" title="Canyon" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/colorado.jpg" alt="Colorado : Ajax Slideshow" title="Colorado" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/garden.jpg" alt="Garden : Ajax Image Slideshow" title="Garden" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/greenmountain.jpg" alt="Greenmountain : Ajax Photo Slideshow" title="Greenmountain" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/grimmialp.jpg" alt="Grimmialp : Ajax Slideshow Script" title="Grimmialp" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/horse.jpg" alt="Horse : Ajax Slideshow Tutorial" title="Horse" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/lake.jpg" alt="Lake : Ajax Slideshow Example" title="Lake" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/lake_road.jpg" alt="Lake Road : Free Ajax Slideshow" title="Lake Road" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/peak.jpg" alt="Peak : Ajax Banner Slideshow" title="Peak" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/yo.jpg" alt="Yo : Simple Ajax Slideshow" title="Yo" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Canyon"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/canyon.jpg" alt="Canyon : Ajax Picture Slideshow"/>Ajax Picture Slideshow</a>
<a href="#" title="Colorado"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/colorado.jpg" alt="Colorado: Image Slideshow Ajax"/>Image Slideshow Ajax</a>
<a href="#" title="Garden"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/garden.jpg" alt="Garden : Ajax Slideshow Fade"/>Ajax Slideshow Fade</a>
<a href="#" title="Greenmountain"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/greenmountain.jpg" alt="Greenmountain : Ajax Slideshow Sample"/>Ajax Slideshow Sample</a>
<a href="#" title="Grimmialp"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/grimmialp.jpg" alt="Grimmialp : Slideshow In Ajax"/>Slideshow In Ajax</a>
<a href="#" title="Horse"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/horse.jpg" alt="Horse : Ajax Slider Example"/>Ajax Slider Example</a>
<a href="#" title="Lake"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/lake.jpg" alt="Lake : jQuery Slider Ajax"/>jQuery Slider Ajax</a>
<a href="#" title="Lake Road"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/lake_road.jpg" alt="Lake Road : Image Slider Ajax"/>Image Slider Ajax</a>
<a href="#" title="Peak"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/peak.jpg" alt="Peak : Ajax Slider Examples"/>Ajax Slider Examples</a>
<a href="#" title="Yo"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/tooltips/yo.jpg" alt="Yo : Ajax jQuery Slider"/>Ajax jQuery Slider</a>
</div></div>
<a style="display:none" href="http://wowslider.com">Ajax Diaporama - Diaporama Ajax</a>
<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/pulse-blinds/engine/script.js"></script>

	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercrystalbasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section36 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/crystal-basic/engine/style.css" media="screen" />
	<style type="text/css">a#vlb{display:none}</style>

	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section36 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/amsterdam.jpg" alt="Overlooking amsterdam : HTML5 Image Gallery Slider" title="Overlooking amsterdam" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/barpark.jpg" alt="Brownsville Bar Park : HTML5 Slider" title="Brownsville Bar Park" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/florence.jpg" alt="Florence : HTML5 Image Slider" title="Florence" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/gate.jpg" alt="Golden Gate, California : HTML5 Slider Example" title="Golden Gate, California" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/ny.jpg" alt="Night Panorama NYC From Jersey : HTML5 Content Slider" title="Night Panorama NYC From Jersey" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/panorama.jpg" alt="Panorama Herengracht from bridge Leidsegracht : HTML5 Div Slider" title="Panorama Herengracht from bridge Leidsegracht" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/port.jpg" alt="Heraklion old port : HTML5 Gallery Slider" title="Heraklion old port" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/praga.jpg" alt="Prague : HTML5 Horizontal Slider" title="Prague" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/santorini.jpg" alt="Panorama of Oia, Santorini : HTML5 Image Slider" title="Panorama of Oia, Santorini" id="wows8"/>Oia (in Santorini, Greece) remains one of the foremost tourist attractions of the Aegean Sea.</a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/seul.jpg" alt="Seoul sunrise : HTML5 jQuery Slider" title="Seoul sunrise" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Overlooking amsterdam"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/amsterdam.jpg" alt="Overlooking amsterdam"/>HTML5 News Slider</a>
<a href="#" title="Brownsville Bar Park"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/barpark.jpg" alt="Brownsville Bar Park"/>HTML5 jQuery Slider</a>
<a href="#" title="Florence"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/florence.jpg" alt="Florence"/>HTML5 Image Slider</a>
<a href="#" title="Golden Gate, California"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/gate.jpg" alt="Golden Gate, California"/>HTML5 Horizontal Slider</a>
<a href="#" title="Night Panorama NYC From Jersey"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/ny.jpg" alt="Night Panorama NYC From Jersey"/>HTML5 Gallery Slider</a>
<a href="#" title="Panorama Herengracht from bridge Leidsegracht"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/panorama.jpg" alt="Panorama Herengracht from bridge Leidsegracht"/>HTML5 Div Slider</a>
<a href="#" title="Heraklion old port"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/port.jpg" alt="Heraklion old port"/>HTML5 Content Slider</a>
<a href="#" title="Prague"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/praga.jpg" alt="Prague"/>HTML5 Slider Example</a>
<a href="#" title="Panorama of Oia, Santorini"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/santorini.jpg" alt="Panorama of Oia, Santorini"/>HTML5 Image Slider</a>
<a href="#" title="Seoul sunrise"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/tooltips/seul.jpg" alt="Seoul sunrise : HTML5 Slider"/>HTML5 Image Gallery Slider</a>
</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama HTML5 jQuery</a>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/crystal-basic/engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernoblefade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section37 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noble-fade/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section37 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/10211621.jpg" alt="Blue sea : Beautiful jQuery Slider Demo" title="Blue sea" id="wows1_0"/>Awesome waterscape</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/2032112.jpg" alt="Pier  Easy Slider jQuery Plugin Demo" title="Pier" id="wows1_1"/>Marine dock in the rays of the azure sunset</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/4686c697efa3077e5d691710ec3c8d82.jpg" alt="Purple sky : Image Slider jQuery Demo" title="Purple sky" id="wows1_2"/>Impressive clouds</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/681fcb3df7d8c3baaecebf78f195f147.jpg" alt="Noon on the sea : jQuery Auto Slider Demo" title="Noon on the sea" id="wows1_3"/>Houses on the Caribbean coast</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/b72f7b0cf13ed2b05999ef071d7f675f.jpg" alt="Palm : jQuery Multiple Slider Demo" title="Palm" id="wows1_4"/>Palm is loosened by strong sea breeze</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/gd359.jpg" alt="Sea Leisure : jQuery Slider Demo Download" title="Sea Leisure" id="wows1_5"/>Boats in the sea</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/mertvoemore.jpg" alt="Black Sea : jQuery Slider Gallery Demo" title="Black Sea" id="wows1_6"/>Mountains along the Black Sea</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/more_alushta.jpg" alt="Shore : jQuery Text Slider Demo" title="Shore" id="wows1_7"/>Black sea near Alushta</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/nature_sundown_sea_sunset_005344_.jpg" alt="Sea : jQuery Slider Demonstration" title="Sea" id="wows1_8"/>Beautiful sunset</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/sea.jpg" alt="Sea waves : Slider In jQuery Demo" title="Sea waves" id="wows1_9"/>Sea waves in the evening</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Blue sea"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/10211621.jpg" alt="Blue sea : Slider jQuery Demo"/>Slider jQuery Demo</a>
<a href="#" title="Pier"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/2032112.jpg" alt="Pier : Easy Slider jQuery Plugin Demo"/>Image Slider jQuery Demo</a>
<a href="#" title="Purple sky"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/4686c697efa3077e5d691710ec3c8d82.jpg" alt="Purple sky : jQuery Slider With Caption"/>Image Slider jQuery Demo</a>
<a href="#" title="Noon on the sea"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/681fcb3df7d8c3baaecebf78f195f147.jpg" alt="Noon on the sea : jQuery Image Slider With Caption"/>jQuery Image Slider With Caption</a>
<a href="#" title="Palm"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/b72f7b0cf13ed2b05999ef071d7f675f.jpg" alt="Palm : jQuery Photo Slider With Caption"/>jQuery Photo Slider With Caption</a>
<a href="#" title="Sea Leisure"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/gd359.jpg" alt="Sea Leisure : jQuery Slider Demonstration"/>Slider In jQuery Demo</a>
<a href="#" title="Black Sea"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/mertvoemore.jpg" alt="Black Sea : Vertical Slider jQuery Demo"/>jQuery Content Slider Demo</a>
<a href="#" title="Shore"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/more_alushta.jpg" alt="Shore : Photo Slider jQuery Demo"/>jQuery Text Slider Demo</a>
<a href="#" title="Sea"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/nature_sundown_sea_sunset_005344_.jpg" alt="Sea : jQuery Auto Slider Demo"/>Image Slider jQuery Demo</a>
<a href="#" title="Sea waves"><img src="http://www.wowslider.com/images/demo/noble-fade/data1/tooltips/sea.jpg" alt="Sea waves : Easy Slider jQuery Plugin Demo"/>Beautiful jQuery Slider Demo</a>
</div></div>
<a class="wsl" href="http://wowslider.com">CSS Diaporama de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/noble-fade/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderfluxslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section38 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/flux-slices/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section38 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/1293441583_nature_forest_morning_in_the_forest_015232_.jpg" alt="Fallen tree: jQuery Image Slider HTML" title="Fallen tree" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/2685176_b18ba54c.jpg" alt="Forest glade : How To Add jQuery Slider To HTML" title="Forest glade" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/611418.jpg" alt="In the woods : jQuery Div Slider" title="In the woods" id="wows2"/>rays of light show through the trees</a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/forest_wallpaper21.jpg" alt="The road in the woods : jQuery Slider Div Horizontal" title="The road in the woods" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/g7503.jpg" alt="Sapling : jQuery HTML Slider" title="Sapling" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/ge202.jpg" alt="Beauty spot : jQuery Slider HTML" title="Beauty spot" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/mozh_les.jpg" alt="Forested hills : HTML Slider jQuery" title="Forested hills" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/nature_forest_forest_010852_.jpg" alt="Swamp in the woods : Horizontal Div Slider jQuery" title="Swamp in the woods" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/widescreen_forest_004692_.jpg" alt="Fire in the woods: jQuery Div Slider Example" title="Fire in the woods" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/world_canada_rain_forest_007534_.jpg" alt="Morning mist over the forest : jQuery Div Slider Plugin" title="Morning mist over the forest" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Fallen tree"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/1293441583_nature_forest_morning_in_the_forest_015232_.jpg" alt="Fallen tree"/>jQuery Div Slider</a>
<a href="#" title="Forest glade"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/2685176_b18ba54c.jpg" alt="Forest glade : jQuery HTML Page Slider"/>How To Add jQuery Slider To HTML</a>
<a href="#" title="In the woods"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/611418.jpg" alt="In the woods :jQuery Slider For HTML"/>Simple jQuery HTML Slider</a>
<a href="#" title="The road in the woods"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/forest_wallpaper21.jpg" alt="The road in the woods : Div Slider Using jQuery"/> jQuery HTML Content Slider</a>
<a href="#" title="Sapling"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/g7503.jpg" alt="Sapling : jQuery Slider To Scroll Div"/>jQuery Slider To Scroll Div</a>
<a href="#" title="Beauty spot"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/ge202.jpg" alt="Beauty spot : jQuery Ui Div Slider"/>jQuery Vertical Div Slider</a>
<a href="#" title="Forested hills"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/mozh_les.jpg" alt="Forested hills : jQuery Div Slider Plugin"/>jQuery Slider For Div</a>
<a href="#" title="Swamp in the woods"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/nature_forest_forest_010852_.jpg" alt="Swamp in the woods : jQuery Div Content Slider"/>Horizontal Div Slider jQuery</a>
<a href="#" title="Fire in the woods"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/widescreen_forest_004692_.jpg" alt="Fire in the woods : jQuery HTML Slider"/>jQuery Slider HTML</a>
<a href="#" title="Morning mist over the forest"><img src="http://www.wowslider.com/images/demo/flux-slices/data/tooltips/world_canada_rain_forest_007534_.jpg" alt="Morning mist over the forest :jQuery Slider Div Horizontal"/>How To Add jQuery Slider To HTML</a>
</div></div>
<a class="wsl" href="http://wowslider.com">jQuery CSS Diaporama Div</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/flux-slices/engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpinboardfly'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section39 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/pinboard-fly/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section39 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/autumn_leaves.jpg" alt="Autumn Leaves : Banner Slider" title="Autumn Leaves" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/creek.jpg" alt="Creek : Joomla Banner Slider" title="Creek" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/desert_landscape.jpg" alt="Desert Landscape : Flash Banner Slider" title="Desert Landscape" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/dock.jpg" alt="Dock : Banner Slider Script" title="Dock" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/forest.jpg" alt="Forest : jQuery Banner Rotator" title="Forest" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/forest_flowers.jpg" alt="Forest Flowers : jQuery Image Banner" title="Forest Flowers" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/frangipani_flowers.jpg" alt="Frangipani Flowers : jQuery Sliding Banner" title="Frangipani Flowers" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/garden.jpg" alt="Garden : jQuery Banner Rotator Download" title="Garden" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/green_sea_turtle.jpg" alt="Green Sea Turtle : jQuery Scrolling Banner" title="Green Sea Turtle" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/humpback_whale.jpg" alt="Humpback Whale : jQuery Banner Effects" title="Humpback Whale" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Autumn Leaves"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/autumn_leaves.jpg" alt="autumn_leaves"/>jQuery Banner Rotator Fade</a>
<a href="#" title="Creek"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/creek.jpg" alt="creek : Sliding Banner jQuery"/>Sliding Banner jQuery</a>
<a href="#" title="Desert Lundscape"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/desert_landscape.jpg" alt="desert_lundscape : jQuery Floating Banner"/>jQuery Banner Fade</a>
<a href="#" title="Dock"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/dock.jpg" alt="dock jQuery Rotate Banner"/>jQuery Banner Effects</a>
<a href="#" title="Forest"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/forest.jpg" alt="forest : jQuery Scrolling Banner"/>jQuery Banner Rotator Download</a>
<a href="#" title="Forest Flowers"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/forest_flowers.jpg" alt="forest_flowers : jQuery Sliding Banner"/>jQuery Image Banner</a>
<a href="#" title="Frangipani Flowers"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/frangipani_flowers.jpg" alt="frangipani_flowers : Banner Rotator jQuery"/>jQuery Banner Animation</a>
<a href="#" title="Garden"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/garden.jpg" alt="garden : jQuery Rotating Banner"/>jQuery Banner Rotator</a>
<a href="#" title="Green Sea Turtle"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/green_sea_turtle.jpg" alt="green_sea_turtle"/>Flash Banner Slider</a>
<a href="#" title="Humpback Whale"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/tooltips/humpback_whale.jpg" alt="humpback_whale : Joomla Banner Slider"/>Banner Slider</a>
</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama Banniere CSS jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/pinboard-fly/engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermellowblast'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section40 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/mellow-blast/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
		<!-- Start WOWSlider.com BODY section40 -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/1206241549_24.jpg" alt="Aircraft carrier : Slider Demo" title="Aircraft carrier" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/costa_atlantica.jpg" alt="Costa Atlantica : Demo Slider" title="Costa Atlantica" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/fred_olsen_cruise_lines.jpg" alt="Fred. Olsen Cruise Lines : Easy Slider Demo" title="Fred. Olsen Cruise Lines" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/img-2c369.jpg" alt="The modern warship : Smooth Slider Demo" title="The modern warship" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/korabl5018[1024x768].jpg" alt="Sailing frigate : : jQuery Slider Example" title="Sailing frigate" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/korabli_-_oboi_dlja_rabochego_stola-1024x768.jpg" alt="Sailing yacht : jQuery Image Slider Example" title="Sailing yacht" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/krasivyi_korabl_-1024x768.jpg" alt="Ship at sunset : Slider jQuery Example" title="Ship at sunset" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/navy_ships.jpg" alt="Navy ships : Ajax Slider Example" title="Navy ships" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/ships__003121_.jpg" alt="Ship in a battle : jQuery Slider Example Code" title="Ship in a battle" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/wpapers_ru.jpg" alt="Ships : jQuery Content Slider Example" title="Ships" id="wows9"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Aircraft carrier"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/1206241549_24.jpg" alt="Aircraft carrier : jQuery Image Slider Code Example"/>Simple jQuery Image Slider Example</a>
<a href="#" title="Costa Atlantica"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/costa_atlantica.jpg" alt="Costa Atlantica : Simple jQuery Slider Example"/>Simple jQuery Slider Example</a>
<a href="#" title="Fred. Olsen Cruise Lines"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/fred_olsen_cruise_lines.jpg" alt="Fred. Olsen Cruise Lines : jQuery Slider Example Vertical"/>jQuery Photo Slider Example</a>
<a href="#" title="The modern warship"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/img-2c369.jpg" alt="The modern warship : jQuery Photo Slider Example"/>jQuery Slider Example Horizontal</a>
<a href="#" title="Sailing frigate"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/korabl5018[1024x768].jpg" alt="Sailing frigate : jQuery Horizontal Slider Example"/>jQuery Content Slider Example</a>
<a href="#" title="Sailing yacht"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/korabli_-_oboi_dlja_rabochego_stola-1024x768.jpg" alt="Sailing yacht : jQuery Slider Example Code"/>jQuery Text Slider Example</a>
<a href="#" title="Ship at sunset"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/krasivyi_korabl_-1024x768.jpg" alt="Ship at sunset : Ajax Slider Example"/>Slider jQuery Example</a>
<a href="#" title="Navy ships"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/navy_ships.jpg" alt="Navy ships : jQuery Ui Slider Example"/>jQuery Image Slider Example</a>
<a href="#" title="Ship in a battle"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/ships__003121_.jpg" alt="Ship in a battle : jQuery Slider Example"/>Smooth Slider Demo</a>
<a href="#" title="Ships"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/tooltips/wpapers_ru.jpg" alt="Ships : Demo Slider"/>Slider Demo</a>
</div></div>
<a class="wsl" href="http://wowslider.com">Exemplo de Slider de Imagem de jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/mellow-blast/engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergalaxycollage'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/galaxy-collage/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/ngc456511635.jpg" alt="css gallery business" title="Galaxy" id="wows1_0"/>The berenike haar constellation</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy10994.jpg" alt="css gallery code" title="Galaxy" id="wows1_1"/>Barred Spiral Galaxy</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy252885.jpg" alt="css gallery design" title="Galaxy" id="wows1_2"/>Universe Raumfahrt</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/milkyway67504.jpg" alt="css gallery example" title="Galaxy" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy74005.jpg" alt="css gallery furniture" title="Tarantula Nebula" id="wows1_4"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/ngc456511635.jpg" alt="css gallery business"/>1</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy10994.jpg" alt="css gallery code"/>2</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy252885.jpg" alt="css gallery design"/>3</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/milkyway67504.jpg" alt="css gallery example"/>4</a>
<a href="#" title="Tarantula Nebula"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy74005.jpg" alt="css gallery furniture"/>5</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">css gallery image</a></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/galaxy-collage/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderstrictphoto'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/strict-photo/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/voelkerschlachtdenkmal264413_1280.jpg" alt="jquery photo gallery builder" title="The Monument to the Battle of the Nations" id="wows1_0"/>Monument in Leipzig, Germany</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/castle195105_1920.jpg" alt="jquery photo gallery carousel" title="Castle" id="wows1_1"/>Middle Ages</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/moatedcastle179331_1280.jpg" alt="jquery photo gallery download" title="Castle" id="wows1_2"/>Anholt</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/paris114323_1280.jpg" alt="jquery photo gallery for website" title="Place de la Concord" id="wows1_3"/>Paris</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/chicago199859_1280.jpg" alt="jquery photo gallery html" title="Sculpture" id="wows1_4"/>Chicago</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/towerbridge189077_1280.jpg" alt="jquery photo gallery javascript" title="Tower Bridge" id="wows1_5"/>the River Thames, London</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/sanfrancisco225592_1280.jpg" alt="jquery photo gallery lighting" title="Golden Gate Bridge" id="wows1_6"/>San Francisco</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/chateauofdesullysurloire196390_1280.jpg" alt="jquery photo gallery plugin" title="Sully-sur-Loire" id="wows1_7"/>France</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/berlin143832_1280.jpg" alt="jquery photo gallery software" title="House of the Cultures of the World" id="wows1_8"/>Berlin</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/paris253920_1280.jpg" alt="jquery photo gallery wordpress" title="Eiffel Tower" id="wows1_9"/>Paris</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="The Monument to the Battle of the Nations"><img src="data1/tooltips/voelkerschlachtdenkmal264413_1280.jpg" alt="The Monument to the Battle of the Nations"/>1</a>
<a href="#" title="Castle"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/castle195105_1920.jpg" alt="Castle"/>2</a>
<a href="#" title="Castle"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/moatedcastle179331_1280.jpg" alt="Castle"/>3</a>
<a href="#" title="Place de la Concord"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/paris114323_1280.jpg" alt="Place de la Concord"/>4</a>
<a href="#" title="Sculpture"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/chicago199859_1280.jpg" alt="Sculpture"/>5</a>
<a href="#" title="Tower Bridge"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/towerbridge189077_1280.jpg" alt="Tower Bridge"/>6</a>
<a href="#" title="Golden Gate Bridge"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/sanfrancisco225592_1280.jpg" alt="Golden Gate Bridge"/>7</a>
<a href="#" title="Sully-sur-Loire"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/chateauofdesullysurloire196390_1280.jpg" alt="Sully-sur-Loire"/>8</a>
<a href="#" title="House of the Cultures of the World"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/berlin143832_1280.jpg" alt="House of the Cultures of the World"/>9</a>
<a href="#" title="Eiffel Tower"><img src="http://www.wowslider.com/images/demo/strict-photo/data1/tooltips/paris253920_1280.jpg" alt="Eiffel Tower"/>10</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">jquery photo gallery code</a></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/strict-photo/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergrafitoseven'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/grafito-seven/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/ford64041_1280.jpg" alt="wordpress gallery plugin online" title="Ford Mustang" id="wows1_0"/>is an automobile manufactured by the Ford Motor Company</li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/crazy57942_1280.jpg" alt="wordpress gallery plugin reviews" title="Overpainted Wolksvagen" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/car101975_1280.jpg" alt="wordpress gallery plugin style" title="Yellow Car" id="wows1_2"/>Chevrolet Camaro</li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/audi87448_1280.jpg" alt="wordpress image gallery plugin" title="Audi A7" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/pontiacbonneville78259_1280.jpg" alt="wordpress gallery plugin guru" title="Pontiac Bonneville" id="wows1_4"/>1958 Classic</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Ford Mustang"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/ford64041_1280.jpg" alt="Ford Mustang"/>1</a>
<a href="#" title="Overpainted Wolksvagen"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/crazy57942_1280.jpg" alt="Overpainted Wolksvagen"/>2</a>
<a href="#" title="Yellow Car"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/car101975_1280.jpg" alt="Yellow Car"/>3</a>
<a href="#" title="Audi A7"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/audi87448_1280.jpg" alt="Audi A7"/>4</a>
<a href="#" title="Pontiac Bonneville"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/pontiacbonneville78259_1280.jpg" alt="Pontiac Bonneville"/>5</a>
</div></div>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/grafito-seven/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslideremeraldphoto'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/emerald-photo/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/cactuses.jpg" alt="Cactuses, Canary Islands: slider javascript plugin" title="Cactuses, Canary Islands" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/crater.jpg" alt="Crater, Gran Canaria: slider javascript example" title="Crater, Gran Canaria" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/galdar.jpg" alt="Galdar, Gran Canaria: slider javascript mobile" title="Galdar, Gran Canaria" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/gran_canaria.jpg" alt="Panorama, Gran Canaria: image slider with javascript" title="Panorama, Gran Canaria" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/green_rocks.jpg" alt="Green Rocks, Gran Canaria: slider using javascript" title="Green Rocks, Gran Canaria" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/maspalomas.jpg" alt="Maspalomas, Gran Canaria: download slider javascript" title="Maspalomas, Gran Canaria" id="wows1_5"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Cactuses, Canary Islands"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/cactuses.jpg" alt="Cactuses, Canary Islands"/>1</a>
<a href="#" title="Crater, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/crater.jpg" alt="Crater, Gran Canaria"/>2</a>
<a href="#" title="Galdar, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/galdar.jpg" alt="Galdar, Gran Canaria"/>3</a>
<a href="#" title="Panorama, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/gran_canaria.jpg" alt="Panorama, Gran Canaria"/>4</a>
<a href="#" title="Green Rocks, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/green_rocks.jpg" alt="Green Rocks, Gran Canaria"/>5</a>
<a href="#" title="Maspalomas, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/maspalomas.jpg" alt="Maspalomas, Gran Canaria"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">slider javascript free</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/emerald-photo/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderglasslinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://wowslider.com/images/demo/glass-linear/engine1/style.css" />
	<script type="text/javascript" src="http://wowslider.com/images/demo/glass-linear/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bratislavacastle.jpg" alt="Bratislava castle, Slovakia: responsive image gallery code" title="Bratislava castle, Slovakia" id="wows1_0"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bratislava.jpg" alt="Bratislava, Slovakia: responsive image gallery download" title="Bratislava, Slovakia" id="wows1_1"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bridge.jpg" alt="Bridge: responsive image gallery html" title="Bridge" id="wows1_2"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/dvorakovonabrezie.jpg" alt="Dvorakovo nabrezie, Bratislava: responsive image gallery javascript" title="Dvorakovo nabrezie, Bratislava" id="wows1_3"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/mainsquare.jpg" alt="Main square, Bratislava: responsive image gallery css" title="Main square, Bratislava" id="wows1_4"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/night.jpg" alt="Night view: responsive image gallery jquery" title="Night view" id="wows1_5"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/tree.jpg" alt="Tree in the park, Bratislava: responsive image gallery software" title="Tree in the park, Bratislava" id="wows1_6"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/twilight.jpg" alt="In the twilight: responsive image gallery free" title="In the twilight" id="wows1_7"/></li>
</ul></div>
<div class="ws_thumbs">
<div>
<a href="#" title="Bratislava castle, Slovakia"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bratislavacastle.jpg" alt="" /></a>
<a href="#" title="Bratislava, Slovakia"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bratislava.jpg" alt="" /></a>
<a href="#" title="Bridge"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bridge.jpg" alt="" /></a>
<a href="#" title="Dvorakovo nabrezie, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/dvorakovonabrezie.jpg" alt="" /></a>
<a href="#" title="Main square, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/mainsquare.jpg" alt="" /></a>
<a href="#" title="Night view"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/night.jpg" alt="" /></a>
<a href="#" title="Tree in the park, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/tree.jpg" alt="" /></a>
<a href="#" title="In the twilight"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/twilight.jpg" alt="" /></a>
</div>
</div>
<!-- Generated by WOWSlider.com v5.0 -->
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="http://wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://wowslider.com/images/demo/glass-linear/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderturquoisestackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/turquoise-stack-v/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/acacia.jpg" alt="Acacia, Tanzania: slideshow creator with music" title="Acacia, Tanzania" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/african_elephants.jpg" alt="African elephants: slideshow generator" title="African elephants" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/herd.jpg" alt="Herd of elephants: slideshow images" title="Herd of elephants" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/tarangire.jpg" alt="Tarangire National Park: slideshow javascript" title="Tarangire National Park" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/wildebeests.jpg" alt="Wildebeests: slideshow creator free" title="Wildebeests" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/zebras.jpg" alt="Zebras: slideshow creator html code" title="Zebras" id="wows1_5"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Acacia, Tanzania"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/acacia.jpg" alt="Acacia, Tanzania"/>1</a>
<a href="#" title="African elephants"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/african_elephants.jpg" alt="African elephants"/>2</a>
<a href="#" title="Herd of elephants"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/herd.jpg" alt="Herd of elephants"/>3</a>
<a href="#" title="Tarangire National Park"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/tarangire.jpg" alt="Tarangire National Park"/>4</a>
<a href="#" title="Wildebeests"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/wildebeests.jpg" alt="Wildebeests"/>5</a>
<a href="#" title="Zebras"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/zebras.jpg" alt="Zebras"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">slideshow creator web</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/turquoise-stack-v/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderzoomdomino'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/zoom-domino/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/accra_beach.jpg" alt="Accra Beach: slideshow software transitions" title="Accra Beach" id="wows1_0"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/bridgetown.jpg" alt="Bridgetown: slideshow software professional" title="Bridgetown" id="wows1_1"/>Barbados capital and main city</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/monkey.jpg" alt="Monkey: slideshow software animation" title="Monkey" id="wows1_2"/>Barbados fauna</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/mullins_beach.jpg" alt="Mullins Beach: slideshow software maker" title="Mullins Beach" id="wows1_3"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/sandy_beach.jpg" alt="Sandy Beach: slideshow software web" title="Sandy Beach" id="wows1_4"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/st._james,_sunset_point.jpg" alt="St. James, Sunset point: slideshow software for free" title="St. James, Sunset point" id="wows1_5"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/worthing_bay.jpg" alt="Worthing Bay: photo slideshow software" title="Worthing Bay" id="wows1_6"/>Barbados, Caribbean Sea</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Accra Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/accra_beach.jpg" alt="Accra Beach"/>1</a>
<a href="#" title="Bridgetown"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/bridgetown.jpg" alt="Bridgetown"/>2</a>
<a href="#" title="Monkey"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/monkey.jpg" alt="Monkey"/>3</a>
<a href="#" title="Mullins Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/mullins_beach.jpg" alt="Mullins Beach"/>4</a>
<a href="#" title="Sandy Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/sandy_beach.jpg" alt="Sandy Beach"/>5</a>
<a href="#" title="St. James, Sunset point"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/st._james,_sunset_point.jpg" alt="St. James, Sunset point"/>6</a>
<a href="#" title="Worthing Bay"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/worthing_bay.jpg" alt="Worthing Bay"/>7</a>
</div></div>
<a style="display:none" href="http://wowslider.com">slideshow software free download</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/zoom-domino/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderionospherestack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/ionosphere-stack/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/houses.jpg" alt="Bright houses: javascript slider" title="Bright houses" id="wows1_0"/>Venice, Italy</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/cannaregio.jpg" alt="Cannaregio district: javascript image slider" title="Cannaregio district" id="wows1_1"/>The northernmost of the six historic sestieri (districts) of Venice</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/street.jpg" alt="Narrow street: javascript slider free" title="Narrow street" id="wows1_2"/>Venice, Italy</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/constitutionbridge.jpg" alt="Constitution bridge: javascript slider bar" title="Constitution bridge" id="wows1_3"/>The Ponte della Costituzione (English: Constitution Bridge)</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/night.jpg" alt="Night lights: javascript slider control" title="Night lights" id="wows1_4"/>Venice, Italy</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/dorsoduro.jpg" alt="Dorsoduro: javascript slider example" title="Dorsoduro" id="wows1_5"/>Dorsoduro is one of the six sestieri of Venice, northern Italy.</li>
<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/canal.jpg" alt="Canal: javascript slider gallery" title="Canal" id="wows1_6"/>Venice, Italy</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Bright houses"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/houses.jpg" alt="Bright houses"/>1</a>
<a href="#" title="Cannaregio district"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/cannaregio.jpg" alt="Cannaregio district"/>2</a>
<a href="#" title="Narrow street"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/street.jpg" alt="Narrow street"/>3</a>
<a href="#" title="Constitution bridge"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/constitutionbridge.jpg" alt="Constitution bridge"/>4</a>
<a href="#" title="Night lights"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/night.jpg" alt="Night lights"/>5</a>
<a href="#" title="Dorsoduro"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/dorsoduro.jpg" alt="Dorsoduro"/>6</a>
<a href="#" title="Canal"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/canal.jpg" alt="Canal"/>7</a>
</div></div>
<a style="display: none;" href="http://wowslider.com">javascript slider jquery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/ionosphere-stack/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslider7'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslider7'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '';		
		
		
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