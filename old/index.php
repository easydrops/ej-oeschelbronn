<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html>
<head>
<title>Evang. Jugend Öschelbronn</title>
<link rel="stylesheet" type="text/css" href="styleindex.css">
<link rel="shortcut icon" type="image/x-icon" href="/logo/logoklein.ico">
<meta name="keywords" content="Öschelbronn, Evangelische Jugend, Jugendkreis, Jugendchor, Jugendgottesdienst, Upstairs, Jugo, Chor, Bistro, Highway-To-Heaven, Christen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- JQuery einbinden -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- Eigene Scripts einbinden?
<script src="/scri.js"></script>-->

<!-- Menü Scroll Andocken-->

<script type='text/javascript'>

document.onscroll = function () {
var pos = window.pageYOffset;
/*neu = "Position: " + pos;
document.getElementById('cont').innerHTML = neu;*/
if (pos < 130)
{document.getElementById('menubg').style.top = 0 + 'px';}
else
{document.getElementById('menubg').style.top = pos-130 + 'px';}

} 
</script>

<!--
========================================================================== 
Slideshow 
==========================================================================
-->

<script type='text/javascript'>

pics		= new Array("/slide/startpic.png", "/start/pic2.jpg", "/start/pic3.jpg", "/start/pic4.jpg");

changeTime 	= 1; // Wechsel der Bilder (Für Autowechsel)

var bildnr = 0;

titel = new Array("Neu hier?", "Text 2", "Text 3", "Text 4", "Text 5", "Text 6", "Text 7");
untertitel = new Array(
"Sieh dich doch ein wenig um, es gibt vieles zu entdecken!",
"Das ist Bild 2",
"Das ist Bild 3",
"Das ist Bild 4",
"Das ist Bild 5",
"Das ist Bild 6",
"Das ist Bild 7");

// Automatischer Wechsel der Slidebilder -- per body onload(Autowechsel()) einbinden
function autowechsel()
{
 
  setTimeout("autowechsel()",changeTime*10000);
  if (typeof(count) == "undefined") {direktwechsel(0); count = 1;}
  else {
       bildnr++;
        if (bildnr > 3) bildnr = 0;
        direktwechsel(bildnr);
  }


  return false;
}

// Wechsel durch Klicken nach links und rechts

function wechsel(num)
{ 
  if (num == 0) 
  {
    bildnr --;
    if (bildnr < 0) bildnr = 3;
  }
  else 
  {
    bildnr++;
    if (bildnr > 3) bildnr = 0;
  }

  direktwechsel(bildnr);

  return false;
}

// Wechsel durch Klick auf das Register 

