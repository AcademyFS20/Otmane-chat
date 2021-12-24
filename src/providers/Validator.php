<?php
namespace Provider;

class Validator {
public static function sanitizeStr($input)
{
    return trim(strip_tags($input));
}
public function isValidEmail($email)
{
    if(filter_var($this->sanitizeStr($email),FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
        return false;
    }
}
public function isRequired($fields)
{ 
    foreach($fields as $field)
    {
        if($_POST[$field]==='')
        {
            return false;
        }
    }
    return true;
}
}

?>