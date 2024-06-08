<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir Produto</title>
  </head>
  <body>
    <main class="container">
        <div class="mt-3">
            <h3>Excluir Produto</h3>
        </div>
        <form action="/produto/excluir" method="post">
            <input type="hidden" name="id" value="<?= $produto["id"]?>">
            <div class="row mt-3">
                <div class="col-6 mt-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control " value="<?=$produto['nome']?>" disabled>
                    <br>
                    <label for="raca" class="form-label">Raça:</label>
                    <textarea type="text" name="raca" class="form-control " rows ="8" disabled><?=$produto['descricao']?></textarea>
                    <br>
                    <label for="raca" class="form-label">Dono:</label>
                    <input type="text" name="raca" class="form-control " value="<?=$produto['valor']?>" disabled>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <p>Deseja excluir esse registro?</p>
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>