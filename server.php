
<?php

$username =  'root'; 
$password =    '';      

try {
    $PDO = new PDO('mysql:host=localhost;dbname=teste', $username, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

        $timestart = time();

        if (isset($_POST['timestamp'])) {
            $timestamp = $_POST['timestamp'];
        } else {
            $get_time = $PDO->prepare("SELECT NOW() as now");
            $get_time->execute();
            $row = $get_time->fetchObject();

            $timestamp = $row->now;
        }

        

        $sql = $PDO->prepare("SELECT * FROM notifications WHERE timestamp > '$timestamp'");
        $sql->execute();

        $newData = false;

        $notifications = array();

        while(!$newData && (time() - $timestart) < 20) {
            $sql->execute();
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $notifications = $row;
                $newData = true;
            }

            usleep(500000);
        }

        $get_time = $PDO->prepare("SELECT NOW() as now");
        $get_time->execute();
        $row = $get_time->fetchObject();

        $timestamp = $row->now;

        if($notifications == array() || $notifications == null || $notifications == '') {
            $notifications = 0;
        } else {
            $notifications = $notifications;
        }

        $data = array('notify' => $notifications, 'timestap' => $timestamp);
        echo json_encode($data);
        exit;
    




?>
