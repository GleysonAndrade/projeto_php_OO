<?php 

namespace Sts\Controllers;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Controller da página SobreEmpresa
 * 
 * @author Gleyson <email@email.com>
 */
class SobreEmpresa
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
       $aboutCompany = new \Sts\Models\StsSobreEmpresa();
       $this->data['about-company'] = $aboutCompany->index();

       //var_dump($this->data['about-company']);
       
       $loadView = new \Core\ConfigView("sts/Views/sobreEmpresa/sobreEmpresa", $this->data);
       $loadView->loadView();
    }
}

?>