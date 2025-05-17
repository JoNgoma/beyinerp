<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  <style>
    body {
      padding-top: 64px;
      background: #f8f9fa;
    }
    .sidebar {
      width: 280px;
      top: 64px;
      bottom: 0;
      position: fixed;
      overflow-y: auto;
    }
    .main-content {
      margin-left: 280px;
      padding: 1.5rem;
      min-height: calc(100vh - 64px);
    }
    .nav-link:hover {
      background-color: #f1f3f4;
    }
  </style>
</head>

<body>
  <!-- NAVBAR FIXE -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <i class="bi bi-person-lines-fill me-2 text-primary fs-4"></i>
        <span class="fw-normal">Contacts</span>
      </a>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav gap-3">
          <li class="nav-item">
            <button class="btn btn-link text-dark border-0">
              <i class="bi bi-gear fs-5"></i>
            </button>
          </li>
          <li class="nav-item">
            <button class="btn btn-link p-0">
              <img src="https://ui-avatars.com/api/?name=User&background=random" class="rounded-circle" width="32" height="32">
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- SIDEBAR FIXE -->
  <div class="bg-white sidebar shadow-sm pt-3">
    <div class="px-3 mb-4">
      <a href="{{ route('contacts.create') }}" class="btn btn-primary rounded-pill w-100 d-flex align-items-center gap-2 justify-content-center py-2">
        <i class="bi bi-plus-lg"></i>
        <span>Créer un contact</span>
      </a>
    </div>

    <div class="nav flex-column">
      <a href="{{route('contacts.index')}}" class="nav-link text-dark rounded-0 px-3 py-2 mb-1 d-flex align-items-center">
        <i class="bi bi-person-lines-fill me-3"></i>
        <span>Contacts</span>
      </a>

      <div class="border-top my-3"></div>

      <div class="px-3 py-2 d-flex justify-content-between align-items-center">
        <span class="text-muted">Libellés</span>
        <button class="btn btn-link text-dark p-1">
          <i class="bi bi-plus-lg"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- CONTENU PRINCIPAL SCROLLABLE -->
  <main class="main-content">
    <div class="container">
      @yield('content')
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
