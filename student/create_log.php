<?php
session_start();

echo "<form method='post' action='insert_log.php'>";
    echo "<input type='date' name='date' placeholder='Date' required><br>";
    echo "<textarea name='log' id='' placeholder='Enter your logbook for the day'></textarea><br>";
    echo "<input type='text' name='hours' placeholder='Hours for the day' required><br>";
    echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";