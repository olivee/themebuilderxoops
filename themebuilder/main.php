<?php


// Get Action type
$op = system_CleanVars ( $_REQUEST, 'op', 'default', 'string' );
// Call header
xoops_cp_header();
// Define Stylesheet
$xoTheme->addStylesheet( XOOPS_URL . '/modules/system/css/admin.css');
$xoTheme->addStylesheet( XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');
// Define scripts
$xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.ui.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.tablesorter.js');
$xoTheme->addScript('modules/system/js/admin.js');


echo '<a href="admin.php?fct=themebuilder&op=Dashboard"> Dashboard</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Menu"> | Menu</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Slider"> | Slider</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Option"> | Option</a>';
	echo '<a href="admin.php?fct=themebuilder&op=ThemeBuilder"> | Theme Builder</a>';

switch ( $op ) {

	case 'Dashboard':
		echo 'dashboard';

	$arr=array(

		"logo_enabled"=>array("des"=>"Use logo:","type"=>"text"),
		"url_logo"=> array("des"=>"URL du Logo:","type"=>"text"),
		"fav_ico"=>array("des"=>"favicon.ico:","type"=>"text"),
		"logan_enabled"=>array("des"=>"Use slogan:","type"=>"text"),
		"txt_logan"=> array("des"=>"TXT du SLogan:","type"=>"text"),
		"banner_enabled"=>array("des"=>"Use banner pub:","type"=>"text"),
		"slider_enabled"=>array("des"=>"Use slider:","type"=>"text"),
		"petit_mot_enabled"=>array("des"=>"Use petit mot:","type"=>"text"),
		"petit_mot"=>array("des"=>"txt petit_mot:","type"=>"text"),
		"menu_horizontal_enabled"=>array("des"=>"Use menu horizontal:","type"=>"text"),
		"search_zone_enabled"=>array("des"=>"Use search zone:","type"=>"text"),
		"body_background_color"=>array("des"=>"color de body_background_color:","type"=>"text"),
		"body_background_img"=>array("des"=>"color de body_background_img:","type"=>"text"),
		"body_background_img_repeat"=>array("des"=>"color de body_background_img_repeat:","type"=>"text"),
		"body_background_texture"=>array("des"=>"choisissez la texture du body:","type"=>"text"),
		"body_repeat"=>array("des"=>"choisir le repeat","type"=>"text"),
		"body_pos"=>array("des"=>"choisir la position repeat","type"=>"text"),
		"body_bgscroll"=>array("des"=>"choisir le scroll de bg texture","type"=>"text"),
		"body_background_img_position"=>array("des"=>"choisir la position repeat","type"=>"text"),
		"body_background_img_scroll"=>array("des"=>"choisir le scroll de bg texture","type"=>"text"),
		"scroll_top_enabled"=>array("des"=>"activer le Scroll top:","type"=>"text"),
		"stick_div_enabled"=>array("des"=>"activer un div fixe:","type"=>"text"),
		"stick_div"=>array("des"=>"le ID du div a rendre fixe pendant le scroll:","type"=>"text"),
		"fontsize"=>array("des"=>"size de font","type"=>"text"),
		"fonteffect"=>array("des"=>"effect de font","type"=>"text"),
		"font_apercu"=>array("des"=>"choisir le font","type"=>"text"),
	);
	
	echo '<br> ce petit projet est pour avoir une interface admin pour n\'importe quel theme.<br>
	version: ALPHA-1 ==> Application avec le theme maitcorporate de Mariane.
		<br><br>
	Comment utiliser?<br>
	-	creer un menu ou bien un slider et coller le smarty code generé dans theme.html
	dans la prochaine version l\'insert se fait dans theme builder avec d\'autres block predefini
	<br><br>
	-	modifier les configurations comme souhaité dans l\'onglet message pour afficher ou cacher un élement et modifier le contenu de quelques elements predefini dans le theme.<br>
	il y\'aura certenement plus d\'options à ajouter alors attender la prochaine version.<br><br>
	
	';

	function news_TableExists($tablename){
		global $xoopsDB;
		$result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
		return($xoopsDB->getRowsNum($result) > 0);
	}
	global $xoopsDB;
	// 1) Create, if it does not exists, the config_theme table
	if(!news_TableExists($xoopsDB->prefix('config_theme'))){

		$sqlinstall = 'CREATE TABLE '.$xoopsDB->prefix('config_theme')." (
		
		  conf_id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
		  conf_modid smallint(5) unsigned NOT NULL DEFAULT '0',
		  conf_catid smallint(5) unsigned NOT NULL DEFAULT '0',
		  conf_name varchar(25) NOT NULL DEFAULT '',
		  conf_title varchar(255) NOT NULL DEFAULT '',
		  conf_value text,
		  url varchar(255) DEFAULT NULL,
		  conf_desc text,
		  conf_formtype varchar(255) NOT NULL DEFAULT '',
		  conf_valuetype varchar(10) NOT NULL DEFAULT '',
		  conf_order varchar(255) NOT NULL DEFAULT '0',
		  PRIMARY KEY (conf_id),
		  KEY conf_mod_cat_id (conf_modid,conf_catid),
		  KEY conf_order (conf_order)
		) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sqlinstall)) {
	    	echo '<br />install failed1';
		}else{
			echo '<br>table config_theme est installé<br>';
			$new = 'a:2:{i:0;a:3:{s:4:"type";s:11:"Blockcolumn";s:4:"size";s:3:"1/4";s:6:"fields";a:7:{s:7:"content";s:4:"Left";s:8:"content1";s:1:"0";s:9:"content11";s:1:"0";s:10:"content111";s:2:"in";s:8:"content2";s:1:"0";s:9:"content22";s:1:"0";s:10:"content222";s:2:"in";}}i:1;a:3:{s:4:"type";s:11:"Blockcolumn";s:4:"size";s:3:"3/4";s:6:"fields";a:7:{s:7:"content";s:6:"Center";s:8:"content1";s:1:"0";s:9:"content11";s:1:"0";s:10:"content111";s:2:"in";s:8:"content2";s:1:"0";s:9:"content22";s:1:"0";s:10:"content222";s:2:"in";}}}';
			$new1 = 'a:24:{s:21:"boxedfullwidthwrapper";s:8:"Activate";s:7:"fav_ico";N;s:23:"body_background_texture";s:13:"body-bg13.png";s:11:"body_repeat";s:6:"repeat";s:8:"body_pos";s:3:"top";s:13:"body_bgscroll";s:6:"scroll";s:21:"body_background_color";s:7:"#14db50";s:19:"body_background_img";N;s:26:"body_background_img_repeat";N;s:28:"body_background_img_position";N;s:26:"body_background_img_scroll";N;s:18:"scroll_top_enabled";s:8:"Activate";s:8:"fontsize";s:4:"24px";s:10:"fonteffect";s:4:"none";s:11:"font_apercu";s:15:"lohitdevanagari";s:28:"olivee-itemq-BlockcolumnLeft";s:7:"#ebfaf8";s:15:"blockTitlecolor";s:7:"#e2f2dc";s:25:"blockTitlebackgroundcolor";s:7:"#05f5dd";s:22:"font_apercu_blockTitle";s:5:"Eater";s:19:"fontsize_blockTitle";s:4:"26px";s:20:"textalign_blockTitle";s:6:"center";s:30:"olivee-itemq-BlockcolumnCenter";s:7:"#cf27cf";s:14:"css_text_extra";s:5:"kkkkk";s:13:"js_text_extra";s:5:"hbhcd";}';
			$sqltemplateinsert = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_catid, conf_name, conf_value) VALUES ('1', '3', 'template', '$new'), ('2', '4', 'cssextra', '$new1')";

					$resultsqltemplate = $xoopsDB->queryF($sqltemplateinsert);
					 
					if(!$resultsqltemplate){
						echo 'probleme_INSERT_config_template' ;
					}else{
					 
						echo  'INSERT_config_template_ok' ;
					}
		}
	}else{
	echo '<br>table config_theme déjà installé<br>';
	}
	
		// 1) Create, if it does not exists, the config_theme_menu table
	if(!news_TableExists($xoopsDB->prefix('config_theme_menu'))){

		$sqlinstall2 = 'CREATE TABLE '.$xoopsDB->prefix('config_theme_menu')." (
		
			  id int(11) NOT NULL AUTO_INCREMENT,
			  catmenu varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
			  label varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
			  link varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
			  image varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
			  parent int(11) NOT NULL DEFAULT '0',
			  sort int(11) DEFAULT NULL,
			  icons varchar(255) DEFAULT NULL,
			  class varchar(255) DEFAULT NULL,
			  PRIMARY KEY (id)
			) ENGINE=MyISAM;";
		if (!$xoopsDB->queryF($sqlinstall2)) {
	    	echo '<br />install failed2';
		}else{
			echo '<br>table config_theme_menu est installé<br>';
		}
	}else{
	echo '<br>table config_theme_menu déjà installé<br>';
	}	
	
		echo 'tous les smarty config<br/>';
		//$ggg = $this->config->LoadFromFile(CONFIG_FILE);

		echo '<table>';
		echo "<tr><th>description</th>";
		echo "<th>Smarty</th></tr>";		
		
		/*foreach($arr as $key => &$val){
			if(isset($val['manual'])){continue;} //skip the parts that are manually placed
			
			switch($val['type']){
				case  "break":
					echo '<strong>'.htmlspecialchars($val['des']).'</strong><br/>';
					break;
					
				case "text":
					$var=$this->config->GetVar($key);
					
					echo "<tr><td>";
					echo htmlspecialchars($val['des']);
					echo "</td><td>";
					echo '<{'.htmlspecialchars($var[CE_VARNAME]).'}>';
					echo "</td></tr>";
					
					
					
					break;
					
				case "tf":
					$var=$this->config->GetVar($key);
					foreach ($val as $kes=>$valuer){

						if (is_array($valuer)){

					 echo "<tr><td>";
					echo htmlspecialchars($val['des']);
					echo "</td><td>";
					echo '<{'.htmlspecialchars($var[CE_VARNAME]).'}>';
					echo "</td></tr>";
					  
						}
					}					

					
					break;
		
			}
		}*/
		
		///// smarty pour les menus
		echo "<tr><th>Menu</th>";
		echo "<th>Smarty</th></tr>";
global $xoopsDB;
	
$sql2 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 1 ORDER BY conf_id DESC";
									$result2 = $xoopsDB -> query($sql2); 
									
										while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result2)) {
										
										echo "<tr><td>";
										echo $conf_name;
										if ($conf_value == 'skin1'){
									
										}
										if ($conf_value == 'skin2'){
									
										}
										if ($conf_value == 'skin3'){
									
										}
										if ($conf_value == 'skin4'){
									
										}
										if ($conf_value == 'skin5'){
									
										}										
										if ($conf_value == 'skin6'){
									
										}
										echo "</td><td>";
										echo '<{$MENU_'.$conf_name.'_'.$conf_id.'}>';
										echo "</td></tr>";
										}
										
										
		///// smarty pour les slider									
		echo "<tr><th>Slider</th>";
		echo "<th>Smarty</th></tr>";							
$sql3 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 2 ORDER BY conf_id DESC";
									$result3 = $xoopsDB -> query($sql3); 
									
										while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result3)) {
										
										echo "<tr><td>";
										echo $conf_name;
										if ($conf_value == 'theme1'){
										
									
										}
										if ($conf_value == 'theme2'){
									
										}
										if ($conf_value == 'theme3'){
									
										}
										if ($conf_value == 'theme4'){
									
										}
										if ($conf_value == 'skitter_slider'){
									
										}
										echo "</td><td>";
										echo '<{$SLIDER_'.$conf_name.'_'.$conf_id.'}>';
										
										echo "</td></tr>";										}											

