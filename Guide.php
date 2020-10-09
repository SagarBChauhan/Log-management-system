<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
    $query_select="select * from Tbl_log_master;";
    $result= mysqli_query($con, $query_select);
    ?>
<table >
        <thead>
            <tr style='color: white; background-color: green;'>
                <th>enrollment number</th>
                <th>start date</th>
                <th>start time</th>
                <th>End_date</th>
                <th>End_time</th>
                <th>completed_work_details</th>
                <th>New_task_allocation</th>
                <th>Entered_on</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
    while ($row=$result->fetch_assoc())
    {
        $lid=$row['lid'];
        $enrollment_number=$row['enrollment_number'];
        $start_date=$row['start_date'];
        $start_time=$row['start_time'];
        $End_date=$row['End_date'];
        $End_time=$row['End_time'];
        $completed_work_details=$row['completed_work_details'];
        $New_task_allocation=$row['New_task_allocation'];
        $Entered_on=$row['Entered_on'];
        $Status=$row['Status'];

        echo "
            <tr style='color: white; background-color: lightslategray;'>
                <td>$enrollment_number</td>
                <td>$start_date</td>
                <td>$start_time</td>
                <td>$End_date</td>
                <td>$End_time</td>
                <td>$completed_work_details</td>
                <td>$New_task_allocation</td>
                <td>$Entered_on</td>
                <td>$Status</td>
                <td><a href='Guide.php?aid=$lid' style='text-decoration:none;color:Red;'>Accept <i class='fas fa-check'></i></a> <a href='Guide.php?rid=$lid'>Reject <i class='fas fa-times'></i></a></td>
            </tr>
";




    }
        ?>
                    </tbody>
    </table>
            <?php
ob_flush();
?>
