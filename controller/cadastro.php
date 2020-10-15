<?php


require_once("../model/cadastroFuncionario.php");


class cadastroController{

    private $cadastro;
  
    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    public function incluir(){
 
                
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setEndereco($_POST['endereco']);
        $this->cadastro->setCidade($_POST['cidade']);
        $this->cadastro->setTelefone($_POST['telefone']);

        $resultFun = $this->cadastro->incluir();

        if($resultFun >= 1){
            echo "<script>alert('Funcionário registrado com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Não foi possivel salvar funcionário! verifique se o funcionário não está sendo repetido.');history.back()</script>";
        }
         
    }

}
new cadastroController();
?>