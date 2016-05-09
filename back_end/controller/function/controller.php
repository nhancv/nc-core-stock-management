<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Controller
{
    private static $instance;
    private $conn;
    private $db;
    private function __construct()
    {
        $this->db = new DBConnect();
        $this->conn = $this->db->getConn();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Controller();
        }
        return self::$instance;
    }

    public static function sendMail($subject, $address, $ccAddress, $infoJson)
    {
        $host = 'smtp.gmail.com';
        $username = 'nhancv.sp@gmail.com';
        $password = 'cvnhan811728';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $host;                       // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $username;                   // SMTP username
        $mail->Password = $password;               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
        $mail->setFrom($username, 'Auto send - DataLogic');     //Set who the message is to be sent from
        $mail->addAddress($address, $infoJson->Empl_ID);  // Add a recipient
        $mail->addCC($ccAddress);
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
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
        <td>$infoJson->Empl_ID</td>
        <td>$infoJson->Name</td>
        <td>$infoJson->DepartmentCode</td>
        <td>$infoJson->Line</td>
        <td>$infoJson->AttDate</td>
        <td>$infoJson->LeaveCode</td>
        <td>$infoJson->Reason</td>
        <td>$infoJson->Status</td>
    </tr>
</table>
</body>
';
        $mail->send();
    }

    public function getUser(&$response)
    {
        $this->conn->query("set names 'utf8'");
        $result = $this->conn->query("SELECT * FROM User");
        if ($result->num_rows > 0) {
            $response["user"] = array();

            while ($row = $result->fetch_assoc()) {
                $user = array();
                $user["uid"] = $row["uid"];
                $user["pid"] = $row["pid"];
                $user["password"] = $row["password"];
                $user["name"] = $row["name"];
                $user["phone"] = $row["phone"];
                $user["type"] = $row["type"];
                array_push($response["user"], $user);
            }
            // success
            $response["success"] = 1;
            // echoing JSON response
            echo json_encode_utf8($response);
        } else {
            // no products found
            $response["success"] = 0;
            $response["message"] = "Not found";
            // echo no users JSON
            echo json_encode($response);
        }
    }
}