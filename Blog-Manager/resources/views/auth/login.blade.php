<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-7 col-lg-5">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h4 class="card-title mb-3 text-center">Se connecter</h4>

          @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Adresse e-mail</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required autofocus>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>

            <div class="d-grid">
              <button class="btn btn-primary btn-lg rounded-pill" type="submit">Connexion</button>
            </div>

            <div class="d-flex justify-content-between mt-3 small">
              <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
              <a href="{{ route('register') }}">Créer un compte</a>
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
