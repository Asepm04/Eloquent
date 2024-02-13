<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Iluminate\Support\MessageBag;

class FormController extends Controller
{
    public function login(Request $request)
    {
        try{
            $data = ['username'=>'required','password'=>'required'];
            $request->validate($data);
            return response('OK',Response::HTTP_OK);
        }catch(ValidationException $ValidationException)
        {
            return response($ValidationException->errors(),Response::HTTP_BAD_REQUEST);
        }
    }

    public function lgin(LoginRequest $request)
    {
        $request->validated();
        return response('ok',Response::HTTP_OK);
    }
}
