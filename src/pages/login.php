<?php 

require_once __DIR__ . "/partials/head.php";

$customScript = '
<!-- Alpine Plugins -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
 
<!-- Alpine Core -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
';

useHead("Logar no Banco X", "Faça login para acessar sua conta X", $customScript);

require_once __DIR__ . "/partials/header.php"; 

?>

<div>
    <h1> Logar no Banco X </h1>
</div>

<form action="" method="post">
    <div>
        <label for="cpf">CPF: </label>
        <input x-mask ="999.999.999-99" type="text" name="cpf" id="cpf" placeholder="000.000.000-00">
    </div>
    <div>
        <label for="password">Senha: </label>
        <input type="password" name="password" id="password" minlenght="8" placeholder="Informe sua senha.">
    </div>
    <div>
        <button type="submit">Logar&nbsp;</button>
        <button type="reset">&nbsp;Limpar</button>
    </div>
</form>

<?php require_once __DIR__ . "/partials/footer.php"; ?>
