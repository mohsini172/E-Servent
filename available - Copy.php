<?php
include_once 'include/adminHeader.php';
include_once 'include/database.php';
?>
<div class="pad-left-right">
    <div style="padding:10px;" class="card">
	<table class="">
		<thead>
			<tr>
				<th>Day</th>
				<th>From</th>
				<th>To</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$user = $_SESSION['username'];
			$query = "select * from availability where username = '$user'";
			$result = $db->fetch($query);
			if($result)
			{
				foreach($result as $row)
				{
					echo "<tr>";
					echo "<td>".$row['day']."</td>";
					echo "<td>".$row['timeFrom']."</td>";
					echo "<td>".$row['timeto']."</td>";
					echo "<td>
					<button class = 'btn' onclick = 'deleteClicked(".$row['id'].")'>Delete</button>
					</td>";
					echo "</tr>";
				}
			}
			?>
			<tr>
				<td>
					<form action="include/availableHandler.php" method="post">
					<input type="hidden" name="type" value="add">
					<select required name = "day">
						<option value="Monday" selected >Monday</option>
						<option value="Tuesday" >Tuesday</option>
						<option value="Wednesday" >Wednesday</option>
						<option value="Thursday" >Thursday</option>
						<option value="Friday" >Friday</option>
						<option value="Saturday" >Saturday</option>
						<option value="Sunday" >Sunday</option>
					</select>	
						
				</td>
				<td>
					<input required type="time" name="timeFrom" />
				</td>
				<td>
					<input required type="time" name="timeto" />
				</td>
				<td><input class="btn" required type="submit" name="submit" value="Add"></td>
					</form>

			</tr>
			</tbody>
			<script type="text/javascript">
				function deleteClicked(id)
				{
					$.ajax({
			          url: "include/availableHandler.php",
			          type: "post", //send it through get method
			          data:{"type":"delete","id":id},
			          success: function(data) {
			            if(data=="success")
			            {
			            	location.href="available.php";
			            }
			            else
			            {
			            	alert("Unable to delete");
			            }
			          },
			          error: function(xhr) {
			            console.log(xhr);
			          }
			        });
				}
					
				$('select').material_select();
			</script>
		</body>
	</table>
</div>
</div>