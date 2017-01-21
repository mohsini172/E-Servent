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

?>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 class="header center orange-text">Welcome to E-Servant</h1>
            <div class="row center">
                <h5 class="header col s12 light">Here you can find the online utilities.</h5>
            </div>
            <div class="row ">
                <form action = "search.php" method="get">
                    <div class="input-field col l6 m6 s12">
                        <input name = "search" id="search" type="text" class="validate" required>
                        <label class="left" for="Search">Search</label>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <select name = "category" id="category-select">
                            <option value="" disabled selected>Category</option>

                        </select>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <select name = "subcategory" id="subCategorySelect">
                            <option value="" disabled selected>Sub-Cat</option>

                        </select>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <button id="submit" type="submit" class="waves-effect waves-light btn">Search</button>
                        <label class="left" for="Search">Search</label>
                    </div>
                </form>
            </div>
            <!-- Categories Shown from here -->
            <div ng-app="myApp">
                <div ng-controller="catCardController" class="row">
                    <div ng-repeat="category in data" class="col s12 m3 hoverable">
                        <a href="subcat.php?category={{category.cname}}">
                            <div class="card {{arr[random()]}}">
                                <div class="card-image">
                                    <img ng-src={{category.icon}} />
                                    <!-- <span class="card-title black-text"></span> -->
                                </div>
                                <!-- <div class="card-content">
                              <p>I am a very simple card. I am good at containing small bits of information.
                              I am convenient because I require little markup to use effectively.</p>
                              </div> -->
                                <div class="card-action">
                                    <a class="black-text" href="subcat.php?category={{category.cname}}">{{category.cname}}</a>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        var categories = "";
        $(document).ready(function () {

            $.ajax({
                url: "include/getCat.php"
                , type: "get", //send it through get method
                data: {
                    "operation": "getCategories"
                }
                , success: function (data) {
                    data = JSON.parse(data);
                    categories = data;
                    for (var i = 0; i < data.length; i++) {
                        $("#category-select").append("<option>" + data[i].cname + "</option>");
                    }
                    $('select').material_select('destroy');
                    $('select').material_select();
                }
                , error: function (xhr) {
                    console.log(xhr);
                }
            });
            // Initialize collapse button
            $("#category-select").on("change", function () {
                var selected = $("#category-select").val();
                $.ajax({
                    url: "include/getCat.php"
                    , type: "get", //send it through get method
                    data: {
                        "operation": "getSubCategories"
                        , "category": selected
                    }
                    , success: function (data) {
                        data = JSON.parse(data);
                        $("#subCategorySelect").html("");
                        for (var i = 0; i < data.length; i++) {
                            $("#subCategorySelect").append("<option>" + data[i].sname + "</option>");
                            console.log("<option>" + data[i].sname + "</option>");
                        }
                        $('select').material_select('destroy');
                        $('select').material_select();
                        console.log(data);
                    }
                    , error: function (xhr) {
                        console.log(xhr);
                    }
                });

            });
        });
    </script>

    <div class="container">

    </div>
    <?php include 'include/footer.php'; ?>