<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
    }

    .sidebar {
        background-color: #4A7A7A;
        width: 200px;
        padding: 20px;
        box-sizing: border-box;
    }

    .sidebar a {
        display: block;
        padding: 15px;
        margin-bottom: 10px;
        text-decoration: none;
        color: black;
        background-color: white;
        border-radius: 10px;
        text-align: center;
    }

    .sidebar a.active {
        background-color: #DFFFD6;
        color: red;
    }

    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: #FADADD;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #E0E0E0;
    }

    th {
        background-color: #D3AFAF;
    }

    .attendance {
        color: green;
    }

    .absent {
        color: red;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="#">Home</a>
            <a href="#">Information Access</a>
            <a href="#" class="active">View attendance</a>
            <a href="#">View student list</a>
            <a href="#">View schedule</a>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Slot</th>
                        <th>Lecturer</th>
                        <th>Group Name</th>
                        <th>Attendance Status</th>
                        <th>Lecture Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mon(09/09)</td>
                        <td>1,2</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="attendance">Attendance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tue(10/09)</td>
                        <td>2,3</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="absent">Absent</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Web(11/09)</td>
                        <td>1,2</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="attendance">Attendance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Thu(12/09)</td>
                        <td>4,5</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="attendance">Attendance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Fri(13/09)</td>
                        <td>3,4</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="attendance">Attendance</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Sat(14/09)</td>
                        <td>1,2</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="absent">Absent</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Mon(16/09)</td>
                        <td>1,2</td>
                        <td>Name</td>
                        <td>ABC001</td>
                        <td class="attendance">Attendance</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>