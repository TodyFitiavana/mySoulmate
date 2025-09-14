<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <title>pub</title>
</head>
<body>
    <h1>creation de pub</h1>
    <form action="" method ="post" enctype="multipart/form-data">
        <input type="text" placeholder="...." name="contenu" required>
        <input type="file" name="image">
        <input type="submit" value="publier" class="bg-slate-500">
    </form>
</body>
</html>
