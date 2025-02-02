<?php

include "./model/db.php";

$output="";

if(isset($_POST['search'])){
    $searchq = $_POST['s'];

    if(empty($searchq)){
        echo "No search result found <br> <br>";
    }

    else{

   // $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

    $query = mysqli_query($conn,"SELECT * FROM events WHERE Event_Name LIKE '%$searchq%'") or die("Could not search");
    $count = mysqli_num_rows($query);

    if($count == 0){
        $output = "No search result found <br> <br>";
    }
    else{
        while($row = mysqli_fetch_array($query)){
            $ei = $row['Event_Id'];
            $en = $row['Event_Name'];
            $ed = $row['Event_Date'];
        }
    }


      if($count == 0){
                
        }
            else{
            $output.="<h3 class='mt-3'> Event Name: ".$en."<h3>"."<h3 class='mt-3 '>Event Date: ". $ed. "</h3>"; 
            }
            print("$output"); 
    
    }

}


?>