<?php

class UserController
{
    public function store($request)
    {
        // Retrieve form data from the request
        $data = $request->get('form_data');

        // Pass the data to the User model for processing
        $user = new UserModel($data);
        $user->save();

        // Redirect to the user listing page
        return View::redirect('/users');
    }
}


/*
class UserController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }
    
    public function showUser($id)
    {
        $user = $this->model->getUserById($id);
        $this->view->displayUser($user);
    }
}
*/ 
