function OLIVEE_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');
	jQuery('.olivee-radio-img-'+labelclass).removeClass('olivee-radio-img-selected');	
	jQuery('label[for="'+relid+'"]').addClass('olivee-radio-img-selected');
}