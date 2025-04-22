<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color:green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('register'); ?>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo set_value('username'); ?>" />
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" />
        </p>
        <p>
            <label for="password_confirm">Confirm Password:</label>
            <input type="password" name="password_confirm" />
        </p>
        <p>
            <button type="submit">Register</button>
        </p>
    <?php echo form_close(); ?>
    <p>Already have an account? <a href="<?php echo site_url('login'); ?>">Login here</a></p>
</body>
</html>
