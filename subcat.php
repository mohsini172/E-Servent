<?php
require('include/session.php');
require_once('include/database.php');
if(isLogin())
{
    include 'include/userHeader.php';
}
else
{
    include 'include/header.php';
}
$category = $_GET['category'];
$query = "select * from subcat where cname = '$category'";
$result = $db->fetch($query);

?>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 class="header center orange-text"><?php echo $_GET['category']; ?></h1>

            <div class="row ">
                <form action = "search.php" method="get">
                    <div class="input-field col l8 m8 s12">
                        <input name = "search" id="search" type="text" class="validate" required>
                        <label class="left" for="Search">Search</label>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <select  name="subcategory">
                            <option value="" disabled selected>Sub-Cat</option>
                            <?php
                            if($result)
                            {
                                foreach($result as $row)
                                {
                                    echo "<option>".$row["sname"]."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <button id="submit" type="submit" class="waves-effect waves-light btn">Search</button>
                        <label class="left" for="Search">Search</label>
                    </div>
                </form>
            </div>
            <!-- Categories Shown from here -->
            <div>

              <?php
              if(isset($_GET['category']))
              {
                function getColor()
                {
                  $colors = array("teal","orange","grey","red","blue","green","yellow","purple","cyan","amber");
                  return $colors[rand(0,9)];
                }
                
                echo "<div class='row'>";
                if($result)
                {
                  foreach($result as $row)
                  {
                    echo "<a href='persons.php?subcategory=".$row['sname']."'>";
                    echo "<div class='col s12 m3 l3 hoverable '>
                            <div class='card  ".getColor()."'>
                                <div class='card-image'>
                                    <img src='".$row['icon']."'>
                                </div>
                                <div class='card-action'>
                                    <a class = 'black-text' href='persons.php?subcategory=".$row['sname']."'>".$row['sname']."</a>
                                </div>
                            </div>
                        </a></div>
                  ";
                  }
                }
                echo "</div>";
              }
              ?>
                  
            </div>
        </div>
    </div>



<?php
include 'include/footer.php';
?>