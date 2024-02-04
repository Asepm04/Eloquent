<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;

class ValidatorTest extends TestCase
{
    public function testValidator()
    {
        $data = [
            'name' => 'yad',
            'password'=> '098u'
            ];
    
        $rules = [ 'name'=>'required','password'=>'required'];
    
        $validator = Validator::make($data,$rules);

        self::assertNotNull($validator);
        self::assertTrue($validator->passes());
        self::assertFalse($validator->fails());
    }

    public function testValidatorinvalid()
    {
        $data = [
            'name' => '',
            'password'=> ''
            ];
    
        $rules = [ 'name'=>'required','password'=>'required'];
    
        $validator = Validator::make($data,$rules);

        self::assertNotNull($validator);
        self::assertFalse($validator->passes());
        self::assertTrue($validator->fails());

        $message = $validator->getMessageBag();
        // $message->get('username');
        // $message->get("password");

        // //bisa juga lansung 
        // $message->keys();

        log::info($message->toJson(JSON_PRETTY_PRINT));
    }

    public function testValidationMultipe()
    {
        $data = [
            'username' =>'eko',
            'password' => 'eko'
        ];

        $rules = [
            'username' => 'required|email|max:100',
            'password'=> ['required','min:6','max:20']
        ];

        $validator = Validator::make($data,$rules);

        $message = $validator->getMessageBag();
        
        self::assertNotNull($message);

        log::info($message->toJson(JSON_PRETTY_PRINT));
    }

    public function testValidationMultipes()
    {
        $data = [
            'username' =>'eko',
            'password' => 'eko'
        ];

        $rules = [
            'username' => 'required|email|max:100',
            'password'=> ['required','min:6','max:20']
        ];

        $validator = Validator::make($data,$rules);

        $message = $validator->getMessageBag();
        
        self::assertNotNull($message);

        log::info($message->toJson(JSON_PRETTY_PRINT));
    }

    public function testValidationValid()
    {
        $data = [
            'username' =>'eko@gmail.com',
            'password' => 'eko1234',
            'text' => true,
            'name' => 'kosong'
        ];

        $rules = [
            'username' => 'required|email|max:100',
            'password'=> ['required','min:6','max:20']
        ];

        $validator = Validator::make($data,$rules);

        $message = $validator->validate();
        
        self::assertNotNull($message);

        log::info(json_encode($message,JSON_PRETTY_PRINT));
    }

    
}

