<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion - mySoulmate</title>
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
            <a href="<?= base_url('/publication') ?>" class="nav-item active">
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
            <input type="text" placeholder="Rechercher..." id="searchInput">
            <span class="search-icon">🔍</span>
        </div>
        <div class="nav-logout">
            <a href="index.html" class="btn-logout">Déconnexion</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            <div class="chat-container">
                <div class="chat-header">
                    <button class="btn-back" onclick="window.location.href='<?= base_url('/chat') ?>'">← Retour</button>

                    <div class="chat-user-info">
                        <img src=<?= $pdp ? base_url($pdp) : 'https://cdn-icons-png.flaticon.com/512/9177/9177948.png'?> alt="Avatar" class="chat-avatar">
                        <div>
                            <h4 id="chatUserName"><?= esc($name_profile ?: $last_name); ?></h4>
                            <span class="status online">En ligne</span>
                        </div>
                    </div>
                </div>

                <!-- <div class="chat-messages" id="chatMessages">
                    <?php if (!empty($messages)): ?>
                        <?php foreach ($messages as $msg): ?>
                            <?php $isMe = ($msg['id_expediteur'] == session('user_id')); ?>
                            <div class="message <?= $isMe ? 'sent' : 'received' ?>">
                                <div class="message-content">
                                    <?= esc($msg['contenu']) ?>
                                    <span class="time"><?= esc($msg['created_at']) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucun message pour le moment.</p>
                    <?php endif; ?>
                </div>



                <div class="chat-input">
                    <form action="<?= base_url('/message') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="receiver_id" value="<?= esc($id_recepteur) ?>">
                        <input type="text" id="messageInput" name="message" placeholder="Tapez votre message...">
                        <button class="btn-send">Envoyer</button>
                    </form>
                </div> -->

                <div class="chat-messages" id="chatMessages">
                    <p>Chargement des messages...</p>
                </div>

                <div class="chat-input">
                    <form id="messageForm" action="<?= base_url('/message') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="receiver_id" value="<?= esc($id_recepteur) ?>">
                        <input type="text" id="messageInput" name="message" placeholder="Tapez votre message...">
                        <button class="btn-send" type="submit">Envoyer</button>
                    </form>
                </div>

                <script>
                    const chatMessages = document.getElementById("chatMessages");
                    const form = document.getElementById("messageForm");
                    const receiverId = <?= $id_recepteur ?>;
                    const userId = <?= session('user_id') ?>;

                    // Fonction pour charger les messages
                    function loadMessages() {
                        fetch("<?= base_url('/fetch-messages') ?>/" + receiverId)
                            .then(response => response.json())
                            .then(messages => {
                                chatMessages.innerHTML = "";
                                if (messages.length === 0) {
                                    chatMessages.innerHTML = "<p>Aucun message pour le moment.</p>";
                                    return;
                                }
                                messages.forEach(msg => {
                                    let div = document.createElement("div");
                                    div.classList.add("message");
                                    div.classList.add(msg.id_expediteur == userId ? "sent" : "received");
                                    div.innerHTML = `
                        <div class="message-content">
                            ${msg.contenu}
                            <span class="time">${msg.created_at}</span>
                        </div>
                    `;
                                    chatMessages.appendChild(div);
                                });
                                chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll en bas
                            });
                    }

                    // Rafraîchir toutes les 2 sec
                    setInterval(loadMessages, 2000);
                    loadMessages(); // Premier chargement

                    // Envoi AJAX du formulaire
                    form.addEventListener("submit", function(e) {
                        e.preventDefault();
                        const formData = new FormData(form);
                        fetch(form.action, {
                            method: "POST",
                            body: formData
                        }).then(() => {
                            form.reset();
                            loadMessages(); // recharge immédiatement après envoi
                        });
                    });
                </script>

            </div>
        </div>
    </main>
</body>

</html>