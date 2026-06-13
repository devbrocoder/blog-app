<?php
require_once BASE_PATH . "view/layout/header.php";
?>
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-4">
        <form action="#" method="post" class="p-4 border rounded shadow-sm">
            <h2 class="mb-4 text-center">Sign Up</h2>
            <div class="mb-3">
                <label for="name">Username:</label>
                <input type="text" name="name" id="name" class="form-control" minlength="6" maxlength="15" pattern="[a-zA-Z0-9]+" title="Only letters and numbers are allowed" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" minlength="8" title="At least 8 characters" placeholder="*******" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password">Repeat Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" minlength="8"  title="At least 8 characters" placeholder="*******" required>
            </div>
            <div id="message" style="font-size: 0.8rem;" class="mb-3"></div>
            <button class="btn btn-success w-100 mt-2" type="submit">Sign Up</button>
        </form>
    </div>
</div>
<script>
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm_password');
    const message = document.getElementById('message');
    function validate() {
        if (confirm.value === "") {
            message.innerHTML = "";
        } else if (password.value === confirm.value) {
            message.innerHTML = "✓ Passwords match";
            message.style.color = "green";
        } else {
            message.innerHTML = "✗ Passwords do not match";
            message.style.color = "red";
        }
    }
    password.addEventListener('keyup', validate);
    confirm.addEventListener('keyup', validate);
</script>
<?php
require_once BASE_PATH .  "view/layout/footer.php";
?>
