<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $data = [
            'code' => $code,
            'message' => $message,
        ];

        if($code == 401) {
            $data['errors'] = [
                'auth' => 'Incorrect login or password'
            ];
        }

        if(!empty($errors)) {
            $data['errors'] = $errors;
        }

        parent::__construct(response()->json($data)->setStatusCode($code));
    }
}
