<?php 
     
     $monate = array(
            1=>"Januar",
            2=>"Februar",
            3=>"März",
            4=>"April",
            5=>"Mai",
            6=>"Juni",
            7=>"Juli",
            8=>"August",
            9=>"September",
            10=>"Oktober",
            11=>"November",
            12=>"Dezember");
            
    $wochentage = array (
        0=>"Sonntag",
        1=>"Montag",
        2=>"Dienstag",
        3=>"Mittwoch",
        4=>"Donnerstag",
        5=>"Freitag",
        6=>"Samstag");
    
    
        
      ?>
      
      <?php      
        /*define('m', 0);
        define('j', 0);*/
  
        
        $m = $_GET['m'];
        $j = $_GET['j'];
        $t = $_GET['t'];

        
        $time = mktime(0,0,0,$m,1,$j);
        $z1 = date('w', $time);
        $monat = $monate[date ('n', $time)];
        $month = date('m', $time);
        $jahr = date ('Y', $time);        
        
        $time2 = mktime(0,0,0,$m,$t,$j);
        $tag = date('d', $time2);
        $wochentag = $wochentage[date('w', $time2)]; 
        $kalenderwoche = date('W', $time2);
        
         
        $tage = date('t', $time);
        $z = 0;
        
           $aktmonat = $monate[date ('n')];
           $aktmonth = date('m');
           $akttag = date('d');
           $aktjahr = date('Y');
        
        $wahlmonat = date($jahr.'-'.$month);   
        
        
        for ($i = 1; $i<= 31; $i++)
        {
            ${$i} = 0;
        }
        
        $dblink = verbinden();
        
        if (!$dblink) {
        die("Keine Verbindung möglich: " . mysqli_connect_error());  
        }
        
        mysqli_query($dblink, "SET NAMES 'utf8'");
    
     
        $sql = "SELECT * FROM  table_termine1 WHERE col_datum LIKE '".$wahlmonat."%' ORDER BY col_datum ASC"; 
      
        $result = mysqli_query($dblink, $sql);
        for ($i =0; $i <= 35; $i++)
        {
          ${$i} = 0;
        }
        
        if ($result) {
           while ($row = mysqli_fetch_object($result))
          {
            $date = date_create($row->col_datum);
            $day_format = date_format($date, 'd');
            //$dayy_format = substr("$day_format",-1);
            //${$day_format} = 1;
            if ($day_format < 10) $day_format = substr("$day_format",-1);
            ${$day_format} = 1; 
          }            
        }
        
         mysqli_close($dblink); 
     ?>
     
     <p id="newstitel">

     
     <?php echo $jahr;?>
     &nbsp&nbsp&nbsp&nbsp
     <?php echo $monat; echo '&nbsp&nbsp&nbsp&nbsp';
     echo '<a id="monatwahl" href="" onclick="return monatwechsel(1,'.date("n",$time).','.$jahr.',2)">></a>';
     echo '<a id="monatwahl" href="" onclick="return monatwechsel('.$akttag.','.$aktmonth.','.$aktjahr.',0)">HEUTE</a>';
     echo '<a id="monatwahl" href="" onclick="return monatwechsel(1,'.date("n",$time).','.$jahr.',1)"><</a>';
     ?>
     </p> 
     <div id="trennungkal"></div> 
     
     <div class="kalender">
  
     
     <table>
      <thead>
      <th id="titel">Montag</th>
      <th id="titel">Dienstag</th>
      <th id="titel">Mittwoch</th>
      <th id="titel">Donnerstag</th>
      <th id="titel">Freitag</th>
      <th id="titel">Samstag</th>
      <th id="titel">Sonntag</th>
      </thead>
      
   
      <?php
      $zeilen = 0;
      for ($j = 1; $j <= 6; $j++) {
          
          if ($z < $tage) {
            $zeilen++;
            echo '<tr>';
                for ($i = 1; $i <=7; $i++) {
                
                    if ($j == 1) {
                          if ($i == 7) $z++;
                          else if($z1 <= $i && $z1 != 0) $z++;                      
                    } else $z++;
                    
                    if ($monat == $aktmonat && $jahr == $aktjahr && $z == $akttag) 
                          echo '<th id="heute">';
                    else if ($tag == $z)
                          echo '<th id="wahl">';
                    else echo '<th>';
                    //if ($count==1) echo "Yes"; else echo "No";
                    
                    if ($z <= $tage && $z != 0) 
                        /*echo '<a href="" onclick="return tageswahl(1,2,3)">'.$z.'</a>';*/
                        //echo '<a href="" onclick="return tageswechsel('.$z.','.date("n",$time).','.$jahr.')"><p>&nbsp</p>'.$z.'::'.${$z}.'</a>';
                        {echo '<a href="" onclick="return tageswechsel('.$z.','.date("n",$time).','.$jahr.')"><p>&nbsp</p>';
                        
                        if (${$z} == 1) echo $z.'<sup>&#149;</sup></a>';
                        else echo $z.'</a>';
                        }
                    echo '</th>';
                    
                }
            echo '</tr>';
          }
      }
      
      ?>
      

     </table>
     
     </div>