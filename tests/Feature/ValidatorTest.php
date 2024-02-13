<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use App\Rules\Uppercase;
use App\Rules\RegistrationRule;

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
        App::setLocale("id");
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

    // public function testAdditionalValidation()
    // {
    //     $data =[ 'username' =>'eko@gmail.com', 'password'=>'eko@gmail.com' ];
    //     $rules=['username' => 'required|max:100|email','password'=>'min:6|required'];

    //     $validator = Validator::make($data,$rules);
    //     $validator->after(function (\Illuminate\validator\Validator $validator)
    //      {
    //         $dta = $validator->getData();
    //         if($dta['username']== $dta['password'])
    //         {
    //             $validator->errors()->add("password","password tidak boleh sama dengan username");
    //         }
    //      });

    //      self::assertTrue($validator->passes());
    //      log::info($validator->errors->toJson(JSON_PRETTY_PRINT));
    // }

    public function testValidatorCustom()
    {
        $data = [
            'name' => 'ASEPM',
            'password'=> 'df098u'
            ];
    
        $rules = [ 'name'=>['required', new Uppercase()],
                    'password'=>['required',new RegistrationRule()]
                ];
    
        $validator = Validator::make($data,$rules);

        self::assertNotNull($validator);

        $message = $validator->getMessageBag();

        log::info($message->toJson(JSON_PRETTY_PRINT));
    }

    public function testNestedArray()
    {
        $data = ['name'=>['first'=>'asep','last'=>'yadi']];
        $rules= ['name.first'=>'required','name.last'=>'required'];

        $validator = Validator::make($data,$rules);

        self::assertTrue($validator->passes());
    }

    public function testNestedArrayIndexed()
    {
        $data = ['name'=>
                [
                ['first'=>'asep','last'=>'yadi'],
                ['first'=>'mul','last'=>'iday']
                ]
        ];
        $rules= ['name.*.first'=>'required','name.*.last'=>'required'];

        $validator = Validator::make($data,$rules);

        self::assertTrue($validator->passes());
    }
    
    public function testLogin()
    {
        $this->post('/login',['username'=>'','password'=>''])
        ->assertStatus(400); //harusnya 400
    }

    public function testLoginSuccess()
    {
        $this->post('/login',['username'=>'admin','password'=>'235ert'])
        ->assertStatus(200);
    }

    public function testLoginCustomReqeust()
    {
        $p = $this->post('/lgin',['username'=>'uyfgg@g.com','password'=>'235ert.@']);
        $p->assertStatus(200);

        log::info(json_encode($p));
    }
}

