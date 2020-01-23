<?php 
if(!defined("INDEX")) die("Halaman tidak ada !");
/* Remind to download and put files in https://github.com/weberhofer/jsonrpcphp at the good place */
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

<div class="container">
	
		<center>
			<h4>Departemen Kesejahteraan Mahasiswa</h4>
			<h6>Hasil Penilaian Responden Pada Departemen Kesejahteraan Mahasiswa</h6>
		</center>
		<br/><br/>

		<?php
			//receive surveys list current user can read
			$groups1 = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'all' );
			$groups = $myJSONRPCClient->export_responses( $sessionKey, $survey_id, 'json', null, 'complete' );
			$data1 = json_decode(base64_decode($groups1), true);
			$data2 = json_decode(base64_decode($groups), true);
			$jumlahall = $data1['responses'];
			$jumlah_comp = $data2['responses'];

			$arraySQ010 = [];
			$str="";
			$SQ010="";
			$c=0;

			for ($i=0; $i < count($jumlahall) ; $i++) {
				$c = $i+1;
				if($c > 84){
					$SQ010 = $jumlahall[$i][(string)$c+1]["Bulan1[SQ010]"];
					$arraySQ010[$i] = $SQ010;
				}else{
					$SQ010 = $jumlahall[$i][(string)$c]["Bulan1[SQ010]"];
					$arraySQ010[$i] = $SQ010;
				}		
			}

			$jumlahA1=0;
			$jumlahA2=0;
			$jumlahA3=0;
			$jumlahA4=0;
			$jumlahA5=0;
			foreach ($arraySQ010 as $a) {
				if ($a == "A1") {
				  	$jumlahA1 +=1;
				}else if ($a == "A2") {
					$jumlahA2 +=1;
				} else if ($a == "A3") {
					$jumlahA3 +=1;
				} else if ($a == "A4") {
					$jumlahA4 +=1;
				}else if ($a == "A5") {
					$jumlahA5 +=1;
				}
			}
			// echo count($arraySQ001);
		?>
		
		<table class="table">
				<thead>
					<tr>
						<th scope="col">Jawaban</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Persentase</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>Sangat Puas</td>
						<td>  
							<?php echo $jumlahA1; ?>
						</td>
						<td><?php echo round($jumlahA1/count($jumlah_comp)*100, 2)."%"; ?></td>
					</tr>
					<tr>
						<td>Puas</td>
						<td><?php echo $jumlahA2; ?></td>
						<td><?php echo round($jumlahA2/count($jumlah_comp)*100, 2)."%"; ?></td>
					</tr>
					<tr>
						<td>Cukup</td>
						<td><?php echo $jumlahA3; ?></td>
						<td><?php echo round($jumlahA3/count($jumlah_comp)*100, 2)."%"; ?></td>
					</tr>
					<tr>
						<td>Kurang Puas</td>
						<td><?php echo $jumlahA4; ?></td>
						<td><?php echo round($jumlahA4/count($jumlah_comp)*100, 2)."%"; ?></td>
					</tr>
					<tr>
						<td>Tidak Puas</td>
						<td><?php echo $jumlahA5; ?></td>
						<td><?php echo round($jumlahA5/count($jumlah_comp)*100, 2)."%"; ?></td>
					</tr>
				</tbody>
			</table>

		<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
			Tampilkan Grafik
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Grafik Departemen Kesejahteraan Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="chart-container" style="position: relative; height:40vh; width:40vw">
						<canvas id="chart"  ></canvas>
					</div>

					<script>
						let myChart = document.getElementById('chart').getContext('2d');

						// Global Options
						// Chart.defaults.global.defaultFontFamily = 'Lato';
						Chart.defaults.global.defaultFontSize = 12;
						Chart.defaults.global.defaultFontColor = '#777';

						let massPopChart = new Chart(myChart, {
						type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
						data:{
							labels:["Sangat Puas", "Puas", "Cukup", "Kurang Puas", "Tidak Puas"],
							datasets:[{
							label:'Poin',
							data:
								[
									<?= $jumlahA1 ?>,
									<?= $jumlahA2 ?>,
									<?= $jumlahA3 ?>,
									<?= $jumlahA4 ?>,
									<?= $jumlahA5 ?>
								]
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
							text:'Departemen Kesejahteraan Mahasiswa',
							fontSize:14
							},
							legend:{
							display:true,
							position:'bottom',
							labels:{
								fontColor:'#000'
							}
							},
							layout:{
							padding:{
								left:0,
								right:0,
								bottom:0,
								top:0
							}
							},
							tooltips:{
							enabled:true
							},
							maintainAspectRatio: false
						}
						});
					</script>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				</div>
				</div>
			</div>
			</div>

	</div>

</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- /Home -->