<?php
require_once BASE_PATH . "view/layout/header.php";
?>
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-4">
        <form action="/login" method="post" class="p-4 border rounded shadow-sm">
            <h2 class="mb-4 text-center">Sign In</h2>
            <div class="mb-3">
                <input type="text" name="username" id="username" class="form-control" minlength="6" maxlength="15" pattern="[a-zA-Z0-9]+" title="Only letters and numbers are allowed" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" minlength="8" placeholder="*******" required>
            </div>
            <button class="btn btn-success w-100 mt-2" type="submit">Sign In</button>
        </form>
    </div>
</div>
<?php
require_once BASE_PATH .  "view/layout/footer.php";
?>
