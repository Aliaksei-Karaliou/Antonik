<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 9</title>
    <style>
        input, textarea, select {
            position: absolute;
            left: 10%;
        }

        .field {
            margin-top: 1em;
        }
    </style>
</head>
<body>
<h1>Adding new channel</h1>
<form method="get" action="php/add-channel-script.php">
    <div class="field">
        <label>Name*</label>
        <input type="text" name="name" required>
    </div>
    <div class="field">
        <label>Frequency*</label>
        <input type="number" step="0.01" name="frequency" required>
    </div>
    <div class="field">
        <label>Theme*</label>
        <select name="theme" required>
            <?php
            include "php/select.php";
            editSelect("sources/channel-themes.txt");
            ?>
        </select>
    </div>
    <div class="field">
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>
    <div class="field">
        <label>Logo</label>
        <input type="file" name="logo" accept=".png,.jpg">
    </div>
    <div class="field">
        <label>Site</label>
        <input type="url" name="site">
    </div>
    <div class="field">
        <label>Owner</label>
        <input type="text" name="owner">
    </div>
    <button name="sumbit">OK</button>
</form>
</body>
</html>