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
	background:url(./themes/themebuilder/images/bullets.png) no-repeat;
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
	background:url(./themes/themebuilder/images/arrows.png) no-repeat;
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
	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/simple-basic/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 4.8
 *	template Simple
 */
@import url("http://fonts.googleapis.com/css?family=Istok+Web&subset=latin,latin-ext,cyrillic");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:3px solid #FFFFFF;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	font:12px/20px "Istok Web",Arial,Helvetica,sans-serif; 
	color:#FFFFFF;
	text-align:center;
	margin-left:4px;
	width:20px;
	height:20px;
	background: url(./themes/themebuilder/icons/bulletsimplebasic.png) left top;
	float: left; 
	position:relative;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;	
	color:#000000;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	background-size: 200%;
	position:absolute;
	display:block;
	top:45.00%;
	z-index:60;
	width: 2.70833333333333%;	
	height: 10%;
	background-image: url(./themes/themebuilder/icons/arrowssimplebasic.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0.00%;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0;
	left:0.00%;	
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 2.70833333333333%;
    height: 10%;
    position: absolute;
    top: 45.00%;
    left: 48.91%;
    z-index: 59;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
	background-size: 100% 200%;
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
	background-size: 100% 200%;
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:3em;
	left: 0;
	margin-right:0.5em;
	z-index: 50;
	color: #000000;
	text-transform:none;
    font-family: "Istok Web",Arial,Helvetica,sans-serif;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:0.5em;
	background:#FFFFFF;
	border-radius:0 0.2em 0.2em 0; 
	-moz-border-radius:0 0.2em 0.2em 0;
	-webkit-border-radius:0 0.2em 0.2em 0;
	opacity:0.6;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);	
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:0.5em;
	font-size: 1.6em;
	background:#000000;
	color:#FFFFFF;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.2em;
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 24s infinite;
	-moz-animation: wsBasic 24s infinite;
	-webkit-animation: wsBasic 24s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }



#wowslider-container'.$val.' .ws_bulframe div div{
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width: 100%;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	width:240px;
}
#wowslider-container'.$val.' .ws_bulframe img{
	width: 16.6666666666667%;
}


@media all and (max-width:400px){
	#wowslider-container'.$val.':hover a.ws_playpause,
	#wowslider-container'.$val.' a.ws_playpause,
	#wowslider-container'.$val.':hover a.ws_prev,
	#wowslider-container'.$val.' a.ws_prev,
	#wowslider-container'.$val.':hover a.ws_next,
	#wowslider-container'.$val.' a.ws_next,
	#wowslider-container'.$val.' .ws_bullets,
	#wowslider-container'.$val.' .ws_thumbs{
		display: none
	}
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:25px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 3px solid #ffffff;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:100%;
	background-color:#ffffff;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:30px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
    border: 3px solid #ffffff;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-1px;
	left:50%;
	background:url(./themes/themebuilder/icons/triangle2.png);
	width:15px;
	height:8px;
}
	</style>
	<!-- End WOWSlider.com HEAD section -->
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/columns.jpg" alt="Columns: image gallery code" title="Columns" id="wows1_0"/>Northern Cyprus</li>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/flower.jpg" alt="Flower: image gallery examples" title="Flower" id="wows1_1"/>Flora of Northern Cyprus</li>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/olive_tree.jpg" alt="Olive tree: image gallery html" title="Olive tree" id="wows1_2"/>Its fruit is the source of olive oil</li>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/panorama.jpg" alt="Panorama: image gallery javascript" title="Panorama" id="wows1_3"/>Boats, Northern Cyprus</li>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/sea.jpg" alt="Sea view: image gallery using javascript" title="Sea view" id="wows1_4"/>Mediterranean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/simple-basic/data1/images/view.jpg" alt="Amazing view: image gallery css" title="Amazing view" id="wows1_5"/>Northern Cyprus</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Columns"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/columns.jpg" alt="Columns"/>1</a>
<a href="#" title="Flower"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/flower.jpg" alt="Flower"/>2</a>
<a href="#" title="Olive tree"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/olive_tree.jpg" alt="Olive tree"/>3</a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/panorama.jpg" alt="Panorama"/>4</a>
<a href="#" title="Sea view"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/sea.jpg" alt="Sea view"/>5</a>
<a href="#" title="Amazing view"><img src="http://www.wowslider.com/images/demo/simple-basic/data1/tooltips/view.jpg" alt="Amazing view"/>6</a>
</div></div>
<a style="display:none" href="http://wowslider.com">image gallery free</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/simple-basic/engine1/script.js"></script>-->
	<script type="text/javascript">
	function ws_basic(c,a,b){this.go=function(d){b.find("ul").css("transform","translate3d(0,0,0)").stop(true).animate({left:(d?-d+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},c.duration,"easeInOutExpo");return d}};
jQuery("#wowslider-container'.$val.'").wowSlider({
	effect:"basic", 
	prev:"", 
	next:"", 
	duration: 20*100, 
	delay:20*100, 
	width:960,
	height:360,
	autoPlay:true,
	playPause:false,
	stopOnHover:false,
	loop:false,
	bullets:true,
	caption: true, 
	captionEffect:"move",
	controls:true,
	onBeforeStep:0,
	images:0
});
</script>
	
	<!-- End WOWSlider.com BODY section -->
		';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpremiumpage'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section1 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/premium-page/engine1/style.css" />-->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/premium-page/engine1/style.mod.css"/>
	<style>
@import url(http://fonts.googleapis.com/css?family=Arimo&subset=latin,cyrillic,latin-ext);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:5px solid rgba(220, 220, 220, 0.6);
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}


#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:20px;
	height:20px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;	
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{ 
	background-position: 0 100%;
}	
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-24px;
	z-index:60;
	height: 50px;
	width: 50px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:5px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:5px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 50px;
    height: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -25px;
    margin-top: -25px;
    z-index: 59;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 30px;
	left: 0px;
	margin-right:10px;
	padding:9px;
	background-color:rgba(220, 220, 220, 0.6);
	color:#000000;
	z-index: 50;
	font-family:"Arimo", Arial, Helvetica, sans-serif;
	font-size: 24px;	
	line-height: 26px;	
	font-weight: bold;
	border-radius:0px 2px 2px 0px;
	-moz-border-radius:0px 2px 2px 0px;
	-webkit-border-radius:0px 2px 2px 0px;
}
#wowslider-container'.$val.' .ws-title div{
	margin-top: 6px;
	font-size: 16px;
	line-height: 18px;
	font-weight: normal;
	color: #222222;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 20s infinite;
	-moz-animation: wsBasic 20s infinite;
	-webkit-animation: wsBasic 20s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 4px solid rgba(220, 220, 220, 0.6);
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:rgba(220, 220, 220, 0.6);
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid rgba(220, 220, 220, 0.6);
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-1px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section1 -->
	<div id="wowslider-container'.$val.'" class="playpause">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/boat.jpg" alt="Boat at sunset: js image slider" title="Boat at sunset" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/coast.jpg" alt="Coast: js slider code" title="Coast" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/evening.jpg" alt="Evening: js slider" title="Evening" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/stones.jpg" alt="Stones near ocean: js Foto Slider" title="Stones near ocean" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/premium-page/data1/images/waves.jpg" alt="Ocean waves: js Slider für Bilder" title="Ocean waves" id="wows1_4"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

									<a href="#" title="Boat at sunset"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/boat.jpg" alt="Boat at sunset"/>1</a>
									<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/coast.jpg" alt="Coast"/>2</a>
									<a href="#" title="Evening"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/evening.jpg" alt="Evening"/>3</a>
									<a href="#" title="Stones near ocean"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/stones.jpg" alt="Stones near ocean"/>4</a>
									<a href="#" title="Ocean waves"><img src="http://www.wowslider.com/images/demo/premium-page/data1/tooltips/waves.jpg" alt="Ocean waves"/>5</a>
									';
							}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display: none;" href="http://wowslider.com">js curseur wordpress</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/wowslider.mod.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/premium-page/engine1/script.js"></script-->
	<script type="text/javascript">

(function(f,g,j,b){var h=/progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,c=/^([\+\-]=)?([\d+.\-]+)(.*)$/,q=/%/;var d=j.createElement("modernizr"),e=d.style;function n(s){return parseFloat(s)}function l(){var s={transformProperty:"",MozTransform:"-moz-",WebkitTransform:"-webkit-",OTransform:"-o-",msTransform:"-ms-"};for(var t in s){if(typeof e[t]!="undefined"){return s[t]}}return null}function r(){if(typeof(g.Modernizr)!=="undefined"){return Modernizr.csstransforms}var t=["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"];for(var s in t){if(e[t[s]]!==b){return true}}}var a=l(),i=a!==null?a+"transform":false,k=a!==null?a+"transform-origin":false;f.support.csstransforms=r();if(a=="-ms-"){i="msTransform";k="msTransformOrigin"}f.extend({transform:function(s){s.transform=this;this.$elem=f(s);this.applyingMatrix=false;this.matrix=null;this.height=null;this.width=null;this.outerHeight=null;this.outerWidth=null;this.boxSizingValue=null;this.boxSizingProperty=null;this.attr=null;this.transformProperty=i;this.transformOriginProperty=k}});f.extend(f.transform,{funcs:["matrix","origin","reflect","reflectX","reflectXY","reflectY","rotate","scale","scaleX","scaleY","skew","skewX","skewY","translate","translateX","translateY"]});f.fn.transform=function(s,t){return this.each(function(){var u=this.transform||new f.transform(this);if(s){u.exec(s,t)}})};f.transform.prototype={exec:function(s,t){t=f.extend(true,{forceMatrix:false,preserve:false},t);this.attr=null;if(t.preserve){s=f.extend(true,this.getAttrs(true,true),s)}else{s=f.extend(true,{},s)}this.setAttrs(s);if(f.support.csstransforms&&!t.forceMatrix){return this.execFuncs(s)}else{if(f.browser.msie||(f.support.csstransforms&&t.forceMatrix)){return this.execMatrix(s)}}return false},execFuncs:function(t){var s=[];for(var u in t){if(u=="origin"){this[u].apply(this,f.isArray(t[u])?t[u]:[t[u]])}else{if(f.inArray(u,f.transform.funcs)!==-1){s.push(this.createTransformFunc(u,t[u]))}}}this.$elem.css(i,s.join(" "));return true},execMatrix:function(z){var C,x,t;var F=this.$elem[0],B=this;function A(N,M){if(q.test(N)){return parseFloat(N)/100*B["safeOuter"+(M?"Height":"Width")]()}return o(F,N)}var s=/translate[X|Y]?/,u=[];for(var v in z){switch(f.type(z[v])){case"array":t=z[v];break;case"string":t=f.map(z[v].split(","),f.trim);break;default:t=[z[v]]}if(f.matrix[v]){if(f.cssAngle[v]){t=f.map(t,f.angle.toDegree)}else{if(!f.cssNumber[v]){t=f.map(t,A)}else{t=f.map(t,n)}}x=f.matrix[v].apply(this,t);if(s.test(v)){u.push(x)}else{C=C?C.x(x):x}}else{if(v=="origin"){this[v].apply(this,t)}}}C=C||f.matrix.identity();f.each(u,function(M,N){C=C.x(N)});var K=parseFloat(C.e(1,1).toFixed(6)),I=parseFloat(C.e(2,1).toFixed(6)),H=parseFloat(C.e(1,2).toFixed(6)),G=parseFloat(C.e(2,2).toFixed(6)),L=C.rows===3?parseFloat(C.e(1,3).toFixed(6)):0,J=C.rows===3?parseFloat(C.e(2,3).toFixed(6)):0;if(f.support.csstransforms&&a==="-moz-"){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+"px, "+J+"px)")}else{if(f.support.csstransforms){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+", "+J+")")}else{if(f.browser.msie){var w=", FilterType="nearest neighbor"";var D=this.$elem[0].style;var E="progid:DXImageTransform.Microsoft.Matrix(M11="+K+", M12="+H+", M21="+I+", M22="+G+", sizingMethod="auto expand""+w+")";var y=D.filter||f.css(this.$elem[0],"filter")||"";D.filter=h.test(y)?y.replace(h,E):y?y+" "+E:E;this.applyingMatrix=true;this.matrix=C;this.fixPosition(C,L,J);this.applyingMatrix=false;this.matrix=null}}}return true},origin:function(s,t){if(f.support.csstransforms){if(typeof t==="undefined"){this.$elem.css(k,s)}else{this.$elem.css(k,s+" "+t)}return true}switch(s){case"left":s="0";break;case"right":s="100%";break;case"center":case b:s="50%"}switch(t){case"top":t="0";break;case"bottom":t="100%";break;case"center":case b:t="50%"}this.setAttr("origin",[q.test(s)?s:o(this.$elem[0],s)+"px",q.test(t)?t:o(this.$elem[0],t)+"px"]);return true},createTransformFunc:function(t,u){if(t.substr(0,7)==="reflect"){var s=u?f.matrix[t]():f.matrix.identity();return"matrix("+s.e(1,1)+", "+s.e(2,1)+", "+s.e(1,2)+", "+s.e(2,2)+", 0, 0)"}if(t=="matrix"){if(a==="-moz-"){u[4]=u[4]?u[4]+"px":0;u[5]=u[5]?u[5]+"px":0}}return t+"("+(f.isArray(u)?u.join(", "):u)+")"},fixPosition:function(B,y,x,D,s){var w=new f.matrix.calc(B,this.safeOuterHeight(),this.safeOuterWidth()),C=this.getAttr("origin");var v=w.originOffset(new f.matrix.V2(q.test(C[0])?parseFloat(C[0])/100*w.outerWidth:parseFloat(C[0]),q.test(C[1])?parseFloat(C[1])/100*w.outerHeight:parseFloat(C[1])));var t=w.sides();var u=this.$elem.css("position");if(u=="static"){u="relative"}var A={top:0,left:0};var z={position:u,top:(v.top+x+t.top+A.top)+"px",left:(v.left+y+t.left+A.left)+"px",zoom:1};this.$elem.css(z)}};function o(s,u){var t=c.exec(f.trim(u));if(t[3]&&t[3]!=="px"){var w="paddingBottom",v=f.style(s,w);f.style(s,w,u);u=p(s,w);f.style(s,w,v);return u}return parseFloat(u)}function p(t,u){if(t[u]!=null&&(!t.style||t.style[u]==null)){return t[u]}var s=parseFloat(f.css(t,u));return s&&s>-10000?s:0}})(jQuery,this,this.document);(function(d,c,a,f){d.extend(d.transform.prototype,{safeOuterHeight:function(){return this.safeOuterLength("height")},safeOuterWidth:function(){return this.safeOuterLength("width")},safeOuterLength:function(l){var p="outer"+(l=="width"?"Width":"Height");if(!d.support.csstransforms&&d.browser.msie){l=l=="width"?"width":"height";if(this.applyingMatrix&&!this[p]&&this.matrix){var k=new d.matrix.calc(this.matrix,1,1),n=k.offset(),g=this.$elem[p]()/n[l];this[p]=g;return g}else{if(this.applyingMatrix&&this[p]){return this[p]}}var o={height:["top","bottom"],width:["left","right"]};var h=this.$elem[0],j=parseFloat(d.css(h,l,true)),q=this.boxSizingProperty,i=this.boxSizingValue;if(!this.boxSizingProperty){q=this.boxSizingProperty=e()||"box-sizing";i=this.boxSizingValue=this.$elem.css(q)||"content-box"}if(this[p]&&this[l]==j){return this[p]}else{this[l]=j}if(q&&(i=="padding-box"||i=="content-box")){j+=parseFloat(d.css(h,"padding-"+o[l][0],true))||0+parseFloat(d.css(h,"padding-"+o[l][1],true))||0}if(q&&i=="content-box"){j+=parseFloat(d.css(h,"border-"+o[l][0]+"-width",true))||0+parseFloat(d.css(h,"border-"+o[l][1]+"-width",true))||0}this[p]=j;return j}return this.$elem[p]()}});var b=null;function e(){if(b){return b}var h={boxSizing:"box-sizing",MozBoxSizing:"-moz-box-sizing",WebkitBoxSizing:"-webkit-box-sizing",OBoxSizing:"-o-box-sizing"},g=a.body;for(var i in h){if(typeof g.style[i]!="undefined"){b=h[i];return b}}return null}})(jQuery,this,this.document);(function(g,f,b,h){var d=/([\w\-]*?)\((.*?)\)/g,a="data-transform",e=/\s/,c=/,\s?/;g.extend(g.transform.prototype,{setAttrs:function(i){var j="",l;for(var k in i){l=i[k];if(g.isArray(l)){l=l.join(", ")}j+=" "+k+"("+l+")"}this.attr=g.trim(j);this.$elem.attr(a,this.attr)},setAttr:function(k,l){if(g.isArray(l)){l=l.join(", ")}var j=this.attr||this.$elem.attr(a);if(!j||j.indexOf(k)==-1){this.attr=g.trim(j+" "+k+"("+l+")");this.$elem.attr(a,this.attr)}else{var i=[],n;d.lastIndex=0;while(n=d.exec(j)){if(k==n[1]){i.push(k+"("+l+")")}else{i.push(n[0])}}this.attr=i.join(" ");this.$elem.attr(a,this.attr)}},getAttrs:function(){var j=this.attr||this.$elem.attr(a);if(!j){return{}}var i={},l,k;d.lastIndex=0;while((l=d.exec(j))!==null){if(l){k=l[2].split(c);i[l[1]]=k.length==1?k[0]:k}}return i},getAttr:function(j){var i=this.getAttrs();if(typeof i[j]!=="undefined"){return i[j]}if(j==="origin"&&g.support.csstransforms){return this.$elem.css(this.transformOriginProperty).split(e)}else{if(j==="origin"){return["50%","50%"]}}return g.cssDefault[j]||0}});if(typeof(g.cssAngle)=="undefined"){g.cssAngle={}}g.extend(g.cssAngle,{rotate:true,skew:true,skewX:true,skewY:true});if(typeof(g.cssDefault)=="undefined"){g.cssDefault={}}g.extend(g.cssDefault,{scale:[1,1],scaleX:1,scaleY:1,matrix:[1,0,0,1,0,0],origin:["50%","50%"],reflect:[1,0,0,1,0,0],reflectX:[1,0,0,1,0,0],reflectXY:[1,0,0,1,0,0],reflectY:[1,0,0,1,0,0]});if(typeof(g.cssMultipleValues)=="undefined"){g.cssMultipleValues={}}g.extend(g.cssMultipleValues,{matrix:6,origin:{length:2,duplicate:true},reflect:6,reflectX:6,reflectXY:6,reflectY:6,scale:{length:2,duplicate:true},skew:2,translate:2});g.extend(g.cssNumber,{matrix:true,reflect:true,reflectX:true,reflectXY:true,reflectY:true,scale:true,scaleX:true,scaleY:true});g.each(g.transform.funcs,function(j,k){g.cssHooks[k]={set:function(n,o){var l=n.transform||new g.transform(n),i={};i[k]=o;l.exec(i,{preserve:true})},get:function(n,l){var i=n.transform||new g.transform(n);return i.getAttr(k)}}});g.each(["reflect","reflectX","reflectXY","reflectY"],function(j,k){g.cssHooks[k].get=function(n,l){var i=n.transform||new g.transform(n);return i.getAttr("matrix")||g.cssDefault[k]}})})(jQuery,this,this.document);(function(f,g,h,c){var d=/^([+\-]=)?([\d+.\-]+)(.*)$/;var a=f.fn.animate;f.fn.animate=function(p,l,o,n){var k=f.speed(l,o,n),j=f.cssMultipleValues;k.complete=k.old;if(!f.isEmptyObject(p)){if(typeof k.original==="undefined"){k.original={}}f.each(p,function(s,u){if(j[s]||f.cssAngle[s]||(!f.cssNumber[s]&&f.inArray(s,f.transform.funcs)!==-1)){var t=null;if(jQuery.isArray(p[s])){var r=1,q=u.length;if(j[s]){r=(typeof j[s].length==="undefined"?j[s]:j[s].length)}if(q>r||(q<r&&q==2)||(q==2&&r==2&&isNaN(parseFloat(u[q-1])))){t=u[q-1];u.splice(q-1,1)}}k.original[s]=u.toString();p[s]=parseFloat(u)}})}return a.apply(this,[arguments[0],k])};var b="paddingBottom";function i(k,l){if(k[l]!=null&&(!k.style||k.style[l]==null)){}var j=parseFloat(f.css(k,l));return j&&j>-10000?j:0}function e(u,v,w){var y=f.cssMultipleValues[this.prop],p=f.cssAngle[this.prop];if(y||(!f.cssNumber[this.prop]&&f.inArray(this.prop,f.transform.funcs)!==-1)){this.values=[];if(!y){y=1}var x=this.options.original[this.prop],t=f(this.elem).css(this.prop),j=f.cssDefault[this.prop]||0;if(!f.isArray(t)){t=[t]}if(!f.isArray(x)){if(f.type(x)==="string"){x=x.split(",")}else{x=[x]}}var l=y.length||y,s=0;while(x.length<l){x.push(y.duplicate?x[0]:j[s]||0);s++}var k,r,q,o=this,n=o.elem.transform;orig=f.style(o.elem,b);f.each(x,function(z,A){if(t[z]){k=t[z]}else{if(j[z]&&!y.duplicate){k=j[z]}else{if(y.duplicate){k=t[0]}else{k=0}}}if(p){k=f.angle.toDegree(k)}else{if(!f.cssNumber[o.prop]){r=d.exec(f.trim(k));if(r[3]&&r[3]!=="px"){if(r[3]==="%"){k=parseFloat(r[2])/100*n["safeOuter"+(z?"Height":"Width")]()}else{f.style(o.elem,b,k);k=i(o.elem,b);f.style(o.elem,b,orig)}}}}k=parseFloat(k);r=d.exec(f.trim(A));if(r){q=parseFloat(r[2]);w=r[3]||"px";if(p){q=f.angle.toDegree(q+w);w="deg"}else{if(!f.cssNumber[o.prop]&&w==="%"){k=(k/n["safeOuter"+(z?"Height":"Width")]())*100}else{if(!f.cssNumber[o.prop]&&w!=="px"){f.style(o.elem,b,(q||1)+w);k=((q||1)/i(o.elem,b))*k;f.style(o.elem,b,orig)}}}if(r[1]){q=((r[1]==="-="?-1:1)*q)+k}}else{q=A;w=""}o.values.push({start:k,end:q,unit:w})})}}if(f.fx.prototype.custom){(function(k){var j=k.custom;k.custom=function(o,n,l){e.apply(this,arguments);return j.apply(this,arguments)}}(f.fx.prototype))}if(f.Animation&&f.Animation.tweener){f.Animation.tweener(f.transform.funcs.join(" "),function(l,k){var j=this.createTween(l,k);e.apply(j,[j.start,j.end,j.unit]);return j})}f.fx.multipleValueStep={_default:function(j){f.each(j.values,function(k,l){j.values[k].now=l.start+((l.end-l.start)*j.pos)})}};f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){f.fx.multipleValueStep[k]=function(n){var p=n.decomposed,l=f.matrix;m=l.identity();p.now={};f.each(p.start,function(q){p.now[q]=parseFloat(p.start[q])+((parseFloat(p.end[q])-parseFloat(p.start[q]))*n.pos);if(((q==="scaleX"||q==="scaleY")&&p.now[q]===1)||(q!=="scaleX"&&q!=="scaleY"&&p.now[q]===0)){return true}m=m.x(l[q](p.now[q]))});var o;f.each(n.values,function(q){switch(q){case 0:o=parseFloat(m.e(1,1).toFixed(6));break;case 1:o=parseFloat(m.e(2,1).toFixed(6));break;case 2:o=parseFloat(m.e(1,2).toFixed(6));break;case 3:o=parseFloat(m.e(2,2).toFixed(6));break;case 4:o=parseFloat(m.e(1,3).toFixed(6));break;case 5:o=parseFloat(m.e(2,3).toFixed(6));break}n.values[q].now=o})}});f.each(f.transform.funcs,function(k,l){function j(p){var o=p.elem.transform||new f.transform(p.elem),n={};if(f.cssMultipleValues[l]||(!f.cssNumber[l]&&f.inArray(l,f.transform.funcs)!==-1)){(f.fx.multipleValueStep[p.prop]||f.fx.multipleValueStep._default)(p);n[p.prop]=[];f.each(p.values,function(q,r){n[p.prop].push(r.now+(f.cssNumber[p.prop]?"":r.unit))})}else{n[p.prop]=p.now+(f.cssNumber[p.prop]?"":p.unit)}o.exec(n,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}});f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(k,l){function j(r){var q=r.elem.transform||new f.transform(r.elem),p={};if(!r.initialized){r.initialized=true;if(l!=="matrix"){var o=f.matrix[l]().elements;var s;f.each(r.values,function(t){switch(t){case 0:s=o[0];break;case 1:s=o[2];break;case 2:s=o[1];break;case 3:s=o[3];break;default:s=0}r.values[t].end=s})}r.decomposed={};var n=r.values;r.decomposed.start=f.matrix.matrix(n[0].start,n[1].start,n[2].start,n[3].start,n[4].start,n[5].start).decompose();r.decomposed.end=f.matrix.matrix(n[0].end,n[1].end,n[2].end,n[3].end,n[4].end,n[5].end).decompose()}(f.fx.multipleValueStep[r.prop]||f.fx.multipleValueStep._default)(r);p.matrix=[];f.each(r.values,function(t,u){p.matrix.push(u.now)});q.exec(p,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}})})(jQuery,this,this.document);(function(g,h,j,c){var d=180/Math.PI;var k=200/Math.PI;var f=Math.PI/180;var e=2/1.8;var i=0.9;var a=Math.PI/200;var b=/^([+\-]=)?([\d+.\-]+)(.*)$/;g.extend({angle:{runit:/(deg|g?rad)/,radianToDegree:function(l){return l*d},radianToGrad:function(l){return l*k},degreeToRadian:function(l){return l*f},degreeToGrad:function(l){return l*e},gradToDegree:function(l){return l*i},gradToRadian:function(l){return l*a},toDegree:function(n){var l=b.exec(n);if(l){n=parseFloat(l[2]);switch(l[3]||"deg"){case"grad":n=g.angle.gradToDegree(n);break;case"rad":n=g.angle.radianToDegree(n);break}return n}return 0}}})})(jQuery,this,this.document);(function(f,e,b,g){if(typeof(f.matrix)=="undefined"){f.extend({matrix:{}})}var d=f.matrix;f.extend(d,{V2:function(h,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,2)}else{this.elements=[h,i]}this.length=2},V3:function(h,j,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,3)}else{this.elements=[h,j,i]}this.length=3},M2x2:function(i,h,k,j){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,4)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,4)}this.rows=2;this.cols=2},M3x3:function(n,l,k,j,i,h,q,p,o){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,9)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,9)}this.rows=3;this.cols=3}});var c={e:function(k,h){var i=this.rows,j=this.cols;if(k>i||h>i||k<1||h<1){return 0}return this.elements[(k-1)*j+h-1]},decompose:function(){var v=this.e(1,1),t=this.e(2,1),q=this.e(1,2),p=this.e(2,2),o=this.e(1,3),n=this.e(2,3);if(Math.abs(v*p-t*q)<0.01){return{rotate:0+"deg",skewX:0+"deg",scaleX:1,scaleY:1,translateX:0+"px",translateY:0+"px"}}var l=o,j=n;var u=Math.sqrt(v*v+t*t);v=v/u;t=t/u;var i=v*q+t*p;q-=v*i;p-=t*i;var s=Math.sqrt(q*q+p*p);q=q/s;p=p/s;i=i/s;if((v*p-t*q)<0){v=-v;t=-t;u=-u}var w=f.angle.radianToDegree;var h=w(Math.atan2(t,v));i=w(Math.atan(i));return{rotate:h+"deg",skewX:i+"deg",scaleX:u,scaleY:s,translateX:l+"px",translateY:j+"px"}}};f.extend(d.M2x2.prototype,c,{toM3x3:function(){var h=this.elements;return new d.M3x3(h[0],h[1],0,h[2],h[3],0,0,0,1)},x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows==3){return this.toM3x3().x(j)}var i=this.elements,h=j.elements;if(k&&h.length==2){return new d.V2(i[0]*h[0]+i[1]*h[1],i[2]*h[0]+i[3]*h[1])}else{if(h.length==i.length){return new d.M2x2(i[0]*h[0]+i[1]*h[2],i[0]*h[1]+i[1]*h[3],i[2]*h[0]+i[3]*h[2],i[2]*h[1]+i[3]*h[3])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M2x2(i*h[3],i*-h[1],i*-h[2],i*h[0])},determinant:function(){var h=this.elements;return h[0]*h[3]-h[1]*h[2]}});f.extend(d.M3x3.prototype,c,{x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows<3){j=j.toM3x3()}var i=this.elements,h=j.elements;if(k&&h.length==3){return new d.V3(i[0]*h[0]+i[1]*h[1]+i[2]*h[2],i[3]*h[0]+i[4]*h[1]+i[5]*h[2],i[6]*h[0]+i[7]*h[1]+i[8]*h[2])}else{if(h.length==i.length){return new d.M3x3(i[0]*h[0]+i[1]*h[3]+i[2]*h[6],i[0]*h[1]+i[1]*h[4]+i[2]*h[7],i[0]*h[2]+i[1]*h[5]+i[2]*h[8],i[3]*h[0]+i[4]*h[3]+i[5]*h[6],i[3]*h[1]+i[4]*h[4]+i[5]*h[7],i[3]*h[2]+i[4]*h[5]+i[5]*h[8],i[6]*h[0]+i[7]*h[3]+i[8]*h[6],i[6]*h[1]+i[7]*h[4]+i[8]*h[7],i[6]*h[2]+i[7]*h[5]+i[8]*h[8])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M3x3(i*(h[8]*h[4]-h[7]*h[5]),i*(-(h[8]*h[1]-h[7]*h[2])),i*(h[5]*h[1]-h[4]*h[2]),i*(-(h[8]*h[3]-h[6]*h[5])),i*(h[8]*h[0]-h[6]*h[2]),i*(-(h[5]*h[0]-h[3]*h[2])),i*(h[7]*h[3]-h[6]*h[4]),i*(-(h[7]*h[0]-h[6]*h[1])),i*(h[4]*h[0]-h[3]*h[1]))},determinant:function(){var h=this.elements;return h[0]*(h[8]*h[4]-h[7]*h[5])-h[3]*(h[8]*h[1]-h[7]*h[2])+h[6]*(h[5]*h[1]-h[4]*h[2])}});var a={e:function(h){return this.elements[h-1]}};f.extend(d.V2.prototype,a);f.extend(d.V3.prototype,a)})(jQuery,this,this.document);(function(c,b,a,d){if(typeof(c.matrix)=="undefined"){c.extend({matrix:{}})}c.extend(c.matrix,{calc:function(e,f,g){this.matrix=e;this.outerHeight=f;this.outerWidth=g}});c.matrix.calc.prototype={coord:function(e,i,h){h=typeof(h)!=="undefined"?h:0;var g=this.matrix,f;switch(g.rows){case 2:f=g.x(new c.matrix.V2(e,i));break;case 3:f=g.x(new c.matrix.V3(e,i,h));break}return f},corners:function(e,h){var f=!(typeof(e)!=="undefined"||typeof(h)!=="undefined"),g;if(!this.c||!f){h=h||this.outerHeight;e=e||this.outerWidth;g={tl:this.coord(0,0),bl:this.coord(0,h),tr:this.coord(e,0),br:this.coord(e,h)}}else{g=this.c}if(f){this.c=g}return g},sides:function(e){var f=e||this.corners();return{top:Math.min(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),bottom:Math.max(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),left:Math.min(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1)),right:Math.max(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1))}},offset:function(e){var f=this.sides(e);return{height:Math.abs(f.bottom-f.top),width:Math.abs(f.right-f.left)}},area:function(e){var h=e||this.corners();var g={x:h.tr.e(1)-h.tl.e(1)+h.br.e(1)-h.bl.e(1),y:h.tr.e(2)-h.tl.e(2)+h.br.e(2)-h.bl.e(2)},f={x:h.bl.e(1)-h.tl.e(1)+h.br.e(1)-h.tr.e(1),y:h.bl.e(2)-h.tl.e(2)+h.br.e(2)-h.tr.e(2)};return 0.25*Math.abs(g.e(1)*f.e(2)-g.e(2)*f.e(1))},nonAffinity:function(){var f=this.sides(),g=f.top-f.bottom,e=f.left-f.right;return parseFloat(parseFloat(Math.abs((Math.pow(g,2)+Math.pow(e,2))/(f.top*f.bottom+f.left*f.right))).toFixed(8))},originOffset:function(h,g){h=h?h:new c.matrix.V2(this.outerWidth*0.5,this.outerHeight*0.5);g=g?g:new c.matrix.V2(0,0);var e=this.coord(h.e(1),h.e(2));var f=this.coord(g.e(1),g.e(2));return{top:(f.e(2)-g.e(2))-(e.e(2)-h.e(2)),left:(f.e(1)-g.e(1))-(e.e(1)-h.e(1))}}}})(jQuery,this,this.document);(function(e,d,a,f){if(typeof(e.matrix)=="undefined"){e.extend({matrix:{}})}var c=e.matrix,g=c.M2x2,b=c.M3x3;e.extend(c,{identity:function(k){k=k||2;var l=k*k,n=new Array(l),j=k+1;for(var h=0;h<l;h++){n[h]=(h%j)===0?1:0}return new c["M"+k+"x"+k](n)},matrix:function(){var h=Array.prototype.slice.call(arguments);switch(arguments.length){case 4:return new g(h[0],h[2],h[1],h[3]);case 6:return new b(h[0],h[2],h[4],h[1],h[3],h[5],0,0,1)}},reflect:function(){return new g(-1,0,0,-1)},reflectX:function(){return new g(1,0,0,-1)},reflectXY:function(){return new g(0,1,1,0)},reflectY:function(){return new g(-1,0,0,1)},rotate:function(l){var i=e.angle.degreeToRadian(l),k=Math.cos(i),n=Math.sin(i);var j=k,h=n,p=-n,o=k;return new g(j,p,h,o)},scale:function(i,h){i=i||i===0?i:1;h=h||h===0?h:i;return new g(i,0,0,h)},scaleX:function(h){return c.scale(h,1)},scaleY:function(h){return c.scale(1,h)},skew:function(k,i){k=k||0;i=i||0;var l=e.angle.degreeToRadian(k),j=e.angle.degreeToRadian(i),h=Math.tan(l),n=Math.tan(j);return new g(1,h,n,1)},skewX:function(h){return c.skew(h)},skewY:function(h){return c.skew(0,h)},translate:function(i,h){i=i||0;h=h||0;return new b(1,0,i,0,1,h,0,0,1)},translateX:function(h){return c.translate(h)},translateY:function(h){return c.translate(0,h)}})})(jQuery,this,this.document);// -----------------------------------------------------------------------------------
jQuery.extend(jQuery.easing,{easeOutOneBounce:function(e,b,c,a,i){var g=0.8;var f=0.2;var d=g*g;if(e<0.0001){return 0}else{if(e<g){return e*e/d}else{return 1-f*f+(e-g-f)*(e-g-f)}}}});jQuery.extend(jQuery.easing,{easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeOutBack:function(c,e,a,g,d,f){if(f==undefined){f=1.70158}return g*((e=e/d-1)*e*((f+1)*e+f)+1)+a},easeOutBack2:function(c,e,a,g,d,f){if(c<f/2){jQuery.easing.easeInCirc(c,e,a,g,d,f/2)}else{return jQuery.easing.easeOutBounce(c-f/2,e,a,g,d,f/2)}}});function ws_page(d,b,a){var f=d.angle||17;var c=jQuery("<div/>").css({position:"absolute",width:"100%",height:"100%",top:"0%",overflow:"hidden"});var e=a.find("ul");c.hide().appendTo(a);this.go=function(l,j){function n(){c.find("div").stop(1,1);c.hide();c.empty()}n();e.hide();var k=jQuery("<div/>").css({position:"absolute",left:0,top:"-100%",width:"100%",height:"100%",overflow:"hidden","z-index":9}).append(jQuery(b.get(l)).clone().css({width:"100%",height:"100%"})).appendTo(c);var i=jQuery("<div/>").css({position:"absolute",left:0,top:0,width:"100%",height:"100%",overflow:"visible","z-index":10,"transform-origin":"top left","-webkit-backface-visibility":"hidden","-moz-backface-visibility":"hidden","-ms-backface-visibility":"hidden","-o-backface-visibility":"hidden","backface-visibility":"hidden"}).append(jQuery(b.get(j)).clone().css({width:"100%",height:"100%"})).appendTo(c);c.show();var p=i;var o=p.width(),m=p.height();var g=!!document.all;if(g){i.css({left:"-50%",top:"-50%"});p=i.find("img");p.css({translateX:o/2,translateY:m/2})}p.animate({rotate:f,translateX:g?Math.sqrt(o*o+m*m)*Math.sin(Math.PI*f/180)/2+o/4:0,translateY:g?Math.sqrt(o*o+m*m)*Math.cos(Math.PI*f/180)/2-m/2:0},{duration:2*d.duration/3,easing:"easeOutOneBounce"}).animate(g?{translateY:"+="+m}:{top:"100%"},{duration:d.duration/3,easing:"linear",complete:function(){$(this).hide()}});k.animate({top:"-30%"},{duration:d.duration/2}).animate({top:"0%"},{easing:"easeOutBounce",duration:d.duration/2});return l}};// -----------------------------------------------------------------------------------
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"page",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,playPause:true,stopOnHover:true,loop:false,bullets:1,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderchessblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section2 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/chess-blinds/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.9
 *	template Chess
 */
@import url("http://fonts.googleapis.com/css?family=Play&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:830px;
	margin:0px 10px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:830px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}#wowslider-container'.$val.'  .ws_bullets { 
	padding: 3px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:21px;
	height:21px;
	background: url(./themes/themebuilder/icons/bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:3px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-30px;
	z-index:60;
	height: 44px;
	width: 44px;
	background-image: url(./themes/themebuilder/icons/arrows3.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:15px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:15px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}

* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom:0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 27px;
	left: 0px;
	margin-right: 15px;
	z-index: 50;
	color: #FFFFFF;	
	font-family:"Play",Verdana,Geneva,sans-serif;
	font-size: 32px;
	line-height: 35px;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:8px;
	margin-top:10px;
	font-weight: normal;
	background:#000000;
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;	
	background:#FFFFFF;
	font-size: 20px;
	line-height: 22px;
	color: #000000;
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    right: -141px;
    top: 0;
	width:136px;
	height:100%;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	width:100%;
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#000000;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	margin:3px;
	text-indent:0;
    border: 5px solid #FFFFFF;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 28s infinite;
	-moz-animation: wsBasic 28s infinite;
	-webkit-animation: wsBasic 28s infinite;
}
@keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }

#wowslider-container'.$val.' .ws_shadow{
	background: url(./themes/themebuilder/icons/shadow3.png) left 100%;
	background-repeat: no-repeat;
	background-size:100% 100%;
	width:100%;
	height:30px;
	position: absolute;
	left:0;
	bottom:-30px;
	z-index:-1;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/shadow.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/shadow.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-3px;
	left:60px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section2 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
							
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Brisbane, Australia</li>
</ul></div>
';								
$i++;		
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/airplane.jpg" alt="Landing of airplane: ansprechende Diashow" title="Landing of airplane" id="wows1_0"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/bridge.jpg" alt="Bridge: Design für ansprechende" title="Bridge" id="wows1_1"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/cityscape.jpg" alt="Amazing cityscape: Web-Design anspricht" title="Amazing cityscape" id="wows1_2"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/fireworks.jpg" alt="Bright fireworks: ansprechende Diashow-Vorlage" title="Bright fireworks" id="wows1_3"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/quay.jpg" alt="Quay: ansprechende Bild Diaschau" title="Quay" id="wows1_4"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/lasershow.jpg" alt="Fantastic laser show: ansprechende Foto Slider" title="Fantastic laser show" id="wows1_5"/>Brisbane, Australia</li>
<li><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/images/sunrise.jpg" alt="Sunrise: ansprechende Slider" title="Sunrise" id="wows1_6"/>Brisbane, Australia</li>
						';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '


<a href="#" title="Landing of airplane"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/airplane.jpg" alt="" /></a>
<a href="#" title="Bridge"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/bridge.jpg" alt="" /></a>
<a href="#" title="Amazing cityscape"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/cityscape.jpg" alt="" /></a>
<a href="#" title="Bright fireworks"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/fireworks.jpg" alt="" /></a>
<a href="#" title="Quay"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/quay.jpg" alt="" /></a>
<a href="#" title="Fantastic laser show"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/lasershow.jpg" alt="" /></a>
<a href="#" title="Sunrise"><img src="http://www.wowslider.com/images/demo/chess-blinds/data1/tooltips/sunrise.jpg" alt="" /></a>
';
}

${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display: none;" href="http://wowslider.com">curseur sensible</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/chess-blinds/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blinds(c,b,a){var g=jQuery;var e=c.parts||3;var f=g("<div>");f.css({position:"absolute",width:"100%",height:"100%",left:0,top:0,"z-index":8}).hide().appendTo(a);var h=[];for(var d=0;d<e;d++){h[d]=g("<div>").css({position:"absolute",height:"100%",width:Math.ceil(100/e)+1+"%",border:"none",margin:0,overflow:"hidden",top:0,left:Math.round(100*d/e)+"%"}).appendTo(f)}this.go=function(m,p,j){var l=p>m?1:0;if(j){if(j<=-1){m=(p+1)%b.length;l=0}else{if(j>=1){m=(p-1+b.length)%b.length;l=1}else{return -1}}}f.find("img").stop(true,true);f.show();var o=g("ul",a);if(c.fadeOut){o.fadeOut((1-1/e)*c.duration)}for(var n=0;n<h.length;n++){var k=h[n];g(b.get(m)).clone().css({position:"absolute",top:0,left:(!l?(-f.width()):(f.width()-k.position().left))+"px",width:"auto",height:"100%"}).appendTo(k).animate({left:-k.position().left+"px"},(c.duration/(h.length+1))*(l?(h.length-n+1):(n+2)),((!l&&n==h.length-1||l&&!n)?function(){o.css({left:-m+"00%"}).stop(true,true).show();f.hide().find("img").remove()}:null))}return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blinds",prev:"",next:"",duration:20*100,delay:20*100,width:830,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergothicdomino'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section3 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/gothic-domino/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.9
 *	template Gothic
 */
@import url("http://fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,latin-ext,cyrillic");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:16px;
	height:16px;
	background: url(./themes/themebuilder/icons/bullet4.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-29px;
	z-index:60;
	height: 40px;
	width: 40px;
	background-image: url(./themes/themebuilder/icons/arrows4.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0; 
	left:10px;
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 25px;
	left: 10px; 
	margin-right: 10px;
	padding:7px;
	background:#000000;
	color:#FFFFFF;
	z-index: 50;
	font-family:"Didact Gothic",Arial,Helvetica,sans-serif;
	font-size: 32px;
	line-height: 34px;
	font-weight: normal;
	border-radius:6px;	
	-moz-border-radius:6px;
 	-webkit-border-radius:6px;
	opacity:0.7;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);
}
#wowslider-container'.$val.' .ws-title div{
    margin-top: 6px;
	font-size: 18px;
	line-height: 20px;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 20s infinite;
	-moz-animation: wsBasic 20s infinite;
	-webkit-animation: wsBasic 20s infinite;
}
@keyframes wsBasic{0%{left:-0%} 12.5%{left:-0%} 20%{left:-100%} 32.5%{left:-100%} 40%{left:-200%} 52.5%{left:-200%} 60%{left:-300%} 72.5%{left:-300%} 80%{left:-400%} 92.5%{left:-400%} }
@-moz-keyframes wsBasic{0%{left:-0%} 12.5%{left:-0%} 20%{left:-100%} 32.5%{left:-100%} 40%{left:-200%} 52.5%{left:-200%} 60%{left:-300%} 72.5%{left:-300%} 80%{left:-400%} 92.5%{left:-400%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 12.5%{left:-0%} 20%{left:-100%} 32.5%{left:-100%} 40%{left:-200%} 52.5%{left:-200%} 60%{left:-300%} 72.5%{left:-300%} 80%{left:-400%} 92.5%{left:-400%} }

#wowslider-container'.$val.' {
    box-shadow: 0 0 2px #000000;	
    -moz-box-shadow: 0 0 2px #000000;
    -webkit-box-shadow: 0 0 2px #000000; 
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    box-shadow:0 0 2px #000000;
    -moz-box-shadow: 0 0 2px #000000;
    -webkit-box-shadow: 0 0 2px #000000; 
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#000000;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    box-shadow:0 0 2px #000000;
    -moz-box-shadow: 0 0 2px #000000;
    -webkit-box-shadow: 0 0 2px #000000; 
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-6px;
	margin-left:0px;
	left:120px;
	background:url(./themes/themebuilder/icons/triangle4.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/gothic-domino/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section3 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
							
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';							
$i++;			
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/landscape.jpg" alt="Wonderful landscape: CSS3 Slider" title="Wonderful landscape" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/watersurface.jpg" alt="Water surface: CSS3 image slider" title="Water surface" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/mountains.jpg" alt="Mountains: Responsive CSS3 Slider" title="Mountains" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/trees.jpg" alt="Autumn trees: Diashow CSS3" title="Autumn trees" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/images/water.jpg" alt="Water and mountains: CSS3 Foto Slider" title="Water and mountains" id="wows1_4"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Wonderful landscape"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/landscape.jpg" alt="Wonderful landscape"/>1</a>
<a href="#" title="Water surface"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/watersurface.jpg" alt="Water surface"/>2</a>
<a href="#" title="Mountains"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/mountains.jpg" alt="Mountains"/>3</a>
<a href="#" title="Autumn trees"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/trees.jpg" alt="Autumn trees"/>4</a>
<a href="#" title="Water and mountains"><img src="http://www.wowslider.com/images/demo/gothic-domino/data1/tooltips/water.jpg" alt="Water and mountains"/>5</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display: none;" href="http://wowslider.com">CSS-seulement glisseur</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/gothic-domino/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_domino(d,b,a){$.extend($.easing,{easeInOutSine:function(m,l,i,j,k){return -j/2*(Math.cos(Math.PI*l/k)-1)+i}});$.extend(d,{columns:d.columns|5,rows:d.rows|2,centerRow:d.centerRow|2,centerColumn:d.centerColumn|2});var c=$("<div/>").css({position:"absolute",width:"100%",height:"100%",top:"0%",overflow:"hidden"});c.hide().appendTo(a);var e=a.find("ul");this.go=function(r,q){function s(){c.find("img").stop(1,1);c.hide();c.empty()}s();if(d.fadeOut){e.fadeOut(d.duration)}var h=c.width();var g=c.height();var p=Math.floor(h/d.columns);var n=Math.floor(g/d.rows);var l=h-p*(d.columns-1);var v=g-n*(d.rows-1);function z(j,i){return Math.random()*(i-j+1)+j}var m=[];for(var u=0;u<d.rows;u++){m[u]=[];for(var t=0;t<d.columns;t++){var k=d.duration*(1-Math.abs((d.centerRow*d.centerColumn-u*t)/(2*d.rows*d.columns)));var w=t<d.columns-1?p:l;var f=u<d.rows-1?n:v;m[u][t]=$("<div/>").css({width:w,height:f,position:"absolute",top:u*n,left:t*p,overflow:"hidden"});var y=z(u-2,u+2);var x=z(t-2,t+2);m[u][t].appendTo(c);var A=$(b.get(r)).clone().css({position:"absolute",top:-y*n,left:-x*p,width:h,opacity:0,height:g}).appendTo(m[u][t])}}var o=0;c.show();for(var u=0;u<d.rows;u++){for(var t=0;t<d.columns;t++){m[u][t].find("img").animate({top:-u*n,left:-t*p,opacity:1,deg:d.domino_rotation},{duration:k,easing:"easeInOutSine",complete:function(){o++;if(o==d.rows*d.columns){s();e.stop(1,1);e.css("left",-r*100+"%").show()}}})}}return r}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"domino",prev:"",next:"",duration:15*100,delay:25*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermetrorotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section4 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/metro-rotate/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.8
 *	template Metro
 */
@import url("http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin,latin-ext,cyrillic");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:5px auto 5px;
	z-index:90;
	border:5px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:13px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 40px;
	width: 40px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	opacity:0.8;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0; 
	left:10px;
}
#wowslider-container'.$val.' a.ws_next:hover{
	opacity:1;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	opacity:1; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 25px;
	left: 10px; 
	margin-right: 10px;
	padding:7px;
	background:none;
	color:#FFFFFF;
	z-index: 50;
	font-family:Open Sans Condensed,Arial,Helvetica,sans-serif;
	font-size: 26px;
	line-height: 28px;
	font-weight: bold;
	border: 2px solid #FFFFFF; 
}
#wowslider-container'.$val.' .ws-title div{
    margin-top: 6px;
	font-size: 20px;
	line-height: 22px;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 24s infinite;
	-moz-animation: wsBasic 24s infinite;
	-webkit-animation: wsBasic 24s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }

#wowslider-container'.$val.' {
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.4);	
    -moz-box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.4); 
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 2px solid #FFFFFF;;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 2px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-8px;
	margin-left:-3px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section4 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';			
$i++;							
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/boats.jpg" alt="Boats in Portugal" title="Boats in Portugal" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/coast.jpg" alt="Coast" title="Coast" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/landscape.jpg" alt="Beautiful landscape" title="Beautiful landscape" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/lighthouse.jpg" alt="Lighthouse" title="Lighthouse" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/panorama.jpg" alt="Panorama" title="Panorama" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/images/seascape.jpg" alt="Sea-scape" title="Sea-scape" id="wows1_5"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Boats in Portugal"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/boats.jpg" alt="Boats in Portugal"/>1</a>
<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/coast.jpg" alt="Coast"/>2</a>
<a href="#" title="Beautiful landscape"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/landscape.jpg" alt="Beautiful landscape"/>3</a>
<a href="#" title="Lighthouse"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/lighthouse.jpg" alt="Lighthouse"/>4</a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/panorama.jpg" alt="Panorama"/>5</a>
<a href="#" title="Sea-scape"><img src="http://www.wowslider.com/images/demo/metro-rotate/data1/tooltips/seascape.jpg" alt="Sea-scape"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display: none;" href="http://wowslider.com">Image CSS diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/metro-rotate/engine1/script.js"></script>-->
	<script type="text/javascript">
(function(f,g,j,b){var h=/progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,c=/^([\+\-]=)?([\d+.\-]+)(.*)$/,q=/%/;var d=j.createElement("modernizr"),e=d.style;function n(s){return parseFloat(s)}function l(){var s={transformProperty:"",MozTransform:"-moz-",WebkitTransform:"-webkit-",OTransform:"-o-",msTransform:"-ms-"};for(var t in s){if(typeof e[t]!="undefined"){return s[t]}}return null}function r(){if(typeof(g.Modernizr)!=="undefined"){return Modernizr.csstransforms}var t=["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"];for(var s in t){if(e[t[s]]!==b){return true}}}var a=l(),i=a!==null?a+"transform":false,k=a!==null?a+"transform-origin":false;f.support.csstransforms=r();if(a=="-ms-"){i="msTransform";k="msTransformOrigin"}f.extend({transform:function(s){s.transform=this;this.$elem=f(s);this.applyingMatrix=false;this.matrix=null;this.height=null;this.width=null;this.outerHeight=null;this.outerWidth=null;this.boxSizingValue=null;this.boxSizingProperty=null;this.attr=null;this.transformProperty=i;this.transformOriginProperty=k}});f.extend(f.transform,{funcs:["matrix","origin","reflect","reflectX","reflectXY","reflectY","rotate","scale","scaleX","scaleY","skew","skewX","skewY","translate","translateX","translateY"]});f.fn.transform=function(s,t){return this.each(function(){var u=this.transform||new f.transform(this);if(s){u.exec(s,t)}})};f.transform.prototype={exec:function(s,t){t=f.extend(true,{forceMatrix:false,preserve:false},t);this.attr=null;if(t.preserve){s=f.extend(true,this.getAttrs(true,true),s)}else{s=f.extend(true,{},s)}this.setAttrs(s);if(f.support.csstransforms&&!t.forceMatrix){return this.execFuncs(s)}else{if(f.browser.msie||(f.support.csstransforms&&t.forceMatrix)){return this.execMatrix(s)}}return false},execFuncs:function(t){var s=[];for(var u in t){if(u=="origin"){this[u].apply(this,f.isArray(t[u])?t[u]:[t[u]])}else{if(f.inArray(u,f.transform.funcs)!==-1){s.push(this.createTransformFunc(u,t[u]))}}}this.$elem.css(i,s.join(" "));return true},execMatrix:function(z){var C,x,t;var F=this.$elem[0],B=this;function A(N,M){if(q.test(N)){return parseFloat(N)/100*B["safeOuter"+(M?"Height":"Width")]()}return o(F,N)}var s=/translate[X|Y]?/,u=[];for(var v in z){switch(f.type(z[v])){case"array":t=z[v];break;case"string":t=f.map(z[v].split(","),f.trim);break;default:t=[z[v]]}if(f.matrix[v]){if(f.cssAngle[v]){t=f.map(t,f.angle.toDegree)}else{if(!f.cssNumber[v]){t=f.map(t,A)}else{t=f.map(t,n)}}x=f.matrix[v].apply(this,t);if(s.test(v)){u.push(x)}else{C=C?C.x(x):x}}else{if(v=="origin"){this[v].apply(this,t)}}}C=C||f.matrix.identity();f.each(u,function(M,N){C=C.x(N)});var K=parseFloat(C.e(1,1).toFixed(6)),I=parseFloat(C.e(2,1).toFixed(6)),H=parseFloat(C.e(1,2).toFixed(6)),G=parseFloat(C.e(2,2).toFixed(6)),L=C.rows===3?parseFloat(C.e(1,3).toFixed(6)):0,J=C.rows===3?parseFloat(C.e(2,3).toFixed(6)):0;if(f.support.csstransforms&&a==="-moz-"){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+"px, "+J+"px)")}else{if(f.support.csstransforms){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+", "+J+")")}else{if(f.browser.msie){var w=", FilterType="nearest neighbor"";var D=this.$elem[0].style;var E="progid:DXImageTransform.Microsoft.Matrix(M11="+K+", M12="+H+", M21="+I+", M22="+G+", sizingMethod="auto expand""+w+")";var y=D.filter||f.css(this.$elem[0],"filter")||"";D.filter=h.test(y)?y.replace(h,E):y?y+" "+E:E;this.applyingMatrix=true;this.matrix=C;this.fixPosition(C,L,J);this.applyingMatrix=false;this.matrix=null}}}return true},origin:function(s,t){if(f.support.csstransforms){if(typeof t==="undefined"){this.$elem.css(k,s)}else{this.$elem.css(k,s+" "+t)}return true}switch(s){case"left":s="0";break;case"right":s="100%";break;case"center":case b:s="50%"}switch(t){case"top":t="0";break;case"bottom":t="100%";break;case"center":case b:t="50%"}this.setAttr("origin",[q.test(s)?s:o(this.$elem[0],s)+"px",q.test(t)?t:o(this.$elem[0],t)+"px"]);return true},createTransformFunc:function(t,u){if(t.substr(0,7)==="reflect"){var s=u?f.matrix[t]():f.matrix.identity();return"matrix("+s.e(1,1)+", "+s.e(2,1)+", "+s.e(1,2)+", "+s.e(2,2)+", 0, 0)"}if(t=="matrix"){if(a==="-moz-"){u[4]=u[4]?u[4]+"px":0;u[5]=u[5]?u[5]+"px":0}}return t+"("+(f.isArray(u)?u.join(", "):u)+")"},fixPosition:function(B,y,x,D,s){var w=new f.matrix.calc(B,this.safeOuterHeight(),this.safeOuterWidth()),C=this.getAttr("origin");var v=w.originOffset(new f.matrix.V2(q.test(C[0])?parseFloat(C[0])/100*w.outerWidth:parseFloat(C[0]),q.test(C[1])?parseFloat(C[1])/100*w.outerHeight:parseFloat(C[1])));var t=w.sides();var u=this.$elem.css("position");if(u=="static"){u="relative"}var A={top:0,left:0};var z={position:u,top:(v.top+x+t.top+A.top)+"px",left:(v.left+y+t.left+A.left)+"px",zoom:1};this.$elem.css(z)}};function o(s,u){var t=c.exec(f.trim(u));if(t[3]&&t[3]!=="px"){var w="paddingBottom",v=f.style(s,w);f.style(s,w,u);u=p(s,w);f.style(s,w,v);return u}return parseFloat(u)}function p(t,u){if(t[u]!=null&&(!t.style||t.style[u]==null)){return t[u]}var s=parseFloat(f.css(t,u));return s&&s>-10000?s:0}})(jQuery,this,this.document);(function(d,c,a,f){d.extend(d.transform.prototype,{safeOuterHeight:function(){return this.safeOuterLength("height")},safeOuterWidth:function(){return this.safeOuterLength("width")},safeOuterLength:function(l){var p="outer"+(l=="width"?"Width":"Height");if(!d.support.csstransforms&&d.browser.msie){l=l=="width"?"width":"height";if(this.applyingMatrix&&!this[p]&&this.matrix){var k=new d.matrix.calc(this.matrix,1,1),n=k.offset(),g=this.$elem[p]()/n[l];this[p]=g;return g}else{if(this.applyingMatrix&&this[p]){return this[p]}}var o={height:["top","bottom"],width:["left","right"]};var h=this.$elem[0],j=parseFloat(d.css(h,l,true)),q=this.boxSizingProperty,i=this.boxSizingValue;if(!this.boxSizingProperty){q=this.boxSizingProperty=e()||"box-sizing";i=this.boxSizingValue=this.$elem.css(q)||"content-box"}if(this[p]&&this[l]==j){return this[p]}else{this[l]=j}if(q&&(i=="padding-box"||i=="content-box")){j+=parseFloat(d.css(h,"padding-"+o[l][0],true))||0+parseFloat(d.css(h,"padding-"+o[l][1],true))||0}if(q&&i=="content-box"){j+=parseFloat(d.css(h,"border-"+o[l][0]+"-width",true))||0+parseFloat(d.css(h,"border-"+o[l][1]+"-width",true))||0}this[p]=j;return j}return this.$elem[p]()}});var b=null;function e(){if(b){return b}var h={boxSizing:"box-sizing",MozBoxSizing:"-moz-box-sizing",WebkitBoxSizing:"-webkit-box-sizing",OBoxSizing:"-o-box-sizing"},g=a.body;for(var i in h){if(typeof g.style[i]!="undefined"){b=h[i];return b}}return null}})(jQuery,this,this.document);(function(g,f,b,h){var d=/([\w\-]*?)\((.*?)\)/g,a="data-transform",e=/\s/,c=/,\s?/;g.extend(g.transform.prototype,{setAttrs:function(i){var j="",l;for(var k in i){l=i[k];if(g.isArray(l)){l=l.join(", ")}j+=" "+k+"("+l+")"}this.attr=g.trim(j);this.$elem.attr(a,this.attr)},setAttr:function(k,l){if(g.isArray(l)){l=l.join(", ")}var j=this.attr||this.$elem.attr(a);if(!j||j.indexOf(k)==-1){this.attr=g.trim(j+" "+k+"("+l+")");this.$elem.attr(a,this.attr)}else{var i=[],n;d.lastIndex=0;while(n=d.exec(j)){if(k==n[1]){i.push(k+"("+l+")")}else{i.push(n[0])}}this.attr=i.join(" ");this.$elem.attr(a,this.attr)}},getAttrs:function(){var j=this.attr||this.$elem.attr(a);if(!j){return{}}var i={},l,k;d.lastIndex=0;while((l=d.exec(j))!==null){if(l){k=l[2].split(c);i[l[1]]=k.length==1?k[0]:k}}return i},getAttr:function(j){var i=this.getAttrs();if(typeof i[j]!=="undefined"){return i[j]}if(j==="origin"&&g.support.csstransforms){return this.$elem.css(this.transformOriginProperty).split(e)}else{if(j==="origin"){return["50%","50%"]}}return g.cssDefault[j]||0}});if(typeof(g.cssAngle)=="undefined"){g.cssAngle={}}g.extend(g.cssAngle,{rotate:true,skew:true,skewX:true,skewY:true});if(typeof(g.cssDefault)=="undefined"){g.cssDefault={}}g.extend(g.cssDefault,{scale:[1,1],scaleX:1,scaleY:1,matrix:[1,0,0,1,0,0],origin:["50%","50%"],reflect:[1,0,0,1,0,0],reflectX:[1,0,0,1,0,0],reflectXY:[1,0,0,1,0,0],reflectY:[1,0,0,1,0,0]});if(typeof(g.cssMultipleValues)=="undefined"){g.cssMultipleValues={}}g.extend(g.cssMultipleValues,{matrix:6,origin:{length:2,duplicate:true},reflect:6,reflectX:6,reflectXY:6,reflectY:6,scale:{length:2,duplicate:true},skew:2,translate:2});g.extend(g.cssNumber,{matrix:true,reflect:true,reflectX:true,reflectXY:true,reflectY:true,scale:true,scaleX:true,scaleY:true});g.each(g.transform.funcs,function(j,k){g.cssHooks[k]={set:function(n,o){var l=n.transform||new g.transform(n),i={};i[k]=o;l.exec(i,{preserve:true})},get:function(n,l){var i=n.transform||new g.transform(n);return i.getAttr(k)}}});g.each(["reflect","reflectX","reflectXY","reflectY"],function(j,k){g.cssHooks[k].get=function(n,l){var i=n.transform||new g.transform(n);return i.getAttr("matrix")||g.cssDefault[k]}})})(jQuery,this,this.document);(function(f,g,h,c){var d=/^([+\-]=)?([\d+.\-]+)(.*)$/;var a=f.fn.animate;f.fn.animate=function(p,l,o,n){var k=f.speed(l,o,n),j=f.cssMultipleValues;k.complete=k.old;if(!f.isEmptyObject(p)){if(typeof k.original==="undefined"){k.original={}}f.each(p,function(s,u){if(j[s]||f.cssAngle[s]||(!f.cssNumber[s]&&f.inArray(s,f.transform.funcs)!==-1)){var t=null;if(jQuery.isArray(p[s])){var r=1,q=u.length;if(j[s]){r=(typeof j[s].length==="undefined"?j[s]:j[s].length)}if(q>r||(q<r&&q==2)||(q==2&&r==2&&isNaN(parseFloat(u[q-1])))){t=u[q-1];u.splice(q-1,1)}}k.original[s]=u.toString();p[s]=parseFloat(u)}})}return a.apply(this,[arguments[0],k])};var b="paddingBottom";function i(k,l){if(k[l]!=null&&(!k.style||k.style[l]==null)){}var j=parseFloat(f.css(k,l));return j&&j>-10000?j:0}function e(u,v,w){var y=f.cssMultipleValues[this.prop],p=f.cssAngle[this.prop];if(y||(!f.cssNumber[this.prop]&&f.inArray(this.prop,f.transform.funcs)!==-1)){this.values=[];if(!y){y=1}var x=this.options.original[this.prop],t=f(this.elem).css(this.prop),j=f.cssDefault[this.prop]||0;if(!f.isArray(t)){t=[t]}if(!f.isArray(x)){if(f.type(x)==="string"){x=x.split(",")}else{x=[x]}}var l=y.length||y,s=0;while(x.length<l){x.push(y.duplicate?x[0]:j[s]||0);s++}var k,r,q,o=this,n=o.elem.transform;orig=f.style(o.elem,b);f.each(x,function(z,A){if(t[z]){k=t[z]}else{if(j[z]&&!y.duplicate){k=j[z]}else{if(y.duplicate){k=t[0]}else{k=0}}}if(p){k=f.angle.toDegree(k)}else{if(!f.cssNumber[o.prop]){r=d.exec(f.trim(k));if(r[3]&&r[3]!=="px"){if(r[3]==="%"){k=parseFloat(r[2])/100*n["safeOuter"+(z?"Height":"Width")]()}else{f.style(o.elem,b,k);k=i(o.elem,b);f.style(o.elem,b,orig)}}}}k=parseFloat(k);r=d.exec(f.trim(A));if(r){q=parseFloat(r[2]);w=r[3]||"px";if(p){q=f.angle.toDegree(q+w);w="deg"}else{if(!f.cssNumber[o.prop]&&w==="%"){k=(k/n["safeOuter"+(z?"Height":"Width")]())*100}else{if(!f.cssNumber[o.prop]&&w!=="px"){f.style(o.elem,b,(q||1)+w);k=((q||1)/i(o.elem,b))*k;f.style(o.elem,b,orig)}}}if(r[1]){q=((r[1]==="-="?-1:1)*q)+k}}else{q=A;w=""}o.values.push({start:k,end:q,unit:w})})}}if(f.fx.prototype.custom){(function(k){var j=k.custom;k.custom=function(o,n,l){e.apply(this,arguments);return j.apply(this,arguments)}}(f.fx.prototype))}if(f.Animation&&f.Animation.tweener){f.Animation.tweener(f.transform.funcs.join(" "),function(l,k){var j=this.createTween(l,k);e.apply(j,[j.start,j.end,j.unit]);return j})}f.fx.multipleValueStep={_default:function(j){f.each(j.values,function(k,l){j.values[k].now=l.start+((l.end-l.start)*j.pos)})}};f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){f.fx.multipleValueStep[k]=function(n){var p=n.decomposed,l=f.matrix;m=l.identity();p.now={};f.each(p.start,function(q){p.now[q]=parseFloat(p.start[q])+((parseFloat(p.end[q])-parseFloat(p.start[q]))*n.pos);if(((q==="scaleX"||q==="scaleY")&&p.now[q]===1)||(q!=="scaleX"&&q!=="scaleY"&&p.now[q]===0)){return true}m=m.x(l[q](p.now[q]))});var o;f.each(n.values,function(q){switch(q){case 0:o=parseFloat(m.e(1,1).toFixed(6));break;case 1:o=parseFloat(m.e(2,1).toFixed(6));break;case 2:o=parseFloat(m.e(1,2).toFixed(6));break;case 3:o=parseFloat(m.e(2,2).toFixed(6));break;case 4:o=parseFloat(m.e(1,3).toFixed(6));break;case 5:o=parseFloat(m.e(2,3).toFixed(6));break}n.values[q].now=o})}});f.each(f.transform.funcs,function(k,l){function j(p){var o=p.elem.transform||new f.transform(p.elem),n={};if(f.cssMultipleValues[l]||(!f.cssNumber[l]&&f.inArray(l,f.transform.funcs)!==-1)){(f.fx.multipleValueStep[p.prop]||f.fx.multipleValueStep._default)(p);n[p.prop]=[];f.each(p.values,function(q,r){n[p.prop].push(r.now+(f.cssNumber[p.prop]?"":r.unit))})}else{n[p.prop]=p.now+(f.cssNumber[p.prop]?"":p.unit)}o.exec(n,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}});f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(k,l){function j(r){var q=r.elem.transform||new f.transform(r.elem),p={};if(!r.initialized){r.initialized=true;if(l!=="matrix"){var o=f.matrix[l]().elements;var s;f.each(r.values,function(t){switch(t){case 0:s=o[0];break;case 1:s=o[2];break;case 2:s=o[1];break;case 3:s=o[3];break;default:s=0}r.values[t].end=s})}r.decomposed={};var n=r.values;r.decomposed.start=f.matrix.matrix(n[0].start,n[1].start,n[2].start,n[3].start,n[4].start,n[5].start).decompose();r.decomposed.end=f.matrix.matrix(n[0].end,n[1].end,n[2].end,n[3].end,n[4].end,n[5].end).decompose()}(f.fx.multipleValueStep[r.prop]||f.fx.multipleValueStep._default)(r);p.matrix=[];f.each(r.values,function(t,u){p.matrix.push(u.now)});q.exec(p,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}})})(jQuery,this,this.document);(function(g,h,j,c){var d=180/Math.PI;var k=200/Math.PI;var f=Math.PI/180;var e=2/1.8;var i=0.9;var a=Math.PI/200;var b=/^([+\-]=)?([\d+.\-]+)(.*)$/;g.extend({angle:{runit:/(deg|g?rad)/,radianToDegree:function(l){return l*d},radianToGrad:function(l){return l*k},degreeToRadian:function(l){return l*f},degreeToGrad:function(l){return l*e},gradToDegree:function(l){return l*i},gradToRadian:function(l){return l*a},toDegree:function(n){var l=b.exec(n);if(l){n=parseFloat(l[2]);switch(l[3]||"deg"){case"grad":n=g.angle.gradToDegree(n);break;case"rad":n=g.angle.radianToDegree(n);break}return n}return 0}}})})(jQuery,this,this.document);(function(f,e,b,g){if(typeof(f.matrix)=="undefined"){f.extend({matrix:{}})}var d=f.matrix;f.extend(d,{V2:function(h,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,2)}else{this.elements=[h,i]}this.length=2},V3:function(h,j,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,3)}else{this.elements=[h,j,i]}this.length=3},M2x2:function(i,h,k,j){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,4)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,4)}this.rows=2;this.cols=2},M3x3:function(n,l,k,j,i,h,q,p,o){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,9)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,9)}this.rows=3;this.cols=3}});var c={e:function(k,h){var i=this.rows,j=this.cols;if(k>i||h>i||k<1||h<1){return 0}return this.elements[(k-1)*j+h-1]},decompose:function(){var v=this.e(1,1),t=this.e(2,1),q=this.e(1,2),p=this.e(2,2),o=this.e(1,3),n=this.e(2,3);if(Math.abs(v*p-t*q)<0.01){return{rotate:0+"deg",skewX:0+"deg",scaleX:1,scaleY:1,translateX:0+"px",translateY:0+"px"}}var l=o,j=n;var u=Math.sqrt(v*v+t*t);v=v/u;t=t/u;var i=v*q+t*p;q-=v*i;p-=t*i;var s=Math.sqrt(q*q+p*p);q=q/s;p=p/s;i=i/s;if((v*p-t*q)<0){v=-v;t=-t;u=-u}var w=f.angle.radianToDegree;var h=w(Math.atan2(t,v));i=w(Math.atan(i));return{rotate:h+"deg",skewX:i+"deg",scaleX:u,scaleY:s,translateX:l+"px",translateY:j+"px"}}};f.extend(d.M2x2.prototype,c,{toM3x3:function(){var h=this.elements;return new d.M3x3(h[0],h[1],0,h[2],h[3],0,0,0,1)},x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows==3){return this.toM3x3().x(j)}var i=this.elements,h=j.elements;if(k&&h.length==2){return new d.V2(i[0]*h[0]+i[1]*h[1],i[2]*h[0]+i[3]*h[1])}else{if(h.length==i.length){return new d.M2x2(i[0]*h[0]+i[1]*h[2],i[0]*h[1]+i[1]*h[3],i[2]*h[0]+i[3]*h[2],i[2]*h[1]+i[3]*h[3])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M2x2(i*h[3],i*-h[1],i*-h[2],i*h[0])},determinant:function(){var h=this.elements;return h[0]*h[3]-h[1]*h[2]}});f.extend(d.M3x3.prototype,c,{x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows<3){j=j.toM3x3()}var i=this.elements,h=j.elements;if(k&&h.length==3){return new d.V3(i[0]*h[0]+i[1]*h[1]+i[2]*h[2],i[3]*h[0]+i[4]*h[1]+i[5]*h[2],i[6]*h[0]+i[7]*h[1]+i[8]*h[2])}else{if(h.length==i.length){return new d.M3x3(i[0]*h[0]+i[1]*h[3]+i[2]*h[6],i[0]*h[1]+i[1]*h[4]+i[2]*h[7],i[0]*h[2]+i[1]*h[5]+i[2]*h[8],i[3]*h[0]+i[4]*h[3]+i[5]*h[6],i[3]*h[1]+i[4]*h[4]+i[5]*h[7],i[3]*h[2]+i[4]*h[5]+i[5]*h[8],i[6]*h[0]+i[7]*h[3]+i[8]*h[6],i[6]*h[1]+i[7]*h[4]+i[8]*h[7],i[6]*h[2]+i[7]*h[5]+i[8]*h[8])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M3x3(i*(h[8]*h[4]-h[7]*h[5]),i*(-(h[8]*h[1]-h[7]*h[2])),i*(h[5]*h[1]-h[4]*h[2]),i*(-(h[8]*h[3]-h[6]*h[5])),i*(h[8]*h[0]-h[6]*h[2]),i*(-(h[5]*h[0]-h[3]*h[2])),i*(h[7]*h[3]-h[6]*h[4]),i*(-(h[7]*h[0]-h[6]*h[1])),i*(h[4]*h[0]-h[3]*h[1]))},determinant:function(){var h=this.elements;return h[0]*(h[8]*h[4]-h[7]*h[5])-h[3]*(h[8]*h[1]-h[7]*h[2])+h[6]*(h[5]*h[1]-h[4]*h[2])}});var a={e:function(h){return this.elements[h-1]}};f.extend(d.V2.prototype,a);f.extend(d.V3.prototype,a)})(jQuery,this,this.document);(function(c,b,a,d){if(typeof(c.matrix)=="undefined"){c.extend({matrix:{}})}c.extend(c.matrix,{calc:function(e,f,g){this.matrix=e;this.outerHeight=f;this.outerWidth=g}});c.matrix.calc.prototype={coord:function(e,i,h){h=typeof(h)!=="undefined"?h:0;var g=this.matrix,f;switch(g.rows){case 2:f=g.x(new c.matrix.V2(e,i));break;case 3:f=g.x(new c.matrix.V3(e,i,h));break}return f},corners:function(e,h){var f=!(typeof(e)!=="undefined"||typeof(h)!=="undefined"),g;if(!this.c||!f){h=h||this.outerHeight;e=e||this.outerWidth;g={tl:this.coord(0,0),bl:this.coord(0,h),tr:this.coord(e,0),br:this.coord(e,h)}}else{g=this.c}if(f){this.c=g}return g},sides:function(e){var f=e||this.corners();return{top:Math.min(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),bottom:Math.max(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),left:Math.min(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1)),right:Math.max(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1))}},offset:function(e){var f=this.sides(e);return{height:Math.abs(f.bottom-f.top),width:Math.abs(f.right-f.left)}},area:function(e){var h=e||this.corners();var g={x:h.tr.e(1)-h.tl.e(1)+h.br.e(1)-h.bl.e(1),y:h.tr.e(2)-h.tl.e(2)+h.br.e(2)-h.bl.e(2)},f={x:h.bl.e(1)-h.tl.e(1)+h.br.e(1)-h.tr.e(1),y:h.bl.e(2)-h.tl.e(2)+h.br.e(2)-h.tr.e(2)};return 0.25*Math.abs(g.e(1)*f.e(2)-g.e(2)*f.e(1))},nonAffinity:function(){var f=this.sides(),g=f.top-f.bottom,e=f.left-f.right;return parseFloat(parseFloat(Math.abs((Math.pow(g,2)+Math.pow(e,2))/(f.top*f.bottom+f.left*f.right))).toFixed(8))},originOffset:function(h,g){h=h?h:new c.matrix.V2(this.outerWidth*0.5,this.outerHeight*0.5);g=g?g:new c.matrix.V2(0,0);var e=this.coord(h.e(1),h.e(2));var f=this.coord(g.e(1),g.e(2));return{top:(f.e(2)-g.e(2))-(e.e(2)-h.e(2)),left:(f.e(1)-g.e(1))-(e.e(1)-h.e(1))}}}})(jQuery,this,this.document);(function(e,d,a,f){if(typeof(e.matrix)=="undefined"){e.extend({matrix:{}})}var c=e.matrix,g=c.M2x2,b=c.M3x3;e.extend(c,{identity:function(k){k=k||2;var l=k*k,n=new Array(l),j=k+1;for(var h=0;h<l;h++){n[h]=(h%j)===0?1:0}return new c["M"+k+"x"+k](n)},matrix:function(){var h=Array.prototype.slice.call(arguments);switch(arguments.length){case 4:return new g(h[0],h[2],h[1],h[3]);case 6:return new b(h[0],h[2],h[4],h[1],h[3],h[5],0,0,1)}},reflect:function(){return new g(-1,0,0,-1)},reflectX:function(){return new g(1,0,0,-1)},reflectXY:function(){return new g(0,1,1,0)},reflectY:function(){return new g(-1,0,0,1)},rotate:function(l){var i=e.angle.degreeToRadian(l),k=Math.cos(i),n=Math.sin(i);var j=k,h=n,p=-n,o=k;return new g(j,p,h,o)},scale:function(i,h){i=i||i===0?i:1;h=h||h===0?h:i;return new g(i,0,0,h)},scaleX:function(h){return c.scale(h,1)},scaleY:function(h){return c.scale(1,h)},skew:function(k,i){k=k||0;i=i||0;var l=e.angle.degreeToRadian(k),j=e.angle.degreeToRadian(i),h=Math.tan(l),n=Math.tan(j);return new g(1,h,n,1)},skewX:function(h){return c.skew(h)},skewY:function(h){return c.skew(0,h)},translate:function(i,h){i=i||0;h=h||0;return new b(1,0,i,0,1,h,0,0,1)},translateX:function(h){return c.translate(h)},translateY:function(h){return c.translate(0,h)}})})(jQuery,this,this.document);
function ws_rotate(c,a,b){var f=jQuery;var d=f("ul",b);var g={position:"absolute",left:0,top:0,width:"100%"};var e;this.go=function(h,i){if(e){e.stop(true,true)}e=f(a.get(h)).clone().css(g).hide().appendTo(b);if(!c.noCross){var j=f(a.get(i)).clone().css(g).appendTo(b);d.hide();j.animate({rotate:c.rotateOut||180,scale:c.scaleOut||10,opacity:"hide"},{duration:c.duration,easing:"easeInOutExpo",complete:function(){f(this).remove()}})}e.css({scale:c.scaleIn||10,rotate:-(c.rotateIn||180),zIndex:10});e.animate({opacity:"show",rotate:0,scale:1},{duration:c.duration,easing:"easeInOutExpo",queue:false,complete:function(){d.css({left:-h+"00%"}).show();f(this).remove();e=0}});return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"rotate",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderelegantlinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section5 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/elegant-linear/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.8
 *	template Elegant
 */
@import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 111px;
	z-index:90;
	border:1px solid #3399FF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:6px;
	width:13px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-21px;
	z-index:60;
	height: 32px;
	width: 32px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:5px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:5px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	bottom:-5px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
/* separate */
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	display:block; 
	bottom:25px;
	left:0px;
	margin-right:5px;
	z-index: 50;
	color: #FFFFFF;	
    font-family: "Source Sans Pro",Arial,sans-serif;
	font-size: 25px;
	line-height: 28px;

}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{ 
	display:inline-block; 
	margin-top:10px;
	padding:10px;
	background:#3399FF;
	font-weight: normal;	
	border-radius:0;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	

}
#wowslider-container'.$val.' .ws-title div{ 
	display:block;
	margin-top:10px; 
	font-size: 18px;
	line-height: 21px;
	background:#FFFFFF;	
	color: #3399FF;
}

#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    bottom: -111px;
    left: 0;
	width:100%;
	height:106px;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	height:100%;
	letter-spacing:-4px;
	width:2048px; 
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#3399FF;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	margin:3px;
	text-indent:0;
    border: 1px solid #FFFFFF;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 32s infinite;
	-moz-animation: wsBasic 32s infinite;
	-webkit-animation: wsBasic 32s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.25%{left:-0%} 12.5%{left:-100%} 18.75%{left:-100%} 25%{left:-200%} 31.25%{left:-200%} 37.5%{left:-300%} 43.75%{left:-300%} 50%{left:-400%} 56.25%{left:-400%} 62.5%{left:-500%} 68.75%{left:-500%} 75%{left:-600%} 81.25%{left:-600%} 87.5%{left:-700%} 93.75%{left:-700%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.25%{left:-0%} 12.5%{left:-100%} 18.75%{left:-100%} 25%{left:-200%} 31.25%{left:-200%} 37.5%{left:-300%} 43.75%{left:-300%} 50%{left:-400%} 56.25%{left:-400%} 62.5%{left:-500%} 68.75%{left:-500%} 75%{left:-600%} 81.25%{left:-600%} 87.5%{left:-700%} 93.75%{left:-700%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.25%{left:-0%} 12.5%{left:-100%} 18.75%{left:-100%} 25%{left:-200%} 31.25%{left:-200%} 37.5%{left:-300%} 43.75%{left:-300%} 50%{left:-400%} 56.25%{left:-400%} 62.5%{left:-500%} 68.75%{left:-500%} 75%{left:-600%} 81.25%{left:-600%} 87.5%{left:-700%} 93.75%{left:-700%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 1px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 1px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-8px;
	margin-left:-1px;
	left:120px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section5 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Rio de Janeiro, Brazil</li>
';
$i++;				
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/coast.jpg" alt="Coast" title="Coast" id="wows1_0"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/christtheredeemer.jpg" alt="Christ the Redeemer" title="Christ the Redeemer" id="wows1_1"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/nightlights.jpg" alt="Night lights" title="Night lights" id="wows1_2"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/panorama.jpg" alt="Panorama" title="Panorama" id="wows1_3"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/sunset.jpg" alt="Sunset" title="Sunset" id="wows1_4"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/view.jpg" alt="View of the city" title="View of the city" id="wows1_5"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/waterscape.jpg" alt="Waterscape" title="Waterscape" id="wows1_6"/>Rio de Janeiro, Brazil</li>
<li><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/images/night.jpg" alt="City ​​at night" title="City ​​at night" id="wows1_7"/>Rio de Janeiro, Brazil</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Coast"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/coast.jpg" alt="" /></a>
<a href="#" title="Christ the Redeemer"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/christtheredeemer.jpg" alt="" /></a>
<a href="#" title="Night lights"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/nightlights.jpg" alt="" /></a>
<a href="#" title="Panorama"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/panorama.jpg" alt="" /></a>
<a href="#" title="Sunset"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/sunset.jpg" alt="" /></a>
<a href="#" title="View of the city"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/view.jpg" alt="" /></a>
<a href="#" title="Waterscape"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/waterscape.jpg" alt="" /></a>
<a href="#" title="City ​​at night"><img src="http://www.wowslider.com/images/demo/elegant-linear/data1/tooltips/night.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div>
</div>
<a style="display: none;" href="http://wowslider.com">Diaporama de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/elegant-linear/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic_linear(c,a,b){var d=jQuery;var e=d("<div></div>").css({position:"absolute",display:"none","z-index":2,width:"200%",height:"100%"}).appendTo(b);this.go=function(f,j){e.stop(1,1);var g=(!!((f-j+1)%a.length)^c.revers?"left":"right");d(a[j]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,0);d(a[f]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,"50%").show();e.css({left:"auto",right:"auto",top:0}).css(g,0).show();var h=b.find("ul").hide();var i={};i[g]="-100%";e.animate(i,c.duration,"easeInOutExpo",function(){h.css({left:-f+"00%"}).show();d(this).hide().html("")});return f}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic_linear",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergeometrickenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section6 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/geometric-kenburns/engine1/style.css" -->
	<style>
	/*
 *	generated by WOW Slider 3.8
 *	template Geometric
 */
@import url(http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext,cyrillic);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:1px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:40px;
	height:8px;
	background: none;
	border: 1px solid #FFFFFF;
	float: left; 
	text-indent: -9999px; 
	position:relative;
	margin-left:8px;
	margin-top: 5px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	outline:  1px solid #FFFFFF;
}

#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	z-index:60;
	height: 40px;
	width: 40px;
	background: none;
	border-style: solid;
	border-color: #FFFFFF;
    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    transition: all 0.2s;
}
#wowslider-container'.$val.' a.ws_next{
	border-width: 1px 1px 0 0;
	top:50px;
	right:50px;
}
#wowslider-container'.$val.' a.ws_prev {
	border-width: 0 0 1px 1px;
	right:50px;
	bottom:50px;
}
#wowslider-container'.$val.' a.ws_next:hover{
	border-width: 2px 2px 0 0;
	margin: -5px -5px 0 0;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	border-width: 0 0 2px 2px;
	margin: 0 5px -5px 0;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	bottom:0;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:50px;
	left: 50px;
	margin-right:100px;
	z-index: 50;
	background: none;
    color: #FFFFFF;
	padding: 10px;
	font-size: 18px;
	line-height: 20px;
	font-family: "Open Sans",Arial,sans-serif;
	text-transform: uppercase;
	border: 1px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws-title div{
    margin-top: 10px;
	font-size: 14px;
	line-height: 16px;
	text-transform: none;
}
#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 19.6s infinite;
	-moz-animation: wsBasic 19.6s infinite;
	-webkit-animation: wsBasic 19.6s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10.2%{left:-0%} 14.29%{left:-100%} 24.49%{left:-100%} 28.57%{left:-200%} 38.78%{left:-200%} 42.86%{left:-300%} 53.06%{left:-300%} 57.14%{left:-400%} 67.35%{left:-400%} 71.43%{left:-500%} 81.63%{left:-500%} 85.71%{left:-600%} 95.92%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10.2%{left:-0%} 14.29%{left:-100%} 24.49%{left:-100%} 28.57%{left:-200%} 38.78%{left:-200%} 42.86%{left:-300%} 53.06%{left:-300%} 57.14%{left:-400%} 67.35%{left:-400%} 71.43%{left:-500%} 81.63%{left:-500%} 85.71%{left:-600%} 95.92%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10.2%{left:-0%} 14.29%{left:-100%} 24.49%{left:-100%} 28.57%{left:-200%} 38.78%{left:-200%} 42.86%{left:-300%} 53.06%{left:-300%} 57.14%{left:-400%} 67.35%{left:-400%} 71.43%{left:-500%} 81.63%{left:-500%} 85.71%{left:-600%} 95.92%{left:-600%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 1px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:20px;
	margin-left:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 1px solid #FFFFFF;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section6 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';	
$i++;									
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/architecture.jpg" alt="Japanese architecture" title="Japanese architecture" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/branches.jpg" alt="Branches with flowers" title="Branches with flowers" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/landscape.jpg" alt="Amazing landscape" title="Amazing landscape" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/cherry_blossom.jpg" alt="Cherry blossom" title="Cherry blossom" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/garden.jpg" alt="Japanese garden" title="Japanese garden" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/flower.jpg" alt="Pink flowers" title="Pink flowers" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/images/rock_garden.jpg" alt="The Japanese rock garden" title="The Japanese rock garden" id="wows1_6"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Japanese architecture"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/architecture.jpg" alt="Japanese architecture"/>1</a>
<a href="#" title="Branches with flowers"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/branches.jpg" alt="Branches with flowers"/>2</a>
<a href="#" title="Amazing landscape"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/landscape.jpg" alt="Amazing landscape"/>3</a>
<a href="#" title="Cherry blossom"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/cherry_blossom.jpg" alt="Cherry blossom"/>4</a>
<a href="#" title="Japanese garden"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/garden.jpg" alt="Japanese garden"/>5</a>
<a href="#" title="Pink flowers"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/flower.jpg" alt="Pink flowers"/>6</a>
<a href="#" title="The Japanese rock garden"><img src="http://www.wowslider.com/images/demo/geometric-kenburns/data1/tooltips/rock_garden.jpg" alt="The Japanese rock garden"/>7</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display: none;" href="http://wowslider.com">rotateur bannière</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/geometric-kenburns/engine1/script.js"></script>-->
	
	<script type="text/javascript">
function ws_kenburns(q,k,d){var f=jQuery;var b=document.createElement("canvas").getContext;var p=q.paths||[{from:[0,0,1],to:[0,0,1.2]},{from:[0,0,1.2],to:[0,0,1]},{from:[1,0,1],to:[1,0,1.2]},{from:[0,1,1.2],to:[0,1,1]},{from:[1,1,1],to:[1,1,1.2]},{from:[0.5,1,1],to:[0.5,1,1.3]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[1,0.5,1],to:[1,0.5,1.2]},{from:[0,0.5,1.2],to:[0,0.5,1]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[0.5,0.5,1],to:[0.5,0.5,1.2]},{from:[0.5,0.5,1.3],to:[0.5,0.5,1]},{from:[0.5,1,1],to:[0.5,0,1.15]}];function r(h){return p[h?Math.floor(Math.random()*(b?p.length:Math.min(5,p.length))):0]}function e(w,t){var v,h=0,s=40/t;var x=setInterval(function(){if(h<1){if(!v){v=1;w(h);v=0}h+=s}else{u(1)}},40);function u(y){clearInterval(x);if(y){w(1)}}return{stop:u}}var n=q.width,g=q.height;var j,a;var o,m;function i(){o=f("<div style="width:100%;height:100%"></div>").css({"z-index":8,position:"absolute",left:0,top:0}).appendTo(d)}i();function c(v,s,h){var t={width:100*v[2]+"%"};t[s?"right":"left"]=-100*(v[2]-1)*(s?(1-v[0]):v[0])+"%";t[h?"bottom":"top"]=-100*(v[2]-1)*(h?(1-v[1]):v[1])+"%";if(!b){for(var u in t){if(/\%/.test(t[u])){t[u]=(/right|left|width/.test(u)?n:g)*parseFloat(t[u])/100+"px"}}}return t}function l(t,y,v){if(b){if(a){a.stop(1)}a=j}if(m){m.remove()}m=o;i();if(v){o.hide();m.stop(true,true)}if(b){var s,h;var u,x;u=f("<canvas width="'+n+'" height="'+g+'"/>");u.css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(o);s=u.get(0).getContext("2d");x=u.clone().appendTo(o);h=x.get(0).getContext("2d");j=new e(function(z){var B=[y.from[0]*(1-z)+z*y.to[0],y.from[1]*(1-z)+z*y.to[1],y.from[2]*(1-z)+z*y.to[2]];h.drawImage(t,-n*(B[2]-1)*B[0],-g*(B[2]-1)*B[1],n*B[2],g*B[2]);s.clearRect(0,0,n,g);var A=s;s=h;h=A},q.duration+q.delay*2)}else{var w=f("<img src="'+t.src+'"/>").css({position:"absolute",left:"auto",right:"auto",top:"auto",bottom:"auto"}).appendTo(o).css(c(y.from,y.from[0]>0.5,y.from[1]>0.5)).animate(c(y.to,y.from[0]>0.5,y.from[1]>0.5),{easing:"linear",queue:false,duration:(1.5*q.duration+q.delay)})}if(v){o.fadeIn(q.duration)}}k.each(function(h){f(this).css({visibility:"hidden"});if(h==q.startSlide){l(this,r(0),0)}});this.go=function(h,s){l(k.get(h),r(h),1);return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"kenburns",prev:"",next:"",duration:8*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		/*}elseif ($conf_value == 'wowslidersurfaceblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section7 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/surface-blur/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section7 -->
	<div id="wowslider-container'.$val.'">
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
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/surface-blur/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blur(p,n,c){var h=jQuery;var b=!p.noCanvas&&!window.opera&&!!document.createElement("canvas").getContext;if(b){try{document.createElement("canvas").getContext("2d").getImageData(0,0,1,1)}catch(m){b=0}}var d;function k(q,e,r){q.css({opacity:0,visibility:"visible"});q.animate({opacity:1},e,"linear",r)}function i(q,e,r){q.animate({opacity:0},e,"linear",r)}var l;this.go=function(e,q){if(l){return -1}l=1;var u=h(n.get(q)),s=h(n.get(e));var t;if(b){if(!d){d="<canvas width="'+c.width()+'" height="'+c.height()+'"/>";d=h(d+d).css({"z-index":8,position:"absolute",width:"100%",height:"100%",left:0,top:0,visibility:"hidden"}).appendTo(c)}t=g(u,30,d.get(0))}if(b&&t){var r=g(s,30,d.get(1));k(t,p.duration/3,function(){c.find("ul").css({visibility:"hidden"});i(t,p.duration/6);k(r,p.duration/6,function(){t.css({visibility:"hidden"});c.find("ul").css({left:-e+"00%"}).css({visibility:"visible"});i(r,p.duration/2,function(){l=0})})})}else{b=0;t=g(u,8);t.fadeIn(p.duration/3,"linear",function(){c.find("ul").css({left:-e+"00%"});t.fadeOut(p.duration/3,"linear",function(){t.remove();l=0})})}return e};function g(v,u,q){var A=(parseInt(v.parent().css("z-index"))||0)+1;if(b){var D=q.getContext("2d");D.drawImage(v.get(0),0,0);if(!j(D,0,0,q.width,q.height,u)){return 0}return h(q)}var E=h("<div></div>").css({position:"absolute","z-index":A,left:0,top:0,width:"100%",height:"100%",display:"none"}).appendTo(c);var C=(Math.sqrt(5)+1)/2;var s=1-C/2;for(var t=0;s*t<u;t++){var w=Math.PI*C*t;var e=(s*t+1);var B=e*Math.cos(w);var z=e*Math.sin(w);h(document.createElement("img")).attr("src",v.attr("src")).css({opacity:1/(t/1.8+1),position:"absolute","z-index":A,left:Math.round(B)+"px",top:Math.round(z)+"px",width:"100%",height:"100%"}).appendTo(E)}return E}var o=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];var a=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];function j(ah,P,N,q,r,Y){if(isNaN(Y)||Y<1){return}Y|=0;var ac;try{ac=ah.getImageData(P,N,q,r)}catch(ag){console.log("error:unable to access image data: "+ag);return false}var v=ac.data;var W,V,ae,ab,E,H,B,t,u,M,C,O,K,S,X,F,A,G,I,R;var af=Y+Y+1;var T=q<<2;var D=q-1;var aa=r-1;var z=Y+1;var Z=z*(z+1)/2;var Q=new f();var L=Q;for(ae=1;ae<af;ae++){L=L.next=new f();if(ae==z){var w=L}}L.next=Q;var ad=null;var U=null;B=H=0;var J=o[Y];var s=a[Y];for(V=0;V<r;V++){S=X=F=t=u=M=0;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}for(ae=1;ae<z;ae++){ab=H+((D<ae?D:ae)<<2);t+=(L.r=(A=v[ab]))*(R=z-ae);u+=(L.g=(G=v[ab+1]))*R;M+=(L.b=(I=v[ab+2]))*R;S+=A;X+=G;F+=I;L=L.next}ad=Q;U=w;for(W=0;W<q;W++){v[H]=(t*J)>>s;v[H+1]=(u*J)>>s;v[H+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(B+((ab=W+Y+1)<D?ab:D))<<2;S+=(ad.r=v[ab]);X+=(ad.g=v[ab+1]);F+=(ad.b=v[ab+2]);t+=S;u+=X;M+=F;ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=4}B+=q}for(W=0;W<q;W++){X=F=S=u=M=t=0;H=W<<2;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}E=q;for(ae=1;ae<=Y;ae++){H=(E+W)<<2;t+=(L.r=(A=v[H]))*(R=z-ae);u+=(L.g=(G=v[H+1]))*R;M+=(L.b=(I=v[H+2]))*R;S+=A;X+=G;F+=I;L=L.next;if(ae<aa){E+=q}}H=W;ad=Q;U=w;for(V=0;V<r;V++){ab=H<<2;v[ab]=(t*J)>>s;v[ab+1]=(u*J)>>s;v[ab+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(W+(((ab=V+z)<aa?ab:aa)*q))<<2;t+=(S+=(ad.r=v[ab]));u+=(X+=(ad.g=v[ab+1]));M+=(F+=(ad.b=v[ab+2]));ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=q}}ah.putImageData(ac,P,N);return true}function f(){this.r=0;this.g=0;this.b=0;this.a=0;this.next=null}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blur",prev:"",next:"",duration:17*100,delay:27*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});*/
		}elseif ($conf_value == 'wowslidervernisagestackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section8 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/vernisage-stack-v/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.5
 *	template Vernisage
 */
@import url(http://fonts.googleapis.com/css?family=Economica&subset=latin,latin-ext);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:830px;
	margin:15px 0 15px 150px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:830px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:8px;
	height:8px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:6px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-15px;
	z-index:60;
	height: 28px;
	width: 18px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:7px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:7px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 5%;
	left: 7px;
	margin-right:7px;
	color:#959695;
	z-index: 50;
	font-family: "Economica",Trebuchet MS, Helvetica, sans-serif;
	font-size: 27px;
	line-height: 29px;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	background:#FFFFFF;
	display:inline-block;
	padding:7px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90); 
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	color: #000000;
    font-size: 20px;
	line-height: 22px;	
	font-weight: normal;	
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    left: -161px;
    top: 0;
	width:136px;
	height:100%;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	width:100%;
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#959695;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	text-indent:0;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	margin:3px;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 29.4s infinite;
	-moz-animation: wsBasic 29.4s infinite;
	-webkit-animation: wsBasic 29.4s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }

#wowslider-container'.$val.'  .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-2.41%;
	top:-6.39%;
	width:104.81%;
	height:112.77%;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1//bg.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1//bg.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:52px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:16px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-8px;
	left:60px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section8 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>The Bullfinch is a small passerine bird</li>
';						
$i++;				
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/bullfinch.jpg" alt="Bullfinch" title="Bullfinch" id="wows1_0"/>The Bullfinch is a small passerine bird</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/duck.jpg" alt="Duck" title="Duck" id="wows1_1"/>Ducks may be found in both fresh water and sea water</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/seagull.jpg" alt="Seagull" title="Seagull" id="wows1_2"/>Gulls are typically medium to large birds</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/raven.jpg" alt="Raven" title="Raven" id="wows1_3"/>Raven is a large, all-black passerine bird.</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/robin.jpg" alt="Robin" title="Robin" id="wows1_4"/>Robin is a small insectivorous passerine bird</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/seagulls.jpg" alt="Seagulls" title="Seagulls" id="wows1_5"/>Gulls nest in large, densely packed noisy colonies</li>
<li><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/images/stork.jpg" alt="Stork" title="Stork" id="wows1_6"/>European White Stork</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Bullfinch"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/bullfinch.jpg" alt="" /></a>
<a href="#" title="Duck"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/duck.jpg" alt="" /></a>
<a href="#" title="Seagull"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/seagull.jpg" alt="" /></a>
<a href="#" title="Raven"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/raven.jpg" alt="" /></a>
<a href="#" title="Robin"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/robin.jpg" alt="" /></a>
<a href="#" title="Seagulls"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/seagulls.jpg" alt="" /></a>
<a href="#" title="Stork"><img src="http://www.wowslider.com/images/demo/vernisage-stack-v/data1/tooltips/stork.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">Carrousels dimage CSS</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/vernisage-stack-v/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack_vertical(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=(k-h+1)%c.length;if(Math.abs(m)>=1){g=(m>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?1:-1)+"00%";c.each(function(o){if(g&&o!=h){this.style.zIndex=(Math.max(0,this.style.zIndex-1))}});var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,top:(g?i:l)});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){j.stop(true,true).hide().css({left:-k+"00%"});if(d.fadeOut){j.fadeIn(d.duration)}else{j.show()}}else{if(d.fadeOut){j.fadeOut(d.duration)}}f.animate({top:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"}).stop(true,true).show()}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack_vertical",prev:"",next:"",duration:17*100,delay:25*100,width:830,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';
		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		/*}elseif ($conf_value == 'wowsliderplasticsquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section9 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/plastic-squares/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section9 -->
	<div id="wowslider-container'.$val.'">
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
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/plastic-squares/engine1/script.js"></script>-->
	<script type="text/javascript">
if(!jQuery.fn.coinslider){(function(g){var f=new Array;var d=new Array;var n=new Array;var p=new Array;var e=new Array;var l=new Array;var c=new Array;var h=new Array;var o=new Array;var b=new Array;var m=new Array;var a=new Array;g.fn.coinslider=g.fn.CoinSlider=function(q){init=function(r){d[r.id]=new Array();n[r.id]=new Array();p[r.id]=new Array();e[r.id]=new Array();l[r.id]=new Array();h[r.id]=q.startSlide||0;b[r.id]=0;m[r.id]=1;a[r.id]=r;f[r.id]=g.extend({},g.fn.coinslider.defaults,q);g.each(g("#"+r.id+" img"),function(s,t){n[r.id][s]=t;p[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("href"):"";e[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("target"):"";l[r.id][s]=g(t).next().is("span")?g(t).next().html():""});a[r.id]=g("<div class="coin-slider" id="coin-slider-"+r.id+"" />").css({"background-image":"url("+n[r.id][q.startSlide||0].src+")","-o-background-size":"100%","-webkit-background-size":"100%","-moz-background-size":"100%","background-size":"100%",width:"100%",height:"100%",position:"relative","background-position":"top left"}).appendTo(g(r).parent());for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){g(f[r.id].links?("<a href='"+p[r.id][0]+"'></a>"):"<div></div>").css({"float":"left",position:"absolute"}).appendTo(a[r.id]).attr("id","cs-"+r.id+i+j)}}a[r.id].append("<div class="cs-title" id="cs-title-"+r.id+"" style="position: absolute; bottom:0; left: 0; z-index: 1000;"></div>");if(f[r.id].navigation){g.setNavigation(r)}};g.setFields=function(s){var r=a[s.id].width();var t=a[s.id].height();tWidth=sWidth=parseInt(r/f[s.id].spw);tHeight=sHeight=parseInt(t/f[s.id].sph);counter=sLeft=sTop=0;tgapx=gapx=f[s.id].width-f[s.id].spw*sWidth;tgapy=gapy=f[s.id].height-f[s.id].sph*sHeight;for(i=1;i<=f[s.id].sph;i++){gapx=tgapx;if(gapy>0){gapy--;sHeight=tHeight+1}else{sHeight=tHeight}for(j=1;j<=f[s.id].spw;j++){if(gapx>0){gapx--;sWidth=tWidth+1}else{sWidth=tWidth}d[s.id][counter]=i+""+j;counter++;g("#cs-"+s.id+i+j).css({width:sWidth+"px",height:sHeight+"px","background-position":-sLeft+"px "+(-sTop+"px"),"background-size":r+"px "+t+"px","-moz-background-size":r+"px "+t+"px","-o-background-size":r+"px "+t+"px","-webkit-background-size":r+"px "+t+"px",left:sLeft,top:sTop}).addClass("cs-"+s.id);sLeft+=sWidth}sTop+=sHeight;sLeft=0}g(".cs-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g(".cs-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});g("#cs-title-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g("#cs-title-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});if(f[s.id].hoverPause){g(".cs-"+s.id).mouseover(function(){f[s.id].pause=true});g(".cs-"+s.id).mouseout(function(){f[s.id].pause=false});g("#cs-title-"+s.id).mouseover(function(){f[s.id].pause=true});g("#cs-title-"+s.id).mouseout(function(){f[s.id].pause=false})}};g.transitionCall=function(r){if(f[r.id].delay<0){return}clearInterval(c[r.id]);delay=f[r.id].delay+f[r.id].spw*f[r.id].sph*f[r.id].sDelay;c[r.id]=setInterval(function(){g.transition(r)},delay)};g.transition=function(r,s){if(f[r.id].pause==true){return}g.setFields(r);g.effect(r);b[r.id]=0;o[r.id]=setInterval(function(){g.appereance(r,d[r.id][b[r.id]])},f[r.id].sDelay);g(a[r.id]).css({"background-image":"url("+n[r.id][h[r.id]].src+")"});if(typeof(s)=="undefined"){h[r.id]++}else{if(s=="prev"){h[r.id]--}else{h[r.id]=s}}if(h[r.id]==n[r.id].length){h[r.id]=0}if(h[r.id]==-1){h[r.id]=n[r.id].length-1}g(".cs-button-"+r.id).removeClass("cs-active");g("#cs-button-"+r.id+"-"+(h[r.id]+1)).addClass("cs-active");if(l[r.id][h[r.id]]){g("#cs-title-"+r.id).css({opacity:0}).animate({opacity:f[r.id].opacity},f[r.id].titleSpeed);g("#cs-title-"+r.id).html(l[r.id][h[r.id]])}else{g("#cs-title-"+r.id).css("opacity",0)}};g.appereance=function(s,r){g(".cs-"+s.id).attr("href",p[s.id][h[s.id]]).attr("target",e[s.id][h[s.id]]);if(b[s.id]==f[s.id].spw*f[s.id].sph){clearInterval(o[s.id]);setTimeout(function(){g(s).trigger("cs:animFinished")},300);return}g("#cs-"+s.id+r).css({opacity:0,"background-image":"url("+n[s.id][h[s.id]].src+")"});g("#cs-"+s.id+r).animate({opacity:1},300);b[s.id]++};g.setNavigation=function(r){g(a[r.id]).append("<div id="cs-navigation-"+r.id+""></div>");g("#cs-navigation-"+r.id).hide();g("#cs-navigation-"+r.id).append("<a href="#" id="cs-prev-"+r.id+"" class="cs-prev">prev</a>");g("#cs-navigation-"+r.id).append("<a href="#" id="cs-next-"+r.id+"" class="cs-next">next</a>");g("#cs-prev-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,left:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r,"prev");g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("#cs-next-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,right:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r);g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("<div id="cs-buttons-"+r.id+"" class="cs-buttons"></div>").appendTo(g("#coin-slider-"+r.id));for(k=1;k<n[r.id].length+1;k++){g("#cs-buttons-"+r.id).append("<a href="#" class="cs-button-"+r.id+"" id="cs-button-"+r.id+"-"+k+"">"+k+"</a>")}g.each(g(".cs-button-"+r.id),function(s,t){g(t).click(function(u){g(".cs-button-"+r.id).removeClass("cs-active");g(this).addClass("cs-active");u.preventDefault();g.transition(r,s);g.transitionCall(r)})});g("#cs-navigation-"+r.id+" a").mouseout(function(){g("#cs-navigation-"+r.id).hide();f[r.id].pause=false});g("#cs-buttons-"+r.id).css({left:"50%","margin-left":-n[r.id].length*15/2-5,position:"relative"})};g.effect=function(r){effA=["random","swirl","rain","straight","snakeV","rainV"];if(f[r.id].effect==""){eff=effA[Math.floor(Math.random()*(effA.length))]}else{eff=f[r.id].effect}d[r.id]=new Array();if(eff=="random"){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}g.random(d[r.id])}if(/rain|swirl|straight|snakeV|rainV/.test(eff)){g[eff](r)}m[r.id]*=-1;if(m[r.id]>0){d[r.id].reverse()}};g.random=function(r){var t=r.length;if(t==0){return false}while(--t){var s=Math.floor(Math.random()*(t+1));var v=r[t];var u=r[s];r[t]=u;r[s]=v}};g.swirl=function(r){var t=f[r.id].sph;var u=f[r.id].spw;var B=1;var A=1;var s=0;var v=0;var z=0;var w=true;while(w){v=(s==0||s==2)?u:t;for(i=1;i<=v;i++){d[r.id][z]=B+""+A;z++;if(i!=v){switch(s){case 0:A++;break;case 1:B++;break;case 2:A--;break;case 3:B--;break}}}s=(s+1)%4;switch(s){case 0:u--;A++;break;case 1:t--;B++;break;case 2:u--;A--;break;case 3:t--;B--;break}check=g.max(t,u)-g.min(t,u);if(u<=check&&t<=check){w=false}}};g.rain=function(t){var w=f[t.id].sph;var r=f[t.id].spw;var v=0;var u=to2=from=1;var s=true;while(s){for(i=from;i<=u;i++){d[t.id][v]=i+""+parseInt(to2-i+1);v++}to2++;if(u<w&&to2<r&&w<r){u++}if(u<w&&w>=r){u++}if(to2>r){from++}if(from>u){s=false}}};g.rainV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+r;v++}}};g.snakeV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+(s%2?r:u.spw+1-r);v++}}};g.straight=function(r){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}};g.min=function(s,r){if(s>r){return r}else{return s}};g.max=function(s,r){if(s<r){return r}else{return s}};this.each(function(){init(this)})};g.fn.coinslider.defaults={width:565,height:290,spw:7,sph:5,delay:3000,sDelay:30,opacity:0.7,titleSpeed:500,effect:"",navigation:true,links:true,hoverPause:true}})(jQuery)};// -----------------------------------------------------------------------------------
function ws_squares(c,a,b){var g=jQuery;var e=b.find("ul").get(0);e.id="wowslider_tmp"+Math.round(Math.random()*99999);var h=0;g(e).coinslider({hoverPause:false,startSlide:c.startSlide,navigation:0,delay:-1,width:c.width,height:c.height,sDelay:c.duration/(7*5)});var f=g("#coin-slider-"+e.id).css({position:"absolute",left:0,top:0,"z-index":8});var d=c.startSlide;g(e).bind("cs:animFinished",function(){g(e).css({left:-d+"00%"}).stop(true,true).show();if(h<2){h=0;f.hide()}});this.go=function(i){h++;f.show();d=i;g.transition(e,i);f.css("background","none");if(c.fadeOut){g(e).fadeOut(c.duration)}return i}};// -----------------------------------------------------------------------------------
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"squares",prev:"",next:"",duration:12*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		*/}elseif ($conf_value == 'wowsliderflatslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section10 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/flat-slices/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.4
 *	template Flat
 */
@import url("http://fonts.googleapis.com/css?family=Signika&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:4px solid #F71277;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}#wowslider-container'.$val.' { 
	border-left: 0px;
	border-right: 0px;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:40px;
	height:4px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 40px;
	width: 40px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom right */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	right: 6px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 20px;
	left: 0px;
	margin-right:20px;
	color:#FFFFFF;	
	z-index: 50;
	font-family:"Signika", Tahoma, Geneva, sans-serif;
	font-size: 20px;
	line-height: 22px;
	text-transform: uppercase;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	background:#F71277;
	padding:8px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	font-size: 14px;
	line-height: 16px;
	background:#444444;
	text-transform: none;
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 23.4s infinite;
	-moz-animation: wsBasic 23.4s infinite;
	-webkit-animation: wsBasic 23.4s infinite;
}
@keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 16.67%{left:-100%} 26.07%{left:-100%} 33.33%{left:-200%} 42.74%{left:-200%} 50%{left:-300%} 59.4%{left:-300%} 66.67%{left:-400%} 76.07%{left:-400%} 83.33%{left:-500%} 92.74%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 16.67%{left:-100%} 26.07%{left:-100%} 33.33%{left:-200%} 42.74%{left:-200%} 50%{left:-300%} 59.4%{left:-300%} 66.67%{left:-400%} 76.07%{left:-400%} 83.33%{left:-500%} 92.74%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 16.67%{left:-100%} 26.07%{left:-100%} 33.33%{left:-200%} 42.74%{left:-200%} 50%{left:-300%} 59.4%{left:-300%} 66.67%{left:-400%} 76.07%{left:-400%} 83.33%{left:-500%} 92.74%{left:-500%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-64px;
	visibility:hidden;
	position:absolute;
	box-shadow: 0 3px 6px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.5);
    border: 4px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:48px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:128px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:11px;
	margin-left:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
	box-shadow: 0 3px 6px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.5);
    border: 4px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-6px;
	left:64px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section10 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Amazing nature, Norway</li>
';								
$i++;		
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/fiord.jpg" alt="Fiord" title="Fiord" id="wows1_0"/>Amazing nature, Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/ice.jpg" alt="Ice" title="Ice" id="wows1_1"/>In the mountains of Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/kjeragbolten.jpg" alt="Kjeragbolten" title="Kjeragbolten" id="wows1_2"/>Kjeragbolten is a boulder wedged in a mountain crevasse</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/norway.jpg" alt="Norway" title="Norway" id="wows1_3"/>City in Norway</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/town.jpg" alt="Town" title="Town" id="wows1_4"/>Town by the sea</li>
<li><img src="http://www.wowslider.com/images/demo/flat-slices/data1/images/winter.jpg" alt="Winter" title="Winter" id="wows1_5"/>Snowy landscape</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Fiord"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/fiord.jpg" alt="Fiord"/>1</a>
<a href="#" title="Ice"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/ice.jpg" alt="Ice"/>2</a>
<a href="#" title="Kjeragbolten"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/kjeragbolten.jpg" alt="Kjeragbolten"/>3</a>
<a href="#" title="Norway"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/norway.jpg" alt="Norway"/>4</a>
<a href="#" title="Town"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/town.jpg" alt="Town"/>5</a>
<a href="#" title="Winter"><img src="http://www.wowslider.com/images/demo/flat-slices/data1/tooltips/winter.jpg" alt="Winter"/>6</a>

';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a class="wsl" href="http://wowslider.com">image precedente slideshow</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/flat-slices/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_slices(i,f,g){var c=jQuery;var e=function(p,v){var o=c.extend({},{effect:"random",slices:15,animSpeed:500,pauseTime:3000,startSlide:0,container:null,onEffectEnd:0},v);var r={currentSlide:0,currentImage:"",totalSlides:0,randAnim:"",stop:false};var m=c(p);m.data("wow:vars",r);if(!/absolute|relative/.test(m.css("position"))){m.css("position","relative")}var k=v.container||m;var n=m.children();r.totalSlides=n.length;if(o.startSlide>0){if(o.startSlide>=r.totalSlides){o.startSlide=r.totalSlides-1}r.currentSlide=o.startSlide}if(c(n[r.currentSlide]).is("img")){r.currentImage=c(n[r.currentSlide])}else{r.currentImage=c(n[r.currentSlide]).find("img:first")}if(c(n[r.currentSlide]).is("a")){c(n[r.currentSlide]).css("display","block")}for(var q=0;q<o.slices;q++){var u=Math.round(k.width()/o.slices);var t=c("<div class="wow-slice"></div>").css({left:u*q+"px",overflow:"hidden",width:((q==o.slices-1)?(k.width()-(u*q)):u)+"px",position:"absolute"}).appendTo(k);c("<img>").css({position:"absolute",left:0,top:0}).appendTo(t)}var l=0;this.sliderRun=function(w,x){if(r.busy){return false}o.effect=x||o.effect;r.currentSlide=w-1;s(m,n,o,false);return true};var j=function(){if(o.onEffectEnd){o.onEffectEnd(r.currentSlide)}k.hide();r.busy=0};var s=function(w,x,z,B){var C=w.data("wow:vars");if((!C||C.stop)&&!B){return false}C.busy=1;C.currentSlide++;if(C.currentSlide==C.totalSlides){C.currentSlide=0}if(C.currentSlide<0){C.currentSlide=(C.totalSlides-1)}C.currentImage=c(x[C.currentSlide]);if(!C.currentImage.is("img")){C.currentImage=C.currentImage.find("img:first")}c(".wow-slice",k).each(function(H){var J=c(this),G=c("img",J);var I=Math.round(k.width()/z.slices);G.width(k.width());G.attr("src",C.currentImage.attr("src"));G.css({left:-I*H+"px"});J.css({height:"0px",opacity:"0",left:I*H+"px",width:((H==z.slices-1)?(k.width()-(I*H)):I)+"px"})});k.show();if(z.effect=="random"){var D=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDownRight","sliceUpDownLeft","fold","fade");C.randAnim=D[Math.floor(Math.random()*(D.length+1))];if(C.randAnim==undefined){C.randAnim="fade"}}if(z.effect.indexOf(",")!=-1){var D=z.effect.split(",");C.randAnim=c.trim(D[Math.floor(Math.random()*D.length)])}if(z.effect=="sliceDown"||z.effect=="sliceDownRight"||C.randAnim=="sliceDownRight"||z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:0,bottom:""});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUp"||z.effect=="sliceUpRight"||C.randAnim=="sliceUpRight"||z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:"",bottom:0});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUpDown"||z.effect=="sliceUpDownRight"||C.randAnim=="sliceUpDownRight"||z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){var y=0;var A=0;var E=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);if(A==0){G.css({top:0,bottom:""});A++}else{G.css({top:"",bottom:0});A=0}if(E==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;E++})}else{if(z.effect=="fold"||C.randAnim=="fold"){var y=0;var A=0;c(".wow-slice",k).each(function(){var G=c(this);var H=G.width();G.css({top:"0px",height:"100%",width:"0px"});if(A==z.slices-1){setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="fade"||C.randAnim=="fade"){var A=0;c(".wow-slice",k).each(function(){c(this).css("height","100%");if(A==z.slices-1){c(this).animate({opacity:"1.0"},(z.animSpeed*2),j)}else{c(this).animate({opacity:"1.0"},(z.animSpeed*2))}A++})}}}}}}};c.fn._reverse=[].reverse;var a=c("li",g);var d=c("ul",g);var b=c("<div></div>").css({left:0,top:0,"z-index":8,width:"100%",height:"100%",position:"absolute"}).appendTo(g);var h=new e(d,{keyboardNav:false,caption:0,effect:"sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpLeft,sliceUpDownRight,sliceUpDownLeft,sliceUpDownRight,sliceUpDownLeft,fold,fold,fold",animSpeed:i.duration,startSlide:i.startSlide,container:b,onEffectEnd:function(j){d.css({left:-j+"00%"}).stop(true,true).show()}});this.go=function(k,j){var l=h.sliderRun(k);if(l){if(i.fadeOut){d.fadeOut(i.duration)}return k}else{return -1}}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"slices",prev:"",next:"",duration:17*100,delay:22*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"move",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderstudiofade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section11 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/studio-fade/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 3.2
 *	template Studio
 */
@import url("http://fonts.googleapis.com/css?family=Simonetta&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:9px auto 129px;
	z-index:90;
	border:9px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:5px;
	width:20px;
	height:19px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%; 
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-28px;
	z-index:60;
	height: 60px;
	width: 34px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	opacity: 0.8; 
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
	opacity: 1; 
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
	opacity: 1; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	bottom:-45px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
/* default */
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:0;
	left: 0;
	z-index: 50;
	padding:10px 1%;
	color: #FFFFFF;
	text-transform:none; 
	background:#000000;
    font-family: "Simonetta",Comic Sans MS,cursive;
	font-size: 24px;
	line-height: 26px;
	text-align: center; 
	font-weight: normal;
	width: 98%; 
	border-radius:0;
	opacity:0.5;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);	
	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 15px;
	line-height: 17px;
	text-transform:none; 
}
#wowslider-container'.$val.':hover .ws-title {
	opacity:0.8;
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    bottom: -120px;
    left: 0;
	width:100%;
	height:106px;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	height:100%;
	letter-spacing:-4px;
	width:1328px; 
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	opacity: 1;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	margin:3px;
	text-indent:0;
	border:4px solid #FFFFFF;
	box-shadow: 0 1px 1px #FFFFFF inset, 0 1px 3px rgba(0, 0, 0, 0.4); 
	max-width:none;
	opacity: 0.5;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 35.2s infinite;
	-moz-animation: wsBasic 35.2s infinite;
	-webkit-animation: wsBasic 35.2s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.82%{left:-0%} 12.5%{left:-100%} 19.32%{left:-100%} 25%{left:-200%} 31.82%{left:-200%} 37.5%{left:-300%} 44.32%{left:-300%} 50%{left:-400%} 56.82%{left:-400%} 62.5%{left:-500%} 69.32%{left:-500%} 75%{left:-600%} 81.82%{left:-600%} 87.5%{left:-700%} 94.32%{left:-700%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.82%{left:-0%} 12.5%{left:-100%} 19.32%{left:-100%} 25%{left:-200%} 31.82%{left:-200%} 37.5%{left:-300%} 44.32%{left:-300%} 50%{left:-400%} 56.82%{left:-400%} 62.5%{left:-500%} 69.32%{left:-500%} 75%{left:-600%} 81.82%{left:-600%} 87.5%{left:-700%} 94.32%{left:-700%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.82%{left:-0%} 12.5%{left:-100%} 19.32%{left:-100%} 25%{left:-200%} 31.82%{left:-200%} 37.5%{left:-300%} 44.32%{left:-300%} 50%{left:-400%} 56.82%{left:-400%} 62.5%{left:-500%} 69.32%{left:-500%} 75%{left:-600%} 81.82%{left:-600%} 87.5%{left:-700%} 94.32%{left:-700%} }

#wowslider-container'.$val.' {
	box-shadow: 0 1px 1px #FFFFFF inset, 0 1px 3px rgba(0, 0, 0, 0.4); 
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:16px;
	left:-75px;
	visibility:hidden;
	position:absolute;
    border: 5px solid #ffffff;
	-moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000; 
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:150px;
	background-color:#ffffff;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:24px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 5px solid #ffffff;
	-moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000; 
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-3px;
	left:75px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section11 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
					//var_dump($count);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>';
								$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/bay.jpg" alt="Boats in the bay" title="Boats in the bay" id="wows1_0"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/ocean.jpg" alt="Palms and ocean" title="Palms and ocean" id="wows1_1"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sun.jpg" alt="Amazing sunset" title="Amazing sunset" id="wows1_2"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/shore.jpg" alt="Sandy shore by the ocean" title="Sandy shore by the ocean" id="wows1_3"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sea.jpg" alt="Pier and sea" title="Pier and sea" id="wows1_4"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/spray.jpg" alt="Ocean spray" title="Ocean spray" id="wows1_5"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/sunset.jpg" alt="Coast at sunset" title="Coast at sunset" id="wows1_6"/></li>
										<li><img src="http://www.wowslider.com/images/demo/studio-fade/data1/images/palms.jpg" alt="Palms and blue sky" title="Palms and blue sky" id="wows1_7"/></li>
							
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Boats in the bay"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/bay.jpg" alt="" /></a>
<a href="#" title="Palms and ocean"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/ocean.jpg" alt="" /></a>
<a href="#" title="Amazing sunset"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sun.jpg" alt="" /></a>
<a href="#" title="Sandy shore by the ocean"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/shore.jpg" alt="" /></a>
<a href="#" title="Pier and sea"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sea.jpg" alt="" /></a>
<a href="#" title="Ocean spray"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/spray.jpg" alt="" /></a>
<a href="#" title="Coast at sunset"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/sunset.jpg" alt="" /></a>
<a href="#" title="Palms and blue sky"><img src="http://www.wowslider.com/images/demo/studio-fade/data1/tooltips/palms.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">jQuery diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/studio-fade/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_fade(c,a,b){var e=jQuery;var d=e("ul",b);var f={position:"absolute",left:0,top:0,width:"100%",height:"100%"};this.go=function(g,h){var i=e(a.get(g)).clone().css(f).hide().appendTo(b);if(!c.noCross){var j=e(a.get(h)).clone().css(f).appendTo(b);d.hide();j.fadeOut(c.duration,function(){j.remove()})}i.fadeIn(c.duration,function(){d.css({left:-g+"00%"}).show();i.remove()});return g}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"fade",prev:"",next:"",duration:20*100,delay:24*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpushstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section12 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/push-stack/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 3.2
 *	template Push
 */
@import url("http://fonts.googleapis.com/css?family=Inder&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:8px auto 8px;
	z-index:90;
	border:8px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:40px;
	height:20px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 50px;
	width: 50px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 0px;
	left: 0px; 
	margin:35px 15px;
	padding:8px;
	background:#FFFFFF;
	color:#777777;
	z-index: 50;
	font-family:"Inder", Tahoma, Geneva, sans-serif;
	font-size: 20px;
	line-height: 21px;
	text-transform: uppercase;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
	box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
}
#wowslider-container'.$val.' .ws-title div{
    margin-top: 10px;
	font-size: 14px;
	line-height: 15px;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 28.7s infinite;
	-moz-animation: wsBasic 28.7s infinite;
	-webkit-animation: wsBasic 28.7s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.71%{left:-0%} 14.29%{left:-100%} 23%{left:-100%} 28.57%{left:-200%} 37.28%{left:-200%} 42.86%{left:-300%} 51.57%{left:-300%} 57.14%{left:-400%} 65.85%{left:-400%} 71.43%{left:-500%} 80.14%{left:-500%} 85.71%{left:-600%} 94.43%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.71%{left:-0%} 14.29%{left:-100%} 23%{left:-100%} 28.57%{left:-200%} 37.28%{left:-200%} 42.86%{left:-300%} 51.57%{left:-300%} 57.14%{left:-400%} 65.85%{left:-400%} 71.43%{left:-500%} 80.14%{left:-500%} 85.71%{left:-600%} 94.43%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.71%{left:-0%} 14.29%{left:-100%} 23%{left:-100%} 28.57%{left:-200%} 37.28%{left:-200%} 42.86%{left:-300%} 51.57%{left:-300%} 57.14%{left:-400%} 65.85%{left:-400%} 71.43%{left:-500%} 80.14%{left:-500%} 85.71%{left:-600%} 94.43%{left:-600%} }

#wowslider-container'.$val.' {
	box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
	box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
    border: 4px solid #FFFFFF;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:24px;
	margin-left:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
	box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 3px 2px rgba(0, 0, 0, 0.5);
    border: 4px solid #FFFFFF;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-6px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section12 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/mountains.jpg" alt="Mountains" title="Mountains" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/alps_range_france.jpg" alt="Alps range" title="Alps range" id="wows1_1"/>France</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/elbrus_mountain_russia.jpg" alt="Elbrus mountain" title="Elbrus mountain" id="wows1_2"/>Russia</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/everest_nepal.jpg" alt="Peak of Everest" title="Peak of Everest" id="wows1_3"/>Nepal</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/snow_on_the_top.jpg" alt="Snow on the top of a mountain" title="Snow on the top of a mountain" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/the_peak_of_mountain_lhotse_nepal.jpg" alt="The peak of mountain Lhotse" title="The peak of mountain Lhotse" id="wows1_5"/>Nepal</li>
<li><img src="http://www.wowslider.com/images/demo/push-stack/data1/images/trees.jpg" alt="Trees" title="Trees" id="wows1_6"/>Trees in the mountains</li>
						';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Mountains"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/mountains.jpg" alt="Mountains"/>1</a>
<a href="#" title="Alps range"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/alps_range_france.jpg" alt="Alps range"/>2</a>
<a href="#" title="Elbrus mountain"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/elbrus_mountain_russia.jpg" alt="Elbrus mountain"/>3</a>
<a href="#" title="Peak of Everest"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/everest_nepal.jpg" alt="Peak of Everest"/>4</a>
<a href="#" title="Snow on the top of a mountain"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/snow_on_the_top.jpg" alt="Snow on the top of a mountain"/>5</a>
<a href="#" title="The peak of mountain Lhotse"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/the_peak_of_mountain_lhotse_nepal.jpg" alt="The peak of mountain Lhotse"/>6</a>
<a href="#" title="Trees"><img src="http://www.wowslider.com/images/demo/push-stack/data1/tooltips/trees.jpg" alt="Trees"/>7</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display:none" href="http://wowslider.com">Galerie de photos CSS</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/push-stack/engine1/script.js"></script>-->
	
	<script type="text/javascript">
function ws_stack(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=c.length>2?(k-h+1)%c.length:1;if(Math.abs(n)>=1){g=(n>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?-1:1)+"00%";var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,left:((g?i:l))});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){j.hide().css({left:-k+"00%"});if(d.fadeOut){j.stop(true,true).fadeIn(d.duration)}else{j.show()}}else{if(d.fadeOut){j.fadeOut(d.duration)}}f.animate({left:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"}).stop(true,true).show()}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack",prev:"",next:"",duration:16*100,delay:25*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderbalanceblast'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section13 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/balance-blast/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.0
 *	template Balance
 */
@import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:830px;
	margin:0 0 20px 5px;
	z-index:90;
	border:2px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:830px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:4px;
	width:9px;
	height:9px;
	background: url(./bullet.png) left 50% no-repeat;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: right 50%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-28px;
	z-index:60;
	height: 48px;
	width: 48px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:5px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:5px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.' .ws_bullets {
	top:0;
    right: 0;
}

/* separate */
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	display:block; 
	bottom:25px;
	left:25px;
	margin-right:25px;
	z-index: 50;
	color: #6E7476;	
    font-family: "Source Sans Pro",Arial,sans-serif;
	font-size: 30px;
	line-height: 30px;

}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{ 
	display:inline-block; 
	margin-top:10px;
	padding:10px;
	background:#FFFFFF;
	font-weight: normal;	
	border-radius:0;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	

}
#wowslider-container'.$val.' .ws-title div{ 
	display:block;
	margin-top:10px; 
	font-size: 25px;
	background:#6cbe42;	
	color: #FFFFFF;
}

#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    right: -141px;
    top: 0;
	width:136px;
	height:100%;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	width:100%;
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#6cbe42;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	margin:3px;
	text-indent:0;
    border: 5px solid #FFFFFF;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 26.6s infinite;
	-moz-animation: wsBasic 26.6s infinite;
	-webkit-animation: wsBasic 26.6s infinite;
}
@keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 14.29%{left:-100%} 23.68%{left:-100%} 28.57%{left:-200%} 37.97%{left:-200%} 42.86%{left:-300%} 52.26%{left:-300%} 57.14%{left:-400%} 66.54%{left:-400%} 71.43%{left:-500%} 80.83%{left:-500%} 85.71%{left:-600%} 95.11%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 14.29%{left:-100%} 23.68%{left:-100%} 28.57%{left:-200%} 37.97%{left:-200%} 42.86%{left:-300%} 52.26%{left:-300%} 57.14%{left:-400%} 66.54%{left:-400%} 71.43%{left:-500%} 80.83%{left:-500%} 85.71%{left:-600%} 95.11%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 9.4%{left:-0%} 14.29%{left:-100%} 23.68%{left:-100%} 28.57%{left:-200%} 37.97%{left:-200%} 42.86%{left:-300%} 52.26%{left:-300%} 57.14%{left:-400%} 66.54%{left:-400%} 71.43%{left:-500%} 80.83%{left:-500%} 85.71%{left:-600%} 95.11%{left:-600%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:16px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#DEDEDE;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-7px;
	left:60px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section13 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>The dahlia was declared the national flower of Mexico in 1963.</li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/dahlia.jpg" alt="Dahlia" title="Dahlia" id="wows1_0"/>The dahlia was declared the national flower of Mexico in 1963.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/daisy.jpg" alt="European Michaelmas Daisy" title="European Michaelmas Daisy" id="wows1_1"/>The genus name (Aster) comes from the Greek and means "star-shaped flower."</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/flower.jpg" alt="Yellow flower" title="Yellow flower" id="wows1_2"/>Yellow petals and green leafs</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/lily.jpg" alt="Lily" title="Lily" id="wows1_3"/>White lily is native to the Balkans and West Asia.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/chrysanthemums.jpg" alt="Chrysanthemums" title="Chrysanthemums" id="wows1_4"/>The name "chrysanthemum" is derived from the Greek words, chrysos (gold) and anthemon (flower).</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/marigold.jpg" alt="Marigold" title="Marigold" id="wows1_5"/>The genus is native to North and South America, but some species have become naturalized around the world.</li>
<li><img src="http://www.wowslider.com/images/demo/balance-blast/data1/images/yellow.jpg" alt="Flower" title="Flower" id="wows1_6"/>Pretty yellow flower</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Dahlia"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/dahlia.jpg" alt="" /></a>
<a href="#" title="European Michaelmas Daisy"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/daisy.jpg" alt="" /></a>
<a href="#" title="Yellow flower"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/flower.jpg" alt="" /></a>
<a href="#" title="Lily"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/lily.jpg" alt="" /></a>
<a href="#" title="Chrysanthemums"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/chrysanthemums.jpg" alt="" /></a>
<a href="#" title="Marigold"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/marigold.jpg" alt="" /></a>
<a href="#" title="Flower"><img src="http://www.wowslider.com/images/demo/balance-blast/data1/tooltips/yellow.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">Diaporama dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/balance-blast/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blast(l,e,h){var d=jQuery;var a=l.distance||1;h=h.parent();var f=d("<div>").addClass("ws_effect");h.css({overflow:"visible"}).append(f);f.css({position:"absolute",left:0,top:0,width:"100%",height:"100%","z-index":8});var c=l.cols;var k=l.rows;var g=[];var b=[];function i(){var p=Math.max((l.width||f.width())/(l.height||f.height())||3,3);c=c||Math.round(p<1?3:3*p);k=k||Math.round(p<1?3/p:3);for(var n=0;n<c*k;n++){var o=n%c;var m=Math.floor(n/c);d([b[n]=document.createElement("div"),g[n]=document.createElement("div")]).css({position:"absolute",overflow:"hidden"}).appendTo(f).append(d("<img>").css({position:"absolute"}))}g=d(g);b=d(b);j(g);j(b,true)}function j(r,p,m){var q=f.width();var o=f.height();var n={left:d(window).scrollLeft(),top:d(window).scrollTop(),width:d(window).width(),height:d(window).height()};d(r).each(function(x){var w=x%c;var u=Math.floor(x/c);if(p){var A=a*q*(2*Math.random()-1)+q/2;var y=a*o*(2*Math.random()-1)+o/2;var z=f.offset();z.left+=A;z.top+=y;if(z.left<n.left){A-=z.left+n.left}if(z.top<n.top){y-=z.top+n.top}var v=(n.left+n.width)-z.left-q/c;if(0>v){A+=v}var t=(n.top+n.height)-z.top-o/k;if(0>t){y+=t}}else{var A=q*w/c;var y=o*u/k}d(this).find("img").css({left:-(q*w/c)+"px",top:-(o*u/k)+"px",width:q+"px",height:o+"px"});var s={left:A+"px",top:y+"px",width:q/c+"px",height:o/k+"px"};if(m){d(this).animate(s,{queue:false,duration:l.duration})}else{d(this).css(s)}})}this.go=function(m,p){if(!g.length){i()}f.show();d(g).stop(1).css({opacity:1,"z-index":3}).find("img").attr("src",e.get(p).src);d(b).stop(1).css({opacity:0,"z-index":2}).find("img").attr("src",e.get(m).src);var o=h.find("ul");if(l.fadeOut){o.fadeOut(l.duration)}j(b,false,true);d(b).animate({opacity:1},{queue:false,easing:"easeInOutExpo",duration:l.duration});j(g,true,true);d(g).animate({opacity:0},{queue:false,easing:"easeInOutExpo",duration:l.duration,complete:function(){o.css({left:-m+"00%"}).stop(true,true).show();f.hide()}});var n=b;b=g;g=n;return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blast",prev:"",next:"",duration:13*100,delay:25*100,width:830,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercloudfly'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section14 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/cloud-fly/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.0
 *	template Cloud
 */
@import url(http://fonts.googleapis.com/css?family=Donegal+One&subset=latin,latin-ext);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:5px;
	width:13px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-15px;
	z-index:60;
	height: 22px;
	width: 18px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:15px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:15px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block} /* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom:-2px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	bottom: 20px;
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:25px;
	left: 18px;
	margin-right:18px;
	z-index: 50;
	padding:5px;
	color: #FFFFFF;
	text-shadow: -1px -1px 0 #000000;
	background:#555555;
    font-family: "Donegal One",Georgia, serif;
	font-size: 20px;
	line-height: 21px;
	opacity:0.6;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;	
	box-shadow: 0 1px 1px rgba(225, 225, 225, 0.3) inset, 0 1px 3px rgba(0, 0, 0, 0.8);
	-webkit-box-shadow:0 1px 1px rgba(225, 225, 225, 0.3) inset, 0 1px 3px rgba(0, 0, 0, 0.8);
	-moz-border-radius:0 1px 1px rgba(225, 225, 225, 0.3) inset, 0 1px 3px rgba(0, 0, 0, 0.8);
	
}
#wowslider-container'.$val.' .ws-title div{
	margin-top:5px;
	font-size: 16px;
	font-weight: normal;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 22.2s infinite;
	-moz-animation: wsBasic 22.2s infinite;
	-webkit-animation: wsBasic 22.2s infinite;
}
@keyframes wsBasic{0%{left:-0%} 9.01%{left:-0%} 16.67%{left:-100%} 25.68%{left:-100%} 33.33%{left:-200%} 42.34%{left:-200%} 50%{left:-300%} 59.01%{left:-300%} 66.67%{left:-400%} 75.68%{left:-400%} 83.33%{left:-500%} 92.34%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 9.01%{left:-0%} 16.67%{left:-100%} 25.68%{left:-100%} 33.33%{left:-200%} 42.34%{left:-200%} 50%{left:-300%} 59.01%{left:-300%} 66.67%{left:-400%} 75.68%{left:-400%} 83.33%{left:-500%} 92.34%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 9.01%{left:-0%} 16.67%{left:-100%} 25.68%{left:-100%} 33.33%{left:-200%} 42.34%{left:-200%} 50%{left:-300%} 59.01%{left:-300%} 66.67%{left:-400%} 75.68%{left:-400%} 83.33%{left:-500%} 92.34%{left:-500%} }

#wowslider-container'.$val.' .ws_images {
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
#wowslider-container'.$val.' .ws_effect img{
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
#wowslider-container'.$val.' .ws_frame{
	display:block;
	position: absolute;
	left:0;
	top:0;
	bottom:0;
	right:0;
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	box-shadow:0 0 15px rgba(0, 0, 0, 0.7) inset;
	-webkit-box-shadow:0 0 15px rgba(0, 0, 0, 0.7) inset;
	-moz-border-radius:0 0 15px rgba(0, 0, 0, 0.7) inset;
	z-index:9;
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000;
    border: 3px solid #818285;
	max-width:none;
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#818285;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000;
    border: 3px solid #818285;
	border-radius:5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-9px;
	margin-left:-5px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section14 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/alder.jpg" alt="Alder branches" title="Alder branches" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/ashberry.jpg" alt="Frozen rowan berries" title="Frozen rowan berries" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/autumn.jpg" alt="Bright autumn leaves" title="Bright autumn leaves" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/branch.jpg" alt="Branch and rowan leaf" title="Branch and rowan leaf" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/leaf.jpg" alt="Autumn leaf in the water" title="Autumn leaf in the water" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/images/leaves.jpg" alt="Maple leafs" title="Maple leafs" id="wows1_5"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;
}	
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Alder branches"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/alder.jpg" alt="Alder branches"/>1</a>
<a href="#" title="Frozen rowan berries"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/ashberry.jpg" alt="Frozen rowan berries"/>2</a>
<a href="#" title="Bright autumn leaves"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/autumn.jpg" alt="Bright autumn leaves"/>3</a>
<a href="#" title="Branch and rowan leaf"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/branch.jpg" alt="Branch and rowan leaf"/>4</a>
<a href="#" title="Autumn leaf in the water"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/leaf.jpg" alt="Autumn leaf in the water"/>5</a>
<a href="#" title="Maple leafs"><img src="http://www.wowslider.com/images/demo/cloud-fly/data1/tooltips/leaves.jpg" alt="Maple leafs"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">Diaporama pour photo</a>
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/cloud-fly/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_fly(c,a,b){var d=jQuery;var f={position:"absolute",left:0,top:0,width:"100%",height:"100%"};var e=d("<div>").addClass("ws_effect").css(f).css({overflow:"visible"}).appendTo(b.parent());this.go=function(m,j,p){var i=!!c.revers;if(p){if(p>=1){i=1}if(p<=-1){i=0}}var h=-(c.distance||e.width()/4),k=Math.min(-h,Math.max(0,d(window).width()-e.offset().left-e.width())),g=(i?k:h),n=(i?h:k);var o=d(a.get(j)).clone().css(f).css({"z-index":1}).appendTo(e);var l=d(a.get(m)).clone().css(f).css({opacity:0,left:g,"z-index":3}).appendTo(e).show();l.animate({opacity:1},{duration:c.duration,queue:false});l.animate({left:0},{duration:2*c.duration/3,queue:false});setTimeout(function(){var q=b.find("ul").hide();o.animate({left:n,opacity:0},2*c.duration/3,function(){o.remove();q.css({left:-m+"00%"}).show();l.remove()})},c.duration/3);return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"fly",prev:"",next:"",duration:17*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"fade",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdriverotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section15 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/drive-rotate/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.0
 *	template Drive
 */
@import url("http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:6px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' { 
	border-left: 0px;
	border-right: 0px;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:22px;
	height:20px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -1000px; 
	position:relative;
	margin-left:0;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	bottom:0;
	margin-top:-15px;
	z-index:60;
	height: 30px;
	width: 30px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:1px;
}
#wowslider-container'.$val.' a.ws_prev {
	right:32px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 35px;
	left: 20px;
	margin-right:5px;
	padding:7px;
	background:none;
	color:#FFFFFF;
	z-index: 50;
	font-family:"Oswald", Impact, Charcoal, sans-serif;	
	font-size: 35px;
	line-height: 42px;
	font-weight: normal;
	text-transform: uppercase;
	text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
	border-radius:0;
	opacity:1;
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 16px;
	line-height: 18px;
}
#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 24s infinite;
	-moz-animation: wsBasic 24s infinite;
	-webkit-animation: wsBasic 24s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:16px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #5b5c61;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#5b5c61;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:21px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid #5b5c61;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-9px;
	margin-left:1px;
	left:120px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section15 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Forest lake</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/forest.jpg" alt="Nature" title="Nature" id="wows1_0"/>Forest lake</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/nature.jpg" alt="Wonderful nature" title="Wonderful nature" id="wows1_1"/>Several trees near the water</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/stream.jpg" alt="Water stream" title="Water stream" id="wows1_2"/>Water stream flows through the forest</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/lake.jpg" alt="Shore of the lake" title="Shore of the lake" id="wows1_3"/>Return to nature</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/twilight.jpg" alt="Twilight" title="Twilight" id="wows1_4"/>Twilight on the lake</li>
<li><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/images/water.jpg" alt="Shore" title="Shore" id="wows1_5"/>Near the water</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Nature"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/forest.jpg" alt="Nature"/>1</a>
<a href="#" title="Wonderful nature"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/nature.jpg" alt="Wonderful nature"/>2</a>
<a href="#" title="Water stream"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/stream.jpg" alt="Water stream"/>3</a>
<a href="#" title="Shore of the lake"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/lake.jpg" alt="Shore of the lake"/>4</a>
<a href="#" title="Twilight"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/twilight.jpg" alt="Twilight"/>5</a>
<a href="#" title="Shore"><img src="http://www.wowslider.com/images/demo/drive-rotate/data1/tooltips/water.jpg" alt="Shore"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display:none" href="http://wowslider.com">Galerie dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/drive-rotate/engine1/script.js"></script>-->
	<script type="text/javascript">
(function(f,g,j,b){var h=/progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,c=/^([\+\-]=)?([\d+.\-]+)(.*)$/,q=/%/;var d=j.createElement("modernizr"),e=d.style;function n(s){return parseFloat(s)}function l(){var s={transformProperty:"",MozTransform:"-moz-",WebkitTransform:"-webkit-",OTransform:"-o-",msTransform:"-ms-"};for(var t in s){if(typeof e[t]!="undefined"){return s[t]}}return null}function r(){if(typeof(g.Modernizr)!=="undefined"){return Modernizr.csstransforms}var t=["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"];for(var s in t){if(e[t[s]]!==b){return true}}}var a=l(),i=a!==null?a+"transform":false,k=a!==null?a+"transform-origin":false;f.support.csstransforms=r();if(a=="-ms-"){i="msTransform";k="msTransformOrigin"}f.extend({transform:function(s){s.transform=this;this.$elem=f(s);this.applyingMatrix=false;this.matrix=null;this.height=null;this.width=null;this.outerHeight=null;this.outerWidth=null;this.boxSizingValue=null;this.boxSizingProperty=null;this.attr=null;this.transformProperty=i;this.transformOriginProperty=k}});f.extend(f.transform,{funcs:["matrix","origin","reflect","reflectX","reflectXY","reflectY","rotate","scale","scaleX","scaleY","skew","skewX","skewY","translate","translateX","translateY"]});f.fn.transform=function(s,t){return this.each(function(){var u=this.transform||new f.transform(this);if(s){u.exec(s,t)}})};f.transform.prototype={exec:function(s,t){t=f.extend(true,{forceMatrix:false,preserve:false},t);this.attr=null;if(t.preserve){s=f.extend(true,this.getAttrs(true,true),s)}else{s=f.extend(true,{},s)}this.setAttrs(s);if(f.support.csstransforms&&!t.forceMatrix){return this.execFuncs(s)}else{if(f.browser.msie||(f.support.csstransforms&&t.forceMatrix)){return this.execMatrix(s)}}return false},execFuncs:function(t){var s=[];for(var u in t){if(u=="origin"){this[u].apply(this,f.isArray(t[u])?t[u]:[t[u]])}else{if(f.inArray(u,f.transform.funcs)!==-1){s.push(this.createTransformFunc(u,t[u]))}}}this.$elem.css(i,s.join(" "));return true},execMatrix:function(z){var C,x,t;var F=this.$elem[0],B=this;function A(N,M){if(q.test(N)){return parseFloat(N)/100*B["safeOuter"+(M?"Height":"Width")]()}return o(F,N)}var s=/translate[X|Y]?/,u=[];for(var v in z){switch(f.type(z[v])){case"array":t=z[v];break;case"string":t=f.map(z[v].split(","),f.trim);break;default:t=[z[v]]}if(f.matrix[v]){if(f.cssAngle[v]){t=f.map(t,f.angle.toDegree)}else{if(!f.cssNumber[v]){t=f.map(t,A)}else{t=f.map(t,n)}}x=f.matrix[v].apply(this,t);if(s.test(v)){u.push(x)}else{C=C?C.x(x):x}}else{if(v=="origin"){this[v].apply(this,t)}}}C=C||f.matrix.identity();f.each(u,function(M,N){C=C.x(N)});var K=parseFloat(C.e(1,1).toFixed(6)),I=parseFloat(C.e(2,1).toFixed(6)),H=parseFloat(C.e(1,2).toFixed(6)),G=parseFloat(C.e(2,2).toFixed(6)),L=C.rows===3?parseFloat(C.e(1,3).toFixed(6)):0,J=C.rows===3?parseFloat(C.e(2,3).toFixed(6)):0;if(f.support.csstransforms&&a==="-moz-"){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+"px, "+J+"px)")}else{if(f.support.csstransforms){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+", "+J+")")}else{if(f.browser.msie){var w=", FilterType="nearest neighbor"";var D=this.$elem[0].style;var E="progid:DXImageTransform.Microsoft.Matrix(M11="+K+", M12="+H+", M21="+I+", M22="+G+", sizingMethod="auto expand""+w+")";var y=D.filter||f.css(this.$elem[0],"filter")||"";D.filter=h.test(y)?y.replace(h,E):y?y+" "+E:E;this.applyingMatrix=true;this.matrix=C;this.fixPosition(C,L,J);this.applyingMatrix=false;this.matrix=null}}}return true},origin:function(s,t){if(f.support.csstransforms){if(typeof t==="undefined"){this.$elem.css(k,s)}else{this.$elem.css(k,s+" "+t)}return true}switch(s){case"left":s="0";break;case"right":s="100%";break;case"center":case b:s="50%"}switch(t){case"top":t="0";break;case"bottom":t="100%";break;case"center":case b:t="50%"}this.setAttr("origin",[q.test(s)?s:o(this.$elem[0],s)+"px",q.test(t)?t:o(this.$elem[0],t)+"px"]);return true},createTransformFunc:function(t,u){if(t.substr(0,7)==="reflect"){var s=u?f.matrix[t]():f.matrix.identity();return"matrix("+s.e(1,1)+", "+s.e(2,1)+", "+s.e(1,2)+", "+s.e(2,2)+", 0, 0)"}if(t=="matrix"){if(a==="-moz-"){u[4]=u[4]?u[4]+"px":0;u[5]=u[5]?u[5]+"px":0}}return t+"("+(f.isArray(u)?u.join(", "):u)+")"},fixPosition:function(B,y,x,D,s){var w=new f.matrix.calc(B,this.safeOuterHeight(),this.safeOuterWidth()),C=this.getAttr("origin");var v=w.originOffset(new f.matrix.V2(q.test(C[0])?parseFloat(C[0])/100*w.outerWidth:parseFloat(C[0]),q.test(C[1])?parseFloat(C[1])/100*w.outerHeight:parseFloat(C[1])));var t=w.sides();var u=this.$elem.css("position");if(u=="static"){u="relative"}var A={top:0,left:0};var z={position:u,top:(v.top+x+t.top+A.top)+"px",left:(v.left+y+t.left+A.left)+"px",zoom:1};this.$elem.css(z)}};function o(s,u){var t=c.exec(f.trim(u));if(t[3]&&t[3]!=="px"){var w="paddingBottom",v=f.style(s,w);f.style(s,w,u);u=p(s,w);f.style(s,w,v);return u}return parseFloat(u)}function p(t,u){if(t[u]!=null&&(!t.style||t.style[u]==null)){return t[u]}var s=parseFloat(f.css(t,u));return s&&s>-10000?s:0}})(jQuery,this,this.document);(function(d,c,a,f){d.extend(d.transform.prototype,{safeOuterHeight:function(){return this.safeOuterLength("height")},safeOuterWidth:function(){return this.safeOuterLength("width")},safeOuterLength:function(l){var p="outer"+(l=="width"?"Width":"Height");if(!d.support.csstransforms&&d.browser.msie){l=l=="width"?"width":"height";if(this.applyingMatrix&&!this[p]&&this.matrix){var k=new d.matrix.calc(this.matrix,1,1),n=k.offset(),g=this.$elem[p]()/n[l];this[p]=g;return g}else{if(this.applyingMatrix&&this[p]){return this[p]}}var o={height:["top","bottom"],width:["left","right"]};var h=this.$elem[0],j=parseFloat(d.css(h,l,true)),q=this.boxSizingProperty,i=this.boxSizingValue;if(!this.boxSizingProperty){q=this.boxSizingProperty=e()||"box-sizing";i=this.boxSizingValue=this.$elem.css(q)||"content-box"}if(this[p]&&this[l]==j){return this[p]}else{this[l]=j}if(q&&(i=="padding-box"||i=="content-box")){j+=parseFloat(d.css(h,"padding-"+o[l][0],true))||0+parseFloat(d.css(h,"padding-"+o[l][1],true))||0}if(q&&i=="content-box"){j+=parseFloat(d.css(h,"border-"+o[l][0]+"-width",true))||0+parseFloat(d.css(h,"border-"+o[l][1]+"-width",true))||0}this[p]=j;return j}return this.$elem[p]()}});var b=null;function e(){if(b){return b}var h={boxSizing:"box-sizing",MozBoxSizing:"-moz-box-sizing",WebkitBoxSizing:"-webkit-box-sizing",OBoxSizing:"-o-box-sizing"},g=a.body;for(var i in h){if(typeof g.style[i]!="undefined"){b=h[i];return b}}return null}})(jQuery,this,this.document);(function(g,f,b,h){var d=/([\w\-]*?)\((.*?)\)/g,a="data-transform",e=/\s/,c=/,\s?/;g.extend(g.transform.prototype,{setAttrs:function(i){var j="",l;for(var k in i){l=i[k];if(g.isArray(l)){l=l.join(", ")}j+=" "+k+"("+l+")"}this.attr=g.trim(j);this.$elem.attr(a,this.attr)},setAttr:function(k,l){if(g.isArray(l)){l=l.join(", ")}var j=this.attr||this.$elem.attr(a);if(!j||j.indexOf(k)==-1){this.attr=g.trim(j+" "+k+"("+l+")");this.$elem.attr(a,this.attr)}else{var i=[],n;d.lastIndex=0;while(n=d.exec(j)){if(k==n[1]){i.push(k+"("+l+")")}else{i.push(n[0])}}this.attr=i.join(" ");this.$elem.attr(a,this.attr)}},getAttrs:function(){var j=this.attr||this.$elem.attr(a);if(!j){return{}}var i={},l,k;d.lastIndex=0;while((l=d.exec(j))!==null){if(l){k=l[2].split(c);i[l[1]]=k.length==1?k[0]:k}}return i},getAttr:function(j){var i=this.getAttrs();if(typeof i[j]!=="undefined"){return i[j]}if(j==="origin"&&g.support.csstransforms){return this.$elem.css(this.transformOriginProperty).split(e)}else{if(j==="origin"){return["50%","50%"]}}return g.cssDefault[j]||0}});if(typeof(g.cssAngle)=="undefined"){g.cssAngle={}}g.extend(g.cssAngle,{rotate:true,skew:true,skewX:true,skewY:true});if(typeof(g.cssDefault)=="undefined"){g.cssDefault={}}g.extend(g.cssDefault,{scale:[1,1],scaleX:1,scaleY:1,matrix:[1,0,0,1,0,0],origin:["50%","50%"],reflect:[1,0,0,1,0,0],reflectX:[1,0,0,1,0,0],reflectXY:[1,0,0,1,0,0],reflectY:[1,0,0,1,0,0]});if(typeof(g.cssMultipleValues)=="undefined"){g.cssMultipleValues={}}g.extend(g.cssMultipleValues,{matrix:6,origin:{length:2,duplicate:true},reflect:6,reflectX:6,reflectXY:6,reflectY:6,scale:{length:2,duplicate:true},skew:2,translate:2});g.extend(g.cssNumber,{matrix:true,reflect:true,reflectX:true,reflectXY:true,reflectY:true,scale:true,scaleX:true,scaleY:true});g.each(g.transform.funcs,function(j,k){g.cssHooks[k]={set:function(n,o){var l=n.transform||new g.transform(n),i={};i[k]=o;l.exec(i,{preserve:true})},get:function(n,l){var i=n.transform||new g.transform(n);return i.getAttr(k)}}});g.each(["reflect","reflectX","reflectXY","reflectY"],function(j,k){g.cssHooks[k].get=function(n,l){var i=n.transform||new g.transform(n);return i.getAttr("matrix")||g.cssDefault[k]}})})(jQuery,this,this.document);(function(f,g,h,c){var d=/^([+\-]=)?([\d+.\-]+)(.*)$/;var a=f.fn.animate;f.fn.animate=function(p,l,o,n){var k=f.speed(l,o,n),j=f.cssMultipleValues;k.complete=k.old;if(!f.isEmptyObject(p)){if(typeof k.original==="undefined"){k.original={}}f.each(p,function(s,u){if(j[s]||f.cssAngle[s]||(!f.cssNumber[s]&&f.inArray(s,f.transform.funcs)!==-1)){var t=null;if(jQuery.isArray(p[s])){var r=1,q=u.length;if(j[s]){r=(typeof j[s].length==="undefined"?j[s]:j[s].length)}if(q>r||(q<r&&q==2)||(q==2&&r==2&&isNaN(parseFloat(u[q-1])))){t=u[q-1];u.splice(q-1,1)}}k.original[s]=u.toString();p[s]=parseFloat(u)}})}return a.apply(this,[arguments[0],k])};var b="paddingBottom";function i(k,l){if(k[l]!=null&&(!k.style||k.style[l]==null)){}var j=parseFloat(f.css(k,l));return j&&j>-10000?j:0}function e(u,v,w){var y=f.cssMultipleValues[this.prop],p=f.cssAngle[this.prop];if(y||(!f.cssNumber[this.prop]&&f.inArray(this.prop,f.transform.funcs)!==-1)){this.values=[];if(!y){y=1}var x=this.options.original[this.prop],t=f(this.elem).css(this.prop),j=f.cssDefault[this.prop]||0;if(!f.isArray(t)){t=[t]}if(!f.isArray(x)){if(f.type(x)==="string"){x=x.split(",")}else{x=[x]}}var l=y.length||y,s=0;while(x.length<l){x.push(y.duplicate?x[0]:j[s]||0);s++}var k,r,q,o=this,n=o.elem.transform;orig=f.style(o.elem,b);f.each(x,function(z,A){if(t[z]){k=t[z]}else{if(j[z]&&!y.duplicate){k=j[z]}else{if(y.duplicate){k=t[0]}else{k=0}}}if(p){k=f.angle.toDegree(k)}else{if(!f.cssNumber[o.prop]){r=d.exec(f.trim(k));if(r[3]&&r[3]!=="px"){if(r[3]==="%"){k=parseFloat(r[2])/100*n["safeOuter"+(z?"Height":"Width")]()}else{f.style(o.elem,b,k);k=i(o.elem,b);f.style(o.elem,b,orig)}}}}k=parseFloat(k);r=d.exec(f.trim(A));if(r){q=parseFloat(r[2]);w=r[3]||"px";if(p){q=f.angle.toDegree(q+w);w="deg"}else{if(!f.cssNumber[o.prop]&&w==="%"){k=(k/n["safeOuter"+(z?"Height":"Width")]())*100}else{if(!f.cssNumber[o.prop]&&w!=="px"){f.style(o.elem,b,(q||1)+w);k=((q||1)/i(o.elem,b))*k;f.style(o.elem,b,orig)}}}if(r[1]){q=((r[1]==="-="?-1:1)*q)+k}}else{q=A;w=""}o.values.push({start:k,end:q,unit:w})})}}if(f.fx.prototype.custom){(function(k){var j=k.custom;k.custom=function(o,n,l){e.apply(this,arguments);return j.apply(this,arguments)}}(f.fx.prototype))}if(f.Animation&&f.Animation.tweener){f.Animation.tweener(f.transform.funcs.join(" "),function(l,k){var j=this.createTween(l,k);e.apply(j,[j.start,j.end,j.unit]);return j})}f.fx.multipleValueStep={_default:function(j){f.each(j.values,function(k,l){j.values[k].now=l.start+((l.end-l.start)*j.pos)})}};f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){f.fx.multipleValueStep[k]=function(n){var p=n.decomposed,l=f.matrix;m=l.identity();p.now={};f.each(p.start,function(q){p.now[q]=parseFloat(p.start[q])+((parseFloat(p.end[q])-parseFloat(p.start[q]))*n.pos);if(((q==="scaleX"||q==="scaleY")&&p.now[q]===1)||(q!=="scaleX"&&q!=="scaleY"&&p.now[q]===0)){return true}m=m.x(l[q](p.now[q]))});var o;f.each(n.values,function(q){switch(q){case 0:o=parseFloat(m.e(1,1).toFixed(6));break;case 1:o=parseFloat(m.e(2,1).toFixed(6));break;case 2:o=parseFloat(m.e(1,2).toFixed(6));break;case 3:o=parseFloat(m.e(2,2).toFixed(6));break;case 4:o=parseFloat(m.e(1,3).toFixed(6));break;case 5:o=parseFloat(m.e(2,3).toFixed(6));break}n.values[q].now=o})}});f.each(f.transform.funcs,function(k,l){function j(p){var o=p.elem.transform||new f.transform(p.elem),n={};if(f.cssMultipleValues[l]||(!f.cssNumber[l]&&f.inArray(l,f.transform.funcs)!==-1)){(f.fx.multipleValueStep[p.prop]||f.fx.multipleValueStep._default)(p);n[p.prop]=[];f.each(p.values,function(q,r){n[p.prop].push(r.now+(f.cssNumber[p.prop]?"":r.unit))})}else{n[p.prop]=p.now+(f.cssNumber[p.prop]?"":p.unit)}o.exec(n,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}});f.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(k,l){function j(r){var q=r.elem.transform||new f.transform(r.elem),p={};if(!r.initialized){r.initialized=true;if(l!=="matrix"){var o=f.matrix[l]().elements;var s;f.each(r.values,function(t){switch(t){case 0:s=o[0];break;case 1:s=o[2];break;case 2:s=o[1];break;case 3:s=o[3];break;default:s=0}r.values[t].end=s})}r.decomposed={};var n=r.values;r.decomposed.start=f.matrix.matrix(n[0].start,n[1].start,n[2].start,n[3].start,n[4].start,n[5].start).decompose();r.decomposed.end=f.matrix.matrix(n[0].end,n[1].end,n[2].end,n[3].end,n[4].end,n[5].end).decompose()}(f.fx.multipleValueStep[r.prop]||f.fx.multipleValueStep._default)(r);p.matrix=[];f.each(r.values,function(t,u){p.matrix.push(u.now)});q.exec(p,{preserve:true})}if(f.Tween&&f.Tween.propHooks){f.Tween.propHooks[l]={set:j}}if(f.fx.step){f.fx.step[l]=j}})})(jQuery,this,this.document);(function(g,h,j,c){var d=180/Math.PI;var k=200/Math.PI;var f=Math.PI/180;var e=2/1.8;var i=0.9;var a=Math.PI/200;var b=/^([+\-]=)?([\d+.\-]+)(.*)$/;g.extend({angle:{runit:/(deg|g?rad)/,radianToDegree:function(l){return l*d},radianToGrad:function(l){return l*k},degreeToRadian:function(l){return l*f},degreeToGrad:function(l){return l*e},gradToDegree:function(l){return l*i},gradToRadian:function(l){return l*a},toDegree:function(n){var l=b.exec(n);if(l){n=parseFloat(l[2]);switch(l[3]||"deg"){case"grad":n=g.angle.gradToDegree(n);break;case"rad":n=g.angle.radianToDegree(n);break}return n}return 0}}})})(jQuery,this,this.document);(function(f,e,b,g){if(typeof(f.matrix)=="undefined"){f.extend({matrix:{}})}var d=f.matrix;f.extend(d,{V2:function(h,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,2)}else{this.elements=[h,i]}this.length=2},V3:function(h,j,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,3)}else{this.elements=[h,j,i]}this.length=3},M2x2:function(i,h,k,j){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,4)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,4)}this.rows=2;this.cols=2},M3x3:function(n,l,k,j,i,h,q,p,o){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,9)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,9)}this.rows=3;this.cols=3}});var c={e:function(k,h){var i=this.rows,j=this.cols;if(k>i||h>i||k<1||h<1){return 0}return this.elements[(k-1)*j+h-1]},decompose:function(){var v=this.e(1,1),t=this.e(2,1),q=this.e(1,2),p=this.e(2,2),o=this.e(1,3),n=this.e(2,3);if(Math.abs(v*p-t*q)<0.01){return{rotate:0+"deg",skewX:0+"deg",scaleX:1,scaleY:1,translateX:0+"px",translateY:0+"px"}}var l=o,j=n;var u=Math.sqrt(v*v+t*t);v=v/u;t=t/u;var i=v*q+t*p;q-=v*i;p-=t*i;var s=Math.sqrt(q*q+p*p);q=q/s;p=p/s;i=i/s;if((v*p-t*q)<0){v=-v;t=-t;u=-u}var w=f.angle.radianToDegree;var h=w(Math.atan2(t,v));i=w(Math.atan(i));return{rotate:h+"deg",skewX:i+"deg",scaleX:u,scaleY:s,translateX:l+"px",translateY:j+"px"}}};f.extend(d.M2x2.prototype,c,{toM3x3:function(){var h=this.elements;return new d.M3x3(h[0],h[1],0,h[2],h[3],0,0,0,1)},x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows==3){return this.toM3x3().x(j)}var i=this.elements,h=j.elements;if(k&&h.length==2){return new d.V2(i[0]*h[0]+i[1]*h[1],i[2]*h[0]+i[3]*h[1])}else{if(h.length==i.length){return new d.M2x2(i[0]*h[0]+i[1]*h[2],i[0]*h[1]+i[1]*h[3],i[2]*h[0]+i[3]*h[2],i[2]*h[1]+i[3]*h[3])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M2x2(i*h[3],i*-h[1],i*-h[2],i*h[0])},determinant:function(){var h=this.elements;return h[0]*h[3]-h[1]*h[2]}});f.extend(d.M3x3.prototype,c,{x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows<3){j=j.toM3x3()}var i=this.elements,h=j.elements;if(k&&h.length==3){return new d.V3(i[0]*h[0]+i[1]*h[1]+i[2]*h[2],i[3]*h[0]+i[4]*h[1]+i[5]*h[2],i[6]*h[0]+i[7]*h[1]+i[8]*h[2])}else{if(h.length==i.length){return new d.M3x3(i[0]*h[0]+i[1]*h[3]+i[2]*h[6],i[0]*h[1]+i[1]*h[4]+i[2]*h[7],i[0]*h[2]+i[1]*h[5]+i[2]*h[8],i[3]*h[0]+i[4]*h[3]+i[5]*h[6],i[3]*h[1]+i[4]*h[4]+i[5]*h[7],i[3]*h[2]+i[4]*h[5]+i[5]*h[8],i[6]*h[0]+i[7]*h[3]+i[8]*h[6],i[6]*h[1]+i[7]*h[4]+i[8]*h[7],i[6]*h[2]+i[7]*h[5]+i[8]*h[8])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M3x3(i*(h[8]*h[4]-h[7]*h[5]),i*(-(h[8]*h[1]-h[7]*h[2])),i*(h[5]*h[1]-h[4]*h[2]),i*(-(h[8]*h[3]-h[6]*h[5])),i*(h[8]*h[0]-h[6]*h[2]),i*(-(h[5]*h[0]-h[3]*h[2])),i*(h[7]*h[3]-h[6]*h[4]),i*(-(h[7]*h[0]-h[6]*h[1])),i*(h[4]*h[0]-h[3]*h[1]))},determinant:function(){var h=this.elements;return h[0]*(h[8]*h[4]-h[7]*h[5])-h[3]*(h[8]*h[1]-h[7]*h[2])+h[6]*(h[5]*h[1]-h[4]*h[2])}});var a={e:function(h){return this.elements[h-1]}};f.extend(d.V2.prototype,a);f.extend(d.V3.prototype,a)})(jQuery,this,this.document);(function(c,b,a,d){if(typeof(c.matrix)=="undefined"){c.extend({matrix:{}})}c.extend(c.matrix,{calc:function(e,f,g){this.matrix=e;this.outerHeight=f;this.outerWidth=g}});c.matrix.calc.prototype={coord:function(e,i,h){h=typeof(h)!=="undefined"?h:0;var g=this.matrix,f;switch(g.rows){case 2:f=g.x(new c.matrix.V2(e,i));break;case 3:f=g.x(new c.matrix.V3(e,i,h));break}return f},corners:function(e,h){var f=!(typeof(e)!=="undefined"||typeof(h)!=="undefined"),g;if(!this.c||!f){h=h||this.outerHeight;e=e||this.outerWidth;g={tl:this.coord(0,0),bl:this.coord(0,h),tr:this.coord(e,0),br:this.coord(e,h)}}else{g=this.c}if(f){this.c=g}return g},sides:function(e){var f=e||this.corners();return{top:Math.min(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),bottom:Math.max(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),left:Math.min(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1)),right:Math.max(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1))}},offset:function(e){var f=this.sides(e);return{height:Math.abs(f.bottom-f.top),width:Math.abs(f.right-f.left)}},area:function(e){var h=e||this.corners();var g={x:h.tr.e(1)-h.tl.e(1)+h.br.e(1)-h.bl.e(1),y:h.tr.e(2)-h.tl.e(2)+h.br.e(2)-h.bl.e(2)},f={x:h.bl.e(1)-h.tl.e(1)+h.br.e(1)-h.tr.e(1),y:h.bl.e(2)-h.tl.e(2)+h.br.e(2)-h.tr.e(2)};return 0.25*Math.abs(g.e(1)*f.e(2)-g.e(2)*f.e(1))},nonAffinity:function(){var f=this.sides(),g=f.top-f.bottom,e=f.left-f.right;return parseFloat(parseFloat(Math.abs((Math.pow(g,2)+Math.pow(e,2))/(f.top*f.bottom+f.left*f.right))).toFixed(8))},originOffset:function(h,g){h=h?h:new c.matrix.V2(this.outerWidth*0.5,this.outerHeight*0.5);g=g?g:new c.matrix.V2(0,0);var e=this.coord(h.e(1),h.e(2));var f=this.coord(g.e(1),g.e(2));return{top:(f.e(2)-g.e(2))-(e.e(2)-h.e(2)),left:(f.e(1)-g.e(1))-(e.e(1)-h.e(1))}}}})(jQuery,this,this.document);(function(e,d,a,f){if(typeof(e.matrix)=="undefined"){e.extend({matrix:{}})}var c=e.matrix,g=c.M2x2,b=c.M3x3;e.extend(c,{identity:function(k){k=k||2;var l=k*k,n=new Array(l),j=k+1;for(var h=0;h<l;h++){n[h]=(h%j)===0?1:0}return new c["M"+k+"x"+k](n)},matrix:function(){var h=Array.prototype.slice.call(arguments);switch(arguments.length){case 4:return new g(h[0],h[2],h[1],h[3]);case 6:return new b(h[0],h[2],h[4],h[1],h[3],h[5],0,0,1)}},reflect:function(){return new g(-1,0,0,-1)},reflectX:function(){return new g(1,0,0,-1)},reflectXY:function(){return new g(0,1,1,0)},reflectY:function(){return new g(-1,0,0,1)},rotate:function(l){var i=e.angle.degreeToRadian(l),k=Math.cos(i),n=Math.sin(i);var j=k,h=n,p=-n,o=k;return new g(j,p,h,o)},scale:function(i,h){i=i||i===0?i:1;h=h||h===0?h:i;return new g(i,0,0,h)},scaleX:function(h){return c.scale(h,1)},scaleY:function(h){return c.scale(1,h)},skew:function(k,i){k=k||0;i=i||0;var l=e.angle.degreeToRadian(k),j=e.angle.degreeToRadian(i),h=Math.tan(l),n=Math.tan(j);return new g(1,h,n,1)},skewX:function(h){return c.skew(h)},skewY:function(h){return c.skew(0,h)},translate:function(i,h){i=i||0;h=h||0;return new b(1,0,i,0,1,h,0,0,1)},translateX:function(h){return c.translate(h)},translateY:function(h){return c.translate(0,h)}})})(jQuery,this,this.document);
function ws_rotate(c,a,b){var f=jQuery;var d=f("ul",b);var g={position:"absolute",left:0,top:0,width:"100%"};var e;this.go=function(h,i){if(e){e.stop(true,true)}e=f(a.get(h)).clone().css(g).hide().appendTo(b);if(!c.noCross){var j=f(a.get(i)).clone().css(g).appendTo(b);d.hide();j.animate({rotate:c.rotateOut||180,scale:c.scaleOut||10,opacity:"hide"},{duration:c.duration,easing:"easeInOutExpo",complete:function(){f(this).remove()}})}e.css({scale:c.scaleIn||10,rotate:c.rotateIn||(-180),zIndex:10});e.animate({opacity:"show",rotate:0,scale:1},{duration:c.duration,easing:"easeInOutExpo",queue:false,complete:function(){d.css({left:-h+"00%"}).show();f(this).remove();e=0}});return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"rotate",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersubwaybasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section16 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/subway-basic/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 3.0
 *	template Subway
 */
@import url("http://fonts.googleapis.com/css?family=Cuprum&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:13px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -1000px; 
	position:relative;
	margin-left:5px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	bottom:0;
	margin-top:0;
	z-index:60;
	height: 100%;
	width: 40px;
	background-color:#474747;
	background-repeat: no-repeat;
	background-position: center center;
	opacity:0.7;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);
}
#wowslider-container'.$val.' a.ws_next{
	background-image: url(./arrow-next.png);
	right:0;
}
#wowslider-container'.$val.' a.ws_prev {
	background-image: url(./arrow-prev.png);
	left:0;
}
#wowslider-container'.$val.' a.ws_next:hover,#wowslider-container'.$val.' a.ws_prev:hover{
	background-color:#272727;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0;
	left:50%;
	padding: 5px;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
/* separate */
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	display:block; 
	bottom:20px;
	left: 0;
	z-index: 50;
	font-size: 35px;
	line-height: 35px;
	font-weight: bold;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{ 
	display:inline-block; 
	margin:10px 40px 0 40px;
	padding:10px;
	background:none;
	color: #FFFFFF;
	font-family:"Cuprum", Impact, Charcoal, sans-serif;	
	text-transform: none;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);		
	border-radius:0;
	opacity:1;
}
#wowslider-container'.$val.' .ws-title div{ 
	display:block;
	margin-top:0px; 
	font-size: 20px;
	line-height: 22px;
	font-weight: normal;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 24s infinite;
	-moz-animation: wsBasic 24s infinite;
	-webkit-animation: wsBasic 24s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.33%{left:-0%} 16.67%{left:-100%} 25%{left:-100%} 33.33%{left:-200%} 41.67%{left:-200%} 50%{left:-300%} 58.33%{left:-300%} 66.67%{left:-400%} 75%{left:-400%} 83.33%{left:-500%} 91.67%{left:-500%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:16px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #737373;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#737373;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:18px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid #737373;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-9px;
	margin-left:-4px;
	left:120px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section16 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>The sun shines through the ears</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/ears.jpg" alt="Ears" title="Ears" id="wows1_0"/>The sun shines through the ears</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/cloud.jpg" alt="Cloud" title="Cloud" id="wows1_1"/>Golden clouds at sunset</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/mist.jpg" alt="Mist" title="Mist" id="wows1_2"/>Misty sunset</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/seed.jpg" alt="Seed" title="Seed" id="wows1_3"/>Seed in the sun</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/sun.jpg" alt="Sun" title="Sun" id="wows1_4"/>A cloud covers the sun</li>
<li><img src="http://www.wowslider.com/images/demo/subway-basic/data1/images/tree.jpg" alt="Amazing landscape" title="Amazing landscape" id="wows1_5"/>Tree at sunset</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Ears"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/ears.jpg" alt="Ears"/>1</a>
<a href="#" title="Cloud"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/cloud.jpg" alt="Cloud"/>2</a>
<a href="#" title="Mist"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/mist.jpg" alt="Mist"/>3</a>
<a href="#" title="Seed"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/seed.jpg" alt="Seed"/>4</a>
<a href="#" title="Sun"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/sun.jpg" alt="Sun"/>5</a>
<a href="#" title="Amazing landscape"><img src="http://www.wowslider.com/images/demo/subway-basic/data1/tooltips/tree.jpg" alt="Amazing landscape"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">galerie photos pour votre site</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/subway-basic/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic(c,a,b){this.go=function(d){b.find("ul").stop(true).animate({left:(d?-d+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},c.duration,"easeInOutExpo");return d}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidersilenceblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section17 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/silence-blur/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.8
 *	template Silence
 */
@import url(http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext,cyrillic);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'{
    box-shadow:0 0 10px #000000;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	font:14px/30px "Open Sans",Arial,Helvetica,sans-serif; 
	font-weight: bold;
	color:#000000;
	text-align:center;
	margin-left:5px;
	width:30px;
	height:30px;
	background: url(./bullet.png) left top;
	float: left; 
	position:relative;
	border-radius: 15px;
	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
	text-shadow: none;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-40px;
	z-index:60;
	height: 78px;
	width: 77px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	top:0;
    right: 0; 
}

#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:45px;
	left: 0px;
	margin: 0 5px 15px 0;
	z-index: 50;
	padding:12px;
	color: #000000;
	text-transform:uppercase;
	background:#fff;
    font-family: "Open Sans",Arial,Helvetica,sans-serif;
	font-size: 18px;
	line-height: 20px;
	font-weight: bold;	
	border-radius:0 8px 8px 0;	
	-moz-border-radius:0 8px 8px 0;
 	-webkit-border-radius:0px 8px 8px 0px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);
	box-shadow: 1px 0 2px #000000;
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 14px;
	font-weight: normal;
	text-transform:none;
}
#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 24.5s infinite;
	-moz-animation: wsBasic 24.5s infinite;
	-webkit-animation: wsBasic 24.5s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.16%{left:-0%} 14.29%{left:-100%} 22.45%{left:-100%} 28.57%{left:-200%} 36.73%{left:-200%} 42.86%{left:-300%} 51.02%{left:-300%} 57.14%{left:-400%} 65.31%{left:-400%} 71.43%{left:-500%} 79.59%{left:-500%} 85.71%{left:-600%} 93.88%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.16%{left:-0%} 14.29%{left:-100%} 22.45%{left:-100%} 28.57%{left:-200%} 36.73%{left:-200%} 42.86%{left:-300%} 51.02%{left:-300%} 57.14%{left:-400%} 65.31%{left:-400%} 71.43%{left:-500%} 79.59%{left:-500%} 85.71%{left:-600%} 93.88%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.16%{left:-0%} 14.29%{left:-100%} 22.45%{left:-100%} 28.57%{left:-200%} 36.73%{left:-200%} 42.86%{left:-300%} 51.02%{left:-300%} 57.14%{left:-400%} 65.31%{left:-400%} 71.43%{left:-500%} 79.59%{left:-500%} 85.71%{left:-600%} 93.88%{left:-600%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:25px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #3D3D3D;
    box-shadow: 0 0 5px #3D3D3D;
    border: 5px solid #ffffff;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#ffffff;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:35px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #3D3D3D;
    box-shadow: 0 0 5px #3D3D3D;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
    border: 5px solid #ffffff;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:2px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section17 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.àalt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bug.jpg" alt="Bug : HTML slideshow" title="Bug" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bumblebee.jpg" alt="Bumblebee on the flower : html slideshow for website" title="Bumblebee on the flower" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/caterpillar.jpg" alt="Bright caterpillar : html slideshow maker" title="Bright caterpillar" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/fly.jpg" alt="Two flies : jquery html slideshow" title="Two flies" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/bug1.jpg" alt="Bug und dewdrops : photo html slideshow" title="Bug und dewdrops" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/pondskater.jpg" alt="Pond skater : html slideshow with links" title="Pond skater" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/silence-blur/data1/images/spider.jpg" alt="A spider makes a web : html slideshow with thumbnails" title="A spider makes a web" id="wows1_6"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Bug"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bug.jpg" alt="Bug"/>1</a>
<a href="#" title="Bumblebee on the flower"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bumblebee.jpg" alt="Bumblebee on the flower"/>2</a>
<a href="#" title="Bright caterpillar"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/caterpillar.jpg" alt="Bright caterpillar"/>3</a>
<a href="#" title="Two flies"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/fly.jpg" alt="Two flies"/>4</a>
<a href="#" title="Bug und dewdrops"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/bug1.jpg" alt="Bug und dewdrops"/>5</a>
<a href="#" title="Pond skater"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/pondskater.jpg" alt="Pond skater"/>6</a>
<a href="#" title="A spider makes a web"><img src="http://www.wowslider.com/images/demo/silence-blur/data1/tooltips/spider.jpg" alt="A spider makes a web"/>7</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">HTML photo diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/silence-blur/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blur(p,n,c){var h=jQuery;var b=!p.noCanvas&&!window.opera&&!!document.createElement("canvas").getContext;if(b){try{document.createElement("canvas").getContext("2d").getImageData(0,0,1,1)}catch(m){b=0}}var d;function k(q,e,r){q.css({opacity:0,visibility:"visible"});q.animate({opacity:1},e,"linear",r)}function i(q,e,r){q.animate({opacity:0},e,"linear",r)}var l;this.go=function(e,q){if(l){return -1}l=1;var u=h(n.get(q)),s=h(n.get(e));var t;if(b){if(!d){d="<canvas width="'+c.width()+'" height="'+c.height()+'"/>";d=h(d+d).css({"z-index":8,position:"absolute",width:"100%",height:"100%",left:0,top:0,visibility:"hidden"}).appendTo(c)}t=g(u,30,d.get(0))}if(b&&t){var r=g(s,30,d.get(1));k(t,p.duration/3,function(){c.find("ul").css({visibility:"hidden"});i(t,p.duration/6);k(r,p.duration/6,function(){t.css({visibility:"hidden"});c.find("ul").css({left:-e+"00%"}).css({visibility:"visible"});i(r,p.duration/2,function(){l=0})})})}else{b=0;t=g(u,8);t.fadeIn(p.duration/3,"linear",function(){c.find("ul").css({left:-e+"00%"});t.fadeOut(p.duration/3,"linear",function(){t.remove();l=0})})}return e};function g(v,u,q){var A=(parseInt(v.parent().css("z-index"))||0)+1;if(b){var D=q.getContext("2d");D.drawImage(v.get(0),0,0);if(!j(D,0,0,q.width,q.height,u)){return 0}return h(q)}var E=h("<div></div>").css({position:"absolute","z-index":A,left:0,top:0,width:"100%",height:"100%",display:"none"}).appendTo(c);var C=(Math.sqrt(5)+1)/2;var s=1-C/2;for(var t=0;s*t<u;t++){var w=Math.PI*C*t;var e=(s*t+1);var B=e*Math.cos(w);var z=e*Math.sin(w);h(document.createElement("img")).attr("src",v.attr("src")).css({opacity:1/(t/1.8+1),position:"absolute","z-index":A,left:Math.round(B)+"px",top:Math.round(z)+"px",width:"100%",height:"100%"}).appendTo(E)}return E}var o=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];var a=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];function j(ah,P,N,q,r,Y){if(isNaN(Y)||Y<1){return}Y|=0;var ac;try{ac=ah.getImageData(P,N,q,r)}catch(ag){console.log("error:unable to access image data: "+ag);return false}var v=ac.data;var W,V,ae,ab,E,H,B,t,u,M,C,O,K,S,X,F,A,G,I,R;var af=Y+Y+1;var T=q<<2;var D=q-1;var aa=r-1;var z=Y+1;var Z=z*(z+1)/2;var Q=new f();var L=Q;for(ae=1;ae<af;ae++){L=L.next=new f();if(ae==z){var w=L}}L.next=Q;var ad=null;var U=null;B=H=0;var J=o[Y];var s=a[Y];for(V=0;V<r;V++){S=X=F=t=u=M=0;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}for(ae=1;ae<z;ae++){ab=H+((D<ae?D:ae)<<2);t+=(L.r=(A=v[ab]))*(R=z-ae);u+=(L.g=(G=v[ab+1]))*R;M+=(L.b=(I=v[ab+2]))*R;S+=A;X+=G;F+=I;L=L.next}ad=Q;U=w;for(W=0;W<q;W++){v[H]=(t*J)>>s;v[H+1]=(u*J)>>s;v[H+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(B+((ab=W+Y+1)<D?ab:D))<<2;S+=(ad.r=v[ab]);X+=(ad.g=v[ab+1]);F+=(ad.b=v[ab+2]);t+=S;u+=X;M+=F;ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=4}B+=q}for(W=0;W<q;W++){X=F=S=u=M=t=0;H=W<<2;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}E=q;for(ae=1;ae<=Y;ae++){H=(E+W)<<2;t+=(L.r=(A=v[H]))*(R=z-ae);u+=(L.g=(G=v[H+1]))*R;M+=(L.b=(I=v[H+2]))*R;S+=A;X+=G;F+=I;L=L.next;if(ae<aa){E+=q}}H=W;ad=Q;U=w;for(V=0;V<r;V++){ab=H<<2;v[ab]=(t*J)>>s;v[ab+1]=(u*J)>>s;v[ab+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(W+(((ab=V+z)<aa?ab:aa)*q))<<2;t+=(S+=(ad.r=v[ab]));u+=(X+=(ad.g=v[ab+1]));M+=(F+=(ad.b=v[ab+2]));ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=q}}ah.putImageData(ac,P,N);return true}function f(){this.r=0;this.g=0;this.b=0;this.a=0;this.next=null}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blur",prev:"",next:"",duration:15*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdominionblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section18 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/dominion-blinds/engine1/style.css" />-->
	
	<style>
	/*
 *	generated by WOW Slider 2.8
 *	template Dominion
 */
@import url("http://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:127px auto 10px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:16px;
	height:17px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 35px;
	width: 35px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 6px;
    right: 6px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 0px;
	left: 0px;
	margin: 18px 18px 25px 0;
	color:#f5b50c;
	z-index: 50;
	font-family:"Ubuntu Condensed", Impact, Charcoal, sans-serif;
	font-size: 20px;
	line-height: 21px;
	font-weight: bold;
	text-shadow: none;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:7px;
	background:#1b1916;
	border-radius:0px 4px 4px 0px;
	-moz-border-radius:0px 4px 4px 0px;
	-webkit-border-radius:0px 4px 4px 0px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container'.$val.' .ws-title div{
	color: #FFFFFF;
	display:block;
	margin-top:10px;
	font-size: 18px;
	font-weight: normal;
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    top: -118px;
    left: 0;
	width:100%;
	height:104px;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	height:100%;
	letter-spacing:-4px;
	width:1340px; 
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#f5b50c;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	text-indent:0;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #4e463f;
	border-radius:5px;
	-moz-border-radius:5px;
	margin:3px;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 29s infinite;
	-moz-animation: wsBasic 29s infinite;
	-webkit-animation: wsBasic 29s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.9%{left:-0%} 10%{left:-100%} 16.9%{left:-100%} 20%{left:-200%} 26.9%{left:-200%} 30%{left:-300%} 36.9%{left:-300%} 40%{left:-400%} 46.9%{left:-400%} 50%{left:-500%} 56.9%{left:-500%} 60%{left:-600%} 66.9%{left:-600%} 70%{left:-700%} 76.9%{left:-700%} 80%{left:-800%} 86.9%{left:-800%} 90%{left:-900%} 96.9%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.9%{left:-0%} 10%{left:-100%} 16.9%{left:-100%} 20%{left:-200%} 26.9%{left:-200%} 30%{left:-300%} 36.9%{left:-300%} 40%{left:-400%} 46.9%{left:-400%} 50%{left:-500%} 56.9%{left:-500%} 60%{left:-600%} 66.9%{left:-600%} 70%{left:-700%} 76.9%{left:-700%} 80%{left:-800%} 86.9%{left:-800%} 90%{left:-900%} 96.9%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.9%{left:-0%} 10%{left:-100%} 16.9%{left:-100%} 20%{left:-200%} 26.9%{left:-200%} 30%{left:-300%} 36.9%{left:-300%} 40%{left:-400%} 46.9%{left:-400%} 50%{left:-500%} 56.9%{left:-500%} 60%{left:-600%} 66.9%{left:-600%} 70%{left:-700%} 76.9%{left:-700%} 80%{left:-800%} 86.9%{left:-800%} 90%{left:-900%} 96.9%{left:-900%} }

#wowslider-container'.$val.'  .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-0.94%;
	top:-2.5%;
	width:101.87%;
	height:105.27%;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:20px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #4e463f;
	border-radius:5px;
	-moz-border-radius:5px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#4e463f;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #4e463f;
	border-radius:5px;
	-moz-border-radius:5px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-10px;
	margin-left:-4px;
	left:60px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section18 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Sky reflected in water</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/reflection.jpg" alt="Reflection : HTML gallery" title="Reflection" id="wows1_0"/>Sky reflected in water</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/field.jpg" alt="Field : html photo gallery creator" title="Field" id="wows1_1"/>Sunset in the field</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/landscape.jpg" alt="Lundscape : html gallery scroller" title="Lundscape" id="wows1_2"/>Beautiful nature</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/river.jpg" alt="River : html scrolling gallery" title="River" id="wows1_3"/>River und summer greens</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/cloud.jpg" alt="Clouds : html website gallery" title="Clouds" id="wows1_4"/>Cloudy sky</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/windvane.jpg" alt="Wind vane : html slideshow gallery" title="Wind vane" id="wows1_5"/>Wind vane at sunset</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/road.jpg" alt="Road : html gallery css" title="Road" id="wows1_6"/>Road near the forest</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sky.jpg" alt="Sky : html image gallery" title="Sky" id="wows1_7"/>Branches und amazing pink sky</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sun.jpg" alt="Sun : html gallery javascript" title="Sun" id="wows1_8"/>The sun sets over the horizon</li>
<li><img src="http://www.wowslider.com/images/demo/dominion-blinds/data1/images/sunset.jpg" alt="Sunset : html gallery with captions" title="Sunset" id="wows1_9"/>Fantastic orange sky</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">Galerie dimages HTML</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/dominion-blinds/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blinds(c,b,a){var g=jQuery;var e=c.parts||3;var f=g("<div>");f.css({position:"absolute",width:"100%",height:"100%",left:0,top:0,"z-index":8}).hide().appendTo(a);var h=[];for(var d=0;d<e;d++){h[d]=g("<div>").css({position:"absolute",height:"100%",width:Math.ceil(100/e)+1+"%",border:"none",margin:0,overflow:"hidden",top:0,left:Math.round(100*d/e)+"%"}).appendTo(f)}this.go=function(m,o,j){var l=o>m?1:0;if(j){if(j<=-1){m=(o+1)%b.length;l=0}else{if(j>=1){m=(o-1+b.length)%b.length;l=1}else{return -1}}}f.find("img").stop(true,true);f.show();for(var n=0;n<h.length;n++){var k=h[n];g(b.get(m)).clone().css({position:"absolute",top:0,left:(!l?(-f.width()):(f.width()-k.position().left))+"px",width:"auto",height:"100%"}).appendTo(k).animate({left:-k.position().left+"px"},(c.duration/(h.length+1))*(l?(h.length-n+1):(n+2)),((!l&&n==h.length-1||l&&!n)?function(){g("ul",a).css({left:-m+"00%"});f.hide().find("img").remove()}:null))}return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blinds",prev:"",next:"",duration:9*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercalmkenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section19 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/calm-kenburns/engine1/style.css" />-->
	
	<style>
	/*
 *	generated by WOW Slider 2.8
 *	template Calm
 */
@import url("http://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:830px;
	margin:14px 14px 14px 150px;
	z-index:90;
	border:14px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:830px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:16px;
	height:17px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 54px;
	width: 53px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:5px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:5px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 10px;
    right: 6px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 0px;
	left: 0px; 
	margin:35px 15px;
	padding:7px;
	background:#FFFFFF;
	color:#000000;
	z-index: 50;
	font-family:"Playfair Display", Palatino Linotype, Book Antiqua, Palatino, serif;
	font-size: 20px;
	line-height: 21px;
	font-weight: bold;
	border-radius:6px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
	box-shadow: 1px 1px 4px #333333;
	-moz-box-shadow: 1px 1px 4px #333333;
    -webkit-box-shadow: 1px 1px 4px #333333; 
}
#wowslider-container'.$val.' .ws-title div{
    margin-top: 6px;
	font-size: 18px;
	font-weight: normal;
}

#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    left: -160px;
    top: 0;
	width:141px;
	height:100%;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	width:100%;
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#565d65;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	text-indent:0;
    -moz-box-shadow: 1px 1px 4px #333333;
	box-shadow: 1px 1px 4px #333333;
    border: 5px solid #FFFFFF;
	margin:3px;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 23.1s infinite;
	-moz-animation: wsBasic 23.1s infinite;
	-webkit-animation: wsBasic 23.1s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.66%{left:-0%} 14.29%{left:-100%} 22.94%{left:-100%} 28.57%{left:-200%} 37.23%{left:-200%} 42.86%{left:-300%} 51.52%{left:-300%} 57.14%{left:-400%} 65.8%{left:-400%} 71.43%{left:-500%} 80.09%{left:-500%} 85.71%{left:-600%} 94.37%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.66%{left:-0%} 14.29%{left:-100%} 22.94%{left:-100%} 28.57%{left:-200%} 37.23%{left:-200%} 42.86%{left:-300%} 51.52%{left:-300%} 57.14%{left:-400%} 65.8%{left:-400%} 71.43%{left:-500%} 80.09%{left:-500%} 85.71%{left:-600%} 94.37%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.66%{left:-0%} 14.29%{left:-100%} 22.94%{left:-100%} 28.57%{left:-200%} 37.23%{left:-200%} 42.86%{left:-300%} 51.52%{left:-300%} 57.14%{left:-400%} 65.8%{left:-400%} 71.43%{left:-500%} 80.09%{left:-500%} 85.71%{left:-600%} 94.37%{left:-600%} }

#wowslider-container'.$val.' {
	box-shadow: 1px 1px 4px #333333;
	-moz-box-shadow: 1px 1px 4px #333333;
    -webkit-box-shadow: 1px 1px 4px #333333; 
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:20px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFFFFF;
	border-radius:5px;
	-moz-border-radius:5px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFFFFF;
	border-radius:5px;
	-moz-border-radius:5px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-10px;
	margin-left:-4px;
	left:60px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section19 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/camomile.jpg" alt="Camomile : HTML slider" title="Camomile" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/drops.jpg" alt="Drops : html image slider" title="Drops" id="wows1_1"/>Raindrops on the leaf</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/flower.jpg" alt="Purple flower : html slider jquery" title="Purple flower" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/green.jpg" alt="Forest green : responsive html slider" title="Forest green" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/leaf.jpg" alt="Leaf : html javascript image slider" title="Leaf" id="wows1_4"/>Autumn leaf on the water</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/physalis.jpg" alt="Physalis : html website slider" title="Physalis" id="wows1_5"/>Bright flowers</li>
<li><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/images/thistle.jpg" alt="Thistle : html thumbnail slider" title="Thistle" id="wows1_6"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
								$link = $video_arrtheme1['link'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Camomile"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/camomile.jpg" alt="" /></a>
<a href="#" title="Drops"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg" alt="" /></a>
<a href="#" title="Purple flower"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/flower.jpg" alt="" /></a>
<a href="#" title="Forest green"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/green.jpg" alt="" /></a>
<a href="#" title="Leaf"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/leaf.jpg" alt="" /></a>
<a href="#" title="Physalis"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/physalis.jpg" alt="" /></a>
<a href="#" title="Thistle"><img src="http://www.wowslider.com/images/demo/calm-kenburns/data1/tooltips/thistle.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">HTML Diaporama sur limage</a>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/calm-kenburns/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_kenburns(q,k,d){var f=jQuery;var b=document.createElement("canvas").getContext;var p=q.paths||[{from:[0,0,1],to:[0,0,1.2]},{from:[0,0,1.2],to:[0,0,1]},{from:[1,0,1],to:[1,0,1.2]},{from:[0,1,1.2],to:[0,1,1]},{from:[1,1,1],to:[1,1,1.2]},{from:[0.5,1,1],to:[0.5,1,1.3]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[1,0.5,1],to:[1,0.5,1.2]},{from:[0,0.5,1.2],to:[0,0.5,1]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[0.5,0.5,1],to:[0.5,0.5,1.2]},{from:[0.5,0.5,1.3],to:[0.5,0.5,1]},{from:[0.5,1,1],to:[0.5,0,1.15]}];function r(h){return p[h?Math.floor(Math.random()*(b?p.length:Math.min(5,p.length))):0]}function e(w,t){var v,h=0,s=40/t;var x=setInterval(function(){if(h<1){if(!v){v=1;w(h);v=0}h+=s}else{u(1)}},40);function u(y){clearInterval(x);if(y){w(1)}}return{stop:u}}var n=q.width,g=q.height;var j,a;var o,m;function i(){o=f("<div style="width:100%;height:100%"></div>").css({"z-index":8,position:"absolute",left:0,top:0}).appendTo(d)}i();function c(v,s,h){var t={width:100*v[2]+"%"};t[s?"right":"left"]=-100*(v[2]-1)*(s?(1-v[0]):v[0])+"%";t[h?"bottom":"top"]=-100*(v[2]-1)*(h?(1-v[1]):v[1])+"%";if(!b){for(var u in t){if(/\%/.test(t[u])){t[u]=(/right|left|width/.test(u)?n:g)*parseFloat(t[u])/100+"px"}}}return t}function l(t,y,v){if(b){if(a){a.stop(1)}a=j}if(m){m.remove()}m=o;i();if(v){o.hide();m.stop(true,true)}if(b){var s,h;var u,x;u=f("<canvas width="'+n+'" height="'+g+'"/>");u.css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(o);s=u.get(0).getContext("2d");x=u.clone().appendTo(o);h=x.get(0).getContext("2d");j=new e(function(z){var B=[y.from[0]*(1-z)+z*y.to[0],y.from[1]*(1-z)+z*y.to[1],y.from[2]*(1-z)+z*y.to[2]];h.drawImage(t,-n*(B[2]-1)*B[0],-g*(B[2]-1)*B[1],n*B[2],g*B[2]);s.clearRect(0,0,n,g);var A=s;s=h;h=A},q.duration+q.delay*2)}else{var w=f("<img src="'+t.src+'"/>").css({position:"absolute",left:"auto",right:"auto",top:"auto",bottom:"auto"}).appendTo(o).css(c(y.from,y.from[0]>0.5,y.from[1]>0.5)).animate(c(y.to,y.from[0]>0.5,y.from[1]>0.5),{easing:"linear",queue:false,duration:(1.5*q.duration+q.delay)})}if(v){o.fadeIn(q.duration)}}k.each(function(h){f(this).css({visibility:"hidden"});if(h==q.startSlide){l(this,r(0),0)}});this.go=function(h,s){l(k.get(h),r(h),1);return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"kenburns",prev:"",next:"",duration:13*100,delay:20*100,width:830,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"slide",controls:true,logo:"engine1/loading.gif",onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderprimetimelinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section20 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/prime-time-linear/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.6
 *	template Prime Time
 */
@import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:830px;
	margin: 0 150px 30px 0;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:830px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:13px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:6px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-33px;
	z-index:60;
	height: 50px;
	width: 50px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:3px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:3px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 0px;
    right: 0px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 10%;
	left: 0px;
	margin-right:5px;
	color:#4589ce;
	z-index: 50;
	font-family: "Open Sans Condensed", sans-serif;
	font-size: 27px;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	background:#FFFFFF;
	display:inline-block;
	padding:7px;
	border-radius:0 3px 3px 0;
	-moz-border-radius:0 3px 3px 0;	
	-webkit-border-radius:0 3px 3px 0;	
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	color: #555555;
    font-size: 20px;	
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    right: -156px;
    top: 0;
	width:136px;
	height:100%;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	width:100%;
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#444;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	text-indent:0;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	margin:3px;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }

#wowslider-container'.$val.'  .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-1.81%;
	top:-5%;
	width:103.61%;
	height:110.55%;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:15px;
	left:-60px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:120px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:16px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-7px;
	left:60px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section20 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Boats in the bay</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/bay.jpg" alt="Bay" title="Bay" id="wows1_0"/>Boats in the bay</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/black_sea.jpg" alt="Black sea" title="Black sea" id="wows1_1"/>Rocky shore of the Black Sea</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/boats_near__the__shore.jpg" alt="Boats" title="Boats" id="wows1_2"/>Boats near the shore</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/motor_vessel.jpg" alt="Motor vessel" title="Motor vessel" id="wows1_3"/>River cruise</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/river.jpg" alt="River" title="River" id="wows1_4"/>Beautiful nature</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/rocky_shore.jpg" alt="Shore" title="Shore" id="wows1_5"/>Rocky shore</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/sea_birds.jpg" alt="Sea birds" title="Sea birds" id="wows1_6"/>Birds are walking along the coast</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/ship.jpg" alt="Ship" title="Ship" id="wows1_7"/>A ship goes</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/ship_at_sunset.jpg" alt="Ship at sunset" title="Ship at sunset" id="wows1_8"/>Amazing sea sunset</li>
<li><img src="http://www.wowslider.com/images/demo/prime-time-linear/data1/images/waterscape.jpg" alt="Waterscape" title="Waterscape" id="wows1_9"/>River on a sunny morning</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div>
</div>
<a style="display:none" href="http://wowslider.com">Scroller dimage</a>
	<div class="ws_shadow"></div>
	</div>
	
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/prime-time-linear/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic_linear(c,a,b){var d=jQuery;var e=d("<div></div>").css({position:"absolute",display:"none","z-index":2,width:"200%",height:"100%"}).appendTo(b);this.go=function(f,i){e.stop(1,1);var g=(!!((f-i+1)%a.length)^c.revers?"left":"right");d(a[i]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,0);d(a[f]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,"50%").show();e.css({left:"auto",right:"auto",top:0}).css(g,0).show();var h={};h[g]="-100%";e.animate(h,c.duration,"easeInOutExpo",function(){b.find("ul").css({left:-f+"00%"});d(this).hide().html("")});return f}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic_linear",prev:"",next:"",duration:20*100,delay:20*100,width:830,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		/*}elseif ($conf_value == 'wowsliderdarkmattersquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section21 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/dark-matter-squares/engine1/style.css" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section21 -->
	<div id="wowslider-container'.$val.'">
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
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/dark-matter-squares/engine1/script.js"></script>-->
	<script type="text/javascript">

if(!jQuery.fn.coinslider){(function(g){var f=new Array;var d=new Array;var n=new Array;var p=new Array;var e=new Array;var l=new Array;var c=new Array;var h=new Array;var o=new Array;var b=new Array;var m=new Array;var a=new Array;g.fn.coinslider=g.fn.CoinSlider=function(q){init=function(r){d[r.id]=new Array();n[r.id]=new Array();p[r.id]=new Array();e[r.id]=new Array();l[r.id]=new Array();h[r.id]=q.startSlide||0;b[r.id]=0;m[r.id]=1;a[r.id]=r;f[r.id]=g.extend({},g.fn.coinslider.defaults,q);g.each(g("#"+r.id+" img"),function(s,t){n[r.id][s]=t;p[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("href"):"";e[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("target"):"";l[r.id][s]=g(t).next().is("span")?g(t).next().html():""});a[r.id]=g("<div class="coin-slider" id="coin-slider-"+r.id+"" />").css({"background-image":"url("+n[r.id][q.startSlide||0].src+")","-o-background-size":"100%","-webkit-background-size":"100%","-moz-background-size":"100%","background-size":"100%",width:"100%",height:"100%",position:"relative","background-position":"top left"}).appendTo(g(r).parent());for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){g(f[r.id].links?("<a href='"+p[r.id][0]+"'></a>"):"<div></div>").css({"float":"left",position:"absolute"}).appendTo(a[r.id]).attr("id","cs-"+r.id+i+j)}}a[r.id].append("<div class="cs-title" id="cs-title-"+r.id+"" style="position: absolute; bottom:0; left: 0; z-index: 1000;"></div>");if(f[r.id].navigation){g.setNavigation(r)}};g.setFields=function(s){var r=a[s.id].width();var t=a[s.id].height();tWidth=sWidth=parseInt(r/f[s.id].spw);tHeight=sHeight=parseInt(t/f[s.id].sph);counter=sLeft=sTop=0;tgapx=gapx=f[s.id].width-f[s.id].spw*sWidth;tgapy=gapy=f[s.id].height-f[s.id].sph*sHeight;for(i=1;i<=f[s.id].sph;i++){gapx=tgapx;if(gapy>0){gapy--;sHeight=tHeight+1}else{sHeight=tHeight}for(j=1;j<=f[s.id].spw;j++){if(gapx>0){gapx--;sWidth=tWidth+1}else{sWidth=tWidth}d[s.id][counter]=i+""+j;counter++;g("#cs-"+s.id+i+j).css({width:sWidth+"px",height:sHeight+"px","background-position":-sLeft+"px "+(-sTop+"px"),"background-size":r+"px "+t+"px","-moz-background-size":r+"px "+t+"px","-o-background-size":r+"px "+t+"px","-webkit-background-size":r+"px "+t+"px",left:sLeft,top:sTop}).addClass("cs-"+s.id);sLeft+=sWidth}sTop+=sHeight;sLeft=0}g(".cs-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g(".cs-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});g("#cs-title-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g("#cs-title-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});if(f[s.id].hoverPause){g(".cs-"+s.id).mouseover(function(){f[s.id].pause=true});g(".cs-"+s.id).mouseout(function(){f[s.id].pause=false});g("#cs-title-"+s.id).mouseover(function(){f[s.id].pause=true});g("#cs-title-"+s.id).mouseout(function(){f[s.id].pause=false})}};g.transitionCall=function(r){if(f[r.id].delay<0){return}clearInterval(c[r.id]);delay=f[r.id].delay+f[r.id].spw*f[r.id].sph*f[r.id].sDelay;c[r.id]=setInterval(function(){g.transition(r)},delay)};g.transition=function(r,s){if(f[r.id].pause==true){return}g.setFields(r);g.effect(r);b[r.id]=0;o[r.id]=setInterval(function(){g.appereance(r,d[r.id][b[r.id]])},f[r.id].sDelay);g(a[r.id]).css({"background-image":"url("+n[r.id][h[r.id]].src+")"});if(typeof(s)=="undefined"){h[r.id]++}else{if(s=="prev"){h[r.id]--}else{h[r.id]=s}}if(h[r.id]==n[r.id].length){h[r.id]=0}if(h[r.id]==-1){h[r.id]=n[r.id].length-1}g(".cs-button-"+r.id).removeClass("cs-active");g("#cs-button-"+r.id+"-"+(h[r.id]+1)).addClass("cs-active");if(l[r.id][h[r.id]]){g("#cs-title-"+r.id).css({opacity:0}).animate({opacity:f[r.id].opacity},f[r.id].titleSpeed);g("#cs-title-"+r.id).html(l[r.id][h[r.id]])}else{g("#cs-title-"+r.id).css("opacity",0)}};g.appereance=function(s,r){g(".cs-"+s.id).attr("href",p[s.id][h[s.id]]).attr("target",e[s.id][h[s.id]]);if(b[s.id]==f[s.id].spw*f[s.id].sph){clearInterval(o[s.id]);setTimeout(function(){g(s).trigger("cs:animFinished")},300);return}g("#cs-"+s.id+r).css({opacity:0,"background-image":"url("+n[s.id][h[s.id]].src+")"});g("#cs-"+s.id+r).animate({opacity:1},300);b[s.id]++};g.setNavigation=function(r){g(a[r.id]).append("<div id="cs-navigation-"+r.id+""></div>");g("#cs-navigation-"+r.id).hide();g("#cs-navigation-"+r.id).append("<a href="#" id="cs-prev-"+r.id+"" class="cs-prev">prev</a>");g("#cs-navigation-"+r.id).append("<a href="#" id="cs-next-"+r.id+"" class="cs-next">next</a>");g("#cs-prev-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,left:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r,"prev");g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("#cs-next-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,right:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r);g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("<div id="cs-buttons-"+r.id+"" class="cs-buttons"></div>").appendTo(g("#coin-slider-"+r.id));for(k=1;k<n[r.id].length+1;k++){g("#cs-buttons-"+r.id).append("<a href="#" class="cs-button-"+r.id+"" id="cs-button-"+r.id+"-"+k+"">"+k+"</a>")}g.each(g(".cs-button-"+r.id),function(s,t){g(t).click(function(u){g(".cs-button-"+r.id).removeClass("cs-active");g(this).addClass("cs-active");u.preventDefault();g.transition(r,s);g.transitionCall(r)})});g("#cs-navigation-"+r.id+" a").mouseout(function(){g("#cs-navigation-"+r.id).hide();f[r.id].pause=false});g("#cs-buttons-"+r.id).css({left:"50%","margin-left":-n[r.id].length*15/2-5,position:"relative"})};g.effect=function(r){effA=["random","swirl","rain","straight","snakeV","rainV"];if(f[r.id].effect==""){eff=effA[Math.floor(Math.random()*(effA.length))]}else{eff=f[r.id].effect}d[r.id]=new Array();if(eff=="random"){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}g.random(d[r.id])}if(/rain|swirl|straight|snakeV|rainV/.test(eff)){g[eff](r)}m[r.id]*=-1;if(m[r.id]>0){d[r.id].reverse()}};g.random=function(r){var t=r.length;if(t==0){return false}while(--t){var s=Math.floor(Math.random()*(t+1));var v=r[t];var u=r[s];r[t]=u;r[s]=v}};g.swirl=function(r){var t=f[r.id].sph;var u=f[r.id].spw;var B=1;var A=1;var s=0;var v=0;var z=0;var w=true;while(w){v=(s==0||s==2)?u:t;for(i=1;i<=v;i++){d[r.id][z]=B+""+A;z++;if(i!=v){switch(s){case 0:A++;break;case 1:B++;break;case 2:A--;break;case 3:B--;break}}}s=(s+1)%4;switch(s){case 0:u--;A++;break;case 1:t--;B++;break;case 2:u--;A--;break;case 3:t--;B--;break}check=g.max(t,u)-g.min(t,u);if(u<=check&&t<=check){w=false}}};g.rain=function(t){var w=f[t.id].sph;var r=f[t.id].spw;var v=0;var u=to2=from=1;var s=true;while(s){for(i=from;i<=u;i++){d[t.id][v]=i+""+parseInt(to2-i+1);v++}to2++;if(u<w&&to2<r&&w<r){u++}if(u<w&&w>=r){u++}if(to2>r){from++}if(from>u){s=false}}};g.rainV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+r;v++}}};g.snakeV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+(s%2?r:u.spw+1-r);v++}}};g.straight=function(r){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}};g.min=function(s,r){if(s>r){return r}else{return s}};g.max=function(s,r){if(s<r){return r}else{return s}};this.each(function(){init(this)})};g.fn.coinslider.defaults={width:565,height:290,spw:7,sph:5,delay:3000,sDelay:30,opacity:0.7,titleSpeed:500,effect:"",navigation:true,links:true,hoverPause:true}})(jQuery)};

function ws_squares(c,a,b){var g=jQuery;var e=b.find("ul").get(0);e.id="wowslider_tmp"+Math.round(Math.random()*99999);var h=0;g(e).coinslider({hoverPause:false,startSlide:c.startSlide,navigation:0,delay:-1,width:c.width,height:c.height});var f=g("#coin-slider-"+e.id).css({position:"absolute",left:0,top:0,"z-index":8});var d=c.startSlide;g(e).bind("cs:animFinished",function(){g(e).css({left:-d+"00%"});if(h<2){h=0;f.hide()}});this.go=function(i){h++;f.show();d=i;g.transition(e,i);return i}};

wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"squares",prev:"",next:"",duration:9*100,delay:30*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:1,caption:true,captionEffect:"slide",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		*/}elseif ($conf_value == 'wowslidercatalystfade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section22 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/catalyst-fade/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.6
 *	template Catalyst
 */

#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:6px auto 126px;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:19px;
	height:21px;
	background: url(./icons/bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:7px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-15px;
	z-index:60;
	height: 35px;
	width: 32px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:21px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:21px;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 126px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 18px;
	left: 20px;
	margin: 9px;
	color:#3c506b;
	z-index: 50;
	font-family:Verdana,Arial,Helvetica,sans-serif;
	font-size: 15px;
	font-weight: bold;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:10px;
	background:#e9e9e9;
	box-shadow: 0 0 2px #303030;
	border-radius:6px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	opacity:0.9;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	font-size: 12px;
	font-weight: normal;
	color:#303030;
}#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs a { 
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    bottom: -117px;
    left: 0;
	width:100%;
	height:106px;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	height:100%;
	letter-spacing:-4px;
	width:2158px; 
}
#wowslider-container'.$val.' .ws_thumbs .ws_selthumb img{
	border-color:#444;
}

#wowslider-container'.$val.' .ws_thumbs  a img{
	margin:3px;
	text-indent:0;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
    border: 5px solid #d2d2d2;
	border-radius:6px;
	-moz-border-radius:6px;
	max-width:none;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 41.6s infinite;
	-moz-animation: wsBasic 41.6s infinite;
	-webkit-animation: wsBasic 41.6s infinite;
}
@keyframes wsBasic{0%{left:-0%} 4.81%{left:-0%} 7.69%{left:-100%} 12.5%{left:-100%} 15.38%{left:-200%} 20.19%{left:-200%} 23.08%{left:-300%} 27.88%{left:-300%} 30.77%{left:-400%} 35.58%{left:-400%} 38.46%{left:-500%} 43.27%{left:-500%} 46.15%{left:-600%} 50.96%{left:-600%} 53.85%{left:-700%} 58.65%{left:-700%} 61.54%{left:-800%} 66.35%{left:-800%} 69.23%{left:-900%} 74.04%{left:-900%} 76.92%{left:-1000%} 81.73%{left:-1000%} 84.62%{left:-1100%} 89.42%{left:-1100%} 92.31%{left:-1200%} 97.12%{left:-1200%} }
@-moz-keyframes wsBasic{0%{left:-0%} 4.81%{left:-0%} 7.69%{left:-100%} 12.5%{left:-100%} 15.38%{left:-200%} 20.19%{left:-200%} 23.08%{left:-300%} 27.88%{left:-300%} 30.77%{left:-400%} 35.58%{left:-400%} 38.46%{left:-500%} 43.27%{left:-500%} 46.15%{left:-600%} 50.96%{left:-600%} 53.85%{left:-700%} 58.65%{left:-700%} 61.54%{left:-800%} 66.35%{left:-800%} 69.23%{left:-900%} 74.04%{left:-900%} 76.92%{left:-1000%} 81.73%{left:-1000%} 84.62%{left:-1100%} 89.42%{left:-1100%} 92.31%{left:-1200%} 97.12%{left:-1200%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 4.81%{left:-0%} 7.69%{left:-100%} 12.5%{left:-100%} 15.38%{left:-200%} 20.19%{left:-200%} 23.08%{left:-300%} 27.88%{left:-300%} 30.77%{left:-400%} 35.58%{left:-400%} 38.46%{left:-500%} 43.27%{left:-500%} 46.15%{left:-600%} 50.96%{left:-600%} 53.85%{left:-700%} 58.65%{left:-700%} 61.54%{left:-800%} 66.35%{left:-800%} 69.23%{left:-900%} 74.04%{left:-900%} 76.92%{left:-1000%} 81.73%{left:-1000%} 84.62%{left:-1100%} 89.42%{left:-1100%} 92.31%{left:-1200%} 97.12%{left:-1200%} }

#wowslider-container'.$val.'  .ws_shadow{
	background-image: url(./themes/themebuilder/icons/bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-0.63%;
	top:-1.67%;
	width:101.25%;
	height:104.16%;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:16px;
	left:-75px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
    border: 5px solid #d2d2d2;
	border-radius:6px;
	-moz-border-radius:6px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:150px;
	background-color:#d2d2d2;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:24px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
    border: 5px solid #d2d2d2;
	border-radius:6px;
	-moz-border-radius:6px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-13px;
	margin-left:-3px;
	left:75px;
	background:url(./triangle.png);
	width:19px;
	height:8px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section22 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>An alligator is swimming.</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/catalyst-fade/data1/images/alligator.jpg" alt="Alligator" title="Alligator" id="wows1_0"/>An alligator is swimming.</li>
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
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<a style="display:none" href="http://wowslider.com">jQuery bannière de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/catalyst-fade/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_fade(c,a,b){var e=jQuery;var d=e("ul",b);var f={position:"absolute",left:0,top:0,width:"100%",height:"100%"};this.go=function(g,h){var i=e(a.get(g)).clone().css(f).hide().appendTo(b);if(!c.noCross){var j=e(a.get(h)).clone().css(f).appendTo(b);d.hide();j.fadeOut(c.duration,function(){j.remove()})}i.fadeIn(c.duration,function(){d.css({left:-g+"00%"}).show();i.remove()});return g}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"fade",prev:"",next:"",duration:12*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercatalystdigitalstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section23 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/catalyst-digital-stack/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.6
 *	template Catalyst Digital
 */
@import url(http://fonts.googleapis.com/css?family=Cuprum);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:6px auto 9px;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	font-family:Cuprum,sans-serif;
	font-size: 15px;	
	font-weight: bold;
	text-shadow: 1px 1px 0 #FFFFFF;
	color:#92a3bc;
	text-align:center;
	width:27px;
	height:30px;
	background: url(./bullet.png) left top;
	float: left; 
	position:relative;
	margin-left:7px;
	line-height: 28px;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: right top;
	color:#3c506b
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-15px;
	z-index:60;
	height: 35px;
	width: 32px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:21px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:21px;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 9px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 20px;
	left: 20px;
	box-shadow: 0 0 2px #303030;
	margin-right:25px;
	padding:7px;
	background:#e9e9e9;
	z-index: 50;
	font-family:Cuprum,sans-serif;
	font-size: 20px;	
	line-height: 20px;	
	font-weight: bold;
	text-shadow: 1px 1px 0 #FFFFFF;
	color:#92a3bc;
	border-radius:6px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	opacity:0.9;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 17px;
	font-weight: normal;
	color:#303030;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 42s infinite;
	-moz-animation: wsBasic 42s infinite;
	-webkit-animation: wsBasic 42s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5.95%{left:-0%} 10%{left:-100%} 15.95%{left:-100%} 20%{left:-200%} 25.95%{left:-200%} 30%{left:-300%} 35.95%{left:-300%} 40%{left:-400%} 45.95%{left:-400%} 50%{left:-500%} 55.95%{left:-500%} 60%{left:-600%} 65.95%{left:-600%} 70%{left:-700%} 75.95%{left:-700%} 80%{left:-800%} 85.95%{left:-800%} 90%{left:-900%} 95.95%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5.95%{left:-0%} 10%{left:-100%} 15.95%{left:-100%} 20%{left:-200%} 25.95%{left:-200%} 30%{left:-300%} 35.95%{left:-300%} 40%{left:-400%} 45.95%{left:-400%} 50%{left:-500%} 55.95%{left:-500%} 60%{left:-600%} 65.95%{left:-600%} 70%{left:-700%} 75.95%{left:-700%} 80%{left:-800%} 85.95%{left:-800%} 90%{left:-900%} 95.95%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5.95%{left:-0%} 10%{left:-100%} 15.95%{left:-100%} 20%{left:-200%} 25.95%{left:-200%} 30%{left:-300%} 35.95%{left:-300%} 40%{left:-400%} 45.95%{left:-400%} 50%{left:-500%} 55.95%{left:-500%} 60%{left:-600%} 65.95%{left:-600%} 70%{left:-700%} 75.95%{left:-700%} 80%{left:-800%} 85.95%{left:-800%} 90%{left:-900%} 95.95%{left:-900%} }

#wowslider-container'.$val.'  .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	position:absolute;
	z-index: -1;
	left:-0.63%;
	top:-1.67%;
	width:101.25%;
	height:104.16%;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:16px;
	left:-124px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
    border: 5px solid #d2d2d2;
	border-radius:6px;
	-moz-border-radius:6px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#d2d2d2;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:32px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
    border: 5px solid #d2d2d2;
	border-radius:6px;
	-moz-border-radius:6px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-13px;
	margin-left:-3px;
	left:124px;
	background:url(./triangle.png);
	width:19px;
	height:8px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section23 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/alley_in_autumn.jpg" alt="Alley in autumn : jQuery Picture Slider" title="Alley in autumn" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_landscape.jpg" alt="Autumn landscape : jQuery Picture Slideshow" title="Autumn landscape" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_leaf.jpg" alt="Autumn leaf : Free Picture Slider" title="Autumn leaf" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/autumn_trees.jpg" alt="Autumn trees : Javascript Picture Slider" title="Autumn trees" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/birch_trees_in_autumn.jpg" alt="Birch trees in autumn : HTML Picture Slider" title="Birch trees in autumn" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/forest_lake.jpg" alt="Forest lake : jQuery Picture Gallery" title="Forest lake" id="wows1_5"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/forest_path.jpg" alt="Forest path : CSS Picture Slider" title="Forest path" id="wows1_6"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/maple_leaf.jpg" alt="Maple leaf : jQuery Image Slider" title="Maple leaf" id="wows1_7"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/pond_in_autumn.jpg" alt="Pond in autumn : jQuery Picture Carousel" title="Pond in autumn" id="wows1_8"/></li>
<li><img src="http://www.wowslider.com/images/demo/catalyst-digital-stack/data1/images/red_leaf.jpg" alt="Red leaf : Picture Slider" title="Red leaf" id="wows1_9"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '



</div></div>
<a style="display:none" href="http://wowslider.com">photo Diaporama jquery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/catalyst-digital-stack/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=c.length>2?(k-h+1)%c.length:1;if(Math.abs(n)>=1){g=(n>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?-1:1)+"00%";var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,left:((g?i:l))});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){e("ul",b).css({left:-k+"00%"})}f.animate({left:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"})}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack",prev:"",next:"",duration:17*100,delay:25*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderquietrotate'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section24 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/quiet-rotate/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.5
 *	template Quiet
 */
@import url("http://fonts.googleapis.com/css?family=Oswald");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:15px;
	height:15px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:3px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-50px;
	z-index:60;
	height: 100px;
	width: 60px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom:-35px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	bottom: 20px;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 10%;
	left: 7%;
	margin: 9px;
	z-index: 50;
	font-family:Oswald, Impact,Charcoal, sans-serif;
	font-size: 30px;
	color: #000000;
	text-shadow: 1px 1px 1px #BBBBBB;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:10px;
	background:#fff;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	opacity:0.5;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	background:#666666;
	margin-top:10px;
	font-size: 25px;
	color: #FFFFFF;
	opacity:0.8;
	text-shadow: 1px 1px 1px #000000;
}#wowslider-container'.$val.' ul{
	animation: wsBasic 24s infinite;
	-moz-animation: wsBasic 24s infinite;
	-webkit-animation: wsBasic 24s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10.42%{left:-0%} 16.67%{left:-100%} 27.08%{left:-100%} 33.33%{left:-200%} 43.75%{left:-200%} 50%{left:-300%} 60.42%{left:-300%} 66.67%{left:-400%} 77.08%{left:-400%} 83.33%{left:-500%} 93.75%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10.42%{left:-0%} 16.67%{left:-100%} 27.08%{left:-100%} 33.33%{left:-200%} 43.75%{left:-200%} 50%{left:-300%} 60.42%{left:-300%} 66.67%{left:-400%} 77.08%{left:-400%} 83.33%{left:-500%} 93.75%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10.42%{left:-0%} 16.67%{left:-100%} 27.08%{left:-100%} 33.33%{left:-200%} 43.75%{left:-200%} 50%{left:-300%} 60.42%{left:-300%} 66.67%{left:-400%} 77.08%{left:-400%} 83.33%{left:-500%} 93.75%{left:-500%} }

#wowslider-container'.$val.' .ws_shadow{
	background: url(./shadow.png) left 100%;
	background-repeat: no-repeat;
	background-size:100%;
	width:100%;
	height:20%;
	position: absolute;
	left:0;
	bottom:-20%;
	z-index:-1;
}
* html #wowslider-container'.$val.' .ws_shadow{/*ie6*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/shadow.png", sizingMethod="scale");
}
*+html #wowslider-container'.$val.' .ws_shadow{/*ie7*/
	background:none;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/shadow.png", sizingMethod="scale");
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-5px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section24 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Albino peafowl in the park</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/white_peafowl.jpg" alt="White peafowl : Javascript Slideshow" title="White peafowl" id="wows1_0"/>Albino peafowl in the park</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/duck.jpg" alt="Duck : jQuery Image Slideshow" title="Duck" id="wows1_1"/>Duck stays near the pond</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/flamingo.jpg" alt="Flamingo : Javascript Photo Slideshow" title="Flamingo" id="wows1_2"/>Sleeping flamingo at Prague Zoo</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/nice_peafowl.jpg" alt="Nice peafowl : Javascript Slider" title="Nice peafowl" id="wows1_3"/>The peacock spreads its tail</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/swan.jpg" alt="Swan: Javascript Horizontal Slideshow" title="Swan" id="wows1_4"/>Swan is swimming on the lake</li>
<li><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/images/peafowl.jpg" alt="Peafowl : Javascript Code for Slideshow" title="Peafowl" id="wows1_5"/>Peafowl at Prague Zoo</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="White peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/white_peafowl.jpg" alt="White peafowl"/>Javascript Picture Slideshow</a>
<a href="#" title="Duck"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/duck.jpg" alt="Duck"/>Javascript Banner Slideshow</a>
<a href="#" title="Flamingo"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/flamingo.jpg" alt="Flamingo"/>Javascript Script for Slideshow</a>
<a href="#" title="Nice peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/nice_peafowl.jpg" alt="Nice peafowl"/>Javascript Gallery Slideshow</a>
<a href="#" title="Swan"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/swan.jpg" alt="Swan"/>Simple Javascript Slideshow</a>
<a href="#" title="Peafowl"><img src="http://www.wowslider.com/images/demo/quiet-rotate/data1/tooltips/peafowl.jpg" alt="Peafowl"/>JS Slideshow</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">jQuery diaporama dimages</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/quiet-rotate/engine1/script.js"></script>-->
	<script type="text/javascript">
(function(f,g,j,b){var h=/progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,c=/^([\+\-]=)?([\d+.\-]+)(.*)$/,q=/%/;var d=j.createElement("modernizr"),e=d.style;function n(s){return parseFloat(s)}function l(){var s={transformProperty:"",MozTransform:"-moz-",WebkitTransform:"-webkit-",OTransform:"-o-",msTransform:"-ms-"};for(var t in s){if(typeof e[t]!="undefined"){return s[t]}}return null}function r(){if(typeof(g.Modernizr)!=="undefined"){return Modernizr.csstransforms}var t=["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"];for(var s in t){if(e[t[s]]!==b){return true}}}var a=l(),i=a!==null?a+"transform":false,k=a!==null?a+"transform-origin":false;f.support.csstransforms=r();if(a=="-ms-"){i="msTransform";k="msTransformOrigin"}f.extend({transform:function(s){s.transform=this;this.$elem=f(s);this.applyingMatrix=false;this.matrix=null;this.height=null;this.width=null;this.outerHeight=null;this.outerWidth=null;this.boxSizingValue=null;this.boxSizingProperty=null;this.attr=null;this.transformProperty=i;this.transformOriginProperty=k}});f.extend(f.transform,{funcs:["matrix","origin","reflect","reflectX","reflectXY","reflectY","rotate","scale","scaleX","scaleY","skew","skewX","skewY","translate","translateX","translateY"]});f.fn.transform=function(s,t){return this.each(function(){var u=this.transform||new f.transform(this);if(s){u.exec(s,t)}})};f.transform.prototype={exec:function(s,t){t=f.extend(true,{forceMatrix:false,preserve:false},t);this.attr=null;if(t.preserve){s=f.extend(true,this.getAttrs(true,true),s)}else{s=f.extend(true,{},s)}this.setAttrs(s);if(f.support.csstransforms&&!t.forceMatrix){return this.execFuncs(s)}else{if(f.browser.msie||(f.support.csstransforms&&t.forceMatrix)){return this.execMatrix(s)}}return false},execFuncs:function(t){var s=[];for(var u in t){if(u=="origin"){this[u].apply(this,f.isArray(t[u])?t[u]:[t[u]])}else{if(f.inArray(u,f.transform.funcs)!==-1){s.push(this.createTransformFunc(u,t[u]))}}}this.$elem.css(i,s.join(" "));return true},execMatrix:function(z){var C,x,t;var F=this.$elem[0],B=this;function A(N,M){if(q.test(N)){return parseFloat(N)/100*B["safeOuter"+(M?"Height":"Width")]()}return o(F,N)}var s=/translate[X|Y]?/,u=[];for(var v in z){switch(f.type(z[v])){case"array":t=z[v];break;case"string":t=f.map(z[v].split(","),f.trim);break;default:t=[z[v]]}if(f.matrix[v]){if(f.cssAngle[v]){t=f.map(t,f.angle.toDegree)}else{if(!f.cssNumber[v]){t=f.map(t,A)}else{t=f.map(t,n)}}x=f.matrix[v].apply(this,t);if(s.test(v)){u.push(x)}else{C=C?C.x(x):x}}else{if(v=="origin"){this[v].apply(this,t)}}}C=C||f.matrix.identity();f.each(u,function(M,N){C=C.x(N)});var K=parseFloat(C.e(1,1).toFixed(6)),I=parseFloat(C.e(2,1).toFixed(6)),H=parseFloat(C.e(1,2).toFixed(6)),G=parseFloat(C.e(2,2).toFixed(6)),L=C.rows===3?parseFloat(C.e(1,3).toFixed(6)):0,J=C.rows===3?parseFloat(C.e(2,3).toFixed(6)):0;if(f.support.csstransforms&&a==="-moz-"){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+"px, "+J+"px)")}else{if(f.support.csstransforms){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+", "+J+")")}else{if(f.browser.msie){var w=", FilterType="nearest neighbor"";var D=this.$elem[0].style;var E="progid:DXImageTransform.Microsoft.Matrix(M11="+K+", M12="+H+", M21="+I+", M22="+G+", sizingMethod="auto expand""+w+")";var y=D.filter||f.curCSS(this.$elem[0],"filter")||"";D.filter=h.test(y)?y.replace(h,E):y?y+" "+E:E;this.applyingMatrix=true;this.matrix=C;this.fixPosition(C,L,J);this.applyingMatrix=false;this.matrix=null}}}return true},origin:function(s,t){if(f.support.csstransforms){if(typeof t==="undefined"){this.$elem.css(k,s)}else{this.$elem.css(k,s+" "+t)}return true}switch(s){case"left":s="0";break;case"right":s="100%";break;case"center":case b:s="50%"}switch(t){case"top":t="0";break;case"bottom":t="100%";break;case"center":case b:t="50%"}this.setAttr("origin",[q.test(s)?s:o(this.$elem[0],s)+"px",q.test(t)?t:o(this.$elem[0],t)+"px"]);return true},createTransformFunc:function(t,u){if(t.substr(0,7)==="reflect"){var s=u?f.matrix[t]():f.matrix.identity();return"matrix("+s.e(1,1)+", "+s.e(2,1)+", "+s.e(1,2)+", "+s.e(2,2)+", 0, 0)"}if(t=="matrix"){if(a==="-moz-"){u[4]=u[4]?u[4]+"px":0;u[5]=u[5]?u[5]+"px":0}}return t+"("+(f.isArray(u)?u.join(", "):u)+")"},fixPosition:function(B,y,x,D,s){var w=new f.matrix.calc(B,this.safeOuterHeight(),this.safeOuterWidth()),C=this.getAttr("origin");var v=w.originOffset(new f.matrix.V2(q.test(C[0])?parseFloat(C[0])/100*w.outerWidth:parseFloat(C[0]),q.test(C[1])?parseFloat(C[1])/100*w.outerHeight:parseFloat(C[1])));var t=w.sides();var u=this.$elem.css("position");if(u=="static"){u="relative"}var A={top:0,left:0};var z={position:u,top:(v.top+x+t.top+A.top)+"px",left:(v.left+y+t.left+A.left)+"px",zoom:1};this.$elem.css(z)}};function o(s,u){var t=c.exec(f.trim(u));if(t[3]&&t[3]!=="px"){var w="paddingBottom",v=f.style(s,w);f.style(s,w,u);u=p(s,w);f.style(s,w,v);return u}return parseFloat(u)}function p(t,u){if(t[u]!=null&&(!t.style||t.style[u]==null)){return t[u]}var s=parseFloat(f.css(t,u));return s&&s>-10000?s:0}})(jQuery,this,this.document);(function(d,c,a,f){d.extend(d.transform.prototype,{safeOuterHeight:function(){return this.safeOuterLength("height")},safeOuterWidth:function(){return this.safeOuterLength("width")},safeOuterLength:function(l){var p="outer"+(l=="width"?"Width":"Height");if(!d.support.csstransforms&&d.browser.msie){l=l=="width"?"width":"height";if(this.applyingMatrix&&!this[p]&&this.matrix){var k=new d.matrix.calc(this.matrix,1,1),n=k.offset(),g=this.$elem[p]()/n[l];this[p]=g;return g}else{if(this.applyingMatrix&&this[p]){return this[p]}}var o={height:["top","bottom"],width:["left","right"]};var h=this.$elem[0],j=parseFloat(d.curCSS(h,l,true)),q=this.boxSizingProperty,i=this.boxSizingValue;if(!this.boxSizingProperty){q=this.boxSizingProperty=e()||"box-sizing";i=this.boxSizingValue=this.$elem.css(q)||"content-box"}if(this[p]&&this[l]==j){return this[p]}else{this[l]=j}if(q&&(i=="padding-box"||i=="content-box")){j+=parseFloat(d.curCSS(h,"padding-"+o[l][0],true))||0+parseFloat(d.curCSS(h,"padding-"+o[l][1],true))||0}if(q&&i=="content-box"){j+=parseFloat(d.curCSS(h,"border-"+o[l][0]+"-width",true))||0+parseFloat(d.curCSS(h,"border-"+o[l][1]+"-width",true))||0}this[p]=j;return j}return this.$elem[p]()}});var b=null;function e(){if(b){return b}var h={boxSizing:"box-sizing",MozBoxSizing:"-moz-box-sizing",WebkitBoxSizing:"-webkit-box-sizing",OBoxSizing:"-o-box-sizing"},g=a.body;for(var i in h){if(typeof g.style[i]!="undefined"){b=h[i];return b}}return null}})(jQuery,this,this.document);(function(g,f,b,h){var d=/([\w\-]*?)\((.*?)\)/g,a="data-transform",e=/\s/,c=/,\s?/;g.extend(g.transform.prototype,{setAttrs:function(i){var j="",l;for(var k in i){l=i[k];if(g.isArray(l)){l=l.join(", ")}j+=" "+k+"("+l+")"}this.attr=g.trim(j);this.$elem.attr(a,this.attr)},setAttr:function(k,l){if(g.isArray(l)){l=l.join(", ")}var j=this.attr||this.$elem.attr(a);if(!j||j.indexOf(k)==-1){this.attr=g.trim(j+" "+k+"("+l+")");this.$elem.attr(a,this.attr)}else{var i=[],n;d.lastIndex=0;while(n=d.exec(j)){if(k==n[1]){i.push(k+"("+l+")")}else{i.push(n[0])}}this.attr=i.join(" ");this.$elem.attr(a,this.attr)}},getAttrs:function(){var j=this.attr||this.$elem.attr(a);if(!j){return{}}var i={},l,k;d.lastIndex=0;while((l=d.exec(j))!==null){if(l){k=l[2].split(c);i[l[1]]=k.length==1?k[0]:k}}return i},getAttr:function(j){var i=this.getAttrs();if(typeof i[j]!=="undefined"){return i[j]}if(j==="origin"&&g.support.csstransforms){return this.$elem.css(this.transformOriginProperty).split(e)}else{if(j==="origin"){return["50%","50%"]}}return g.cssDefault[j]||0}});if(typeof(g.cssAngle)=="undefined"){g.cssAngle={}}g.extend(g.cssAngle,{rotate:true,skew:true,skewX:true,skewY:true});if(typeof(g.cssDefault)=="undefined"){g.cssDefault={}}g.extend(g.cssDefault,{scale:[1,1],scaleX:1,scaleY:1,matrix:[1,0,0,1,0,0],origin:["50%","50%"],reflect:[1,0,0,1,0,0],reflectX:[1,0,0,1,0,0],reflectXY:[1,0,0,1,0,0],reflectY:[1,0,0,1,0,0]});if(typeof(g.cssMultipleValues)=="undefined"){g.cssMultipleValues={}}g.extend(g.cssMultipleValues,{matrix:6,origin:{length:2,duplicate:true},reflect:6,reflectX:6,reflectXY:6,reflectY:6,scale:{length:2,duplicate:true},skew:2,translate:2});g.extend(g.cssNumber,{matrix:true,reflect:true,reflectX:true,reflectXY:true,reflectY:true,scale:true,scaleX:true,scaleY:true});g.each(g.transform.funcs,function(j,k){g.cssHooks[k]={set:function(n,o){var l=n.transform||new g.transform(n),i={};i[k]=o;l.exec(i,{preserve:true})},get:function(n,l){var i=n.transform||new g.transform(n);return i.getAttr(k)}}});g.each(["reflect","reflectX","reflectXY","reflectY"],function(j,k){g.cssHooks[k].get=function(n,l){var i=n.transform||new g.transform(n);return i.getAttr("matrix")||g.cssDefault[k]}})})(jQuery,this,this.document);(function(e,g,h,c){var d=/^([+\-]=)?([\d+.\-]+)(.*)$/;var a=e.fn.animate;e.fn.animate=function(p,l,o,n){var k=e.speed(l,o,n),j=e.cssMultipleValues;k.complete=k.old;if(!e.isEmptyObject(p)){if(typeof k.original==="undefined"){k.original={}}e.each(p,function(s,u){if(j[s]||e.cssAngle[s]||(!e.cssNumber[s]&&e.inArray(s,e.transform.funcs)!==-1)){var t=null;if(jQuery.isArray(p[s])){var r=1,q=u.length;if(j[s]){r=(typeof j[s].length==="undefined"?j[s]:j[s].length)}if(q>r||(q<r&&q==2)||(q==2&&r==2&&isNaN(parseFloat(u[q-1])))){t=u[q-1];u.splice(q-1,1)}}k.original[s]=u.toString();p[s]=parseFloat(u)}})}return a.apply(this,[arguments[0],k])};var b="paddingBottom";function i(k,l){if(k[l]!=null&&(!k.style||k.style[l]==null)){}var j=parseFloat(e.css(k,l));return j&&j>-10000?j:0}var f=e.fx.prototype.custom;e.fx.prototype.custom=function(u,v,w){var y=e.cssMultipleValues[this.prop],p=e.cssAngle[this.prop];if(y||(!e.cssNumber[this.prop]&&e.inArray(this.prop,e.transform.funcs)!==-1)){this.values=[];if(!y){y=1}var x=this.options.original[this.prop],t=e(this.elem).css(this.prop),j=e.cssDefault[this.prop]||0;if(!e.isArray(t)){t=[t]}if(!e.isArray(x)){if(e.type(x)==="string"){x=x.split(",")}else{x=[x]}}var l=y.length||y,s=0;while(x.length<l){x.push(y.duplicate?x[0]:j[s]||0);s++}var k,r,q,o=this,n=o.elem.transform;orig=e.style(o.elem,b);e.each(x,function(z,A){if(t[z]){k=t[z]}else{if(j[z]&&!y.duplicate){k=j[z]}else{if(y.duplicate){k=t[0]}else{k=0}}}if(p){k=e.angle.toDegree(k)}else{if(!e.cssNumber[o.prop]){r=d.exec(e.trim(k));if(r[3]&&r[3]!=="px"){if(r[3]==="%"){k=parseFloat(r[2])/100*n["safeOuter"+(z?"Height":"Width")]()}else{e.style(o.elem,b,k);k=i(o.elem,b);e.style(o.elem,b,orig)}}}}k=parseFloat(k);r=d.exec(e.trim(A));if(r){q=parseFloat(r[2]);w=r[3]||"px";if(p){q=e.angle.toDegree(q+w);w="deg"}else{if(!e.cssNumber[o.prop]&&w==="%"){k=(k/n["safeOuter"+(z?"Height":"Width")]())*100}else{if(!e.cssNumber[o.prop]&&w!=="px"){e.style(o.elem,b,(q||1)+w);k=((q||1)/i(o.elem,b))*k;e.style(o.elem,b,orig)}}}if(r[1]){q=((r[1]==="-="?-1:1)*q)+k}}else{q=A;w=""}o.values.push({start:k,end:q,unit:w})})}return f.apply(this,arguments)};e.fx.multipleValueStep={_default:function(j){e.each(j.values,function(k,l){j.values[k].now=l.start+((l.end-l.start)*j.pos)})}};e.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){e.fx.multipleValueStep[k]=function(n){var p=n.decomposed,l=e.matrix;m=l.identity();p.now={};e.each(p.start,function(q){p.now[q]=parseFloat(p.start[q])+((parseFloat(p.end[q])-parseFloat(p.start[q]))*n.pos);if(((q==="scaleX"||q==="scaleY")&&p.now[q]===1)||(q!=="scaleX"&&q!=="scaleY"&&p.now[q]===0)){return true}m=m.x(l[q](p.now[q]))});var o;e.each(n.values,function(q){switch(q){case 0:o=parseFloat(m.e(1,1).toFixed(6));break;case 1:o=parseFloat(m.e(2,1).toFixed(6));break;case 2:o=parseFloat(m.e(1,2).toFixed(6));break;case 3:o=parseFloat(m.e(2,2).toFixed(6));break;case 4:o=parseFloat(m.e(1,3).toFixed(6));break;case 5:o=parseFloat(m.e(2,3).toFixed(6));break}n.values[q].now=o})}});e.each(e.transform.funcs,function(j,k){e.fx.step[k]=function(o){var n=o.elem.transform||new e.transform(o.elem),l={};if(e.cssMultipleValues[k]||(!e.cssNumber[k]&&e.inArray(k,e.transform.funcs)!==-1)){(e.fx.multipleValueStep[o.prop]||e.fx.multipleValueStep._default)(o);l[o.prop]=[];e.each(o.values,function(p,q){l[o.prop].push(q.now+(e.cssNumber[o.prop]?"":q.unit))})}else{l[o.prop]=o.now+(e.cssNumber[o.prop]?"":o.unit)}n.exec(l,{preserve:true})}});e.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){e.fx.step[k]=function(q){var p=q.elem.transform||new e.transform(q.elem),o={};if(!q.initialized){q.initialized=true;if(k!=="matrix"){var n=e.matrix[k]().elements;var r;e.each(q.values,function(s){switch(s){case 0:r=n[0];break;case 1:r=n[2];break;case 2:r=n[1];break;case 3:r=n[3];break;default:r=0}q.values[s].end=r})}q.decomposed={};var l=q.values;q.decomposed.start=e.matrix.matrix(l[0].start,l[1].start,l[2].start,l[3].start,l[4].start,l[5].start).decompose();q.decomposed.end=e.matrix.matrix(l[0].end,l[1].end,l[2].end,l[3].end,l[4].end,l[5].end).decompose()}(e.fx.multipleValueStep[q.prop]||e.fx.multipleValueStep._default)(q);o.matrix=[];e.each(q.values,function(s,t){o.matrix.push(t.now)});p.exec(o,{preserve:true})}})})(jQuery,this,this.document);(function(g,h,j,c){var d=180/Math.PI;var k=200/Math.PI;var f=Math.PI/180;var e=2/1.8;var i=0.9;var a=Math.PI/200;var b=/^([+\-]=)?([\d+.\-]+)(.*)$/;g.extend({angle:{runit:/(deg|g?rad)/,radianToDegree:function(l){return l*d},radianToGrad:function(l){return l*k},degreeToRadian:function(l){return l*f},degreeToGrad:function(l){return l*e},gradToDegree:function(l){return l*i},gradToRadian:function(l){return l*a},toDegree:function(n){var l=b.exec(n);if(l){n=parseFloat(l[2]);switch(l[3]||"deg"){case"grad":n=g.angle.gradToDegree(n);break;case"rad":n=g.angle.radianToDegree(n);break}return n}return 0}}})})(jQuery,this,this.document);(function(f,e,b,g){if(typeof(f.matrix)=="undefined"){f.extend({matrix:{}})}var d=f.matrix;f.extend(d,{V2:function(h,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,2)}else{this.elements=[h,i]}this.length=2},V3:function(h,j,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,3)}else{this.elements=[h,j,i]}this.length=3},M2x2:function(i,h,k,j){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,4)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,4)}this.rows=2;this.cols=2},M3x3:function(n,l,k,j,i,h,q,p,o){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,9)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,9)}this.rows=3;this.cols=3}});var c={e:function(k,h){var i=this.rows,j=this.cols;if(k>i||h>i||k<1||h<1){return 0}return this.elements[(k-1)*j+h-1]},decompose:function(){var v=this.e(1,1),t=this.e(2,1),q=this.e(1,2),p=this.e(2,2),o=this.e(1,3),n=this.e(2,3);if(Math.abs(v*p-t*q)<0.01){return{rotate:0+"deg",skewX:0+"deg",scaleX:1,scaleY:1,translateX:0+"px",translateY:0+"px"}}var l=o,j=n;var u=Math.sqrt(v*v+t*t);v=v/u;t=t/u;var i=v*q+t*p;q-=v*i;p-=t*i;var s=Math.sqrt(q*q+p*p);q=q/s;p=p/s;i=i/s;if((v*p-t*q)<0){v=-v;t=-t;u=-u}var w=f.angle.radianToDegree;var h=w(Math.atan2(t,v));i=w(Math.atan(i));return{rotate:h+"deg",skewX:i+"deg",scaleX:u,scaleY:s,translateX:l+"px",translateY:j+"px"}}};f.extend(d.M2x2.prototype,c,{toM3x3:function(){var h=this.elements;return new d.M3x3(h[0],h[1],0,h[2],h[3],0,0,0,1)},x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows==3){return this.toM3x3().x(j)}var i=this.elements,h=j.elements;if(k&&h.length==2){return new d.V2(i[0]*h[0]+i[1]*h[1],i[2]*h[0]+i[3]*h[1])}else{if(h.length==i.length){return new d.M2x2(i[0]*h[0]+i[1]*h[2],i[0]*h[1]+i[1]*h[3],i[2]*h[0]+i[3]*h[2],i[2]*h[1]+i[3]*h[3])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M2x2(i*h[3],i*-h[1],i*-h[2],i*h[0])},determinant:function(){var h=this.elements;return h[0]*h[3]-h[1]*h[2]}});f.extend(d.M3x3.prototype,c,{x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows<3){j=j.toM3x3()}var i=this.elements,h=j.elements;if(k&&h.length==3){return new d.V3(i[0]*h[0]+i[1]*h[1]+i[2]*h[2],i[3]*h[0]+i[4]*h[1]+i[5]*h[2],i[6]*h[0]+i[7]*h[1]+i[8]*h[2])}else{if(h.length==i.length){return new d.M3x3(i[0]*h[0]+i[1]*h[3]+i[2]*h[6],i[0]*h[1]+i[1]*h[4]+i[2]*h[7],i[0]*h[2]+i[1]*h[5]+i[2]*h[8],i[3]*h[0]+i[4]*h[3]+i[5]*h[6],i[3]*h[1]+i[4]*h[4]+i[5]*h[7],i[3]*h[2]+i[4]*h[5]+i[5]*h[8],i[6]*h[0]+i[7]*h[3]+i[8]*h[6],i[6]*h[1]+i[7]*h[4]+i[8]*h[7],i[6]*h[2]+i[7]*h[5]+i[8]*h[8])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M3x3(i*(h[8]*h[4]-h[7]*h[5]),i*(-(h[8]*h[1]-h[7]*h[2])),i*(h[5]*h[1]-h[4]*h[2]),i*(-(h[8]*h[3]-h[6]*h[5])),i*(h[8]*h[0]-h[6]*h[2]),i*(-(h[5]*h[0]-h[3]*h[2])),i*(h[7]*h[3]-h[6]*h[4]),i*(-(h[7]*h[0]-h[6]*h[1])),i*(h[4]*h[0]-h[3]*h[1]))},determinant:function(){var h=this.elements;return h[0]*(h[8]*h[4]-h[7]*h[5])-h[3]*(h[8]*h[1]-h[7]*h[2])+h[6]*(h[5]*h[1]-h[4]*h[2])}});var a={e:function(h){return this.elements[h-1]}};f.extend(d.V2.prototype,a);f.extend(d.V3.prototype,a)})(jQuery,this,this.document);(function(c,b,a,d){if(typeof(c.matrix)=="undefined"){c.extend({matrix:{}})}c.extend(c.matrix,{calc:function(e,f,g){this.matrix=e;this.outerHeight=f;this.outerWidth=g}});c.matrix.calc.prototype={coord:function(e,i,h){h=typeof(h)!=="undefined"?h:0;var g=this.matrix,f;switch(g.rows){case 2:f=g.x(new c.matrix.V2(e,i));break;case 3:f=g.x(new c.matrix.V3(e,i,h));break}return f},corners:function(e,h){var f=!(typeof(e)!=="undefined"||typeof(h)!=="undefined"),g;if(!this.c||!f){h=h||this.outerHeight;e=e||this.outerWidth;g={tl:this.coord(0,0),bl:this.coord(0,h),tr:this.coord(e,0),br:this.coord(e,h)}}else{g=this.c}if(f){this.c=g}return g},sides:function(e){var f=e||this.corners();return{top:Math.min(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),bottom:Math.max(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),left:Math.min(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1)),right:Math.max(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1))}},offset:function(e){var f=this.sides(e);return{height:Math.abs(f.bottom-f.top),width:Math.abs(f.right-f.left)}},area:function(e){var h=e||this.corners();var g={x:h.tr.e(1)-h.tl.e(1)+h.br.e(1)-h.bl.e(1),y:h.tr.e(2)-h.tl.e(2)+h.br.e(2)-h.bl.e(2)},f={x:h.bl.e(1)-h.tl.e(1)+h.br.e(1)-h.tr.e(1),y:h.bl.e(2)-h.tl.e(2)+h.br.e(2)-h.tr.e(2)};return 0.25*Math.abs(g.e(1)*f.e(2)-g.e(2)*f.e(1))},nonAffinity:function(){var f=this.sides(),g=f.top-f.bottom,e=f.left-f.right;return parseFloat(parseFloat(Math.abs((Math.pow(g,2)+Math.pow(e,2))/(f.top*f.bottom+f.left*f.right))).toFixed(8))},originOffset:function(h,g){h=h?h:new c.matrix.V2(this.outerWidth*0.5,this.outerHeight*0.5);g=g?g:new c.matrix.V2(0,0);var e=this.coord(h.e(1),h.e(2));var f=this.coord(g.e(1),g.e(2));return{top:(f.e(2)-g.e(2))-(e.e(2)-h.e(2)),left:(f.e(1)-g.e(1))-(e.e(1)-h.e(1))}}}})(jQuery,this,this.document);(function(e,d,a,f){if(typeof(e.matrix)=="undefined"){e.extend({matrix:{}})}var c=e.matrix,g=c.M2x2,b=c.M3x3;e.extend(c,{identity:function(k){k=k||2;var l=k*k,n=new Array(l),j=k+1;for(var h=0;h<l;h++){n[h]=(h%j)===0?1:0}return new c["M"+k+"x"+k](n)},matrix:function(){var h=Array.prototype.slice.call(arguments);switch(arguments.length){case 4:return new g(h[0],h[2],h[1],h[3]);case 6:return new b(h[0],h[2],h[4],h[1],h[3],h[5],0,0,1)}},reflect:function(){return new g(-1,0,0,-1)},reflectX:function(){return new g(1,0,0,-1)},reflectXY:function(){return new g(0,1,1,0)},reflectY:function(){return new g(-1,0,0,1)},rotate:function(l){var i=e.angle.degreeToRadian(l),k=Math.cos(i),n=Math.sin(i);var j=k,h=n,p=-n,o=k;return new g(j,p,h,o)},scale:function(i,h){i=i||i===0?i:1;h=h||h===0?h:i;return new g(i,0,0,h)},scaleX:function(h){return c.scale(h,1)},scaleY:function(h){return c.scale(1,h)},skew:function(k,i){k=k||0;i=i||0;var l=e.angle.degreeToRadian(k),j=e.angle.degreeToRadian(i),h=Math.tan(l),n=Math.tan(j);return new g(1,h,n,1)},skewX:function(h){return c.skew(h)},skewY:function(h){return c.skew(0,h)},translate:function(i,h){i=i||0;h=h||0;return new b(1,0,i,0,1,h,0,0,1)},translateX:function(h){return c.translate(h)},translateY:function(h){return c.translate(0,h)}})})(jQuery,this,this.document);
function ws_rotate(c,a,b){var f=jQuery;var d=f("ul",b);var g={position:"absolute",left:0,top:0,width:"100%"};var e;this.go=function(h,i){if(e){e.stop(true,true)}e=f(a.get(h)).clone().css(g).hide().appendTo(b);if(!c.noCross){var j=f(a.get(i)).clone().css(g).appendTo(b);d.hide();j.animate({rotate:c.rotateOut||180,scale:c.scaleOut||10,opacity:"hide"},{duration:c.duration,easing:"easeInOutExpo",complete:function(){f(this).remove()}})}e.css({scale:c.scaleIn||10,rotate:c.rotateIn||(-180),zIndex:10});e.animate({opacity:"show",rotate:0,scale:1},{duration:c.duration,easing:"easeInOutExpo",queue:false,complete:function(){d.css({left:-h+"00%"}).show();f(this).remove();e=0}});return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"rotate",prev:"",next:"",duration:15*100,delay:25*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderelementalslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section25 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/elemental-slices/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 9px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:11px;
	height:11px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:5px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-20px;
	z-index:60;
	height: 45px;
	width: 45px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	opacity: 0.8;	
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:21px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:21px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	opacity: 1;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	opacity: 1;
}  
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 17px;
	left: 0px;
	margin: 9px;
	margin-left: 0px;
	margin-right: 9px; 
	padding:8px;
	background:#FFFFFF;
	color:#5D5D5D;
	z-index: 50;
	font-family:"Open Sans",Arial,Helvetica,sans-serif;
	font-size: 18px;
	border-radius:5px;
	-moz-border-radius:0 10px 10px 0;
	border-radius:0 10px 10px 0;   
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
	-moz-box-shadow: 0 0 2px #5D5D5D;
    box-shadow: 0 0 2px #5D5D5D; 
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 14px;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 6px;
    right: 6px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 1716s infinite;
	-moz-animation: wsBasic 1716s infinite;
	-webkit-animation: wsBasic 1716s infinite;
}
@keyframes wsBasic{0%{left:-0%} 0.12%{left:-0%} 0.19%{left:-100%} 0.31%{left:-100%} 0.38%{left:-200%} 0.5%{left:-200%} 0.58%{left:-300%} 0.69%{left:-300%} 0.77%{left:-400%} 0.89%{left:-400%} 0.96%{left:-500%} 1.08%{left:-500%} 1.15%{left:-600%} 1.27%{left:-600%} 1.35%{left:-700%} 1.46%{left:-700%} 1.54%{left:-800%} 1.66%{left:-800%} 1.73%{left:-900%} 1.85%{left:-900%} 1.92%{left:-1000%} 2.04%{left:-1000%} 2.12%{left:-1100%} 2.23%{left:-1100%} 2.31%{left:-1200%} 2.42%{left:-1200%} }
@-moz-keyframes wsBasic{0%{left:-0%} 0.12%{left:-0%} 0.19%{left:-100%} 0.31%{left:-100%} 0.38%{left:-200%} 0.5%{left:-200%} 0.58%{left:-300%} 0.69%{left:-300%} 0.77%{left:-400%} 0.89%{left:-400%} 0.96%{left:-500%} 1.08%{left:-500%} 1.15%{left:-600%} 1.27%{left:-600%} 1.35%{left:-700%} 1.46%{left:-700%} 1.54%{left:-800%} 1.66%{left:-800%} 1.73%{left:-900%} 1.85%{left:-900%} 1.92%{left:-1000%} 2.04%{left:-1000%} 2.12%{left:-1100%} 2.23%{left:-1100%} 2.31%{left:-1200%} 2.42%{left:-1200%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 0.12%{left:-0%} 0.19%{left:-100%} 0.31%{left:-100%} 0.38%{left:-200%} 0.5%{left:-200%} 0.58%{left:-300%} 0.69%{left:-300%} 0.77%{left:-400%} 0.89%{left:-400%} 0.96%{left:-500%} 1.08%{left:-500%} 1.15%{left:-600%} 1.27%{left:-600%} 1.35%{left:-700%} 1.46%{left:-700%} 1.54%{left:-800%} 1.66%{left:-800%} 1.73%{left:-900%} 1.85%{left:-900%} 1.92%{left:-1000%} 2.04%{left:-1000%} 2.12%{left:-1100%} 2.23%{left:-1100%} 2.31%{left:-1200%} 2.42%{left:-1200%} }

#wowslider-container'.$val.' .ws_images {
    border-radius: 4px; 
}
#wowslider-container'.$val.' .ws_effect img{
	border-radius: 4px;
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFF;
	border-radius:5px;
	-moz-border-radius:5px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:18px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFF;
	border-radius:5px;
	-moz-border-radius:5px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-10px;
	margin-left:-6px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section25 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
							
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/elemental-slices/data1/images/lily.jpg" alt="lily" title="lily" id="wows1_0"/></li>
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
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">CSS Diaporama jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/elemental-slices/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_slices(i,f,g){var c=jQuery;var e=function(p,v){var o=c.extend({},{effect:"random",slices:15,animSpeed:500,pauseTime:3000,startSlide:0,container:null,onEffectEnd:0},v);var r={currentSlide:0,currentImage:"",totalSlides:0,randAnim:"",stop:false};var m=c(p);m.data("wow:vars",r);if(!/absolute|relative/.test(m.css("position"))){m.css("position","relative")}var k=v.container||m;var n=m.children();r.totalSlides=n.length;if(o.startSlide>0){if(o.startSlide>=r.totalSlides){o.startSlide=r.totalSlides-1}r.currentSlide=o.startSlide}if(c(n[r.currentSlide]).is("img")){r.currentImage=c(n[r.currentSlide])}else{r.currentImage=c(n[r.currentSlide]).find("img:first")}if(c(n[r.currentSlide]).is("a")){c(n[r.currentSlide]).css("display","block")}for(var q=0;q<o.slices;q++){var u=Math.round(k.width()/o.slices);var t=c("<div class="wow-slice"></div>").css({left:u*q+"px",overflow:"hidden",width:((q==o.slices-1)?(k.width()-(u*q)):u)+"px",position:"absolute"}).appendTo(k);c("<img>").css({position:"absolute",left:0,top:0}).appendTo(t)}var l=0;this.sliderRun=function(w,x){if(r.busy){return false}o.effect=x||o.effect;r.currentSlide=w-1;s(m,n,o,false);return true};var j=function(){if(o.onEffectEnd){o.onEffectEnd(r.currentSlide)}k.hide();r.busy=0};var s=function(w,x,z,B){var C=w.data("wow:vars");if((!C||C.stop)&&!B){return false}C.busy=1;C.currentSlide++;if(C.currentSlide==C.totalSlides){C.currentSlide=0}if(C.currentSlide<0){C.currentSlide=(C.totalSlides-1)}C.currentImage=c(x[C.currentSlide]);if(!C.currentImage.is("img")){C.currentImage=C.currentImage.find("img:first")}c(".wow-slice",k).each(function(H){var J=c(this),G=c("img",J);var I=Math.round(k.width()/z.slices);G.width(k.width());G.attr("src",C.currentImage.attr("src"));G.css({left:-I*H+"px"});J.css({height:"0px",opacity:"0",left:I*H+"px",width:((H==z.slices-1)?(k.width()-(I*H)):I)+"px",})});k.show();if(z.effect=="random"){var D=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDownRight","sliceUpDownLeft","fold","fade");C.randAnim=D[Math.floor(Math.random()*(D.length+1))];if(C.randAnim==undefined){C.randAnim="fade"}}if(z.effect.indexOf(",")!=-1){var D=z.effect.split(",");C.randAnim=c.trim(D[Math.floor(Math.random()*D.length)])}if(z.effect=="sliceDown"||z.effect=="sliceDownRight"||C.randAnim=="sliceDownRight"||z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:0,bottom:""});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUp"||z.effect=="sliceUpRight"||C.randAnim=="sliceUpRight"||z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:"",bottom:0});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUpDown"||z.effect=="sliceUpDownRight"||C.randAnim=="sliceUpDownRight"||z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){var y=0;var A=0;var E=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);if(A==0){G.css({top:0,bottom:""});A++}else{G.css({top:"",bottom:0});A=0}if(E==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;E++})}else{if(z.effect=="fold"||C.randAnim=="fold"){var y=0;var A=0;c(".wow-slice",k).each(function(){var G=c(this);var H=G.width();G.css({top:"0px",height:"100%",width:"0px"});if(A==z.slices-1){setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="fade"||C.randAnim=="fade"){var A=0;c(".wow-slice",k).each(function(){c(this).css("height","100%");if(A==z.slices-1){c(this).animate({opacity:"1.0"},(z.animSpeed*2),j)}else{c(this).animate({opacity:"1.0"},(z.animSpeed*2))}A++})}}}}}}};c.fn._reverse=[].reverse;var a=c("li",g);var d=c("ul",g);var b=c("<div></div>").css({left:0,top:0,"z-index":8,width:"100%",height:"100%",position:"absolute"}).appendTo(g);var h=new e(d,{keyboardNav:false,caption:0,effect:"sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpLeft,sliceUpDownRight,sliceUpDownLeft,sliceUpDownRight,sliceUpDownLeft,fold,fold,fold",animSpeed:i.duration,startSlide:i.startSlide,container:b,onEffectEnd:function(j){d.css({left:-j+"00%"})}});this.go=function(k,j){var l=h.sliderRun(k);if(l){return k}else{return -1}}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"slices",prev:"",next:"",duration:13*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidershadystackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section26 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/shady-stack-v/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto 50px;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:4px;
	width:22px;
	height:20px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-28px;
	z-index:60;
	height: 50px;
	width: 51px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	/*max-height:20%;
	max-width:12%;
	background-size:200% 200%;*/

}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:50px;
	left: 0;
	margin-right:10px;
	z-index: 50;
	padding:12px;
	color: #F9FBFB;
	text-transform:uppercase;
	background:#2a2a2a;
    font-family: Franklin Gothic Medium,sans-serif;
	font-size: 18px;
	line-height: 18px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 13px;
	text-transform:none;
}
/* bottom center */
#wowslider-container'.$val.' .ws_bullets {
	top:0;
    right: 0;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 60s infinite;
	-moz-animation: wsBasic 60s infinite;
	-webkit-animation: wsBasic 60s infinite;
}
@keyframes wsBasic{0%{left:-0%} 3.33%{left:-0%} 6.67%{left:-100%} 10%{left:-100%} 13.33%{left:-200%} 16.67%{left:-200%} 20%{left:-300%} 23.33%{left:-300%} 26.67%{left:-400%} 30%{left:-400%} 33.33%{left:-500%} 36.67%{left:-500%} 40%{left:-600%} 43.33%{left:-600%} 46.67%{left:-700%} 50%{left:-700%} 53.33%{left:-800%} 56.67%{left:-800%} 60%{left:-900%} 63.33%{left:-900%} 66.67%{left:-1000%} 70%{left:-1000%} 73.33%{left:-1100%} 76.67%{left:-1100%} 80%{left:-1200%} 83.33%{left:-1200%} 86.67%{left:-1300%} 90%{left:-1300%} 93.33%{left:-1400%} 96.67%{left:-1400%} }
@-moz-keyframes wsBasic{0%{left:-0%} 3.33%{left:-0%} 6.67%{left:-100%} 10%{left:-100%} 13.33%{left:-200%} 16.67%{left:-200%} 20%{left:-300%} 23.33%{left:-300%} 26.67%{left:-400%} 30%{left:-400%} 33.33%{left:-500%} 36.67%{left:-500%} 40%{left:-600%} 43.33%{left:-600%} 46.67%{left:-700%} 50%{left:-700%} 53.33%{left:-800%} 56.67%{left:-800%} 60%{left:-900%} 63.33%{left:-900%} 66.67%{left:-1000%} 70%{left:-1000%} 73.33%{left:-1100%} 76.67%{left:-1100%} 80%{left:-1200%} 83.33%{left:-1200%} 86.67%{left:-1300%} 90%{left:-1300%} 93.33%{left:-1400%} 96.67%{left:-1400%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 3.33%{left:-0%} 6.67%{left:-100%} 10%{left:-100%} 13.33%{left:-200%} 16.67%{left:-200%} 20%{left:-300%} 23.33%{left:-300%} 26.67%{left:-400%} 30%{left:-400%} 33.33%{left:-500%} 36.67%{left:-500%} 40%{left:-600%} 43.33%{left:-600%} 46.67%{left:-700%} 50%{left:-700%} 53.33%{left:-800%} 56.67%{left:-800%} 60%{left:-900%} 63.33%{left:-900%} 66.67%{left:-1000%} 70%{left:-1000%} 73.33%{left:-1100%} 76.67%{left:-1100%} 80%{left:-1200%} 83.33%{left:-1200%} 86.67%{left:-1300%} 90%{left:-1300%} 93.33%{left:-1400%} 96.67%{left:-1400%} }

#wowslider-container'.$val.' .ws_shadow{
	width:135%;
	height:45%;
	position: absolute;
	left:-19.5%;
	bottom:-30%;
	z-index:-1;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/shadow.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background: url(./shadow.png) left 100%;
	background-size:100%;
	filter:"";
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:16px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000;
    border: 5px solid #a4a4a4;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#a4a4a4;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #000000;
    box-shadow: 0 0 5px #000000;
    border: 5px solid #a4a4a4;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-10px;
	margin-left:-2px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section26 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Bream Bay From The Brynderwyn Ranges</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/shady-stack-v/data1/images/bream_bay.jpg" alt="Bream bay" title="Bream bay" id="wows1_0"/>Bream Bay From The Brynderwyn Ranges</li>
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
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '


</div></div>
<a style="display:none" href="http://wowslider.com">Réactif jquery Diaporama</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/shady-stack-v/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack_vertical(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=(k-h+1)%c.length;if(Math.abs(m)>=1){g=(m>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?1:-1)+"00%";c.each(function(o){if(g&&o!=h){this.style.zIndex=(Math.max(0,this.style.zIndex-1))}});var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,top:(g?i:l)});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){e("ul",b).css({left:-k+"00%"})}f.animate({top:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"})}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack_vertical",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernumericbasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section27 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/numeric-basic/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	font:14px/32px Arial,Helvetica,sans-serif; 
	color:#3D3D3D;
	text-align:center;
	margin-left:-3px;
	width:32px;
	height:32px;
	background: url(./bullet.png) left top;
	float: left; 
	position:relative;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: right top;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-21px;
	z-index:60;
	height: 43px;
	width: 29px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:55px;
	left: 0px;
	margin-right:5px;
	z-index: 50;
	padding:12px;
	color: #3D3D3D;
	text-transform:uppercase;
	background:#fff;
    font-family: Arial,Helvetica,sans-serif;
	font-size: 18px;
	-moz-border-radius:0 5px 5px 0;
	border-radius:0 5px 5px 0; 
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
	text-transform:none;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 735s infinite;
	-moz-animation: wsBasic 735s infinite;
	-webkit-animation: wsBasic 735s infinite;
}
@keyframes wsBasic{0%{left:-0%} 0.34%{left:-0%} 0.41%{left:-100%} 0.75%{left:-100%} 0.82%{left:-200%} 1.16%{left:-200%} 1.22%{left:-300%} 1.56%{left:-300%} 1.63%{left:-400%} 1.97%{left:-400%} 2.04%{left:-500%} 2.38%{left:-500%} 2.45%{left:-600%} 2.79%{left:-600%} 2.86%{left:-700%} 3.2%{left:-700%} 3.27%{left:-800%} 3.61%{left:-800%} 3.67%{left:-900%} 4.01%{left:-900%} 4.08%{left:-1000%} 4.42%{left:-1000%} 4.49%{left:-1100%} 4.83%{left:-1100%} 4.9%{left:-1200%} 5.24%{left:-1200%} 5.31%{left:-1300%} 5.65%{left:-1300%} }
@-moz-keyframes wsBasic{0%{left:-0%} 0.34%{left:-0%} 0.41%{left:-100%} 0.75%{left:-100%} 0.82%{left:-200%} 1.16%{left:-200%} 1.22%{left:-300%} 1.56%{left:-300%} 1.63%{left:-400%} 1.97%{left:-400%} 2.04%{left:-500%} 2.38%{left:-500%} 2.45%{left:-600%} 2.79%{left:-600%} 2.86%{left:-700%} 3.2%{left:-700%} 3.27%{left:-800%} 3.61%{left:-800%} 3.67%{left:-900%} 4.01%{left:-900%} 4.08%{left:-1000%} 4.42%{left:-1000%} 4.49%{left:-1100%} 4.83%{left:-1100%} 4.9%{left:-1200%} 5.24%{left:-1200%} 5.31%{left:-1300%} 5.65%{left:-1300%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 0.34%{left:-0%} 0.41%{left:-100%} 0.75%{left:-100%} 0.82%{left:-200%} 1.16%{left:-200%} 1.22%{left:-300%} 1.56%{left:-300%} 1.63%{left:-400%} 1.97%{left:-400%} 2.04%{left:-500%} 2.38%{left:-500%} 2.45%{left:-600%} 2.79%{left:-600%} 2.86%{left:-700%} 3.2%{left:-700%} 3.27%{left:-800%} 3.61%{left:-800%} 3.67%{left:-900%} 4.01%{left:-900%} 4.08%{left:-1000%} 4.42%{left:-1000%} 4.49%{left:-1100%} 4.83%{left:-1100%} 4.9%{left:-1200%} 5.24%{left:-1200%} 5.31%{left:-1300%} 5.65%{left:-1300%} }

#wowslider-container'.$val.' {
	margin:5px auto 5px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-0.52%;
	top:-1.39%;
	width:101.04%;
	height:102.78%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:25px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #3D3D3D;
    box-shadow: 0 0 5px #3D3D3D;
    border: 5px solid #ffffff;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#ffffff;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:35px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #3D3D3D;
    box-shadow: 0 0 5px #3D3D3D;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
    border: 5px solid #ffffff;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-17px;
	margin-left:2px;
	left:120px;
	background:url(./triangle.png);
	width:20px;
	height:12px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section27 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/numeric-basic/data1/images/amazing_sunset.jpg" alt="amazing sunset : HTML5 Image Gallery" title="amazing sunset" id="wows1_0"/></li>
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
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">galerie HTML5</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/numeric-basic/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic(c,a,b){this.go=function(d){b.find("ul").stop(true).animate({left:(d?-d+"00%":0)},c.duration,"easeInOutExpo");return d}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic",prev:"",next:"",duration:5*100,delay:25*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		/*}elseif ($conf_value == 'wowslideraquaflip'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section28 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/aqua-flip/engine1/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section28 -->
	<div id="wowslider-container'.$val.'">
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
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/aqua-flip/engine1/script.js"></script>-->
	<script type="text/javascript">
(function(f,g,j,b){var h=/progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,c=/^([\+\-]=)?([\d+.\-]+)(.*)$/,q=/%/;var d=j.createElement("modernizr"),e=d.style;function n(s){return parseFloat(s)}function l(){var s={transformProperty:"",MozTransform:"-moz-",WebkitTransform:"-webkit-",OTransform:"-o-",msTransform:"-ms-"};for(var t in s){if(typeof e[t]!="undefined"){return s[t]}}return null}function r(){if(typeof(g.Modernizr)!=="undefined"){return Modernizr.csstransforms}var t=["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"];for(var s in t){if(e[t[s]]!==b){return true}}}var a=l(),i=a!==null?a+"transform":false,k=a!==null?a+"transform-origin":false;f.support.csstransforms=r();if(a=="-ms-"){i="msTransform";k="msTransformOrigin"}f.extend({transform:function(s){s.transform=this;this.$elem=f(s);this.applyingMatrix=false;this.matrix=null;this.height=null;this.width=null;this.outerHeight=null;this.outerWidth=null;this.boxSizingValue=null;this.boxSizingProperty=null;this.attr=null;this.transformProperty=i;this.transformOriginProperty=k}});f.extend(f.transform,{funcs:["matrix","origin","reflect","reflectX","reflectXY","reflectY","rotate","scale","scaleX","scaleY","skew","skewX","skewY","translate","translateX","translateY"]});f.fn.transform=function(s,t){return this.each(function(){var u=this.transform||new f.transform(this);if(s){u.exec(s,t)}})};f.transform.prototype={exec:function(s,t){t=f.extend(true,{forceMatrix:false,preserve:false},t);this.attr=null;if(t.preserve){s=f.extend(true,this.getAttrs(true,true),s)}else{s=f.extend(true,{},s)}this.setAttrs(s);if(f.support.csstransforms&&!t.forceMatrix){return this.execFuncs(s)}else{if(f.browser.msie||(f.support.csstransforms&&t.forceMatrix)){return this.execMatrix(s)}}return false},execFuncs:function(t){var s=[];for(var u in t){if(u=="origin"){this[u].apply(this,f.isArray(t[u])?t[u]:[t[u]])}else{if(f.inArray(u,f.transform.funcs)!==-1){s.push(this.createTransformFunc(u,t[u]))}}}this.$elem.css(i,s.join(" "));return true},execMatrix:function(z){var C,x,t;var F=this.$elem[0],B=this;function A(N,M){if(q.test(N)){return parseFloat(N)/100*B["safeOuter"+(M?"Height":"Width")]()}return o(F,N)}var s=/translate[X|Y]?/,u=[];for(var v in z){switch(f.type(z[v])){case"array":t=z[v];break;case"string":t=f.map(z[v].split(","),f.trim);break;default:t=[z[v]]}if(f.matrix[v]){if(f.cssAngle[v]){t=f.map(t,f.angle.toDegree)}else{if(!f.cssNumber[v]){t=f.map(t,A)}else{t=f.map(t,n)}}x=f.matrix[v].apply(this,t);if(s.test(v)){u.push(x)}else{C=C?C.x(x):x}}else{if(v=="origin"){this[v].apply(this,t)}}}C=C||f.matrix.identity();f.each(u,function(M,N){C=C.x(N)});var K=parseFloat(C.e(1,1).toFixed(6)),I=parseFloat(C.e(2,1).toFixed(6)),H=parseFloat(C.e(1,2).toFixed(6)),G=parseFloat(C.e(2,2).toFixed(6)),L=C.rows===3?parseFloat(C.e(1,3).toFixed(6)):0,J=C.rows===3?parseFloat(C.e(2,3).toFixed(6)):0;if(f.support.csstransforms&&a==="-moz-"){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+"px, "+J+"px)")}else{if(f.support.csstransforms){this.$elem.css(i,"matrix("+K+", "+I+", "+H+", "+G+", "+L+", "+J+")")}else{if(f.browser.msie){var w=", FilterType="nearest neighbor"";var D=this.$elem[0].style;var E="progid:DXImageTransform.Microsoft.Matrix(M11="+K+", M12="+H+", M21="+I+", M22="+G+", sizingMethod="auto expand""+w+")";var y=D.filter||f.curCSS(this.$elem[0],"filter")||"";D.filter=h.test(y)?y.replace(h,E):y?y+" "+E:E;this.applyingMatrix=true;this.matrix=C;this.fixPosition(C,L,J);this.applyingMatrix=false;this.matrix=null}}}return true},origin:function(s,t){if(f.support.csstransforms){if(typeof t==="undefined"){this.$elem.css(k,s)}else{this.$elem.css(k,s+" "+t)}return true}switch(s){case"left":s="0";break;case"right":s="100%";break;case"center":case b:s="50%"}switch(t){case"top":t="0";break;case"bottom":t="100%";break;case"center":case b:t="50%"}this.setAttr("origin",[q.test(s)?s:o(this.$elem[0],s)+"px",q.test(t)?t:o(this.$elem[0],t)+"px"]);return true},createTransformFunc:function(t,u){if(t.substr(0,7)==="reflect"){var s=u?f.matrix[t]():f.matrix.identity();return"matrix("+s.e(1,1)+", "+s.e(2,1)+", "+s.e(1,2)+", "+s.e(2,2)+", 0, 0)"}if(t=="matrix"){if(a==="-moz-"){u[4]=u[4]?u[4]+"px":0;u[5]=u[5]?u[5]+"px":0}}return t+"("+(f.isArray(u)?u.join(", "):u)+")"},fixPosition:function(B,y,x,D,s){var w=new f.matrix.calc(B,this.safeOuterHeight(),this.safeOuterWidth()),C=this.getAttr("origin");var v=w.originOffset(new f.matrix.V2(q.test(C[0])?parseFloat(C[0])/100*w.outerWidth:parseFloat(C[0]),q.test(C[1])?parseFloat(C[1])/100*w.outerHeight:parseFloat(C[1])));var t=w.sides();var u=this.$elem.css("position");if(u=="static"){u="relative"}var A={top:0,left:0};var z={position:u,top:(v.top+x+t.top+A.top)+"px",left:(v.left+y+t.left+A.left)+"px",zoom:1};this.$elem.css(z)}};function o(s,u){var t=c.exec(f.trim(u));if(t[3]&&t[3]!=="px"){var w="paddingBottom",v=f.style(s,w);f.style(s,w,u);u=p(s,w);f.style(s,w,v);return u}return parseFloat(u)}function p(t,u){if(t[u]!=null&&(!t.style||t.style[u]==null)){return t[u]}var s=parseFloat(f.css(t,u));return s&&s>-10000?s:0}})(jQuery,this,this.document);(function(d,c,a,f){d.extend(d.transform.prototype,{safeOuterHeight:function(){return this.safeOuterLength("height")},safeOuterWidth:function(){return this.safeOuterLength("width")},safeOuterLength:function(l){var p="outer"+(l=="width"?"Width":"Height");if(!d.support.csstransforms&&d.browser.msie){l=l=="width"?"width":"height";if(this.applyingMatrix&&!this[p]&&this.matrix){var k=new d.matrix.calc(this.matrix,1,1),n=k.offset(),g=this.$elem[p]()/n[l];this[p]=g;return g}else{if(this.applyingMatrix&&this[p]){return this[p]}}var o={height:["top","bottom"],width:["left","right"]};var h=this.$elem[0],j=parseFloat(d.curCSS(h,l,true)),q=this.boxSizingProperty,i=this.boxSizingValue;if(!this.boxSizingProperty){q=this.boxSizingProperty=e()||"box-sizing";i=this.boxSizingValue=this.$elem.css(q)||"content-box"}if(this[p]&&this[l]==j){return this[p]}else{this[l]=j}if(q&&(i=="padding-box"||i=="content-box")){j+=parseFloat(d.curCSS(h,"padding-"+o[l][0],true))||0+parseFloat(d.curCSS(h,"padding-"+o[l][1],true))||0}if(q&&i=="content-box"){j+=parseFloat(d.curCSS(h,"border-"+o[l][0]+"-width",true))||0+parseFloat(d.curCSS(h,"border-"+o[l][1]+"-width",true))||0}this[p]=j;return j}return this.$elem[p]()}});var b=null;function e(){if(b){return b}var h={boxSizing:"box-sizing",MozBoxSizing:"-moz-box-sizing",WebkitBoxSizing:"-webkit-box-sizing",OBoxSizing:"-o-box-sizing"},g=a.body;for(var i in h){if(typeof g.style[i]!="undefined"){b=h[i];return b}}return null}})(jQuery,this,this.document);(function(g,f,b,h){var d=/([\w\-]*?)\((.*?)\)/g,a="data-transform",e=/\s/,c=/,\s?/;g.extend(g.transform.prototype,{setAttrs:function(i){var j="",l;for(var k in i){l=i[k];if(g.isArray(l)){l=l.join(", ")}j+=" "+k+"("+l+")"}this.attr=g.trim(j);this.$elem.attr(a,this.attr)},setAttr:function(k,l){if(g.isArray(l)){l=l.join(", ")}var j=this.attr||this.$elem.attr(a);if(!j||j.indexOf(k)==-1){this.attr=g.trim(j+" "+k+"("+l+")");this.$elem.attr(a,this.attr)}else{var i=[],n;d.lastIndex=0;while(n=d.exec(j)){if(k==n[1]){i.push(k+"("+l+")")}else{i.push(n[0])}}this.attr=i.join(" ");this.$elem.attr(a,this.attr)}},getAttrs:function(){var j=this.attr||this.$elem.attr(a);if(!j){return{}}var i={},l,k;d.lastIndex=0;while((l=d.exec(j))!==null){if(l){k=l[2].split(c);i[l[1]]=k.length==1?k[0]:k}}return i},getAttr:function(j){var i=this.getAttrs();if(typeof i[j]!=="undefined"){return i[j]}if(j==="origin"&&g.support.csstransforms){return this.$elem.css(this.transformOriginProperty).split(e)}else{if(j==="origin"){return["50%","50%"]}}return g.cssDefault[j]||0}});if(typeof(g.cssAngle)=="undefined"){g.cssAngle={}}g.extend(g.cssAngle,{rotate:true,skew:true,skewX:true,skewY:true});if(typeof(g.cssDefault)=="undefined"){g.cssDefault={}}g.extend(g.cssDefault,{scale:[1,1],scaleX:1,scaleY:1,matrix:[1,0,0,1,0,0],origin:["50%","50%"],reflect:[1,0,0,1,0,0],reflectX:[1,0,0,1,0,0],reflectXY:[1,0,0,1,0,0],reflectY:[1,0,0,1,0,0]});if(typeof(g.cssMultipleValues)=="undefined"){g.cssMultipleValues={}}g.extend(g.cssMultipleValues,{matrix:6,origin:{length:2,duplicate:true},reflect:6,reflectX:6,reflectXY:6,reflectY:6,scale:{length:2,duplicate:true},skew:2,translate:2});g.extend(g.cssNumber,{matrix:true,reflect:true,reflectX:true,reflectXY:true,reflectY:true,scale:true,scaleX:true,scaleY:true});g.each(g.transform.funcs,function(j,k){g.cssHooks[k]={set:function(n,o){var l=n.transform||new g.transform(n),i={};i[k]=o;l.exec(i,{preserve:true})},get:function(n,l){var i=n.transform||new g.transform(n);return i.getAttr(k)}}});g.each(["reflect","reflectX","reflectXY","reflectY"],function(j,k){g.cssHooks[k].get=function(n,l){var i=n.transform||new g.transform(n);return i.getAttr("matrix")||g.cssDefault[k]}})})(jQuery,this,this.document);(function(e,g,h,c){var d=/^([+\-]=)?([\d+.\-]+)(.*)$/;var a=e.fn.animate;e.fn.animate=function(p,l,o,n){var k=e.speed(l,o,n),j=e.cssMultipleValues;k.complete=k.old;if(!e.isEmptyObject(p)){if(typeof k.original==="undefined"){k.original={}}e.each(p,function(s,u){if(j[s]||e.cssAngle[s]||(!e.cssNumber[s]&&e.inArray(s,e.transform.funcs)!==-1)){var t=null;if(jQuery.isArray(p[s])){var r=1,q=u.length;if(j[s]){r=(typeof j[s].length==="undefined"?j[s]:j[s].length)}if(q>r||(q<r&&q==2)||(q==2&&r==2&&isNaN(parseFloat(u[q-1])))){t=u[q-1];u.splice(q-1,1)}}k.original[s]=u.toString();p[s]=parseFloat(u)}})}return a.apply(this,[arguments[0],k])};var b="paddingBottom";function i(k,l){if(k[l]!=null&&(!k.style||k.style[l]==null)){}var j=parseFloat(e.css(k,l));return j&&j>-10000?j:0}var f=e.fx.prototype.custom;e.fx.prototype.custom=function(u,v,w){var y=e.cssMultipleValues[this.prop],p=e.cssAngle[this.prop];if(y||(!e.cssNumber[this.prop]&&e.inArray(this.prop,e.transform.funcs)!==-1)){this.values=[];if(!y){y=1}var x=this.options.original[this.prop],t=e(this.elem).css(this.prop),j=e.cssDefault[this.prop]||0;if(!e.isArray(t)){t=[t]}if(!e.isArray(x)){if(e.type(x)==="string"){x=x.split(",")}else{x=[x]}}var l=y.length||y,s=0;while(x.length<l){x.push(y.duplicate?x[0]:j[s]||0);s++}var k,r,q,o=this,n=o.elem.transform;orig=e.style(o.elem,b);e.each(x,function(z,A){if(t[z]){k=t[z]}else{if(j[z]&&!y.duplicate){k=j[z]}else{if(y.duplicate){k=t[0]}else{k=0}}}if(p){k=e.angle.toDegree(k)}else{if(!e.cssNumber[o.prop]){r=d.exec(e.trim(k));if(r[3]&&r[3]!=="px"){if(r[3]==="%"){k=parseFloat(r[2])/100*n["safeOuter"+(z?"Height":"Width")]()}else{e.style(o.elem,b,k);k=i(o.elem,b);e.style(o.elem,b,orig)}}}}k=parseFloat(k);r=d.exec(e.trim(A));if(r){q=parseFloat(r[2]);w=r[3]||"px";if(p){q=e.angle.toDegree(q+w);w="deg"}else{if(!e.cssNumber[o.prop]&&w==="%"){k=(k/n["safeOuter"+(z?"Height":"Width")]())*100}else{if(!e.cssNumber[o.prop]&&w!=="px"){e.style(o.elem,b,(q||1)+w);k=((q||1)/i(o.elem,b))*k;e.style(o.elem,b,orig)}}}if(r[1]){q=((r[1]==="-="?-1:1)*q)+k}}else{q=A;w=""}o.values.push({start:k,end:q,unit:w})})}return f.apply(this,arguments)};e.fx.multipleValueStep={_default:function(j){e.each(j.values,function(k,l){j.values[k].now=l.start+((l.end-l.start)*j.pos)})}};e.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){e.fx.multipleValueStep[k]=function(n){var p=n.decomposed,l=e.matrix;m=l.identity();p.now={};e.each(p.start,function(q){p.now[q]=parseFloat(p.start[q])+((parseFloat(p.end[q])-parseFloat(p.start[q]))*n.pos);if(((q==="scaleX"||q==="scaleY")&&p.now[q]===1)||(q!=="scaleX"&&q!=="scaleY"&&p.now[q]===0)){return true}m=m.x(l[q](p.now[q]))});var o;e.each(n.values,function(q){switch(q){case 0:o=parseFloat(m.e(1,1).toFixed(6));break;case 1:o=parseFloat(m.e(2,1).toFixed(6));break;case 2:o=parseFloat(m.e(1,2).toFixed(6));break;case 3:o=parseFloat(m.e(2,2).toFixed(6));break;case 4:o=parseFloat(m.e(1,3).toFixed(6));break;case 5:o=parseFloat(m.e(2,3).toFixed(6));break}n.values[q].now=o})}});e.each(e.transform.funcs,function(j,k){e.fx.step[k]=function(o){var n=o.elem.transform||new e.transform(o.elem),l={};if(e.cssMultipleValues[k]||(!e.cssNumber[k]&&e.inArray(k,e.transform.funcs)!==-1)){(e.fx.multipleValueStep[o.prop]||e.fx.multipleValueStep._default)(o);l[o.prop]=[];e.each(o.values,function(p,q){l[o.prop].push(q.now+(e.cssNumber[o.prop]?"":q.unit))})}else{l[o.prop]=o.now+(e.cssNumber[o.prop]?"":o.unit)}n.exec(l,{preserve:true})}});e.each(["matrix","reflect","reflectX","reflectXY","reflectY"],function(j,k){e.fx.step[k]=function(q){var p=q.elem.transform||new e.transform(q.elem),o={};if(!q.initialized){q.initialized=true;if(k!=="matrix"){var n=e.matrix[k]().elements;var r;e.each(q.values,function(s){switch(s){case 0:r=n[0];break;case 1:r=n[2];break;case 2:r=n[1];break;case 3:r=n[3];break;default:r=0}q.values[s].end=r})}q.decomposed={};var l=q.values;q.decomposed.start=e.matrix.matrix(l[0].start,l[1].start,l[2].start,l[3].start,l[4].start,l[5].start).decompose();q.decomposed.end=e.matrix.matrix(l[0].end,l[1].end,l[2].end,l[3].end,l[4].end,l[5].end).decompose()}(e.fx.multipleValueStep[q.prop]||e.fx.multipleValueStep._default)(q);o.matrix=[];e.each(q.values,function(s,t){o.matrix.push(t.now)});p.exec(o,{preserve:true})}})})(jQuery,this,this.document);(function(g,h,j,c){var d=180/Math.PI;var k=200/Math.PI;var f=Math.PI/180;var e=2/1.8;var i=0.9;var a=Math.PI/200;var b=/^([+\-]=)?([\d+.\-]+)(.*)$/;g.extend({angle:{runit:/(deg|g?rad)/,radianToDegree:function(l){return l*d},radianToGrad:function(l){return l*k},degreeToRadian:function(l){return l*f},degreeToGrad:function(l){return l*e},gradToDegree:function(l){return l*i},gradToRadian:function(l){return l*a},toDegree:function(n){var l=b.exec(n);if(l){n=parseFloat(l[2]);switch(l[3]||"deg"){case"grad":n=g.angle.gradToDegree(n);break;case"rad":n=g.angle.radianToDegree(n);break}return n}return 0}}})})(jQuery,this,this.document);(function(f,e,b,g){if(typeof(f.matrix)=="undefined"){f.extend({matrix:{}})}var d=f.matrix;f.extend(d,{V2:function(h,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,2)}else{this.elements=[h,i]}this.length=2},V3:function(h,j,i){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,3)}else{this.elements=[h,j,i]}this.length=3},M2x2:function(i,h,k,j){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,4)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,4)}this.rows=2;this.cols=2},M3x3:function(n,l,k,j,i,h,q,p,o){if(f.isArray(arguments[0])){this.elements=arguments[0].slice(0,9)}else{this.elements=Array.prototype.slice.call(arguments).slice(0,9)}this.rows=3;this.cols=3}});var c={e:function(k,h){var i=this.rows,j=this.cols;if(k>i||h>i||k<1||h<1){return 0}return this.elements[(k-1)*j+h-1]},decompose:function(){var v=this.e(1,1),t=this.e(2,1),q=this.e(1,2),p=this.e(2,2),o=this.e(1,3),n=this.e(2,3);if(Math.abs(v*p-t*q)<0.01){return{rotate:0+"deg",skewX:0+"deg",scaleX:1,scaleY:1,translateX:0+"px",translateY:0+"px"}}var l=o,j=n;var u=Math.sqrt(v*v+t*t);v=v/u;t=t/u;var i=v*q+t*p;q-=v*i;p-=t*i;var s=Math.sqrt(q*q+p*p);q=q/s;p=p/s;i=i/s;if((v*p-t*q)<0){v=-v;t=-t;u=-u}var w=f.angle.radianToDegree;var h=w(Math.atan2(t,v));i=w(Math.atan(i));return{rotate:h+"deg",skewX:i+"deg",scaleX:u,scaleY:s,translateX:l+"px",translateY:j+"px"}}};f.extend(d.M2x2.prototype,c,{toM3x3:function(){var h=this.elements;return new d.M3x3(h[0],h[1],0,h[2],h[3],0,0,0,1)},x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows==3){return this.toM3x3().x(j)}var i=this.elements,h=j.elements;if(k&&h.length==2){return new d.V2(i[0]*h[0]+i[1]*h[1],i[2]*h[0]+i[3]*h[1])}else{if(h.length==i.length){return new d.M2x2(i[0]*h[0]+i[1]*h[2],i[0]*h[1]+i[1]*h[3],i[2]*h[0]+i[3]*h[2],i[2]*h[1]+i[3]*h[3])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M2x2(i*h[3],i*-h[1],i*-h[2],i*h[0])},determinant:function(){var h=this.elements;return h[0]*h[3]-h[1]*h[2]}});f.extend(d.M3x3.prototype,c,{x:function(j){var k=typeof(j.rows)==="undefined";if(!k&&j.rows<3){j=j.toM3x3()}var i=this.elements,h=j.elements;if(k&&h.length==3){return new d.V3(i[0]*h[0]+i[1]*h[1]+i[2]*h[2],i[3]*h[0]+i[4]*h[1]+i[5]*h[2],i[6]*h[0]+i[7]*h[1]+i[8]*h[2])}else{if(h.length==i.length){return new d.M3x3(i[0]*h[0]+i[1]*h[3]+i[2]*h[6],i[0]*h[1]+i[1]*h[4]+i[2]*h[7],i[0]*h[2]+i[1]*h[5]+i[2]*h[8],i[3]*h[0]+i[4]*h[3]+i[5]*h[6],i[3]*h[1]+i[4]*h[4]+i[5]*h[7],i[3]*h[2]+i[4]*h[5]+i[5]*h[8],i[6]*h[0]+i[7]*h[3]+i[8]*h[6],i[6]*h[1]+i[7]*h[4]+i[8]*h[7],i[6]*h[2]+i[7]*h[5]+i[8]*h[8])}}return false},inverse:function(){var i=1/this.determinant(),h=this.elements;return new d.M3x3(i*(h[8]*h[4]-h[7]*h[5]),i*(-(h[8]*h[1]-h[7]*h[2])),i*(h[5]*h[1]-h[4]*h[2]),i*(-(h[8]*h[3]-h[6]*h[5])),i*(h[8]*h[0]-h[6]*h[2]),i*(-(h[5]*h[0]-h[3]*h[2])),i*(h[7]*h[3]-h[6]*h[4]),i*(-(h[7]*h[0]-h[6]*h[1])),i*(h[4]*h[0]-h[3]*h[1]))},determinant:function(){var h=this.elements;return h[0]*(h[8]*h[4]-h[7]*h[5])-h[3]*(h[8]*h[1]-h[7]*h[2])+h[6]*(h[5]*h[1]-h[4]*h[2])}});var a={e:function(h){return this.elements[h-1]}};f.extend(d.V2.prototype,a);f.extend(d.V3.prototype,a)})(jQuery,this,this.document);(function(c,b,a,d){if(typeof(c.matrix)=="undefined"){c.extend({matrix:{}})}c.extend(c.matrix,{calc:function(e,f,g){this.matrix=e;this.outerHeight=f;this.outerWidth=g}});c.matrix.calc.prototype={coord:function(e,i,h){h=typeof(h)!=="undefined"?h:0;var g=this.matrix,f;switch(g.rows){case 2:f=g.x(new c.matrix.V2(e,i));break;case 3:f=g.x(new c.matrix.V3(e,i,h));break}return f},corners:function(e,h){var f=!(typeof(e)!=="undefined"||typeof(h)!=="undefined"),g;if(!this.c||!f){h=h||this.outerHeight;e=e||this.outerWidth;g={tl:this.coord(0,0),bl:this.coord(0,h),tr:this.coord(e,0),br:this.coord(e,h)}}else{g=this.c}if(f){this.c=g}return g},sides:function(e){var f=e||this.corners();return{top:Math.min(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),bottom:Math.max(f.tl.e(2),f.tr.e(2),f.br.e(2),f.bl.e(2)),left:Math.min(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1)),right:Math.max(f.tl.e(1),f.tr.e(1),f.br.e(1),f.bl.e(1))}},offset:function(e){var f=this.sides(e);return{height:Math.abs(f.bottom-f.top),width:Math.abs(f.right-f.left)}},area:function(e){var h=e||this.corners();var g={x:h.tr.e(1)-h.tl.e(1)+h.br.e(1)-h.bl.e(1),y:h.tr.e(2)-h.tl.e(2)+h.br.e(2)-h.bl.e(2)},f={x:h.bl.e(1)-h.tl.e(1)+h.br.e(1)-h.tr.e(1),y:h.bl.e(2)-h.tl.e(2)+h.br.e(2)-h.tr.e(2)};return 0.25*Math.abs(g.e(1)*f.e(2)-g.e(2)*f.e(1))},nonAffinity:function(){var f=this.sides(),g=f.top-f.bottom,e=f.left-f.right;return parseFloat(parseFloat(Math.abs((Math.pow(g,2)+Math.pow(e,2))/(f.top*f.bottom+f.left*f.right))).toFixed(8))},originOffset:function(h,g){h=h?h:new c.matrix.V2(this.outerWidth*0.5,this.outerHeight*0.5);g=g?g:new c.matrix.V2(0,0);var e=this.coord(h.e(1),h.e(2));var f=this.coord(g.e(1),g.e(2));return{top:(f.e(2)-g.e(2))-(e.e(2)-h.e(2)),left:(f.e(1)-g.e(1))-(e.e(1)-h.e(1))}}}})(jQuery,this,this.document);(function(e,d,a,f){if(typeof(e.matrix)=="undefined"){e.extend({matrix:{}})}var c=e.matrix,g=c.M2x2,b=c.M3x3;e.extend(c,{identity:function(k){k=k||2;var l=k*k,n=new Array(l),j=k+1;for(var h=0;h<l;h++){n[h]=(h%j)===0?1:0}return new c["M"+k+"x"+k](n)},matrix:function(){var h=Array.prototype.slice.call(arguments);switch(arguments.length){case 4:return new g(h[0],h[2],h[1],h[3]);case 6:return new b(h[0],h[2],h[4],h[1],h[3],h[5],0,0,1)}},reflect:function(){return new g(-1,0,0,-1)},reflectX:function(){return new g(1,0,0,-1)},reflectXY:function(){return new g(0,1,1,0)},reflectY:function(){return new g(-1,0,0,1)},rotate:function(l){var i=e.angle.degreeToRadian(l),k=Math.cos(i),n=Math.sin(i);var j=k,h=n,p=-n,o=k;return new g(j,p,h,o)},scale:function(i,h){i=i||i===0?i:1;h=h||h===0?h:i;return new g(i,0,0,h)},scaleX:function(h){return c.scale(h,1)},scaleY:function(h){return c.scale(1,h)},skew:function(k,i){k=k||0;i=i||0;var l=e.angle.degreeToRadian(k),j=e.angle.degreeToRadian(i),h=Math.tan(l),n=Math.tan(j);return new g(1,h,n,1)},skewX:function(h){return c.skew(h)},skewY:function(h){return c.skew(0,h)},translate:function(i,h){i=i||0;h=h||0;return new b(1,0,i,0,1,h,0,0,1)},translateX:function(h){return c.translate(h)},translateY:function(h){return c.translate(0,h)}})})(jQuery,this,this.document);
function ws_flip(c,m,e){var f=jQuery;var s=f.browser.msie&&parseInt(f.browser.version,10)<9;var l=c.cols||Math.round(c.width/90);var k=c.rows||Math.round(c.height/30);var h=f("<div></div>");e.append(h);h.css({position:"absolute",left:0,top:0,width:"100%",height:"100%"});var q=[];var a=[l*0.7,l*2.5];var n=[[],[]];function p(j,y,z){if(!j[z]){j[z]=[]}j[z][j[z].length]=y}for(var g=0;g<l*k;g++){var u=g%l,t=Math.floor(g/l);var o=Math.round(c.width*(u)/l),v=Math.round(c.height*(t)/k);var r=q[g]=document.createElement("div");f(r).css({position:"absolute","background-position":-o+"px -"+v+"px"}).appendTo(h);p(n[0],r,2*t+u);p(n[1],r,Math.abs(g-(l*k>>1)))}function x(){var B=h.width();var D=h.height();for(var C=0;C<l*k;C++){var A=C%l,z=Math.floor(C/l);var G=Math.round(B*(A)/l),E=Math.round(D*(z)/k),y=Math.round(B*(A+1)/l)-G,F=Math.round(D*(z+1)/k)-E;f(q[C]).css({width:y+"px",height:F+"px",left:G+"px",top:E+"px"}).data({width:y,height:F})}}function d(y,j,i){if(s){y.each(function(z,A){A=f(A);A.animate({width:A.data("width")*0.8+"px",height:0},{easing:"easeInOutCubic",duration:j,complete:i})})}else{y.animate({scaleX:0.8,scaleY:-1},{easing:"easeInOutCubic",duration:j,complete:i})}}function b(y,j,i){if(s){y.each(function(z,A){A=f(A);A.animate({width:A.data("width")+"px",height:A.data("height")+"px"},{easing:"easeInOutCubic",duration:j,complete:i})})}else{y.animate({scaleX:1,scaleY:1},{easing:"easeInOutCubic",duration:j,complete:function(){y.css({"-o-transform":"none"});if(i){i()}}})}}var w;this.go=function(B,j){if(w){return -1}w=1;x();var i=("type" in c)?c.type:Math.round(Math.random()*(n.length-1));f(q).stop(1,1).css({opacity:1,"z-index":3,"background-image":'url("'+m.get(j).src+'")'});h.show();var A=f("ul",e);A.find("img").css({visibility:"hidden"});var F=n[i];var E=Math.round(a[i]);var C=c.duration*0.9/(F.length+2*E);var y=C*E;if(!s){y/=2}var z=0;function D(){if(z<F.length){d(f(F[z]),y)}var I=z-E;if(I>=0&&I<F.length){var H=f(F[I]);var G;if(I>=F.length-1){G=function(){if(w){A.css({left:-B+"00%"}).find("img").css({visibility:"visible"});h.hide();w=0}}}b(H,y,G);H.css("background-image",'url("'+m.get(B).src+'")')}z++;if(z-E<F.length){setTimeout(D,C)}}D();return B}}jQuery.extend(jQuery.easing,{easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a}});
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"flip",prev:"",next:"",duration:30*100,delay:10*100,width:960,height:360,autoPlay:true,stopOnHover:true,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0,onBeforeStep:function(curIdx,count){return (curIdx+1 + Math.floor((count-1)*Math.random()))},startSlide: Math.round(Math.random()*999999999)});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		*/}elseif ($conf_value == 'wowsliderterseblur'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section29 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/terse-blur/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:1px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:22px;
	height:20px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -9999px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%; 
}

#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-16px;
	z-index:60;
	height: 50px;
	width: 39px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0;  
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:25px;
	left: 0;
	margin-right:5px;
	z-index: 50;
	background: #FFF;
    color: #000;
	padding: 10px;
	font-size: 19px;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	text-shadow: 1px 1px 0 #fff;
    opacity: 0.7;    
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 13px;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	top:0;
    right: 0;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:18px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 1px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 1px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-7px;
	margin-left:3px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	
		<!-- Start WOWSlider.com BODY section29 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_51.jpg" alt="Mercedes Benz : jQuery Banner Rotator" title="Mercedes Benz" id="wows0"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/zenvost1danishsupercar.jpg" alt="Zenvo ST1 - Danish super car : jQuery Rotator" title="Zenvo ST1 - Danish super car" id="wows1"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/car023.jpg" alt="Concept Cars : jQuery random Image Rotator" title="Concept Cars" id="wows2"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_18.jpg" alt="Chevrolet Camaro : jQuery Image Rotator With Description" title="Chevrolet Camaro" id="wows3"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/audilocusconceptcaraudilocus1680x1260.jpg" alt="Audi Locus : jQuery Image Rotator With Text" title="Audi Locus" id="wows4"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/street_cars_wallpaper_ferraristreetcarwallpaper.jpg" alt="Ferrari : Html5 Image Rotator" title="Ferrari" id="wows5"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/cars_wallpapers_15.jpg" alt="Street Cars : Header Image Rotator" title="Street Cars" id="wows6"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/gtravalanche06_07.jpg" alt="Racing cars : jQuery Image Rotator Plugin" title="Racing cars" id="wows7"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/muscle.jpg" alt="Muscle cars : jQuery Banner Rotator Fade" title="Muscle cars" id="wows8"/></li>
<li><img src="http://www.wowslider.com/images/demo/terse-blur/data1/images/maseratimc12racingcar.jpg" alt="Maserati-MC12 : Automatic Image Rotator" title="Maserati-MC12" id="wows9"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">jQuery Bilder Rotator HTML5 Banner Rotator</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/terse-blur/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_blur(p,n,c){var h=jQuery;var b=!p.noCanvas&&!window.opera&&!!document.createElement("canvas").getContext;if(b){try{document.createElement("canvas").getContext("2d").getImageData(0,0,1,1)}catch(m){b=0}}var d;function k(q,e,r){q.css({opacity:0,visibility:"visible"});q.animate({opacity:1},e,"linear",r)}function i(q,e,r){q.animate({opacity:0},e,"linear",r)}var l;this.go=function(e,q){if(l){return -1}l=1;var u=h(n.get(q)),s=h(n.get(e));var t;if(b){if(!d){d="<canvas width="'+c.width()+'" height="'+c.height()+'"/>";d=h(d+d).css({"z-index":8,position:"absolute",width:"100%",height:"100%",left:0,top:0,visibility:"hidden"}).appendTo(c)}t=g(u,30,d.get(0))}if(b&&t){var r=g(s,30,d.get(1));k(t,p.duration/3,function(){c.find("ul").css({visibility:"hidden"});i(t,p.duration/6);k(r,p.duration/6,function(){t.css({visibility:"hidden"});c.find("ul").css({left:-e+"00%"}).css({visibility:"visible"});i(r,p.duration/2,function(){l=0})})})}else{b=0;t=g(u,8);t.fadeIn(p.duration/3,"linear",function(){c.find("ul").css({left:-e+"00%"});t.fadeOut(p.duration/3,"linear",function(){t.remove();l=0})})}return e};function g(v,u,q){var A=(parseInt(v.parent().css("z-index"))||0)+1;if(b){var D=q.getContext("2d");D.drawImage(v.get(0),0,0);if(!j(D,0,0,q.width,q.height,u)){return 0}return h(q)}var E=h("<div></div>").css({position:"absolute","z-index":A,left:0,top:0,width:"100%",height:"100%",display:"none"}).appendTo(c);var C=(Math.sqrt(5)+1)/2;var s=1-C/2;for(var t=0;s*t<u;t++){var w=Math.PI*C*t;var e=(s*t+1);var B=e*Math.cos(w);var z=e*Math.sin(w);h(document.createElement("img")).attr("src",v.attr("src")).css({opacity:1/(t/1.8+1),position:"absolute","z-index":A,left:Math.round(B)+"px",top:Math.round(z)+"px",width:"100%",height:"100%"}).appendTo(E)}return E}var o=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];var a=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];function j(ah,P,N,q,r,Y){if(isNaN(Y)||Y<1){return}Y|=0;var ac;try{ac=ah.getImageData(P,N,q,r)}catch(ag){console.log("error:unable to access image data: "+ag);return false}var v=ac.data;var W,V,ae,ab,E,H,B,t,u,M,C,O,K,S,X,F,A,G,I,R;var af=Y+Y+1;var T=q<<2;var D=q-1;var aa=r-1;var z=Y+1;var Z=z*(z+1)/2;var Q=new f();var L=Q;for(ae=1;ae<af;ae++){L=L.next=new f();if(ae==z){var w=L}}L.next=Q;var ad=null;var U=null;B=H=0;var J=o[Y];var s=a[Y];for(V=0;V<r;V++){S=X=F=t=u=M=0;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}for(ae=1;ae<z;ae++){ab=H+((D<ae?D:ae)<<2);t+=(L.r=(A=v[ab]))*(R=z-ae);u+=(L.g=(G=v[ab+1]))*R;M+=(L.b=(I=v[ab+2]))*R;S+=A;X+=G;F+=I;L=L.next}ad=Q;U=w;for(W=0;W<q;W++){v[H]=(t*J)>>s;v[H+1]=(u*J)>>s;v[H+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(B+((ab=W+Y+1)<D?ab:D))<<2;S+=(ad.r=v[ab]);X+=(ad.g=v[ab+1]);F+=(ad.b=v[ab+2]);t+=S;u+=X;M+=F;ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=4}B+=q}for(W=0;W<q;W++){X=F=S=u=M=t=0;H=W<<2;C=z*(A=v[H]);O=z*(G=v[H+1]);K=z*(I=v[H+2]);t+=Z*A;u+=Z*G;M+=Z*I;L=Q;for(ae=0;ae<z;ae++){L.r=A;L.g=G;L.b=I;L=L.next}E=q;for(ae=1;ae<=Y;ae++){H=(E+W)<<2;t+=(L.r=(A=v[H]))*(R=z-ae);u+=(L.g=(G=v[H+1]))*R;M+=(L.b=(I=v[H+2]))*R;S+=A;X+=G;F+=I;L=L.next;if(ae<aa){E+=q}}H=W;ad=Q;U=w;for(V=0;V<r;V++){ab=H<<2;v[ab]=(t*J)>>s;v[ab+1]=(u*J)>>s;v[ab+2]=(M*J)>>s;t-=C;u-=O;M-=K;C-=ad.r;O-=ad.g;K-=ad.b;ab=(W+(((ab=V+z)<aa?ab:aa)*q))<<2;t+=(S+=(ad.r=v[ab]));u+=(X+=(ad.g=v[ab+1]));M+=(F+=(ad.b=v[ab+2]));ad=ad.next;C+=(A=U.r);O+=(G=U.g);K+=(I=U.b);S-=A;X-=G;F-=I;U=U.next;H+=q}}ah.putImageData(ac,P,N);return true}function f(){this.r=0;this.g=0;this.b=0;this.a=0;this.next=null}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blur",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermacstack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section30 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/mac-stack/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:15px;
	height:15px;
	background: url(./icons/bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:3px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 45px;
	width: 45px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:11px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:11px;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 0px;
	left: 0px;
	margin: 9px;
	padding:15px;
	background:#FFFFFF;
	color:#333333;
	z-index: 50;
	font-family:"Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
	font-size: 14px;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=90);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 54s infinite;
	-moz-animation: wsBasic 54s infinite;
	-webkit-animation: wsBasic 54s infinite;
}
@keyframes wsBasic{0%{left:-0%} 3.7%{left:-0%} 5.56%{left:-100%} 9.26%{left:-100%} 11.11%{left:-200%} 14.81%{left:-200%} 16.67%{left:-300%} 20.37%{left:-300%} 22.22%{left:-400%} 25.93%{left:-400%} 27.78%{left:-500%} 31.48%{left:-500%} 33.33%{left:-600%} 37.04%{left:-600%} 38.89%{left:-700%} 42.59%{left:-700%} 44.44%{left:-800%} 48.15%{left:-800%} 50%{left:-900%} 53.7%{left:-900%} 55.56%{left:-1000%} 59.26%{left:-1000%} 61.11%{left:-1100%} 64.81%{left:-1100%} 66.67%{left:-1200%} 70.37%{left:-1200%} 72.22%{left:-1300%} 75.93%{left:-1300%} 77.78%{left:-1400%} 81.48%{left:-1400%} 83.33%{left:-1500%} 87.04%{left:-1500%} 88.89%{left:-1600%} 92.59%{left:-1600%} 94.44%{left:-1700%} 98.15%{left:-1700%} }
@-moz-keyframes wsBasic{0%{left:-0%} 3.7%{left:-0%} 5.56%{left:-100%} 9.26%{left:-100%} 11.11%{left:-200%} 14.81%{left:-200%} 16.67%{left:-300%} 20.37%{left:-300%} 22.22%{left:-400%} 25.93%{left:-400%} 27.78%{left:-500%} 31.48%{left:-500%} 33.33%{left:-600%} 37.04%{left:-600%} 38.89%{left:-700%} 42.59%{left:-700%} 44.44%{left:-800%} 48.15%{left:-800%} 50%{left:-900%} 53.7%{left:-900%} 55.56%{left:-1000%} 59.26%{left:-1000%} 61.11%{left:-1100%} 64.81%{left:-1100%} 66.67%{left:-1200%} 70.37%{left:-1200%} 72.22%{left:-1300%} 75.93%{left:-1300%} 77.78%{left:-1400%} 81.48%{left:-1400%} 83.33%{left:-1500%} 87.04%{left:-1500%} 88.89%{left:-1600%} 92.59%{left:-1600%} 94.44%{left:-1700%} 98.15%{left:-1700%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 3.7%{left:-0%} 5.56%{left:-100%} 9.26%{left:-100%} 11.11%{left:-200%} 14.81%{left:-200%} 16.67%{left:-300%} 20.37%{left:-300%} 22.22%{left:-400%} 25.93%{left:-400%} 27.78%{left:-500%} 31.48%{left:-500%} 33.33%{left:-600%} 37.04%{left:-600%} 38.89%{left:-700%} 42.59%{left:-700%} 44.44%{left:-800%} 48.15%{left:-800%} 50%{left:-900%} 53.7%{left:-900%} 55.56%{left:-1000%} 59.26%{left:-1000%} 61.11%{left:-1100%} 64.81%{left:-1100%} 66.67%{left:-1200%} 70.37%{left:-1200%} 72.22%{left:-1300%} 75.93%{left:-1300%} 77.78%{left:-1400%} 81.48%{left:-1400%} 83.33%{left:-1500%} 87.04%{left:-1500%} 88.89%{left:-1600%} 92.59%{left:-1600%} 94.44%{left:-1700%} 98.15%{left:-1700%} }

#wowslider-container'.$val.' {
	margin:9px auto 17px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-1.04%;
	top:-2.5%;
	width:102.08%;
	height:107.22%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFF;
	border-radius:5px;
	-moz-border-radius:5px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:18px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    border: 4px solid #FFF;
	border-radius:5px;
	-moz-border-radius:5px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-10px;
	margin-left:-4px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section30 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/rainbowchicks.jpg" alt="Rainbow Chicks : jQuery Carousel" title="Rainbow Chicks" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/tegu.jpg" alt="Tegu : jQuery Carousel With Text" title="Tegu" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/otter.jpg" alt="Otter : jQuery Ajax Carousel" title="Otter" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/sleepingkitties.jpg" alt="Sleeping Kitties : jQuery Carousel Pagination" title="Sleeping Kitties" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/alone.jpg" alt="Puppy : jQuery Carousel Autoscroll" title="Puppy" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/white_bear.jpg" alt="White Bear : jQuery Banner Carousel" title="White Bear" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/images/rabbits.jpg" alt="Rabbits : jQuery Content Slider Carousel" title="Rabbits" id="wows7"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Rainbow Chicks"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/rainbowchicks.jpg" alt="Rainbow Chicks : jQuery Carousel Image Slider"/>Free jQuery Carousel Slideshow</a>
<a href="#" title="Tegu"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/tegu.jpg" alt="Tegu : jQuery Carousel Slider Example"/>jQuery Carousel Horizontal Slider</a>
<a href="#" title="Otter"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/otter.jpg" alt="Otter : jQuery Carousel Horizontal Slider"/>jQuery Content Slider Carousel</a>
<a href="#" title="Sleeping Kitties"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/sleepingkitties.jpg" alt="Sleeping Kitties : jQuery Banner Carousel"/>jQuery Carousel Autoscroll</a>
<a href="#" title="Puppy"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/alone.jpg" alt="Puppy : jQuery Step Carousel"/>jQuery Carousel Pagination</a>
<a href="#" title="White Bear"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/white_bear.jpg" alt="White Bear : jQuery Ajax Carousel"/>jQuery Carousel With Text</a>
<a href="#" title="Rabbits"><img src="http://www.wowslider.com/images/demo/mac-stack/data1/tooltips/rabbits.jpg" alt="Rabbits : jQuery Carousel Ajax"/>jQuery Carousel</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">CSS Carousel slider JQuery</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/mac-stack/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=c.length>2?(k-h+1)%c.length:1;if(Math.abs(n)>=1){g=(n>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?-1:1)+"00%";var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,left:((g?i:l))});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){e("ul",b).css({left:-k+"00%"})}f.animate({left:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"})}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:true,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercrystallinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section31 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/crystal-linear/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' .ws_frame{
	display:block;
	position: absolute;
	left:0;
	top:0;
	bottom:0;
	right:0;
	border:solid 8px black;
	z-index:9;
	opacity:0.3;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=30);
}
* html #wowslider-container'.$val.' .ws_frame{
	width:$FrameW$px;
	height:$FrameH$px;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin: 0;
	width:16px;
	height:15px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{ 
	background-position: -16px 0;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: right top;
}
#wowslider-container'.$val.' .ws_bullets a.ws_overbull{
	background-position: 50% top;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 50% top;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-28px;
	z-index:60;
	height: 56px;
	width: 29px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:-29px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:-29px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:18px;
	left: 18px;
	margin-right:23px;
	z-index: 50;
	padding:5px;
	color: #FFF;
	background:#000;
    font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
	opacity:0.6;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom:-24px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	bottom: 20px;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' {
	margin:5px auto 39px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-0.52%;
	top:-1.39%;
	width:101.04%;
	height:112.22%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-5px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section31 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/frosty.jpg" alt="Frosty : Best Image Slider" title="Frosty" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves3.jpg" alt="Leaves : Best jQuery Slideshow" title="Leaves" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/raindrops.jpg" alt="Rain drops : Best Wordpress Slideshow" title="Rain drops" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves2.jpg" alt="Autumn leaves : Best Joomla Slideshow" title="Autumn leaves" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leafinhorten.jpg" alt="Leaf in Horten : Best Slideshow jQuery" title="Leaf in Horten" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/mosaic.jpg" alt="Mosaic : Best Slideshow Plugin Wordpress" title="Mosaic" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaf.jpg" alt="Leaf : Best jQuery Slideshow 2011" title="Leaf" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leaves.jpg" alt="Bright leaves : Best jQuery Gallery" title="Bright leaves" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/geraniumleaves.jpg" alt="Geranium : Best jQuery Image Gallery" title="Geranium" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-linear/data1/images/leavesandwater.jpg" alt="Leaves and Water : Best jQuery Photo Gallery" title="Leaves and Water" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama sur limage</a>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/crystal-linear/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic_linear(c,a,b){var d=jQuery;var e=d("<div></div>").css({position:"absolute",display:"none","z-index":2,width:"200%",height:"100%"}).appendTo(b);this.go=function(f,i){e.stop(1,1);var g=(!!((f-i+1)%a.length)^c.revers?"left":"right");d(a[i]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,0);d(a[f]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,"50%").show();e.css({left:"auto",right:"auto",top:0}).css(g,0).show();var h={};h[g]="-100%";e.animate(h,c.duration,"easeInOutExpo",function(){b.find("ul").css({left:-f+"00%"});d(this).hide().html("")});return f}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic_linear",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:true,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderdigitstackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section32 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/digit-stack-v/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	font:bold 10px/22px Tahoma,sans-serif; 
	color:#000;
	text-align:center;
	margin-left:4px;
	width:22px;
	height:22px;
	background: url(./bullet.png) left top;
	float: left; 
	position:relative;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: right top;
	color:#D4D4D4;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-33px;
	z-index:60;
	height: 66px;
	width: 59px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:50px;
	left: 0px;
	margin-right:5px;
	z-index: 50;
	padding:12px;
	color: #d4d4d4;
	text-transform:uppercase;
	background:#000;
    font-family: Arial,Helvetica,sans-serif;
	font-size: 18px;
	-moz-border-radius:0 10px 10px 0;
	border-radius:0 10px 10px 0;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 13px;
	text-transform:none;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 0px;
    right: 0px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' {
	margin:14px auto 60px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-1.56%;
	top:-3.89%;
	width:103.12%;
	height:120.55%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:25px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #0e0e0e;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#0e0e0e;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
    border: 5px solid #0e0e0e;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-1px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section32 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowerongreen.jpg" alt="Flower on Green : jQuery Vertical Image Slider" title="Flower on Green" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/parkerflowers.jpg" alt="Parker Flowers : Vertical Slider" title="Parker Flowers" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowercloseup.jpg" alt="Flower close up : Vertical Slider jQuery" title="Flower close up" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/littledeeds.jpg" alt="Little Deeds : jQuery Slider Vertical" title="Little Deeds" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/flowersongreen.jpg" alt="Flowers on Green : Vertical Image Slider jQuery" title="Flowers on Green" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/3928026019_d940fe936e_z.jpg" alt="Flower on White : Vertical Image Slideshow" title="Flower on White" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/sensualityinaflower.jpg" alt="Sensuality in a flower : Vertical Slideshow" title="Sensuality in a flower" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/142195032_1267233bbd_b.jpg" alt="Blue Flowers : jQuery Vertical Panel Slider" title="Blue Flowers" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/whiteflower.jpg" alt="White Flower : Vertical Slider Flash" title="White Flower" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/digit-stack-v/data1/images/73421372_0c8ecaf089_b.jpg" alt="Flowers : Vertical Slider Blinds" title="Flowers" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">Diaporama verticale de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/digit-stack-v/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack_vertical(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=(k-h+1)%c.length;if(Math.abs(m)>=1){g=(m>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?1:-1)+"00%";c.each(function(o){if(g&&o!=h){this.style.zIndex=(Math.max(0,this.style.zIndex-1))}});var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,top:(g?i:l)});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){e("ul",b).css({left:-k+"00%"})}f.animate({top:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"})}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack_vertical",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:true,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernoblekenburns'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section33 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noble-kenburns/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left: 5px; 
	height: 10px; 
	width: 10px; 
	float: left; 
	border: 1px solid #d6d6d6; 
	color: #d6d6d6; 
	text-indent: -4000px; 
	background-image:url("data:image/gif;base64,");
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_selbull { 
	background-color: #d6d6d6; 
	color: #FFFFFF; 
}

#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_overbull { 
	background-color: #d6d6d6;
	color: #FFFFFF; 
}

#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-16px;
	z-index:60;
	height: 67px;
	width: 32px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 0 0; 
	right:-7px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:-7px;
	background-position: 0 100%; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 0; 
}
#wowslider-container'.$val.' a.ws_prev:hover{
	background-position: 100% 100%; 
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:20px;
	left: 0;
	margin-right:5px;
	z-index: 50;
	background-color:#FFF;
	color:#1E4553;
	padding:10px;
	font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
	opacity:0.7;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	bottom:0;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:12px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 2px solid #B8C4CF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#B8C4CF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 2px solid #B8C4CF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	position:absolute;
}
	</style>
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
	
	<!-- Start WOWSlider.com BODY section33 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4031507140_35ca846d90_b.jpg" alt="Coconut : Ken Burns Effect Slideshow" title="Coconut" id="wows0"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4030754229_6f97bdc5ee_b.jpg" alt="Winged beans : Ken Burns Effect" title="Winged beans" id="wows1"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/387781444_78b8f34fab_b.jpg" alt="Fruits brochettes : Jquery Ken Burns" title="Fruits brochettes" id="wows2"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4036900331_efcd523ded_b.jpg" alt="Ash Plantains : Ken Burns Effect Jquery" title="Ash Plantains" id="wows3"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/561152924_8b33927030_b.jpg" alt="Fruit Bowl : Jquery Ken Burns Effect" title="Fruit Bowl" id="wows4"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/4912496232_e3c496b40b_b.jpg" alt="Fruit or Veg : Ken Burns Jquery" title="Fruit or Veg" id="wows5"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/1790683619_77a07afc63_b.jpg" alt="Juicy Fruit : Ken Burns Slideshow" title="Juicy Fruit" id="wows6"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/2521078045_8cd365d17c_o.jpg" alt="Dragon Fruit : Slideshow Ken Burns" title="Dragon Fruit" id="wows7"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/225232630_f99490b19a_o.jpg" alt="Fruits : Ken Burns Effect Software" title="Fruits" id="wows8"/></li>
<li><img src="http://www.wowslider.com/images/demo/noble-kenburns/data1/images/159160780_49c5c193eb_o.jpg" alt="Fruit Cocktail : Ken Burns Slideshow Software" title="Fruit Cocktail" id="wows9"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">Ken Burns effet Diaporama</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/noble-kenburns/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_kenburns(q,k,d){var f=jQuery;var b=document.createElement("canvas").getContext;var p=q.paths||[{from:[0,0,1],to:[0,0,1.2]},{from:[0,0,1.2],to:[0,0,1]},{from:[1,0,1],to:[1,0,1.2]},{from:[0,1,1.2],to:[0,1,1]},{from:[1,1,1],to:[1,1,1.2]},{from:[0.5,1,1],to:[0.5,1,1.3]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[1,0.5,1],to:[1,0.5,1.2]},{from:[0,0.5,1.2],to:[0,0.5,1]},{from:[1,0.5,1.2],to:[1,0.5,1]},{from:[0.5,0.5,1],to:[0.5,0.5,1.2]},{from:[0.5,0.5,1.3],to:[0.5,0.5,1]},{from:[0.5,1,1],to:[0.5,0,1.15]}];function r(h){return p[h?Math.floor(Math.random()*(b?p.length:Math.min(5,p.length))):0]}function e(w,t){var v,h=0,s=40/t;var x=setInterval(function(){if(h<1){if(!v){v=1;w(h);v=0}h+=s}else{u(1)}},40);function u(y){clearInterval(x);if(y){w(1)}}return{stop:u}}var n=q.width,g=q.height;var j,a;var o,m;function i(){o=f("<div style="width:100%;height:100%"></div>").css({"z-index":8,position:"absolute",left:0,top:0}).appendTo(d)}i();function c(v,s,h){var t={width:100*v[2]+"%"};t[s?"right":"left"]=-100*(v[2]-1)*(s?(1-v[0]):v[0])+"%";t[h?"bottom":"top"]=-100*(v[2]-1)*(h?(1-v[1]):v[1])+"%";if(!b){for(var u in t){if(/\%/.test(t[u])){t[u]=(/right|left|width/.test(u)?n:g)*parseFloat(t[u])/100+"px"}}}return t}function l(t,y,v){if(b){if(a){a.stop(1)}a=j}if(m){m.remove()}m=o;i();if(v){o.hide();m.stop(true,true)}if(b){var s,h;var u,x;u=f("<canvas width="'+n+'" height="'+g+'"/>");u.css({position:"absolute",left:0,top:0,width:"100%",height:"100%"}).appendTo(o);s=u.get(0).getContext("2d");x=u.clone().appendTo(o);h=x.get(0).getContext("2d");j=new e(function(z){var B=[y.from[0]*(1-z)+z*y.to[0],y.from[1]*(1-z)+z*y.to[1],y.from[2]*(1-z)+z*y.to[2]];h.drawImage(t,-n*(B[2]-1)*B[0],-g*(B[2]-1)*B[1],n*B[2],g*B[2]);s.clearRect(0,0,n,g);var A=s;s=h;h=A},q.duration+q.delay*2)}else{var w=f("<img src="'+t.src+'"/>").css({position:"absolute",left:"auto",right:"auto",top:"auto",bottom:"auto"}).appendTo(o).css(c(y.from,y.from[0]>0.5,y.from[1]>0.5)).animate(c(y.to,y.from[0]>0.5,y.from[1]>0.5),{easing:"linear",queue:false,duration:(1.5*q.duration+q.delay)})}if(v){o.fadeIn(q.duration)}}k.each(function(h){f(this).css({visibility:"hidden"});if(h==q.startSlide){l(this,r(0),0)}});this.go=function(h,s){l(k.get(h),r(h),1);return h}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"kenburns",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		/*}elseif ($conf_value == 'wowslidernoirsquares'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '<!-- Start WOWSlider.com HEAD section34 -->
	<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noir-squares/engine/style.css" media="screen" />
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com BODY section34 -->
	<div id="wowslider-container'.$val.'">
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
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/noir-squares/engine/script.js"></script>-->
	<script type="text/javascript">
if(!jQuery.fn.coinslider){(function(g){var f=new Array;var d=new Array;var n=new Array;var p=new Array;var e=new Array;var l=new Array;var c=new Array;var h=new Array;var o=new Array;var b=new Array;var m=new Array;var a=new Array;g.fn.coinslider=g.fn.CoinSlider=function(q){init=function(r){d[r.id]=new Array();n[r.id]=new Array();p[r.id]=new Array();e[r.id]=new Array();l[r.id]=new Array();h[r.id]=q.startSlide||0;b[r.id]=0;m[r.id]=1;a[r.id]=r;f[r.id]=g.extend({},g.fn.coinslider.defaults,q);g.each(g("#"+r.id+" img"),function(s,t){n[r.id][s]=t;p[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("href"):"";e[r.id][s]=g(t).parent().is("a")?g(t).parent().attr("target"):"";l[r.id][s]=g(t).next().is("span")?g(t).next().html():""});a[r.id]=g("<div class="coin-slider" id="coin-slider-"+r.id+"" />").css({"background-image":"url("+n[r.id][q.startSlide||0].src+")","-o-background-size":"100%","-webkit-background-size":"100%","-moz-background-size":"100%","background-size":"100%",width:"100%",height:"100%",position:"relative","background-position":"top left"}).appendTo(g(r).parent());for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){g(f[r.id].links?("<a href='"+p[r.id][0]+"'></a>"):"<div></div>").css({"float":"left",position:"absolute"}).appendTo(a[r.id]).attr("id","cs-"+r.id+i+j)}}a[r.id].append("<div class="cs-title" id="cs-title-"+r.id+"" style="position: absolute; bottom:0; left: 0; z-index: 1000;"></div>");if(f[r.id].navigation){g.setNavigation(r)}};g.setFields=function(s){var r=a[s.id].width();var t=a[s.id].height();tWidth=sWidth=parseInt(r/f[s.id].spw);tHeight=sHeight=parseInt(t/f[s.id].sph);counter=sLeft=sTop=0;tgapx=gapx=f[s.id].width-f[s.id].spw*sWidth;tgapy=gapy=f[s.id].height-f[s.id].sph*sHeight;for(i=1;i<=f[s.id].sph;i++){gapx=tgapx;if(gapy>0){gapy--;sHeight=tHeight+1}else{sHeight=tHeight}for(j=1;j<=f[s.id].spw;j++){if(gapx>0){gapx--;sWidth=tWidth+1}else{sWidth=tWidth}d[s.id][counter]=i+""+j;counter++;g("#cs-"+s.id+i+j).css({width:sWidth+"px",height:sHeight+"px","background-position":-sLeft+"px "+(-sTop+"px"),"background-size":r+"px "+t+"px","-moz-background-size":r+"px "+t+"px","-o-background-size":r+"px "+t+"px","-webkit-background-size":r+"px "+t+"px",left:sLeft,top:sTop}).addClass("cs-"+s.id);sLeft+=sWidth}sTop+=sHeight;sLeft=0}g(".cs-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g(".cs-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});g("#cs-title-"+s.id).mouseover(function(){g("#cs-navigation-"+s.id).show()});g("#cs-title-"+s.id).mouseout(function(){g("#cs-navigation-"+s.id).hide()});if(f[s.id].hoverPause){g(".cs-"+s.id).mouseover(function(){f[s.id].pause=true});g(".cs-"+s.id).mouseout(function(){f[s.id].pause=false});g("#cs-title-"+s.id).mouseover(function(){f[s.id].pause=true});g("#cs-title-"+s.id).mouseout(function(){f[s.id].pause=false})}};g.transitionCall=function(r){if(f[r.id].delay<0){return}clearInterval(c[r.id]);delay=f[r.id].delay+f[r.id].spw*f[r.id].sph*f[r.id].sDelay;c[r.id]=setInterval(function(){g.transition(r)},delay)};g.transition=function(r,s){if(f[r.id].pause==true){return}g.setFields(r);g.effect(r);b[r.id]=0;o[r.id]=setInterval(function(){g.appereance(r,d[r.id][b[r.id]])},f[r.id].sDelay);g(a[r.id]).css({"background-image":"url("+n[r.id][h[r.id]].src+")"});if(typeof(s)=="undefined"){h[r.id]++}else{if(s=="prev"){h[r.id]--}else{h[r.id]=s}}if(h[r.id]==n[r.id].length){h[r.id]=0}if(h[r.id]==-1){h[r.id]=n[r.id].length-1}g(".cs-button-"+r.id).removeClass("cs-active");g("#cs-button-"+r.id+"-"+(h[r.id]+1)).addClass("cs-active");if(l[r.id][h[r.id]]){g("#cs-title-"+r.id).css({opacity:0}).animate({opacity:f[r.id].opacity},f[r.id].titleSpeed);g("#cs-title-"+r.id).html(l[r.id][h[r.id]])}else{g("#cs-title-"+r.id).css("opacity",0)}};g.appereance=function(s,r){g(".cs-"+s.id).attr("href",p[s.id][h[s.id]]).attr("target",e[s.id][h[s.id]]);if(b[s.id]==f[s.id].spw*f[s.id].sph){clearInterval(o[s.id]);setTimeout(function(){g(s).trigger("cs:animFinished")},300);return}g("#cs-"+s.id+r).css({opacity:0,"background-image":"url("+n[s.id][h[s.id]].src+")"});g("#cs-"+s.id+r).animate({opacity:1},300);b[s.id]++};g.setNavigation=function(r){g(a[r.id]).append("<div id="cs-navigation-"+r.id+""></div>");g("#cs-navigation-"+r.id).hide();g("#cs-navigation-"+r.id).append("<a href="#" id="cs-prev-"+r.id+"" class="cs-prev">prev</a>");g("#cs-navigation-"+r.id).append("<a href="#" id="cs-next-"+r.id+"" class="cs-next">next</a>");g("#cs-prev-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,left:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r,"prev");g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("#cs-next-"+r.id).css({position:"absolute",top:f[r.id].height/2-15,right:0,"z-index":1001,"line-height":"30px",opacity:f[r.id].opacity}).click(function(s){s.preventDefault();g.transition(r);g.transitionCall(r)}).mouseover(function(){g("#cs-navigation-"+r.id).show()});g("<div id="cs-buttons-"+r.id+"" class="cs-buttons"></div>").appendTo(g("#coin-slider-"+r.id));for(k=1;k<n[r.id].length+1;k++){g("#cs-buttons-"+r.id).append("<a href="#" class="cs-button-"+r.id+"" id="cs-button-"+r.id+"-"+k+"">"+k+"</a>")}g.each(g(".cs-button-"+r.id),function(s,t){g(t).click(function(u){g(".cs-button-"+r.id).removeClass("cs-active");g(this).addClass("cs-active");u.preventDefault();g.transition(r,s);g.transitionCall(r)})});g("#cs-navigation-"+r.id+" a").mouseout(function(){g("#cs-navigation-"+r.id).hide();f[r.id].pause=false});g("#cs-buttons-"+r.id).css({left:"50%","margin-left":-n[r.id].length*15/2-5,position:"relative"})};g.effect=function(r){effA=["random","swirl","rain","straight","snakeV","rainV"];if(f[r.id].effect==""){eff=effA[Math.floor(Math.random()*(effA.length))]}else{eff=f[r.id].effect}d[r.id]=new Array();if(eff=="random"){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}g.random(d[r.id])}if(/rain|swirl|straight|snakeV|rainV/.test(eff)){g[eff](r)}m[r.id]*=-1;if(m[r.id]>0){d[r.id].reverse()}};g.random=function(r){var t=r.length;if(t==0){return false}while(--t){var s=Math.floor(Math.random()*(t+1));var v=r[t];var u=r[s];r[t]=u;r[s]=v}};g.swirl=function(r){var t=f[r.id].sph;var u=f[r.id].spw;var B=1;var A=1;var s=0;var v=0;var z=0;var w=true;while(w){v=(s==0||s==2)?u:t;for(i=1;i<=v;i++){d[r.id][z]=B+""+A;z++;if(i!=v){switch(s){case 0:A++;break;case 1:B++;break;case 2:A--;break;case 3:B--;break}}}s=(s+1)%4;switch(s){case 0:u--;A++;break;case 1:t--;B++;break;case 2:u--;A--;break;case 3:t--;B--;break}check=g.max(t,u)-g.min(t,u);if(u<=check&&t<=check){w=false}}};g.rain=function(t){var w=f[t.id].sph;var r=f[t.id].spw;var v=0;var u=to2=from=1;var s=true;while(s){for(i=from;i<=u;i++){d[t.id][v]=i+""+parseInt(to2-i+1);v++}to2++;if(u<w&&to2<r&&w<r){u++}if(u<w&&w>=r){u++}if(to2>r){from++}if(from>u){s=false}}};g.rainV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+r;v++}}};g.snakeV=function(t){var u=f[t.id];var v=0;for(var s=1;s<=u.sph;s++){for(var r=1;r<=u.spw;r++){d[t.id][v]=s+""+(s%2?r:u.spw+1-r);v++}}};g.straight=function(r){counter=0;for(i=1;i<=f[r.id].sph;i++){for(j=1;j<=f[r.id].spw;j++){d[r.id][counter]=i+""+j;counter++}}};g.min=function(s,r){if(s>r){return r}else{return s}};g.max=function(s,r){if(s<r){return r}else{return s}};this.each(function(){init(this)})};g.fn.coinslider.defaults={width:565,height:290,spw:7,sph:5,delay:3000,sDelay:30,opacity:0.7,titleSpeed:500,effect:"",navigation:true,links:true,hoverPause:true}})(jQuery)};
function ws_squares(c,a,b){var g=jQuery;var e=b.find("ul").get(0);e.id="wowslider_tmp"+Math.round(Math.random()*99999);var h=0;g(e).coinslider({hoverPause:false,startSlide:c.startSlide,navigation:0,delay:-1,width:c.width,height:c.height});var f=g("#coin-slider-"+e.id).css({position:"absolute",left:0,top:0,"z-index":8});var d=c.startSlide;g(e).bind("cs:animFinished",function(){g(e).css({left:-d+"00%"});if(h<2){h=0;f.hide()}});this.go=function(i){h++;f.show();d=i;g.transition(e,i);return i}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"squares",prev:"",next:"",duration:10*100,delay:30*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>

	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		*/}elseif ($conf_value == 'wowsliderpulseblinds'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section35 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/pulse-blinds/engine/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

/* Navigation arrows for preview mode */
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev{
	position:absolute;
	display:none;
	top:50%;
	width:56px;
	height:56px;
	margin:-28px 0 0 0;
	z-index:60;
	cursor:pointer;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    border-radius:10px;
	opacity:0.6;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);	
}
#wowslider-container'.$val.' a.ws_next{
	right:2%;
	background:#000 url(./next_photo.png) no-repeat 50% 50%;
}
#wowslider-container'.$val.' a.ws_prev{
	left:2%;
	background:#000 url(./prev_photo.png) no-repeat 50% 50%;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
#wowslider-container'.$val.' a.ws_next:hover, #wowslider-container'.$val.' a.ws_prev:hover{
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws_bullets a {
	position:relative;
	background:url("bullet.png") no-repeat scroll 0 0 transparent;
	border:0 none;
	display:block;
	float:left;
	cursor:pointer;
	height:10px;
	margin-right:4px;
	text-indent:-9999px;
	width:10px;
	z-index:100;
	outline:none;
	color:transparent;
}
#wowslider-container'.$val.' a.ws_selbull,#wowslider-container'.$val.' a.ws_overbull,#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position:100% 0;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 15px;
	left: 2%;
	margin-right:25px;
	padding:10px;
	background-color:black;
	color:white;
	z-index: 50;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
	opacity:0.5;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	top:20px;
    right:15px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }

#wowslider-container'.$val.' {
	margin:15px auto;
}
#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-1.56%;
	top:-4.17%;
	width:103.12%;
	height:108.33%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:10px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-9px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section35 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/canyon.jpg" alt="Canyon: Ajax Slider" title="Canyon" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/colorado.jpg" alt="Colorado : Ajax Slideshow" title="Colorado" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/garden.jpg" alt="Garden : Ajax Image Slideshow" title="Garden" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/greenmountain.jpg" alt="Greenmountain : Ajax Photo Slideshow" title="Greenmountain" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/grimmialp.jpg" alt="Grimmialp : Ajax Slideshow Script" title="Grimmialp" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/horse.jpg" alt="Horse : Ajax Slideshow Tutorial" title="Horse" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/lake.jpg" alt="Lake : Ajax Slideshow Example" title="Lake" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/lake_road.jpg" alt="Lake Road : Free Ajax Slideshow" title="Lake Road" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/peak.jpg" alt="Peak : Ajax Banner Slideshow" title="Peak" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pulse-blinds/data/images/yo.jpg" alt="Yo : Simple Ajax Slideshow" title="Yo" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">Ajax Diaporama - Diaporama Ajax</a>
<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/pulse-blinds/engine/script.js"></script>-->
	<script type="text/javascript">
function ws_blinds(c,b,a){var g=jQuery;var e=c.parts||3;var f=g("<div>");f.css({position:"absolute",width:"100%",height:"100%",left:0,top:0,"z-index":8}).hide().appendTo(a);var h=[];for(var d=0;d<e;d++){h[d]=g("<div>").css({position:"absolute",height:"100%",width:Math.ceil(100/e)+1+"%",border:"none",margin:0,overflow:"hidden",top:0,left:Math.round(100*d/e)+"%"}).appendTo(f)}this.go=function(m,o,j){var l=o>m?1:0;if(j){if(j<=-1){m=(o+1)%b.length;l=0}else{if(j>=1){m=(o-1+b.length)%b.length;l=1}else{return -1}}}f.find("img").stop(true,true);f.show();for(var n=0;n<h.length;n++){var k=h[n];g(b.get(m)).clone().css({position:"absolute",top:0,left:(!l?(-f.width()):(f.width()-k.position().left))+"px",width:"auto",height:"100%"}).appendTo(k).animate({left:-k.position().left+"px"},(c.duration/(h.length+1))*(l?(h.length-n+1):(n+2)),((!l&&n==h.length-1||l&&!n)?function(){g("ul",a).css({left:-m+"00%"});f.hide().find("img").remove()}:null))}return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blinds",prev:"",next:"",duration:10*100,delay:30*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>

	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidercrystalbasic'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section36 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/crystal-basic/engine/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.' .ws_frame{
	display:block;
	position: absolute;
	left:0;
	top:0;
	bottom:0;
	right:0;
	border:solid 8px black;
	z-index:9;
	opacity:0.3;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=30);
}
* html #wowslider-container'.$val.' .ws_frame{
	width:$FrameW$px;
	height:$FrameH$px;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin: 0;
	width:16px;
	height:15px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{ 
	background-position: -16px 0;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: right top;
}
#wowslider-container'.$val.' .ws_bullets a.ws_overbull{
	background-position: 50% top;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 50% top;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-28px;
	z-index:60;
	height: 56px;
	width: 29px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:-29px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:-29px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:18px;
	left: 18px;
	margin-right:23px;
	z-index: 50;
	padding:5px;
	color: #FFF;
	background:#000;
    font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
	opacity:0.6;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}

/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 5px;
    right: 10px;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	top: 20px;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	top: 20px;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 10%{left:-100%} 17.5%{left:-100%} 20%{left:-200%} 27.5%{left:-200%} 30%{left:-300%} 37.5%{left:-300%} 40%{left:-400%} 47.5%{left:-400%} 50%{left:-500%} 57.5%{left:-500%} 60%{left:-600%} 67.5%{left:-600%} 70%{left:-700%} 77.5%{left:-700%} 80%{left:-800%} 87.5%{left:-800%} 90%{left:-900%} 97.5%{left:-900%} }

#wowslider-container'.$val.' {
	margin:5px auto 39px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-0.52%;
	top:-1.39%;
	width:101.04%;
	height:112.22%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-5px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<style type="text/css">a#vlb{display:none}</style>

	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section36 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/amsterdam.jpg" alt="Overlooking amsterdam : HTML5 Image Gallery Slider" title="Overlooking amsterdam" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/barpark.jpg" alt="Brownsville Bar Park : HTML5 Slider" title="Brownsville Bar Park" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/florence.jpg" alt="Florence : HTML5 Image Slider" title="Florence" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/gate.jpg" alt="Golden Gate, California : HTML5 Slider Example" title="Golden Gate, California" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/ny.jpg" alt="Night Panorama NYC From Jersey : HTML5 Content Slider" title="Night Panorama NYC From Jersey" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/panorama.jpg" alt="Panorama Herengracht from bridge Leidsegracht : HTML5 Div Slider" title="Panorama Herengracht from bridge Leidsegracht" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/port.jpg" alt="Heraklion old port : HTML5 Gallery Slider" title="Heraklion old port" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/praga.jpg" alt="Prague : HTML5 Horizontal Slider" title="Prague" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/santorini.jpg" alt="Panorama of Oia, Santorini : HTML5 Image Slider" title="Panorama of Oia, Santorini" id="wows8"/>Oia (in Santorini, Greece) remains one of the foremost tourist attractions of the Aegean Sea.</a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/crystal-basic/data/images/seul.jpg" alt="Seoul sunrise : HTML5 jQuery Slider" title="Seoul sunrise" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama HTML5 jQuery</a>
	<a href="#" class="ws_frame"></a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/crystal-basic/engine/script.js"></script>-->
	<script type="text/javascript">
function ws_basic(c,a,b){this.go=function(d){b.find("ul").stop(true).animate({left:(d?-d+"00%":0)},c.duration,"easeInOutExpo");return d}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic",prev:"",next:"",duration:10*100,delay:30*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidernoblefade'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section37 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/noble-fade/engine1/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.5
 *	template Noble
 */

#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0;
	margin:0 0 0 0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left: 5px; 
	height: 10px; 
	width: 10px; 
	float: left; 
	border: 1px solid #d6d6d6; 
	color: #d6d6d6; 
	text-indent: -4000px; 
	background-image:url("data:image/gif;base64,");
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_selbull { 
	background-color: #d6d6d6; 
	color: #FFFFFF; 
}

#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_overbull { 
	background-color: #d6d6d6;
	color: #FFFFFF; 
}

#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:block;
	top:50%;
	margin-top:-16px;
	z-index:60;
	height: 67px;
	width: 32px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 0 0; 
	right:-7px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:-7px;
	background-position: 0 100%; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 0; 
}
#wowslider-container'.$val.' a.ws_prev:hover{
	background-position: 100% 100%; 
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
	top:0;
    right: 0;
}

#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:7%;
	left: 0;
	margin-right:5px;
	z-index: 50;
	color:#1E4553;
	font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	background-color:#FFF;
	padding:10px;
	opacity:0.7;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);	
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	font-size: 12px;
}
#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:12px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 2px solid #B8C4CF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#B8C4CF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 2px solid #B8C4CF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	position:absolute;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section37 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Awesome waterscape</li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/10211621.jpg" alt="Blue sea : Beautiful jQuery Slider Demo" title="Blue sea" id="wows1_0"/>Awesome waterscape</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/2032112.jpg" alt="Pier  Easy Slider jQuery Plugin Demo" title="Pier" id="wows1_1"/>Marine dock in the rays of the azure sunset</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/4686c697efa3077e5d691710ec3c8d82.jpg" alt="Purple sky : Image Slider jQuery Demo" title="Purple sky" id="wows1_2"/>Impressive clouds</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/681fcb3df7d8c3baaecebf78f195f147.jpg" alt="Noon on the sea : jQuery Auto Slider Demo" title="Noon on the sea" id="wows1_3"/>Houses on the Caribbean coast</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/b72f7b0cf13ed2b05999ef071d7f675f.jpg" alt="Palm : jQuery Multiple Slider Demo" title="Palm" id="wows1_4"/>Palm is loosened by strong sea breeze</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/gd359.jpg" alt="Sea Leisure : jQuery Slider Demo Download" title="Sea Leisure" id="wows1_5"/>Boats in the sea</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/mertvoemore.jpg" alt="Black Sea : jQuery Slider Gallery Demo" title="Black Sea" id="wows1_6"/>Mountains along the Black Sea</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/more_alushta.jpg" alt="Shore : jQuery Text Slider Demo" title="Shore" id="wows1_7"/>Black sea near Alushta</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/nature_sundown_sea_sunset_005344_.jpg" alt="Sea : jQuery Slider Demonstration" title="Sea" id="wows1_8"/>Beautiful sunset</li>
<li><img src="http://www.wowslider.com/images/demo/noble-fade/data1/images/sea.jpg" alt="Sea waves : Slider In jQuery Demo" title="Sea waves" id="wows1_9"/>Sea waves in the evening</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">CSS Diaporama de limage</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/noble-fade/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_fade(c,a,b){var e=jQuery;var d=e("ul",b);var f={position:"absolute",left:0,top:0,width:"100%",height:"100%"};this.go=function(g,h){var i=e(a.get(g)).clone().css(f).hide().appendTo(b);if(!c.noCross){var j=e(a.get(h)).clone().css(f).appendTo(b);d.hide();j.fadeOut(c.duration,function(){j.remove()})}i.fadeIn(c.duration,function(){d.css({left:-g+"00%"}).show();i.remove()});return g}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"fade",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"move",controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderfluxslices'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section38 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/flux-slices/engine/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:10px solid #FFFFFF;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

* html #wowslider-container'.$val.'{
	background-image: none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 0px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin: 0 2px; 
	width:21px;
	height:21px;
	background: url(./bullet.png);
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
* html #wowslider-container'.$val.' .ws_bullets a {
	background: url(./bullet.gif);
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background: url(./bullet_active.png);
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background: url(./bullet_active.png);
}
* html #wowslider-container'.$val.' .ws_bullets a:hover{
	background: url(./bullet_active.gif);
}
* html #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background: url(./bullet_active.gif);
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-22px;
	z-index:60;
	height: 45px;
	width: 45px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
* html #wowslider-container'.$val.' a.ws_next, * html #wowslider-container'.$val.' a.ws_prev{
	background-image: url(./arrows.gif);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}


#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:25px;
	left: 0px;
	margin-right:30px;
	z-index: 50;
	padding:10px;
	color: #000000;
	background:#FFF;
    font-family: Tahoma,Arial,Helvetica;
    font-size: 14px;
    letter-spacing: 1px;
    line-height: 18px;
    text-align: left;
    text-shadow: 0 0 2px #FFFFFF;	
	-moz-border-radius:0 8px 8px 0;
	-webkit-border-radius:0 8px 8px 0;
	border-radius:0 8px 8px 0;
	font-size: 14px;
	opacity:0.8;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 8px;
    right: 5px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 18px #FFF;
    box-shadow: 0 0 18px #FFF;
    border: 3px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 18px #FFF;
    box-shadow: 0 0 18px #FFF;
    border: 3px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-9px;
	margin-left:0px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section38 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/1293441583_nature_forest_morning_in_the_forest_015232_.jpg" alt="Fallen tree: jQuery Image Slider HTML" title="Fallen tree" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/2685176_b18ba54c.jpg" alt="Forest glade : How To Add jQuery Slider To HTML" title="Forest glade" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/611418.jpg" alt="In the woods : jQuery Div Slider" title="In the woods" id="wows2"/>rays of light show through the trees</a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/forest_wallpaper21.jpg" alt="The road in the woods : jQuery Slider Div Horizontal" title="The road in the woods" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/g7503.jpg" alt="Sapling : jQuery HTML Slider" title="Sapling" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/ge202.jpg" alt="Beauty spot : jQuery Slider HTML" title="Beauty spot" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/mozh_les.jpg" alt="Forested hills : HTML Slider jQuery" title="Forested hills" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/nature_forest_forest_010852_.jpg" alt="Swamp in the woods : Horizontal Div Slider jQuery" title="Swamp in the woods" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/widescreen_forest_004692_.jpg" alt="Fire in the woods: jQuery Div Slider Example" title="Fire in the woods" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/flux-slices/data/images/world_canada_rain_forest_007534_.jpg" alt="Morning mist over the forest : jQuery Div Slider Plugin" title="Morning mist over the forest" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">jQuery CSS Diaporama Div</a>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/flux-slices/engine/script.js"></script>-->
	<script type="text/javascript">
function ws_slices(i,f,g){var c=jQuery;var e=function(p,v){var o=c.extend({},{effect:"random",slices:15,animSpeed:500,pauseTime:3000,startSlide:0,container:null,onEffectEnd:0},v);var r={currentSlide:0,currentImage:"",totalSlides:0,randAnim:"",stop:false};var m=c(p);m.data("wow:vars",r);if(!/absolute|relative/.test(m.css("position"))){m.css("position","relative")}var k=v.container||m;var n=m.children();r.totalSlides=n.length;if(o.startSlide>0){if(o.startSlide>=r.totalSlides){o.startSlide=r.totalSlides-1}r.currentSlide=o.startSlide}if(c(n[r.currentSlide]).is("img")){r.currentImage=c(n[r.currentSlide])}else{r.currentImage=c(n[r.currentSlide]).find("img:first")}if(c(n[r.currentSlide]).is("a")){c(n[r.currentSlide]).css("display","block")}for(var q=0;q<o.slices;q++){var u=Math.round(k.width()/o.slices);var t=c("<div class="wow-slice"></div>").css({left:u*q+"px",overflow:"hidden",width:((q==o.slices-1)?(k.width()-(u*q)):u)+"px",position:"absolute"}).appendTo(k);c("<img>").css({position:"absolute",left:0,top:0}).appendTo(t)}var l=0;this.sliderRun=function(w,x){if(r.busy){return false}o.effect=x||o.effect;r.currentSlide=w-1;s(m,n,o,false);return true};var j=function(){if(o.onEffectEnd){o.onEffectEnd(r.currentSlide)}k.hide();r.busy=0};var s=function(w,x,z,B){var C=w.data("wow:vars");if((!C||C.stop)&&!B){return false}C.busy=1;C.currentSlide++;if(C.currentSlide==C.totalSlides){C.currentSlide=0}if(C.currentSlide<0){C.currentSlide=(C.totalSlides-1)}C.currentImage=c(x[C.currentSlide]);if(!C.currentImage.is("img")){C.currentImage=C.currentImage.find("img:first")}c(".wow-slice",k).each(function(H){var J=c(this),G=c("img",J);var I=Math.round(k.width()/z.slices);G.width(k.width());G.attr("src",C.currentImage.attr("src"));G.css({left:-I*H+"px"});J.css({height:"0px",opacity:"0",left:I*H+"px",width:((H==z.slices-1)?(k.width()-(I*H)):I)+"px",})});k.show();if(z.effect=="random"){var D=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDownRight","sliceUpDownLeft","fold","fade");C.randAnim=D[Math.floor(Math.random()*(D.length+1))];if(C.randAnim==undefined){C.randAnim="fade"}}if(z.effect.indexOf(",")!=-1){var D=z.effect.split(",");C.randAnim=c.trim(D[Math.floor(Math.random()*D.length)])}if(z.effect=="sliceDown"||z.effect=="sliceDownRight"||C.randAnim=="sliceDownRight"||z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceDownLeft"||C.randAnim=="sliceDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:0,bottom:""});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUp"||z.effect=="sliceUpRight"||C.randAnim=="sliceUpRight"||z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){var y=0;var A=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpLeft"||C.randAnim=="sliceUpLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);G.css({top:"",bottom:0});if(A==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="sliceUpDown"||z.effect=="sliceUpDownRight"||C.randAnim=="sliceUpDownRight"||z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){var y=0;var A=0;var E=0;var F=c(".wow-slice",k);if(z.effect=="sliceUpDownLeft"||C.randAnim=="sliceUpDownLeft"){F=c(".wow-slice",k)._reverse()}F.each(function(){var G=c(this);if(A==0){G.css({top:0,bottom:""});A++}else{G.css({top:"",bottom:0});A=0}if(E==z.slices-1){setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({height:"100%",opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;E++})}else{if(z.effect=="fold"||C.randAnim=="fold"){var y=0;var A=0;c(".wow-slice",k).each(function(){var G=c(this);var H=G.width();G.css({top:"0px",height:"100%",width:"0px"});if(A==z.slices-1){setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed,j)},(100+y))}else{setTimeout(function(){G.animate({width:H,opacity:"1.0"},z.animSpeed)},(100+y))}y+=50;A++})}else{if(z.effect=="fade"||C.randAnim=="fade"){var A=0;c(".wow-slice",k).each(function(){c(this).css("height","100%");if(A==z.slices-1){c(this).animate({opacity:"1.0"},(z.animSpeed*2),j)}else{c(this).animate({opacity:"1.0"},(z.animSpeed*2))}A++})}}}}}}};c.fn._reverse=[].reverse;var a=c("li",g);var d=c("ul",g);var b=c("<div></div>").css({left:0,top:0,"z-index":8,width:"100%",height:"100%",position:"absolute"}).appendTo(g);var h=new e(d,{keyboardNav:false,caption:0,effect:"sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpLeft,sliceUpDownRight,sliceUpDownLeft,sliceUpDownRight,sliceUpDownLeft,fold,fold,fold",animSpeed:i.duration,startSlide:i.startSlide,container:b,onEffectEnd:function(j){d.css({left:-j+"00%"})}});this.go=function(k,j){var l=h.sliderRun(k);if(l){return k}else{return -1}}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"slices",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderpinboardfly'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '		<!-- Start WOWSlider.com HEAD section39 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/pinboard-fly/engine/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:4px;
	width:8px;
	height:8px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: right top;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-33px;
	z-index:60;
	height: 66px;
	width: 59px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:50px;
	left: 0px;
	margin-right:5px;
	z-index: 50;
	padding:12px;
	color: #000000;
	text-transform:uppercase;
	background:#F9FBFB;
    font-family: Arial,Helvetica,sans-serif;
	font-size: 18px;
	line-height: 18px;
	-moz-border-radius:0 10px 10px 0;
	border-radius:0 10px 10px 0;
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 13px;
	text-transform:none;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 0px;
    right: 0px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' {
	margin:15px auto 60px;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-1.56%;
	top:-4.17%;
	width:103.12%;
	height:120.83%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #999999;
    box-shadow: 0 0 5px #999999;
    border: 5px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-11px;
	margin-left:-9px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

				
	<!-- Start WOWSlider.com BODY section39 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/autumn_leaves.jpg" alt="Autumn Leaves : Banner Slider" title="Autumn Leaves" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/creek.jpg" alt="Creek : Joomla Banner Slider" title="Creek" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/desert_landscape.jpg" alt="Desert Landscape : Flash Banner Slider" title="Desert Landscape" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/dock.jpg" alt="Dock : Banner Slider Script" title="Dock" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/forest.jpg" alt="Forest : jQuery Banner Rotator" title="Forest" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/forest_flowers.jpg" alt="Forest Flowers : jQuery Image Banner" title="Forest Flowers" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/frangipani_flowers.jpg" alt="Frangipani Flowers : jQuery Sliding Banner" title="Frangipani Flowers" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/garden.jpg" alt="Garden : jQuery Banner Rotator Download" title="Garden" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/green_sea_turtle.jpg" alt="Green Sea Turtle : jQuery Scrolling Banner" title="Green Sea Turtle" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/pinboard-fly/data/images/humpback_whale.jpg" alt="Humpback Whale : jQuery Banner Effects" title="Humpback Whale" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;
}	
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">Diaporama Banniere CSS jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/pinboard-fly/engine/script.js"></script>-->
	<script type="text/javascript">
function ws_fly(c,a,b){var d=jQuery;var f={position:"absolute",left:0,top:0,width:"100%",height:"100%"};var e=d("<div>").addClass("ws_effect").css(f).css({overflow:"visible"}).appendTo(b.parent());this.go=function(m,j,p){var i=!!c.revers;if(p){if(p>=1){i=1}if(p<=-1){i=0}}var h=-(c.distance||e.width()/4),k=Math.min(-h,Math.max(0,d(window).width()-e.offset().left-e.width())),g=(i?k:h),n=(i?h:k);var o=d(a.get(j)).clone().css(f).css({"z-index":1}).appendTo(e);var l=d(a.get(m)).clone().css(f).css({opacity:0,left:g,"z-index":3}).appendTo(e).show();l.animate({opacity:1},{duration:c.duration,queue:false});l.animate({left:0},{duration:2*c.duration/3,queue:false});setTimeout(function(){o.animate({left:n,opacity:0},2*c.duration/3,function(){o.remove();b.find("ul").css({left:-m+"00%"});l.remove()})},c.duration/3);return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"fly",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidermellowblast'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section40 -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/mellow-blast/engine/style.css" media="screen" />-->
	<style>
	/*
 *	generated by WOW Slider 2.2
 */
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0 auto;
	z-index:100;
	border:none;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' ul{
	position:relative;
	width: 10000%; 
	left:0;
	list-style:none;
	margin:0;
	padding:0;
}
#wowslider-container'.$val.' ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}

#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  a.wsl{
	display:none;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:22px;
	height:22px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-15px;
	z-index:60;
	height: 38px;
	width: 38px;
	background-image: url(./themes/themebuilder/icons/arrows.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:10px;
	background-position: 0 0; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 21px;
	left: 5px;
	margin:3px 3px 3px 10px;
	padding:10px;
	background-color:white;
	color:black;
	z-index: 50;
	border-radius:8px;
	box-shadow:0 0 3px #000;
	font-family: Tahoma,Arial,Helvetica;
	font-size: 14px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	opacity:0.5;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);	
}
#wowslider-container'.$val.' .ws-title div{
	padding-top:5px;
	font-size: 12px;
}
/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    top: 0px;
    right: 0px;
	margin-top: -5px;
	margin-right: -5px;
}

#wowslider-container'.$val.' ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 6.67%{left:-0%} 10%{left:-100%} 16.67%{left:-100%} 20%{left:-200%} 26.67%{left:-200%} 30%{left:-300%} 36.67%{left:-300%} 40%{left:-400%} 46.67%{left:-400%} 50%{left:-500%} 56.67%{left:-500%} 60%{left:-600%} 66.67%{left:-600%} 70%{left:-700%} 76.67%{left:-700%} 80%{left:-800%} 86.67%{left:-800%} 90%{left:-900%} 96.67%{left:-900%} }

#wowslider-container'.$val.' {
	margin:11px auto;
}

#wowslider-container'.$val.'  .ws_shadow{
	position:absolute;
	z-index: -1;
	left:-1.15%;
	top:-3.06%;
	width:102.29%;
	height:106.11%;
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader( src="engine1/bg.png", sizingMethod="scale");		/*IE<8*/
}
*|html #wowslider-container'.$val.' .ws_shadow{
	background-image: url(./bg.png);
	background-repeat: no-repeat;
	background-size:100%;
	filter:"";
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	top:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    -moz-box-shadow: 0 0 5px #FFF;
	box-shadow: 0 0 5px #FFF;
    border: 2px solid #000;
	border-radius:4px;
	-moz-border-radius:4px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#000;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	top:25px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    -moz-box-shadow: 0 0 5px #FFF;
	box-shadow: 0 0 5px #FFF;
    border: 2px solid #000;
	border-radius:4px;
	-moz-border-radius:4px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	top:-8px;
	margin-left:1px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
		<!-- Start WOWSlider.com BODY section40 -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows'.$i.'"/></a></li>
';								
$i++;		
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/1206241549_24.jpg" alt="Aircraft carrier : Slider Demo" title="Aircraft carrier" id="wows0"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/costa_atlantica.jpg" alt="Costa Atlantica : Demo Slider" title="Costa Atlantica" id="wows1"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/fred_olsen_cruise_lines.jpg" alt="Fred. Olsen Cruise Lines : Easy Slider Demo" title="Fred. Olsen Cruise Lines" id="wows2"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/img-2c369.jpg" alt="The modern warship : Smooth Slider Demo" title="The modern warship" id="wows3"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/korabl5018[1024x768].jpg" alt="Sailing frigate : : jQuery Slider Example" title="Sailing frigate" id="wows4"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/korabli_-_oboi_dlja_rabochego_stola-1024x768.jpg" alt="Sailing yacht : jQuery Image Slider Example" title="Sailing yacht" id="wows5"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/krasivyi_korabl_-1024x768.jpg" alt="Ship at sunset : Slider jQuery Example" title="Ship at sunset" id="wows6"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/navy_ships.jpg" alt="Navy ships : Ajax Slider Example" title="Navy ships" id="wows7"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/ships__003121_.jpg" alt="Ship in a battle : jQuery Slider Example Code" title="Ship in a battle" id="wows8"/></a></li>
<li><a href="#"><img src="http://www.wowslider.com/images/demo/mellow-blast/data/images/wpapers_ru.jpg" alt="Ships : jQuery Content Slider Example" title="Ships" id="wows9"/></a></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a class="wsl" href="http://wowslider.com">Exemplo de Slider de Imagem de jQuery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/mellow-blast/engine/script.js"></script>-->
	<script type="text/javascript">
function ws_blast(l,e,h){var d=jQuery;var a=l.distance||1;h=h.parent();var f=d("<div>").addClass("ws_effect");h.css({overflow:"visible"}).append(f);f.css({position:"absolute",left:0,top:0,width:"100%",height:"100%","z-index":8});var c=l.cols;var k=l.rows;var g=[];var b=[];function i(){var p=Math.max((l.width||f.width())/(l.height||f.height())||3,3);c=c||Math.round(p<1?3:3*p);k=k||Math.round(p<1?3/p:3);for(var n=0;n<c*k;n++){var o=n%c;var m=Math.floor(n/c);d([b[n]=document.createElement("div"),g[n]=document.createElement("div")]).css({position:"absolute",overflow:"hidden"}).appendTo(f).append(d("<img>").css({position:"absolute"}))}g=d(g);b=d(b);j(g);j(b,true)}function j(r,p,m){var q=f.width();var o=f.height();var n={left:d(window).scrollLeft(),top:d(window).scrollTop(),width:d(window).width(),height:d(window).height()};d(r).each(function(x){var w=x%c;var u=Math.floor(x/c);if(p){var A=a*q*(2*Math.random()-1)+q/2;var y=a*o*(2*Math.random()-1)+o/2;var z=f.offset();z.left+=A;z.top+=y;if(z.left<n.left){A-=z.left+n.left}if(z.top<n.top){y-=z.top+n.top}var v=(n.left+n.width)-z.left-q/c;if(0>v){A+=v}var t=(n.top+n.height)-z.top-o/k;if(0>t){y+=t}}else{var A=q*w/c;var y=o*u/k}d(this).find("img").css({left:-(q*w/c)+"px",top:-(o*u/k)+"px",width:q+"px",height:o+"px"});var s={left:A+"px",top:y+"px",width:q/c+"px",height:o/k+"px",};if(m){d(this).animate(s,{queue:false,duration:l.duration})}else{d(this).css(s)}})}this.go=function(m,o){if(!g.length){i()}f.show();d(g).stop(1).css({opacity:1,"z-index":3}).find("img").attr("src",e.get(o).src);d(b).stop(1).css({opacity:0,"z-index":2}).find("img").attr("src",e.get(m).src);j(b,false,true);d(b).animate({opacity:1},{queue:false,easing:"easeInOutExpo",duration:l.duration});j(g,true,true);d(g).animate({opacity:0},{queue:false,easing:"easeInOutExpo",duration:l.duration,complete:function(){h.find("ul").css({left:-m+"00%"});f.hide()}});var n=b;b=g;g=n;return m}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"blast",prev:"",next:"",duration:10*100,delay:20*100,width:960,height:360,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true,logo:"engine1/loading.gif",images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergalaxycollage'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/galaxy-collage/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 5.1
 *	template Galaxy
 */
@import url("http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px 0; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width: 17px;
	height: 17px;

	background-image: url(./bullet.png);
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
	background-size: 100%;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-4.2em;
	z-index:60;
	width: 4.2em;	
	height: 8.4em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size: 200%;
	opacity: 1;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 0 0;
	right: 0;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 100% 0;
	left: 0;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 8.4em;
    height: 8.4em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -4.2em;
    margin-top: -4.2em;
    z-index: 59;
	background-size: 100%;
	opacity: 1;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}/* bottom right */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 30px;
	right: 10px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 2em;
	left: 0;
	padding:1em;
	padding-left: 3em;
	margin-right:1em;
	color:#FFFFFF;	
	z-index: 50;
	line-height: 2.8em;
	text-transform: none;
	color: #fff;
	font-family: "Roboto Condensed", sans-serif;
	text-shadow: none;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	opacity:1;
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:0.3em;
	font-size: 1.2em;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.1em;
	text-transform: uppercase; 
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 20s infinite;
	-moz-animation: wsBasic 20s infinite;
	-webkit-animation: wsBasic 20s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-64px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #FFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:48px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:128px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:26px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid #FFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-2px;
	left:64px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>The berenike haar constellation</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/ngc456511635.jpg" alt="css gallery business" title="Galaxy" id="wows1_0"/>The berenike haar constellation</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy10994.jpg" alt="css gallery code" title="Galaxy" id="wows1_1"/>Barred Spiral Galaxy</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy252885.jpg" alt="css gallery design" title="Galaxy" id="wows1_2"/>Universe Raumfahrt</li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/milkyway67504.jpg" alt="css gallery example" title="Galaxy" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/images/galaxy74005.jpg" alt="css gallery furniture" title="Tarantula Nebula" id="wows1_4"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/ngc456511635.jpg" alt="css gallery business"/>1</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy10994.jpg" alt="css gallery code"/>2</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy252885.jpg" alt="css gallery design"/>3</a>
<a href="#" title="Galaxy"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/milkyway67504.jpg" alt="css gallery example"/>4</a>
<a href="#" title="Tarantula Nebula"><img src="http://www.wowslider.com/images/demo/galaxy-collage/data1/tooltips/galaxy74005.jpg" alt="css gallery furniture"/>5</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<span class="wsl"><a href="http://wowslider.com">css gallery image</a></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/galaxy-collage/engine1/script.js"></script>-->
	<script type="text/javascript">
	function ws_collage(t,e,r){function i(t,e,a){return parseFloat(a*(e-t)+t)}function n(e,a,r){var i=r*a.x,n=r*a.y,h=r*a.width,o=r*a.height;f?(e.save(),e.translate(i+.5*h,n+.5*o),e.rotate(a.angle*Math.PI/180),e.scale(a.scale,a.scale),a.img&&e.drawImage(a.img,-.5*h,-.5*o,h,o),e.restore()):l("<img>").attr("src",a.img).css({position:"absolute",width:100*h/t.width+"%",height:100*o/t.height+"%",left:100*i/t.width+"%",top:100*n/t.height+"%"}).appendTo(e)}function h(e,r,h,o,c,g){var s=Q[e],l=Q[r],d=new Date,w=setInterval(function(){var e=(new Date-d)/t.duration;e>1&&(e=1);var r=1-2*e;if(0>r&&(r*=-1,r>1&&(r=1)),r=jQuery.easing.easeInOutQuad(1,r,0,1,1),e=jQuery.easing.easeInOutQuad(1,e,0,1,1),f){T.width=o,T.height=c,N.width=o,N.height=c;var u=i(t.width/l.width,t.width/s.width,e),v=i(.5,i(1/l.scale,1/s.scale,e),r),m=i(1/l.scale,1/s.scale,e);if(a=i(l.angle,s.angle,e),y=h*s.width,M=h*s.height,b=h*i(l.x,s.x,e),I=h*i(l.y,s.y,e),X&&z&&(T.ctx.drawImage(z,0,0,o,c),T.ctx.save(),T.ctx.translate(b+.5*y,I+.5*M),T.ctx.rotate(-a*Math.PI/180),T.ctx.scale(m,m),T.ctx.translate(-(b+.5*y),-(I+.5*M)),T.ctx.transform(m,0,0,m,-b*m,-I*m),T.ctx.drawImage(z,-o,-c,4*o,4*c),T.ctx.restore()),T.ctx.transform(u,0,0,u,-b*u,-I*u),T.ctx.translate(b+.5*y,I+.5*M),T.ctx.rotate(-a*Math.PI/180),T.ctx.scale(v,v),T.ctx.translate(-(b+.5*y),-(I+.5*M)),T.ctx.globalAlpha=i(.2,1,r),x)for(F in Q)n(T.ctx,Q[F],h);else T.ctx.drawImage(H,0,0);T.ctx.globalAlpha=1,T.ctx.globalAlpha=i(0,1,r),n(T.ctx,s,h),T.ctx.globalAlpha=i(1,0,2*e>1?1:2*e),n(T.ctx,l,h),T.ctx.globalAlpha=1,N.ctx.drawImage(T,0,0)}else{var p=i(2,o/(l.width*h),r),b=-h*i(l.x,s.x,e)*p,I=-h*i(l.y,s.y,e)*p,y=o*p,M=c*p;N.css({left:b,top:I,width:y,height:M})}A.show(),1==e&&(clearInterval(w),g())},Math.ceil(1e3/u))}function o(t,a,r,i,h){if(!(t>a||!Q[t]||Q[t].img)){var c=new Image;c.onload=function(){Q[t].img=c,r&&t!=h[0]&&t!=h[1]?(n(i,Q[t],1),o(t+1,a,!0,i,h)):o(t+1,a,!1)},c.onerror=function(){r&&t!=h[0]&&t!=h[1]?(n(i,Q[t],1),o(t+1,a,!0,i,h)):o(t+1,a,!1)},c.src=e[t].src}}function c(t,e,a){return f?(a.ctx.drawImage(t.get(0),0,0),g(a.ctx,0,0,a.width,a.height,e)||a.ctx.drawImage(t.get(0),0,0),!0):cont}function g(t,e,a,r,i,n){if(!(isNaN(n)||1>n)){n|=0;var h;try{h=t.getImageData(e,a,r,i)}catch(o){return console.log("error:unable to access image data: "+o),!1}var c,g,l,d,x,w,f,u,v,m,p,b,I,y,M,Q,A,C,j,D,O=h.data,P=n+n+1,q=r-1,E=i-1,F=n+1,N=F*(F+1)/2,T=new s,z=T;for(l=1;P>l;l++)if(z=z.next=new s,l==F)var H=z;z.next=T;var L=null,R=null;f=w=0;var S=_[n],X=k[n];for(g=0;i>g;g++){for(y=M=Q=u=v=m=0,p=F*(A=O[w]),b=F*(C=O[w+1]),I=F*(j=O[w+2]),u+=N*A,v+=N*C,m+=N*j,z=T,l=0;F>l;l++)z.r=A,z.g=C,z.b=j,z=z.next;for(l=1;F>l;l++)d=w+((l>q?q:l)<<2),u+=(z.r=A=O[d])*(D=F-l),v+=(z.g=C=O[d+1])*D,m+=(z.b=j=O[d+2])*D,y+=A,M+=C,Q+=j,z=z.next;for(L=T,R=H,c=0;r>c;c++)O[w]=u*S>>X,O[w+1]=v*S>>X,O[w+2]=m*S>>X,u-=p,v-=b,m-=I,p-=L.r,b-=L.g,I-=L.b,d=f+((d=c+n+1)<q?d:q)<<2,y+=L.r=O[d],M+=L.g=O[d+1],Q+=L.b=O[d+2],u+=y,v+=M,m+=Q,L=L.next,p+=A=R.r,b+=C=R.g,I+=j=R.b,y-=A,M-=C,Q-=j,R=R.next,w+=4;f+=r}for(c=0;r>c;c++){for(M=Q=y=v=m=u=0,w=c<<2,p=F*(A=O[w]),b=F*(C=O[w+1]),I=F*(j=O[w+2]),u+=N*A,v+=N*C,m+=N*j,z=T,l=0;F>l;l++)z.r=A,z.g=C,z.b=j,z=z.next;for(x=r,l=1;n>=l;l++)w=x+c<<2,u+=(z.r=A=O[w])*(D=F-l),v+=(z.g=C=O[w+1])*D,m+=(z.b=j=O[w+2])*D,y+=A,M+=C,Q+=j,z=z.next,E>l&&(x+=r);for(w=c,L=T,R=H,g=0;i>g;g++)d=w<<2,O[d]=u*S>>X,O[d+1]=v*S>>X,O[d+2]=m*S>>X,u-=p,v-=b,m-=I,p-=L.r,b-=L.g,I-=L.b,d=c+((d=g+F)<E?d:E)*r<<2,u+=y+=L.r=O[d],v+=M+=L.g=O[d+1],m+=Q+=L.b=O[d+2],L=L.next,p+=A=R.r,b+=C=R.g,I+=j=R.b,y-=A,M-=C,Q-=j,R=R.next,w+=r}return t.putImageData(h,e,a),!0}}function s(){this.r=0,this.g=0,this.b=0,this.a=0,this.next=null}var l=jQuery,d=l("ul",r),x=t.maxQuality||!0,w=t.maxPreload||20,f=!t.noCanvas&&document.createElement("canvas").getContext,u=30,v=10,m=!1,p=.3,b=.7,I=-180,y=180,M=e.length,Q=[];r=r.parent();var A=l("<div>").css({position:"absolute",width:"100%",height:"100%",left:0,top:0,overflow:"hidden","z-index":8}).appendTo(r),C=0,j=0,D=t.width/(Math.sqrt(M)+1),O=t.height/(Math.sqrt(M)+1),P=Math.floor(t.width/D);for(F=0;M>F;F++)D+C>D*P&&(j=Math.floor(D*(F+1)/t.width)*O,C=0),Q[F]={x:C,y:j,width:D,height:O,img:null},f&&(Q[F].scale=i(p,b,Math.random()),Q[F].angle=i(I,y,Math.random())),C+=parseFloat(D);for(var q,E,F=Q.length;F;q=parseInt(Math.random()*F),E=Q[--F],Q[F]=Q[q],Q[q]=E);if(f){var N=l("<canvas>")[0];N.ctx=N.getContext("2d"),N.width=A.width(),N.height=A.height();var T=l("<canvas>")[0];T.ctx=T.getContext("2d"),T.width=A.width(),T.height=A.height();var z=l("<canvas>")[0];if(z.ctx=z.getContext("2d"),z.width=A.width(),z.height=A.height(),!x){var H=l("<canvas>")[0];H.ctx=H.getContext("2d"),H.width=A.width(),H.height=A.height()}A.append(N)}else{var N=A.clone().css({overflow:"visible"});A.css("display","none").append(N);for(F in Q)Q[F].img=e[F].src,n(N,Q[F],1);for(var L=M%P,R=2*P-L,F=(Math.ceil(M/P)+1,0);R>F;F++)n(N,{img:e[F].src,width:D,height:O,x:D*((L+F)%P),y:j+Math.floor((L+F)/P)*O},1);for(var F=0;R>F;F++)n(N,{img:e[F].src,width:D,height:O,x:D*P,y:F*O},1)}var S,X;this.go=function(a,r){if(S)return-1;if(window.XMLHttpRequest){var n=A.width(),g=A.height(),s=n/t.width;f&&(o(r,r,!1),o(a,a,!1),x?o(2,w+1,!1):(H.width=n,H.height=g,o(2,w+1,!0,H.ctx,[r,a])),X||m||(rand=Math.round(i(0,M-1,Math.random())),z.width=A.width(),z.height=A.height(),X=c(l(e[rand]),v,z))),S=new h(a,r,s,n,g,function(){if(d.css({left:-a+"00%"}).show(),A.hide(),S=0,!x&&f)for(s in Q)Q[s].img=null})}else S=0,d.stop(!0).animate({left:a?-a+"00%":/Safari/.test(navigator.userAgent)?"0%":0},t.duration,"easeInOutExpo");return a};var _=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259],k=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24]}jQuery.extend(jQuery.easing,{easeInOutQuad:function(t,e,a,r,i){return(e/=i/2)<1?r/2*e*e+a:-r/2*(--e*(e-2)-1)+a}});
jQuery("#wowslider-container'.$val.'").wowSlider({
	effect:"collage", 
	prev:"", 
	next:"", 
	duration: 20*100, 
	delay:20*100, 
	width:960,
	height:360,
	autoPlay:true,
	playPause:false,
	stopOnHover:false,
	loop:false,
	bullets:true,
	caption: true, 
	captionEffect:"move",
	controls:true,
	onBeforeStep:0,
	images:0
});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderstrictphoto'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/strict-photo/engine1/style.css" />-->
	<style>

@import url("http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px 0; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width: 25px;
	height: 25px;

	background-image: url(./bullet.png);
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
	background-size: 100%;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-2.9em;
	z-index:60;
	width: 5.8em;	
	height: 5.8em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size: 200%;
	opacity: 0.7;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 0 0; 
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 100% 0;
	left:0px;
}
#wowslider-container'.$val.' a.ws_next:hover,
#wowslider-container'.$val.' a.ws_prev:hover{
	opacity: 0.9;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 5.8em;
    height: 5.8em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -2.9em;
    margin-top: -2.9em;
    z-index: 59;
	background-size: 100%;
	opacity: 0.7;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause,
#wowslider-container'.$val.' .ws_play,
#wowslider-container'.$val.' a.ws_next,
#wowslider-container'.$val.' a.ws_prev {
	-webkit-transition: opacity .3s ease;
	-moz-transition: opacity .3s ease;
	-ms-transition: opacity .3s ease;
	-o-transition: opacity .3s ease;
	transition: opacity .3s ease;
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    opacity: 0.9;
}

/* shadow */
#wowslider-container'.$val.' .ws_shadow {
	overflow: hidden;
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;

	-webkit-box-shadow: inset 0 -39px 20px -20px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: inset 0 -39px 20px -20px rgba(0, 0, 0, 0.2);
	box-shadow: inset 0 -39px 20px -20px rgba(0, 0, 0, 0.2);
	z-index: 8;
}
#wowslider-container'.$val.' .ws_shadow:before {
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 10%;
    background: url(./shadow.png);
    -webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
}/* bottom right */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left: 50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 4em;
	left: 0px; 
	margin-right:1em;
	padding:1em;
	background-color: rgba(96,125,246,0.7);
	color: #fff;
	z-index: 50;
	font-family:"Roboto Condensed","MS Sans Serif",Geneva,sans-serif;
	line-height: 2.7em;
	text-transform: none;
	opacity:1;
	text-shadow: none;
}
#wowslider-container'.$val.' .ws-title div{
    padding-top: 0.15em;
	font-size: 1.8em;
	line-height: 1.3em;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.6em;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-moz-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 5%{left:-0%} 10%{left:-100%} 15%{left:-100%} 20%{left:-200%} 25%{left:-200%} 30%{left:-300%} 35%{left:-300%} 40%{left:-400%} 45%{left:-400%} 50%{left:-500%} 55%{left:-500%} 60%{left:-600%} 65%{left:-600%} 70%{left:-700%} 75%{left:-700%} 80%{left:-800%} 85%{left:-800%} 90%{left:-900%} 95%{left:-900%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-64px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:48px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:128px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:31px;
	margin-left: 3px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid rgba(96,125,246,0.7);
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-1px;
	left:64px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Monument in Leipzig, Germany</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/voelkerschlachtdenkmal264413_1280.jpg" alt="jquery photo gallery builder" title="The Monument to the Battle of the Nations" id="wows1_0"/>Monument in Leipzig, Germany</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/castle195105_1920.jpg" alt="jquery photo gallery carousel" title="Castle" id="wows1_1"/>Middle Ages</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/moatedcastle179331_1280.jpg" alt="jquery photo gallery download" title="Castle" id="wows1_2"/>Anholt</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/paris114323_1280.jpg" alt="jquery photo gallery for website" title="Place de la Concord" id="wows1_3"/>Paris</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/chicago199859_1280.jpg" alt="jquery photo gallery html" title="Sculpture" id="wows1_4"/>Chicago</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/towerbridge189077_1280.jpg" alt="jquery photo gallery javascript" title="Tower Bridge" id="wows1_5"/>the River Thames, London</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/sanfrancisco225592_1280.jpg" alt="jquery photo gallery lighting" title="Golden Gate Bridge" id="wows1_6"/>San Francisco</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/chateauofdesullysurloire196390_1280.jpg" alt="jquery photo gallery plugin" title="Sully-sur-Loire" id="wows1_7"/>France</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/berlin143832_1280.jpg" alt="jquery photo gallery software" title="House of the Cultures of the World" id="wows1_8"/>Berlin</li>
<li><img src="http://www.wowslider.com/images/demo/strict-photo/data1/images/paris253920_1280.jpg" alt="jquery photo gallery wordpress" title="Eiffel Tower" id="wows1_9"/>Paris</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

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
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<span class="wsl"><a href="http://wowslider.com">jquery photo gallery code</a></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/strict-photo/engine1/script.js"></script>-->
	<script type="text/javascript">
	function ws_photo(c,f,j){var d=jQuery,l=d("ul",j),j=j.parent(),g=f.length,u=c.imagesCount||30,m=30,e=80,h=2*c.width/100;var a=d("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden",backgroundColor:"#DDDDDD"}).appendTo(j);var n=d("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",backgroundColor:"rgba(0,0,0,0.6)",zIndex:4}).appendTo(a);var b=a.width()/c.width,p=Math.max(u,f.length);for(var q=0,o=0;q<p;q++){if(o>f.length){o-=f.length}d(f[o]).clone().appendTo(a);o++}var r=a.children("img");d.support.transition=(function(){var i=document.body||document.documentElement,k=i.style;return k.transition!==undefined||k.WebkitTransition!==undefined||k.MozTransition!==undefined||k.MsTransition!==undefined||k.OTransition!==undefined})();function s(k,i){return parseFloat(Math.random()*(i-k)+k)}function t(E,z,i,w,A,k){if(w&&z){var F=e,D=50-F/2,C=50-F/2,v=0,B=5}else{var F=m,D=s(-10,90),C=s(-10,90),v=s(-30,30),B=z?5:(i?3:2)}E.css({position:"absolute",zIndex:B,border:h*A+"px solid white"});if(d.support.transition){E.css({top:C+"%",left:D+"%",marginLeft:-h*A,marginTop:-h*A,width:F+"%",height:F+"%",transform:"rotate("+v+"deg)",transition:"all "+k+"ms ease-in-out"})}else{E.animate({top:C+"%",left:D+"%",marginLeft:-h*A,marginTop:-h*A,width:F+"%",height:F+"%"},k)}}r.each(function(i){t(d(this),c.startSlide==i,false,true,b,0)});this.go=function(i,v){if(window.XMLHttpRequest){b=a.width()/c.width;var k=c.duration*0.5;r.each(function(w){t(d(this),i==w,v==w,false,b,k)});n.fadeOut(k);setTimeout(function(){r.each(function(w){t(d(this),i==w,v==w,true,b,k)});n.fadeIn(k)},k)}else{l.stop(true).animate({left:(i?-i+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},c.duration,"easeInOutExpo")}return i}};

jQuery("#wowslider-container'.$val.'").wowSlider({
	effect:"photo", 
	prev:"", 
	next:"", 
	duration: 20*100, 
	delay:20*100, 
	width:960,
	height:360,
	autoPlay:true,
	playPause:false,
	stopOnHover:false,
	loop:false,
	bullets:true,
	caption: true, 
	captionEffect:"slide",
	controls:true,
	onBeforeStep:0,
	images:0
});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslidergrafitoseven'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/grafito-seven/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 5.1
 *	template Graffito
 */
@import url("http://fonts.googleapis.com/css?family=Averia+Sans+Libre");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px 0; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width: 20px;
	height: 20px;

	background-image: url(./bullet.png);
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
	background-size: 100%;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-1.1em;
	z-index:60;
	width: 2.2em;	
	height: 2.2em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size: 200%;
	opacity: 0.7;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 0 0; 
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 100% 0;
	left:10px;
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 0 100%; 
	opacity: 1;
}
#wowslider-container'.$val.' a.ws_prev:hover{
	background-position: 100% 100%;
	opacity: 1;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 2.4em;
    height: 2.4em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -1.2em;
    margin-top: -1.2em;
    z-index: 59;
	background-size: 100%;
	opacity: 0.5;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
	background-position: 0 0; 
    opacity: 0.5;
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
	background-position: 0 0; 
    opacity: 0.5;
}

#wowslider-container'.$val.' .ws_pause:hover {
	background-position: 0 100%; 
    opacity: 1;
}
#wowslider-container'.$val.' .ws_play:hover {
	background-position: 0 100%; 
    opacity: 1;
}

#wowslider-container'.$val.',
#wowslider-container'.$val.' .ws_effect,
#wowslider-container'.$val.' .ws_images img {
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}/* bottom right */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left: 50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 2em;
	left: 0;
	margin-right:1em;
	padding:1em;
	padding-left: 3em;
	z-index: 50;
	font-family: "Averia Sans Libre", cursive;
	line-height: 2.7em;
	text-transform: none;
	opacity:1;
	text-shadow: .2em .2em .5em #000;
}
#wowslider-container'.$val.' .ws-title div{
    padding-top: 0.15em;
	font-size: 2.8em;
	color: #fff;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2em;
	color: #DDF16E;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 20s infinite;
	-moz-animation: wsBasic 20s infinite;
	-webkit-animation: wsBasic 20s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 20%{left:-100%} 30%{left:-100%} 40%{left:-200%} 50%{left:-200%} 60%{left:-300%} 70%{left:-300%} 80%{left:-400%} 90%{left:-400%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-51px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:48px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:102px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:26px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid rgba(0,0,0,0.5);
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-11px;
	margin-left:-1px;
	left:51px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>is an automobile manufactured by the Ford Motor Company</li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/ford64041_1280.jpg" alt="wordpress gallery plugin online" title="Ford Mustang" id="wows1_0"/>is an automobile manufactured by the Ford Motor Company</li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/crazy57942_1280.jpg" alt="wordpress gallery plugin reviews" title="Overpainted Wolksvagen" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/car101975_1280.jpg" alt="wordpress gallery plugin style" title="Yellow Car" id="wows1_2"/>Chevrolet Camaro</li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/audi87448_1280.jpg" alt="wordpress image gallery plugin" title="Audi A7" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/images/pontiacbonneville78259_1280.jpg" alt="wordpress gallery plugin guru" title="Pontiac Bonneville" id="wows1_4"/>1958 Classic</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Ford Mustang"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/ford64041_1280.jpg" alt="Ford Mustang"/>1</a>
<a href="#" title="Overpainted Wolksvagen"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/crazy57942_1280.jpg" alt="Overpainted Wolksvagen"/>2</a>
<a href="#" title="Yellow Car"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/car101975_1280.jpg" alt="Yellow Car"/>3</a>
<a href="#" title="Audi A7"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/audi87448_1280.jpg" alt="Audi A7"/>4</a>
<a href="#" title="Pontiac Bonneville"><img src="http://www.wowslider.com/images/demo/grafito-seven/data1/tooltips/pontiacbonneville78259_1280.jpg" alt="Pontiac Bonneville"/>5</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/grafito-seven/engine1/script.js"></script>-->
	<script type="text/javascript">
	function ws_seven(i,t,k){var l=jQuery;var j=i.distance||5;var c=i.cols;var s=i.rows;var a=i.duration*2;var m=i.blur||50;var w=k.find("ul");var z=[];var r=[];k=k.parent().css({overflow:"visible"});var p=!i.noCanvas&&!window.opera&&!!document.createElement("canvas").getContext;var h;var d=l("<div>").addClass("ws_effect");var u=l("<div>").addClass("ws_zoom");k.append(d,u);var e={t:l(window).scrollTop(),l:l(window).scrollLeft(),w:l(window).width(),h:l(window).height()};jQuery.extend(jQuery.easing,{easeOutQuart:function(B,C,A,E,D){return -E*((C=C/D-1)*C*C*C-1)+A},easeInExpo:function(B,C,A,E,D){return(C==0)?A:E*Math.pow(2,10*(C/D-1))+A},easeInCirc:function(B,C,A,E,D){return -E*(Math.sqrt(1-(C/=D)*C)-1)+A}});function o(B,A){return Math.abs((A%2?1:0)+((A-A%2)/2)-B)/A}function y(E,D,F,A){var C=(D>=A)?(A)/(D):1;var B=(E>=F)?(F)/(E):1;return{l:B,t:C,m:Math.min(B,C)}}function q(L,A,D,M){var H=d.width(),J=d.height(),K=j*H/c,F=j*J/s,G=a*(D?4:5)/(c*s),C=D?"easeInExpo":"easeOutQuart";var B=e.h+e.t-J/s,I=e.w+e.l-H/c,N=d.offset().top+d.height(),E=d.offset().left+d.width();if(B<N){B=N}if(I<E){I=E}l(L).each(function(V){var S=V%c,P=Math.floor(V/c),T=a*0.2*(o(S,c)*45+P*4)/(c*s),R=d.offset().left+e.l+K*S-H*j/2+K,U=d.offset().top+e.t+F*P-J*j/2+F,O=y(R,U,I,B),W={opacity:1,left:H*S/c,top:J*P/s,width:H/c,height:J/s,zIndex:Math.ceil(100-o(S,c)*100)},Z={opacity:0,left:(K*S-H*j/2)*O.l,top:(F*P-J*j/2)*O.t,width:K*O.m,height:F*O.m},Y={left:-(H*S/c),top:-(J*P/s),width:H,height:J},X={left:-K*S*O.m,top:-F*P*O.m,width:j*H*O.m,height:j*J*O.m};if(!D){var Q=W;W=Z;Z=Q;Q=Y;Y=X;X=Q}l(this).css(W).delay(T).animate(Z,G,C,D?function(){l(this).hide()}:{});l(this).find("img").css(Y).delay(T).animate(X,G,C)});if(D){l(A).each(function(Q){var R=Q%c;var P=Math.floor(Q/c);var O=a*0.2+a*0.15*(o(R,c)*35+P*4)/(c*s);l(this).css({left:H/2,top:J/2,width:0,height:0,zIndex:Math.ceil(100-o(R,c)*100)}).delay(O).animate({left:H*R/c,top:J*P/s,width:H/c+1,height:J/s+1},a*4/(c*s),"easeOutBack");l(this).find("img").css({left:0,top:0,width:0,height:0}).delay(O).animate({left:-(H*R/c),top:-(J*P/s),width:H,height:J},a*4/(c*s),"easeOutBack")});u.delay(a*0.1).animate({opacity:1},a*0.2,"easeInCirc")}setTimeout(M,D?a*0.5:a*0.4);return{stop:function(){M()}}}var g;this.go=function(I,C){if(g){return C}var H=(C==0&&I!=C+1)||(I==C-1)?false:true;e.t=l(window).scrollTop();e.l=l(window).scrollLeft();e.w=l(window).width();e.h=l(window).height();var A=Math.max((i.width||d.width())/(i.height||d.height())||3,3);c=c||Math.round(A<1?3:3*A);s=s||Math.round(A<1?3/A:3);d.css({position:"absolute",width:k.width(),height:k.height(),left:0,top:0,zIndex:8,transform:"translate3d(0,0,0)"});u.css({position:"absolute",width:k.width(),height:k.height(),top:0,left:0,zIndex:2,transform:"translate3d(0,0,0)"});for(var F=0;F<c*s;F++){var E=F%c;var D=Math.floor(F/c);l(z[F]=document.createElement("div")).css({position:"absolute",overflow:"hidden",transform:"translate3d(0,0,0)"}).appendTo(d).append(l("<img>").css({position:"absolute",transform:"translate3d(0,0,0)"}).attr("src",t.get(H?C:I).src));if(H){l(r[F]=document.createElement("div")).css({position:"absolute",overflow:"hidden",transform:"translate3d(0,0,0)"}).appendTo(u).append(l("<img>").css({position:"absolute",transform:"translate3d(0,0,0)"}).attr("src",t.get(I).src))}}z=l(z);if(H){r=l(r)}if(H){u.css("opacity",0);var B;if(p){try{document.createElement("canvas").getContext("2d").getImageData(0,0,1,1)}catch(G){p=0}w.hide();h="<canvas width="'+k.width()+'" height="'+k.height()+'"/>";h=l(h).css({"z-index":1,position:"absolute",width:"100%",height:"100%",left:0,top:0}).appendTo(k);B=x(l(t.get(C)),m,h.get(0))}else{p=0;B=x(l(t.get(C)),8)}}else{u.append(l("<img>").css({position:"absolute",width:"100%",height:"100%"}).attr("src",t.get(C).src))}g=new q(z,r,H,function(){w.css({left:-I+"00%"}).stop(true,true).show();d.empty().removeAttr("style");u.empty().removeAttr("style");if(h){h.remove()}g=0});return I};function x(B,D,C){var E=(parseInt(B.parent().css("z-index"))||0)+1;if(p){var A=C.getContext("2d");A.drawImage(B.get(0),0,0);if(!b(A,0,0,C.width,C.height,D)){return 0}return l(C)}}var n=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];var v=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];function b(ap,X,V,A,B,ag){if(isNaN(ag)||ag<1){return}ag|=0;var ak;try{ak=ap.getImageData(X,V,A,B)}catch(ao){console.log("error:unable to access image data: "+ao);return false}var F=ak.data;var ae,ad,am,aj,M,P,J,D,E,U,K,W,S,aa,af,N,I,O,Q,Z;var an=ag+ag+1;var ab=A<<2;var L=A-1;var ai=B-1;var H=ag+1;var ah=H*(H+1)/2;var Y=new f();var T=Y;for(am=1;am<an;am++){T=T.next=new f();if(am==H){var G=T}}T.next=Y;var al=null;var ac=null;J=P=0;var R=n[ag];var C=v[ag];for(ad=0;ad<B;ad++){aa=af=N=D=E=U=0;K=H*(I=F[P]);W=H*(O=F[P+1]);S=H*(Q=F[P+2]);D+=ah*I;E+=ah*O;U+=ah*Q;T=Y;for(am=0;am<H;am++){T.r=I;T.g=O;T.b=Q;T=T.next}for(am=1;am<H;am++){aj=P+((L<am?L:am)<<2);D+=(T.r=(I=F[aj]))*(Z=H-am);E+=(T.g=(O=F[aj+1]))*Z;U+=(T.b=(Q=F[aj+2]))*Z;aa+=I;af+=O;N+=Q;T=T.next}al=Y;ac=G;for(ae=0;ae<A;ae++){F[P]=(D*R)>>C;F[P+1]=(E*R)>>C;F[P+2]=(U*R)>>C;D-=K;E-=W;U-=S;K-=al.r;W-=al.g;S-=al.b;aj=(J+((aj=ae+ag+1)<L?aj:L))<<2;aa+=(al.r=F[aj]);af+=(al.g=F[aj+1]);N+=(al.b=F[aj+2]);D+=aa;E+=af;U+=N;al=al.next;K+=(I=ac.r);W+=(O=ac.g);S+=(Q=ac.b);aa-=I;af-=O;N-=Q;ac=ac.next;P+=4}J+=A}for(ae=0;ae<A;ae++){af=N=aa=E=U=D=0;P=ae<<2;K=H*(I=F[P]);W=H*(O=F[P+1]);S=H*(Q=F[P+2]);D+=ah*I;E+=ah*O;U+=ah*Q;T=Y;for(am=0;am<H;am++){T.r=I;T.g=O;T.b=Q;T=T.next}M=A;for(am=1;am<=ag;am++){P=(M+ae)<<2;D+=(T.r=(I=F[P]))*(Z=H-am);E+=(T.g=(O=F[P+1]))*Z;U+=(T.b=(Q=F[P+2]))*Z;aa+=I;af+=O;N+=Q;T=T.next;if(am<ai){M+=A}}P=ae;al=Y;ac=G;for(ad=0;ad<B;ad++){aj=P<<2;F[aj]=(D*R)>>C;F[aj+1]=(E*R)>>C;F[aj+2]=(U*R)>>C;D-=K;E-=W;U-=S;K-=al.r;W-=al.g;S-=al.b;aj=(ae+(((aj=ad+H)<ai?aj:ai)*A))<<2;D+=(aa+=(al.r=F[aj]));E+=(af+=(al.g=F[aj+1]));U+=(N+=(al.b=F[aj+2]));al=al.next;K+=(I=ac.r);W+=(O=ac.g);S+=(Q=ac.b);aa-=I;af-=O;N-=Q;ac=ac.next;P+=A}}ap.putImageData(ak,X,V);return true}function f(){this.r=0;this.g=0;this.b=0;this.a=0;this.next=null}};
jQuery("#wowslider-container'.$val.'").wowSlider({
	effect:"seven", 
	prev:"", 
	next:"", 
	duration: 20*100, 
	delay:20*100, 
	width:960,
	height:450,
	autoPlay:true,
	playPause:false,
	stopOnHover:false,
	loop:false,
	bullets:true,
	caption: true, 
	captionEffect:"slide",
	controls:true,
	onBeforeStep:0,
	images:0
});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowslideremeraldphoto'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/emerald-photo/engine1/style.css" />-->
	
	<style>
	/*
 *	generated by WOW Slider 4.9
 *	template Emerald
 */
@import url("http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:4px solid #0cad00;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}

#wowslider-container'.$val.' { 
	border-left: 0px;
	border-right: 0px;
	border-top: 0px;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px 0; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:20px;
	height:6px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-1.9em;
	z-index:60;
	width: 3.9em;	
	height: 3.9em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size: 200%;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:0px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 1.8em;
    height: 2.8em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -0.9em;
    margin-top: -1.4em;
    z-index: 59;
	background-size: 100%;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom right */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	right: 0px;
}

#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 2em;
	left: 0px; 
	margin-right:1em;
	padding:1em;
	background:#0cad00;
	color:#FFFFFF;
	z-index: 50;
	font-family:"Roboto Condensed","MS Sans Serif",Geneva,sans-serif;
	line-height: 2.7em;
	text-transform: none;
	opacity:1;
}
#wowslider-container'.$val.' .ws-title div{
    padding-top: 0.15em;
	font-size: 1.8em;
	line-height: 1.8em;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.6em;
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 30s infinite;
	-moz-animation: wsBasic 30s infinite;
	-webkit-animation: wsBasic 30s infinite;
}
@keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 16.67%{left:-100%} 26.67%{left:-100%} 33.33%{left:-200%} 43.33%{left:-200%} 50%{left:-300%} 60%{left:-300%} 66.67%{left:-400%} 76.67%{left:-400%} 83.33%{left:-500%} 93.33%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 16.67%{left:-100%} 26.67%{left:-100%} 33.33%{left:-200%} 43.33%{left:-200%} 50%{left:-300%} 60%{left:-300%} 66.67%{left:-400%} 76.67%{left:-400%} 83.33%{left:-500%} 93.33%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 10%{left:-0%} 16.67%{left:-100%} 26.67%{left:-100%} 33.33%{left:-200%} 43.33%{left:-200%} 50%{left:-300%} 60%{left:-300%} 66.67%{left:-400%} 76.67%{left:-400%} 83.33%{left:-500%} 93.33%{left:-500%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:11px;
	margin-left:0px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-9px;
	margin-left:-1px;
	left:120px;
	background:url(./triangle.png);
	width:13px;
	height:7px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/cactuses.jpg" alt="Cactuses, Canary Islands: slider javascript plugin" title="Cactuses, Canary Islands" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/crater.jpg" alt="Crater, Gran Canaria: slider javascript example" title="Crater, Gran Canaria" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/galdar.jpg" alt="Galdar, Gran Canaria: slider javascript mobile" title="Galdar, Gran Canaria" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/gran_canaria.jpg" alt="Panorama, Gran Canaria: image slider with javascript" title="Panorama, Gran Canaria" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/green_rocks.jpg" alt="Green Rocks, Gran Canaria: slider using javascript" title="Green Rocks, Gran Canaria" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/images/maspalomas.jpg" alt="Maspalomas, Gran Canaria: download slider javascript" title="Maspalomas, Gran Canaria" id="wows1_5"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Cactuses, Canary Islands"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/cactuses.jpg" alt="Cactuses, Canary Islands"/>1</a>
<a href="#" title="Crater, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/crater.jpg" alt="Crater, Gran Canaria"/>2</a>
<a href="#" title="Galdar, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/galdar.jpg" alt="Galdar, Gran Canaria"/>3</a>
<a href="#" title="Panorama, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/gran_canaria.jpg" alt="Panorama, Gran Canaria"/>4</a>
<a href="#" title="Green Rocks, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/green_rocks.jpg" alt="Green Rocks, Gran Canaria"/>5</a>
<a href="#" title="Maspalomas, Gran Canaria"><img src="http://www.wowslider.com/images/demo/emerald-photo/data1/tooltips/maspalomas.jpg" alt="Maspalomas, Gran Canaria"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">slider javascript free</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/emerald-photo/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_photo(c,f,j){var d=jQuery,l=d("ul",j),j=j.parent(),g=f.length,u=c.imagesCount||30,m=30,e=80,h=2*c.width/100;var a=d("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden",backgroundColor:"#DDDDDD"}).appendTo(j);var n=d("<div>").css({position:"absolute",top:0,left:0,width:"100%",height:"100%",backgroundColor:"rgba(0,0,0,0.6)",zIndex:4}).appendTo(a);var b=a.width()/c.width,p=Math.max(u,f.length);for(var q=0,o=0;q<p;q++){if(o>f.length){o-=f.length}d(f[o]).clone().appendTo(a);o++}var r=a.children("img");d.support.transition=(function(){var i=document.body||document.documentElement,k=i.style;return k.transition!==undefined||k.WebkitTransition!==undefined||k.MozTransition!==undefined||k.MsTransition!==undefined||k.OTransition!==undefined})();function s(k,i){return parseFloat(Math.random()*(i-k)+k)}function t(E,z,i,w,A,k){if(w&&z){var F=e,D=50-F/2,C=50-F/2,v=0,B=5}else{var F=m,D=s(-10,90),C=s(-10,90),v=s(-30,30),B=z?5:(i?3:2)}E.css({position:"absolute",zIndex:B,border:h*A+"px solid white"});if(d.support.transition){E.css({top:C+"%",left:D+"%",marginLeft:-h*A,marginTop:-h*A,width:F+"%",height:F+"%",transform:"rotate("+v+"deg)",transition:"all "+k+"ms ease-in-out"})}else{E.animate({top:C+"%",left:D+"%",marginLeft:-h*A,marginTop:-h*A,width:F+"%",height:F+"%"},k)}}r.each(function(i){t(d(this),c.startSlide==i,false,true,b,0)});this.go=function(i,v){if(window.XMLHttpRequest){b=a.width()/c.width;var k=c.duration*0.5;r.each(function(w){t(d(this),i==w,v==w,false,b,k)});n.fadeOut(k);setTimeout(function(){r.each(function(w){t(d(this),i==w,v==w,true,b,k)});n.fadeIn(k)},k)}else{l.stop(true).animate({left:(i?-i+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},c.duration,"easeInOutExpo")}return i}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"photo",prev:"",next:"",duration:20*100,delay:30*100,width:960,height:360,autoPlay:true,playPause:false,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderglasslinear'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://wowslider.com/images/demo/glass-linear/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 4.9
 *	template Glass
 */
@import url(http://fonts.googleapis.com/css?family=Oranienbaum&subset=latin,latin-ext,cyrillic);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 111px;
	z-index:90;
	border:none;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}

#wowslider-container'.$val.'  .ws_bullets { 
	padding: 10px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	margin-left:5px;
	width:14px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-2.6em;
	z-index:60;
	width: 5.3em;	
	height: 5.3em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size: 200%;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0; 
	right:15px;
}
#wowslider-container'.$val.' a.ws_prev {
	left:15px;
	background-position: 0 0; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}

* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block} 

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 5.3em;
    height: 5.3em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -2.6em;
    margin-top: -2.6em;
    z-index: 59;
	background-size: 100%;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom:0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws_bullets .ws_bulframe {
	bottom: 20px;
}
#wowslider-container'.$val.' .ws-title{
	position: absolute;
	bottom:1.5em;
	left: 0;
	margin:1.5em;
	z-index: 50;
	padding:0.5em;
	color: #FFFFFF;
	background:rgba(255,255,255,0.4);
	border: 1px solid #FFFFFF;
    font-family: "Oranienbaum",Georgia,serif;
	line-height: 2.8em;
	font-weight: bold;
	border-radius:0.5em;
	-webkit-border-radius: 0.5em;
	-moz-border-radius: 0.5em;
	text-shadow: none;
}
#wowslider-container'.$val.' .ws-title div{
	margin-top:0.15em;
	font-size: 1.8em;
	line-height: 1.85em;
    font-weight: normal;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.8em;
}
#wowslider-container'.$val.'  .ws_thumbs { 
	font-size: 0px; 
	position:absolute;
	overflow:auto;
	z-index:70;
}
#wowslider-container'.$val.' .ws_thumbs img{
	text-decoration: none;
	border: 0;
	width: 100%;
}
#wowslider-container'.$val.' .ws_thumbs a {
	position:relative;
	text-indent: -4000px; 
	color:transparent;
	opacity:0.85;
	text-decoration: none;
	display: inline-block;
	border: 0;
	margin:0.24%;
	text-indent:0;
	padding: 0.15%;
	width: 11.72%;
}
#wowslider-container'.$val.' .ws_thumbs a:hover{
	opacity:1;
}
#wowslider-container'.$val.' .ws_thumbs a:hover img{
	visibility:visible;
}
#wowslider-container'.$val.'  .ws_thumbs { 
    bottom: -30.83%;
    left: 0;
	width:100%;
	max-height:$thumbFullHeight$px;
}
#wowslider-container'.$val.'  .ws_thumbs div{
	position:relative;
	letter-spacing:-4px;
	width:213.36%;
}#wowslider-container'.$val.' .ws_thumbs a.ws_selthumb{
	opacity: 1;
}

#wowslider-container'.$val.' .ws_thumbs  a{
    background-color:#FFFFFF;
	opacity: 0.5;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); 
}

#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 40s infinite;
	-moz-animation: wsBasic 40s infinite;
	-webkit-animation: wsBasic 40s infinite;
}
@keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 12.5%{left:-100%} 20%{left:-100%} 25%{left:-200%} 32.5%{left:-200%} 37.5%{left:-300%} 45%{left:-300%} 50%{left:-400%} 57.5%{left:-400%} 62.5%{left:-500%} 70%{left:-500%} 75%{left:-600%} 82.5%{left:-600%} 87.5%{left:-700%} 95%{left:-700%} }
@-moz-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 12.5%{left:-100%} 20%{left:-100%} 25%{left:-200%} 32.5%{left:-200%} 37.5%{left:-300%} 45%{left:-300%} 50%{left:-400%} 57.5%{left:-400%} 62.5%{left:-500%} 70%{left:-500%} 75%{left:-600%} 82.5%{left:-600%} 87.5%{left:-700%} 95%{left:-700%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 7.5%{left:-0%} 12.5%{left:-100%} 20%{left:-100%} 25%{left:-200%} 32.5%{left:-200%} 37.5%{left:-300%} 45%{left:-300%} 50%{left:-400%} 57.5%{left:-400%} 62.5%{left:-500%} 70%{left:-500%} 75%{left:-600%} 82.5%{left:-600%} 87.5%{left:-700%} 95%{left:-700%} }

#wowslider-container'.$val.' .ws_frame{
	display:block;
	position: absolute;
	left:0;
	top:0;
	bottom:0;
	right:0;
	border: 7px solid #FFFFFF;
	opacity: 0.4;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=40);
	z-index:9;
}
* html #wowslider-container'.$val.' .ws_frame{
	width:$FrameW$px;
	height:$FrameH$px;
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:15px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 2px solid #FFFFFF;
	border-radius:0px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 2px solid #FFFFFF;
	border-radius:0px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-9px;
	margin-left:-2px;
	left:120px;
	background:url(./triangle.png);
	width:15px;
	height:8px;
}
	</style>
	<script type="text/javascript" src="http://wowslider.com/images/demo/glass-linear/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';								
$i++;		
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bratislavacastle.jpg" alt="Bratislava castle, Slovakia: responsive image gallery code" title="Bratislava castle, Slovakia" id="wows1_0"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bratislava.jpg" alt="Bratislava, Slovakia: responsive image gallery download" title="Bratislava, Slovakia" id="wows1_1"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/bridge.jpg" alt="Bridge: responsive image gallery html" title="Bridge" id="wows1_2"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/dvorakovonabrezie.jpg" alt="Dvorakovo nabrezie, Bratislava: responsive image gallery javascript" title="Dvorakovo nabrezie, Bratislava" id="wows1_3"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/mainsquare.jpg" alt="Main square, Bratislava: responsive image gallery css" title="Main square, Bratislava" id="wows1_4"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/night.jpg" alt="Night view: responsive image gallery jquery" title="Night view" id="wows1_5"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/tree.jpg" alt="Tree in the park, Bratislava: responsive image gallery software" title="Tree in the park, Bratislava" id="wows1_6"/></li>
<li><img src="http://wowslider.com/images/demo/glass-linear/data1/images/twilight.jpg" alt="In the twilight: responsive image gallery free" title="In the twilight" id="wows1_7"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_thumbs">
<div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Bratislava castle, Slovakia"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bratislavacastle.jpg" alt="" /></a>
<a href="#" title="Bratislava, Slovakia"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bratislava.jpg" alt="" /></a>
<a href="#" title="Bridge"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/bridge.jpg" alt="" /></a>
<a href="#" title="Dvorakovo nabrezie, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/dvorakovonabrezie.jpg" alt="" /></a>
<a href="#" title="Main square, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/mainsquare.jpg" alt="" /></a>
<a href="#" title="Night view"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/night.jpg" alt="" /></a>
<a href="#" title="Tree in the park, Bratislava"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/tree.jpg" alt="" /></a>
<a href="#" title="In the twilight"><img src="http://wowslider.com/images/demo/glass-linear/data1/tooltips/twilight.jpg" alt="" /></a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div>
</div>
<!-- Generated by WOWSlider.com v5.0 -->
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="http://wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://wowslider.com/images/demo/glass-linear/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_basic_linear(c,a,b){var d=jQuery;var e=d("<div></div>").css({position:"absolute",display:"none","z-index":2,width:"200%",height:"100%"}).appendTo(b);this.go=function(f,j){e.stop(1,1);var g=(!!((f-j+1)%a.length)^c.revers?"left":"right");d(a[j]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,0);d(a[f]).clone().css({position:"absolute",left:"auto",right:"auto",top:0,width:"50%"}).appendTo(e).css(g,"50%").show();e.css({left:"auto",right:"auto",top:0}).css(g,0).show();var h=b.find("ul").hide();var i={};i[g]="-100%";e.animate(i,c.duration,"easeInOutExpo",function(){h.css({left:-f+"00%"}).show();d(this).hide().html("")});return f}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"basic_linear",prev:"",next:"",duration:20*100,delay:30*100,width:960,height:360,autoPlay:true,playPause:false,stopOnHover:false,loop:false,bullets:0,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderturquoisestackv'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/turquoise-stack-v/engine1/style.css" />-->
	
	<style>
	/*
 *	generated by WOW Slider 4.9
 *	template Turquoise
 */
@import url(http://fonts.googleapis.com/css?family=Fjalla+One&subset=latin,latin-ext);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:5px solid #ACB7BD;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
	margin:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}


#wowslider-container'.$val.'  .ws_bullets { 
	padding: 3px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:15px;
	height:13px;
	background: url(./bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:5px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover, #wowslider-container'.$val.' .ws_bullets a.ws_selbull{
	background-position: 0 100%;
}
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-3.7em;
	z-index:60;
	width: 7.4em;	
	height: 7.4em;
	background-image: url(./themes/themebuilder/icons/arrows.png);
	background-size:200%;
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:3px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0; 
	left:3px;
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 7.4em;
    height: 7.4em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -3.7em;
    margin-top: -3.7em;
    z-index: 59;
	background-size:100%;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 2em;
	left: 0;
	margin-right: 1em; 
	padding:0.8em 1em;
	background:#ACB7BD;
	color:#FFFFFF;
	z-index: 50;
	font-family:"Fjalla One",Arial,sans-serif;
	line-height: 3em;
	font-weight: normal;
	text-shadow: -4px 4px 0 #5B8990;
}
#wowslider-container'.$val.' .ws-title div{
	margin-top:0.15em;
	font-size: 2em;
	line-height: 1.6em;
	text-shadow: -3px 3px 0 #5B8990;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.8em;
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 27.6s infinite;
	-moz-animation: wsBasic 27.6s infinite;
	-webkit-animation: wsBasic 27.6s infinite;
}
@keyframes wsBasic{0%{left:-0%} 9.42%{left:-0%} 16.67%{left:-100%} 26.09%{left:-100%} 33.33%{left:-200%} 42.75%{left:-200%} 50%{left:-300%} 59.42%{left:-300%} 66.67%{left:-400%} 76.09%{left:-400%} 83.33%{left:-500%} 92.75%{left:-500%} }
@-moz-keyframes wsBasic{0%{left:-0%} 9.42%{left:-0%} 16.67%{left:-100%} 26.09%{left:-100%} 33.33%{left:-200%} 42.75%{left:-200%} 50%{left:-300%} 59.42%{left:-300%} 66.67%{left:-400%} 76.09%{left:-400%} 83.33%{left:-500%} 92.75%{left:-500%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 9.42%{left:-0%} 16.67%{left:-100%} 26.09%{left:-100%} 33.33%{left:-200%} 42.75%{left:-200%} 50%{left:-300%} 59.42%{left:-300%} 66.67%{left:-400%} 76.09%{left:-400%} 83.33%{left:-500%} 92.75%{left:-500%} }

#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-64px;
	visibility:hidden;
	position:absolute;
    border: 4px solid #78b4be;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:48px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:128px;
	background-color:#78b4be;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:20px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 4px solid #78b4be;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-12px;
	margin-left:-4px;
	left:64px;
	background:url(./triangle.png);
	width:15px;
	height:8px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/></li>
';										
$i++;
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/acacia.jpg" alt="Acacia, Tanzania: slideshow creator with music" title="Acacia, Tanzania" id="wows1_0"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/african_elephants.jpg" alt="African elephants: slideshow generator" title="African elephants" id="wows1_1"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/herd.jpg" alt="Herd of elephants: slideshow images" title="Herd of elephants" id="wows1_2"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/tarangire.jpg" alt="Tarangire National Park: slideshow javascript" title="Tarangire National Park" id="wows1_3"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/wildebeests.jpg" alt="Wildebeests: slideshow creator free" title="Wildebeests" id="wows1_4"/></li>
<li><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/images/zebras.jpg" alt="Zebras: slideshow creator html code" title="Zebras" id="wows1_5"/></li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Acacia, Tanzania"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/acacia.jpg" alt="Acacia, Tanzania"/>1</a>
<a href="#" title="African elephants"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/african_elephants.jpg" alt="African elephants"/>2</a>
<a href="#" title="Herd of elephants"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/herd.jpg" alt="Herd of elephants"/>3</a>
<a href="#" title="Tarangire National Park"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/tarangire.jpg" alt="Tarangire National Park"/>4</a>
<a href="#" title="Wildebeests"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/wildebeests.jpg" alt="Wildebeests"/>5</a>
<a href="#" title="Zebras"><img src="http://www.wowslider.com/images/demo/turquoise-stack-v/data1/tooltips/zebras.jpg" alt="Zebras"/>6</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">slideshow creator web</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/turquoise-stack-v/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack_vertical(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=(k-h+1)%c.length;if(Math.abs(m)>=1){g=(m>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?1:-1)+"00%";c.each(function(o){if(g&&o!=h){this.style.zIndex=(Math.max(0,this.style.zIndex-1))}});var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,top:(g?i:l)});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){j.stop(true,true).hide().css({left:-k+"00%"});if(d.fadeOut){j.fadeIn(d.duration)}else{j.show()}}else{if(d.fadeOut){j.fadeOut(d.duration)}}f.animate({top:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"}).stop(true,true).show()}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack_vertical",prev:"",next:"",duration:20*100,delay:26*100,width:960,height:360,autoPlay:true,playPause:false,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"slide",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderzoomdomino'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/zoom-domino/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 4.8
 *	template Zoom
 */
@import url(http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic,latin-ext);
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 0px;
	z-index:90;
	border:3px solid #FFFFFF;
	text-align:left; /* reset align=center */
	font-size: 10px;
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}
#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:35px;
	height:35px;
	background: url(./themes/themebuilder/icons/bullet2.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:0px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 50%;	
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull{ 
	background-position: 0 100%;
}	
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	background-size: 200%;
	position:absolute;
	display:none;
	top:41.11%;
	z-index:60;
	width: 6.67%;	
	height: 17.78%;
	background-image: url(./themes/themebuilder/icons/arrows2.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:0.52%;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0; 
	left:0.52%; 
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 6.67%;
    height: 17.78%;
    position: absolute;
    top: 41.11%;
    left: 46.67%;
    z-index: 59;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
	background-size: 100%;
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
	background-size: 100%;
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
   bottom: 0;
	left:50%;
	padding: 0px;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 0em;
	left: 0; 
	margin:3.5em 1.5em;
	padding:1.2em 1em;
	color:#3F4044;
	z-index: 50;
	font-family:"Open Sans", Tahoma, Geneva, sans-serif;
	text-transform: none;
    background-color: #FFFFFF;
    border-radius: 1em;
    -moz-border-radius: 1em;
    -webkit-border-radius: 1em;
}
#wowslider-container'.$val.' .ws-title div{
	margin-top: 0.3em;
	font-size: 1.4em;
	line-height: 0.9em;
	font-weight: normal;
	color: #8B8E94;
}
#wowslider-container'.$val.' .ws-title span{
	font-size: 2.5em;
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 28s infinite;
	-moz-animation: wsBasic 28s infinite;
	-webkit-animation: wsBasic 28s infinite;
}
@keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 7.14%{left:-0%} 14.29%{left:-100%} 21.43%{left:-100%} 28.57%{left:-200%} 35.71%{left:-200%} 42.86%{left:-300%} 50%{left:-300%} 57.14%{left:-400%} 64.29%{left:-400%} 71.43%{left:-500%} 78.57%{left:-500%} 85.71%{left:-600%} 92.86%{left:-600%} }

#wowslider-container'.$val.' .ws_bulframe div div{
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width: 100%;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	width:240px;
}
#wowslider-container'.$val.' .ws_bulframe img{
	width: 14.2857142857143%;
}


@media all and (max-width:400px){
	#wowslider-container'.$val.':hover a.ws_playpause,
	#wowslider-container'.$val.' a.ws_playpause,
	#wowslider-container'.$val.':hover a.ws_prev,
	#wowslider-container'.$val.' a.ws_prev,
	#wowslider-container'.$val.':hover a.ws_next,
	#wowslider-container'.$val.' a.ws_next,
	#wowslider-container'.$val.' .ws_bullets,
	#wowslider-container'.$val.' .ws_thumbs{
		display: none
	}
}#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:25px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 2px solid #FFFFFF;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);	
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	border-radius:0px;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:100%;
	background-color:#FFFFFF;	
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:37px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 2px solid #FFFFFF;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);	
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
	border-radius:0px;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-8px;
	margin-left:8px;
	left:50%;
	background:url(./themes/themebuilder/icons/triangle2.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Barbados, Caribbean Sea</li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/accra_beach.jpg" alt="Accra Beach: slideshow software transitions" title="Accra Beach" id="wows1_0"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/bridgetown.jpg" alt="Bridgetown: slideshow software professional" title="Bridgetown" id="wows1_1"/>Barbados capital and main city</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/monkey.jpg" alt="Monkey: slideshow software animation" title="Monkey" id="wows1_2"/>Barbados fauna</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/mullins_beach.jpg" alt="Mullins Beach: slideshow software maker" title="Mullins Beach" id="wows1_3"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/sandy_beach.jpg" alt="Sandy Beach: slideshow software web" title="Sandy Beach" id="wows1_4"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/st._james,_sunset_point.jpg" alt="St. James, Sunset point: slideshow software for free" title="St. James, Sunset point" id="wows1_5"/>Barbados, Caribbean Sea</li>
<li><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/images/worthing_bay.jpg" alt="Worthing Bay: photo slideshow software" title="Worthing Bay" id="wows1_6"/>Barbados, Caribbean Sea</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '
</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.'"><img src="'.$img.'" alt="'.$alt.'"/>1</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '

<a href="#" title="Accra Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/accra_beach.jpg" alt="Accra Beach"/>1</a>
<a href="#" title="Bridgetown"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/bridgetown.jpg" alt="Bridgetown"/>2</a>
<a href="#" title="Monkey"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/monkey.jpg" alt="Monkey"/>3</a>
<a href="#" title="Mullins Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/mullins_beach.jpg" alt="Mullins Beach"/>4</a>
<a href="#" title="Sandy Beach"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/sandy_beach.jpg" alt="Sandy Beach"/>5</a>
<a href="#" title="St. James, Sunset point"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/st._james,_sunset_point.jpg" alt="St. James, Sunset point"/>6</a>
<a href="#" title="Worthing Bay"><img src="http://www.wowslider.com/images/demo/zoom-domino/data1/tooltips/worthing_bay.jpg" alt="Worthing Bay"/>7</a>
';
}
${'SLIDER'.$arg .'_'. $val} .= '

</div></div>
<a style="display:none" href="http://wowslider.com">slideshow software free download</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/zoom-domino/engine1/script.js"></script>-->
	<script type="text/javascript">
jQuery.extend(jQuery.easing,{easeInOutSine:function(j,i,b,c,d){return -c/2*(Math.cos(Math.PI*i/d)-1)+b}});function ws_domino(d,b,a){$=jQuery;jQuery.extend(d,{columns:d.columns||5,rows:d.rows||2,centerRow:d.centerRow||2,centerColumn:d.centerColumn||2});var c=$("<div/>").css({position:"absolute",width:"100%",height:"100%",top:"0%",overflow:"hidden"});c.hide().appendTo(a);var e=a.find("ul");this.go=function(r,q){function s(){c.find("img").stop(1,1);c.hide();c.empty()}s();if(d.fadeOut){e.fadeOut(d.duration)}var h=c.width();var g=c.height();var p=Math.floor(h/d.columns);var n=Math.floor(g/d.rows);var l=h-p*(d.columns-1);var v=g-n*(d.rows-1);function z(j,i){return Math.random()*(i-j+1)+j}var m=[];for(var u=0;u<d.rows;u++){m[u]=[];for(var t=0;t<d.columns;t++){var k=d.duration*(1-Math.abs((d.centerRow*d.centerColumn-u*t)/(2*d.rows*d.columns)));var w=t<d.columns-1?p:l;var f=u<d.rows-1?n:v;m[u][t]=$("<div/>").css({width:w,height:f,position:"absolute",top:u*n,left:t*p,overflow:"hidden"});var y=z(u-2,u+2);var x=z(t-2,t+2);m[u][t].appendTo(c);var A=$(b.get(r)).clone().css({position:"absolute",top:-y*n,left:-x*p,width:h,opacity:0,height:g}).appendTo(m[u][t])}}var o=0;c.show();for(var u=0;u<d.rows;u++){for(var t=0;t<d.columns;t++){m[u][t].find("img").animate({top:-u*n,left:-t*p,opacity:1,deg:d.domino_rotation},{duration:k,easing:"easeInOutSine",complete:function(){o++;if(o==d.rows*d.columns){s();e.stop(1,1);e.css("left",-r*100+"%").show()}}})}}return r}};
jQuery("#wowslider-container'.$val.'").wowSlider({effect:"domino",prev:"",next:"",duration:20*100,delay:20*100,width:960,height:360,autoPlay:true,playPause:false,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"fade",controls:true,onBeforeStep:0,images:0});
	</script>
	<!-- End WOWSlider.com BODY section -->
';		
		
		
		$this->assign($SLIDER, ${'SLIDER'.$arg .'_'. $val});
		}elseif ($conf_value == 'wowsliderionospherestack'){
		
		
													$SLIDER = 'SLIDER_' . $conf_name . '_' . $conf_id;
													$arg = $conf_name; 
													$val = $conf_id; 
													$slidediv = 'SLIDER_'.$arg .'_'. $val;
													
		
													${'SLIDER'.$arg .'_'. $val} = '	<!-- Start WOWSlider.com HEAD section -->
	<!--<link rel="stylesheet" type="text/css" href="http://www.wowslider.com/images/demo/ionosphere-stack/engine1/style.css" />-->
	<style>
	/*
 *	generated by WOW Slider 4.4
 *	template Ionosphere
 */
@import url("http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext");
#wowslider-container'.$val.' { 
	zoom: 1; 
	position: relative; 
	max-width:960px;
	margin:0px auto 3px;
	z-index:90;
	border:3px solid #008AC3;
	text-align:left; /* reset align=center */
}
* html #wowslider-container'.$val.'{ width:960px }
#wowslider-container'.$val.' .ws_images ul{
	position:relative;
	width: 10000%; 
	height:auto;
	left:0;
	list-style:none;
	margin:0;
	padding:0;
	border-spacing:0;
	overflow: visible;
	/*table-layout:fixed;*/
}
#wowslider-container'.$val.' .ws_images ul li{
	width:1%;
	line-height:0; /*opera*/
	float:left;
	font-size:0;
	padding:0 0 0 0 !important;
	margin:0 0 0 0 !important;
}

#wowslider-container'.$val.' .ws_images{
	position: relative;
	left:0;
	top:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
#wowslider-container'.$val.' .ws_images a{
	width:100%;
	display:block;
	color:transparent;
}
#wowslider-container'.$val.' img{
	max-width: none !important;
}
#wowslider-container'.$val.' .ws_images img{
	width:100%;
	border:none 0;
	max-width: none;
	padding:0;
}
#wowslider-container'.$val.' a{ 
	text-decoration: none; 
	outline: none; 
	border: none; 
}

#wowslider-container'.$val.'  .ws_bullets { 
	font-size: 0px; 
	float: left;
	position:absolute;
	z-index:70;
}
#wowslider-container'.$val.'  .ws_bullets div{
	position:relative;
	float:left;
}
#wowslider-container'.$val.'  .wsl{
	display:none;
}
#wowslider-container'.$val.' sound, 
#wowslider-container'.$val.' object{
	position:absolute;
}


#wowslider-container'.$val.'  .ws_bullets { 
	padding: 5px; 
}
#wowslider-container'.$val.' .ws_bullets a { 
	width:9px;
	height:9px;
	background: url(./themes/themebuilder/icons/bullet.png) left top;
	float: left; 
	text-indent: -4000px; 
	position:relative;
	margin-left:4px;
	color:transparent;
}
#wowslider-container'.$val.' .ws_bullets a.ws_selbull, #wowslider-container'.$val.' .ws_bullets a:hover{
	background-position: 0 100%;
} 
#wowslider-container'.$val.' a.ws_next, #wowslider-container'.$val.' a.ws_prev {
	position:absolute;
	display:none;
	top:50%;
	margin-top:-25px;
	z-index:60;
	width: 31px;
	height: 50px;	
	background-image: url(./themes/themebuilder/icons/arrows1.png);
}
#wowslider-container'.$val.' a.ws_next{
	background-position: 100% 0;
	right:10px;
}
#wowslider-container'.$val.' a.ws_prev {
	background-position: 0 0; 
	left:10px;
}
#wowslider-container'.$val.' a.ws_next:hover{
	background-position: 100% 100%;
}
#wowslider-container'.$val.' a.ws_prev:hover {
	background-position: 0 100%; 
}
* html #wowslider-container'.$val.' a.ws_next,* html #wowslider-container'.$val.' a.ws_prev{display:block}
#wowslider-container'.$val.':hover a.ws_next, #wowslider-container'.$val.':hover a.ws_prev {display:block}

/*playpause*/
#wowslider-container'.$val.' .ws_playpause {
	display:none;
    width: 31px;
    height: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -25px;
    z-index: 59;
}

#wowslider-container'.$val.':hover .ws_playpause {
	display:block;
}

#wowslider-container'.$val.' .ws_pause {
    background-image: url(./pause.png);
}

#wowslider-container'.$val.' .ws_play {
    background-image: url(./play.png);
}

#wowslider-container'.$val.' .ws_pause:hover, #wowslider-container'.$val.' .ws_play:hover {
    background-position: 100% 100% !important;
}/* bottom center */
#wowslider-container'.$val.'  .ws_bullets {
    bottom: 0px;
	left:50%;
}
#wowslider-container'.$val.'  .ws_bullets div{
	left:-50%;
}
#wowslider-container'.$val.' .ws-title{
	position:absolute;
	display:block;
	bottom: 20px;
	left: 30px; 
	margin-right: 0px;
	color:#E9E9E9;
	z-index: 50;
	font-family:"Oswald",Arial,Helvetica,sans-serif;
	font-size: 28px;
	line-height: 30px;
	text-transform: uppercase;
}
#wowslider-container'.$val.' .ws-title div,#wowslider-container'.$val.' .ws-title span{
	display:inline-block;
	padding:15px 10px;
	background:rgba(0, 0, 0, 0.9);
	border-left:5px solid #008AC3; 
}
#wowslider-container'.$val.' .ws-title div{
	display:block;
	margin-top:10px;
	font-size: 16px;
	line-height: 18px;
	padding:10px;
}#wowslider-container'.$val.' .ws_images ul{
	animation: wsBasic 29.4s infinite;
	-moz-animation: wsBasic 29.4s infinite;
	-webkit-animation: wsBasic 29.4s infinite;
}
@keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }
@-moz-keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }
@-webkit-keyframes wsBasic{0%{left:-0%} 8.5%{left:-0%} 14.29%{left:-100%} 22.79%{left:-100%} 28.57%{left:-200%} 37.07%{left:-200%} 42.86%{left:-300%} 51.36%{left:-300%} 57.14%{left:-400%} 65.65%{left:-400%} 71.43%{left:-500%} 79.93%{left:-500%} 85.71%{left:-600%} 94.22%{left:-600%} }

#wowslider-container'.$val.' {
    border-width: 0px 0px 3px 0px; 
}
#wowslider-container'.$val.' .ws_bullets  a img{
	text-indent:0;
	display:block;
	bottom:20px;
	left:-120px;
	visibility:hidden;
	position:absolute;
    border: 3px solid #FFFFFF;
	max-width:none;
}
#wowslider-container'.$val.' .ws_bullets a:hover img{
	visibility:visible;
}

#wowslider-container'.$val.' .ws_bulframe div div{
	height:90px;
	overflow:visible;
	position:relative;
}
#wowslider-container'.$val.' .ws_bulframe div {
	left:0;
	overflow:hidden;
	position:relative;
	width:240px;
	background-color:#FFFFFF;
}
#wowslider-container'.$val.'  .ws_bullets .ws_bulframe{
	display:none;
	bottom:15px;
	overflow:visible;
	position:absolute;
	cursor:pointer;
    border: 3px solid #FFFFFF;
}
#wowslider-container'.$val.' .ws_bulframe span{
	display:block;
	position:absolute;
	bottom:-8px;
	margin-left:-5px;
	left:120px;
	background:url(./themes/themebuilder/icons/triangle.png);
	width:15px;
	height:6px;
}
	</style>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container'.$val.'">
	<div class="ws_images"><ul>';
					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 0;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '		
		<li><img src="'.$img.'" alt="'.$alt.'" title="'.$alt.'" id="wows1_'.$i.'"/>Venice, Italy</li>
';									
$i++;	
							}
							
						}else{
							${'SLIDER'.$arg .'_'. $val} .= '															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/houses.jpg" alt="Bright houses: javascript slider" title="Bright houses" id="wows1_0"/>Venice, Italy</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/cannaregio.jpg" alt="Cannaregio district: javascript image slider" title="Cannaregio district" id="wows1_1"/>The northernmost of the six historic sestieri (districts) of Venice</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/street.jpg" alt="Narrow street: javascript slider free" title="Narrow street" id="wows1_2"/>Venice, Italy</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/constitutionbridge.jpg" alt="Constitution bridge: javascript slider bar" title="Constitution bridge" id="wows1_3"/>The Ponte della Costituzione (English: Constitution Bridge)</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/night.jpg" alt="Night lights: javascript slider control" title="Night lights" id="wows1_4"/>Venice, Italy</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/dorsoduro.jpg" alt="Dorsoduro: javascript slider example" title="Dorsoduro" id="wows1_5"/>Dorsoduro is one of the six sestieri of Venice, northern Italy.</li>
															<li><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/images/canal.jpg" alt="Canal: javascript slider gallery" title="Canal" id="wows1_6"/>Venice, Italy</li>
							';					
						}
						${'SLIDER'.$arg .'_'. $val} .= '	
	</ul></div>
<div class="ws_bullets"><div>';

					$sql33 = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE image IS NOT NULL AND catmenu = '.$val.'';
					$result33 = $xoopsDB -> query( $sql33 );
					$count = $xoopsDB->getRowsNum($result33);
						if ($count != 0) {
						
							$i = 1;
							while ( $video_arrtheme1 = $xoopsDB -> fetchArray( $result33 ) ) {
								$img = $video_arrtheme1['image'];
								$alt = $video_arrtheme1['label'];
									${'SLIDER'.$arg .'_'. $val} .= '
									<a href="#" title="'.$alt.''.$i.'"><img src="'.$img.'" alt="'.$alt.''.$i.'"/>'.$i.'</a>
';									
$i++;	
}
							}else{
									${'SLIDER'.$arg .'_'. $val} .= '



													<a href="#" title="Bright houses"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/houses.jpg" alt="Bright houses"/>1</a>
													<a href="#" title="Cannaregio district"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/cannaregio.jpg" alt="Cannaregio district"/>2</a>
													<a href="#" title="Narrow street"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/street.jpg" alt="Narrow street"/>3</a>
													<a href="#" title="Constitution bridge"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/constitutionbridge.jpg" alt="Constitution bridge"/>4</a>
													<a href="#" title="Night lights"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/night.jpg" alt="Night lights"/>5</a>
													<a href="#" title="Dorsoduro"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/dorsoduro.jpg" alt="Dorsoduro"/>6</a>
													<a href="#" title="Canal"><img src="http://www.wowslider.com/images/demo/ionosphere-stack/data1/tooltips/canal.jpg" alt="Canal"/>7</a>

													';
											
}

${'SLIDER'.$arg .'_'. $val} .= '</div></div>
<a style="display: none;" href="http://wowslider.com">javascript slider jquery</a>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="http://www.wowslider.com/images/demo/wowslider.js"></script>
	<!--<script type="text/javascript" src="http://www.wowslider.com/images/demo/ionosphere-stack/engine1/script.js"></script>-->
	<script type="text/javascript">
function ws_stack(d,a,b){var e=jQuery;var c=e("li",b);this.go=function(k,h,n,m){var g=c.length>2?(k-h+1)%c.length:1;if(Math.abs(n)>=1){g=(n>0)?0:1}g=!!g^!!d.revers;var i=(d.revers?-1:1)+"00%";var j=e("ul",b);var l=document.all?0:"0%";var f=e(c.get(g?k:h)).clone().css({position:"absolute","z-index":4,width:"100%",top:0,left:((g?i:l))});if(g){f.appendTo(b)}else{f.insertAfter(j)}if(!g){j.hide().css({left:-k+"00%"});if(d.fadeOut){j.stop(true,true).fadeIn(d.duration)}else{j.show()}}else{if(d.fadeOut){j.fadeOut(d.duration)}}f.animate({left:(g?l:i)},d.duration,"easeInOutExpo",function(){if(g){j.css({left:-k+"00%"}).stop(true,true).show()}e(this).remove()});return k}};
wowReInitor(jQuery("#wowslider-container'.$val.'"),{effect:"stack",prev:"",next:"",duration:17*100,delay:25*100,width:960,height:360,autoPlay:true,playPause:false,stopOnHover:false,loop:false,bullets:true,caption:true,captionEffect:"move",controls:true,onBeforeStep:0,images:0});
	</script>
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