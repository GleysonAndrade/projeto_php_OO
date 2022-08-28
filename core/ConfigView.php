<?php 

namespace  Core;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 *  Carregar as páginas da View
 * 
 * @author Gleyson <email@email.com>
 */
class ConfigView
{
    private string $nameView;
    private ?array $data;

    /**
     * Recebe o endereço da View e os dados
     *
     * @param [type] $nameView Endereço da View   que deve ser carregada
     * @param array $data Dados que a View deve receber
     */
    public function __construct($nameView, $data)
    {
        $this->nameView = $nameView;
        $this->data = $data;
        // var_dump($this->nameView);
        // var_dump($this->data);
    }

    /**
     * Carregar a View
     * Verificar se o arquivo existe, e carregar caso exista, não existindo para o carregamento
     *
     * @return void
     */
    public function loadView(): void
    {
        if(file_exists('app/' . $this->nameView . '.php')){
            include 'app/sts/Views/include/header.php';
            include 'app/sts/Views/include/menu.php';
            include 'app/' . $this->nameView . '.php';
            include 'app/sts/Views/include/footer.php';
        }else{
            die("Error: Por favor tente novamente. Caso o problema persista, entre em contato como a administrador" . EMAILADM);
        }
    }
}
?>