<form method="POST" action="<?php echo site_url('hotelbooking/update/' . $booking->id); ?>">
    <input type="text" name="name" value="<?php echo $booking->name; ?>" required>
    <input type="email" name="email" value="<?php echo $booking->email; ?>" required>
    <input type="text" name="phone" value="<?php echo $booking->phone; ?>" required>
    <input type="date" name="check_in" value="<?php echo $booking->check_in; ?>" required>
    <input type="date" name="check_out" value="<?php echo $booking->check_out; ?>" required>
    <button type="submit">Update Booking</button>
</form>
