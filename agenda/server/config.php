<?php  
/*

CONFIGURAÇÕES DA APLICAÇÃO EM GERAL


*/

//CAMINHOS PARA RENDENIZAR OS ARQUÍVOS
define ("PATHS",[
	"agenda" => "./public/agenda.php",
	"login"  => "./public/login.php"

]);

//CONFIGURAÇÕES DO BANCO
define ("DATABASE",[
	"host"     => "localhost",
	"dbname"   => "agenda",
	"charset"  => "utf8",
	"user"     => "root",
	"password" => "password"
]);