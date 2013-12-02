<?php
require 'conf.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->get('/stockitemlist', function () use ($app) {
 
	$sql = "select id,name FROM tbl_stockitem";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($items);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
 
});

$app->post('/addjournalentry', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());
	
	
try{
	$data=$request[0];
	
	$vouchertype=1;
	$name=$data->result[0]->name;
	$qty=$data->result[0]->qty;
	$units=$data->result[0]->units;
	$rate=$data->result[0]->rate;
	$amt=$data->result[0]->amt;
	
	$stockitemid=1;
	
}
catch (Exception $e) 
	{
	logerrors::writelog('addstockjournalentry','api/stockjournal.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-3');
	return;
	}
	
	
try{
	
$sql="INSERT INTO tbl_inventoryvoucher(vouchertype,createdby,createdon,modifiedby,
modifiedon) VALUES(:vouchertype,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";

	$conn = getConnection();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('vouchertype',$vouchertype);
	$stmt->bindParam('createdby',$_SESSION['ca_loginuserid']);
	$stmt->bindParam('modifiedby',$_SESSION['ca_loginuserid']);
	$stmt->execute();

	if($stmt->errorCode() == 0) 
		{
		$insert_id = $conn->lastInsertId();
		try{
	
		$sql2="INSERT INTO tbl_inventoryvoucherlist(inventoryvoucherid,inventory,quantity,rate,createdby,createdon,modifiedby,
		modifiedon) VALUES(:vouchertype,:inventory,:quantity,:rate,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";
		
			$conn2 = getConnection();
			$stmt2 = $conn2->prepare($sql2);
		
			$stmt2->bindParam('inventoryvoucherid',$insert_id);
			$stmt2->bindParam('inventory',$stockitemid);
			$stmt2->bindParam('quantity',$qty);
			$stmt2->bindParam('rate',$rate);
			$stmt2->bindParam('createdby',$_SESSION['ca_loginuserid']);
			$stmt2->bindParam('modifiedby',$_SESSION['ca_loginuserid']);
			$stmt2->execute();
		
			if($stmt2->errorCode() == 0) 
				{
				$insert_id1 = $conn2->lastInsertId();
				$app->response()->header('Content-Type', 'application/json');
				echo json_encode($insert_id);
				return;
				} 
			}
			catch (PDOException $e) 
			{
			logerrors::writelog('addstockjournalentry','api/stockjournal.php',$e->getMessage());
			$app->response()->header('Content-Type', 'application/json');
			echo json_encode('-1');
			return;
			}				
		} 
	}
	catch (PDOException $e) 
	{
	logerrors::writelog('addstockjournalentry','api/stockjournal.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-2');
	return;
	}
	
});



$app->run();
?>