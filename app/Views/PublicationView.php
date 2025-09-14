<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <title>pub</title>
</head>
<body>
    <h1>liste pub</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>contenu</th>
                <th>image</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($publication as $pub) : ?>
            <tr>
                <td><?= $pub['id']?></td>
                <td><?= $pub['contenu']?></td>
                <td><img src="<?= base_url('../../uploads/'.esc($pub['image']))?>" alt="" width=200></td>
                <td><?= $pub['_date']?></td>       
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
        <?= view('components/Button',[
        'url'=> base_url('/creation'),
        'color' => 'red',
        'label' => 'creer un pub',
        'text' => 'white'
    ])?>
</body>
</html>