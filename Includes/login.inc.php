
    <head>
        <link rel="stylesheet"  href="css/style.css">
    </head>
    <body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Welkom<br>V&D</h2>
            <p>Login of registreer.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="php/Login.php">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="wachtwoord" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                    <button type="submit" class="btn btn-secondary">Register</button>
                </form>
            </div>
        </div>
    </div>

    </body>
    </html>