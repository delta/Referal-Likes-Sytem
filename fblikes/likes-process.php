<?php
    set_time_limit(0);
    error_reporting(1);


    //Checking whether session is initiated
    include 'session-check.php';
    
    //___________________________________________________________________________________________________________________________
    //Checking whether user granted permissions for the app.
    
    
    $error =$_GET['error'];
    $error_code = $_GET['error_code'];
    if ( $error == "access_denied" )
    {
        //-----------------------------------------------------------------------------------------------------------------------
        //User Denied Permission.... 
        //Redirecting to the likes pa
        ?>
        <script type="text/javascript">
             function redirect()
             {
                 window.location = "http://delta.nitt.edu/~schezwan/fblikes/likes.php?fbid=<?php echo $fbid ?>";
             }
             alert("You have denied permissions for the app. Redirecting to Likes Page");
             setTimeout(redirect(),1000);
        </script>
        <?php
        die() ;
        //_______________________________________________________________________________________________________________________
    }
    
    //___________________________________________________________________________________________________________________________
    //App details
    include 'app-details.php';
    //___________________________________________________________________________________________________________________________
    //getting the current page url for recieving access token
    
    $current_url = 'http://';
    
    if ($_SERVER["SERVER_PORT"] != "80") 
        {
            $current_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        }
    else 
        {
            $current_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        
    //__________________________________________________________________________________________________________________________________
    //curling facebook graph api and getting access token
    $code=$_GET['code'];
    $url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$current_url&client_secret=$app_secret&code=$code";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $cl=curl_exec($ch);
    $access_token=substr($cl, 13,-16);
    
    //_______________________________________________________________________________________________________________________________
    //add access_token to the current session

    $_SESSION['access_token']=$access_token;
    
    //_______________________________________________________________________________________________________________________________
    //redirecting the user to like the page.
    header("Location: ./likethepage.php?fbid=$fbid");
    //______________________________________________________________________________________________________________________________

?>
