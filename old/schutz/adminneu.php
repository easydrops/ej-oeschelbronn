<script language="JavaScript" type="text/javascript">
<!--
function fensterauf(seite,fenstername,eigenschaft){
window.open(seite,fenstername,eigenschaft);
}
//-->
</script> 
<?php 
    include("../dblink.php");
?>
      <div class="titel">
      <div id="blackbox">
      <!--<img src="/slide/startpic.png" alt="Willkommen!">-->
      </div>
      
      <?php $user = $_SERVER['REMOTE_USER'];?>
  
      <div id="adminbildbeschriftung">
   
      <span id="veranstalter"><?php echo 'Hallo lieber '.$user.'-Mitarbeiter!';?></span>
      </div>

        
     </div> <!-- Ende div class=slide -->
     
     <div id="contentblock">
 
     <p id="titel1">Neue Termin-Einträge</p>  
     <div id="trennungtitel1"></div> 
 
<?php if ($user != 'Adminfried') {?>    
     <div class="blockleft">

     Einen neuen Termin eintragen.<br /> <br />
<?php


switch ($user) {

case ('Admin'):
  $us = 'ad';
  $radio = '<input type="radio" name="term_veranstalter" value="jk">Jugendkreis
  <input type="radio" name="term_veranstalter" value="tk">Teenkreis
  <input type="radio" name="term_veranstalter" value="otto">OTTO
  <input type="radio" name="term_veranstalter" value="up">Upstairs<br />
  <input type="radio" name="term_veranstalter" value="h2h">H2H
  <label>&nbsp;</label>
  <input type="radio" name="term_veranstalter" value="ch">Jugendchor
  <input type="radio" name="term_veranstalter" value="cia">C.I.A.
  <input type="radio" name="term_veranstalter" value="s">Sonstige <br />';
  $sel_begstd = 19;
  $sel_begmin = 00;
  $sel_endstd = 21;
  $sel_endmin = 00;
  
  break;
case ('Jugendchor'):
  $us = 'ch';
  $radio = '<input type="radio" name="term_veranstalter" value="ch" checked>Jugendchor<br />';
  $sel_begstd = 18;
  $sel_begmin = 00;
  $sel_endstd = 19;
  $sel_endmin = 30;
  break;
case ('CIA'):
  $us = 'cia';
  $radio = '<input type="radio" name="term_veranstalter" value="cia" checked>C.I.A.<br />';
  $sel_begstd = 15;
  $sel_begmin = 00;
  $sel_endstd = 17;
  $sel_endmin = 00;
  break;
case ('H2H'):
  $us = 'h2h';
  $radio = '<input type="radio" name="term_veranstalter" value="h2h" checked>H2H - Jugo<br />';
  $sel_begstd = 18;
  $sel_begmin = 00;
  $sel_endstd = 19;
  $sel_endmin = 30;
  break;
case ('Jugendkreis'):
  $us = 'jk';
  $radio = '<input type="radio" name="term_veranstalter" value="jk" checked>Teen-/ Jugendkreis<br />
  <input type="radio" name="term_veranstalter" value="tk" checked>Teenkreis<br />
  <input type="radio" name="term_veranstalter" value="otto" checked>OTTO<br />';
  $sel_begstd = 19;
  $sel_begmin = 00;
  $sel_endstd = 21;
  $sel_endmin = 00;
  break;
case ('Upstairs'):
  $us = 'up';
  $radio = '<input type="radio" name="term_veranstalter" value="up" checked>Upstairs<br />';
  $sel_begstd = 19;
  $sel_begmin = 30;
  $sel_endstd = 23;
  $sel_endmin = 00;
break;
default:
  $us = '';
break;
}
?>
  <form method="post" action="schutz/adminold.php" onsubmit="return formhandler(this)"" enctype="multipart/form-data">
  <label>Veranstalter:</label><br />
  <?php echo $radio;?>
  <label>Datum:</label>
  <select name='datum_tag'>       
 
  
  <?php
  $date_d = date("d");
  $date_m = date("m");

  for ($i = 1; $i<=31; $i++){
        echo '<option value='.$i.' ';
        if ($i == $date_d){
            echo "selected";
        }
        echo '>'.$i.'</option>';
  }
  echo "</select>.";
  ?>


  <select name='datum_monat'>
 
  <?php

  for ($i = 1; $i<=12; $i++){
        echo '<option value='.$i.' ';
        if ($i == $date_m){
            echo "selected";
        }
        echo '>'.$i.'</option>';
  }
  echo "</select>.";

  
  ?>
   <select name='datum_jahr'>
   <?php  $year1 = date("Y"); $year2 = date("Y")+1;
    echo '<option value='.$year1.' selected>'.$year1.'</option>';
    echo '<option value='.$year2.'>'.$year2.'</option>';
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
  ?>
  

	<label>Thema:</label> <input type="text" style="width:17.65em" name="term_thema"><br />
	<label>Infos:</label> <input type="text" style="width:17.65em" name="term_infos"><br />
  <!--<label>Bild:</label> <input type="file" name="upbild" id="upbild"><i>(max. 1 MB, sonst wird es nicht hochgeladen)</i> <br />-->
	<input name="buttontermine" type="submit" value="Eintragen">
	</form> 
     
     </div> <!-- Ende Block 2 -->  
 <?php }?>
     
 <?php if ($user == 'Admin') {?> 
    
     <p id="titel2">Neue News-Einträge</p>  
     <div id="trennungtitel2"></div> 
     
     <div class="blockright">
     
 <?php
  
 
 $dateheute = date('Y-m-d\TH:i:s\Z');
 $dateausgabe = date('d.m.Y, H:i');
 $dateirgendwas = date('2014-12-10 13:00:00');
 
 /*if ($dateheute < $dateirgendwas) $datebla = 'heute < iwas';
 else if ($dateheute > $dateirgendwas) $datebla = 'heute > iwas';
 else $datebla = 'heute = iwas';*/  
 
 echo '<form method="post" action="/schutz/adminold.php" onsubmit="return formhandler(this)">';
 echo '<input type="hidden" value="';
 echo $dateheute;
 echo '" style="width:17.65em" name="news_date"><br />
 <label>Datum: '.$dateausgabe.' Uhr</label><br/>
<label>Titel:</label> <input type="text" style="width:17.65em" name="news_titel"><br />
	<label>Text:</label> <input type="text" style="width:17.65em" name="news_inhalt"><br />';
 /* <input type="hidden" name="ueberpruefung" value="1">*/
 echo '<input type="submit" name="buttonnews" value="Eintragen">
	</form>';
  
   echo '<form method="post" action="/schutz/adminold.php" onsubmit="return formhandler(this)">';
 echo '<input type="hidden" value="';
 echo $dateheute;
 echo '" style="width:17.65em" name="news_date"><br />
 <label>WG-Infos eintragen:</label><br />
<label>Titel:</label> <input type="text" style="width:17.65em" name="news_titel"><br />
	<label>Text:</label> <input type="text" style="width:17.65em" name="news_inhalt"><br />';
 /* <input type="hidden" name="ueberpruefung" value="1">*/
 echo '<input type="submit" name="buttonnews2" value="Eintragen">
	</form>';
  
  ?>
    
     </div> <!-- Ende Block 1 -->
  <?php }?>  

     
    <!-- <p id="newstitel2">Terminliste</p>  
     <div id="trennungnews"></div> 
     
     <div class="lief">

     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     
     
     <div id="galtrennung"></div> 
     
     <img src="mehranzeigen.svg"> <img src="zurgalerie.svg">

     </div> <!-- Ende des div class = lief 
     
     <p id="matitel">Mitarbeiter</p>
     
     <div id="trennungkommt"></div>
     <div class="ma">
     
     </div> <!-- Ende div class "ma" 
     
     </div> <!-- Ende des News/Termine-Fensters: div id="newszentriert"
    -->