echo '</table>';		   
	   
	   
	   
	   
	   
        break;
		
		
		
		case 'Option': // Save banner
		echo 'Option';
		
		
		
		
		if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit'){
		
		global $xoopsDB;
						
						
					$serialise['boxedfullwidthwrapper'] = $_POST['boxedfullwidthwrapper'];	
					$serialise['fav_ico'] = $_POST['fav_ico'];
					$serialise['body_background_texture'] = $_POST['body_background_texture'];
					$serialise['body_repeat'] = $_POST['body_repeat'];
					
					$serialise['body_pos'] = $_POST['body_pos'];	
					$serialise['body_bgscroll'] = $_POST['body_bgscroll'];
					$serialise['body_background_color'] = $_POST['body_background_color'];
					$serialise['body_background_img'] = $_POST['body_background_img'];
					
					$serialise['body_background_img_repeat'] = $_POST['body_background_img_repeat'];	
					$serialise['body_background_img_position'] = $_POST['body_background_img_position'];
					$serialise['body_background_img_scroll'] = $_POST['body_background_img_scroll'];
					$serialise['scroll_top_enabled'] = $_POST['scroll_top_enabled'];
					
					$serialise['fontsize'] = $_POST['fontsize'];	
					$serialise['fonteffect'] = $_POST['fonteffect'];
					$serialise['font_apercu'] = $_POST['font_apercu'];
					$serialise['olivee-itemq-BlockcolumnLeft'] = $_POST['olivee-itemq-BlockcolumnLeft'];
					
					$serialise['blockTitlecolor'] = $_POST['blockTitlecolor'];	
					$serialise['blockTitlebackgroundcolor'] = $_POST['blockTitlebackgroundcolor'];
					$serialise['font_apercu_blockTitle'] = $_POST['font_apercu_blockTitle'];
					$serialise['fontsize_blockTitle'] = $_POST['fontsize_blockTitle'];
					$serialise['textalign_blockTitle'] = $_POST['textalign_blockTitle'];
					$serialise['olivee-itemq-BlockcolumnCenter'] = $_POST['olivee-itemq-BlockcolumnCenter'];
					$serialise['css_text_extra'] = $_POST['css_text_extra'];
					$serialise['js_header_text_extra'] = $_POST['js_header_text_extra'];
					$serialise['js_body_text_extra'] = $_POST['js_body_text_extra'];

					$mod = serialize($serialise);
		
		//var_dump($_POST);
		//var_dump($mod);
		
		
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='cssextra', conf_value='$mod' WHERE conf_catid = 4";
if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
																
																		$message="css EXTRA modifié";

																}else{
																
																	$message="Probleme modification CSS Extra";

																}		
		//echo $message;
		//redirect_header("admin.php?fct=themebuilder&op=Option", 5, $message);
			//			exit();		
		
		
		
		}
		
		$arr=array(
		array("method"=>"post", "action"=>"?fct=themebuilder&op=Option", "type"=>"form"),
		array("des"=>"Status area messages","type"=>"break"),
		
		
		"boxedfullwidthwrapper"=>array("des"=>"boxed or full width:","options" => array(
            'true' => 'Activate',
            'false' => 'deactivate'
        ),"type"=>"tf"),
		"fav_ico"=>array("des"=>"favicon.ico: Upload image","type"=>"upload"),
		"body_background_texture"=>array("des"=>"choisissez la texture du body:","options" => array('xo-banner_bg.png' => 'xo-banner_bg.png', 'bgnoise.png' => 'bgnoise.png', 'pat1.png' => 'pat1.png', 'pat2.png' => 'pat2.png', 'pat3.png' => 'pat3.png', 'bgdiagonall.png' => 'bgdiagonall.png', 'bgdiagonall2.png' => 'bgdiagonall2.png', 'bgdiagonall4.png' => 'bgdiagonall4.png', 'bgdiagonall5.png' => 'bgdiagonall5.png', 'bgdiagonalr.png' => 'bgdiagonalr.png', 'bgdiagonalr2.png' => 'bgdiagonalr2.png', 'bgdiagonalr4.png' => 'bgdiagonalr4.png', 'bgdiagonalr5.png' => 'bgdiagonalr5.png', 'bgdiamonds.png' => 'bgdiamonds.png', 'bgdiamonds1.png' => 'bgdiamonds1.png', 'bgdiamonds2.png' => 'bgdiamonds2.png', 'bgdiamonds3.png' => 'bgdiamonds3.png', 'bghline1.png' => 'bghline1.png', 'bghline2.png' => 'bghline2.png', 'bghwave.png' => 'bghwave.png', 'bgradial2.png' => 'bgradial2.png', 'bgradial4.png' => 'bgradial4.png', 'bgsqrs.png' => 'bgsqrs.png', 'bgsqrs1.png' => 'bgsqrs1.png', 'bgsqrs2.png' => 'bgsqrs2.png', 'bgsqrs3.png' => 'bgsqrs3.png', 'bgsqrs4.png' => 'bgsqrs4.png', 'bgwline.png' => 'bgwline.png', 'bgwline1.png' => 'bgwline1.png', 'bgwline2.png' => 'bgwline2.png', 'bgwline3.png' => 'bgwline3.png', 'bgwwave.png' => 'bgwwave.png', 'bgwline1.png' => 'bgwline1.png', 'bgwwline.png' => 'bgwwline.png', 'pat1b.png' => 'pat1b.png', 'pat2b.png' => 'pat2b.png', 'pat3b.png' => 'pat3b.png', 'bgdiagonallb.png' => 'bgdiagonallb.png', 'bgdiagonall2b.png' => 'bgdiagonall2b.png', 'bgdiagonall4b.png' => 'bgdiagonall4b.png', 'bgdiagonall5b.png' => 'bgdiagonall5b.png', 'bgdiagonalrb.png' => 'bgdiagonalrb.png', 'bgdiagonalr2b.png' => 'bgdiagonalr2b.png', 'bgdiagonalr4b.png' => 'bgdiagonalr4b.png', 'bgdiagonalr5b.png' => 'bgdiagonalr5b.png', 'bgdiamondsb.png' => 'bgdiamondsb.png', 'bgdiamonds1b.png' => 'bgdiamonds1b.png', 'bgdiamonds2b.png' => 'bgdiamonds2b.png', 'bgdiamonds3b.png' => 'bgdiamonds3b.png', 'bghline1b.png' => 'bghline1b.png', 'bghline2b.png' => 'bghline2b.png', 'bghwaveb.png' => 'bghwaveb.png', 'bgradial2b.png' => 'bgradial2b.png', 'bgradial4b.png' => 'bgradial4b.png', 'bgsqrsb.png' => 'bgsqrsb.png', 'bgsqrs1b.png' => 'bgsqrs1b.png', 'bgsqrs2b.png' => 'bgsqrs2b.png', 'bgsqrs3b.png' => 'bgsqrs3b.png', 'bgsqrs4b.png' => 'bgsqrs4b.png', 'bgwlineb.png' => 'bgwlineb.png', 'bgwline1b.png' => 'bgwline1b.png', 'bgwline2b.png' => 'bgwline2b.png', 'bgwline3b.png' => 'bgwline3b.png', 'bgwwaveb.png' => 'bgwwaveb.png', 'bgwline1b.png' => 'bgwline1b.png', 'bgwwlineb.png' => 'bgwwlineb.png', 'body-bg1.png' => 'body-bg1.png', 'body-bg2.png' => 'body-bg2.png', 'body-bg3.png' => 'body-bg3.png', 'body-bg4.png' => 'body-bg4.png', 'body-bg5.png' => 'body-bg5.png', 'body-bg6.png' => 'body-bg6.png', 'body-bg7.png' => 'body-bg7.png', 'body-bg8.png' => 'body-bg8.png', 'body-bg9.png' => 'body-bg9.png', 'body-bg10.png' => 'body-bg10.png', 'body-bg11.png' => 'body-bg11.png', 'body-bg12.png' => 'body-bg12.png', 'body-bg13.png' => 'body-bg13.png', 'body-bg14.png' => 'body-bg14.png', 'body-bg15.png' => 'body-bg15.png', 'body-bg16.png' => 'body-bg16.png', 'body-bg17.png' => 'body-bg17.png', 'body-bg18.png' => 'body-bg18.png', 'body-bg19.png' => 'body-bg19.png', 'body-bg20.png' => 'body-bg20.png', 'body-bg21.png' => 'body-bg21.png', 'body-bg22.png' => 'body-bg22.png', 'no_one' => 'none.png'),"type"=>"tf_texture"),
		"body_repeat"=>array("des"=>"choisir le repeat","options" => array("no-repeat","repeat-x","repeat-y","repeat"),"type"=>"tf"),
		//"body_pos"=>array("des"=>"choisir la position repeat","options" => array("top_left","top_center","top_right","center_left","center_center","center_right","bottom_left","bottom_center","bottom_right"),"type"=>"tf"),
		"body_pos"=>array("des"=>"choisir la position repeat","options" => array("top","center","bottom"),"type"=>"tf"),
		"body_bgscroll"=>array("des"=>"choisir le scroll de bg texture","options" => array("fixed","scroll"),"type"=>"tf"),
		"body_background_color"=>array("des"=>"color de body_background_color:","type"=>"color"),
		/*"body_background_img"=>array("des"=>"color de body_background_img:","type"=>"text"),
		"body_background_img_repeat"=>array("des"=>"color de body_background_img_repeat:","type"=>"text"),
		"body_background_img_position"=>array("des"=>"choisir la position repeat","options" => array("top","center","bottom"),"type"=>"tf"),
		"body_background_img_scroll"=>array("des"=>"choisir le scroll de bg texture","options" => array("fixed","scroll"),"type"=>"tf"),*/
		"scroll_top_enabled"=>array("des"=>"activer le Scroll top:","options" => array(
            'true' => 'Activate',
            'false' => 'deactivate'
        ),"type"=>"tf"),
		"fontsize"=>array("des"=>"size de font","options" => array('8px','9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','28px','30px','36px','42px'),"type"=>"tf"),
		"fonteffect"=>array("des"=>"effect de font","options" => array('none','anaglyph','brick-sign','canvas-print','crackle','decaying','destruction','distressed','distressed-wood','emboss','fire','fire-animation','fragile','grass','ice','mitosis','neon','outline','putting-green','scuffed-steel','shadow-multiple','splintered','static','stonewash','3d','3d-float','vintage','wallpaper'),"type"=>"tf"),
		"font_apercu"=>array("des"=>"choisir le font","options" => array( "dhyana" => "dhyana", "droidarabickufi" => "droidarabickufi", "droidarabicnaskh" => "droidarabicnaskh", "droidsansethiopic" => "droidsansethiopic", "droidsanstamil" => "droidsanstamil", "droidsansthai" => "droidsansthai", "droidserifthai" => "droidserifthai", "hanna" => "hanna", "karlatamilinclined" => "karlatamilinclined", "karlatamilupright" => "karlatamilupright", "laomuangdon" => "laomuangdon", "laomuangkhong" => "laomuangkhong", "laosanspro" => "laosanspro", "lateef" => "lateef", "lohitbengali" => "lohitbengali", "lohitdevanagari" => "lohitdevanagari", "lohittamil" => "lohittamil", "nanumbrushscript" => "nanumbrushscript", "nanumgothic" => "nanumgothic", "thabit" => "thabit", "Scheherazade" => "Scheherazade", "amiri" => "amiri", "tharlon" => "tharlon", "ABeeZee" => "ABeeZee", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Akronim" => "Akronim", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra Display" => "Almendra Display", "Almendra SC" => "Almendra SC", "Amarante" => "Amarante", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Anaheim" => "Anaheim", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Arbutus Slab" => "Arbutus Slab", "Architects Daughter" => "Architects Daughter", "Archivo Black" => "Archivo Black", "Archivo Narrow" => "Archivo Narrow", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Autour One" => "Autour One", "Average" => "Average", "Average Sans" => "Average Sans", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "BenchNine" => "BenchNine", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigelow Rules" => "Bigelow Rules", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Capriola" => "Capriola", "Cardo" => "Cardo", "Carme" => "Carme", "Carrois Gothic" => "Carrois Gothic", "Carrois Gothic SC" => "Carrois Gothic SC", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chela One" => "Chela One", "Chelsea Market" => "Chelsea Market", "Cherry Cream Soda" => "Cherry Cream Soda", "Cherry Swash" => "Cherry Swash", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Cinzel" => "Cinzel", "Cinzel Decorative" => "Cinzel Decorative", "Clicker Script" => "Clicker Script", "Coda" => "Coda", "Coda Caption" => "Coda Caption", "Codystar" => "Codystar", "Combo" => "Combo", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Courgette" => "Courgette", "Cousine" => "Cousine", "Coustard" => "Coustard", "Covered By Your Grace" => "Covered By Your Grace", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Croissant One" => "Croissant One", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Cutive Mono" => "Cutive Mono", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Denk One" => "Denk One", "Devonshire" => "Devonshire", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Domine" => "Domine", "Donegal One" => "Donegal One", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eagle Lake" => "Eagle Lake", "Eater" => "Eater", "Economica" => "Economica", "Electrolize" => "Electrolize", "Elsie" => "Elsie", "Elsie Swash Caps" => "Elsie Swash Caps", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Englebert" => "Englebert", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Faster One" => "Faster One", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fenix" => "Fenix", "Finger Paint" => "Finger Paint", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fruktur" => "Fruktur", "Fugaz One" => "Fugaz One", "Gabriela" => "Gabriela", "Gafata" => "Gafata", "Galdeano" => "Galdeano", "Galindo" => "Galindo", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Grand Hotel" => "Grand Hotel", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Griffy" => "Griffy", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Habibi" => "Habibi", "Hammersmith One" => "Hammersmith One", "Hanalei" => "Hanalei", "Hanalei Fill" => "Hanalei Fill", "Handlee" => "Handlee", "Happy Monkey" => "Happy Monkey", "Headland One" => "Headland One", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jacques Francois Shadow" => "Jacques Francois Shadow", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Joti One" => "Joti One", "Judson" => "Judson", "Julee" => "Julee", "Julius Sans One" => "Julius Sans One", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kameron" => "Kameron", "Karla" => "Karla", "Kaushan Script" => "Kaushan Script", "Kavoon" => "Kavoon", "Keania One" => "Keania One", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Kite One" => "Kite One", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Libre Baskerville" => "Libre Baskerville", "Life Savers" => "Life Savers", "Lilita One" => "Lilita One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Margarine" => "Margarine", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "McLaren" => "McLaren", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Meie Script" => "Meie Script", "Merienda" => "Merienda", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Merriweather Sans" => "Merriweather Sans", "Metal Mania" => "Metal Mania", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Milonga" => "Milonga", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Molle" => "Molle", "Monda" => "Monda", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Montserrat Alternates" => "Montserrat Alternates", "Montserrat Subrayada" => "Montserrat Subrayada", "Mountains of Christmas" => "Mountains of Christmas", "Mouse Memoirs" => "Mouse Memoirs", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "Neucha" => "Neucha", "Neuton" => "Neuton", "New Rocker" => "New Rocker", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile",	"Norican" => "Norican", "Nosifer" => "Nosifer", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Offside" => "Offside", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Oleo Script Swash Caps" => "Oleo Script Swash Caps", "Open Sans" => "Open Sans", "Open Sans Condensed" => "Open Sans Condensed", "Oranienbaum" => "Oranienbaum", "Orbitron" => "Orbitron", "Oregano" => "Oregano", "Orienta" => "Orienta", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Paprika" => "Paprika", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Patrick Hand" => "Patrick Hand", "Patrick Hand SC" => "Patrick Hand SC", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Peralta" => "Peralta", "Permanent Marker" => "Permanent Marker", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Pirata One" => "Pirata One", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Playfair Display SC" => "Playfair Display SC", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Quando" => "Quando", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Quintessential" => "Quintessential", "Qwigley" => "Qwigley", "Racing Sans One" => "Racing Sans One", "Radley" => "Radley", "Raleway" => "Raleway", "Raleway Dots" => "Raleway Dots", "Rambla" => "Rambla", "Rammetto One" => "Rammetto One", "Ranchers" => "Ranchers", "Rancho" => "Rancho", "Rationale" => "Rationale", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Risque" => "Risque", "Roboto" => "Roboto", "Roboto Condensed" => "Roboto Condensed", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Romanesco" => "Romanesco", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Ruda" => "Ruda", "Rufina" => "Rufina", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Rum Raisin" => "Rum Raisin", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Rye" => "Rye", "Sacramento" => "Sacramento", "Sail" => "Sail", "Salsa" => "Salsa", "Sanchez" => "Sanchez", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Satisfy" => "Satisfy", "Scada" => "Scada", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Share Tech" => "Share Tech", "Share Tech Mono" => "Share Tech Mono", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Snowburst One" => "Snowburst One", "Sofadi One" => "Sofadi One", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Source Code Pro" => "Source Code Pro", "Source Sans Pro" => "Source Sans Pro", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Stalemate" => "Stalemate", "Stalinist One" => "Stalinist One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed", "Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Strait" => "Strait", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Tauri" => "Tauri", "Telex" => "Telex", "Tenor Sans" => "Tenor Sans", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Tinos" => "Tinos", "Titan One" => "Titan One", "Titillium Web" => "Titillium Web", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "Underdog" => "Underdog", "Unica One" => "Unica One", "UnifrakturCook" => "UnifrakturCook", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Vampiro One" => "Vampiro One", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Warnes" => "Warnes", "Wellfleet" => "Wellfleet", "Wendy One" => "Wendy One", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada"),"type"=>"tfwithapercu"),
		
		
		
		//.olivee-itemq-BlockcolumnLeft
		"olivee-itemq-BlockcolumnLeft"=>array("des"=>"color de olivee-itemq-BlockcolumnLeft_background_color:","type"=>"color"),
		//.blockTitle
		"blockTitlecolor"=>array("des"=>"color de blockTitle_color:","type"=>"color"),
		//.blockTitle
		"blockTitlebackgroundcolor"=>array("des"=>"color de blockTitle_background_color:","type"=>"color"),
		//.blockTitle
		"font_apercu_blockTitle"=>array("des"=>"choisir le font de blockTitle","options" => array( "dhyana" => "dhyana", "droidarabickufi" => "droidarabickufi", "droidarabicnaskh" => "droidarabicnaskh", "droidsansethiopic" => "droidsansethiopic", "droidsanstamil" => "droidsanstamil", "droidsansthai" => "droidsansthai", "droidserifthai" => "droidserifthai", "hanna" => "hanna", "karlatamilinclined" => "karlatamilinclined", "karlatamilupright" => "karlatamilupright", "laomuangdon" => "laomuangdon", "laomuangkhong" => "laomuangkhong", "laosanspro" => "laosanspro", "lateef" => "lateef", "lohitbengali" => "lohitbengali", "lohitdevanagari" => "lohitdevanagari", "lohittamil" => "lohittamil", "nanumbrushscript" => "nanumbrushscript", "nanumgothic" => "nanumgothic", "thabit" => "thabit", "Scheherazade" => "Scheherazade", "amiri" => "amiri", "tharlon" => "tharlon", "ABeeZee" => "ABeeZee", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Akronim" => "Akronim", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra Display" => "Almendra Display", "Almendra SC" => "Almendra SC", "Amarante" => "Amarante", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Anaheim" => "Anaheim", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Arbutus Slab" => "Arbutus Slab", "Architects Daughter" => "Architects Daughter", "Archivo Black" => "Archivo Black", "Archivo Narrow" => "Archivo Narrow", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Autour One" => "Autour One", "Average" => "Average", "Average Sans" => "Average Sans", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "BenchNine" => "BenchNine", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigelow Rules" => "Bigelow Rules", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Capriola" => "Capriola", "Cardo" => "Cardo", "Carme" => "Carme", "Carrois Gothic" => "Carrois Gothic", "Carrois Gothic SC" => "Carrois Gothic SC", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chela One" => "Chela One", "Chelsea Market" => "Chelsea Market", "Cherry Cream Soda" => "Cherry Cream Soda", "Cherry Swash" => "Cherry Swash", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Cinzel" => "Cinzel", "Cinzel Decorative" => "Cinzel Decorative", "Clicker Script" => "Clicker Script", "Coda" => "Coda", "Coda Caption" => "Coda Caption", "Codystar" => "Codystar", "Combo" => "Combo", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Courgette" => "Courgette", "Cousine" => "Cousine", "Coustard" => "Coustard", "Covered By Your Grace" => "Covered By Your Grace", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Croissant One" => "Croissant One", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Cutive Mono" => "Cutive Mono", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Denk One" => "Denk One", "Devonshire" => "Devonshire", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Domine" => "Domine", "Donegal One" => "Donegal One", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eagle Lake" => "Eagle Lake", "Eater" => "Eater", "Economica" => "Economica", "Electrolize" => "Electrolize", "Elsie" => "Elsie", "Elsie Swash Caps" => "Elsie Swash Caps", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Englebert" => "Englebert", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Faster One" => "Faster One", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fenix" => "Fenix", "Finger Paint" => "Finger Paint", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fruktur" => "Fruktur", "Fugaz One" => "Fugaz One", "Gabriela" => "Gabriela", "Gafata" => "Gafata", "Galdeano" => "Galdeano", "Galindo" => "Galindo", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Grand Hotel" => "Grand Hotel", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Griffy" => "Griffy", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Habibi" => "Habibi", "Hammersmith One" => "Hammersmith One", "Hanalei" => "Hanalei", "Hanalei Fill" => "Hanalei Fill", "Handlee" => "Handlee", "Happy Monkey" => "Happy Monkey", "Headland One" => "Headland One", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jacques Francois Shadow" => "Jacques Francois Shadow", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Joti One" => "Joti One", "Judson" => "Judson", "Julee" => "Julee", "Julius Sans One" => "Julius Sans One", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kameron" => "Kameron", "Karla" => "Karla", "Kaushan Script" => "Kaushan Script", "Kavoon" => "Kavoon", "Keania One" => "Keania One", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Kite One" => "Kite One", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Libre Baskerville" => "Libre Baskerville", "Life Savers" => "Life Savers", "Lilita One" => "Lilita One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Margarine" => "Margarine", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "McLaren" => "McLaren", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Meie Script" => "Meie Script", "Merienda" => "Merienda", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Merriweather Sans" => "Merriweather Sans", "Metal Mania" => "Metal Mania", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Milonga" => "Milonga", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Molle" => "Molle", "Monda" => "Monda", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Montserrat Alternates" => "Montserrat Alternates", "Montserrat Subrayada" => "Montserrat Subrayada", "Mountains of Christmas" => "Mountains of Christmas", "Mouse Memoirs" => "Mouse Memoirs", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "Neucha" => "Neucha", "Neuton" => "Neuton", "New Rocker" => "New Rocker", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile",	"Norican" => "Norican", "Nosifer" => "Nosifer", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Offside" => "Offside", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Oleo Script Swash Caps" => "Oleo Script Swash Caps", "Open Sans" => "Open Sans", "Open Sans Condensed" => "Open Sans Condensed", "Oranienbaum" => "Oranienbaum", "Orbitron" => "Orbitron", "Oregano" => "Oregano", "Orienta" => "Orienta", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Paprika" => "Paprika", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Patrick Hand" => "Patrick Hand", "Patrick Hand SC" => "Patrick Hand SC", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Peralta" => "Peralta", "Permanent Marker" => "Permanent Marker", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Pirata One" => "Pirata One", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Playfair Display SC" => "Playfair Display SC", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Quando" => "Quando", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Quintessential" => "Quintessential", "Qwigley" => "Qwigley", "Racing Sans One" => "Racing Sans One", "Radley" => "Radley", "Raleway" => "Raleway", "Raleway Dots" => "Raleway Dots", "Rambla" => "Rambla", "Rammetto One" => "Rammetto One", "Ranchers" => "Ranchers", "Rancho" => "Rancho", "Rationale" => "Rationale", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Risque" => "Risque", "Roboto" => "Roboto", "Roboto Condensed" => "Roboto Condensed", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Romanesco" => "Romanesco", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Ruda" => "Ruda", "Rufina" => "Rufina", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Rum Raisin" => "Rum Raisin", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Rye" => "Rye", "Sacramento" => "Sacramento", "Sail" => "Sail", "Salsa" => "Salsa", "Sanchez" => "Sanchez", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Satisfy" => "Satisfy", "Scada" => "Scada", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Share Tech" => "Share Tech", "Share Tech Mono" => "Share Tech Mono", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Snowburst One" => "Snowburst One", "Sofadi One" => "Sofadi One", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Source Code Pro" => "Source Code Pro", "Source Sans Pro" => "Source Sans Pro", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Stalemate" => "Stalemate", "Stalinist One" => "Stalinist One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed", "Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Strait" => "Strait", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Tauri" => "Tauri", "Telex" => "Telex", "Tenor Sans" => "Tenor Sans", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Tinos" => "Tinos", "Titan One" => "Titan One", "Titillium Web" => "Titillium Web", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "Underdog" => "Underdog", "Unica One" => "Unica One", "UnifrakturCook" => "UnifrakturCook", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Vampiro One" => "Vampiro One", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Warnes" => "Warnes", "Wellfleet" => "Wellfleet", "Wendy One" => "Wendy One", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada"),"type"=>"tfwithapercu"),
		//.blockTitle
		"fontsize_blockTitle"=>array("des"=>"size de font","options" => array('8px','9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','28px','30px','36px','42px'),"type"=>"tf"),
		//.blockTitle
		"textalign_blockTitle"=>array("des"=>"text align block title","options" => array('left','center','right'),"type"=>"tf"),

		
		//.olivee-itemq-BlockcolumnCenter
		"olivee-itemq-BlockcolumnCenter"=>array("des"=>"color de olivee-itemq-BlockcolumnCenter_background_color:","type"=>"color"),
		"css_text_extra"=>array("des"=>"css text extra a ajouter: Paste your custom CSS code here","type"=>"textextra"),
		"js_header_text_extra"=>array("des"=>"js header text extra a ajouter: Paste your custom js code here","type"=>"textextra"),
		"js_body_text_extra"=>array("des"=>"js body text extra a ajouter: Paste your custom js code here","type"=>"textextra"),
		
		
		
		array("type"=>"submit","name"=>"submitextra","value"=>"Submit",),
		array("type"=>"/form"),
	);
	
	
		echo '<link rel="stylesheet" href="admin/themebuilder/js/colorpicker.css" type="text/css" />
				<script type="text/javascript" src="admin/themebuilder/js/colorpicker.js"></script>
		<table>';
		
		$sql = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 4";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
	$unserialise = unserialize($css_arr['conf_value']);
		foreach($arr as $key => &$val){
			if(isset($val['manual'])){continue;}
			
			switch($val['type']){
				case  "break":
					echo '<strong>'.htmlspecialchars($val['des']).'</strong><br/>';
					break;
					
				case "text":
					$var=$unserialise[$key];?>
					<tr>
					<td><label for="<?php echo $key;?>" id="<?php echo $key;?>"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
					<td><input name="<?php echo $key;?>" type="text" value="<?php echo htmlspecialchars($var);?>" size="50" /></td>
					<br/>
					</tr>
					<?php
					break;
					
				case "textextra":
					$var=$unserialise[$key];?>
					<tr>
					<td><label for="<?php echo $key.'a';?>" id="<?php echo $key.'a';?>"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
					<td><textarea name="<?php echo $key;?>" id="<?php echo $key;?>" style="width: 300px; height: 150px;"><?php echo htmlspecialchars($var);?></textarea></td>
					<br/>
					</tr>
					<?php
					break;	
					
				case "tf":
					$var=$unserialise[$key];
					foreach ($val as $kes=>$valuer){

						if (is_array($valuer)){
						?><tr><td><label for="<?php echo $key;?>" id="<?php echo $key;?>_label"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
					  <td><select name="<?php echo $key;?>" id="<?php echo $key;?>"><?php
							foreach ($valuer as $kesy=>$valuerr){?>
						<option value="<?php echo $valuerr;?>" <?php if($var == $valuerr){?>selected="selected"<?php }?>><?php echo $valuerr;?></option>
						<?php	}?>					  </select>
					  <br/></td>
								</tr><?php
						}
					}					

					break;
				case "tfwithapercu":
					$var=$unserialise[$key];
					foreach ($val as $kes=>$valuer){

						if (is_array($valuer)){
						?><tr><td><label for="<?php echo $key;?>_label" id="<?php echo $key;?>_label"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
					  <td><select name="<?php echo $key;?>" id="<?php echo $key;?>"><?php
							foreach ($valuer as $kesy=>$valuerr){?>
						<option value="<?php echo $valuerr;?>" <?php if($var == $valuerr){?>selected="selected"<?php }?>><?php echo $valuerr;?></option>
						<?php	}?>					  </select>
					  <br/></td>
								</tr><?php
						}
					}
					
					?>
					<tr><td></td><td><div id="aperccu1" name="aperccu1" class="select"> </div></td></tr>
					<script type="application/javascript">
					$(document).ready(function(){
					$("#<?php echo $key;?>").on("change",function(){
						var x_value_font=$("#<?php echo $key;?>").val();
						var x_value_font_size=$("#fontsize").val();
						var x_value_font_effect=$("#fonteffect").val();
						//alert(x_value_font_effect);
						$.ajax({
							url:'admin/themebuilder/ajax.php',
							data:{brandfont:x_value_font, size:x_value_font_size, effect:x_value_font_effect},
							type: 'post',
							success : function(resp){
								$("#aperccu1").html(resp);               
							},
							error : function(resp){}
						});
					});
					});
					</script>					
<?php
					break;
				case "tf_texture":
					$var=$unserialise[$key];
					foreach ($val as $kes=>$valuer){
						if (is_array($valuer)){
						?><tr><td><label for="<?php echo $key;?>_texture" id="<?php echo $key;?>_texture"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
					  <td><select name="<?php echo $key;?>" id="<?php echo $key;?>"><?php
							foreach ($valuer as $kesy=>$valuerr){?>
						<option value="<?php echo $valuerr;?>" <?php if($var == $valuerr){?>selected="selected"<?php }?>><?php echo $valuerr;?></option>
						<?php	}?>					  </select>
					  <br/></td></tr><?php
						}
					}

					?>
					<tr><td></td><td><div id="texture1" name="aperccu1" class="select" style="width:200px"> </div></td></tr>
					<script type="application/javascript">
					$(document).ready(function(){
					$("#<?php echo $key;?>").on("change",function(){
						var x_value_texture=$("#<?php echo $key;?>").val();
						var x_value_texture_repeat=$("#body_repeat").val();
						var x_value_texture_pos=$("#body_pos").val();
						var x_value_texture_bgscroll=$("#body_bgscroll").val();
						//alert(x_value_texture_bgscroll);
						$.ajax({
							url:'admin/themebuilder/ajax.php',
							data:{brandtexture:x_value_texture, repeat:x_value_texture_repeat, bgpos:x_value_texture_pos, bgscroll:x_value_texture_bgscroll},
							type: 'post',
							success : function(resp){
								$("#texture1").html(resp);               
							},
							error : function(resp){}
						});
					});
					});
					</script>					

<?php
					break;	
	
	
				case "color":
				$var=$unserialise[$key];
				?>
				
				<tr>
				<td><label for="<?php echo $key.'1';?>" id="<?php echo $key.'1';?>"><?php echo htmlspecialchars($val['des']);?></label><br/></td>
				<td><input type="text" name="<?php echo $key;?>" id="<?php echo $key;?>" style="background-color: <?php echo $unserialise[$key];?>" value="<?php echo $unserialise[$key];?>" /></br></td>
				</tr><script type="text/javascript">
				$('#<?php echo $key;?>').ColorPicker({
	color: '<?php echo $unserialise[$key];?>',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#<?php echo $key;?>').css('backgroundColor', '#' + hex);
		$('#<?php echo $key;?>').val('#' + hex);
	}
});
</script>
				
				
				<?php
				break;
				
				case "upload":
				$var=$unserialise[$key];
				?>
								
								<tr>
								<td><label for="<?php echo $key.'1';?>" id="<?php echo $key.'1';?>"><?php echo htmlspecialchars($val['des']);?></label><br/>
								<td>

<script type='text/javascript' src='admin/themebuilder/js/ajaxupload.js' ></script>
<link rel='stylesheet' type='text/css' href='admin/themebuilder/js/stylesupload.css' />
<script type='text/javascript' >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		
		new AjaxUpload(btnUpload, {
			// Arquivo que fará o upload
			action: 'admin/themebuilder/upload-file.php',
			//Nome da caixa de entrada do arquivo
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					alert('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			$('#status').show();
			},
			onComplete: function(file, response){
				//Limpamos o status
				status.text('');
				//Adicionar arquivo carregado na lista
				//if(response==='success'){
				if (response != 'error'){
					//$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
					$('<li></li>').appendTo('#files').html('<img src=../../uploads/'+response+' />'+response).addClass('success');
					$('#<?php echo $key;?>').val('/uploads/'+response+'');
					status.text('');
					$('#status').hide();
					$('#upload').hide();

				} else{
					alert('File '+file+' do not load...');	
$('<li></li>').appendTo('#files').text(file).addClass('error');
status.text('Probleme upload...');
			
				}
			}
		});
		
	});
</script>

<div id='upload' ><span>Upload File<span></div><span id='status' ></span></br></br></br>
		<ul id='files' ></ul>
</br>
<input id="<?php echo $key;?>" name="<?php echo $key;?>" type="text" size="40" value="" style="width: 190px;"/>		
				</td>
								</tr>
				
				<?php
				break;
				
				case "submit":
					?><tr><td><input type="submit" name="<?php echo $val['name'];?>" value="<?php echo $val['value'];?>" /></td></tr><?php
				case "/form":
					?></form><br/><?php
					break;
				case "form": ?>
					<form method="<?php echo $val['method'];?>" action="<?php echo $val['action'];?>">
					<?php		
					break;			
			}
		}
		echo '</table>';
       
	   
	   
	   
	   
	   
        break;
		
		
		
		

	case 'deletemenu':
	
	
	global $xoopsDB;
	    $menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : intval($_GET['menuid']);
        $ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;		
		 if ($ok == 1){
		 
						global $xoopsDB;
						$xoopsDB->queryF("DELETE FROM " . $xoopsDB->prefix("config_theme") . " WHERE conf_id = '$menuid'");
						redirect_header("admin.php?fct=themebuilder&op=Menu", 5, _AM_MENU_ID_DELETED);
						exit();
		
		//echo 'delete from db après confirmation '.$menuid;
		
		}else{
		
		xoops_confirm(array('menuid' => $_GET['menuid'], 'ok' => 1), 'admin.php?fct=themebuilder&op=deletemenu', _AM_ARABESK125dotNET_OOOOOOOOOOOO_AREUSURE);

		}	
	
	
	break;
	case 'modifymenu':
	

	
			if (isset($_POST['action']) && $_POST['action'] == 'modify_menu-save'){
		
		//modif< menu update 
		
		
					global $xoopsDB;
						
						$titremenu = str_replace(' ', '', $_POST['cat_menu']);
						$menu_skin = $_POST['cat_skin'];
						$cid = $_POST['menuid'];
					$serialise['direction'] = $_POST['menu_direction'];	
					$serialise['animation'] = $_POST['menu_animation'];
					$serialise['stickyoffset'] = $_POST['menu_stickyoffset'];
					$serialise['color'] = $_POST['menu_color'];

					$mod = serialize($serialise);
					//var_dump($_POST);
					//var_dump($cid);
					
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='$titremenu', conf_value='$menu_skin', conf_desc ='$mod' WHERE conf_id=" . intval($cid) ;
if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
																
																		$message="menu modifié";

																}else{
																
																	$message="Probleme modification menu";

																}		
		//echo $message;
		redirect_header("admin.php?fct=themebuilder&op=Menu", 5, $message);
						exit();
		
		
		}
	
	//modifymenu();
		    $menuid = (isset($_POST['menuid']) && is_numeric($_POST['menuid'])) ? intval($_POST['menuid']) : intval($_GET['menuid']);

			global $xoopsDB;
								$sql2 = "SELECT distinct conf_id, conf_name, conf_desc FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_id =" . $menuid;
									$result2 = $xoopsDB -> query($sql2);
									 $video_array = $xoopsDB -> fetchArray( $result2 );
									 $menuid = $video_array['conf_id'] ? $video_array['conf_id'] : 0;
									 
									 if ( $menuid ) {
									 		
										echo '<form name="add_menu" action="" method="post">
											<table width=100%" cellpadding="0" cellspacing="0" class="table ct_table">
											
											<tr>
								<td  style="color: red;" width="50%" align="left" valign="middle">nouveau menu</td>
								<tr>
									<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">cat_menu</td>
									<td>
											<div class="input-append color">
											<input id="cat_menu" name="cat_menu" type="text" size="40" value="'.$video_array['conf_name'].'" style="width: 190px;"/>
											<input type="hidden" name="menuid" id="menurid" value="'.$menuid.'" />
											</div>
										
									</td>
								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">cat skin</td>
									<td>';
	
	
								$SELECT_INDUSTRY = array("mega_menu" => "mega_menu", "skin1" => "skin1", "skin2" => "skin2", "skin3" => "skin3", "skin4" => "skin4", "skin5" => "skin5", "skin6" => "skin6");
								echo '<select name="cat_skin" class="select" style="width:200px">'; 
								foreach ($SELECT_INDUSTRY as $key => $value) {
									echo '<option value="' . $value . '">' . $key . '</option>';
								}
								echo '</select>';

									echo '</td>
								</tr>';
								
	////							

$unserilise = unserialize($video_array['conf_desc']);
//var_dump($unserilise);






				$data = array(
					'direction' => array('des' => 'Menu direction', 'options' => array( "direction-horizontal" => "direction-horizontal", "direction-vertical" => "direction-vertical"),'option'=>'tn'),
					'animation' => array('des' => 'Menu animation', 'options' => array("dropdowns_animation-none" => "dropdowns_animation-none", "dropdowns_animation-anim_1" => "dropdowns_animation-anim_1", "dropdowns_animation-anim_2" => "dropdowns_animation-anim_2", "dropdowns_animation-anim_3" => "dropdowns_animation-anim_3", "dropdowns_animation-anim_4" => "dropdowns_animation-anim_4", "dropdowns_animation-anim_5" => "dropdowns_animation-anim_5"),'option'=>'tn'),
					'stickyoffset' => array('des' => 'stiky offset', 'options' => array("0" => "0", "10" => "10", "20" => "20", "30" => "30", "40" => "40", "50" => "50", "60" => "60", "70" => "70", "80" => "80", "90" => "90", "100" => "100", "110" => "110", "120" => "120", "130" => "130", "140" => "140", "150" => "150", "160" => "160", "170" => "170", "180" => "180", "190" => "190", "200" => "200", "210" => "210", "220" => "220", "230" => "230", "240" => "240", "250" => "250"), 'option'=>'tn'),
					'color' => array('des' => 'color', 'options' => array("blue" => "blue", "green" => "green", "orange" => "orange", "depthblue" => "depthblue", "multicolor" => "multicolor", "aqua" => "aqua", "silver" => "silver", "violet" => "violet", "white" => "white"),'option'=>'tn'),
					);

				foreach($data as $linha => $value) 
				{
				
				echo "
				<tr>
					
					 <td style='padding-left: 15px; font-family:Arial; font-size: 10px;'>'".$value['des']."'</td>
						<td>";
						

						if ($value['option'] == 'tn') {
						
						echo "
						<select name='menu_".$linha."' id='menu_".$linha."'>";
							foreach ($value['options'] as $kesy=>$valuerr){							
							$selected = ($valuerr == $unserilise[$linha]) ? ' selected="selected"' : '';
							var_dump($unserilise[$linha]);
							var_dump($valuerr);
							var_dump($linha);
						echo "<option value=".$valuerr." ".$selected.">".$valuerr."</option>";
							}					  echo "</select>";						
						}

						echo "
					</td>
				</tr>";
		
				
			
				}

			
								
		/////						
								
											echo '	<tr>
													<td colspan="2">
														<ul class="pager ct_submit">
															<li class="next">
																<button id="button-modify-menu" class="btn btn-small btn-blue border-radius3">
																	Enregistrer
																</button>
																<input type="hidden" name="action" value="modify_menu-save" />
															</li>
														</ul>
													</td>
												</tr>
								
								</table>
											</form>';
									 }	
	
	
	
	break;
	
	
	
	case 'deletemenuitem':
	
	
						global $xoopsDB;
							$menuitemid = (isset($_POST['menuitemid']) && is_numeric($_POST['menuitemid'])) ? intval($_POST['menuitemid']) : intval($_GET['menuitemid']);
							$ok = (isset($_POST['ok']) && $_POST['ok'] == 1) ? intval($_POST['ok']) : 0;

							 if ($ok == 1){
							global $xoopsDB;
 
						$xoopsDB->queryF("DELETE FROM " . $xoopsDB->prefix("config_theme_menu") . " WHERE id = '$menuitemid'");
						redirect_header("admin.php?fct=themebuilder&op=Menu", 5, _AM__MENU_ITEM_DELETED);
						exit();

							//echo 'delete from db après confirmation '.$menuitemid;
							
							}else{
							
							xoops_confirm(array('menuitemid' => $_GET['menuitemid'], 'ok' => 1), 'admin.php?fct=themebuilder&op=deletemenuitem', _AM_ARABESK125dotNET_AREUSURE);

							}	
	
	
	break;
	case 'modifymenuitem':
	
	
	
		if (isset($_POST['action']) && $_POST['action'] == 'modify_item_menu-save'){
		
		//modif< menu item update 
		echo '//modif< menu item update ';
		}	
	
	//modifymenuitem();
	
							global $xoopsDB;
							$menuitemid = (isset($_POST['menuitemid']) && is_numeric($_POST['menuitemid'])) ? intval($_POST['menuitemid']) : intval($_GET['menuitemid']);

	$sql = "SELECT distinct id, label, catmenu, link FROM ".$xoopsDB->prefix("config_theme_menu")." WHERE id = ". $menuitemid;
		$result = $xoopsDB->query($sql);
		$video_array = $xoopsDB -> fetchArray( $result );
		$menuitemid = $video_array['id'] ? $video_array['id'] : 0;
									
									 if ( $menuitemid ) {
									 
								echo '	 
									 
									 <form name="add_menu" action="" method="post">
											<table width=100%" cellpadding="0" cellspacing="0" class="table ct_table">
											
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">menu parent</td>
									<td>
	

									<select id="catmenuparent" name="catmenuparent" class="select" style="width:200px">';
									
									$sql2 = "SELECT distinct conf_id, conf_name FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 1 ORDER BY conf_id DESC";
									$result2 = $xoopsDB -> query($sql2); 
									
									echo '<option value="0">-----------------</option>';
										while (list($conf_id, $conf_name) = $xoopsDB -> fetchRow($result2)) {
										echo '<option value="' . $conf_id . '">' . $conf_name . '</option>';
										}
										echo '</select>';
														
											
									echo '</td>
								</tr>			
											
											
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">item parent</td>
									<td>
	

									<select id="cat_id" name="cat_id" class="select" style="width:200px">
											</select>
	

									</td>
								</tr>
								
								
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">tittttre</td>
									<td>
						
											<div class="input-append color">
											<input id="tittttre" name="tittttre" type="text" size="40" value="'.$video_array['label'].'" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">link</td>
									<td>
						
											<div class="input-append color">
											<input id="link" name="link" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
								
																<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">ordre</td>
									<td>
						
											<div class="input-append color">
											<input id="ordre" name="ordre" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
												<tr>
													<td colspan="2">
														<ul class="pager ct_submit">
															
															<li class="next">
																<button id="button-modify_item-menu" class="btn btn-small btn-blue border-radius3">
																	Enregistrer
																</button>
																<input type="hidden" name="action" value="modify_item_menu-save" />
															</li>

														</ul>
													</td>
												</tr>
											</table>
											</form>
											
//<script src="http://arabesk125.com/browse.php?Frameworks/jquery/jquery.js" type="text/javascript"></script>
			
<script type="application/javascript">
$(document).ready(function(){
$("#catmenuparent").on("change",function(){
    var x_value=$("#catmenuparent").val();
	//alert(x_value);
    $.ajax({
        url:"admin/themebuilder/ajax.php",
        data:{brand:x_value},
        type: "post",
        success : function(resp){
            $("#cat_id").html(resp);               
        },
        error : function(resp){}
    });
});

});

</script>											
											';
									 
									 
									 }	
	
	
	break;

	case 'Menu':
	
	
	
	//
			if (isset($_POST['action']) && $_POST['action'] == 'add_menu-save'){
			//var_dump($_POST);

			global $xoopsDB;
			$catmenu = str_replace(' ', '', $_POST['cat_menu']);
			$catskin = $_POST['cat_skin'];
			
			$label = $_POST['tittttre'];
			$link = $_POST['link'];
			$parent = $_POST['cat_id'];
			$sort = $_POST['ordre'];
			$icons = $_POST['icons'];
			$class = $_POST['select_class'];
			$catmenuparent = $_POST['catmenuparent']; //insert in config
			
			$serialise['direction'] = $_POST['select_direction'];
			$serialise['animation'] = $_POST['select_animation'];
			$serialise['stickyoffset'] = $_POST['select_stickyoffset'];
			$serialise['color'] = $_POST['select_color'];
			$bbbhH = serialize($serialise);
			
			if ($catmenu != '' && $catskin != '' && $_POST['select_direction'] != '' && $_POST['select_animation'] != ''){
						
					$titleexist = " SELECT conf_name FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . addslashes($catmenu) . "'";
					$resultexist = $xoopsDB->query($titleexist);
					$filecount = $xoopsDB -> getRowsNum( $resultexist );

					   if ($filecount == 0){

								$sql = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_catid, conf_name, conf_value, conf_desc) VALUES ('', '1', '$catmenu', '$catskin', '$bbbhH')";
								
								if ( $result = $xoopsDB -> queryF( $sql ) ) {
								
									$message="menu enregistré.";
									echo $message;
									//redirect_header("admin.php?fct=themebuilder&op=Menu", 5, $message);
									//exit();
											
								}else{
							
									$message="Problème avec l'enregistrement du menu ressayez encore une fois";
									echo $message;

								}
				
					}else{
					
					$message="il faut choisir un autre titre. le titre choisi existe déjà";
									echo $message;
					
					}
			
			}elseif($label != '' && $link != '' && $parent != '' && $icons != '' && $class != ''){
			
			
					$titleexist = " SELECT label FROM " . $xoopsDB -> prefix( 'config_theme_menu' ) . " WHERE label = '" . addslashes($label) . "'";
					$resultexist = $xoopsDB->query($titleexist);
					$filecount = $xoopsDB -> getRowsNum( $resultexist );

					   if ($filecount == 0){	
			
									$sql = "INSERT INTO " . $xoopsDB -> prefix('config_theme_menu') . " (id, catmenu, label, link, parent, sort, icons, class) VALUES ('', '$catmenuparent', '$label', '$link', '$parent', '$sort', '$icons', '$class')";
									
									if ( $result = $xoopsDB -> queryF( $sql ) ) {
									

										$message="Item ajouté au menu";
										echo $message;


									}else{
									
										$message="Problème ajout item bd ressayez encore une fois 222";
										echo $message;

									}
				
				}else{
					
					$message="il faut choisir un autre titre. le titre de l'item choisi existe déjà";
									echo $message;
					
					}
				
			}else{
			
				$message="Probleme ajout item bd ressayez encore une fois else.";
					echo $message;

			}
		
		}
		
		if (isset($_POST['action']) && $_POST['action'] == 'modify_menu-save'){
		
		//modif< menu update 
		
		
					global $xoopsDB;
						
						$titremenu = str_replace(' ', '', $_POST['cat_menu']);
						$menu_skin = $_POST['cat_skin'];
						$cid = $_POST['menuid'];
					$serialise['direction'] = $_POST['menu_direction'];	
					$serialise['animation'] = $_POST['menu_animation'];
					$serialise['stickyoffset'] = $_POST['menu_stickyoffset'];
					$serialise['color'] = $_POST['menu_color'];

					$mod = serialize($serialise);
					var_dump($_POST);
					var_dump($cid);
					
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='$titremenu', conf_value='$menu_skin', conf_desc ='$mod' WHERE conf_id=" . intval($cid) ;
if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
																
																		$message="menu modifié";

																}else{
																
																	$message="Probleme modification menu";

																}		
		
		
		
		echo $message;
		
		
		}
		
		if (isset($_POST['action']) && $_POST['action'] == 'modify_item_menu-save'){
		
		//modif< menu item update 
		}
	
	//
									global $xoopsDB;
											$sql21 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 1 ORDER BY conf_id DESC";
										$result21 = $xoopsDB -> query($sql21);
													echo '<table width="100%" cellspacing="1" class="outer" summary>
										<tr>
											<th style="text-align: center; font-size: smaller;">ID</th>
											<th style=" font-size: smaller;"><b>TITLE</th>
											<th style="text-align: center; font-size: smaller;">SMARTY</th>
											<th style="text-align: center; font-size: smaller;">THEME</th>
											<th style="text-align: center; font-size: smaller;">ACTION</th>
										</tr>';				
																		while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result21)) {
																		
									$icon = '<a href="admin.php?fct=themebuilder&op=deletemenu&amp;menuid=' . $conf_id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>&nbsp;';
									$icon .= '<a href="admin.php?fct=themebuilder&op=modifymenu&amp;menuid=' . $conf_id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';										
																		
																		echo '
										<tr style="text-align: center; font-size: smaller;">
										<td class="head">' . $conf_id . '</small></td>
										<td class="even" style="text-align: left;">' . $conf_name . '</td>
										<td class="even"><{$MENU_'.$conf_name.'_'.$conf_id.'}></td>
										<td class="even">' . $conf_value . '</td>
										<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
										</tr>';
																		}

								function olivee_get_all_icons() {

									$icomoon = Array( 
										'im-icon-home', 'im-icon-home-2', 'im-icon-home-3', 'im-icon-home-4', 'im-icon-home-5', 'im-icon-home-6', 'im-icon-home-7', 'im-icon-home-8', 'im-icon-home-9', 'im-icon-home-10', 'im-icon-home-11', 'im-icon-office', 'im-icon-newspaper', 'im-icon-pencil', 'im-icon-pencil-2', 'im-icon-pencil-3', 'im-icon-pencil-4', 'im-icon-pencil-5', 'im-icon-pencil-6', 'im-icon-quill', 'im-icon-quill-2', 'im-icon-quill-3', 'im-icon-pen', 'im-icon-pen-2', 'im-icon-pen-3', 'im-icon-pen-4', 'im-icon-pen-5', 'im-icon-marker', 'im-icon-home-12', 'im-icon-marker-2', 'im-icon-blog', 'im-icon-blog-2', 'im-icon-brush', 'im-icon-palette', 'im-icon-palette-2', 'im-icon-eyedropper', 'im-icon-eyedropper-2', 'im-icon-droplet', 'im-icon-droplet-2', 'im-icon-droplet-3', 'im-icon-droplet-4', 'im-icon-paint-format', 'im-icon-paint-format-2', 'im-icon-image', 'im-icon-image-2', 'im-icon-image-3', 'im-icon-images', 'im-icon-image-4', 'im-icon-image-5', 'im-icon-image-6', 'im-icon-images-2', 'im-icon-image-7', 'im-icon-camera', 'im-icon-camera-2', 'im-icon-camera-3', 'im-icon-camera-4', 'im-icon-music', 'im-icon-music-2', 'im-icon-music-3', 'im-icon-music-4', 'im-icon-music-5', 'im-icon-music-6', 'im-icon-piano', 'im-icon-guitar', 'im-icon-headphones', 'im-icon-headphones-2', 'im-icon-play', 'im-icon-play-2', 'im-icon-movie', 'im-icon-movie-2', 'im-icon-movie-3', 'im-icon-film', 'im-icon-film-2', 'im-icon-film-3', 'im-icon-film-4', 'im-icon-camera-5', 'im-icon-camera-6', 'im-icon-camera-7', 'im-icon-camera-8', 'im-icon-camera-9', 'im-icon-dice', 'im-icon-gamepad', 'im-icon-gamepad-2', 'im-icon-gamepad-3', 'im-icon-pacman', 'im-icon-spades', 'im-icon-clubs', 'im-icon-diamonds', 'im-icon-king', 'im-icon-queen', 'im-icon-rock', 'im-icon-bishop', 'im-icon-knight', 'im-icon-pawn', 'im-icon-chess', 'im-icon-bullhorn', 'im-icon-megaphone', 'im-icon-new', 'im-icon-connection', 'im-icon-connection-2', 'im-icon-podcast', 'im-icon-radio', 'im-icon-feed', 'im-icon-connection-3', 'im-icon-radio-2', 'im-icon-podcast-2', 'im-icon-podcast-3', 'im-icon-mic', 'im-icon-mic-2', 'im-icon-mic-3', 'im-icon-mic-4', 'im-icon-mic-5', 'im-icon-book', 'im-icon-book-2', 'im-icon-books', 'im-icon-reading', 'im-icon-library', 'im-icon-library-2', 'im-icon-graduation', 'im-icon-file', 'im-icon-profile', 'im-icon-file-2', 'im-icon-file-3', 'im-icon-file-4', 'im-icon-file-5', 'im-icon-file-6', 'im-icon-files', 'im-icon-file-plus', 'im-icon-file-minus', 'im-icon-file-download', 'im-icon-file-upload', 'im-icon-file-check', 'im-icon-file-remove', 'im-icon-file-7', 'im-icon-file-8', 'im-icon-file-plus-2', 'im-icon-file-minus-2', 'im-icon-file-download-2', 'im-icon-file-upload-2', 'im-icon-file-check-2', 'im-icon-file-remove-2', 'im-icon-file-9', 'im-icon-copy', 'im-icon-copy-2', 'im-icon-copy-3', 'im-icon-copy-4', 'im-icon-paste', 'im-icon-paste-2', 'im-icon-paste-3', 'im-icon-stack', 'im-icon-stack-2', 'im-icon-stack-3', 'im-icon-folder', 'im-icon-folder-download', 'im-icon-folder-upload', 'im-icon-folder-plus', 'im-icon-folder-plus-2', 'im-icon-folder-minus', 'im-icon-folder-minus-2', 'im-icon-folder8', 'im-icon-folder-remove', 'im-icon-folder-2', 'im-icon-folder-open', 'im-icon-folder-3', 'im-icon-folder-4', 'im-icon-folder-plus-3', 'im-icon-folder-minus-3', 'im-icon-folder-plus-4', 'im-icon-folder-remove-2', 'im-icon-folder-download-2', 'im-icon-folder-upload-2', 'im-icon-folder-download-3', 'im-icon-folder-upload-3', 'im-icon-folder-5', 'im-icon-folder-open-2', 'im-icon-folder-6', 'im-icon-folder-open-3', 'im-icon-certificate', 'im-icon-cc', 'im-icon-tag', 'im-icon-tag-2', 'im-icon-tag-3', 'im-icon-tag-4', 'im-icon-tag-5', 'im-icon-tag-6', 'im-icon-tag-7', 'im-icon-tags', 'im-icon-tags-2', 'im-icon-tag-8', 'im-icon-barcode', 'im-icon-barcode-2', 'im-icon-qrcode', 'im-icon-ticket', 'im-icon-cart', 'im-icon-cart-2', 'im-icon-cart-3', 'im-icon-cart-4', 'im-icon-cart-5', 'im-icon-cart-6', 'im-icon-cart-7', 'im-icon-cart-plus', 'im-icon-cart-minus', 'im-icon-cart-add', 'im-icon-cart-remove', 'im-icon-cart-checkout', 'im-icon-cart-remove-2', 'im-icon-basket', 'im-icon-basket-2', 'im-icon-bag', 'im-icon-bag-2', 'im-icon-bag-3', 'im-icon-coin', 'im-icon-coins', 'im-icon-credit', 'im-icon-credit-2', 'im-icon-calculate', 'im-icon-calculate-2', 'im-icon-support', 'im-icon-phone', 'im-icon-phone-2', 'im-icon-phone-3', 'im-icon-phone-4', 'im-icon-contact-add', 'im-icon-contact-remove', 'im-icon-contact-add-2', 'im-icon-contact-remove-2', 'im-icon-call-incoming', 'im-icon-call-outgoing', 'im-icon-phone-5', 'im-icon-phone-6', 'im-icon-phone-hang-up', 'im-icon-phone-hang-up-2', 'im-icon-address-book', 'im-icon-address-book-2', 'im-icon-notebook', 'im-icon-envelop', 'im-icon-envelop-2', 'im-icon-mail-send', 'im-icon-envelop-opened', 'im-icon-envelop-3', 'im-icon-pushpin', 'im-icon-location', 'im-icon-location-2', 'im-icon-location-3', 'im-icon-location-4', 'im-icon-location-5', 'im-icon-location-6', 'im-icon-location-7', 'im-icon-compass', 'im-icon-compass-2', 'im-icon-map', 'im-icon-map-2', 'im-icon-map-3', 'im-icon-map-4', 'im-icon-direction', 'im-icon-history', 'im-icon-history-2', 'im-icon-clock', 'im-icon-clock-2', 'im-icon-clock-3', 'im-icon-clock-4', 'im-icon-watch', 'im-icon-clock-5', 'im-icon-clock-6', 'im-icon-clock-7', 'im-icon-alarm', 'im-icon-alarm-2', 'im-icon-bell', 'im-icon-bell-2', 'im-icon-alarm-plus', 'im-icon-alarm-minus', 'im-icon-alarm-check', 'im-icon-alarm-cancel', 'im-icon-stopwatch', 'im-icon-calendar', 'im-icon-calendar-2', 'im-icon-calendar-3', 'im-icon-calendar-4', 'im-icon-calendar-5', 'im-icon-print', 'im-icon-print-2', 'im-icon-print-3', 'im-icon-mouse', 'im-icon-mouse-2', 'im-icon-mouse-3', 'im-icon-mouse-4', 'im-icon-keyboard', 'im-icon-keyboard-2', 'im-icon-screen', 'im-icon-screen-2', 'im-icon-screen-3', 'im-icon-screen-4', 'im-icon-laptop', 'im-icon-mobile', 'im-icon-mobile-2', 'im-icon-tablet', 'im-icon-mobile-3', 'im-icon-tv', 'im-icon-cabinet', 'im-icon-archive', 'im-icon-drawer', 'im-icon-drawer-2', 'im-icon-drawer-3', 'im-icon-box', 'im-icon-box-add', 'im-icon-box-remove', 'im-icon-download', 'im-icon-upload', 'im-icon-disk', 'im-icon-cd', 'im-icon-storage', 'im-icon-storage-2', 'im-icon-database', 'im-icon-database-2', 'im-icon-database-3', 'im-icon-undo', 'im-icon-redo', 'im-icon-rotate', 'im-icon-rotate-2', 'im-icon-flip', 'im-icon-flip-2', 'im-icon-unite', 'im-icon-subtract', 'im-icon-interset', 'im-icon-exclude', 'im-icon-align-left', 'im-icon-align-center-horizontal', 'im-icon-align-right', 'im-icon-align-top', 'im-icon-align-center-vertical', 'im-icon-align-bottom', 'im-icon-undo-2', 'im-icon-redo-2', 'im-icon-forward', 'im-icon-reply', 'im-icon-reply-2', 'im-icon-bubble', 'im-icon-bubbles', 'im-icon-bubbles-2', 'im-icon-bubble-2', 'im-icon-bubbles-3', 'im-icon-bubbles-4', 'im-icon-bubble-notification', 'im-icon-bubbles-5', 'im-icon-bubbles-6', 'im-icon-bubble-3', 'im-icon-bubble-dots', 'im-icon-bubble-4', 'im-icon-bubble-5', 'im-icon-bubble-dots-2', 'im-icon-bubble-6', 'im-icon-bubble-7', 'im-icon-bubble-8', 'im-icon-bubbles-7', 'im-icon-bubble-9', 'im-icon-bubbles-8', 'im-icon-bubble-10', 'im-icon-bubble-dots-3', 'im-icon-bubble-11', 'im-icon-bubble-12', 'im-icon-bubble-dots-4', 'im-icon-bubble-13', 'im-icon-bubbles-9', 'im-icon-bubbles-10', 'im-icon-bubble-blocked', 'im-icon-bubble-quote', 'im-icon-bubble-user', 'im-icon-bubble-check', 'im-icon-bubble-video-chat', 'im-icon-bubble-link', 'im-icon-bubble-locked', 'im-icon-bubble-star', 'im-icon-bubble-heart', 'im-icon-bubble-paperclip', 'im-icon-bubble-cancel', 'im-icon-bubble-plus', 'im-icon-bubble-minus', 'im-icon-bubble-notification-2', 'im-icon-bubble-trash', 'im-icon-bubble-left', 'im-icon-bubble-right', 'im-icon-bubble-up', 'im-icon-bubble-down', 'im-icon-bubble-first', 'im-icon-bubble-last', 'im-icon-bubble-replu', 'im-icon-bubble-forward', 'im-icon-bubble-reply', 'im-icon-bubble-forward-2', 'im-icon-user', 'im-icon-users', 'im-icon-user-plus', 'im-icon-user-plus-2', 'im-icon-user-minus', 'im-icon-user-minus-2', 'im-icon-user-cancel', 'im-icon-user-block', 'im-icon-users-2', 'im-icon-user-2', 'im-icon-users-3', 'im-icon-user-plus-3', 'im-icon-user-minus-3', 'im-icon-user-cancel-2', 'im-icon-user-block-2', 'im-icon-user-3', 'im-icon-user-4', 'im-icon-user-5', 'im-icon-user-6', 'im-icon-users-4', 'im-icon-user-7', 'im-icon-user-8', 'im-icon-users-5', 'im-icon-vcard', 'im-icon-tshirt', 'im-icon-hanger', 'im-icon-quotes-left', 'im-icon-quotes-right', 'im-icon-quotes-right-2', 'im-icon-quotes-right-3', 'im-icon-busy', 'im-icon-busy-2', 'im-icon-busy-3', 'im-icon-busy-4', 'im-icon-spinner', 'im-icon-spinner-2', 'im-icon-spinner-3', 'im-icon-spinner-4', 'im-icon-spinner-5', 'im-icon-spinner-6', 'im-icon-spinner-7', 'im-icon-spinner-8', 'im-icon-spinner-9', 'im-icon-spinner-10', 'im-icon-spinner-11', 'im-icon-spinner-12', 'im-icon-microscope', 'im-icon-binoculars', 'im-icon-binoculars-2', 'im-icon-search', 'im-icon-search-2', 'im-icon-zoom-in', 'im-icon-zoom-out', 'im-icon-search-3', 'im-icon-search-4', 'im-icon-zoom-in-2', 'im-icon-zoom-out-2', 'im-icon-search-5', 'im-icon-expand', 'im-icon-contract', 'im-icon-scale-up', 'im-icon-scale-down', 'im-icon-expand-2', 'im-icon-contract-2', 'im-icon-scale-up-2', 'im-icon-scale-down-2', 'im-icon-fullscreen', 'im-icon-expand-3', 'im-icon-contract-3', 'im-icon-key', 'im-icon-key-2', 'im-icon-key-3', 'im-icon-key-4', 'im-icon-key-5', 'im-icon-keyhole', 'im-icon-lock', 'im-icon-lock-2', 'im-icon-lock-3', 'im-icon-lock-4', 'im-icon-unlocked', 'im-icon-lock-5', 'im-icon-unlocked-2', 'im-icon-wrench', 'im-icon-wrench-2', 'im-icon-wrench-3', 'im-icon-wrench-4', 'im-icon-settings', 'im-icon-equalizer', 'im-icon-equalizer-2', 'im-icon-equalizer-3', 'im-icon-cog', 'im-icon-cogs', 'im-icon-cog-2', 'im-icon-cog-3', 'im-icon-cog-4', 'im-icon-cog-5', 'im-icon-cog-6', 'im-icon-cog-7', 'im-icon-factory', 'im-icon-hammer', 'im-icon-tools', 'im-icon-screwdriver', 'im-icon-screwdriver-2', 'im-icon-wand', 'im-icon-wand-2', 'im-icon-health', 'im-icon-aid', 'im-icon-patch', 'im-icon-bug', 'im-icon-bug-2', 'im-icon-inject', 'im-icon-inject-2', 'im-icon-construction', 'im-icon-cone', 'im-icon-pie', 'im-icon-pie-2', 'im-icon-pie-3', 'im-icon-pie-4', 'im-icon-pie-5', 'im-icon-pie-6', 'im-icon-pie-7', 'im-icon-stats', 'im-icon-stats-2', 'im-icon-stats-3', 'im-icon-bars', 'im-icon-bars-2', 'im-icon-bars-3', 'im-icon-bars-4', 'im-icon-bars-5', 'im-icon-bars-6', 'im-icon-stats-up', 'im-icon-stats-down', 'im-icon-stairs-down', 'im-icon-stairs-down-2', 'im-icon-chart', 'im-icon-stairs', 'im-icon-stairs-2', 'im-icon-ladder', 'im-icon-cake', 'im-icon-gift', 'im-icon-gift-2', 'im-icon-balloon', 'im-icon-rating', 'im-icon-rating-2', 'im-icon-rating-3', 'im-icon-podium', 'im-icon-medal', 'im-icon-medal-2', 'im-icon-medal-3', 'im-icon-medal-4', 'im-icon-medal-5', 'im-icon-crown', 'im-icon-trophy', 'im-icon-trophy-2', 'im-icon-trophy-star', 'im-icon-diamond', 'im-icon-diamond-2', 'im-icon-glass', 'im-icon-glass-2', 'im-icon-bottle', 'im-icon-bottle-2', 'im-icon-mug', 'im-icon-food', 'im-icon-food-2', 'im-icon-hamburger', 'im-icon-cup', 'im-icon-cup-2', 'im-icon-leaf', 'im-icon-leaf-2', 'im-icon-apple-fruit', 'im-icon-tree', 'im-icon-tree-2', 'im-icon-paw', 'im-icon-steps', 'im-icon-flower', 'im-icon-rocket', 'im-icon-meter', 'im-icon-meter2', 'im-icon-meter-slow', 'im-icon-meter-medium', 'im-icon-meter-fast', 'im-icon-dashboard', 'im-icon-hammer-2', 'im-icon-balance', 'im-icon-bomb', 'im-icon-fire', 'im-icon-fire-2', 'im-icon-lab', 'im-icon-atom', 'im-icon-atom-2', 'im-icon-magnet', 'im-icon-magnet-2', 'im-icon-magnet-3', 'im-icon-magnet-4', 'im-icon-dumbbell', 'im-icon-skull', 'im-icon-skull-2', 'im-icon-skull-3', 'im-icon-lamp', 'im-icon-lamp-2', 'im-icon-lamp-3', 'im-icon-lamp-4', 'im-icon-remove', 'im-icon-remove-2', 'im-icon-remove-3', 'im-icon-remove-4', 'im-icon-remove-5', 'im-icon-remove-6', 'im-icon-remove-7', 'im-icon-remove-8', 'im-icon-briefcase', 'im-icon-briefcase-2', 'im-icon-briefcase-3', 'im-icon-airplane', 'im-icon-airplane-2', 'im-icon-paper-plane', 'im-icon-car', 'im-icon-gas-pump', 'im-icon-bus', 'im-icon-truck', 'im-icon-bike', 'im-icon-road', 'im-icon-train', 'im-icon-ship', 'im-icon-boat', 'im-icon-cube', 'im-icon-cube-2', 'im-icon-cube-3', 'im-icon-cube4', 'im-icon-pyramid', 'im-icon-pyramid-2', 'im-icon-cylinder', 'im-icon-package', 'im-icon-puzzle', 'im-icon-puzzle-2', 'im-icon-puzzle-3', 'im-icon-puzzle-4', 'im-icon-glasses', 'im-icon-glasses-2', 'im-icon-glasses-3', 'im-icon-sun-glasses', 'im-icon-accessibility', 'im-icon-accessibility-2', 'im-icon-brain', 'im-icon-target', 'im-icon-target-2', 'im-icon-target-3', 'im-icon-gun', 'im-icon-gun-ban', 'im-icon-shield', 'im-icon-shield-2', 'im-icon-shield-3', 'im-icon-shield-4', 'im-icon-soccer', 'im-icon-football', 'im-icon-baseball', 'im-icon-basketball', 'im-icon-golf', 'im-icon-hockey', 'im-icon-racing', 'im-icon-eight-ball', 'im-icon-bowling-ball', 'im-icon-bowling', 'im-icon-bowling-2', 'im-icon-lightning', 'im-icon-power', 'im-icon-power-2', 'im-icon-switch', 'im-icon-power-cord', 'im-icon-cord', 'im-icon-socket', 'im-icon-clipboard', 'im-icon-clipboard-2', 'im-icon-signup', 'im-icon-clipboard-3', 'im-icon-clipboard-4', 'im-icon-list', 'im-icon-list-2', 'im-icon-list-3', 'im-icon-numbered-list', 'im-icon-list-4', 'im-icon-list-5', 'im-icon-playlist', 'im-icon-grid', 'im-icon-grid-2', 'im-icon-grid-3', 'im-icon-grid-4', 'im-icon-grid-5', 'im-icon-grid-6', 'im-icon-tree-3', 'im-icon-tree-4', 'im-icon-tree-5', 'im-icon-menu', 'im-icon-menu-2', 'im-icon-circle-small', 'im-icon-menu-3', 'im-icon-menu-4', 'im-icon-menu-5', 'im-icon-menu-6', 'im-icon-menu-7', 'im-icon-menu-8', 'im-icon-menu-9', 'im-icon-cloud', 'im-icon-cloud-2', 'im-icon-cloud-3', 'im-icon-cloud-download', 'im-icon-cloud-upload', 'im-icon-download-2', 'im-icon-upload-2', 'im-icon-download-3', 'im-icon-upload-3', 'im-icon-download-4', 'im-icon-upload-4', 'im-icon-download-5', 'im-icon-upload-5', 'im-icon-download-6', 'im-icon-upload-6', 'im-icon-download-7', 'im-icon-upload-7', 'im-icon-globe', 'im-icon-globe-2', 'im-icon-globe-3', 'im-icon-earth', 'im-icon-network', 'im-icon-link', 'im-icon-link-2', 'im-icon-link-3', 'im-icon-link2', 'im-icon-link-4', 'im-icon-link-5', 'im-icon-link-6', 'im-icon-anchor', 'im-icon-flag', 'im-icon-flag-2', 'im-icon-flag-3', 'im-icon-flag-4', 'im-icon-flag-5', 'im-icon-flag-6', 'im-icon-attachment', 'im-icon-attachment-2', 'im-icon-eye', 'im-icon-eye-blocked', 'im-icon-eye-2', 'im-icon-eye-3', 'im-icon-eye-blocked-2', 'im-icon-eye-4', 'im-icon-eye-5', 'im-icon-eye-6', 'im-icon-eye-7', 'im-icon-eye-8', 'im-icon-bookmark', 'im-icon-bookmark-2', 'im-icon-bookmarks', 'im-icon-bookmark-3', 'im-icon-spotlight', 'im-icon-starburst', 'im-icon-snowflake', 'im-icon-temperature', 'im-icon-temperature-2', 'im-icon-weather-lightning', 'im-icon-weather-rain', 'im-icon-weather-snow', 'im-icon-windy', 'im-icon-fan', 'im-icon-umbrella', 'im-icon-sun', 'im-icon-sun-2', 'im-icon-brightness-high', 'im-icon-brightness-medium', 'im-icon-brightness-low', 'im-icon-brightness-contrast', 'im-icon-contrast', 'im-icon-moon', 'im-icon-bed', 'im-icon-bed-2', 'im-icon-star', 'im-icon-star-2', 'im-icon-star-3', 'im-icon-star-4', 'im-icon-star-5', 'im-icon-star-6', 'im-icon-heart', 'im-icon-heart-2', 'im-icon-heart-3', 'im-icon-heart-4', 'im-icon-heart-broken', 'im-icon-heart-5', 'im-icon-heart-6', 'im-icon-heart-broken-2', 'im-icon-heart-7', 'im-icon-heart-8', 'im-icon-heart-broken-3', 'im-icon-lips', 'im-icon-lips-2', 'im-icon-thumbs-up', 'im-icon-thumbs-up-2', 'im-icon-thumbs-down', 'im-icon-thumbs-down-2', 'im-icon-thumbs-up-3', 'im-icon-thumbs-up-4', 'im-icon-thumbs-up-5', 'im-icon-thumbs-up-6', 'im-icon-people', 'im-icon-man', 'im-icon-male', 'im-icon-woman', 'im-icon-female', 'im-icon-peace', 'im-icon-yin-yang', 'im-icon-happy', 'im-icon-happy-2', 'im-icon-smiley', 'im-icon-smiley-2', 'im-icon-tongue', 'im-icon-tongue-2', 'im-icon-sad', 'im-icon-sad-2', 'im-icon-wink', 'im-icon-wink-2', 'im-icon-grin', 'im-icon-grin-2', 'im-icon-cool', 'im-icon-cool-2', 'im-icon-angry', 'im-icon-angry-2', 'im-icon-evil', 'im-icon-evil-2', 'im-icon-shocked', 'im-icon-shocked-2', 'im-icon-confused', 'im-icon-confused-2', 'im-icon-neutral', 'im-icon-neutral-2', 'im-icon-wondering', 'im-icon-wondering-2', 'im-icon-cursor', 'im-icon-cursor-2', 'im-icon-point-up', 'im-icon-point-right', 'im-icon-point-down', 'im-icon-point-left', 'im-icon-pointer', 'im-icon-hand', 'im-icon-stack-empty', 'im-icon-stack-plus', 'im-icon-stack-minus', 'im-icon-stack-star', 'im-icon-stack-picture', 'im-icon-stack-down', 'im-icon-stack-up', 'im-icon-stack-cancel', 'im-icon-stack-checkmark', 'im-icon-stack-list', 'im-icon-stack-clubs', 'im-icon-stack-spades', 'im-icon-stack-hearts', 'im-icon-stack-diamonds', 'im-icon-stack-user', 'im-icon-stack-4', 'im-icon-stack-music', 'im-icon-stack-play', 'im-icon-move', 'im-icon-resize', 'im-icon-resize-2', 'im-icon-warning', 'im-icon-warning-2', 'im-icon-notification', 'im-icon-notification-2', 'im-icon-question', 'im-icon-question-2', 'im-icon-question-3', 'im-icon-question-4', 'im-icon-question-5', 'im-icon-plus-circle', 'im-icon-plus-circle-2', 'im-icon-minus-circle', 'im-icon-minus-circle-2', 'im-icon-info', 'im-icon-info-2', 'im-icon-blocked', 'im-icon-cancel-circle', 'im-icon-cancel-circle-2', 'im-icon-checkmark-circle', 'im-icon-checkmark-circle-2', 'im-icon-cancel', 'im-icon-spam', 'im-icon-close', 'im-icon-close-2', 'im-icon-close-3', 'im-icon-close-4', 'im-icon-close-5', 'im-icon-checkmark', 'im-icon-checkmark-2', 'im-icon-checkmark-3', 'im-icon-checkmark-4', 'im-icon-spell-check', 'im-icon-minus', 'im-icon-plus', 'im-icon-minus-2', 'im-icon-plus-2', 'im-icon-enter', 'im-icon-exit', 'im-icon-enter-2', 'im-icon-exit-2', 'im-icon-enter-3', 'im-icon-exit-3', 'im-icon-exit-4', 'im-icon-play-3', 'im-icon-pause', 'im-icon-stop', 'im-icon-backward', 'im-icon-forward-2', 'im-icon-play-4', 'im-icon-pause-2', 'im-icon-stop-2', 'im-icon-backward-2', 'im-icon-forward-3', 'im-icon-first', 'im-icon-last', 'im-icon-previous', 'im-icon-next', 'im-icon-eject', 'im-icon-volume-high', 'im-icon-volume-medium', 'im-icon-volume-low', 'im-icon-volume-mute', 'im-icon-volume-mute-2', 'im-icon-volume-increase', 'im-icon-volume-decrease', 'im-icon-volume-high-2', 'im-icon-volume-medium-2', 'im-icon-volume-low-2', 'im-icon-volume-mute-3', 'im-icon-volume-mute-4', 'im-icon-volume-increase-2', 'im-icon-volume-decrease-2', 'im-icon-volume5', 'im-icon-volume4', 'im-icon-volume3', 'im-icon-volume2', 'im-icon-volume1', 'im-icon-volume0', 'im-icon-volume-mute-5', 'im-icon-volume-mute-6', 'im-icon-loop', 'im-icon-loop-2', 'im-icon-loop-3', 'im-icon-loop-4', 'im-icon-loop-5', 'im-icon-shuffle', 'im-icon-shuffle-2', 'im-icon-wave', 'im-icon-wave-2', 'im-icon-arrow-first', 'im-icon-arrow-right', 'im-icon-arrow-up', 'im-icon-arrow-right-2', 'im-icon-arrow-down', 'im-icon-arrow-left', 'im-icon-arrow-up-2', 'im-icon-arrow-right-3', 'im-icon-arrow-down-2', 'im-icon-arrow-left-2', 'im-icon-arrow-up-left', 'im-icon-arrow-up-3', 'im-icon-arrow-up-right', 'im-icon-arrow-right-4', 'im-icon-arrow-down-right', 'im-icon-arrow-down-3', 'im-icon-arrow-down-left', 'im-icon-arrow-left-3', 'im-icon-arrow-up-left-2', 'im-icon-arrow-up-4', 'im-icon-arrow-up-right-2', 'im-icon-arrow-right-5', 'im-icon-arrow-down-right-2', 'im-icon-arrow-down-4', 'im-icon-arrow-down-left-2', 'im-icon-arrow-left-4', 'im-icon-arrow-up-left-3', 'im-icon-arrow-up-5', 'im-icon-arrow-up-right-3', 'im-icon-arrow-right-6', 'im-icon-arrow-down-right-3', 'im-icon-arrow-down-5', 'im-icon-arrow-down-left-3', 'im-icon-arrow-left-5', 'im-icon-arrow-up-left-4', 'im-icon-arrow-up-6', 'im-icon-arrow-up-right-4', 'im-icon-arrow-right-7', 'im-icon-arrow-down-right-4', 'im-icon-arrow-down-6', 'im-icon-arrow-down-left-4', 'im-icon-arrow-left-6', 'im-icon-arrow', 'im-icon-arrow-2', 'im-icon-arrow-3', 'im-icon-arrow-4', 'im-icon-arrow-5', 'im-icon-arrow-6', 'im-icon-arrow-7', 'im-icon-arrow-8', 'im-icon-arrow-up-left-5', 'im-icon-arrow-square', 'im-icon-arrow-up-right-5', 'im-icon-arrow-right-8', 'im-icon-arrow-down-right-5', 'im-icon-arrow-down-7', 'im-icon-arrow-down-left-5', 'im-icon-arrow-left-7', 'im-icon-arrow-up-7', 'im-icon-arrow-right-9', 'im-icon-arrow-down-8', 'im-icon-arrow-left-8', 'im-icon-arrow-up-8', 'im-icon-arrow-right-10', 'im-icon-arrow-bottom', 'im-icon-arrow-left-9', 'im-icon-arrow-up-left-6', 'im-icon-arrow-up-9', 'im-icon-arrow-up-right-6', 'im-icon-arrow-right-11', 'im-icon-arrow-down-right-6', 'im-icon-arrow-down-9', 'im-icon-arrow-down-left-6', 'im-icon-arrow-left-10', 'im-icon-arrow-up-left-7', 'im-icon-arrow-up-10', 'im-icon-arrow-up-right-7', 'im-icon-arrow-right-12', 'im-icon-arrow-down-right-7', 'im-icon-arrow-down-10', 'im-icon-arrow-down-left-7', 'im-icon-arrow-left-11', 'im-icon-arrow-up-11', 'im-icon-arrow-right-13', 'im-icon-arrow-down-11', 'im-icon-arrow-left-12', 'im-icon-arrow-up-12', 'im-icon-arrow-right-14', 'im-icon-arrow-down-12', 'im-icon-arrow-left-13', 'im-icon-arrow-up-13', 'im-icon-arrow-right-15', 'im-icon-arrow-down-13', 'im-icon-arrow-left-14', 'im-icon-arrow-up-14', 'im-icon-arrow-right-16', 'im-icon-arrow-down-14', 'im-icon-arrow-left-15', 'im-icon-arrow-up-15', 'im-icon-arrow-right-17', 'im-icon-arrow-down-15', 'im-icon-arrow-left-16', 'im-icon-arrow-up-16', 'im-icon-arrow-right-18', 'im-icon-arrow-down-16', 'im-icon-arrow-left-17', 'im-icon-menu-10', 'im-icon-menu-11', 'im-icon-menu-close', 'im-icon-menu-close-2', 'im-icon-enter-4', 'im-icon-enter-5', 'im-icon-esc', 'im-icon-backspace', 'im-icon-backspace-2', 'im-icon-backspace-3', 'im-icon-tab', 'im-icon-transmission', 'im-icon-transmission-2', 'im-icon-sort', 'im-icon-sort-2', 'im-icon-key-keyboard', 'im-icon-key-A', 'im-icon-key-up', 'im-icon-key-right', 'im-icon-key-down', 'im-icon-key-left', 'im-icon-command', 'im-icon-checkbox-checked', 'im-icon-checkbox-unchecked', 'im-icon-square', 'im-icon-checkbox-partial', 'im-icon-checkbox', 'im-icon-checkbox-unchecked-2', 'im-icon-checkbox-partial-2', 'im-icon-checkbox-checked-2', 'im-icon-checkbox-unchecked-3', 'im-icon-checkbox-partial-3', 'im-icon-radio-checked', 'im-icon-radio-unchecked', 'im-icon-circle', 'im-icon-circle-2', 'im-icon-crop', 'im-icon-crop-2', 'im-icon-vector', 'im-icon-rulers', 'im-icon-scissors', 'im-icon-scissors-2', 'im-icon-scissors-3', 'im-icon-filter', 'im-icon-filter-2', 'im-icon-filter-3', 'im-icon-filter-4', 'im-icon-font', 'im-icon-font-size', 'im-icon-type', 'im-icon-text-height', 'im-icon-text-width', 'im-icon-height', 'im-icon-width', 'im-icon-bold', 'im-icon-underline', 'im-icon-italic', 'im-icon-strikethrough', 'im-icon-strikethrough-2', 'im-icon-font-size-2', 'im-icon-bold-2', 'im-icon-underline-2', 'im-icon-italic-2', 'im-icon-strikethrough-3', 'im-icon-omega', 'im-icon-sigma', 'im-icon-nbsp', 'im-icon-page-break', 'im-icon-page-break-2', 'im-icon-superscript', 'im-icon-subscript', 'im-icon-superscript-2', 'im-icon-subscript-2', 'im-icon-text-color', 'im-icon-highlight', 'im-icon-pagebreak', 'im-icon-clear-formatting', 'im-icon-table', 'im-icon-table-2', 'im-icon-insert-template', 'im-icon-pilcrow', 'im-icon-left-to-right', 'im-icon-right-to-left', 'im-icon-paragraph-left', 'im-icon-paragraph-center', 'im-icon-paragraph-right', 'im-icon-paragraph-justify', 'im-icon-paragraph-left-2', 'im-icon-paragraph-center-2', 'im-icon-paragraph-right-2', 'im-icon-paragraph-justify-2', 'im-icon-indent-increase', 'im-icon-indent-decrease', 'im-icon-paragraph-left-3', 'im-icon-paragraph-center-3', 'im-icon-paragraph-right-3', 'im-icon-paragraph-justify-3', 'im-icon-indent-increase-2', 'im-icon-indent-decrease-2', 'im-icon-share', 'im-icon-new-tab', 'im-icon-new-tab-2', 'im-icon-popout', 'im-icon-embed', 'im-icon-code', 'im-icon-console', 'im-icon-seven-segment-0', 'im-icon-seven-segment-1', 'im-icon-seven-segment-2', 'im-icon-seven-segment-3', 'im-icon-seven-segment-4', 'im-icon-seven-segment-5', 'im-icon-seven-segment-6', 'im-icon-seven-segment-7', 'im-icon-seven-segment-8', 'im-icon-seven-segment-9', 'im-icon-share-2', 'im-icon-share-3', 'im-icon-mail', 'im-icon-mail-2', 'im-icon-mail-3', 'im-icon-mail-4', 'im-icon-google', 'im-icon-google-plus', 'im-icon-google-plus-2', 'im-icon-google-plus-3', 'im-icon-google-plus-4', 'im-icon-google-drive', 'im-icon-facebook', 'im-icon-facebook-2', 'im-icon-facebook-3', 'im-icon-facebook-4', 'im-icon-instagram', 'im-icon-twitter', 'im-icon-twitter-2', 'im-icon-twitter-3', 'im-icon-feed-2', 'im-icon-feed-3', 'im-icon-feed-4', 'im-icon-youtube', 'im-icon-youtube-2', 'im-icon-vimeo', 'im-icon-vimeo2', 'im-icon-vimeo-2', 'im-icon-lanyrd', 'im-icon-flickr', 'im-icon-flickr-2', 'im-icon-flickr-3', 'im-icon-flickr-4', 'im-icon-picassa', 'im-icon-picassa-2', 'im-icon-dribbble', 'im-icon-dribbble-2', 'im-icon-dribbble-3', 'im-icon-forrst', 'im-icon-forrst-2', 'im-icon-deviantart', 'im-icon-deviantart-2', 'im-icon-steam', 'im-icon-steam-2', 'im-icon-github', 'im-icon-github-2', 'im-icon-github-3', 'im-icon-github-4', 'im-icon-github-5', 'im-icon-wordpress', 'im-icon-wordpress-2', 'im-icon-joomla', 'im-icon-blogger', 'im-icon-blogger-2', 'im-icon-tumblr', 'im-icon-tumblr-2', 'im-icon-yahoo', 'im-icon-tux', 'im-icon-apple', 'im-icon-finder', 'im-icon-android', 'im-icon-windows', 'im-icon-windows8', 'im-icon-soundcloud', 'im-icon-soundcloud-2', 'im-icon-skype', 'im-icon-reddit', 'im-icon-linkedin', 'im-icon-lastfm', 'im-icon-lastfm-2', 'im-icon-delicious', 'im-icon-stumbleupon', 'im-icon-stumbleupon-2', 'im-icon-stackoverflow', 'im-icon-pinterest', 'im-icon-pinterest-2', 'im-icon-xing', 'im-icon-xing-2', 'im-icon-flattr', 'im-icon-safari', 'im-icon-foursquare', 'im-icon-foursquare-2', 'im-icon-paypal', 'im-icon-paypal-2', 'im-icon-paypal-3', 'im-icon-yelp', 'im-icon-libreoffice', 'im-icon-file-pdf', 'im-icon-file-openoffice', 'im-icon-file-word', 'im-icon-file-excel', 'im-icon-file-zip', 'im-icon-file-powerpoint', 'im-icon-file-xml', 'im-icon-file-css', 'im-icon-html5', 'im-icon-html5-2', 'im-icon-css3', 'im-icon-chrome', 'im-icon-firefox', 'im-icon-IE', 'im-icon-opera', 'im-icon-dribble', 'fa-icon-vk',
									);

									$fontawesome = array(
										'fa-icon-glass', 'fa-icon-music', 'fa-icon-search', 'fa-icon-envelope', 'fa-icon-heart', 'fa-icon-star', 'fa-icon-star-empty', 'fa-icon-user', 'fa-icon-film', 'fa-icon-th-large', 'fa-icon-th', 'fa-icon-th-list', 'fa-icon-ok', 'fa-icon-remove', 'fa-icon-zoom-in', 'fa-icon-zoom-out', 'fa-icon-off', 'fa-icon-signal', 'fa-icon-cog', 'fa-icon-trash', 'fa-icon-home', 'fa-icon-file', 'fa-icon-time', 'fa-icon-road', 'fa-icon-download-alt', 'fa-icon-download', 'fa-icon-upload', 'fa-icon-inbox', 'fa-icon-play-circle', 'fa-icon-repeat', 'fa-icon-rotate-right', 'fa-icon-refresh', 'fa-icon-list-alt', 'fa-icon-lock', 'fa-icon-flag', 'fa-icon-headphones', 'fa-icon-volume-off', 'fa-icon-volume-down', 'fa-icon-volume-up', 'fa-icon-qrcode', 'fa-icon-barcode', 'fa-icon-tag', 'fa-icon-tags', 'fa-icon-book', 'fa-icon-bookmark', 'fa-icon-print', 'fa-icon-camera', 'fa-icon-font', 'fa-icon-bold', 'fa-icon-italic', 'fa-icon-text-height', 'fa-icon-text-width', 'fa-icon-align-left', 'fa-icon-align-center', 'fa-icon-align-right', 'fa-icon-align-justify', 'fa-icon-list', 'fa-icon-indent-left', 'fa-icon-indent-right', 'fa-icon-facetime-video', 'fa-icon-picture', 'fa-icon-pencil', 'fa-icon-map-marker', 'fa-icon-adjust', 'fa-icon-tint', 'fa-icon-edit', 'fa-icon-share', 'fa-icon-check', 'fa-icon-move', 'fa-icon-step-backward', 'fa-icon-fast-backward', 'fa-icon-backward', 'fa-icon-play', 'fa-icon-pause', 'fa-icon-stop', 'fa-icon-forward', 'fa-icon-fast-forward', 'fa-icon-step-forward', 'fa-icon-eject', 'fa-icon-chevron-left', 'fa-icon-chevron-right', 'fa-icon-plus-sign', 'fa-icon-minus-sign', 'fa-icon-remove-sign', 'fa-icon-ok-sign', 'fa-icon-question-sign', 'fa-icon-info-sign', 'fa-icon-screenshot', 'fa-icon-remove-circle', 'fa-icon-ok-circle', 'fa-icon-ban-circle', 'fa-icon-arrow-left', 'fa-icon-arrow-right', 'fa-icon-arrow-up', 'fa-icon-arrow-down', 'fa-icon-share-alt', 'fa-icon-mail-forward', 'fa-icon-resize-full', 'fa-icon-resize-small', 'fa-icon-plus', 'fa-icon-minus', 'fa-icon-asterisk', 'fa-icon-exclamation-sign', 'fa-icon-gift', 'fa-icon-leaf', 'fa-icon-fire', 'fa-icon-eye-open', 'fa-icon-eye-close', 'fa-icon-warning-sign', 'fa-icon-plane', 'fa-icon-calendar', 'fa-icon-random', 'fa-icon-comment', 'fa-icon-magnet', 'fa-icon-chevron-up', 'fa-icon-chevron-down', 'fa-icon-retweet', 'fa-icon-shopping-cart', 'fa-icon-folder-close', 'fa-icon-folder-open', 'fa-icon-resize-vertical', 'fa-icon-resize-horizontal', 'fa-icon-bar-chart', 'fa-icon-twitter-sign', 'fa-icon-facebook-sign', 'fa-icon-camera-retro', 'fa-icon-key', 'fa-icon-cogs', 'fa-icon-comments', 'fa-icon-thumbs-up', 'fa-icon-thumbs-down', 'fa-icon-star-half', 'fa-icon-heart-empty', 'fa-icon-signout', 'fa-icon-linkedin-sign', 'fa-icon-pushpin', 'fa-icon-external-link', 'fa-icon-signin', 'fa-icon-trophy', 'fa-icon-github-sign', 'fa-icon-upload-alt', 'fa-icon-lemon', 'fa-icon-phone', 'fa-icon-check-empty', 'fa-icon-bookmark-empty', 'fa-icon-phone-sign', 'fa-icon-twitter', 'fa-icon-facebook', 'fa-icon-github', 'fa-icon-unlock', 'fa-icon-credit-card', 'fa-icon-rss', 'fa-icon-hdd', 'fa-icon-bullhorn', 'fa-icon-bell', 'fa-icon-certificate', 'fa-icon-hand-right', 'fa-icon-hand-left', 'fa-icon-hand-up', 'fa-icon-hand-down', 'fa-icon-circle-arrow-left', 'fa-icon-circle-arrow-right', 'fa-icon-circle-arrow-up', 'fa-icon-circle-arrow-down', 'fa-icon-globe', 'fa-icon-wrench', 'fa-icon-tasks', 'fa-icon-filter', 'fa-icon-briefcase', 'fa-icon-fullscreen', 'fa-icon-group', 'fa-icon-link', 'fa-icon-cloud', 'fa-icon-beaker', 'fa-icon-cut', 'fa-icon-copy', 'fa-icon-paper-clip', 'fa-icon-save', 'fa-icon-sign-blank', 'fa-icon-reorder', 'fa-icon-list-ul', 'fa-icon-list-ol', 'fa-icon-strikethrough', 'fa-icon-underline', 'fa-icon-table', 'fa-icon-magic', 'fa-icon-truck', 'fa-icon-pinterest', 'fa-icon-pinterest-sign', 'fa-icon-google-plus-sign', 'fa-icon-google-plus', 'fa-icon-money', 'fa-icon-caret-down', 'fa-icon-caret-up', 'fa-icon-caret-left', 'fa-icon-caret-right', 'fa-icon-columns', 'fa-icon-sort', 'fa-icon-sort-down', 'fa-icon-sort-up', 'fa-icon-envelope-alt', 'fa-icon-linkedin', 'fa-icon-undo', 'fa-icon-rotate-left', 'fa-icon-legal', 'fa-icon-dashboard', 'fa-icon-comment-alt', 'fa-icon-comments-alt', 'fa-icon-bolt', 'fa-icon-sitemap', 'fa-icon-umbrella', 'fa-icon-paste', 'fa-icon-lightbulb', 'fa-icon-exchange', 'fa-icon-cloud-download', 'fa-icon-cloud-upload', 'fa-icon-user-md', 'fa-icon-stethoscope', 'fa-icon-suitcase', 'fa-icon-bell-alt', 'fa-icon-coffee', 'fa-icon-food', 'fa-icon-file-alt', 'fa-icon-building', 'fa-icon-hospital', 'fa-icon-ambulance', 'fa-icon-medkit', 'fa-icon-fighter-jet', 'fa-icon-beer', 'fa-icon-h-sign', 'fa-icon-plus-sign-alt', 'fa-icon-double-angle-left', 'fa-icon-double-angle-right', 'fa-icon-double-angle-up', 'fa-icon-double-angle-down', 'fa-icon-angle-left', 'fa-icon-angle-right', 'fa-icon-angle-up', 'fa-icon-angle-down', 'fa-icon-desktop', 'fa-icon-laptop', 'fa-icon-tablet', 'fa-icon-mobile-phone', 'fa-icon-circle-blank', 'fa-icon-quote-left', 'fa-icon-quote-right', 'fa-icon-spinner', 'fa-icon-circle', 'fa-icon-reply', 'fa-icon-mail-reply', 'fa-icon-folder-close-alt', 'fa-icon-folder-open-alt', 'fa-icon-expand-alt', 'fa-icon-collapse-alt', 'fa-icon-smile', 'fa-icon-frown', 'fa-icon-meh', 'fa-icon-gamepad', 'fa-icon-keyboard', 'fa-icon-flag-alt', 'fa-icon-flag-checkered', 'fa-icon-terminal', 'fa-icon-code', 'fa-icon-reply-all', 'fa-icon-mail-reply-all', 'fa-icon-star-half-full', 'fa-icon-star-half-empty', 'fa-icon-location-arrow', 'fa-icon-crop', 'fa-icon-code-fork', 'fa-icon-unlink', 'fa-icon-question', 'fa-icon-info', 'fa-icon-exclamation', 'fa-icon-superscript', 'fa-icon-subscript', 'fa-icon-eraser', 'fa-icon-puzzle-piece', 'fa-icon-microphone', 'fa-icon-microphone-off', 'fa-icon-shield', 'fa-icon-calendar-empty', 'fa-icon-fire-extinguisher', 'fa-icon-rocket', 'fa-icon-maxcdn', 'fa-icon-chevron-sign-left', 'fa-icon-chevron-sign-right', 'fa-icon-chevron-sign-up', 'fa-icon-chevron-sign-down', 'fa-icon-html5', 'fa-icon-css3', 'fa-icon-anchor', 'fa-icon-unlock-alt', 'fa-icon-bullseye', 'fa-icon-ellipsis-horizontal', 'fa-icon-ellipsis-vertical', 'fa-icon-rss-sign', 'fa-icon-play-sign', 'fa-icon-ticket', 'fa-icon-minus-sign-alt', 'fa-icon-check-minus', 'fa-icon-level-up', 'fa-icon-level-down', 'fa-icon-check-sign', 'fa-icon-edit-sign', 'fa-icon-external-link-sign', 'fa-icon-share-sign',
									);

									$all_icons = array();
									foreach( $icomoon as $value ) {
										$all_icons[$value] = str_replace( array( 'im-icon-','-'), array( '',' '), $value );
									}
									foreach( $fontawesome as $value ) {
										$all_icons[$value] = str_replace( array( 'fa-icon-','-'), array( '',' '), $value );
									}
									asort( $all_icons );
									$all_icons = array_flip( $all_icons );
									
									return $all_icons;
								}	
																			
											
										$sql = "SELECT distinct id, label, catmenu, link FROM ".$xoopsDB->prefix("config_theme_menu")." WHERE image is NULL ORDER BY id DESC";
										$result = $xoopsDB->query($sql); 
													echo '<table width="100%" cellspacing="1" class="outer" summary>
										<tr>
											<th style="text-align: center; font-size: smaller;">ID</th>
											<th style=" font-size: smaller;"><b>TITLE</th>
											<th style=" font-size: smaller;"><b>PARENT</th>
											<th style="text-align: center; font-size: smaller;">LINK</th>
											<th style="text-align: center; font-size: smaller;">ACTION</th>
										</tr>';										
																		while (list($id, $label, $catmenu, $link) = $xoopsDB->fetchRow($result)) {
																		
									$icon1 = '<a href="admin.php?fct=themebuilder&op=deletemenuitem&amp;menuitemid=' . $id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>&nbsp;';
									$icon1 .= '<a href="admin.php?fct=themebuilder&op=modifymenuitem&amp;menuitemid=' . $id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';										
																		
																		echo '
										<tr style="text-align: center; font-size: smaller;">
										<td class="head">' . $id . '</small></td>
										<td class="even" style="text-align: left;">' . $label . '</td>
										<td class="even" style="text-align: left;">' . $catmenu . '</td>
										<td class="even" style="text-align: left;">' . $link . '</td>
										<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon1 . '</td>
										</tr>';
																		}													
																		?>
										
										
										<div id="ajax-response-container" style="display:none"></div>
										<table>
										<form name="add_menu" action="" method="post">
																			<table width=100%" cellpadding="0" cellspacing="0" class="table ct_table">
																			
																			<tr>
																<td  style="color: red;" width="50%" align="left" valign="middle">nouveau menu</td>
																<tr>
																	<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">cat_menu</td>
																	<td>
																			<div class="input-append color">
																			<input id="cat_menu" name="cat_menu" type="text" size="40" value="" style="width: 190px;"/>
																			</div>
																		
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">cat skin</td>
																	<td>
									
									
																<?php $SELECT_INDUSTRY = array("mega_menu" => "mega_menu", "skin1" => "skin1", "skin2" => "skin2", "skin3" => "skin3", "skin4" => "skin4", "skin5" => "skin5", "skin6" => "skin6");
																echo '<select name="cat_skin" class="select" style="width:200px">'; 
																foreach ($SELECT_INDUSTRY as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>

																			
																	</td>
																</tr>
																								
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">Direction Menu</td>
																	<td>
									
									
																<?php $SELECT_direction = array("direction-horizontal" => "direction-horizontal", "direction-vertical" => "direction-vertical");
																echo '<select name="select_direction" class="select" style="width:200px">'; 
																foreach ($SELECT_direction as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>

																			
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">Animation Menu</td>
																	<td>
									
									
																<?php $SELECT_animation = array("dropdowns_animation-none" => "dropdowns_animation-none", "dropdowns_animation-anim_1" => "dropdowns_animation-anim_1", "dropdowns_animation-anim_2" => "dropdowns_animation-anim_2", "dropdowns_animation-anim_3" => "dropdowns_animation-anim_3", "dropdowns_animation-anim_4" => "dropdowns_animation-anim_4", "dropdowns_animation-anim_5" => "dropdowns_animation-anim_5");
																echo '<select name="select_animation" class="select" style="width:200px">'; 
																foreach ($SELECT_animation as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>

																			
																	</td>
																</tr>
																
																
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">stickyoffset Menu: 0 inactif</td>
																	<td>
																<?php $SELECT_stickyoffset = array("0" => "0", "10" => "10", "20" => "20", "30" => "30", "40" => "40", "50" => "50", "60" => "60", "70" => "70", "80" => "80", "90" => "90", "100" => "100", "110" => "110", "120" => "120", "130" => "130", "140" => "140", "150" => "150", "160" => "160", "170" => "170", "180" => "180", "190" => "190", "200" => "200", "210" => "210", "220" => "220", "230" => "230", "240" => "240", "250" => "250");
																echo '<select name="select_stickyoffset" class="select" style="width:200px">'; 
																foreach ($SELECT_stickyoffset as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>
																	</td>
																</tr>
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">Color Menu:</td>
																	<td>
																<?php $SELECT_color = array("blue" => "blue", "green" => "green", "orange" => "orange", "depthblue" => "depthblue", "multicolor" => "multicolor", "aqua" => "aqua", "silver" => "silver", "violet" => "violet", "white" => "white");
																echo '<select name="select_color" class="select" style="width:200px">'; 
																foreach ($SELECT_color as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>
																	</td>
																</tr>
																				<tr>
																					<td colspan="2">
																						<ul class="pager ct_submit">															
																							<li class="next">
																								<button id="button-add-menu" class="btn btn-small btn-blue border-radius3">
																									Enregistrer
																								</button>
																								<input type="hidden" name="action" value="add_menu-save" />
																							</li>

																						</ul>
																					</td>
																				</tr>				
																<tr>
																<td style="height: 115px;">								
																</td>
																</tr>						
																<td  style="color: red;" width="50%" align="left" valign="middle">nouveau item dans un menu</td>
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">menu parent</td>
																	<td>
																	<select id="catmenuparent" name="catmenuparent" class="select" style="width:200px">
																	<?php $sql2 = "SELECT distinct conf_id, conf_name FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 1 ORDER BY conf_id DESC";
																	$result2 = $xoopsDB -> query($sql2); 									
																	echo '<option value="0">-----------------</option>';
																		while (list($conf_id, $conf_name) = $xoopsDB -> fetchRow($result2)) {
																		echo '<option value="' . $conf_id . '">' . $conf_name . '</option>';
																		}
																		echo '</select>';?>
																						
																			
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">item parent</td>
																	<td>
																	<select id="cat_id" name="cat_id" class="select" style="width:200px">
																			<?php echo '</select>'; ?>
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">tittttre</td>
																	<td>
																			<div class="input-append color">
																			<input id="tittttre" name="tittttre" type="text" size="40" value="" style="width: 190px;"/>
																			</div>
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">link</td>
																	<td>						
																			<div class="input-append color">
																			<input id="link" name="link" type="text" size="40" value="" style="width: 190px;"/>
																			</div>
																		
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">ordre</td>
																	<td>
														
																			<div class="input-append color">
																			<input id="ordre" name="ordre" type="text" size="40" value="" style="width: 190px;"/>
																			</div>
																		
																	</td>
																</tr>
													  
														
														
														
														<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">icon</td>
																	<td>
														
																			<div class="input-append color">
																			
																			<select name="icons" id="icons"><?php
																					foreach ( olivee_get_all_icons() as $key => $value ) {?>

																					<option value="<?php echo $value;?>"><?php echo $value;?></option>													
																					
																					<?php } ?>
																			</select>									
																			</div>										
																			<div id="aperccuicon" name="aperccuicon" class="select" style="width:200px"> </div>
																			
													<script type="application/javascript">
													$(document).ready(function(){
													$("#icons").on("change",function(){
														var x_value_icon=$("#icons").val();
														//alert(x_value_font_effect);
														$.ajax({
															url:'admin/themebuilder/ajax.php',
															data:{brandicon:x_value_icon},
															type: 'post',
															success : function(resp){
																$("#aperccuicon").html(resp);               
															},
															error : function(resp){}
														});
													});

													});

													</script>	
																	
																	</td>
																</tr>
																
																<tr>
																<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">class parent item</td>
																	<td>
									
									
																<?php $SELECT_CLASS = array("default_dropdown" => "default_dropdown", "multicolumn_dropdown_bg" => "multicolumn_dropdown_bg", "multicolumn_dropdown" => "multicolumn_dropdown", "grid_dropdown" => "grid_dropdown");
																echo '<select name="select_class" class="select" style="width:200px">'; 
																foreach ($SELECT_CLASS as $key => $value) {
																	echo '<option value="' . $value . '">' . $key . '</option>';
																}
																echo '</select>'; ?>

																			
																	</td>
																</tr>
																				<tr>
																					<td colspan="2">
																						<ul class="pager ct_submit">
																							
																							<li class="next">
																								<button id="button-add-menu" class="btn btn-small btn-blue border-radius3">
																									Enregistrer
																								</button>
																								<input type="hidden" name="action" value="add_menu-save" />
																							</li>

																						</ul>
																					</td>
																				</tr>
																			</table>
																			</form>

								<!--<script src="http://arabesk125.com/browse.php?Frameworks/jquery/jquery.js" type="text/javascript"></script>-->
											
								<script type="application/javascript">
								$(document).ready(function(){
								$("#catmenuparent").on("change",function(){
									var x_value=$("#catmenuparent").val();
									//alert(x_value);
									$.ajax({
										url:'admin/themebuilder/ajax.php',
										data:{brand:x_value},
										type: 'post',
										success : function(resp){
											$("#cat_id").html(resp);               
										},
										error : function(resp){}
									});
								});

								});

								</script>
	
	<?php
	
	
	
	
        break;

		
		
		
		
		
		
		
		
		
		
		
		
		
	case 'deleteslider':
	
	echo 'ddd';
	
	break;
	case 'modifyslider':
	
	echo 'ttttt';
	
	break;
	
	
	
	case 'deleteslideritem':
	
	echo 'rrr';
	
	break;
	case 'modifyslideritem':
	
	echo 'ffffff';
	
	break;	
		
		
	case 'Slider':
	
	
	
						if (isset($_POST['action']) && $_POST['action'] == 'add_slide-save'){


						//enregistrer bd

						global $xoopsDB;
						
						$titreslider = str_replace(' ', '', $_POST['titreslider']);
						$slider_theme = $_POST['slider_theme'];
						$imageslider = $_POST['imageslider'];
						$titreitemslider = $_POST['titreitemslider'];
						$urlslider = $_POST['urlslider'];
						$ordreslider = $_POST['ordreslider'];
						$sliderparent = $_POST['sliderparent']; //insert in config
						
						if($slider_theme == 'flexslider'){
								
							$serialise['slider_animation'] = $_POST['flexslider_slider_animation'];	
							$serialise['direction'] = $_POST['flexslider_direction'];
							$serialise['animationSpeed'] = $_POST['flexslider_animationSpeed'];
							$serialise['slideshowSpeed'] = $_POST['flexslider_slideshowSpeed'];
							$serialise['controlNav'] = $_POST['flexslider_controlNav'];
							$serialise['pauseOnHover'] = $_POST['flexslider_pauseOnHover'];
							$serialise['directionNav'] = $_POST['flexslider_directionNav'];
						
						}elseif($slider_theme == 'orbit'){
						
						
								$serialise['slider_animation'] = $_POST['orbit_slider_animation'];
								$serialise['animationSpeed'] = $_POST['orbit_animationSpeed'];
								$serialise['timer'] = $_POST['orbit_timer'];
								$serialise['advanceSpeed'] =$_POST['orbit_advanceSpeed'];
								$serialise['pauseOnHover'] = $_POST['orbit_pauseOnHover'];
								$serialise['startClockOnMouseOut'] = $_POST['orbit_startClockOnMouseOut'];
								$serialise['startClockOnMouseOutAfter'] = $_POST['orbit_startClockOnMouseOutAfter'];
								$serialise['directionalNav'] = $_POST['orbit_directionalNav'];
								$serialise['captions'] = $_POST['orbit_captions'];
								$serialise['captionAnimation'] = $_POST['orbit_captionAnimation'];
								$serialise['controlNav'] = $_POST['orbit_controlNav'];
								$serialise['bullets'] = $_POST['orbit_bullets'];
						
						
						}elseif($slider_theme == 'bxslider'){
								$serialise['mode'] = $_POST['bxslider_mode'];
								$serialise['animationSpeed'] = $_POST['bxslider_animationSpeed'];
								$serialise['autoControls'] = $_POST['bxslider_autoControls'];
								$serialise['auto'] = $_POST['bxslider_auto'];						
						
						}elseif($slider_theme == 'nivoslider'){
						
						
						}elseif($slider_theme == 'skitter_slider'){
						
						
					$serialise['slider_animation'] = $_POST['skitter_slider_animation'];	
					$serialise['velocity'] = $_POST['skitter_velocity'];
					$serialise['interval'] = $_POST['skitter_interval'];
					$serialise['navigation'] = $_POST['skitter_navigation'];
					$serialise['numbers_align'] = $_POST['skitter_numbers_align'];
					$serialise['label'] = $_POST['skitter_label'];
					$serialise['width_label'] = $_POST['skitter_width_label'];
					$serialise['easing_default'] =$_POST['skitter_easing_default'];
					//$serialise['animateNumberOut'] = $_POST['skitter_animateNumberOut'];
					//$serialise['animateNumberOver'] = $_POST['skitter_animateNumberOver'];
					//$serialise['animateNumberActive'] = $_POST['skitter_animateNumberActive'];
					$serialise['controls_position'] = $_POST['skitter_controls_position'];
					$serialise['focus_position'] = $_POST['skitter_focus_position'];
					$serialise['preview'] = $_POST['skitter_preview'];
					$serialise['stop_over'] = $_POST['skitter_stop_over'];
					$serialise['with_animations'] = $_POST['skitter_with_animations'];
					$serialise['auto_play'] = $_POST['skitter_auto_play'];
					$serialise['enable_navigation_keys'] = $_POST['skitter_enable_navigation_keys'];
					$serialise['progressbar'] = $_POST['skitter_progressbar'];
					$serialise['theme'] = $_POST['skitter_theme'];							
						
						}elseif($slider_theme == 'camera'){
						
						}elseif($slider_theme == 's3Slider'){
						
						}
						


					$bbbh = serialize($serialise);
					var_dump($serialise);
					var_dump($bbbh);

							if ($titreslider != '' && $slider_theme != ''){
														
							$titleexist = " SELECT conf_name FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . addslashes($titreslider) . "'";
							$resultexist = $xoopsDB->query($titleexist);
							$filecount = $xoopsDB -> getRowsNum( $resultexist );

							if ($filecount == 0){
						
										
												$sql = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_catid, conf_name, conf_value, conf_desc) VALUES ('', '2', '$titreslider', '$slider_theme', '$bbbh')";
												
												if ( $result = $xoopsDB -> queryF( $sql ) ) {

													$message="slider enregistré retour a l'interface admin";
													echo $message;

												}else{
														$message="Probleme config_them ressayez encore une fois";
														echo $message;

												}
												
							}else{
					
								$message="il faut choisir un autre titre. le titre choisi existe déjà";
									echo $message;
							}			
						
						}elseif($imageslider != '' && $titreitemslider != '' && $urlslider != ''){
						
									$titleexist = " SELECT label FROM " . $xoopsDB -> prefix( 'config_theme_menu' ) . " WHERE label = '" . addslashes($titreitemslider) . "'";
									$resultexist = $xoopsDB->query($titleexist);
									$filecount = $xoopsDB -> getRowsNum( $resultexist );

									   if ($filecount == 0){
															
																$sql = "INSERT INTO " . $xoopsDB -> prefix('config_theme_menu') . " (id, catmenu, label, link, image, sort) VALUES ('', '$sliderparent', '$titreitemslider', '$urlslider', '$imageslider', '$ordreslider')";
																
																if ( $result = $xoopsDB -> queryF( $sql ) ) {
																
																		$message="Item enregistré au slider";
																		echo $message;

																}else{
																
																	$message="Probleme config_them ressaye encore une fois";
																	echo $message;

																}
										}else{
									
												$message="il faut choisir un autre titre. le titre choisi existe déjà";
												
													echo $message;
													
											}				
												
						}else{
						
							$message="Probleme config_them ressaye encore une fois else";
							echo $message;

						}		

			}
			
			
			if ($_POST['action'] == 'modify_slide-save'){
			
			//update slider
			
					global $xoopsDB;
						
						$titreslider = str_replace(' ', '', $_POST['titreslider']);
						$slider_theme = $_POST['slider_theme'];
						$cid = $_POST['sliderid'];
					$serialise['slider_animation'] = $_POST['skitter_slider_animation'];	
					$serialise['velocity'] = $_POST['skitter_velocity'];
					$serialise['interval'] = $_POST['skitter_interval'];
					$serialise['navigation'] = $_POST['skitter_navigation'];
					$serialise['numbers_align'] = $_POST['skitter_numbers_align'];
					$serialise['label'] = $_POST['skitter_label'];
					$serialise['width_label'] = $_POST['skitter_width_label'];
					$serialise['easing_default'] =$_POST['skitter_easing_default'];
					$serialise['animateNumberOut'] = $_POST['skitter_animateNumberOut'];
					$serialise['animateNumberOver'] = $_POST['skitter_animateNumberOver'];
					$serialise['animateNumberActive'] = $_POST['skitter_animateNumberActive'];
					$serialise['controls_position'] = $_POST['skitter_controls_position'];
					$serialise['focus_position'] = $_POST['skitter_focus_position'];
					$serialise['preview'] = $_POST['skitter_preview'];
					$serialise['stop_over'] = $_POST['skitter_stop_over'];
					$serialise['with_animations'] = $_POST['skitter_with_animations'];
					$serialise['auto_play'] = $_POST['skitter_auto_play'];
					$serialise['enable_navigation_keys'] = $_POST['skitter_enable_navigation_keys'];
					$serialise['progressbar'] = $_POST['skitter_progressbar'];
					$serialise['theme'] = $_POST['skitter_theme'];
					$mod = serialize($serialise);
					//var_dump($_POST);
					//var_dump($cid);
					
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='$titreslider', conf_value='$slider_theme', conf_desc ='$mod' WHERE conf_id=" . intval($cid) ;
if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {
																
																		$message="slider modifié";
																		echo $message;

																}else{
																
																	$message="Probleme modification slider";
																	echo $message;

																}
			}
	
	
	
	
      
			global $xoopsDB;
		//error_reporting(E_ALL);
		$sql22 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 2 ORDER BY conf_id DESC";
		$result22 = $xoopsDB -> query($sql22);
					echo '<table width="100%" cellspacing="1" class="outer" summary>
		<tr>
			<th style="text-align: center; font-size: smaller;">ID</th>
			<th style=" font-size: smaller;"><b>TITLE</th>
			<th style="text-align: center; font-size: smaller;">SMARTY</th>
			<th style="text-align: center; font-size: smaller;">THEME</th>
			<th style="text-align: center; font-size: smaller;">ACTION</th>
		</tr>';				
										while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result22)) {
										
	$icon = '<a href="admin.php?fct=themebuilder&op=deleteslider&amp;sliderid=' . $conf_id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>';
    $icon .= '<a href="admin.php?fct=themebuilder&op=modifyslider&amp;sliderid=' . $conf_id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';										
										
										echo '
		<tr style="text-align: center; font-size: smaller;">
		<td class="head">' . $conf_id . '</small></td>
		<td class="even" style="text-align: left;">' . $conf_name . '</td>
		<td class="even"><{$SLIDER_'.$conf_name.'_'.$conf_id.'}></td>
		<td class="even">' . $conf_value . '</td>
		<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon . '</td>
		</tr>';
										
										
										}

		$sql = "SELECT distinct id, label, catmenu, image FROM ".$xoopsDB->prefix("config_theme_menu")." WHERE image != '' ORDER BY id DESC";
									$result = $xoopsDB->query($sql); 
					echo '
		<tr>
			<th style="text-align: center; font-size: smaller;">ID</th>
			<th style=" font-size: smaller;"><b>TITLE</th>
			<th style="text-align: center; font-size: smaller;">PARENT</th>
			<th style="text-align: center; font-size: smaller;">IMAGE</th>
			<th style="text-align: center; font-size: smaller;">ACTION</th>
		</tr>';										
										while (list($id, $label, $catmenu, $image) = $xoopsDB->fetchRow($result)) {
										
	$icon1 = '<a href="admin.php?fct=themebuilder&op=deleteslideritem&amp;slideritemid=' . $id . '" title="DELETE"><img src="./images/icons/default/delete.png" alt="DELETE this Block"></a>&nbsp;';
    $icon1 .= '<a href="admin.php?fct=themebuilder&op=modifyslideritem&amp;slideritemid=' . $id . '" title="MODIFY"><img src="./images/icons/default/edit.png" alt="MODIFY this Block"></a>';										
										
										echo '
		<tr style="text-align: center; font-size: smaller;">
		<td class="head">' . $id . '</small></td>
		<td class="even" style="text-align: left;">' . $label . '</td>
		<td class="even" style="text-align: left;">' . $catmenu . '</td>
		<td class="even">' . $image . '</td>
		<td class="even" style="text-align: center; width: 6%; white-space: nowrap;">' . $icon1 . '</td>
		</tr>';
									
										}
		echo '	</table>';
		?>		

											<form name="add_slide" action="" method="post">
											<table width="100%" cellpadding="0" cellspacing="0" class="table ct_table">
						    <tr>
								<td  style="color: red;" width="50%" align="left" valign="middle">Ajouter un nouveau slide</td>
								
								<tr>
									<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">titre slider</td>
									<td>
						
											<div class="input-append color">
											<input id="titreslider" name="titreslider" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">slider theme</td>
									<td>
	
										<?php $SELECT_slider = array("flexslider" => "flexslider", "orbit" => "orbit", "bxslider" => "bxslider", "nivoslider" => "nivoslider", "skitter_slider" => "skitter_slider", "camera" => "camera", "s3Slider" => "s3Slider");
									echo '<select  id="slider_theme" name="slider_theme" class="select" style="width:200px">'; 
									foreach ($SELECT_slider as $key => $value) {
										echo '<option value="' . $value . '">' . $key . '</option>';
									}
									echo '</select>';?>									
									</td>
								</tr>
								
								
<tr id="optionslider" name="optionslider" >								
</tr>								

								<script type="application/javascript">
								$(document).ready(function(){
								$("#slider_theme").on("change",function(){
									var x_optionslider=$("#slider_theme").val();
									//alert(x_value);
									$.ajax({
										url:'admin/themebuilder/ajax.php',
										data:{x_optionslider:x_optionslider},
										type: 'post',
										success : function(resp){
											$("#optionslider").html(resp);
											//$("#optionslider").append(resp); 
										},
										error : function(resp){}
									});
								});

								});

								</script>




							

												<tr>
													<td colspan="2">
														<ul class="pager ct_submit">

															<li class="next">
																<button id="button-add_slide" class="btn btn-small btn-blue border-radius3">
																	Enregistrer
																</button>
																<input type="hidden" name="action" value="add_slide-save" />
															</li>

														</ul>
													</td>
												</tr>
								
								
								
								<tr>
								<td style="height: 115px;">
								
								</td>
								</tr>
								
								
								
								
								
								
							<tr>
								<td  style="color: red;" width="50%" align="left" valign="middle">Ajouter un item au slider</td>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">Slider parent</td>
									<td>
	

									<select name="sliderparent" class="select" style="width:200px">
											<?php

											global $xoopsDB;
											$sql = "SELECT distinct conf_id, conf_name FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 2 ORDER BY conf_id DESC";
									$result = $xoopsDB->query($sql); 
									echo '<option value="0">-----------------</option>';
										while (list($conf_id, $conf_name) = $xoopsDB->fetchRow($result)) {
										echo '<option value="' . $conf_id . '">' . $conf_name . '</option>';
										}
										echo '</select>';
										
										$local = dirname($_SERVER['PHP_SELF']);
										$location     = str_replace('/modules/system', '', $local);
										
										?>

								
									</td>
								</tr>
								

								<tr>
								
								
								<tr>
								<td style='padding-left: 15px; font-family:Arial; font-size: 10px;'>Upload image</td>
								<input type="hidden" id="location" name="location" value="<?php echo $location; ?>" />
									<td>

<!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js' ></script>-->
<script type='text/javascript' src='admin/themebuilder/js/ajaxupload.js' ></script>
<link rel='stylesheet' type='text/css' href='admin/themebuilder/js/stylesupload.css' />
<script type='text/javascript' >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		var x = $('#location').val();
		
		new AjaxUpload(btnUpload, {
			// Arquivo que fará o upload
			action: 'admin/themebuilder/upload-file.php',
			//Nome da caixa de entrada do arquivo
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					alert('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			$('#status').show();
			},
			onComplete: function(file, response){
				//Limpamos o status
				status.text('');
				//Adicionar arquivo carregado na lista
				//if(response==='success'){
				if (response != 'error'){
					//$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
					$('<li></li>').appendTo('#files').html('<img src=../../uploads/'+response+' />'+response).addClass('success');
					$('#imageslider').val(''+x+'/uploads/'+response+'');
					status.text('');
					$('#status').hide();
					$('#upload').hide();

				} else{
					alert('File '+file+' do not load...');	
$('<li></li>').appendTo('#files').text(file).addClass('error');
status.text('Probleme upload...');
			
				}
			}
		});
		
	});
