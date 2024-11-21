<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eduscore - Mot de passe oublié</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../public/assets/css/tailwind.output.css" />
  <script src="../../public/assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
            src="../../public/assets/img/forgot-password-office.jpeg"
            alt="image mot de passe oublié" />
          <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
            src="../../public/assets/img/forgot-password-office-dark.jpeg"
            alt="image mot de passe oublié" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Mot de passe oublié</h1>
            <?php if (isset($_GET['message'])): ?>
              <script>
                Swal.fire({
                  title: 'Succès',
                  text: '<?php echo htmlspecialchars($_GET['message']); ?>',
                  icon: 'success'
                });
              </script>
            <?php endif; ?>
            <?php if (isset($_GET['error'])): ?>
              <script>
                Swal.fire({
                  title: 'Erreur',
                  text: '<?php echo htmlspecialchars($_GET['error']); ?>',
                  icon: 'error'
                });
              </script>
            <?php endif; ?>
            <form action="../../controllers/reset_password.php" method="post">
              <!-- Formulaire pour récupérer le mot de passe -->
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Entre votre adresse mail</span>
                <input type='email' name='email' required
                  class='block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' />
              </label>

              <!-- Bouton pour récupérer le mot de passe -->
              <button type='submit'
                class='block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'>
                Récupérer le mot de passe
              </button>

              <!-- Lien pour revenir à la page de connexion -->
              <p><a href="./login.php">Retour à la connexion</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Alpine.js -->
  <script src="../../public/assets/js/init-alpine.js"></script>

</body>

</html>