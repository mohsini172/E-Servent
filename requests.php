<?php
include_once 'include/adminHeader.php';
require_once('include/database.php');
$user = $_SESSION['username'];
$query = "select * from appointment join object on(appointment.clientId = object.username) where isApproved = 0 and appointment.username = '$user'";
$result = $db->fetch($query);
if($result)
{
    echo "<div class='row'>";
    foreach($result as $row)
    {
        echo "<div class='row''>
            <div style='padding:20px;' class='col m12 l5 s12'>
                <div class='card'>
                    <div style='padding-top:5px;' class='center'>
                        <h5>".$row['oname']."</h5>
                        <img src='".$row['photo']."' style='width:200px;' class='circle responsive-img' />
                    </div>
                    <br />
                    <hr style='margin:0px 20px 0px 20px;'>
                    <div class='card-content'>
                        <ul>
                            <li style='padding-top:10px;'><b>Requested For</b>:  ".$row['sname']." </li>
                            <li style='padding-top:10px;'>Date: ".$row['date']." </li>
                            <li style='padding-top:10px;'>Time: ".$row['time']."</li>
                            <li style='padding-top:10px;'>".$row['address'].", ".$row['city']."</li>
                        </ul>
                    </div>
                    <div class='card-action'>
                        <button onclick='approveClicked(".$row['id'].")' class='btn green'>Approve</button>
                        <button onclick='rejectClicked(".$row['id'].")' class='btn right red'>Reject</button>
                    </div>
                </div>
            </div>";
    }
    echo "</div>";
}

?>
<script>
    var requestId;
</script>
    <div id="confirmationModel" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Confirmation</h4>
            <p>Are you sure you want to reject?</p>
        </div>
        <div class="modal-footer">
            <button class="btn red" onClick="rejectConfirmed()">Agree</button>
        </div>
    </div>
    <script>
        function approveClicked(id) {
            $.ajax({
                url: "include/appoinmentHandler.php"
                , type: "post", //send it through get method
                data: {
                    "operation": "addRequest"
                    , "id": id
                }
                , success: function (data) {
                    if (data == "success") {
                        location.reload();
                    } else {
                        console.log("error");
                    }
                }
                , error: function (xhr) {
                    console.log(xhr);
                }
            });
        }
        
        function rejectConfirmed()
        {
            $.ajax({
                url: "include/appoinmentHandler.php"
                , type: "post", //send it through get method
                data: {
                    "operation": "removeRequest"
                    , "id": requestId
                }
                , success: function (data) {
                    if (data == "success") {
                        location.reload();
                    } else {
                        console.log("error");
                    }
                }
                , error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        function rejectClicked(id) {
            requestId = id;
            $("#confirmationModel").openModal();
        }
    </script>
    <script>
        // Initialize collapse button
        $(".button-collapse").sideNav();
        $("#menuText").text("Requests");
        $('.modal-trigger').leanModal();
    </script>
    </header>
    </body>

    </html>