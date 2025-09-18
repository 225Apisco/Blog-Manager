<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Blog-Manager')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- ===== HEADER ===== -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    🌐 MonSite
                </a>

                <!-- Burger menu -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-light text-dark ms-2 px-3 rounded-pill" href="{{ route('login') }}">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-light text-dark ms-2 px-3 rounded-pill" href="{{ route('register') }}">
                                    Inscription
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Tableau de bord</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- ===== HERO SECTION ===== -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenue sur Blog Manager 🚀</h1>
            <p class="lead text-muted mb-4">Gérez facilement vos articles, interagissez avec vos lecteurs et développez votre audience en toute simplicité.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-4">Commencer maintenant</a>
        </div>
    </section>

    <!-- ===== FEATURES ===== -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Pourquoi choisir Blog Manager ?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Gestion des articles">
                        <div class="card-body">
                            <h5 class="card-title">Gestion des articles</h5>
                            <p class="card-text text-muted">Créez, modifiez et organisez vos articles de blog en toute simplicité avec une interface intuitive.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Commentaires et échanges">
                        <div class="card-body">
                            <h5 class="card-title">Commentaires & échanges</h5>
                            <p class="card-text text-muted">Interagissez directement avec vos lecteurs et développez une vraie communauté autour de vos contenus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Statistiques avancées">
                        <div class="card-body">
                            <h5 class="card-title">Statistiques avancées</h5>
                            <p class="card-text text-muted">Suivez les performances de vos articles et optimisez votre stratégie de publication.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CALL TO ACTION ===== -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h2 class="fw-bold mb-3">Prêt à partager vos idées avec le monde ?</h2>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill px-4">Créer mon compte gratuit</a>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-dark text-light py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-1">&copy; {{ date('Y') }} MonSite. Tous droits réservés.</p>
            <div>
                <a href="#" class="text-light me-3">À propos</a>
                <a href="#" class="text-light me-3">Contact</a>
                <a href="#" class="text-light">Confidentialité</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
