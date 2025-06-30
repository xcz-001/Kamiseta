<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/bootstrapmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">

</head>
<body class="d-flex">
  <div id="sidebar" class="bg-dark text-white vh-100 p-3 sidebar">
    <button id="toggle-btn" class="btn btn-outline-light btn-primary w-100 mb-3">
      ☰
    </button>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">
          <i class="bi 	bi-people"></i> <span class="link-text">Users</span>
        </a>
      </li>
      <li class="nav-item">
       <div class="dropdown">
          <a href="#" class="nav-link d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownProduct" data-bs-toggle="dropdown" aria-expanded="true">
            <i class="bi bi-box-seam"></i> <span class="link-text">Products</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownProduct">
              <li><span class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</span></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Barong</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Filipiniana</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Motif</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Accessories</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Fullset</a></li>
              <li><hr class="dropdown-divider"></li>
          </ul>
        </div>
       </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">
          <i class="bi bi-graph-up"></i> <span class="link-text">Sales</span>
        </a>
        <!-- end of nav -->
      </li>

    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://ui-avatars.com/api/?name=User" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Admin</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><button class="dropdown-item btn btn-danger" onclick="logout()">Logout</button></li>
        </ul>
    </div>
  </div>

<!-- modals are here because nav.php is required in all admin pages -->
  <!-- Addproduct Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-secondary">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addProductForm" enctype="multipart/form-data" class="text-white">
          <div class="row g-2 mb-2">
            <div class="col"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
            <div class="col"><input type="text" name="description" class="form-control" placeholder="Description" required></div>
          </div>
          <div class="row g-2 mb-2">
            <div class="col"><input type="number" min="0" name="qty" class="form-control" placeholder="Qty" required></div>
            <div class="col"><input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required></div>
            <div class="col"><input type="file" name="image" class="form-control" accept="image/*" required></div>
          </div>
          <button type="submit" class="btn btn-success">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

