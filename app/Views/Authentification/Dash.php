<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications - mySoulmate</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>

<body>
    <?php 
    $userId = session()->get('user_id');
    $userName = session()->get('last_name');
    ?>
    <nav class="navbar">
        <div class="nav-brand">
            <h1>💚 mySoulmate</h1>
        </div>
        <div class="nav-menu">
            <a href="<?= base_url('/dashboard') ?>" class="nav-item active">
                <span class="nav-icon">📰</span>
                Amies
            </a>
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
            <a href="<?= base_url('/profile') ?>" class="nav-item">
                <span class="nav-icon">👤</span>
                Profil
            </a>
        </div>
        <div class="nav-search">
            <form action="#" method="post">
                <input type="text" placeholder="Rechercher..." id="searchInput">
                <button type="submit" class="search-icon">🔍</button>
            </form>
        </div>
        <div class="nav-logout">
            <a href="<?= base_url('/deconnection') ?>" class="btn-logout">Déconnexion</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            <h2 class="page-title">Découvrez de nouvelles personnes</h2>

            <div class="users-grid" id="usersGrid">

                <?php foreach ($data as $v): ?>
                    <div class="card">
                        <h3><?= esc($v['last_name']) ?></h3>
                        <form action="<?= base_url('/message') ?>" method="post">
                            <?= csrf_field() ?>

                            <!-- On ajoute l'ID du destinataire -->
                            <input type="hidden" name="receiver_id" value="<?= esc($v['id']) ?>">

                            <textarea name="message" placeholder="Écris ton message..."></textarea>
                            <button type="submit">Envoyer</button>
                        </form>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
</body>

</html>