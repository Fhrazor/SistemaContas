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
        <title>Lista Contas a Pagar</title>    
    </head>
    <?php
    if (isset($_GET["pesquisa"])) {
        $pesquisa = $_GET["pesquisa"];
        $pesquisaLike = "%" . $pesquisa . "%";
        $sql = "select * from ContasaPagar where descricao like ? ";
        $sqlprep = $conexao->prepare($sql);
        $sqlprep->bind_param("s", $pesquisaLike);
        $sqlprep->execute();
        $resultadoSql = $sqlprep->get_result();
    } else {
        $pesquisa = "";
        $sql = "select * from ContasaPagar";
        $resultadoSql = $conexao->query($sql);
    }
    $vetorRegistro = $resultadoSql->fetch_all(MYSQLI_ASSOC);
    ?>
    <body>       
        <div>
            <a href="FormContasaPagar.php">
                <button class="btn btn-default">Adicionar Nova Conta</button>
            </a>
        </div> 
        <!-- formulario de pesquisa-->
        <form action="ListaContasaPagar.php"
              metoth="GET"
              class="form-inline text-right"> 
            <div class="form-group">
                <label for="descricao">Pesquisar descrição</label>
                <input type="text" class="form-control" id="pesquisa" name="pesquisa"
                       value="<?= $pesquisa; ?>">
                <button type="submit" class="btn btn-default">Pesquisar</button>
            </div>
        </form>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>

                        <th>Id</th>
                        <th>Descrição</th>
                        <th>Valor</th> 
                        <th>Mês</th>  
                        <th>Ano</th>  
                        <th class="col-md-1">Boleto</th>
                        <th> Editar</th>
                        <th> Excluir</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($vetorRegistro as $umRegistro): ?>

                        <tr>


                            <th><?php echo $umRegistro['id']; ?></th>
                            <td><?php echo $umRegistro['descricao']; ?> </td>
                            <td><?php echo $umRegistro['valor']; ?></td>
                            <td><?php echo $umRegistro['mes']; ?></td>
                            <td><?php echo $umRegistro['ano']; ?></td> 
                            <th><img src="<?= $umRegistro["foto"]; ?>" class="img-responsive"></img> </th> 
                            <td><form action="SalvarContasaPagar.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $umRegistro['id']; ?>">                                     
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td><form action="RemoverContasaPagar.php" method="post">
                                    <input type="hidden" name="id" value="<?= $umRegistro['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>

                        </tr>                   
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>   

    </body>
</html>
