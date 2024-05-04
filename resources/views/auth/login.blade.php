<x-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container-fluid div-custom">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 custom-form">

                    <h1 class="my-3">{{ __('ui.accedi') }}</h1>

                    <form method="POST" action="{{ route('login') }}" class="my-5">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control custom-input" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control custom-input" id="password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-primary button-accedi rounded-pill button-accedi">{{ __('ui.accedi') }}</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p>{{ __('ui.nonhaiaccount') }} <a href="{{ route('register') }}"
                                style="color: var(--acc); font-weight: 600;">{{ __('ui.registrati') }}</a></p>
                    </div>
            </div>
        </div>
    </div>

</x-layout>
