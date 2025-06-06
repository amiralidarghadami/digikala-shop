<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded=['id'];
    public function submit($formData, $stateId)
    {
        State::query()->updateOrCreate(
            [
                'id' => $stateId
            ],
            [
                'name' => $formData['name'],
                'country_id' => $formData['countryId']
            ]
        );
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
