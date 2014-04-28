<?php
class OLIVEE_Options_radio_img{
	
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
		
		$class = ( isset( $this->field['class'])) ? 'class="'.$this->field['class'].'" ' : '';
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		echo "<script type='text/javascript' src='admin/themebuilder/fields/radio_img/field_radio_img.js' ></script>";
		
		echo '<fieldset>';
			foreach($this->field['options'] as $k => $v){
				echo '<div class="olivee-radio-item">';
					//$selected = (checked($this->value, $k, false) != '')?' olivee-radio-img-selected':'';
					echo '<label class="olivee-radio-img'.$selected.' olivee-radio-img-'.$this->field['id'].'" for="'.$this->field['id'].'_'.array_search($k,array_keys($this->field['options'])).'">';
						echo '<input type="radio" id="'.$this->field['id'].'_'.array_search($k,array_keys($this->field['options'])).'" name="'. $name . '" '.$class.' value="'.$k.'" />';
						echo '<img src="'.$v['img'].'" alt="'.$v['title'].'" onclick="jQuery:OLIVEE_radio_img_select(\''.$this->field['id'].'_'.array_search($k,array_keys($this->field['options'])).'\', \''.$this->field['id'].'\');" />';
					echo '</label>';
					echo '<span>'.$v['title'].'</span>';
				echo '</div>';
			}
			echo (isset($this->field['desc']) && !empty($this->field['desc']))?'<br style="clear:both;"/><span class="description">'.$this->field['desc'].'</span>':'';
		echo '</fieldset>';
		
	}

	
}
?>