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
echo "<script>var subcat = '".$_GET['subcategory']."';</script>"
?>
    <div ng-app="personHandler" class="section no-pad-bot" id="index-banner">
        <div ng-controller = "personController" class="container">
            <h1 class="header center orange-text">{{subcat}}</h1>

            <div class="row ">
                <form>
                    <div class="input-field col l10 m10 s12">
                        <input ng-model="search" id="search" type="text" class="validate" required>
                        <label class="left" for="Search">Search</label>
                    </div>
                    <div class="input-field col l2 m2 s12">
                        <input ng-model="searchCity" id="searchCity" type="text" class="validate" required>
                        <label class="left" for="searchCity">City</label>
                    </div>
                </form>
            </div>
            <ul class="collection">
                
                <li ng-repeat="person in data |filter:search |filter:{city:searchCity}" class="collection-item avatar">
                    <a href="profile.php?subcat={{person.sname}}&person={{person.username}}">
                    <img style="height:65px;width:65px;" ng-src="{{person.photo}}" alt="" class="circle">
                    <p style="padding-left:20px;" class="title"> {{person.oname}}</p>
                    <p style="padding-left:20px;"><strong>Live In: </strong> {{person.city}}</p>
                    <p style="padding-left:20px;"><strong>Email:</strong> {{person.email}}</p>
                    </a>
                    
<!--                    filter:{gender:search }-->

                </li>
                
            </ul>

        </div>
    </div>


    <?php
    include 'include/footer.php';
?>