</script>

<div id='upload' ><span>Upload File<span></div><span id='status' ></span>
		<ul id='files' ></ul>

		
		<script type='text/javascript' >
	$(function(){
		var btnUpload=$('#uploadd');
		var status=$('#statuss');
		var x = $('#location').val();
		
		new AjaxUpload(btnUpload, {
			// Arquivo que fará o upload
			action: 'admin/themebuilder/upload-file.php',
			//Nome da caixa de entrada do arquivo
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					alert('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			$('#statuss').show();
			},
			onComplete: function(file, response){
				//Limpamos o status
				status.text('');
				//Adicionar arquivo carregado na lista
				//if(response==='success'){
				if (response != 'error'){
					//$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
					$('<li></li>').appendTo('#files').html('<img src=../../uploads/'+response+' />'+response).addClass('success');
					$('#imageslider').val(''+x+'/uploads/'+response+'');
					status.text('');
					$('#statuss').hide();
					$('#uploadd').hide();

				} else{
					alert('File '+file+' do not load...');	
$('<li></li>').appendTo('#filess').text(file).addClass('error');
status.text('Probleme upload...');
			
				}
			}
		});
		
	});
</script>
		<div id='uploadd' ><span>Upload File<span></div><span id='statuss' ></span>
		<ul id='filess' ></ul>

								</td>
								</tr>					
								<tr>	
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">image</td>
									<td>
						
											<div class="input-append color">
											<input id="imageslider" name="imageslider" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>

								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">titre de l'item dans le slider</td>
									<td>
						
											<div class="input-append color">
											<input id="titreitemslider" name="titreitemslider" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">url de l'item dans le slider</td>
									<td>
						
											<div class="input-append color">
											<input id="urlslider" name="urlslider" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>
								
								<tr>
								<td style="padding-left: 15px; font-family:Arial; font-size: 10px;">ordre de l'item slider</td>
									<td>
						
											<div class="input-append color">
											<input id="ordreslider" name="ordreslider" type="text" size="40" value="" style="width: 190px;"/>
											</div>
										
									</td>
								</tr>

								
							</tr>

												<tr>
													<td colspan="2">
														<ul class="pager ct_submit">

															<li class="next">
																<button id="button-add_slide" class="btn btn-small btn-blue border-radius3">
																	Enregistrer
																</button>
																<input type="hidden" name="action" value="add_slide-save" />
															</li>

														</ul>
													</td>
												</tr>
											<?php
											   echo'</table>
											</form>';		

	  
	  
	  
	  
        break;



		case 'ThemeBuilder': // Save banner


	if(isset($_POST['reset']) && $_POST['reset'] == 'Reset'){
	
	
							$ok = (isset($_GET['ok']) && $_GET['ok'] == 1) ? intval($_GET['ok']) : 0;
						if ($ok == 1){
			
								$fichierthemehtmlamodifier = '../theme.html';
								$fichierthemehtmloriginal = '../theme1.html';
								$new = '';
								global $xoopsDB;
									$sqltemplate = "UPDATE " . $xoopsDB -> prefix('config_theme') . " SET conf_value = '".$new."' WHERE conf_name = 'template'";

									if ( $resulttemplate = $xoopsDB -> queryF( $sqltemplate ) ) {
									//error_reporting(E_ALL);
											$file = fopen($fichierthemehtmloriginal, 'rb');
											$newfile = fopen($fichierthemehtmlamodifier, 'wb');
											$flags = false;

											if($newfile && $file){
												while(($line = fgets($file)) !== false) {
												   fputs($newfile, $line);												   
												}
												$flags = false;
												echo 'reset ok';
																											
													if ($flags = true){
											
														function del_folder_add_index($folder){ //$folder=Path to folder  
																 $dir = opendir($folder);  
															 while ($file = readdir($dir)){  
															 if( ($file !='.') && ($file !='..') && ($file !='index.html') ){  
															 if (is_dir($folder.$file)){del_folder_add_index($folder.$file);}  
															 unlink($folder.$file);
															 }}  
															 closedir($dir);
															echo ' <br>smarty_compile cache is deleted also';										 
														} 
														
														//del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_cache/");  
														del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_compile/");  
													
													}
													
													redirect_header("admin.php?fct=themebuilder&op=ThemeBuilder", 4, _AM_TEMPLATE_DELETED);
													exit();

											}else{echo 'probleme avec fopen';}
											
											fclose($newfile);
											fclose($file);
																					
									}else{echo 'probleme avec le reset';}
									
						}else{
							
							xoops_confirm(array('ok' => 1), 'admin.php?fct=themebuilder&op=ThemeBuilder&ok=1', _AM_ARABESK125dotNET_AREUSURE, 'Reset');

						}			
	
	}
	
	if(isset($_POST['admin']) && $_POST['admin'] == 'Update'){
	
		$items = array();
		$count = array();	
		$tabs_count = array();
		


		foreach($_POST['olivee-item-type'] as $type_k => $type){
			$item = array();
			$item['type'] = $type;
			$item['size'] = $_POST['olivee-item-size'][$type_k];
			
			if( ! key_exists($type, $count) ){
				$count[$type] = 1;
			}
			
			if( ! key_exists($type, $tabs_count) ){
				$tabs_count[$type] = 0;
			}

			if( key_exists($type, $_POST['olivee-items']) ){
				foreach( (array) $_POST['olivee-items'][$type] as $attr_k => $attr ){
					if( in_array($type, array('accordion','faq','tabs')) ){
						// accordion & faq & tabs ----------------------------
						$item['fields']['count'] = $attr['count'][$count[$type]];
						if( $item['fields']['count'] ){
							for ($i = 0; $i < $item['fields']['count']; $i++) {
								$tab = array();
								$tab['title'] = stripslashes($attr['title'][$tabs_count[$type]]);
								$tab['content'] = stripslashes($attr['content'][$tabs_count[$type]]);
								$item['fields']['tabs'][] = $tab;
								$tabs_count[$type]++;
							}
						}
						
						if ($item['type'] = 'accordion'){
						var_dump($item);
						
						}
						if ($item['type'] = 'faq'){
						var_dump($item);
						
						}
						if ($item['type'] = 'tabs'){
						
									if( $item['fields']['tabs'] ){
										$tabs_array = $item['fields']['tabs'];
									}
									
										if( is_array( $tabs_array ) ){
										
										
													$output  = '<div class="jq-tabs">';
													$output .= '<ul>';
													$i = 1;
													$output_tabs = '';
												foreach( $tabs_array as $tab ){
													$output .= '<li><a href="#tab-'. $i .'">'. $tab['title'] .'</a></li>';
													$output_tabs .= '<div id="tab-'. $i .'">'.  $tab['content']  .'</div>';
													$i++;
												}

													$output .= '</ul>';
													$output .= $output_tabs;
													$output .= '</div>';				
												
										}		
										
										echo $output;

						}
						
					} else {
						$item['fields'][$attr_k] = stripslashes($attr[$count[$type]]);
						$classes = array(
							'1/4' => 'olivee-item-1-4',
							'1/3' => 'olivee-item-1-3',
							'1/2' => 'olivee-item-1-2',
							'2/3' => 'olivee-item-2-3',
							'3/4' => 'olivee-item-3-4',
							'1/1' => 'olivee-item-1-1'
						);
						
						
						switch ($item['type']){
						
							case 'Blockcolumn' :														
														 if ($item['fields']['content'] == 'Left'){
														 //var_dump($item);
																$html['html'] = '<{if $xoops_showlblock}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'">';																
																$html['html'] .= '<{if $xoops_showlblock}>
																	<{foreach item=block from=$xoBlocks.canvas_left}>';
																	
																	
																	
																	
																		if ($item['fields']['content222'] == 'before'){
																			if ($item['fields']['content2'] != '0' && $item['fields']['content22'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content22'].'}>
																				<br>
																				'.$item['fields']['content2'].'
																				<br>
																				<{/if}>';
																			}
																		}
																	
																		if ($item['fields']['content111'] == 'before'){
																			if ($item['fields']['content1'] != '0' && $item['fields']['content11'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content11'].'}>
																				<br>
																				'.$item['fields']['content1'].'
																				<br>
																				<{/if}>';
																			}
																		}
																	
																				$html['html'] .= '<{if $xoops_isadmin}>&nbsp;
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin&op=edit&bid=}><{$block.id}>" title="Edit this Block" >
																					<img src="<{$xoops_imageurl}>block/block-edit.png" alt="Edit this Block"></a>&nbsp;
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin&op=delete&bid=}><{$block.id}>" title="Delete this Block" >
																					<img src="<{$xoops_imageurl}>block/block-delete.png" alt="Delete this Block"></a>&nbsp;
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin}>" title="Add New Block" >
																					<img src="<{$xoops_imageurl}>block/block-add.png" alt="Add New Block"></a>
																				<{/if}>
																		<{if $block.title}>
																			<div class="blockTitle"><{$block.title}></div>
																		<{/if}>
																		<div class="blockContent"><{$block.content}></div>';
																		
																		if ($item['fields']['content222'] == 'in'){
																			if ($item['fields']['content2'] != '0' && $item['fields']['content22'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content22'].'}>
																				<br>
																				'.$item['fields']['content2'].'
																				<br>
																				<{/if}>';
																			}
																		}
																		
																		
																		if ($item['fields']['content111'] == 'in'){
																			if ($item['fields']['content1'] != '0' && $item['fields']['content11'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content11'].'}>
																				<br>
																				'.$item['fields']['content1'].'
																				<br>
																				<{/if}>';
																			}
																		}	
																		
																		if ($item['fields']['content222'] == 'after'){
																			if ($item['fields']['content2'] != '0' && $item['fields']['content22'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content22'].'}>
																				<br>
																				'.$item['fields']['content2'].'
																				<br>
																				<{/if}>';
																			}
																		}
																		
																		
																		if ($item['fields']['content111'] == 'after'){
																			if ($item['fields']['content1'] != '0' && $item['fields']['content11'] != '0' ){
																				$html['html'] .= '<{if $block.id == '.$item['fields']['content11'].'}>
																				<br>
																				'.$item['fields']['content1'].'
																				<br>
																				<{/if}>';
																			}
																		}
																		
																	$html['html'] .= '	
																	<{/foreach}>
																<{/if}>';


																$html['html'] .='</div>';
																$html['html'] .='<{/if}>';
														}
														if ($item['fields']['content'] == 'Center'){
														
																$html['html'] = '<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright or $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter or $xoops_contents && ($xoops_contents != " ")}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_centerblocksandcontent.html"}>';
																$html['html'] .='</div>';
																$html['html'] .='<{/if}>';
														}

														if ($item['fields']['content'] == 'Right'){
														
																$html['html'] = '<{if $xoops_showrblock}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_rightblocks.html"}>';
																$html['html'] .='</div>';
																$html['html'] .='<{/if}>';																
														}		
							 break;
							 
							case 'divider' :
															$html['html'] =  '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'">';
															
															if ($item['fields']['line'] == '0'){
															$html['html'] .=  '<br><hr style="display: none;" /><br>'."\n";
															}elseif($item['fields']['line'] == '1'){
															$html['html'] .=  '<br><hr style="margin: 0 0 '. intval($item['fields']['height']) .'px;'. $line .'" /><br>'."\n";
															}elseif($item['fields']['line'] == '2'){
															$html['html'] .= '<div style="background: url(../images/horizontal_bar.png) no-repeat top center; height: 15px "></div>';
															}
															$html['html'] .= '</div>'."\n";
							 break;

							case 'column' :
															if ($item['size'] == '1/4'){
															
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '1/3'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '1/2'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '2/3'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '3/4'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '2/4'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
															if ($item['size'] == '1/1'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>'."\n";
															
															
															}
							
							 break;

							case 'Slider' :
							
											$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
											$html['html'] .=  "\n".$item['fields']['content']."\n";
											$html['html'] .=  "\n</div>\n";
							 break;

							case 'Menu' :
							//var_dump($item);
								$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
								$html['html'] .=  "\n".$item['fields']['content']."\n";
								$html['html'] .=  "\n</div>\n";
							 break;
							 
							 
							 case 'youtube' :
								$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
								$html['html'] .= '<div class="article_video">';
								$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://www.youtube.com/embed/'. $item['fields']['video'] .'?wmode=opaque" frameborder="0" allowfullscreen></iframe>'."\n";
								$html['html'] .= '</div></div>';
	
							 
							 break;
							 
							 case 'vimeo' :
						
								$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
								$html['html'] .= '<div class="article_video">';
								$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://player.vimeo.com/video/'. $item['fields']['video'] .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
								$html['html'] .= '</div></div>';
	
							 
							 break;	
							 
							 
							 case 'image' :
							 //var_dump($item);
							 	if( $item['fields']['target'] ){
									$target = 'target="_blank"';
								} else {
									$target = false;
								}

								// border
								if( $item['fields']['border'] ){
									$border = ' border';
								} else {
									$border = ' no-border';
								}
								
								// align
								if( $item['fields']['align'] ) $align = ' align'. $align;
								
								// hoover icon
								if( $item['fields']['link_type'] == 'zoom' || $item['fields']['link_image'] )	{
									$class= 'fancybox';
									$link_type = 'icon-eye-open';
									$target = '';
								} else {
									$class = '';
									$link_type = 'icon-link';
								}
								
								// link
								if( $item['fields']['link_image'] ) $link = $item['fields']['link_image'];
								
								if( $item['fields']['link'] )
								{	
									$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
										$html['html']  .= '<div class="scale-with-grid wp-caption'. $align . $border .'">';
											$html['html'] .= '<div class="photo">';
												$html['html'] .= '<div class="photo_wrapper">';
													$html['html'] .= '<a href="'. $item['fields']['link'] .'" class="'. $item['fields']['class'] .'" '. $item['fields']['target'] .'>';
														$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['src'] .'" style="height:'. $item['fields']['height'] .'px; width:100%;" alt="'. $item['fields']['alt'] .'" />';
														$html['html'] .= '<div class="mask"></div>';
														$html['html'] .= '<i class="'. $link_type .'"></i>';
													$html['html'] .= '</a>';
												$html['html'] .= '</div>';
											$html['html'] .= '</div>';
											if( $item['fields']['caption'] ) $html['html'] .= '<p class="wp-caption-text">'. $item['fields']['caption'] .'</p>';
										$html['html'] .= '</div>'."\n";
									$html['html'] .= '</div>'."\n";
								}
								else 
								{
									$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
										$html['html']  .= '<div class="scale-with-grid wp-caption no-hover'. $align . $border .'">';
											$html['html'] .= '<div class="photo">';
												$html['html'] .= '<div class="photo_wrapper">';
													$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['src'] .'" style="height:'. $item['fields']['height'] .'px; width:100%;" alt="'. $item['fields']['alt'] .'" />';
												$html['html'] .= '</div>';
											$html['html'] .= '</div>';
											if( $item['fields']['caption'] ) $html['html'] .= '<p class="wp-caption-text">'. $item['fields']['caption'] .'</p>';
										$html['html'] .= '</div>'."\n";
									$html['html'] .= '</div>'."\n";
								}							 
							 
							 break;	
							 
							 
							 case 'feature_box' :
							 
							 
							 	if( $item['fields']['target'] ){
									$target = 'target="_blank"';
								} else {
									$target = false;
								}

								$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
									$html['html'] .= '<div class="feature_box">';
										$html['html'] .= '<div class="photo">';
											if( $item['fields']['link'] )  $html['html'] .= '<a href="'. $item['fields']['link'] .'" '. $target .'>';
												$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['image'] .'" alt="'. $item['fields']['title'] .'" />';
												$html['html'] .= '<div class="desc '. $item['fields']['background'] .'">';
													$html['html'] .= '<div class="desc_i">';
														$html['html'] .= '<h4>'. $item['fields']['title'] .'</h4>';
														$html['html'] .= '<span class="icon"><i class="icon-chevron-right"></i></span>';
													$html['html'] .= '</div>';
												$html['html'] .= '</div>';
											if( $item['fields']['link'] )  $html['html'] .= '</a>';
										$html['html'] .= '</div>';
									$html['html'] .= '</div>'."\n";
								$html['html'] .= '</div>'."\n";
							 
							 
							 break;	
							 
							 
							 case 'content' :
							  $html['html'] =  "You are about to live! have a nice time with xoops";
							 break;								 
										
						case 'TableBlockcolumn' :
																$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_centerblocksandcontent.html"}>';
																$html['html'] .='</div>';
							 break;								 
						
						
						
						case 'blockquote' :
						
													$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
														$html['html'] .= '<div class="inner-padding">';
														
															$html['html'] .= '<blockquote>';
																$html['html'] .= '<div class="inside">';
																	$html['html'] .= '<div class="text">';
																		$html['html'] .= '<p class="bq">'. $item['fields']['content'] .'</p>';
																	$html['html'] .= '</div>';
																	$html['html'] .= '<p class="author">';
																		$html['html'] .= '<strong><span>'. $item['fields']['author']. '</span></strong>';
																		if( $link ){
																			if( $target ){
																				$target = 'target="_blank"';
																			} else {
																				$target = false;
																			}
																			$html['html'] .= ', <i class="icon-external-link"></i> <a href="'. $link .'" '. $target .'>'. $link_title .'</a>';
																		}
																	$html['html'] .= '</p>';
																$html['html'] .= '</div>';
															$html['html'] .= '</blockquote>';
															
														$html['html'] .= '</div>'."\n";	
													$html['html'] .= '</div>'."\n";	
						
						
						
							 break;								 
						
						
						
						case 'code' :
						
											$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
												$html['html']  .= '<div class="inner-padding">';
													$html['html'] .= '<pre>';
														$html['html'] .= htmlspecialchars($item['fields']['content']);
													$html['html'] .= '</pre>'."\n";
												$html['html'] .= '</div>'."\n";
											$html['html'] .= '</div>'."\n";	
						
							 break;								 
							 
							 case 'article_box' :

															if( $item['fields']['target'] ){
																$target = 'target="_blank"'; 
															} else { 
																$target = false;
															}
															
														$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
															$html['html'] .= '<div class="article_box">';
																$html['html'] .= '<div class="photo">';
																	$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['image'] .'" alt="'. $item['fields']['title'] .'" />';
																$html['html'] .= '</div>';
																$html['html'] .= '<div class="desc">';
																	$html['html'] .= '<h3>'. $item['fields']['title'] .'</h3>';
																	$html['html'] .= '<p>'. $item['fields']['content'] .'</p>';
																	if( $item['fields']['link'] ) $html['html'] .= '<a class="button" href="'. $item['fields']['link'] .'" '. $target .'>'. $item['fields']['link_title'] .' <span>&rarr;</span></a>';
																$html['html'] .= '</div>';
															$html['html'] .= '</div>'."\n";
														$html['html'] .= '</div>'."\n";

							 break;	
							 
							 case 'contact_box' :						 
														$html['html'] =  '<div class="'. $classes[$item['size']] .'">';							 
															$html['html'] .= '<div class="get_in_touch inner-padding">';
																$html['html'] .= '<h3>'. $item['fields']['title'] .'</h3>';
																$html['html'] .= '<ul>';
																	if( $item['fields']['address'] ){
																		$html['html'] .= '<li class="address">';
																			$html['html'] .= '<i class="icon-map-marker"></i><p>'. $item['fields']['address'] .'</p>';
																		$html['html'] .= '</li>';
																	}
																	if( $telephone ){
																		$html['html'] .= '<li class="phone">';
																			$html['html'] .= '<i class="icon-phone"></i><p>'. $item['fields']['telephone'] .'</p>';
																		$html['html'] .= '</li>';
																	}
																	if( $item['fields']['fax'] ){
																		$html['html'] .= '<li class="fax">';
																			$html['html'] .= '<i class="icon-print"></i><p>'. $item['fields']['fax'] .'</p>';
																		$html['html'] .= '</li>';
																	}
																	if( $item['fields']['email'] ){
																		$html['html'] .= '<li class="mail">';
																			$html['html'] .= '<i class="icon-envelope"></i><p><a href="mailto:'. $item['fields']['email'] .'">'. $item['fields']['email'] .'</a></p>';
																		$html['html'] .= '</li>';
																	}
																	if( $item['fields']['www'] ){
																		$html['html'] .= '<li class="www">';
																			$html['html'] .= '<i class="icon-globe"></i><p><a href="http://'. $item['fields']['www'] .'">'. $item['fields']['www'] .'</a></p>';
																		$html['html'] .= '</li>';
																	}
																$html['html'] .= '</ul>';
															$html['html'] .= '</div>'."\n";
														$html['html'] .= '</div>'."\n";	
							break;	

							case 'contact_form' :
													$html['html'] =  '<div class="'. $classes[$item['size']] .'">';	
														$html['html'] .= '<div class="inner-padding">';
															if( $item['fields']['title'] ) $html['html'] .= '<h3>'. $item['fields']['title'] .'</h3>';
															$html['html'] .= '<div class="contact_form">';
																$html['html'] .= '<form id="json_contact_form" method="POST" action="theme-mail.php">';
																	$html['html'] .= '<input type="hidden" name="To" value="'. $item['fields']['email'] .'" />';
																	$html['html'] .= '<fieldset>';
																		$html['html'] .= '<input id="Name" class="nick required" name="Name" placeholder="contact-name" type="text" />';
																		$html['html'] .= '<input id="Email" class="email required" name="Email" placeholder="contact-email" type="text" />';
																		$html['html'] .= '<input id="Subject" class="subject" name="Subject" placeholder="contact-subject" type="text" />';
																		$html['html'] .= '<textarea id="Message" name="Message" class="required"></textarea>';
																		$html['html'] .= '<input type="submit" value="contact-submit" />';
																	$html['html'] .= '</fieldset>';
																$html['html'] .= '</form>';
																$html['html'] .= '<div class="alert_success" style="display:none;">contact-message-success</div>';
																$html['html'] .= '<div class="alert_error" style="display:none;">contact-message-error</div>';
															$html['html'] .= '</div>';
														$html['html'] .= '</div>'."\n";
													$html['html'] .= '</div>'."\n";
							 break;	

							 case 'xoops_banner' :
							 
														if ($item['fields']['content'] == 'oui'){
																$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'">';
																$html['html'] .= '		 <div id="headerbanner"><{$xoops_banner}></div>';
																$html['html'] .='</div>';
														}elseif ($item['fields']['content'] == 'no'){
																$html['html'] = '';
														}														
							 break;	
							 
							 case 'feed' :							 
													     $rssurl = array();
													     //$rssurl[] = 'http://sourceforge.net/export/rss2_projnews.php?group_id=41586&rss_fulltext=1';
													     $rssurl[] = 'http://www.xoops.org/backend.php';
														 //$rssurl[] = 'http://arabesk125.net/modules/mytube/feed.php';
													     /*if ($URLs = include $GLOBALS['xoops']->path('language/' . xoops_getConfigOption('language') . '/backend.php')) {
													         $rssurl = array_unique(array_merge($rssurl, $URLs));
														}*/
																require_once $GLOBALS['xoops']->path('class/snoopy.php');
												         include_once $GLOBALS['xoops']->path('class/xml/rss/xmlrss2parser.php');
												 
												         //xoops_load('XoopsLocal');
												         $snoopy = new Snoopy();
												         $cnt = 0;
												         foreach ($rssurl as $url) {
												             if ($snoopy->fetch($url)) {
												                 $rssdata = $snoopy->results;
												                 $rss2parser = new XoopsXmlRss2Parser($rssdata);
												                 if (false != $rss2parser->parse()) {
												                     $_items = $rss2parser->getItems();
												                     $count = count($_items);
												                     for ($i = 0; $i < $count; $i ++) {
												                         $_items[$i]['title'] = $_items[$i]['title'];
												                         $_items[$i]['description'] = $_items[$i]['description'];
												                         //$items[$_items[$i]['pubdate']] = $_items[$i];
												                     }
												                 } else {
												                     $ret = $rss2parser->getErrors();
																	 $ret .= 'probleme avec le parsing';
												                 }
												             }
												         }
												         //krsort($items);
												         //XoopsCache::write($rssfile, $items, 86400);
														 
												     
												     if ($items != '') {
													 
												         $ret = '<table class="outer" width="100%">';
												         foreach(array_keys($_items) as $i) {
														 //var_dump($rssurl);
												             $ret .= '<tr class="head"><td><a href="' . htmlspecialchars($_items[$i]['link']) . '" rel="external">';
												             $ret .= htmlspecialchars($_items[$i]['title']) . '</a> (' . htmlspecialchars($_items[$i]['pubdate']) . ')</td></tr>';
												             if ($items[$i]['description'] != "") {
												                 $ret .= '<tr><td class="odd">' . $items[$i]['description'];
												                 if (! empty($_items[$i]['guid'])) {
												                     $ret .= '&nbsp;&nbsp;<a href="' . htmlspecialchars($_items[$i]['guid']) . '" rel="external">' . _MORE . '</a>';
												                 }
												                 $ret .= '</td></tr>';
												             } else if ($_items[$i]['guid'] != "") {
												                 $ret .= '<tr><td class="even" valign="top"></td><td colspan="2" class="odd"><a href="' . htmlspecialchars($_items[$i]['guid']) . '" rel="external">' . _MORE . '</a></td></tr>';
												             }
												         }
												         $ret .= '</table>';
														 $html['html'] =  '<div class="'. $classes[$item['size']] .'">';	
												         $html['html'] .=  $ret;
														 $html['html'] .= '</div>'."\n";
												     }
							 break;	

							case 'soundcloud' :
													$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'">';
														if($item['fields']['iframe'] == '0'){
															$url = 'http://w.soundcloud.com/player/?url=' . $item['fields']['url'];
															if($item['fields']['width'] == "100%") {
																$out_width = 'class="full-width-show" width="600"';
															}else{
																$out_width = 'width="'.$item['fields']['width'].'"';
															}
															$html['html'] .= '<div class="sound-sl"><iframe '.$out_width.' height="'.$item['fields']['height'].'" scrolling="no" src="'.$url.'"></iframe></div>';
														}else{
															$url = 'http://player.soundcloud.com/player.swf?url=' . $item['fields']['url'];
															$html['html'] .= '<div class="sound-sl"><object width="'.$item['fields']['width'].'" height="'.$item['fields']['height'].'">
																					<param name="movie" value="'.$url.'"></param>
																					<param name="allowscriptaccess" value="always"></param>
																					<embed width="'.$item['fields']['width'].'" height="'.$item['fields']['height'].'" src="'.$url.'" allowscriptaccess="always" type="application/x-shockwave-flash"></embed>
																				  </object></div>';
														}
													$html['html'] .= '</div>'."\n";
							 break;	

						case 'mapsgoogle' :
													if($item['fields']['content'] != ''){
														
														/*$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
														$html['html'] .=  "\n".htmlentities($item['fields']['content'])."\n";
														$html['html'] .=  "\n</div>\n";*/
										
														$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'">';
														$html['html'] .=  '<div class="block_map">
																				<div class="block_general_pic" style="padding:0px;">
																					<iframe width="'.$item['fields']['width'].'" height="'.$item['fields']['height'].'" scrolling="no" marginheight="0" marginwidth="0" src="'.$item['fields']['content'].'" style="color:#0000FF;text-align:left; border:0px solid #ddd; padding:5px; background:#fff;"></iframe>
																				</div>
																			</div>';
														$html['html'] .=  "\n</div>\n";
													}
							 break;	
						
						}	
					}
				} 
			}
			
			$count[$type] ++;
			$items[] = $item;
			$html1[] = $html;
		}

