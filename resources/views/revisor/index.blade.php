<x-layout>
    
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center welcome-title fw-medium jost-uniquifier">
                    {{ $announcement_to_check ? __('ui.annuncidarevisionare') : __('ui.noncisonoannuncidarevisionare') }}
                </h1>
            </div>
        </div>
    </div>
    
    @if ($announcement_to_check)
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                {{-- carosello  --}}
                <div id="showCarousel" class="carousel slide">
                    @if ($announcement_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($announcement_to_check->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                    
                            <img src="{{ $image->getUrl(400, 300) }}" class="img-fluid vw-100">
                            <div>
                                <table class="table table-bordered border-dark border-1 mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col text-center">Tags</th>
                                            
                                        </tr>
                                    </thead>
                                    <td>
                                        @if ($image->labels)
                                        {{Arr::join($image->labels, ', ')}}
                                        @endif

                                    </td>
                                        
                                        
                                        
                                    </table>
                                <table class="table table-bordered border-dark border-1">
                                    <thead>
                                        <tr>
                                            <th scope="col">SafeSearch</th>
                                            <th scope="col">Label</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-person"></i></th>
                                            <td>
                                                <div class="{{ $image->adult }}"></div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-pills"></i></th>
                                            <td>
                                                <div class="{{ $image->medical }}"></div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-face-grin-squint-tears"></i></th>
                                            <td>
                                                <div class="{{ $image->spoof }}"></div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-person-burst"></i></th>
                                            <td>
                                                <div class="{{ $image->violence }}"></div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row"><i class="fa-solid fa-fire"></i></th>
                                            <td>
                                                <div class="{{ $image->racy }}"></div>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">prev</span>
            </button>

                <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        
        {{-- <table class=" col-12 col-md-3">
            <thead>
                <h5 class="tc-accent mt-3">Tags</h5>
                <div class="p-2">
                    @if ($image->labels)
                </thead>
                @foreach ($image->labels as $label)
                <p class="d-inline">{{ $label }},</p>
                @endforeach
                @endif
            </div>
        </table> --}}
        
        
            
            
            
            
            
            <table class="table table-bordered border-dark border-1">
                <thead>
                    <tr>
                        <th scope="col">{{__('ui.titolo')}}</th>
                        <th scope="col">{{__('ui.prezzo')}}</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $announcement_to_check->title }}</td>
                        <td>{{ $announcement_to_check->price }} euro</td>
                        
                    </tr>
                    
                    
                </tbody>
            </table>
            
            
            
            
            
            
            
            <div class="col-12">
                <h4 class="text-center lato-bold">{{__('ui.descrizione')}}</h4>
                <p class="text-center">{{ $announcement_to_check->body }}</p>
            </div>
        </div>
    </div>
    
    
    
    <div class="row justify-content-center">
        <div class="col-4 order-1 col-md-2 order-md-0 justify-content-center d-flex">
            <form
            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
            method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">{{ __('ui.accetta') }}</button>
        </form>
    </div>
    <div class="col-4 order-0 col-md-2 order-md-1 justify-content-center d-flex">
        <form
        action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
        method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-danger">{{ __('ui.rifiuta') }}</button>
    </form>
</div>
</div>
</div>
</div>

@endif



</x-layout>
