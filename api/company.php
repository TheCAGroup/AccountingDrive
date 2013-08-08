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
/*
 // GET route with parameter
$app->get('/company/:id', function () use ($app) {
 
   $request = (array) json_decode($app->request()->getBody());
   
   // use $request['id'] to query database based on id and create response...
   
   $response['id'] = 1;
   $response['name'] = "Mike Jones";
   $response['favoriteColor'] = "blue";
   $response['favoriteFood'] = "tacos";
   $app->response()->header('Content-Type', 'application/json');
   echo json_encode($response);
 
});
*/


// POST route
$app->post('/addcompany', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());
try{
	
	$name=$request["name"];
	$mailingname=$request["mailingname"];
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
	$createdby=$request["createdby"];
	//$createdon=$request["createdon"];
	$modifiedby=$request["modifiedby"];
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
	
$sql="INSERT INTO tbl_company(name,mailingname,address,country,state,pincode,telephoneno,email,currencysymbol,financialyear,administrator,
currencyname,decimalplaces,symbolfordecimal,amountsinmillions,spacebtwamountandsymbol,decimalplacsforprint,createdby,createdon,modifiedby,
modifiedon) VALUES(:name,:mailingname,:address,:country,:state,:pincode,:telephoneno,:email,:currencysymbol,:financialyear,
:administrator,:currencyname,:decimalplaces,:symbolfordecimal,:amountsinmillions,:spacebtwamountandsymbol,
:decimalplacsforprint,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";

	$conn = getConnection();
	$stmt = $conn->prepare($sql);

	$stmt->bindParam('name',$name);
	$stmt->bindParam('mailingname',$mailingname);
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
	$stmt->bindParam('createdby',$createdby);
	$stmt->bindParam('modifiedby',$modifiedby);
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

/*
// PUT route
$app->put('/company/:id', function () use ($app) {

	$request = (array) json_decode($app->request()->getBody());
	
	// use $request['id'] to update database based on id and create response...
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($request);
	
});

// DELETE route
$app->delete('/company/:id', function () use ($app) {

	$request = (array) json_decode($app->request()->getBody());	
	
	//use $request['id'] to remove database entry based on id...
	
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode($request);
});
*/

$app->run();
?>
