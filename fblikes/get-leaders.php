<?php

include 'connect.php';
$start=$_GET['start'];
$number=$_GET['number'];

$query= "SELECT * FROM `reg_users` ORDER BY  `counter` DESC";
$result = $db->query($query) or die ('There was an error Getting Data from Databases [' . $db->error . ']');

$leader=1;

//echo $result;

$numberofleaders = $result->num_rows;
$nol=$numberofleaders-$start+1;

if ($nol>$number)
{
    $nol=$number;
}

echo "{";
echo "\"numberofleaders\" : \"$nol\", ";
echo "\"leader\" : [";

while($row=$result->fetch_assoc())
{
    if ($leader>=$start)
    {
        $fbid =$row['fbid'];
        $counter=$row['counter'];
        $profile_pic=$row['profile_pic'];
        $name=$row['display_name'];
        $counter=$row['counter'];
        $query="SELECT * FROM `likes` WHERE `referer_id` = $fbid";
        $result_likers= $db->query($query) or die ('There was error fetching from database');
        
        $likercount=5;
        
        $url = "http://delta.nitt.edu/~schezwan/fblikes/get-likers.php?fbid=$fbid&start=1&number=$likercount";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $cl=curl_exec($ch);
        
//        echo $cl;
//        echo "<br>";
        
        
        echo "{";
            echo "\"fbid\" : \"$fbid\"," ;
            echo "\"name\" : \"$name\",";
            echo "\"profilepic\" : \"$profile_pic\",";
            echo "\"counter\" : \"$counter\"";
            echo",";
            echo "\"likers\" :[";
            echo $cl;
            echo "]";
        echo "}";
    }
    else
    {
        $leader++;
        continue;
    }
    if (!($leader==$start+$number-1)&&($numberofleaders>$leader))
    {
        echo ",";
    }
    else
    {
        break;
    }
    $leader++;
}
echo "]}";
?>