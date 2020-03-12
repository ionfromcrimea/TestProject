<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    function avg_value($city) {
//        dd($city, $this->id);
        $votes = Vote::where('city_id', $city->id)->where('provider_id', $this->id)->get();
//        dd($votes);
//        dd($votes->avg('value'));
        return(round($votes->avg('value'),2));
    }
    function user_value($sity, $user) {
        $vote = Vote::where('city_id', $sity->id)->where('user_id', $user->id)->where('provider_id', $this->id)->first();
//        dd($vote);
        return(is_null($vote) ? 0 : $vote->value);
    }
}
