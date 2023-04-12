<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProblemCatagoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_problem_catagories()
    {
        $problemCatagories = ProblemCatagory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('problem-catagories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.problem_catagories.index')
            ->assertViewHas('problemCatagories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_problem_catagory()
    {
        $response = $this->get(route('problem-catagories.create'));

        $response->assertOk()->assertViewIs('app.problem_catagories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_problem_catagory()
    {
        $data = ProblemCatagory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('problem-catagories.store'), $data);

        $this->assertDatabaseHas('problem_catagories', $data);

        $problemCatagory = ProblemCatagory::latest('id')->first();

        $response->assertRedirect(
            route('problem-catagories.edit', $problemCatagory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_problem_catagory()
    {
        $problemCatagory = ProblemCatagory::factory()->create();

        $response = $this->get(
            route('problem-catagories.show', $problemCatagory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.problem_catagories.show')
            ->assertViewHas('problemCatagory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_problem_catagory()
    {
        $problemCatagory = ProblemCatagory::factory()->create();

        $response = $this->get(
            route('problem-catagories.edit', $problemCatagory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.problem_catagories.edit')
            ->assertViewHas('problemCatagory');
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

        $response = $this->put(
            route('problem-catagories.update', $problemCatagory),
            $data
        );

        $data['id'] = $problemCatagory->id;

        $this->assertDatabaseHas('problem_catagories', $data);

        $response->assertRedirect(
            route('problem-catagories.edit', $problemCatagory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_problem_catagory()
    {
        $problemCatagory = ProblemCatagory::factory()->create();

        $response = $this->delete(
            route('problem-catagories.destroy', $problemCatagory)
        );

        $response->assertRedirect(route('problem-catagories.index'));

        $this->assertModelMissing($problemCatagory);
    }
}
