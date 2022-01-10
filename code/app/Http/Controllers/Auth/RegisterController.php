<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Mail;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function setCookie()
    {
      $minutes = 10;
      $response = new Response('Hello');
      $response->withCookie(cookie('ip', $_SERVER['REMOTE_ADDR'], $minutes));
      return $response;
    }

    public function register(Request $request)
    {
      // $cek_cookie = $request->cookie('ip');
      // if(empty($cek_cookie)){
      //   $input = $request->all();
      //   $validator = $this->validator($input);
      //
      //   if($validator->passes()){
      //     $user = $this->create($input)->toArray();
      //     $user['link'] = str_random(30);
      //
      //     DB::table('user_activation')->insert(['id_user'=>$user['id'], 'token'=>$user['link']]);
      //
      //     Mail::send('emails.activation', $user, function($message) use($user){
      //       $message->from('exschool.id@gmail.com', 'Official EX-School');
      //       $message->to($user['email'], '')->subject('Konfirmasi, Kurang satu langkah lagi!');
      //
      //     });
      //     Cookie::queue('ip', $_SERVER['REMOTE_ADDR'], 10);
      //     return redirect()->to('login')
      //     ->with('message','Kami telah mengirimkan Aktivasi Kode. Mohon dicek Email (Kotak Masuk atau Spam) anda.!!!')
      //     ->with('message_type','success');
      //   }
      //   return back()->with('errors',$validator->errors());
      // }else{
      // return redirect()->to('register')
      //   ->with('message', 'Terjadi Kesalahan, jangan terburu buru untuk mendaftar!!!')
      //   ->with('message_type', 'error');
      // }
    }

    public function userActivation($token)
    {
      $check = DB::table('user_activation')->where('token', $token)->first();
      if(!is_null($check)){
        $user = User::find($check->id_user);
        if($user->is_activated==1){
          return redirect()->to('login')->with('Berhasil', "Terima Kasih, Akun anda sudah Aktif");
        }
        $user->remember_token = $token;
        $user->is_activated = 1;
        $user->save();
        DB::table('user_activation')->where('token',$token)->delete();

        return redirect()->to('login')
        ->with('message','Akun anda berhasil di Aktifkan, Silakan login !!!')
        ->with('message_type','success');
      }
      return redirect()->to('login')->with('Gagal', "Gagal mendaftar, Token anda sudah kadaluarsa silakan daftar ulang. !!!");
    }
}
