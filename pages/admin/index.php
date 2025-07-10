<?php
session_start();
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
      header("Location: ../../index.html");
      exit;
  }
  //kicks unauthorized access
  require_once 'nav.php'
 ?>
<!--
  <div id="pageDiv" class=" p-4 d-flex flex-column align-content-left ">
    <h1>Welcome home admin!</h1>
    </h5>All Users default for testing</h5>
    <table class="table table-bordered table-dark  table-hover text-white" id="usersTable">
      <thead>
        <tr>
          <th>ID</th><th>Username</th><th>Role</th><th>Email</th><th>Hashed Password</th><th>Action</th>
        </tr>
    </thead>
      <tbody></tbody>
    </table>
  </div>
 -->

  <div id="main-content" class="flex-grow-1 p-4"> <h1>Main content</h1></div>

  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/bootstrapmin.js"></script>
</body>
</html>