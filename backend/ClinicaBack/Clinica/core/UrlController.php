<?php

namespace Core;


class UrlController extends Define{

    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $classLoad;
    private array $format;


    public function __construct()
    {   
        $this->config();
        if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){

            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();
            
            $this->urlArray = explode("/", $this->url);

            if(isset($this->urlArray[0])){
                $this->urlController = $this->converToController($this->urlArray[0]);
            }else{
                $this->urlController = ERROCONTROLLER;
            }
            //echo "<pre>"; var_dump($this->urlArray); echo "</pre>"; 
        }else{
            $this->urlController = CONTROLLER;
        }
    }



    private function clearUrl() :void 
    {
        $this->url = strip_tags($this->url); // tira as tags html e php
        $this->url = trim($this->url); //tira o espaço do final e enicio da url
        $this ->url = rtrim($this->url, "/"); // tira a barra do final da url

        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']); //Elimina os cartacteris do format['a']
    }

    private function converToController($urlArray): string
    {
        $convertController = strtolower($urlArray); //Converter para minusculo
        $convertController = str_replace("-", " ", $convertController); //Converter o traco para espaco em braco
        $convertController = ucwords($convertController); //Converter a primeira letra de cada palavra para maiusculo
        $convertController = str_replace(" ", "", $convertController);//Retirar espaco em branco
        return $convertController;
    }



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