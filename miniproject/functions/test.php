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
register_student($user_id,$username,$f_name,$l_name,$reg_no,$course,$branch,$gender,$batch,$team_id);
?></pre> 