<?php
ob_start();
//if ($_SESSION['usertype']=="Student")
//{}
// else {
//     header("Location:index.php?error=Login_first");
//}
require_once './Connection.php';    
if(isset($_POST['btn_submit']))
{
    $query_insert="Insert into Tbl_log_master (enrollment_number,start_date ,start_time ,End_date ,End_time ,completed_work_details ,New_task_allocation ,Entered_on ,Status )
Values(2,'".$_POST['start_date']."','".$_POST['start_time']."','".$_POST['end_date']."','".$_POST['end_time']."',"
            . "'".$_POST['work_complete']."','".$_POST['Task_allocated']."','". date('Y-m-d')."',0);";

//    echo $query_insert;
    $sql_insert= mysqli_query($con, $query_insert);
    if($sql_insert)
    {
        $lastId=$con->insert_id;
        echo 'Inserted'.$lastId;
    }
    else {
        die("Fail");
    }
}
?>
<form method="POST">
    <table border="0">
        <tbody>
            <tr>
                <td>
                    Start Date
                </td>
                <td>
                        <input type="date" name="start_date">
                </td>
            </tr>
            <tr>
                <td>Start Time</td>
                <td>
                        <input type="time" name="start_time">
                </td>
            </tr>
            <tr>
                <td>End Date</td>
                <td>
                        <input type="date" name="end_date">
                </td>
            </tr>
            <tr>
                <td>End Time</td>
                <td>
                        <input type="time" name="end_time">
                </td>
            </tr>
            <tr>
                <td>Work Complete</td>
                <td>
                     <textarea name="work_complete"></textarea>
                </td>
            </tr>
            <tr>
                <td>Task allocated</td>
                <td>
                        <textarea name="Task_allocated"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                        <input type="submit" value="Submit" name="btn_submit"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php
ob_flush();
?>
