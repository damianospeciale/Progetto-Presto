<x-layout>
    
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-center display-1 jost-uniquifier fw-medium welcome-title">{{__('ui.tuttigliannunci')}}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-around">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4 mt-4">
                <x-card 
                image="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300):'https://picsum.photos/200'}}"
                title="{{ $announcement->title }}" 
                price="{{ $announcement->price }}"
                body="{{ $announcement->body }}" 
                category="{{ __('ui.' . $announcement->category->name) }}"
                createdAt="{{ $announcement->created_at->format('d/m/Y') }}"
                hrefAnnouncement="{{ route('announcement.show', compact('announcement')) }}"
                hrefCategory="{{ route('category.show', ['category' => $announcement->category->id]) }}" />
                
            </div>
            @empty
            <div class="col-12 col-md-4 mt-3 text-center">
                <a href="{{ route('announcement.create') }}">
                    <button class="btn btn-dark">{{__('ui.noncisonoarticoli')}}</button>
                </a>
            </div>
            @endforelse

            <div class="col-12 mt-5 d-flex justify-content-center pino alingn-items-center">
                {{ $announcements->links()}}
            </div>
            
        </div>
        
    </div>
    
</x-layout>