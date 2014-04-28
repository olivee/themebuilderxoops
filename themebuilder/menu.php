<?php


/*$myArray = array('link' => 'home.php', 'title' => 'index');
$this->assign("foo", $myArray);
//ça marche mais je laisse a coté c'est manuelle et c'est juste pour tester
<{foreach item=main key=key from=$foo name=mainloop}>
<{if $smarty.foreach.mainloop.first}><ul class="sf-menu"><{/if}>

<li><a href="<{$main}>"><{$main}></a>

<{foreach item=sub key=subkey from=$mainn name=subloop}>

<{if $smarty.foreach.subloop.first}><ul><{/if}>

<li><a href="<{$sub}>"><{$sub}></a></li>

<{if $smarty.foreach.subloop.last}></ul><{/if}>

</li>
<{/foreach}>

<{if $smarty.foreach.mainloop.last}></ul><{/if}>

<{/foreach}>

*/



/*$myArray1 = array('link' => 'tttttttt', 'title' => 'zzzzzzzzz');
$this->assign("mainn", $myArray1);

$menu = array(
            array('label' => 'home', 'submenu' =>
                array('label' => 'tunisie',
                    'label1' => 'mahdia',
                    'label2' => 'sousse'
            )),
            array('label' => 'categories', 'submenu' =>
                array('label3' => 'france',
                    'label4' => 'italie',
                    'label5' => 'suisse'
            )),
			array('label' => 'video', 'submenu' =>
                array('label6' => 'mesoued',
                    'label7' => 'charki',
                    'label8' => 'rai'
            )),
			array('label' => 'contact', 'submenu' =>
                array('label9' => 'dar',
                    'label10' => 'post',
                    'label11' => 'tel'
            )),
			array('label' => 'feedback', 'submenu' =>
                array('label12' => 'hhhh',
                    'label13' => 'test',
                    'label14' => 'lab22222el'
            ))
        );
 $this->assign(array('menu' => $menu));
 
 //ça marche aussi mais je laisse a coté c'est juste pour tester
 <ul>        
    <{foreach from=$menu key=k item=elem}>
    <li>
        <div>
            <{$elem.label}>
        </div>
        <ul>
            <{foreach from=$elem.submenu key=label item=text_label}>
                <li><{$text_label}></li>
            <{/foreach}>
        </ul>

    </li>
    <{/foreach}>
</ul>*/
 
 
 
 
 if (file_exists("../../mainfile.php")) {   
include("../../mainfile.php");  
} elseif (file_exists("../../../mainfile.php")) {   
include("../../../mainfile.php");  
} 

 //global $xoopsDB;
