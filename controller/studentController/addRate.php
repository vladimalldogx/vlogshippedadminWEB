<?php
require '../../model/subscriptionModel.php';
$subs = new Subscription();
$data = file_get_contents("php://input");
$request = json_decode($data);
$subs->addRate($request->m_rate, $request->a_rate);
