<?php
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
