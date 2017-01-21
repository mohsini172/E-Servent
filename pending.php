<?php
include_once 'include/adminHeader.php';
require_once('include/database.php');
$user = $_SESSION['username'];
$query = "select * from appointment join object on(appointment.username = object.username) where isApproved = 0 and appointment.clientId = '$user'";
$result = $db->fetch($query);
?>
    <div class="pad-left-right">
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Requested To</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if($result)
                {
                    foreach($result as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['time']."</td>";
                        echo "<td>".$row['oname']."</td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Initialize collapse button
        $(".button-collapse").sideNav();
        $("#menuText").text("Pending");
    </script>
    </header>
    </body>

    </html>