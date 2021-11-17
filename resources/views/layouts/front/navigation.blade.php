<style>
  html,
  body {
    font-family: "Rubik", sans-serif;
  }

  /* navigation 
 - show navigation always on the large screen devices with (min-width:1024)
*/

  @media (min-width: 1024px) {
    .top-navbar {
      display: inline-flex !important;
    }
  }

</style>

<nav class="flex items-center bg-gray-800 p-3 flex-wrap">
  <a href="/" class="p-2 mr-4 inline-flex items-center">
    <span class="text-xl text-white font-bold uppercase tracking-wide">Level up week project note</span>
  </a>
  <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
    <i class="material-icons">menu</i>
  </button>
  <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
    <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
      <a href="/" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Home</span>
      </a>
      <a href="/global-note" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Global Note</span>
      </a>
      <a href="/liked-note" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Liked Note</span>
      </a>
      <a href="/personnal-note" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Personnal Note</span>
      </a>
      <a href="/shared-note" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Shared Note</span>
      </a>
      <a href="/tag-note" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Tag Note</span>
      </a>
      @if (auth()->check() == false)
      <a href="/login" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Login</span>
      </a>
      <a href="/register" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
        <span>Register</span>
      </a>
      @else
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button  type="submit" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
          <span>Logout</span>
        </button>
      </form>
      @endif

      <p class="text-white">{{ auth()->user()->email . ' | id: ' . auth()->user()->id . ' | name: ' . auth()->user()->name }}</p>
    </div>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(".nav-toggler").each(function(_, navToggler) {
      var target = $(navToggler).data("target");
      $(navToggler).on("click", function() {
        $(target).animate({
          height: "toggle"
        });
      });
    });
  });

</script>
