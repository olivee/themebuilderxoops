<?php
require('../config.inc.php');

//config file parsing stuff....
define('ROOTDIR', dirname(__FILE__));
define('LIBDIR', ROOTDIR);
define('CONFIG_FILE', ROOTDIR.'/../config.inc.php');
//define('CE_NEWLINE', "\r\n"); //disable or it compounds the line breaks every time
define('CE_WORDWRAP', 500); //or it will split lines really bad
require_once(LIBDIR.'/confedit.class.php');

require_once('admin.class.php');	

//site array
$site=array();
$site['dashboard']=array("title"=>"Dashboard","c"=>new dashboard);
$site['menu']=array("title"=>"Menu","c"=>new menu);
$site['slider']=array("title"=>"Slider","c"=>new slider);
$site['messages']=array('title'=>'Messages','c'=>new ad_messages);
$site['theme']=array('title'=>'Theme Builder','c'=>new theme_builder);
if(isset($_GET['page']) && !empty($_GET['page']) && array_key_exists($_GET['page'],$site)){$page=$_GET['page'];}else{$page='messages';}//if index of....

function buildMenu($current){
	global $site;
	foreach($site as $key => &$value){
		if($key==$current){
			echo '<strong><a href="cf-admin.php?page='.$key.'">'.$value['title'].'</a></strong> | ';
		}else{
			echo '<a href="cf-admin.php?page='.$key.'">'.$value['title'].'</a> | ';
		}
	}
}
?>

<?php

if (file_exists('../../../mainfile.php')) {  
include('../../../mainfile.php');  
} 

 include XOOPS_ROOT_PATH . '/header.php';
  global $xoopsConfig, $xoopsUser ;	
 if (is_object($xoopsUser)) {
     if (!$xoopsUser->isAdmin(-1)) {
         redirect_header('../../../index.php', 2, _you_must_be_admin);
         exit();
     }
	 	
 } else {
     redirect_header('../../../index.php', 2, _you_must_be_logged);
     exit();
 }
 
 if ($xoopsConfig['theme_set'] != 'maitscocorporate') {

         redirect_header('../../../index.php', 2, _theme_set_must_be_maitscocorporate );
         exit();
    
 } 
 ?>
 <link rel="stylesheet" type="text/css" media="screen" href="cf-admin.css" />
<div id="title"><?php buildMenu($page);?></div>
<div id="main">
    <div id="message">
        <strong><font color=red><?php $site[$page]['c']->init(); $site[$page]['c']->proc(); echo $site[$page]['c']->message;?></font></strong>
    </div>
	<div id="contact-area">
		<?php $site[$page]['c']->gen();?>
        <div style="clear: both;"></div>
	</div>
</div>

<?php include XOOPS_ROOT_PATH . '/footer.php';
?>
</body>
</html>