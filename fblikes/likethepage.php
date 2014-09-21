<?php
    
    //______________________________________________________________________________________________________________________________________
    //Getting Referall ID
    
    include 'session-check.php';    
?>
<html>
<head>
    <link rel="stylesheet" href="style1.css">
    <style type="text/css">
/*
        .result
            {
                border: 1px solid;
                height: 20px;
                width :100%;
                border: 1px solid;
                font-family:serif;
                font-size:13px;
            }
*/
        .likebox
            {
                float:left;
                position:relative;
                border: 1px solid ;
                border-radius: 15px;
                width:300px;
                top:23%;
                left:20%;

            }
        .referer
            {
                
                float:left;
                position:relative;
                border: 1px solid ;
                border-radius: 15px;
                width:300px;
                top:23%;
                left:35%;
                height:300px;
            }
        .referer img
        {
            position:relative;
            top:15%;
            display:block;
            vertical-align:middle;
            margin:auto;
            height:120px;
            width:120px;
            border-radius:60px;
            
            
        }
        .referer div
        {
            position:relative;
            top:15%;
            margin:auto;
            text-align:center;
            
        }
        
        
        
    </style>
    <script>
        //______________________________________________________________________________________________________________
        //Facebook Javascript SDK 
        //copied from facebook site
        (function(d, s, id){
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=694159134003863&version=v2.0";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));

        //______________________________________________________________________________________________________________
        //Sending Ajax Request when like button is clicked


        function clicked(a)
        {
            var xmlhttp = new XMLHttpRequest();
            if (a=='1')
            {
                    xmlhttp.open("GET","http://delta.nitt.edu/~schezwan/fblikes/likesdbconnect.php?liked=1",true);
            }
            else
            {
                    xmlhttp.open("GET","http://delta.nitt.edu/~schezwan/fblikes/likesdbconnect.php?liked=0",true);
            }
            xmlhttp.send();
            xmlhttp.onreadystatechange=function()
                {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) 
                    {
                        var result = JSON.parse(xmlhttp.responseText);
                        if ( result.redirect==1)
                        {   
                            alert('You Have Not Logged In');
                            window.location="http://delta.nitt.edu/~schezwan/fblikes/likes.php?fbid=<? echo $_SESSION['fbid'];?>";
                        }
                        document.getElementById('result').innerHTML += result.data;

                    }
                }

        }

        //______________________________________________________________________________________________________________
        //Adding Evemt Listener to Like button
        var page_like= function() {

            clicked('1');
        }
        var page_unlike= function() {

            clicked('0');
        }

        // In your onload handler
        var liked = function(){

        FB.Event.subscribe('edge.create', page_like);
        FB.Event.subscribe('edge.remove', page_unlike);
        }


    </script>
            
        </head>
        <body onload=liked(); id="body">
            
            
       <div class="nav">
            <ul class="left">
               <li><a href="https://www.facebook.com/delta.nit.trichy"><img src="./images/delta.png"></a> </li>
               <li><a href="leaderboard.php">Leaderboard</a> </li>

            </ul>
            <ul class="right">
                <li><a href="logout.php">Logout</a></li>

            </ul>
       </div>
            <div class="content">
<!--                    <div class = "result" id="result"></div>-->
                    <div id="likebox" class="likebox">
                        <div class="fb-like-box" data-href="https://www.facebook.com/delta.nit.trichy" data-width="300" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    </div>
            
                    <div id="referer" class="referer">
                    <?php
                        include 'connect.php';

                        $query="SELECT * FROM reg_users where fbid ='$fbid' ";
                        $result = $db->query($query) or die ('There was an error during Database Retrieval [' . $db->error . ']');

                        $row=$result->fetch_assoc();
                        
                        $profilepic=$row['profile_pic'];
                        $name =$row['display_name'];
                        $likes=$row['counter'];
                        

                        echo "<img src=\"$profilepic\"><br>";   
                        echo "<div class=\"referer_details\">";
                        echo "$name<br>";
                        echo "Refferd $likes likes";
                        echo "</div>";
                        
                    ?>
                    </div>
        
            </div>

        </body>
</html>