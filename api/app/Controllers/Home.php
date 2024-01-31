<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Home extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => 'Welcome to FitnessApp API.'
        ];
        return $this->respond($response);
    }
}
