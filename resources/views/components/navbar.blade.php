<div class=" sticky-md-top">
    <navbar class="navbar navbar-expand-lg sfondo-navbar">
        <div class="container-fluid justify-content-around">
            {{-- Presto logo clickable --}}
            <a class="navbar-brand navbarFont m-3 d-flex align-items-center jost-bold" href="{{ route('home') }}">
                <img class="logo object-fit-contain" src="{{ asset('images/timer.png') }}" alt="Logo">
                Presto
            </a>

            {{-- Searchbar --}}
            <form action="{{ route('announcements.search') }}" method="GET" class="d-flex" role="search">
                <div class="box" id="searchbar">
                    <div id="overlay"></div>
                    <i class="fa-solid fa-magnifying-glass search-glass"></i>
                    <input class="my-5" type="search" name="searched" placeholder="{{__('ui.cerca')}}" id="searchbarInput">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse container-fluid justify-content-around" id="navbarSupportedContent">

                <div class="ms-auto d-flex flex-column flex-md-row">
                    {{-- Login button --}}
                    @guest
                        <a class="anchor-login" href="{{ route('login') }}">
                            <button class="btn rounded-custom login-btn d-flex align-items-center" type="submit">
                                {{ __('ui.accediregistrati') }}
                            </button>
                        </a>
                    @endguest

                    @auth
                        <p class="mt-3 mt-md-0 utente mb-0 d-flex align-items-center">
                            <i class="me-2 fa-solid fa-user"></i>
                            {{ Auth::user()->name }}
                        </p>
                    @endauth

                    {{-- Logout button --}}
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn rounded-custom logout-btn d-flex align-items-center"
                                type="submit">Logout</button>
                        </form>
                    @endauth

                    {{-- Revisor button --}}
                    @auth
                        @if (Auth::user()->is_revisor)
                            <form action="{{ route('revisor.index') }}" method="GET">

                                <button class="btn rounded-custom login-btn " type="submit">{{ __('ui.zonarevisore') }}
                                    <span>{{ App\Models\Announcement::toBeRevisionedCount() }}</span>
                                </button>

                            </form>
                        @endif
                    @endauth

                    {{-- New announcement --}}
                    <form action="{{ route('announcement.create') }}" method="GET">

                        <button class="btn ms-md-2 my-2 my-md-0 rounded-custom sell-btn d-flex align-items-center" type="submit">
                            <i class=" me-2 fa-solid fa-circle-plus"></i>
                            {{ __('ui.vendi') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </navbar>

    {{-- Navbar parte sottostante --}}
    <nav class="navbar navbar-expand-lg sfondo-navbar">
        <div class="container-fluid" style="border-top:solid 1.5px var(--lightgrey);">
            {{-- collassato da mobile --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-1">
                    {{-- Categories --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-6 lato-bold" id="categoriesDropdown" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            style="color: #292f36">{{ __('ui.tuttelecategorie') }}</a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('category.show', compact('category')) }}">{{ __('ui.' . $category->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 lato-bold" href="{{ route('announcement.index') }}"
                            style="color: #292f36">{{ __('ui.tuttigliannunci') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-md-auto mb-2 mb-lg-0 mt-1">
                    <li class="nav-item dropdown d-flex justify-content-md-end mx-2">
                        <a class="nav-link dropdown-toggle lato-bold" id="categoriesDropdown" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false" style="lato-bold">
                            {{ __('ui.Lingua') }} <i class="fa-solid fa-globe "></i>

                        </a>
                        <ul class="dropdown-menu container" aria-labelledby="categoriesDropdown">
                            <x-_locale lang='it' />
                            <x-_locale lang='en' />
                            <x-_locale lang='fr' />
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
