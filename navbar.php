<?php 
?>
<nav class="navbar">
    <a href="dashboard.php" class="navbar-logo">Accommodations 🏨</a>
    <div class="navbar-menu">
        <a href="dashboard.php">Accommodations Dashboards</a>
        <?php if($user_role == 1): ?>
        <a href="accommodation_management.php">Accommodation Management</a>
        <?php endif; ?>
        <a href="signout.php" class="signout">Sign Out</a>
    </div>
</nav>
