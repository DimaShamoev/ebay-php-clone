<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/sign_up.css">
    <link rel="stylesheet" href="../css/components.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/components.css">
    <title>Ebay Sign In</title>
</head>

<body>
    <div class="body-wrapper">
        <header class="authorization-header">
            <div class="container">
                <div class="authorization-header-wrapper">
                    <div class="authorization-logo">
                        <a href="#">
                            <img src="../images/ebay-logo.svg" alt="" height="50">
                        </a>
                    </div>
                    <div class="authorization-report">
                        Already have an account? <a href="#">Sign in</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <form method="POST" action="../auth/register.php" class="authorization-form">

                <div class="authorization-form-header">
                    <div class="authorization-form-title">
                        Create an account
                    </div>
                </div>
                <div class="authorization-inputs-block">
                    <div class="input-block user-inputs">
                        <input name="first_name" type="text" placeholder="First Name">
                        <input name="last_name" type="text" placeholder="Last Name">
                    </div>
                    <div class="input-block">
                        <input name="username" type="text" placeholder="Enter Username">
                    </div>
                    <div class="input-block">
                        <input name="email" type="text" placeholder="Enter Email">
                    </div>
                    <div class="input-block">
                        <input name="password" type="text" placeholder="Enter Password">
                    </div>
                    <div class="input-block">
                        <input name="password" type="text" placeholder="Re-Enter Password">
                    </div>
                    <div class="submit-btn">
                        <button type="submit">Create Account</button>
                    </div>
                </div>

                <div class="form-line">
                    OR
                </div>

                <div class="authorization-methods">
                    <div class="auth-method">
                        <span class="auth-method-logo"><i class='bx bxl-google'></i></span> Continue With Google
                    </div>
                    <div class="auth-method">
                        <span class="auth-method-logo"><i class='bx bxl-facebook-circle'></i></span> Continue With Google
                    </div>
                    <div class="auth-method">
                        <span class="auth-method-logo"><i class='bx bxl-apple'></i></span> Continue With Google
                    </div>
                </div>

            </form>
        </main>

        <?php
            include "../components/Footer.php"
        ?>

    </div>
</body>

</html>