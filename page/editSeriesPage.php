<?php 
    include '../component/sidebar.php';

    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM series WHERE id='$id'");

    $data = mysqli_fetch_assoc($query);
    $genre = array('Romance', 'Action', 'Comedy');
?>

< <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
 solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
 0.19);" >
    <h4 >EDIT DATA MOVIES</h4>
    <a href="./editSeriesPage.php"></a>
    <hr>
    <form action="../process/editSerieProcess.php" method="post">
    

    <input type="hidden" name="id" value="<?php echo $data['id'];?>">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php echo $data['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Genre</label>
            <select class="form-select" aria-label="Default select example" name="genre" value="<?php echo $data['genre']; ?>">
            <?php
                foreach ($genre as $genreapa){
                    echo "<option value= '$genreapa' ";
                    echo $data['genre'] == $genreapa? 'selected="selected"':'';
                    echo ">$genreapa</option>";
                }
            ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Year Realese</label>
            <input class="form-control" id="realese" name="realese" aria-describedby="emailHelp" value="<?php echo $data['realese']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Episode</label>
            <input class="form-control" id="episode" name="episode" aria-describedby="emailHelp"value="<?php echo $data['episode']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Season</label>
            <input class="form-control" id="season" name="season" aria-describedby="emailHelp" value="<?php echo $data['season']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Synopsis</label>
            <textarea class="form-control" id="synopsis" name="synopsis" aria-describedby="emailHelp"value="<?php echo $data['synopsis']; ?>"></textarea>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary " name="edit" style="background: black" >Save</button>
            
        </div>
    </form>
 </div>
 </aside>

 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
</body>
</html>

