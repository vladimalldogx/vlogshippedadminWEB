<?php
require '../../model/subscriptionModel.php';
$subs = new Subscription();
echo json_encode($subs->getAllSubs());