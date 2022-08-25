<?php
require("connect.php");
if(isset ($_POST['classid']))
{
	$classid = $_POST['classid'];
	$subjectname = $_POST['subname'];
	$subname = ($subjectname);
	$s = $conn->prepare("SELECT * FROM `classinfo` WHERE `classid` = '$classid'");
	$s-> bind_param("i", $classid);
	$s->execute();
	$req = $s->get_result();
	if($req == 1)
		{
			$query = $conn->prepare("INSERT INTO `subjectinfo` (`subname`,`classid`) VALUES (?,?)");
			$query->bind_param("si", $subname ,$classid);
			$query->execute();
			header("Location:subject.php");
		}
	else 
		{
			echo "Wrong Class ID";
		}
	
}
else{
	echo "Something Went Wrong";
}
?>