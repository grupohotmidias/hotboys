<?php


include_once('Conexao.php');

class Audicao{

    private $id;
    private $titulo;
    private $descricao;
    private $videoSprout;
    private $teaserCode;
    private $modeloCena;
    private $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
        $this->conexao->setTabela('audicoes_cenas');
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

    private function setVideoSprout($videoSprout){
        $this->videoSprout = $videoSprout;
    }

    private function setTeaserCode($teaserCode){
        $this->teaserCode = $teaserCode;    
    }

    private function setModeloCena($modeloCena){
        $this->modelCena = $modeloCena;
    }
    
    public function getId(){ return $this->id; }
    public function getTitulo(){ return $this->titulo; }
    public function getDescricao(){ return $this->descricao; }
    public function getVideoSprout(){ return $this->videoSprout; }
    public function getTeaserCode(){ return $this->teaserCode; }
    public function modeloCena(){ return $this->modeloCena; }

    function where($parametro, $valor) {
        return $this->conexao->where($parametro , $valor);
    }

    public function getAll(){
        return $this->conexao->getAll();
    }

    function getAllBy() {
        return $this->conexao->getAllBy();
    }

    function insert($dados) {
        return $this->conexao->insert($dados);
    }

    function update(array $dados) {
        return $this->conexao->update($dados);
    }

    function delete() {
        return $this->conexao->delete();
    }
}