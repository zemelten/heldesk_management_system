<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Problem;
use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProblemCatagoryProblemsTest extends TestCase
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
    public function it_gets_problem_catagory_problems()
    {
        $problemCatagory = ProblemCatagory::factory()->create();
        $problems = Problem::factory()
            ->count(2)
            ->create([
                'problem_catagory_id' => $problemCatagory->id,
            ]);

        $response = $this->getJson(
            route('api.problem-catagories.problems.index', $problemCatagory)
        );

        $response->assertOk()->assertSee($problems[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_problem_catagory_problems()
    {
        $problemCatagory = ProblemCatagory::factory()->create();
        $data = Problem::factory()
            ->make([
                'problem_catagory_id' => $problemCatagory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.problem-catagories.problems.store', $problemCatagory),
            $data
        );

        $this->assertDatabaseHas('problems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $problem = Problem::latest('id')->first();

        $this->assertEquals(
            $problemCatagory->id,
            $problem->problem_catagory_id
        );
    }
}
