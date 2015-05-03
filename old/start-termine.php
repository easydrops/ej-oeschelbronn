<script>

function termininfo(wechsel,ver,titel,tag,monat,zeit,info) {

  if (wechsel == 1) {
  document.getElementById("alles").style.display = "none";
  document.getElementById("einzelinfo").style.display = "block";
  
  
  document.getElementById("kdatum").innerHTML = tag + " " + monat;
  document.getElementById("kzeit").innerHTML = " " + zeit + " Uhr";
  document.getElementById("kver").innerHTML = ver + ": ''" + titel + "''";
  document.getElementById("kinfo").innerHTML = info;
  }
  else {
  document.getElementById("alles").style.display = "block";
  document.getElementById("einzelinfo").style.display = "none";
  }
  
  
  //}
  
  return false;

}       

</script>

<div class="termine">
<div id="alles">
<?php

      $monate = array (
            '01'=>"Januar",
            '02'=>"Februar",
            '03'=>"März",
            '04'=>"April",
            '05'=>"Mai",
            '06'=>"Juni",
            '07'=>"Juli",
            '08'=>"August",
            '09'=>"September",
            10=>"Oktober",
            11=>"November",
            12=>"Dezember");

      


  $aktjahr = date('Y');
  $aktmonat = date ('m');
  $aktmonatv = $aktmonat-1;
  $akttag = ('d'); 
  
   /*$sql = "SELECT * FROM  table_termine1 
  WHERE (col_datum >= CURDATE() OR col_datum LIKE '%-".$aktmonat."-%' OR col_datum LIKE '%-".$aktmonatv."-%')
  ORDER BY col_datum ASC";*/
  
  /*$sql = "SELECT * FROM  table_termine1 
  WHERE (col_datum >= CURDATE()) OR (col_datum < CURDATE() AND col_datum >= CURDATE()-1)";
  
  
  $result = mysqli_query($dblink, $sql);
  
  if ($result) {
    $counterjk=0;
    $countertk=0;
    $counterotto=0;
    $counterup=0;
    $counterh2h=0;
    $counterch=0;
    $countercia=0;
    $counters=0;
    
    
     while ($row = mysqli_fetch_object($result))
      {
      
        
         $date = date_create($row->col_datum);
         $dateentry = date_format($date, 'Y-m-d');
         $datetimeentry = date_format($date, 'Y-m-d H:i');
         $dateheute = date('Y-m-d');
         $datetimeheute = date('Y-m-d H:i');
         
         $ver_k = $row->col_veranstalter;
         
         if ($datetimeentry >= $datetimeheute) {${"counter".$ver_k}++;}
        }
  } 
  */ 
  
  /*$sql = "SELECT * FROM  table_termine1 
  WHERE (col_datum >= CURDATE() OR col_datum LIKE '%-".$aktmonat."-%' OR col_datum LIKE '%-".$aktmonatv."-%')
  ORDER BY col_datum DESC";*/
    $sql = "SELECT * FROM  table_termine1 
  WHERE (col_datum >= CURDATE()) OR (col_datum < CURDATE() AND col_datum >= CURDATE()-1)
  ORDER BY col_datum ASC";
  
  $result = mysqli_query($dblink, $sql);
          
    if ($result) {
    $count = 1;
    $counterjk=0;
    $countertk=0;
    $counterotto=0;
    $counterup=0;
    $counterh2h=0;
    $counterch=0;
    $countercia=0;
    $counters=0;
    
    while ($row = mysqli_fetch_object($result))
      {
         $date = date_create($row->col_datum);
         $dateentry = date_format($date, 'Y-m-d');
         $datetimeentry = date_format($date, 'Y-m-d H:i');
         $dateheute = date('Y-m-d');
         $datetimeheute = date('Y-m-d H:i');
         
         $ver_k = $row->col_veranstalter;
         
         if ($datetimeentry >= $datetimeheute) {
          
            ${"counter".$ver_k}++;
            /*
            if ($ver_k == ('otto')) 
                {
                    $counterjk++;
                    $countertk++;   
                }
                */
            /*
            if ($ver_k == ('jk' || 'tk'))
                {
                    if (${"counter".$ver_k}<2)
                    $counterotto++;
                }
            */
        };
                                                
         
         switch($ver_k){
          case 'jk': $ver='Jugendkreis'; break;
          case 'tk': $ver='Teenkreis'; break;
          case 'otto': $ver='OTTO-Abend';break;
          case 'up': $ver='Upstairs'; break;
          case 'h2h': $ver='JuGo h2h'; break;
          case 'ch': $ver='Jugendchor'; break;
          case 'cia': $ver='CIA'; break;
          case 's': $ver='Event'; break; 
          default: $ver='<br/>'; break;
         }
         
         
        $ktag = date_format($date, 'd');
        $xmonat = date_format($date, 'm');
        $kmonat = $monate[$xmonat];
        $kzeit = date_format($date, 'H:i');
        $ktitel = $row->col_thema; 
        $kinfo = $row->col_beschreibung;
        
if (${"counter".$ver_k} < 2)     
{       echo '<div id="textblock">';
        if ($count == 1) echo '<p id="titeleins">'.$ver;
        else echo '<p id="titel">'.$ver;
        $count = 0;
        echo '<div id="titeltrennung"></div>
          <p id="inhalt">'.$row->col_thema.' [';
        
        echo "<a href=\"\" onclick=\"return termininfo(
    1,
    '".$ver."', 
    '".$ktitel."',
    '".$ktag."',
    '".$kmonat."', 
    '".$kzeit."', 
    '".$kinfo."')\">INFOS</a>]</p>";    
              
        echo '</div>';

        
        if ($datetimeentry < $datetimeheute) {
          echo '<div id="datumblock">
          <p id="tagalt">'.date_format($date, 'd').'</p>
          <p id="monatalt">'.$kurz_monate[date_format($date, 'm')].'</p>
          <p id="zeitalt">'.date_format($date, 'H:i').' Uhr</p>
         </div>';
         }
        else if ($dateentry > $dateheute) {
          echo '<div id="datumblock">
          <p id="tagzukunft">'.date_format($date, 'd').'</p>
          <p id="monatzukunft">'.$kurz_monate[date_format($date, 'm')].'</p>
          <p id="zeitzukunft">'.date_format($date, 'H:i').' Uhr</p>
         </div>';
         }
        else {
          echo '<div id="datumblock">
          <p id="tagheute">'.date_format($date, 'd').'</p>
          <p id="monatheute">'.$kurz_monate[date_format($date, 'm')].'</p>
          <p id="zeitheute">'.date_format($date, 'H:i').' Uhr</p>
         </div>';
         }
}      
          
      }
    }
    
    else {echo "kein Eintrag " . $sql . "<br>" . mysqli_error($dblink);}
    
    mysqli_close($dblink);
    
     ?>    
</div>

<div id="einzelinfo" style="display:none">

<!--<div id="datumblock">-->
<div id="gdatum">
<p id="kdatum">01 Januar</p>
<p id="kzeit">00:00 Uhr</p>
</div>
<div id="leftbar">
</div>
<div id="informationen">
<p id="kver">Veranstalter</p>
<div id="trenn"></div>
<p id="kinfo">Text</p>
<?php echo "<a href=\"\" onclick=\"return termininfo(0,0,0,0,0,0,0)\">ZURÜCK</a></p>";?>
</div>
</div>

</div>

