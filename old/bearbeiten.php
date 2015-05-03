

<?php
     include("dblink.php");
?>

<?php    
     $dblink = verbinden();
  
      if (!$dblink) {
          die("Keine Verbindung möglich: " . mysqli_connect_error());  
      }
      
  
      mysqli_query($dblink, "SET NAMES 'utf8'");
      
      $sql = "SELECT * FROM table_termine1 WHERE col_id = ".$_GET['id']."";
      //echo $sql;
       $result = mysqli_query($dblink, $sql);
          
    if ($result) {
        
         while ($row = mysqli_fetch_object($result))
        { 
          $date = date_create($row->col_datum);
          $sel_begstd = date_format($date, 'H');
          $sel_begmin = date_format($date, 'i');
          $date_d = date_format($date, 'd');
          $date_m = date_format($date, 'm');
          $date_y = date_format($date, 'Y');
          $thema = $row->col_thema;
          $info = $row->col_beschreibung;
        }
        
    }
    else echo "Termin nicht vorhanden."; 
    
   mysqli_close($dblink);
  
?>

  <form method="post" action="schutz/adminold.php" onsubmit="return formhandler(this)"" enctype="multipart/form-data">
  <label>Datum:</label>
  <select name='datum_tag'>       
 
  
  <?php
  
  
  // Zeiten übernehmen, die eingetragen wurden
  //$sel_begstd = 19;
 // $sel_begmin = 00;
 // $sel_endstd = 21;
  //$sel_endmin = 00;

  for ($i = 1; $i<=31; $i++){
        $ii = $i;
        if ($i<10) $ii="0".$i;         
        echo '<option value='.$ii.' ';
        if ($i == $date_d){
            echo "selected";
        }
        echo '>'.$ii.'</option>';
  }
  echo "</select>.";
  ?>


  <select name='datum_monat'>
 
  <?php

  for ($i = 1; $i<=12; $i++){
        $ii = $i;
        if ($i<10) $ii="0".$i;
        echo '<option value='.$ii.' ';
        if ($i == $date_m){
            echo "selected";
        }
        echo '>'.$ii.'</option>';
  }
  echo "</select>.";

  
  ?>
   <select name='datum_jahr'>
   <?php  
   $year1 = $date_y-1; $year2 = $date_y +1;
   if ($year1==date('Y')) echo '<option value='.$year1.'>'.$year1.'</option>';
    echo '<option value='.$date_y.' selected>'.$date_y.'</option>';
    if ($year2==date('Y')+1) echo '<option value='.$year2.'>'.$year2.'</option>';
    
    echo "</select>";
  ?>
   <br /> 
  <label>Zeit:</label> <select name='beginn_stunde'>       
 
  <?php
   
  for ($i = 0; $i<=23; $i++){
        $i = substr($i+100,-2,2);
        echo '<option value='.$i.' ';
        if ($i == $sel_begstd){
            echo "selected";
        }
        echo '>'.$i.'</option>';
  }
  echo "</select>:";
  ?>
  <select name='beginn_minute'>       
 
  <?php

  for ($i = 0; $i<=55; $i=$i+5){
        $i = substr($i+100,-2,2);
        echo '<option value='.$i.' ';
        if ($i == $sel_begmin){
            echo "selected";
        }
        echo '>'.$i.'</option>';
  }
  echo "</select><br />";
  
  echo '<label>Thema:</label> <input type="text" style="width:17.65em" name="term_thema" value= "'.$thema.'"><br />';
  echo '<label>Infos:</label> <input type="text" style="width:17.65em" name="term_infos" value= "'.$info.'"><br />';
  echo '<input type="hidden" value="'.$_GET['id'].'" name="id">';
  echo '<input name="buttonterminchange" type="submit" value="Eintragen" onclick="self.close()">';
	echo '</form>';
  ?>
