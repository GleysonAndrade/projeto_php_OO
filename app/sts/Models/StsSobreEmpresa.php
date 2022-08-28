<?php

namespace Sts\Models;

//Redirecionar ou parar processamento quando o usuário não acessa o arquivo index.
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    // die("Erro: Página não encontrada");
}

use PDO;
/**
 * Models responsável em  buscar os dados da página sobre empresa
 * 
 * @author Gleyson <email@email.com>
 */
class StsSobreEmpresa
{
    /** * @var array $data Recebe os registros do banco de ddados*/
    private ?array $data;

    /**
     * Instancia a classe genérica no helper responsável em buscar os registro no banco de dados.
     * Possui a QUERY responsável em buscar os registros no BD.
     * @return array Retorna o registro do banco de dados com informações para página sobre empresa
     */
    public function index(): ?array
    {
        $viewSobreEmpresa = new \Sts\Models\helper\StsRead();
        $viewSobreEmpresa->fullRead("SELECT id, title, description, image, image FROM sts_abouts_companies WHERE sts_situation_id=:sts_situation_id ORDER BY id DESC LIMIT :limit","sts_situation_id=1&limit=10");
        $this->data= $viewSobreEmpresa->getResult();
        // var_dump($this->data);
        return $this->data;
    }
}