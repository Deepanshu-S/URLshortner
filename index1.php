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

  //Assign values passed by forms
  $q = $_GET['q'];
  $short = $_GET['short_url'];

function checkprev(){
      global $q,$short, $uid, $conn;
    $sql = "SELECT * FROM shorturl where short='$short' ";
    $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "Short URL already taken, try something else?";
        } else {        $sql = "SELECT * FROM shorturl where orig='$q' ";
                      $result2 = $conn->query($sql);

                      if ($result2->num_rows > 0) {while($row = $result2->fetch_assoc()) {
                        echo "<p><br>Long url already exists:<br><strong id=\"textresp1\">iamds.tk/". $row["short"] ."</strong><br></p>"  ; }
                      }
                      else { savetodb();}
                }

}

function savetodb()
  {   global $q,$short, $uid, $conn;
          $sql = "INSERT INTO `shorturl` (`uid`, `short`, `orig`) VALUES ('$uid', '$short', '$q');";
        if ($conn->query($sql) === TRUE) {
            echo "<p><br>Short path saved:<br> <strong id=\"textresp1\">iamds.tk/$short</strong><br></p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }

/*$string = 'newy';
$res = strtolower(preg_replace('/[^a-zA-Z0-9]/','', $string));*/

/*  function alpha (){
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
      }*/

function getid(){
          global $conn;
          $uid = rand(10000,99999);
          $sql = "SELECT  uid FROM shorturl WHERE uid = $uid;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
          {$uid = getid(); }// recall to get unique id if not

          return $uid;
    }


function shorten(){//get a short path
          global $uid, $short;
          $short =  base_convert($uid, 16, 32) ;

        }


//Function calls start here

          $uid = getid(); // generate random unique id

        if ($short==""){
          shorten();
        }

        checkprev();    // checks previous records for shorturls and longurls


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
