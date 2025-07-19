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
        <a class="nav-link text-white active-page" data-page="users" href="#">
          <i class="bi 	bi-people"></i> <span class="link-text">Users</span>
        </a>
      </li>
      <li class="nav-item">
       <div class="dropdown">
          <a href="#" data-page="products" class="nav-link d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownProduct" data-bs-toggle="dropdown" aria-expanded="true">
            <i class="bi bi-box-seam"></i> <span class="link-text ">Products</span>
          </a>

          <ul id="productUl" class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownProduct">
              <li class="px-2"><button class="text-dark btn btn-success rounded dropdown-item" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button></li>
              <li><hr class="dropdown-divider"></li>
              <li><button data-productcategory="all" class="dropdown-item" onclick="loadProducts(this)" >All Products</button></li>
              <li><hr class="dropdown-divider"></li>
              <li><button data-productcategory="barong" class="dropdown-item" onclick="loadProducts(this)" >Barong</button></li>
              <li><hr class="dropdown-divider"></li>
              <li><button data-productcategory="filipiniana" class="dropdown-item" onclick="loadProducts(this)" >Filipiniana</button></li>
              <li><hr class="dropdown-divider"></li>
              <li><button data-productcategory="motif" class="dropdown-item" onclick="loadProducts(this)" >Motif</button></li>
              <li><hr class="dropdown-divider"></li>
              <li><botton data-productcategory="accessories" class="dropdown-item" onclick="loadProducts(this)" >Accessories</botton></li>
              <li><hr class="dropdown-divider"></li>
              <li><buttton data-productcategory="fullset" class="dropdown-item" onclick="loadProducts(this)" >Fullset</buttton></li>
              <li><hr class="dropdown-divider"></li>
          </ul>
        </div>
       </li>
      <li class="nav-item">
        <a data-page="sales" class="nav-link text-white" href="#">
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
            <div class="col">
              <select id="category" name="category" class="form-control">
                <option value="">Category</option>
                <option value="barong">Barong</option>
                <option value="filipiniana">Filipiniana</option>
                <option value="motif">Motif</option>
                <option value="accessories">Accessories</option>
                <option value="fullset">Full Set</option>
              </select>
            </div>
          </div>
          <div class="row g-2 mb-2">
            <div class="col"><input type="text" name="description" class="form-control" placeholder="Description" required></div>
          </div>
          <div class="row g-2 mb-2">
            <div class="col"><input type="number" min="0" name="stock" class="form-control" placeholder="Quantity" required></div>
            <div class="col"><input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required></div>
            <div class="col"><input type="file" name="image" class="form-control" accept="image/*" required></div>
          </div>
          <button type="submit" class="btn btn-success">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editProductForm"  onsubmit="editProductSave(event)">
        <div class="modal-body">
          <div class="row">
            <!-- Left side: Existing data -->
            <div class="col-md-6">
              <h6>Current Product Details</h6>
              <input type="hidden" name="id" id="editProductId">
              <div class="mb-2">
                <label>Product Name</label>
                <input type="text" class="form-control" id="currentName" disabled>
              </div>
              <div class="mb-2">
                <label>Price</label>
                <input type="number" class="form-control" id="currentPrice" disabled>
              </div>
              <div class="mb-2">
                <label>Stock</label>
                <input type="number" class="form-control" id="currentStock" disabled>
              </div>
              <div class="mb-2">
                <label>Description</label>
                <input type="text" class="form-control" id="currentDescription" disabled >
              </div>
              <div class="mb-2">
                <label>Category</label>
                <input type="text" class="form-control" id="currentCategory" disabled>
              </div>
            </div>

            <!-- Right side: Editable fields -->
            <div class="col-md-6">
              <h6>Update Product Details(leave blank to keep exixting)</h6>
              <div class="mb-2">
                <label>New Product Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="mb-2">
                <label>New Price</label>
                <input type="number" name="price" class="form-control">
              </div>
              <div class="mb-2">
                <label>New Stock</label>
                <input type="number" name="stock" class="form-control">
              </div>
              <div class="mb-2">
                <label>New Description</label>
                <input type="text" name="description" class="form-control">
              </div>
              <div class="mb-2">
                <label>New Category</label>
                <select id="category" name="category" class="form-control">
                <option value=""></option>
                <option value="barong">Barong</option>
                <option value="filipiniana">Filipiniana</option>
                <option value="motif">Motif</option>
                <option value="accessories">Accessories</option>
                <option value="fullset">Full Set</option>
              </select>
              </div>
              <div class="mb-2">
                <label>New Image</label>
                <input type="file" name="image" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
