<?php
    include("../dblink.php");
  //Verbindung zur Datenbank

  $dblink = verbinden();
  
  if (!$dblink) {
    die("Keine Verbindung möglich: " . mysqli_connect_error());  
  }
  // "Eintragen" wurde gedrückt 
  
   mysqli_query($dblink, "SET NAMES 'utf8'");
  

  if(isset($_POST['buttonnews']))
  { 
    echo "Gedrückt.";
    //$page=1;
    $sql = "INSERT INTO table_news VALUES (
          'NULL',
          '".$_POST['news_date']."',
          '".$_POST['news_titel']."', 
          '".$_POST['news_inhalt']."')";
    $result = mysqli_query($dblink, $sql);
          
    if ($result) { echo "jippi";}
    else {echo "nix wars" . $sql . "<br>" . mysqli_error($dblink);} 
  }
  else if(isset($_POST['buttonnews2']))
  { 
    echo "Gedrückt.";
    //$page=1;
    $sql = "INSERT INTO table_news_wg VALUES (
          'NULL',
          '".$_POST['news_date']."',
          '".$_POST['news_titel']."', 
          '".$_POST['news_inhalt']."')";
    $result = mysqli_query($dblink, $sql);
          
    if ($result) { echo "jippi";}
    else {echo "nix wars" . $sql . "<br>" . mysqli_error($dblink);} 
  }  
  else if (isset($_POST['buttontermine']))
  {
        $t_eintrag = $_POST['datum_tag'];
        $m_eintrag = $_POST['datum_monat'];
        $j_eintrag = $_POST['datum_jahr'];
        $s_eintrag = $_POST['beginn_stunde'];
        $mi_eintrag = $_POST['beginn_minute'];
        $time_eintrag = mktime($s_eintrag,$mi_eintrag,0,$m_eintrag,$t_eintrag,$j_eintrag);
        $datum_eintrag = $j_eintrag."-".$m_eintrag."-".$t_eintrag." ".$s_eintrag.":".$mi_eintrag;
        $woche_eintrag = date('W', $time_eintrag);
        
        $sql = "INSERT INTO table_termine1 VALUES (
          'NULL', 
          '".$datum_eintrag."',
          '".$_POST['term_veranstalter']."',
          '".$_POST['term_thema']."',
          '".$_POST['term_infos']."',
          '".$woche_eintrag."')";
    $result = mysqli_query($dblink, $sql);
          
    if ($result) { echo "jippi";}
    else {echo "nix wars" . $sql . "<br>" . mysqli_error($dblink);}
    header('Location: ../');
    
    //echo $sql; 
  }
  else if (isset($_POST['buttonterminchange']))
  {
      $t_eintrag = $_POST['datum_tag'];
        $m_eintrag = $_POST['datum_monat'];
        $j_eintrag = $_POST['datum_jahr'];
        $s_eintrag = $_POST['beginn_stunde'];
        $mi_eintrag = $_POST['beginn_minute'];
        $time_eintrag = mktime($s_eintrag,$mi_eintrag,0,$m_eintrag,$t_eintrag,$j_eintrag);
        $datum_eintrag = $j_eintrag."-".$m_eintrag."-".$t_eintrag." ".$s_eintrag.":".$mi_eintrag;
        $woche_eintrag = date('W', $time_eintrag);
        
        $sql = "UPDATE table_termine1 SET 
          col_datum = '".$datum_eintrag."',
          col_thema = '".$_POST['term_thema']."',
          col_beschreibung = '".$_POST['term_infos']."'
           WHERE col_id = '".$_POST['id']."'";
          
    $result = mysqli_query($dblink, $sql);
          
    if ($result) { echo "Eintrag erfolgreich bearbeiten. Das Fenster schließt automatisch.";}
    else {echo "nix wars" . $sql . "<br>" . mysqli_error($dblink);}
    //header('Location: ../');
    window.close();
    //echo $sql; 
  }
  else if (isset($_POST['buttonloeschen']))
  {
     
        $sql = "DELETE FROM table_termine1 WHERE col_id = '".$_POST['id']."'";
          
    $result = mysqli_query($dblink, $sql);
          
    if ($result) { echo "Eintrag gelöscht.";}
    else {echo "nix wars" . $sql . "<br>" . mysqli_error($dblink);}
    header('Location: ../');  
    //echo $sql; 
  }
  else 
      {
      echo "<br>Nix gedrückt.<br>"; // $page=0
      }
  
  
  
  
  mysqli_close($dblink);
  
?>