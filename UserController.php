<?php


require_once 'Cache.php';

class UserController {
    private $cache;
    private $model;

    public function __construct($model) {
        $this->cache = new Cache();
        $this->model = $model;
    }

    public function getUser($userId) {
        $cacheKey = "user_{$userId}";
        $userData = $this->cache->get($cacheKey);

        if (!$userData) {
            // Fetch from database
            $userData = $this->model->findUserById($userId);
            $this->cache->set($cacheKey, $userData, 600); // Cache for 10 minutes
        }

        return $userData;
    }
}

/*
// Step 4: Simulate MVC Controller Registering a User
class UserController
{
    protected $eventDispatcher;

    public function __construct($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
    
    public function register($userData)
    {
        // Assume we saved the user to a database
        echo "User registered: " . $userData['email'] . PHP_EOL;
        
        // Dispatch an event
        $event = new UserRegisteredEvent((object) $userData);
        $this->eventDispatcher->dispatch($event);
    }
}

// Step 5: Putting it All Together
$eventDispatcher = new EventDispatcher();
$eventDispatcher->listen(UserRegisteredEvent::class, new SendWelcomeEmailListener());
$eventDispatcher->listen(UserRegisteredEvent::class, new LogRegistrationListener());

$userController = new UserController($eventDispatcher);
$userController->register(['email' => 'test@example.com']);
*/ 

/*
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
*/ 


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
