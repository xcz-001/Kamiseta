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
    const res = await fetch("../../api/users/getAll.php");
    const data = await res.json();
    const tbody = document.querySelector("#usersTable tbody");
    tbody.innerHTML = "";
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

document.querySelector("#addProductForm").onsubmit = async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  console.log("Form data:", formData);
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
    loadProducts();
  } else alert(result.error || "Error");
};

  loadUsers();