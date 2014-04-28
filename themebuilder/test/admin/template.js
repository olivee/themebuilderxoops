	function OliveeBuilder(){

	// Page Template --------------------------------------------------
	var mfn_wrapper = jQuery("#olivee-wrapper");
	var wrapper_builder = jQuery("#olivee-builder");
	var wrapper_switch = jQuery("#olivee-meta-page table tr:first-child");
	
	var desktop = jQuery('#olivee-desk');
	// sortable --------------------------------------------------
	desktop.sortable({ 
		cancel: ".olivee-item-btn",
		forcePlaceholderSize: true, 
		placeholder: 'placeholder'
	});
	
	
	// available items ----------------------------------------
	var items = {
		'accordion'			: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'article_box'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'blockquote'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],		
		'call_to_action'	: [ '1/1' ],		
		'clients'			: [ '1/1' ],
		'code'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'column'			: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'contact_box'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'contact_form'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'content'			: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'divider'			: [ '1/1' ],
		'faq'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'feature_box'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'image'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'latest_posts'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'map'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'offer'				: [ '1/1' ],
		'offer_page'		: [ '1/1' ],
		'our_team'			: [ '1/4', '1/3' ],
		'pricing_item'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'tabs'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'testimonials'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'vimeo'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'youtube'			: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'Blockcolumn'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'Slider'			: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'Menu'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'xoops_banner'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'feed'				: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'soundcloud'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ],
		'mapsgoogle'		: [ '1/4', '1/3', '1/2', '2/3', '3/4', '1/1' ]
	};	
	
	
	// available classes ------------------------------------------
	var classes = {
		'1/4' : 'olivee-item-1-4',
		'1/3' : 'olivee-item-1-3',
		'1/2' : 'olivee-item-1-2',
		'2/3' : 'olivee-item-2-3',
		'3/4' : 'olivee-item-3-4',
		'1/1' : 'olivee-item-1-1'
	};
	
	
	// increase item size --------------------------------------
	jQuery('.olivee-item-size-inc').click(function(){
		var item = jQuery(this).parents('.olivee-item');
		var item_type = item.find('.olivee-item-type').val();
		var item_sizes = items[item_type];
		//alert(items[item_type]);
		for( var i = 0; i < item_sizes.length-1; i++ ){
		
			if( ! item.hasClass( classes[item_sizes[i]] ) ) continue;
			
			item
				.removeClass( classes[item_sizes[i]] )
				.addClass( classes[item_sizes[i+1]] )
				.find('.olivee-item-size').val( item_sizes[i+1] );
			
			item.find('.olivee-item-desc').text( item_sizes[i+1] );
	
			break;
		}	
	});
	
	
	// decrease size ----------------------------------------------
	jQuery('.olivee-item-size-dec').click(function(){
		var item = jQuery(this).parents('.olivee-item');
		var item_type = item.find('.olivee-item-type').val();
		var item_sizes = items[item_type];
		
		for( var i = 1; i < item_sizes.length; i++ ){
			
			if( ! item.hasClass( classes[item_sizes[i]] ) ) continue;
			
			item
				.removeClass( classes[item_sizes[i]] )
				.addClass( classes[item_sizes[i-1]] )
				.find('.olivee-item-size').val( item_sizes[i-1]);
			
			item.find('.olivee-item-desc').text( item_sizes[i-1] );
			
			break;
		}		
	});
	
	
	// add item ----------------------------------------------------
	jQuery('.olivee-add-btn').click(function(){
		var item = jQuery(this).siblings('#olivee-add-select').val();
		var clone = jQuery('#olivee-items').find('div.olivee-item-'+ item ).clone(true);
	
		clone
			.hide()
			.find('.olivee-item-content input').each(function() {
				jQuery(this).attr('name',jQuery(this).attr('class')+'[]');
			});
	
		desktop.append(clone).find(".olivee-item").fadeIn(500);
	});
	
	
	// delete item ----------------------------------------------------
	jQuery('.olivee-item-delete').click(function(){
		var item = jQuery(this).parents('.olivee-item');
		var itemm = item.find('.olivee-item-type').val();
		var test = 'Blockcolumn';
		
		/*if (itemm == test) {
	alert('impossible de supprimer ce block');
 }else{*/
		jQuery.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this item. <br />It cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						item.fadeOut(500,function(){jQuery(this).remove();});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}
				}
			}
		});
		//}
	});
	
	
	var source_item = '';
	
	// popup - edit item ------------------------------------------
	jQuery('.olivee-item-edit').click(function(){
		jQuery('#olivee-content, .form-table').fadeOut(50);
		source_item = jQuery(this).parents('.olivee-item');
		var clone_meta = source_item.find('.olivee-item-meta').clone(true);
	
		jQuery('#olivee-popup')
			.append(clone_meta)
			.fadeIn(500);
		
		source_item.find('.olivee-item-meta').remove();
	});
	
	// popup - close ----------------------------------------------
	jQuery('#olivee-popup .olivee-popup-close, #olivee-popup .olivee-popup-save').click(function(){
		jQuery('#olivee-content, .form-table').fadeIn(500);
		var popup = jQuery('#olivee-popup');
		var clone = popup.find('.olivee-item-meta').clone(true);

		source_item.append(clone);
		
		popup.fadeOut(50);
	
		setTimeout(function(){
			popup.find('.olivee-item-meta').remove();
		},500);
	});		
		
}
	
jQuery(document).ready(function(){
	var olivee_bldr = new OliveeBuilder();
});

// clone fix
(function (original) {
	jQuery.fn.clone = function () {
	    var result = original.apply (this, arguments),
		my_textareas = this.find('textarea, select'),
	    result_textareas = result.find('textarea, select');
	
	    for (var i = 0, l = my_textareas.length; i < l; ++i)
	    	jQuery(result_textareas[i]).val (jQuery(my_textareas[i]).val());
	
	    return result;
	};
}) (jQuery.fn.clone);