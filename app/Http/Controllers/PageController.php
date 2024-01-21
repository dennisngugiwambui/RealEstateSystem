<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\ProfileImage;
use App\Models\UserDetail;
use Brian2694\Toastr\Facades\Toastr;


class PageController extends Controller
{
    public function Homepage()
    {
        Toastr::success('user detail inserted successfully', 'success');
        
        return view('Homepage.Index');
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = auth()->user();
    
        $profileImage = new ProfileImage();
        $profileImage->userid = $user->id;
        $profileImage->username = $user->name;
    
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('imagename', $filename);
    
        $profileImage->image = $filename;
        $profileImage->save();
    
        return redirect()->back()->with('success', 'Profile image uploaded successfully!');
    }

    public function UserDetails(Request $request)
    {

        $request->validate([
            'entry' => 'required|in:about,bio,professionalism',
            'detail' => 'required|string',
        ]);

        $us=auth()->user();
        $userdetails = new UserDetail();

        $userdetails->userid = $us->id;
        $userdetails->username=$us->name;
        $userdetails->entry=$request->entry;
        $userdetails->detail=$request->detail;

        $userdetails->save();
        // dd($userdetails);

        //Toastr::success('User detail inserted successfully', 'success');
        Toastr::success('user detail inserted successfully', 'success');

        return redirect()->back()->with('success', 'user details inserted successfully');
    }
}
