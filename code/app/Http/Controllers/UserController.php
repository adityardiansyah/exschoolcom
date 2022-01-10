<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use File;
use Storage;

class UserController extends Controller
{
  public function profile(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';

    return view('web.profile', array('user' => Auth::user()));
  }

  public function update_avatar(Request $request){
    if($request->user()->avatar != 'users/avatar/default.png'){
      Storage::delete($request->user()->avatar);
    }
    $user = User::find(Auth::user()->id);

      // $avatar = $request->file('avatar')->store('users');
      $this->validate($request, [
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      if($request->hasFile('avatar')){
        $image = $request->file('avatar');
        $filename = str_random(20);
        $bulan = date('mY');
        $extension = $request->file('avatar')->getClientOriginalExtension();
        $filepath = Storage::putFileAs('users/'.$bulan ,$request->file('avatar'), $filename.'.'.$extension);
        $file = $filepath;

        $user->update([
          'avatar' => $file
        ]);
        $user->save();
      }


    return redirect('dashboard/profile')
    ->with('user', $user)
    ->with('message','Avatar Berhasil diUbah!')
    ->with('message_type','success');

}
}
