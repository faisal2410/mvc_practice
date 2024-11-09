<?php
class AuthController
{
    public function register($request)
    {
        // Validate user data
        $data = $request->get('registration_form');
        $validation = new Validator($data);

        if (!$validation->passes()) {
            return View::render('auth/register', ['errors' => $validation->errors()]);
        }

        // Create new user if validation passes
        $user = new UserModel($data);
        $user->save();

        // Redirect to login page after successful registration
        return View::redirect('/login');
    }
}
