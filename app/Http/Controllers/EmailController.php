<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ProposalMail;
use Illuminate\Support\Facades\Mail;
use App\Models\BiodataPengajuan;
use App\Models\Email;

class EmailController extends Controller
{
    public function index(){
    	$data = BiodataPengajuan::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
		Mail::to($data->email)->send(new ProposalMail());
		
		if (count(Mail::failures()) > 0){
		    $log = new Email;
			$log->user_id = auth()->user()->id;
			$log->tanggal = date('Y-m-d H:m:s');
			$log->keterangan = 'proposal '.$data->id.' '.$data->email.' '.$data->status;
			$log->status = 'gagal';
			$log->save();
			return response()->json('Email gagal dikirim');
		} else {
			$log = new Email;
			$log->user_id = auth()->user()->id;
			$log->tanggal = date('Y-m-d H:m:s');
			$log->keterangan = 'proposal '.$data->id.' '.$data->email.' '.$data->status;
			$log->status = 'terkirim';
			$log->save();
			return response()->json('Email telah dikirim');
		}
	}

	// function emergency untuk kirim email ke peserta awal yg belum menerima email karena fiturnya baru jadi :D
	// bertahap kirim per 60 dari 1-600
	public function bulk ($awal, $akhir)
	{
		$data_bulk = BiodataPengajuan::orderBy('created_at', 'asc')->whereBetween('id', [$awal,$akhir])->get();
		foreach ($data_bulk as $data) {
			Mail::send('email.konfirmasi', ['data' => $data], function($message) use ($data) {
				$message->to($data->email)->subject('Proposal FBK');
				$message->from('admin@fbk.id', 'Admin FBK ID');
			});
			if (count(Mail::failures()) > 0){
			    $log = new Email;
				$log->user_id = auth()->user()->id;
				$log->tanggal = date('Y-m-d H:m:s');
				$log->keterangan = 'proposal '.$data->id.' '.$data->email.' '.$data->status;
				$log->status = 'gagal';
				$log->save();
				echo 'proposal '.$data->id.' tujuan '.$data->email.' gagal<br>';
			} else {
				$log = new Email;
				$log->user_id = auth()->user()->id;
				$log->tanggal = date('Y-m-d H:m:s');
				$log->keterangan = 'proposal '.$data->id.' '.$data->email.' '.$data->status;
				$log->status = 'terkirim';
				$log->save();
				echo 'proposal '.$data->id.' tujuan '.$data->email.' terkirim<br>';
			}
			sleep(2);
		}
	}

	public function view ()
	{
		$data = BiodataPengajuan::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('email.konfirmasi', ['data' => $data]);
    }
}
