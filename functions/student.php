<?php
include 'auth.php';


//check wheather the student details are in DB
function verify_student($username){
 	$db_conn=get_db_connection();
    // $query1="SELECT * FROM miniproject.authentication as A miniproject.student as S WHERE(S.username='$username', A.username='$username');";
    $query="Select * from miniproject.student WHERE username='$username'; ";
    $result=mysqli_query($db_conn,$query);
    if (mysqli_num_rows($result)==1) {
        return 1;
    }else{
        return 0;
    }
}  



//check wheather the teachers details are in DB
function verify_teacher($username) {
    $db_conn=get_db_connection();
    $query="Select * from miniproject.teacher WHERE username='$username'; ";
    $result=mysqli_query($db_conn,$query);
    if (mysqli_num_rows($result)==1) {
        return 1;
    }else{
        return 0;
    }
}



//register a student it will add the student to the student table in DB by taking input from user in web!!.
function register_student($user_id,$username,$f_name,$l_name,$reg_no,$course,$branch,$gender,$batch,$team_id){
    $db_conn=get_db_connection();
    $query="INSERT INTO `student` (`user_id`, `first_name`, `last_name`, `reg_no`, `course`, `branch`, `gender`, `username`, `batch`, `team_id`) VALUES ('$user_id', '$f_name', '$l_name', '$reg_no', '$course', '$branch', '$gender', '$username', '$batch', '$team_id');";
    if(mysqli_query($db_conn,$query)){
        return 1;
    }else{
        return mysqli_error($db_conn);
    }

}


function find_team_no($reg_no)
{
    $db_conn=get_db_connection();
    $query="SELECT * FROM `miniproject`.`teams`;";
    $result=mysqli_query($db_conn,$query);
    if ($result) {
        while ($row=mysqli_fetch_assoc($result)) {
            $team=explode(',', $row['team_members']);
            foreach ($team as $value) {
                if ($reg_no == $value) {
                    $team_id=$row['team_id'];
                    // echo $team_id;
                    return $team_id;
                }
            }
        }
    }
}

function get_project_details($id)
{
    $db_conn=get_db_connection();
    $query="SELECT * FROM `miniproject`.`project` WHERE `project`.`team_id` = $id;";
    $result=mysqli_query($db_conn,$query);
    if ($result) {
        $row=mysqli_fetch_assoc($result);
        return $row;
    }
}


function Change_git_link($git_link,$project_id)
{
    $db_conn=get_db_connection();
    $query= "UPDATE `project` SET `project_git_link` = '$git_link' WHERE `project`.`project_id` = $project_id;";
    $result=mysqli_query($db_conn,$query);
    if ($result) {
        return 1;
    }else{
        return 0;
    }
}
?>