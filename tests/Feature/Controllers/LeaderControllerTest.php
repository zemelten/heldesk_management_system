<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Leader;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LeaderControllerTest extends TestCase
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
    public function it_displays_index_view_with_leaders()
    {
        $leaders = Leader::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('leaders.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.leaders.index')
            ->assertViewHas('leaders');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_leader()
    {
        $response = $this->get(route('leaders.create'));

        $response->assertOk()->assertViewIs('app.leaders.create');
    }

    /**
     * @test
     */
    public function it_stores_the_leader()
    {
        $data = Leader::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('leaders.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('leaders', $data);

        $leader = Leader::latest('id')->first();

        $response->assertRedirect(route('leaders.edit', $leader));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_leader()
    {
        $leader = Leader::factory()->create();

        $response = $this->get(route('leaders.show', $leader));

        $response
            ->assertOk()
            ->assertViewIs('app.leaders.show')
            ->assertViewHas('leader');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_leader()
    {
        $leader = Leader::factory()->create();

        $response = $this->get(route('leaders.edit', $leader));

        $response
            ->assertOk()
            ->assertViewIs('app.leaders.edit')
            ->assertViewHas('leader');
    }

    /**
     * @test
     */
    public function it_updates_the_leader()
    {
        $leader = Leader::factory()->create();

        $user = User::factory()->create();

        $data = [
            'full_name' => $this->faker->firstName,
            'sex' => \Arr::random(['male', 'female', 'other']),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('leaders.update', $leader), $data);

        unset($data['user_id']);

        $data['id'] = $leader->id;

        $this->assertDatabaseHas('leaders', $data);

        $response->assertRedirect(route('leaders.edit', $leader));
    }

    /**
     * @test
     */
    public function it_deletes_the_leader()
    {
        $leader = Leader::factory()->create();

        $response = $this->delete(route('leaders.destroy', $leader));

        $response->assertRedirect(route('leaders.index'));

        $this->assertModelMissing($leader);
    }
}
