<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Funiro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', serif;
            font-size: large;
        }
    </style>

</head>

<body>
    <?php
    $error = '';
    if (isset($_GET['error']) && $_GET['error'] = true) {

        $error = 'Invalid username or password.';

    }
    ?>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 20rem;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>
                <?php if ($error): ?>
                    <p class="text-danger text-center"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="POST" action="../eshop/auth/login_processing.php" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <p id="invalid-mail" class="h6 text-danger">Please enter an email</p>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <p id="invalid-password" class="h6 text-danger">Password should be 8 characters long, at least 1
                            uppercase and contains numbers and characters</p>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password"id="password"
                                placeholder="Enter your password">

                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id='loginButton'>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the eye icon
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Password validation function
        function isValidPassword(password) {
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            return passwordRegex.test(password);
        }
        const emailField = document.getElementById("username");
        const passwordField = document.getElementById("password");
        const invalidMailMessage = document.getElementById("invalid-mail");
        const invalidPasswordMessage = document.getElementById("invalid-password");

        // Clear previous error messages
        invalidMailMessage.style.display = "none";
        invalidPasswordMessage.style.display = "none";

        function validateForm() {
            invalidMailMessage.style.display = "none";
            invalidPasswordMessage.style.display = "none";
            // Get field values
            const email = emailField.value.trim();
            const password = passwordField.value.trim();

            let isValid = true;

            // Check email format
            if (!isValidEmail(email)) {
                invalidMailMessage.style.display = "block";
                isValid = false;
            }

            // Check password requirements
            if (!isValidPassword(password)) {
                invalidPasswordMessage.style.display = "block";
                isValid = false;
            }

            // Prevent form submission if invalid
            return isValid;
        }
    </script>
</body>

</html>