<?php
class OLIVEE_Options_select{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){
		if( is_object($parent) ) parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
	}
	
	/**
	 * Field Render Function.
	*/
	function render( $meta = false ){
		
		$class = ( isset( $this->field['class']) ) ? 'class="'.$this->field['class'].'" ' : '';
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		
		echo '<select name="'. $name .'" '.$class.'rows="6" >';
			if( is_array( $this->field['options'] ) ){
				foreach( $this->field['options'] as $k => $v ){
				
				$selected = ($this->value == $k ? "selected='selected'" : "");
					echo '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
				}
			}
		echo '</select>';
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
		
	}
	
}
?>