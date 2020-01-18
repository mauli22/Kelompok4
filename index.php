<?php
/* Remind to download and put files in https://github.com/weberhofer/jsonrpcphp at the good place */
require_once './jsonrpcphp/jsonRPCClient.php';

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


// $sum = $myJSONRPCClient->get_summary( $sessionKey, $survey_id, $sStatName );
// print_r($sum, null );

// release the session key
//$myJSONRPCClient->release_session_key( $sessionKey );
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			<a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link" href="#">Features</a>
			<a class="nav-item nav-link" href="#">Pricing</a>
			<a class="nav-item nav-link disabled" href="#">Disabled</a>
			<a class="btn btn-outline-success my-2 my-sm-0" href="./../logout.php"> Logout</a>
			</div>
		</div>	
	</div>
	</nav>

	<h1>Hello, world!</h1>

	<?php
	// receive surveys list current user can read
	//$groups = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'complete' );
	$groups1 = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'all' );
	//print_r(base64_decode($groups), null );
	//$data = json_decode(base64_decode($groups), true);
	$data1 = json_decode(base64_decode($groups1), true);
	//var_dump($data);
	//$complete = $data['responses'];
	$jumlahall = $data1['responses'];
	$arraySQ001 = [];
	$str="";
	$SQ001="";
	$c=0;
	//print_r($data);
	echo ("pkhp <br>");
	for ($i=0; $i < count($jumlahall) ; $i++) {
		// $x=0;
		$c +=1;
		 if($c == 85) {
		 	$SQ001 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ001]"];
			$arraySQ001[$i] = $x;
		 }else{
		 	$SQ001 = $jumlahall[$i][(string)$c]["Bulan1[SQ001]"];
		 	$arraySQ001[$i] = $SQ001;
		 }
	}
	$nilaiPKHP=0;
	foreach ($arraySQ001 as $a) {
		if ($a == "A1") {
		  $nilaiPKHP +=5;
		}else if ($a == "A2") {
		  $nilaiPKHP +=4;
		} else if ($a == "A3") {
		  $nilaiPKHP +=3;
		} else if ($a == "A2") {
		  $nilaiPKHP +=2;
		}else if ($a == "A1") {
		  $nilaiPKHP +=1;
		}else{
		  $nilaiPKHP +=0;
		}
	}
	echo "nilai PKHP = ".$nilaiPKHP;

	echo ("<br> birum <br>");
	$arraySQ002 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ002 = $jumlahall[$i][(string)$c]["Bulan1[SQ002]"];
		$arraySQ002[$i] = $SQ002;
		//print_r($arraySQ002);
	}
	$nilaiBirum=0;
	foreach ($arraySQ002 as $a) {
		if ($a == "A1") {
		  $nilaiBirum +=5;
		}else if ($a == "A2") {
		  $nilaiBirum +=4;
		} else if ($a == "A3") {
		  $nilaiBirum +=3;
		} else if ($a == "A2") {
		  $nilaiBirum +=2;
		}else if ($a == "A1") {
		  $nilaiBirum +=1;
		}else{
		  $nilaiBirum +=0;
		}
	  }
	echo "nilai Biro Umum = ".$nilaiBirum;

	echo ("<br> Departemen Rohani <br>");
	$arraySQ003 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ003 = $jumlahall[$i][(string)$c]["Bulan1[SQ003]"];
		$arraySQ003[$i] = $SQ003;
		//print_r($arraySQ003);
	}
	$nilaiDeproh=0;
	foreach ($arraySQ003 as $a) {
		if ($a == "A1") {
		  $nilaiDeproh +=5;
		}else if ($a == "A2") {
		  $nilaiDeproh +=4;
		} else if ($a == "A3") {
		  $nilaiDeproh +=3;
		} else if ($a == "A2") {
		  $nilaiDeproh +=2;
		}else if ($a == "A1") {
		  $nilaiDeproh +=1;
		}else{
		  $nilaiDeproh +=0;
		}
	  }
	echo "nilai Departemen Rohani = ".$nilaiDeproh;

	echo ("<br> Departemen Riset Pengembangan Teknologi <br>");
	$arraySQ004 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ004 = $jumlahall[$i][(string)$c]["Bulan1[SQ004]"];
		$arraySQ004[$i] = $SQ004;
		//print_r($arraySQ004);
	}
	$nilaiDepristek=0;
	foreach ($arraySQ004 as $a) {
		if ($a == "A1") {
		  $nilaiDepristek +=5;
		}else if ($a == "A2") {
		  $nilaiDepristek +=4;
		} else if ($a == "A3") {
		  $nilaiDepristek +=3;
		} else if ($a == "A2") {
		  $nilaiDepristek +=2;
		}else if ($a == "A1") {
		  $nilaiDepristek +=1;
		}else{
		  $nilaiDepristek +=0;
		}
	  }
	echo "nilai Departemen Riset Pengembangan Teknologi = ".$nilaiDepristek;

	echo ("<br> Departemen Akademik Mahasiswa <br>");
	$arraySQ005 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ005 = $jumlahall[$i][(string)$c]["Bulan1[SQ005]"];
		$arraySQ005[$i] = $SQ005;
		//print_r($arraySQ005);
	}
	$nilaiDepdik=0;
	foreach ($arraySQ005 as $a) {
		if ($a == "A1") {
		  $nilaiDepdik +=5;
		}else if ($a == "A2") {
		  $nilaiDepdik +=4;
		} else if ($a == "A3") {
		  $nilaiDepdik +=3;
		} else if ($a == "A2") {
		  $nilaiDepdik +=2;
		}else if ($a == "A1") {
		  $nilaiDepdik +=1;
		}else{
		  $nilaiDepdik +=0;
		}
	  }
	echo "nilai Departemen Akademik Mahasiswa = ".$nilaiDepdik;

	echo ("<br> Departemen Olahraga <br>");
	$arraySQ006 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ006 = $jumlahall[$i][(string)$c]["Bulan1[SQ006]"];
		$arraySQ006[$i] = $SQ006;
		//print_r($arraySQ006);
	}
	$nilaiDepor=0;
	foreach ($arraySQ006 as $a) {
		if ($a == "A1") {
		  $nilaiDepor +=5;
		}else if ($a == "A2") {
		  $nilaiDepor +=4;
		} else if ($a == "A3") {
		  $nilaiDepor +=3;
		} else if ($a == "A2") {
		  $nilaiDepor +=2;
		}else if ($a == "A1") {
		  $nilaiDepor +=1;
		}else{
		  $nilaiDepor +=0;
		}
	  }
	echo "nilai Departemen Olahraga = ".$nilaiDepor;

	echo ("<br> Departemen Kesenian <br>");
	$arraySQ007 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ007 = $jumlahall[$i][(string)$c]["Bulan1[SQ007]"];
		$arraySQ007[$i] = $SQ007;
		//print_r($arraySQ007);
	}
	$nilaiDepsen=0;
	foreach ($arraySQ007 as $a) {
		if ($a == "A1") {
		  $nilaiDepsen +=5;
		}else if ($a == "A2") {
		  $nilaiDepsen +=4;
		} else if ($a == "A3") {
		  $nilaiDepsen +=3;
		} else if ($a == "A2") {
		  $nilaiDepsen +=2;
		}else if ($a == "A1") {
		  $nilaiDepsen +=1;
		}else{
		  $nilaiDepsen +=0;
		}
	  }
	echo "nilai Departemen Kesenian = ".$nilaiDepsen;

	echo ("<br> Departemen Perniagaan <br>");
	$arraySQ008 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ008 = $jumlahall[$i][(string)$c]["Bulan1[SQ008]"];
		$arraySQ008[$i] = $SQ008;
		//print_r($arraySQ008);
	}
	$nilaiDepniag=0;
	foreach ($arraySQ008 as $a) {
		if ($a == "A1") {
		  $nilaiDepniag +=5;
		}else if ($a == "A2") {
		  $nilaiDepniag +=4;
		} else if ($a == "A3") {
		  $nilaiDepniag +=3;
		} else if ($a == "A2") {
		  $nilaiDepniag +=2;
		}else if ($a == "A1") {
		  $nilaiDepniag +=1;
		}else{
		  $nilaiDepniag +=0;
		}
	  }
	echo "nilai Departemen Perniagaan = ".$nilaiDepniag;

	echo ("<br> Departemen Asrama <br>");
	$arraySQ009 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ009 = $jumlahall[$i][(string)$c]["Bulan1[SQ009]"];
		$arraySQ009[$i] = $SQ009;
		//print_r($arraySQ009);
	}
	$nilaiDepas=0;
	foreach ($arraySQ009 as $a) {
		if ($a == "A1") {
		  $nilaiDepas +=5;
		}else if ($a == "A2") {
		  $nilaiDepas +=4;
		} else if ($a == "A3") {
		  $nilaiDepas +=3;
		} else if ($a == "A2") {
		  $nilaiDepas +=2;
		}else if ($a == "A1") {
		  $nilaiDepas +=1;
		}else{
		  $nilaiDepas +=0;
		}
	  }
	echo "nilai Departemen Asrama = ".$nilaiDepas;

	echo ("<br> Departemen Kesenian <br>");
	$arraySQ010 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ010 = $jumlahall[$i][(string)$c]["Bulan1[SQ010]"];
		$arraySQ010[$i] = $SQ010;
		//print_r($arraySQ010);
	}
	$nilaiDepkesma=0;
	foreach ($arraySQ010 as $a) {
		if ($a == "A1") {
		  $nilaiDepkesma +=5;
		}else if ($a == "A2") {
		  $nilaiDepkesma +=4;
		} else if ($a == "A3") {
		  $nilaiDepkesma +=3;
		} else if ($a == "A2") {
		  $nilaiDepkesma +=2;
		}else if ($a == "A1") {
		  $nilaiDepkesma +=1;
		}else{
		  $nilaiDepkesma +=0;
		}
	  }
	echo "nilai Departemen Kesejahteraan Mahasiswa = ".$nilaiDepkesma;

	echo ("<br> Departemen Sosial dan Lingkungan <br>");
	$arraySQ011 = [];
	for ($i=0; $i < count($jumlahall)-7 ; $i++) {
		$c = $i+1;
		$SQ011 = $jumlahall[$i][(string)$c]["Bulan1[SQ011]"];
		$arraySQ011[$i] = $SQ011;
		//print_r($arraySQ011);
	}
	$nilaiDepsos=0;
	foreach ($arraySQ011 as $a) {
		if ($a == "A1") {
		  $nilaiDepsos +=5;
		}else if ($a == "A2") {
		  $nilaiDepsos +=4;
		} else if ($a == "A3") {
		  $nilaiDepsos +=3;
		} else if ($a == "A2") {
		  $nilaiDepsos +=2;
		}else if ($a == "A1") {
		  $nilaiDepsos +=1;
		}else{
		  $nilaiDepsos +=0;
		}
	  }
	echo "nilai Departemen Sosial dan Lingkungan = ".$nilaiDepsos;

	?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="script.js"></script>
  </body>
</html>
