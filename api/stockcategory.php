<?php
require 'Slim/Slim.php';
require 'logerrors.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->get('/company', function () use ($app) {
 
	// get all artists
 
});

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


// POST route
$app->post('/addstock', function () use ($app) {
	$request = (array) json_decode($app->request()->getBody());
try{
	$createdby=1;//$_SESSION["createdby"];
	$modifiedby=1;//$_SESSION["modifiedby"];
	$name=$request["name"];
	$alias=$request["alias"];
	}
catch (Exception $e) 
	{
	logerrors:: writelog('addstock','api/stock.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
	}

try
	{
	$conn=getConnection();
	$sql= "insert into tbl_stockcategory(name,alias,companyid,createdby,createdon,modifiedby,modifiedon) values (:name,:alias,:companyid,:createdby,CURRENT_TIMESTAMP(),:modifiedby,CURRENT_TIMESTAMP())";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam('name',$name);
	$stmt->bindParam('alias',$alias);
	$stmt->bindParam('companyid',$companyid);
	$stmt->bindParam('createdby',$createdby);
	$stmt->bindParam('modifiedby',$modifiedby);
	$stmt->execute();			
	
	if($stmt->errorCode() == 0) {
		$insert_id = $conn->lastInsertId();
	} else {
		$insert_id=-1;
		$errors = $stmt->errorInfo();
		//echo($errors[2]);
		}
	}
catch (PDOException $e) 
	{
	logerrors::writelog('addstock','api/stock.php',$e->getMessage());
	$app->response()->header('Content-Type', 'application/json');
	echo json_encode('-1');
	return;
}
echo json_encode($insert_id);
});

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

$app->run();


