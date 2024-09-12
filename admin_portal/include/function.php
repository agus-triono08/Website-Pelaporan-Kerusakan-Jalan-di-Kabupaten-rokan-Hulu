
<?php

function Total_user_reg()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from User_registration";
   $info = $conn_STUDENT->query($sel);
   $total = $info->num_rows;
   return $total;
}
function User_reg_fetch()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT  distinct(User_Name) ,ID,Father_Name,Address,Contact_No,Password from user_registration Group By ID,Father_Name,Address,Contact_No,Password";
   $info = $conn_STUDENT->query($sel);
   return $info;
}

function User_message_fetch()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from Contact_form";
   $info = $conn_STUDENT->query($sel);
   return $info;
}

function Serv_record()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from services_uploade";
   $data = $conn_STUDENT->query($sel);
   return $data;
}

function Serv_Type()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from services_type";
   $data = $conn_STUDENT->query($sel);
   return $data;
}
function fetch_laporan_kerusakan_jalan_data()
{
   $conn = $GLOBALS['db'];
   $query = "SELECT * FROM laporan_kerusakan_jalan";
   $result = $conn->query($query);
   return $result;
}
function fetch_admin_profiles()
{
   $conn = $GLOBALS['db'];
   $admin_id = $_SESSION['ID']; // Get current admin's ID

   $sql = "SELECT ID, Adm_Name, Adm_Password FROM admin_login WHERE ID = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $admin_id);
   $stmt->execute();
   return $stmt->get_result();
}


function fetch_masyarakat_data()
{
   $conn = $GLOBALS['db'];
   $query = "SELECT * FROM user_masyarakat";
   $result = $conn->query($query);
   return $result;
}


function Total_user_masyarakat()
{
   $conn_STUDENT = $GLOBALS['db'];
   $query = "SELECT COUNT(*) as count FROM user_masyarakat";
   $result = $conn_STUDENT->query($query);
   $row = $result->fetch_assoc();
   return $row['count'];
}
function Total_laporan_kerusakan_jalan()
{
   $conn_STUDENT = $GLOBALS['db'];
   $query = "SELECT COUNT(*) as count FROM laporan_kerusakan_jalan";
   $result = $conn_STUDENT->query($query);
   $row = $result->fetch_assoc();
   return $row['count'];
}

function Serv_typ_record()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from services_type";
   $data = $conn_STUDENT->query($sel);
   return $data;
}
function get_order_detail($User_Id, $Order_code)
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from order_temp where User_ID='" . $User_Id . "' and Order_code='" . $Order_code . "' and Order_Status='active'";
   $info = $conn_STUDENT->query($sel);
   return $info;
}
function get_order_status_Count()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from order_detail where Delivery_status!='Deliver' order by  ID  ";
   $info = $conn_STUDENT->query($sel);

   return $info;
}

function get_order_status_Count_complete()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from order_detail where Delivery_status='Deliver' order by  ID  ";
   $info = $conn_STUDENT->query($sel);

   return $info;
}
// function compulete_order_Count()
// {
//    $conn_STUDENT = $GLOBALS['db'];
// 	 $sel="SELECT * from confirm_order_detail where  status='Deliver'";
// 	$info=$conn_STUDENT->query($sel);
// 	return $info;
// }
function get_menu_Count()
{
   $conn_STUDENT = $GLOBALS['db'];
   $sel = "SELECT * from services_type ";
   $info = $conn_STUDENT->query($sel);
   $total = $info->num_rows;
   return $total;
}







if (isset($_GET["Register"])) {
   $sel = "DELETE FROM user_registration WHERE ID ='" . $_GET["ID"] . "' ";
   $objExecute = $db->query($sel);
   // if($info){
   if ($objExecute) {

      header("location:Register_user.php");
      include('SMS/Successful_Delete.php');
   } else {
      $sms = 'Error Save';
   }
}


if (isset($_GET["Comment"])) {
   $sel = "DELETE FROM Contact_form WHERE ID ='" . $_GET["ID"] . "' ";
   $objExecute = $db->query($sel);
   // if($info){
   if ($objExecute) {
      header("location:Message-Info.php");
      include('SMS/Successful_Delete.php');
   } else {
      $sms = 'Error Save';
   }
}


?>
