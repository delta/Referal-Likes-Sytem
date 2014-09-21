<?php
    $fbid =$_GET['fbid'];
    $start =$_GET['start'];
    $number =$_GET['number'];
   
    include 'connect.php';
    
    $query="SELECT * FROM `likes` WHERE `referer_id` = '$fbid' AND `liked`='1'";
    $result_likers= $db->query($query) or die ('There was error fetching from database');

    
    $likers=1;

    $numberoflikers=$result_likers->num_rows;

    echo "{";
    echo "\"rows\" : \"$numberoflikers\" ,";
    echo "\"liker\" : [";
    
    while($row=$result_likers->fetch_assoc())
    {
        if ($likers>=$start)
        {
              
            echo  json_encode($row);
//            $fbid_liker=$row['fbid'];
//            $name_liker=$row['name'];
//            $profile_pic_liker=$row['profile_pic'];
//            echo "{";
//            echo "\"fbid\" : '$fbid_liker',";
//            echo "'name' : '$name_liker',";
//            echo "'profile_pic' : '$profile_pic_liker'";
//            echo "}";
//            
        }
        $likers++;
        if (($likers<=$numberoflikers) && ($likers<($start+$number)))
        {
            echo ",";
        }
        else 
        {
            break;
        }
    }
    echo "]}";
?>