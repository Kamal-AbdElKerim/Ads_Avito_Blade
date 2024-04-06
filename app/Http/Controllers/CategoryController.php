<?php

namespace App\Http\Controllers;


use App\Models\ad;
use Livewire\Component;
use App\Models\categorie;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('frontend.layouts.app')]

class CategoryController extends Component
{
    use WithPagination, WithoutUrlPagination; 

    public $idCategory ;
    public $show = false ;
    public $city_json  ;
    public $CitySearch  ;
    public $CitySearch_value  ;
    public $Search_title  ;
    public $priceRange = 10000    ;


    public function mount()
    {
        $this->city_json = json_decode(file_get_contents(public_path('json/city.json')), true);

    }

    public function render()
    {
        $adsQuery = ad::latest()->with('favorites')->where('status','approved');

        if ($this->idCategory) {
            $adsQuery->where('CategoryID', $this->idCategory);
        }
        
        $ads = $adsQuery->when($this->CitySearch_value, function ($query) {
            if ($this->CitySearch_value === 'all') {

                return $query;
                
            }else {
                return $query->where('City', $this->CitySearch_value);

            }
        })
        ->when($this->Search_title, function ($query) {
            return $query->where('Title', 'like', '%' . $this->Search_title . '%');
        })
        ->when($this->priceRange, function ($query) {
            return $query->where('Price' ,'<=' , $this->priceRange );
        })
        ->paginate(6);
       
        return view('frontend.pages.category', [
            'ads' => $ads,
            'categorys' => Categorie::has('ads')->with('ads')->withCount('ads')->get(),
            'city_json' => $this->city_json,
        ]);
        
    }

    public function FilterCategorie($id){
        // sleep(2);
        $this->idCategory = $id;
    }

    public function show_Categories(){
        $this->show = !$this->show;
    }

    public function SearchCity(){
        $this->CitySearch_value = $this->CitySearch;
      
    
    }
    // public function SearchTitle(){
    //     $this->SearchTitle_value = $this->Search;
      
    
    // }

    


    

}
