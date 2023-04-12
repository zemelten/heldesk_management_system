<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Reports;

use App\Models\UserSupport;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_reports()
    {
        $allReports = Reports::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-reports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_reports.index')
            ->assertViewHas('allReports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_reports()
    {
        $response = $this->get(route('all-reports.create'));

        $response->assertOk()->assertViewIs('app.all_reports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_reports()
    {
        $data = Reports::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-reports.store'), $data);

        $this->assertDatabaseHas('reports', $data);

        $reports = Reports::latest('id')->first();

        $response->assertRedirect(route('all-reports.edit', $reports));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_reports()
    {
        $reports = Reports::factory()->create();

        $response = $this->get(route('all-reports.show', $reports));

        $response
            ->assertOk()
            ->assertViewIs('app.all_reports.show')
            ->assertViewHas('reports');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_reports()
    {
        $reports = Reports::factory()->create();

        $response = $this->get(route('all-reports.edit', $reports));

        $response
            ->assertOk()
            ->assertViewIs('app.all_reports.edit')
            ->assertViewHas('reports');
    }

    /**
     * @test
     */
    public function it_updates_the_reports()
    {
        $reports = Reports::factory()->create();

        $userSupport = UserSupport::factory()->create();

        $data = [
            'user_support_id' => $userSupport->id,
        ];

        $response = $this->put(route('all-reports.update', $reports), $data);

        $data['id'] = $reports->id;

        $this->assertDatabaseHas('reports', $data);

        $response->assertRedirect(route('all-reports.edit', $reports));
    }

    /**
     * @test
     */
    public function it_deletes_the_reports()
    {
        $reports = Reports::factory()->create();

        $response = $this->delete(route('all-reports.destroy', $reports));

        $response->assertRedirect(route('all-reports.index'));

        $this->assertModelMissing($reports);
    }
}
