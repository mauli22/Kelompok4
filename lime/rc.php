<?php
/* Remind to download and put files in https://github.com/weberhofer/jsonrpcphp at the good place */
require_once './jsonrpcphp/jsonRPCClient.php';

/*
$rpcUrl="https://survey.stsn-nci.ac.id/index.php/admin/remotecontrol ";

$rpcUser="kelompok4";
$rpcPassword="rahasia";


$lsJSONRPCClient = new \org\jsonrpcphp\jsonRPCClient($rpcUrl);
$sessionKey= $lsJSONRPCClient->get_session_key($rpcUser,$rpcPassword );
//~ If an error happen
if(is_array($sessionKey))
{
    header("Content-type: application/json");
    echo json_encode($sessionKey);
    die();
}
$response=$lsJSONRPCClient->list_surveys($sessionKey,null);

header("Content-type: application/json");
//~ For big array : base64 encoded
if(is_array($response)){
    echo json_encode($response);
} else {
    print_r(base64_decode($response), null );
}
//~ release the session key
$lsJSONRPCClient->release_session_key( $sessionKey );
*/
define( 'LS_BASEURL', 'https://survey.stsn-nci.ac.id/index.php/admin/remotecontrol');  // adjust this one to your actual LimeSurvey URL
define( 'LS_USER', 'kelompok4' );
define( 'LS_PASSWORD', 'rahasia' );

// the survey to process
$survey_id=	694525;
$sStatName = 'all';

// instantiate a new client
$myJSONRPCClient = new \org\jsonrpcphp\JsonRPCClient( LS_BASEURL.'/admin/remotecontrol' );

// receive session key
$sessionKey= $myJSONRPCClient->get_session_key( LS_USER, LS_PASSWORD );
//print_r($sessionKey, null);

// // receive surveys list current user can read
// $groups = $myJSONRPCClient->list_surveys( $sessionKey );
// print_r($groups, null );

$sum = $myJSONRPCClient->get_summary( $sessionKey, $survey_id, $sStatName );
print_r($sum, null );

// release the session key
$myJSONRPCClient->release_session_key( $sessionKey );