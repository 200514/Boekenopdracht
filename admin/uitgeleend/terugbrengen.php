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
    if (isset($_POST['book_id']) && $_POST['book_id'] != "") {
        $book_id = $_GET['id'];
        $query1 = $con->prepare("UPDATE allBooks SET uitgeleend = 0 WHERE book_id = ? LIMIT 1;");
        if ($query1 === false) {
            echo mysqli_error($con);
        }

        $query1->bind_param('i',$book_id);
        if ($query1->execute() === false) {
            echo mysqli_error($con);
            echo "wekt niet1";
            echo $book_id;
            // echo "name:".$name." desc:".$description." act:".$active." id:".$id;
        } else {
            // header('Location:index.php');
            echo "helo";
        }
        $query1->close(); 

    }  
?>


<form action="" method="POST">
naam: <input type="text" name="book_id" value="<?php $_GET['id'] ?>"><br><br>
<!-- date_out: <input type="date" name="date_out" value=""><br><br> -->
<!-- date_return: <input type="date" name="date_return" value=""><br><br> -->
<!-- uitgeleend: <input type="boolean" name="uitgeleend" value=""><br><br> -->
<input type="submit" name="submit" value="Toevoegen">
</form>



<?php
    include('../core/footer.php');
?>

