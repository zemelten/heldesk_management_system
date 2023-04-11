<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\UserSupport;

use App\Models\Unit;
use App\Models\Building;
use App\Models\ServiceUnit;
use App\Models\ProblemCatagory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSupportControllerTest extends TestCase
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
    public function it_displays_index_view_with_user_supports()
    {
        $userSupports = UserSupport::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('user-supports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.user_supports.index')
            ->assertViewHas('userSupports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_user_support()
    {
        $response = $this->get(route('user-supports.create'));

        $response->assertOk()->assertViewIs('app.user_supports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_user_support()
    {
        $data = UserSupport::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('user-supports.store'), $data);

        $this->assertDatabaseHas('user_supports', $data);

        $userSupport = UserSupport::latest('id')->first();

        $response->assertRedirect(route('user-supports.edit', $userSupport));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_user_support()
    {
        $userSupport = UserSupport::factory()->create();

        $response = $this->get(route('user-supports.show', $userSupport));

        $response
            ->assertOk()
            ->assertViewIs('app.user_supports.show')
            ->assertViewHas('userSupport');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_user_support()
    {
        $userSupport = UserSupport::factory()->create();

        $response = $this->get(route('user-supports.edit', $userSupport));

        $response
            ->assertOk()
            ->assertViewIs('app.user_supports.edit')
            ->assertViewHas('userSupport');
    }

    /**
     * @test
     */
    public function it_updates_the_user_support()
    {
        $userSupport = UserSupport::factory()->create();

        $user = User::factory()->create();
        $problemCatagory = ProblemCatagory::factory()->create();
        $building = Building::factory()->create();
        $serviceUnit = ServiceUnit::factory()->create();
        $unit = Unit::factory()->create();

        $data = [
            'user_type' => $this->faker->numberBetween(0, 127),
            'user_id' => $user->id,
            'problem_catagory_id' => $problemCatagory->id,
            'building_id' => $building->id,
            'service_unit_id' => $serviceUnit->id,
            'unit_id' => $unit->id,
        ];

        $response = $this->put(
            route('user-supports.update', $userSupport),
            $data
        );

        $data['id'] = $userSupport->id;

        $this->assertDatabaseHas('user_supports', $data);

        $response->assertRedirect(route('user-supports.edit', $userSupport));
    }

    /**
     * @test
     */
    public function it_deletes_the_user_support()
    {
        $userSupport = UserSupport::factory()->create();

        $response = $this->delete(route('user-supports.destroy', $userSupport));

        $response->assertRedirect(route('user-supports.index'));

        $this->assertModelMissing($userSupport);
    }
}
