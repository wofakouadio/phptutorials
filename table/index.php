<?php

$conn = mysqli_connect('localhost', 'root', '', 'members_db');

if (!$conn) {

    echo 'Unable to connect to DB';
    die($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table Data with DataTables</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" />
</head>

<body>

    <table id="MyTable" class="table table-bordered table-striped table-hover">

        <thead>
            <tr>
                <th>Ambassador Name</th>
                <th>contact</th>
                <th>location</th>
                <th>Profession</th>
            </tr>
        </thead>

        <tbody>

            <?php

            $fetch_all_data_sql = mysqli_query($conn, 'SELECT * FROM ambassadors');
            while ($fetch_all_data_row = mysqli_fetch_array($fetch_all_data_sql)) {

            ?>

                <tr>

                    <td><?php echo $fetch_all_data_row['ambassador_name'] ?></td>
                    <td><?php echo $fetch_all_data_row['ambassador_contact'] ?></td>
                    <td><?php echo $fetch_all_data_row['ambassador_location'] ?></td>
                    <td><?php echo $fetch_all_data_row['ambassador_profession'] ?></td>

                </tr>

            <?php


            }

            ?>

        </tbody>

        <tfoot>
            <tr>
                <th>Ambassador Name</th>
                <th>contact</th>
                <th>location</th>
                <th>Profession</th>
            </tr>
        </tfoot>

    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#MyTable").DataTable();

        });
    </script>

</body>

</html>