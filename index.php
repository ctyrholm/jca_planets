<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Planets</title>
    <style>


    </style>
</head>
<body style = "background-color: black; color: white;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Planets</a>
    </nav>

        <div class="container-fluid"><br>
        <h2>The Planets of Our Solar System:</h2><br><br>
            <div class="row">
                <div class="col-md-12 table-responsive">

                    <table style = "color: white;" class = "table">
                        <tr>
                            <th>Planet Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Distance from the Sun</th>
                            <th>Radius</th>
                            <th>Mass</th>
                            <th>Length of Day</th>
                            <th>Orbital Period</th>
                            <th>Good Map Link</th>
                        </tr>
                    <?php
                        $servername = "localhost";
                        $username = "ctyrholm";
                        $password = "I2N1qlfUtljZ9ZUH";
                        $dbname = "ctyrholm";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM planets";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td><img src = "images/'.strtolower($row["planet_name"]).'.jpg" class = "image-responsive" style = "width: 200px;"></td>';

                            echo "<td> " . $row["planet_name"]. "</td>";
                            echo "<td> " . $row["description"]. "</td>";
                            echo "<td> " . $row["distance_from_sun"]. "</td>";
                            echo "<td> " . $row["radius"]. "</td>";
                            echo "<td> " . $row["mass"]. "</td>";
                            echo "<td> " . $row["length_of_day"]. "</td>";
                            echo "<td> " . $row["orbital_period"]. "</td>";
                            echo "<td><a class = 'btn btn-info' role='button' href = '".$row['google_map_link']."'>Google Maps</a></td>"; 
                            echo '</tr>';
                        }
                        } else {
                        echo "0 results";
                        }
                        $conn->close();
                    ?>
                    </table>
                </div>
            </div>
        </div>


    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


