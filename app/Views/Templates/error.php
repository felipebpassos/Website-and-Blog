<!DOCTYPE html>
<html lang="pt-BR">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ... meta tags, título e icone ... -->
    <?php 
        echo isset($model_data['description']) && !empty($model_data['description']) ? '<meta name="description" content="' . $model_data['description'] . '">' : ''; 
    ?>
    <title><?php echo $model_data['title']; ?></title>
    <link rel="icon" href="./public/img/icone.ico">

    <!-- ... estilos ... -->
    <?php if (isset($model_data['styles']) && !empty($model_data['styles'])) : ?>
        <link rel="stylesheet" href="./public/styles/<?php echo $model_data['styles']; ?>.css">
    <?php endif; ?>

</head>

<body>
    <main>
    <p>404 - Página não encontrada! :&#40;</p>
        <a href="<?php echo BASE_URL; ?>">Voltar para a Home</a>
    </main>
</body>

</html>