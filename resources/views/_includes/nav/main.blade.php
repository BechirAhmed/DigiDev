
<nav class="navbar has-shadow" role="navigation" aria-label="dropdown navigation">
  <div class="navbar-brand ">
    <a href="{{ route('home') }}" class="navbar-item is-paddingless">
      <img src="{{asset('images/logo.png')}}" alt="DigiDev">
    </a>

    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10 is-active">Learn</a>
    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>

    <button class="button navbar-burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <div class="navbar-menu" id="navMenu">
    <div class="navbar-start">
      <div class="navbar-item">
        <a href="#" class="navbar-item is-tab is-hidden-tablet is-active">Learn</a>
        <a href="#" class="navbar-item is-tab is-hidden-tablet">Discuss</a>
        <a href="#" class="navbar-item is-tab is-hidden-tablet">Share</a>
      </div>
    </div>

    <div class="navbar-end">
      @guest
        <div class="navbar-item">
          <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
          <a href="{{ route('register') }}" class="navbar-item is-tab">Join Our Community</a>
        </div>

      @else

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Hey {{ Auth::user()->name }}
        </a>

        <div class="navbar-dropdown is-right">
          <a href="#" class="navbar-item">
            Profile
          </a>
          <a href="#" class="navbar-item">
            Notifications
          </a>
          <a href="{{ route('manage.dashboard') }}" class="navbar-item">
            Manage
          </a>
          <hr class="navbar-divider">
          <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="navbar-item">
            Logout
          </a>
          @include('_includes.forms.logout')
        </div>
      </div>

    @endguest

  </div>
</nav>

@section('script')
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

  });
  </script>
@endsection
