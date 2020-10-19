<?php

define('BD_SERVIDOR','sql398.main-hosting.eu');
define('BD_USUARIO','u768062362_crud');
define('BD_SENHA',':dahgI;z1T');
define('BD_BANCO','u768062362_crud');

class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setFuncionario($nome,$cpf,$email,$endereco,$cidade,$telefone){
        

        if (isset($_FILES['foto'])){

            $result = $this->mysqli->query("SELECT foto FROM funcionarios");
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $nome_foto = $_FILES['foto']['name'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $location = '../arquivos/'. $_FILES['foto']['name'];

            if($row['foto'] == $nome_foto){

                return false;

            } else{

                move_uploaded_file($tmp_name,$location);

            }
           
        }
        
        $stmt = $this->mysqli->prepare("INSERT INTO funcionarios ( `foto`,`nome`, `cpf`, `email`, `endereco`,`cidade`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$nome_foto,$nome,$cpf,$email,$endereco,$cidade);
       
        if( $stmt->execute() == TRUE){
            
            $last_id = $stmt->insert_id;


            for($i=0;$i < count($telefone);$i++){
                
                $stmt = $this->mysqli->prepare("INSERT INTO telefones(`telefone`, `id`) VALUES (?,?)");
                $stmt->bind_param("ss",$telefone[$i], $last_id);
                $stmt->execute();
                 
            }
    
            $stmt->close(); 

            return $last_id;

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
    public function getTelefones($id){
        $result = $this->mysqli->query("SELECT id_t, id, telefone FROM telefones WHERE id = $id");
        
        return $result->fetch_all(MYSQLI_ASSOC);
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
                if($this->mysqli->query("DELETE FROM `telefones` WHERE `id` = '".$id."';")== TRUE){
                    return true;
                }
              

            } else{

                return false;

            }
        }else{
            return false;
        }
        

    }
    public function pesquisaFuncionario($id){
        $result = $this->mysqli->query("SELECT * FROM funcionarios WHERE id = '$id'");
        return $result->fetch_array(MYSQLI_ASSOC);


    }
     public function updateFuncionario($nome,$cpf,$email,$endereco,$cidade,$id,$telefone){
   
        if (isset($_FILES['foto'])){
            $nome_foto = $_FILES['foto']['name'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $location = '../arquivos/'. $_FILES['foto']['name'];;
        
            move_uploaded_file($tmp_name,$location);
        }

        $stmt = $this->mysqli->prepare("UPDATE `funcionarios` SET `foto` = ?,`nome` = ?, `cpf`=?, `email`=?, `endereco`=?,`cidade` = ? WHERE `id` = ?");
        $stmt->bind_param("sssssss",$nome_foto,$nome,$cpf,$email,$endereco,$cidade,$id);

       
        if($stmt->execute()==TRUE){

            $result = $this->mysqli->query("SELECT id_t, id, telefone FROM telefones WHERE id = $id");
            $result->fetch_all(MYSQLI_ASSOC);

            $id_tel = array();

            foreach( $result as $id_t){ 

            array_push($id_tel, $id_t['id_t']);
            
            }
           
            for($i=0;$i < count($telefone);$i++){
                   
                $stmt = $this->mysqli->prepare("UPDATE `telefones` SET `telefone`=? WHERE `id_t`=? ");
                $stmt->bind_param("ss",$telefone[$i], $id_tel[$i]);

                $stmt->execute();

            }
            
            $stmt->close(); 

            return true;

        }else{
            return false;
        }
    }
}
?>