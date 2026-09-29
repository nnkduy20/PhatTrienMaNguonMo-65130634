<?php
$username = $_POST['user'];
$password = $_POST['pass'];

if ($username == "admin" && $password == "12345") 
{
    // Thêm face="Tahoma" để đáp ứng đúng yêu cầu font chữ Tahoma của bài tập
    echo "<font face='Tahoma' color='red'>Welcome to, " . $username . "</font>";
} 
else 
{
    echo "<font color='red'>Username hoac password khong chinh xac, vui long dang nhap lai</font>";
}
?>