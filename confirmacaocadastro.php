<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $nome = $_POST['name'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['phone'];
        echo "oi $nome $cpf $email $telefone";
    ?>
</body>
</html>