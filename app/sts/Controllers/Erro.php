<?php 

namespace Sts\Controllers;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Controller da página Erro
 * 
 * @author Gleyson <email@email.com>
 */
class Erro
{
    /**  @var array $dados Recebe os dados que devem ser enviados para View */
    private array $data;
    /**
     * Instanciar a classe responsável em carregar  a View
     *
     * @return void
     */
    public function index()
    {
       $this->data=[];
       $loadView = new \Core\ConfigView("sts/Views/erro/erro", $this->data);
       $loadView->loadView();
    }
}

?>