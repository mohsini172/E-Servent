


<!--  Scripts-->
<script src="js/angular.min.js"></script>
<script src="js/app.js"></script>
<script src="js/personsController.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
</script>
</body>

</html>