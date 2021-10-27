<?php
    
    // onderstaand bestand wordt ingeladen
    include('core/header.php');
    include('../../core/db_connect.php');


?>

<h1>Je boek</h1>

<?php
echo "Boek: " ;
echo  $_GET['id'];
?><br><br>
<?php
echo "Gebruiker: ";
echo $_SESSION["gebruikersnaam"];


 echo "<pre>";
//  print_r($_POST);
 echo "</pre>";
    if (isset($_POST['isbn13']) && $_POST['isbn13'] != "") {
        $isbn13 = $_GET['id'];
        $gebruikersnaam = $_SESSION["gebruikersnaam"];
        $date_out = date("Y-m-d");
        $date_return = date("Y-m-d",strtotime($dDate."+ 4 weeks"));


        $liqry = $con->prepare("INSERT INTO `Inlever/uitleen_gegevens` (`isbn13`, `gebruikersnaam`, `date_out`, `date_return`, `uitgeleend` ) VALUES (?, ?, ?, ?, 1);");
        if($liqry === false) {
           echo mysqli_error($con);
           echo"lukt niet1";
        } else{
            $liqry->bind_param('isss', $isbn13 ,$gebruikersnaam, $date_out, $date_return);
            if($liqry->execute()){
                echo "het boek is geleend";
            }else{
                echo mysqli_error($con);
                echo"lukt niet";
            }
        }
        $liqry->close();
        $isbn13 = $_GET['id'];
        $query1 = $con->prepare("UPDATE allBooks SET uitgeleend = 1 WHERE isbn13 = ? LIMIT 1;");
        if ($query1 === false) {
            echo mysqli_error($con);
        }

        $query1->bind_param('i',$isbn13);
        if ($query1->execute() === false) {
            echo mysqli_error($con);
            echo "wekt niet1";
            echo $isbn13;
            // echo "name:".$name." desc:".$description." act:".$active." id:".$id;
        } else {
            // header('Location:index.php');
            echo "helo";
        }
        $query1->close(); 

    }  
?>


<form action="" method="POST">
naam: <input type="text" name="isbn13" value="<?php $_GET['id'] ?>"><br><br>
<!-- date_out: <input type="date" name="date_out" value=""><br><br> -->
<!-- date_return: <input type="date" name="date_return" value=""><br><br> -->
<!-- uitgeleend: <input type="boolean" name="uitgeleend" value=""><br><br> -->
<input type="submit" name="submit" value="Toevoegen">
</form>



<?php
    include('../core/footer.php');
?>

