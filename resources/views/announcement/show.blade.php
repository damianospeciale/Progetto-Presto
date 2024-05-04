<x-layout>
    <div class="container custom-card-dettagli mt-5">
        <div class="row">
            <div class="col-12">
                {{-- <div class="card justify-content-center d-flex" style="width: 18rem;"> --}}

                    <div id="carouselExample" class="carousel slide ">
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{!$announcement->images()->get()->isEmpty() ? $image->getUrl(400,300) : 'https://picsum.photos/200'}}" class="d-block w-100 img-fluid" alt="...">
                                </div>
                            @endforeach
                        </div>


                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>




                    <div class="card-body">
                        <h2 class="card-title mt-3">{{ $announcement->price }}€</h2>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mt-3">{{ $announcement->title }}</h4>
                    </div>
                    <div class="card-body mt-3">
                        <p class="card-text">{{ $announcement->body }}</p>
                    </div>

                    <hr />
                {{-- </div> --}}
            </div>
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('category.show', ['category' => $announcement->category->id]) }}"
                        method="GET">
                        <button class="btn rounded-pill login-btn mt-2 " type="submit">
                            {{ __('ui.' . $announcement->category->name) }}
                        </button>


                    </form>
                </div>



                <div class="col-6">
                    <form action="{{ route('announcement.index') }}" method="GET">
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn sell-btn rounded-pill btn-custom">
                                <i class="fa-solid fa-reply me-2 "></i>{{ __('ui.tornaindietro') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="scroll"></div>  --}}

</x-layout>
