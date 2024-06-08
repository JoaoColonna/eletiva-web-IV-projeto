<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Projetocomposer\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 
    'Php\Projetocomposer\Controllers\HomeController@olaMundo');

$r->get('/exer1/formulario', 
    'Php\Projetocomposer\Controllers\HomeController@formExer1');

$r->get('/exer2/formulario', 
    'Php\Projetocomposer\Controllers\HomeController@formExer2');

$r->get('/exer3/formulario', 
    'Php\Projetocomposer\Controllers\HomeController@formExer3');
    
$r->get('/exer4/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer4');

$r->get('/exer5/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer5');

$r->get('/exer6/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer6');

$r->get('/exer7/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer7');

$r->get('/exer8/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer8');

$r->get('/exer9/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer9');

$r->get('/exer10/formulario',
    'Php\Projetocomposer\Controllers\HomeController@formExer10');

$r->post('/exer1/resposta', function(){
    $valor = $_POST['valor'];
    if($valor > 0){
        return "O valor é positivo";
    } else if ($valor < 0){
        return "O valor é menor que zero";
    } else {
        return "O valor é negativo";
    }
});

$r->post('/exer2/resposta', function(){
    $array = [];
    foreach($_POST as $key => $value){
        $array[] = $_POST[$key];
    }

    $max = max($array);
    $min = min($array);
    return "O maior valor é " . $max . " e está na posição " . array_search($max, $array)+1 .
    ", e o menor valor é " . $min . " e está na posição " . array_search($min, $array)+1;
});

$r->post('/exer3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if($valor1 === $valor2){
        return "O resultado é:" . ($valor1 + $valor2) * 3;
    }
    return "O resultado é: " . $valor1 + $valor2;
    
});

$r->post('/exer4/resposta', function(){
    $valor = $_POST['valor1'];
    $resposta = "";
    for ($i=1; $i<=10; $i++){
        $resultado = $valor * $i;
        $resposta .= "$valor x $i = $resultado<br/>";
    }
    return $resposta;
});

$r->post('/exer5/resposta', function(){
    $valor = intval($_POST['valor']);

    $result = 1;
    while($valor > 0){
        $result = $result * $valor;
        $valor--;
    }
    
    return $result;
});

$r->post('/exer6/resposta', function(){
    $valor_A = intval($_POST['valora']);
    $valor_B = intval($_POST['valorb']);
    $array = array($valor_A, $valor_B);
    sort($array);
    $str = "";
    foreach($array as $arr){
        $str .= $arr . " ";
    }

    if($valor_A === $valor_B){
        return $valor_A;
    }
    return $str;
        
});

$r->post('/exer7/resposta', function(){
    $valor = floatval(str_replace(",",".",$_POST['valor']));
    return $valor * 100 . " centímetros";
});

$r->post('/exer8/resposta', function(){
    $valor = floatval(str_replace(",",".",$_POST['valor']));

    $litros_de_tinta = $valor / 3;
    $latas_de_tinta = ceil($litros_de_tinta / 18);
    $preco_total = $latas_de_tinta * 80;

    echo "Você precisará comprar $latas_de_tinta latas de tinta.\n";
    echo "O preço total será de R$ $preco_total.\n";
    
});

