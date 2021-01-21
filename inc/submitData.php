<?php

include("../config.php");


if (!is_null($_POST['btnSaveApply'])){

$fullname = $_POST['fullname'];
$reasonLeave = $_POST['reasonLeave'];
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];
$totalDays = $_POST['totalDays'];
$userId = $_POST['userId'];
$status= $_POST['status'];

         
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
         
        // Attempt update query execution
        $sql = "INSERT INTO applyleave (apply_userId, apply_leaveRequestId, date_from, date_to, total_days, apply_status) VALUES ('$userId','$reasonLeave','$dateFrom','$dateTo','$totalDays','$status')";
        if(mysqli_query($conn, $sql)){
            header("Location:../staff-index.php?post_type=list-leave-applied&submitted=successfully");
        } else { 
            header("Location:../staff-index.php?post_type=list-leave-applied&submitted=unsuccessfully");

        }
         
        // Close connection
        mysqli_close($conn);
    }


if (!is_null($_POST['btnAdminSaveApply'])){

$fullname = $_POST['fullname'];
$reasonLeave = $_POST['reasonLeave'];
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];
$totalDays = $_POST['totalDays'];
$userId = $_POST['userId'];
$status= $_POST['status'];

         
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
         
        // Attempt update query execution
        $sql = "INSERT INTO applyleave (apply_userId, apply_leaveRequestId, date_from, date_to, total_days, apply_status) VALUES ('$userId','$reasonLeave','$dateFrom','$dateTo','$totalDays','$status')";
        if(mysqli_query($conn, $sql)){
            header("Location:../admin-index.php?post_type=list-leave-applied&submitted=successfully");
        } else { 
            header("Location:../admin-index.php?post_type=list-leave-applied&submitted=unsuccessfully");

        }
         
        // Close connection
        mysqli_close($conn);
    }



if (!is_null($_POST['btnSetReminder'])){

$namestaff = $_POST['namestaff'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
$totalHours = $_POST['totalHours'];
$status = $_POST['status'];
$reminderTitle = $_POST['reminderTitle'];
$description = $_POST['description'];
         
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
         
        // Attempt update query execution
        $sql = "INSERT INTO reminder (staffId, title, description, time_from, time_to, total_hours, status) VALUES ('$namestaff','$reminderTitle','$description','$timeFrom','$timeTo', '$totalHours','$status')";
        if(mysqli_query($conn, $sql)){
            header("Location:../admin-index.php?post_type=reminder&submitted=success-add");
        } else { 
            header("Location:../admin-index.php?post_type=reminder&submitted=unsuccessfully");

        }
         
        // Close connection
        mysqli_close($conn);
    }

