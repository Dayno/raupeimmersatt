<!DOCTYPE html>
<html lang="en">

<?php

include './scripts/databaseconnection.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dynamic Website</title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="bg-primary h-screen font-medium flex justify-center items-center">
        <div class="w-1/2 flex flex-col gap-12">
            <div>
                <div class="bg-default text-primary p-4 rounded-lg shadow-md">
                    <h1 class="font-bold text-xl">Kontaktformular</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <form action="./scripts/userinformation.php" method="post"
                    class="mt-6 flex flex-col gap-6 w-full items-center">
                    <input type="text" name="user" placeholder="Dein Name"
                        class="w-full bg-default rounded-lg shadow-md p-4 focus:ring-1 focus:outline-none" />
                    <input type="email" name="email" placeholder="Deine E-Mail"
                        class="w-full bg-default rounded-lg shadow-md p-4 focus:ring-1 focus:outline-none" />
                    <textarea name="message" placeholder="Deine Nachricht..." rows="8"
                        class="w-full bg-default rounded-lg shadow-md p-4 focus:ring-1 focus:outline-none"></textarea>
                    <button class="bg-secondary rounded-lg shadow-md text-primary w-1/2 p-2"
                        type="submit">Senden</button>
                </form>
            </div>
            <div class="bg-default p-4 rounded-lg shadow-md">
                <table class="w-full">
                    <tr class="text-left">
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Message</th>
                    </tr>
                    <?php
                    mysqli_select_db($connection, "user");
                    $sql = "SELECT * FROM userinfodata";
                    $result = $connection->query($sql);
                    // LOOP TILL END OF DATA
                    while ($rows = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN -->
                        <td>
                            <?php echo $rows['id']; ?>.
                        </td>
                        <td>
                            <?php echo $rows['user']; ?>
                        </td>
                        <td>
                            <?php echo $rows['email']; ?>
                        </td>
                        <td>
                            <?php echo $rows['message']; ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</body>

</html>