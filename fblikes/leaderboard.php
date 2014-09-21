<html>
    <head>
                
        <link rel="stylesheet" href="style1.css"/>
        <link rel="stylesheet" href="leaderboard.css"/>
       <script type="text/javascript" src="login-redirect.js"></script>
        <script type="text/javascript" src="leaderboard.js"></script>
       
    </head>
    <body  onload="getleader()"> 
          
       <div class="nav">
       <ul class="left">
          <li><a href="https://www.facebook.com/delta.nit.trichy"><img src="./images/delta.png"></a> </li>
               <li><a href="leaderboard.php" >Leaderboard</a> </li>
               <li><a href="user-dashboard.php">Dashboard</a> </li>
               <li><a href="updates.php">Updates</a> </li>
<!--
          <li><a href="user-dashboard.php">Dashboard</a> </li> 
          <li><a href="updates.php">Updates</a> </li> 
-->
       </ul>
        <ul class="right">
            <li><a href="index.php">Register</a></li>
            
        </ul>
       </div>
       <div class="content" id ="content">
                <div id="leaderboard" class="leaderboard"></div>
                <div id="leaderboardcontroller" class="leaderboardcontroller">
                        <a href="#" onclick="previous()">Previous</a>
                        <a href="#" onclick="next()">Next</a>
                    
                </div>
      </div>
    </body>
</html>



