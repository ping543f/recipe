<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location:index.php");
}
include('adminheader.php');

include("connection.php");
    $result=mysqli_query($conn,"SELECT * FROM recipe_chatagory");
    $rows=mysqli_num_rows($result);
?>
<div class="container">
    <div class="row justify-content-md-center">
        <h1>Update Chatagory</h1>
    </div>
    <div class="clear-fix"></div>
    <div class="row">
        <div class="col">
            <form name="update" method="post" onsubmit="return postchatagory()" action="updatecategory.php">
                <div class="form-group">
                    <label for="oldchatagory">Categories</label>
                    <select class="form-control" onclick="updateInput(this)" name="chatid">
                    <?php 
                        if ($rows> 0)
                        {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                array_push($res,$row['id'],$row['name']);
                                echo "<option value='" . $row['id']. "'>". $row['name']."</option>";
                            }

                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="chatagory">Change</label>
                    <input type="text" class="form-control" id="chatagory" name="chatagory" onkeyup="checkchatagory()">
                    <span id="chaterr"></span>
                </div>
                <button class="btn btn-success btn-lg btn-block" type="submit">Update</button>
        </form>
    </div>   
</div>
<?php 
 include("footer.php")
?>
