<?php

namespace App\Helpers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseServiceAccountHelper
{

    public function InitializeAuth()
    {
        // Get firebase service account configuration
        $FirebaseAdmin = new \Config\FirebaseAdmin();
        $FirebaseConfig = $FirebaseAdmin->GetConfig();

        // Load Firebase service account key
        $serviceAccount = ServiceAccount::fromValue($FirebaseConfig);

        // Initialize Firebase
        $auth = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->createAuth();

        return $auth;
    }
}
