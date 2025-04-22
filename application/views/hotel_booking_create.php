<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Hotel Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 5px;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        form button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>HOTEL BOOKING SYSTEM - Create Booking</h1>
    <form method="POST" action="<?php echo site_url('hotelbooking/store'); ?>">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="date" name="check_in" required>
        <input type="date" name="check_out" required>
        <button type="submit">Create Booking</button>
    </form>

    <?php if (!empty($bookings)): ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo htmlspecialchars($booking->name, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($booking->email, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($booking->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($booking->check_in, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($booking->check_out, ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="actions">
                    <a href="<?php echo site_url('hotelbooking/edit/' . $booking->id); ?>">Edit</a> |
                    <a href="<?php echo site_url('hotelbooking/delete/' . $booking->id); ?>" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p style="text-align:center;">No bookings found.</p>
    <?php endif; ?>

    <div style="margin-top: 20px; display: flex; justify-content: space-between;">
        <a href="<?php echo site_url('user/logout'); ?>" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px;">Logout</a>
        <a href="<?php echo site_url('Record_list'); ?>" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px;">Record List</a>
    </div>
</body>
</html>