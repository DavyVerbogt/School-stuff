<style>
    body {
        background: #eee;
    }

    .RegisterForm {
        border: solid gray 1px;
        width: 25%;
        border-radius: 2px;
        margin: 120px auto;
        background: white;
        padding: 50px;
    }

    .RegisterButton {
        padding: 7px;
        margin-left: 70%;
    }
</style>

<body>
    <div class="RegisterForm">
        <h1>Register</h1>
        <table>
            <form name="RegisterForm" action="" method="post">
                <tr>
                    <td> <label for="Username">Username:</label> </td>
                    <td> <input type="text" id="Username" name="Username" value="<?php echo $Username; ?>" /><?php echo $UserErr; ?> </td>
                </tr>
                <tr>
                    <td> <label for="Password">Password:</label> </td>
                    <td> <input type="password" id="Password" name="Password" /><?php echo $PassErr; ?></td>
                </tr>
                <tr>
                    <td> <label for="RetypePassword">Retype Password:</label> </td>
                    <td> <input type="password" id="RetypePassword" name="RetypePassword" /><?php echo $RePassErr; ?> </td>
                </tr>
                <tr>
                    <td> <input type="submit" class="RegisterButton" name="Register" value="Register!" /> </td>
                <tr>
            </form>
        </table>
    </div>
</body>