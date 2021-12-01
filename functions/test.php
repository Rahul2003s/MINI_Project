<pre><?php
include "student.php";
// echo "7f2304fad6b281d2772370c43e48703625062ab5 <br>";
//echo get_hashed("admin");

// echo "\n";

//echo(do_signup('admin1@vitstudent.ac.in','admin'));

//$result= do_login('admin1@vitstudent.ac.in','admin');
//echo "do_login():  ".$result;

// if(verify_privilege("admin1@vitstudent.ac.in")==1) {
// 	echo "vitstudent";
// }elseif (verify_privilege("admin1@vitstudent.ac.in")==2) {
// 	echo "vitteacher";
// }
$user_id=163;
$username="sakthi@vit.ac.in";
$password="sakthi";
$f_name="sakthi";
$l_name="velan";
$reg_no="20MIC0117";
$course="darfgegerevr";
$branch="vellore";
$gender="male";
$batch="2020";
$team_id=12;
//$otp=66074;
//echo do_signup($username,$password);
//do_verify_signup($username,$otp);
// echo do_login($username,$password);
// $flag;
// $username="bharanikumaran.m2020@vitstudent.ac.in";
// $otp=711364;
// if (do_verify_signup($username,$otp)) {
//     echo "string";
//     $flag=1;
//      //header("Location: /signin.php");
// }else{
//     $flag=0;
// }
//  echo $flag;

// verify_student($username);
//register_student($user_id,$username,$f_name,$l_name,$reg_no,$course,$branch,$gender,$batch,$team_id);
// $db_conn=get_db_connection();
// $query="select * from miniproject.teams where team_id=12;";
// $result=mysqli_query($db_conn,$query);
// if ($result) {
// 	$rows=mysqli_fetch_assoc($result);
// 	print_r($rows);
// 	//print_r($rows['team_members']);
// 	$team_members=$rows['team_members'];
// 	$team_members_arr=explode(',', $team_members);
// 	print_r($team_members_arr);
// 	echo "\n";
// 	echo $team_members_arr[1];
// }else{
// 	echo "some error";
// }
// $db_conn=get_db_connection();
// $query="SELECT * FROM `miniproject`.`registration_no`;";
// $result=mysqli_query($db_conn,$query);
// if($result){
// 	while ($row=mysqli_fetch_assoc($result)) {
//     	print_r($row);
//     }
// }
// find_team_no("20MIC0137");

$db_conn=get_db_connection();
$query="SELECT COUNT(*) FROM `miniproject`.`teams`;";
$result=mysqli_query($db_conn,$query);
if ($result) {
    $row=mysqli_fetch_assoc($result);
    print_r($row);
}


$query1="SELECT COUNT(*) FROM `miniproject`.`registration_no`;";
$result1=mysqli_query($db_conn,$query1);
if ($result1) {
    $row1=mysqli_fetch_assoc($result1);
    print_r($row1);
}

?></pre> 
