<?php
    require 'conf.php';
    require 'Slim/Slim.php';
	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();
	
	$app->get('/userlist', function () use ($app) {
 		 $sql = "select id,username FROM tbl_users";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($users);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
	});
	
	//return userid when given username and password
	$app->get('/checkuser/:name', function () use ($app) {
 
   $request = (array) json_decode($app->request()->getBody());
   var_dump($request);
   // use $request['id'] to query database based on id and create response...
   
   $name=$request['name'];
   //$password=$request['password'];

	$response['userid']=$request['name'];
   $app->response()->header('Content-Type', 'application/json');
   echo json_encode($response);
 
	});
	
	$app->run();
		
?>
