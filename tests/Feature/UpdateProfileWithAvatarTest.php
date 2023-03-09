<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;


class UpdateProfileWithAvatarTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function tearDown(): void
    {
        // grab the first user
        $user = User::first();

        // get the avatar path from the db
        $avatarName = $user->avatar;

        // delete the faked file that is created
        if(File::exists(public_path('avatars/' . $avatarName))) {
            File::delete(public_path('avatars/' . $avatarName));
        }

        parent::tearDown();
    }

    public function testUpdateProfileWithAvatar()
    {
        // create a new user
        $user = User::factory()->create();

        // create a fake image
        $avatar = UploadedFile::fake()->image('avatar.jpg');

        // send a request to update the user's profile with the fake image
        $response = $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'avatar' => $avatar,
            ]);

        // assert that the response has a redirect status
        $response->assertRedirect();

        // assert that the user's profile has been updated with the new data
        $avatarName = $user->avatar;
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'avatar' => $avatarName,
        ]);

        // assert that the avatar has been saved to the public directory
        $this->assertFileExists(public_path('avatars/' . $avatarName));
    }
}
