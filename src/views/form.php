<div class="formContainer">
    <form class="form" method="POST" action="index.php">
        <div class="inputContainer">
            <label for="name">Nome do cidadão:</label>
            <input class="input" type="text" placeholder="Digite o nome" name="name" required />
        </div>
        <button class="button" type="submit">Cadastrar</button>
    </form>

    <form class="form" method="GET" action="index.php">
        <div class="inputContainer">
            <label for="nis">Buscar por NIS:</label>
            <input class="input" type="number" placeholder="Digite o número NIS" name="nis" required />
        </div>
        <button class="button" type="submit">Buscar</button>
    </form>
</div>