

<?php
        require_once('../components/navigationbar.php');
        require_once('../components/pizzacard.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../utilities/head.php') ?>
</head>
<body>

    <div class="relative w-full h-full bg-[#db3549]">
        <?php
                        if(isset($_SESSION['login_as'])){
                            $user = array(
                                "username" => $_SESSION['user']['m_name'] , 
                                "role" => $_SESSION['login_as'] , 
                                "role_name" => $_SESSION['login_as'] == 'admin' ? 'เจ้าของร้าน' : 'ลูกค้า' ,
                                "avatar" => $_SESSION['user']['m_picture']
                            );
                        }else{
                            $user = array(
                                "username" => $_SESSION['user']['m_name'] , 
                                "role" =>  $_SESSION['user']['m_role'] == '1' ? 'user' : 'admin', 
                                "role_name" => $_SESSION['user']['r_name'],
                                "avatar" => $_SESSION['user']['m_picture']
                            );
                        }
                    
                    $cart = array(
                        [],[],[],
                    );

                    if(!isset($_SESSION['active_navbar_menu'])){
                        $_SESSION['active_navbar_menu'] = false;
                        echo '<script>window.location.reload();</script>>';
                    }

                    if(array_key_exists('toggle-menu', $_POST)) {
                        $_SESSION['active_navbar_menu'] = !$_SESSION['active_navbar_menu'];
        
                    }

                    $navbarComponent = new NavigationBarComponent($user , $cart ,$_SESSION['active_navbar_menu'] );
                    $navbarComponent->build();
        ?>
        <div class="w-full h-screen flex items-center justify-center">
                    <div class="flex flex-col min-w-[60rem] max-w-[60rem] h-[45rem] bg-white">
                        <div class="relative profile flex items-center justify-center w-full h-[8rem]">
                            <div class="avatar w-[10rem] h-[10rem] rounded-full bg-gray-300 absolute -top-14 object-cover bg-center bg-cover bg-no-repeat "style="background-image: url('https://images.unsplash.com/photo-1661263434510-3bb2794640ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1287&q=80');">.</div>
                        </div>
                        <div class="text-2xl text-center">รายการสั่งซื้อ</div>

                    </div>
        </div>

    </div>


    
</body>
</html>