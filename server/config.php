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
	"host"     => "ec2-54-204-35-248.compute-1.amazonaws.com",
	"port"     => "5432",
	"dbname"   => "dfvl5p5gq2704k",
	"user"     => "yjkduhlcljpzqg",
	"password" => "bbe1208e19d2ecad559c7a6bab6bd53e9f9e5e4597284d395396b6ceb0503da1"
]);

//escolha uma palavra secreta para usar junto as senhas criptografadas.
//será usada tanto no cadastro quanto nos logins
define ("SECRETKEY","hkbsc");