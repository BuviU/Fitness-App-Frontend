<?php

namespace App\Controllers\API\v1\User;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use Exception;

class UserProfileController extends ResourceController
{

    use ResponseTrait;

    // Get Profile - POST api/v1/user/profile?username=user@email.com
    public function getProfile()
    {
        try {

            $username = $this->request->getGet('username');

            if (empty($username)) {
                $response = [
                    'status' => 400, // Bad Request
                    'error' => "Bad Request",
                    'message' => "Invalid username."
                ];
                return $this->respond($response);
            }

            // get email from X-Email
            $email = $this->request->getHeaderLine('X-Email');

            $profile = [
                'email' => $email,
                'fullName' => 'John Doe',
                'profileImageUrl' => '',
                'notificationPref' => true,
                'height' => '180.5 cm',
                'weight' => '65.6 kg',
                'currentProgram' => [
                    'Id' => '1234',
                    'name' => 'Gym 4 days',
                    'backdropImageUrl' => '',
                ],
                'connections' => [
                    'googleFit' => '',
                    'healthKit' => '',
                ]
            ];

            return $this->respond($profile);
        } catch (Exception $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'An error occurred while processing your request. Please try again.'
            ];
            return $this->respond($response);
        }
    }

    // Get profileDetails - POST api/v1/user/profileDetails?username=user@email.com
    public function profileDetails()
    {
        try {

            $username = $this->request->getGet('username');

            if (empty($username)) {
                $response = [
                    'status' => 400, // Bad Request
                    'error' => "Bad Request",
                    'message' => "Invalid username."
                ];
                return $this->respond($response);
            }

            // get email from X-Email
            $email = $this->request->getHeaderLine('X-Email');

            // get user Id from X-UID
            $userId = $this->request->getHeaderLine('X-UID');

            $profile = [
                'id' => $userId,
                'email' => $email,
                'firstName' => 'John',
                'lastName' => 'Doe',
                'nickName' => 'Jade',
                'age' => 25,
                'gender' => 'F',
                'height' => '180.5 cm',
                'weight' => '65.6 kg',
                'profileImageUrl' => '',
                'accountId' => 14259562
            ];
            return $this->respond($profile);
        } catch (Exception $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'An error occurred while processing your request. Please try again.'
            ];
            return $this->respond($response);
        }
    }
}
