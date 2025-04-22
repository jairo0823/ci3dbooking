<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('login'); ?>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" />
        </p>
        <p>
            <button type="submit">Login</button>
        </p>
    <?php echo form_close(); ?>
    <p>Don't have an account? <a href="<?php echo site_url('register'); ?>">Register here</a></p>
</body>
</html>
