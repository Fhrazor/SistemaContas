<?php require_once 'Cabecalho.php'; ?>      
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contas a Pagar</title>    
    </head>
    <body>      
        <form action="SalvarContasaPagar.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Foto Aluno</label>
                <input type="file" class="form-control" id="foto" name="foto">                
            </div>
            <div class="row">
                <img class="col-md-1 img-responsive " src="<?= $vertorUmRegistro['foto'] ?>" ><br>
                </img>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" name="descricao"  placeholder="Digite Descrição">                
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="decimal" class="form-control" name="valor" placeholder="Digite Valor">                
            </div>
            <div class="form-group">
                <label>Mês</label>
                <input type="number" class="form-control" name="mes" placeholder="Digite Mês">                
            </div>
            <div class="form-group">
                <label>Ano</label>
                <input type="number" class="form-control" name="ano" placeholder="Digite Ano">                
            </div>         

            <button type="submit" class="btn btn-primary">Salvar Conta</button>
        </form>

    </body>
</html>


