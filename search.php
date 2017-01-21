<?php
require('include/session.php');
if(isLogin())
{
    include 'include/userHeader.php';
}
else
{
    include 'include/header.php';
}
require_once('include/database.php');
if(isset($_GET['subcategory']))
{
    $search = $_GET['search'];
    $subcat = $_GET['subcategory'];
    $query = "select * from object join subcat_user using(username) join subcat using(sname) join
        category using(cname) 
        where oname like '%$search%' and sname = '$subcat';";
    $result = $db->fetch($query);
    if($result)
    {
        foreach($result as $row)
        {
            echo "<div class='container row'>
                    <ul class='collection col l12 m12 s12 white'>
                        <li class='collection-item avatar'>
                            <a href='profile.php?subcat=".$row['sname']."&person=".$row['username']."'>
                                <img src='".$row['photo']."' style='height:65px;width:65px;' class='circle'>
                                <p style='padding-left:20px;' class='title'> ".$row['oname']."</p>
                                <p style='padding-left:20px;'><strong>Live In: ".$row['address'].", ".$row['city']."</strong> </p>
                                <p style='padding-left:20px;'><strong>Email: ".$row['email']."</strong></p>
                            </a>
                        </li>
            
                    </ul>
                </div>";
        }
    }
}
?>

    <?php
include 'include/footer.php';
?>