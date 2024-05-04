<footer class="text-center" style="background-color: #94dfcb">
    <div class="container container-fluid">


    <!-- Grid container -->
        <div class="row justify-content-between">
            <div class="col-12 col-md-5 my-5 d-flex flex-column align-items-center">
                @guest
                    <p class="card-text">{{ __('ui.vuoilavorare') }}</p>

                    <a href="{{ route('revisor.form') }}" class="btn rounded-pill btn-dark btn-revisor">{{ __('ui.diventarevisore') }}</a>
                @else
                    @if (!Auth::user()->is_revisor)
                        <p class="card-text" style="lato-light">{{ __('ui.vuoilavorare') }}</p>
                        <p class="card-text">{{ __('ui.cliccaqui') }}</p>
                        <a href="{{ route('revisor.form') }}" class="btn btn-dark">{{ __('ui.diventarevisore') }}</a>
                    @elseif(Auth::user()->is_revisor)
                        <p class="text-decoration-underline">{{ __('ui.revisorefooter') }}</p>
                    @endif
                @endguest
            </div>

        <!-- Section: Social media -->
        <section class="col-12 col-md-5 d-flex align-items-center justify-content-center">
            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

            <!-- Linkedin -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
            <!-- Github -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1"
                href="https://github.com/Hackademy-141A/Presto-gruppo2-DundlerMifflin.git" role="button"
                data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
        </section>
    </div>
</div>

    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 lato-light" style="background-color:#FF6B6B;text: #292F36;">
        © 2024 Copyright:
        <a class="text-body lato-bold" href="{{ route('home') }}" style="color: #292F36;">Presto.it</a>
    </div>
    <!-- Copyright -->
</footer>
