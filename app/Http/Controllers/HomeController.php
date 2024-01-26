<?php

namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Models\ApartmentRoom;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Session;

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
                return view('Users.index');
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
                return view('Users.book_property');
            } else {
                $booking=Apartment::all();
                return view('Admin.booking', compact('booking'));
            }
        } else {
            return view('auth.login');
        }

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

            if ($usertype == 'admin')
            {
                $users=User::all();
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

               // $rooms = ApartmentRoom::where('apartmentId', $id)->get();


                return view('Admin.apartment-details', compact('booking', 'rooms'));
            }
        } else {
            return view('auth.login');
        }

    }



}
