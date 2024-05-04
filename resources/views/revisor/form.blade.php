<x-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-2 fw-medium">Candidati per diventare revisore</h1>
            </div>
        </div>
    </div>
    
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-12 div-custom">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="POST" action="{{ route('become.revisor') }}" class="custom-form-register">
                    @csrf
                    <div class="mb-3 text-center">
                        <label for="userText" class="form-label lato-light fw-medium fs-5">{{__('ui.perchevuoilavorare')}}</label>
                        <textarea name="description" class="form-control" cols="30" rows="10" id="userText" ></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">{{__('ui.inviacandidatura')}}</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
</x-layout>

{{-- <div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-2">Candidati per diventare revisore</h1>
        </div>
    </div>
</div>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-8">

            <form method="POST" action="{{route('become.revisor')}}">
                @csrf
                <div class="mb-3">
                    <label for="userText" class="form-label">Perché vuoi diventare revisore?</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" id="userText" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> --}}
