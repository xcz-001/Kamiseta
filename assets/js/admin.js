async function logout() {
  console.log("logging out");
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