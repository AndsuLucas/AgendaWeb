<?php  

function renderPage(array $paths){
	
	if((!isset($_GET["page"]))or(!array_key_exists($_GET["page"], $paths))) {
		
		
		return $paths["login"];


	}	
	
	$page           = $_GET["page"];
	$sanitized_page = (string) filter_var($page, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_SANITIZE_STRING); 

	return $paths[$sanitized_page];


}