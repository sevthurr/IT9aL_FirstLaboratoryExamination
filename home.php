<?php
include 'db.php';

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyContacts</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style>
    body {
      background-color: #fff;
    }

    .title {
      text-align: center;
      margin-top: 40px;
      font-weight: bold;
    }

    .add-btn {
      display: block;
      width: fit-content;
      margin: 20px auto;
    }

    .contact-card {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #eee;
      border-radius: 8px;
      background-color: #fff;
    }

    .contact-name {
      font-weight: bold;
      font-size: 1.1rem;
    }

    .card-actions {
      position: absolute;
      top: 15px;
      right: 20px;
    }

    .card-container {
      position: relative;
    }
  </style>
</head>
<body>

  <h1 class="title">My Contacts</h1>

  <a href="create-contact.php" class="btn btn-dark add-btn">
    Add Contact <i class="fa-solid fa-plus"></i>
  </a>

  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="contact-card shadow-sm card-container">
      <div class="card-actions dropdown">
        <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-ellipsis"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="edit-contact.php?id=<?= $row['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
          <li><a class="dropdown-item text-danger" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contact?')"> <i class="fa-solid fa-trash"></i> Delete</a></li>
        </ul>
      </div>

      <div class="contact-name"><?= htmlspecialchars($row['name']) ?></div>
      <div><?= htmlspecialchars($row['email']) ?></div>
      <div><?= htmlspecialchars($row['phone']) ?></div>
      <div><?= htmlspecialchars($row['nickname']) ?></div>
    </div>
  <?php endwhile; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
