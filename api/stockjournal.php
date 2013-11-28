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
	
	$name=$request[0].name;
	$qty=$request[0].qty;
	$units=$request[0].units;
	$rate=$request[0].rate;
	$amt=$request[0].amt;
	
}
catch (Exception $e) 
	{
	logerrors::writelog('addcompany','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
	//$modifiedon=$request["modifiedon"];
	
	/*
try{
	
$sql="INSERT INTO tbl_company(name,address,country,state,pincode,telephoneno,email,currencysymbol,financialyear,administrator,
currencyname,decimalplaces,symbolfordecimal,amountsinmillions,spacebtwamountandsymbol,decimalplacsforprint,createdby,createdon,modifiedby,
modifiedon) VALUES(:name,:address,:country,:state,:pincode,:telephoneno,:email,:currencysymbol,:financialyear,
:administrator,:currencyname,:decimalplaces,:symbolfordecimal,:amountsinmillions,:spacebtwamountandsymbol,
:decimalplacsforprint,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";

	$conn = getConnection();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('name',$name);
	$stmt->bindParam('address',$address);
	$stmt->bindParam('country',$country);
	$stmt->bindParam('state',$state);
	$stmt->bindParam('pincode',$pincode);
	$stmt->bindParam('telephoneno',$telephoneno);
	$stmt->bindParam('email',$email);
	$stmt->bindParam('currencysymbol',$currencysymbol);
	$stmt->bindParam('financialyear',$financialyear);
	$stmt->bindParam('administrator',$administrator);
	$stmt->bindParam('currencyname',$currencyname);
	$stmt->bindParam('decimalplaces',$decimalplaces);
	$stmt->bindParam('symbolfordecimal',$symbolfordecimal);
	$stmt->bindParam('amountsinmillions',$amountsinmillions);
	$stmt->bindParam('spacebtwamountandsymbol',$spacebtwamountandsymbol);
	$stmt->bindParam('decimalplacsforprint',$decimalplacsforprint);
	$stmt->bindParam('createdby',$_SESSION['ca_loginuserid']);
	$stmt->bindParam('modifiedby',$_SESSION['ca_loginuserid']);
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
	logerrors::writelog('addcompany','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}*/
	
	$app->response()->header('Content-Type', 'application/json');
		echo json_encode($request);
		return;
});



$app->run();
?>