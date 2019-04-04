<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->   
<?php require_once 'Cabecalho.php'; ?>      
<?php require_once 'Conexao.php'; ?>



<?php 
        $id = $_POST["id"];
        $sql = "Delete from ContasaPagar where id=?";
        $sqlprep = $conexao->prepare($sql);
        $sqlprep->bind_param("i",$id);
        $sqlprep->execute();   
        $msg = "Conta ExcluidA com Sucesso";
  ?>      
<?php header('location:ListaContasaPagar.php?msg='.$msg)?>