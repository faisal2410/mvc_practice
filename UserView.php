<?php
class UserView
{
    public function displayUser($user)
    {
        echo "<h1>User Profile</h1>";
        echo "<p>Name: {$user['name']}</p>";
        echo "<p>Email: {$user['email']}</p>";
    }
}
