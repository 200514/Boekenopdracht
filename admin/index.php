<?php
include('core/db_connect.php');


?>

<h2>Random producten overzicht</h2>
<!-- Willekeurig 3 producten nodig; product naam, product prijs en categorie titel -->

<?php
$productsql = "SELECT email FROM bibliotheek_leden";

$productqry = $con->prepare($productsql);
if($productqry === false) {
    echo mysqli_error($con);
} else{
    $productqry->bind_result($email,);
    if($productqry->execute()){
        $productqry->store_result();
        while($productqry->fetch()){
            ?>
                <h3><?php echo $email;?></h3>
                    <?php echo '<a href="uitgeleend/lenen_books.php?id='.$isbn13.'&email=Max">Lenen</a><br>'?>

            <?php
        }
    }
    $productqry->close();
}
?>
<?php
       $liqry = $con->prepare("SELECT book_id, title, author, isbn13, format, publisher, pages, dimensions, overview FROM allBooks WHERE uitgeleend = 0");
       if($liqry === false) {
          echo mysqli_error($con);
       } else{
           $liqry->bind_result($book_id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
           if($liqry->execute()){
               $liqry->store_result();
               echo '<table border=1>
                <tr>
                    <td> book id </td>
                    <td>title </td>
                    <td>author </td>
                    <td>isbn13 </td>
                    <td>format </td>
                    <td>publisher </td>
                    <td>pages </td>
                    <td>dimension </td>
                    <td>overview </td>
                    <td>Edit </td>
                </tr>';
               while($liqry->fetch()) {
                   ?>
                <tr>
                   <td><?php echo $book_id ?></td>
                   <td><?php echo $title ?></td>
                   <td><?php echo $author ?></td>
                   <td><?php echo $isbn13 ?></td>
                   <td><?php echo $format ?></td>
                   <td><?php echo $publisher ?></td>
                   <td><?php echo $pages ?></td>
                   <td><?php echo $dimensions ?></td>
                   <td><?php echo $overview ?></td>
                   <td><?php echo '<a href="uitgeleend/lenen_books.php?id='.$isbn13.'&email=Max">Lenen</a><br>'?></td>
                    <?php
                   }
 
                //    echo '<a href="edit_category.php?id='.$category_id.'">edit</a><br>';
               }
           $liqry->close();
       }
 
?>