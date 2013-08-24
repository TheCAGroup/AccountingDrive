<?php
require 'conf.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->post('/insertVoucher', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());
try{
	
	$date=$request["date"];
	$from=$request["from"];
	$to=$request["to"];
	$toamount=$request["toamount"];
	$narration=$request["narration"];
}
catch (Exception $e) 
	{
	logerrors::writelog('insertVoucher','api/voucher.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
	//$modifiedon=$request["modifiedon"];
	
	
try{
	
$sql="INSERT INTO tbl_accountingvoucher(vouchertype,date,fromledgerid,amount,narration,createdon,createdby,modifiedon,
modifedby) VALUES(:vouchertype,:date,:fromledgerid,:amount,:narration,CURRENT_TIMESTAMP(),:createdby,CURRENT_TIMESTAMP())";

	$conn = getConnection();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('vouchertype','1');
	$stmt->bindParam('date',$date);
	$stmt->bindParam('fromledgerid',$from);
	$stmt->bindParam('amount',$amount);
	$stmt->bindParam('narration',$narration);
	$stmt->bindParam('createdby',$_SESSION['ca_userid']);
	$stmt->bindParam('modifiedby',$_SESSION['ca_userid']);
	$stmt->execute();

	if($stmt->errorCode() == 0) 
		{
		$insert_id = $conn->lastInsertId();
		$app->response()->header('Content-Type', 'application/json');
		echo json_encode($insert_id);
		return;
		} 
	}
	catch (PDOException $e) 
	{
	logerrors::writelog('insertVoucher','api/voucher.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
});

?>