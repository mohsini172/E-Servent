<?php
include_once 'include/adminHeader.php';
require_once('include/database.php');
$user = $_SESSION['username'];
$query = "select * from appointment join object on(appointment.clientId = object.username) where isApproved = 1 and appointment.username = '$user'";
$result = $db->fetch($query);
?>
    <div class="pad-left-right">
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Appointment With</th>
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
    </script>
    </header>
    </body>

    </html>