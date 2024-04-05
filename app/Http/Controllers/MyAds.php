<?php

namespace App\Http\Controllers;


use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

#[Layout('frontend.pages.pages_settings.layout_settings')]    
class MyAds extends Component
{
    use WithPagination;

    public $status = 'all';
    public $id_ads;
    public $data_update;

    public $Title;
    public $Price;
    public $TypePrice;
    public $Condition;
    public $Description;
    public $Username;
    public $Phone;
    public $Location;

    protected $rules = [
        'Price' => 'required',
        'Title' => 'required',
        'TypePrice' => 'required',
        'Condition' => 'required',
        'Description' => 'required',
        'Location' => 'required',
    ];

    #[On('prompt-update_ads')]
    public function render()
    {
        if ($this->status === 'all') {
            $query = Ad::with('images')->where('UserID',Auth()->id())->paginate(4);
        } else {
            $query = Ad::with('images')->where('status', $this->status)->where('UserID',Auth()->id())->paginate(4);
        }

        return view('frontend.pages.my-ads', [
            'ads' => $query,
        ]);
    }

    public function setStatus($st)
    {
        $this->status = $st;
    }

    public function delete_Ads($id)
    {
        $this->id_ads = $id;
        $this->dispatch('delete-Ads');
    }

    public function deleteAds()
    {
        $ad = Ad::findOrFail($this->id_ads);
        $ad->delete();

        $this->dispatch('prompt-confi-deleted');
        $this->reset(['id_ads']);
    }

    public function updateAds($id)
    {
        $this->id_ads = $id;
        $this->data_update = Ad::findOrFail($id);
        $this->Title = $this->data_update->Title;
        $this->Price = $this->data_update->Price;
        $this->TypePrice = $this->data_update->TypePrice;
        $this->Condition = $this->data_update->Condition;
        $this->Description = $this->data_update->Description;
        $this->Location = $this->data_update->Location;
        $this->Username = Auth::user()->name;
        $this->Phone = Auth::user()->phone;
    }

    public function update_Ads()
    {
        $validatedData = $this->validate();

        $query = Ad::findOrFail($this->id_ads);
        $query->update([
            'Title' => $this->Title,
            'Price' => $this->Price,
            'TypePrice' => $this->TypePrice,
            'Condition' => $this->Condition,
            'Description' => $this->Description,
            'Location' => $this->Location,
            'status' => 'pending',
        ]);
        
        $this->dispatch('prompt-update_ads');
        $this->reset(['data_update', 'id_ads']);

        // return $this->redirect('/MyAds', navigate: true);
        return redirect('/MyAds');
    }
}
