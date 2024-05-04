<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component


{
    use WithFileUploads;


    
    // #[Validate('required', message: "Il campo è obbligatorio")]
    public $temporary_images;
    
    // #[Validate('required', message: "Il campo è obbligatorio")]
    public $images = [];

    

    #[Validate('required', message: "Il campo è obbligatorio")]
    public $title;

    #[Validate('required', message: "Il campo è obbligatorio")]
    #[Validate('max:500', message: "Il campo è di massimo 500 caratteri")]
    public $body;


    #[Validate('required', message: "Il campo è obbligatorio")]
    #[Validate('numeric', message: "Il prezzo deve essere un numero")]
    #[Validate('min:1', message: "Il prezzo deve essere minimo 1")]
    public $price;
    // #[Validate('max:1000', message: "Il prezzo deve essere massimo 1000")]


    #[Validate('required', message: "Il campo è obbligatorio")]
    public $category;

    protected $rules = [
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];
    
    protected $messages = [ 
        'images.max' => "l'immagine deve essere massimo di 1MB",
        'images.image' => "Il file dev'essere un'immagine",
        'temporary_images.*.image' => "i file devono essere immagini",
        'temporary_images.*.max' => "l'immagine deve essere massimo di 1MB",
    ];


    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])){
                foreach ($this->temporary_images as $image) {
                        $this->images[] = $image;
                    }
                }
            }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();

        $category = Category::find($this->category);

        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $announcement->images()->create(['path'=>$image->store('images','public')]);
                // sintassi video $newFileName = "announcements/{$this->announcement->id}";
                $newFileName = "announcements/{$announcement->id}";
                $newImage = $announcement->images()->create(['path'=>$image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 400 , 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);

                

            };
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }   
        
        $this->cleanForm();

        $announcement->user()->associate(Auth::user());

        $announcement->save();

        return redirect(route('announcement.index'))->with('message', 'Annuncio creato con successo');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
    }

    
    public function cleanForm()
    {
        $this->title = '';
        $this->body  = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
