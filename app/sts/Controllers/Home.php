<?php

namespace Sts\Controllers;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Controller página Home
 * 
 * @author Gleyson <email@email.com>
 */
class Home
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
       $home = new \Sts\Models\StsHome();
       $this->data['home'] = $home->index();

       $footer = new \Sts\Models\StsFooter();
       $this->data['footer'] = $footer->index();

       $loadView = new \Core\ConfigView("sts/Views/home/home", $this->data);
       $loadView->loadView();
    }
}