<?php

namespace App\Livewire\Admin\State;

use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $countries =[];
    public $stateId;
    public $countryId=0;
    public $name;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function submit($formData,State $state)
    {
        $validator = Validator::make($formData,[
            'name'=>'required|string|max:30',
            'countryId'=>'required|exists:countries,id',
        ],[
            '*.required'=>'پر کردن فیلد اجباری است',
            '*.string'=>'فرمت وارد شده اشتباه است',
            'countryId.exists'=>'کشور نامعتبر است',
        ]);
        $validator->validate();
        $state->submit($formData,$this->stateId);
        $this->reset();
        $this->dispatch('show-success-toast', 'عملیات با موفقیت انجام شد');
    }

    public function edit($state_id){
        $state=State::find($state_id);
        if ($state){
            $this->name= $state->name;
            $this->stateId= $state->id;
            $this->countryId= $state->country_id;
        }
    }

    public function delete($state_id)
    {
        State::destroy($state_id);
        $this->dispatch('show-success-toast', 'عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $states = State::query()->with('country')->paginate(1);
        return view('livewire.admin.state.index',['states'=>$states])->layout('layouts.admin.app');
    }
}
