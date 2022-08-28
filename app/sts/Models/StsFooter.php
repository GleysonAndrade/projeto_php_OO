<?php

namespace Sts\Models;

//Redirecionar ou parar processamento quando o usuário não acessa o arquivo index.
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    // die("Erro: Página não encontrada");
}

use PDO;

class StsFooter
{
    /** * @var array $data Recebe os registros do banco de ddados*/
    private array $data;

    /**
     * Instancia a classe genérica no helper responsável em buscar os registro no banco de dados.
     * Possui a QUERY responsável em buscar os registros no BD.
     * @return array Retorna o registro do banco de dados com informações para página Home
     */
    public function index(): array
    {
        $viewFooter = new \Sts\Models\helper\StsRead();
        // $viewHome->exeRead("sts_homes_tops", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $viewFooter->fullRead("SELECT footer_desc, footer_text_link, footer_link FROM sts_footers WHERE id=:id LIMIT :limit","id=1&limit=1");
        $this->data = $viewFooter->getResult();

        return $this->data;
    }
}