<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers:Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// เรียกใช้ไฟล์ที่เกี่ยวข้อง
require_once "../connectDB.php";
require_once "../models/m_007.php";

// สร้าง instance ของการติต่อฐานข้อมูล
$connDB = new ConnectDB();
$m_007 = new M_007($connDB->getConnectDB());

$result = $m_007->getAllTask();

// ตรวจสอบผลลัพธ์ที่ได้จากการทำงานกับตาราง
if ($result->rowCount() > 0) {
  $dataInfo = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $dataArray = array(
      "msgresult" => "1",
      "id" => $row["id"],
      "taskName" => $row["taskName"],
      "taskDetail" => $row["taskDetail"],
      "taskStatus" => $row["taskStatus"],
      "createdAt" => $row["createdAt"]
    );
    array_push($dataInfo, $dataArray);
  }

  echo json_encode($dataInfo);
} else {
  $dataInfo = array();
  $dataArray = array(
    "msgresult" => "0"
  );

  array_push($dataInfo, $dataArray);
  echo json_encode($dataInfo);
}
