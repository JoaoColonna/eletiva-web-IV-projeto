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