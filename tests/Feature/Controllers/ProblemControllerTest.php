<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Problem;

use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProblemControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_problems()
    {
        $problems = Problem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('problems.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.problems.index')
            ->assertViewHas('problems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_problem()
    {
        $response = $this->get(route('problems.create'));

        $response->assertOk()->assertViewIs('app.problems.create');
    }

    /**
     * @test
     */
    public function it_stores_the_problem()
    {
        $data = Problem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('problems.store'), $data);

        $this->assertDatabaseHas('problems', $data);

        $problem = Problem::latest('id')->first();

        $response->assertRedirect(route('problems.edit', $problem));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_problem()
    {
        $problem = Problem::factory()->create();

        $response = $this->get(route('problems.show', $problem));

        $response
            ->assertOk()
            ->assertViewIs('app.problems.show')
            ->assertViewHas('problem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_problem()
    {
        $problem = Problem::factory()->create();

        $response = $this->get(route('problems.edit', $problem));

        $response
            ->assertOk()
            ->assertViewIs('app.problems.edit')
            ->assertViewHas('problem');
    }

    /**
     * @test
     */
    public function it_updates_the_problem()
    {
        $problem = Problem::factory()->create();

        $problemCatagory = ProblemCatagory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'problem_catagory_id' => $problemCatagory->id,
        ];

        $response = $this->put(route('problems.update', $problem), $data);

        $data['id'] = $problem->id;

        $this->assertDatabaseHas('problems', $data);

        $response->assertRedirect(route('problems.edit', $problem));
    }

    /**
     * @test
     */
    public function it_deletes_the_problem()
    {
        $problem = Problem::factory()->create();

        $response = $this->delete(route('problems.destroy', $problem));

        $response->assertRedirect(route('problems.index'));

        $this->assertModelMissing($problem);
    }
}
