async function logout() {
  var result = confirm('sure ka logout boss?');
  if (result) {
    const res = await fetch("../../api/users/logout.php", {
    method: "POST",
    credentials: "include"
  });

  if (res.ok) {
    alert("You have been logged out successfully.");
    window.location.href = "../../index.html"; // Redirect after logout
  } else {
    alert("Logout failed");
  }
  }
}

document.getElementById('toggle-btn').addEventListener('click', function () {
  document.getElementById('sidebar').classList.toggle('collapsed');
});

async function loadUsers() {
  // Inject full table HTML into main-content
  document.getElementById("main-content").innerHTML = `
    <h5>All Users</h5>
    <table class="table table-bordered table-dark table-hover text-white" id="usersTable">
      <thead>
        <tr>
          <th>ID</th><th>Username</th><th>Role</th><th>Email</th><th>Hashed Password</th><th>Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  `;

  // Then populate tbody
  const res = await fetch("../../api/users/getAll.php");
  const data = await res.json();

  const tbody = document.querySelector("#usersTable tbody");
  data.forEach(u => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${u.id}</td>
      <td>${u.username}</td>
      <td>${u.role}</td>
      <td>${u.email}</td>
      <td>${u.password}</td>
      <td>
        <button class="btn btn-secondary btn-sm" onclick="EditUser(${u.id})">Edit</button>
        <button class="btn btn-danger btn-sm" onclick="deleteUser(${u.id})">Delete</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}

async function deleteProduct(id) {
  if (!confirm("tapon na to?")) return;
  const res = await fetch("../../api/products/delete.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id })
  });
  const result = await res.json();
  console.log(result); // to catch any error message
  if (result.success) {
    loadProducts();
  } else {
    alert("Delete failed");
  }
}


async function loadProducts(input){
   let productCategory = "all";

  if (typeof input === "string") {
    productCategory = input;
  } else if (input?.dataset?.productcategory) {
    productCategory = input.dataset.productcategory;
  }

  const res = await fetch("../../api/products/getByCategory.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ category: productCategory })
  });

  const data = await res.json();

  document.getElementById("main-content").innerHTML = `
    <h5>Product Category: ${productCategory}</h5>
    <table class="table table-bordered table-dark table-hover text-white" id="ProductsTable">
      <thead>
        <tr>
          <th>ID</th><th>Image</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Stock(pcs)</th>
          <th>Description</th>
          <th>Last Updated</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  `;

  const tbody = document.querySelector("#ProductsTable tbody");

  data.forEach(p => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${p.id}</td>
      <td><img src="../../uploads/${p.filename}" class="thumb" /></td>
      <td>${p.name}</td>
      <td>${p.price}</td>
      <td>${p.stock}</td>
      <td>${p.description}</td>
      <td>${p.updated_at}</td>
      <td>
        <button class="btn btn-danger btn-sm" onclick="deleteProduct(${p.id})">Delete</button>
        <button class="btn btn-primary btn-sm" id="editProductBtn-${p.id}" onclick="editProductLoad(${p.id})">Edit</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}


document.getElementById("addProductForm").onsubmit = async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  // console.log("Form data:", formData);
  // alert(formData)
  const res = await fetch("../../api/products/create.php", {
    method: "POST",
    body: formData
  });
  const result = await res.json();
  console.log(result); // to catch any error message
  if (result.success) {
    alert("Product added.");
    e.target.reset();
    closeModal('addProductModal');
    // console.log(formData.get("category"));
    loadProducts(formData.get("category"));
  } else {
    alert(result.error || "Error")
  }
};

async function closeModal(modalID){
  const modalEl = document.getElementById(modalID);
  const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
  modal.hide();
}

function editProductLoad(id) {
  fetch(`../../api/products/get_product.php?id=${id}`)
    .then(res => res.json())
    .then(data => {
  //    new bootstrap.Modal(document.getElementById('editProductModal')).show();
      const modalEl = document.getElementById('editProductModal');
      const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      modal.show();
      document.getElementById('editProductId').value = data.id;
      document.getElementById('currentName').value = data.name;
      document.getElementById('currentPrice').value = data.price;
      document.getElementById('currentStock').value = data.stock;
      document.getElementById('currentDescription').value = data.description;
      document.getElementById('currentCategory').value = data.category;
    });
}

async function editProductSave(e) {
  e.preventDefault();
  const formData = new FormData(e.target);
  try {
    const res = await fetch('../../api/products/edit.php', {
      method: 'POST',
      body: formData
    });

    const result = await res.json();
    if (result.success) {
      alert('Product updated');
      closeModal('editProductModal');
      loadProducts(result.category);
    } else {
      alert('Failed: ' + result.error);
    }
  } catch (err) {
    console.error("Edit failed:", err);
    alert("Something went wrong.");
  }
}


document.querySelectorAll('.nav-link').forEach(link => {
  // this.dataset.page = loadUsers;
  link.addEventListener('click', function (e) {
    e.preventDefault();

    // Remove highlight
    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active-page'));
    this.classList.add('active-page');

    // Get target page
    const page = this.dataset.page;

    switch (page) {
      case 'users':
          loadUsers();
        break;
      case 'products':
        //console.logProducts();
        break;
      case 'sales':
        break;
      default:
        break;
    }
  });
});

loadUsers();