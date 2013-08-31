<?php
require 'conf.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//POST route
$app->post('/insertVoucher', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());

	try {
		session_start();
		$date = $request["date"];
		$from = $request["from"];
		$toamount = $request["toamount"];
		$narration = $request["narration"];
		$user=$_SESSION['ca_loginuserid'];
		$vouchertype=1;
	try {
		$sql = "INSERT INTO tbl_accountingvoucher(vouchertype,date,fromledgerid,amount,narration,
		createdon,createdby,modifiedon,modifiedby) VALUES(:vouchertype,:date,:fromledgerid,:amount,
		:narration,CURRENT_TIMESTAMP(),:createdby,CURRENT_TIMESTAMP(),:modifiedby)";

		$conn = getConnection();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('vouchertype', $vouchertype);
		$stmt -> bindParam('date', $date);
		$stmt -> bindParam('fromledgerid', $from);
		$stmt -> bindParam('amount', $toamount);
		$stmt -> bindParam('narration', $narration);
		$stmt -> bindParam('createdby',$user);
		$stmt -> bindParam('modifiedby',$user);
		 
		$stmt -> execute();
		
		if($stmt->errorCode() == 0)
		{
		$insert_id = $conn -> lastInsertId();
		$app -> response() -> header('Content-Type', 'application/json');
		echo json_encode($insert_id);
		return;
		}
	} catch (PDOException $e) {
		logerrors::writelog('insertVoucher_pdo', 'api/voucher.php', $e -> getMessage());
		$app -> response() -> header('Content-Type', 'application/json');
		echo json_encode('-1');
		return;
	}
	} catch (Exception $e) {
		logerrors::writelog('insertVoucher', 'api/voucher.php', $e -> getMessage());
		$app -> response() -> header('Content-Type', 'application/json');
		echo json_encode('-1');
		return;
	}
	
	 
});

$app->run();
?>