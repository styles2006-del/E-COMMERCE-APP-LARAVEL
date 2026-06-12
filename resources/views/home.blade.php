@auth
    <a href="#">
        <button>
            dashboard
        </button>
    </a>
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button type="submit">
            logout
        </button>
    </form>
@endauth

@guest
    <a href="{{ route('auth.login') }}">
        <button>
            Se connecter
        </button>
    </a>
    <a href="#">
        <button>
            S'inscrire
        </button>
    </a>
@endguest
