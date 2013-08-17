<?php
require 'conf.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->get('/companylist', function () use ($app) {
 
	$sql = "select id,name FROM tbl_company";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $company = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($company);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
 
});

 // GET route with parameter
$app->get('/companydetails/:id', function ($id) use ($app) {
 
   $sql = "select `id`,`name`, `address`, `country`, `state`, `pincode`, `telephoneno`, `email`, 
   `currencysymbol`, `financialyear`, `administrator`, `currencyname`, `decimalplaces`, 
   `symbolfordecimal`, `amountsinmillions`, `spacebtwamountandsymbol`, `decimalplacsforprint`, `createdby`, 
   `createdon`, `modifiedby`, `modifiedon` from `tbl_company` WHERE id=:id";
    try {
        $conn = getConnection();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('id',$id);
		
    	$stmt->execute();    
        $company = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($company);
    } catch(PDOException $e) {
        logerrors::writelog('companydetails','api/company.php/companydetails/id',$e->getMessage());
		$app->response()->header('Content-Type', 'application/json');
		echo json_encode('-1');
		return;
    }
});


// POST route
$app->post('/addcompany', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());
try{
	
	$name=$request["name"];
	$address=$request["address"];
	$country=$request["country"];
	$state=$request["state"];
	$pincode=$request["pincode"];
	$telephoneno=$request["telephoneno"];
	$email=$request["email"];
	$currencysymbol=$request["currencysymbol"];
	$financialyear=$request["financialyear"];
	$administrator=$request["administrator"];
	$currencyname=$request["currencyname"];
	$decimalplaces=$request["decimalplaces"];
	$symbolfordecimal=$request["symbolfordecimal"];
	$amountsinmillions=$request["amountsinmillions"];
	$spacebtwamountandsymbol=$request["spacebtwamountandsymbol"];
	$decimalplacsforprint=$request["decimalplacsforprint"];
}
catch (Exception $e) 
	{
	logerrors::writelog('addcompany','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
	//$modifiedon=$request["modifiedon"];
	
	
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
	logerrors::writelog('addcompany','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
});


$app->put('/updatecompany/:id', function ($id) use ($app) {
	$request = (array) json_decode($app->request()->getBody());
try{
	$name=$request["name"];
	$address=$request["address"];
	$country=$request["country"];
	$state=$request["state"];
	$pincode=$request["pincode"];
	$telephoneno=$request["telephoneno"];
	$email=$request["email"];
	$currencysymbol=$request["currencysymbol"];
	$financialyear=$request["financialyear"];
	$administrator=$request["administrator"];
	$currencyname=$request["currencyname"];
	$decimalplaces=$request["decimalplaces"];
	$symbolfordecimal=$request["symbolfordecimal"];
	$amountsinmillions=$request["amountsinmillions"];
	$spacebtwamountandsymbol=$request["spacebtwamountandsymbol"];
	$decimalplacsforprint=$request["decimalplacsforprint"];
}
catch (Exception $e) 
	{
	logerrors::writelog('updatecompany1','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
try{
	
	$sql="UPDATE tbl_company SET name=:name,address=:address,country=:country,state=:state,
	pincode=:pincode,telephoneno=:telephoneno,email=:email,currencysymbol=:currencysymbol,
	financialyear=:financialyear,administrator=:administrator,currencyname=:currencyname,
	decimalplaces=:decimalplaces,symbolfordecimal=:symbolfordecimal,
	amountsinmillions=:amountsinmillions,spacebtwamountandsymbol=:spacebtwamountandsymbol,
	decimalplacsforprint=:decimalplacsforprint,modifiedby=:modifiedby,modifiedon=CURRENT_TIMESTAMP() where id=:id";

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
	$stmt->bindParam('modifiedby',$modifiedby);
	$stmt->bindParam('id',$id);
	$stmt->execute();

	if($stmt->errorCode() == 0) 
		{
		$app->response()->header('Content-Type', 'application/json');
		echo json_encode($id);
		return;
		} 
	}
	catch (PDOException $e) 
	{
	logerrors::writelog('updatecompany2','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
});


$app->delete('/deletecompany/:id', function ($id) use ($app) {
	//$request = (array) json_decode($app->request()->getBody());

try{
	
	$sql="DELETE FROM tbl_company WHERE id=:id";

	$conn = getConnection();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('id',$id);
	$stmt->execute();

	if($stmt->errorCode() == 0) 
		{
		$app->response()->header('Content-Type', 'application/json');
		echo json_encode($id);
		return;
		} 
	}
	catch (PDOException $e) 
	{
	logerrors::writelog('deletecompany','api/company.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}
});


$app->run();
?>
