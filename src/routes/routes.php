<?php

use Gustavodias\Desafiogessuas\controller\PeopleController;

$controller = new PeopleController();

ob_start();

$method = $_SERVER['REQUEST_METHOD'];
$data = [];
$view = __DIR__ . '/../views/form.php';

if ($method === 'POST' && !empty($_POST['name'])) {
    $data = handleRegister($controller, $_POST['name']);
    $view = __DIR__ . '/../views/result.php';
} elseif ($method === 'GET' && isset($_GET['nis'])) {
    $data = handleSearch($controller, $_GET['nis']);
    $view = __DIR__ . '/../views/result.php';
}

include __DIR__ . '/../views/layout.php';

function handleRegister($controller, string $name): array
{
    $person = $controller->register($name);
    return [
        'title' => 'Cadastro realizado!',
        'message' => 'Pessoa cadastrada com sucesso!',
        'person' => $person
    ];
}

function handleSearch(PeopleController $controller, string $nis): array
{
    $person = $controller->findByNis($nis);
    return [
        'title' => $person ? 'Pessoa encontrada' : 'Pessoa não encontrada',
        'message' => $person ? 'Pessoa encontrada com sucesso!' : 'Pessoa não encontrada!',
        'person' => $person
    ];
}