function direktwechsel(num)
{
    /*Gewähltes Bild wird eingefadet, Rest FadeOut */
  bildnr = num;
  
  if (bildnr == 0) {
    $('#bild1').fadeIn(1000,'swing');
    $('#bild2').fadeOut(1000,'swing');
    $('#bild3').fadeOut(1000,'swing');
    $('#bild4').fadeOut(1000,'swing');
    
    $('#utext1').fadeIn(1000,'swing');
    $('#utext2').fadeOut(1000,'swing');
    $('#utext3').fadeOut(1000,'swing');
    $('#utext4').fadeOut(1000,'swing');
    $('#utext11').fadeIn(1000,'swing');
    $('#utext21').fadeOut(1000,'swing');
    $('#utext31').fadeOut(1000,'swing');
    $('#utext41').fadeOut(1000,'swing');
    
    document.getElementById('text1').style.fontSize= '25px';
    document.getElementById('text1').style.color= 'black';
    document.getElementById('text2').style.fontSize= '20px';
    document.getElementById('text2').style.color= 'grey';
    document.getElementById('text3').style.fontSize= '20px';
    document.getElementById('text3').style.color= 'grey';
    document.getElementById('text4').style.fontSize= '20px';
    document.getElementById('text4').style.color= 'grey';
    
    }
    else if (bildnr == 1) {
      $('#bild1').fadeOut(1000,'swing');
      $('#bild2').fadeIn(1000,'swing');
      $('#bild3').fadeOut(1000,'swing');
      $('#bild4').fadeOut(1000,'swing');
      
      $('#utext1').fadeOut(1000,'swing');
      $('#utext2').fadeIn(1000,'swing');
      $('#utext3').fadeOut(1000,'swing');
      $('#utext4').fadeOut(1000,'swing');
      $('#utext11').fadeOut(1000,'swing');
      $('#utext21').fadeIn(1000,'swing');
      $('#utext31').fadeOut(1000,'swing');
      $('#utext41').fadeOut(1000,'swing');
      
    document.getElementById('text1').style.fontSize= '20px';
    document.getElementById('text1').style.color= 'grey';
    document.getElementById('text2').style.fontSize= '25px';
    document.getElementById('text2').style.color= 'black';
    document.getElementById('text3').style.fontSize= '20px';
    document.getElementById('text3').style.color= 'grey';
    document.getElementById('text4').style.fontSize= '20px';
    document.getElementById('text4').style.color= 'grey';
        
    }
    else if (bildnr == 2) {
      $('#bild1').fadeOut(1000,'swing');
      $('#bild2').fadeOut(1000,'swing');
      $('#bild3').fadeIn(1000,'swing');
      $('#bild4').fadeOut(1000,'swing');
      
      $('#utext1').fadeOut(1000,'swing');
      $('#utext2').fadeOut(1000,'swing');
      $('#utext3').fadeIn(1000,'swing');
      $('#utext4').fadeOut(1000,'swing');
      $('#utext11').fadeOut(1000,'swing');
      $('#utext21').fadeOut(1000,'swing');
      $('#utext31').fadeIn(1000,'swing');
      $('#utext41').fadeOut(1000,'swing');      
      
    document.getElementById('text1').style.fontSize= '20px';
    document.getElementById('text1').style.color= 'grey';
    document.getElementById('text2').style.fontSize= '20px';
    document.getElementById('text2').style.color= 'grey';
    document.getElementById('text3').style.fontSize= '25px';
    document.getElementById('text3').style.color= 'black';
    document.getElementById('text4').style.fontSize= '20px';
    document.getElementById('text4').style.color= 'grey';
        
    }
    else {
      $('#bild1').fadeOut(1000,'swing');
      $('#bild2').fadeOut(1000,'swing');
      $('#bild3').fadeOut(1000,'swing');
      $('#bild4').fadeIn(1000,'swing');
          
      $('#utext1').fadeOut(1000,'swing');
      $('#utext2').fadeOut(1000,'swing');
      $('#utext3').fadeOut(1000,'swing');
      $('#utext4').fadeIn(1000,'swing');
      $('#utext11').fadeOut(1000,'swing');
      $('#utext21').fadeOut(1000,'swing');
      $('#utext31').fadeOut(1000,'swing');
      $('#utext41').fadeIn(1000,'swing');      
      
    document.getElementById('text1').style.fontSize= '20px';
    document.getElementById('text1').style.color= 'grey';
    document.getElementById('text2').style.fontSize= '20px';
    document.getElementById('text2').style.color= 'grey';
    document.getElementById('text3').style.fontSize= '20px';
    document.getElementById('text3').style.color= 'grey';
    document.getElementById('text4').style.fontSize= '25px';
    document.getElementById('text4').style.color= 'black';
        
    }  
  return false;
          
}

/*
========================================================================== 
Seitenwechsel - Das Menü - Einbinden der einzelnen Seiten 
==========================================================================
*/
</script>


<script>


