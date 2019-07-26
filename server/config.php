<?php  
/*

CONFIGURAÇÕES DA APLICAÇÃO EM GERAL


*/

//CAMINHOS PARA RENDENIZAR OS ARQUÍVOS
define ("PATHS",[
	"agenda" => "./public/agenda.php",
	"login"  => "./public/login.php",
	"cadastro" => "./public/cadastro.php"

]);

//CONFIGURAÇÕES DO BANCO
define ("DATABASE",[

	"host"     => "",
	"port"     => "",
	"dbname"   => "",
	"user"     => "",
	"password" => ""
]);

//escolha uma palavra secreta para usar junto as senhas criptografadas.
//será usada tanto no cadastro quanto nos logins
define ("SECRETKEY","hkbsc");

