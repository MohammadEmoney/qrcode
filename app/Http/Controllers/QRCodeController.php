<?php

namespace App\Http\Controllers;

use App\QRCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('qrcode.index');
    }

    public function generate(Request $request)
    {
        $fileName = time() . '-' . mt_rand(). '.png';
        $path = public_path('images/' . $fileName);

        /* generate and save string as png file */
        \QrCode::format('png')
            ->size(500)
            ->generate($request->text, $path);

        /* save image address and string in database */
        $data = [
            'image' => 'images/' . $fileName,
            'text' => $request->text
        ];
       $qrcode = QRCode::create($data);
        return $data;
    }
}
