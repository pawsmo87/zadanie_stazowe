<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_a_list_of_users()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('index'));

        $response->assertStatus(200);
        foreach ($users as $user) {
            $response->assertSee($user->full_name);
        }
    }

    /** @test */
    public function it_displays_the_user_creation_form()
    {
        $response = $this->get(route('create'));

        $response->assertStatus(200);
        $response->assertSee('Create User');
    }

    /** @test */
    public function it_creates_a_new_user()
    {
        $data = [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post(route('store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('show', User::first()->id));
        $this->assertDatabaseHas('users', ['full_name' => 'John Doe', 'email' => 'john@example.com']);
    }

    /** @test */
    public function it_shows_a_single_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('show', $user->id));

        $response->assertStatus(200);
        $response->assertSee($user->full_name);
    }

    /** @test */
    public function it_displays_the_user_edit_form()
    {
        $user = User::factory()->create();

        $response = $this->get(route('edit', $user->id));

        $response->assertStatus(200);
        $response->assertSee('Edit User');
        $response->assertSee($user->full_name);
    }

    /** @test */
    public function it_updates_an_existing_user()
    {
        $user = User::factory()->create();

        $data = [
            'full_name' => 'Updated Name',
            'email' => 'updated@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ];

        $response = $this->put(route('update', $user->id), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('show', $user->id));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'full_name' => 'Updated Name', 'email' => 'updated@example.com']);
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

  /** @test */
public function it_deletes_an_existing_user()
{
    $user = User::factory()->create();

    $response = $this->delete(route('destroy', $user->id));

    $response->assertStatus(302);
    $response->assertRedirect(route('index'));
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
}

}