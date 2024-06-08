<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos  </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <main class="container">
        <h3 class="mt-3">Produtos</h3>
        <a href="/produto/inserir"><button class="btn btn-primary mt-3">Registrar Produto</button></a>
        <div class="alert alert-<?=$status?>" role="alert">
          <?= $mensagem ?>
        </div>
        
        </div>
        <table id="tabela" class="table table-striped">
            <thead>
                <tr scope="col">
                    <th class="w-25 p-3">Nome</th>
                    <th class="w-50 p-3">descricao</th>
                    <th class="w-25 p-3">valor</th>
                    <th class="w-25 p-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                      <td><?=$produto['nome']?></td>
                      <td><?=$produto['descricao']?></td>
                      <td><?=$produto['valor']?></td>
                      <td>
                        <a type="button" class="btn btn-danger" href="/produto/excluir/id/<?=$produto['id']?>">Excluir</a>
                        <a type="button" class="btn btn-warning" href="/produto/editar/id/<?=$produto['id']?>">Alterar</a>
                      </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </main>

      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>

      <script> let table = new DataTable('#tabela'); </script>
    </body>   
</html>