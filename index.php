<?php
require('./vendor/autoload.php');
require('./core/init.php');
use \Chat\UserController;

$user=new UserController();
try
{
    if(empty($_GET['page']))
    {
        throw new Exception('Page not found');
    }
    else
    {
        $uri=filter_var($_GET['page'],FILTER_SANITIZE_URL);
        $url=explode('/',$uri);
        if(empty($url[0]))
        {
            throw new Exception('URL not found');
        }
        else
        {
            /*** Ici on va faire le routage ********/
            switch($url[0])
            {
                case 'login':
                    // echo 'Hello';
                    $user->home();
                    // switch($url[1])
                    // {
                    //     case 'login':
                    //         echo "this is a login method";
                    //     break;
                    //     case 'signup':
                    //         echo "signup";
                    //     break;
                    //     case 'logout':
                    //         echo "this is a logout";
                    //     break;
                    //     default:
                    //         throw new Exception('Route not found');
                    // }
                break;
                case 'signup':
                    $user->sign();
                break;
                case 'profile':
                    $user->dash();
                break;
                default:
                    throw new Exception('404');
            }
        }
    }
}
catch(Exception $e)
{
    $message = $e->getMessage();
    printf("An internal error is occured in the server:%s \n",$message);
    die();
}
?>