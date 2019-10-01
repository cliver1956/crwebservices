<?php
 
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LfhH1kUAAAAAMA2bvVrOiuhKrfz5HhRDbabHses';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
   }
?>