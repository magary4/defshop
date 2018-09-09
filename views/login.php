<?php require "head.php"; ?>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($success) && false === $success ) { ?>
            <div class="alert alert-danger" role="alert">
                Invalid credentials
            </div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required
                       placeholder="Enter email" name="payload[email]">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required
                       name="payload[password]">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="/register">or register</a>
        </form>
    </div>
</body>