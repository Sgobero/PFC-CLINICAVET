<?php

namespace Core;


class UrlController extends Define{

    private string $url; // pega as informações da URL
    private array $urlArray; // URL tranformada em array

    private string $urlController; // Recebe a posição 0 (zero) do $urlArray 

    private string $classLoad; // Armazena o endereço da Controller requerida pela URL


    
    /**     function __construct()
     * Pega as informações da URL e manipula ela com os métodos da classe
     *      clearUrl() e slugController()
     */
    public function __construct()
    {   
        $this->config();

        // Se tiver passado a controller na URL
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){

            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();
            
            $this->urlArray = explode("/", $this->url);

            if(isset($this->urlArray[0])){
                $this->urlController = $this->slugController($this->urlArray[0]);
            }else{
                $this->urlController = ERROCONTROLLER;
            }

        }else{
            $this->urlController = CONTROLLER;
        }
    }



    /**     function clearUrl()
     * Método chamado pelo construction
     * É responsável por limpar a URL 
     *      - tira as tags html e php
     *      - tira o espaço do final e enicio da url
     *      - tira a barra do final da url
     *      - retira os caracteres especiais
     */
    private function clearUrl() :void 
    {
        $this->url = strip_tags($this->url); // tira as tags html e php
        $this->url = trim($this->url); //tira o espaço do final e enicio da url
        $this ->url = rtrim($this->url, "/"); //tira a barra do final da url

        //Retira os caracteres especiais e substitui pelos do format['b']
        $format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode($format['a']), $format['b']); //Elimina os cartacteris do format['a']
    }



    /**     function slugController()
     * Método chamado pelo contruction
     * É responsavel por limpar o nome da controller
     *      - converte para minusculo
     *      - converte o traço para espaco em braco
     *      - converter a primeira letra de cada palavra para maiusculo
     *      - retira o espaco em branco
     */
    private function slugController($urlArray): string
    {
        $convertController = strtolower($urlArray); //Converter para minusculo
        $convertController = str_replace("-", " ", $convertController); //Converter o traço para espaco em braco
        $convertController = ucwords($convertController); //Converter a primeira letra de cada palavra para maiusculo
        $convertController = str_replace(" ", "", $convertController);//Retirar espaco em branco
        
        return $convertController;
    }



    /**     function loadPage()
     * Cria uma variável com o endereço da Controller requerida pela URL
     * Função recursiva 
     */
    public function loadPage(): void
    {
        $this->classLoad = "\\Sts\\Controllers\\" . $this->urlController; 
        if(class_exists($this->classLoad)){
            $this->LoadClasse();
        }else{
            $this->urlController = ERROCONTROLLER;
            $this->loadPage();
        }
    }
   


    /**     function LoadClasse()
     * Chamada pela função LoadPage
     * Responsavel por chamar o método index da controller passada pela URL
     */
    private function LoadClasse(): void 
    {
        $classPage = new $this->classLoad;
        if(method_exists($classPage, "index")){
            $classPage->index();
        }else{
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM);
        }
        
    }
}
