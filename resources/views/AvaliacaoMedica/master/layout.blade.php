<!doctype html>
<html lang="pt_pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KlinicApp</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  
    @yield('css')
  
  </head>


  <body>
    <div class="container-fluid">
        
            {{-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary"> 
            <nav class="navbar navbar navbar-expand-md navbar-light" style="background-color: #5a4288;"> 
            <nav class="navbar navbar navbar-expand-md navbar-dark bg-primary"> --}}
            <nav class="navbar navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">  
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('home') }}">KlinivApp</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  {{-- <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0"> 
                      <li class="nav-item"> <a class="nav-link {{ (Route::current()->getName() === 'site.homepage' ? 'active' : '') }}"  href="{{ route('home') }}">Inicio</a> </li>
                      <li class="nav-item"> <a class="nav-link" href="#">Receita</a> </li>
                      <li class="nav-item"> <a class="nav-link" href="#">Curriculum</a> </li>
                      <li class="nav-item"> <a class="nav-link {{ (Route::current()->getName() === 'site.contacto' ? 'active' : '') }}" href="{{ route('site.contacto') }}">Contacto</a> </li>
                    </ul>
                  </div> --}}
                </div>
              </nav>
        
    </div>

    @yield('content')

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  
    @yield('js')

  </body>

    <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; {{ date('Y')}} Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>

</html>



