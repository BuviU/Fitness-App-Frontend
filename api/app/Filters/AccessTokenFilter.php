<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AccessTokenFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the access token from the request header - Authorization Bearer {token}
        $token = $request->getHeaderLine('Authorization');

        if ($token && preg_match('/Bearer\s(\S+)/', $token, $matches)) {

            // Extracting the token part after 'Bearer'
            $token = $matches[1];
            // Validate the token
            $FirebaseTokenValidationHelper = new \App\Helpers\FirebaseTokenValidationHelper();
            $tokenValidationResult = $FirebaseTokenValidationHelper->ValidateFirebaseToken($token);
            if ($tokenValidationResult['status'] == 200) {
                /*** Token is valid ***/
                // set a new header called X-UID with the user id
                $request->setHeader('X-UID', $tokenValidationResult['uid']);
                // set a new header called X-Email with the user email
                $request->setHeader('X-Email', $tokenValidationResult['email']);
                // proceed with the request
                return $request;
            } else {
                // Token is invalid, handle unauthorized access
                $response = service('response');
                $response->setStatusCode(401);
                $response->setContentType('application/json');
                $response->setBody(json_encode(array("status" => 401, "message" => "Bad Request : Token validation failed. " . $tokenValidationResult['message'], "code" => "00X2")));
                return $response;
            }
        } else {
            // No or invalid Authorization header, handle unauthorized access
            $response = service('response');
            $response->setStatusCode(401);
            $response->setContentType('application/json');
            $response->setBody(json_encode(array("status" => 401, "message" => "Bad Request : Token validation failed. Empty Access Token.", "code" => "00X1")));
            return $response;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the route has executed
    }
}
