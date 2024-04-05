<?php

namespace App\Http\Controllers\Dashboard;


use Livewire\Component;
use App\Models\categorie;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;



#[Layout('Dashboard.layouts.app')] 
class CategorieController extends Component
{
    use WithPagination, WithoutUrlPagination; 

    use WithFileUploads;


    #[Validate] 
    public $catagory_input;
    #[Validate] 
    public $icon;
    
    #[Validate] 
    
    public $UpdateCatagory_id;
    public $UpdateCatagory_input;
    public $Newicon;

    #[Validate] 
    public $OldIcon;


    public $categoryIdToDelete;


  
    // // public $categoryId;
    // // public $categoryName;
    
    // // public $specificationIdToUpdate;
    // // public $updatedSpecificationName;



    protected $rules = [
        'catagory_input' => 'required|unique:categories,Name', 
        'icon' => 'required', 
    ];


    
    public function mount()
    {
        
        
        
    }
    #[On('post-created')] 
    
    public function render()
    {
        return view('dashboard.categorie',[
            'categories' => categorie::latest()->paginate(10),
        ]);
    }

    public function close_icon(){
         $this->icon = null;
         $this->Newicon = null; 
    }

    public function AddCategorie()
    {
        $this->validate(); 
    
        $category = new categorie();
    
        $category->Name = $this->catagory_input;
    
        if ($this->icon) {
            $iconPath = $this->icon->store('public/photos');
            $category->icon = $iconPath;
        }
    
        $category->save();
    
        $this->dispatch('swal',[
            'title'=>'Success!',
            'text'=>'Data saved succesfully!',
            'icon'=>'success',
          ]);

        $this->reset(['catagory_input', 'icon']);
    
        $this->dispatch('post-created');

    }

    public function DeleteCategorie($categoryId)
    {
        $this->categoryIdToDelete = $categoryId;
        $this->dispatch('delete-prompt');
    }

    public function deleteCategory()
    {
        $category = categorie::findOrFail($this->categoryIdToDelete);
        $category->delete();
        
        // $this->categoriess = categorie::all();

        $this->dispatch('prompt-confi-deleted');
        $this->reset(['categoryIdToDelete']);

    }

    public function EditCategorie($id){
        $category = categorie::findOrFail($id);

        $this->UpdateCatagory_id = $category->id;
        $this->UpdateCatagory_input = $category->Name;
        $this->OldIcon = $category->icon;
    
    }

    public function UpdateCategorie(){
        $category = categorie::findOrFail($this->UpdateCatagory_id);

        $category->Name = $this->UpdateCatagory_input;

       
        if ($this->Newicon) {
            $iconPath = $this->Newicon->store('public/photos');

            $category->icon = $iconPath;
        }

        $category->save();

        $this->dispatch('swal',[
            'title'=>'Success!',
            'text'=>'Data update succesfully!',
            'icon'=>'success',
          ]);

        $this->reset(['UpdateCatagory_input', 'OldIcon','Newicon','icon','UpdateCatagory_id']);

        $this->dispatch('post-created');
    }

           
     
   
}