<?php if ($user != 'Adminfried') {?>
    <p id="titel3">Termine bearbeiten</p>  
     <div id="trennungtitel3"></div> 
     
    <div class="blockbottom">
     <?php 
        
      $dblink = verbinden();
  
      if (!$dblink) {
          die("Keine Verbindung möglich: " . mysqli_connect_error());  
      }
      
  
      mysqli_query($dblink, "SET NAMES 'utf8'");
      
      
      
      $sql = "SELECT * FROM table_termine1 WHERE ((col_datum >= CURDATE()) OR (col_datum < CURDATE() AND col_datum >= CURDATE()-1))";
      
      if ($us == 'jk'|| $us == 'otto' || $us == 'tk')
        $sql .= " AND (col_veranstalter IN ('jk', 'tk', 'otto'))";
      else if ($us != 'ad')
        $sql .= " AND (col_veranstalter IN ('".$us."'))";
                
      $sql .= " ORDER BY col_datum ASC";
      //echo $sql;
       $result = mysqli_query($dblink, $sql);
          
    if ($result) {
    
         $ver = array (
            'jk'=>"Jugendkreis",
            'tk'=>"Teenkreis",
            'otto'=>"OTTO-Abend",
            'up'=>"Upstairs",
            'h2h'=>"JuGo h2h",
            'ch'=>"Jugendchor",
            'cia'=>"CIA",
            's'=>"Event"
          );
          
            $wochentage_kurz = array (
        0=>"So",
        1=>"Mo",
        2=>"Di",
        3=>"Mi",
        4=>"Do",
        5=>"Fr",
        6=>"Sa");
        
        echo "<table>"; 
            echo "<tr>";
            echo "<th>Datum</th><th>Uhrzeit</th><th>Veranstalter</th><th>Thema</th><th>Beschreibung</th><th></th>";
            echo "</tr>";
            
            $a= 5;
        while ($row = mysqli_fetch_object($result))
        { 
           $date = date_create($row->col_datum);
           $akt_id = $row->col_id;
           echo "<tr>";
           echo "<td>";
           echo $wochentage_kurz[date_format($date, 'w')];
           //echo ", ".date_format($date,'d.m. \'y')."</td>";
           echo ", ".date_format($date,'d.m.')."</td>";
           echo "<td>".date_format($date, 'H:i')." Uhr</td>";
           echo "<td>";
           echo $ver[$row->col_veranstalter];
           echo "</td>";
           echo "<td>".$row->col_thema."</td>";
           echo "<td>".substr($row->col_beschreibung,0,20)."...</td>";
           echo "<td>";
           echo '<form method="post" action="schutz/adminold.php"><input type="button" value="Bearbeiten" name="bearbeiten" onClick="fensterauf(\'../bearbeiten.php?id='.$akt_id.'\',\'bearbeiten\',\'width=450,height=170\')">';
           echo '<input type="hidden" value="'.$akt_id.'" name="id">';
           echo '<input type="submit" value="Löschen" name="buttonloeschen"></form></td>';
           echo "</tr>";    
        }
        
        echo "</table>";
    }
    else echo "Keine Termine vorhanden.";    
   
      mysqli_close($dblink);
     ?>
    </div>
  <?php }?>
  
        <!-- 282px Ende; Abstand 118px-->
    <!--<div id="bottom" style="margin-top:405px;">
      <?php// include ('../bottom.php');?>
    </div>   -->