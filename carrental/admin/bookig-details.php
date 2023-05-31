<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();
  echo "<script>alert('Đơn hàng đã được hủy thành công');</script>";
echo "<script type='text/javascript'> document.location = 'canceled-bookings.php; </script>";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Đã xác nhận đơn hàng thành công');</script>";
echo "<script type='text/javascript'> document.location = 'confirmed-bookings.php'; </script>";
}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>T3DK | Đơn Đặt Mới </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Chi Tiết Hoá Đơn</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Thông Tin Hoá Đơn</div>
							<div class="panel-body">


						<div id="print">
								<table border="1"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"  >

									<tbody>

									<?php
									$bid=intval($_GET['bid']);
									$sql = "SELECT tblusers.*,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber,
									DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totalnodays,tblvehicles.PricePerDay
																		from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id where tblbooking.id=:bid";
									$query = $dbh -> prepare($sql);
									$query -> bindParam(':bid',$bid, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>
										<h3 style="text-align:center; color:red"><?php echo htmlentities($result->BookingNumber);?>Chi Tiết Đơn Đặt Hàng</h3>

								<tr>
											<th colspan="4" style="text-align:center;color:blue">Thông Tin Khách Hàng</th>
										</tr>
										<tr>
											<th>Booking No.</th>
											<td>#<?php echo htmlentities($result->BookingNumber);?></td>
											<th>Tên Khách Hàng</th>
											<td><?php echo htmlentities($result->FullName);?></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><?php echo htmlentities($result->EmailId);?></td>
											<th>Số Điện Thoại</th>
											<td><?php echo htmlentities($result->ContactNo);?></td>
										</tr>
											<tr>
											<th>Địa Chỉ</th>
											<td><?php echo htmlentities($result->Address);?></td>
											<th>Quận/Huyện</th>
											<td><?php echo htmlentities($result->City);?></td>
										</tr>
											<tr>
											<th>Tỉnh/Thành Phố</th>
											<td colspan="3"><?php echo htmlentities($result->Country);?></td>
										</tr>

										<tr>
											<th colspan="4" style="text-align:center;color:blue">Chi Tiết Hoá Đơn</th>
										</tr>
											<tr>
											<th>Tên Xe Thuê</th>
											<td><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></td>
											<th>Ngày Thuê</th>
											<td><?php echo htmlentities($result->PostingDate);?></td>
										</tr>
										<tr>
											<th>Từ Ngày :</th>
											<td><?php echo htmlentities($result->FromDate);?></td>
											<th>Đến Ngày : </th>
											<td><?php echo htmlentities($result->ToDate);?></td>
										</tr>
										<tr>
											<th>Tổng Ngày</th>
											<td><?php echo htmlentities($tdays=$result->totalnodays);?></td>
											<th>Tiền Thuê 1 Ngày :</th>
											<?php echo '<td>' . number_format($ppd=$result->PricePerDay, 0, ',', ',') . '</td>';?> </p></td>
										</tr>
										<tr>
											<th colspan="3" style="text-align:center">Tổng Hoá Đơn</th>
											<?php echo '<td>' . number_format($tdays*$ppd, 0, ',', ',') . '</td>';?></p>
										</tr>
										<tr>
										<th>Trạng Thái Đơn Hàng</th>
										<td><?php
										if($result->Status==0)
										{
										echo htmlentities('Chưa duyệt');
										} else if ($result->Status==1) {
										echo htmlentities('Đã duyệt');
										}
										else{
											echo htmlentities('Đã huỷ');
										}
										?></td>
										<th>Lần Cập Nhật Cuối</th>
										<td><?php echo htmlentities($result->LastUpdationDate);?></td>
									</tr>

									<?php if($result->Status==0){ ?>
										<tr>
										<td style="text-align:center" colspan="4">
									<a href="bookig-details.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Bạn có muốn xác nhận đơn hàng ?')" class="btn btn-primary">Xác Nhận Đơn Hàng</a>

									<a href="bookig-details.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Bạn có muốn huỷ đơn hàng ?')" class="btn btn-danger">Huỷ Đơn Hàng</a>
									</td>
									</tr>
									<?php } ?>
								<?php $cnt=$cnt+1; }} ?>

								</tbody>
								</table>
								<form method="post">
								<input name="Submit2" type="submit" class="txtbox4" value="In hoá đơn" onClick="return f3();" style="cursor: pointer;"  />
								</form>

							</div>
						</div>



					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script language="javascript" type="text/javascript">
function f3()
{
window.print();
}
</script>
</body>
</html>
<?php } ?>