<?php
include "./Admin.php";
$form = new Admin();
$form->register();
$serverResponse = ["response" => $form->queryStatus];
echo json_encode($serverResponse);
