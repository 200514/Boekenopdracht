<?php
  
   // onderstaand bestand wordt ingeladen
   include('core/header.php');
   include('../../core/db_connect.php');
?>
 
<h1>book overzicht</h1>
<li><a href="index.php">overzicht van catergory</a></li>
<li><a href="add_books.php">Category toevoegen</a></li>
<br><br><br>
 
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
                   <td><?php echo '<a href="edit_books.php?id='.$book_id.'">edit</a><br>'?></td>
                    <?php
                   }
 
                //    echo '<a href="edit_category.php?id='.$category_id.'">edit</a><br>';
               }
           $liqry->close();
       }
 
?>
 
<?php
   include('../core/footer.php');
?>