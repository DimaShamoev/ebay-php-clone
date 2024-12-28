<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="../images/ebay.png">
    <link rel="stylesheet" href="../css/sign_in.css">
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
                        <a href="#">Tell us what you think</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <form action="" class="authorization-form">

                <div class="authorization-form-header">
                    <div class="authorization-form-title">
                        Sign in to your account
                    </div>
                    <div class="authorization-form-text">
                        New to eBay? <a href="#">Create account</a>
                    </div>
                </div>
                <div class="authorization-inputs-block">
                    <div class="input-block">
                        <input type="text">
                    </div>
                    <div class="input-block">
                        <input type="text">
                    </div>
                </div>

                <div class="form-line">
                    OR
                </div>

                <div class="authorization-methods">
                    <div class="auth-method">
                        <i class='bx bxl-google'></i> Continue With Google
                    </div>
                    <div class="auth-method">
                        <i class='bx bxl-google'></i> Continue With Google
                    </div>
                    <div class="auth-method">
                        <i class='bx bxl-google'></i> Continue With Google
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