<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class dashboardContriller extends Controller
{
    public function dashboard(Request $request){

        return view('dashboard.index');
    }

    public function profile(Request $request){
        if ($request->isMethod('Post')) {
            if (isset($request->imageUser)) {
                $validated = $request->validate([
                    'imageUser' => 'required|image|mimes:jpeg,png,jpg|max:1000'
                ]);

                // upload image
                $imageName = time().'.'.$request->imageUser->extension();
                $request->imageUser->move(public_path('dist/img/user_image'), $imageName);
                User::
                where('id',session('userInfo')[0]['user_id'])
                ->update(['img'=>$imageName]);
                return redirect('profile');
            }elseif (isset($request->phone)) {
                $validated = $request->validate([
                    'phone' => 'required|max:1000',
                    'national_number' => 'required|integer',
                    'national_id' => 'required|integer',
                    'birthday' => 'required',
                    'place_birth' => 'required',
                    'addres' => 'required',
                    'postal_code' => 'required|integer',
                    'job' => 'required',
                    'education' => 'required',

                ]);

                $time =Verta::parse($request->birthday);
                $birthday = $time->formatGregorian('Y-m-d H:i:s');


                User::
                where('id',session('userInfo')[0]['id'])
                ->update([
                    'phone'=>$request->phone,
                    'national_number'=>$request->national_number,
                    'national_id'=>$request->national_id,
                    'birthday'=>$birthday,
                    'place_birth'=>$request->place_birth,
                    'addres'=>$request->addres,
                    'postal_code'=>$request->postal_code,
                    'job'=>$request->job,
                    'education'=>$request->education
                ]);
                return redirect('profile?okComplete');

            }
        }else {
        return view('dashboard.profile');
        }

    }
}
