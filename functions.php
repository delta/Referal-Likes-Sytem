<?php
require 'dbconfig.php';
$invitee=$_POST['inviteId'];

     
if(isset($_POST['likingUser']) && !empty($_POST['likingUser'])){
   $likingUser=$_POST[likingUser];

mysql_query("UPDATE `Records` SET Likes = Likes + 1 WHERE `FbId`='".$invitee."' ");
//$frnd=mysql_query("SELECT `Id` FROM `Records` WHERE `FbId`='".$likingUser."' ");
mysql_query("INSERT INTO `Records` (Friends) VALUES('$likingUser'.',') WHERE `FbId`='".$invitee."' ");



}


if(isset($_POST['dislikingUser']) && !empty($_POST['dislikingUser'])){
   $dislikingUser=$_POST[dislikingUser];

mysql_query("UPDATE `Records` SET Likes = Likes - 1 WHERE `FbId`='".$dislikingUser."' ");
$frndList=mysql_query("SELECT `Friends` FROM `Records` WHERE `FbId`='".$invitee."' ");
$arr=explode(',', $frndList);

mysql_query("DELETE FROM");



}




function checkuser($fuid,$fbuname,$fbfullname){
    			$check = mysql_query("select * from Records where FbId='$fuid'");
			$check = mysql_num_rows($check);
			if (empty($check)) { // if new user . Insert a new record		
				$picUrl="https://graph.facebook.com/".$fuid."/picture";
			$query = "INSERT INTO Records (FbId,fbUsername,fbPicUrl) VALUES ('$fuid','$fbfullname','$picUrl')";
			mysql_query($query);	
			} else {   // If Returned user . update the user record		
			$query = "UPDATE Records SET FbUsername='$fnfullname',fbPicUrl='$picUrl' where Fuid='$fuid'";
			mysql_query($query);
			} 

                      


}






?>
