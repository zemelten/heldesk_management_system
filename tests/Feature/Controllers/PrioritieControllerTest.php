<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Prioritie;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrioritieControllerTest extends TestCase
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
    public function it_displays_index_view_with_priorities()
    {
        $priorities = Prioritie::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('priorities.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.priorities.index')
            ->assertViewHas('priorities');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_prioritie()
    {
        $response = $this->get(route('priorities.create'));

        $response->assertOk()->assertViewIs('app.priorities.create');
    }

    /**
     * @test
     */
    public function it_stores_the_prioritie()
    {
        $data = Prioritie::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('priorities.store'), $data);

        $this->assertDatabaseHas('priorities', $data);

        $prioritie = Prioritie::latest('id')->first();

        $response->assertRedirect(route('priorities.edit', $prioritie));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_prioritie()
    {
        $prioritie = Prioritie::factory()->create();

        $response = $this->get(route('priorities.show', $prioritie));

        $response
            ->assertOk()
            ->assertViewIs('app.priorities.show')
            ->assertViewHas('prioritie');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_prioritie()
    {
        $prioritie = Prioritie::factory()->create();

        $response = $this->get(route('priorities.edit', $prioritie));

        $response
            ->assertOk()
            ->assertViewIs('app.priorities.edit')
            ->assertViewHas('prioritie');
    }

    /**
     * @test
     */
    public function it_updates_the_prioritie()
    {
        $prioritie = Prioritie::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'response' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('priorities.update', $prioritie), $data);

        $data['id'] = $prioritie->id;

        $this->assertDatabaseHas('priorities', $data);

        $response->assertRedirect(route('priorities.edit', $prioritie));
    }

    /**
     * @test
     */
    public function it_deletes_the_prioritie()
    {
        $prioritie = Prioritie::factory()->create();

        $response = $this->delete(route('priorities.destroy', $prioritie));

        $response->assertRedirect(route('priorities.index'));

        $this->assertModelMissing($prioritie);
    }
}
