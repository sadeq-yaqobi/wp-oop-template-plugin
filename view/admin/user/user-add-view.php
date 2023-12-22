<!-- User Registration Form -->
<h1>افزودن کاربر</h1>
<form action="" id="userRegister">
    <!-- Input field for user's name -->
    <input type="text" placeholder="نام" id="userName">

    <!-- Input field for user's family name -->
    <input type="text" placeholder="نام خانوادگی" id="userFamily">

    <!-- Submit button to add the user -->
    <input type="submit" name="submit" value="افزودن کاربر">

    <!-- WordPress nonce field for security -->
    <?php wp_nonce_field('add_user_nonce', 'add_users_nonce') ?>
</form>

