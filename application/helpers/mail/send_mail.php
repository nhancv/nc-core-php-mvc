<?php
/**
 * Created by PhpStorm.
 * User: YesKone
 * Date: 11/22/2015
 * Time: 10:37 PM
 */
header("Content-Type: application/json;charset=UTF-8");
header("Access-Control-Allow-Origin: http://localhost");
include_once dirname(__FILE__) . '/function/include_db.php';
$response = array();
if (isset($_POST["infoJson"])) {
    require 'mail_lib/PHPMailerAutoload.php';


    $info = json_decode_nice($_POST["infoJson"]);

    $host = 'smtp.gmail.com';
    $username = 'nhancv.sp@gmail.com';
    $password = 'cvnhan811728';

    $emplID = $info->Empl_ID;
    $mailAddr = $info->Email;
    $approverEmail = $info->ApproverEmail;
    $isLeave = (isset($info->LeaveCode)) ? true : false;
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $host;                       // Specify main and backup server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $username;                   // SMTP username
    $mail->Password = $password;               // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
    $mail->setFrom($username, 'Auto send - DataLogic');     //Set who the message is to be sent from
    $mail->addAddress($approverEmail);  // Add a recipient
    $mail->addCC($mailAddr);
    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML

    if ($isLeave) {
        $mail->Subject = ' Leave register inform - ' . $emplID;
        $mail->Body = '
            <body>
            <p>
            Your Employee was submit for Leave.<br>
            Please go to Application for Approve or Deny!
            </p>
            <table border="1" style="width:100%">
              <tr>
                <td>Empl_ID</td>
                <td>Empl_Name</td>
                <td>Department</td>
                <td>Line</td>
                <td>Date</td>
                <td>LeaveCode</td>
                <td>Reason</td>
                <td>Status</td>
              </tr>
              <tr>
                <td>' . $info->Empl_ID . '</td>
                <td>' . $info->Name . '</td>
                <td>' . $info->DepartmentCode . '</td>
                <td>' . $info->Line . '</td>
                <td>' . $info->AttDate . '</td>
                <td>' . $info->LeaveCode . '</td>
                <td>' . $info->Reason . '</td>
                <td>' . $info->Status . '</td>
              </tr>
            </table>
            </body>
        ';
    } else {
        $mail->Subject = ' OverTime register inform - ' . $emplID;
        $mail->Body = '
            <body>
            <p>
            Your Employee was submit for Leave.<br>
            Please go to Application for Approve or Deny!
            </p>
            <table border="1" style="width:100%">
              <tr>
                <td>Empl_ID</td>
                <td>Empl_Name</td>
                <td>Department</td>
                <td>Line</td>
                <td>OT_Line</td>
                <td>FromTime</td>
                <td>ToTime</td>
                <td>OT_Type</td>
                <td>Before_After</td>
                <td>Order_Food</td>
                <td>Date</td>
                <td>Reason</td>
                <td>Status</td>
              </tr>
              <tr>
                <td>' . $info->Empl_ID . '</td>
                <td>' . $info->Name . '</td>
                <td>' . $info->DepartmentCode . '</td>
                <td>' . $info->Line . '</td>
                <td>' . $info->OT_Line . '</td>
                <td>' . $info->FromTime . '</td>
                <td>' . $info->ToTime . '</td>
                <td>' . $info->OT_Type . '</td>
                <td>' . $info->Before_After . '</td>
                <td>' . $info->Order_Food . '</td>
                <td>' . $info->AttDate . '</td>
                <td>' . $info->Reason . '</td>
                <td>' . $info->Status . '</td>
              </tr>
            </table>
            </body>
        ';
    }
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        $response["status"] = 1;
        exit;
    } else {
        $response["status"] = 0;
    }
    echo json_encode_utf8($response);

} else {
    $response["status"] = 10;
    echo json_encode_utf8($response);
}