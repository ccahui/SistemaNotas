@include('componentes/header')


<div class="row">
  <div class="col s3">
    @include('componentes/sidebar')
  </div>
  <div class="col s9">
    @yield('content')
  </div>
</div>

</div>

@include('componentes/footer')