function search_arraystropos($needle, $haystack) {
	foreach($haystack as $key => $needles){
		if(strpos($needles['html'], $needle) !== false){
               return true;
			   break;
		}
	}
	return false;
}

$value = 'theme_centerblocksandcontent.html';
 
if(!search_arraystropos($value, $html1)) {
     // do something if the given value does not exist in the array
	 
	 echo 'you have to choose column block center. obligatoir pour le output php script<br>';

}else{
echo 'yes centre block php exi
st<br>';

/////
	$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 4";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
	$unserialise = unserialize($css_arr['conf_value']);
	
		
	$favico = $unserialise['fav_ico'];
	$jsheader = $unserialise['js_header_text_extra'];
	$jsbody = $unserialise['js_body_text_extra'];
	//var_dump($unserialise);
	//var_dump($unserialise['js_header_text_extra']);
	//to add in heder or in the footer
	

	if($unserialise['scroll_top_enabled'] == 'Activate'){
	$scrolltop = '
	<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$("#back-top").fadeIn();
			} else {
				$("#back-top").fadeOut();
			}
		});

		// scroll body to 0px on click
		$("#back-top a").click(function () {
			$("body,html").animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
	
	<style>
#back-top {
	position: fixed;
	bottom: 30px;
	margin-left: -150px;
}

#back-top a {
	width: 108px;
	display: block;
	text-align: center;
	font: 11px/100% Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	text-decoration: none;
	color: #bbb;

	/* transition */
	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover {
	color: #000;
}

/* arrow icon (span tag) */
#back-top span {
	width: 108px;
	height: 108px;
	display: block;
	margin-bottom: 7px;
	background: #ddd url(themes/themebuilder/icons/up-arrow.png) no-repeat center center;

	/* rounded corners */
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;

	/* transition */
	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
}
#back-top a:hover span {
	background-color: #777;
}
	</style>
	
	
	';
	}else{
	$scrolltop = '';
	}


