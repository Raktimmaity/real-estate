<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel || Estate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liter&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Liter", serif;
            font-weight: 400;
            font-style: normal;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }

        .active-link {
            background-color: #00B98E !important;
            color: #0E2E50 !important;
            font-weight: bold;
            border-radius: 5px;
        }

        .dropdown-menu {
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item:hover {
            background-color: #0d6efd !important;
            color: #fff !important;
            border-radius: 5px;
        }

        .nav-link:hover {
            background-color: #343a40;
            border-radius: 5px;
        }
    </style>
</head>