<?php
include 'db.php';

if (isset($_GET['id'])) {
    $contact_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM contacts WHERE id = $contact_id");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Contact not found.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts SET name=?, nickname=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $nickname, $email, $phone, $id);
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
  <title>Edit Contact</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    .form-container {
      max-width: 600px;
      margin: 80px auto;
      padding: 30px;
    }

    h1 {
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

    .btn i {
      margin-left: 5px;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h1>Edit Contact</h1>
    <form method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

      <label class="form-label" for="name">Full Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($row['name']) ?>">

      <label class="form-label" for="nickname">Nickname</label>
      <input type="text" class="form-control" id="nickname" name="nickname" value="<?= htmlspecialchars($row['nickname']) ?>">

      <label class="form-label" for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($row['email']) ?>">

      <label class="form-label" for="phone">Phone Number</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($row['phone']) ?>">

      <div class="form-actions d-flex align-items-center">
        <button type="submit" class="btn btn-outline-dark">
          Save Contact <i class="fa-solid fa-floppy-disk"></i>
        </button>
      </div>
    </form>
  </div>

</body>
</html>
