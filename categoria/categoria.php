<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categoria  </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <main class="container">
        <h3 class="mt-3">Categoria</h3>
        <a href="/categoria/inserir"><button class="btn btn-primary mt-3">Inserir Categoria</button></a>
        <div class="alert alert-<?=$status?>" role="alert">
          <?= $mensagem ?>
        </div>
      
        <table id="tabela">
            <thead>
                <tr scope="col">
                    <th class="w-75 p-3">Descrição</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categ): ?>
                    <tr>
                      <td><?=$categ['descricao']?></td>
                      <td><a href="/categoria/alterar/id/<?=$categ['id']?>"><button type="button" class="btn btn-warning" >Alterar</button></a></td>
                      <td><a href="/categoria/excluir/id/<?=$categ['id']?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
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