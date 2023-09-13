

<?php
        require_once('../components/navigationbar.php');
        require_once('../components/pizzacard.php');
        require_once('../utilities/connectdb.php');
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


                    $sql = "SELECT * 
                            FROM member
                            LEFT OUTER JOIN role ON member.m_role = role.r_id
                            WHERE member.m_email = ?";

                    $result = $condb->prepare($sql);
                    $result->bind_param('s', $_SESSION['user']['m_email']);
                    $result->execute();
                    $result = $result->get_result();
                    $row = $result->fetch_assoc(); // Fetch a single row


                    if(isset($_SESSION['login_as'])){
                            $user = array(
                                "username" =>  $row['m_name'] , 
                                "role" => $_SESSION['login_as'] , 
                                "role_name" => $_SESSION['login_as'] == 'admin' ? 'เจ้าของร้าน' : 'ลูกค้า' ,
                                "avatar" => $row['m_picture']
                            );
                        }else{
                            $user = array(
                                "username" => $row['m_name'] , 
                                "role" =>  $row['m_role'] == '1' ? 'user' : 'admin', 
                                "role_name" => $row['r_name'],
                                "avatar" => $row['m_picture']
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
                    <div class="flex flex-col min-w-[40rem] max-w-[40rem] h-[45rem] bg-white">
                        <div class="relative profile flex items-center justify-center w-full h-[8rem]">
                            <div class="avatar w-[10rem] h-[10rem] rounded-full bg-gray-300 absolute -top-14 object-cover bg-center bg-cover bg-no-repeat "style="background-image: url('https://images.unsplash.com/photo-1661263434510-3bb2794640ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1287&q=80');">.</div>
                        </div>
                        <div class="text-2xl text-center">แก้ไขข้อมูลส่วนตัว</div>
                        <form action="../services/update.php" method="post" class="_section_input w-full h-1/2 px-10 flex flex-col gap-y-3">
                        <div class="group-box flex flex-col pb-3">
                                    <div class="_group_label text-sm">ชื่อ</div>
                                    <div class="_group_input">
                                        <input class="
                                        w-full 
                                        bg-[#f3f0f1]
                                        rounded-2xl
                                        py-3
                                        px-3
                                        shadow-lg
                                        " type="text" name="m_name" value="<?php echo $row['m_name']?>" />
                                    </div>
                            </div>
                            <div class="group-box flex flex-col pb-3">
                                    <div class="_group_label text-sm">เบอร์โทรศัพท์</div>
                                    <div class="_group_input">
                                        <input class="
                                        w-full 
                                        bg-[#f3f0f1]
                                        rounded-2xl
                                        py-3
                                        px-3
                                        shadow-lg
                                        " type="text" name="m_phone" value="<?php echo $row['m_phone']?>" />
                                    </div>
                            </div>
                            <div class="group-box flex flex-col pb-3">
                                    <div class="_group_label text-sm">รหัสผ่านเก่า</div>
                                    <div class="_group_input">
                                        <input class="
                                        w-full 
                                        bg-[#f3f0f1]
                                        rounded-2xl
                                        py-3
                                        px-3
                                        shadow-lg
                                        " type="text" name="m_password_old" />
                                    </div>
                            </div>
                            <div class="group-box flex flex-col pb-3">
                                    <div class="_group_label text-sm">รหัสผ่านใหม่</div>
                                    <div class="_group_input">
                                        <input class="
                                        w-full 
                                        bg-[#f3f0f1]
                                        rounded-2xl
                                        py-3
                                        px-3
                                        shadow-lg
                                        " type="password" name="m_password_new" value="" />
                                    </div>
                            </div>

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
                                    ">บันทึก</div>
                            </div>
                        </div>
                    </div>
        </div>

    </div>


    
</body>
</html>