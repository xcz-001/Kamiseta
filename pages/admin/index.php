<?php
session_start();
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
      header("Location: ../../index.html");
      exit;
  }
  //kicks out unauthorized access
  require 'nav.php'
 ?>
  <div id="main-content" class="flex-grow-1 p-4"> <h1>Main content</h1></div>

  <script src="../../assets/js/bootstrapmin.js"></script>
  <script src="../../assets/js/admin.js"></script>
</body>
</html>