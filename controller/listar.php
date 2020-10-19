<?php
require_once("model/db.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getFuncionario();
        if (is_array($row) || is_object($row)){
            foreach ($row as $value){
                $telefone = $this->lista->getTelefones($value['id']);
                echo "<tr>";
                echo "<th><img src='arquivos/".$value['foto']."'  height='50px' ></th>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['cpf'] ."</td>";
                echo "<td>".$value['email'] ."</td>";
                echo "<td>";
                    foreach($this->lista->getTelefones($value['id']) as $telefone){
                        print($telefone['telefone'].'</br>');
                    }
                echo "</td>";
                echo "<td>".$value['endereco'] ."</td>";
                echo "<td>".$value['cidade']."</td>";
                echo "<td id='acao'><a href='view/editar.php?id=".$value['id']."'><i id='edit' class='far fa-edit'></i></a><a href='controller/deletar.php?id=".$value['id']."'><i id='trash' class='far fa-trash-alt delete'></i></a></td>";
                echo "</tr>";
            }
        }
    }
}