/////

	
//$htm['html'] = array('zzz' => array('html' => '<{includeq file="$theme_name/tpl/theme_header.html"}>'));
$htm['html'] = array('zzz' => array('html' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<{include_php file="file:$xoops_rootpath/themes/$xoops_theme/configuration.inc.php"}>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">
<head>
    <!-- Assign Theme name -->
    <{assign var=theme_name value=$xoTheme->folderName}>
		<!-- Open Graph -->
<{if $og_title !=""}>
	<meta property="og:title" content="<{$og_title}>" />
	<{/if}>
<{if $og_type !=""}><meta property="og:type" content="<{$og_type}>" />
<{/if}>
<{if $og_url !=""}><meta property="og:url" content="<{$og_url}>" />
<{/if}>
<{if $og_image !=""}><meta property="og:image" content="<{$xoops_url}><{$og_image}>" />
<{/if}>
	<meta property="og:site_name" content="<{$xoops_sitename}>" />
	<meta property="og:description" content="<{$xoops_meta_description}>" />
    <meta property="fb:admins" content="" />
    <meta property="fb:app_id" content="" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://fbcomments-email-notifications.googlecode.com/files/fbCommentsEN.js"></script>
	<!-- Open Graph -->
    <!-- Title and meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <meta http-equiv="content-language" content="<{$xoops_langcode}>" />
    <meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />
    <title><{if $xoops_pagetitle !=""}><{$xoops_pagetitle}> - <{/if}><{$xoops_sitename}></title>
    <meta name="robots" content="<{$xoops_meta_robots}>" />
    <meta name="keywords" content="<{$xoops_meta_keywords}>" />
    <meta name="description" content="<{$xoops_meta_description}>" />
    <meta name="rating" content="<{$xoops_meta_rating}>" />
    <meta name="author" content="<{$xoops_meta_author}>" />
    <meta name="copyright" content="<{$xoops_meta_copyright}>" />
    <meta name="generator" content="XOOPS" />

    <!-- Rss -->
    <link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="'.$favico.'" />
    <link rel="icon" type="image/png" href="<{xoImgUrl icons/favicon.png}>" />

    <!-- Sheet Css -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoAppUrl xoops.css}>" />
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl style.css}>" />
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css"/>
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="<{xoImgUrl styleIE8.css}>" type="text/css" />
	<![endif]-->
	
	<!-- JS -->
    <{if $xoops_dirname != "publisher"}>
    <script type="text/javascript" src="<{$xoops_url}>/browse.php?Frameworks/jquery/jquery.js"> </script>
    <script type="text/javascript" src="<{$xoops_imageurl}>js/curvycorners.src.js"> </script>
    <{/if}>

    <!-- customized header contents -->
    <{$xoops_module_header}>


