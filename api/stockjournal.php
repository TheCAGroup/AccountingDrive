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
	
	$vouchertype=1;
	
try{
	
$sql="INSERT INTO tbl_inventoryvoucher(vouchertype,createdby,createdon,modifiedby,
modifiedon) VALUES(:vouchertype,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";

	$conn = getConnection();
	//$conn->beginTransaction ();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('vouchertype',$vouchertype);
	$stmt->bindParam('createdby',$_SESSION['ca_loginuserid']);
	$stmt->bindParam('modifiedby',$_SESSION['ca_loginuserid']);
	$stmt->execute();

	if($stmt->errorCode() == 0) 
	{
		$insert_id = $conn->lastInsertId();
		try{
					
			$data=$request[0];
			$sizeofdata=sizeof($data->result);
				
			for ($i=0; $i < $sizeofdata; $i++) { 
		
				$name=$data->result[$i]->name;
				$qty=$data->result[$i]->qty;
				$units=$data->result[$i]->units;
				$rate=$data->result[$i]->rate;
				$amt=$data->result[$i]->amt;
			
				$sql="INSERT INTO tbl_inventoryvoucherlist(inventoryvoucherid,inventory,quantity,rate,createdby,createdon,modifiedby,
				modifiedon) VALUES(:inventoryvoucherid,(select id from tbl_stockitem where name=:name),:quantity,:rate,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";
				
				//$conn2 = getConnection();
				$stmt = $conn->prepare($sql);
			
				$stmt->bindParam('inventoryvoucherid',$insert_id);
				$stmt->bindParam('name',$name);
				$stmt->bindParam('quantity',$qty);
				$stmt->bindParam('rate',$rate);
				$stmt->bindParam('createdby',$_SESSION['ca_loginuserid']);
				$stmt->bindParam('modifiedby',$_SESSION['ca_loginuserid']);
				$stmt->execute();		 
			}
			
			if($stmt->errorCode() == 0) 
			{
				$lastinsertid = $conn->lastInsertId();
				$app->response()->header('Content-Type', 'application/json');
				echo json_encode($lastinsertid);
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
	//$conn->commit(); 
}
catch (PDOException $e) 
{
	//if(isset($conn))
	//	$conn->rollback();
	
	logerrors::writelog('addstockjournalentry','api/stockjournal.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-2');
	return;
}
	
});



$app->run();
?>