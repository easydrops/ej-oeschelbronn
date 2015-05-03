<?php 
    include("dblink.php"); 

      $kurz_monate = array (
            '01'=>"Jan",
            '02'=>"Feb",
            '03'=>"Mär",
            '04'=>"Apr",
            '05'=>"Mai",
            '06'=>"Jun",
            '07'=>"Jul",
            '08'=>"Aug",
            '09'=>"Sep",
            10=>"Okt",
            11=>"Nov",
            12=>"Dez");
?>    
    
    <!-- Startbild und -text -->
      
    <div class="slidemenu">  
      <span id="big"></span>
      
      <a href="" onclick="return direktwechsel(0)">
          <span id="text1">Willkommen</span>
      </a>
      <a href="" onclick="return direktwechsel(1)">
          <span id="text2">Losungen</span>
      </a>
      <a href="" onclick="return direktwechsel(2)">
          <span id="text3">Umbau</span>
      </a>
      <a href="" onclick="return direktwechsel(3)">
          <span id="text4">JuGo h2h</span>
      </a>                              
   
    </div>   

  

    <div class="slide">
      <div id="blackbox">
    <img src="/slide/slide_jugo.png" alt="JuGo-Flyer" name="bild4" id="bild4">
    <img src="/slide/slide_umbau.png" alt="umbauphase" style="background-color:white" name="bild3" id="bild3">
    <img src="/slide/slide_losungen.jpg" alt="News1" name="bild2"id="bild2">
    <img src="/slide/slide_willkommen.jpg" alt="Willkommen!" name="bild1" id="bild1">
      </div>
      <div id="trennung"></div>
      <div id="bildbeschriftung">
    <!--<span id="utext4"><p id="he1">Lobpreis-GoDi - 6. Januar</p></span>-->
    <!--<span id="utext41"><p id="he2">Weitere Infos - siehe Kalender.
