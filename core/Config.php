<?php 

namespace Core;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Configurações básicas do site.
 * 
 * @author Gleyson <gleysonandrade199@gmail.com>
 */
abstract class Config
{
    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados.
     * Email do administrador.
     *
     * @return void
     */
    protected function config(): void
    {
        //Url do projeto - colocar o dominio quando tiver no prjeto real
       define('URL', 'http://localhost/cursos/php/site/');
       // define('URLADM', 'http://localhost/cursos/php/site/adm/');
       
       define('CONTROLLER', 'Home');
       define('CONTROLLERERRO', 'Erro');

       //Credenciais do banco de dados
       define('HOST', 'localhost');
       define('USER', 'root');
       define('PASS', '');
       define('DBNAME', 'site');
       define('PORT', 3306);

       define('EMAILADM', 'gleysonandrade19@gmail.com');
    }
}
?>