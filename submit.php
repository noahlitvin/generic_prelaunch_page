<?php

function checkEmail($email) 
{
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
     
      if (eregi($pattern, $email)){
         return true;
      }
      else {
         return false;
      } 
}

$email = $_POST["email"];

if(checkEmail($email) == FALSE) 
{
   echo "That email address isn't valid.";
} 
else 
{
   $myFile = "emails.txt";
   $fh = fopen($myFile, 'a') or die("can't open file");
   $stringData = "\r\n" . $email;
   fwrite($fh, $stringData);
   fclose($fh);
   echo "Thanks! We'll let you know as soon as we launch!";
}

?>
