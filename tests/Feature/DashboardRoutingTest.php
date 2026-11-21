<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DashboardRoutingTest extends TestCase
{
    use RefreshDatabase;

    public static function roles(): array
    {
        return [
            'admin' => [User::ROLE_ADMIN],
            'perawat' => [User::ROLE_PERAWAT],
            'pasien' => [User::ROLE_PASIEN],
        ];
    }

    #[DataProvider('roles')]
    public function test_each_role_can_render_its_dashboard_with_the_correct_account_link(string $role): void
    {
        $user = User::factory()->create(['role' => $role]);

        $response = $this->actingAs($user)->get('/'.$role.'/dashboard');

        $response->assertOk()
            ->assertViewIs($role.'.dashboard')
            ->assertSee('<a href="'.route($role.'.dashboard').'" class="user-menu-item">Dashboard</a>', false);
    }

    #[DataProvider('roles')]
    public function test_login_redirects_to_a_working_dashboard(string $role): void
    {
        $user = User::factory()->create(['role' => $role]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/'.$role.'/dashboard');
        $this->followRedirects($response)->assertOk();
    }

    public function test_patient_navigation_pages_render(): void
    {
        $user = User::factory()->create(['role' => User::ROLE_PASIEN]);
        $this->actingAs($user);

        foreach (['terapi', 'edukasi', 'catatan'] as $page) {
            $this->get('/pasien/'.$page)->assertOk()->assertViewIs('pasien.'.$page);
        }
    }

    #[DataProvider('roles')]
    public function test_users_cannot_access_other_roles_dashboards(string $role): void
    {
        $user = User::factory()->create(['role' => $role]);
        $this->actingAs($user);

        foreach ([User::ROLE_ADMIN, User::ROLE_PERAWAT, User::ROLE_PASIEN] as $otherRole) {
            if ($otherRole !== $role) {
                $this->get('/'.$otherRole.'/dashboard')->assertForbidden();
            }
        }
    }
}
