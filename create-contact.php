<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, nickname, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $nickname, $email, $phone);
    $stmt->execute();

    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Contact</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <style>
    body {
      background-color: #fff;
    }

    .form-container {
      max-width: 600px;
      margin: 80px auto;
      padding: 30px;
    }

    .form-container h1 {
      font-weight: bold;
      margin-bottom: 30px;
    }

    .form-label {
      margin-top: 10px;
      margin-bottom: 5px;
    }

    .form-control {
      border-radius: 6px;
    }

    .form-actions {
      margin-top: 20px;
    }

    .btn-add {
      margin-right: 10px;
    }

    .btn i {
      margin-left: 5px;
    }

    a.cancel-link {
      margin-top: 10px;
      display: inline-block;
      text-decoration: none;
      color: black;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Create New Contact</h1>

    <form method="POST">

      <label for="name" class="form-label">Full Name</label>
      <input type="text" id="name" name="name" class="form-control">

      <label for="name" class="form-label">Nickname</label>
      <input type="text" id="nickname" name="nickname" class="form-control">

      <label for="email" class="form-label">Email Address</label>
      <input type="email" id="email" name="email" class="form-control">

      <label for="phone" class="form-label">Phone Number</label>
      <input type="text" id="phone" name="phone" class="form-control">

      <div class="form-actions d-flex align-items-center">
        <button type="submit" class="btn btn-outline-dark btn-add">
          Add Contact <i class="fa-solid fa-right-from-bracket"></i>
        </button>
        <a href="home.php" class="cancel-link">Cancel</a>
      </div>
    </form>
  </div>

</body>
</html>
