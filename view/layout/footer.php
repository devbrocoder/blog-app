<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPath = rtrim($currentPath, '/');
$hidef = ['/login', '/register', '/index.php/login', '/index.php/register'];

if (!in_array($currentPath, $hidef)) {
?>
    <footer class="py-5 text-center text-body-secondary bg-body-tertiary"> 
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="#">Devbro.Coder</a>.</p> 
        <p class="mb-0"> <a href="#">Back to top</a> </p> 
    </footer>
<?php 
} 
?>

<script src="http://phptest.ru/assets/js/bootstrap.bundle.min.js"></script>
<script src="http://phptest.ru/assets/js/script.js"></script>
</body>
</html>