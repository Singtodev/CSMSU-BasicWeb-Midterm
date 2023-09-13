

<?php
        require_once('../utilities/connectdb.php');
        require_once('../components/navigationbar.php');
        require_once('../components/pizzacard.php');
        require_once('../services/food.php');
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

                    <div class="pizza_container flex flex-col lg:max-w-[82rem] lg:min-h-[60rem] pb-4  mx-auto flex lg:items-center py-5 lg:py-0">
                        <div class="w-full flex flex-row h-[19rem] bg-white p-10 mb-2 rounded-lg my-10">
                            <div class="w-[70%]">
                                <div class="text-yellow-400 text-5xl font-bold px-10 mb-10">New !</div>
                                <div class=" text-3xl font-regular px-10 text-black">Margarita เมนูใหม่ร้านเรา</div>
                                <div class=" text-3xl font-regular px-10 text-black">ซื้อได้แล้ววันนี้</div>
                            </div>
                            <div class="w-[30%]">
                                <div class="w-[250px] h-[250px] bg-gray-300 object-cover bg-center bg-cover bg-no-repeat" style="background-image: url('../assets/pizza_new.PNG');">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-y-4 lg:h--auto lg:gap-16 px-4 my-10">
                                <?php
                                $fs = new FoodService($condb);
                                $pizzas = $fs->getAllFood();
                                if($pizzas->num_rows > 0){
                                    while($row = $pizzas->fetch_assoc()){
                                        $pizza = new PizzaCard('user' ,$row);
                                        $pizza->build();
                                    }
        
                                }else{
                                    echo "<div class='text-center text-white'>Empty Foods</div>";
                                }
                                ?>
                        </div>
                    </div>


    </div>


    
</body>
</html>