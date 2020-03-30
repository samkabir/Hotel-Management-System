<?php
if(!isset($_SESSION)) { session_start(); }

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hotel');


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required!");
  }
  if (empty($password)) {
    array_push($errors, "Password is required!");
  }

  if (count($errors) == 0) {
    $password = ($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header('location: homepage.php');
    }else {
      array_push($errors, "Wrong combination!");
    }
  }
}


//Status

if (isset($_POST['add_info'])) {

         
        $room_no = mysqli_real_escape_string($db, $_POST['Room_no']);
        $type = mysqli_real_escape_string($db, $_POST['type']);
        $capacity = mysqli_real_escape_string($db, $_POST['capacity']);
        $rent = mysqli_real_escape_string($db, $_POST['rent']);
        $status = mysqli_real_escape_string($db, $_POST['status']);

       if (empty($room_no)) {
          array_push($errors, "Room No is required!");
        }
        if (empty($type)) {
          array_push($errors, "Type is required!");
        }
        if (empty($capacity)) {
          array_push($errors, "Capacity is required!");
        }
        if (empty($rent)) {
          array_push($errors, "Rent is required!");
        }
          if (empty($status)) {
          array_push($errors, "Status is required!");
        }

        if (count($errors) == 0) {
              $query = "INSERT INTO `room` (`Room_No`, `Type`, `Capacity`, `Rent`, `Status`) VALUES ('$room_no', '$type', '$capacity', '$rent', '$status');";
        mysqli_query($db, $query);
      }
      }


        //Room Mod
        if (isset($_POST['Room_Mod'])) {
          $Room_ID = mysqli_real_escape_string($db, $_POST['room_no']);
          $rent = mysqli_real_escape_string($db, $_POST['rent']);

            $query = "UPDATE room set rent='$rent' where room_no='$Room_ID';";
            $results = mysqli_query($db, $query);
            
        }


      // ADD ROOM 
      if (isset($_POST['add_info'])) {

         
        $room_no = mysqli_real_escape_string($db, $_POST['Room_no']);
        $type = mysqli_real_escape_string($db, $_POST['type']);
        $capacity = mysqli_real_escape_string($db, $_POST['capacity']);
        $rent = mysqli_real_escape_string($db, $_POST['rent']);
        $status = mysqli_real_escape_string($db, $_POST['status']);

       if (empty($room_no)) {
          array_push($errors, "Room No is required!");
        }
        if (empty($type)) {
          array_push($errors, "Type is required!");
        }
        if (empty($capacity)) {
          array_push($errors, "Capacity is required!");
        }
        if (empty($rent)) {
          array_push($errors, "Rent is required!");
        }
          if (empty($status)) {
          array_push($errors, "Status is required!");
        }

        if (count($errors) == 0) {
              $query = "INSERT INTO `room` (`Room_No`, `Type`, `Capacity`, `Rent`, `Status`) VALUES ('$room_no', '$type', '$capacity', '$rent', '$status');";
        mysqli_query($db, $query);
      }
      }


        //Room Mod
        if (isset($_POST['Room_Mod'])) {
          $Room_ID = mysqli_real_escape_string($db, $_POST['room_no']);
          $rent = mysqli_real_escape_string($db, $_POST['rent']);

            $query = "UPDATE room set rent='$rent' where room_no='$Room_ID';";
            $results = mysqli_query($db, $query);
            
        }


// ADD FOOD


  if (isset($_POST['add_food_info'])) {

     
    $F_ID = mysqli_real_escape_string($db, $_POST['F_ID']);
    $Item = mysqli_real_escape_string($db, $_POST['Item']);
    $Price = mysqli_real_escape_string($db, $_POST['Price']);
  if (empty($F_ID)) {
          array_push($errors, "ID is required!");
        }
        if (empty($Item)) {
          array_push($errors, "Item is required!");
        }
        if (empty($Price)) {
          array_push($errors, "Price is required!");
        }

        if (count($errors) == 0) {
      $query = "INSERT INTO food VALUES ('$F_ID', '$Item', '$Price');";
    mysqli_query($db, $query);
  }
}


  //delete Food

  if (isset($_POST['del_food_info'])) {
 $F1_ID = mysqli_real_escape_string($db, $_POST['F1_ID']);

   $query = "DELETE FROM food where F_ID ='$F1_ID';";
    mysqli_query($db, $query);
  }


  //Mod Food

  if (isset($_POST['mod_food_info'])) {

     
    $F2_ID = mysqli_real_escape_string($db, $_POST['F2_ID']);
    $price1 = mysqli_real_escape_string($db, $_POST['price1']);


      $query = "UPDATE food set price='$price1' where F_ID='$F2_ID';";
    mysqli_query($db, $query);

}

