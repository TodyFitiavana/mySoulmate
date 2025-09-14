<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>message</title>
</head>
<body>
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

                <a href="<?= base_url($userId.'/message') ?>" 
                class="hover:text-green-600 flex flex-col items-center">
                    <i class="fas fa-envelope"></i>
                    <span class="text-xs">Messages</span>
                </a>
            </nav>
        </div>
    </header>

    <div class="pt-24 max-w-2xl mx-auto py-6 space-y-6">
        <p>welcome message</p>
    </div>
</body>
</html>