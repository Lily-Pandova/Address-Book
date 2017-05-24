<?php
    require 'app'.DIRECTORY_SEPARATOR.'connection.php';
    require 'includes'.DIRECTORY_SEPARATOR.'header.php';

    $sql="SELECT * FROM address ORDER BY created_at ASC ";

    $results=dbConnection()->query($sql);
?>

<body id="first">
    <main>
        <br><br><br>
        <table>
            <tr class="col-6">
                <th>ID</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Groups</th>
                <th>Created_at</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php

            if($results->num_rows > 0) {
                foreach($results as $key) {
                    echo
                        "<tr>".
                        "<td title='Id: '>".$key['id'].        "</td>".
                        "<td title='Name: '>".$key['name'].      "</td>".
                        "<td title='Number: '>".$key['number'].    "</td>".
                        "<td title='Email: '>".$key['email'].     "</td>".
                        "<td title='Address: '>".$key['address'].   "</td>".
                        "<td title='Groups: '>".$key['groups'].    "</td>".
                        "<td title='Created: '>".$key['created_at']."</td>".
                        "<td><a href='update.php?id=$key[id]'>Update</a></td>".
                        "<td><a href='delete.php?id=$key[id]'>Delete</a></td>";
                    "</tr>";
                }
            }
            ?>

        </table>
        <br><br><br>
    </main>
</body>
<?php
   //require 'includes'.DIRECTORY_SEPARATOR.'footer.php';
?>