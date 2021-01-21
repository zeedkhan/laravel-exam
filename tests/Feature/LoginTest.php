<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use HasFactory;
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_the_todo_index()
    {
        $request = $this->get('/todo')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_see_the_todo_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/todo')->assertOk();
        // $request = $this->get('/todo')->assertOk();
    }


    /** @test */
    public function a_user_add_todo()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user)->post('/todo', [
            'title' => 'test',
            'completed' => '1',
            'user_id' => '1',
            'description' => 'Testing'
        ]);

        // $this->actingAs($user)->post('/todo', [
        //     'title' => 'Test'
        // ]);

        $this->assertCount(1, Todo::all());
    }

    /** @test */
    public function a_user_get_a_post_after_submit()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user)->post('/todo', [
            'title' => 'test',
            'completed' => '1',
            'user_id' => '1',
            'description' => 'Testing'
        ]);

        $get = $this->actingAs($user)->get('/todo/1');

        $this->assertCount(1, Todo::all());
    }

    /** @test */
    public function a_user_edit_todo()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user)->post('/todo', [
            'title' => 'test',
            'completed' => '1',
            'user_id' => '1',
            'description' => 'Testing'
        ]);

        $update = $this->actingAs($user)->put('/todo/1', [
            'title' => 'Test(edit)',
            'completed' => '0',
            'user_id' => '1',
            'description' => 'Testing'
        ]);

        $this->assertCount(1, Todo::all());
    }

    /** @test */
    public function a_user_delete_todo()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->post('/todo', [
            'title' => 'test',
            'completed' => '1',
            'user_id' => '1',
            'description' => 'Testing'
        ]);

        $delete = $this->actingAs($user)->delete('/todo/1');

        $this->assertCount(0, Todo::all());
    }

    /** @test */
    public function a_user_log_out()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user)->get('/home')->assertOk();
        $this->actingAs($user)->post('/logout');
    }
}
