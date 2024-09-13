<?php

namespace App\Http\Controllers;
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
        return view('Users.index');
    }

    public function Profile($id)
    {
        // $userDetails=UserDetail::all();
        $userId = auth()->user()->id;
        $userDetails = UserDetail::where('userid', $userId)->get();

        $sessionId = Session::getId();

        dd($sessionId);

        return response()->json($userId);
        return view('Users.profile', compact('userDetails'));

    }

    public function PropertyBook()
    {
        return view('Users.book_property');
    }
    public function BookedProperty()



}
