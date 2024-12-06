<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
         // Redirect to login if not authenticated
         if (!$this->isAuthenticated()) {
         $this->redirectToLogin();
         }

         // Fetch all users from the database
         $users = $this->user->all();

         // Pass the data to the 'users/index' view
         $this->view('users/index', compact('users'));
    }

    public function create()
    {
        if (!$this->isAuthenticated()) {
            $this->redirectToLogin();
        }

        $this->view('users/create');
    }

    public function store()
    {
        if (!$this->isAuthenticated()) {
            $this->redirectToLogin();
        }

        $this->user->create($_POST);
        header('Location: /');
    }

    public function edit($id)
    {
        if (!$this->isAuthenticated()) {
            $this->redirectToLogin();
        }

        // Fetch the user data using the ID
        $user = $this->user->find($id);

        // Pass the user data to the 'users/edit' view
        $this->view('users/edit', compact('user'));
    }

    public function update($id)
    {
        if (!$this->isAuthenticated()) {
            $this->redirectToLogin();
        }

        $this->user->update($id, $_POST);
        header('Location: /');
    }

    public function delete($id)
    {
        if (!$this->isAuthenticated()) {
            $this->redirectToLogin();
        }
        
        $this->user->delete($id);
        header('Location: /');
    }
}