<nav class="nav has-shadow">
  <div class="container">
    <div id="nav-menu" class="nav-left">
        <a class="nav-item is-brand" href="{{ action('PageController@index') }}">
          <img src="{{ URL::asset('images/logo.png')}}" alt="Bulma: a modern CSS framework based on Flexbox">
        </a>
        <a id="nav_knowledge" class="nav-item is-tab is-hidden-mobile" href="{{ action('PageController@index')}}">Knowledge</a>
        <a id="nav_categories" class="nav-item is-tab is-hidden-mobile" href="{{ action('PageController@categories')}}">Categories</a>
        <a id="nav_forums"class="nav-item is-tab is-hidden-mobile" href="{{ action('PageController@daftar_thread')}}">Forums</a>
    </div>

    <div id="nav-menu" class="nav-right">
    @if(isset($user))
        <a id="nav_forums"class="nav-item is-tab is-hidden-mobile" href="{{ action('PageController@show_profile')}}">Profile</a>
        <form action={{ action('Auth\LoginController@logout') }} method="POST" class="nav-item is-tab is-hidden-mobile">
            {{ csrf_field() }}
            <input id="nav_forums" class="button is-primary" type="submit" value="Logout"/>
        </form>
        @else
            <a id="nav_forums"class="nav-item is-tab is-hidden-mobile" href="{{ action('Auth\LoginController@showLoginForm')}}">Login</a>
    @endif
    <span class="nav-item">
      <form id="search_batik" action="">
        <div class="field is-grouped">
          <p class="control is-expanded">
            <input id="search_input" class="input" type="text" placeholder="Find a batik" name="keywords">
          </p>
          <p class="control">
            <a id="search_button" href="{{ action('PageController@search_batik', '')}}"><input class="button is-primary" type="submit" value="Search"></a>
          </p>
        </div>
      </form>
    </span>
    <script>
        $('#search_input').on('input',function(e){
            var url = "{{ action('PageController@search_batik', ':keywords')}}"
            $('#search_button').attr("href", url.replace(':keywords', $('#search_input').val()));
        });

        $('#search_batik').on('submit',function(e){
            e.preventDefault();
            location.href =   $('#search_button').attr("href");
        });
    </script>
    </div>
  </div>
</nav>
