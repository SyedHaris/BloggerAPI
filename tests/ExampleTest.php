<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
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

    public function testGetBloggers()
    {
        $bloggers_repository = new \App\Repository\BloggerRepository();
        $bloggers = $bloggers_repository->getAll();

        if(count($bloggers) > 0)
            return $this->assertObjectHasAttribute('first_name', $bloggers[0]);

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
}
