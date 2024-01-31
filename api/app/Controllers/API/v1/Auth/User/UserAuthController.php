<?php

namespace App\Controllers\API\v1\Auth\User;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Helpers\FirebaseServiceAccountHelper;
use Exception;
use Kreait\Firebase\Exception\AuthException;

class UserAuthController extends ResourceController
{

    use ResponseTrait;

    // User Login - POST api/v1/auth/login
    public function login()
    {
        try {

            $validation = \Config\Services::validation();
            $validation->setRules([
                'password' => 'required|max_length[255]',
                'email'    => 'required|max_length[254]|valid_email',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                $response = [
                    'status' => 400, // Bad Request
                    'error' => "Bad Request",
                    'message' => "Invalid email or password."
                ];
                return $this->respond($response);
            }

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $firebaseServiceAccountHelper = new FirebaseServiceAccountHelper();
            $auth = $firebaseServiceAccountHelper->InitializeAuth();

            $signInResult = $auth->signInWithEmailAndPassword($email, $password);

            $response = [
                'token' => $signInResult->idToken(),
                'refreshToken' => $signInResult->refreshToken(),
                'user' => [
                    'user_id' => $signInResult->firebaseUserId(),
                    'email' => $signInResult->data()['email'],
                ]
            ];
            return $this->respond($response);
        } catch (Exception $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'An error occurred while processing your request. Please try again later.'
            ];
            return $this->respond($response);
        }
    }

    // User Register - POST api/v1/auth/register
    public function register()
    {
        try {

            $validation = \Config\Services::validation();
            $validation->setRules([
                'password' => 'required|max_length[255]',
                'email'    => 'required|max_length[254]|valid_email',
                'nickname'    => 'required|max_length[255]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                $response = [
                    'status' => 400, // Bad Request
                    'error' => "Bad Request",
                    'message' => "Invalid email or password."
                ];
                return $this->respond($response);
            }

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $nickname = $this->request->getVar('nickname');

            $userProperties = [
                'email' => $email,
                'emailVerified' => false,
                'password' => $password,
                'displayName' => $nickname,
                'photoUrl' => '',
                'disabled' => false,
            ];

            $firebaseServiceAccountHelper = new FirebaseServiceAccountHelper();
            $auth = $firebaseServiceAccountHelper->InitializeAuth();

            $createdUser = $auth->createUser($userProperties);
            $createdUserData = [
                'uid' => $createdUser->uid,
                'email' => $createdUser->email,
                'displayName' => $createdUser->displayName,
                'photoUrl' => $createdUser->photoUrl,
                'emailVerified' => $createdUser->emailVerified,
                'phoneNumber' => $createdUser->phoneNumber,
                'photoUrl' => $createdUser->photoUrl,
                'disabled' => $createdUser->disabled,
            ];
            return $this->respond($createdUserData);
        } catch (AuthException $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'Firebase Auth Error. Please try again.'
            ];
            return $this->respond($response);
        } catch (Exception $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'An error occurred while processing your request. Please try again.'
            ];
            return $this->respond($response);
        }
    }

    // User RefreshToken - POST api/v1/auth/refreshToken
    public function refreshToken()
    {
        try {

            $validation = \Config\Services::validation();
            $validation->setRules([
                'refreshToken' => 'required',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                $response = [
                    'status' => 400, // Bad Request
                    'error' => "Bad Request",
                    'message' => "Invalid refresh token."
                ];
                return $this->respond($response);
            }

            $refreshToken = $this->request->getVar('refreshToken');

            $firebaseServiceAccountHelper = new FirebaseServiceAccountHelper();
            $auth = $firebaseServiceAccountHelper->InitializeAuth();

            $signInResult = $auth->signInWithRefreshToken($refreshToken);

            $response = [
                'token' => $signInResult->idToken(),
                'refreshToken' => $signInResult->refreshToken(),
                'user' => [
                    'user_id' => $signInResult->firebaseUserId(),
                    // 'email' => $email,
                ]
            ];

            return $this->respond($response);
        } catch (Exception $e) {
            $response = [
                'status' => 500, // Internal Sever Error
                'error' => $e->getMessage(),
                'message' => 'An error occurred while processing your request. Please try again later.'
            ];
            return $this->respond($response);
        }
    }
}
