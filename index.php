


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        require_once('./utilities/connectdb.php');
        require_once('./utilities/head.php');
        require_once('./services/auth.php');
    ?>
</head>
<body>

        <?php

            if(!isset($_SESSION['active_modal_menu'])){
                $_SESSION['active_modal_menu'] = false;
                echo '<script>window.location.reload();</script>>';
            }

            if(array_key_exists('toggle-menu', $_POST)) {
                $_SESSION['active_modal_menu'] = !$_SESSION['active_modal_menu'];
            }

            $modalOpen = $_SESSION['active_modal_menu'];

            $user = new Auth($condb);

            $permission = false;

            if($modalOpen == true){

                if(isset($_POST['email']) && isset($_POST['password'])){
                    
                    $data = array(
                        "m_email" => $_POST['email'],
                        "m_password" => $_POST['password']
        
                    );
        
                    $user = $user->login($data);
                    

                    // pop up
                    
                    if($user['data']['m_role'] == '3'){
                        $permission = true;
                    }

                }

            }

        ?>

        <div class="relative flex flex-col items-center justify-center bg-[#db3549] w-screen h-screen">


                <?php
                    if ($modalOpen && $permission) {
                        ?>
                        <div class="absolute w-full h-full bg-black bg-opacity-50 px-6 flex items-center justify-center">
                            <div class="relative bg-[#f3f3f3] w-[21rem] h-[20rem] lg:w-[25rem] lg:h-[22rem] rounded-md py-4">
                                <h1 class="text-center text-xl pt-4">คุณเป็นผู้ใช้งานประเภทใด</h1>
                                <div class="grid grid-cols-2 h-[15rem]">
                                    <a href="./services/router.php?login_as=admin" class="group cursor-pointer flex items-center justify-center flex-col gap-y-5">
                                        <div class="w-[5rem] h-[5rem] bg-cover bg-no-repeat" style="background-image: url('./assets/merchant.png');"></div>
                                        <div class="">เจ้าของร้าน</div>
                                    </a>
                                    <a href="./services/router.php?login_as=user" class="group cursor-pointer flex items-center justify-center flex-col gap-y-5">
                                        <div class="w-[5rem] h-[5rem] bg-cover bg-no-repeat" style="background-image: url('./assets/user.png');"></div>
                                        <div class="">ลูกค้า</div>
                                    </a>
                             </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>


            <div class="w-[20rem] h-[30rem] lg:w-[23rem] bg-white flex flex-col rounded-sm">
                    <!-- this is a section logo -->
                    <div class="_section_logo_brand w-full h-1/2 flex flex-col items-center justify-center">
                         <div class="
                         w-[10rem]
                         h-[10rem]
                         object-cover bg-center bg-cover bg-no-repea
                         bg-[url('./assets/logo/logo_brand.png')] "></div>
                         <div class="text-[#148021] font-bold text-2xl">Aj'M Pizza</div>
                    </div>


                    <!-- this is a section input -->
                    <form method="POST">
                    <div class="_section_input w-full h-1/2 px-7 flex flex-col gap-y-3">
                        <div class="group-box flex flex-col pb-3">
                                <div class="_group_label text-sm">อีเมลล์</div>
                                <div class="_group_input">
                                    <input class="
                                    w-full 
                                    bg-[#f3f0f1]
                                    rounded-2xl
                                    py-1
                                    px-3
                                    shadow-lg
                                    " type="text" name="email" required />
                                </div>
                        </div>
                        <div class="group-box flex flex-col pb-3">
                                <div class="_group_label text-sm">รหัสผ่าน</div>
                                <div class="_group_input">
                                    <input class="
                                    w-full 
                                    bg-[#f3f0f1]
                                    rounded-2xl
                                    py-1
                                    px-3
                                    shadow-lg
                                    " type="password" name="password" required />
                                </div>
                        </div>

                        <?php
                            if (!$modalOpen || !$permission) {
                        ?>



                        <div class="group-footer h-[3.5rem] flex items-end justify-center relative">

                                <input type="submit" name="toggle-menu" value="" class="w-full absolute h-full cursor-pointer">
                                <div
                                class="
                                    bg-[#ffc700] 
                                    text-white
                                    inline-block
                                    px-4
                                    py-1
                                    cursor-pointer
                                    rounded-2xl
                                ">เข้าสู่ระบบ</div>
                        </div>
                        </form>
                        <?php } ?>
                    </div>
            </div>
        </div>
        

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>

</body>
</html>

