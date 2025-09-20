<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mySoulmate - Trouvez votre âme sœur</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">

</head>

<body>
    <div class="auth-container">
        <div class="auth-header">
            <h1 class="logo">💚 mySoulmate</h1>
            <p class="tagline">Trouvez votre âme sœur</p>
        </div>

        <div class="auth-forms">
            <!-- Signup Form -->
            <div class="form-container active" id="signupForm">
                <h2>Créer un compte</h2>
                <form action="<?= base_url('/auth/save') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" id="signupNom" name="first_name" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="signupPrenom" name="last_name" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="signupMatricule" name="matricule" placeholder="Matricule" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="signupEmail" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="signupPassword" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn-primary">Créer le compte</button>
                </form>
            </div>
            <p class="switch-form">Déjà inscrit ? <a href="<?= base_url('/signup') ?>">Se connecter</a></p>
        </div>
        <?php if (isset($error_message)): ?>
            <p style="color:red; font-weight:bold;"><?= $error_message ?></p>
        <?php endif; ?>
    </div>
</body>

</html>