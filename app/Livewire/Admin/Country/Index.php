<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public function submit($formData,Country $country){
        $validator = Validator::make($formData,[
            'name'=>'required|string|max:30'
        ],[
          '*.required'=>'پر کردن فیلد اجباری است',
          '*.string'=>'فرمت وارد شده اشتباه است',
          '*.max'=>'حداکثر کاراکتر مجاز : 30',
        ]);
        $validator->validate();
        $country->submit($formData);
        $this->reset();
        $this->dispatch('show-success-toast', 'عملیات با موفقیت انجام شد');
    }
    public function render()
    {
        $countries = Country::all();
        return view('livewire.admin.country.index',['countries'=>$countries])->layout('layouts.admin.app');
    }
}
