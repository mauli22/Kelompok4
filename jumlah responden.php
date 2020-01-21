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
	// // receive surveys list current user can read
 	$groups1 = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'all' );
 	$groups = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'complete' );
	//print_r(base64_decode($groups), null );
	$data1 = json_decode(base64_decode($groups1), true);
	$data2 = json_decode(base64_decode($groups), true);
	$jumlahall = $data1['responses'];
	$jumlaha_complete = $data2['responses'];
	$str="";
	$x="";
	$arr_pkhp = [];
	$arr_birum = [];
	$arr_deproh = [];
	$arr_ristek = [];
	$arr_akademik = [];
	$arr_niag = [];
	$arr_senma = [];
	$arr_depor = [];
	$arr_asrama = [];
	$arr_depkes = [];
	$arr_depsosling = [];
	$c=0;
	echo "Jumlah seluruhnya ".count($jumlahall)." orang<br>";
	echo "Jumlah mengisi ".count($jumlaha_complete)." orang<br>";
	// $x = $jumlahall[3][4]['Bulan1[SQ001]'];
	//print_r($jumlahall);
	 for ($i =0; $i < count($jumlahall) ; $i++) {
	 	$c +=1;
	 	if ($c > 84) {
	 		$x = $jumlahall[$i][(string)$c+1]['Bulan1[SQ001]'];
	 		$ray[$i] = $x;
	 	} else{
	 		$x = $jumlahall[$i][(string)$c]['Bulan1[SQ001]'];
	 		$ray[$i] = $x;
	 	}
	 }
	 $nilaiPKHP=0;
	foreach ($ray as $a) {
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
	echo "nilaiPKHP = ".$nilaiPKHP;
	//echo($data);
	//print_r($x);
	 



	?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="script.js"></script>
  </body>
</html>
