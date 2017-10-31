<?php

$title = "Log In";

require "layout.view.php";
?>


<form method="post" action="/login">

    <p>
        <label for="login">Login:</label>
        <input id="login" type="text" name="login">
    </p>

    <p>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password">
    </p>

    <p>
        <input type="submit" value="Log in">
    </p>

</form>

<a href="/signIn">Sign In</a>