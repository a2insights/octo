<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Octo\Octo;
use Octo\Resources\Livewire\System\SiteInfo;
use Octo\Resources\Livewire\System\SiteSection;
use Octo\Resources\Livewire\System\SiteSections;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_admin_can_view_site_index()
    {
        $user = User::factory()->withPersonalTeam()->create([
            'super_admin' => true,
            'dashboard' => 'system',
        ]);

       $response = $this->actingAs($user)->get('/system/site');

       $response->assertStatus(200);
    }

    public function test_site_info_can_be_update()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        Livewire::test(SiteInfo::class)
                    ->set([
                        'name' => 'Site Name',
                        'active' => true,
                        'description' => 'Test description',
                    ])
                    ->call('submit');

        $this->assertTrue(Octo::site()->name === 'Site Name');
        $this->assertTrue(Octo::site()->active === true);
        $this->assertTrue(Octo::site()->description === 'Test description');
    }

    public function test_section_can_be_created()
    {
        Livewire::test(SiteSection::class)
                    ->set([
                        'state'=> [
                            'title' => 'Section Title',
                            'description' => 'Section Description',
                        ],
                    ])
                    ->call('submit');

        $section = collect(Octo::site()->sections)->firstWhere('title', 'Section Title');

        $this->assertNotNull($section);
    }

    public function test_section_can_be_updated()
    {
        $sectionTitle = Str::random(10);

        Livewire::test(SiteSection::class)
                ->set([
                    'state'=> [
                        'title' => $sectionTitle,
                        'description' => 'Section Description',
                    ],
                ])
                ->call('submit');

        $section = collect(Octo::site()->sections)->firstWhere('title', $sectionTitle);

        Livewire::test(SiteSection::class)
                ->set([
                    'state' => [
                        'id' => $section['id'],
                        'title' => 'Section New Title',
                        'description' => 'Section Description',
                    ]
                ])
                ->call('submit');

        $section = collect(Octo::site()->sections)->firstWhere('title', 'Section New Title');

        $this->assertNotNull($section);
    }

    public function test_section_can_be_deleted()
    {
        Livewire::test(SiteSection::class)
                ->set([
                    'state'=> [
                        'title' => 'Section Title',
                        'description' => 'Section Description',
                    ],
                ])
                ->call('submit');

        $section = collect(Octo::site()->sections)->firstWhere('title',  'Section Title');

        Livewire::test(SiteSections::class)->call('delete', $section['id']);

        $section = collect(Octo::site()->sections)->firstWhere('id',  $section['id']);

        $this->assertNull($section);
    }
}
