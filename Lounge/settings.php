<?php
require_once 'header.php';
echo <<<CREATE
<html>
    <head>
        <title>Settings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/navbar.css"/>
        <link rel="stylesheet" href="css/form.css"/>
    </head>
    <body>
        <form>
            <h2>Settings</h2>
            <br/>
            <label>Theme</label>
            <br/>
            <select>
                <option>Light Mode</option>
                <option>Dark Mode</option>
            </select>
            <br/>
            <label>Font Size</label>
            <br/>
            <select>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
            <br/>
            <label>Font</label>
            <br/>
            <select>
                <option>Monospace</option>
                <option>Sans serif</option>
                <option>Serif</option>
            </select>
            <br/>
            <input type="submit"/>
        </form>
    </body>
</html>
CREATE;
require_once 'footer.php';
?>