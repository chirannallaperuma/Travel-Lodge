<?php

namespace App\Http\Controllers\Auth;

use App\HotelModel;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    //function for redirecting
    public function redirectTo()
    {
        $user = Auth::user();

        if (!is_null($user)) {
            if ($user->type == 1) {
                return '/home';
            } else {
                return '/dashboard';
            }
        }
    }

    //function for return view of customer register
    public function newCustomer()
    {
        return view('auth.customer_register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    //function for validation
    protected function validator(array $data)
    {
        if ($data['user'] == 'user') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'city' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'numeric'],
            ]);
        } else {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'city' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'numeric'],
                'hotel_name' => ['required', 'string', 'max:255'],
                'hotel_email' => ['required', 'email', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:50'],
                'hotel_rooms' => ['required', 'numeric', 'min:1', 'max:20'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */

    //function for create user/hotel
    protected function create(array $data)
    {
        if ($data['user'] == 'user') {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'city' => $data['city'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'type' => User::USER
            ]);

        } elseif ($data['user'] == 'hotel') {

            $hotel = HotelModel::create([
                'hotel_name' => $data['hotel_name'],
                'hotel_email' => $data['hotel_email'],
                'description' => $data['description'],
                'hotel_rooms' => $data['hotel_rooms'],
                'ac' => isset($data['ac']) == 'ac' ? 1 : null,
                'pool' => isset($data['pool']) == 'pool' ? 1 : null,
                'wifi' => isset($data['wifi']) == 'wifi' ? 1 : null,
                'gym' => isset($data['gym']) == 'gym' ? 1 : null,
                'city' => $data['city'],
                'address' => $data['address'],
            ]);

            if (array_key_exists('image', $data)) {
                $diskName = 'public';
                $disk = Storage::disk($diskName);

                $path = $data['image']->store('img/hotels' . $hotel->id, $diskName);
                $url = $disk->url($path);

                $hotel->update([
                    'img_url' => $url
                ]);
            }

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'city' => $data['city'],
                'address' => $data['address'],
                'contact' => $data['contact'],
                'type' => User::HOTEL,
                'hotel_id' => $hotel->id,
            ]);
        }
        return redirect()->back()->with('alert', 'successfully created');

    }
}
