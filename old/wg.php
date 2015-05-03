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

    <div class="titel">
      <div id="blackbox">
      <!--<img src="/slide/startpic.png" alt="Willkommen!">-->
      </div>
  
      <div id="wgbildbeschriftung">
    <!--<span id="utext4"><p id="he1">Nächster JuGo</p><p id="he2">Herzliche Einladung zum nächsten JuGo zum Thema: "er lebt, erlebt!"</p></span>-->
      <span id="veranstalter">WG 2015</span>
      </div>

        
     </div> <!-- Ende div class=slide -->
     
     <div id="newsterminblock">
     <br />
     <br />
     <p id="newstitel">Aktuelle Infos zur WG</p>  
     <div id="trennungnews2"></div> 
     
     <div class="newsbox2">
     <div class="news2">
     
     <?php
      $dblink = verbinden();
      
  
      if (!$dblink) {
        die("Keine Verbindung möglich: " . mysqli_connect_error());  
        }
        
        mysqli_query($dblink, "SET NAMES 'utf8'");
  
  
  $sql = "SELECT * FROM  table_news_wg ORDER BY col_datum DESC";
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
    
    mysqli_close($dblink);
    
     ?>
     
    
    
    </div> <!-- Ende des div class = news -->

     </div> <!-- Ende des div class = newsbox -->
 
  

     
      
     
     

     
     <!--
     <p id="matitel">Mitarbeiter</p>
     
     <div id="trennungkommt"></div>
     <div class="ma">
     
     </div> <!-- Ende div class "ma" 
     -->
     
     </div> <!-- Ende des News/Termine-Fensters: div id="newszentriert"-->
    
    <!-- 848px Ende; Abstand 75px-->
    <div id="bottom" style="margin-top:1200px;">
      <?php include ('bottom.php');?>
    </div>