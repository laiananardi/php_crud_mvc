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
        $stmt = $this->mysqli->prepare("INSERT INTO funcionarios ( `nome`, `cpf`, `email`, `telefone`, `endereco`,`cidade`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$nome,$cpf,$email,$telefone,$endereco,$cidade);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getFuncionario(){  
        $result = $this->mysqli->query("SELECT * FROM funcionarios");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteFuncionario($id){
        if($this->mysqli->query("DELETE FROM `funcionarios` WHERE `id` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }

}
?>