$r->post('/exer9/resposta', function(){

    function ehBissexto($ano) {
        return (($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0);
    }

    $valor = intval($_POST['valor']);
    DEFINE('ano_atual', date("Y"));
    $idade = ano_atual - $valor;

    $dias_vividos = 0;
    for ($i = $valor; $i < ano_atual; $i++) {
        if (ehBissexto($i)) {
            $dias_vividos += 366;
        } else {
            $dias_vividos += 365;
        }
    }

    echo "A pessoa tem ". $idade . " anos. \n";
    echo "A pessoa já viveu $dias_vividos dias.\n"; 
    echo "Em 2025 ela terá " . 2025 - $valor . " anos.";
});

$r->post('/exer10/resposta', function(){
    $peso = floatval(str_replace(",",".",$_POST['peso']));
    $altura = floatval(str_replace(",",".",$_POST['altura']));

    $imc = $peso / ($altura * $altura);

    $categoria = "";
    if ($imc < 18.5) {
        $categoria = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 25) {
        $categoria = "Peso normal";
    } elseif ($imc >= 25 && $imc < 30) {
        $categoria = "Acima do peso";
    } else {
        $categoria = "Obeso";
    }

    echo "Seu IMC é: $imc.\n";
    echo "Você está classificado como: $categoria";
});


// navigation routes
$r->get('/menu',
    'Php\Projetocomposer\Controllers\HomeController@menu');

// Rotas para PetController
$r->get('/pet',
    'Php\Projetocomposer\Controllers\PetController@index');
$r->get('/pet/{acao}/{status}',
    'Php\Projetocomposer\Controllers\PetController@index');
$r->get('/pet/inserir',
    'Php\Projetocomposer\Controllers\PetController@inserir');
$r->post('/pet/novo',
    'Php\Projetocomposer\Controllers\PetController@novo');
$r->get('/pet/editar/id/{id}',
    'Php\Projetocomposer\Controllers\PetController@update');
$r->post('/pet/editar',
    'Php\Projetocomposer\Controllers\PetController@editar');
$r->get('/pet/excluir/id/{id}',
    'Php\Projetocomposer\Controllers\PetController@excluir');
$r->post('/pet/excluir',
    'Php\Projetocomposer\Controllers\PetController@deletar');

// Rotas para ProdutoController
$r->get('/produto',
    'Php\Projetocomposer\Controllers\ProdutoController@index');
$r->get('/produto/{acao}/{status}',
    'Php\Projetocomposer\Controllers\ProdutoController@index');
$r->get('/produto/inserir',
    'Php\Projetocomposer\Controllers\ProdutoController@inserir');
$r->post('/produto/novo',
    'Php\Projetocomposer\Controllers\ProdutoController@novo');
$r->get('/produto/editar/id/{id}',
    'Php\Projetocomposer\Controllers\ProdutoController@update');
$r->post('/produto/editar',
    'Php\Projetocomposer\Controllers\ProdutoController@editar');
$r->get('/produto/excluir/id/{id}',
    'Php\Projetocomposer\Controllers\ProdutoController@excluir');
$r->post('/produto/excluir',
    'Php\Projetocomposer\Controllers\ProdutoController@deletar');

// Rotas para ServicoController
$r->get('/servico',
    'Php\Projetocomposer\Controllers\ServicoController@index');
$r->get('/servico/{acao}/{status}',
    'Php\Projetocomposer\Controllers\ServicoController@index');
$r->get('/servico/inserir',
    'Php\Projetocomposer\Controllers\ServicoController@inserir');
$r->post('/servico/novo',
    'Php\Projetocomposer\Controllers\ServicoController@novo');
$r->get('/servico/editar/id/{id}',
    'Php\Projetocomposer\Controllers\ServicoController@update');
$r->post('/servico/editar',
    'Php\Projetocomposer\Controllers\ServicoController@editar');
$r->get('/servico/excluir/id/{id}',
    'Php\Projetocomposer\Controllers\ServicoController@excluir');
$r->post('/servico/excluir',
    'Php\Projetocomposer\Controllers\ServicoController@deletar');


//Chamando o formulário para inserir categoria
$r->get('/categoria/inserir',
    'Php\Projetocomposer\Controllers\CategoriaController@inserir');

$r->get('/categoria/alterar/id/{id}',
    'Php\Projetocomposer\Controllers\CategoriaController@alterar');

$r->post('/categoria/novo',
    'Php\Projetocomposer\Controllers\CategoriaController@novo');

$r->post('/categoria/editar',
    'Php\Projetocomposer\Controllers\CategoriaController@editar');

$r->get('/categoria',
    'Php\Projetocomposer\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}',
    'Php\Projetocomposer\Controllers\CategoriaController@index');

#ROTAS
$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}