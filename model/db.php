<?php

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','crud');

class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setFuncionario($nome,$cpf,$email,$telefone,$endereco,$cidade){

        if (isset($_FILES['foto'])){
            $nome_foto = $_FILES['foto']['name'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $location = '../arquivos/'. $_FILES['foto']['name'];;
        
            move_uploaded_file($tmp_name,$location);
        }
        
        $stmt = $this->mysqli->prepare("INSERT INTO funcionarios ( `foto`,`nome`, `cpf`, `email`, `telefone`, `endereco`,`cidade`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss",$nome_foto,$nome,$cpf,$email,$telefone,$endereco,$cidade);
       
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getFuncionario(){  
        $result = $this->mysqli->query("SELECT * FROM funcionarios");
        while($row = $result->fetch_array(MYSQLI_ASSOC) ){
            $array[] = $row;
        }
        if(!empty($array)){
            return $array; 
        }


    }

    public function deleteFuncionario($id){
        $location = "../arquivos/"; 
        $result = $this->mysqli->query("SELECT foto FROM funcionarios WHERE id = $id");
        $foto = mysqli_fetch_object($result);
        $imagemQueVaiDeletada = $location . $foto->foto; 
        $deleta = unlink($imagemQueVaiDeletada);
        if($deleta){
            $this->mysqli->query("DELETE FROM tabela WHERE id = $id"); 
            if($this->mysqli->query("DELETE FROM `funcionarios` WHERE `id` = '".$id."';")== TRUE){
                return true;
            }else{
                return false;
            }
        }
        

    }
    public function pesquisaFuncionario($id){
        $result = $this->mysqli->query("SELECT * FROM funcionarios WHERE id = '$id'");
        return $result->fetch_array(MYSQLI_ASSOC);


    }
     public function updateFuncionario($nome,$cpf,$email,$telefone,$endereco,$cidade,$id){
        if (isset($_FILES['foto'])){
            $nome_foto = $_FILES['foto']['name'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $location = '../arquivos/'. $_FILES['foto']['name'];;
        
            move_uploaded_file($tmp_name,$location);
        }
        $stmt = $this->mysqli->prepare("UPDATE `funcionarios` SET `foto` = ?,`nome` = ?, `cpf`=?, `email`=?, `telefone`=?, `endereco`=?,`cidade` = ? WHERE `id` = ?");
        $stmt->bind_param("ssssssss",$nome_foto,$nome,$cpf,$email,$telefone,$endereco,$cidade,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>