<?php
    set_time_limit(0);
    
    //___________________________________________________________________________________________________________________________
    //Checking whether user granted permissions to the app.

    $error =$_GET['error'];
    $error_code = $_GET['error_code'];
    if ( $error == "access_denied" )
    {
        //-----------------------------------------------------------------------------------------------------------------------
        //User Denied Permission.... 
        //Redirecting to the Cover Page
?>
        <script type="text/javascript">
             function redirect()
             {
                 window.location = "http://delta.nitt.edu/~schezwan/fblikes/index.php";
             }
             alert("You have denied permissions for the app. Redirecting to Login Page");
             setTimeout(redirect(),1000);
        </script>
<?php
        die() ;
        //_______________________________________________________________________________________________________________________
    }
//    echo "asdf";
   

    
    //___________________________________________________________________________________________________________________________
    //App details
    
    include 'app-details.php';
    
    
    //___________________________________________________________________________________________________________________________
    //getting the current page url for recieving access token
    
    $current_url = 'http://delta.nitt.edu/~schezwan/fblikes/login-process.php';
    
//    if ($_SERVER["SERVER_PORT"] != "80") 
//        {
//            $current_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
//        }
//    else 
//        {
//            $current_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//        }
        
    //__________________________________________________________________________________________________________________________________
    //curling facebook graph api and getting access token
    

    $code= $_GET['code'];
    echo $current_url. "<br> ". $code;
    
    

    $url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$current_url&client_secret=$app_secret&code=$code";
    
    

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $cl=curl_exec($ch);
    $access_token=substr($cl, 13,-16);
    
    //_____________________________________________________________________________________________________________________________
    //getting user data from facebook

    echo $access_token;

    $url="https://graph.facebook.com/v2.1/me?fields=id,name,first_name,last_name,email,picture.height(1000).width(1000)&access_token=$access_token";   
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $cl=curl_exec($ch);
    $fb_data=json_decode($cl);
    
    $fbid=$fb_data->id;
    $name=$fb_data->name;
    $first_name=$fb_data->first_name;
    $last_name=$fb_data->last_name;
    $email=$fb_data->email;
    
    
    echo $file_name;
    
    //______________________________________________________________________________________________________________________________
    //Adding to Database

    //connecting to database
    include 'connect.php';

    //Querying Database to find if registered before.
   
    $query="SELECT * FROM reg_users where fbid ='$fbid' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    

    //Adding to database if no entry is found..
    if (!$result->num_rows)
    {
        
        //Getting profile picture of the user and savig it as fbid.jpg
        $profile_pic_url =$fb_data->picture->data->url;
        $path_parts = pathinfo($profile_pic_url);
        $extension = substr($path_parts['extension'], 0, strpos($path_parts['extension'], '?'));
        $file_name="./images/$fbid.$extension";
        $file = file_get_contents($profile_pic_url);
        file_put_contents($file_name,$file);
        
        //Inserting into db.
        $counter=0;        
        $query ="INSERT INTO reg_users
                    (
                    `fbid`,
                    `display_name`,
                    `first_name`,
                    `last_name`,
                    `email`,
                    `counter`,
                    `profile_pic`
                    )
                    VALUES
                    (
                     '$fbid',
                     '$name',
                     '$first_name',
                     '$last_name',
                     '$email',
                     '$counter', 
                     '$file_name'
                     )";

            $db->query($query) or die ('There was an error Inserting Data into Databases [' . $db->error . ']');
    }
    $db->close();
    
    //_______________________________________________________________________________________________________________________________
    //Storing Data for current session

    session_start();
    $_SESSION['access_token']=$access_token;
    $_SESSION['fbid']=$fbid;

//    echo "<br>".$_SESSION['access_token']." ".$_SESSION['fbid']  ;
   
    //______________________________________________________________________________________________________________________________
    //Redirecting User to dashboard

 header("Location: ./user-dashboard.php");
     
    //______________________________________________________________________________________________________________________________

?>
