<?php 
if(!defined("INDEX")) die("Halaman tidak ada !");
require_once 'jsonrpcphp/jsonRPCClient.php';

define( 'LS_BASEURL', 'https://survey.stsn-nci.ac.id/index.php/admin/remotecontrol');  // adjust this one to your actual LimeSurvey URL
define( 'LS_USER', 'kelompok4' );
define( 'LS_PASSWORD', 'rahasia' );

// the survey to process
$survey_id=	694525;
$sStatName = 'all';

// instantiate a new client
$myJSONRPCClient = new \org\jsonrpcphp\JsonRPCClient( LS_BASEURL.'/admin/remotecontrol' );
//header("Content-type: application/json");

// receive session key
$sessionKey= $myJSONRPCClient->get_session_key( LS_USER, LS_PASSWORD );
//print_r($sessionKey, null);
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 
		<title>Administrator - Home</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
<!-- Home -->
<div id="home" class="banner-area">

<!-- Backgound Image -->
<div class="bg-image " style="background-image:url(img/lolo.jpg)"></div>
<!-- /Backgound Image -->

<div class="home-wrapper">

	<div class="col-md-10 col-md-offset-1 text-center">
		<div class="home-content">
	<?php
	// // receive surveys list current user can read
	$groups1 = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'all' );
	$groups2 = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'complete' );
	
	$data1 = json_decode(base64_decode($groups1), true);
	$data2 = json_decode(base64_decode($groups2), true);
	
	$jumlahall = $data1['responses'];
	$partisipan = $data2['responses'];
	
	$str="";
	
	$c=0;
	$z=0;
	//pkhp
	$arraySQ001 = [];
	$SQ001="";

	//biro umum
	$arraySQ002 = [];
	$SQ002="";

	// deproh
	$arraySQ003 = [];
	$SQ003="";

	// ristek
	$arraySQ004 = [];
	$SQ004="";

	// depdik
	$arraySQ005 = [];
	$SQ005="";

	// Depor
	$arraySQ006 = [];
	$SQ006="";

	// depsen
	$arraySQ007 = [];
	$SQ007="";

	// depniag
	$arraySQ008 = [];
	$SQ008="";

	// depasrama
	$arraySQ009 = [];
	$SQ009="";

	// depkesma
	$arraySQ010 = [];
	$SQ010="";

	// depsosling
	$arraySQ011 = [];
	$SQ011="";
	
	// echo ("Biro Perencanaan Kemahasiswaan Humas dan Protokol <br>");
	for ($j=1; $j < 2 ; $j++) { 
		for ($i=0; $i < count($jumlahall) ; $i++) {
			$c = $i+1;
			if($c > 84){
				$SQ001 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ00".(string)$j."]"];
				$arraySQ001[$i] = $SQ001;

				$SQ002 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ002]"];
				$arraySQ002[$i] = $SQ002;

				$SQ003 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ003]"];
				$arraySQ003[$i] = $SQ003;

				$SQ004 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ004]"];
				$arraySQ004[$i] = $SQ004;

				$SQ005 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ005]"];
				$arraySQ005[$i] = $SQ005;

				$SQ006 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ006]"];
				$arraySQ006[$i] = $SQ006;

				$SQ007 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ007]"];
				$arraySQ007[$i] = $SQ007;

				$SQ008 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ008]"];
				$arraySQ008[$i] = $SQ008;

				$SQ009 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ009]"];
				$arraySQ009[$i] = $SQ009;

				$SQ010 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ010]"];
				$arraySQ010[$i] = $SQ010;

				$SQ011 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ011]"];
				$arraySQ011[$i] = $SQ011;
			}
			else{
				$SQ001 = $jumlahall[$i][(string)$c]["Bulan1[SQ00".(string)$j."]"];
				$arraySQ001[$i] = $SQ001;

				$SQ002 = $jumlahall[$i][(string)$c]["Bulan1[SQ002]"];
				$arraySQ002[$i] = $SQ002;

				$SQ003 = $jumlahall[$i][(string)$c]["Bulan1[SQ003]"];
				$arraySQ003[$i] = $SQ003;

				$SQ004 = $jumlahall[$i][(string)$c]["Bulan1[SQ004]"];
				$arraySQ004[$i] = $SQ004;

				$SQ005 = $jumlahall[$i][(string)$c]["Bulan1[SQ005]"];
				$arraySQ005[$i] = $SQ005;

				$SQ006 = $jumlahall[$i][(string)$c]["Bulan1[SQ006]"];
				$arraySQ006[$i] = $SQ006;

				$SQ007 = $jumlahall[$i][(string)$c]["Bulan1[SQ007]"];
				$arraySQ007[$i] = $SQ007;

				$SQ008 = $jumlahall[$i][(string)$c]["Bulan1[SQ008]"];
				$arraySQ008[$i] = $SQ008;

				$SQ009 = $jumlahall[$i][(string)$c]["Bulan1[SQ009]"];
				$arraySQ009[$i] = $SQ009;

				$SQ010 = $jumlahall[$i][(string)$c]["Bulan1[SQ010]"];
				$arraySQ010[$i] = $SQ010;

				$SQ011 = $jumlahall[$i][(string)$c]["Bulan1[SQ011]"];
				$arraySQ011[$i] = $SQ011;
			}		
		}
	}
	
	$nilaiPKHP=0;
	$nilaiPKHP = getNilai($arraySQ001,$nilaiPKHP);
	
	$nilaiBirum=0;
	$nilaiBirum = getNilai($arraySQ002,$nilaiBirum);

	$nilaiDeproh=0;
	$nilaiDeproh = getNilai($arraySQ003,$nilaiDeproh);
	
	$nilaiDepristek=0;
	$nilaiDepristek = getNilai($arraySQ004,$nilaiDepristek);
	
	$nilaiDepdik=0;
	$nilaiDepdik = getNilai($arraySQ005,$nilaiDepdik);

	$nilaiDepor=0;
	$nilaiDepor = getNilai($arraySQ006,$nilaiDepor);

	$nilaiDepsen=0;
	$nilaiDepsen = getNilai($arraySQ007,$nilaiDepsen);
	
	$nilaiDepniag=0;
	$nilaiDepniag = getNilai($arraySQ008,$nilaiDepniag);

	$nilaiDepas=0;
	$nilaiDepas = getNilai($arraySQ009,$nilaiDepas);

	$nilaiDepkesma=0;
	$nilaiDepkesma = getNilai($arraySQ010,$nilaiDepkesma);
	
	$nilaiDepsos=0;
	$nilaiDepsos = getNilai($arraySQ011,$nilaiDepsos);

	  function getNilai($arr,$nilai){
	  	foreach ($arr as $a) {
			if ($a == "A1") {
			  $nilai += 10;
			}else if ($a == "A2") {
			  $nilai += 7;
			} else if ($a == "A3") {
			  $nilai += 4;
			} else if ($a == "A4") {
			  $nilai += 1;
			}else if ($a == "A5") {
			  $nilai += -1;
			}else{
			  $nilai +=0;
			}
	 	}
	 	return $nilai;
	  }


	//masuk fase sorting
	$nilai_pref = ["Biro PKHP" => $nilaiPKHP, 
	"Biro Umum" => $nilaiBirum, 
	"Departemen Rohani" => $nilaiDeproh, 
	"Departemen Akademik" => $nilaiDepdik, 
	"Departemen Riset Teknologi" => $nilaiDepristek, 
	"Departemen Olahraga" => $nilaiDepor,
	"Departemen Kesenian" => $nilaiDepsen,
	"Departemen Perniagaan" => $nilaiDepniag,
	"Departemen Asrama" => $nilaiDepas,
	"Departemen Kesejahteraan Mahasiswa" => $nilaiDepkesma,
	"Departemen Sosial dan Lingkungan" => $nilaiDepsos
	];
	
	arsort($nilai_pref);
	
	$rankNamaTinggi = array();
	$rankNilaiTinggi = array();
	foreach($nilai_pref as $org=>$nilai){

		array_push($rankNamaTinggi, $org);
	
	}
	foreach($nilai_pref as $org=>$nilai){
	
		array_push($rankNilaiTinggi, $nilai);
	
	}
	
	asort($nilai_pref);
	// echo "<br> Nilai terendah <br>";
	$rankNamaRendah = array();
	$rankNilaiRendah = array();
	foreach($nilai_pref as $org=>$nilai){
		//echo $org." nilainya ".$nilai."<br>";
		array_push($rankNamaRendah, $org);
		// array_push($rankTinggi, $nilai);
	}
	foreach($nilai_pref as $org=>$nilai){
		//echo $org." nilainya ".$nilai."<br>";
		array_push($rankNilaiRendah, $nilai);
		// array_push($rankTinggi, $nilai);
	}
	

	?>
	<div class="container">
		<canvas id="myChart"></canvas>
	</div>

	<script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    // Chart.defaults.global.defaultFontFamily = 'Lato';
     Chart.defaults.global.defaultFontSize = 12;
     Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'horizontalBar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:<?php echo json_encode($rankNamaTinggi); ?>,
        datasets:[{
          label:'Poin',
          data:
			<?php echo json_encode($rankNilaiTinggi, JSON_NUMERIC_CHECK); ?> 
          ,
        //  backgroundColor:'green',
           backgroundColor:[
             'rgba(255, 99, 132, 0.6)',
             'rgba(54, 162, 235, 0.6)',
             'rgba(255, 206, 86, 0.6)',
             'rgba(75, 192, 192, 0.6)',
             'rgba(153, 102, 255, 0.6)',
             'rgba(255, 159, 64, 0.6)',
             'rgba(255, 99, 132, 0.6)'
           ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Departemen Terbaik',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>

		</div>
	</div>
<center>
	<?php
	echo "<br/><br/><br/>"; 
	echo "<h2>Berdasarkan Hasil Survey Dari ".count($partisipan)." partisipan</h2>" ?>
</center>

</div>

</div>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- /Home -->