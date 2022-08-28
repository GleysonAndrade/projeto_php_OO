<?php
session_start(); //Iniciar a sessão
ob_start(); //Limpar Buffer de saida

//Constante que define que o usuário está acessando páginas internas através da página index.php
define('C7E3L8K9E5', true);
//Carregar o composer
require './vendor/autoload.php';

//Instanciar a classe ConfigController, responsável em tratar a URL
$url = new Core\ConfigController();
//Instanciar o método para carregar a página/controller
$url->loadPage();