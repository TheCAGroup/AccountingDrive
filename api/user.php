<?php
///////////////////////
// PERMISSION ACCESS
// $_SESSION["ca_loginuser"]->permissions['company'][0] - Create
///////////////////////
    require 'conf.php';
    require 'Slim/Slim.php';
	require 'common_classes.php';
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
	$app->post('/checkuser', function () use ($app) {
 
   $request = (array) json_decode($app->request()->getBody());
   // use $request['id'] to query database based on id and create response...
   $id=-1;
   $name=$request['name'];
   $password=$request['password'];
   
	$sql="select id from tbl_users where username=:username and password=:password";
	try {
        $conn = getConnection();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('username',$name);
		$stmt->bindParam('password',$password);
		$stmt->execute();
        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        if(!empty($obj))
		{
			$id=$obj[0]->id;
			session_start();
			$loginobject=new UserLoginInfo();
			$loginobject->userid=$id;
			$loginobject->username=$name;
			$loginobject->permissions=retrievepermissions($id);
			$_SESSION["ca_loginuser"]=$loginobject;
			//$_SESSION["ca_userid"]=$id;
			//$_SESSION["ca_username"]=$name;
			
		}	
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
   $app->response()->header('Content-Type', 'application/json');
   echo json_encode($id);
	});
	
	function retrievepermissions($id)
	{
		$result=array();
		/*
		 * $seasons = array();
$seasons[ ]="Autumn";
$seasons[ ]="Winter";
$seasons[ ]="Spring";
$seasons[ ]="Summer";
		 */
		$sql="SELECT `entityname`, `c`, `r`, `u`, `d` FROM `tbl_userpermissions` WHERE `userid`=:userid";
	try {
        $conn = getConnection();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam('userid',$id);
		$stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
		$res=array();
		foreach ($rows as $row) {
			$res[$row['entityname']] = array($row['c'],$row['r'],$row['u'],$row['d']);
			//$res[]=array($row['entityname']=>array($row['c'],$row['r'],$row['u'],$row['d']));
		    //echo $row['entityname'];
			}
	}
	catch(exception $ex)
	{echo $ex;}
	return $res;
	}
	$app->run();
		
?>
