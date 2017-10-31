<?php

require 'layout.view.php';

?>

<form method="post" action="/signIn">

    <p>
        <label for="login">Login:</label>
        <input id="login" type="text" name="login">
    </p>

    <p>
        <label for="email">Email:</label>
        <input id="email" type="email" name="email">
    </p>

    <p>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password">
    </p>

    <p>
        <label for="passwordConfirm">Confirm Password:</label>
        <input id="passwordConfirm" type="password" name="passwordConfirm">
    </p>

    <p>
        <input type="submit" value="Log in">
    </p>

</form>

<a href="/login">Login</a>
