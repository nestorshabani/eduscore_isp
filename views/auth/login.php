<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eduscore</title>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../public/assets/css/tailwind.output.css" />
    <script src="../../public/assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../../public/assets/img/login-office.jpeg" alt="image connexion" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../../public/assets/img/login-office-dark.jpeg" alt="image connexion" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Eduscore connexion</h1>

                        <?php if (isset($_GET['error'])): ?>
                            <script>
                                Swal.fire({
                                    title: 'Erreur',
                                    text: '<?php echo htmlspecialchars($_GET['error']); ?>',
                                    icon: 'error'
                                });
                            </script>
                        <?php endif; ?>

                        <form id="loginForm" action="../../controllers/users.php" method="post">
                            <input type="hidden" name="action" value="login" />
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Votre adresse mail</span>
                                <input type="email"
                                    name="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Votre mot de passe</span>
                                <div class="relative">
                                    <input id="password"
                                        type="password"
                                        name="password"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        required minlength="5" />
                                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-tight">
                                        👁️
                                    </button>
                                </div>
                            </label>

                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Se connecter
                            </button>
                        </form>

                        <hr class="my-8" />
                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="forgot_password.php">Mot de passe oublié ?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour gérer la visibilité du mot de passe -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', passwordType);
            this.textContent = passwordType === 'password' ? '👁️' : '🙈'; // Change l'icône
        });
    </script>

</body>

</html>