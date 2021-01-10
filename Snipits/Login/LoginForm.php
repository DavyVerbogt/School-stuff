<html>
<style>
    body {
        background: #eee;
    }

    .LoginForm {
        border: solid gray 1px;
        width: 25%;
        border-radius: 2px;
        margin: 120px auto;
        background: white;
        padding: 50px;
    }

    .LoginButton {
        padding: 7px;
        margin-left: 70%;
    }
</style>

<head>
</head>

<body>
    <div class="LoginForm">
        <h1>Login</h1>
        <?php echo '<br/>' . $error . '<br/>'; ?>
        <table>
            <form name="LoginForm" method="post">
                <tr>
                    <td><label for="Username">Username:</label></td>
                    <td><input type="text" id="Username" name="Username" /></td>
                </tr>
                <tr>
                    <td><label for="Password">Password:</label></td>
                    <td><input type="Password" id="Password" name="Password" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Login" class="LoginButton" value="Log In!" /></td>
                </tr>
                <tr>
                    <td><a href="Register.php">Click here to Register</p></td>
                </tr>

            </form>

    </div>
</body>

</html>