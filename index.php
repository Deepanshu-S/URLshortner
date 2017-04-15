<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = intval($_GET['q']);


$string = 'newy';
$res = strtolower(preg_replace('/[^a-zA-Z0-9]/','', $string));

    function alpha (){
        global $res;
      $len = rand(4,88);
      echo $len;
      $arr= array();
      $c = 0;
      floop:
        for($i=0;$i<strlen($res);$i++){
          $y =rand(0,1);
              if(rand(0,1) ==1){
                array_push($arr,$res[$i]);
                $c++;
                if($c==$len) {echo 'break' ; break;}
              }
        }
        if($c<4){echo "__$c __</br>",implode($arr),"</br>";goto floop;}

        $res = implode($arr);

        echo "</br> path: /", $res;
      }

      function getid()
        { global $conn;
          $uid = rand(10000,99999);
          $sql = "SELECT  uid FROM shorturl WHERE uid = $uid;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
          {$uid = getid(); }// recall to get unique if not

        return $uid;
        }


      function shorten(){//get a short path
          $uid = getid(); // generate random unique id
           $short =  base_convert($uid, 16, 32) ;
           echo "<p>Short path: <strong>iamds.tk/$short</strong></p>";
        }

        shorten();

    //  alpha();
/*$sql = "INSERT INTO shorturl (short, orig)
VALUES ('Cardinadl', 'Tom B. Erichsen');";
if ($conn->query($sql) === TRUE) {
    echo "</br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$conn->close();




?>
