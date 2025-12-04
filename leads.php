<?php
include "includes/config.php";
$sel_contact_data = mysqli_query($conn, "SELECT * FROM contactform ");
$i = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Submitted Leads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">Submitted Forms</h2>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property Type</th>
                            <th>Site Visit</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($fetch_data = mysqli_fetch_assoc($sel_contact_data)) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetch_data['name']; ?></td>
                                <td><?php echo $fetch_data['email']; ?></td>
                                <td><?php echo $fetch_data['phone']; ?></td>
                                <td><?php echo $fetch_data['property_type']; ?></td>
                                <td><?php echo $fetch_data['site_visit'] == 1 ? 'Yes' : 'No'; ?></td>
                            </tr>
                            <?php
                            ?>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
            </div>
        </div>
    </div>

</body>

</html>