<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;
use Illuminate\Support\Facades\Redirect;



class UserController extends Controller {


    public function index(){
        $users = (new BaseApi)->index('/user');
        return view('user.index')->with(['users' => $users]);
    }

public function create (){

    return view('user.create');
}

public function store(Request $request)
{
            // buat variable baru untuk menset parameter agar sesuai dengan documentasi
            $payload = [
        'firstName' => $request->input('nama_depan'),
        'lastName' => $request->input('nama_belakang'),
        'email' => $request->input('email'),
    ];

    $baseApi = new BaseApi;
    $response = $baseApi->create('/user/create', $payload);

            // handle jika request API nya gagal
    // diblade nanti bisa ditambahkan toast alert
    if ($response->failed()) {
                    // $response->json agar response dari API bisa di akses sebagai array
        $errors = $response->json('data');

        $messages = "";

        foreach ($errors as $key => $msg) {
            $messages .= "$key : $msg";
        }

        $messages .= "";

        session()->flash(
            'message',
            "Data gagal disimpan
            $messages",
        );

        return redirect()->to('users');
    }

    session()->flash(
        'message',
        'Data berhasil disimpan',
    );

    return redirect()->to('users');
}

public function edit(){
    return view('user.edit');
}

public function show($id)
{
		//kalian bisa coba untuk dd($response) untuk test apakah api nya sudah benar atau belum
    //sesuai documentasi api detail user akan menshow data detail seperti `email` yg tidak dimunculkan di api list index
    $response = (new BaseApi)->detail('/user', $id);
    return view('user.edit')->with([
        'user' => $response->json()
    ]);
}

public function update(Request $request, $id)
{
//column yg bisa di update sesuai dengan documentasi dummyapi.io hanyalah
// `fisrtName`, `lastName`
    $payload = [
        'firstName' => $request->input('nama_depan'),
        'lastName' => $request->input('nama_belakang'),



    ];

    $response = (new BaseApi)->update('/user', $id, $payload);
    if ($response->failed()) {
        $errors = $response->json('data');

        $messages ="";
        foreach ($errors as $key => $msg) {
            $messages .= "$key : $msg";
        }


        session()->flash(
            'message',
            "Data gagal disimpan
            $messages",
        );

        return redirect('users');
    }

    session()->flash(
        'message',
        'Data berhasil disimpan',
    );

    return redirect('users');
}

public function destroy($id)
    {
        $response = (new BaseApi)->delete('/user', $id);

        if ($response->failed()) {
            session()->flash(
                'message',
                'Data gagal dihapus'
            );

            return redirect('users');
        }

        session()->flash(
            'message',
            'Data berhasil dihapus',
        );

        return redirect('users');
    }

}
