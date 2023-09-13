<?php


    class PizzaCard {

        public $role;
        public $pizza;
        function __construct($role , $pizza){
            $this->role = $role;
            $this->pizza = $pizza;
        }



        function build(){
            echo '<div class="relative bg-white w-full h-[13rem] rounded-2xl overflow-hidden p-2 transition-all duration-300">';
            echo    '<div class="flex w-full h-full flex-row gap-x-1">';
            echo        '<div class="w-[20%] lg:w-[30%] z-0 h-full ">';
            echo            '<div class="pizza w-[140px] h-[140px] lg:w-[220px] lg:h-[220px] absolute top-0 -left-10 lg:-left-20 rounded-full bg-gray-300 object-cover bg-center bg-cover bg-no-repeat" style="background-image: url('.$this->pizza['f_picture'].');"></div>';
            echo        '</div>';
            echo        '<div class="w-[80%] lg:w-[70%] z-10 px-10 h-full  flex flex-col items-center justify-center ">';
            echo          '<div class="w-full">';
            echo            '<div class="font-bold text-2xl">'.$this->pizza['f_name'].'</div>';
            echo          '</div>';
            echo          '<div class="w-full">';
            echo            '<div class="flex justify-between items-center">';
            echo                '<div class="flex flex-col">';
            echo                    '<div class="font-bold text-md text-gray-300">'.$this->pizza['f_time'].' Minute</div>';
            echo                    '<div class="font-bold text-2xl text-green-600">'.$this->pizza['f_price'].'</div>';
            echo                '</div>';
            if($this->role == 'admin'){
                echo                '<i class="fa-solid cursor-pointer fa-pen text-3xl bg-white shadow-lg rounded-lg p-2"></i>';
            }else{
                echo                '<i class="fa-solid cursor-pointer fa-add text-3xl bg-white shadow-lg rounded-lg p-2"></i>';
            }

            echo            '</div>';
            echo          '</div>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }





    }



?>