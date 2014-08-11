

<?php
require 'fbconfig.php';   // Include fbconfig.php file
require 'dbconfig.php';
$invitingUser=$_REQUEST['inviteId'];
echo $invitingUser;
$result1=mysql_query("SELECT * FROM `Records` WHERE `FbId`='".$invitingUser."' ");

//echo mysql_result($result1, 0);

 while ($row = mysql_fetch_array ($result1)) {
        echo $row['Friends'] . "<br />";
    

    } 
//$arr= mysql_fetch_array($result1);
//echo "gfhgf";
//echo $arr['Friends'];
//$FrndIds=explode(',', $result1['Friends']);

//echo $FrndIds;
/*$testList=['132131313','3434343','456456456','2354123400'];
echo "<div id='contain' style='width:65%;margin-left:27%;margin-top:5%;position:absolute;'>";
        for($i=0;$i<sizeof($FrndIds);$i++)
       {
       echo "<div  style='height:70px;width:70px;border-radius:5%;border-width:1px;border-color:#000;border-style:solid;box-sizing:border-box;float:left;margin-left:20px;margin-top:100px;overflow:hidden'>
       
         <h4> asdasd </h4> 

       </div>";
    
       }
       echo "</div>";


*/



?>









<?php if ($user): ?>      <!--  After user login  -->
<body bgcolor="rgba(34,45,23,0.4)">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript">
var inviteid=document.location.href.split('=')[1].split('&')[0];
           $.ajax({
        url:'functions.php',
        type: 'POST',
   
        data: {'inviteId': inviteid},
        success: function(response){

               console.log("Hello");
               //console.log(inviteid);
               }
          });



          $.ajax({
        url:'index.php',
        type: 'POST',
   
        data: {'inviteId': inviteid},
        success: function(response){

               console.log(response);
               //console.log(inviteid);
               }
          }); 




</script>
  <h1>Hello <?php echo $fbuname; ?></h1> <br>

<h3>Your invite url is: "http://localhost/1353/index.php?inviteId=<?php echo $fbid?>" </h3>

 

<li><img src="https://graph.facebook.com/<?php echo $user; ?>/picture"></li>
<li >Facebook ID</li>
<li><?php echo  $fbid; ?></li>
<li >Facebook Username</li>
<li><?php echo $fbuname; ?></li>
<li >Facebook fullname</li>
<li><?php echo $fbfullname; ?></li>

<div id="fb-root"></div> 
    <div class="box">
    <div class="fb-like-box" data-href="http://www.facebook.com/delta.nit.trichy" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>
      </div>
                
    <div style="clear:both;"></div>

<a href="<?php echo $logoutUrl; ?>">Logout</a>
</ul>


</body>



    <?php else: ?>     <!-- Before login --> 
<body bgcolor="rgba(98,78,123,0.4)">
<h1>Login with Facebook</h1>
           Not Connected

           <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>

           <?php 
              $query="SELECT * FROM  `Records` ";
               $results=mysql_query($query);
              $new_entries= mysql_num_rows($results);
 


          echo "<div id='contain' style='width:65%;margin-left:27%;margin-top:5%;position:absolute;'>";
        while($row = mysql_fetch_array($results))
       {
       echo "<div  style='height:70px;width:70px;border-radius:50%;border-width:1px;border-color:#000;border-style:solid;box-sizing:border-box;float:left;margin-left:20px;margin-top:100px;overflow:hidden'>
       <img src=".$row['fbPicUrl']." height='100%' width='100%' style='margin-top:1px'/>;
 

       </div>";
    
       }
       echo "</div>";

 ?>      

    <?php endif ?>


</body>









<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>LikeDelta</title>




    <style type="text/css">

p {margin: 10px;color:#336699;}
.box {float:left; border:1px solid #222; padding:5px; margin: 5px;}
.info {color:#778999;font-style:italic}
.tableStyle{
  float:right;
  position:absolute;
  right:2%;  

}


</style>


<script>

var count=0;
//var invitee=document.Location.href.split('=')[1];

window.fbAsyncInit = function() {
    FB.init({
        appId: '1388430804743005',
        status: true,
        cookie: true,
        xfbml: true,
        oauth: true
    });
    FB.Event.subscribe('edge.create', function(response) {
        $.ajax({
        url:'functions.php',
        type: 'POST',
   
        data: {'likingUser': "<?php echo $fbid ?>"},
        success: function(response){

               console.log('liked');
               }
          });      




    });


FB.Event.subscribe('edge.remove', function(response){
    
        $.ajax({
        url:'functions.php',
        type: 'POST',
   
        data: {'dislikingUser': "<?php echo $fbid ?>"},
        success: function(response){

               console.log('disliked');
               }
          });      





});





};

(function(d) {
    var js, id = 'facebook-jssdk';
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    d.getElementsByTagName('head')[0].appendChild(js);
}(document));


</script>





 </head>
  <body>
        <h1 ><h1>LikeDelta</h1></h1> <br>
        





  
  </body>
</html>

