
<?php

include "polaczenie.php"; 
$ID = $_GET['id']; 

$delete = mysqli_query($polaczenie,"DELETE FROM bookcollection WHERE ID = '$ID'");

if($delete)
{
    mysqli_close($polaczenie); 
    header("location:/dodaj.php");
    exit;	
}
else
{
    echo "błąd przy usuwaniu";

}


?> 