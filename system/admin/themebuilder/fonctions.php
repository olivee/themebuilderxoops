<?php

function olivee_wajdi( $form ){
	
	if(isset($_POST['admin']) && $_POST['admin'] == $form.'_Update'){
	
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
						//var_dump($item);
						
						}
						if ($item['type'] = 'faq'){
						//var_dump($item);
						
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
														 
														 global $xoopsDB;
														 	$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'cssextra'";
															$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
															$unserialise = unserialize($css_arr['conf_value']);

														 //var_dump($unserialise['fonteffect']);
																$html['html'] = '<{if $xoops_showlblock}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';																
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
																	
																				$html['html'] .= '<div class="blockdiv"> <!-- <{if $xoops_isadmin}>
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin&op=edit&bid=}><{$block.id}>" title="Edit this Block" >
																					<img src="<{$xoops_imageurl}>block/block-edit.png" alt="Edit this Block"></a>&nbsp;
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin&op=delete&bid=}><{$block.id}>" title="Delete this Block" >
																					<img src="<{$xoops_imageurl}>block/block-delete.png" alt="Delete this Block"></a>&nbsp;
																					<a href="<{xoAppUrl /modules/system/admin.php?fct=blocksadmin}>" title="Add New Block" >
																					<img src="<{$xoops_imageurl}>block/block-add.png" alt="Add New Block"></a>
																				<{/if}> -->
																		<{if $block.title}>
																			<div class="blockTitle font-effect-'.$unserialise['fonteffect'].'"><{$block.title}></div>
																		<{/if}>
																		<div class="blockContent"><{$block.content}></div></div>';
																		
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

																$html['html'] .='</div></div>';
																$html['html'] .='<{/if}>';
														}
														if ($item['fields']['content'] == 'Center'){
														
																$html['html'] = '<{if $xoBlocks.page_topleft or $xoBlocks.page_topcenter or $xoBlocks.page_topright or $xoBlocks.page_bottomleft or $xoBlocks.page_bottomright or $xoBlocks.page_bottomcenter or $xoops_contents && ($xoops_contents != " ")}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_centerblocksandcontent.html"}>';
																$html['html'] .='</div></div>';
																$html['html'] .='<{/if}>';
														}

														if ($item['fields']['content'] == 'Right'){
														
																$html['html'] = '<{if $xoops_showrblock}>';
																$html['html'] .= '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_rightblocks.html"}>';
																$html['html'] .='</div></div>';
																$html['html'] .='<{/if}>';																
														}		
							 break;
							 
							case 'divider' :
															$html['html'] =  '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															
															if ($item['fields']['line'] == '0'){
															$html['html'] .=  '<br><hr style="display: none;" /><br>'."\n";
															}elseif($item['fields']['line'] == '1'){
															$html['html'] .=  '<br><hr style="margin: 0 0 '. intval($item['fields']['height']) .'px;'. $line .'" /><br>'."\n";
															}elseif($item['fields']['line'] == '2'){
															$html['html'] .= '<div style="background: url(../images/horizontal_bar.png) no-repeat top center; height: 15px "></div>';
															}
															$html['html'] .= '</div></div>'."\n";
							 break;

							case 'column' :
															if ($item['size'] == '1/4'){
															
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
															if ($item['size'] == '1/3'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
															if ($item['size'] == '1/2'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
															if ($item['size'] == '2/3'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
															if ($item['size'] == '3/4'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
															if ($item['size'] == '2/4'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div>div>'."\n";
															
															
															}
															if ($item['size'] == '1/1'){
															$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
															$html['html'] .= $item['fields']['content'];
															$html['html'] .= '</div></div>'."\n";
															
															
															}
							
							 break;

							case 'Slider' :
							
											$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
											$html['html'] .=  "\n".$item['fields']['content']."\n";
											$html['html'] .=  "\n</div></div>\n";
							 break;

							case 'Menu' :
							//var_dump($item);
								$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
								$html['html'] .=  "\n".$item['fields']['content']."\n";
								$html['html'] .=  "\n</div></div>\n";
							 break;
							 
							 
							 case 'youtube' :
								$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
								$html['html'] .= '<div class="article_video">';
								$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://www.youtube.com/embed/'. $item['fields']['video'] .'?wmode=opaque" frameborder="0" allowfullscreen></iframe>'."\n";
								$html['html'] .= '</div></div></div>';
	
							 
							 break;
							 
							 case 'vimeo' :
						
								$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
								$html['html'] .= '<div class="article_video">';
								$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://player.vimeo.com/video/'. $item['fields']['video'] .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
								$html['html'] .= '</div></div></div>';
	
							 
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
									$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
										$html['html']  .= '<div class="scale-with-grid wp-caption no-hover'. $align . $border .'">';
											$html['html'] .= '<div class="photo">';
												$html['html'] .= '<div class="photo_wrapper">';
													$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['src'] .'" style="height:'. $item['fields']['height'] .'px; width:100%;" alt="'. $item['fields']['alt'] .'" />';
												$html['html'] .= '</div>';
											$html['html'] .= '</div>';
											if( $item['fields']['caption'] ) $html['html'] .= '<p class="wp-caption-text">'. $item['fields']['caption'] .'</p>';
										$html['html'] .= '</div>'."\n";
									$html['html'] .= '</div></div>'."\n";
								}							 
							 
							 break;	
							 
							 
							 case 'feature_box' :
							 
							 
							 	if( $item['fields']['target'] ){
									$target = 'target="_blank"';
								} else {
									$target = false;
								}

								$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
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
								$html['html'] .= '</div></div>'."\n";
							 
							 
							 break;	
							 
							 
							 case 'content' :
							  $html['html'] =  "You are about to live! have a nice time with xoops";
							 break;								 
										
						case 'TableBlockcolumn' :
																$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .''.$item['fields']['content'].' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
																$html['html'] .= '		 <{includeq file="$theme_name/tpl/theme_centerblocksandcontent.html"}>';
																$html['html'] .='</div></div>';
							 break;								 
						
						
						
						case 'blockquote' :
						
													$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
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
													$html['html'] .= '</div></div>'."\n";	
						
						
						
							 break;								 
						
						
						
						case 'code' :
						
											$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
												$html['html']  .= '<div class="inner-padding">';
													$html['html'] .= '<pre>';
														$html['html'] .= htmlspecialchars($item['fields']['content']);
													$html['html'] .= '</pre>'."\n";
												$html['html'] .= '</div>'."\n";
											$html['html'] .= '</div></div>'."\n";	
						
							 break;								 
							 
							 case 'article_box' :

															if( $item['fields']['target'] ){
																$target = 'target="_blank"'; 
															} else { 
																$target = false;
															}
															
														$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
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
														$html['html'] .= '</div></div>'."\n";

							 break;	
							 
							 case 'contact_box' :						 
														$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';							 
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
														$html['html'] .= '</div></div>'."\n";	
							break;	

							case 'contact_form' :
													$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';	
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
													$html['html'] .= '</div></div>'."\n";
							 break;	

							 case 'xoops_banner' :
							 
														if ($item['fields']['content'] == 'oui'){
																$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
																$html['html'] .= '		 <div id="headerbanner"><{$xoops_banner}></div>';
																$html['html'] .='</div></div>';
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
														 $html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';	
												         $html['html'] .=  $ret;
														 $html['html'] .= '</div></div>'."\n";
												     }
							 break;	

							case 'soundcloud' :
													$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
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
													$html['html'] .= '</div></div>'."\n";
							 break;	

						case 'mapsgoogle' :
													if($item['fields']['content'] != ''){
														
														/*$html['html'] =  '<div class="'. $classes[$item['size']] .'">';
														$html['html'] .=  "\n".htmlentities($item['fields']['content'])."\n";
														$html['html'] .=  "\n</div>\n";*/
										
														$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
														$html['html'] .=  '<div class="block_map">
																				<div class="block_general_pic" style="padding:0px;">
																					<iframe width="'.$item['fields']['width'].'" height="'.$item['fields']['height'].'" scrolling="no" marginheight="0" marginwidth="0" src="'.$item['fields']['content'].'" style="color:#0000FF;text-align:left; border:0px solid #ddd; padding:5px; background:#fff;"></iframe>
																				</div>
																			</div>';
														$html['html'] .=  "\n</div></div>\n";
													}
							 break;	
							 
							 case 'Footer':
							 //var_dump($item['fields']);footer-layout
							if($item['fields']['footer-layout'] == 'separated'){
									$html['html'] = '';
							 						$iii = '
										<link rel="stylesheet" type="text/css" href="<{$xoops_url}>/themes/themebuilder/css/font-awesome.css">

<style>
#Footer .copyrights p{text-align:center;float:none;margin-bottom:10px}
#Footer .bottom_addons .social{float:none;text-align:center;}
#Footer .bottom_addons .social li{display:inline-block;float:none;margin: 0 5px 0 0;}
#Footer .copyrights .menu_bottom{float:none;width:100%;text-align:center}
#Footer .copyrights .menu_bottom>ul>li{display:inline-block;float:none}
.footer-included #Footer .container .column .widget{border-right:0}
.offer.offer-no-pager a.Offer_slider_prev, .offer.offer-no-pager a.Offer_slider_next{display:block}
.offer-page .offer-item{width:100%;float:none}
.offer-page .offer-right{width:100%;border:0}
#Footer .container .column{background:none}
#Footer .copyrights{padding-top:20px !important; background: url("./themes/themebuilder/icons/hr.png") repeat-x left top !important;
}
a#back_to_top{}
#Footer {
clear:both;
display: block;
overflow:auto;
border-color: '.$item['fields']['border-footer-frame'].';
border-style: '.$item['fields']['border-footer-style'].';
border-width: '.$item['fields']['border-footer-width'].'px;
background-color: '.$item['fields']['background-footer'].';
}
.containerFooter {
position: relative;
width: 960px;
margin: 0 auto;
padding: 0;
}
.background-footer-col3 {
background-color: blue;
}

</style>							
							
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>
							<footer id="Footer">

	<div class="containerFooter">';
if ($item['fields']['copyright'] !=''){

$copy = $item['fields']['copyright'];

}else{
$copy = '				&copy; Avril 2014 <strong>Olivee</strong>. All Rights Reserved.<br />
				Powered by wajdi <a target="_blank" href="http://arabesk125.net">wajdi</a>. Created by wajdi <a target="_blank" href="http://ffff">oliveeee</a>
';
}
			for( $i = 1; $i <= 4; $i++ ){
					$iii .= '<div class="olivee-item-1-4"><div class="olivee-item-contentdiv">';
						//'.$item['fields']['background-footer-col'. $i].'
						$iii .= '
											<div class="background-footer-col'. $i .'">
											
											<div class="blockdiv">
												<div class="blockTitle"><{block id='.$item['fields']['background-footer-col'. $i].' display="title"}></div>
													<{block id='.$item['fields']['background-footer-col'. $i].'}>
												</div>
											</div>
										';
					$iii .= '</div></div>';

			}

			
////			
			//var_dump($item['fields']);
			$hasrss   = (empty($item['fields']['rss'])) ? false : $item['fields']['rss'];
$hasfacebook    = (empty($item['fields']['facebook'])) ? false : $item['fields']['facebook'];
$hastwitter     = (empty($item['fields']['twitter'])) ? false : $item['fields']['twitter'];
$hasgoogle  = (empty($item['fields']['google-plus'])) ? false : $item['fields']['google-plus'];
$hasvimeo     = (empty($item['fields']['vimeo-square'])) ? false : $item['fields']['vimeo-square'];
$hasflickr      = (empty($item['fields']['flickr'])) ? false : $item['fields']['flickr'];
$hasyoutube     = (empty($item['fields']['youtube'])) ? false : $item['fields']['youtube'];
$haspinterest   = (empty($item['fields']['pinterest'])) ? false : $item['fields']['pinterest'];
$hasdribbble          = (empty($item['fields']['dribbble'])) ? false : $item['fields']['dribbble'];
$haslinkedin    = (empty($item['fields']['linked_in'])) ? false : $item['fields']['linked_in'];

//var_dump ($hasflickr);
// If any of the above social networks are true, sets this to true.
$hassocialnetworks = ( $hasrss || $hasfacebook || $hastwitter || $hasgoogle || $hasvimeo || $hasflickr || $hasyoutube || $haspinterest || $hasdribbble || $haslinkedin ) ? true : false;

if ($hassocialnetworks) {


$social1 = '';

					if ($hasrss) {
						$social1 .= '<li class="rss"><a target="_blank" href="'.$item['fields']['rss'].'" title="Rss"><i class="fa-icon-rss-sign fa-icon-2x"></i></a></li>';
					}
					
					if ($hasfacebook) {
						$social1 .= '<li class="facebook"><a target="_blank" href="'.$item['fields']['facebook'].'" title="Facebook"><i class="fa-icon-facebook-sign fa-icon-2x"></i></a></li>';
					}

					if ($hastwitter) {
					$social1 .= '<li class="twitter"><a target="_blank" href="'.$item['fields']['twitter'].'" title="Twitter"><i class="fa-icon-twitter-sign fa-icon-2x"></i></a></li>';	
					}

					if ($hasgoogle) {
					$social1 .= '<li class="googleplus"><a target="_blank" href="'.$item['fields']['googleplus'].'" title="Google+"><i class="fa-icon-google-plus-sign fa-icon-2x"></i></a></li></a>';
					}

					if ($hasvimeo) {
					$social1 .= '<li class="vimeo"><a target="_blank" href="'.$item['fields']['vimeo-square'].'" title="vimeo"><i class="fa-icon-facetime-video fa-icon-2x"></i></a></li>';
					}

					if ($hasflickr) {
						$social1 .= '<li class="flickr"><a target="_blank" href="'.$item['fields']['flickr'].'" title="Flickr"><i class="fa-icon-flickr fa-icon-2x"></i></a></li></a>';
					}

					if ($hasyoutube) {
						$social1 .= '<li class="youtube"><a target="_blank" href="'.$item['fields']['youtube'].'" title="YouTube"><i class="fa-icon-youtube-sign fa-icon-2x"></i></a></li>';
					}

					if ($hasdribbble) {
						$social1 .= '<li class="dribbble"><a target="_blank" href="'.$item['fields']['dribbble'].'" title="Dribbble"><i class="fa-icon-dribbble fa-icon-2x"></i></a></li>';
					}

					if ($haspinterest) {
						$social1 .= '<li class="pinterest"><a target="_blank" href="'.$item['fields']['pinterest'].'" title="Pinterest"><i class="fa-icon-pinterest-sign fa-icon-2x"></i></a></li>';
					}

					if ($haslinkedin) {
						$social1 .= '<li class="linked_in"><a target="_blank" href="'.$item['fields']['linked_in'].'" title="LinkedIn"><i class="fa-icon-linkedin-sign fa-icon-2x"></i></a></li>';
					}


			
			}

			
			
	//////		
			
			
$iii .= '
	</div>
	
	
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>	
	<div class="containerFooter">
		<div class="olivee-item-1-1 copyrights">
			<p>
'.$copy.'
			</p>
			<div class="menu_bottom">
				menu admin to add todo
			</div>
		</div>
	</div>

	<div class="containerFooter">
		<div class="olivee-item-1-1 bottom_addons">
				<div class="social" style="float: left;">
					<ul>
'.$social1.'
					</ul>
				</div>
				<div class="copyfoot" style="float: right;">
					theme builder xoops olivee wajdi
				</div>
		</div>
	</div>
		
</footer>';
							 
							}elseif ($item['fields']['footer-layout'] == 'included'){
									$iii = '';
							 
//////							 
							$html['html'] = '
										<link rel="stylesheet" type="text/css" href="<{$xoops_url}>/themes/themebuilder/css/font-awesome.css">

<style>
#Footer .copyrights p{text-align:center;float:none;margin-bottom:10px}
#Footer .bottom_addons .social{float:none;text-align:center;}
#Footer .bottom_addons .social li{display:inline-block;float:none;margin: 0 5px 0 0;}
#Footer .copyrights .menu_bottom{float:none;width:100%;text-align:center}
#Footer .copyrights .menu_bottom>ul>li{display:inline-block;float:none}
.footer-included #Footer .container .column .widget{border-right:0}
.offer.offer-no-pager a.Offer_slider_prev, .offer.offer-no-pager a.Offer_slider_next{display:block}
.offer-page .offer-item{width:100%;float:none}
.offer-page .offer-right{width:100%;border:0}
#Footer .container .column{background:none}
#Footer .copyrights{padding-top:20px !important; background: url("./themes/themebuilder/icons/hr.png") repeat-x left top !important;
}
a#back_to_top{}
#Footer {
clear:both;
display: block;
overflow:auto;
border-color: '.$item['fields']['border-footer-frame'].';
border-style: '.$item['fields']['border-footer-style'].';
border-width: '.$item['fields']['border-footer-width'].'px;
background-color: '.$item['fields']['background-footer'].';
}
.containerFooter {
position: relative;
width: 960px;
margin: 0 auto;
padding: 0;
}
.background-footer-col3 {
background-color: blue;
}

</style>							
							
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>
							<footer id="Footer">

	<div class="containerFooter">';
if ($item['fields']['copyright'] !=''){

$copy = $item['fields']['copyright'];

}else{
$copy = '				&copy; Avril 2014 <strong>Olivee</strong>. All Rights Reserved.<br />
				Powered by wajdi <a target="_blank" href="http://arabesk125.net">wajdi</a>. Created by wajdi <a target="_blank" href="http://ffff">oliveeee</a>
';
}
			for( $i = 1; $i <= 4; $i++ ){
					$html['html'] .= '<div class="olivee-item-1-4"><div class="olivee-item-contentdiv">';
						//'.$item['fields']['background-footer-col'. $i].'
						$html['html'] .= '
											<div class="background-footer-col'. $i .'">
												<{block id='.$item['fields']['background-footer-col'. $i].'}>
											</div>	
										';
					$html['html'] .= '</div></div>';

			}

			
////			
			//var_dump($item['fields']);
			$hasrss   = (empty($item['fields']['rss'])) ? false : $item['fields']['rss'];
$hasfacebook    = (empty($item['fields']['facebook'])) ? false : $item['fields']['facebook'];
$hastwitter     = (empty($item['fields']['twitter'])) ? false : $item['fields']['twitter'];
$hasgoogle  = (empty($item['fields']['google-plus'])) ? false : $item['fields']['google-plus'];
$hasvimeo     = (empty($item['fields']['vimeo-square'])) ? false : $item['fields']['vimeo-square'];
$hasflickr      = (empty($item['fields']['flickr'])) ? false : $item['fields']['flickr'];
$hasyoutube     = (empty($item['fields']['youtube'])) ? false : $item['fields']['youtube'];
$haspinterest   = (empty($item['fields']['pinterest'])) ? false : $item['fields']['pinterest'];
$hasdribbble          = (empty($item['fields']['dribbble'])) ? false : $item['fields']['dribbble'];
$haslinkedin    = (empty($item['fields']['linked_in'])) ? false : $item['fields']['linked_in'];

//var_dump ($hasflickr);
// If any of the above social networks are true, sets this to true.
$hassocialnetworks = ( $hasrss || $hasfacebook || $hastwitter || $hasgoogle || $hasvimeo || $hasflickr || $hasyoutube || $haspinterest || $hasdribbble || $haslinkedin ) ? true : false;

if ($hassocialnetworks) {


$social1 = '';

					if ($hasrss) {
						$social1 .= '<li class="rss"><a target="_blank" href="'.$item['fields']['rss'].'" title="Rss"><i class="fa-icon-rss-sign fa-icon-2x"></i></a></li>';
					}
					
					if ($hasfacebook) {
						$social1 .= '<li class="facebook"><a target="_blank" href="'.$item['fields']['facebook'].'" title="Facebook"><i class="fa-icon-facebook-sign fa-icon-2x"></i></a></li>';
					}

					if ($hastwitter) {
					$social1 .= '<li class="twitter"><a target="_blank" href="'.$item['fields']['twitter'].'" title="Twitter"><i class="fa-icon-twitter-sign fa-icon-2x"></i></a></li>';	
					}

					if ($hasgoogle) {
					$social1 .= '<li class="googleplus"><a target="_blank" href="'.$item['fields']['googleplus'].'" title="Google+"><i class="fa-icon-google-plus-sign fa-icon-2x"></i></a></li></a>';
					}

					if ($hasvimeo) {
					$social1 .= '<li class="vimeo"><a target="_blank" href="'.$item['fields']['vimeo-square'].'" title="vimeo"><i class="fa-icon-facetime-video fa-icon-2x"></i></a></li>';
					}

					if ($hasflickr) {
						$social1 .= '<li class="flickr"><a target="_blank" href="'.$item['fields']['flickr'].'" title="Flickr"><i class="fa-icon-flickr fa-icon-2x"></i></a></li></a>';
					}

					if ($hasyoutube) {
						$social1 .= '<li class="youtube"><a target="_blank" href="'.$item['fields']['youtube'].'" title="YouTube"><i class="fa-icon-youtube-sign fa-icon-2x"></i></a></li>';
					}

					if ($hasdribbble) {
						$social1 .= '<li class="dribbble"><a target="_blank" href="'.$item['fields']['dribbble'].'" title="Dribbble"><i class="fa-icon-dribbble fa-icon-2x"></i></a></li>';
					}

					if ($haspinterest) {
						$social1 .= '<li class="pinterest"><a target="_blank" href="'.$item['fields']['pinterest'].'" title="Pinterest"><i class="fa-icon-pinterest-sign fa-icon-2x"></i></a></li>';
					}

					if ($haslinkedin) {
						$social1 .= '<li class="linked_in"><a target="_blank" href="'.$item['fields']['linked_in'].'" title="LinkedIn"><i class="fa-icon-linkedin-sign fa-icon-2x"></i></a></li>';
					}


			
			}

			
			
	//////		
			
			
$html['html'] .= '
	</div>
	
	
<div class="olivee-itemq olivee-itemq-divider olivee-item-1-1"><br><hr style="display: none;" /></div><br>	
	<div class="containerFooter">
		<div class="olivee-item-1-1 copyrights">
			<p>
'.$copy.'
			</p>
			<div class="menu_bottom">
				menu admin to add todo
			</div>
		</div>
	</div>

	<div class="containerFooter">
		<div class="olivee-item-1-1 bottom_addons">
				<div class="social" style="float: left;">
					<ul>
'.$social1.'
					</ul>
				</div>
				<div class="copyfoot" style="float: right;">
					theme builder xoops olivee wajdi
				</div>
		</div>
	</div>
		
</footer>';
}
/////
							 

							 break;
						
						}	
					}
				} 
			}
			
			$count[$type] ++;
			$items[] = $item;
			$html1[] = $html;
		}
