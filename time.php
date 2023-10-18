<table cellpadding="10" cellspacing="5" border="3">
<thead>
        <tr>
          <th>Time In</th>
          <th>Time Out</th>
          <th>Total time</th>
     
        </tr>
      </thead>
  <tbody>
<?php
include('db.php');

$sql=mysqli_query($conn,"UPDATE data SET diiffe = TIMEDIFF(timein,timeout)");

$sql = "SELECT timein,timeout, TIMEDIFF(timein,timeout) AS diiffe FROM data;";
$result = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($result, $sql)) {
    echo '<p class="error">SQL Error</p>';
}
else{
  mysqli_stmt_execute($result);
    $resultl = mysqli_stmt_get_result($result);
  if (mysqli_num_rows($resultl) > 0){
      while ($row = mysqli_fetch_assoc($resultl)){
?> 
        <TR>
        <TD><?php echo $row["timein"];?></TD>
        <TD><?php echo $row["timeout"];?></TD>
        <TD><?php echo $row["diiffe"];?></TD>
        
        </TR>
        
<?php

    }
    # code...
  }
}
?>
  </tbody>
</table>


