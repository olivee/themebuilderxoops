<?php

function no_accent($str_accent) {
   $pattern = Array("/é/", "/è/", "/ê/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
   // notez bien les / avant et après les caractères
   $rep_pat = Array("e", "e", "e", "c", "a", "a", "i", "i", "u", "o", "");
   $str_noacc = preg_replace($pattern, $rep_pat, $str_accent);
   return $str_noacc;
}


$uploaddir = '../../../../uploads/'; 
$file = $uploaddir . basename($_FILES['uploadfile']['name']);

$file = no_accent($file);
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  //echo "success";
	echo basename($file);
} else {
	echo "error";
}
?>