<?php 
    if(isset($_POST['edit'])){ 

        include('../db.php'); 

        $id=$_POST['id'];
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $realese = $_POST['realese'];
        $season = $_POST['season'];

        
        $query = mysqli_query($con, "UPDATE movies SET name='$name', genre='$genre', realese='$realese', season='$season' WHERE id='$id'") or die(mysqli_error($con)); 
        
        if($query){ 
            echo 
                '<script> 
                    alert("Edit Success"); window.location = "../page/listMoviesPage.php" 
                </script>'; 
        }
        else{ 
            echo 
                '<script> 
                    alert("Edit Failed"); window.location = "../page/registerPage.php" 
                </script>'; 
        } 
    }
    else{ 
        echo 
            '<script> 
                window.history.back() 
            </script>'; 
    } 
?>
