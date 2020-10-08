<?php
require_once("../model/db.php");

class editarController {

    private $editar;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $cidade;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaFuncionario($id);
        
        $this->nome         =$row['nome'];
        $this->cpf          =$row['cpf'];
        $this->email        =$row['email'];
        $this->telefone     =$row['telefone'];
        $this->endereco     =$row['endereco'];
        $this->cidade       =$row['cidade'];
        

    }
    public function editarFormulario($nome,$cpf,$email,$telefone,$endereco,$cidade){
        if($this->editar->updateFuncionario($nome,$cpf,$email,$telefone,$endereco,$cidade) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!')</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    // public function getId(){
    //     return $this->id;
    // }
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


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['cpf'],$_POST['email'],$_POST['telefone'],$_POST['endereco'],$_POST['cidade']);
}
?>
