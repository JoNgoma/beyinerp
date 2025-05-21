<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    body {
      padding-top: 64px;
      background-color: #f8f9fa;
    }
    .welcome-container {
      text-align: center;
      margin-top: 20vh;
    }
    .btn-primary {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container welcome-container">
    <h1>Bienvenue sur la plateforme de stockage de contacts</h1>
    <p>Gérez vos contacts facilement et efficacement.</p>
    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Commencer</a>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>