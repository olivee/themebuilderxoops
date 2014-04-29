<?php
class Olivee_Options_color{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){	//$parent
		if( is_object($parent) ) {
			parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		}	
		$this->field = $field;
		$this->value = $value;
	}
	
	/**
	 * Field Render Function.
	*/
	function render(){	
		$class = ( isset($this->field['class']) ) ? $this->field['class'] : '';
		$value = ( $this->value ) ? $this->value : $this->field['std'];

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