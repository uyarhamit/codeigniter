<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
        }

        .row {
            height: 100vh;
            align-items: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link loginTabButton active" data-bs-toggle="tab" data-bs-target="#login-tab" type="button" role="tab" aria-controls="login-tab" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link registerTabButton" data-bs-toggle="tab" data-bs-target="#register-tab" type="button" role="tab" aria-controls="register-tab" aria-selected="false">Register</button>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="login-tab" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <h1 class="text-center">Login</h1>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Type your e-mail" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="button" onclick="login();">Login</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <h1 class="text-center">Register</h1>
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Type name" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Type surname" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Type your e-mail" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*********" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100" onclick="register();">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="warningToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto toast-title"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong class="message"></strong>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const toastWarning = ({
        title,
        message
    }) => {
        let body = $("#warningToast");
        $('.toast-title').html(title);
        $('.message').html(message)
        body.toast("show");
    }
    const clearForm = (obj) => {
        $('input', `${obj}`).each(function() {
            $(this).val('');
        })
    }
    const register = () => {
        $('.is-invalid').removeClass('is-invalid');
        let json = {};
        let error = false;
        $('input', '#register-tab').each(function() {
            let that = $(this);
            let required = that.attr('required');
            let type = that.attr('type');
            let name = that.attr('name');
            let val = that.val();
            if (required && val == '') {
                toastWarning({
                    title: 'Warning',
                    message: `${name} can't be empty`
                });
                that.addClass('is-invalid');
                error = true;
                return false;
            }
            if (type == 'email') {
                if (!val.match(mailformat)) {
                    toastWarning({
                        title: 'Warning',
                        message: `${name} is not valid mail!`
                    });
                    that.addClass('is-invalid');
                    error = true;
                    return false;
                }
            }
            json[name] = val;
        })
        if (error) return false;
        $.ajax({
            type: 'POST',
            url: '/api/user/add',
            data: `data=${encodeURIComponent(JSON.stringify(json))}`,
            dataType: 'json',
            success: function(msg) {
                if (msg.text) {
                    toastWarning({
                        title: 'Warning',
                        message: msg.text
                    });
                }
                if (msg.script) {
                    if (msg.script.length) {
                        $(msg.script).each(function(index, script) {
                            eval(script);
                        })
                    }
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
    const login = () => {
        let json = {};
        let error = false;
        $('input', '#login-tab').each(function() {
            let that = $(this);
            let required = that.attr('required');
            let type = that.attr('type');
            let name = that.attr('name');
            let val = that.val();
            if (required && val == '') {
                toastWarning({
                    title: 'Warning',
                    message: `${name} can't be empty`
                });
                that.addClass('is-invalid');
                error = true;
                return false;
            }
            if (type == 'email') {
                if (!val.match(mailformat)) {
                    toastWarning({
                        title: 'Warning',
                        message: `${name} is not valid mail!`
                    });
                    that.addClass('is-invalid');
                    error = true;
                    return false;
                }
            }
            json[name] = val;
        })
        if (error) return false;
        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: `data=${encodeURIComponent(JSON.stringify(json))}`,
            dataType: 'json',
            success: function(msg) {
                if (msg.text) {
                    toastWarning({
                        title: 'Warning',
                        message: msg.text
                    });
                }
                if (msg.script) {
                    if (msg.script.length) {
                        $(msg.script).each(function(index, script) {
                            eval(script);
                        })
                    }
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
</script>