//var_dump($html1);

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
	 
									$message = 'you have to choose column block center. obligatoir pour le output php script<br>';
									redirect_header("admin.php?fct=themebuilder&op=ThemeBuilder", 5, $message);
									exit();

}else{
echo 'yes centre block php exist<br>';
	
	global $xoopsDB;
	$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'cssextra'";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );
	$unserialise = unserialize($css_arr['conf_value']);

	$favico = $unserialise['fav_ico'];
	$jsheader = $unserialise['js_header_text_extra'];
	$jsbody = $unserialise['js_body_text_extra'];
	$font_apercu_blockTitle = $unserialise['font_apercu_blockTitle'];
	$favico_img = $unserialise['fav_ico_img'];
	$google_analytique = $unserialise['google_analytique'];
	$facebook_og_admins = $unserialise['facebook_og_admins'];
	$facebook_og_app_id = $unserialise['facebook_og_app_id'];
	
	if($unserialise['fonteffect'] != 'none'){
	$effect = '&effect='.$unserialise['fonteffect'].'';
	}else{$effect = '';}

	if($font_apercu_blockTitle != ''){
	$tttt = '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$unserialise['font_apercu_blockTitle'].''.$effect.'">';
	}
	//var_dump($tttt);
	//var_dump($unserialise['js_header_text_extra']);
	//to add in header or in the footer
	

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
	background: #ddd url(<{$xoops_url}>/themes/themebuilder/icons/up-arrow.png) no-repeat center center;

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
    <meta property="fb:admins" content="'.$facebook_og_admins.'" />
    <meta property="fb:app_id" content="'.$facebook_og_app_id.'" />
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
    <link rel="icon" type="image/png" href="'.$favico_img.'" />

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

</style>
	<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/custom-css.php}>" />
		<!-- Sheet CssEXTRA -->
    <link rel="stylesheet" type="text/css" media="all" title="Style sheet" href="<{xoImgUrl themes/themebuilder/widget-css.css}>" />

'.$scrolltop.'
'.$jsheader.'
'.$tttt.'
 
</head>
<body id="<{$xoops_dirname}>" class="<{$xoops_langcode}>">
<div class="wrapper">
	<p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>

'));
		
		$html12 = array_merge($htm['html'], $html1);
		$ttt = array('gggg' => array('html' => '</div>'.$iii.''.$jsbody.'</body></html>'));		
		$html123 = array_merge($html12, $ttt);

$new = serialize($items);
global $xoopsDB;

$titleexist = " SELECT conf_name FROM " . $xoopsDB -> prefix( 'config_theme' ) . " WHERE conf_name = '" . $form . "'";
					$resultexist = $xoopsDB->query($titleexist);
					$filecount = $xoopsDB -> getRowsNum( $resultexist );

if ($filecount == 0) {
							echo 'insert template '.$form;						
							$sqltemplate = "INSERT INTO " . $xoopsDB -> prefix('config_theme') . " (conf_id, conf_name, conf_value) VALUES ('', '".$form."', '$new')";
							
							if ($resulttemplate = $xoopsDB -> queryF( $sqltemplate)) {
								echo 'insert template '.$form;
							}else{
								echo 'probleme insert template '.$form;
							}
							
}else{	
echo 'update template '.$form;							
							$sqltemplate = "UPDATE " . $xoopsDB -> prefix('config_theme') . " SET conf_value = '".$new."' WHERE conf_name = '".$form."'";

							if ( $resulttemplate = $xoopsDB -> queryF( $sqltemplate ) ) {
							
					$src1 = dirname(__FILE__).'\copythemebuilder';
					$dst11 = str_replace('modules\system\admin\themebuilder\copythemebuilder', 'themes\themebuilder', $src1);
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

						$local = dirname($_SERVER['PHP_SELF']);
						$location = str_replace('modules/system', '', $local);

						$sqlyy = "SELECT * FROM ".$xoopsDB->prefix("modules")." WHERE name != ''";
									$resultyy = $xoopsDB->query($sqlyy);
									$include_theme = '';
								while ( $myrowy = $xoopsDB->fetchArray($resultyy) ) {
									$variable1 = $myrowy['dirname'];
									if ($variable1 == 'system'){
									//continue;
$include_theme .= '<{assign var=theme_name value=$xoTheme->folderName}>
	<{ if $xoops_dirname=="system" }>
	<{if $xoops_requesturi == "'.$location.'index.php" or $xoops_requesturi == "'.$location.'" }>
						<{includeq file="$theme_name/builder_tpl/system_homepage_tpl.html"}>
					<{else}>
						<{includeq file="$theme_name/builder_tpl/default_template_tpl.html"}>
					<{/if}>';				
									}else{
									$include_theme .= '
		<{ elseif $xoops_dirname=="'.$variable1.'" }>
			<{includeq file="$theme_name/builder_tpl/'.$variable1.'_template_tpl.html"}>';	
									}
								}
								$include_theme .= '
	<{else}>
		<{includeq file="$theme_name/builder_tpl/default_template_tpl.html"}>
	<{/if}>';
					echo $form;
					var_dump($form);
													if ($form == 'default_template'){
													$theme_htmlstandard_generated = $dst1.'\theme.html';
													$r = @fopen($theme_htmlstandard_generated, 'w+');
															if ($r) {
																
																	  @fputs($r, $include_theme."\n");
																		
																	
																echo ' <br>"theme.html est a jour';
																	
															  @fclose($r);
															}else{
																echo ' <br>probleme avec fopen theme.html';
															}

													}

								echo 'template enregistré avec succes';
								$fichierthemehtmlamodifier = $dst1.'\builder_tpl\\'.$form.'_tpl.html';
								echo $fichierthemehtmlamodifier;					
								$f = @fopen($fichierthemehtmlamodifier, 'w+');
								$flag = false;
								if ($f) {
//var_dump ( $html123);
										foreach($html123 as $key => $value){
										  @fputs($f, $value['html']."\n");
										  	//var_dump($value['html']);
										}
										
									echo ' <br>"'.$form.'_tpl.html est a jour';
										$flag = true;
								  @fclose($f);
								}else{
									echo ' <br>probleme avec fopen '.$form.'_tpl.html';
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
}						
							
	}//fin if test						
	}
	
