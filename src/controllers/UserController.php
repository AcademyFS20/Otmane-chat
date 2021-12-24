<?php

namespace Chat;

use Provider\Session;
use \Models\User;
use \Provider\Renderer;
use \Provider\Request;
use \Provider\Validator;

class UserController
{

    private $user;
    private $validator;

    public function __construct()
    {

        $this->user = new User();
        $this->validator = new Validator();

    }

    public function logout()
    {

        echo "logout";
    }

    public function home()
    {

        $error = '';
        $status = false;
        $email = $password = "";
        $user = "";

        if (Request::post('login')) {
            // echo "Hello";

            $email = $this->validator->sanitizeStr(Request::setPost('emailLogin'));
            $password = $this->validator->sanitizeStr(Request::setPost('passLogin'));

            $fields = array('emailLogin', 'passLogin');
            $emptyChecker = $this->validator->isRequired($fields);

            if (empty($email)) {
                $error = "Email is required";
                $status = true;
                Renderer::render('admin', 'login', compact('error', 'status', 'password'));
            }

            if (empty($password)) {

                $error = "Password is required";
                $status = true;
                Renderer::render('admin', 'login', compact('error', 'status', 'email'));
            }

            $verify = $this->user->getRowbyEmail($email);

            if ($verify === 0) {

                $error = "please entrer a correct email";
                $status = true;
                Renderer::render('admin', 'login', compact('error', 'status', 'email'));

            } else {

                $user = $this->user->getUser($email);

                if (password_verify($password, $user->password)) {

                    $this->user->updateStatus(1, $user->email);
                    Session::setFlash('email', $user->email);
                    Renderer::redirectUrl('profile');

                } else {
                    $error = "Please enter a correct password";
                    $status = true;

                    Renderer::render('admin', 'login', compact('error', 'status'));

                }
            }
        }


        Renderer::render('admin', 'login', compact('error', 'status'));
    }
    public function dash()
    {
        Renderer::render('admin', 'profile');
    }
    public function sign()
    {

        $error = '';
        $status = false;
        $inserted = '';
        $insertstatus = false;
        $fname = $lname = $email = '';

        if (Request::post('signup')) {
            $fname = $this->validator->sanitizeStr(Request::setPost('fname'));
            $lname = $this->validator->sanitizeStr(Request::setPost('lname'));
            $email = $this->validator->sanitizeStr(Request::setPost('email'));
            $password = $this->validator->sanitizeStr(Request::setPost('pass'));
            $img_name=$_FILES["image"]["name"];
            $extensions = array('jpeg', 'png', 'jpg');
            $image_text = explode('.', $img_name);

            $getlastimg_ext = end($image_text);
            $isHavingEmail = $this->user->getEmails($email);

            $fields = array('fname', 'lname', 'pass', 'email');
            $emptyChecker = $this->validator->isRequired($fields);
            // echo "hello";

            if (!$emptyChecker) {
                $error = 'Fields are required';
                $status = true;

            } else {
                // echo "Hello";
                if (!$this->validator->isValidEmail($email)) {
                    $error = 'email is invalid';
                    $status = true;

                } else {
                    // echo "Hello";
                    // if ($isHavingEmail > 0) {
                    //     $error = 'email already exists';
                    //     $status = true;
                    //     echo "Hello";

                    // }
                    if (strlen($password) < 5) {

                        $error = 'Password is too short';
                        $status = true;
                        echo "bye";

                    } 
                    else if (!in_array($getlastimg_ext, $extensions)) {

                        $error = 'Image is required and must be a valid image (jpg,png,jpeg)';
                        $status = true;

                    } 
                    else {
                        // echo "Miaou";
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                        $isConnected = 0;


                        $img_temp = $_FILES['image']['tmp_name'];

                        if ($img_name !== '') {
                            $imgPath = $_SERVER['DOCUMENT_ROOT'] . '/Semaine11/MVC/public/assets/';
                            move_uploaded_file($img_temp, "$imgPath/$img_name");

                        }
                        // $data=compact('email');
                        $this->user->insertData($email, $hashed_password, $fname, $lname, $isConnected,$img_name);

                        if (true) {
                            Session::setFlash('success', 'Account Created Successfully');
                            Renderer::redirectUrl('login');
                            // header('Location:http://localhost:8090/Semaine11/MVC/login');
                            // echo 'Hello';
                        } else {

                            Session::setFlash('danger', 'Oops !! cant create an account !!');
                            Renderer::redirectUrl('signup');
                            // echo 'Bye';
                        }

                    }

                }

            }

        }

        Renderer::render('admin', 'signup', compact('error', 'status', 'fname', 'lname'));

    }

    public function getUserConnected($email)
    {

        $user = $this->user->getConnected(1,$email);
        return $user;

    }
}







































//  <?php
// namespace Chat;
// use \Models\User;
// use \Provider\Renderer;
// use \Provider\Validator;
// use \Provider\Request;
// class UserController
// {
//     private $user;
//     private $validator;
//     public function __construct()
//     {
//         $this->user=new User();
//         $this->validator=new Validator();
//     }
//     public function index()
//     {
//         $allusers=$this->user->getAllusers();
//         // $allmessages=$this->user->getAllmessages();
//         // debug($allmessages[0]);
//         // echo $allmessages[0]->email;
//         // foreach($allmessages as $message)
//         // {
//         //     echo $message->email.'<br>';
//         // }
//     }
//     public function home()
//     {
//         Renderer::render("admin","login");
//         // echo 'Otmane KSAANI';
//         // Renderer::renderAssets();
//     }
//     public function sign()
//     {   
//         // $error='';
//         $errorEmail='';
//         $errorPass='';
//         $errorLname='';
//         $errorFname='';
//         $status=false;
//         if(Request::post('signup'))
//         {
//             $fname=$this->validator->sanitizeStr(Request::setPost('fname'));
//             $lname=$this->validator->sanitizeStr(Request::setPost('lname'));
//             $email=$this->validator->sanitizeStr(Request::setPost('email'));
//             $password=$this->validator->sanitizeStr(Request::setPost('pass'));
//             $fields=array('lname','fname','email','pass');
//             $empty=$this->validator->isrequired($fields);
//             if(!$empty)
//             {
//                 // $error='fields are empty';
//                 // $status=true;
//                 if(empty($email))
//                 {
//                     $errorEmail="L'email est vide";
//                 }
//                 if(empty($lname))
//                 {
//                     $errorLname="le nom est vide";
//                 }
//                 if(empty($fname))
//                 {
//                     $errorFname="Le first name est vide";
//                 }
//                 if(empty($password))
//                 {
//                     $errorPass="Le mot de passe est vide";
//                 }
//                 $status=true;
//             }
//             else {
//                 if(!$this->validator->isValidEmail($email))
//                 {
//                     $errorEmail='Email is not valid';
//                     $status=true;  
//                 }
//                 if(strlen($password)<5)
//                 {
//                     $errorPass='password is too short';
//                     $status=true;
//                 }
//                 else
//                 {
//                     $hash_pass=password_hash($password,PASSWORD_BCRYPT);
//                 }
//             }
//         }
//         $data=compact('errorEmail','status','errorPass','errorFname','errorLname');
//         Renderer::render("admin","signup",$data);
//     }
// }?> 