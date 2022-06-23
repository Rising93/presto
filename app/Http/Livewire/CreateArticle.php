<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CreateArticle extends Component
{
    
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $image;
    public $images = [];
    public $article;
    public $message;
    public $validated;
    public $temporary_images;
    public $form_id;

    protected $listeners = ['preview'];

    protected $rules = [
        'title'=> 'required|min:5',
        'body'=> 'required|min:10',
        'price'=> 'required|numeric|max:99999999',
        'category'=> 'required',
        'images.*'=> 'required|image|max:2048',
        'temporary_images.*'=> 'required|image|max:2048',
    ];

    protected $messages = [
        'required'=>'Il campo è richiesto',
        'min'=>'La lunghezza del campo è troppo corta.',
        'numeric'=> 'Il campo deve essere un numero',
        'temporary_images.required'=> 'L\' immagine richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\' immagine dev\' essere massimo di 2mb',
        'images.image' => 'Il file deve essere un\' immagine',
        'images.max' => 'L\' immagine dev\' essere massimo di 2mb',
        'images.required' => 'L\' immagine è obbligatoria',
        'price.max' => 'Il prezzo inserito ha troppe cifre!',
    ];


    
    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*'=>'image|max:2048',
        ])){
            foreach($this->temporary_images as $image){
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

    public function store(){
        if(Auth::user()->is_revisor){
            $category = Category::find($this->category);
            if($category == NULL){
                session()->flash('status', 'Devi inserire tutti i campi correttamente!');
                $this->cleanForm();
            }elseif($this->title==NULL || $this->body==NULL || $this->price==NULL){
                session()->flash('status', 'Devi inserire tutti i campi correttamente!');
                $this->cleanForm();
            }else{
                $this->validate();
                $this->article= Article::create([
                    'title'=>$this->title,
                    'body'=>$this->body,
                    'price'=>$this->price,
                    'category_id'=>$category->id,
                    'is_accepted'=>1,
                    'user_id'=>Auth::id(),
                ]);

                if(count($this->images)){
                    foreach($this->images as $image){
                        // nel video article dovrebbe essere articles a riga 127 (ed è il nome della cartella creata)
                        $newFile = "articles/{$this->article->id}";
                        $newImage = $this->article->images()->create(['path'=>$image->store($newFile, 'public')]);

                        RemoveFaces::withChain([
                            new ResizeImage($newImage->path , 200 , 250),
                            new GoogleVisionSafeSearch($newImage->id),
                            new GoogleVisionLabelImage($newImage->id)
                            ])->dispatch($newImage->id);
                        
                    }
                    File::deleteDirectory(storage_path('/app/livewire-tmp'));
                };
                
                session()->flash('message', 'Annuncio inserito con successo!');
                $this->cleanForm();
        }
        }else{
            $category = Category::find($this->category);
            if($category == NULL){
                session()->flash('status', 'Devi inserire tutti i campi correttamente!');
                $this->cleanForm();
            }elseif($this->title==NULL || $this->body==NULL || $this->price==NULL){
                session()->flash('status', 'Devi inserire tutti i campi correttamente!');
                $this->cleanForm();
            }else{
                $this->validate();
                $this->article= Article::create([
                    'title'=>$this->title,
                    'body'=>$this->body,
                    'price'=>$this->price,
                    'category_id'=>$category->id,
                    'user_id'=>Auth::id(),
                ]);

                if(count($this->images)){
                    foreach($this->images as $image){
                        // nel video article dovrebbe essere articles a riga 127 (ed è il nome della cartella creata)
                        $newFile = "articles/{$this->article->id}";
                        $newImage = $this->article->images()->create(['path'=>$image->store($newFile, 'public')]);

                        RemoveFaces::withChain([
                            new ResizeImage($newImage->path , 200 , 250),
                            new GoogleVisionSafeSearch($newImage->id),
                            new GoogleVisionLabelImage($newImage->id)
                            ])->dispatch($newImage->id);
                    }
                    File::deleteDirectory(storage_path('/app/livewire-tmp'));
                };
                
                session()->flash('allert', 'Annuncio inserito con successo! Attendi la validazione di un admin per poter visualizzare il tuo articolo');
                $this->cleanForm();
        
        }
        }
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
        $this->image='';
        $this->images=[];
        $this->temporary_images=[];
        $this->form_id=rand();

    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
