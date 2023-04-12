<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserSupport;
use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProblemCatagoryUserSupportsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_problem_catagory_user_supports()
    {
        $problemCatagory = ProblemCatagory::factory()->create();
        $userSupports = UserSupport::factory()
            ->count(2)
            ->create([
                'problem_catagory_id' => $problemCatagory->id,
            ]);

        $response = $this->getJson(
            route(
                'api.problem-catagories.user-supports.index',
                $problemCatagory
            )
        );

        $response->assertOk()->assertSee($userSupports[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_problem_catagory_user_supports()
    {
        $problemCatagory = ProblemCatagory::factory()->create();
        $data = UserSupport::factory()
            ->make([
                'problem_catagory_id' => $problemCatagory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.problem-catagories.user-supports.store',
                $problemCatagory
            ),
            $data
        );

        $this->assertDatabaseHas('user_supports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $userSupport = UserSupport::latest('id')->first();

        $this->assertEquals(
            $problemCatagory->id,
            $userSupport->problem_catagory_id
        );
    }
}
