<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    function test_basic_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *  Basic test to check correct DB in testing environment
     */
    public function test_basic_db_response()
    {
        $user = factory(\App\User::class)->create(
            [
                "name" => "Pablo",
                "last_name" => "Espinoza",
            ]
        );

        $this->actingAs($user, 'api')
            ->get('api/user')
            ->assertSee('Pablo');
    }
}
