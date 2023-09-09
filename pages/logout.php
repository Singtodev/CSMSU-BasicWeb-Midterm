<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    
    require_once('../utilities/head.php');
    session_destroy();
    
    ?>
</head>
<body>
    <script>
         Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'ออกจากระบบสำเร็จ',
                showConfirmButton: false,
                timer: 1500
        }).then(()=> {
            window.location.href = "../index.php";
        })

    </script>
</body>
</html>