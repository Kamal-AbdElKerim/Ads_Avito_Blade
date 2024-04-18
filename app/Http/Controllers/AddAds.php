<?php

namespace App\Http\Controllers;


use App\Models\ad;
use App\Models\tag;
use App\Models\User;
use App\Models\image;
use App\Models\ad_tag;
use Livewire\Component;
use App\Models\categorie;
use App\Models\Notification;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

// #[Layout('frontend.layouts.app')]    
#[Layout('frontend.pages.pages_settings.layout_settings')]    

class AddAds extends Component
{
    use WithFileUploads;

    public $uplode_img = [];
    public $photos = [];


    public $years;


    public $Title = '';
    public $Category = 1;
    public $Price = '';
    public $TypePrice = 'Dollar';
    public $Condition = 'Brand New';
    public $Puissance = '5 CV';
    public $TypeCar = 'Diesel';
    public $Model = 2024;
    public $brand = '';
    public $Description = '';


    public $lastInsertedId = '';



    public $Username = '' ;
    public $Phone = '';
    public $City = 'Safi';
    public $Location = '';
    public $next_step2 = false;
    public $next_step3 = false;
    public $tags = [];
    public $tags_selected = [];
    public $city_json;

   

    public function rules()
    {
        if ($this->next_step2) {
            return [
                'Price' => 'required',
                'TypePrice' => 'required',
                'Condition' => 'required',
                'Puissance' => 'required',
                'TypeCar' => 'required',
                'Model' => 'required',
                'Description' => 'required',
                'tags_selected' => 'required',
                'uplode_img.*' => 'image|required',
            ];
        }  

        if ($this->next_step3) {

            return [
                'Username' => 'required',
                'Phone' => 'required',
                'City' => 'required',
                'Location' => 'required',
            ];

        }
        
        
        else{
            return [
                'Title' => 'required',
            ];
        }
       
    }

 
    public function mount()
    {
        $this->years = json_decode(file_get_contents(public_path('json/years.json')), true);
        $this->city_json = json_decode(file_get_contents(public_path('json/city.json')), true);
        
        $this->Username = Auth()->user()->name;
        $this->Phone = Auth()->user()->phone;


      
    
    }

    public function updatedUplodeImg()
    {


    
        // Limit the number of uploaded images to store in $photos
        $count = count($this->photos);
        $remainingSlots = 6 - $count;
        $this->uplode_img = array_slice($this->uplode_img, 0, $remainingSlots);
    
        foreach ($this->uplode_img as $photo) {
            $this->photos[] = [
                'url' => $photo->temporaryUrl(),
                'path' => $photo->getRealPath(),
            ];
        }
    }
    

    public function removePhoto($index)
    {
        unset($this->photos[$index]);
        $this->photos = array_values($this->photos); // Re-index array
    }

  


    public function render()
    {
        return view('frontend.pages.add-ads', [
            'categories' => categorie::all(),
                'tags' => tag::where('CategoryID', '=', $this->Category),
        ]);
    }

    public function validation()
    {

     
        $validated = $this->validate();

    }
    public function Step1()
    {
        sleep(1);
        if ($this->Category) {

            $this->tags = tag::where('CategoryID', '=', $this->Category)->get();
        }

        if ($this->Title !== '') {
            $this->next_step2 = !$this->next_step2;
          
              
        }else{

            $validated = $this->validate();
        }

    }
    public function Step2()
    {
        sleep(1);
        // $this->next_step2 = false ;
       
        if ($this->Price !== '' && $this->TypePrice !== ''  && $this->Condition !== '' && $this->Puissance  !== '' && $this->TypeCar !== '' && $this->Model !== ''  && $this->Description !== ''  && $this->tags_selected && $this->photos ) {
            $this->next_step3 = !$this->next_step3;
            $this->next_step2 = !$this->next_step2;

              
            $this->dispatch('scrollToElement', ['#stepp']);
        }else{

            $validated = $this->validate();
        }

        
    }

    public function Step3(){
        // $validated = $this->validate();

        sleep(1);
        
        if ($this->Username !== '' && $this->Phone !== ''  && $this->City !== '' && $this->Location  !== ''  ) {

            // dd($this->photos);
            $ad = new ad();

                $ad->Title = $this->Title;
                $ad->Description =  $this->Description;
                $ad->CategoryID = $this->Category; 
                $ad->Condition = $this->Condition; 
                $ad->Puissance = $this->Puissance; 
                $ad->TypeCar = $this->TypeCar; 
                $ad->Model = $this->Model; 
                $ad->UserID = Auth()->id(); 
                $ad->Price = $this->Price; 
                $ad->TypePrice = $this->TypePrice; 
                $ad->City = $this->City; 
                $ad->Location = $this->Location; 
                
            $ad->save();

            $this->lastInsertedId = $ad->id;

            // add Notification

            Notification::create([
                'user_id' => Auth()->id(),
                'type' => 'info',
                'message' => 'Your ad has been saved You must wait for the admin to accept your Ad.',
            ]);

            // Add images

            foreach ($this->photos as $photo) {

                $url = Storage::putFile('public/Ads', $photo['path']); 
    
                $image = new image();
                $image->ImageURL = $url;
                $image->AdID = $this->lastInsertedId; 
                $image->save();
            }
    
            $this->photos = [];

        // Add tags

        foreach ($this->tags_selected as $tag) {
             $ad_tag = new ad_tag();
            $ad_tag->AdID = $this->lastInsertedId;
            $ad_tag->TagID = $tag; 
             $ad_tag->save();

        }

        $this->reset([
            'Title', 'Description', 'Category', 'Condition', 'Puissance', 'TypeCar',
            'Model', 'Price', 'TypePrice', 'City', 'Location', 
            'next_step2', 'next_step3', 'tags_selected', 'photos'
        ]);

        $this->dispatch('swal',[
            'title'=>'ad saved succesfully!',
            'text'=>'You must wait for the admin  to accept your Ad. This will be done in 30 minutes',
            'icon'=>'success',
          ]);
            
            
        }else{
            $this->next_step2 = false ;

            $validated = $this->validate();
        }


    }

  
}
