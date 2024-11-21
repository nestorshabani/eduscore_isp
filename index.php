<?php
session_start(); // Démarre la session
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eduscore</title>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles CSS -->
    <link rel="stylesheet" href="public/assets/css/tailwind.output.css">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        :root {
            --primary: rgb(24, 119, 243);
            --secondary: rgb(5, 60, 143);
            --couleur-blanche: #fbfbfb;
            --secondaire-blanch: #fdfdfd;
        }

        *,
        ::before,
        ::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins";
            /* font-family: "Hanken Grotesk"; */
        }

        body {
            background-color: "#ffff";
        }

        /* ========== style header ========== */

        .first-hero {
            margin-top: -60px;
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23377cfb' fill-opacity='0.27' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .first-hero .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .first-hero .logo img {
            width: 80px;
            height: 80px;
            background: transparent;
            object-fit: cover;
            border-radius: 50%;
        }

        .first-hero .logo h2 {
            font-weight: 900;
            font-size: 38px;
        }

        .first-hero .logo h2 span {
            color: var(--primary);
        }

        .first-hero .slogan {
            margin-top: 20px;
        }

        .first-hero .slogan p {
            text-align: center;
            font-size: 22px;
            font-weight: 400;
            width: 520px;
        }

        .links-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }

        .links-btn a {
            text-decoration: none;
            background: var(--primary);
            color: var(--couleur-blanche);
            padding: 10px 12px;
            border-radius: 10px;
            transition: 0.5s ease;
        }

        .links-btn a:last-child {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .links-btn a:hover {
            background: var(--secondary);
            color: var(--couleur-blanche);
        }

        .second-hero {
            width: 80%;
            margin: 0 auto;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 15px solid rgb(238, 236, 236);
            margin-bottom: 80px;
            padding: 10px;
            border-radius: 5px;
        }

        .second-hero .contenu {
            background: var(--couleur-blanche);
            width: 100%;
            height: 100%;
        }

        .second-hero .contenu img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 18px;
            background: rgb(238, 236, 236);
        }

        footer p {
            font-weight: 300;
        }
    </style>
</head>

<body>
    <!-- ========== style header  ========== -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <script>
            Swal.fire({
                title: 'Succès',
                text: '<?php echo htmlspecialchars($_SESSION['success_message']); ?>',
                icon: 'success'
            });
        </script>
        <?php unset($_SESSION['success_message']); // Supprime le message après affichage 
        ?>
    <?php endif; ?>
    <main>
        <div class="first-hero">
            <div class="logo">
                <img src="../assets/images/edimg1.jpg" alt="logo eduscore" />
                <h2>Edu<span>Score</span></h2>
            </div>
            <div class="slogan">
                <p>
                    Suivez votre parcours universitaire en toute simplicité en
                    consultant vos notes en y faissant vos recours.
                </p>
            </div>
            <div class="links-btn">
                <a href="views/auth/login.php">Se connecter</a>
                <a href="views/auth/register.php">S'inscrire</a>
            </div>
        </div>
        <div class="second-hero">
            <div class="contenu">
                <img src="ed-img1.jpg" alt="image hero" />
            </div>
        </div>
    </main>

    <footer>
        <p>Eduscore &copy; 2024 - Tous droits réservés.</p>
    </footer>
    <!-- Alpine.js -->
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>

    <!-- Script d'initialisation pour Alpine -->
    <script src="../../public/assets/js/init-alpine.js"></script>
</body>

</html>