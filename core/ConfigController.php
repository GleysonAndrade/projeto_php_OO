<?php

namespace Core;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

/**
 * Rebece a URL e manipula
 * Carrega a CONTROLLER
 * 
 * @author Gleyson  <gleysonandrade199@gmail.com>
 */
class ConfigController extends Config
{
    /**  @var string $url Recebe a URL do htaccess*/
    private string $url;
    /**  @var array $urlArray Recebe a URL convertida para um array*/
    private array $urlArray;
    /**  @var array $urlController Recebe a URL o nome controller */
    private string $urlController;
    // private string $urlParameter;
    private string $urlSlugController;
    /**  @var array $format Recebe o array de caracteres especiais que devem ser  sub stituido */
    private array $format;

    /**  @var array $classLoad Recebe a classe */
    private string $classLoad;

    /**
     * Recebe a URL do .htaccess
     * Validar a URL
     */
    public function __construct()
    {
        $this->config();
        // echo "Carregar a pagina<br>";
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $this->clearUrl();

            $this->urlArray = explode("/", $this->url);

            if(isset($this->urlArray[0])){
                $this->urlController = $this->slugController($this->urlArray[0]);
            }else{
                $this->urlController = $this->slugController(CONTROLLERERRO);
            }

        }else{
            $this->urlController = $this->slugController(CONTROLLER);
        }
    }

    /**
     * Métado privado não pode ser estanciado fora da classe
     * Limpara a URL,eliminando as TAG, os espaços em branco, retirar a barra  no
     * final da URL e retirar os caracteres especiais
     * 
     * @return void
     */
    private function clearUrl(): void
    {
        //Eliminar as tag
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");
        //Eliminar caracteres 
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
       $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']);
    }

    /**
     * Converter o valor obitido da URL "sobre-empresa" e converter no formato da classe "SobreEmpresa".
     * Utilizando as funções para converter tudo para minúsculo, converter o traço pelo espaço, converter
     * cada letra da primeira palavra para maiúsculo, retirar os espaços em branco
     *
     * @param string $slugController  Nome da classe
     * @return string Retorna a contrller "sobre-empresa" convertdo para o nome classe "SobreEmpressa"
     */
    private function slugController($slugController): string
    {
        //Converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //Converter o traco para espaco em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        //Retirar espaco em branco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        return $this->urlSlugController;
    }

    /**
     * Carregar as controllers.
     * Instanciar as classes da controller e carregar o métado index.
     *
     * @return void
     */
    public function loadPage(): void
    {
        $this->classLoad = "\\Sts\\Controllers\\". $this->urlController;
        if(class_exists($this->classLoad)){
            $this->loadClass();
        }else{
           $this->urlController = $this->slugController(CONTROLLERERRO);
           $this->loadPage();
        }
    }

    /**
         * Verificar se o método exsite, existindo o método carregada a página,
         * Não existindo o método, para o carregamento e apresenta mensagem de 
         * erro.
         * 
         * @return void
         */
        private function loadClass(): void
        {
            $classPage = new $this->classLoad();
            if(method_exists($classPage, "index")){
                $classPage->index();
            }else{
                die("Error: Por favor tente novamente. Caso o problema persista, entre em contato como a administrador" . EMAILADM);
            } 
        }
}