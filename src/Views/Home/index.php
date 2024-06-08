<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>View index</title>
    </head>
    <body>
        <?php require '../src/Views/Home/header.php'?>
        <main>
            <div class="container p-3">
                <h2>Petshop</h2>
                <div class="row p-1">
                    <div class="col p-3">
                        <h4>Pet</h4>
                        <a href="/pet" class="btn btn-primary m-1">Visualizar</a>
                    </div>
                    <div class="col p-3">
                        <h4>Produto</h4>
                        <a href="/produto" class="btn btn-primary m-1">Visualizar</a>
                    </div>
                    <div class="col p-3">
                        <h4>Cliente</h4>
                        <a href="/cliente" class="btn btn-primary m-1">Visualizar</a>
                    </div>
                    <div class="col p-3">
                        <h4>Categoria</h4>
                        <a href="/categoria" class="btn btn-primary m-1">Visualizar</a>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row"></div>
            </div>
        </main>
        <?php require '../src/Views/Home/footer.php'?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>