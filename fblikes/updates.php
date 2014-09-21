
<html>
    <head>
        
                <link rel="stylesheet" href="style1.css"/>
                <link rel="stylesheet" href="updates.css"/>
        
        <script type="text/javascript" src="user-dashboard.js"></script>
        <script type="text/javascript" src="login-redirect.js"></script>
        <script type="text/javascript">

            function center()
            {
                var likers =document.getElementById('likers');
                var y=likers.offsetHeight;
                likers.style.top=0.5*(window.innerHeight) - y/2 -45;
            }
            
        </script>
    </head>
    <body id='body' onload="center()"> 
        <div class="nav">
            <ul class="left">
               <li><a href="https://www.facebook.com/delta.nit.trichy"><img src="./images/delta.png"></a> </li>
               <li><a href="leaderboard.php" onclick="showleaderboard()">Leaderboard</a> </li>
               <li><a href="user-dashboard.php">Dashboard</a> </li>
               <li><a href="updates.php">Updates</a> </li>

            </ul>
            <ul class="right">
                <li><a href="logout.php">Logout</a></li>

            </ul>
       </div>
        
        <div class="content">
            <div class="likers" id="likers" >
            <?php
                include 'session-check.php';
                require 'connect.php';

                $query="SELECT * FROM `likes` where `referer_id` ='$fbid' AND `liked`=1 ";
                $result = $db->query($query) or die ('There was an error during database access [' . $db->error . ']');


                if ($result->num_rows==0)
                {
                    echo "<div class= \"noupdates\">No Updates to show</div>";
                    die();
                }
                
                echo "Friends Refered to Like By You:<br>";

                while($row=$result->fetch_assoc())
                {
                    $profilepic=$row['profile_pic'];
                    $url="http://facebook.com/".$row['invitees_id'];
                   
                   
                        echo "<a href=\"$url\"><img class=\"liker\" src=\"$profilepic\"></a>";
                        
                    
                }
                
            

            ?>
            </div>
           
       </div>
    </body>
</html>



