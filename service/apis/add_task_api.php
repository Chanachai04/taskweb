<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers:Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// เรียกใช้ไฟล์ที่เกี่ยวข้อง
require_once "../connectDB.php";
require_once "../models/m_007.php";

// สร้าง instance ของการติต่อฐานข้อมูล
$connDB = new ConnectDB();
$m_007 = new M_007($connDB->getConnectDB());

// ร้างตัวแปรที่รับข้อมูลมาจากการเรียกใช้ api
$data = json_decode(file_get_contents("php://input"));
$result = $m_007->addTask($data->taskName, $data->taskDetail, $data->taskStatus);
if ($result == true) {
  $dataInfo = array();
  $dataArray = array(
    "msgresult" => "1"
  );

  array_push($dataInfo, $dataArray);
  echo json_encode($dataInfo);
} else {
  $dataInfo = array();
  $dataArray = array(
    "msgresult" => "0"
  );

  array_push($dataInfo, $dataArray);
  echo json_encode($dataInfo);
}
