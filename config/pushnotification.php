<?php
/**
 * @see https://github.com/Edujugon/PushNotification
 */

return [
    'gcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'My_ApiKey',
    ],
    'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAAbFI-qkw:APA91bEcISNfUXFf6cU3CfzpPlwOS2xSYkve4hor3AxpDp3ZgcJLSxsqi1hanE0x845g2o8h8AkQXmbFwjWueElvmH-yVsv1qu7kcg6WCY5LKRBUkQcghgpo5BIoWT1Duo66dtx8l5Jx',
    ],
    'apn' => [
        'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
        'passPhrase' => 'secret', //Optional
        'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
        'dry_run' => true,
    ],
];

