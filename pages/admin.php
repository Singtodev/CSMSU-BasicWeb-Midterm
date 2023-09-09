

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

    <div class="relative h-full bg-[#db3549]">
        <?php
                    $user = array(
                        "username" => "อาจารย์ M" , 
                        "role" => "admin" , 
                        "role_name" => "เจ้าของร้าน",
                        "avatar" => "https://images.unsplash.com/photo-1661263434510-3bb2794640ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1287&q=80"
                    );
                    
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

                <div class="pizza_container lg:max-w-[82rem] lg:min-h-[60rem]  mx-auto flex lg:items-center py-5 lg:py-0">
                    <div class="grid grid-cols-1 lg:grid-cols-3 w-full gap-y-4 lg:h-[30rem] lg:gap-16 px-4">
                            <?php
                                $pizzas = array(
                                   "1", "2", "3", "4", "5", "6"
                                );

                                foreach ($pizzas as $pizza) {
                                    $pizza = new PizzaCard();
                                    $pizza->build();
                                }
                            ?>
                    </div>
                </div>

    </div>


    
</body>
</html>