<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProblemCatagoryTest extends TestCase
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
    public function it_gets_problem_catagories_list()
    {
        $problemCatagories = ProblemCatagory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.problem-catagories.index'));

        $response->assertOk()->assertSee($problemCatagories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_problem_catagory()
    {
        $data = ProblemCatagory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.problem-catagories.store'),
            $data
        );

        $this->assertDatabaseHas('problem_catagories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_problem_catagory()
    {
        $problemCatagory = ProblemCatagory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.problem-catagories.update', $problemCatagory),
            $data
        );

        $data['id'] = $problemCatagory->id;

        $this->assertDatabaseHas('problem_catagories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_problem_catagory()
    {
        $problemCatagory = ProblemCatagory::factory()->create();

        $response = $this->deleteJson(
            route('api.problem-catagories.destroy', $problemCatagory)
        );

        $this->assertModelMissing($problemCatagory);

        $response->assertNoContent();
    }
}
