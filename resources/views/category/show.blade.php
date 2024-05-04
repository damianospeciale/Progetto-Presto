<x-layout>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 jost-uniquifier fw-medium welcome-title">{{$category->name}}</h1>
            </div>
        </div>
    </div>
    
    <div class="container mt-3">
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-3">
                <x-card 
                image="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200'}}"
                
                title="{{$announcement->title}}"
                price="{{$announcement->price}}"
                body="{{$announcement->body}}"
                category="{{$announcement->category->name}}"
                createdAt="{{$announcement->created_at->format('d/m/Y')}}"
                hrefAnnouncement="{{route('announcement.show', compact('announcement'))}}"
                hrefHome="{{route('home', compact('announcement'))}}" />
            </div>
            @empty
            
            
            <div class="col-12">
                <p class="h2 text-center"><a href="{{route('announcement.create')}}">{{__('ui.noncisonoarticoli')}}</a></p>
            </div>
        
            <div class="col-12 noannounce-back justify-content-center d-flex" style="background-image: url(/images/saddog.jpg);">
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
