<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                <!-- Login Form -->
                <div class="form-container active" id="loginForm">
                    <h2>Se connecter</h2>
                    <form action="<?= base_url('/signup/auth') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <input type="text" id="loginMatricule" name="matricule" placeholder="Matricule" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="loginPassword" name="password" placeholder="Mot de passe" required>
                        </div>
                        <button type="submit" class="btn-primary">Se connecter</button>
                    </form>
                    <p class="switch-form">Pas encore inscrit ? <a href="<?= base_url('/auth') ?>">Créer un compte</a></p>
                </div>
            </div>
    </body>

    </html>