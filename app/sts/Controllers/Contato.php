<?php 
namespace Sts\Controllers;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Controller da página Contato
 * 
 * @author Gleyson <email@email.com>
 */
class Contato
{
    /**  @var array $dados Recebe os dados que devem ser enviados para View */
    private ?array $data = null;
    /** * @var array $dataForm Recebe os dados que devem ser enviados para VIEW*/
    private ?array $dataForm; // Começa com array vazio e evita erro
    /**
     * Instanciar a classe responsável em carregar  a View
     *
     * @return void
     */
    public function index(): void
    {
        
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

       if(!empty($this->dataForm['AddContMsg'])){
            unset($this->dataForm['AddContMsg']);
         $createContactMsg = new \Sts\Models\StsContato();
         if($createContactMsg->create($this->dataForm)){
            //echo"Cadastrado!<br>"; //Não se utiliza echo na controller
         }else{
            //echo"Não cadastrado!<br>";
            $this->data['form'] = $this->dataForm;
         }
       } 
    
       $loadView = new \Core\ConfigView("sts/Views/contato/contato", $this->data);
       $loadView->loadView();
    }
}

?>