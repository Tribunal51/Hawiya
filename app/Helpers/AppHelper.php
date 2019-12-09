<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

use App\Helpers\AppHelper as Helper;
use Edujugon\PushNotification\PushNotification;
use App\User;


class AppHelper {
    public static function check_file($data, $allowed_extensions = null) {
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
        
        $allowedFileExtension = isset($allowed_extensions) ? $allowed_extensions : ['pdf', 'jpg', 'png', 'docx', 'jpeg'];
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
    
    public static function save_file($data, $custom_folder = null) {
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
            $extension = 'png';
        }
        $file = uniqid().".".$extension;
    
        $decoded_file = base64_decode($data);        
        if(!$custom_folder) {
            file_put_contents('storage/uploads/'.$file, $decoded_file);
            $file = 'http://hawiya.net/storage/uploads/'.$file;
            return $file;
        }
        else {
            file_put_contents('storage/'.$custom_folder.$file, $decoded_file);
            $file = 'http://hawiya.net/storage/'.$custom_folder.$file;
            return $file;
        }
        
            
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

    public static function routeIfAdmin($page, $data = null) {
        if(Auth::guest()) {
            return redirect('/');
        }
        else {
            if(Auth::user()->admin) { 
                // return $data;
                return view('admin.'.$page)->with('data', $data);                                         
            }
            else {
                return redirect('/');
            }
        }
    }

    public static function pushMessage($id, $message) {
        $user = User::find($id);
        switch($user->device_OS) {
            case 'android': 
                $push = new PushNotification('fcm');
                // return config('pushnotification');
                // $push->setConfig(config('pushnotification'))
                //return json_encode($push);
                $push->setMessage([
                    'notification' => [
                        'title' => 'Test Title',
                        'body' => $message,
                        'sound' => 'default'
                    ],
                    'data' => [
                        'extraPayload1' => 'value1',
                        'extraPayload2' => 'value2'
                    ]
                ])
                    ->setDevicesToken($user->device_token)
                    ->send();
                    
                return json_encode($push->getFeedback());
                
                
                // PushNotification::app('appNameAndroid')
                //     ->to($user->device_token)
                //     ->send($request->message);
                // return $user;
                
                break;

            case 'ios': 
                // PushNotification::app('appNameIOS')
                //     ->to($user->device_token)
                //     ->send($request->message);
                
                break;

            default: return -6; // echo "Invalid User OS.";
        }
    }

    public static function merge_collections($array_of_collections) {
        $result = array();
        foreach($array_of_collections as $collection) {
            foreach($collection as $item) {
                array_push($result, $item);
            }
        }
        return $result;
    }

    public static function store_data_image($file, $category_id = null) {
        $allowedFileExtensions = ['png', 'jpg', 'jpeg', 'tif'];
        // $file = file($image);
        // return $file->getClientOriginalName();
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check = in_array(strtolower($extension), $allowedFileExtensions);
        if($check) {
            if($category_id !== null) {
                switch($category_id) {
                    case 1: $folder = 'packages/logodesign';
                    break; 

                    case 2: $folder = 'packages/branding';
                    break; 

                    case 3: $folder = 'packages/socialmedia';
                    break; 
                    
                    case 4: $folder = 'products/stationery';
                    break;

                    case 5: $folder = 'products/packaging';
                    break;

                    case 6: $folder = 'products/promotional';
                    break;

                    default: return redirect()->back()->with('error', 'Invalid Category.');
                }
            }
            else {
                $folder = 'uploads';
            }
            $relative_filepath = $file->store('public/'.$folder);
            $image = 'http://hawiya.net/storage/'.substr($relative_filepath, strlen('public/'));
            return $image;

        }
        else {
            return redirect()->back()->with('error', 'Invalid file format.');
        } 
    }

    public static function delete_data_image($url) {
        $folder = ltrim($url, 'http://hawiya.net/');
        @unlink($folder);
    }
}