<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
</head>
<body
>
    <h2 class="text-red-600">Calculatrice Simple</h2>
    <form action="" method="post">
        <input type="number" name="num1" class="border-sky-100">
        <select name="operation" id="">
            <option value="add">+</option>
            <option value="neg">-</option>
            <option value="mult">*</option>
            <option value="div">/</option>
        </select>
        <input type="number" name="num2">
        <button type="submit" class="btn btn-secondary">Calculer</button>
    </form>

    <?php if(isset($result)) : ?>
        <h3>Résulat : <?= $result?></h3>
    <?php endif ; ?>
</body>
</html>