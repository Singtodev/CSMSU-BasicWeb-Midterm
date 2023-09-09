<?php



    class NavigationBarComponent {
        
        public $user;
        public $bucket_cart_count;
        public $menu_is_open;


        function __construct($user , $cart , $open){
            $this->user = $user;
            $this->bucket_cart_count = count($cart);
            $this->menu_is_open = $open; 
        }


        function build(){
            echo '<div class="w-full lg:sticky top-0 bg-white py-4 pl-2 lg:pl-6 flex justify-between ">';
            echo    '<div class="group_icon  flex flex-row items-center gap-x-1">';
                        $this->logo();
            echo    '</div>';
            echo    '<div class="group_right lg:relative flex flex-row items-center gap-x-3 pr-3">';
                        if($this->menu_is_open == 1){
                            $this->explainMenu();
                        }
                        $this->personal();
                        $this->bucketCart();
            echo        '<div class="_menu">';
                            $this->Gear();
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }


        function debug(){
            print_r($this->user);
        }



        function logo(){
            echo  '<div class="w-[3.5rem] h-[3.5rem] object-cover bg-center bg-cover bg-no-repeat" style="background-image: url(\'../assets/logo/logo_brand.png\');"></div>';
            echo  '<div class="text-[#148021] text-lg lg:text-xl lg:font-medium">Aj\'M Pizza</div>';
        }
        
        function explainMenu(){
            echo  '<div class="absolute top-20 z-20 lg:top-[73px] lg:-bottom-2 left-0 w-full transition-all duration-300 rounded-b-lg bg-black lg:h-auto">';
            echo   '<div class="relative flex flex-col gap-y-4 w-full bg-white h-auto shadow-md p-4">';
                    $this->explainMenuLink("หน้าหลัก", './home.php');
                    $this->explainMenuLink("ข้อมูลส่วนตัว", './profile.php');
                    $this->explainMenuLink("รายการสั่งซื้อ", './order.php');
                    $this->explainMenuLink("ออกจากระบบ", './logout.php');
            echo   '</div>';
            echo '</div>';
        }


        function explainMenuLink($name , $link){
            echo '<a href="'.$link.'" class="text-gray-600">'.$name.'</a>';
        }

        function personal(){
            echo  '<div class="personal_account flex flex-row items-center gap-x-4">';
            echo    '<div class="w-10 h-10 bg-gray-300 rounded-full object-cover bg-center bg-cover bg-no-repeat" style="background-image: url('.$this->user['avatar'].');"></div>';
            echo    '<div class="group-text hidden lg:flex flex-col">';
            echo        '<div class="font-bold leading-5">อาจารย์ M</div>';
            echo        '<div class="font-bold leading-5">เจ้าของร้าน </div>';
            echo    '</div>';
            echo  '</div>';
        }

        function bucketCart(){
            echo '<div class="relative px-2">';
            if($this->bucket_cart_count > 0){
                echo    '<div class="absolute badge bg-red-600 w-[16px] h-[16px] flex items-center justify-center text-[12px] top-0 right-1 rounded-full text-white">'.$this->bucket_cart_count.'</div>';
            }
            echo    '<i class="fa-solid cursor-pointer fa-bucket text-3xl"></i>';
            echo '</div>';
        }
        

        function Gear(){
            echo '<form method="post" class="relative">';
            echo    '<input type="submit" name="toggle-menu" value="" class="w-full absolute h-full">';
            echo    '<i class="fa-solid cursor-pointer fa-gear text-3xl"></i>';
            echo    '</input>';
            echo '</form>';
        }

    }





?>