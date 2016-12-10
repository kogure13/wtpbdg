<!DOCTYPE html>
<html>
    <head>
        <title> Billing WTP Manglayang - Bandung</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development" />
        <meta name="keywords" content="Billing, Manglayang, Bandung" />
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/login-box.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/my-custom-styles.css" rel="stylesheet" type="text/css" />
        
        <link rel="shortcut icon" href="favicon.png">

        <style>
            .error {
                color: #d43f3a;
            }
        </style>

        <script src="assets/js/jquery/jquery-2.1.0.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $("#vForm").validate({
                    rules: {
                        inputUser: "required",
                        password: "required"
                    },
                    messages: {
                        inputUser: " *) harus diisi",
                        password: " *) harus diisi"
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="favicon.png" />
                <p id="profile-name" class="profile-name-card"> </p>
                <form class="form-signin" method="post" name="login" action="index.php" accept="#" novalidate="novalidate" id="vForm">
                    <div class="form-group input-group">
                        <label> Username</label>
                        <input name="inputUser" type="text" id="inputUser" class="form-control" />
                    </div>
                    <div class="form-group input-group">
                        <label> Password</label>
                        <input name="password" type="password" id="inputPassword" class="form-control" />
                    </div>
                    <input type="submit" class="btn btn-sm btn-primary btn-block btn-signin" value="Login" />
                </form>	
                <br/>
                <div class="footer text-center">
                    <strong>WTP Manglayang V 3.5 &copy; <?=now_year("Y")?></strong>
                </div>
            </div>
        </div>	
    </body>
</html>