<?php
require_once("../model/db.php");

class editarController {

    private $editar;
    private $foto;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $cidade;
    private $id;
    private $id_t;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    public function criarFormulario($id){
        $row = $this->editar->pesquisaFuncionario($id);
        
        $this->foto         =$row['foto'];
        $this->nome         =$row['nome'];
        $this->cpf          =$row['cpf'];
        $this->email        =$row['email'];
        $this->endereco     =$row['endereco'];
        $this->cidade       =$row['cidade'];
        $this->id           =$row['id'];

    }
    public function telefones($id){
        
        $array =  $this->editar->getTelefones($id);

        
       

        return $array;

       
    }
    public function editarFormulario($nome,$cpf,$email,$endereco,$cidade,$id,$telefone){
        if($this->editar->updateFuncionario($nome,$cpf,$email,$endereco,$cidade,$id,$telefone) == FALSE){
            
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
           
        }else{
        
            echo "<script>alert('Registro incluído com sucesso!');document.location='../index.php'</script>";
            
        }
    }
    
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


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['cpf'],$_POST['email'],$_POST['endereco'],$_POST['cidade'],$_POST['id'],$_POST['telefone'] );
}
?>
