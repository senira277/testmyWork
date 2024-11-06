<?php

$title = "Profile"

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

    textarea,
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

</style>

<main>
    <div class="container">
        <h2>Profile</h2>

        <form action="/user/api/profile" method="post">
            Email: <?= $user->email ?><br>
            Role: <?= $user->role ?><br>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" value="">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $user->name ?>" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?= $user->phoneNumber ?>">

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4"><?= $user->address ?></textarea>

            <button type="submit">Update Profile</button>

        </form>
    </div>
</main>