<style>


		.wrapper { background-color: transparent}
		/*.wrapper { background-color: yellow}*/
		

/*
<{if $body_background_texture}>
body { 
background-image:url("texture/<{$body_background_texture}>");
background-repeat:<{$body_repeat}>;
background-attachment:<{$body_bgscroll}>;
background-position:<{$body_pos}>; 
}<{/if}>

<{if $body_background_img}>
body {color: #000; background-color: <{$body_background_color}>;
			background-image:url(<{$body_background_img}>);
			background-repeat: <{$body_background_img_repeat}>;
			background-attachment:<{$body_background_img_scroll}>;
			background-position:<{$body_background_img_position}>; 
}<{/if}>
*/


</style>
	<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/custom-css.php}>" />
		<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/widget-css.css}>" />

'.$scrolltop.'
'.$jsheader.'
 
</head>
<body id="<{$xoops_dirname}>" class="<{$xoops_langcode}>">
<div class="wrapper">
	<p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>

'));
		
		$html12 = array_merge($htm['html'], $html1);
		$ttt = array('gggg' => array('html' => '</div>'.$jsbody.'</body></html>'));		
		$html123 = array_merge($html12, $ttt);
			
//var_dump($html123);	

$new = serialize($items);

							global $xoopsDB;
							//$sqltemplate = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_catid, conf_name, conf_value) VALUES ('', '3', 'template', '$new')";
							$sqltemplate = "UPDATE " . $xoopsDB -> prefix('config_theme') . " SET conf_value = '".$new."' WHERE conf_name = 'template'";

							if ( $resulttemplate = $xoopsDB -> queryF( $sqltemplate ) ) {
							
					$src1 = dirname(__FILE__).'\test';
					$dst11 = str_replace('modules\system\admin\themebuilder\test', 'themes\themebuilder', $src1);
					$dst1 = $dst11;
					//echo '<br>'.$src1;
					//echo '<br>'.$dst1;
					if ( !is_dir($dst1)){
							
						//echo '</br>         gg folder not exist';
							
								function recurse_copy($src,$dst) {
									$dir = opendir($src);
									if (!file_exists($dst) OR !is_dir($dst)){
										@mkdir($dst);
										while(false !== ( $file = readdir($dir)) ) {
											if (( $file != '.' ) && ( $file != '..' )) {
												if ( is_dir($src . '/' . $file) ) {
													recurse_copy($src . '/' . $file,$dst . '/' . $file);
												}
												else {
													copy($src . '/' . $file,$dst . '/' . $file);
													//echo $dst . '/' . $file;
												}
											}
										}
									}
									closedir($dir);
								}


							recurse_copy($src1,$dst1);
							echo ' Folder themebuilder created in theme folder';

							
							
					}else{ //echo '       folder exist';
							
							
							
							
						
							
								echo 'template enregistré avec succes';
								$fichierthemehtmlamodifier = $dst1.'\theme.html';
								echo $fichierthemehtmlamodifier;
															
								$f = @fopen($fichierthemehtmlamodifier, 'w+');
								$flag = false;
								if ($f) {

										foreach($html123 as $key => $value){
										  @fputs($f, $value['html']."\n");
										  	//var_dump($value['html']);
										}
										
									echo ' <br>theme.html est a jour';
										$flag = true;
								  @fclose($f);
								}else{
									echo ' <br>probleme avec fopen theme.html';
								}
									if ($flag = true){
									
										function del_folder_add_index($folder){ //$folder=Path to folder  
												 $dir = opendir($folder);  
											 while ($file = readdir($dir)){  
											 if( ($file !='.') && ($file !='..') && ($file !='index.html') ){  
											 if (is_dir($folder.$file)){del_folder_add_index($folder.$file);}  
											 unlink($folder.$file);
											 //echo $folder.$file.'<br>';
											 }}  
											 closedir($dir);
											echo ' <br>smarty_compile cache is deleted';										 
										} 
										
										//del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_cache/");  
										del_folder_add_index(XOOPS_VAR_PATH."/caches/smarty_compile/");  
									
									}
								}	//fin if       folder exist;

							}else{
							echo ' probleme update';
							}
							//echo 'not finished yet next release will be done';
							
	}//fin if test						
	}






		
	   	function olivee_meta_field_input( $field, $meta ){
	global $OLIVEE_Options;

	if( isset( $field['type'] ) ){
		
		echo '<tr valign="top">';
			echo '<th>';
				if( key_exists('title', $field) ) echo $field['title'];
				if( key_exists('sub_desc', $field) ) echo '<span class="description">'. $field['sub_desc'] .'</span>';
			echo '</th>';
			echo '<td>';

				$field_class = 'OLIVEE_Options_'.$field['type'];
				//if (file_exists('./fields/'.$field['type'].'/field_'.$field['type'].'.php')) { 
					require_once( dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php' );
				//}else{echo 'probleme include class file';}

				if( class_exists( $field_class ) ){
					$field_object = new $field_class( $field, $meta );
					$field_object->render(1);
				}else{
				echo 'pas de class pour ca todo';
				}
			echo '</td>';
		echo '</tr>';	
	}	
}

function olivee_get_sliders( $all = true ) {
	global $xoopsDB;
	$sliders = array( 0 => '-- Select --' );
									$sql31 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 2 ORDER BY conf_id DESC";
									$result31 = $xoopsDB -> query($sql31); 
										while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result31)) {
										$sliders['<{$SLIDER_'.$conf_name.'_'.$conf_id.'}>'] = '<{$SLIDER_'.$conf_name.'_'.$conf_id.'}>';
										}
	
	return $sliders;
}



