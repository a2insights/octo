<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Octo\Resources\Livewire\System\SiteInfo;
use Octo\Resources\Livewire\System\SiteSection;
use Octo\Resources\Livewire\System\SiteSections;
use Octo\Site;
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
                        'description' => 'Site Description',
                        'active' => true,
                    ])
                    ->call('submit');

        $this->assertTrue(Site::getName() === 'Site Name');
        $this->assertTrue(Site::getDescription() === 'Site Description');
        $this->assertTrue(Site::getActive() === true);
    }

    public function test_section_can_be_created()
    {
        Livewire::test(SiteSection::class)
                    ->set([
                        'name' => 'Section Name',
                        'content' => 'Section Content',
                    ])
                    ->call('submit');

        $section = collect(Site::sections())->firstWhere('name', 'Section Name');

        $this->assertNotNull($section);
    }

    public function test_section_can_be_updated()
    {
        $sectionName = Str::random(10);

        Livewire::test(SiteSection::class)
                ->set([
                    'name' => $sectionName,
                    'content' => 'Section Content',
                ])
                ->call('submit');

        $section = collect(Site::sections())->firstWhere('name', $sectionName);

        Livewire::test(SiteSection::class)
                ->set([
                    'section_id' => $section['id'],
                    'name' => 'Section New Name',
                    'content' => 'Section Content',
                ])
                ->call('submit');

        $section = collect(Site::sections())->firstWhere('name', 'Section New Name');

        $this->assertNotNull($section);
    }

    public function test_section_can_be_deleted()
    {
        Livewire::test(SiteSection::class)
                ->set([
                    'name' => 'Section Name',
                    'content' => 'Section Content',
                ])
                ->call('submit');

        $section = collect(Site::sections())->firstWhere('name',  'Section Name');

        Livewire::test(SiteSections::class)->call('delete', $section['id']);

        $section = collect(Site::sections())->firstWhere('id',  $section['id']);

        $this->assertNull($section);
    }
}
