<?php
require_once("../model/db.php");
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
                echo "<tr>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['cpf'] ."</td>";
                echo "<td>".$value['email'] ."</td>";
                echo "<td>".$value['telefone'] ."</td>";
                echo "<td>".$value['endereco'] ."</td>";
                echo "<td>".$value['cidade']."</td>";
                echo "<td id='acao'><a href='editar.php?id=".$value['id']."'><i id='edit' class='far fa-edit'></i></a><a href='../controller/deletar.php?id=".$value['id']."'><i id='trash' class='far fa-trash-alt delete'></i></a></td>";
                echo "</tr>";
            }
        }
    }
}