if (!function_exists('olivee_meta_field_input')) {
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
					if (file_exists(dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php')) { 
						require_once( dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php' );
						//echo dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php';
					}else{echo 'probleme include class file';}

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
}

if (!function_exists('olivee_get_sliders')) {
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
}

if (!function_exists('olivee_get_menus')) {
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
}

if (!function_exists('olivee_get_idblock')) {
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
}

if (!function_exists('olivee_builder_item')) {
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



	// Footer --------------------------------------------
	'Footer' => array(
		'title' => 'Footer',
		'type' => 'Footer',
		'size' => '1/1',
		'fields' => array(
		
		
		
			array(
					'id' => 'footer-layout',
					'type' => 'select',
					'title' => 'Footer Layout',
					'desc' => 'Select le Footer Layout type.',
					'options' => array ('included' => 'included', 'separated' => 'separated')

				),
				
			/*array(
				'id' => 'footer-layout',
				'type' => 'radio_img',
				'title' => 'Footer Layout',
				'sub_desc' => 'Footer Layout type',
				'options' => array(
					'included' => array('title' => 'Included', 'img' => 'admin/themebuilder/images/1col.png'),
					'separate' => array('title' => 'Separated', 'img' => 'admin/themebuilder/images/footer-separate.png'),
				),
				'std' => 'separate'
			),*/
	
			array(
				'id' => 'copyright',
				'type' => 'textarea',
				'title' => 'Copyright Text',
				'desc' => 'Leave this field blank to show a default copyright.'
			),

			array(
				'id' => 'facebook',
				'type' => 'text',
				'title' => 'facebook acount', 
				'desc' => 'This option works <strong>only</strong> with Footer Layout: Included.',
				'std' => 'fbxoops',
			),
	
			array(
				'id' => 'rss',
				'type' => 'text',
				'title' => 'rss', 
				'desc' => 'This is rss feed.', 
				'std' => 'rssxoops',
			),
			
			array(
				'id' => 'twitter',
				'type' => 'text',
				'title' => 'twitter',
				'desc' => 'This is also twitter acount.',
				'std' => 'twitter xoops',
			),

			array(
				'id' => 'google-plus',
				'type' => 'text',
				'title' => 'google-plus',
				'desc' => 'This is also google-plus acount.',
				'std' => '',
			),
			
			array(
				'id' => 'skype',
				'type' => 'text',
				'title' => 'skype',
				'desc' => 'This is also skype acount.',
				'std' => '',
			),
			
			array(
				'id' => 'vimeo-square',
				'type' => 'text',
				'title' => 'vimeo-square',
				'desc' => 'This is also vimeo-square acount.',
				'std' => '',
			),
			
			array(
				'id' => 'dropbox',
				'type' => 'text',
				'title' => 'twitter',
				'desc' => 'This is also dropbox acount.',
				'std' => 'dropbox xoops',
			),
	
			array(
				'id' => 'flickr',
				'type' => 'text',
				'title' => 'flickr',
				'desc' => 'This is also flickr acount.',
				'std' => '',
			),
			
			array(
				'id' => 'youtube',
				'type' => 'text',
				'title' => 'youtube',
				'desc' => 'This is also youtube acount.',
				'std' => 'youtube',
			),
			
			array(
				'id' => 'pinterest',
				'type' => 'text',
				'title' => 'pinterest',
				'desc' => 'This is also pinterest acount.',
				'std' => '',
			),
			
			array(
				'id' => 'dribbble',
				'type' => 'text',
				'title' => 'dribbble',
				'desc' => 'This is also dribbble acount.',
				'std' => '',
			),
						
			array(
				'id' => 'linked_in',
				'type' => 'text',
				'title' => 'linked_in',
				'desc' => 'This is also linked_in acount.',
				'std' => '',
			),

			array(
				'id' => 'background-footer',
				'type' => 'color',
				'title' => 'Footer background',
				'desc' => 'This option works <strong>only</strong> with Footer Layout: Included.',
				'std' => '#A6A6A6',
				'class' => 'background-footer',
			),

			array(
				'id' => 'border-footer-frame',
				'type' => 'color',
				'title' => 'Borders & frames', 
				'std' => '#e4dddd',
				'class' => 'border-footer-frame',
			),
			
			array(
					'id' => 'border-footer-style',
					'type' => 'select',
					'title' => 'border footer style',
					'desc' => 'Select le border footer style.',
					'options' => array ('none' => 'none', 'solid' => 'solid', 'dashed' => 'dashed', 'dotted' => 'dotted', 'double' => 'double', 'groove' => 'groove', 'ridge' => 'ridge', 'inset' => 'inset', 'outset' => 'outset', 'dotted solid double dashed' => 'dotted solid double dashed', 'dotted solid' => 'dotted solid')
				),
				
				array(
					'id' => 'border-footer-width',
					'type' => 'select',
					'title' => 'border footer width',
					'desc' => 'Select le border footer width.',
					'options' => array ('0', '1', '2','3', '4', '5','6', '7', '8','9', '10', '11','12', '13', '14','15', '16', '17','18', '19', '20','21', '22', '23','24', '25', '26')	
				),

			array(
				'id' => 'color-footer-bold-note',
				'type' => 'color',
				'title' => 'Bold Note text color',
				'desc' => 'This is also twitter acount.',
				'std' => '#2a2f35',
				'class' => 'color-footer-bold-note',
			),
			
			array(
				'id' => 'color-footer-note',
				'type' => 'color',
				'title' => 'Grey Note text color',
				'std' => '#A6A6A6',
				'class' => 'color-footer-note',
			),

			array(
				'id' => 'color-footer-button',
				'type' => 'color',
				'title' => 'Footer Button text color',
				'std' => '#326e9b',
				'class' => 'color-footer-button',
			),

			array(
				'id' => 'color-footer-button-arrow',
				'type' => 'color',
				'title' => 'Footer Button arrow color', 
				'std' => '#9DD3E8',
				'class' => 'color-footer-button-arrow',
			),

			array(
					'id' => 'background-footer-col1',
					'type' => 'select',
					'title' => 'Column 1 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),

				array(
					'id' => 'background-footer-col2',
					'type' => 'select',
					'title' => 'Column 2 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				array(
					'id' => 'background-footer-col3',
					'type' => 'select',
					'title' => 'Column 3 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				array(
					'id' => 'background-footer-col4',
					'type' => 'select',
					'title' => 'Column 4 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				array(
					'id' => 'background-footer-col5',
					'type' => 'select',
					'title' => 'Column 5 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
				),
				array(
					'id' => 'background-footer-col6',
					'type' => 'select',
					'title' => 'Column 6 block ID',
					'desc' => 'Select le id block column.',
					'options' => olivee_get_idblock(false)
					
					
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
									$sqlr = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = '".$form."'";
									$head_arrl = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlr ) );
									$olivee_tmp_fn = $head_arrl['conf_value'];
									$olivee_items = unserialize($olivee_tmp_fn);
									


	?>

<link rel="stylesheet" type="text/css" media="all" href="admin/themebuilder/build.css" />
	<script src="admin/themebuilder/overlay.js"></script>
	<script src="admin/themebuilder/template.js"></script>
	<link rel="stylesheet" href="admin/themebuilder/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder/js/colorpicker.js"></script>
	
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
						<tr>
							<td>

<div class="xo-buttons">

						
					<?php
					
			$sqly = "SELECT * FROM ".$xoopsDB->prefix("modules")." WHERE name != ''";
									$resulty = $xoopsDB->query($sqly);
								while ( $myrow = $xoopsDB->fetchArray($resulty) ) {
									$variable1 = $myrow['dirname'];
										if ($variable1 == 'system'){
												echo '<a class="tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=sytem_siteclosed">
												<img src="http://localhost/arabesk125/modules/' . $variable1 . '/admin/themebuilder/images/xoops_coming_soon.png" style="width:80px; height: 70px;" alt="sytem_siteclosed_template">
												<br><span>siteclosed_template</span>
												</a>
												
												<a class="tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=system_homepage">
												<img src="http://localhost/arabesk125/modules/' . $variable1 . '/admin/themebuilder/images/xoops_front_page.png" style="width:80px; height: 70px;" alt="system_homepage_template">
												<br><span>homepage_template</span>
												</a>
					';
					continue;
										}
														
														//echo $variable1;
												//echo '<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid='.$variable1.'_template"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="'.$variable1.'_template"> '.$variable1.'_template.html</a>';
										if ( file_exists( XOOPS_ROOT_PATH . '/modules/' . $variable1 . '/xoops_version.php' ) ) {
														include XOOPS_ROOT_PATH . '/modules/' . $variable1 . '/xoops_version.php';
														if ($modversion['image']) {
															//echo $modversion['image'];
																			
															#echo '<a class="xo-logonormal tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid='.$variable1.'_template" title="System">
															#	<img src="http://localhost/arabesk125/modules/' . $variable1 . '/'.$modversion['image'].'" alt="System">
															#	 '.$variable1.'_template.html
															#</a>';
																	echo '
																	<a class="tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid='.$variable1.'_template" title="Add some avatars for your <br /> users, they can use this <br /> avatars on them profiles">
																<img src="http://localhost/arabesk125/modules/' . $variable1 . '/'.$modversion['image'].'" style="width:80px; height: 70px;" alt="Add some avatars for your <br /> users, they can use this <br /> avatars on them profiles">
																<br><span>'.$variable1.'_template</span>
															</a>';
														}
													
										}
		
								}
								echo '
																	<a class="tooltip" href="admin.php?fct=themebuilder&op=blockbuilder" title="Add some avatars for your <br /> users, they can use this <br /> avatars on them profiles">
																<img src="http://localhost/arabesk125/modules/system/images/icons/default/block.png" style="width:80px; height: 70px;" alt="Add some avatars for your <br /> users, they can use this <br /> avatars on them profiles">
																<br><span>Block_Builder</span>
															</a>';
					?>
						
<!--
						<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=sytem_siteclosed"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="sytem_siteclosed"> sytem_siteclosed.html</a>
							
							<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=system_homepage"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="system_homepage"> system_homepage.html</a>
							
							<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=mytube_template"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="mytube_template"> mytube_template.html</a>
							
							<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=publisher_template"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="publisher_template"> publisher_template.html</a>
							
							<a class="ui-corner-all tooltip" href="admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=download_template"><img src="http://localhost/arabesk125/modules/system/images/icons/default/edit.png" alt="download_template"> download_template.html</a>
							-->
				    </div>
</div>
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
			
			<input type="submit" name="admin" id="admin" value="<?php echo $form.'_Update'; ?>" />
			<input name="<?php echo $form.'_Reset'; ?>" onclick="location = 'admin.php?fct=themebuilder&op=templetebuilder&templatedelid=<?php echo $form; ?>'" type="button" value="<?php echo $form.'_Reset'; ?>">

		</form>
		</div>
		<div id="olivee-popup">
			<a href="javascript:void(0);" class="olivee-btn-close olivee-popup-close"><em>close</em></a>	
			<a href="javascript:void(0);" class="olivee-popup-save">Save changes</a>	
		</div>
	</div>
		<?php	



}





function themebuilderr () {

		//var_dump($_POST);
				if (isset($_POST['submitextra']) && $_POST['submitextra'] == 'Submit'){
		
		global $xoopsDB;

					$serialise['date_count'] = $_POST['date_count'];	
					$serialise['time_count'] = $_POST['time_count'];
					$serialise['timer_choose'] = $_POST['timer_choose'];
					
					$serialise['background_start'] = $_POST['background_start'];
					$serialise['background_end'] = $_POST['background_end'];
					$serialise['background_style'] = $_POST['background_style'];
					$serialise['background_pattern'] = $_POST['background_pattern'];
					
					$serialise['animation_easing'] = $_POST['animation_easing'];	
					$serialise['google_anl'] = $_POST['google_anl'];
					$serialise['show_logo'] = $_POST['show_logo'];
					$serialise['background_background'] = $_POST['background_background'];
					
					$serialise['social_icon_twitter'] = $_POST['social_icon_twitter'];
					$serialise['social_icon_google-plus'] = $_POST['social_icon_google-plus'];
					$serialise['social_icon_skype'] = $_POST['social_icon_skype'];
					$serialise['social_icon_vimeo-square'] = $_POST['social_icon_vimeo-square'];	
					$serialise['social_icon_facebook'] = $_POST['social_icon_facebook'];
					$serialise['social_icon_dropbox'] = $_POST['social_icon_dropbox'];
					$serialise['social_icon_flickr'] = $_POST['social_icon_flickr'];
					
					$serialise['social_icon_gmail'] = $_POST['social_icon_gmail'];	
					$serialise['social_icon_myspace'] = $_POST['social_icon_myspace'];
					$serialise['social_icon_youtube'] = $_POST['social_icon_youtube'];
					$serialise['social_icon_yahoo'] = $_POST['social_icon_yahoo'];
					$serialise['social_icon_blogger'] = $_POST['social_icon_blogger'];
					$serialise['social_icon_instagram'] = $_POST['social_icon_instagram'];
					$serialise['social_icon_dribbble'] = $_POST['social_icon_dribbble'];
					
					$serialise['social_icon_linkedin'] = $_POST['social_icon_linkedin'];	
					$serialise['social_icon_pinterest'] = $_POST['social_icon_pinterest'];
					$serialise['social_icon_googledrive'] = $_POST['social_icon_googledrive'];
					$serialise['social_icon_spotify'] = $_POST['social_icon_spotify'];
					
					$serialise['social_icon_feedburner'] = $_POST['social_icon_feedburner'];	
					$serialise['social_icon_delicious'] = $_POST['social_icon_delicious'];
					$serialise['social_icon_picasa'] = $_POST['social_icon_picasa'];
					$serialise['social_icon_wordpress'] = $_POST['social_icon_wordpress'];
					$serialise['social_icon_shopify'] = $_POST['social_icon_shopify'];
					$serialise['social_icon_wikipedia'] = $_POST['social_icon_wikipedia'];
					$serialise['social_icon_skydrive'] = $_POST['social_icon_skydrive'];
					
					$serialise['mc_apikey'] = $_POST['mc_apikey'];
					$serialise['mc_listid'] = $_POST['mc_listid'];

					
					
					$serialise['mc_status'] = $_POST['mc_status'];
					$serialise['csv_status'] = $_POST['csv_status'];
					$serialise['err_send'] = $_POST['err_send'];

					$mod = serialize($serialise);
		
		//var_dump($_POST);
		//var_dump($mod);
							//var_dump($serialise);

		
		
	$sqlr = "UPDATE " . $xoopsDB -> prefix( 'config_theme' ) . " SET conf_name ='system_siteclosed', conf_value='$mod' WHERE conf_name = 'system_siteclosed'";
if ( $resultr = $xoopsDB -> queryF( $sqlr ) ) {																
																		$message=""._AM_SYSTEM_THEMEBUILDER_css_EXTRA_modifie."";
																		
					////


//echo '       folder exist';
//var_dump($serialise['show_logo']);
if($serialise['show_logo'] && $serialise['show_logo'] == 'on'){
$logon ='
		<!-- Site logo -->
		<div class="logo show4">
			<img src="<{$xoops_url}>/themes/themebuilder/xoops-logo.png" alt="logo">
		</div>
';
}else{
$logon ='';
}

//var_dump($serialise['background_background']);
if($serialise['background_background'] && $serialise['background_background'] != 'none'){
//$backg = $serialise['background_background'];
$backg = '<img width="1680" height="1260" class="bg-img" src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/'.$serialise['background_background'].'" alt="" />';
}else{
$backg ='';
}

//var_dump($serialise['background_pattern']);
if($serialise['background_pattern'] && $serialise['background_pattern'] == 'none'){
$backk ='background: none;';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern1'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat1.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern2'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat2.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern3'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat3.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern4'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat4.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern5'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat5.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern6'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat6.png"); background-repeat: repeat;
';
}elseif($serialise['background_pattern'] && $serialise['background_pattern'] == 'pattern7'){
$backk ='background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat7.png"); background-repeat: repeat;
';
}


$hasfacebook    = (empty($serialise['social_icon_facebook'])) ? false : $serialise['social_icon_facebook'];
$hastwitter     = (empty($serialise['social_icon_twitter'])) ? false : $serialise['social_icon_twitter'];
$hasgoogle  = (empty($serialise['social_icon_google-plus'])) ? false : $serialise['social_icon_google-plus'];
$hasskype       = (empty($serialise['social_icon_skype'])) ? false : $serialise['social_icon_skype'];
$hasvimeo     = (empty($serialise['social_icon_vimeo-square'])) ? false : $serialise['social_icon_vimeo-square'];
$hasdropbox     = (empty($serialise['social_icon_dropbox'])) ? false : $serialise['social_icon_dropbox'];
$hasflickr      = (empty($serialise['social_icon_flickr'])) ? false : $serialise['social_icon_flickr'];
$hasgmail    = (empty($serialise['social_icon_gmail'])) ? false : $serialise['social_icon_gmail'];
$hasmyspace     = (empty($serialise['social_icon_myspace'])) ? false : $serialise['social_icon_myspace'];
$hasyoutube     = (empty($serialise['social_icon_youtube'])) ? false : $serialise['social_icon_youtube'];
$hasyahoo     = (empty($serialise['social_icon_yahoo'])) ? false : $serialise['social_icon_yahoo'];
$hasblogger     = (empty($serialise['social_icon_blogger'])) ? false : $serialise['social_icon_blogger'];
$hasinstagram   = (empty($serialise['social_icon_instagram'])) ? false : $serialise['social_icon_instagram'];
$hasdribbble          = (empty($serialise['social_icon_dribbble'])) ? false : $serialise['social_icon_dribbble'];
$haslinkedin    = (empty($serialise['social_icon_linkedin'])) ? false : $serialise['social_icon_linkedin'];
$haspinterest   = (empty($serialise['social_icon_pinterest'])) ? false : $serialise['social_icon_pinterest'];
$hasgoogledrive       = (empty($serialise['social_icon_googledrive'])) ? false : $serialise['social_icon_googledrive'];
$hasspotify     = (empty($serialise['social_icon_spotify'])) ? false : $serialise['social_icon_spotify'];
$hasfeedburner     = (empty($serialise['social_icon_feedburner'])) ? false : $serialise['social_icon_feedburner'];
$hasdelicious     = (empty($serialise['social_icon_delicious'])) ? false : $serialise['social_icon_delicious'];
$haspicasa      = (empty($serialise['social_icon_picasa'])) ? false : $serialise['social_icon_picasa'];
$haswordpress          = (empty($serialise['social_icon_wordpress'])) ? false : $serialise['social_icon_wordpress'];
$hasshopify   = (empty($serialise['social_icon_shopify'])) ? false : $serialise['social_icon_shopify'];
$haswikipedia   = (empty($serialise['social_icon_wikipedia'])) ? false : $serialise['social_icon_wikipedia'];
$hasskydrive     = (empty($serialise['social_icon_skydrive'])) ? false : $serialise['social_icon_skydrive'];


// If any of the above social networks are true, sets this to true.
$hassocialnetworks = ( $hasfacebook || $hastwitter || $hasgoogle || $hasskype || $hasvimeo || $hasdropbox || $hasflickr || $hasgmail || $hasmyspace || $hasyoutube || $hasyahoo || $hasblogger || $hasinstagram || $hasdribbble || $haslinkedin || $haspinterest || $hasgoogledrive || $hasspotify || $hasfeedburner || $hasdelicious || $haspicasa || $haswordpress || $hasshopify || $haswikipedia || $hasskydrive ) ? true : false;

if ($hassocialnetworks) {

$sociallll = '';
					if ($hasfacebook) {
						$sociallll .= '<a href="'.$serialise['social_icon_facebook'].'"><span class="icon-facebook"></span></a>';
					}

					if ($hastwitter) {
					$sociallll .= '<a href="'.$serialise['social_icon_twitter'].'"><span class="icon-twitter"></span></a>';	
					}

					if ($hasgoogle) {
					$sociallll .= '<a href="'.$serialise['social_icon_google-plus'].'"><span class="icon-google"></span></a>';
					}

					if ($hasskype) {
					
					$sociallll .= '<a href="'.$serialise['social_icon_skype'].'"><span class="icon-skype"></span></a>';
						
					}

					if ($hasvimeo) {
					$sociallll .= '<a href="'.$serialise['social_icon_vimeo'].'"><span class="icon-vimeo"></span></a>';
					}

					if ($hasdropbox) {
					$sociallll .= '<a href="'.$serialise['social_icon_dropbox'].'"><span class="icon-dropbox"></span></a>';	
					}

					if ($hasflickr) {
						$sociallll .= '<a href="'.$serialise['social_icon_flickr'].'"><span class="icon-flickr"></span></a>';
					}

					if ($hasgmail) {
						$sociallll .= '<a href="'.$serialise['social_icon_gmail'].'"><span class="icon-gmail"></span></a>';
					}

					if ($hasmyspace) {
						$sociallll .= '<a href="'.$serialise['social_icon_myspace'].'"><span class="icon-myspace"></span></a>';
					}

					if ($hasyoutube) {
						$sociallll .= '<a href="'.$serialise['social_icon_youtube'].'"><span class="icon-youtube"></span></a>';
					}

					if ($hasyahoo) {
						$sociallll .= '<a href="'.$serialise['social_icon_yahoo'].'"><span class="icon-yahoo"></span></a>';
					}

					if ($hasblogger) {
						$sociallll .= '<a href="'.$serialise['social_icon_blogger'].'"><span class="icon-blogger"></span></a>';
					}

					if ($hasinstagram) {
						$sociallll .= '<a href="'.$serialise['social_icon_instagram'].'"><span class="icon-instagram"></span></a>';
					}

					if ($hasdribbble) {
						$sociallll .= '<a href="'.$serialise['social_icon_dribbble'].'"><span class="icon-dribbble"></span></a>';
					}

					if ($haslinkedin) {
						$sociallll .= '<a href="'.$serialise['social_icon_linkedin'].'"><span class="icon-linkedin"></span></a>';
					}

					if ($haspinterest) {
						$sociallll .= '<a href="'.$serialise['social_icon_pinterest'].'"><span class="icon-pinterest"></span></a>';
					}

					if ($hasgoogledrive) {
						$sociallll .= '<a href="'.$serialise['social_icon_googledrive'].'"><span class="icon-googledrive"></span></a>';
					}

					if ($hasspotify) {
						$sociallll .= '<a href="'.$serialise['social_icon_spotify'].'"><span class="icon-spotify"></span></a>';
					}

					if ($hasfeedburner) {
						$sociallll .= '<a href="'.$serialise['social_icon_feedburner'].'"><span class="icon-feedburner"></span></a>';
					}
					
					if ($hasdelicious) {
						$sociallll .= '<a href="'.$serialise['social_icon_delicious'].'"><span class="icon-delicious"></span></a>';
					}

					if ($haspicasa) {
						$sociallll .= '<a href="'.$serialise['social_icon_picasa'].'"><span class="icon-picasa"></span></a>';
					}

					if ($haswordpress) {
						$sociallll .= '<a href="'.$serialise['social_icon_wordpress'].'"><span class="icon-wordpress"></span></a>';
					}

					if ($hasshopify) {
						$sociallll .= '<a href="'.$serialise['social_icon_shopify'].'"><span class="icon-shopify"></span></a>';
					}

					if ($haswikipedia) {
						$sociallll .= '<a href="'.$serialise['social_icon_wikipedia'].'"><span class="icon-wikipedia"></span></a>';
					}

					if ($hasskydrive) {
						$sociallll .= '<a href="'.$serialise['social_icon_skydrive'].'"><span class="icon-skydrive"></span></a>';
					}

			
			}




if($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer1'){
$timer_extra = '';
$timer ='			<!-- Section Count --> 
			<section class="six columns hide-for-small section-count vcenter show1">
				<div id="count" class="count text-center vcenter">
	
					<div class="dig-days">
						<div class="desc-day dark" data-localize="count.days">Days</div>
						<div id="dig-days" class="light"><span>{d100}</span><span>{d10}</span><span>{d1}</span></div> 
					</div>
					
					<div class="dig-hours">
						<span id="dig-hours" class="light show2">{hnn}</span>
						<div class="desc-time dark show3" data-localize="count.hours">Hours</div>
					</div>
					
					<div class="dig-delim light show2">:</div>
					
					<div class="dig-mins">
						<span id="dig-mins" class="light show2">{mnn}</span>
						<div class="desc-time dark show3" data-localize="count.mins">Minutes</div>
					</div>
					
					<div class="dig-delim light show2">:</div>
					
					<div class="dig-sec">
						<span id="dig-sec" class="light show2">{snn}</span>
						<div class="desc-time dark show3" data-localize="count.sec">Seconds</div>
					</div>

				</div>
			</section>
			<!-- End Section Count -->
			
			
			
						<!-- Section Name -->
			<section class="six columns text-center border section-name vcenter- show1">
				<div class="vcenter">
					
					<!-- Header -->
					<h1 class="header show3">
						<span class="light" data-localize="name.name_light">Theme Builder ZoooooopS</span>
					</h1>
					<h2 class="soon show3">
						<span class="dark" data-localize="name.name_dark">Coming soon</span>
					</h2>
					<!-- End Header -->
						
					<!-- Small Count. Show if widdh screen is less than 768px -->
					<div id="count-small" class="twelve count-small text-center hide show-for-small">
						<span class="dark">{dnn}</span>:<span class="light">{hnn}</span>:<span class="dark">{mnn}</span>:<span class="light">{snn}</span>
					</div>
						
					<!-- Description -->
					<article class="light desc show3" data-localize="name.desc">
						Very soon, our site will be open to visitors,
						we hope for your patience and understanding.
					</article>
					<!-- End Description -->

					<!-- Subscribe -->
					<div class="subscribe nine columns centered show4">
						<h3 class="dark" data-localize="name.subscribe.header">Stay tuned!</h3>
						<form id="subscribe-form" class="subscribe-form ">
							<div class="row collapse">
								<div class="eight columns">
									<div id="success"></div>
									<input type="email" class="email-subscribe" name="subscribe" data-localize="name.subscribe.row_input" id="email-subscribe" maxlength="60" placeholder="Please enter your email..."/>
								</div>
								<div class="four columns">
									<button id="send-mail" type="submit" class="button secondary expand postfix" ><span class="butlabel" data-localize="name.subscribe.subscribe">Notify</span><span class="spinner"></span></button>
								</div>
							</div>
						</form>
						
						<form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
						
					</div>
					<!-- End Subscribe -->
				</div>
			</section>
			<!-- End Section Name -->
			
			
		</div>
		<!-- End Main container -->
';
}elseif($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer2'){

$pieces = explode("/", $serialise['date_count']);
$pieces1 = explode(":", $serialise['time_count']);

$timer_extra = '';
$timer ='		
			
			<!--<script language="Javascript" type="text/javascript" src="http://wp-parkit.solostreamsites.com/wp-content/themes/wp-parkit101/js/jquery-1.4.1.js"></script>-->
        
        <script type="text/javascript" src="http://wp-parkit.solostreamsites.com/wp-content/themes/wp-parkit101/js/jquery.lwtCountdown-1.0.js"></script> 
		<!--<link href="http://wp-parkit.solostreamsites.com/wp-content/themes/wp-parkit101/style.css" rel="stylesheet" type="text/css" />-->
		<style>
		#timercontainer {
	position:relative;
	float:left;
	width: 980px;
	margin-bottom:25px;
}
#timer_dashboard {
	position:relative;
	height: 110px;
	width:630px;
	margin:0 auto;
}
.dash {
	width: 110px;
	height: 114px;
	background: transparent url(http://wp-parkit.solostreamsites.com/wp-content/themes/wp-parkit101/images/dash.png) 0 0 no-repeat;
	float: left;
	margin-left: 20px;
	position: relative;
}
.dash .digit {
	font-size: 55pt;
	font-weight: bold;
	float: left;
	width: 55px;
	text-align: center;
	font-family: Times;
	position: relative;
}
.dash_title {
	position: absolute;
	width: 110px;
	display: block;
	bottom: -3px;
	right:0;
	font-size: 10px;
	font-weight:bold;
	letter-spacing: 2px;
	text-align:center;
}




		</style>

<script type="text/javascript">
			jQuery(document).ready(function() {
				$("#timer_dashboard").countDown({
					targetDate: {
						"day": 		'.$pieces[1].',
						"month": 	'.$pieces[0].',
						"year": 	'.$pieces[2].',
						"hour": 	'.$pieces1[0].',
						"min": 		'.$pieces1[1].',
						"sec": 		0					}
				});
			});
		</script>
<br><br>
		 
	<div id="timercontainer">

		<div id="timer_dashboard">
			<div class="dash weeks_dash" style="margin:0;">
				<span class="dash_title">Weeks</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash days_dash">
				<span class="dash_title" data-localize="count.days">Days</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash">
				<span class="dash_title" data-localize="count.hours">Hours</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash">
				<span class="dash_title" data-localize="count.mins">Minutes</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash">
				<span class="dash_title" data-localize="count.sec">Seconds</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

		</div>
		<!-- Countdown dashboard end -->

	
	</div>
	
	
				<!-- Section Name -->
			<section class="six columns text-center section-name vcenter- show1" style= "width: 100%">
				<div class="vcenter">
					
					<!-- Header -->
					<h1 class="header show3">
						<span class="light" data-localize="name.name_light">Theme Builder ZoooooopS</span>
					</h1>
					<h2 class="soon show3">
						<span class="dark" data-localize="name.name_dark">Coming soon</span>
					</h2>
					<!-- End Header -->
						
					<!-- Small Count. Show if widdh screen is less than 768px -->
					<div id="count-small" class="twelve count-small text-center hide show-for-small">
						<span class="dark">{dnn}</span>:<span class="light">{hnn}</span>:<span class="dark">{mnn}</span>:<span class="light">{snn}</span>
					</div>
						
					<!-- Description -->
					<article class="light desc show3" data-localize="name.desc">
						Very soon, our site will be open to visitors,
						we hope for your patience and understanding.
					</article>
					<!-- End Description -->

					<!-- Subscribe -->
					<div class="subscribe nine columns centered show4">
						<h3 class="dark" data-localize="name.subscribe.header">Stay tuned!</h3>
						<form id="subscribe-form" class="subscribe-form ">
							<div class="row collapse">
								<div class="eight columns">
									<div id="success"></div>
									<input type="email" class="email-subscribe" name="subscribe" data-localize="name.subscribe.row_input" id="email-subscribe" maxlength="60" placeholder="Please enter your email..."/>
								</div>
								<div class="four columns">
									<button id="send-mail" type="submit" class="button secondary expand postfix" ><span class="butlabel" data-localize="name.subscribe.subscribe">Notify</span><span class="spinner"></span></button>
								</div>
							</div>
						</form>
						
						<form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
						
					</div>
					<!-- End Subscribe -->
				</div>
			</section>
			<!-- End Section Name -->
			
			
		</div>
		<!-- End Main container -->

';
}



$value['html'] = '



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">
<head>
<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />
<meta http-equiv="content-language" content="<{$xoops_langcode}>" />
<title><{$sitename}></title>
<!--<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_url}>/xoops.css" />
<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_themecss}>" />-->



		<!-- The Styles -->
		<link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/css/foundation.min.css" type="text/css">
		<!--<link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/css/style.css" type="text/css">-->
	
		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/favicon.ico">
		<link rel="apple-touch-icon" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/touch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/touch-icon-ipad.png">


		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/modernizr.custom.79408.js" type="text/javascript"></script>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery-1.10.2.min.js"><\/script>")</script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery-ui-1.10.1.custom.min.js"></script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery.foundation.reveal.js" type="text/javascript"></script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery.localize.js" type="text/javascript"></script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/jquery.countdown.min.js" type="text/javascript" ></script>
		<script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/js/custom.js" type="text/javascript"></script>

<style>


@charset "UTF-8";
html, body {
	margin:0;
}

/* http://www.google.com/webfonts/specimen/Aldrich */
@font-face {
    font-family: "AldrichRegular";
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/aldrich-regular-webfont.eot");
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/aldrich-regular-webfont.eot?#iefix") format("embedded-opentype"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/aldrich-regular-webfont.woff") format("woff"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/aldrich-regular-webfont.ttf") format("truetype"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/aldrich-regular-webfont.svg#AldrichRegular") format("svg");
    font-weight: normal;
    font-style: normal;

}

/* http://www.google.com/webfonts/specimen/Roboto */
@font-face {
    font-family: "RobotoThin";
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/Roboto-Thin-webfont.eot");
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/Roboto-Thin-webfont?#iefix") format("embedded-opentype"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/Roboto-Thin-webfont.woff") format("woff"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/Roboto-Thin-webfont.ttf") format("truetype"),
         url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/Roboto-Thin-webfont.svg#RobotoThin") format("svg");
    font-weight: 400;
    font-style: normal;
}

/* ==========================================================================
   Main style
   ========================================================================== */


.bg{
    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    z-index: -1;
 	background: '.$serialise['background_star'].';
	background: -moz-linear-gradient(top, '.$serialise['background_star'].' 0%, '.$serialise['background_end'].' 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$serialise['background_star'].'), color-stop(100%,'.$serialise['background_end'].'));
	background: -webkit-linear-gradient(top, '.$serialise['background_star'].' 0%,'.$serialise['background_end'].' 100%);
	background: -o-linear-gradient(top, '.$serialise['background_star'].' 0%,'.$serialise['background_end'].' 100%);
	background: -ms-linear-gradient(top, '.$serialise['background_star'].' 0%,'.$serialise['background_end'].' 100%);
	background: linear-gradient(to bottom, '.$serialise['background_star'].' 0%,'.$serialise['background_end'].' 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$serialise['background_star'].'", endColorstr="'.$serialise['background_end'].'",GradientType=0 );
}

.bg:after{
	content: "";
	position: absolute;
	width: 100%;
	height: 100%;
	top:0px;
	left: 0px;
	opacity: 0.2;
	'.$backk.'
}


}
.no-svg .bg:after{
	background:url("../img/ie8.png") repeat;
}
.no-svg #svgbg{
	display: none;
}


.success,
.desc,.lang,
.error small, 
small.error,
.soon,.header,
.desc-day,.f,
.desc-time,h3,
.reveal-modal a{
	font-family: "RobotoThin", sans-serif;
}

.logo{
	position: relative;
	width: 100%;
	text-align: center;
}

.light{
	color:#fff;
	text-shadow:
    0px 0px 0px #c0c0c0,
    0px 0px 0px #b0b0b0,
    0px 0px 0px #a0a0a0,
    0px 0px 0px #909090,
    0px 1px 3px rgba(0, 0, 0, 0.4);
	opacity:0.8;
}

.dark{
	color: #000;
	text-shadow:
    0px 0px 0px #555555,
    0px 0px 0px #454545,
    0px 0px 0px #353535,
    0px 0px 0px #252525,
    0px 1px 3px rgba(0, 0, 0, 0.4);
}

.section-count,.section-name{
	margin:45px 0px;
	padding:0 10px;
	min-height:300px;
}

/* 
 * Count style
 */
.count{
	width: 389px;
	margin:0px auto;
	height:240px;
}

.count-small{
	font-weight: bold; 
	font-size: 4em;
	padding:10px 0px;
	margin:20px 0;
	border-top:2px solid #fff;
	border-bottom:2px solid #fff;
	font-family: "AldrichRegular", sans-serif;
}

.dig-days span,.dig-hours span, .dig-mins span, .dig-sec span,.dig-delim{
	text-align: center;
	display:block;
	font-family: "AldrichRegular", sans-serif;
}

.dig-days span{
	height: 150px;
	width:115px;
	text-align: center;
	float:left;
	font-size: 11em;	
}
.dig-hours span, .dig-mins span, .dig-sec span{
	width: 95px;
	height: 60px;
	font-size: 4.5em;
}

.dig-hours, .dig-mins, .dig-sec, .dig-delim{
	float:left;
	margin-right:10px;
}

.dig-delim{
	width:20px;
	height: 60px;
	font-size: 4.5em;	
} 

.desc-day{
	width: 30px;
 	float:left;
	font-size: 3em;
	padding:0px;
	margin:90px 0 0 0;
	text-transform:uppercase;
	-webkit-transform: rotate(-90deg);
	   -moz-transform: rotate(-90deg);
         -o-transform: rotate(-90deg);
    writing-mode: tb-rl;
	font-weight: bold; 
}

 .desc-day{
	margin:20px 20px 0 0\9;

} 
.desc-time{
	height:5px;
	text-align: center;
	font-size: 1.5em;
	padding:3px;
}

/* 
 * Name style
 */
.header,.soon{
	font-size: 3.7em;
	font-weight: bold;
	margin:10px 0 10px;
}
h2{
	font-size: 2em;
	text-align:center;
}
.soon{
	text-transform:uppercase;
	font-weight: bold;
}
.border {
	border-left:4px solid #fff;
}
.desc{
	margin:10px 0;
	font-size: 1.5em;
	line-height:1.5;
	opacity:0.8;
}
h3{
	font-size: 1.5em;
	font-weight: normal;
}
.subscribe input{
	border-color: rgb(204,204,204);
	background-color: rgba(255,255,255, 0.2);
}
::-webkit-input-placeholder { 
    color:    #484848;
}
:-moz-placeholder { 
    color:    #000;
}
::-moz-placeholder { 
    color:    #000;
}
:-ms-input-placeholder {
    color:    #484848;
}

#success {
	margin: 2px;
	position:absolute;
	width:99.5%;
}

button, .button {
	padding: 9px 20px 10px;
	cursor: pointer;
	font-weight: normal;
	text-decoration: none;
	text-align: center;
	display: inline-block;
	overflow: hidden;
	-webkit-box-shadow: none;
		    box-shadow: none; 
}
button:hover, button:focus, .button:hover, .button:focus {
	-webkit-box-shadow: none;
		    box-shadow: none;
}

.button.secondary{
	border: 1px solid #fff;
}
.button .spinner {
  position: absolute;
  width: 16px;
  height: 16px;
  left: 50%;
  margin-left: -8px;
  opacity: 0;
  top: 8px;
  background-image: url( data:image/gif;base64,R0lGODlhEAAQAIQAAAQCBGxubKSipLy6vISGhDw6PMTGxJSWlLSytCwuLMTCxIyKjFxaXMzKzJyanLS2tNDQ0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJCQAQACwAAAAAEAAQAAAFcyAkjsaDGGMKNQpqIsjajg2M1LaRi4o96KceTCHSCR4o0k7UMCRThhlksFg8VKQHckEgLLCiF4LrBUNsCKrVDEw+DgOsICAYPRj460gA6NchB3gMBw4FBQ4BfQABYYIIBQkJBXx+IwgHMZCSEHN/WIWHWCEAIfkECQkAEAAsAAAAABAAEACEBAIEhIKErKqsvL68XFpctLK0xMbELC4sjI6MFBIUhIaErK6sxMLEZGJktLa0zMrM0NDQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABXYgJI6GUxhjCj0Mai7O2o7PUhRPYTv1jUKMhbBlMgR1DFHOl8rZHqSZivUrOX4qCCKRQLxiWUgCAEjcYGExOVE6pbddEUMwyC4CgtFAwU+OBAeBeRACCgF4Ag0NAgGBBwEie3wDDQQEi46DQHQQlZeEeGmJi1khACH5BAkJABAALAAAAAAQABAAAAV1ICSOxoMYYwo1CmoiCCQEwtjAyI0LQF9DCtzAADMEeoCAiCh4oEY8n83wTM1+pZNq5CgUHK/YFlJIJAo48bZ8JmrH3cJhqWhsH4eHDVeFPBiAekBCAwsLAweADHMQbicLBAQLf4BqBi0QkJIQCAdqKg+GA1shACH5BAkJABAALAAAAAAQABAAhAQCBISChKyqrLy+vFxaXLSytMTGxCwuLIyOjBQSFISGhKyurMTCxGRiZLS2tMzKzNDQ0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAV8ICSOSJIgYwo9jAElAJBAS7CMz1IUDywLh6BAxFgYGaVTIHgIiB67gmu0YA5FhpaKFrgaHI7pVtBoCByFhWMrahAIjZ2aDXG/v1I62fzUqhgCAzg6PCkDCoiCEEVpLWgGAgoBCldQOnhqDJIKDDgDDxAOhBADgXQGBWFbIQAh+QQJCQAQACwAAAAAEAAQAAAFcyAkjk5ROGMKCYEAFUlSQM8xjAKgC7D8MMCHKKADBA4mxwHIOIhyuxSCicC1VBDEoQoxPBAGrOixWDy+CC52QSAs0mkxhO02pMNi8uLWVTSwBgZ/Ig1weISGIgpwA14PBotpfHZ3aGCJIpBhln2HKpSeIiEAIfkECQkAEAAsAAAAABAAEACEBAIEhIKErKqsvL68XFpctLK0xMbELC4sjI6MFBIUhIaErK6sxMLEZGJktLa0zMrM0NDQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABXggJI5C0whjCi3BAjUE0UCDMJBHXsbNoPwMUSB3CJROAkVAgYIIiE2R73cTCYwqmiAIQSQSiKzI4CgYEgBAQgwpFBYOtJr9dnvBbLLDMGY8sgZ+Iw91fyNkCwWGDIkLDGRmDHVchHCVBQ6XhhAPA39liZyeeZh8KiEAIfkECQkAEAAsAAAAABAAEAAABXQgJI7DsgxjCj0HuhDEAjWKMT5M/ryxgfw2yCHHOOwWD8UPgVoRESkfcIQ4QFWGmshRKBxUI8PjYSgkEgWw6LE0o9WQJYJbcMClQUFAAM4GIQIAgnwjDUtBAYIAAWIIWUsKIoGDS2QIAmQjenxyEAafd1MqIQAh+QQJCQAQACwAAAAAEAAQAIQEAgSEgoSsqqy8vrxcWly0srTExsQsLiyMjowUEhSEhoSsrqzEwsRkYmS0trTMyszQ0NAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFeSAkjoZTGGMKDcIAmYsDPQwqMkrOFEtRPL2TSBBQBASlE6O3YIgGRoVr9OD9RoyWalYbNhqCrShpaBAIDfGr5zCj1daC4BsWk4eBxdbQHR7+dSJVPQ8iAX8HAQgJCQgDVlMCiAIJAAAJgw6FIgtHEJWXEHw2W4uNWyEAOw==);
}
.button.butlabel {
    position: relative;
    display: inline-block;
}
.button[data-loading] .butlabel {
  opacity: 0;
}
.button[data-loading] .spinner {
  opacity: 1;
}


input[type="text"],
input[type="email"],
textarea{
	background-color: rgba(255,255,255,0.4);
	border: 1px solid #fff;
	color: rgba(0, 0, 0, 0.75);
	-webkit-transition: none;
	   -moz-transition: none;
		    transition: none;
}
input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus{
	background: #fafafa;
    border-color: #fff;
    -webkit-box-shadow: none;
	   -moz-box-shadow: none;
	    	box-shadow: none;
}

.error small, small.error { 
	margin-top: -10px; 
	margin-right: 3px; 
	font-weight: normal; 
	-moz-border-radius: 2px; 
	-webkit-border-radius: 2px; 
	border-radius: 2px; 
}
.error input,input.error, 
.error input:focus,input.error:focus{ 
	background: rgba(198, 15, 19, 0.3); 
}
/* 
 * Icon style
 */
.icon{
	font-size:1.5em;
	line-height: 1.5;
	padding:0 0 0 10px;
	text-shadow:
    0px 0px 0px #555555,
    0px 0px 0px #454545,
    0px 0px 0px #353535,
    0px 0px 0px #252525,
    0px 1px 3px rgba(0, 0, 0, 0.4);
}
.icon a{
	color:#fff;
	opacity: 0.7;
}	
.icon a:hover{
	color:#000;
	-webkit-text-shadow: 0 0 10px #fff;
	   -moz-text-shadow: 0 0 10px #fff;
			text-shadow: 0 0 10px #fff;

}
.icon span {
	margin:0 5px;
}
.reveal-modal a{
	line-height: 2.5;
	color:#525252;
}
.reveal-modal a:hover{
	color:#000;
}

.reveal-modal ul{
	list-style: none;
}


/* 
 * Footer style
 */
.lang {
	line-height: 1.5;
	font-size: 14px;
}
.lang,.lang a{color:#fff;opacity: 0.9;}
.lang a:hover{
	color:#000;
	-webkit-text-shadow: 0 0 10px #fff;
	   -moz-text-shadow: 0 0 10px #fff;
			text-shadow: 0 0 10px #fff;
}


.container{
	margin:0 auto 10px;
	border-top:1px solid #fff;
	border-bottom:1px solid #fff;
	height: 2px;
	width:2px;
	min-width:2px;
	overflow: hidden;
}

/* 
 * Animation style
 */
.bg,
.container,
.show1,
.show2,
.show3,
.show4{
	opacity:0;
}

footer{
	overflow: hidden;
}

/* ==========================================================================
   @media style
   ========================================================================== */
	
	/* IE 10+ */
	@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
		.desc-day{width: 20px;margin:20px 0 0 15px;}
	}

	
    /* Large desktop */
    @media (min-width: 1200px) {
		
	}
    
    /* Landscape phone to portrait tablet */
    @media (max-width: 767px) {
		.container{border-top:0px solid #fff;border-bottom:0px solid #fff;}
		.border {border-left:none;}
		.section-count,.section-name{height:auto;margin:0px 0 !important;}
		.count-small{font-size: 4.5em;}
		.reveal-modal a{font-size: 1.5em;line-height:2;}
		.icon{font-size:2.5em;text-align:center;margin:0 0 20px;}
		.flag{margin-bottom:2px;}
		.lang{text-align:center;border-top:1px solid #fff;}
		.spacer{display:block;}
		.error small, small.error {margin-right: 2px;}
		.postfix { left: 0px; -moz-border-radius-topleft: 2px; -webkit-border-top-left-radius: 2px; border-top-left-radius: 2px; -moz-border-radius-bottomleft: 2px; -webkit-border-bottom-left-radius: 2px; border-bottom-left-radius: 2px;}
	}
    
    /* Landscape phones and down */
    @media (max-width: 480px) {
		.header,.soon,.count-small{font-size: 3.5em;margin:10px 0 0 0;}
	}
	
	/* Landscape phones and down */
    @media (max-width: 320px) {
		.header,.soon,.count-small{font-size: 2.5em;}
	}


/* ==========================================================================
   Vendors style
   ========================================================================== */

/* 
 * Pictonic fonts style
 */

@font-face{ 
    font-family: pictonic;
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/pictonic.eot");
    src: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/pictonic.eot?#iefix") format("embedded-opentype"),
        url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/pictonic.ttf") format("truetype"),
        url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/pictonic.woff") format("woff"),
        url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/fonts/pictonic.svg") format("svg");
    font-weight: normal;
    font-style: normal;
}
 
.pictonic{
	font-family: "pictonic";
	font-weight: normal; font-style: normal;
	-webkit-font-smoothing:  antialiased !important;
	-moz-font-smoothing:  antialiased !important;
	font-smoothing:  antialiased !important;
	line-height:1em;
}
 
a.pictonic, span.pictonic, small.pictonic {
	display: -moz-inline-stack;
	display:inline-block;
	zoom: 1;
	*display: inline;
}
 
[class^="icon-"], [class*=" icon-"]{
	font-family: "pictonic";
	font-weight: normal; font-style: normal;
	-webkit-font-smoothing:  antialiased !important;
	-moz-font-smoothing:  antialiased !important;
	font-smoothing:  antialiased !important;
	line-height:1em;
}
 
a[class^="icon-"], a[class*=" icon-"], span[class^="icon-"], span[class*=" icon-"], small[class^="icon-"], small[class*=" icon-"] {
	display: -moz-inline-stack;
	display:inline-block;
	zoom: 1;
	*display: inline;
}
.icon-earth:before { content:""; } 
.icon-dropbox:before { content:""; } 
.icon-amazon:before { content:""; } 
.icon-facebook:before { content:""; } 
.icon-flickr:before { content:""; } 
.icon-gmail:before { content:""; } 
.icon-google:before { content:""; } 
.icon-myspace:before { content:""; } 
.icon-odnoklassniki:before { content:""; } 
.icon-skype:before { content:""; } 
.icon-twitter:before { content:""; } 
.icon-vimeo:before { content:""; } 
.icon-youtube:before { content:""; } 
.icon-yahoo:before { content:""; } 
.icon-mailru:before { content:""; } 
.icon-blogger:before { content:""; } 
.icon-digg:before { content:""; } 
.icon-reddit:before { content:""; } 
.icon-share:before { content:""; } 
.icon-instagram:before { content:""; } 
.icon-livejournal:before { content:""; } 
.icon-kub-cog:before { content:""; } 
.icon-dribbble:before { content:""; } 
.icon-linkedin:before { content:""; } 
.icon-pinterest:before { content:""; } 
.icon-plaxo:before { content:""; } 
.icon-sina:before { content:""; } 
.icon-stumble_upon:before { content:""; } 
.icon-last_fm:before { content:""; } 
.icon-identi-ca:before { content:""; } 
.icon-deviantart:before { content:""; } 
.icon-fresqui:before { content:""; } 
.icon-googledrive:before { content:""; } 
.icon-spotify:before { content:""; } 
.icon-feedburner:before { content:""; } 
.icon-blinklist:before { content:""; } 
.icon-blip:before { content:""; } 
.icon-icq:before { content:""; } 
.icon-creativesloth:before { content:""; } 
.icon-rdio:before { content:""; } 
.icon-delicious:before { content:""; } 
.icon-newsvine:before { content:""; } 
.icon-orkut:before { content:""; } 
.icon-formspring:before { content:""; } 
.icon-forrst:before { content:""; } 
.icon-friendfeed:before { content:""; } 
.icon-picasa:before { content:""; } 
.icon-xing:before { content:""; } 
.icon-weblink:before { content:""; } 
.icon-wordpress:before { content:""; } 
.icon-shopify:before { content:""; } 
.icon-wikipedia:before { content:""; } 
.icon-aim:before { content:""; } 
.icon-bookmark:before { content:""; } 
.icon-hi5:before { content:""; } 
.icon-kaboodle:before { content:""; } 
.icon-technorati:before { content:""; } 
.icon-netlog:before { content:""; } 
.icon-voxopolis:before { content:""; } 
.icon-yammer:before { content:""; } 
.icon-xanga:before { content:""; } 
.icon-box-com:before { content:""; } 
.icon-zerply:before { content:""; } 
.icon-chn-weibo:before { content:""; } 
.icon-chn-renren:before { content:""; } 
.icon-chn-tencent:before { content:""; } 
.icon-chn-wechat:before { content:""; } 
.icon-grooveshark:before { content:""; } 
.icon-skydrive:before { content:""; }

/* 
 * Flag style
 */

.flag {
	display:inline-block;
	width: 16px;
	height: 11px;
	background:url(<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/flags.png) no-repeat;
}

.flag.ad {background-position: -16px 0}
.flag.ae {background-position: -32px 0}
.flag.af {background-position: -48px 0}
.flag.ag {background-position: -64px 0}
.flag.ai {background-position: -80px 0}
.flag.al {background-position: -96px 0}
.flag.am {background-position: -112px 0}
.flag.an {background-position: -128px 0}
.flag.ao {background-position: -144px 0}
.flag.ar {background-position: -160px 0}
.flag.as {background-position: -176px 0}
.flag.at {background-position: -192px 0}
.flag.au {background-position: -208px 0}
.flag.aw {background-position: -224px 0}
.flag.az {background-position: -240px 0}
.flag.ba {background-position: 0 -11px}
.flag.bb {background-position: -16px -11px}
.flag.bd {background-position: -32px -11px}
.flag.be {background-position: -48px -11px}
.flag.bf {background-position: -64px -11px}
.flag.bg {background-position: -80px -11px}
.flag.bh {background-position: -96px -11px}
.flag.bi {background-position: -112px -11px}
.flag.bj {background-position: -128px -11px}
.flag.bm {background-position: -144px -11px}
.flag.bn {background-position: -160px -11px}
.flag.bo {background-position: -176px -11px}
.flag.br {background-position: -192px -11px}
.flag.bs {background-position: -208px -11px}
.flag.bt {background-position: -224px -11px}
.flag.bv {background-position: -240px -11px}
.flag.bw {background-position: 0 -22px}
.flag.by {background-position: -16px -22px}
.flag.bz {background-position: -32px -22px}
.flag.ca {background-position: -48px -22px}
.flag.catalonia {background-position: -64px -22px}
.flag.cd {background-position: -80px -22px}
.flag.cf {background-position: -96px -22px}
.flag.cg {background-position: -112px -22px}
.flag.ch {background-position: -128px -22px}
.flag.ci {background-position: -144px -22px}
.flag.ck {background-position: -160px -22px}
.flag.cl {background-position: -176px -22px}
.flag.cm {background-position: -192px -22px}
.flag.cn {background-position: -208px -22px}
.flag.co {background-position: -224px -22px}
.flag.cr {background-position: -240px -22px}
.flag.cu {background-position: 0 -33px}
.flag.cv {background-position: -16px -33px}
.flag.cw {background-position: -32px -33px}
.flag.cy {background-position: -48px -33px}
.flag.cz {background-position: -64px -33px}
.flag.de {background-position: -80px -33px}
.flag.dj {background-position: -96px -33px}
.flag.dk {background-position: -112px -33px}
.flag.dm {background-position: -128px -33px}
.flag.do {background-position: -144px -33px}
.flag.dz {background-position: -160px -33px}
.flag.ec {background-position: -176px -33px}
.flag.ee {background-position: -192px -33px}
.flag.eg {background-position: -208px -33px}
.flag.eh {background-position: -224px -33px}
.flag.england {background-position: -240px -33px}
.flag.er {background-position: 0 -44px}
.flag.es {background-position: -16px -44px}
.flag.et {background-position: -32px -44px}
.flag.eu {background-position: -48px -44px}
.flag.fi {background-position: -64px -44px}
.flag.fj {background-position: -80px -44px}
.flag.fk {background-position: -96px -44px}
.flag.fm {background-position: -112px -44px}
.flag.fo {background-position: -128px -44px}
.flag.fr {background-position: -144px -44px}
.flag.ga {background-position: -160px -44px}
.flag.gb {background-position: -176px -44px}
.flag.gd {background-position: -192px -44px}
.flag.ge {background-position: -208px -44px}
.flag.gf {background-position: -224px -44px}
.flag.gg {background-position: -240px -44px}
.flag.gh {background-position: 0 -55px}
.flag.gi {background-position: -16px -55px}
.flag.gl {background-position: -32px -55px}
.flag.gm {background-position: -48px -55px}
.flag.gn {background-position: -64px -55px}
.flag.gp {background-position: -80px -55px}
.flag.gq {background-position: -96px -55px}
.flag.gr {background-position: -112px -55px}
.flag.gs {background-position: -128px -55px}
.flag.gt {background-position: -144px -55px}
.flag.gu {background-position: -160px -55px}
.flag.gw {background-position: -176px -55px}
.flag.gy {background-position: -192px -55px}
.flag.hk {background-position: -208px -55px}
.flag.hm {background-position: -224px -55px}
.flag.hn {background-position: -240px -55px}
.flag.hr {background-position: 0 -66px}
.flag.ht {background-position: -16px -66px}
.flag.hu {background-position: -32px -66px}
.flag.ic {background-position: -48px -66px}
.flag.id {background-position: -64px -66px}
.flag.ie {background-position: -80px -66px}
.flag.il {background-position: -96px -66px}
.flag.im {background-position: -112px -66px}
.flag.in {background-position: -128px -66px}
.flag.io {background-position: -144px -66px}
.flag.iq {background-position: -160px -66px}
.flag.ir {background-position: -176px -66px}
.flag.is {background-position: -192px -66px}
.flag.it {background-position: -208px -66px}
.flag.je {background-position: -224px -66px}
.flag.jm {background-position: -240px -66px}
.flag.jo {background-position: 0 -77px}
.flag.jp {background-position: -16px -77px}
.flag.ke {background-position: -32px -77px}
.flag.kg {background-position: -48px -77px}
.flag.kh {background-position: -64px -77px}
.flag.ki {background-position: -80px -77px}
.flag.km {background-position: -96px -77px}
.flag.kn {background-position: -112px -77px}
.flag.kp {background-position: -128px -77px}
.flag.kr {background-position: -144px -77px}
.flag.kurdistan {background-position: -160px -77px}
.flag.kw {background-position: -176px -77px}
.flag.ky {background-position: -192px -77px}
.flag.kz {background-position: -208px -77px}
.flag.la {background-position: -224px -77px}
.flag.lb {background-position: -240px -77px}
.flag.lc {background-position: 0 -88px}
.flag.li {background-position: -16px -88px}
.flag.lk {background-position: -32px -88px}
.flag.lr {background-position: -48px -88px}
.flag.ls {background-position: -64px -88px}
.flag.lt {background-position: -80px -88px}
.flag.lu {background-position: -96px -88px}
.flag.lv {background-position: -112px -88px}
.flag.ly {background-position: -128px -88px}
.flag.ma {background-position: -144px -88px}
.flag.mc {background-position: -160px -88px}
.flag.md {background-position: -176px -88px}
.flag.me {background-position: -192px -88px}
.flag.mg {background-position: -208px -88px}
.flag.mh {background-position: -224px -88px}
.flag.mk {background-position: -240px -88px}
.flag.ml {background-position: 0 -99px}
.flag.mm {background-position: -16px -99px}
.flag.mn {background-position: -32px -99px}
.flag.mo {background-position: -48px -99px}
.flag.mp {background-position: -64px -99px}
.flag.mq {background-position: -80px -99px}
.flag.mr {background-position: -96px -99px}
.flag.ms {background-position: -112px -99px}
.flag.mt {background-position: -128px -99px}
.flag.mu {background-position: -144px -99px}
.flag.mv {background-position: -160px -99px}
.flag.mw {background-position: -176px -99px}
.flag.mx {background-position: -192px -99px}
.flag.my {background-position: -208px -99px}
.flag.mz {background-position: -224px -99px}
.flag.na {background-position: -240px -99px}
.flag.nc {background-position: 0 -110px}
.flag.ne {background-position: -16px -110px}
.flag.nf {background-position: -32px -110px}
.flag.ng {background-position: -48px -110px}
.flag.ni {background-position: -64px -110px}
.flag.nl {background-position: -80px -110px}
.flag.no {background-position: -96px -110px}
.flag.np {background-position: -112px -110px}
.flag.nr {background-position: -128px -110px}
.flag.nu {background-position: -144px -110px}
.flag.nz {background-position: -160px -110px}
.flag.om {background-position: -176px -110px}
.flag.pa {background-position: -192px -110px}
.flag.pe {background-position: -208px -110px}
.flag.pf {background-position: -224px -110px}
.flag.pg {background-position: -240px -110px}
.flag.ph {background-position: 0 -121px}
.flag.pk {background-position: -16px -121px}
.flag.pl {background-position: -32px -121px}
.flag.pm {background-position: -48px -121px}
.flag.pn {background-position: -64px -121px}
.flag.pr {background-position: -80px -121px}
.flag.ps {background-position: -96px -121px}
.flag.pt {background-position: -112px -121px}
.flag.pw {background-position: -128px -121px}
.flag.py {background-position: -144px -121px}
.flag.qa {background-position: -160px -121px}
.flag.re {background-position: -176px -121px}
.flag.ro {background-position: -192px -121px}
.flag.rs {background-position: -208px -121px}
.flag.ru {background-position: -224px -121px}
.flag.rw {background-position: -240px -121px}
.flag.sa {background-position: 0 -132px}
.flag.sb {background-position: -16px -132px}
.flag.sc {background-position: -32px -132px}
.flag.scotland {background-position: -48px -132px}
.flag.sd {background-position: -64px -132px}
.flag.se {background-position: -80px -132px}
.flag.sg {background-position: -96px -132px}
.flag.sh {background-position: -112px -132px}
.flag.si {background-position: -128px -132px}
.flag.sk {background-position: -144px -132px}
.flag.sl {background-position: -160px -132px}
.flag.sm {background-position: -176px -132px}
.flag.sn {background-position: -192px -132px}
.flag.so {background-position: -208px -132px}
.flag.somaliland {background-position: -224px -132px}
.flag.sr {background-position: -240px -132px}
.flag.ss {background-position: 0 -143px}
.flag.st {background-position: -16px -143px}
.flag.sv {background-position: -32px -143px}
.flag.sx {background-position: -48px -143px}
.flag.sy {background-position: -64px -143px}
.flag.sz {background-position: -80px -143px}
.flag.tc {background-position: -96px -143px}
.flag.td {background-position: -112px -143px}
.flag.tf {background-position: -128px -143px}
.flag.tg {background-position: -144px -143px}
.flag.th {background-position: -160px -143px}
.flag.tj {background-position: -176px -143px}
.flag.tk {background-position: -192px -143px}
.flag.tl {background-position: -208px -143px}
.flag.tm {background-position: -224px -143px}
.flag.tn {background-position: -240px -143px}
.flag.to {background-position: 0 -154px}
.flag.tr {background-position: -16px -154px}
.flag.tt {background-position: -32px -154px}
.flag.tv {background-position: -48px -154px}
.flag.tw {background-position: -64px -154px}
.flag.tz {background-position: -80px -154px}
.flag.ua {background-position: -96px -154px}
.flag.ug {background-position: -112px -154px}
.flag.um {background-position: -128px -154px}
.flag.us {background-position: -144px -154px}
.flag.uy {background-position: -160px -154px}
.flag.uz {background-position: -176px -154px}
.flag.va {background-position: -192px -154px}
.flag.vc {background-position: -208px -154px}
.flag.ve {background-position: -224px -154px}
.flag.vg {background-position: -240px -154px}
.flag.vi {background-position: 0 -165px}
.flag.vn {background-position: -16px -165px}
.flag.vu {background-position: -32px -165px}
.flag.wales {background-position: -48px -165px}
.flag.wf {background-position: -64px -165px}
.flag.ws {background-position: -80px -165px}
.flag.ye {background-position: -96px -165px}
.flag.yt {background-position: -112px -165px}
.flag.za {background-position: -128px -165px}
.flag.zanzibar {background-position: -144px -165px}
.flag.zm {background-position: -160px -165px}
.flag.zw {background-position: -176px -165px}

/* 
 * Loader
 */
#preLoad{
	width:100%;
	text-align:center;
	position: fixed;
	top:48.5%;
	
}
#circleG{
	width:149px;
	margin:0 auto;
}
.circleG{
	background-color:#FFFFFF;
	float:left;
	height:20px;
	margin-left:17px;
	width:20px;
	-moz-animation-name:bounce_circleG;
	-moz-animation-duration:1.9500000000000002s;
	-moz-animation-iteration-count:infinite;
	-moz-animation-direction:linear;
	-moz-border-radius:21px;
	-webkit-animation-name:bounce_circleG;
	-webkit-animation-duration:1.9500000000000002s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-direction:linear;
	-webkit-border-radius:21px;
	-ms-animation-name:bounce_circleG;
	-ms-animation-duration:1.9500000000000002s;
	-ms-animation-iteration-count:infinite;
	-ms-animation-direction:linear;
	-ms-border-radius:21px;
	-o-animation-name:bounce_circleG;
	-o-animation-duration:1.9500000000000002s;
	-o-animation-iteration-count:infinite;
	-o-animation-direction:linear;
	-o-border-radius:21px;
	animation-name:bounce_circleG;
	animation-duration:1.9500000000000002s;
	animation-iteration-count:infinite;
	animation-direction:linear;
	border-radius:21px;
}
#circleG_1{
	-moz-animation-delay:0.39s;
	-webkit-animation-delay:0.39s;
	-ms-animation-delay:0.39s;
	-o-animation-delay:0.39s;
	animation-delay:0.39s;
}
#circleG_2{
	-moz-animation-delay:0.9099999999999999s;
	-webkit-animation-delay:0.9099999999999999s;
	-ms-animation-delay:0.9099999999999999s;
	-o-animation-delay:0.9099999999999999s;
	animation-delay:0.9099999999999999s;
}
#circleG_3{
	-moz-animation-delay:1.1700000000000002s;
	-webkit-animation-delay:1.1700000000000002s;
	-ms-animation-delay:1.1700000000000002s;
	-o-animation-delay:1.1700000000000002s;
	animation-delay:1.1700000000000002s;
}
@-moz-keyframes bounce_circleG{50%{background-color:#000000}}
@-webkit-keyframes bounce_circleG{50%{background-color:#000000}}
@-ms-keyframes bounce_circleG{50%{background-color:#000000}}
@-o-keyframes bounce_circleG{50%{background-color:#000000}}
@keyframes bounce_circleG{50%{background-color:#000000}}



.lt-ie9 .close-reveal-modal{
	display: none;
}
.lt-ie9 .desc-day{
	width: 25px;
	padding:0px;
	margin:10px 0 0 12px;
}
.lt-ie9 .spinner{
	background-image:none;
}





/*.bg:after{
	content: "";
	position: absolute;
	width: 100%;
	height: 100%;
	top:0px;
	left: 0px;
	opacity: 0.2;
	background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat4.png") repeat;
}
.patt{
	background: url("<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/icon/pat7.png") repeat;
}*/
</style>

</head>
<body>




		<!-- Main container -->
		<div class="row container ">
<!-- Body background -->
		<div id="bg" class="bg show0">
			<!-- Background pattern -->
			<div class="patt"></div>
			<!-- Background image -->
			'.$backg.'
		</div> 

'.$logon.'

					<input type="hidden" name="countconf" id="countconf" value="'.$serialise['date_count'].' '.$serialise['time_count'].'" />
					<input type="hidden" name="colorStart1" id="colorStart1" value="'.$serialise['background_start'].'" />
					<input type="hidden" name="colorEnd1" id="colorEnd1" value="'.$serialise['background_end'].'" />
					<input type="hidden" name="bgStyle1" id="bgStyle1" value="'.$serialise['background_style'].'" />
	    		
		
'.$timer.'		


		
		<!-- Footer -->
		<div class="row show4">
			<div class="ten columns push-two icon text-right">			
			'.$sociallll.'
			</div>
			<!-- <div class="four columns text-center lang">
				
				
			</div>	-->
			<div class="two columns pull-ten lang">
				<span class="icon-earth"></span> 
				<a href="#" id="button-lang" data-localize="foot.l">Language: English</a>
			</div>
		</div>
		<!-- End Footer -->
		
		
		<!-- Modal setting language -->
		<div id="modal-lang" class="reveal-modal">
			<h2 data-localize="modal.lang.header">Language</h2>
			<ul class="four column">
				<li><a href="<{$xoops_url}>/index.php?lang=ar" lang="ar"><span class="flag ar"></span> العربية</a></li>
				<li><a href="<{$xoops_url}>/index.php?lang=en" lang="en"><span class="flag gb"></span> English</a></li>
				<li><a href="<{$xoops_url}>/index.php?lang=fr" lang="fr"><span class="flag fr"></span> Français</a></li>
			</ul>
			<ul class="four column">
				<li><a href="<{$xoops_url}>/index.php?lang=de" lang="de"><span class="flag de"></span> Deutsch</a></li>
				<li><a href="<{$xoops_url}>/index.php?lang=it" lang="it"><span class="flag it"></span> Italiano</a></li>
				<li><a href="<{$xoops_url}>/index.php?lang=es" lang="es"><span class="flag es"></span> Español</a></li>
			</ul>
			<ul class="four column">
				<li><a href="<{$xoops_url}>/index.php?lang=ru" lang="ru"><span class="flag ru"></span> Русский</a></li>
				<li><a href="<{$xoops_url}>/index.php?lang=ja" lang="ja"><span class="flag jp"></span> 日本語</a></li> 
				<li><a href="<{$xoops_url}>/index.php?lang=zh" lang="zh"><span class="flag cn"></span> 简体中文</a></li>
			</ul>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		<!-- End Modal setting language -->
	
		<!-- Template error messages -->
		<div class="hide">
			<div id="tempRequired" data-localize="messages.required">This field is required</div>
			<div id="tempMail" data-localize="messages.mail">Please enter a valid email address</div>
			<div id="tempSubs" data-localize="messages.subs">This email is already signed</div>
			<div id="tempSuccess"><div class="alert-box success" data-localize="messages.success">Your email is saved</div></div>
		</div>
		<!-- End Template error messages -->
		
		<!-- Preloader -->
		<div id="preLoad"><div id="circleG">
			<div id="circleG_1" class="circleG"></div>
			<div id="circleG_2" class="circleG"></div>
			<div id="circleG_3" class="circleG"></div>
		</div></div>
		<!-- End Preloader -->

</body>
</html>



';
		if($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer3'){

$value['html'] = '
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><{$sitename}></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/loader.min.css"/>
        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/main.min.css"/>

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/custom.css">

        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/modernizr.custom.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!--[if lte IE 8]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/respond.min.js"></script>
        <![endif]-->

        <script>
            var miniGoOptions = {
                theme: {
                    // Set to true to add a translucent background behind each page
                    contentBackground: false
                },

                countdown: {
                    // Possible options are "default" or "piechart"
                    type: "default",
                    // The date when the countdown started. Used by the progress bars. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    startDate: new Date("November 1, 2013 00:00"),
                    // The target date we"re counting down to. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    targetDate: new Date("March 20, 2014 11:13")
                },

                background: {
                    // Main background color
                    color: "#000",
                    // Path to pattern overlay or empty if not needed. Use "" for empty.
                    patternOverlay: "<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/oblique-l-1.png",
                    // Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.
                    patternOverlayOpacity: 0.2,
                    // Possible options are "slideshow" or "video". Enter "" if no slideshow/video is desired as background.
                    type: "slideshow",

                    slideshow: {
                        // Type of transition effect. Possible options are "kenburns", "fade" or "continuousFade".
                        type: "kenburns",
                        // Time in seconds between image changes
                        duration: 10,

                        // Ken Burns animation settings
                        kenburns: {
                            // Minimum and maximum scale of the image. It will be randomized for every frame.
                            minScale: 1.2,
                            maxScale: 1.7,
                            // Minimum and maximum movement of the image, in percent. It will be randomized for every frame. Note that this is also limited by the scale because the image needs to stay within the viewport.
                            minMove: 5,
                            maxMove: 15
                        }
                    },

                    video: {
                        // Possible options are "local" or "youtube"
                        source: "local",
                        // Fallback image for browsers that can"t play video
                        imageFallback: "video/bg.jpg",
                        // Sets the volume of the video. Value range 0 to 100.
                        volume: 0,

                        // Configure the video files if you selected "local" as video source
                        localFiles: {
                            // H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format on Windows so on other systems it will fallback to Flash playback which is a bit slower.
                            mp4: "video/bg.mp4",
                            // Optional. OGG Video is optional but useful because it"s played natively by Firefox on OSX and Linux. Enter "" if you don"t have this format.
                            ogg: "video/bg.ogv",
                            // Optional. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264)
                            webm: "video/bg.webm",
                        },

                        youtube: {
                            // Enter the URL of the Video or Playlist
                            url: "http://www.youtube.com/watch?v=ab0TSkLe-E0",

                            // The options below allow you to play only a part of a video. For playlists it will only work for the first video.
                            // If you dont"t want the video to start from the very beginning, enter the time offset in seconds.
                            startAt: 0,
                            // If you dont"t want the video to end at the very end, enter the time offset FROM THE BEGINNING of the video, in seconds. Otherwise leave it at 0.
                            endAt: 200,
                        }
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="loader">
            <img class="loader-logo" src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
            <div class="bubblingG">
                <span id="bubblingG_1"></span>
                <span id="bubblingG_2"></span>
                <span id="bubblingG_3"></span>
            </div>
        </div>

        <div class="site-wrapper">
            <div class="site-page site-front site-page--active">

                <div class="grid">
                    <div class="grid__item one-whole push--bottom">
                        <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
                    </div>

                    <div class="grid__item one-whole">
                        <h3>Welcome to Theme Builder, a clean, modern coming soon template.</h3>
                    </div>

                    <div class="grid__item one-whole">
                        <div class="clock" data-labels="Days,Hours,Minutes,Seconds"></div>
                    </div>

                    <div class="grid__item one-whole push--top">
                        <div class="form-flip push--top">
                            <button class="form-flip__enabler btn btn--full">Get Notified</button>

                            <div class="form-flip__target">
                                <form class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                                    <div class="input-group">
                                        <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                                        <div class="input-group-addon">
                                            <button class="btn btn--font-black" type="submit" autocomplete="off"><span>GO</span><i class="form-spinner fa fa-spinner"></i></button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="subscribe">

                                    <input type="text" name="important-info">
                                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                                </form>
                            </div>

                            <button class="form-flip__close btn btn--full">Got it, thank you</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aboutPage" class="site-page site-page--from-left">
                <h1>Who we are</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget nibh at libero fringilla adipiscing nec ut leo. Etiam nec purus arcu. Morbi sollicitudin at risus id malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam sed tincidunt arcu. Donec molestie ante sapien, sed molestie est euismod eget. Maecenas ac metus accumsan, scelerisque massa sed, porta est. Aliquam ut mollis mi. Cras id vulputate purus, ac sollicitudin ante.</p>

                <p>Integer condimentum eu lectus quis semper. Sed id metus magna. Morbi ultrices magna id euismod hendrerit. Pellentesque nec mattis odio, vitae laoreet metus. Sed eget sollicitudin est, vitae accumsan nisi. Fusce consequat imperdiet venenatis. Integer mollis hendrerit facilisis. Praesent vel mattis enim. Integer fringilla et urna vitae rutrum.</p>
            <form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
			</div>

            <div id="contactPage" class="site-page site-page--from-right">
                <h1>Get in touch</h1>

                <div class="grid">
                    <div class="grid__item one-whole">
                        <div class="contact-info"><i class="fa fa-phone"></i>+41 078 7549690</div>
                        <div class="contact-info"><i class="fa fa-envelope-o"></i><a href="mailto:mail@website.web">mail@website.web</a></div>
                    </div>
                    <div class="grid__item one-whole push-half--top">
                        <div class="contact-info"><i class="fa fa-map-marker"></i>354 Rue du Temple 2610 Neuchatêl, Suisse</div>
                    </div>
                </div>

                <form id="contactForm" data-msg-success="Message sent!" class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                    <div class="grid">
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="name" type="text" placeholder="Your name" data-msg-required="This field is required." required>
                        </div>
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <textarea rows="6" name="message" placeholder="Message" data-msg-required="This field is required." required></textarea>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <button class="btn btn--font-bold" type="submit" autocomplete="off"><span>SEND MESSAGE</span><i class="form-spinner fa fa-spinner"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="contact">

                    <input type="text" name="important-info">
                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                </form>
            </div>
        </div>

        <div class="nav-social">
            <a href="#" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Like us on Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" title="Join us on LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="#" title="Pinterest Pinboard"><i class="fa fa-pinterest"></i></a>
            <a href="#" title="Our works on Dribbble"><i class="fa fa-dribbble"></i></a>
        </div>

        <div class="nav-left">
            <a href="#aboutPage" title="About" class="site-page__trigger"><i class="fa fa-info-circle"></i></a>
        </div>
        <div class="nav-right">
            <a href="#contactPage" title="Contact" class="site-page__trigger"><i class="fa fa-envelope"></i></a>
        </div>
        <div class="nav-close">
            <a href="#" title="Close" class="site-page__close"><i class="fa fa-times-circle"></i></a>
        </div>


        <figure class="bg-wrapper">
            <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-1.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-3.jpg" alt="">
        </figure>

        <!--[if lte IE 8]><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->


        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/flipclock.min.js"></script>

        <!--[if gt IE 8]><!-->
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.easypiechart.min.js"></script>
        <!--<![endif]-->

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/main.min.js"></script>

        <!--[if lte IE 9]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Google Analytics code goes below this line -->

</body>
</html>
';


}elseif($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer4'){

$value['html'] = '
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><{$sitename}></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/loader.min.css"/>
        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/main.min.css"/>

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/custom.css">

        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/modernizr.custom.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!--[if lte IE 8]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/respond.min.js"></script>
        <![endif]-->

        <script>
            var now = new Date();
            startDate = now.setDate(now.getDate() - 63);
            targetDate = now.setDate(now.getDate() + 89) - 32810000;
            var miniGoOptions = {
                theme: {
                    // Set to true to add a translucent background behind each page
                    contentBackground: true
                },

                countdown: {
                    // Possible options are "default" or "piechart"
                    type: "piechart",
                    // The date when the countdown started. Used by the progress bars. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    startDate: new Date(startDate),
                    // The target date we"re counting down to. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    targetDate: new Date(targetDate)
                },

                background: {
                    // Main background color
                    color: "#000",
                    // Path to pattern overlay or empty if not needed. Use "" for empty.
                    patternOverlay: "<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/horizontal-1.png",
                    // Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.
                    patternOverlayOpacity: 1,
                    // Possible options are "slideshow" or "video". Enter "" if no slideshow/video is desired as background.
                    type: "video",

                    slideshow: {
                        // Type of transition effect. Possible options are "kenburns", "fade" or "continuousFade".
                        type: "kenburns",
                        // Time in seconds between image changes
                        duration: 10,

                        // Ken Burns animation settings
                        kenburns: {
                            // Minimum and maximum scale of the image. It will be randomized for every frame.
                            minScale: 1.2,
                            maxScale: 1.7,
                            // Minimum and maximum movement of the image, in percent. It will be randomized for every frame. Note that this is also limited by the scale because the image needs to stay within the viewport.
                            minMove: 5,
                            maxMove: 15
                        }
                    },

                    video: {
                        // Possible options are "local" or "youtube"
                        source: "youtube",
                        // Fallback image for browsers that can"t play video
                        imageFallback: "<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bgvideo.jpg",
                        // Sets the volume of the video. Value range 0 to 100.
                        volume: 0,

                        // Configure the video files if you selected "local" as video source
                        localFiles: {
                            // H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format on Windows so on other systems it will fallback to Flash playback which is a bit slower.
                            mp4: "video/bg.mp4",
                            // Optional. OGG Video is optional but useful because it"s played natively by Firefox on OSX and Linux. Enter "" if you don"t have this format.
                            ogg: "video/bg.ogv",
                            // Optional. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264)
                            webm: "video/bg.webm",
                        },

                        youtube: {
                            // Enter the URL of the Video or Playlist
                            url: "http://www.youtube.com/watch?v=ab0TSkLe-E0",

                            // The options below allow you to play only a part of a video. For playlists it will only work for the first video.
                            // If you dont"t want the video to start from the very beginning, enter the time offset in seconds.
                            startAt: 0,
                            // If you dont"t want the video to end at the very end, enter the time offset FROM THE BEGINNING of the video, in seconds. Otherwise leave it at 0.
                            endAt: 200,
                        }
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="loader">
            <img class="loader-logo" src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
            <div class="bubblingG">
                <span id="bubblingG_1"></span>
                <span id="bubblingG_2"></span>
                <span id="bubblingG_3"></span>
            </div>
        </div>

        <div class="site-wrapper">
            <div class="site-page site-front site-page--active">

                <div class="grid">
                    <div class="grid__item one-whole push--bottom">
                        <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
                        <!-- <div class="minigo-logo"><span>MiniGO</span></div> -->
                    </div>

                    <div class="grid__item one-whole">
                        <h3>Welcome to Theme Builder, a clean, modern coming soon template.</h3>
                    </div>

                    <div class="grid__item one-whole">
                        <div class="clock" data-labels="Days,Hours,Minutes,Seconds"></div>
                    </div>

                    <div class="grid__item one-whole push--top">
                        <div class="form-flip push--top">
                            <button class="form-flip__enabler btn btn--full">Get Notified</button>

                            <div class="form-flip__target">
                                <form class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                                    <div class="input-group">
                                        <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                                        <div class="input-group-addon">
                                            <button class="btn btn--font-black" type="submit" autocomplete="off"><span>GO</span><i class="form-spinner fa fa-spinner"></i></button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="subscribe">

                                    <input type="text" name="important-info">
                                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                                </form>
                            </div>

                            <button class="form-flip__close btn btn--full">Got it, thank you</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aboutPage" class="site-page site-page--from-left">
                <h1>Who we are</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget nibh at libero fringilla adipiscing nec ut leo. Etiam nec purus arcu. Morbi sollicitudin at risus id malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam sed tincidunt arcu. Donec molestie ante sapien, sed molestie est euismod eget. Maecenas ac metus accumsan, scelerisque massa sed, porta est. Aliquam ut mollis mi. Cras id vulputate purus, ac sollicitudin ante.</p>

                <p>Integer condimentum eu lectus quis semper. Sed id metus magna. Morbi ultrices magna id euismod hendrerit. Pellentesque nec mattis odio, vitae laoreet metus. Sed eget sollicitudin est, vitae accumsan nisi. Fusce consequat imperdiet venenatis. Integer mollis hendrerit facilisis. Praesent vel mattis enim. Integer fringilla et urna vitae rutrum.</p>
            
			<form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
			</div>

            <div id="contactPage" class="site-page site-page--from-right">
                <h1>Get in touch</h1>

                <div class="grid">
                    <div class="grid__item one-whole">
                        <div class="contact-info"><i class="fa fa-phone"></i>+41 078 7549690</div>
                        <div class="contact-info"><i class="fa fa-envelope-o"></i><a href="mailto:mail@website.web">mail@website.web</a></div>
                    </div>
                    <div class="grid__item one-whole push-half--top">
                        <div class="contact-info"><i class="fa fa-map-marker"></i>354 Rue du Temple 2610 Neuchatêl, Suisse</div>
                    </div>
                </div>

                <form id="contactForm" data-msg-success="Message sent!" class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                    <div class="grid">
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="name" type="text" placeholder="Your name" data-msg-required="This field is required." required>
                        </div>
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <textarea rows="6" name="message" placeholder="Message" data-msg-required="This field is required." required></textarea>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <button class="btn btn--font-bold" type="submit" autocomplete="off"><span>SEND MESSAGE</span><i class="form-spinner fa fa-spinner"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="contact">

                    <input type="text" name="important-info">
                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                </form>
            </div>
        </div>

        <div class="nav-social">
            <a href="#" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Like us on Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" title="Join us on LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="#" title="Pinterest Pinboard"><i class="fa fa-pinterest"></i></a>
            <a href="#" title="Our works on Dribbble"><i class="fa fa-dribbble"></i></a>
        </div>

        <div class="nav-left">
            <a href="#aboutPage" title="About" class="site-page__trigger"><i class="fa fa-info-circle"></i></a>
        </div>
        <div class="nav-right">
            <a href="#contactPage" title="Contact" class="site-page__trigger"><i class="fa fa-envelope"></i></a>
        </div>
        <div class="nav-close">
            <a href="#" title="Close" class="site-page__close"><i class="fa fa-times-circle"></i></a>
        </div>


        <figure class="bg-wrapper">
            <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-3.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-4.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-5.jpg" alt="">

            <!-- <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg3.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg5.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg4.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg6.jpg" alt=""> -->
        </figure>

        <!--[if lte IE 8]><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->


        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/flipclock.min.js"></script>

        <!--[if gt IE 8]><!-->
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.easypiechart.min.js"></script>
        <!--<![endif]-->

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/main.min.js"></script>

        <!--[if lte IE 9]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Google Analytics code goes below this line -->

</body>
</html>
';
}elseif($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer5'){

$value['html'] = '
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><{$sitename}></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/loader.min.css"/>
        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/main.min.css"/>

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/custom.css">

        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/modernizr.custom.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!--[if lte IE 8]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/respond.min.js"></script>
        <![endif]-->

        <script>
            var now = new Date();
            startDate = now.setDate(now.getDate() - 63);
            targetDate = now.setDate(now.getDate() + 89) - 32810000;
            var miniGoOptions = {
                theme: {
                    // Set to true to add a translucent background behind each page
                    contentBackground: false
                },

                countdown: {
                    // Possible options are "default" or "piechart"
                    type: "default",
                    // The date when the countdown started. Used by the progress bars. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    startDate: new Date(startDate),
                    // The target date we"re counting down to. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    targetDate: new Date(targetDate)
                },

                background: {
                    // Main background color
                    color: "#000",
                    // Path to pattern overlay or empty if not needed. Use "" for empty.
                    patternOverlay: "",
                    // Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.
                    patternOverlayOpacity: 0.3,
                    // Possible options are "slideshow" or "video". Enter "" if no slideshow/video is desired as background.
                    type: "slideshow",

                    slideshow: {
                        // Type of transition effect. Possible options are "kenburns", "fade" or "continuousFade".
                        type: "continuousFade",
                        // Time in seconds between image changes
                        duration: 5,

                        // Ken Burns animation settings
                        kenburns: {
                            // Minimum and maximum scale of the image. It will be randomized for every frame.
                            minScale: 1.2,
                            maxScale: 1.7,
                            // Minimum and maximum movement of the image, in percent. It will be randomized for every frame. Note that this is also limited by the scale because the image needs to stay within the viewport.
                            minMove: 5,
                            maxMove: 15
                        }
                    },

                    video: {
                        // Possible options are "local" or "youtube"
                        source: "local",
                        // Fallback image for browsers that can"t play video
                        imageFallback: "<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bgvideo.jpg",
                        // Sets the volume of the video. Value range 0 to 100.
                        volume: 0,

                        // Configure the video files if you selected "local" as video source
                        localFiles: {
                            // H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format on Windows so on other systems it will fallback to Flash playback which is a bit slower.
                            mp4: "video/bg.mp4",
                            // Optional. OGG Video is optional but useful because it"s played natively by Firefox on OSX and Linux. Enter "" if you don"t have this format.
                            ogg: "video/bg.ogv",
                            // Optional. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264)
                            webm: "video/bg.webm",
                        },

                        youtube: {
                            // Enter the URL of the Video or Playlist
                            url: "http://www.youtube.com/watch?v=ab0TSkLe-E0",

                            // The options below allow you to play only a part of a video. For playlists it will only work for the first video.
                            // If you dont"t want the video to start from the very beginning, enter the time offset in seconds.
                            startAt: 0,
                            // If you dont"t want the video to end at the very end, enter the time offset FROM THE BEGINNING of the video, in seconds. Otherwise leave it at 0.
                            endAt: 200,
                        }
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="loader">
            <img class="loader-logo" src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
            <div class="bubblingG">
                <span id="bubblingG_1"></span>
                <span id="bubblingG_2"></span>
                <span id="bubblingG_3"></span>
            </div>
        </div>

        <div class="site-wrapper">
            <div class="site-page site-front site-page--active">

                <div class="grid">
                    <div class="grid__item one-whole push--bottom">
                        <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
                        <!-- <div class="minigo-logo"><span>MiniGO</span></div> -->
                    </div>

                    <div class="grid__item one-whole">
                        <h3>Welcome to Theme Builder, a clean, modern coming soon template.</h3>
                    </div>

                    <div class="grid__item one-whole">
                        <div class="clock" data-labels="Days,Hours,Minutes,Seconds"></div>
                    </div>

                    <div class="grid__item one-whole push--top">
                        <div class="form-flip push--top">
                            <button class="form-flip__enabler btn btn--full">Get Notified</button>

                            <div class="form-flip__target">
                                <form class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                                    <div class="input-group">
                                        <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                                        <div class="input-group-addon">
                                            <button class="btn btn--font-black" type="submit" autocomplete="off"><span>GO</span><i class="form-spinner fa fa-spinner"></i></button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="subscribe">

                                    <input type="text" name="important-info">
                                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                                </form>
                            </div>

                            <button class="form-flip__close btn btn--full">Got it, thank you</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aboutPage" class="site-page site-page--from-left">
                <h1>Who we are</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget nibh at libero fringilla adipiscing nec ut leo. Etiam nec purus arcu. Morbi sollicitudin at risus id malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam sed tincidunt arcu. Donec molestie ante sapien, sed molestie est euismod eget. Maecenas ac metus accumsan, scelerisque massa sed, porta est. Aliquam ut mollis mi. Cras id vulputate purus, ac sollicitudin ante.</p>

                <p>Integer condimentum eu lectus quis semper. Sed id metus magna. Morbi ultrices magna id euismod hendrerit. Pellentesque nec mattis odio, vitae laoreet metus. Sed eget sollicitudin est, vitae accumsan nisi. Fusce consequat imperdiet venenatis. Integer mollis hendrerit facilisis. Praesent vel mattis enim. Integer fringilla et urna vitae rutrum.</p>
            
			<form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
			</div>

            <div id="contactPage" class="site-page site-page--from-right">
                <h1>Get in touch</h1>

                <div class="grid">
                    <div class="grid__item one-whole">
                        <div class="contact-info"><i class="fa fa-phone"></i>+41 078 7549690</div>
                        <div class="contact-info"><i class="fa fa-envelope-o"></i><a href="mailto:mail@website.web">mail@website.web</a></div>
                    </div>
                    <div class="grid__item one-whole push-half--top">
                        <div class="contact-info"><i class="fa fa-map-marker"></i>354 Rue du Temple 2610 Neuchatêl, Suisse</div>
                    </div>
                </div>

                <form id="contactForm" data-msg-success="Message sent!" class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                    <div class="grid">
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="name" type="text" placeholder="Your name" data-msg-required="This field is required." required>
                        </div>
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <textarea rows="6" name="message" placeholder="Message" data-msg-required="This field is required." required></textarea>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <button class="btn btn--font-bold" type="submit" autocomplete="off"><span>SEND MESSAGE</span><i class="form-spinner fa fa-spinner"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="contact">

                    <input type="text" name="important-info">
                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                </form>
            </div>
        </div>

<!--         <div class="nav-social">
            <a href="#" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Like us on Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" title="Join us on LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="#" title="Pinterest Pinboard"><i class="fa fa-pinterest"></i></a>
            <a href="#" title="Our works on Dribbble"><i class="fa fa-dribbble"></i></a>
        </div> -->

<!--         <div class="nav-left">
            <a href="#aboutPage" title="About" class="site-page__trigger"><i class="fa fa-info-circle"></i></a>
        </div>
        <div class="nav-right">
            <a href="#contactPage" title="Contact" class="site-page__trigger"><i class="fa fa-envelope"></i></a>
        </div>
        <div class="nav-close">
            <a href="#" title="Close" class="site-page__close"><i class="fa fa-times-circle"></i></a>
        </div> -->


        <figure class="bg-wrapper">
<!--             <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-3.jpg" alt=""> -->

            <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg3.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg5.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg4.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg6.jpg" alt="">
        </figure>

        <!--[if lte IE 8]><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->


        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/flipclock.min.js"></script>

        <!--[if gt IE 8]><!-->
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.easypiechart.min.js"></script>
        <!--<![endif]-->

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/main.min.js"></script>

        <!--[if lte IE 9]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Google Analytics code goes below this line -->

</body>
</html>
';

}elseif($serialise['timer_choose'] && $serialise['timer_choose'] == 'timer6'){

$value['html'] = '
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><{$sitename}></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/loader.min.css"/>
        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/main.min.css"/>

        <link rel="stylesheet" href="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/styles/custom.css">

        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/modernizr.custom.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!--[if lte IE 8]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/respond.min.js"></script>
        <![endif]-->

        <script>
            var now = new Date();
            startDate = now.setDate(now.getDate() - 63);
            targetDate = now.setDate(now.getDate() + 89) - 32810000;
            var miniGoOptions = {
                theme: {
                    // Set to true to add a translucent background behind each page
                    contentBackground: false
                },

                countdown: {
                    // Possible options are "default" or "piechart"
                    type: "piechart",
                    // The date when the countdown started. Used by the progress bars. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    startDate: new Date(startDate),
                    // The target date we"re counting down to. 24 Hour format (00 to 23): Month Day, Year Hours:Minutes
                    targetDate: new Date(targetDate)
                },

                background: {
                    // Main background color
                    color: "#000",
                    // Path to pattern overlay or empty if not needed. Use "" for empty.
                    patternOverlay: "",
                    // Sets the opacity of the pattern overlay. 0 is completely transparent, 1.0 is fully opaque.
                    patternOverlayOpacity: 0.3,
                    // Possible options are "slideshow" or "video". Enter "" if no slideshow/video is desired as background.
                    type: "",

                    slideshow: {
                        // Type of transition effect. Possible options are "kenburns", "fade" or "continuousFade".
                        type: "kenburns",
                        // Time in seconds between image changes
                        duration: 10,

                        // Ken Burns animation settings
                        kenburns: {
                            // Minimum and maximum scale of the image. It will be randomized for every frame.
                            minScale: 1.2,
                            maxScale: 1.7,
                            // Minimum and maximum movement of the image, in percent. It will be randomized for every frame. Note that this is also limited by the scale because the image needs to stay within the viewport.
                            minMove: 5,
                            maxMove: 15
                        }
                    },

                    video: {
                        // Possible options are "local" or "youtube"
                        source: "local",
                        // Fallback image for browsers that can"t play video
                        imageFallback: "<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bgvideo.jpg",
                        // Sets the volume of the video. Value range 0 to 100.
                        volume: 0,

                        // Configure the video files if you selected "local" as video source
                        localFiles: {
                            // H.264 (mp4) video format file. This one is required because we use it to fall back to Flash playback when HTML5 video support is missing. For example, Firefox only supports this format on Windows so on other systems it will fallback to Flash playback which is a bit slower.
                            mp4: "video/bg.mp4",
                            // Optional. OGG Video is optional but useful because it"s played natively by Firefox on OSX and Linux. Enter "" if you don"t have this format.
                            ogg: "video/bg.ogv",
                            // Optional. WebM files are generally smaller and faster than H.264 and are played by Chrome, Firefox, Opera and Android browsers (which also support H.264)
                            webm: "video/bg.webm",
                        },

                        youtube: {
                            // Enter the URL of the Video or Playlist
                            url: "http://www.youtube.com/watch?v=ab0TSkLe-E0",

                            // The options below allow you to play only a part of a video. For playlists it will only work for the first video.
                            // If you dont"t want the video to start from the very beginning, enter the time offset in seconds.
                            startAt: 0,
                            // If you dont"t want the video to end at the very end, enter the time offset FROM THE BEGINNING of the video, in seconds. Otherwise leave it at 0.
                            endAt: 200,
                        }
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="loader">
            <img class="loader-logo" src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
            <div class="bubblingG">
                <span id="bubblingG_1"></span>
                <span id="bubblingG_2"></span>
                <span id="bubblingG_3"></span>
            </div>
        </div>

        <div class="site-wrapper">
            <div class="site-page site-front site-page--active">

                <div class="grid">
                    <div class="grid__item one-whole push--bottom">
                        <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/logo.png" width="141" height="141" alt="MiniGO">
                    </div>

                    <div class="grid__item one-whole">
                        <h3>Welcome to Theme Builder, a clean, modern coming soon template.</h3>
                    </div>

                    <div class="grid__item one-whole">
                        <div class="clock" data-labels="Days,Hours,Minutes,Seconds"></div>
                    </div>

                    <div class="grid__item one-whole push--top">
                        <div class="form-flip push--top">
                            <button class="form-flip__enabler btn btn--full">Get Notified</button>

                            <div class="form-flip__target">
                                <form class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                                    <div class="input-group">
                                        <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                                        <div class="input-group-addon">
                                            <button class="btn btn--font-black" type="submit" autocomplete="off"><span>GO</span><i class="form-spinner fa fa-spinner"></i></button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="subscribe">

                                    <input type="text" name="important-info">
                                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                                </form>
                            </div>

                            <button class="form-flip__close btn btn--full">Got it, thank you</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aboutPage" class="site-page site-page--from-left">
                <h1>Who we are</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget nibh at libero fringilla adipiscing nec ut leo. Etiam nec purus arcu. Morbi sollicitudin at risus id malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam sed tincidunt arcu. Donec molestie ante sapien, sed molestie est euismod eget. Maecenas ac metus accumsan, scelerisque massa sed, porta est. Aliquam ut mollis mi. Cras id vulputate purus, ac sollicitudin ante.</p>

                <p>Integer condimentum eu lectus quis semper. Sed id metus magna. Morbi ultrices magna id euismod hendrerit. Pellentesque nec mattis odio, vitae laoreet metus. Sed eget sollicitudin est, vitae accumsan nisi. Fusce consequat imperdiet venenatis. Integer mollis hendrerit facilisis. Praesent vel mattis enim. Integer fringilla et urna vitae rutrum.</p>
            
			<form action="<{$xoops_url}>/user.php" method="post">
							Username:  <input type="text" name="uname" size="12" value="" />
							Password:  <input type="password" name="pass" size="12" />
									<input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />
									<input type="hidden" name="xoops_login" value="1" />
									<input type="submit" value="User Login" />
						</form> 
			</div>

            <div id="contactPage" class="site-page site-page--from-right">
                <h1>Get in touch</h1>

                <div class="grid">
                    <div class="grid__item one-whole">
                        <div class="contact-info"><i class="fa fa-phone"></i>+41 078 7549690</div>
                        <div class="contact-info"><i class="fa fa-envelope-o"></i><a href="mailto:mail@website.web">mail@website.web</a></div>
                    </div>
                    <div class="grid__item one-whole push-half--top">
                        <div class="contact-info"><i class="fa fa-map-marker"></i>354 Rue du Temple 2610 Neuchatêl, Suisse</div>
                    </div>
                </div>

                <form id="contactForm" data-msg-success="Message sent!" class="form-ajax" data-success-response="success" action="mailListHandler.php" method="post">
                    <div class="grid">
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="name" type="text" placeholder="Your name" data-msg-required="This field is required." required>
                        </div>
                        <div class="grid__item one-half palm-one-whole push--top">
                            <input class="text-input" name="email" type="email" placeholder="Your e-mail address" data-msg-required="This field is required." data-msg-email="Please enter a valid email address." required>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <textarea rows="6" name="message" placeholder="Message" data-msg-required="This field is required." required></textarea>
                        </div>
                        <div class="grid__item one-whole push--top">
                            <button class="btn btn--font-bold" type="submit" autocomplete="off"><span>SEND MESSAGE</span><i class="form-spinner fa fa-spinner"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="contact">

                    <input type="text" name="important-info">
                    <!-- Don"t remove the above field. It is a decoy to prevent spam -->
                </form>
            </div>
        </div>

        <div class="nav-social">
            <a href="#" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Like us on Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" title="Join us on LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="#" title="Pinterest Pinboard"><i class="fa fa-pinterest"></i></a>
            <a href="#" title="Our works on Dribbble"><i class="fa fa-dribbble"></i></a>
        </div>

        <div class="nav-left">
            <a href="#aboutPage" title="About" class="site-page__trigger"><i class="fa fa-info-circle"></i></a>
        </div>
        <div class="nav-right">
            <a href="#contactPage" title="Contact" class="site-page__trigger"><i class="fa fa-envelope"></i></a>
        </div>
        <div class="nav-close">
            <a href="#" title="Close" class="site-page__close"><i class="fa fa-times-circle"></i></a>
        </div>


        <figure class="bg-wrapper">
            <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/slideshow-3.jpg" alt="">

            <!-- <img src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg1.jpg" alt="Optional alt text goes here">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg3.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg2.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg5.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg4.jpg" alt="">
            <img data-src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/img/bg6.jpg" alt=""> -->
        </figure>

        <!--[if lte IE 8]><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->


        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/flipclock.min.js"></script>

        <!--[if gt IE 8]><!-->
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.easypiechart.min.js"></script>
        <!--<![endif]-->

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/main.min.js"></script>

        <!--[if lte IE 9]>
        <script src="<{$xoops_url}>/themes/themebuilder/extra_theme_templete/systeme_siteclosed/assets/scripts/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Google Analytics code goes below this line -->

</body>
</html>
';
}


							$src1 = dirname(__FILE__).'\copythemebuilder';
							$dst1 = str_replace('modules\system\admin\themebuilder\copythemebuilder', 'themes\themebuilder', $src1);
								echo 'template enregistré avec succes';
								$fichierthemehtmlamodifier = $dst1.'\modules\system\system_siteclosed.html';
								//echo $src1;
								//echo $fichierthemehtmlamodifier;
														
								$f = @fopen($fichierthemehtmlamodifier, 'w+');
								$flag = false;
								if ($f) {
										fputs($f, $value['html']."\n");
									echo ' <br>system_siteclosed.html est a jour';
										$flag = true;
								  @fclose($f);
								}else{
									echo ' <br>probleme avec fopen system_siteclosed.html';
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



////					
																		
																		
																		
																		
																		
																		
																		
																}else{
																	$message=""._AM_SYSTEM_THEMEBUILDER_ProblememodificationCSSExtra."";
																}		
		//echo $message;
		//redirect_header("admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=sytem_siteclosed", 5, $message);
			//			exit();		
		}
		
		
		
		
				global $xoopsDB;
							$templetebuilderid = (isset($_POST['templetebuilderid'])) ? $_POST['templetebuilderid'] : $_GET['templetebuilderid'];
							//$templetebuilderidf = (isset($_POST['templetebuilderidf'])) ? $_POST['templetebuilderidf'] : $_GET['templetebuilderidf'];

				$sql = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'system_siteclosed'";
	$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sql ) );
	$unserialise = unserialize($css_arr['conf_value']);
	//var_dump($unserialise);
	//var_dump($templetebuilderid);
									
if ( $templatedelid == $templetebuilderid) {
echo 'ddddddeeeeeelllllllll';

	//if(isset($_POST['reset']) && $_POST['reset'] == ''.$form.'_Reset'){

							$ok = (isset($_GET['ok']) && $_GET['ok'] == 1) ? intval($_GET['ok']) : 0;
							
						if ($ok == 1){
								
								global $xoopsDB;
								$fichierthemehtmlamodifier = '../../themes/themebuilder/builder_tpl/'.$form.'_tpl.html';
								$fichierthemehtmloriginal = '../../themes/themebuilder/builder_tpl/system_homepage_tpl.html';
															$sqlt = "SELECT * FROM ".$xoopsDB->prefix("config_theme")." WHERE conf_name = 'default_template'";
															$css_arr = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlt ) );

								$new = $css_arr['conf_value'];
								//var_dump($new);

									$sqltemplate = "UPDATE " . $xoopsDB -> prefix('config_theme') . " SET conf_value = '".$new."' WHERE conf_name = '".$form."'";

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
								if( $_GET['templatedelid'] == 'default_template' ){
									$message = 'oops c\'pas possible de supprimer cette template pour le moment soooon peut etre <br> you can add or modifiy element';
									redirect_header("admin.php?fct=themebuilder&op=ThemeBuilder", 4, $message);
									exit();
								
								}else{
							//var_dump($_GET['templatedelid']);
							xoops_confirm(array('ok' => 1), 'admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid='.$form.'&ok=1', 'la suppression de cette template signifie que le template par defaut qui sera actif pour ce module ', 'Confirmer');

								}
						}			
	
	//}	
}			

									
									 if ( $templetebuilderid == 'sytem_siteclosed') {	
										
										echo 'sytem_siteclosed';
											
	$bgStyle = array(
		'linearBottom' => 'Linear Bottom',
		'linearBottomRight' => 'Linear Bottom Right',  		    
		'linearBottomLeft' => 'Linear Bottom Left',	    
		'linearRight' => 'Lnear Right',		    
		'linearLeft' => 'Linear Left',		    
		'linearTopRight' => 'Linear Top Right',	    
		'linearTop' => 'Linear Top',		    
		'linearTopLeft' => 'Linear Top Left',	    
		'circularTopLeft' => 'Circular Top Left',		
		'circularTopCenter' => 'Circular Top Center',	
		'circularTopRight' => 'Circular Top Right',		
		'circularMiddleLeft' => 'Circular Middle Left',	
		'circularMiddleCenter' => 'Circular Middle Center',	
		'circularMiddleRight' => 'Circular Middle Right',	
		'circularBottomLeft' => 'Circular Bottom Left',	
		'circularBottomCenter' => 'Circular Bottom Center',	
		'circularBottomRight' => 'Circular Bottom Right',	
		'ellipticalTopLeft' => 'Elliptical Top Left',		
		'ellipticalTopCenter' => 'Elliptical Top Center',		
		'ellipticalTopRight' => 'Elliptical Top Right',		
		'ellipticalMiddleLeft' => 'Elliptical Middle Left',	
		'ellipticalMiddleCenter' => 'Elliptical Middle Center',	
		'ellipticalMiddleRight' => 'Elliptical Middle Right',	
		'ellipticalBottomLeft' => 'Elliptical Bottom Left',	
		'ellipticalBottomCenter' => 'Elliptical Bottom Center',	
		'ellipticalBottomRight' => 'Elliptical Bottom Right',
	);

	$animationEasing = array(
		'linear' => 'linear',
		'swing' => 'swing',
		'easeInQuad' => 'easeInQuad',
		'easeOutQuad' => 'easeOutQuad',
		'easeInOutQuad' => 'easeInOutQuad',
		'easeInCubic' => 'easeInCubic',
		'easeOutCubic' => 'easeOutCubic',
		'easeInOutCubic' => 'easeInOutCubic',
		'easeInQuart' => 'easeInQuart',
		'easeOutQuart' => 'easeOutQuart',
		'easeInOutQuart' => 'easeInOutQuart',
		'easeInQuint' => 'easeInQuint',
		'easeOutQuint' => 'easeOutQuint',
		'easeInOutQuint' => 'easeInOutQuint',
		'easeInExpo' => 'easeInExpo',
		'easeOutExpo' => 'easeOutExpo',
		'easeInOutExpo' => 'easeInOutExpo',
		'easeInSine' => 'easeInSine',
		'easeOutSine' => 'easeOutSine',
		'easeInOutSine' => 'easeInOutSine',
		'easeInCirc' => 'easeInCirc',
		'easeOutCirc' => 'easeOutCirc',
		'easeInOutCirc' => 'easeInOutCirc',
		'easeInElastic' => 'easeInElastic',
		'easeOutElastic' => 'easeOutElastic',
		'easeInOutElastic' => 'easeInOutElastic',
		'easeInBack' => 'easeInBack',
		'easeOutBack' => 'easeOutBack',
		'easeInOutBack' => 'easeInOutBack',
		'easeInBounce' => 'easeInBounce',
		'easeOutBounce' => 'easeOutBounce',
		'easeInOutBounce' => 'easeInOutBounce',
	);
	
		$socialIcons = array(
		'twitter','google-plus','skype','vimeo-square','facebook','dropbox','flickr','gmail','myspace','youtube','yahoo','blogger','instagram','dribbble','linkedin','pinterest','googledrive','spotify','feedburner','delicious','picasa','wordpress','shopify','wikipedia','skydrive'
	);
	
									$background_pattern = array(
										'none' => 'none',
										'pattern1' => 'pattern1',
										'pattern2' => 'pattern2',
										'pattern3' => 'pattern3',
										'pattern4' => 'pattern4',
										'pattern5' => 'pattern5',
										'pattern6' => 'pattern6',
										'pattern7' => 'pattern7',
									);
									
									
									$background_background = array(
										'none' => 'none',
										'background1.jpg' => 'background1.jpg',
										'maple_leaf_2-wallpaper-1680x1260.jpg' => 'maple_leaf_2-wallpaper-1680x1260.jpg',
										'Cupid-Fairy-Wallpaper-1680X1260.jpg' => 'Cupid-Fairy-Wallpaper-1680X1260.jpg',
										'Couleur-Wallpaper-Style-fond-1260x1680.jpg' => 'Couleur-Wallpaper-Style-fond-1260x1680.jpg',
										
									);
									
									$timer_choose = array(
										
										'timer1' => 'timer1',
										'timer2' => 'timer2',
										'timer3' => 'timer3',
										'timer4' => 'timer4',
										'timer5' => 'timer5',
										'timer6' => 'timer6',
										
									);
								
							
		$options = array();
		
		$options[] = array(
			'name' => 'form',
			'type' => 'form',
			"method"=>"post",
			"action"=>"?fct=themebuilder&op=templetebuilder&templetebuilderid=sytem_siteclosed",
		);

		$options[] = array(
			'name' => 'Date',
			'desc' => 'Set the date at which the countdown expires (format: mm/dd/yyyy)',
			'id' => 'date_count',
			'std' => '01/01/2015',
			'class' => 'mini',
			'type' => 'text'
		);
		
		$options[] = array(
			'name' => 'Time',
			'desc' => 'Set the time at which the countdown expires (format: hh:mm)',
			'id' => 'time_count',
			'std' => '00:00',
			'class' => 'mini',
			'type' => 'text'
		);
		
		
		$options[] = array(
			'name' => 'timer choose',
			'desc' => 'Select timer',
			'id' => 'timer_choose',
			'std' => 'timer1',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $timer_choose
		);
		
		/* $options[] = array(
			'name' => 'Subscribe form',
			'desc' => 'Show / Hide subscribe form',
			'id' => 'show_form',
			'std' => '1',
			'type' => 'checkbox'
		); */	
		
		$options[] = array(
			'name' =>  'Background start',
			'id' => 'background_start',
			'std' => '#3CEAEE',
			'type' => 'color' 
		);	
		
		$options[] = array(
			'name' =>  'Background end',
			'id' => 'background_end',
			'std' => '#0d4266',
			'type' => 'color' 
		);	
		
		$options[] = array(
			'name' => 'Background style',
			'desc' => 'Select background style color',
			'id' => 'background_style',
			'std' => 'circularMiddleCenter',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $bgStyle
		);

		$options[] = array(
			'name' => 'Background style',
			'desc' => 'Select background',
			'id' => 'background_background',
			'std' => 'circularMiddleCenter',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $background_background
		);		
	 
		$options[] = array(
			'name' => 'Background style',
			'desc' => 'Select pattern',
			'id' => 'background_pattern',
			'std' => 'circularMiddleCenter',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $background_pattern
		);
		

		$options[] = array(
			'name' => 'Animation effects',
			'desc' => 'Select animation easing for loading theme <a target="_blank" href="http://api.jqueryui.com/resources/easing-graph.html">more</a>',
			'id' => 'animation_easing',
			'std' => 'linear',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $animationEasing
		); 

		

		$options[] = array(
			'name' => 'Site logo',
			'desc' => 'Show / Hide site logo',
			'id' => 'show_logo',
			'std' => '1',
			'type' => 'checkbox'
		);
		

		$options[] = array(
			'name' => 'Upload logo',
			'id' => 'upload_logo',
			//'std' => $imagepath.'logo.png',
			'type' => 'upload'
		);
		
		
		
		$options[] = array(
			'name' => 'Google Analytics',
			'desc' => 'Your Google Analytics Account ID (format: XX-0000000-0)',
			'id' => 'google_anl',
			'class' => 'mini',
			'std' => '',
			'type' => 'text'
		);
		

		/* Social icon */
		
		foreach ($socialIcons as $icon){	
		
			$options[] = array(
				'name' => '<span class="fa-icon-'.$icon.' fa-icon-2x fa-icon-spin" ></span>'.$icon,
				'desc' => 'Set your url', $icon,
				'id'=> 'social_icon_'.$icon,
				'std' => '',
				'type' => 'text'
			);	
		}

		
		
		
		$options[] = array(
			//'name' => '<img src="'.$imagepath.'icon/MailChimp_logo.png" width="80%" alt="Mailchimp"/>',
			'desc' => 'Enable / disable save emails in Mailchimp.',
			'id' => 'mc_status',
			'type' => 'checkbox'
		);	
		
		$options[] = array(
			'name' => 'API key',
			'desc' => 'Your API key <a target="_blank" href="http://admin.mailchimp.com/account/api">from here</a>',
			'id' => 'mc_apikey',
			'std' => '',
			'type' => 'text'
		);

		$options[] = array(
			'name' => 'List name',
			'desc' => 'List unique id <a target="_blank" href="http://admin.mailchimp.com/lists/">from here</a>',
			'id' => 'mc_listid',
			'std' => '',
			'type' => 'text'
		);
	
		$options[] = array(
			'name' => 'CSV File',
			'desc' => 'Enable / disable save emails in CSV file. <a target="_blank" href="../../themes/themebuilder/extra_theme_templete/systeme_siteclosed/mails_00000.csv">from here</a>',
			'id' => 'csv_status',
			'std' => 1,
			'type' => 'checkbox'
		);
	
		$options[] = array(
			'name' => 'Error saving',
			'desc' => 'Enable / disable. <a target="_blank" href="../../themes/themebuilder/extra_theme_templete/systeme_siteclosed/error_log.txt">from here</a>',
			'id' => 'err_send',
			'type' => 'checkbox'
		);
		
		
		
		
		
		$options[] = array(
			'name' => 'submitextra',
			"value"=>""._AM_SYSTEM_THEMEBUILDER_Submit."",
			'type' => 'submit',
		);
		
		$options[] = array(
			'name' => 'form',
			'type' => 'form1',
		);
									
					
//echo olivee_builder_templete();



foreach ( $options as $value ) {


		$val = '';
		$select_value = '';
		$checked = '';
		$output = '';

		
		// Wrap all options

			// Keep all ids lowercase with no spaces
			$value['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower( $value['id'] ) );

			$id = 'section-' . $value['id'];

			/*$class = 'section';
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div id="' .  $id  .'" class="' . $class . '">'."\n";

			if ( $value['type'] != 'editor' ) {
				$output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
			}
			else {
				$output .= '<div class="option">' . "\n" . '<div>' . "\n";
			}*/
		
		
		
		// Set default value to $val
		if ( isset( $value['std'] ) ) {
			$val = $value['std'];
		}

		// If the option is already saved, ovveride $val
			if ( isset( $unserialise[($value['id'])]) ) {
				$val = $unserialise[($value['id'])];
				// Striping slashes of non-array options
				if ( !is_array($val) ) {
					$val = stripslashes( $val );
				}
			}

		// If there is a description save it for labels
		$explain_value = '';
		if ( isset( $value['desc'] ) ) {
			$explain_value = $value['desc'];
		}

		switch ( $value['type'] ) {

		
		case "form": 
					$output .= '    <!-- Bootstrap core and Font Awesome CSS -->
    <link href="<{$xoops_url}>/themes/themebuilder/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="admin/themebuilder/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder/js/colorpicker.js"></script>

<table><form method="'. $value['method'].'" action="'. $value['action'].'">';
							
					break;
				
		
		// Basic text input
		case 'text':
			$output .= '
			
			<tr>
																	<td class="head" style="padding-left: 15px; font-family:Arial; font-size: 10px;">'.$value['name'].': ' .  $explain_value . '</td>
																	<td class="even">
			<input id="' .  $value['id']  . '" class="of-input" name="' .  $option_name . '' . $value['id'] . '" type="text" value="' .  $val  . '" />
			</td>
			</tr>
			';
			break;
		
		// Password input
		case 'password':
			$output .= '<input id="' .  $value['id']  . '" class="of-input" name="' .  $option_name . '' . $value['id'] . '" type="password" value="' .  $val  . '" />';
			break;

		// Textarea
		case 'textarea':
			$rows = '8';

			if ( isset( $value['settings']['rows'] ) ) {
				$custom_rows = $value['settings']['rows'];
				if ( is_numeric( $custom_rows ) ) {
					$rows = $custom_rows;
				}
			}

			$val = stripslashes( $val );
			$output .= '			
			<tr>
																	<td class="head" style="padding-left: 15px; font-family:Arial; font-size: 10px;">'.$value['name'].': ' .  $explain_value . '</td>
																	<td class="even"><textarea id="' .  $value['id']  . '" class="of-input" name="' .  $option_name . '' . $value['id'] . '" rows="' . $rows . '">' .  $val  . '</textarea>
																	</td>
																	</tr>';
			break;

		// Select Box
		case 'select':
			$output .= '			
			<tr>
			<td class="head" style="padding-left: 15px; font-family:Arial; font-size: 10px;">'.$value['name'].': ' .  $explain_value . '</td>
			<td class="even"><select class="of-input" name="' .  $option_name . '' . $value['id'] . '" id="' .  $value['id']  . '">';
//var_dump($value['std']);
//var_dump($unserialise);
			foreach ($value['options'] as $key => $option ) {
				$selected = '';
				if ( $val != '' ) {

					if ( $val == $key) { $selected = ' selected="selected"';}
				}
				$output .= '<option'. $selected .' value="' .  $key  . '">' .  $option  . '</option>';
			}
			$output .= '</select>
			</td>
			</tr>';
			break;


		// Radio Box
		case 'radio':
			$name = $option_name .'['. $value['id'] .']';
			foreach ($value['options'] as $key => $option) {
				$id = $option_name . '-' . $value['id'] .'-'. $key;
				$output .= '<input class="of-input of-radio" type="radio" name="' .  $name  . '" id="' .  $id  . '" value="'.  $key  . '"  /><label for="' .  $id  . '">' .  $option  . '</label>';
			}
			break;

		// Image Selectors
		case 'images':
			$name = $option_name .'['. $value['id'] .']';
			foreach ( $value['options'] as $key => $option ) {
				$selected = '';
				$checked = '';
				if ( $val != '' ) {
					if ( $val == $key ) {
						$selected = ' of-radio-img-selected';
						$checked = ' checked="checked"';
					}
				}
				$output .= '<input type="radio" id="' .  $value['id'] .'_'. $key . '" class="of-radio-img-radio" value="' .  $key  . '" name="' .  $name  . '" '. $checked .' />';
				$output .= '<div class="of-radio-img-label">' .  $key  . '</div>';
				$output .= '<img src="' .  $option  . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. $value['id'] .'_'. $key .'\').checked=true;" />';
			}
			break;

		// Checkbox
		case 'checkbox':
		
			if ( $val != '' ) {
					if ( $val == 'on' ) {
						$checked = ' checked="checked"';
					}
				}
		
			$output .= '			
			<tr>
				<td class="head" style="padding-left: 15px; font-family:Arial; font-size: 10px;">'.$value['name'].': ' .  $explain_value . '</td>
				<td class="even">';
				$output .= '<input id="' .  $value['id']  . '" class="checkbox of-input" type="checkbox" name="' .  $option_name . '' . $value['id'] . '" '.$checked.'  />
				</td>
			</tr>';
			break;

		// Multicheck
		case 'multicheck':
			foreach ($value['options'] as $key => $option) {
				$checked = '';
				$label = $option;
				$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

				$id = $option_name . '-' . $value['id'] . '-'. $option;
				$name = $option_name . '' . $value['id'] . '[' . $option .']';

				if ( isset($val[$option]) ) {
					//$checked = checked;
				}

				$output .= '<input id="' .  $id  . '" class="checkbox of-input" type="checkbox" name="' .  $name  . '" ' . $checked . ' /><label for="' .  $id  . '">' .  $label  . '</label>';
			}
			break;

		// Color picker
		case 'color':
			$default_color = '';
			if ( isset($value['std']) ) {
				if ( $val !=  $value['std'] )
					$default_color = ' data-default-color="' .$value['std'] . '" ';
			}
			$output .= '			
			<tr>
				<td class="head" style="padding-left: 15px; font-family:Arial; font-size: 10px;">'.$value['name'].': ' .  $explain_value . '</td>
				<td class="even"><input name="' .  $option_name . '' . $value['id'] . '" id="' .  $value['id']  . '" class="of-color"  type="text"  style="background-color: '.$val.'" value="' .  $val  . '"' . $default_color .' />
				<script type="text/javascript">
				$("#' .  $value['id']  . '").ColorPicker({
	color: "'.$val.'",
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$("#' .  $value['id']  . '").css("backgroundColor", "#" + hex);
		$("#' .  $value['id']  . '").val("#" + hex);
	}
});
</script>
				
				
				</td>
			</tr>
				';
 	
			break;

		// Uploader
		case 'upload':
			
			
			break;


		// Background
		case 'background':

			$background = $val;

			// Background Color
			$default_color = '';
			if ( isset( $value['std']['color'] ) ) {
				if ( $val !=  $value['std']['color'] )
					$default_color = ' data-default-color="' .$value['std']['color'] . '" ';
			}
			$output .= '<input name="' .  $option_name . '' . $value['id'] . '[color]'  . '" id="' .  $value['id'] . '_color'  . '" class="of-color of-background-color"  type="text" value="' .  $background['color']  . '"' . $default_color .' />';

			// Background Image
			if (!isset($background['image'])) {
				$background['image'] = '';
			}
			
			
			$class = 'of-background-properties';
			if ( '' == $background['image'] ) {
				$class .= ' hide';
			}
			$output .= '<div class="' .  $class  . '">';

			// Background Repeat
			$output .= '<select class="of-background of-background-repeat" name="' .  $option_name . '' . $value['id'] . '[repeat]'   . '" id="' .  $value['id'] . '_repeat'  . '">';

			foreach ($repeats as $key => $repeat) {
				$output .= '<option value="' .  $key  . '" >'.  $repeat  . '</option>';
			}
			$output .= '</select>';

			// Background Position
			$output .= '<select class="of-background of-background-position" name="' .  $option_name . '' . $value['id'] . '[position]'  . '" id="' .  $value['id'] . '_position'  . '">';

			foreach ($positions as $key=>$position) {
				$output .= '<option value="' .  $key  . '" >'.  $position  . '</option>';
			}
			$output .= '</select>';

			// Background Attachment
			$output .= '<select class="of-background of-background-attachment" name="' .  $option_name . '' . $value['id'] . '[attachment]'  . '" id="' .  $value['id'] . '_attachment'  . '">';

			foreach ($attachments as $key => $attachment) {
				$output .= '<option value="' .  $key  . '" >' .  $attachment  . '</option>';
			}
			$output .= '</select>';
			$output .= '</div>';

			break;
			
			
		case 'submit':
					$output .= '<tr><td><input type="submit" name="'.$value['name'].'" value="'.$value['value'].'" /></td></tr>';	
			
		case 'form1': 
					$output .= '</form></table>';
							
					break;		
		

			$output .= '</div>';
			if ( ( $value['type'] != "checkbox" ) && ( $value['type'] != "editor" ) ) {
				$output .= '<div class="explain">' .$explain_value. '</div>'."\n";
			}
			$output .= '</div></div>'."\n";

}
		echo $output;
		//var_dump($output);
}									

									}
									
									

									
								$sqly = "SELECT * FROM ".$xoopsDB->prefix("modules")." WHERE name != ''";
									$resulty = $xoopsDB->query($sqly);
								while ( $myrow = $xoopsDB->fetchArray($resulty) ) {
									$variable1 = $myrow['dirname'];
									if ($variable1 == 'system'){
										if ( $templetebuilderid == 'system_homepage') {	
											echo '<fieldset><legend class="label">system_homepage_template</legend>
														<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN1.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN2.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN3.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN4.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN5.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN6.'</span>
														<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN7.'</span>
												</fieldset>';
												
											olivee_wajdi(system_homepage);
										}
									//continue;
									}
									
									if ( $templetebuilderid == $variable1.'_template') {	
									
										echo '<fieldset><legend class="label">'.$variable1.'_template</legend>
													<span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN1.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN2.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN3.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN4.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN5.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN6.'</span>
													<br><span style="color : green;"><img src="../../Frameworks/moduleclasses/icons/16/on.png"> '._AM_SYSTEM_THEMEBUILDER_YOUCAN7.'</span>
												</fieldset>';

										 olivee_wajdi($variable1.'_template');
									}
							
								
								}		

}


function blockbuilder () {

		echo 'add predefined block from theme to xoops not finished yet';
			if(isset($_POST['admin']) && $_POST['admin'] == $form.'_Update'){

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
						//var_dump($item);
						
						}
						if ($item['type'] = 'faq'){
						//var_dump($item);
						
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
						
							 
							 case 'youtube' :

	//var_dump($item['fields']);
	$html['titre'] = $item['fields']['titre'];
	$html['optionblock'] = $item['fields']['video'].'|'.$item['fields']['height'].'|'.$item['fields']['width'];
	$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
	$html['html'] = '<div class="article_video">';
	$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://www.youtube.com/embed/'. $item['fields']['video'] .'?wmode=opaque" frameborder="0" allowfullscreen></iframe>'."\n";
	$html['html'] .= '</div>';
	
							 
							 break;
							 
							 case 'vimeo' :
	
	$html['titre'] = $item['fields']['titre'];
	$html['optionblock'] = $item['fields']['video'].'|'.$item['fields']['height'].'|'.$item['fields']['width'];
	$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
	$html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
	$html['html'] .= '<div class="article_video">';
	$html['html'] .= '<iframe class="scale-with-grid" width="100%" height="'. $item['fields']['height'] .'" src="http://player.vimeo.com/video/'. $item['fields']['video'] .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
	$html['html'] .= '</div></div></div>';

							 
							 break;	
							 
							 
							 case 'image' :
							 
							 
							 $html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['src'].'|'.$item['fields']['link'].'|'.$item['fields']['caption'].'|'.$item['fields']['height'].'|'.$item['fields']['src'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
							 
							 
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
										$html['html']  = '<div class="scale-with-grid wp-caption'. $align . $border .'">';
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
								}
								else 
								{
										$html['html']  = '<div class="scale-with-grid wp-caption no-hover'. $align . $border .'">';
											$html['html'] .= '<div class="photo">';
												$html['html'] .= '<div class="photo_wrapper">';
													$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['src'] .'" style="height:'. $item['fields']['height'] .'px; width:100%;" alt="'. $item['fields']['alt'] .'" />';
												$html['html'] .= '</div>';
											$html['html'] .= '</div>';
											if( $item['fields']['caption'] ) $html['html'] .= '<p class="wp-caption-text">'. $item['fields']['caption'] .'</p>';
										$html['html'] .= '</div>'."\n";
								}							 
							 
							 break;	
							 
							 
							 case 'feature_box' :
							 
							 $html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['background'].'|'.$item['fields']['link'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
							 
							 
							 	if( $item['fields']['target'] ){
									$target = 'target="_blank"';
								} else {
									$target = false;
								}

									$html['html'] = '<div class="feature_box">';
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
							 
							 
							 break;	
							 
							 
							 case 'content' :
							  $html['html'] =  "You are about to live! have a nice time with xoops";
							 break;								 
										
	
						case 'blockquote' :
						
						$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['image'].'|'.$item['fields']['content'].'|'.$item['fields']['author'].'|'.$item['fields']['link'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
						
						
														$html['html'] = '<div class="inner-padding">';
														
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
						
						
						
							 break;								 
						
						
						
						case 'code' :
						
						$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['content'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
						
												$html['html']  = '<div class="inner-padding">';
													$html['html'] .= '<pre>';
														$html['html'] .= htmlspecialchars($item['fields']['content']);
													$html['html'] .= '</pre>'."\n";
												$html['html'] .= '</div>'."\n";
						
							 break;								 
							 
							 case 'article_box' :
							 
							 $html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['image'].'|'.$item['fields']['content'].'|'.$item['fields']['link'].'|'.$item['fields']['link_title'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
							 

															if( $item['fields']['target'] ){
																$target = 'target="_blank"'; 
															} else { 
																$target = false;
															}
															
															$html['html'] = '<div class="article_box">';
																$html['html'] .= '<div class="photo">';
																	$html['html'] .= '<img class="scale-with-grid" src="'. $item['fields']['image'] .'" alt="'. $item['fields']['title'] .'" />';
																$html['html'] .= '</div>';
																$html['html'] .= '<div class="desc">';
																	$html['html'] .= '<h3>'. $item['fields']['title'] .'</h3>';
																	$html['html'] .= '<p>'. $item['fields']['content'] .'</p>';
																	if( $item['fields']['link'] ) $html['html'] .= '<a class="button" href="'. $item['fields']['link'] .'" '. $target .'>'. $item['fields']['link_title'] .' <span>&rarr;</span></a>';
																$html['html'] .= '</div>';
															$html['html'] .= '</div>'."\n";

							 break;	
							 
							 case 'contact_box' :

$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['address'].'|'.$item['fields']['telephone'].'|'.$item['fields']['fax'].'|'.$item['fields']['email'].'|'.$item['fields']['www'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';
		\$form .= 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[3].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[4].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[5].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;							 
															$html['html'] = '<div class="get_in_touch inner-padding">';
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
							break;	

							case 'contact_form' :
							
							$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['title'].'|'.$item['fields']['email'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
														$html['html'] = '<div class="inner-padding">';
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
														 $html['html'] =  '<div class="'. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';	
												         $html['html'] .=  $ret;
														 $html['html'] .= '</div></div>'."\n";
												     }
							 break;	

							case 'soundcloud' :
							$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['url'].'|'.$item['fields']['height'].'|'.$item['fields']['width'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;
													$html['html'] = '<div class="olivee-itemq olivee-itemq-'. $item['type'] .' '. $classes[$item['size']] .'"><div class="olivee-item-contentdiv">';
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
													$html['html'] .= '</div></div>'."\n";
							 break;	

						case 'mapsgoogle' :
								if($item['fields']['content'] != ''){
								$html['titre'] = $item['fields']['titre'];
								$html['optionblock'] = $item['fields']['content'].'|'.$item['fields']['height'].'|'.$item['fields']['width'];
								$html['function'] = "<?php							
		function t_system_".$html['titre']."_show() {
		\$block = array();
		\$block['lang_members'] = 'rrr';
        \$block['lang_guests'] = 'www';
        \$block['lang_more'] = 'aaa';
        return \$block;
		}
		
		
	function t_system_".$html['titre']."_edit(\$options) {
	
		\$form = 'option0<input type=\"text\" name=\"options[]\" value=\"'.\$options[0].'\"><br />';
		\$form .= 'option1<input type=\"text\" name=\"options[]\" value=\"'.\$options[1].'\"><br />';
		\$form .= 'option2<input type=\"text\" name=\"options[]\" value=\"'.\$options[2].'\"><br />';

	
    return \$form;	

		}		
		
		
?>";;													
														$html['html'] =  '<div class="block_map">
																				<div class="block_general_pic" style="padding:0px;">
																					<iframe width="'.$item['fields']['width'].'" height="'.$item['fields']['height'].'" scrolling="no" marginheight="0" marginwidth="0" src="'.$item['fields']['content'].'" style="color:#0000FF;text-align:left; border:0px solid #ddd; padding:5px; background:#fff;"></iframe>
																				</div>
																			</div>';
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
//var_dump($html1);


$new = serialize($items);
global $xoopsDB;
//var_dump($new);
//var_dump($html1);


						
						foreach($html1 as $key => $value){
							$content = $value['html'];
							$tpl_source = addslashes($value['html']);
										  	//var_dump($value['html']);
											//var_dump($value['titre']);
											//var_dump($key);
											//$tpl_source = addslashes($value['html']);

					$sqlk = 'INSERT INTO ' . $xoopsDB -> prefix( 'newblocks' ) . '	(bid, mid, func_num, options, name, title, content, side, weight, visible, block_type, c_type, isactive, dirname, func_file, show_func, edit_func, template, bcachetime, last_modified) ';
					$sqlk .= " VALUES 	('', '0', '0', '".$value['optionblock']."', '".$value['titre']."', '".$value['titre']."', '', '0', '0', '1', 'D', 'H', '1', 'system', 'theme_blocks".$value['titre'].".php', 't_system_".$value['titre']."_show', 't_system_".$value['titre']."_edit', 'theme_block_".$value['titre'].".html', '0', '0')";
						if ( $result = $xoopsDB -> query( $sqlk ) ) {
							echo 'newblocks ok';
							
							$newid = mysql_insert_id();
							if ($newid){
							
									$link_sql = 'INSERT INTO ' . $xoopsDB->prefix('block_module_link') . ' (block_id, module_id) VALUES ('.$newid.', -1)';
									if ($xoopsDB->query($link_sql)){
										echo 'block_module_link ok';
												$link_sql1 = 'INSERT INTO ' . $xoopsDB->prefix('group_permission') . ' (gperm_id, gperm_groupid, gperm_itemid, gperm_modid, gperm_name) ';
												$link_sql1 .= " VALUES ('', '2', '$newid', '1', 'block_read')";
												
												if ($xoopsDB->query($link_sql1)){
													echo 'group_permission ok';
													$link_sql2 = 'INSERT INTO ' . $xoopsDB->prefix('tplfile') . ' (tpl_id, tpl_refid, tpl_module, tpl_tplset, tpl_file, tpl_type) ';
													$link_sql2 .= " VALUES ('', '4', 'system', 'default', 'theme_block_".$value['titre'].".html', 'module')";
														if ($xoopsDB->query($link_sql2)){
															echo 'tplfile ok';
															$newid2 = mysql_insert_id();
															if ($newid2){
																$link_sql3 = 'INSERT INTO ' . $xoopsDB->prefix('tplsource') . ' (tpl_id, tpl_source) VALUES ("'.$newid2.'", "'.$tpl_source.'")';
																	if ($xoopsDB->query($link_sql3)){

																		$file='./blocks/theme_blocks'.$value['titre'].'.php';
																		$handle=fopen($file, 'w+');
																		if($handle){
																			echo 'tplsource ok';
																			fwrite($handle, $value['function']);
																			fclose($handle);
																		}
																	}
															
															}
														
														}
												
												
												}
																
																
									}
							}
						}
					}

					




								
	}
		
		
		
		
			if (!function_exists('olivee_meta_field_input')) {
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
				if (file_exists(dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php')) { 
					require_once( dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php' );
					//echo dirname(__FILE__) .'/fields/'.$field['type'].'/field_'.$field['type'].'.php';
				}else{echo 'probleme include class file';}

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
}

if (!function_exists('olivee_get_sliders')) {
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
}

if (!function_exists('olivee_get_menus')) {
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
}

if (!function_exists('olivee_get_idblock')) {
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
}

if (!function_exists('olivee_builder_item')) {
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
}

	$olivee_std_items = array(

		
		// Article box  --------------------------------------------
		'article_box' => array(
			'type' => 'article_box',
			'title' => 'Article box', 
			'size' => '1/4',
			'fields' => array(
			
			array(
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
				array(
					'id' => 'content',
					'type' => 'textarea',
					'title' => 'Content',
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
	
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
		
		
		
		'Slider' => array(
			'type' => 'Slider',
			'title' => 'Slider', 
			'size' => '1/4', 
			'fields' => array(
			
			array(
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
					'id' => 'titre',
					'type' => 'text',
					'title' => 'titre de ce block',
					'desc' => 'block title to add bd avoid problem</b>',
				),
		
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
		
			echo '

<link rel="stylesheet" type="text/css" media="all" href="admin/themebuilder/build.css" />
	<script src="admin/themebuilder/overlay.js"></script>
	<script src="admin/themebuilder/template.js"></script>
	<link rel="stylesheet" href="admin/themebuilder/js/colorpicker.css" type="text/css" />
	<script type="text/javascript" src="admin/themebuilder/js/colorpicker.js"></script>
	
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
									<option value="">&mdash; Select &mdash;</option>	';	
									
										foreach( $olivee_std_items as $item ){
											echo '<option value="'. $item['type'] .'">'. $item['title'] .'</option>';
										}
									echo '
								</select>
								<a class="btn-blue olivee-add-btn" href="javascript:void(0);">Add item</a><br>
								<span class="description">Choose an element and click the Add Item button</span>
							</td>
						</tr>
						<tr>
							<td>

<div class="xo-buttons">

				    </div>
</div>
							</td>
						</tr>	
					</tbody>
				</table>
			</div>
				
			<form id="pass" name="pass" method="post" action="">
			<div id="olivee-items" class="clearfix">
			';
				
					foreach( $olivee_std_items as $item )
					{
						olivee_builder_item( $item );
					}
				echo '
			</div>

			<div id="olivee-desk" class="clearfix">';
			
				
				/*
				global $xoopsDB;
									$sqlr = "SELECT * FROM ".$xoopsDB->prefix("newblocks")." WHERE block_type = 'D'";
									$head_arrl = $xoopsDB -> fetchArray( $xoopsDB -> query( $sqlr ) );
									$olivee_tmp_fn = $head_arrl['conf_value'];
									$olivee_items = unserialize($olivee_tmp_fn);
				var_dump($olivee_items);
					if( is_array($olivee_items) )
					{
						foreach( $olivee_items as $item )
						{
						
							olivee_builder_item( $olivee_std_items[$item['type']], $item );
						}
					}else{
					}*/
				
			echo '
			</div>
			
			<input type="submit" name="admin" id="admin" value="'. $form.'_Update" />
			<input name="'. $form.'_Reset" onclick="location = "admin.php?fct=themebuilder&op=templetebuilder&templatedelid='.$form.'" type="button" value="'.$form.'_Reset">

		</form>
		</div>
		<div id="olivee-popup">
			<a href="javascript:void(0);" class="olivee-btn-close olivee-popup-close"><em>close</em></a>	
			<a href="javascript:void(0);" class="olivee-popup-save">Save changes</a>	
		</div>
	</div>
		';

}



?>