</p></span>-->
    <!--<span id="utext3"><p id="he1">Umbauphase</p><p id="he2">Wir bitten um Entschuldigung für Fehler und Lücken auf der Webseite.</p></span>-->
    <span id="utext2"><p id="he1">Losungen vom <?php echo date('d.m.');?><br /></p></span>
    <span id="utext21"><p id="he3"><?php include('losungphp2.inc');?><br /><br /><a href="www.hernhuter.de">© Evangelische Brüder-Unität - Herrnhuter Brüdergemeine</a></p></span>
     <!-- <a href="www.losungen.de">Weitere Informationen finden Sie hier.</a>-->
    <span id="utext1"><p id="he1">Willkommen!</p></span>
    <span id="utext11"><p id="he2">Auf der Homepage der Evang. Jugend Öschelbronn. Hier findest du alle News, Termine und andere Infos zur Jugendarbeit.<br /> Viel Spaß!</p></span>
      </div>
     
    <script>
    
    /*Starteinstellungen für Slideshow*/
    $('#bild1').fadeIn(0,'swing');
    $('#bild2').fadeOut(0,'swing');
    $('#bild3').fadeOut(0,'swing');
    $('#bild4').fadeOut(0,'swing');
    
    $('#utext1').fadeIn(0,'swing');
    $('#utext2').fadeOut(0,'swing');
    $('#utext3').fadeOut(0,'swing');
    $('#utext4').fadeOut(0,'swing');
    $('#utext11').fadeIn(0,'swing');
    $('#utext21').fadeOut(0,'swing');
    $('#utext31').fadeOut(0,'swing');
    $('#utext41').fadeOut(0,'swing');
    
    document.getElementById('text1').style.fontSize= '25px';
    document.getElementById('text1').style.color= 'black';
    document.getElementById('text2').style.fontSize= '20px';
    document.getElementById('text2').style.color= 'grey';
    document.getElementById('text3').style.fontSize= '20px';
    document.getElementById('text3').style.color= 'grey';    
    document.getElementById('text4').style.fontSize= '20px';
    document.getElementById('text4').style.color= 'grey';        
        
    </script> 
    
    
    
    <!-- Buttons zum Weiterklicken -->
     <div class="slidechange">
          <a href="" onclick="return wechsel(0)"><img class="left" src="/symb/links.png"/></a>
          <!--<a href="" onclick="return wechsel(0)"><img class="center" src="/start/play.png"></a>-->
          <a href="" onclick="return wechsel(1)"><img class="right" src="/symb/rechts.png"></a>
     </div>
         
        
     </div>
     
     <div id="newsterminblock">
     
     <p id="newstitel">Aktuelle News</p>
     <div id="trennungnews"></div>
     
     <div class="newsbox">
      <!--<div id="trennungoben"></div>-->
     <div class="news">
      
      <?php 
      $dblink = verbinden();
      
  
      if (!$dblink) {
        die("Keine Verbindung möglich: " . mysqli_connect_error());  
        }
        
        mysqli_query($dblink, "SET NAMES 'utf8'");
  
  
  $sql = "SELECT * FROM  table_news ORDER BY col_datum DESC";
  $result = mysqli_query($dblink, $sql);
  

          
    if ($result) {
    
    $dateheute = date('Y-m-d');
    $datetimeheute = date('Y-m-d H:m:s');
    $counter = 1;
    /*echo '<table>';*/
    
    while ($row = mysqli_fetch_object($result))
      {
      
         $date = date_create($row->col_datum);
         $dateentry = date_format($date, 'Y-m-d');
         $datetimeentry = date_format($date, 'Y-m-d H:i:s');

          
         /*echo $dateentry.$datetimeentry;*/
         
        /*if ($counter == 1) echo '<p id="toptiteltrennung"></p>';*/
                
        echo '<div id="textblock">
        <p id="titel">'.$row->col_titel.'</p>
          <div id="titeltrennung"></div>
          <p id="inhalt">'.$row->col_inhalt.'</p>
        </div>';
        
        if ($dateentry < $dateheute) {
          echo '<div id="datumblock">
          <p id="tagalt">'.date_format($date, 'd').'</p>
          <p id="monatalt">'.$kurz_monate[date_format($date, 'm')].'</p>
          <p id="zeitalt">'.date_format($date, 'H:i').' Uhr</p>
         </div>';
         }
        else {
        
        echo '<div id="datumblock">
          <p id="tagheute">'.date_format($date, 'd').'</p>
          <p id="monatheute">'.$kurz_monate[date_format($date, 'm')].'</p>
          <p id="zeitheute">'.date_format($date, 'H:i').' Uhr</p>
         </div>';
        
        }
        /*TEST 
        echo "Datum Eintrag: ";
         echo $dateentry;
         echo "<br/>Timestamp: ";
         echo date($dateentry);
         echo "<br/>Heute: ";
         echo $dateheute;
         echo "<br/>Timestamp: ";
         echo date($dateheute);
         echo "<br/>Eintrag-Heute = ";
         if ($dateentry < $dateheute) echo "Kleiner";
         else if ($dateentry > $dateheute) echo "größer";
         else echo "gleich";
         echo "<br/>Timestamp Eintrag-Heute = ";
         if (date($dateentry) < date($dateheute)) echo "Kleiner";
         else if (date($dateentry) > date($dateheute)) echo "größer";
         else echo "gleich";
         echo "<br/>Differenz: ";
         echo $dateentry - $dateheute; 
         echo "<br/>TimestampDiff: ";
         echo date($dateentry) - date($dateheute);
         */
        $counter = 0; 
      }
    
    }
    
    else {echo "Verbindung konnte nicht hergestellt werden: " . $sql . "<br>" . mysqli_error($dblink);}
    
    /*mysqli_close($dblink);*/
    
     ?>
     
    
    
    </div> <!-- Ende des div class = news -->
    <!--<div id="trennungunten"></div>-->
    </div> <!-- Ende des div class = newsbox -->
    
       
     <p id="terminetitel">Neueste Termine</p>
     
     <div id="trennungtermine"></div>
     
     <div class="terminebox">
     <div id="termine">
     
 
       <?php include("start-termine.php"); ?>
     
       </div> <!-- Ende div class = termine -->

     <?php
            $m = date('n');
            $j = date('Y');
            $t = date('d');
        echo '<a href="" onclick="return paging(2,'.$m.','.$j.','.$t.');"><img src="/symb/kalenderbutton.png"/ style="margin-top:560px; margin-left:10px;"></a>';
     ?>
     </div> <!-- Ende div class = terminebox --> 
     
     </div> <!-- Ende des News/Termine-Fensters: div id="newszentriert"-->

          <!-- 1063px Ende; Abstand 50px-->
    <div id="bottom" style="margin-top:1113px;">
      <?php include ('bottom.php');?>
    </div>