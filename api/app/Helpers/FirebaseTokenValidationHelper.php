<?php

namespace App\Helpers;

use Exception;

class FirebaseTokenValidationHelper
{

    public function ValidateFirebaseToken($token)
    {
        // Initialize Firebase Auth
        $FirebaseServiceAccountHelper = new FirebaseServiceAccountHelper();
        $auth = $FirebaseServiceAccountHelper->InitializeAuth();

        // Verify the token
        try {
            $verifiedIdToken = $auth->verifyIdToken($token);
            $uid = $verifiedIdToken->claims()->get('sub');
            $email = $verifiedIdToken->claims()->get('email');
            return [
                'status' => 200,
                'message' => 'Token is valid',
                'uid' => $uid,
                'email' => $email
            ];
        } catch (Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage(),
                'uid' => null,
                'email' => null
            ];
        }
    }
}
