<pre><?php
include "auth.php";
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
$username="sakthi@vit.ac.in";
$password="sakthi";
//$otp=66074;
//echo do_signup($username,$password);
//do_verify_signup($username,$otp);
// echo do_login($username,$password);
$flag;
$username="bharanikumaran.m2020@vitstudent.ac.in";
$otp=711364;
if (do_verify_signup($username,$otp)) {
    echo "string";
    $flag=1;
     //header("Location: /signin.php");
}else{
    $flag=0;
}
 echo $flag;
?></pre> 