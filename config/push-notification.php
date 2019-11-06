<?php

return array(

    'appNameIOS'     => array(
        'environment' =>'development',
        'certificate' => app_path().'/myCert.pem',
        'passPhrase'  =>'password',
        'service'     =>'apns'
    ),
    'appNameAndroid' => array(
        'environment' =>'development',
        'apiKey'      =>'AIzaSyDYgflM3gnaaHDG0WYBD_DB5DsledIrRhM',
        'service'     =>'gcm'
    )

);