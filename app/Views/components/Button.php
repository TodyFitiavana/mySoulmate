<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('./css/style.css')?>">
</head>
<body>
    <!-- <button
        onclick="window.location.href='<?=$url?>'"
        style = "background:<?=$color?>; color=<?=$text?>"
        class="pt-3 pb-3 rounded-sm w-52 text-xl hover:bg-blue-500"
    >
        <?= $label ?>
    </button> -->

    <button
        onclick ="window.location.href='<?=$url?>'"
        class="bg-blue-500 hover:bg-red-600 text-xl rounded-lg pl-5 pr-5 pt-3 pb-3 w-[200px]">
        <?=$label?>
        
    </button>
</body>
</html>