<?php

$title = "Sign up"

?>

<style>
    main {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5rem 0;
        background-color: #f7f7f7;
    }

    .container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    label {
        text-align: left;
        display: block;
        margin-top: 5px;
    }

    .error {
        color: red;
        margin: 10px 0;
    }
</style>

<main>
    <div class="container">

        <?php if (isset($error)) : ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <h2>Sign Up</h2>

        <form action="/user/api/signup" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email....">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password...">

            <button type="submit">Sign Up</button>
        </form>
    </div>

</main>