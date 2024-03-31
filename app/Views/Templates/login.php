<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <!-- Definições default -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ... meta tags, título e icone ... -->
    <?php echo isset($description) && !empty($description) ? '<meta name="description" content="' . $description . '">' : ''; ?>
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="icon" href="http://localhost/gabi/public/img/logo2-ico.ico">

    <!-- ... estilos ... -->
    <?php
    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="http://localhost/gabi/public/styles/' . $style . '.css">' . PHP_EOL;
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts (head) -->
    <?php
    foreach ($scripts_head as $script) {
        echo '<script src="http://localhost/gabi/public/script/' . $script . '.js"></script>';
    }
    ?>
</head>

<body>

    <div class="container" style="width: fit-content;">
        <img src="../img/logo.jpg" width="300px" style="margin: 50px auto; margin-top: 0;" alt="">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="http://localhost/gabi/login/process" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
    <!-- Adicionando o Bootstrap JavaScript e o jQuery (opcional, necessário para funcionalidades avançadas do Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>