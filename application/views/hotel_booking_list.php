<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Booking System</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
        .create-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
        }
        .create-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>HOTEL BOOKING SYSTEM</h1>
    
    <p><a class="create-link" href="<?php echo site_url('hotelbooking/create'); ?>">Create New Booking</a></p>
</body>
</html>
