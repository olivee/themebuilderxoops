<?php
require_once('../config.inc.php');
Header( "HTTP/1.1 301 Moved Permanently" );
Header( "Location: ".$system_url );
?>