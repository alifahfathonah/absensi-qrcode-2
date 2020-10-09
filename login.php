<!DOCTYPE html>
<html>

<head>
    <title>Halaman Sign Up dan Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cont">
        <div class="form sign-in">
        <br>
        <br>
            <h2>Login</h2>
            <label>
        <span>Nama</span>
        <input type="nama" name="nama">
      </label>
            <label>
        <span>Password</span>
        <input type="password" name="password">
      </label>
            <button class="submit" type="button">Login</button>

        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <br> <br> <br> <br> <br>
                    <h2>Belum punya akun?</h2>
                    <p>Daftar Sekarang</p>
                </div>
                <div class="img-text m-in">
                    <br> <br> <br> <br> <br>
                    <h2>Sudah Mendaftar</h2>
                    <p>Silahkan Login</p>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>
                    <span class="m-in">Login</span>
                </div>
            </div>
            
            <div class="form sign-up" id="signup">
                <div class="signup"></div>
                <h2>Sign up</h2>
                <label>
                    <span>Name</span>
                    <input type="text">
                </label>
                <label>
                    <span>NIM</span>
                    <input type="text">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password">
                </label>
                <button type="button" class="submit" id="sign-up">Sign Up Now</button>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>