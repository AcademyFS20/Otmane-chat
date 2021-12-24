<?php
namespace Models;
use Provider\Database;
class User extends Database
{
    public function getAllusers()
    {
        $this->query('SELECT * FROM users');
        $data=$this->resultSet();
        return $data;
    }
    public function getEmails($email)
    {
        $this->query('SELECT email FROM users WHERE email=:email');
        $this->bind(':email',$email);
        $this->exec();
        return $this->count();
    }
    public function getAllmessages()
    {
        $this->query('SELECT email FROM users');
        $data=$this->resultSet();
        return $data;
    }
    public function insertData($email, $password, $first, $last, $is_connected,$avatar)
    {

        $this->query('INSERT INTO users (firstname,lastname,password,is_connected,email,avatar) VALUES (:first,:last,:password,:is_connected,:email,:avatar)');
        $this->bind(':first', $first);
        $this->bind(':last', $last);
        $this->bind(':avatar', $avatar);
        $this->bind(':is_connected', $is_connected);
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        // $first1=$first;
        // $last1=$last;
        // // $avatar1=$avatar;
        // $is_connected1=$is_connected;
        // $password1=$password;
        // $email1=$email;
        $this->exec();
    }
    public function getConnected($is_connected, $email)
    {

        $this->query('SELECT id_user,firstname,lastname,is_connected FROM users where is_cennected=:is_connected AND email=:email');
        $this->bind(':is_connected', $is_connected);
        $this->bind(':email', $email);
        return $this->single();
    }
    public function getRowbyEmail($email)
    {
        $this->query('SELECT * FROM users WHERE email=:email');
        $this->bind(':email', $email);
        $this->exec();
        return $this->rowCount();
    }

    public function updateStatus($status, $email)
    {

        $this->query('UPDATE users SET is_connected=:status WHERE email=:email');
        $this->bind(':status', $status);
        $this->bind(':email', $email);
        $this->exec();

    }
    public function getUser($email)
    {

        $this->query('SELECT id_user,firstname,lastname,is_connected,email,password FROM users WHERE email=:email');
        $this->bind(':email', $email);
        return $this->single();

    }
}
?>