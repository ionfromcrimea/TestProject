<?php

namespace App\Http\Controllers;

use App\City;
//use App\Provider;
use App\Post;
use App\Provider;
use App\User;
//use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {

        $users = User::get();
        $cities = City::get();

//        $city = City::first();
//        $providers = Provider::get();
//        $city->providers()->sync($providers->pluck('id'));
//        dd($city);

//        dd($request->mobile);
//        dd($_SERVER['HTTP_USER_AGENT']);

//        foreach ($cities as $k => $city)
//            $k = $city->id;
//        dd($cities);

        if ($request->isMethod('POST')) {
// 1. Получить список провайдеров в городе
//            dd($_SERVER);
            $user = User::find($request['users']);
            $city = City::find($request['cities']);
//        dd($city);
            $providers = $city->providers;
//            $providers = $providers->toArray();
//            dd($providers);

            foreach ($providers as $prov) {
                $prov->setAttribute('average', 0);
                $prov->average = $prov->avg_value($city);
            }
            $providers = $providers->sortByDesc('average')->values();

//            usort($providers->toArray(), function ($k1, $k2, $city){
//                return(($k1->avg_value($city)*100) <=> ($k2->avg_value($city)*100));
//            });
//dd($providers);

//            $provider = Provider::first();
//            dd($provider->user_value($city, $user));
// 2. Получить среднюю оценку каждому найденному провайдеру в городе (в Provider!)

//            $avg_values = DB::table('votes')
//                ->select(DB::raw('count(*) as vote_count, round(avg(value),1) as stars, provider_id as id'))
//                ->where('city_id', $city->id)
//                ->groupBy('provider_id')
//                ->get();
//            dd($avg_values, $avg_values[1], $avg_values[1]->stars);
//            echo "<pre>" . print_r($avg_values) . "</pre>";

// 3. Получить оценки пользователя каждому найденному провайдеру в городе (в Provider!)
//            $user_values = Vote::where('user_id', $user->id)
//                ->where('city_id', $city->id)
//                ->get();
//            dd($user_values, $user_values[1], $user_values[1]->value);
        } else {
            $user = null;
            $city = null;
            $providers = Provider::get();
//            $avg_values = null;
//            $user_values = null;
        }
        return view('index', compact('users', 'cities', 'user', 'city', 'providers'));
//        , 'avg_values', 'user_values' - лишние!?234
    }

    public function st(Request $request)
    {
        $users = User::get();
        $user = '';
        $filename = '';
        $realname = '';
        $extension = '';
        $path = '';
        $size = '';

        if ($request->isMethod('POST')) {
//            dd($request->file('image'));
//            dd($request->file('image')->getClientOriginalName());
            $user = User::find($request['users']);
            $filename = $request->image;
            $realname = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->extension();
            $path = $request->file('image')->store('posts');
            $size = Storage::size($path);
//            dd($size, $extension);
            $params['id_sender'] = 1;
            $params['id_reseiver'] = $user->id;
            $params['realname'] = $realname;
            $params['filename'] = $path;
            $params['size'] = $size;
            $params['ext'] = $extension;
//            $params['filename'] = $path;
            Post::Create($params);

        }
            return view('st', compact('users', 'user', 'realname', 'filename', 'path', 'extension', 'size'));

    }
}
