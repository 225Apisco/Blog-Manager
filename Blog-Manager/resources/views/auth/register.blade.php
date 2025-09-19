<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inscription</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h4 class="card-title mb-3 text-center">Créer un compte</h4>

          {{-- Affiche message session --}}
          @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nom complet</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                     name="name" value="{{ old('name') }}" required autofocus>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Adresse e-mail</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Nouveau champ numéro de téléphone -->
            <div class="mb-3">
              <label for="phone" class="form-label">Numéro de téléphone</label>
              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                     name="phone" value="{{ old('phone') }}" required>
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirmer mot de passe</label>
                <input id="password_confirmation" type="password" class="form-control"
                       name="password_confirmation" required>
              </div>
            </div>

            <div class="d-grid mt-3">
              <button class="btn btn-primary btn-lg rounded-pill" type="submit">S’inscrire</button>
            </div>

            <div class="text-center mt-3">
              <small>Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></small>
            </div>
          </form>

        </div>
      </div>

      <p class="text-center text-muted small mt-3">© {{ date('Y') }} MonSite</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
