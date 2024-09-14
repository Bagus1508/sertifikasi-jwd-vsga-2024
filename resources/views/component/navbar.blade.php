<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home.index')}}">BeasiswaKu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link @if(Route::is('home.index')) active @endif" href="{{route('home.index')}}">Pilihan Beasiswa</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link @if(Route::is('scholarship.index')) active @endif" href="{{route('scholarship.index')}}">Daftar</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link @if(Route::is('result-scholarship.index')) active @endif" href="{{route('result-scholarship.index')}}">Hasil</a>
              </li>
          </ul>
      </div>
  </div>
</nav>
