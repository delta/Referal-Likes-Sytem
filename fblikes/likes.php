<?php
    
    //______________________________________________________________________________________________________________________________________
    //Getting Referall ID
    
    $fbid=$_GET['fbid'];
    session_start();
    $_SESSION['fbid']=$fbid;
    $_SESSION['referer']=$fbid;
    
    //This page redirects the user for getting permisions to get the likers likes and other details
    

?>

        
    

<html >

<script>
        function redirect(){

        window.location="https://www.facebook.com/dialog/oauth?client_id=694159134003863&redirect_uri=http://delta.nitt.edu/~schezwan/fblikes/likes-process.php&scope=public_profile";
            }
        </script>
    <body onload="redirect();">
    </body>
   </html>