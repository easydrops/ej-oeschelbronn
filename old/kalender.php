    <?php 
    include("dblink.php");
    ?>
    
    <div class="titel">
      <div id="blackbox">
      <!--<img src="/slide/startpic.png" alt="Willkommen!">-->
      </div>
  
      <div id="kalbildbeschriftung">
    <!--<span id="utext4"><p id="he1">Nächster JuGo</p><p id="he2">Herzliche Einladung zum nächsten JuGo zum Thema: "er lebt, erlebt!"</p></span>-->
      <span id="veranstalter">KALENDER</span>
      </div>

        
     </div> <!-- Ende div class=titel -->
     
     <div id="contentblock">
     
     <div id="kalender_block">
          <?php 
            include("unterkalender.php");
            ?> 
     </div>
  
     
     <?php echo '<div id="termin_block'.$zeilen.'">';?>    
        <div id="kaltitel1">
        <?php 
           echo $wochentag.', '.$tag.'. '.$monat.' '.$jahr;
        ?>
            <div id="kaltitel2">Termine</div>
        </div>
        <div id="trennungkal"></div> 
        
     <div class="aktuell_tag">
     
     <div id="ganzertermin">
     
     <?php 

      $dblink = verbinden();
  
      if (!$dblink) {
        die("Keine Verbindung möglich: " . mysqli_connect_error());  
        }
        
        mysqli_query($dblink, "SET NAMES 'utf8'");
    
        $wahldatum = date($jahr.'-'.$month.'-'.$tag);
        /*echo $wahldatum;*/
    
     
     $sql = "SELECT * FROM  table_termine1 WHERE col_datum LIKE '".$wahldatum."%' ORDER BY col_datum ASC"; 
      
     $result = mysqli_query($dblink, $sql);
      
     if ($result) {
           $count=0;
           while ($row = mysqli_fetch_object($result))
          {
              $count++;
              /*echo $row->col_datum;
             echo $wahldatum;*/
                  
              switch($row->col_veranstalter){
          case 'jk': $ver='Jugendkreis'; break;
          case 'tk': $ver='Teenkreis'; break;
          case 'otto': $ver='OTTO-Abend';break;
          case 'up': $ver='Upstairs'; break;
          case 'h2h': $ver='JuGo h2h'; break;
          case 'ch': $ver='Jugendchor'; break;
          case 'cia': $ver='CIA'; break;
          case 's': $ver='Event'; break; 
          default: $ver=''; break;
                }
        
        $ktitel = $row->col_thema; 
        $kinfo = $row->col_beschreibung;
        $datetime = new DateTime($row->col_datum);
        $zeit = date_format($datetime, 'H:i');
        
          
        echo '<div id="zeitblock"><p id="zeit">'.$zeit.'</p><p id="uhr">UHR</p></div>
            <div id="textblock">';
         
            echo '<p id="titel">'.$ver.': "'.$ktitel.'"</p>
                  <div id="titeltrennung"></div>
                <p id="inhalt">'.$kinfo.'
                </p>
            </div><div id="leer"></div>';
          }
      
          if ($count == 0) echo "&nbspKeine Termine vorhanden.";
     } 
     else {
         
         echo "&nbspKeine Termine vorhanden.";        
     
     }

?>    
     
        


      </div>
     
     </div>
     
     
     <div class="aktuell_woche">
      <p id="woche">Wochenplan:</p>
        <div id="wochetrennung"></div>
        
        <?php
        
       $sql = "SELECT * FROM  table_termine1 WHERE col_kw = ".$kalenderwoche." AND col_datum LIKE '".$jahr."%' ORDER BY col_datum ASC";
       $result = mysqli_query($dblink, $sql);
       echo '<div id="wochentermine">';
         if ($result) {
           $count=0;
           while ($row = mysqli_fetch_object($result))
          {
              $count++;
              $time = strtotime($row->col_datum);
              $weekday = $wochentage[date('w', $time)];
              $zeit = date('H:i', $time);
               switch($row->col_veranstalter){
          case 'jk': $ver='Jugendkreis'; break;
          case 'tk': $ver='Teenkreis'; break;
          case 'otto': $ver='OTTO-Abend';break;
          case 'up': $ver='Upstairs'; break;
          case 'h2h': $ver='JuGo h2h'; break;
          case 'ch': $ver='Jugendchor'; break;
          case 'cia': $ver='CIA'; break;
          case 's': $ver='Event'; break; 
          default: $ver=''; break;
         }
         
              echo '<div id="marker"></div><div id="textblock">'.$weekday.', '.$zeit.' Uhr:<br/>
              '.$ver.': "'.$row->col_thema.'"</div><div id="leer"></div>';
            
           }
           if ($count == 0) echo "Keine Termine vorhanden.";
        }
        else { }
        
        mysqli_close($dblink);
       echo '</div>';  
          
        
        
        ?>
        
        
     </div> 
     
     </div>
     
     <!--<p id="newstitel2">Das lief</p>  
     <div id="trennungnews"></div> 
     
     <div class="lief">

     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     
     
     <div id="galtrennung"></div> 
     
     <img src="mehranzeigen.svg"> <img src="zurgalerie.svg">

     </div> <!-- Ende des div class = lief -->
     <!--
     <p id="matitel">Mitarbeiter</p>
     
     <div id="trennungkommt"></div>
     <div class="ma">
     
     </div> <!-- Ende div class "ma" 
     -->
    
    
    <!-- 311px Ende; Abstand 50px-->
    <div id="bottom" style="margin-top:361px;">
      <?php include ('bottom.php');?>
    </div>