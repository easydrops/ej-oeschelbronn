<script>

function termininfo2(wechsel, ver, id){//ver,titel,tag,monat,zeit,info) {


  if (wechsel == 1) {
  $("#content").load("angebot_neu.php?p="+ver+"&&t=1&&id="+id+"");
  }
  else if(wechsel == 0) {
  $("#content").load("angebot_neu.php?p="+ver+"&&t=0&&id="+id+"");
  }
  
  return false;

}       

</script>

<?php 

    include ("dblink.php");
              
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
                      
$v = $_GET['p'];

if(!isset($_GET['id'])) $id = 0;
else $id = $_GET['id'];

$wechsel = $_GET['t'];

$ma = true;

switch($v) {
  case 'jk':  $vtitel = "TEEN- und JUGENDKREIS";
              $vlaeuft = 
              "Wir sind momentan ca. 30-40 Jugendliche aus nah und fern zwischen 13 und 23 Jahren.<br /><br />
              Zeit: Mittwochs, 19 - 21 Uhr (open end)<br /><br />
              action, fun, mal normal und mal völlig abgedreht, draußen oder drinnen, im Gemeindehaus, auf der Gemeindewiese oder sonstwo...<br /><br />
              Unser ''normales'' Programm sieht ungefähr so aus: <br/>
              <ul>
              <li>Start mit gemeinsamem Lieder Singen</li>
              <li>Aufteilung in Teenkreis und Jugendkreis<br />
              <i>(Impuls, Andacht, Thema, Gespräch, Spiele & Co.)</i></li>
              <li>Offenes Ende mit Billard, Tischkicker, Gespräch & Co.</li>
              </ul>

              Ungefähr einmal im Monat: <b>OT&perp;O</b><br />
              <ul>
              <li>OT&perp;O = <b>O</b>ldies und <b>T</b>eenies</li>
              <li>Teenkreis und Jugendkreis gemeinsam</li>
              <li>Mit Thema, Liedern, special Guests, u.a.</li>
              </ul>

              Langweilig??? Auf keinen Fall!!! Unsere Mitarbeiter stellen ein tolles Programm auf die Beine, Themen frisch aus dem Alltag.<br /><br />

              Natürlich machen wir nicht jede Woche das gleiche, sondern haben auch viele Aktivitäten außerhalb des Gemeindehauses.<br />
              So zum Beispiel: Minigolf spielen, ins Kino gehen, Knigge-Abend, Dorfspiel, ... In unserem Programm ist für jeden Typ etwas dabei!!!<br /><br />
              ";
              $vkommt = "jk"; 
              $vma = "<font style='font-family: Latoh'>Teenkreis:</font><br />Conny, David, Miri, Timo<br /><font style='font-family: Latoh'>Jugendkreis:</font><br />Magge, Oli, Paul";
              break;
    case 'up':  $vtitel = "UPSTAIRS JUGENDBISTRO";
              $vlaeuft = 
              "
              Upstairs bietet dir die Möglichkeit jeden 2. und 4. Samstag im Monat um 19.30 Uhr im Gemeindehaus deinem tristen Alltag 
              zu entfliehen.<br/><br/>
              Bei uns findest du: 
<ul>
<li>liebe Menschen mit offenen Herzen und Ohren</li> 
<li>ein abwechslungsreiches Programm</li>
<li>eine lockere Atmosphäre</li>
<li>Tischkicker, Billard und Dart und einiges mehr...</li>
</ul>

Für Speiß und Trank ist immer gut gesorgt.<br/>
Kommt vorbei, bringt Freunde mit, habt Spaß und fühlt euch wohl!<br/>
Herzliche Einladung an alle WILDEN und die, die es werden wollen.<br/><br/>       
Euer Bistro Team
              ";
              $vkommt = "up"; 
              $vma = "Mitarbeiterteam folgt.";
              break;
    case 'jugo':  $vtitel = "JUGO HIGHWAY-TO-HEAVEN";
              $vlaeuft = 
              "Wir sind ein Haufen verrückter Jugendlicher die viermal im Jahr gemeinsam Gottesdienst feiern und das mit ultra viel Spaß und Freude.  Wir wollen Gott auf unsere Weise loben, mit moderner Musik, witzigen Anspielen oder Filmchen und vor allem unserer Gemeinschaft. Dabei darf natürlich auch der Impuls nicht fehlen, in dem wir immer wieder wichtige Themen aufgreifen, um so neue Kraft für unseren Alltag im Glauben zu schöpfen. 
Wir würden uns freuen auch dich mal in einem unserer Jugendgottesdienste begrüßen zu dürfen!<br /><br />
Falls du Fragen hast, schon immer mal mitarbeiten wolltest oder ein spannendes Thema vorschlagen willst, darfst du dich gerne melden.";
              $vkommt = "h2h"; 
              $vma = "Hauptverantwortlich: Anika";
              break;
    case 'cia':  $vtitel = "CHRISTIANS IN ACTION";
              $vlaeuft = 
              "
              Wir treffen uns Sonntags von 15 - 17 Uhr in der Steighalle (oder auch mal draußen),
um sportlich aktiv zu werden.<br/><br/>
Dabei steht nicht eine Sportart im Vordergrund, es soll von allem mal was dabei sein, was das Herz begehrt
und je nachdem wieviele Leute da sind.<br/><br/>
Du bist nicht an einen Verein gebunden, sondern kannst kommen und fehlen so oft du willst.<br/>
Dennoch freuen wir uns auf eine rege Teilnahme!<br/><br/>

Herzliche Einladung!
              ";
              $vkommt = "cia"; 
              $vma = "Hauptverantwortlich: Patrick";
              break;
    case 'jch':  $vtitel = "JUGENDCHOR";
              $vlaeuft = 
              "
              Wir sind zwischen 13 und 25 Jahren alt und treffen uns jeden Freitag um 18-19 Uhr im Evang. Gemeindehaus Öschelbronn, um gemeinsam zu singen.<br/><br />

In den vergangenen Jahren haben wir mehrmals Musicals einstudiert und diese dann in der näheren Umgebung aufgeführt, haben auf Konzerten z.B. „Live uff de Steig“ gesungen  oder beim Straßenfest mitgewirkt.<br/><br/>

Wer Lust hat spontan vorbeizukommen und mit uns zu singen ist jederzeit herzlich willkommen.<br/>

Bei Fragen einfach per Email melden.
              ";
              $vkommt = "ch"; 
              $vma = "Sabrina";
              break;
    case 'so':  $vtitel = "EVENTS";
              $vlaeuft = 
              "Ab und zu gibt es auch einige besondere Veranstaltungen. Hier wirst du darüber informiert.";
              $vkommt = "s"; 
              $ma = false;
              $vma = "Mitarbeiter folgen.";
              break;              
  default: break;
}

             
?>
    <div class="titel">
      
      <div id="blackbox"> <!-- Schattenbox --> 
      </div>
  
      <?php echo '<div id="'.$v.'bildbeschriftung">';?>
      <!--<span id="utext4"><p id="he1">Nächster JuGo</p><p id="he2">Herzliche Einladung zum nächsten JuGo zum Thema: "er lebt, erlebt!"</p></span>-->
      <span id="veranstalter"><?php echo $vtitel;?></span>
      </div>

        
     </div> <!-- Ende div class=titel -->
     
     <div id="contentblock">
     
     <p id="newstitel">Das läuft<?php //echo "Id: ".$id.", V: ".$v;?></p>  
     <div id="trennungnews"></div> 
     
     <div class="laeuft">

     <?php echo $vlaeuft;?> 

     </div> <!-- Ende des div class = laeuft -->
    
     
     <p id="kommttitel">Das kommt</p>
     
     <div id="trennungkommt"></div>
     <div class="kommt">
     <?php if ($wechsel == 1) echo '<div style="display:none">';
     else echo '<div style="display:block">';                                  
      

      $dblink = verbinden();
  
      if (!$dblink) {
        die("Keine Verbindung möglich: " . mysqli_connect_error());  
        }
        
        mysqli_query($dblink, "SET NAMES 'utf8'");
        
       //$sql = "SELECT * FROM  table_termine1 WHERE 
       //(col_veranstalter IN ('jk', 'tk', 'otto')) 
       //AND (DATEDIFF('".date('Y-m-d')."', col_datum) <= 14) ORDER BY col_datum ASC";
       if ($vkommt == "jk") {$sql = "SELECT * FROM  table_termine1 WHERE 
       (col_veranstalter IN ('jk', 'tk', 'otto')) 
       AND (DATEDIFF('".date('Y-m-d')."', col_datum) <= 1 AND DATEDIFF('".date('Y-m-d')."', col_datum) >= -57) ORDER BY col_datum ASC";}
       else { 
       $sql = "SELECT * FROM  table_termine1 WHERE 
       col_veranstalter = '".$vkommt."' 
       AND (DATEDIFF('".date('Y-m-d')."', col_datum) <= 1) ORDER BY col_datum ASC";} 
  
  $result = mysqli_query($dblink, $sql);
          
    if ($result) {
    $count=1;
      $dateheute = date('Y-m-d');   
         
        while ($row = mysqli_fetch_object($result))
      {     
         $date = date_create($row->col_datum);
         $dateentry = date_format($date, 'Y-m-d');
         
         $ktag = date_format($date, 'd');
        $xmonat = date_format($date, 'm');
        $kmonat = $monate[$xmonat];
        $kzeit = date_format($date, 'H:i');
        $ktitel = $row->col_thema; 
        $kinfo = $row->col_beschreibung;
         /*$ver = $row->col_veranstalter;*/
        
         switch($row->col_veranstalter){
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
        echo '<div id="textblock">';
        
        if ($count == 1) echo '<p id="titeleins">'.$ver;
        else echo '<p id="titel">'.$ver;
        $count = 0;
        echo '</p>';
        echo '<div id="titeltrennung"></div>
          <p id="inhalt">'.$row->col_thema.' [';
        
       /* echo "<a href=\"\" onclick=\"return termininfo2(
    1,
    '".$ver."', 
    '".$ktitel."',
    '".$ktag."',
    '".$kmonat."', 
    '".$kzeit."', 
    '".$kinfo."'); return angebot('jk');\">INFOS</a> ]</p>"; */
        echo "<a href=\"\" onclick=\"return termininfo2(1,'".$v."','".$row->col_id."')\">INFOS</a>]</p>";
        echo '</div>';
        
        
        if ($dateentry < $dateheute) {
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
    
    else {echo "kein Eintrag " . $sql . "<br>" . mysqli_error($dblink);}
    
    ?>
    </div>
    
    <?php if ($wechsel == 1) echo '<div id="einzelinfo2" style="display:block">';
    else echo '<div id="einzelinfo2" style="display:none">';

        
        $sql = "SELECT * FROM  table_termine1 WHERE col_id = '".$id."'";
        //echo $sql;
        $result = mysqli_query($dblink, $sql);
          
    if ($result) {
    
        //$tag=0; $mon='01'; $zei=0; $verans=0; $them =0; $inf=0;
         
        while ($row = mysqli_fetch_object($result))
      {    
          $date = date_create($row->col_datum);
          $tag = date_format($date, 'd');
          $mon = date_format($date, 'm');
          $zei = date_format($date, 'H:i');
          $them = $row->col_thema;         
          switch($row->col_veranstalter){
          case 'jk': $verans='Jugendkreis'; break;
          case 'tk': $verans='Teenkreis'; break;
          case 'otto': $verans='OTTO-Abend';break;
          case 'up': $verans='Upstairs'; break;
          case 'h2h': $verans='JuGo h2h'; break;
          case 'ch': $verans='Jugendchor'; break;
          case 'cia': $verans='CIA'; break;
          case 's': $verans='Event'; break; 
          default: $verans='<br/>'; break;
         }
          $inf = $row->col_beschreibung;     
      }
      
  } else {echo "kein Eintrag " . $sql . "<br>" . mysqli_error($dblink);}
    
    mysqli_close($dblink);
        
    ?>
<!--<div id="datumblock">-->
<?php// $tag=0; $mon='01'; $zei=0; $verans=0; $them =0; $inf=0;?>
      <div id="gdatum2">
          <p id="kdatum"><?php echo $tag.'&nbsp;'.$monate[$mon];?>
          </p>
          <p id="kzeit"><?php echo $zei.' Uhr';?>
          </p>
      </div>
      <div id="leftbar">
      </div>
      <div id="informationen">
        <p id="kver"><?php echo $verans.': "'.$them.'"';?>
        </p>
        <div id="trenn2">
        </div>
        <p id="kinfo"><?php echo $inf;?>
        </p>
        <?php echo "<a href=\"\" onclick=\"return termininfo2(0,'".$v."',0)\">ZURÜCK</a></p>";?>
      </div>
                </div>

     </div> <!-- Ende div class = kommt -->
     
     <p id="newstitel2">Das lief</p>  
     <div id="trennungnews"></div> 
     
     <div class="lief">

     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     <div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div><div id="bildblock"></div>
     
     
     <div id="galtrennung"></div> 
     
     <img src="symb/mehranzeigen.svg"> <img src="symb/zurgalerie.svg">

     </div> <!-- Ende des div class = lief -->
     <?php if ($ma) {?>
     <p id="matitel">Das Team</p>
     
     <div id="trennungkommt"></div>
     <div class="ma">
     <?php echo $vma;?>
     </div> <!-- Ende div class "ma" -->
     <?php };?>
     </div> <!-- Ende des News/Termine-Fensters: div id="newszentriert"-->

    <!-- 1377px Ende; Abstand 50px-->
    <div id="bottom" style="margin-top:1427px;">
      <?php include ('bottom.php');?>
    </div>