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
echo  "<script> var person = '".$_GET['person']."';</script>";
echo  "<script> var subcat = '".$_GET['subcat']."';</script>";
?>
    <div ng-app="personHandler">
        <div ng-controller="profileController" class="row">
            <div style="padding:20px;" class="col m6 l3 s12">
                <div class="card">
                    <div style="padding-top:5px;" class="center">
                        <h5>{{object[0].oname}}</h5>
                        <img style="width:150px;" class="circle responsive-img" ng-src="{{object[0].photo}}" />
                    </div>
                    <hr style="margin:0px 20px 0px 20px;">
                    <div class="card-content">
                        <ul>
                            <li style="padding-top:10px;">{{object[0].sname}}, {{object[0].cname}}</li>
                            <li style="padding-top:10px;">{{object[0].address}}, {{object[0].city}}</li>
                            <li style="padding-top:10px;">{{object[0].email}}</li>
                        </ul>
                    </div>
                    <!--
                <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                </div>
-->
                </div>
            </div>
            <div class="col m6 l9 s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Description</span>
                        <p>{{object[0].persona}}</p>
                    </div>
                    <div class="card-action">
                        <form style="display:none;" id="appointmentForm">
                            <div class="row">
                                <div class="input-field col s12 l5 m5">
                                    Date:
                                    <input id="date" name="date" class="datepicker" type="date" required/>
                                </div>

                                <div class="input-field col s12 l5 m5">
                                    Time:
                                    <input id="time" name="time" type="time" required/>
                                </div>
                                <div class="input-field col s12 l2 m2">
                                    <br />
                                    <input class="btn" type="submit" value="Set" />
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_SESSION['username']))
                        {
                            echo "<button id='showform' class='btn'>Add Appointment</button>";
                        }
                        else
                        {
                            echo "<button id='showlogin' class='btn''>Add Appointment</button>";
                        }
                        
                        ?>
                            <!--
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                        -->

                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Available Hours</span>
                        <table>
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="row in availablility">
                                    <td>{{row.day}}</td>
                                    <td>{{row.timeFrom}}</td>
                                    <td>{{row.timeto}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Already Set</span>
                        <table>
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="row in appointment">
                                    <td>{{row.time}}</td>
                                    <td>{{row.date}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#appointmentForm").submit(function () {
                var date = $("#date").val();
                var time = $("#time").val();
                $.ajax({
                    url: "include/pendingHandler.php"
                    , type: "post", //send it through get method
                    data: {
                        "operation": "add"
                        , "date": date
                        , "time": time
                        , "person": person
                        , "subcategory": subcat
                    }
                    , success: function (data) {
                        if (data == "success") {
                            alert("Your request was successfull please check you pending list");
                        } else {
                            alert("Error sending request");
                        }
                    }
                    , error: function (xhr) {
                        console.log(xhr);
                    }
                });
                $("#appointmentForm").toggle();
                $("#showform").toggle();
            });
            $("#showform").click(function () {
                $("#appointmentForm").toggle();
                $("#showform").toggle();
            });
            $("#showlogin").click(function () {
                $('#signin').openModal();
            });
        });
    </script>







    <?php
    include 'include/footer.php';
?>