 <?php
  class M_007
  {
    private $connDB;

    // ตัวแปรที่ล้อกับข้อมูลในฐานข้อมูล
    public $id;
    public $taskName;
    public $taskDetail;

    public $msg;

    public function __construct($connDB)
    {
      $this->connDB = $connDB;
    }

    public function getAllTask()
    {
      // คำสั่ง SQL
      $sql = "SELECT * FROM m_007_tb ORDER BY createdAt DESC";
      // เตรียมคำสั่ง SQL เพื่อพร้อมใช้งาน
      $stmt = $this->connDB->prepare($sql);

      // รันคำสั่ง SQL
      $stmt->execute();

      // ส่งคืนข้อมูลที่ได้จากการทำงานของคำสั่ง SQL ไปใช้งานตามต้องการ
      return $stmt;
    }
  }
