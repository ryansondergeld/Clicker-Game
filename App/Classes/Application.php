<?php
//-----------------------------------------------------------------------------
//    _             _ _         _   _
//   /_\  _ __ _ __| (_)__ __ _| |_(_)___ _ _
//  / _ \| '_ \ '_ \ | / _/ _` |  _| / _ \ ' \
// /_/ \_\ .__/ .__/_|_\__\__,_|\__|_\___/_||_|
//       |_|  |_|
//
//-----------------------------------------------------------------------------
// 2024-05-31 Ryan Sondergeld
//
// This class runs the entire application.
//
// When the constructor is called, it will parse the URL that is received and
// create the page that is required.  That is the application's only job. The
// Individual pages will handle the parameters and make decisions based on
// what parameters are received.
//
//-----------------------------------------------------------------------------

namespace Classes;

// Check to make sure this page is not accessed elsewhere
defined("ROOT") OR exit("Access Denied!");

// List all used Classes here
use Controllers\_404;
use Controllers\UserCreate;
use Controllers\Home;
use Controllers\Login;
use Controllers\Logout;
use Controllers\Game;

// Include all used Controllers here
include_once("App/Controllers/_404.php");
include_once("App/Controllers/UserCreate.php");
include_once("App/Controllers/Home.php");
include_once("App/Controllers/Login.php");
include_once("App/Controllers/Logout.php");
include_once("App/Controllers/Game.php");

class Application
{
    //-------------------------------------------------------------------------
    public function __construct()
    {
        // Grab the page direction from the URL
        $page = $this->get_page();

        // Grab parameters from the URL
        $parameters = $this->get_parameters();

        // Go to specified page
        $this->go_to_page($page, $parameters);
    }
    //-------------------------------------------------------------------------
    private function get_page()
    {
        // Determine if we have any url info.  If not, set to home
        if(!isset($_GET['url'])) { return "home"; }

        // At this point, there is URL information
        $url = $_GET['url'];

        // Trim the trailing slash if there is one
        $url = rtrim($url, "/");

        // Filter the value
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Explode into an array
        $url = explode('/', $url);

        // Return URL value
        return $url[0];
    }
    //-------------------------------------------------------------------------
    private function get_parameters()
    {
        // Determine if we have parameters or not
        if(!isset($_GET['url'])) { return []; }

        // Here we know there is at least a home page, let's grab it
        $url = $_GET['url'];

        // Trim the trailing slash if there is one
        $url = rtrim($url, "/");

        // Filter the value
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Explode into an array
        $url = explode('/', $url);

        // Remove the page direction
        unset($url[0]);

        // Return what is left in a new sorted order
        return array_values($url);
    }
    //-------------------------------------------------------------------------
    private function go_to_page($page, $data)
    {
        // Determine which page to open here
        switch ($page)
        {
            // List a case for each page and the associated view here
            case 'home':
                new Home("App/Views/Home.php",$data);
                break;
            case 'create-account':
                new UserCreate("App/Views/UserCreate.php",$data);
                break;
            case 'login':
                new Login("App/Views/Login.php",$data);
                break;
            case 'logout':
                new Logout("App/Views/Home.php",$data);
                break;
            case 'game':
                new Game("App/Views/Game.php",$data);
                break;
            default:
                new _404("App/Views/_404.php",$data);
                break;
        }
    }
    //-------------------------------------------------------------------------
}