<?php

use BancoX\controllers\RegisterController;

require_once __DIR__ . "/partials/head.php";

useHead("Cadastro no Banco X", "Faça o cadastro para acessar");

require_once __DIR__ . "/partials/header.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RegisterController::index();

    $payload = [
        "name" => filter_input(INPUT_POST, "name"),
        "email" => filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL),
        "password" => filter_input(INPUT_POST, "password"),
        "cpf" => filter_input(INPUT_POST, "cpf")
    ];

    RegisterController::index($payload);
}

?>
<div class="container">
    <div>
        <h1>Cadastro</h1>
    </div>
    <form method="post" action="http://localhost:8080/cadastro">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label><br>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label><br>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF: </label><br>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label><br>
            <input type="password" class="form-control" name="password">
        </div><br>
        <button type="submit" class="btn btn-secondary">Cadastrar</button>
    </form>
</div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>
