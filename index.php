<?php
include 'includes/config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $property_type = $_POST['property_type'];
    $checkbox = isset($_POST['site_visit']) ? 1 : 0;

    $insert_data = mysqli_query(
        $conn,
        "INSERT INTO contactform (name, email, phone, property_type, site_visit) 
        VALUES ('$name','$email','$phone','$property_type','$checkbox')");
    if ($insert_data) {
        header("Location: success.php");
        exit;
    } else {
        echo "Error";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Real Estate Landing Page</title>
    <?php include "includes/stylesheet.php"; ?>
</head>

<body>
    <div class="hero d-flex justify-content-center align-items-center text-center text-white">
        <div>
            <h1 class="display-4 fw-bold">Luxury Real Estate</h1>
            <p class="lead">Find your dream home with premium amenities</p>
            <a href="#contact" class="btn btn-warning btn-lg mt-3">Book a Site Visit</a>
        </div>
    </div>

    <?php include "includes/service.php" ?>

    <?php include "includes/gallery.php"; ?>


    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your full name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter phone number"
                                required maxlength="10" minlength="10">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Property Type *</label>
                            <select name="property_type" class="form-select" required>
                                <option value="">Select Property Type</option>
                                <option value="1 BHK">1 BHK</option>
                                <option value="2 BHK">2 BHK</option>
                                <option value="3 BHK">3 BHK</option>
                                <option value="Villa">Villa</option>
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="site_visit" class="form-check-input" id="visit" required>
                            <label class="form-check-label" for="visit">
                                I want a site visit
                            </label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning w-100">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>