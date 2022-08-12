<?php

namespace App\Http\Controllers;

use App\Models\Encryption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class EncryptionController extends Controller
{
    public function action(Request $request)
    {
//        return $request->type;
        $secret = '12345678901234567890123456789012';//cipher given by user
        $iv = '0000000000000000';//Initialization Vector 16 bit
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();//get file extension
        $name = $file->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);//get only file name with out extension
        $fileContent = $file->get();// Get File Content
        Storage::deleteDirectory('data');//delete all old data to save space
        if ($request->type == 1) {//chick if the action encrypt(1) or decrypt(2)
            $encryptedContent = openssl_encrypt($fileContent, 'AES-256-CBC', $secret, 0, $iv);
            Storage::put('data/'.$filename . '.' . $extension, $encryptedContent);
        } else {
            $decryptedContent = openssl_decrypt($fileContent, 'AES-256-CBC', $secret, 0, $iv);
            Storage::put('data/'.$filename . '.' . $extension, $decryptedContent);
        }
        return Storage::download('data/'.$filename . '.' . $extension);//return file after action
    }
}