function paging(num,monat,jahr,tag)
{  
  $('html').scrollTop(130);
  document.getElementById('button0a').style.display = "inline";  
  document.getElementById('button1a').style.display = "inline";  
  document.getElementById('button2a').style.display = "inline";
  document.getElementById('button3a').style.display = "inline";
  document.getElementById('button4a').style.display = "inline";
  /*document.getElementById('button5a').style.display = "inline";*/
  document.getElementById('button6a').style.display = "inline";
  document.getElementById('button8a').style.display = "inline";
  document.getElementById('button11a').style.display = "inline";
  document.getElementById('button12a').style.display = "inline";
  document.getElementById('button13a').style.display = "inline";
  document.getElementById('button14a').style.display = "inline";
  document.getElementById('button15a').style.display = "inline";
  document.getElementById('button16a').style.display = "inline";
  
  
  document.getElementById('button0s').style.display = "none";
  document.getElementById('button1s').style.display = "none";
  document.getElementById('button2s').style.display = "none";
  document.getElementById('button3s').style.display = "none";
  document.getElementById('button4s').style.display = "none";
  /*document.getElementById('button5s').style.display = "none";*/
  document.getElementById('button6s').style.display = "none";
  document.getElementById('button8s').style.display = "none";
  document.getElementById('button11s').style.display = "none";
  document.getElementById('button12s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button14s').style.display = "none";
  document.getElementById('button15s').style.display = "none";
  document.getElementById('button16s').style.display = "none";
  
  switch(num) {
    case 0: {$("#content").load("start.php"); 
            document.getElementById('button0a').style.display = "none";
            document.getElementById('button0s').style.display = "inline";
            }
            break;
    case 1: {$("#content").load("angebote.php"); 
            document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
            }
            break;
    case 2: $("#content").load("kalender.php?m="+monat+"&&j="+jahr+"&&t="+tag); 
            document.getElementById('button2a').style.display = "none";
            document.getElementById('button2s').style.display = "inline";
            break;
    case 3: $("#content").load("forum.php"); 
            document.getElementById('button3a').style.display = "none";
            document.getElementById('button3s').style.display = "inline";
            break;
    case 4: $("#content").load("galerie_neu.php"); 
            document.getElementById('button4a').style.display = "none";
            document.getElementById('button4s').style.display = "inline";
            break;
    /*case 5: $("#content").load("baustelle.php"); 
            document.getElementById('button5a').style.display = "none";
            document.getElementById('button5s').style.display = "inline";
            break;                                                       */
    case 6: $("#content").load("schutz/adminneu.php"); 
            document.getElementById('button6a').style.display = "none";
            document.getElementById('button6s').style.display = "inline";
            break;
    case 7: $("#content").load("impressum.php");
            break;
    case 8: $("#content").load("wg.php");
            document.getElementById('button8a').style.display = "none";
            document.getElementById('button8s').style.display = "inline";
            break;
    /*case 11: $("#content").load("angebote/jk.php"); 
             document.getElementById('button11a').style.display = "none";
             document.getElementById('button11s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;
    case 12: $("#content").load("angebote/up.php"); 
             document.getElementById('button12a').style.display = "none";
             document.getElementById('button12s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;
    case 13: $("#content").load("angebote/jugo.php"); 
             document.getElementById('button13a').style.display = "none";
             document.getElementById('button13s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;                          
    case 14: $("#content").load("angebote/cia.php"); 
             document.getElementById('button14a').style.display = "none";
             document.getElementById('button14s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;
    case 15: $("#content").load("angebote/jch.php"); 
             document.getElementById('button15a').style.display = "none";
             document.getElementById('button15s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;
    case 16: $("#content").load("angebote/so.php"); 
             document.getElementById('button16a').style.display = "none";
             document.getElementById('button16s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;
    */         
    default: $("#content").load("start.php");           
  }

     
  return false;
}

</script>

<script>

