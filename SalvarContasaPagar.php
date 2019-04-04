<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->   
<?php require_once 'Cabecalho.php'; ?>    
<?php require_once 'Conexao.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Salvar Contas a Pagar</title>    
    </head>
    <body>
        <?php
        date_default_timezone_get('America/Sao_Paulo');
        $dataEHora = date('dmYHi');
        $nome_arquivo = "fotos/" . $dataEHora . $_FILES["foto"]["name"];
        $nome_arquivo_tmp = $_FILES["foto"] ["tmp name"];
        $msgErroArquivo = "";
        if (move_uploaded_file($nome_arquivo_tmp, $nome_arquivo) == false) {
            $msgErroArquivo = "Arquivo de foto nao pode ser enviado";
        }

        $id = $_POST['id'];
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];
        $mes = $_POST["mes"];
        $ano = $_POST["ano"];
        if ($id == 0) {
            // sql a se executado
            $sql = "insert into ContasaPagar(descricao,valor,mes,ano,boleto) values (?,?,?,?,?)";
            //prepara o sql para execucao
            $sqlprep = $conexao->prepare($sql);
            $sqlprep->bind_param("sdiis", $descricao, $valor, $mes, $ano, $nome_arquivo);
            $sqlprep->execute();
            $msg = "Conta inserida com sucesso";
        } else {
            $sql = "update ContasaPagar set descricao=?,valor=?,mes=?,ano=?,boleto=?,where id=?";
            $sqlprep = $conexao->prepare($sql);
            $sqlprep->bind_param("sdiisi", $descricao, $valor, $mes, $ano, $nome_arquivo, $id);
            $sqlprep->execute();
            $msg = "Conta editado com sucesso";
        }
        ?>
        <?php header('location:ListaContasaPagar.php?msg=' . $msg) ?>



    </body>
</html>
