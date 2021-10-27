<?php
    
    // onderstaand bestand wordt ingeladen
    include('core/header.php');
    include('../../core/db_connect.php');
    // include('../core/checklogin_admin.php');
?>

<h1>book toevoegen</h1>

<?php


 
 echo "<pre>";
 print_r($_POST);
 echo "</pre>";
    if (isset($_POST['title']) && $_POST['title'] != "") {
        $title = $con->real_escape_string($_POST['title']);
        $author = $con->real_escape_string($_POST['author']);
        $isbn13 = $con->real_escape_string($_POST['isbn13']);
        $format = $con->real_escape_string($_POST['format']);
        $publisher = $con->real_escape_string($_POST['publisher']);
        $pages = $con->real_escape_string($_POST['pages']);
        $dimensions = $con->real_escape_string($_POST['dimensions']);
        $overview = $con->real_escape_string($_POST['overview']);
        // echo "hello2";

        $liqry = $con->prepare("INSERT INTO `allBooks` (`book_id`, `title`, `author`, `isbn13`, `format`, `publisher`, `pages`, `dimensions`, `overview`,uitgeleend ) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?,0);");
        if($liqry === false) {
           echo mysqli_error($con);
           echo"lukt niet";
        } else{
            $liqry->bind_param('ssississ',$title,$author, $isbn13, $format, $publisher, $pages, $dimensions,$overview);
            if($liqry->execute()){
                header('Location:index.php');
            }else{
                echo mysqli_error($con);
                echo"lukt niet";
            }
        }
        $liqry->close();

    }
?>
<form action="" method="POST">

title: <input type="text" name="title" value=""><br><br>
author: <input type="text" name="author" value=""><br><br>
isbn13: <input type="number" name="isbn13" value=""><br><br>
format: <input type="text" name="format" value=""><br><br>
publisher: <input type="text" name="publisher" value=""><br><br>
pages: <input type="number" name="pages" value=""><br><br>
dimensions: <input type="text" name="dimensions" value=""><br><br>
overview: <input type="text" name="overview" value=""><br><br>
<input type="submit" name="submit" value="Toevoegen">
</form>



<?php
    include('../core/footer.php');
?>

