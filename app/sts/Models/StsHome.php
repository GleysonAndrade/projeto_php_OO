<?php

namespace Sts\Models;

//Redirecionar ou parar processamento quando o usuário não acessa o arquivo index.
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    // die("Erro: Página não encontrada");
}

use PDO;

class StsHome
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
        $viewHome = new \Sts\Models\helper\StsRead();
        // $viewHome->exeRead("sts_homes_tops", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $viewHome->fullRead("SELECT title_one_top, title_two_top, title_tree_top, link_btn_top, txt_btn_top, image_top FROM sts_homes_tops WHERE id=:id LIMIT :limit","id=1&limit=1");
        $this->data['top'] = $viewHome->getResult();

        $viewHomeServ = new \Sts\Models\helper\StsRead();
        $viewHomeServ->fullRead("SELECT serv_title, serv_icon_one, serv_title_one, serv_desc_one, serv_icon_two, serv_title_two, serv_desc_two,serv_icon_three, serv_title_three, serv_desc_three FROM sts_homes_services WHERE id=:id LIMIT :limit","id=1&limit=1");
        $this->data['serv'] = $viewHomeServ->getResult();
        
        $viewHomePrem = new \Sts\Models\helper\StsRead();
        $viewHomePrem->fullRead("SELECT prem_title, prem_subtitle, prem_desc, prem_btn_text, prem_btn_link, prem_image FROM sts_homes_premiums WHERE id=:id LIMIT :limit","id=1&limit=1");
        $this->data['prem'] = $viewHomePrem->getResult();

        return $this->data;
    }
}