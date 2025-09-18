<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - mySoulmate</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>

<body>
    <nav class="navbar">
        <div class="nav-brand">
            <h1>💚 mySoulmate</h1>
        </div>
        <div class="nav-menu">
            <a href="<?= base_url('/dashboard') ?>" class="nav-item">
                <span class="nav-icon">📰</span>
                Publications
            </a>
            <a href="<?= base_url('/chat') ?>" class="nav-item active">
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
            <a href="<?= base_url('/auth') ?>" class="btn-logout">Déconnexion</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            <div class="messages-layout">
                <div class="conversations-panel">
                    <h3>Conversations</h3>
                    <div class="conversations-list" id="conversationsList">
                        <?php foreach ($users as $v): ?>
                            <a href="<?= base_url('chat1/' . $v['id']) ?>" class="conversation-link" style="text-decoration: none;">
                                <div class="conversation-item">
                                    <img src="<?= $v['pdp'] ? base_url($v['pdp']) : 'https://cdn-icons-png.flaticon.com/512/9177/9177948.png' ?>"
                                        alt="Photo de profil" class="conversation-avatar">
                                    <div class="last-info">
                                        <h2>
                                            <?= esc($v['name_profile'] ?: $v['last_name']); ?>
                                        </h2>
                                        <p>Dérnières messages...</p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="chat-panel">
                    <div class="chat-header" id="chatHeader">
                        <h4>Sélectionnez une conversation</h4>
                    </div>
                    <div class="chat-messages" id="chatMessages">
                        <div class="no-chat-selected">
                            <p>Sélectionnez une conversation pour commencer à discuter</p>
                        </div>
                    </div>
                    <div class="chat-input" id="chatInputContainer" style="display: none;">
                        <input type="text" id="messageInput" placeholder="Tapez votre message...">
                        <button class="btn-send">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>