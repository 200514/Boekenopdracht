<?php
    
    // onderstaand bestand wordt ingeladen
    // include('../core/header.php');
    include('../../core/db_connect.php');
    // include('../core/checklogin_admin.php');
?>

<h1>book bewerken</h1>

<?php
    prettyDump($_POST);
    if (isset($_POST['submit']) && $_POST['submit'] != '') {
        $id = $con->real_escape_string($_POST['book_id']);
        $title = $con->real_escape_string($_POST['title']);
        $author = $con->real_escape_string($_POST['author']);
        $isbn13 = $con->real_escape_string($_POST['isbn13']);
        $format = $con->real_escape_string($_POST['format']);
        $publisher = $con->real_escape_string($_POST['publisher']);
        $pages = $con->real_escape_string($_POST['pages']);
        $dimensions = $con->real_escape_string($_POST['dimensions']);
        $overview = $con->real_escape_string($_POST['overview']);
        $query1 = $con->prepare("UPDATE allBooks SET title = ?, author = ? , isbn13 = ? , format = ?, publisher = ? , pages = ? , dimensions = ? , overview = ? WHERE book_id = ? LIMIT 1;");
        if ($query1 === false) {
            echo mysqli_error($con);
        }
                    
        $query1->bind_param('ssississi',$title,$author, $isbn13, $format, $publisher, $pages, $dimensions, $overview, $id);
        if ($query1->execute() === false) {
            echo mysqli_error($con);
            echo "wekt niet1";
            // echo "name:".$name." desc:".$description." act:".$active." id:".$id;
        } else {
            header('Location:index.php');
        }
        $query1->close();
                    
    }
?>

<form action="" method="POST">
<?php
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $book_id = $con->real_escape_string($_GET['id']);

        $liqry = $con->prepare("SELECT book_id, title, author, isbn13, format, publisher, pages, dimensions, overview FROM allBooks WHERE book_id = ? LIMIT 1;");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_param('i',$book_id);
            $liqry->bind_result($book_id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview );
            if($liqry->execute()){
                $liqry->store_result();
                $liqry->fetch();
                if($liqry->num_rows == '1'){
                    echo 'book_id: <input type="text" name="book_id" value="' . $book_id . '" ><br>';
                    echo 'title: <input type="text" name="title" value="' . $title . '"><br>';
                    echo 'author: <input type="text" name="author" value="' . $author . '"><br>';
                    echo 'isbn13: <input type="number" name="isbn13" value="' . $isbn13 . '"><br>';
                    echo 'format: <input type="text" name="format" value="' . $format . '" ><br>';
                    echo 'publisher: <input type="text" name="publisher" value="' . $publisher . '"><br>';
                    echo 'pages: <input type="number" name="pages" value="' . $pages . '"><br>';
                    echo 'dimensions: <input type="text" name="dimensions" value="' . $dimensions . '"><br>';
                    echo 'overview: <input type="text" name="overview" value="' . $overview . '"><br>';
                }
            }
        }
        $liqry->close();

    }
?>
<br>
<input type="submit" name="submit" value="Opslaan">
</form>

<?php
    include('../core/footer.php');
?>