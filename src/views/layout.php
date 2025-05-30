<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= $data['title'] ?? 'Cadastro de Cidadão' ?></title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <h1><?= $data['title'] ?? 'Cadastro de Cidadão' ?></h1>
    <div class="content">
        <?php include $view; ?>
    </div>
</body>

</html>