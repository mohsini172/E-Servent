<?php
include_once 'include/adminHeader.php';
?>

    <div ng-controller='myCat' class="pad-left-right">
        <div ng-repeat="cat in data" class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">{{cat.sname}}</span>
                <textarea length="200" style="border:none;" disabled="true" id={{cat.sname+ "area"}}>{{cat.persona}}</textarea>
                <!--p>{{cat.persona}}</p-->
            </div>
            <div class="card-action">
                <button id={{cat.sname+ "EditBtn"}} ng-click="onEditClick(cat.sname)" class="btn">Edit</button>
                <button style="display:none;" id={{cat.sname+ "SaveBtn"}} ng-click="onSaveClick(cat.sname,cat.persona)" class="btn">Save</button>
                <button id={{cat.sname+ "RemoveBtn"}} ng-click="onRemoveClick(cat.sname,cat.persona)" class="btn">Remove</button>
            </div>
        </div>
    </div>
    <div class="col l12 m12 s12 pad-left-right">
        <form action="include/categoryManagement.php" method="get">
            <div class="row">
                <div class="input-field col l6 m6">
                    <select class="" id="category-select">
                        <option value="" disabled selected>Select Category</option>
                </div>
                </select>
            </div>
            <div class="input-field col l6 m6">
                <select name="subCategorySelect" id="subCategorySelect">
                    <option value="" disabled selected>Select Sub-Category</option>
                </select>
            </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea name="persona" id="persona" class="materialize-textarea" length="200"></textarea>
            <label for="persona">Persona</label>
        </div>
    </div>
    <div class="input-field col l6 m6">
        <input type="hidden" name="operation" value="add" />
        <input type="submit" class="btn" value="Add" />
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    </form>

    </div>

    </header>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "include/getCat.php"
                , type: "get", //send it through get method
                data: {
                    "operation": "getCategories"
                }
                , success: function (data) {
                    data = JSON.parse(data);
                    for (var i = 0; i < data.length; i++) {
                        $("#category-select").append("<option>" + data[i].cname + "</option>");
                        console.log("<option>" + data[i].cname + "</option>");
                    }
                    $('select').material_select('destroy');
                    $('select').material_select();
                    console.log(data);
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
            $(".button-collapse").sideNav();
            $('select').material_select();
            $("#menuText").text("Manage My Categories");

        });
    </script>
    </body>

    </html>