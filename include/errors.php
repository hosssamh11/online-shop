<?php
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    echo '<div class="alert alert-danger" role="alert"><ul>';
    foreach ($_SESSION['errors'] as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul></div>';
    unset($_SESSION['errors']); // Clear the errors
}
