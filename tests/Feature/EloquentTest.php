<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Log;
class EloquentTest extends TestCase
{
    public function setUp():void
    {
        parent::setUp();
        Category::query()->delete();
    }

    //  public function testInsert()
    //  {
    //     $category = new Category();
    //     $category->id = 'fodd';
    //     $category->name = 'junnk';
    //     $category->description = 'test insert';
    //     $result = $category->save();

    //     self::assertTrue($result);
    //  }

    // public function testUpdate()
    // {
    //     // $this->seed(CategorySeeder::class);

    //     $category = Category::find('fodd');

    //     $category->name= 'updated';
    //     $result = $category->save();

    //     self::assertTrue($result);
    // }

    public function testSelect()
    {
        for($a=0; $a<10; $a+=2)
        {
            $categori = new Category();
            $categori->id = 'id'.$a;
            $categori->name ='name'.$a;
            $categori->save();
        }
        $result = Category::query()->get();
        self::assertNotNull($result);

        $result->each(function($sql)
        {
            log::info(json_encode($sql));
        });

        
    }

    public function testUpdateMany()
    {
        for($i=0;$i<10;$i++)
        {
            $category = new Category();
            $category->id = 'id'.$i;
            $category->name = 'name'.$i;
            $category->save();
        }

        $result = Category::query()->count();
        self::assertEquals($result,10);

            Category::query()->update(['description'=>'updated']);
           
    }

    public function testDelete()
    {
        $category = new Category();
        $category->id = 'freze';
        $category->name = 'seafood';
        $category->save();

        $cek = Category::query()->find('freze');
        
        $cek->each(function($sql)
        {
            log::info(json_encode($sql));
        });

        $cek->delete();

        $result = Category::query()->count();

        self::assertEquals($result,0);
    }

    public function testDeleteMany()
    {
        for($t=0;$t<5;$t++)
        {
            $category = new Category();
            $category->id = 'id'.$t;
            $category->name = 'name'.$t;
            $category->save();
        }

        $c = Category::query()->get();
        $c->each(function($sql)
            {
                log::info(json_encode($sql));
            });

        $result = Category::query()->whereNull('description')->delete();
        
        self::assertEquals(Category::query()->count(),0);
    }
}
