
    <form action="{{route('setLocale', $lang)}}" method="POST" class="">
        @csrf
        <button type="submit" class="btn">
            <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32">
            </img>

        </button>
    </form>


