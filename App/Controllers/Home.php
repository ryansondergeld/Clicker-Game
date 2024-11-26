<?php

// Namespace Statement
namespace Controllers;

// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");

// Use Statements
use Classes\Controller;
use Classes\Session;
use Classes\Request;
use Models\Score;
use Models\User;

// Include files
include_once("App/Classes/Controller.php");
include_once("App/Classes/Session.php");
include_once("App/Classes/Request.php");
include_once("App/Models/Score.php");
include_once("App/Models/User.php");

//-----------------------------------------------------------------------------
class Home extends Controller
{
    public $title = "Hello, I am your home page";
    public $message = "Welcome to my super awesome homepage!";

    public $scores = [];
    public $user = [];
    //-------------------------------------------------------------------------
    public function index($parameters)
    {

        // Check login
        $this->check_login();

        // Create a session
        $session = new Session();

        // Create a user to query the database tasks
        $user['user'] = $session->get_user('email');

        // Add score if post data was used
        $this->add_score();

        // Gather all data to be read
        $this->gather_data();
    }
    //-------------------------------------------------------------------------
    public function user($parameters)
    {
        // Check login
        $this->check_login();

        // Create a new Score
        $score = new Score();

        // Set for high scores
        $score->set_order_column('clicks_per_second');
        $score->set_order_type('desc');

        // Create the user id query
        $id['user_id'] = $this->user['id'];

        // Find all scores
        $this->scores = $score->where($id);

        // unset the user id
        unset($id['user_id']);

        // If there are no scores, exit
        if(!$this->scores) { return; }

        // Grab the user info for each score
        foreach ($this->scores as $score)
        {
            $user = new User();
            $id['id'] = $score->user_id;
            $list = $user->where($id);
            $score->user = $list[0];
        }
    }
    //-------------------------------------------------------------------------
    private function check_login()
    {
        // Create a session
        $session = new Session();

        // If we are logged in, all is good
        if($session->logged_in())
        {
            // Load user information
            $this->user['email'] = $session->get_user('email');
            $this->user['first_name'] = $session->get_user('first_name');
            $this->user['last_name'] = $session->get_user('last_name');
            $this->user['id'] = $session->get_user('id');
            $this->user['level'] = $session->get_user('level');

            // return
            return;
        }

        // We aren't logged in - so Redirect to login page
        header("Location: " . ROOT . "login");

        // Make sure no more of the script executes after redirect
        die;
    }
    //-------------------------------------------------------------------------
    private function gather_data()
    {
        // Create a new Score
        $score = new Score();

        // Set filters
        $score->set_order_column('clicks_per_second');
        $score->set_order_type('desc');

        // Find all scores
        $this->scores = $score->find_all();

        // If there are no scores, exit
        if(!$this->scores) { return; }

        // Grab the user info for each score
        foreach ($this->scores as $score)
        {
            $user = new User();
            $id['id'] = $score->user_id;
            $list = $user->where($id);
            $score->user = $list[0];
        }
    }
    //-------------------------------------------------------------------------
    private function add_score()
    {
        // Create a new request
        $request = new Request();

        // Create a new score
        $score = new Score();

        // If there is no post data, there is no need to continue
        if(!$request->post_used()){ return;}

        // Gather the post data
        $data = $request->post();

        // Add a date
        $data['score_date'] = date('Y-m-d H:i:s');

        // Insert the score to the table
        $score->insert($data);
    }
    //-------------------------------------------------------------------------
    private function redirect_home()
    {
        // Redirect to the home page
        header("Location: " . ROOT . "home");

        // Make sure no more of the script executes after redirect
        die;
    }
    //-------------------------------------------------------------------------
}