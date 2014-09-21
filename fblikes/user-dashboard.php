
<html>
    <head>
        
        <link rel="stylesheet" href="style1.css"/>
        <link rel="stylesheet" href="leaderboard.css"/>
        
        <script type="text/javascript" src="user-dashboard.js"></script>
        <script type="text/javascript" src="login-redirect.js"></script>
        <script type="text/javascript" src="leaderboard.js"></script>

    </head>
    <body id='body'> 
        <?php

        include 'session-check.php';
        require 'connect.php';
        
        $query="SELECT * FROM reg_users where fbid ='$fbid' ";
        $result = $db->query($query) or die ('There was an error during database access [' . $db->error . ']');

        if ($result->num_rows>1)
        {
            ?>
                <script type="text/javascript">
                        alert("Database Error");
                        setTimeout(redirect(), 1000);
                </script>
            <?php
        }
        $data=$result->fetch_assoc();

        ?>
    
       <div class="nav">
            <ul class="left">
               <li><a href="https://www.facebook.com/delta.nit.trichy"><img src="./images/delta.png"></a> </li>
               <li><a href="#" onclick="showleaderboard()">Leaderboard</a> </li>
               <li><a href="#" onclick="showdashboard()">Dashboard</a> </li>
               <li><a href="updates.php">Updates</a> </li>

            </ul>
            <ul class="right">
                <li><a href="logout.php">Logout</a></li>

            </ul>
       </div>
        
       <div class="content">
            <div class="dashboard" id="dashboardcontainer">
                <?php echo "Hello " . $data['display_name']; ?>
                <br><br>
                <img class="profile_pic" src='<?php echo $data['profile_pic']?>' >        
                <br>
                <p id="refferal_link"> Your Referal Link is <a href = "http://delta.nitt.edu/~schezwan/fblikes/likes.php?fbid=<?php echo $fbid ?>"> http://delta.nitt.edu/~schezwan/fblikes/likes.php?fbid=<?php echo $fbid ?></a></p>
                <p id="likes"> You Refered <?php echo $data['counter']; ?> friends to like our page</p>
            </div>
           
           <div class="leaderboardcontainer" id="leaderboardcontainer">
                <div id="leaderboard" class="leaderboard"></div>
                <div id="leaderboardcontroller" class="leaderboardcontroller">
                        <a href="#" onclick="previous()">Previous</a>
                        <a href="#" onclick="next()">Next</a>
                    
                </div>
           </div>
           
        </div>

   
    </body>

</html>



