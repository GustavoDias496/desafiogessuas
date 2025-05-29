<?php

require_once __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../src/views/form.html';


use Gustavodias\Desafiogessuas\controller\PeopleController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();

$controller = new PeopleController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';

    if (!empty($name)) {
        $person = $controller->register($name);

        echo "Cidadão cadastrado com sucesso!<br>";
        echo "Nome: " . htmlspecialchars($person->getName()) . "<br>";
        echo "NIS: " . htmlspecialchars($person->getNis()) . "<br><br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    try {
        $person = $controller->findByNis($nis);

        echo "Cidadão encontrado:<br>";
        echo "Nome: " . htmlspecialchars($person->getName()) . "<br>";
        echo "NIS: " . htmlspecialchars($person->getNis()) . "<br><br>";
    } catch (Exception $e) {
        echo "Cidadão não encontrado.<br><br>";
    }
}
?>