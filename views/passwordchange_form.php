<form action="passwordchange.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="cur_password" placeholder="Current Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="newpassword" placeholder="Password" type="password"/><br>
            <input class="form-control" name="confirmnewpassword" placeholder="Confirm New Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Change Password
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
