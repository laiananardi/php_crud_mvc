<?php
require_once("../model/db.php");
class deletar {
    private $deletar;

    public function __construct($id){
        $this->deletar = new Banco();
        if($this->deletar->deleteFuncionario($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletarr registro!')</script>";
        }
    }
}
new deletar($_GET['id']);
?>

     

  