function olivee_get_menus( $all = true ) {
	global $xoopsDB;

	$menus = array( 0 => '-- Select --' );		
									$sql311 = "SELECT distinct conf_id, conf_name, conf_value FROM " . $xoopsDB -> prefix("config_theme") . " WHERE conf_catid = 1 ORDER BY conf_id DESC";
									$result311 = $xoopsDB -> query($sql311); 
										while (list($conf_id, $conf_name, $conf_value) = $xoopsDB -> fetchRow($result311)) {
										$menus['<{$MENU_'.$conf_name.'_'.$conf_id.'}>'] = '<{$MENU_'.$conf_name.'_'.$conf_id.'}>';
										}
	
	return $menus;
}

function olivee_get_idblock( $all = true ) {
	global $xoopsDB;

	$blocksid = array( 0 => '-- Select --' );		
									$sql3111 = "SELECT distinct bid, name, title FROM " . $xoopsDB -> prefix("newblocks") . " ORDER BY bid ASC";
									$result3111 = $xoopsDB -> query($sql3111); 
										while (list($bid, $name, $title) = $xoopsDB -> fetchRow($result3111)) {
										$blocksid[$bid] = $title;
										}
	
	return $blocksid;

}
	
	
	function olivee_builder_item( $item_std, $item = false ) {
	$item_std['size'] = $item['size'] ? $item['size'] : $item_std['size'];
	$name_type = $item ? 'name="olivee-item-type[]"' : '';
	$name_size = $item ? 'name="olivee-item-size[]"' : '';
	$label = ( $item && key_exists('title', $item['fields']) ) ? $item['fields']['title'] : '';

	$classes = array(
		'1/4' => 'olivee-item-1-4',
		'1/3' => 'olivee-item-1-3',
		'1/2' => 'olivee-item-1-2',
		'2/3' => 'olivee-item-2-3',
		'3/4' => 'olivee-item-3-4',
		'1/1' => 'olivee-item-1-1'
	);
	
	echo '<div class="olivee-item olivee-item-'. $item_std['type'] .' '. $classes[$item_std['size']] .'">';
							
		echo '<div class="olivee-item-content">';
			echo '<input type="hidden" class="olivee-item-type" '. $name_type .' value="'. $item_std['type'] .'">';
			echo '<input type="hidden" class="olivee-item-size" '. $name_size .' value="'. $item_std['size'] .'">';
			echo '<div class="olivee-item-size">';
				echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-size-dec">-</a>';
				echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-size-inc">+</a>';
				echo '<span class="olivee-item-desc">'. $item_std['size'] .'</span>';
			echo '</div>';
			echo '<span class="olivee-item-label">'. $item_std['title'] .' <small>'. $label .'</small></span>';
			echo '<div class="olivee-item-tool">';
				echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-delete">delete</a>';
				echo '<a href="javascript:void(0);" class="olivee-item-btn olivee-item-edit">edit</a>';
			echo '</div>';	
		echo '</div>';
		
		echo '<div class="olivee-item-meta">';
			echo '<table class="form-table">';
				echo '<tbody>';		
		 
					foreach ($item_std['fields'] as $field) {
							
						if( $item && key_exists( $field['id'] , $item['fields'] ) ) {
							$meta = $item['fields'][$field['id']];
						} else {
							$meta = false;
						}
						
						if( ! key_exists('std', $field) ) $field['std'] = false;
						$meta = ( $meta || $meta==='0' ) ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES ));
						
						$field['id'] = 'olivee-items['. $item_std['type'] .']['. $field['id'] .']';	
						if( ! in_array( $item_std['type'], array('tabs') ) ){
							$field['id'] .= '[]';					
						}
						olivee_meta_field_input( $field, $meta );
					}		 
				echo '</tbody>';
			echo '</table>';
		echo '</div>';
	echo '</div>';
}

	$olivee_std_items = array(

		
		// Article box  --------------------------------------------
		'article_box' => array(
			'type' => 'article_box',
			'title' => 'Article box', 
			'size' => '1/4',
			'fields' => array(
		
				array(
					'id' => 'image',
					'type' => 'text',
					'title' => 'Image',
					'sub_desc' => 'Featured Image.',
// 					'desc' => 'Recommended size 380px x 320px.',
				),
				
				array(
					'id' => 'title',
					'type' => 'text',
					'title' => 'Title',
					'sub_desc' => 'Will also be used as the image alternative text.',
				),
						
				array(
					'id' => 'content',
					'type' => 'textarea',
					'title' => 'Content',
					'desc' => 'HTML tags allowed.',
				),
				
				array(
					'id' => 'link_title',
					'type' => 'text',
					'title' => 'Button Text',
					'desc' => 'Button will appear only if this field will be filled.',
				),
				
				array(
					'id' => 'link',
					'type' => 'text',
					'title' => 'Button Link',
					'desc' => 'Button will appear only if this field will be filled.',
				),
				
				array(
					'id' => 'target',
					'type' => 'select',
					'title' => 'Open in new window',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'sub_desc' => 'Open link in a new window.',
					'sub' => 'Adds a target="_blank" attribute to the link.',
				),
				
			)														
		),
		
		// Blockquote --------------------------------------------
		'blockquote' => array(
			'type' => 'blockquote',
			'title' => 'Blockquote', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'textarea',
					'title' => 'Content',
					'sub_desc' => 'Blockquote content.',
					'desc' => 'HTML tags allowed.',
				),
				
				array(
					'id' => 'author',
					'type' => 'text',
					'title' => 'Author',
				),
				
				array(
					'id' => 'link_title',
					'type' => 'text',
					'title' => 'Link title',
					'desc' => 'Link will appear only if this field will be filled.',
				),
				
				array(
					'id' => 'link',
					'type' => 'text',
					'title' => 'Link',
					'desc' => 'Link will appear only if this field will be filled.',
				),	

				array(
					'id' => 'target',
					'type' => 'select',
					'title' => 'Open in new window',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'sub_desc' => 'Open link in a new window.',
					'sub' => 'Adds a target="_blank" attribute to the link.',
				),
				
			),															
		),
		
		
		
		// Code  --------------------------------------------
		'code' => array(
			'type' => 'code',
			'title' => 'Code', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'textarea',
					'title' => 'Content',
					'class' => 'full-width',
					'validate' => 'html',
				),
				
			),															
		),
		
		// Column  --------------------------------------------
		'column' => array(
			'type' => 'column',
			'title' => 'Column', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'textarea',
					'title' => 'Column content',
					'desc' => 'Smarty and HTML tags allowed.',
					'class' => 'full-width',
					'validate' => 'html',
				),

			),															
		),
		
		// Contact box --------------------------------------------
		'contact_box' => array(
			'type' => 'contact_box',
			'title' => 'Contact box', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'title',
					'type' => 'text',
					'title' => 'Title',
				),
					
				array(
					'id' => 'address',
					'type' => 'textarea',
					'title' => 'Address',
					'desc' => 'HTML tags allowed.',
				),
					
				array(
					'id' => 'telephone',
					'type' => 'text',
					'title' => 'Telephone',
				),				
					
				array(
					'id' => 'fax',
					'type' => 'text',
					'title' => 'Fax',
				),				
				
				array(
					'id' => 'email',
					'type' => 'text',
					'title' => 'Email',
				),
				
				array(
					'id' => 'www',
					'type' => 'text',
					'title' => 'WWW',
				),
				
			),															
		),	
		
		// Contact form --------------------------------------------
		'contact_form' => array(
			'type' => 'contact_form',
			'title' => 'Contact form', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'info',
					'type' => 'info',
					'desc' => 'include  Contact Forms on page.'),
				

				array(
					'id' => 'title',
					'type' => 'text',
					'title' => 'Title',
				),
				
				array(
					'id' => 'email',
					'type' => 'text',
					'title' => 'Email',
				),
				
			),															
		),
		
		// Content  --------------------------------------------
		'content' => array(
			'type' => 'content',
			'title' => 'Content', 
			'size' => '1/4',
			'fields' => array(
		
				array(
					'id' => 'info',
					'type' => 'info',
					'desc' => 'Adding this Item will show Content',
				
					
				array(
					'id' => 'inner_padding',
					'type' => 'select',
					'title' => 'Inner horizontal padding',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'std' => 1,
				),
				
				array(
					'id' => 'margin',
					'type' => 'text',
					'title' => 'Margin bottom',
					'desc' => 'px',
					'class' => 'small-text',
					'std' => '30',
				),
				
			),
			),
		),		
		
	
		// Divider  --------------------------------------------
		'divider' => array(
			'type' => 'divider',
			'title' => 'Divider', 
			'size' => '1/1',
			'fields' => array(
		
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'Divider height',
					'desc' => 'px',
					'class' => 'small-text',
				),
				
				array(
					'id' => 'line',
					'type' => 'select',
					'title' => 'Show line',
					'options' => array( 0 => 'No', 1 => 'Yes line simple', 2 => 'Yes line background' ),
					'sub_desc' => 'Display horizontal line as a divider.',
				),
				
			),														
		),	

		// Feature box  --------------------------------------------
		'feature_box' => array(
			'type' => 'feature_box',
			'title' => 'Feature box',
			'size' => '1/4',
			'fields' => array(
	
				array(
					'id' => 'image',
					'type' => 'text',
					'title' => 'Image',
					'sub_desc' => 'Featured Image.',
					'desc' => 'Recommended size 380px x 285px.',
				),
				
				array(
					'id' => 'background',
					'type' => 'select',
					'title' => 'Text Bar color',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'desc' => 'Please choose one of the available colors above. When you use one of our <b>Predefined Skins</b> the colors will be get from the skins css file, but if you use <b>Custom Skin</b> you are able to define your own colors in Theme Options > Colors > Boxes section.',
				),
				
				array(
					'id' => 'title',
					'type' => 'text',
					'title' => 'Title',
					'sub_desc' => 'Will also be used as the image alternative text.',
				),
				
				array(
					'id' => 'link',
					'type' => 'text',
					'title' => 'Link',
				),
				
				array(
					'id' => 'target',
					'type' => 'select',
					'title' => 'Open in new window',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'sub_desc' => 'Open link in a new window.',
					'sub' => 'Adds a target="_blank" attribute to the link.',
				),
		
			),
		),
		
		// Image  --------------------------------------------------
		'image' => array(
			'type' => 'image',
			'title' => 'Image', 
			'size' => '1/4',
			'fields' => array(
		
				array(
					'id' => 'src',
					//'type' => 'upload',
					'type' => 'text',
					'title' => 'Image',
				),
				
				array(
					'id' => 'alt',
					'type' => 'text',
					'title' => 'Alternate Text',
				),
				
				array(
					'id' => 'caption',
					'type' => 'text',
					'title' => 'Caption',
				),
				
				array(
					'id' => 'link',
					'type' => 'text',
					'title' => 'Link',
					'desc' => 'This link will work only if you leave the above "Zoomed image" field empty.',
				),
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'height',
					'desc' => 'Hauteur de l\'image.',
				),
				
				array(
					'id' => 'border',
					'type' => 'select',
					'title' => 'Border',
					'options' => array( 0 => 'No', 1 => 'Yes' ),
					'std' => 1,
				),
				
			),														
		),

		
		// Tabs  --------------------------------------------
		'tabs' => array(
			'type' => 'tabs',
			'title' => 'Tabs', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'tabs',
					'type' => 'tabs',
					'title' => 'Tabs',
					'sub_desc' => 'Manage tabs.',
				),
				
			),															
		),

		
		// Vimeo  --------------------------------------------
		'vimeo' => array(
			'type' => 'vimeo',
			'title' => 'Vimeo', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'video',
					'type' => 'text',
					'title' => 'Vimeo video ID',
					'desc' => 'Its placed in every Vimeo video link after the last /,for example: http://vimeo.com/<b>1084537</b>',
				),
				
				array(
					'id' => 'width',
					'type' => 'text',
					'title' => 'Width',
					'desc' => 'px',
					'class' => 'small-text',
					'std' => 700,
				),
				
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'Height',
					'desc' => 'px',
					'class' => 'small-text',
					'std' => 400,
				),
				
			),															
		),
		
		// YouTube  --------------------------------------------
		'youtube' => array(
			'type' => 'youtube',
			'title' => 'YouTube', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'video',
					'type' => 'text',
					'title' => 'YouTube video ID',
					'desc' => 'Its placed in every YouTube video link after <b>v=</b> parameter, for example: http://www.youtube.com/watch?v=<b>YE7VzlLtp-4</b>',
				),
				
				array(
					'id' => 'width',
					'type' => 'text',
					'title' => 'Width',
					'desc' => 'px',
					'class' => 'small-text',
					'std' => 700,
				),
				
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'Height',
					'desc' => 'px',
					'class' => 'small-text',
					'std' => 420
				),
				
			),															
		),
		
		
		// SOUNDCLOUD  --------------------------------------------
		'soundcloud' => array(
			'type' => 'soundcloud',
			'title' => 'soundcloud', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'url',
					'type' => 'text',
					'title' => 'Soundcloud URL',
					'desc' => 'Enter soundcloud url like http://api.soundcloud.com/tracks/132059039.</b>',
				),
				
				array(
				
					'id' => 'iframe',
					'type' => 'select',
					'title' => 'Show With iframe',
					'desc' => 'Show With iframe.',
					'options' => array('true','false'),
					
					
					
				),
				
				array(
					'id' => 'width',
					'type' => 'text',
					'title' => 'width',
					"std" => '100%',
					'desc' => 'Soundcloud default show width. px',

				),
				
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'height',
					"std" => '166',
					'desc' => 'Soundcloud default show height. px',

				),
				
				
				array(
				
					'id' => 'auto_play',
					'type' => 'select',
					'title' => 'Activer auto_play',
					'desc' => 'Activer auto_play.',
					'options' => array('true','false'),
					
					
					
				),
				
				array(
				
					'id' => 'show_comments',
					'type' => 'select',
					'title' => 'Activer show_comments',
					'desc' => 'Activer show_comments.',
					'options' => array('true','false'),
					
					
					
				),
				
				
				array(
					'id' => 'color',
					'type' => 'text',
					'title' => 'color',
					"std" => '#ff7700',
					'desc' => 'color Soundcloud.',

				),
				
				array(
					'id' => 'theme_color',
					'type' => 'text',
					'title' => 'theme_color',
					"std" => '#ff6699',
					'desc' => 'theme_color Soundcloud',

				),
				
			),															
		),
		
		
		'Blockcolumn' => array(
			'type' => 'Blockcolumn',
			'title' => 'Block Column', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'select',
					'title' => 'Column Content',
					'desc' => 'Select le block column.',
					'options' => array('Left'=>'Left Column', 'Center' => 'Center Column', 'Right'=>'Right Column')

					
					
				),
				
				/////
				array(
					'id' => 'content1',
					'type' => 'select',
					'title' => 'menu Content',
					'desc' => 'Select le menu in block column.',
					'options' => olivee_get_menus(false),
				
				),
				
				array(
					'id' => 'content11',
					'type' => 'select',
					'title' => 'block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				
				array(
					'id' => 'content111',
					'type' => 'select',
					'title' => 'block id in after before',
					'desc' => 'Select le block column in, before, after.',
					'options' => array('in'=>'in Block', 'in'=>'in Block', 'before' => 'before Block', 'after'=>'after Block')
					
					
				),
				
				
				array(
					'id' => 'content2',
					'type' => 'select',
					'title' => 'slider Content',
					'desc' => 'Select le slider in block column.',
					'options' => olivee_get_sliders(false)
					
					
				),
				
								array(
					'id' => 'content22',
					'type' => 'select',
					'title' => 'block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				
				array(
					'id' => 'content222',
					'type' => 'select',
					'title' => 'block id in after before',
					'desc' => 'Select le block column in, before, after.',
					'options' => array('in'=>'in Block', 'before' => 'before Block', 'after'=>'after Block')
					
					
				),
				
				
				/////
				

			),															
		),
		
		'TableBlockcolumn' => array(
			'type' => 'TableBlockcolumn',
			'title' => 'TableBlockcolumn', 
			'size' => '1/1', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'select',
					'title' => 'Column Content',
					'desc' => 'Select le block column.',
					'options' => array('oui'=>'oui', 'no' => 'no')
					
					
				),

			),															
		),
		
		'Slider' => array(
			'type' => 'Slider',
			'title' => 'Slider', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'select',
					'title' => 'Slider Content',
					'desc' => 'Select le Slider.',
					'options' => olivee_get_sliders(false)
					
					
				),

			),															
		),
		
		'Menu' => array(
			'type' => 'Menu',
			'title' => 'Menu', 
			'size' => '1/4', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'select',
					'title' => 'Menu Content',
					'desc' => 'Select le Menu.',
					'options' => olivee_get_menus(false)
					
					
				),

			),															
		),
		
		'xoops_banner' => array(
			'type' => 'xoops_banner',
			'title' => 'xoops_banner', 
			'size' => '1/2', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'select',
					'title' => 'xoops_banner',
					'desc' => 'Select le oui pour insert xoops_banner.',
					'options' => array('oui'=>'oui', 'no' => 'no')
					
					
				),

			),															
		),
		
		
		
		'feed' => array(
			'type' => 'feed',
			'title' => 'feed', 
			'size' => '1/3', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'text',
					'title' => 'feed',
					'desc' => 'le lien rss pour le feed.'
					
				),

			),															
		),		
		
		
		'mapsgoogle' => array(
			'type' => 'mapsgoogle',
			'title' => 'mapsgoogle', 
			'size' => '1/', 
			'fields' => array(
		
				array(
					'id' => 'content',
					'type' => 'text',
					'title' => 'mapsgoogle',
					'desc' => 'le lien maps google embeed like:. https://maps.google.com/?ie=UTF8&t=h&ll=35.371275,10.939379&spn=0.012248,0.018239&z=15&output=embed'
					
				),
				
				array(
					'id' => 'width',
					'type' => 'text',
					'title' => 'width',
					"std" => '100%',
					'desc' => 'mapsgoogle default show width. px',

				),
				
				array(
					'id' => 'height',
					'type' => 'text',
					'title' => 'height',
					"std" => '366',
					'desc' => 'mapsgoogle default show height. px',

				),

			),															
		),	
		
	);
									global $xoopsDB;
									$sqlr = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 3 AND conf_name = 'template'";
									$head_arrl = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlr ) );
									$olivee_tmp_fn = $head_arrl['conf_value'];
									$olivee_items = unserialize($olivee_tmp_fn);

	?>

