<?php

namespace App\Http\Controllers;

use App\Models\RealForeign;
use App\Models\RealIr;
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

                // تکمیل اطلاعات
            }
        }else {
        return view('dashboard.profile');
        }

    }

    public function personal_information(Request $request)
    {
        if (isset($request->phone)) {
            $validated = $request->validate([
                'national_number' => 'required|integer',
                'national_id' => 'required|integer',
                'birthd' => 'required',
                'birthm' => 'required',
                'birthh' => 'required',
                'place_birth' => 'required',
                'addres' => 'required',
                'postal_code' => 'required|integer',
                'job' => 'required',
                'education' => 'required',
            ]);
            // تبدیل تاریخ
            $time = Verta::getGregorian($request->birthh,$request->birthm,$request->birthd);
            // اگر تبعه نبود
            if (session('userInfo')[0]['nationality'] == 'real_ir') {
                $validated = $request->validate([
                    'national_id' => 'required|integer',
                ]);

                $user = RealIr::
                        where('user_id',session('userInfo')[0]['user_id']);


            }else {
                $user = RealForeign::
                        where('user_id',session('userInfo')[0]['user_id']);
            }




            $user->update([
                'name'=>$request->name,
                'national_code'=>$request->national_number,
                'identity_id'=>$request->national_id,
                'birthday'=>implode('-',$time)." 00:00:00",
                'address'=>$request->addres,
                'postal_code'=>$request->postal_code,
                'education'=>$request->education
            ]);
            return redirect('personal_information?okComplete');

        }
        return view('dashboard.personalInformation');
    }
}
