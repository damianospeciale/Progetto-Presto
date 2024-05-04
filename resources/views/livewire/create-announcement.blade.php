    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 custom-form-register">
                <form wire:submit="store" enctype="multipart/form-data">
                    
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    
                    <h1 class="text-center my-3">{{__('ui.creailtuoannuncio')}}</h1>
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('ui.titolo') }}</label>
                        <input wire:model.blur="title" type="text" class="form-control custom-input" id="title">
                        @error('title')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('ui.prezzo') }}</label>
                        <input wire:model.blur="price" type="text" class="form-control custom-input" id="price">
                        @error('price')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="body" class="form-label">{{ __('ui.corpoannuncio') }}</label>
                        <textarea wire:model.blur="body" type="text" class="custom-input form-control" id="body" cols="30" rows="10"></textarea>
                        @error('body')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">{{ __('ui.categorie') }}</label>
                        <select wire:model='category' id="category" class="form-control custom-input">
                            <option value="">{{ __('ui.sceglilacategoria') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <input wire:model="temporary_images" type="file" name="images" multiple class="form-control  @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                        @error('temporary_images.*')
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    
                    @if(!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Photo preview</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach($images as $key=>$image)
                                <div class="col my-3">
                                    <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); background-size:cover"></div>
                                    <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{ __('ui.cancella')}}</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill button-accedi">{{ __('ui.invia') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>