<?php include("includes/header.php");

if (!$session->is_signed_in()) {
    redirect("login.php");
}

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


    <!--------  top menu items    -------->
    <?php include("includes/top_nav.php"); ?>

    <!--------  sidebar menu items    -------->
    <?php include("includes/side_nav.php"); ?>


    <!-- /.navbar-collapse -->
</nav>



<div id="page-wrapper">

    <?php include("includes/admin_content.php") ?>

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>