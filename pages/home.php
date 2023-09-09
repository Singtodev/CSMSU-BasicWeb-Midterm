
<?php
    require_once('../components/navigationbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../utilities/head.php') ?>
</head>
<body>
    <div class="bg-[#db3549] w-full h-full">
                <?php
                    print_r($_SESSION);
                    $user = array(
                        "username" => "อาจารย์ M" , 
                        "role" => "admin" , 
                        "role_name" => "เจ้าของร้าน",
                        "avatar" => "https://images.unsplash.com/photo-1661263434510-3bb2794640ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1287&q=80"
                    );
                    $cart = array(
                        "0"=>"test_prod"
                    );
                    $navbarComponent = new NavigationBarComponent($user , $cart);
                    $navbarComponent->build();
                ?>
                
                <div class="section">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur minima consectetur nisi cum doloribus eveniet rerum voluptatibus, maiores aut explicabo, quis sit officiis assumenda repellendus placeat. Omnis ratione natus beatae delectus, inventore nulla quasi eos, consequatur nobis accusamus vel? Soluta minima magni, rerum, dicta quaerat laboriosam repellat libero tempore excepturi architecto dignissimos? Laudantium fugiat velit eius laboriosam rem consequatur harum modi a. Inventore provident, rerum omnis odit maiores quasi deleniti ab vitae quas. Consequatur dolore quis est hic aliquam dolorum ullam sint porro, laboriosam qui praesentium magni maxime tempora. Accusamus est nesciunt, magni vero reprehenderit natus. Ex quae impedit excepturi!
                </div>
                <div class="section">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur minima consectetur nisi cum doloribus eveniet rerum voluptatibus, maiores aut explicabo, quis sit officiis assumenda repellendus placeat. Omnis ratione natus beatae delectus, inventore nulla quasi eos, consequatur nobis accusamus vel? Soluta minima magni, rerum, dicta quaerat laboriosam repellat libero tempore excepturi architecto dignissimos? Laudantium fugiat velit eius laboriosam rem consequatur harum modi a. Inventore provident, rerum omnis odit maiores quasi deleniti ab vitae quas. Consequatur dolore quis est hic aliquam dolorum ullam sint porro, laboriosam qui praesentium magni maxime tempora. Accusamus est nesciunt, magni vero reprehenderit natus. Ex quae impedit excepturi!
                </div>
                <div class="section">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur minima consectetur nisi cum doloribus eveniet rerum voluptatibus, maiores aut explicabo, quis sit officiis assumenda repellendus placeat. Omnis ratione natus beatae delectus, inventore nulla quasi eos, consequatur nobis accusamus vel? Soluta minima magni, rerum, dicta quaerat laboriosam repellat libero tempore excepturi architecto dignissimos? Laudantium fugiat velit eius laboriosam rem consequatur harum modi a. Inventore provident, rerum omnis odit maiores quasi deleniti ab vitae quas. Consequatur dolore quis est hic aliquam dolorum ullam sint porro, laboriosam qui praesentium magni maxime tempora. Accusamus est nesciunt, magni vero reprehenderit natus. Ex quae impedit excepturi!
                </div>

                หน้าหลัก
        </div>
</body>
</html>