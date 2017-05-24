<?php
require 'app'.DIRECTORY_SEPARATOR.'connection.php';
require 'includes'.DIRECTORY_SEPARATOR.'header.php';
?>

<body id="edit">


<?php
$connect = dbConnection();

if($_SERVER["REQUEST_METHOD"] == "POST") {

$name     =  mysqli_real_escape_string($connect, $_POST["name"]);
$number   =  mysqli_real_escape_string($connect, $_POST["number"]);
$email    =  mysqli_real_escape_string($connect, $_POST["email"]);
$address  =  mysqli_real_escape_string($connect, $_POST["address"]);
$groups   =  mysqli_real_escape_string($connect, $_POST["groups"]);

$sql =<<<TAG
    INSERT INTO address (name, number, email, address, groups) VALUES ('$name', '$number', '$email', '$address', '$groups')
TAG;

if(dbConnection()->query($sql) === TRUE){

echo "You just edit successfully new contact!";

}
else {
echo "Something went wrong!!!";
}

}
?>


<div class="row">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="input-fields">
            <input class="col-6" type="text" name="name" placeholder="Please enter a name"/>
        </div>
        <div class="input-fields">
            <input class="col-6" type="number" name="number" placeholder="Please enter a number"/>
        </div>
        <div class="input-fields">
            <input class="col-6" type="email" name="email" placeholder="Please enter an email"/>
        </div>
        <div class="input-fields">
            <input class="col-6" type="text" name="address" placeholder="Please enter an address"/>
        </div>
        <div class="input-fields">
            <input class="col-6" type="text" name="groups" placeholder="Please enter a group"/>
        </div>
        <div class="input-fields">
            <input class="col-3" type="submit" value="Send">
            <input class="col-3" type="reset" value="Reset">
        </div>
    </form>
</div>

</body>

<?php
//require 'includes'.DIRECTORY_SEPARATOR.'footer.php';
?>