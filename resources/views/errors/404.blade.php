<!DOCTYPE html>
<html lang="en">

<head>

  @include('backend.layouts.head')

</head>

<body>

  <div class="container">

    <div class="row" style="margin-top:10%">
        <!-- 404 Error Text -->
      <div class="col-md-12">
        <div class="text-center">
          <div class="error mx-auto" data-text="404">404</div>
          <p class="lead text-gray-800 mb-5">Oups ! Page non trouvée !</p>
          <p class="text-gray-500 mb-0">Nous sommes désolés, mais nous n'arrivons pas à trouver la page que vous avez demandée. Cela peut être dû au fait que vous avez mal tapé l'adresse internet.</p>
          {{-- {{dd(auth()->user())}}; --}}
            <a href="{{route('home')}}" class="theme-btn">Retour à l'accueil</a>

        </div>
      </div>
    </div>

    </div>


    @include('backend.layouts.footer')

</body>

</html>
