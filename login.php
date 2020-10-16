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
        <!--LOG IN-->
        <div class="form sign-in">
        <br>
        <br>
            <h2>Login</h2>
            <form action="" method="post">
                <!--NAMA-->
                <label>
                    <span>NIM/NIP</span>
                    <input type="text" name="nim_nip" required>
                </label>

                <!--PASSWORD-->
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label>

                <!--SUBMIT-->
                <button class="submit">
                    <input type="submit" value="LOGIN">
                </button>
            </form>
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

            <!--SIGN UP-->
            <div class="form sign-up" id="signup">
                <div class="signup"></div>
                <h2>Sign up</h2>
                <form action="" method="post">
                    <!--NAMA-->
                    <label>
                        <span>Nama</span>
                        <input type="text" name="nama">
                    </label>

                    <!--NIM-->
                    <label>
                        <span>NIM/NIP</span>
                        <input type="text" name="nim_nip">
                    </label>

                    <!--PASSWORD-->
                    <label>
                        <span>Password</span>
                        <input type="password" name="password">
                    </label>

                    <!--CONFIRM PASSWORD-->
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="password2">
                    </label>

                    <!--SUBMIT-->
                    <button class="submit" id="sign-up">
                        <input type="submit" value="SIGN UP">
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>