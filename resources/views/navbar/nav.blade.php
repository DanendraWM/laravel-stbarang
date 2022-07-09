@if ($title !== 'login' && $title !== 'error')
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <a href="{{ $title === 'continue' ? '#' : '/' }}" class="navbar-brand"><img
                    src="{{ url('image/logo/stbaranghome.png') }}" class="img-fluid" width="100px"></a><button
                class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ $title === 'form' ? 'active font-weight-bold' : '' }}"> <a
                            class="nav-link " href="/form">{{ $title === 'continue' ? '' : 'form' }}</a>
                    </li>
                    <li class="nav-item {{ $title === 'barang' ? 'active font-weight-bold' : '' }}">
                        <a class="nav-link " href="/barang">{{ $title === 'continue' ? '' : 'barang' }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                                <img src="{{ asset('image/logo/' . auth()->user()->image) }}"
                                    class="nav-img rounded-circle img_pfr">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-center" href="/profile">Profile <i
                                        class="bi bi-person-circle"></i></a>
                                <hr>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="cursor: pointer">Log Out
                                        <i class="bi bi-box-arrow-right"></i></button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item {{ $title === 'login' ? 'active font-weight-bold' : '' }}">
                            <a class="nav-link" href="/login">login</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
@else
@endif
