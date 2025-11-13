<?php
session_start();
require "../model/user_function.php";
require "../global/script.php";

$email = $_POST['email'];
$password = $_POST['password'];

// Call function to check if email exists
$login = login($email);

if (mysqli_num_rows($login) > 0) {
    $user = $login->fetch_assoc();

    if (verifyPassword($password, $user['password'])) {
        // Successful login
        session_regenerate_id(true);

        // Store user data in session
        $_SESSION["auth"] = true;
        $_SESSION["email"] = $user['email'];
        $_SESSION["name"] = $user['name'];
        $_SESSION["no_ic"] = $user['no_ic'];
        $_SESSION["phone_no"] = $user['phone_no'];

        echo "<script>window.location.href = '../view/anggota_list.php';</script>";
        exit();
    } else {
        $fail = "Invalid email or password.";
        echo $password.' '.$user['password'];
        exit();
    }
} else {
    $fail = "Email not found!";
}


if (!empty($fail)) { ?>
    <script>
        $(document).ready(function() {
            Swal.fire(
                'Login Failed',
                '<?php echo $fail; ?>',
                'error'
            ).then(() => {
                window.history.back();
            });
        });
    </script>
<?php } ?>
