<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="bg-gray-100 min-h-screen">

<?php 
    $userId = session()->get('user_id');
    $userName = session()->get('last_name');
    // $avatar = session()->get('avatar') ?? 'ispm.png';
    // $userId = 1;
    // $userName = 'Tody Fitiavana';
    $avatar = 'ispm.png';
?>
<nav class="navbar">
        <div class="nav-brand">
            <h1>💚 mySoulmate</h1>
        </div>
        <div class="nav-menu">
            <a href="<?= base_url('/'.$userId.'/AllPublication') ?>" class="nav-item active">
                <span class="nav-icon">📰</span>
                publication
            </a>
            <a href="<?= base_url('/'.$userId.'/publication') ?>" class="nav-item active">
                <span class="nav-icon">📰</span>
                Mypublication
            </a>
            <a href="<?= base_url('/chat') ?>" class="nav-item">
                <span class="nav-icon">💬</span>
                Messages
            </a>
            <a href="<?= base_url('/profile') ?>" class="nav-item active">
                <span class="nav-icon">👤</span>
                Profil
            </a>
        </div>
        <div class="nav-search">
            <input type="text" placeholder="Rechercher..." id="searchInput">
            <span class="search-icon">🔍</span>
        </div>
        <div class="nav-logout">
            <a href="<?= base_url('/auth') ?>" class="btn-logout">Déconnexion</a>
        </div>
    </nav>


<div class="pt-24 max-w-2xl mx-auto py-6 space-y-6">

    <div class="flex justify-end">
        <a href="<?= base_url($userId.'/creation') ?>"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md transition">
            Créer une publication
        </a>
    </div>

    <?php if (!empty($publication)) : ?>
        <?php foreach ($publication as $pub) : ?>
            <div class="bg-white shadow-md rounded-xl p-4">
                
                <div class="flex justify-between">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-green-400 text-white flex items-center justify-center rounded-full font-bold">
                            <?= strtoupper(substr($pub['userName'], 0, 1)) ?>
                        </div>
                        <div class="ml-3">
                            <p class="font-semibold"><?= esc($pub['userName']) ?></p>
                            <p class="text-xs text-gray-500"><?= date('d M Y H:i', strtotime($pub['_date'])) ?></p>
                        </div>
                    </div>
                    <?php if ($pub['id_utilisateur'] == $userId) : ?>
                        <div class="absolut top-10">
                            <a href="<?= base_url($pub['id'] . '/' . $userId). '/delete'?>"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?');">
                                Supprimer
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="text-gray-800 mb-3"><?= esc($pub['contenu']) ?></p>

                <?php if (!empty($pub['image'])) : ?>
                    <div class="mb-3">
                        <img src="<?= base_url('uploads/' . esc($pub['image'])) ?>"
                             alt="image"
                             class="rounded-lg max-h-80 w-full object-cover">
                    </div>
                <?php endif; ?>

                
                    <form action="<?= base_url('/message') ?>" method="post" class="flex justify-center text-gray-500 text-sm">
                            <?= csrf_field() ?>

                            <!-- On ajoute l'ID du destinataire -->
                            <input type="hidden" name="receiver_name" value="<?= esc($pub['userName']) ?>">
                            <input type="hidden" name="receiver_id" value="<?= esc($pub['id']) ?>">

                            <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white 
                            px-16 py-4 rounded-xl text-[22px] font-semibold shadow-lg
                            transform transition-all duration-300 ease-in-out group
                            hover:scale-105 hover:shadow-[0_0_20px_#4ade80] hover:from-green-600 hover:to-emerald-700 
                            active:scale-98 active:translate-y-0.5 active:shadow-md"><span class="transform transition-all duration-300 ease-in-out 
                                        group-hover:-translate-y-px group-hover:filter group-hover:drop-shadow-lg">
                                fait votre premier pas à <?= esc($pub['userName']) ?>
                            </span></button>
                    </form>
                    
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-center text-gray-500">Aucune publication pour le moment.</p>
    <?php endif; ?>

</div>

</body>
</html>
