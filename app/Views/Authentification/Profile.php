<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - mySoulmate</title>
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

    <main class="main-content">
        <div class="container">
            <form action="<?= base_url('/upload') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="profile-container">
                    <div class="profile-header">
                        <style>
                            .profile-photo {
                                position: relative;
                                display: inline-block;
                                width: 220px;
                                /* photo plus grande */
                                height: 220px;
                            }

                            .profile-photo img {
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                object-fit: cover;
                                border: 3px solid #fff;
                                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
                            }

                            /* Bouton crayon */
                            .edit-btn {
                                position: absolute;
                                top: 12px;
                                right: 12px;
                                background: transparent;
                                /* pas de fond */
                                border: none;
                                padding: 0;
                                cursor: pointer;
                            }

                            .edit-btn img {
                                width: 40px;
                                /* taille du crayon */
                                height: 40px;
                                filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.5));
                                /* ombre pour lisibilité */
                                transition: transform 0.2s ease;
                            }

                            .edit-btn:hover img {
                                transform: scale(1.10);
                                /* zoom au survol */
                            }
                        </style>

                        <div class="profile-photo">
                            <?php if ($data['pdp']): ?>
                                <img src="<?= base_url($data['pdp']) ?>" alt="Photo de profil" id="profilePhoto">
                            <?php else : ?>
                                <img src='https://cdn-icons-png.flaticon.com/512/9177/9177948.png' alt="Photo de profil" id="profilePhoto">
                            <?php endif; ?>

                            <!-- Input caché -->
                            <input type="file" id="uploadPhoto" name='pdp' accept="image/*" style="display:none;">

                            <!-- Bouton crayon -->
                            <button type="button" class="edit-btn" id="editPhotoBtn" style="display: none;">
                                <img src="https://static.vecteezy.com/system/resources/previews/000/355/007/non_2x/pencil-vector-icon.jpg" alt="Modifier">
                            </button>
                        </div>
                        <script>
                            document.getElementById("editPhotoBtn").addEventListener("click", function() {
                                document.getElementById("uploadPhoto").click();
                            });

                            // Afficher un aperçu quand l’utilisateur choisit une photo
                            document.getElementById("uploadPhoto").addEventListener("change", function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById("profilePhoto").src = e.target.result;
                                    }
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>


                        <div class="profile-info">
                            <?php if ($data['name_profile']): ?>
                                <h2 id="profileName"><?= esc($data['name_profile']) ?></h2>
                            <?php else: ?>
                                <h2 id="profileName"><?= esc($data['last_name']) ?></h2>
                            <?php endif; ?>
                            <input type="text" id="editNomProfile" name="name_profile" style="display: none;" value="<?= esc($data['name_profile']) ?>">
                            <!-- <input type="text" id="editNomProfile" name="name_profile" value="<?= esc($data['name_profile']) ?>" style="display: block;"> -->
                            <!-- <p id="profileMatricule">Matricule: <?= esc($data['matricule']) ?></p> -->
                            <p id="profileEmail">Email: <?= esc($data['email']) ?></p>
                        </div>
                        <button type="button" class="btn-edit-profile">Modifier le profil</button>

                    </div>

                    <div class="profile-details">
                        <div class="profile-section">
                            <h3>Informations personnelles</h3>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>Âge:</label>
                                    <span id="profileAge"><?= esc($data['age']) ?> ans</span>
                                    <input type="number" id="editAge" name="age" style="display: none;" value="<?= esc($data['age']) ?>">
                                </div>
                                <div class="info-item">
                                    <label>Ville:</label>
                                    <span id="profileCity"><?= esc($data['city']) ?></span>
                                    <input type="text" id="editCity" style="display: none;" name="city" value="<?= esc($data['city']) ?>">
                                </div>
                                <div class="info-item">
                                    <label>Classe:</label>
                                    <span id="profileJob"><?= esc($data['job']) ?></span>
                                    <input type="text" id="editJob" name="job" style="display: none;" value="<?= esc($data['job']) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="profile-section">
                            <h3>À propos de moi</h3>
                            <div class="about-section">
                                <p id="profileBio"><?= esc($data['about_me']) ?></p>
                                <textarea id="editBio" style="display: none;" name="about_me" rows="4"><?= esc($data['about_me']) ?></textarea>
                            </div>
                        </div>

                        <div class="profile-section">
                            <h3>Centres d'intérêt</h3>
                            <div class="interests-tags">
                                <span class="tag"><?= esc($data['centre_interet']) ?></span>
                                <input type="text" id="editCentre" name="centre_interet" style="display: none;" value="<?= esc($data['centre_interet']) ?>">
                            </div>
                        </div>
                        <div class="profile-section">
                            <h3>Situations Amoureuses</h3>
                            <div class="interests-tags">
                                <span class="tag"><?= esc($data['situation_amoureuse']) ?></span>
                                <input type="text" id="editSituation" name="situation_amoureuse" style="display: none;" value="<?= esc($data['situation_amoureuse']) ?>">
                            </div>
                        </div>
                    </div>

                    <div class="profile-actions" id="editActions" style="display: none;">
                        <button type="submit" class="btn-primary">Sauvegarder</button>
                        <button class="btn-secondary">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editBtn = document.querySelector(".btn-edit-profile");
            const saveCancelActions = document.getElementById("editActions");

            // Tous les champs en mode édition (inputs/textarea)
            const editableFields = document.querySelectorAll("#editNomProfile, #editAge, #editCity, #editJob, #editBio, #editPhotoBtn, #editCentre, #editSituation");

            // Tous les textes à cacher
            const textFields = document.querySelectorAll("#profileAge, #profileCity, #profileJob, #profileBio");

            editBtn.addEventListener("click", function() {
                // alterner affichage
                editableFields.forEach(field => field.style.display = "block");
                textFields.forEach(field => field.style.display = "none");
                saveCancelActions.style.display = "block";
            });
        });
    </script>

</body>

</html>