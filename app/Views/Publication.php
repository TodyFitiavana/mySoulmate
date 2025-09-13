<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une publication</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<?php 
    // $userId = session()->get('id_utilisateur');
    // $userName = session()->get('prenom');
    // $avatar = session()->get('avatar') ?? 'ispm.png';
    $userId = 1;
    $userName = 'Tody Fitiavana';
    $avatar = 'ispm.png';
?>

    <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-6xl mx-auto flex justify-between items-center p-3">
            
            <div class="flex items-center space-x-3">
                <img src="<?= base_url('public/uploads/avatars/' . $avatar) ?>" 
                    alt="avatar" 
                    class="w-10 h-10 rounded-full object-cover border">
                <span class="font-semibold text-gray-700"><?= esc($userName) ?></span>
            </div>

            <nav class="flex space-x-8 text-gray-600 text-xl">
                <a href="<?= base_url('/'.$userId) ?>" 
                class="hover:text-green-600 flex flex-col items-center">
                    <i class="fas fa-home"></i>
                    <span class="text-xs">Accueil</span>
                </a>

                <a href="<?= base_url($userId.'/publication') ?>" 
                class="hover:text-green-600 flex flex-col items-center">
                    <i class="fas fa-pencil-alt"></i>
                    <span class="text-xs">Mes pubs</span>
                </a>

                <a href="<?= base_url($userId.'/messages') ?>" 
                class="hover:text-green-600 flex flex-col items-center">
                    <i class="fas fa-envelope"></i>
                    <span class="text-xs">Messages</span>
                </a>
            </nav>
        </div>
    </header>

   <div class="pt-24 max-w-2xl mx-auto py-6 space-y-6">
        <h1 class="text-xl font-bold mb-4 text-gray-700">Créer une publication</h1>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            
            <textarea 
                name="contenu" 
                rows="3" 
                placeholder="Quoi de neuf ?" 
                required
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"></textarea>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Ajouter une image (optionnel)</label>
                <input type="file" name="image"
                       class="block w-full text-sm text-gray-600
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-green-50 file:text-green-600
                              hover:file:bg-green-100 cursor-pointer">
            </div>

            <div class="flex justify-end">
                <input type="submit" value="Publier"
                       class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
            </div>
        </form>
    </div>

</body>
</html>
