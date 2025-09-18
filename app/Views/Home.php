<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello world</p>
    <!-- <form action="<?= base_url('/about')?>" method = "get">
        <button type="submit">About</button>
    </form> -->
    <?= view('components/Button',[
        'url'=> base_url('/about'),
        'color' => 'red',
        'label' => 'about',
        'text' => 'white'
    ]) ?>
</body>
</html>