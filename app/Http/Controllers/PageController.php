<?php

namespace App\Http\Controllers;



use App\Models\Apartment;
use App\Models\ApartmentImage;
use App\Models\ApartmentRoom;
use App\Models\User;
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



    public function deleteUserDetail(Request $request)
    {
        $users = UserDetail::find($request->id);
        if(!$users){
            //return back()->with('Error', 'User not found');
            return $users;
            Toastr::error('User detail not found', 'error');

        }
        $users ->delete();
        $message='user deleted successfully';
        Toastr::success('success', $message);
        return back()->with('success', $message);
        //$request=Store::where($request->id)->delete();
    }

    public function Files()
    {
        return view('file');
    }

    public function about()
    {
        return view('Homepage.about');
    }
    public function services()
    {
        return view('Homepage.services');
    }

    public function contact()
    {
        return view('Homepage.contact-us');
    }



    public function ChangeUsertype(Request $request)
    {
        $users = User::find($request->id);
        if(!$users){
            $message='user update failed';
            //alert()->info('NOTE', $message);
            Toastr::error($message, 'error');
            return back()->with('Error', $message);
        }
        $users->usertype=$request->newUsertype;
        $users ->update();

        $message = 'usertype updated successfully';
        //alert()->success('Success',$message)->persistent();
        Toastr::success($message,'success');
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function status_change(Request $request)
    {
        $users = User::find($request->id);
        if(!$users){
            $message='status update failed';
            //alert()->info('NOTE', $message);
            Toastr::error($message, 'error');
            return back()->with('Error', $message);
        }
        $users->status=$request->isActive;
        $users ->update();

        $message = 'user status updated successfully';
        //alert()->success('Success',$message)->persistent();
        Toastr::success($message,'success');
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function UserAparments(Request $request)
    {
        $apartment = new Apartment();

        $apartment->name=$request->name;
        $apartment->county=$request->county;
        $apartment->location=$request->location;
        $apartment->bedroom=$request->bedroom;
        $apartment->bathroom=$request->bathroom;
        $apartment->description=$request->description;
        //$apartment->mainImage = base64_encode(file_get_contents($request->file('mainImage')->path()));
        $image = $request->mainImage;
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('imagename', $filename);
        $apartment->mainImage = $filename;




        $apartment->save();

        //dd($apartment);
        Toastr::success('apartment registered successfully', 'success');

        return redirect()->back()->with('success', 'apartment registered successfully.');

    }

    public function ApartmentDetail(Request $request)
    {
        $apartment = Apartment::find($request->id);

        if (!$apartment) {
            // Apartment not found, handle the situation (e.g., show an error message).
            Toastr::error('Apartment not found', 'error');
            return redirect()->back()->with('error', 'Apartment not found.');
        }

        $detail = new ApartmentRoom();
        $detail->apartmentId = $request->id;
        $detail->apartmentName=$apartment->name;
        $detail->room = $request->room;
        $detail->price= $request->price;
        $detail->booked_by='N/A';
        $detail->booked_on='N/A';

        //dd($detail);
        $detail->save();

        Toastr::success('room registered successfully', 'success');

        return redirect()->back()->with('success', 'room registered successfully.');
    }

    public function ApartmentImages(Request $request)
    {
        $apartment = Apartment::find($request->id);

        foreach ($request->images as $imageFile) {
            $image = new ApartmentImage();

            $image->apartmentId = $apartment->id;
            $image->apartmentName = $apartment->name;

            $filename = time() . '_' . $imageFile->getClientOriginalName(); // You may use a more complex naming strategy if needed
            $imageFile->move('ApartmentImages', $filename);
            $image->image = $filename;

            $image->save();
            //dd($image);
        }

        Toastr::success('room registered successfully', 'success');

        return redirect()->back()->with('success', 'room registered successfully.');

    }




}
