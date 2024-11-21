<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eduscore</title>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Styles CSS -->
    <link rel="stylesheet" href="../../public/assets/css/tailwind.output.css">
</head>

<body>
    <?php if (isset($_GET['error'])): ?>
        <script>
            Swal.fire({
                title: 'Erreur',
                text: '<?php echo htmlspecialchars($_GET['error']); ?>',
                icon: 'error'
            });
        </script>
    <?php endif; ?>

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../../public/assets/img/create-account-office.jpeg" alt="image inscription" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../../public/assets/img/create-account-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Créer votre compte</h1>
                        <form id="registrationForm" action="../../controllers/users.php" method="post">
                            <input type="hidden" name="action" value="register" />
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nom complet</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    type="text"
                                    name="name" required />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Adresse mail</span>
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

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Confirmer mot de passe</span>
                                <div class="relative">
                                    <input id="confirmPassword"
                                        type="password"
                                        name="confirm_password"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"

                                        required minlength="5" />
                                    <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-tight">
                                        👁️
                                    </button>
                                </div>
                            </label>

                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                S'inscrire
                            </button>

                        </form>
                        <hr class="my-8" />

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="login.php">Avez-vous déjà un compte? Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Script d'initialisation pour Alpine -->
    <script src="../../public/assets/js/init-alpine.js"></script>

    <script>
        // Fonctionnalité pour afficher/masquer le mot de passe
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', passwordType);
            this.textContent = passwordType === 'password' ? '👁️' : '🙈';
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const confirmPasswordType = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', confirmPasswordType);
            this.textContent = confirmPasswordType === 'password' ? '👁️' : '🙈';
        });

        // Réinitialiser le formulaire après soumission réussie
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            // Vérification de la force du mot de passe
            const password = document.getElementById('password').value;
            if (password.length < 5) {
                event.preventDefault(); // Empêche la soumission si le mot de passe est trop court
                Swal.fire({
                    title: 'Erreur',
                    text: 'Le mot de passe doit contenir au moins 5 caractères.',
                    icon: 'error'
                });
                return;
            }
        });
    </script>

</body>

</html>