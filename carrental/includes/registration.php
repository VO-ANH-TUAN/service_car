<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Đăng ký thành công. Bây giờ bạn có thể đăng nhập');</script>";
}
else
{
echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
}
}

?>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
<!-- </script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("2 mật khẩu không khớp với nhau !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script> -->
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Đăng Ký</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Họ Và Tên" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Số Điện Thoại" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Địa Chỉ Email" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required="required">
                </div>
                <!-- <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Xác Nhận Mật Khẩu" required="required">
                </div> -->
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">Tôi Đồng Ý Với <a href="page.php?type=terms">Các Điều Khoản Và Điều Kiện</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Đăng Ký" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Đã Có Tài Khoản ? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Đăng Nhập</a></p>
      </div>
    </div>
  </div>
</div>