//CheckOut


  if (isset($_POST['check_out'])) {

     
  $R3_no = mysqli_real_escape_string($db, $_POST['R_NO']);
  
  if (empty($R3_no)) {
          array_push($errors, "Room No is required!");
        }
  else {
  $query = "SELECT * from Room where Room_No='$R3_no' AND Status='Vacant';";
  $query2 = "SELECT * from Room where Room_No='$R3_no'";
  $results = mysqli_query($db, $query);
  $results2 = mysqli_query($db, $query2);
   if (mysqli_num_rows($results2) == 0) {
  array_push($errors, "Invalid Input!");
  }
  if (mysqli_num_rows($results) == 1) {
  array_push($errors, "Room is not booked!");
  }
 
  if (count($errors) == 0) {
  
  }
}
}




//Food Order

if (isset($_POST['order'])) {

     
  $R = mysqli_real_escape_string($db, $_POST['r_id']);
  $F = mysqli_real_escape_string($db, $_POST['f_id']);
  $Q = mysqli_real_escape_string($db, $_POST['Q']);
  $D = mysqli_real_escape_string($db, $_POST['date']);

 $query0 = "SELECT * from Room where Room_No='$R' AND Status='Booked' ;";
 $results0 = mysqli_query($db, $query0);
 $query01 = "SELECT * from food where F_id='$F';";
 $results01 = mysqli_query($db, $query01);


   if (empty($R)) {
        array_push($errors, "Room No is required!");
        }
  if (empty($F)) {
       array_push($errors, "Food ID is required!");
     }
   if (empty($Q)) {
       array_push($errors, "Quantity is required!");
        }
         
  if (empty($D)) {
      array_push($errors, "Date is required!");
       }



  if (count($errors) == 0) {
    if (mysqli_num_rows($results0) == 1) {
  
      if (mysqli_num_rows($results01) == 1){
      
  $query1 = "INSERT INTO `food_order` (`FDate`, `FRRoom_id`, `Food_id`, `Quantity`) VALUES ('$D', '$R', '$F', '$Q');";
 $results1 = mysqli_query($db, $query1);
  $query2 = "UPDATE food_order INNER JOIN food on (food_order.Food_id=food.F_ID) set bill=$Q*Price where FRRoom_id='$R' and Food_id='$F' and FDate='$D';";
  $results2 = mysqli_query($db, $query2);
}
}
}
}

//Room booking


if (isset($_POST['Book_room'])) {   

  $R2 = mysqli_real_escape_string($db, $_POST['Room_No']);
  $D2 = mysqli_real_escape_string($db, $_POST['s_date']);
  $N = mysqli_real_escape_string($db, $_POST['name']);
  $AD = mysqli_real_escape_string($db, $_POST['ad']);
  $P = mysqli_real_escape_string($db, $_POST['phn']);
  $IDT = mysqli_real_escape_string($db, $_POST['ID_T']);
  $ID = mysqli_real_escape_string($db, $_POST['ID']);



$query1 = "SELECT * from Room where Room_No='$R2' AND Status='Vacant' ;";
$results1 = mysqli_query($db, $query1);
$query2 = "SELECT * from customer where ID_Number ='$ID';";
$results2 = mysqli_query($db, $query2);

if(!empty($R2) & !empty($D2) & !empty($ID)) {
if (mysqli_num_rows($results1) == 1) {
 
  if (mysqli_num_rows($results2) == 1) {
 
            $query1 ="INSERT INTO `booking_info` (`RRoom_ID`, `C_ID`, `Start_date`) VALUES ('$R2', '$ID', '$D2');";
                $result3 = mysqli_query($db, $query1);
                $query2 = "UPDATE `room` SET `Status` = 'Booked' WHERE `room`.`Room_No` = '$R2';";
                 $result4 = mysqli_query($db, $query2);
              }

            }
          
          }


if(!empty($R2) & !empty($D2) & !empty($ID)  & !empty($IDT)  & !empty($AD)  & !empty($P)  & !empty($N)) {
if (mysqli_num_rows($results1) == 1) {

    $query3 = "INSERT INTO `booking_info` (`RRoom_ID`, `C_ID`, `Start_date`) VALUES ('$R2', '$ID', '$D2');";
    $query4 = "INSERT INTO `customer` (`Name`, `Phone`, `Address`, `ID_Type`, `ID_Number`) VALUES ('$N', '$P', '$AD', '$IDT', '$ID');";
    $query5 = "UPDATE `room` SET `Status` = 'Booked' WHERE `room`.`Room_No` = '$R2';";
    $result6 = mysqli_query($db, $query4);
    $result7 = mysqli_query($db, $query5);
     $result5 = mysqli_query($db, $query3);
            }
          }
          else{
          }
        }
      ?>