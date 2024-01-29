<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comments;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTimestamps()
    {
        $comment = new Comments();
        $comment->email = 'j@xn.com';
        $comment->title = 'bos';
        $comment->comment = 'impian masa depan';
        //timestamps secara otomatis akan terisi

        $comment->save();

        self::assertNotNull($comment->id);
    }

    public function testDefaultValues()
    {
        $comment = new Comments();
        $comment->email = 'a@c.com';
        $comment->save();

        self::assertNotNull($comment->id);
        self::assertNotNull($comment->title);
        self::assertNotNull($comment->comment);

    }

    public function testFillable()
    {
        $request = 
        [
            
            'title'=>'biasa',
            'comment'=>'nyoba fillable'
        ];

        $result = new Comments($request);
        $result->save();

        self::assertNotNull($result->id);
    }

    public function testQuerybuilder()
    {
        $request = 
        [
            
            'title'=>'biasa',
            'comment'=>'nyoba fillable'
        ];

        $result = Comments::create($request);
        self::assertNotNull($result);
    }

    // public function testUpdateMethod()
    // {
    //     $this->testQuerybuilder();

    //     $request = ['title'=>'update','comment'=>'updated'];
    //     $result  = Comments::query()->find(id);
    //     $result->fill($request);
    //     $result->save();

    //     self::assertNotNull($result);

        
    // }
}
