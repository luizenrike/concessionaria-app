<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="/storage/img/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/styles.css">

  <title>@yield('title')</title>
</head>

<body>

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>

    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block img-slide" src="/storage/img/slide_1.jpg" alt="Primeiro slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-slide" src="/storage/img/slide_2.jpg" alt="Segundo slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-slide" src="/storage/img/slide_3.jpg" alt="Terceiro slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-slide" src="/storage/img/slide_4.jpg" alt="Quarto slide">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <header class="p-3 mb-3 border-bottom headercolor">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/"><img src="/storage/img/icon.png" alt="logo" width="35" height="35"></a></li>
          <li><a href="/" class="nav-link px-2 text-white ">Home</a></li>
          <li><a href="{{url('produtos')}}" class="nav-link px-2 item-header">Comprar veículo</a></li>
          @auth 
          <li><a href="{{url('anuncie')}}" class="nav-link px-2 item-header">Anuncie seu veículo</a></li>
          @endauth
          @auth
            @if(Auth::user()->role === 'admin')
              <li><a href="{{url('dashboard/administracao')}}" class="nav-link px-2 item-header">Administração</a></li>
            @endif
          @endauth
          <li><a href="#" class="nav-link px-2 item-header">FAQs</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="GET" action="/search">
          <input type="search" class="form-control" name="search" placeholder="Busque por um veículo..." aria-label="Search">
        </form>

        @auth
        <li class="nav-link px-2 item-header">
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-outline-light">Sair</button>
          </form>
        </li>
        @endauth

        @guest
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Faça seu login
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/login">Entrar</a></li>
            <li><a class="dropdown-item" href="/register">Registrar-se</a></li>
          </ul>
        </div>
        @endguest

      </div>
    </div>
  </header>

  <main>


    @if(session('fail-searchId'))
    <div class="alert alert-danger w-25" role="alert">{{session('fail-searchId')}}</div>
    @endif

    @yield('content')
  </main>


  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Produtos</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2024-{{date('Y')}}, Key Vehicles </p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="/js/script.js"></script>
</body>

</html>