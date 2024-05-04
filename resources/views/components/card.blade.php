<div class="card rounded shadow border-0 zoom ">
    <div class="card-body p-4">
        <img src="{{$image}}" alt="" class="img-fluid d-block mx-auto mb-3">
        <h5> <a href="{{$hrefAnnouncement}}" class="text-dark">{{$title}}</a></h5>
        <h5 class="text-dark">{{$price}} €</h5>
        <p class="small text-muted font-italic">{{Str::limit($body, 10)}}</p>
        @if (Route::currentRouteName() != 'category.show')
        <p> <a href="{{$hrefCategory}}" class="text-dark">{{$category}}</a></p>
        @endif
        <p class="small text-muted font-italic">{{$createdAt}}</p>
    </div>
</div>

