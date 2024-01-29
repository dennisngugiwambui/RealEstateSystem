<?php

namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Models\ApartmentImage;
use App\Models\ApartmentRoom;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {

                $image = Apartment::all();
                return view('Users.index', compact('image'));
            } else {
                return view('Admin.index');
            }
        } else {
            return view('auth.login');
        }
    }

    public function Profile()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {
                $userId = auth()->user()->id;
                $userDetails = UserDetail::where('userid', $userId)->get();

                $sessionId = Session::getId();


                //dd($sessionId);


                return view('Users.profile', compact('userDetails', 'sessionId'));
            } else {
                return view('Admin.profile');
            }
        } else {
            return view('auth.login');
        }
        // $userDetails=UserDetail::all();


    }

    public function PropertyBook()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {
                $apartments = Apartment::all();
                $rooms = ApartmentRoom::groupBy('apartmentId')
                    ->select('apartmentId', DB::raw('MIN(id) as min_id'))
                    ->get()
                    ->map->pluck('room', 'apartmentId', 'price');


                return view('Users.book_property', compact('apartments', 'rooms'));
            } else {
                $booking = Apartment::all();
                return view('Admin.booking', compact('booking'));
            }
        } else {
            return view('auth.login');
        }

    }

    public function getRooms($id)
    {
        $rooms = ApartmentRoom::where('apartmentId', $id)->get();
        return response()->json($rooms);
    }


    public function UsersAccounts()
    {
        return view('Users.account');

    }

    public function Messaging()
    {
        return view('Users.messaging');
    }

    public function users()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'admin') {
                $users = User::all();
                return view('Admin.users', compact('users'));
            } else {
                return view('Users.index');
            }
        } else {
            return view('auth.login');
        }

    }

    public function permissions()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {
                return view('Users.index');
            } else {
                return view('Admin.permissions');
            }
        } else {
            return view('auth.login');
        }

    }

    public function user_details($id)
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {
                return view('Users.index');
            } else {
                $users = User::find($id);

                if (!$users) {
                    // Handle the case where the user with the specified ID is not found
                    // You might want to redirect or show an error message
                    return view('Admin.index')->with('error', 'User not found');
                }

                return view('Admin.user_details', compact('users'));
            }
        } else {
            return view('auth.login');
        }

    }

    public function apartment_details($id)
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype != 'admin') {
                return view('Users.index');
            } else {
                $booking = Apartment::find($id);

                if (!$booking) {
                    // Handle the case where the user with the specified ID is not found
                    // You might want to redirect or show an error message
                    return view('Admin.index')->with('error', 'User not found');
                }

                $rooms = ApartmentRoom::where('apartmentId', $id)->get();
                $images = ApartmentImage::where('apartmentId', $id)->get();

                // $rooms = ApartmentRoom::where('apartmentId', $id)->get();


                return view('Admin.apartment-details', compact('booking', 'rooms', 'images'));
            }
        } else {
            return view('auth.login');
        }

    }

    public function sendSms(string $number, string $message)
    {
        $username = 'dennohosi'; // use 'sandbox' for development in the test environment
        $apiKey = getenv('AT_API_KEY'); // use your sandbox app API key for development in the test environment
        $AT = new AfricasTalking($username, $apiKey);


        // Get one of the services
        $sms = $AT->sms();


        // Use the service
        $result = $sms->send([
            'to' => $number,
            'message' => $message,
        ]);
    }
}