/* $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE catmenu=2';
$result10 = $xoopsDB -> query( $sql);
				while($video_arr10 = $xoopsDB -> fetchArray( $result10 )){ 
				$tree[] = $video_arr10;
				}

function formatTree($tree, $parent){
        $tree2 = array();
		
        foreach($tree as $i => $item){
            if($item['parent'] == $parent){
                $tree2[$item['id']] = $item;
                $tree2[$item['id']]['submenu'] = formatTree($tree, $item['id']);
            }
        }
        return $tree2;
    }
 
 $menuhorizontal = formatTree($tree, 0); 
 $this->assign('menuhorizontal',$menuhorizontal);
 
 
 //3eme methode ça marche aussi mais je laisse a coté je prend un autre chemin
 <style>

.sf-menu,.sf-menu * {
        margin: 0;
        padding: 0;
        list-style: none;
}

.sf-menu {
        line-height: 1.0;
}

.sf-menu ul {
        position: absolute;
        top: -999em;
        width: 10em; 
}

.sf-menu ul li {
        width: 100%;
}

.sf-menu li:hover {
        visibility: inherit;
}

.sf-menu li {
        float: left;
        position: relative;
}

.sf-menu a {
        display: block;
        position: relative;
}

.sf-menu li:hover ul,.sf-menu li.sfHover ul {
        left: 0;
        top: 2.5em;
        z-index: 99;
}

ul.sf-menu li:hover li ul,ul.sf-menu li.sfHover li ul {
        top: -999em;
}

ul.sf-menu li li:hover ul,ul.sf-menu li li.sfHover ul {
        left: 10em;
        top: 0;
}

ul.sf-menu li li:hover li ul,ul.sf-menu li li.sfHover li ul {
        top: -999em;
}

ul.sf-menu li li li:hover ul,ul.sf-menu li li li.sfHover ul {
        left: 10em;
        top: 0;
}


.sf-menu {
        float: left;
        margin-bottom: 1em;
}

.sf-menu a {
        border-left: 1px solid #fff;
        border-top: 1px solid #CFDEFF;
        padding: .75em 1em;
        text-decoration: none;
}

.sf-menu a,.sf-menu a:visited {

        color: #13a;
}

.sf-menu li {
        background: #BDD2FF;
}

.sf-menu li li {
        background: #AABDE6;
}

.sf-menu li li li {
        background: #9AAEDB;
}

.sf-menu li:hover,.sf-menu li.sfHover,.sf-menu a:focus,.sf-menu a:hover,.sf-menu a:active
        {
        background: #CFDEFF;
        outline: 0;
}

.sf-menu a.sf-with-ul {
        padding-right: 2.25em;
        min-width: 1px;
}

.sf-sub-indicator {
        position: absolute;
        display: block;
        right: .75em;
        top: 1.05em;
        width: 10px;
        height: 10px;
        text-indent: -999em;
        overflow: hidden;
        background: url('../images/arrows-ffffff.png') no-repeat -10px -100px;

}

a>.sf-sub-indicator {
        top: .8em;
        background-position: 0 -100px;
}

a:focus>.sf-sub-indicator,a:hover>.sf-sub-indicator,a:active>.sf-sub-indicator,li:hover>a>.sf-sub-indicator,li.sfHover>a>.sf-sub-indicator
        {
        background-position: -10px -100px;
}

.sf-menu ul .sf-sub-indicator {
        background-position: -10px 0;
}

.sf-menu ul a>.sf-sub-indicator {
        background-position: 0 0;
}

.sf-menu ul a:focus>.sf-sub-indicator,.sf-menu ul a:hover>.sf-sub-indicator,.sf-menu ul a:active>.sf-sub-indicator,.sf-menu ul li:hover>a>.sf-sub-indicator,.sf-menu ul li.sfHover>a>.sf-sub-indicator
        {
        background-position: -10px 0;
}

.sf-shadow ul {
        background: url('../images/shadow.png') no-repeat bottom right;
        padding: 0 8px 9px 0;
        -moz-border-radius-bottomleft: 17px;
        -moz-border-radius-topright: 17px;
        -webkit-border-top-right-radius: 17px;
        -webkit-border-bottom-left-radius: 17px;
}

.sf-shadow ul.sf-shadow-off {
        background: transparent;
}

</style>

<ul class="sf-menu">        
    <{foreach from=$menuhorizontal key=k item=elem}>
    <li>

				<a href="<{$elem.link}>"><{$elem.label}></a>
			
		<{if $elem.submenu|is_array}>
				<ul>
					<{foreach from=$elem.submenu key=label item=text_label}>
				
						<li><a href="<{$text_label.link}>"><{$text_label.label}></a>
						
							<{if $text_label.submenu|is_array}>
								<ul>
									<{foreach from=$text_label.submenu key=label item=text_labell}>
									
										<li><a href="<{$text_labell.link}>"><{$text_labell.label}></a>
										
											<{if $text_labell.submenu|is_array}>
												<ul>
													<{foreach from=$text_labell.submenu key=label item=text_labelll}>
													
														<li><a href="<{$text_labelll.link}>"><{$text_labelll.label}></a>
																											
															<{if $text_labelll.submenu|is_array}>
															
																<ul>
																	<{foreach from=$text_labelll.submenu key=label item=text_labellll}>
																	
																		<li><a href="<{$text_labellll.link}>"><{$text_labellll.label}></a></li>
																	
																	<{/foreach}>
																</ul>
																
															<{/if}>
															
														</li>
													
													<{/foreach}>
												</ul>	
											<{/if}>
										
										</li>
									
									<{/foreach}>
								</ul>	
							<{/if}>
							
						</li>
					
					<{/foreach}>
				</ul>
		<{/if}>

    </li>
    <{/foreach}>
</ul>

  //j'abandonne je prend un autre chemin pas besoin de ce fichier a supprimer ou bien a l'adapter pour autres fonction a revoir plutard

*/
 
 
 /*

									$sql = "SELECT distinct conf_id, conf_name, conf_catid, conf_value FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 1 ORDER BY conf_id DESC";
									$result = $xoopsDB->query($sql); 
										while (list($conf_id, $conf_name, $conf_catid, $conf_value) = $xoopsDB->fetchRow($result)) {

		if ($conf_value == 'skin1'){




			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
													
													
		}
		
		elseif ($conf_value == 'skin2'){
											
													


			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'skin3'){
											
													


			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'skin4'){
											
													


			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
											
		elseif ($conf_value == 'skin5'){
											
													


			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
										
										}
*/
$local = dirname($_SERVER['PHP_SELF']);
$location     = str_replace('/themes/maitscocorporate/admin', '', $local);

 global $xoopsDB;
	$sql = "SELECT distinct conf_id, conf_name, conf_catid, conf_value, conf_desc, conf_formtype, conf_valuetype, conf_order FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_catid = 1 ORDER BY conf_id DESC";
	$result = $xoopsDB->query($sql); 
	while (list($conf_id, $conf_name, $conf_catid, $conf_value, $conf_desc, $conf_formtype, $conf_valuetype, $conf_order) = $xoopsDB->fetchRow($result)) {

 
				$MENU = 'MENU_' . $conf_name . '_' . $conf_id;
				$arg = $conf_name; 
				$val = $conf_id;
				 

				 $sql = 'SELECT * FROM ' . $xoopsDB -> prefix( 'config_theme_menu' ) . ' WHERE catmenu='.$conf_id.' ORDER BY id ASC';
				$result10 = $xoopsDB -> query( $sql);
				while($video_arr10 = $xoopsDB -> fetchArray( $result10 )){ 
				$tree[$conf_id][] = $video_arr10;
				}

			if (!function_exists('formatTree')) {
				function formatTree($tree, $parent){
						$tree2 = array();
						foreach($tree as $i => $item){
							if($item['parent'] == $parent){
								$tree2[$item['id']] = $item;
								$tree2[$item['id']]['submenu'] = formatTree($tree, $item['id']);
							}
						}
						return $tree2;
					}
				}	
				 
				 $menuhorizontal = formatTree($tree[$conf_id], 0); 

		if ($conf_value == 'skin1'){

		
				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sf-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
					
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						//++++++niveau sous menu 1 ---20 a determiner dans les configurations prochain release
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}				
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}
			$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'skin2'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf2.css" rel="stylesheet" />';
				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin3'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf3.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs3-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}


		if ($conf_value == 'skin4'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf4.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs4-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}


		if ($conf_value == 'skin5'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf5.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="sfs5-menu">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		


///

		if ($conf_value == 'skin10'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal white">';
					foreach($menuhorizontal as $k => $item1){
					
						if(!empty($item1['submenu'])) {									//de skin 10 a skin 19 a faire ce if de sub menu pour afficher la fleche a coté a finir plutard
							${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
						}else{
							${'MENU'.$arg .'_'. $val} .= '<li>
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
						}						
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin11'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal black">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin12'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal red">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin13'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal green">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin14'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="horizontal blue">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		

		
		
				if ($conf_value == 'skin15'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical white">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		if ($conf_value == 'skin16'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical black">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin17'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical red">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin18'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical green">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}	

		if ($conf_value == 'skin19'){

				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf10.css" rel="stylesheet" />';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul class="vertical blue">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="parent">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul>';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul>';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="parent>
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
//////
//////
		if ($conf_value == 'skin20'){

				 if(!empty($menuhorizontal)) {
				// ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf20.css" rel="stylesheet" />';
				 
				// ${'MENU'.$arg .'_'. $val} .= '<link href="http://www.bursa.com.tr/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8" rel="stylesheet" />';

				 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8.1" rel="stylesheet" />';

				 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/blue.skin.css?ver=1.1.0" rel="stylesheet" />';

				 
				/*${'MENU'.$arg .'_'. $val} .= '<div class="container" style="padding:0" >
    <div id="mega_main_menu" class="nav_menu primary icons-disable first-lvl-align-left include-logo no-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="340">
	<div class="menu_inner">
	<span class="nav_logo">
	<a class="logo_link" href="http://www.bursa.com.tr?lang=fr" title="Bursa.com.tr | Tüm Renkleriyle Bursa"><img src="http://test.bursa.com.tr/wp-content/uploads/2013/12/home1.png" alt="Bursa.com.tr | Tüm Renkleriyle Bursa" /></a>
	<a class="mobile_toggle"><span class="mobile_button"><i class="im-icon-menu-3"></i> Menu</span></a>
	</span><!-- /class="nav_logo" -->
	<ul id="mega_main_menu_ul">';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' default_dropdown drop_to_right  submenu_default_width columns2">
								<a href="'.$item1['link'].'">'.$item1['label'].'</a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26594    submenu_default_width columns">
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="dropdown">';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2658594    submenu_default_width columns">
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul></div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>  </div>	';	*/
				}


/////

/*${'MENU'.$arg .'_'. $val} .= '<!--container--->


  <div class="container" style="padding:0" >
    <div id="mega_main_menu" class="nav_menu primary icons-disable first-lvl-align-left include-logo no-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="340">
	<div class="menu_inner">
	<span class="nav_logo">
	<a class="logo_link" href="http://www.bursa.com.tr?lang=fr" title="Bursa.com.tr | Tüm Renkleriyle Bursa"><img src="http://test.bursa.com.tr/wp-content/uploads/2013/12/home1.png" alt="Bursa.com.tr | Tüm Renkleriyle Bursa" /></a>
	<a class="mobile_toggle"><span class="mobile_button"><i class="im-icon-menu-3"></i> Menu</span></a>
	</span><!-- /class="nav_logo" -->
	<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li id="menu-item-26900" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-26900 default_dropdown drop_to_right  submenu_default_width columns2"><a href="/" class=" with_icon"><i class="im-icon-left-to-right"></i> <span><span class="link_text">BURSA HAKKINDA</span></span></a>
<ul class="dropdown">
	<li id="menu-item-26594" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26594    submenu_default_width columns"><a href="http://www.bursa.com.tr/bursanin-tarihi" class=" with_icon"><i class="im-icon-fire"></i> <span><span class="link_text">BURSA&#8217;NIN TARİHİ</span></span></a></li>
	<li id="menu-item-26593" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26593    submenu_default_width columns"><a href="http://www.bursa.com.tr/bursanin-cografyasi-iklimi-ve-nufusu" class=" with_icon"><i class="fa-icon-random"></i> <span><span class="link_text">COĞRAFYA İKLİM NÜFUS</span></span></a></li>
	<li id="menu-item-26622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26622    submenu_default_width columns"><a href="http://www.bursa.com.tr/ilcelerimiz" class=" with_icon"><i class="fa-icon-rss"></i> <span><span class="link_text">İLÇELERİMİZ</span></span></a></li>
	<li id="menu-item-13117" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13117    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/bursa-hakkinda-fr/symboles-de-bursa?lang=fr" class=" with_icon"><i class="im-icon-volume-high"></i> <span><span class="link_text">BURSA&#8217;NIN SİMGELERİ</span></span></a></li>
	<li id="menu-item-26633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26633    submenu_default_width columns"><a href="http://www.bursa.com.tr/ulasim" class=" with_icon"><i class="im-icon-pyramid"></i> <span><span class="link_text">ULAŞIM</span></span></a></li>
	<li id="menu-item-26831" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26831    submenu_default_width columns"><a href="http://www.bursa.com.tr/sanalturlar" class=" with_icon"><i class="im-icon-camera-5"></i> <span><span class="link_text">SANAL TURLAR</span></span></a></li>
	<li id="menu-item-26904" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26904    submenu_default_width columns"><a target="_blank" href="http://bursabuyuksehir.tv" class=" with_icon"><i class="im-icon-lock-5"></i> <span><span class="link_text">VİDEOLAR</span></span></a></li>
	<li id="menu-item-26905" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26905    submenu_default_width columns"><a target="_blank" href="http://fotograf.bursa.com.tr" class=" with_icon"><i class="im-icon-queen"></i> <span><span class="link_text">FOTO GALERİ</span></span></a></li>
	<li id="menu-item-26871" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26871    submenu_default_width columns"><a href="http://www.bursa.com.tr/nobetci-eczaneler" class=" with_icon"><i class="fa-icon-bookmark-empty"></i> <span><span class="link_text">NÖBETÇİ ECZANELER</span></span></a></li>

</ul></li>
<li id="menu-item-13062" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13062 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/activites?lang=fr" class=" with_icon"><i class="fa-icon-star"></i> <span><span class="link_text">ACTIVITES</span></span></a>
<ul class="dropdown">
	<li id="menu-item-26869" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26869    submenu_default_width columns"><a href="http://www.bursa.com.tr/sinemalarda-bu-hafta" class=" with_icon"><i class="im-icon-mouse-4"></i> <span><span class="link_text">SİNEMALARDA BU HAFTA</span></span></a></li>
	<li id="menu-item-13121" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13121    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/centres-commerciaux?lang=fr" class=" with_icon"><i class="im-icon-health"></i> <span><span class="link_text">CENTRES COMMERCIAUX</span></span></a></li>
	<li id="menu-item-13122" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13122    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/tourisme-alternatif?lang=fr" class=" with_icon"><i class="im-icon-storage"></i> <span><span class="link_text">TOURISME ALTERNATIF</span></span></a></li>
	<li id="menu-item-26834" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26834    submenu_default_width columns"><a href="http://www.bursa.com.tr/fuarlar-kongreler-festivaller" class=" with_icon"><i class="im-icon-windows"></i> <span><span class="link_text">FUAR KONGRE FESTİVAL</span></span></a></li>
	<li id="menu-item-26837" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26837    submenu_default_width columns"><a href="http://www.bursa.com.tr/barlar-ve-diskolar" class=" with_icon"><i class="im-icon-eye-2"></i> <span><span class="link_text">BARLAR VE DİSKOLAR</span></span></a></li>
	<li id="menu-item-26838" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-26838    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/lieux-de-loisirs-et-spectacles?lang=fr" class=" with_icon"><i class="im-icon-page-break-2"></i> <span><span class="link_text">LIEUX DE LOISIRS ET SPECTACLES</span></span></a></li>

</ul></li>
<li id="menu-item-13064" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13064 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite?lang=fr" class=" with_icon"><i class="fa-icon-comment"></i> <span><span class="link_text">LIEUX de VISITE</span></span></a>
<ul class="dropdown">
	<li id="menu-item-13129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-13129    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture?lang=fr" class=" with_icon"><i class="im-icon-library"></i> <span><span class="link_text">HISTOIRE ET CULTURE</span></span></a>
	<ul class="dropdown">
		<li id="menu-item-23577" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23577    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/mosquees-et-couvents?lang=fr" class=" disable_icon"><i class="im-icon-stats-2"></i> <span><span class="link_text">MOSQUEES et COUVENTS</span></span></a></li>
		<li id="menu-item-23578" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23578    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/hanlar-ve-carsilar" class=" disable_icon"><i class="im-icon-arrow-left-12"></i> <span><span class="link_text">HANLAR VE ÇARŞILAR</span></span></a></li>
		<li id="menu-item-23579" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23579    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kale-ve-surlar" class=" disable_icon"><i class="im-icon-bubble-up"></i> <span><span class="link_text">KALE VE SURLAR</span></span></a></li>
		<li id="menu-item-23580" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23580    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kaplica-ve-hamamlar" class=" disable_icon"><i class="fa-icon-check-sign"></i> <span><span class="link_text">KAPLICA VE HAMAMLAR</span></span></a></li>
		<li id="menu-item-23581" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23581    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/kopruler" class=" disable_icon"><i class="im-icon-arrow-up-3"></i> <span><span class="link_text">KÖPRÜLER ve DİĞER YAPILAR</span></span></a></li>
		<li id="menu-item-23582" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23582    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/eglises?lang=fr" class=" disable_icon"><i class="im-icon-flip"></i> <span><span class="link_text">EGLISES</span></span></a></li>
		<li id="menu-item-23583" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23583    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/seminaires-islamiques?lang=fr" class=" disable_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">SEMINAIRES ISLAMIQUES</span></span></a></li>
		<li id="menu-item-23584" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23584    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/lieux-de-visite/histoire-et-culture/mausolees?lang=fr" class=" disable_icon"><i class="im-icon-map-2"></i> <span><span class="link_text">MAUSOLEES</span></span></a></li>

	</ul></li>
	<li id="menu-item-13125" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13125    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/musees?lang=fr" class=" with_icon"><i class="im-icon-office"></i> <span><span class="link_text">MUSEES</span></span></a></li>
	<li id="menu-item-13124" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13124    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/activites/centres-culturels-et-artistiques-et-bibliotheques?lang=fr" class=" with_icon"><i class="im-icon-bookmarks"></i> <span><span class="link_text">CENTRES CULTURELS et BIBLIOTHEQUES</span></span></a></li>
	<li id="menu-item-13120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-13120    submenu_default_width columns"><a href="http://www.bursa.com.tr/kategori/bursa-hakkinda-fr/beautes-naurelles?lang=fr" class=" with_icon"><i class="im-icon-direction"></i> <span><span class="link_text">BEAUTES NAURELLES</span></span></a></li>

</ul></li>
<li id="menu-item-23067" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23067 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/kategori/informations-pratiques?lang=fr" class=" with_icon"><i class="im-icon-close-3"></i> <span><span class="link_text">INFORMATIONS PRATIQUES</span></span></a></li>
<li id="menu-item-26326" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26326 default_dropdown drop_to_right  submenu_default_width columns2"><a href="http://www.bursa.com.tr/oteller" class=" with_icon"><i class="fa-icon-sort"></i> <span><span class="link_text">KONAKLAMA</span></span></a></li>
</ul>
	</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>  </div>
  <!--container--->
  ';
  
  
  */
  
  /*
  
  
  	${'MENU'.$arg .'_'. $val} .= '<div class="menu_1">
		<div class="container">
			<div class="navigation">
<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth direction-horizontal responsive-enable mobile_minimized-enable dropdowns_animation-none version-1-1-0 include-logo include-search">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="120">
		<div class="menu_inner">
			<span class="nav_logo">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu" tabindex="1"><img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu" /></a>
				<a class="mobile_toggle"><span class="mobile_button">Menu&nbsp; <span class="symbol_menu">&equiv;</span><span class="symbol_cross">&#x2573;</span></span></a>
			</span><!-- /class="nav_logo" -->
				<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li class="nav_search_box">
	<form method="get" id="mega_main_menu_searchform" action="http://menu.megamain.com/">
		<i class="im-icon-search-3 icosearch"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
		<input type="text" class="field" name="s" id="s" tabindex="1" />
	</form>
	</li><!-- class="nav_search_box" -->
	<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2"><a title="Standard" href="/1" class="item_link  with_icon"><i class="im-icon-checkmark-3"></i> <span><span class="link_text">Standard</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12  default_style   submenu_default_width columns"><a href="/11" class="item_link  with_icon"><i class="fa-icon-fighter-jet"></i> <span><span class="link_text">Lorem ipsum</span></span></a></li>
	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13  default_style   submenu_default_width columns"><a href="/12" class="item_link  with_icon"><i class="im-icon-clipboard-4"></i> <span><span class="link_text">Dolor sit amet</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20  default_style   submenu_default_width columns"><a href="/121" class="item_link  with_icon"><i class="im-icon-history-2"></i> <span><span class="link_text">Ut enim ad minim</span></span></a></li>
		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21  default_style   submenu_default_width columns"><a href="/122" class="item_link  with_icon"><i class="im-icon-google-plus-4"></i> <span><span class="link_text">Veniam</span></span></a>
		<ul class="mega_dropdown">
			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27  default_style   submenu_default_width columns"><a href="/1221" class="item_link  with_icon"><i class="im-icon-rulers"></i> <span><span class="link_text">Duis aute irure</span></span></a></li>
			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28  default_style   submenu_default_width columns"><a href="/1222" class="item_link  with_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">Dolor in reprehenderit</span></span></a></li>
			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29  default_style   submenu_default_width columns"><a href="/1223" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">In voluptate velit</span></span></a></li>

		</ul></li>
		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22  default_style   submenu_default_width columns"><a href="/123" class="item_link  with_icon"><i class="im-icon-file-4"></i> <span><span class="link_text">Quis nostrud</span></span></a></li>
		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23  default_style   submenu_default_width columns"><a href="/124" class="item_link  with_icon"><i class="im-icon-magnet-3"></i> <span><span class="link_text">Exercitation ullamco</span></span></a></li>
		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24  default_style   submenu_default_width columns"><a href="/125" class="item_link  with_icon"><i class="im-icon-seven-segment-1"></i> <span><span class="link_text">Laboris nisi ut</span></span></a></li>
		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25  default_style   submenu_default_width columns"><a href="/126" class="item_link  with_icon"><i class="fa-icon-file-alt"></i> <span><span class="link_text">Aliquip ex ea</span></span></a></li>
		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26  default_style   submenu_default_width columns"><a href="/127" class="item_link  with_icon"><i class="fa-icon-code-fork"></i> <span><span class="link_text">Commodo consequat</span></span></a></li>

	</ul></li>
	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14  default_style   submenu_default_width columns"><a href="/13" class="item_link  with_icon"><i class="im-icon-nbsp"></i> <span><span class="link_text">Consectetur</span></span></a></li>
	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15  default_style   submenu_default_width columns"><a href="/14" class="item_link  with_icon"><i class="im-icon-file-3"></i> <span><span class="link_text">Adipisicing elit</span></span></a></li>
	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16  default_style   submenu_default_width columns"><a href="/15" class="item_link  with_icon"><i class="im-icon-zoom-in"></i> <span><span class="link_text">Sed do eiusmod</span></span></a></li>
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17  default_style   submenu_default_width columns"><a href="/16" class="item_link  with_icon"><i class="im-icon-folder-plus"></i> <span><span class="link_text">Tempor incididunt</span></span></a></li>
	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18  default_style   submenu_default_width columns"><a href="/17" class="item_link  with_icon"><i class="im-icon-spinner-10"></i> <span><span class="link_text">Ut labore et</span></span></a></li>
	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19  default_style   submenu_default_width columns"><a href="/18" class="item_link  with_icon"><i class="im-icon-arrow-4"></i> <span><span class="link_text">Dolore magna aliqua</span></span></a></li>

</ul></li>
<li id="menu-item-121" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-121 multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns2"><a href="/5" class="item_link  with_icon"><i class="im-icon-stats-up"></i> <span><span class="link_text">Promo</span></span></a>
<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">
	<li id="menu-item-122" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-122  default_style   submenu_default_width columns" style="width:50%;"><a href="/51" class="item_link  with_icon"><i class="fa-icon-edit-sign"></i> <span><span class="link_text">Minima veniam</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-123" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-123  default_style   submenu_default_width columns"><a href="/52" class="item_link  with_icon"><i class="fa-icon-resize-vertical"></i> <span><span class="link_text">Quis nostrum</span></span></a></li>
		<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-124  default_style   submenu_default_width columns"><a href="/53" class="item_link  with_icon"><i class="fa-icon-bell"></i> <span><span class="link_text">Exercitationem</span></span></a></li>
		<li id="menu-item-126" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-126  default_style   submenu_default_width columns"><a href="/54" class="item_link  with_icon"><i class="fa-icon-filter"></i> <span><span class="link_text">Ullam corporis</span></span></a></li>
		<li id="menu-item-127" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-127  default_style   submenu_default_width columns"><a href="/55" class="item_link  with_icon"><i class="im-icon-bubble"></i> <span><span class="link_text">Suscipit laboriosam</span></span></a></li>
		<li id="menu-item-128" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-128  default_style   submenu_default_width columns"><a href="/56" class="item_link  with_icon"><i class="im-icon-magnet"></i> <span><span class="link_text">Nisi ut aliquid ex</span></span></a></li>
		<li id="menu-item-129" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-129  default_style   submenu_default_width columns"><a href="/57" class="item_link  with_icon"><i class="fa-icon-beer"></i> <span><span class="link_text">Nulla pariatur</span></span></a></li>

	</ul></li>

</ul></li>
<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30 multicolumn_dropdown additional_style_3 drop_to_right  submenu_full_width columns4"><a href="/2" class="item_link  with_icon"><i class="im-icon-pause-2"></i> <span><span class="link_text">Multi Column</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-31  default_style   submenu_full_width columns" style="width:25%;"><a href="/21" class="item_link  disable_icon"><i class="im-icon-text-color"></i> <span><span class="link_text">Excepteur sint</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-39" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-39  default_style   submenu_full_width columns"><a href="/211" class="item_link  with_icon"><i class="fa-icon-signin"></i> <span><span class="link_text">Unde omnis iste</span></span></a></li>
		<li id="menu-item-40" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40  default_style   submenu_full_width columns"><a href="/212" class="item_link  with_icon"><i class="fa-icon-share-alt"></i> <span><span class="link_text">Natus error sit</span></span></a></li>
		<li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41  default_style   submenu_full_width columns"><a href="/213" class="item_link  with_icon"><i class="im-icon-equalizer-3"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
		<li id="menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42  default_style   submenu_full_width columns"><a href="/214" class="item_link  with_icon"><i class="im-icon-camera-8"></i> <span><span class="link_text">Accusantium</span></span></a></li>

	</ul></li>
	<li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-32  default_style   submenu_full_width columns" style="width:25%;"><a href="/22" class="item_link  disable_icon"><i class="im-icon-busy-3"></i> <span><span class="link_text">Occaecat cupidatat</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43  default_style   submenu_full_width columns"><a href="/221" class="item_link  with_icon"><i class="im-icon-volume-low"></i> <span><span class="link_text">Nemo enim ipsam</span></span></a></li>
		<li id="menu-item-44" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44  default_style   submenu_full_width columns"><a href="/222" class="item_link  with_icon"><i class="im-icon-settings"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
		<li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45  default_style   submenu_full_width columns"><a href="/223" class="item_link  with_icon"><i class="fa-icon-suitcase"></i> <span><span class="link_text">Quia voluptas sit</span></span></a></li>
		<li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46  default_style   submenu_full_width columns"><a href="/224" class="item_link  with_icon"><i class="im-icon-arrow-left-9"></i> <span><span class="link_text">Aspernatur aut</span></span></a></li>

	</ul></li>
	<li id="menu-item-33" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-33  default_style   submenu_full_width columns" style="width:25%;"><a href="/23" class="item_link  disable_icon"><i class="fa-icon-circle-arrow-down"></i> <span><span class="link_text">Non proident</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-47" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47  default_style   submenu_full_width columns"><a href="/231" class="item_link  with_icon"><i class="im-icon-arrow-right-11"></i> <span><span class="link_text">Odit aut fugit</span></span></a></li>
		<li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48  default_style   submenu_full_width columns"><a href="/232" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">Sed quia consequuntur</span></span></a></li>
		<li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49  default_style   submenu_full_width columns"><a href="/233" class="item_link  with_icon"><i class="im-icon-stack-spades"></i> <span><span class="link_text">Magni dolores eos</span></span></a></li>
		<li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50  default_style   submenu_full_width columns"><a href="/234" class="item_link  with_icon"><i class="im-icon-flower"></i> <span><span class="link_text">Qui ratione</span></span></a></li>

	</ul></li>
	<li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34  default_style   submenu_full_width columns" style="width:25%;"><a href="/24" class="item_link  disable_icon"><i class="im-icon-loop-4"></i> <span><span class="link_text">Sunt in culpa</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51  default_style   submenu_full_width columns"><a href="/241" class="item_link  with_icon"><i class="im-icon-quotes-right"></i> <span><span class="link_text">Sequi nesciunt</span></span></a></li>
		<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52  default_style   submenu_full_width columns"><a href="/242" class="item_link  with_icon"><i class="im-icon-libreoffice"></i> <span><span class="link_text">Neque porro</span></span></a></li>
		<li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53  default_style   submenu_full_width columns"><a href="/243" class="item_link  with_icon"><i class="fa-icon-rss"></i> <span><span class="link_text">Quisquam est</span></span></a></li>
		<li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54  default_style   submenu_full_width columns"><a href="/244" class="item_link  with_icon"><i class="im-icon-checkbox-unchecked"></i> <span><span class="link_text">Qui dolorem</span></span></a></li>

	</ul></li>

</ul></li>
<li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72 post_type_dropdown additional_style_4 drop_to_left  submenu_default_width columns8"><a href="http://4" class="item_link  with_icon"><i class="im-icon-bullhorn"></i> <span><span class="link_text">Recent Posts</span></span></a>
<ul class="mega_dropdown">
<li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/118/" class="icon">
				<i class="im-icon-cup-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_22-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cup-2"></i></div><div class="post_title">Et harum quidem rerum facilis</div><div class="post_description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/115/" class="icon">
				<i class="im-icon-cog"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_21-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cog"></i></div><div class="post_title">At vero eos et accusamus</div><div class="post_description">At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/112/" class="icon">
				<i class="im-icon-brightness-medium"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_19-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-brightness-medium"></i></div><div class="post_title">Duis aute irure dolor in</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/109/" class="icon">
				<i class="im-icon-fire-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_18-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-fire-2"></i></div><div class="post_title">Lorem ipsum dolor sit amet</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/106/" class="icon">
				<i class="im-icon-trophy-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_17-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-trophy-2"></i></div><div class="post_title">Sed ut perspiciatis</div><div class="post_description">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/100/" class="icon">
				<i class="im-icon-leaf"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_14-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-leaf"></i></div><div class="post_title">Lorem ipsum dolor sit amet</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/97/" class="icon">
				<i class="im-icon-star-2"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_12-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-star-2"></i></div><div class="post_title">Temporibus autem quibusdam</div><div class="post_description">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/94/" class="icon">
				<i class="im-icon-pencil-3"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_10-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-pencil-3"></i></div><div class="post_title">Et harum quidem rerum facilis</div><div class="post_description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/91/" class="icon">
				<i class="im-icon-twitter"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_09-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-twitter"></i></div><div class="post_title">At vero eos et accusamus</div><div class="post_description">At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/88/" class="icon">
				<i class="im-icon-cord"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_06-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-cord"></i></div><div class="post_title">Quis autem vel eum iure reprehenderit</div><div class="post_description">Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/85/" class="icon">
				<i class="im-icon-crown"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_07-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-crown"></i></div><div class="post_title">Ut enim ad minima veniam</div><div class="post_description">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodiconsequatur</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/82/" class="icon">
				<i class="im-icon-bullhorn"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_01-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-bullhorn"></i></div><div class="post_title">Nemo enim ipsam voluptatem</div><div class="post_description">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/79/" class="icon">
				<i class="im-icon-bug"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_02-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-bug"></i></div><div class="post_title">Sed ut perspiciatis</div><div class="post_description">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/76/" class="icon">
				<i class="fa-icon-beaker"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_03-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="fa-icon-beaker"></i></div><div class="post_title">Duis aute irure dolor</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/73/" class="icon">
				<i class="im-icon-alarm"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_04-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-alarm"></i></div><div class="post_title">Lorem ipsum dolor</div><div class="post_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut...</div></div><!-- /.post_details --></li><!-- /.post_item --><li class="post_item" style="width:12.5%;">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-142x142.jpg" alt="More" title="More" />
		<div class="cover icon">
			<a href="http://menu.megamain.com/1/" class="icon">
				<i class="im-icon-apple"></i>
			</a>
		</div><!-- class="cover icon" -->
	</div><!-- class="processed_image" --><div class="post_details">
	<div class="processed_image">
		<img src="http://menu.megamain.com/wp-content/uploads/2013/10/2009_12_26_15-450x150.jpg" alt="More" title="More" />
	</div><!-- class="processed_image" --><div class="post_icon"><i class="im-icon-apple"></i></div><div class="post_title">Duis aute irure dolor in</div><div class="post_description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim...</div></div><!-- /.post_details --></li><!-- /.post_item -->
</ul></li>
<li id="menu-item-55" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-55 grid_dropdown additional_style_5 drop_to_left  submenu_default_width columns6"><a href="/3" class="item_link  with_icon"><i class="im-icon-grid-5"></i> <span><span class="link_text">Grid</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-56    columns" style="width:16.666666666667%;"><a href="/31" class="item_link  witout_img"><i class="im-icon-clipboard-4"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-clipboard-4"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/56/" title="Quis autem vel">Quis autem vel</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-57    columns" style="width:16.666666666667%;"><a href="/32" class="item_link  witout_img"><i class="im-icon-history-2"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-history-2"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/57/" title="Eum iure">Eum iure</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-58    columns" style="width:16.666666666667%;"><a href="/33" class="item_link  witout_img"><i class="im-icon-google-plus-4"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-google-plus-4"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/58/" title="Reprehenderit">Reprehenderit</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-59" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59    columns" style="width:16.666666666667%;"><a href="/34" class="item_link  witout_img"><i class="im-icon-rulers"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-rulers"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/59/" title="Velit esse">Velit esse</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-64    columns" style="width:16.666666666667%;"><a href="/35" class="item_link  witout_img"><i class="fa-icon-code-fork"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="fa-icon-code-fork"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/64/" title="Quam nihil">Quam nihil</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-65    columns" style="width:16.666666666667%;"><a href="/36" class="item_link  witout_img"><i class="im-icon-link2"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-link2"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/65/" title="Molestiae consequatur">Molestiae consequatur</a></div><div class="post_description">Item description. Sed ut perspiciatis, unde omnis iste natus error sit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-66    columns" style="width:16.666666666667%;"><a href="/37" class="item_link  witout_img"><i class="im-icon-bubble"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-bubble"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/66/" title="Nulla pariatur">Nulla pariatur</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-67" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-67    columns" style="width:16.666666666667%;"><a href="/38" class="item_link  witout_img"><i class="im-icon-pacman"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-pacman"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/67/" title="At vero eos et">At vero eos et</a></div><div class="post_description">Item description. Quis autem vel eum iure reprehenderit, qui in ea voluptate velit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-70" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-70    columns" style="width:16.666666666667%;"><a href="/39" class="item_link  witout_img"><i class="fa-icon-signin"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="fa-icon-signin"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/70/" title="Blanditiis praesentium">Blanditiis praesentium</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>
	<li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68    columns" style="width:16.666666666667%;"><a href="/3-10" class="item_link  witout_img"><i class="im-icon-clipboard-3"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-clipboard-3"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/68/" title="Accusamus et">Accusamus et</a></div><div class="post_description">Item description. Nam libero tempore, cum soluta nobis est eligendi optio, cumque.</div></div><!-- /.post_details --></li>
	<li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69    columns" style="width:16.666666666667%;"><a href="/3-11" class="item_link  witout_img"><i class="im-icon-align-bottom"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-align-bottom"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/69/" title="Iusto odio dignissimos">Iusto odio dignissimos</a></div><div class="post_description">Item description. Ut enim ad minima veniam, quis nostrum exercitationem.</div></div><!-- /.post_details --></li>
	<li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-71    columns" style="width:16.666666666667%;"><a href="/3-12" class="item_link  witout_img"><i class="im-icon-file-powerpoint"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABdJREFUeNpi/P//PwM6YGLAAigUBAgwADZQAwcsn51XAAAAAElFTkSuQmCC" alt="placeholder"/></a><div class="post_details"><div class="post_icon pull-left"><i class="im-icon-file-powerpoint"></i></div><div class="post_title"><a rel="bookmark" href="http://menu.megamain.com/71/" title="Deleniti atque corrupti">Deleniti atque corrupti</a></div><div class="post_description">Item description. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.</div></div><!-- /.post_details --></li>

</ul></li>
<li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137 widgets_dropdown additional_style_6 drop_to_left  submenu_default_width columns2"><a href="/6" class="item_link  with_icon"><i class="im-icon-puzzle"></i> <span><span class="link_text">Widgets</span></span></a>
<ul class="mega_dropdown">
<div id="text-7" class="widget widget_text"><div class="widgettitle">Contact Us</div>			<div class="textwidget"><ul class="contacts"> 
<li><i class="im-icon-envelop"></i><a href="#">info@megamain.com</a><br>
</li>
<li><i class="im-icon-globe"></i><a href="#">www.megamain.com</a><br>
</li>
<li><i class="im-icon-phone"></i>+1 234-567-8000<br>
</li>
<li> <i class="im-icon-office"></i>600 Madison Ave, New York, NY 10022 United States<br>
</li>
</ul> </div>
		</div><div id="text-6" class="widget widget_text"><div class="widgettitle">Find Us</div>			<div class="textwidget"><iframe src="https://mapsengine.google.com/map/u/0/embed?mid=zbHZaCE4IBhk.k16bc0NN63hE" width="100%" height="260"></iframe>
</div>
		</div>
</ul></li>
</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>			</div><!-- /.navigation-->
		</div><!-- class="container" -->
	</div><!-- class="" -->';
  
  
  */
  
  
  
  ${'MENU'.$arg .'_'. $val} .= '<div class="menu_1">
		<div class="container">
			<div class="navigation">
<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth direction-horizontal responsive-enable mobile_minimized-enable version-1-1-0 include-logo include-search dropdowns_animation-anim_5">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="120">
		<div class="menu_inner">
			<span class="nav_logo">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu" tabindex="1"><img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu"></a>
				<a class="mobile_toggle"><span class="mobile_button">Menu&nbsp; <span class="symbol_menu">≡</span><span class="symbol_cross">╳</span></span></a>
			</span><!-- /class="nav_logo" -->
				<ul id="mega_main_menu_ul" class="mega_main_menu_ul">
	<li class="nav_search_box">
	<form method="get" id="mega_main_menu_searchform" action="http://menu.megamain.com/">
		<i class="im-icon-search-3 icosearch"></i>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
		<input type="text" class="field" name="s" id="s" tabindex="1">
	</form>
	</li><!-- class="nav_search_box" -->
	<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2"><a title="Standard" href="/1" class="item_link  with_icon"><i class="im-icon-checkmark-3"></i> <span><span class="link_text">Standard</span></span></a>
<ul class="mega_dropdown">
	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12  default_style   submenu_default_width columns"><a href="/11" class="item_link  with_icon"><i class="fa-icon-fighter-jet"></i> <span><span class="link_text">Lorem ipsum</span></span></a></li>
	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13  default_style   submenu_default_width columns"><a href="/12" class="item_link  with_icon"><i class="im-icon-clipboard-4"></i> <span><span class="link_text">Dolor sit amet</span></span></a>
	<ul class="mega_dropdown">
		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20  default_style   submenu_default_width columns"><a href="/121" class="item_link  with_icon"><i class="im-icon-history-2"></i> <span><span class="link_text">Ut enim ad minim</span></span></a></li>
		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21  default_style   submenu_default_width columns"><a href="/122" class="item_link  with_icon"><i class="im-icon-google-plus-4"></i> <span><span class="link_text">Veniam</span></span></a>
		<ul class="mega_dropdown">
			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27  default_style   submenu_default_width columns"><a href="/1221" class="item_link  with_icon"><i class="im-icon-rulers"></i> <span><span class="link_text">Duis aute irure</span></span></a></li>
			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28  default_style   submenu_default_width columns"><a href="/1222" class="item_link  with_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">Dolor in reprehenderit</span></span></a></li>
			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29  default_style   submenu_default_width columns"><a href="/1223" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">In voluptate velit</span></span></a></li>

		</ul></li>
		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22  default_style   submenu_default_width columns"><a href="/123" class="item_link  with_icon"><i class="im-icon-file-4"></i> <span><span class="link_text">Quis nostrud</span></span></a></li>
		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23  default_style   submenu_default_width columns"><a href="/124" class="item_link  with_icon"><i class="im-icon-magnet-3"></i> <span><span class="link_text">Exercitation ullamco</span></span></a></li>
		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24  default_style   submenu_default_width columns"><a href="/125" class="item_link  with_icon"><i class="im-icon-seven-segment-1"></i> <span><span class="link_text">Laboris nisi ut</span></span></a></li>
		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25  default_style   submenu_default_width columns"><a href="/126" class="item_link  with_icon"><i class="fa-icon-file-alt"></i> <span><span class="link_text">Aliquip ex ea</span></span></a></li>
		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26  default_style   submenu_default_width columns"><a href="/127" class="item_link  with_icon"><i class="fa-icon-code-fork"></i> <span><span class="link_text">Commodo consequat</span></span></a></li>

	</ul></li>
	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14  default_style   submenu_default_width columns"><a href="/13" class="item_link  with_icon"><i class="im-icon-nbsp"></i> <span><span class="link_text">Consectetur</span></span></a></li>
	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15  default_style   submenu_default_width columns"><a href="/14" class="item_link  with_icon"><i class="im-icon-file-3"></i> <span><span class="link_text">Adipisicing elit</span></span></a></li>
	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16  default_style   submenu_default_width columns"><a href="/15" class="item_link  with_icon"><i class="im-icon-zoom-in"></i> <span><span class="link_text">Sed do eiusmod</span></span></a></li>
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17  default_style   submenu_default_width columns"><a href="/16" class="item_link  with_icon"><i class="im-icon-folder-plus"></i> <span><span class="link_text">Tempor incididunt</span></span></a></li>
	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18  default_style   submenu_default_width columns"><a href="/17" class="item_link  with_icon"><i class="im-icon-spinner-10"></i> <span><span class="link_text">Ut labore et</span></span></a></li>
	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19  default_style   submenu_default_width columns"><a href="/18" class="item_link  with_icon"><i class="im-icon-arrow-4"></i> <span><span class="link_text">Dolore magna aliqua</span></span></a></li>

</ul></li>

</ul></li>
</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>			</div><!-- /.navigation-->
		</div><!-- class="container" -->
	</div>';
  

//////

		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'skin21'){

		
			
	//<link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/style.css"><link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/colors/blue.css">
	//<ul><li class="link"><a href="#" class="ico-home" data-title="Home" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-about" data-title="About us" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-services" data-title="Services" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-portfolio" data-title="Portfolio" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-blog" data-title="Blog" ></a></li><li class="separ"></li><li class="link"><a href="#" class="ico-contact" data-title="Contact" ></a></li></ul>
	
		
				 if(!empty($menuhorizontal)) {
				 ${'MENU'.$arg .'_'. $val} .= '<link href="'.$location.'/themes/maitscocorporate/css/cf21.css" rel="stylesheet" />
				 	<link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/style.css"><link rel="stylesheet" href="https://googledrive.com/host/0B8nb-pnqjGo_RmxNeVdHVEF4U00/css/colors/blue.css">

					<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">
					<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">
					
					';

				 
				${'MENU'.$arg .'_'. $val} .= '<ul>';
					foreach($menuhorizontal as $k => $item1){
					
						${'MENU'.$arg .'_'. $val} .= '<li class="link">
								<a href="'.$item1['link'].'" class="'.$item1['icons'].'" data-title="'.$item1['label'].'"></a>
								<li class="separ"></li>';
					
					
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul>	';	
				}




		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}
		
		
		
		
		if ($conf_value == 'mega_menu'){
		
		

				 if(!empty($menuhorizontal)) {
				 $unserialise = unserialize($conf_desc);
				 
				 if ($conf_valuetype > 0){
					${'MENU'.$arg .'_'. $val} .="
							
							 <script type='application/javascript'>
							 jQuery(document).ready(function(){
							jQuery(window).on('scroll', function(){
								menu_holder = jQuery( '#mega_main_menu > .menu_holder' );
								menu_inner = menu_holder.find( '.menu_inner' );
								if ( menu_holder.attr( 'data-sticky' ) == '1' ) {
									stickyoffset = menu_holder.data( 'stickyoffset' ) * 1;
									scrollpath = jQuery(window).scrollTop();
									if ( scrollpath > stickyoffset ) {
										if ( !menu_holder.hasClass( 'sticky_container' ) ) {
											menu_inner_width = menu_inner.width();
											menu_inner.attr( 'style' , 'width:' + menu_inner_width + 'px;' );
											menu_holder.addClass( 'sticky_container' );
										}
									} else {
										menu_holder.removeClass( 'sticky_container' );
										style_attr = jQuery( menu_inner ).attr( 'style' );
										if ( typeof style_attr !== 'undefined' && style_attr !== false ) {
											menu_inner.removeAttr( 'style' );
										}
									}
								} else {
									menu_holder.removeClass( 'sticky_container' );
								}
							});
							});
							</script>
							";
					
				 }else{
				 
					//$stick = 'class="menu_holder"';
				 
				 }
				 
				 
				 

				 //${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/css/cache.skin.css?ver=3.8.1" rel="stylesheet" />';
				if ($unserialise['color'] == 'blue'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/blue.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'green'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/green.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'orange'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/orange.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'depthblue'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/depthblue.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'multicolor'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/multicolor.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'aqua'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/aqua.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'silver'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/silver.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'violet'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/violet.skin.css?ver=1.1.0" rel="stylesheet" />';
					 }elseif ($unserialise['color'] == 'white'){
					 ${'MENU'.$arg .'_'. $val} .= '<link href="http://menu.megamain.com/wp-content/themes/megamainmenu/menu_skins/white.skin.css?ver=1.1.0" rel="stylesheet" />';
				}
				if ($unserialise['stickyoffset'] > 0){
				$datasticky = 'data-sticky="1"';
				}
				
				
				 ${'MENU'.$arg .'_'. $val} .= '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/mega_main_menu.css">';
				 
				 ${'MENU'.$arg .'_'. $val} .= '<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/icomoon.css">
									<link rel="stylesheet" type="text/css" href="/arabesk125/themes/maitscocorporate/css/font-awesome.css">
									
		
	<div class="menu_1">
		<div class="container">
			<div class="navigation">
				<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth '.$unserialise['direction'].' responsive-enable mobile_minimized-enable '.$unserialise['animation'].' version-1-1-0 include-logo include-search">
					<div class="menu_holder" '.$datasticky.' data-stickyoffset="'.$unserialise['stickyoffset'].'">
						<div class="menu_inner">

	<ul id="mega_main_menu_ul" class="mega_main_menu_ul">';
	
		
		foreach($menuhorizontal as $k => $item1){
						
						if ($item1['class'] == 'default_dropdown'){
						//default_dropdown
													
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																									if(!empty($item2['submenu'])) {
																												${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																													foreach($item2['submenu'] as $k2 => $item3){
																															${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																															<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>
																															';
																													
																													
																													${'MENU'.$arg .'_'. $val} .= '</li>	';
																													}
																									
																												${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																									}
																					${'MENU'.$arg .'_'. $val} .= '</li>	';
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					
					



					if ($item1['class'] == 'multicolumn_dropdown_bg'){
						//multicolumn_dropdown with background								
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns3">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																								foreach($item2['submenu'] as $k2 => $item3){
																								
																								${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																								<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>';
																								${'MENU'.$arg .'_'. $val} .= '</li>	';
																								}
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																						}
																					
																					${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					
					
					
					
					
					
			if ($item1['class'] == 'multicolumn_dropdown'){
						//multicolumn_dropdown normal										
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' multicolumn_dropdown additional_style_3 drop_to_right  submenu_default_width columns4">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns">
																						<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> <span><span class="link_text">'.$item2['label'].'</span></span></a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns">
																						<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> <span><span class="link_text">'.$item3['label'].'</span></span></a>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</li>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</ul>	';							
																					}
																					
																				${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}



					if ($item1['class'] == 'grid_dropdown'){		
						//grid_dropdown			
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' grid_dropdown additional_style_4 drop_to_right  submenu_default_width columns5">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){																
																			${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item2['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].' default_style submenu_default_width columns" style="width:16.666666666667%;">
																			<a href="'.$item2['link'].'" class="item_link  with_icon"><i class="'.$item2['icons'].'"></i> </a>';
																						
																						${'MENU'.$arg .'_'. $val} .= '
																						
																						<div class="post_details">
																								<div class="post_icon pull-left"><i class="'.$item2['icons'].'"></i></div>
																								<div class="post_title"><a rel="bookmark" href="'.$item2['link'].'" title="'.$item2['label'].'">'.$item2['label'].'</a></div>
																								<div class="post_description">Item description. '.$item2['label'].'.</div>
																						</div><!-- /.post_details -->
																						
																						
																						</li>	';
																						
																						
																						if(!empty($item2['submenu'])) {

																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item3['id'].'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].' submenu_default_width columns" style="width:16.666666666667%;">
																						<a href="'.$item3['link'].'" class="item_link  with_icon"><i class="'.$item3['icons'].'"></i> </a>';
																						${'MENU'.$arg .'_'. $val} .= '
																						
																						<div class="post_details">
																								<div class="post_icon pull-left"><i class="'.$item3['icons'].'"></i></div>
																								<div class="post_title"><a rel="bookmark" href="'.$item3['link'].'" title="'.$item3['label'].'">'.$item3['label'].'</a></div>
																								<div class="post_description">Item description. '.$item3['label'].'.</div>
																						</div><!-- /.post_details -->
																						
																						
																						</li>	';
																						}
																						
																					}
																					
																			//${'MENU'.$arg .'_'. $val} .= '</li>	';
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';

${'MENU'.$arg .'_'. $val} .= '';

					
					 
					}
			}

			
			






			
	
	${'MENU'.$arg .'_'. $val} .= '
	
												<!--<li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11 default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2">
												<a title="Standard" href="/1" class="item_link  with_icon"><i class="im-icon-checkmark-3"></i> <span><span class="link_text">Standard</span></span></a>
																<ul class="mega_dropdown">
																	<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12  default_style   submenu_default_width columns"><a href="/11" class="item_link  with_icon"><i class="fa-icon-fighter-jet"></i> <span><span class="link_text">Lorem ipsum</span></span></a></li>
																	<li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13  default_style   submenu_default_width columns"><a href="/12" class="item_link  with_icon"><i class="im-icon-clipboard-4"></i> <span><span class="link_text">Dolor sit amet</span></span></a>
																	<ul class="mega_dropdown">
																		<li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20  default_style   submenu_default_width columns"><a href="/121" class="item_link  with_icon"><i class="im-icon-history-2"></i> <span><span class="link_text">Ut enim ad minim</span></span></a></li>
																		<li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21  default_style   submenu_default_width columns"><a href="/122" class="item_link  with_icon"><i class="im-icon-google-plus-4"></i> <span><span class="link_text">Veniam</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27  default_style   submenu_default_width columns"><a href="/1221" class="item_link  with_icon"><i class="im-icon-rulers"></i> <span><span class="link_text">Duis aute irure</span></span></a></li>
																			<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28  default_style   submenu_default_width columns"><a href="/1222" class="item_link  with_icon"><i class="im-icon-temperature-2"></i> <span><span class="link_text">Dolor in reprehenderit</span></span></a></li>
																			<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29  default_style   submenu_default_width columns"><a href="/1223" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">In voluptate velit</span></span></a></li>

																		</ul></li>
																		<li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22  default_style   submenu_default_width columns"><a href="/123" class="item_link  with_icon"><i class="im-icon-file-4"></i> <span><span class="link_text">Quis nostrud</span></span></a></li>
																		<li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23  default_style   submenu_default_width columns"><a href="/124" class="item_link  with_icon"><i class="im-icon-magnet-3"></i> <span><span class="link_text">Exercitation ullamco</span></span></a></li>
																		<li id="menu-item-24" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24  default_style   submenu_default_width columns"><a href="/125" class="item_link  with_icon"><i class="im-icon-seven-segment-1"></i> <span><span class="link_text">Laboris nisi ut</span></span></a></li>
																		<li id="menu-item-25" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25  default_style   submenu_default_width columns"><a href="/126" class="item_link  with_icon"><i class="fa-icon-file-alt"></i> <span><span class="link_text">Aliquip ex ea</span></span></a></li>
																		<li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26  default_style   submenu_default_width columns"><a href="/127" class="item_link  with_icon"><i class="fa-icon-code-fork"></i> <span><span class="link_text">Commodo consequat</span></span></a></li>

																	</ul></li>
																	<li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14  default_style   submenu_default_width columns"><a href="/13" class="item_link  with_icon"><i class="im-icon-nbsp"></i> <span><span class="link_text">Consectetur</span></span></a></li>
																	<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15  default_style   submenu_default_width columns"><a href="/14" class="item_link  with_icon"><i class="im-icon-file-3"></i> <span><span class="link_text">Adipisicing elit</span></span></a></li>
																	<li id="menu-item-16" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-16  default_style   submenu_default_width columns"><a href="/15" class="item_link  with_icon"><i class="im-icon-zoom-in"></i> <span><span class="link_text">Sed do eiusmod</span></span></a></li>
																	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17  default_style   submenu_default_width columns"><a href="/16" class="item_link  with_icon"><i class="im-icon-folder-plus"></i> <span><span class="link_text">Tempor incididunt</span></span></a></li>
																	<li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18  default_style   submenu_default_width columns"><a href="/17" class="item_link  with_icon"><i class="im-icon-spinner-10"></i> <span><span class="link_text">Ut labore et</span></span></a></li>
																	<li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19  default_style   submenu_default_width columns"><a href="/18" class="item_link  with_icon"><i class="im-icon-arrow-4"></i> <span><span class="link_text">Dolore magna aliqua</span></span></a></li>

																</ul>
												</li>














												<li id="menu-item-121" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-121 multicolumn_dropdown additional_style_2 drop_to_right  submenu_default_width columns2">
												<a href="/5" class="item_link  with_icon"><i class="im-icon-stats-up"></i> <span><span class="link_text">Promo</span></span></a>
																<ul class="mega_dropdown" style="background-image:url(http://menu.megamain.com/wp-content/uploads/2013/10/iphone.png);background-repeat:no-repeat;background-attachment:scroll;background-position:center right;background-size:auto 100%;">
																	<li id="menu-item-122" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-122  default_style   submenu_default_width columns" style="width:50%;"><a href="/51" class="item_link  with_icon"><i class="fa-icon-edit-sign"></i> <span><span class="link_text">Minima veniam</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-123" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-123  default_style   submenu_default_width columns"><a href="/52" class="item_link  with_icon"><i class="fa-icon-resize-vertical"></i> <span><span class="link_text">Quis nostrum</span></span></a></li>
																			<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-124  default_style   submenu_default_width columns"><a href="/53" class="item_link  with_icon"><i class="fa-icon-bell"></i> <span><span class="link_text">Exercitationem</span></span></a></li>
																			<li id="menu-item-126" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-126  default_style   submenu_default_width columns"><a href="/54" class="item_link  with_icon"><i class="fa-icon-filter"></i> <span><span class="link_text">Ullam corporis</span></span></a></li>
																			<li id="menu-item-127" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-127  default_style   submenu_default_width columns"><a href="/55" class="item_link  with_icon"><i class="im-icon-bubble"></i> <span><span class="link_text">Suscipit laboriosam</span></span></a></li>
																			<li id="menu-item-128" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-128  default_style   submenu_default_width columns"><a href="/56" class="item_link  with_icon"><i class="im-icon-magnet"></i> <span><span class="link_text">Nisi ut aliquid ex</span></span></a></li>
																			<li id="menu-item-129" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-129  default_style   submenu_default_width columns"><a href="/57" class="item_link  with_icon"><i class="fa-icon-beer"></i> <span><span class="link_text">Nulla pariatur</span></span></a></li>

																		</ul>
																	</li>

																</ul>
												</li>






												<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-30 multicolumn_dropdown additional_style_3 drop_to_right  submenu_full_width columns4"><a href="/2" class="item_link  with_icon"><i class="im-icon-pause-2"></i> <span><span class="link_text">Multi Column</span></span></a>
																	<ul class="mega_dropdown">
																		<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-31  default_style   submenu_full_width columns" style="width:25%;"><a href="/21" class="item_link  disable_icon"><i class="im-icon-text-color"></i> <span><span class="link_text">Excepteur sint</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-39" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-39  default_style   submenu_full_width columns"><a href="/211" class="item_link  with_icon"><i class="fa-icon-signin"></i> <span><span class="link_text">Unde omnis iste</span></span></a></li>
																			<li id="menu-item-40" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40  default_style   submenu_full_width columns"><a href="/212" class="item_link  with_icon"><i class="fa-icon-share-alt"></i> <span><span class="link_text">Natus error sit</span></span></a></li>
																			<li id="menu-item-41" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41  default_style   submenu_full_width columns"><a href="/213" class="item_link  with_icon"><i class="im-icon-equalizer-3"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
																			<li id="menu-item-42" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42  default_style   submenu_full_width columns"><a href="/214" class="item_link  with_icon"><i class="im-icon-camera-8"></i> <span><span class="link_text">Accusantium</span></span></a></li>

																		</ul></li>
																		<li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-32  default_style   submenu_full_width columns" style="width:25%;"><a href="/22" class="item_link  disable_icon"><i class="im-icon-busy-3"></i> <span><span class="link_text">Occaecat cupidatat</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43  default_style   submenu_full_width columns"><a href="/221" class="item_link  with_icon"><i class="im-icon-volume-low"></i> <span><span class="link_text">Nemo enim ipsam</span></span></a></li>
																			<li id="menu-item-44" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-44  default_style   submenu_full_width columns"><a href="/222" class="item_link  with_icon"><i class="im-icon-settings"></i> <span><span class="link_text">Voluptatem</span></span></a></li>
																			<li id="menu-item-45" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45  default_style   submenu_full_width columns"><a href="/223" class="item_link  with_icon"><i class="fa-icon-suitcase"></i> <span><span class="link_text">Quia voluptas sit</span></span></a></li>
																			<li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46  default_style   submenu_full_width columns"><a href="/224" class="item_link  with_icon"><i class="im-icon-arrow-left-9"></i> <span><span class="link_text">Aspernatur aut</span></span></a></li>

																		</ul></li>
																		<li id="menu-item-33" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-33  default_style   submenu_full_width columns" style="width:25%;"><a href="/23" class="item_link  disable_icon"><i class="fa-icon-circle-arrow-down"></i> <span><span class="link_text">Non proident</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-47" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47  default_style   submenu_full_width columns"><a href="/231" class="item_link  with_icon"><i class="im-icon-arrow-right-11"></i> <span><span class="link_text">Odit aut fugit</span></span></a></li>
																			<li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48  default_style   submenu_full_width columns"><a href="/232" class="item_link  with_icon"><i class="im-icon-movie"></i> <span><span class="link_text">Sed quia consequuntur</span></span></a></li>
																			<li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49  default_style   submenu_full_width columns"><a href="/233" class="item_link  with_icon"><i class="im-icon-stack-spades"></i> <span><span class="link_text">Magni dolores eos</span></span></a></li>
																			<li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50  default_style   submenu_full_width columns"><a href="/234" class="item_link  with_icon"><i class="im-icon-flower"></i> <span><span class="link_text">Qui ratione</span></span></a></li>

																		</ul></li>
																		<li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-34  default_style   submenu_full_width columns" style="width:25%;"><a href="/24" class="item_link  disable_icon"><i class="im-icon-loop-4"></i> <span><span class="link_text">Sunt in culpa</span></span></a>
																		<ul class="mega_dropdown">
																			<li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51  default_style   submenu_full_width columns"><a href="/241" class="item_link  with_icon"><i class="im-icon-quotes-right"></i> <span><span class="link_text">Sequi nesciunt</span></span></a></li>
																			<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52  default_style   submenu_full_width columns"><a href="/242" class="item_link  with_icon"><i class="im-icon-libreoffice"></i> <span><span class="link_text">Neque porro</span></span></a></li>
																			<li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53  default_style   submenu_full_width columns"><a href="/243" class="item_link  with_icon"><i class="fa-icon-rss"></i> <span><span class="link_text">Quisquam est</span></span></a></li>
																			<li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54  default_style   submenu_full_width columns"><a href="/244" class="item_link  with_icon"><i class="im-icon-checkbox-unchecked"></i> <span><span class="link_text">Qui dolorem</span></span></a></li>

																		</ul></li>

																	</ul>
												</li>-->
												
												
												

											








	</ul><!-- /class="mega_main_menu_ul" -->
		</div><!-- /class="menu_inner" -->
			</div><!-- /class="menu_holder" -->
				</div><!-- /.mega_main_menu-->
					</div><!-- /.navigation-->
						</div><!-- class="container" -->
							</div><!-- class="menu_1" -->					
					
					
					

				 ';
		/*${'MENU'.$arg .'_'. $val} .= '<div class="menu_1">
		<div class="container">
			<div class="navigation">
<div id="mega_main_menu" class="nav_menu primary_menu icons-left first-lvl-align-left first-lvl-separator-smooth direction-horizontal responsive-enable mobile_minimized-enable version-1-1-0 include-logo include-search dropdowns_animation-anim_5">
	<div class="menu_holder" data-sticky="1" data-stickyoffset="120">
		<div class="menu_inner">
			<span class="nav_logo">
				<a class="logo_link" href="http://menu.megamain.com" title="Mega Main Menu" tabindex="1"><img src="http://menu.megamain.com/wp-content/plugins/mega_main_menu/src/img/megamain-logo-120x120.png" alt="Mega Main Menu"></a>
				<a class="mobile_toggle"><span class="mobile_button">Menu&nbsp; <span class="symbol_menu"></span><span class="symbol_cross"></span></span></a>
			</span><!-- /class="nav_logo" -->
				<ul id="mega_main_menu_ul" class="mega_main_menu_ul">';
					foreach($menuhorizontal as $k => $item1){
													
													
						${'MENU'.$arg .'_'. $val} .= '<li id="menu-item-'.$item1['id'].'" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-'.$item1['id'].' default_dropdown additional_style_1 drop_to_right  submenu_default_width columns2">
								<a title="'.$item1['label'].'" href="'.$item1['link'].'" class="item_link  with_icon"><i class="'.$item1['icons'].'"></i> <span><span class="link_text">'.$item1['label'].'</span></span></a>';
					
																if(!empty($item1['submenu'])) {
																${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																	foreach($item1['submenu'] as $k1 => $item2){
																	
																	
																	
																					${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item2['id'].'    submenu_default_width columns">
																						<a href="'.$item2['link'].'">'.$item2['label'].'</a>';
																						
																						if(!empty($item2['submenu'])) {
																						${'MENU'.$arg .'_'. $val} .= '<ul class="mega_dropdown">';
																						foreach($item2['submenu'] as $k2 => $item3){
																						
																						${'MENU'.$arg .'_'. $val} .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-'.$item3['id'].'    submenu_default_width columns">
																						<a href="'.$item3['link'].'">'.$item3['label'].'</a></li>';
																						
																						
																						${'MENU'.$arg .'_'. $val} .= '</ul>	';
																						}
																						
																					${'MENU'.$arg .'_'. $val} .= '</li>	';							
																					}
																					
																					
																					
																					
																	}			
																	${'MENU'.$arg .'_'. $val} .= '</ul>	';			
																	
																}
						${'MENU'.$arg .'_'. $val} .= '</li>	';								
					 
					}
					${'MENU'.$arg .'_'. $val} .= '</ul></div><!-- /class="menu_inner" -->
	</div><!-- /class="menu_holder" --></div>  </div>	';*/
				}

		$this->assign($MENU, ${'MENU'.$arg .'_'. $val});
		}

/////
/////		
		


////
		
		
 
 }
 //A ajouter next version ++++ de MENU skin et theme ceci est juste pour tester l'output


?>