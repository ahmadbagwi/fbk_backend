<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function profil ()
    {
        $data = User::where('id', auth()->user()->id)->first();
        return response()->json([
            'data' => $data
        ]);
    }

    public function user_admin ()
    {
        $data = User::all();
        return response()->json([
            'data' => $data
        ]);
    }

    public function user_admin_show ($id = null)
    {
        $data = User::where('id', $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    
    public function dashboard_admin ()
    {
        $transaksi_proses = Transaksi::where('status', '!=', 'pesanan dikirim')->orWhere('status', '!=', 'pesanan selesai')->get();
        $transaksi_dikirim = Transaksi::where('status', 'pesanan dikirm')->get();
        $transaksi_selesai = Transaksi::where('status', 'pesanan selesai')->get();
        $toko = Toko::all();
        $produk = Produk::all();

        return response()->json([
            'transaksi_proses' => $transaksi_proses,
            'transaksi_dikirim' => $transaksi_dikirim,
            'transaksi_selesai' => $transaksi_selesai,
            'toko' => $toko,
            'produk' => $produk
        ]);
    }

    public function dashboard_user()
    {
        $transaksi_proses = Transaksi::where('user_id', auth()->user()->id)->where('status', '!=', 'pesanan dikirim')->orWhere('status', '!=', 'pesanan selesai')->orderBy('updated_at', 'desc')->get()->toArray();
        $transaksi_dikirim = Transaksi::where('user_id', auth()->user()->id)->where('status', 'pesanan dikirm')->orderBy('updated_at', 'desc')->get()->toArray();
        $transaksi_selesai = Transaksi::where('user_id', auth()->user()->id)->where('status', 'pesanan selesai')->orderBy('updated_at', 'desc')->get()->toArray();
        $biodata = auth()->user();

        return response()->json([
            'transaksi_proses' => $transaksi_proses,
            'transaksi_dikirim' => $transaksi_dikirim,
            'transaksi_selesai' => $transaksi_selesai,
            'biodata' => $biodata 
        ]);

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($login)) {
          return response()->json([
              'id' => auth()->user()->id,
              'nama' => auth()->user()->name,
              'role' => auth()->user()->role
          ]);
        } else {
          return response()->json('gagal login', 401);
        }
    }

    public function logout()
    {
        if (Auth::logout()) {
            return response()->json('anda telah logout', 200);
        } else {
            return response()->json('gagal logout', 401);
        }
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $role = $request['role'] ? $request['role'] : 'user';
        $user = User::updateOrCreate(
          [
              'id' => $request->id
          ],
          [
              'name' => $request['name'],
              'email' => $request['email'],
              'password' => Hash::make($request['password']),
              'role' => $role
          ]
        );
        return response()->json([
            'user' => auth()->user(),
            'sukses' => 'Pendaftaran akun berhasil'
        ]);
    }

}