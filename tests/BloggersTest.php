<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BloggersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }*/

    private static $currentInsertedId;

    public function testGetBloggers()
    {
        $bloggers_repository = new \App\Repository\EloquentBloggerRepository(new \App\Http\Models\Blogger());
        $bloggers = $bloggers_repository->getAll()->toArray();

        if(count($bloggers) > 0)
            $this->assertArrayHasKey('first_name', $bloggers[0]);

        return true;
    }

    public function testGetBloggersAPI()
    {
        $response = $this->json('GET', '/bloggers');

        $response->seeJson([
                    'status' => true,
                    'error' => null
                ]);
    }

    public function testCreateBloggers()
    {
        $bloggers_repository = new \App\Repository\EloquentBloggerRepository(new \App\Http\Models\Blogger());
        $blogger = $bloggers_repository->create([
            "first_name" => "Blogger",
	        "last_name" => rand(5, 200),
	        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit metus ac ipsum maximus, non tristique purus interdum. Interdum et. ",
	        "total_blogs" => rand(1, 50),
	        "rating" => rand(2, 5)
        ]);

        static::$currentInsertedId = $blogger->id;

        $this->assertInstanceOf(\App\Http\Models\Blogger::class, $blogger);
    }

    public function testCreateBloggersAPI()
    {
        $data = [
            "first_name" => "Blogger",
            "last_name" => rand(5, 200) . "",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit metus ac ipsum maximus, non tristique purus interdum. Interdum et. ",
            "total_blogs" => rand(1, 50),
            "rating" => rand(2, 5)
        ];

        $this->call('POST', '/bloggers', $data);

        $this->assertEquals(200, $this->response->status());
    }

    public function testUpdateBloggers()
    {
        $bloggers_repository = new \App\Repository\EloquentBloggerRepository(new \App\Http\Models\Blogger());
        $updated = $bloggers_repository->update([
            "first_name" => "Blogger",
            "last_name" => rand(5, 200),
            "description" => "Updated Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit metus ac ipsum maximus, non tristique purus interdum. Interdum et. ",
            "total_blogs" => rand(1, 50)
        ], static::$currentInsertedId);

        $this->assertTrue($updated === 1);
    }

    public function testUpdateBloggersAPI()
    {
        $data = [
            "first_name" => "Blogger",
            "last_name" => rand(5, 200) . "",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit metus ac ipsum maximus, non tristique purus interdum. Interdum et. ",
            "total_blogs" => rand(1, 50)
        ];

        $this->call('PUT', '/bloggers/' . static::$currentInsertedId , $data);

        $this->assertEquals(200, $this->response->status());
    }

    public function testRateBloggers()
    {
        $bloggers_repository = new \App\Repository\EloquentBloggerRatingRepository(new \App\Http\Models\BloggerRating(), new \App\Http\Models\Blogger());
        $updated = $bloggers_repository->rate(static::$currentInsertedId, 4);

        $this->assertTrue($updated === 1);
    }

    public function testRateBloggersAPI()
    {
        $request = ['rating' => 4];

        $this->call('PUT', '/bloggers/' . static::$currentInsertedId  . '/rating', $request);

        $this->assertEquals(200, $this->response->status());
    }

    public function testDeleteBloggers()
    {
        $bloggers_repository = new \App\Repository\EloquentBloggerRepository(new \App\Http\Models\Blogger());
        $updated = $bloggers_repository->delete(static::$currentInsertedId);

        $this->assertTrue($updated === 1);
    }

    public function testDeleteBloggersAPI()
    {

        $this->call('DELETE', '/bloggers/' . static::$currentInsertedId);

        $this->assertEquals(200, $this->response->status());
    }

}
