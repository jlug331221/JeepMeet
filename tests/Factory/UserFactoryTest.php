<?php

namespace Tests\Factory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User_Models\User;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a user factory.
     *
     * @return void
     */
    public function testUserFactory()
    {
       // Create a user to add to the database
       $user = factory(User::class)->create([
            'username' => 'DRW',
            'first_name' => 'David',
            'last_name' => 'Walker',
            'email' => 'boozehound69@hotmail.com'
        ]);

        // Verify that the user is in database
        $this->assertDatabaseHas('users', [
            'username' => 'DRW',
            'first_name' => 'David',
            'last_name' => 'Walker',
            'email' => 'boozehound69@hotmail.com'
        ]);

        // Remove the user
        $user->delete(); 
        
        // Verify that user is no longer in database
        $this->assertDatabaseMissing('users', [
            'username' => 'DRW',
            'first_name' => 'David',
            'last_name' => 'Walker',
            'email' => 'boozehound69@hotmail.com'
        ]);
    }
}
