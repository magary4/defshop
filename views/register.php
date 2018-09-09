<?php require "head.php"; ?>

<body>
<div class="container">
    <h1>Registration</h1>
    <?php if (isset($message)) { ?>
        <div class="alert alert-warning" role="alert">
            <?= $message?>
        </div>
    <?php } ?>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" required
                   placeholder="Enter name" name="payload[name]">
        </div>
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
        <div class="form-group">
            <label for="exampleInputPassword2">Repeat Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Repeat Password" required
                   name="payload[password_repeat]">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="/login">login</a>
    </form>
</div>
</body>