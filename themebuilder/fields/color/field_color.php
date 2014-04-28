<?php
class Olivee_Options_color{	
	
	/**
	 * Field Constructor.
	*/
	function __construct($field = array(), $value ='', $parent){	
		if( is_object($parent) ) parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
	}
	
	/**
	 * Field Render Function.
	*/
	function render(){	
		$class = ( isset($this->field['class']) ) ? $this->field['class'] : '';
		$value = ( $this->value ) ? $this->value : $this->field['std'];
				/*echo "<script type='text/javascript' src='admin/themebuilder/fields/color/field_color.js' ></script>";

		
		echo '<div class="farb-popup-wrapper">';
			echo '<input type="text" id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" value="'. $value .'" class="'.$class.' popup-colorpicker"/>';
			echo '<div class="farb-popup"><div class="farb-popup-inside"><div id="'.$this->field['id'].'picker" class="color-picker"></div></div></div>';
			echo '<div class="color-prev prev-'.$this->field['id'].'" style="background-color:'. $value .';" rel="'.$this->field['id'].'"></div>';
			echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		echo '</div>';*/
		
				//var_dump($this->field['id']);
				$tttt = '<input type="text" name="'.$this->args['opt_name'].''.$this->field['id'].'" class="'.$class.'" style="background-color: '. $value .'" value="'.$value .'" />

	<script type="text/javascript">
$(document).ready(function() {
	$(".'.$class.'").ColorPicker({
	color: "'. $value .'",
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$(".'.$class.'").css("backgroundColor", "#" + hex);
		$(".'.$class.'").val("#" + hex);
	}
});
});
</script>';

		echo $tttt;
	}
}
?>