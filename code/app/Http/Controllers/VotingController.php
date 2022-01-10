<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Http\Controllers\Controller;
use App\NamaVote;
use App\Subscribe;
use Illuminate\Cookie\CookieJar;
use Cookie;
use Mail;
use SEOMeta;
use OpenGraph;
use Twitter;

class VotingController extends Controller
{
    public function index(){
    	$nama = NamaVote::all();
      SEOMeta::setTitle('Voting');
      SEOMeta::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      SEOMeta::setCanonical('https://ex-school.com');

      OpenGraph::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      OpenGraph::setTitle('Voting');
      OpenGraph::setUrl('http://ex-school.com');
      OpenGraph::addProperty('type', 'website');

    	return view("voting.index", compact('nama'));
    }

    public function store(Request $request, CookieJar $cookiejar){
    	if($request->has('vote')){

    // 	$qmail = $request->input('email');
    // 	$email = Subscribe::where('email', '=', $qmail)->first();

    // 	if(!$email){
    // 		$mail = $request->input('email');
    // 		Subscribe::insert(['email' => $mail]);
    // 		$email = array('email' => $mail);
    // 		Mail::send('voting.kirim', $email, function($msg)use($email){
	   //       $msg->to($email['email'], '')->subject('Terima Kasih Telah mengikuti Voting Pembaris Jawa Barat Awards 2018');

	   //     });

    			$vote = new Vote;
		    	$vote->nama_vote_id = $request->input('vote');
		    	$vote->total = 1;
		    	$vote->save();
		    	if($request->vote){
		    		$cookiejar->queue(cookie('vote', $request->vote, 45000));
		    		if(Cookie::get('vote') != false){
		    			return redirect()->back()->with('cookie','Maaf anda sudah mengisi Votting sebelumnya!, Silakan gunakan Email lain atau Perangkat lain (Handphone/Komputer)');
		    		}
		    	}

	    		return redirect()->back()->with('berhasil','Terima Kasih Telah mengikuti Voting Pembaris Jawa Barat Awards 2018');

    // 	} else {

    // 		return redirect()->back()->with('gagal','Maaf anda sudah mengisi Votting sebelumnya!, , Silakan gunakan Email lain atau Perangkat lain (Handphone/Komputer)');
    // 	}


	} else {
		return redirect()->back()->with('gagal','Maaf anda belum mengisi Votting!');
	}
}
}