function angebot(gruppe)
{  
   $('html').scrollTop(130);
  document.getElementById('button0a').style.display = "inline";  
  document.getElementById('button1a').style.display = "inline";  
  document.getElementById('button2a').style.display = "inline";
  document.getElementById('button3a').style.display = "inline";
  document.getElementById('button4a').style.display = "inline";
  /*document.getElementById('button5a').style.display = "inline";*/
  document.getElementById('button6a').style.display = "inline";
  document.getElementById('button8a').style.display = "inline";
  document.getElementById('button11a').style.display = "inline";
  document.getElementById('button12a').style.display = "inline";
  document.getElementById('button13a').style.display = "inline";
  document.getElementById('button14a').style.display = "inline";
  document.getElementById('button15a').style.display = "inline";
  document.getElementById('button16a').style.display = "inline";
  
  
  document.getElementById('button0s').style.display = "none";
  document.getElementById('button1s').style.display = "none";
  document.getElementById('button2s').style.display = "none";
  document.getElementById('button3s').style.display = "none";
  document.getElementById('button4s').style.display = "none";
  /*document.getElementById('button5s').style.display = "none";*/
  document.getElementById('button6s').style.display = "none";
  document.getElementById('button8s').style.display = "none";
  document.getElementById('button11s').style.display = "none";
  document.getElementById('button12s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button14s').style.display = "none";
  document.getElementById('button15s').style.display = "none";
  document.getElementById('button16s').style.display = "none";
  
  switch(gruppe) {
    case 'jk':
              $("#content").load("angebot_neu.php?p=jk&&t=0&&id=0");  
             document.getElementById('button11a').style.display = "none";
             document.getElementById('button11s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;
    case 'up': $("#content").load("angebot_neu.php?p=up&&t=0&&id=0"); 
             document.getElementById('button12a').style.display = "none";
             document.getElementById('button12s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;
    case 'jugo': $("#content").load("angebot_neu.php?p=jugo&&t=0&&id=0"); 
             document.getElementById('button13a').style.display = "none";
             document.getElementById('button13s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
             document.getElementById('button1s').style.display = "inline";
             break;                          
    case 'cia': $("#content").load("angebot_neu.php?p=cia&&t=0&&id=0"); 
             document.getElementById('button14a').style.display = "none";
             document.getElementById('button14s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;
    case 'jch': $("#content").load("angebot_neu.php?p=jch&&t=0&&id=0"); 
             document.getElementById('button15a').style.display = "none";
             document.getElementById('button15s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;
    case 'so': $("#content").load("angebot_neu.php?p=so&&t=0&&id=0"); 
             document.getElementById('button16a').style.display = "none";
             document.getElementById('button16s').style.display = "inline";
             document.getElementById('button1a').style.display = "none";
            document.getElementById('button1s').style.display = "inline";
             break;           
    default: $("#content").load("start.php");           
  }

     
  return false;
}


</script>

<script>


function monatwechsel(tag,monat, jahr ,richt)
{  
    if (richt == 1) monat=monat-1;
    if (richt == 2) monat=monat+1;

    switch(richt) {
    case 1: $("#content").load("kalender.php?m=" + monat + "&&j=" + jahr+"&&t=" + tag); break;
    case 2: $("#content").load("kalender.php?m=" + monat + "&&j=" + jahr+"&&t=" + tag); break;
    case 0: $("#content").load("kalender.php?m=" + monat + "&&j=" + jahr+"&&t=" + tag); break;             
  }

     
  return false;
}

</script>

<script>

function tageswechsel(tag,monat, jahr)
{  
    $("#content").load("kalender.php?m=" + monat + "&&j=" + jahr+"&&t=" + tag);            
  
  return false;
}

</script>

<!-- ENDE Scripte -->


</head>

<body onload="autowechsel();">

<?php           $kurz_monate = array (
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

<!--
========================================================================== 
Header
==========================================================================
 -->
  <div id="headerbg">
      <div id="header">
          <img src="/logo/logo.png"/>
      </div>
  </div>
  
<!--
========================================================================== 
Menü
==========================================================================
 -->
 <!-- Default Menü-Anzeige -->
 

  <div id="menubg">  
    <div id="menu">
    <ul>
      
    <li class="topmenu">   
    <a href="" onclick="return paging(0,0,0,0)" id="button0a">Home</a>
    <span id="button0s">Home</span>
    </li>
    
    <li class="topmenu">
    <a href="" onclick="return paging(1,0,0,0);" id="button1a">Angebote</a>
    <span id="button1s">Angebote</span>
        <ul>
        <li class="submenu">
        <a href="" onclick="return angebot('jk')" id="button11a">Jugendkreis</a>
        <span id="button11s">Jugendkreis</span>
        </li>
        <li class="submenu">
        <a href="" onclick="return angebot('up')" id="button12a">Upstairs</a>
        <span id="button12s">Upstairs</span>
        </li>
        <li class="submenu">
        <a href="" onclick="return angebot('jugo')" id="button13a">JuGo h2h</a>
        <span id="button13s">JuGo h2h</span>
        </li>
        <li class="submenu">
        <a href="" onclick="return angebot('cia')" id="button14a">Sport CIA</a>
        <span id="button14s">Sport CIA</span>
        </li>
        <li class="submenu">
        <a href="" onclick="return angebot('jch')" id="button15a">Jugendchor</a>
        <span id="button15s">Jugendchor</span>
        </li>
        <li class="submenu">
        <a href="" onclick="return angebot('so')" id="button16a">Events</a>
        <span id="button16s">Events</span>
        </li>
        </ul>
    </li>

    <li class="topmenu">
    
    <?php 
            $m = date('n');
            $j = date('Y');
            $t = date('d');
    ?>
    <?php echo '<a href="" onclick="return paging(2,'.$m.','.$j.','.$t.');" id="button2a">Kalender</a>';?>
    <span id="button2s">Kalender</span>
    </li>  
    <li class="topmenu">
    <a href="" onclick="return paging(3,0,0,0)" id="button3a">Forum</a>
    <span id="button3s">Forum</span>
    </li>
    <li class="topmenu">
    <a href="" onclick="return paging(4,0,0,0)" id="button4a">Galerie</a>
    <span id="button4s">Galerie</span>
    </li>
    <!--<li class="topmenu">
    <a href="" onclick="return paging(5,0,0,0)" id="button5a">Kontakt</a>
    <span id="button5s">Kontakt</span>
    </li>
    -->
    <li class="topmenu">
    <a href="" onclick="return paging(6,0,0,0)" id="button6a">Intern</a>
    <span id="button6s">Intern</span>
    </li>
    <li class="topmenu">
    <a href="" onclick="return paging(8,0,0,0)" id="button8a">WG</a>
    <span id="button8s">WG</span>
    </li>
   
    </ul>
    
     <script>  //Default-Menü
  document.getElementById('button0a').style.display = "none";

  document.getElementById('button1s').style.display = "none";
  document.getElementById('button2s').style.display = "none";
  document.getElementById('button3s').style.display = "none";
  document.getElementById('button4s').style.display = "none";
  /*document.getElementById('button5s').style.display = "none";*/
  document.getElementById('button6s').style.display = "none";
  document.getElementById('button8s').style.display = "none";
  document.getElementById('button11s').style.display = "none";
  document.getElementById('button12s').style.display = "none";
  document.getElementById('button13s').style.display = "none";
  document.getElementById('button14s').style.display = "none";
  document.getElementById('button15s').style.display = "none";
  document.getElementById('button16s').style.display = "none"; 
  
 </script>

    
    <a href="" onclick="return paging(7,0,0,0);"><img src="/symb/btn_mail.png" style="float:right" width="33px"></a>
    <img src="/symb/btn_yt.png" style="float:right; margin-right:10px" width="34px">
    <a href="https://www.facebook.com/ejoeschelbronn"><img src="/symb/btn_fb.png" style="float:right; margin-right:10px" width="24px"></a>
    
    </div>
  </div>

  
<!--
========================================================================== 
Inhalt
==========================================================================
 -->

  <div id="content">
  <?php include ('start.php');  
  ?>
  </div>



                                                                  
</body>

</html>