<?php
require 'conf.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$app->get('/ledgerlist', function () use ($app) {
 
	$sql = "select id,companyid,name FROM tbl_ledger";
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


$app->run();
?>