<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
        <h3 class="mt-3">Categoria</h3>
        <a href="categoria/inserir"><button class="btn btn-primary mt-3">Inserir Categoria</button></a>
        <div class="alert" <?=$inserir?> role="alert">

        </div>
        <table class="table mt-3">
            <thead>
                <tr scope="col">
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categ): ?>
                    <tr><td><?=$categ['descricao']?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>