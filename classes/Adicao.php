<?php

clas Adicao{

    private $table = "tab";
    private $id;
    private $titulo;
    private $descricao;
    private $videoSprout;
    private $teaserCode;
    private $modeloCena;

    public __construct(){

    }

    private function setId($id){
        $this->id = $id;
    }

    private function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    private function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    private setVideSprout($videoSprout){
        $this->videoSprout = $videoSprout;
    }

    private setTeaserCode($teaserCode){
        $this->teaserCode = $teaserCode;    
    }

    private setModeloCena($modeloCena){
        $this->modelCena = $modeloCena;
    }
    
    public function getId(){ return $this->id; }
    public function getTitulo(){ return $this->titulo; }
    public function getDescricao(){ return $this->descricao; }
    public function getVideoSprout(){ return $this->videoSprout; }
    public function getTeaserCode(){ return $this->teaserCode; }
    public function modeloCena(){ return $this->modeloCena; }

    public function get($id = null){
        $query = "SELECT * FROM {$this->table}";
    }

    function insert($dados) {
        return $conexao->insert($dados);
    }

    function update(array $dados) {
        $count = 0;
        foreach ($dados as $key => $valor) {
            if ($valor == null) {
                continue;
            }
            $update = self::$conexao->prepare("UPDATE {$this->tabela} SET {$key} = '{$valor}' {$this->clausula}");
            $update->execute();
            if ($update->rowCount()) {
                $count++;
            }
        }
        if ($count > 0) {
            return true;
        }
    }

    function delete() {
        $query = "DELETE FROM {$this->tabela} {$this->clausula}";
        $prepare = self::$conexao->prepare($query);
        $prepare->execute();
        if ($prepare->rowCount()) {
            return true;
        }
    }
}