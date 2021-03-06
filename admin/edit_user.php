<?php

include("includes/header.php");

if (!$session->is_signed_in()) {
    redirect("login.php");
}

if (empty($_GET["id"])) {
    redirect("users.php");
}


$user = User::find_by_id($_GET["id"]);


if (isset($_POST["update"])) {

    if ($user) {
        $user->username = $_POST["username"];
        $user->first_name = $_POST["first_name"];
        $user->last_name = $_POST["last_name"];
        $user->password = $_POST["password"];

        if (empty($_FILES["user_image"])) {
            $user->save();
        } else {
            $user->set_file($_FILES["user_image"]);
            $user->upload_photo();
            $user->save();
        }

        redirect("edit_user.php?id={$user->id}");
    }
}


if (isset($_POST["delete"])) {

    if ($user) {
        $user->username = $_POST["username"];
        $user->first_name = $_POST["first_name"];
        $user->last_name = $_POST["last_name"];
        $user->password = $_POST["password"];


        redirect("edit_user.php?id={$user->id}");
    }
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

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    User
                    <small>Subheading</small>
                </h1>

                <div class="col-md-6">
                    <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                </div>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="first name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="last name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                        </div>


                        <div class="form-group">
                            <a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id ?>">Delete</a>
                            <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                        </div>








                    </div> <!-- end col-8 -->




                </form>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>