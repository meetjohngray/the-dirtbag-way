<!--
Author: John Gray
Last Revision: 04.29.14
File Name: home_admin.php
Description: Home page for admin users 
-->

<?php
// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_user'])) {
    header("Location: ..");
}
include('view/header.php'); //Connect to header file
?>

<body id='home_admin'>
    <div class="container">
        <?php include('view/admin_nav.php') // Include navigation specific to authorized users ?>

        <header>
            <h1>The Dirtbag Way</h1>
        </header>

        <section class="row">
            <div class="col-lg-9 col-sm-8 col-lg-push-3 col-sm-push-4">
                <h1>Administrators</h1>
                <article>
                    <p>Please use the tools here to edit users' profiles, add and edit activities. In time, more tools will be placed here for your use in administering the dirtbagway.</p>
                </article>
            </div>
			<?php include('view/admin_sidebar.php') // Include navigation specific to authorized users ?>
        </section> <!-- End Row -->
        <?php include('view/footer.php'); ?>