<link rel="stylesheet" type="text/css" media="all" href="admin/themebuilder/build.css" />
	<script src="admin/themebuilder/overlay.js"></script>
	<!--<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>-->
	<script src="admin/themebuilder/template.js"></script>
	

	<div id="olivee-builder">
	
		<div id="olivee-content">
		
			<div class="olivee-add-item">
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th>
								theme.html builder. Not finished yet!
								<span class="description">Add new item to theme.html</span>
							</th>
							<td>
								<select id="olivee-add-select">
									<option value="">&mdash; Select &mdash;</option>		
									<?php 
										foreach( $olivee_std_items as $item ){
											echo '<option value="'. $item['type'] .'">'. $item['title'] .'</option>';
										}
									?>
								</select>
								<a class="btn-blue olivee-add-btn" href="javascript:void(0);">Add item</a><br>
								<span class="description">Choose an element and click the Add Item button</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
				
			<form id="pass" name="pass" method="post" action="">
			<div id="olivee-items" class="clearfix">
			
				<?php
					foreach( $olivee_std_items as $item )
					{
						olivee_builder_item( $item );
					}
				?>
			</div>

			<div id="olivee-desk" class="clearfix">
			
				<?php
				//var_dump($olivee_items);
					if( is_array($olivee_items) )
					{
						foreach( $olivee_items as $item )
						{
						
							olivee_builder_item( $olivee_std_items[$item['type']], $item );
						}
					}else{
					}
				?>
			
			</div>
			<input type="submit" name="admin" id="admin" value="Update" />
			<input type="submit" name="reset" id="reset" value="Reset" />
		</form>
		</div>
		<div id="olivee-popup">
			<a href="javascript:void(0);" class="olivee-btn-close olivee-popup-close"><em>close</em></a>	
			<a href="javascript:void(0);" class="olivee-popup-save">Save changes</a>	
		</div>
	</div>
		<?php	
	   
	   
	   
	   
        break;		
		
		
		
		
	default:
	/*echo '<a href="admin.php?fct=themebuilder&op=Dashboard"> Dashboard</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Menu"> | Menu</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Slider"> | Slider</a>';
	echo '<a href="admin.php?fct=themebuilder&op=Option"> | Option</a>';
	echo '<a href="admin.php?fct=themebuilder&op=ThemeBuilder"> | Theme Builder</a>';*/
	
	
	
		
        break;
		
}
xoops_cp_footer();

?>