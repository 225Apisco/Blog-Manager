{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Accueil - Blog Manager')

@section('content')
<div class="container py-5">
    <!-- Bienvenue -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Bienvenue {{ Auth::user()->name }} 👋</h1>
        <p class="lead text-muted">
            Heureux de vous revoir sur <span class="fw-bold text-primary">Blog Manager</span>.
            Gérez vos articles, explorez les contenus et échangez avec la communauté.
        </p>
    </div>

    <!-- Actions rapides -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">✍️ Nouvel article</h5>
                    <p class="text-muted">Commencez à écrire un nouvel article et partagez vos idées.</p>
                    <a href="#" class="btn btn-primary rounded-pill px-3">Écrire</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">📚 Mes articles</h5>
                    <p class="text-muted">Consultez, modifiez et organisez vos articles existants.</p>
                    <a href="#" class="btn btn-outline-primary rounded-pill px-3">Voir</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">💬 Commentaires</h5>
                    <p class="text-muted">Découvrez les retours de vos lecteurs et échangez avec eux.</p>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-3">Consulter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section communauté -->
    <div class="mt-5 text-center">
        <h2 class="fw-bold">🌍 Une communauté active</h2>
        <p class="text-muted">
            Rejoignez des centaines d’utilisateurs qui partagent leurs passions, idées et expériences à travers Blog Manager.
        </p>
        <img src="https://via.placeholder.com/800x300" alt="Communauté" class="img-fluid rounded shadow">
    </div>
</div>
@endsection
