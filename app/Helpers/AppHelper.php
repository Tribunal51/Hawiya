<?php
namespace App\Helpers;

class AppHelper {
    public static function check_file($data) {
        list($type, $data) = explode(';', $data);
        list($base, $data) = explode(',', $data);
        $decoded_file = base64_decode($data);
        list(, $filetype) = explode(':', $type);
        list($type, $extension) = explode('/', $filetype);
    
        $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $check = in_array($extension, $allowedFileExtension) && $base === 'base64';
        return $check;  
    }
    
    public static function save_file($data) {
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        
        list(, $filetype) = explode(':', $type);
        list($format, $extension) = explode('/', $filetype);
    
        $file = uniqid().".".$extension;
    
        $decoded_file = base64_decode($data);        
        file_put_contents('storage/uploads/'.$file, $decoded_file);
        return $file;
        
            
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