<?php
require_once("db.php");

class Cadastro extends Banco {


    

    private $id;
    private $foto;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $cidade;

    //Metodos Set
    public function setId($string){
        $this->id = $string;
    }
    public function setFoto($string){
        $this->foto = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setCpf($string){
        $this->cpf = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setTelefone($array){
        $this->telefone = $array;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setCidade($string){
        $this->cidade = $string;
    }
    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getCidade(){
        return $this->cidade;
    }


    public function incluir(){
        return $this->setFuncionario($this->getNome(),$this->getCpf(),$this->getEmail(),$this->getEndereco(),$this->getCidade(), $this->getTelefone());
    }
}
?>
