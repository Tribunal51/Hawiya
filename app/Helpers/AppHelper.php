<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

use App\Helpers\AppHelper as Helper;

class AppHelper {
    public static function check_file($data) {
        // $characters = array(';', ',', '/', ':');

        // foreach($characters as $character) {
        //     if(!strpos($data, $character)) {
        //         return false;
        //     }
        // }
            //return false;
        // list($base, $data) = explode(',', $data);
        
        // // $decoded_file = base64_decode($data);
        // list(, $filetype) = explode(':', $type);
        // list($type, $extension) = explode('/', $filetype);

        if(strpos($data, ';')) {
            list($type, $data) = explode(';', $data);

            if(strpos($data, ',')) {
                list(, $data) = explode(',', $data);
                if(!Helper::is_base64($data)) {
                    return false;
                }
        
                if(strpos($type, ':')) {
                    list(, $filetype) = explode(':', $type);
                    
                    if(strpos($filetype, '/')) {
                        list($format, $extension) = explode('/', $filetype);
                        //return $format." ".$extension;
                    }
                }
            }
        }
        
        $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx', 'jpeg'];
        if(isset($extension)) {
            $check = in_array($extension, $allowedFileExtension);
        }
        else {
            $check = Helper::is_base64($data);
        }
        //$check = in_array($extension, $allowedFileExtension) : Helper::is_base64($data);
        // return $check ? "YES" : "NO";
        return $check;  
    }
    
    public static function save_file($data) {
        if(strpos($data, ';')) {
            list($type, $data) = explode(';', $data);

            if(strpos($data, ',')) {
                list(, $data) = explode(',', $data);
        
                if(strpos($type, ':')) {
                    list(, $filetype) = explode(':', $type);
                    
                    if(strpos($filetype, '/')) {
                        list($format, $extension) = explode('/', $filetype);
                    }
                }
            }
        }
    
        if(!isset($extension)) {
            $extension = 'jpg';
        }
        $file = uniqid().".".$extension;
    
        $decoded_file = base64_decode($data);        
        file_put_contents('storage/uploads/'.$file, $decoded_file);
        $file = 'http://hawiya.net/storage/uploads/'.$file;
        return $file;
            
    }

    public static function is_base64($s) {
        // Check if there are valid base64 characters
        if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;

        // Decode the string in strict mode and check the results
        $decoded = base64_decode($s, true);
        if(false === $decoded) return false;

        // Encode the string again
        if(base64_encode($decoded) != $s) return false;

        return true;
    }

    public static function routeIfAdmin($page) {
        if(Auth::guest()) {
            return redirect('/home');
        }
        else {
            if(Auth::user()->admin) { 
                return view('admin.'.$page);                                           
            }
            else {
                return redirect('/');
            }
        }
    }
}