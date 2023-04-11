<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Director;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DirectorControllerTest extends TestCase
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
    public function it_displays_index_view_with_directors()
    {
        $directors = Director::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('directors.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.directors.index')
            ->assertViewHas('directors');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_director()
    {
        $response = $this->get(route('directors.create'));

        $response->assertOk()->assertViewIs('app.directors.create');
    }

    /**
     * @test
     */
    public function it_stores_the_director()
    {
        $data = Director::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('directors.store'), $data);

        $this->assertDatabaseHas('directors', $data);

        $director = Director::latest('id')->first();

        $response->assertRedirect(route('directors.edit', $director));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_director()
    {
        $director = Director::factory()->create();

        $response = $this->get(route('directors.show', $director));

        $response
            ->assertOk()
            ->assertViewIs('app.directors.show')
            ->assertViewHas('director');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_director()
    {
        $director = Director::factory()->create();

        $response = $this->get(route('directors.edit', $director));

        $response
            ->assertOk()
            ->assertViewIs('app.directors.edit')
            ->assertViewHas('director');
    }

    /**
     * @test
     */
    public function it_updates_the_director()
    {
        $director = Director::factory()->create();

        $user = User::factory()->create();

        $data = [
            'full_name' => $this->faker->name(),
            'sex' => \Arr::random(['male', 'female', 'other']),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('directors.update', $director), $data);

        $data['id'] = $director->id;

        $this->assertDatabaseHas('directors', $data);

        $response->assertRedirect(route('directors.edit', $director));
    }

    /**
     * @test
     */
    public function it_deletes_the_director()
    {
        $director = Director::factory()->create();

        $response = $this->delete(route('directors.destroy', $director));

        $response->assertRedirect(route('directors.index'));

        $this->assertModelMissing($director);
    }
}
