<?php


    class PizzaCard {

        public $image_url;

        function __construct(){
            $this->image_url = "https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80";
        }



        function build(){
            echo '<div class="relative bg-white w-full h-full rounded-2xl overflow-hidden p-2 transition-all duration-300">';
            echo    '<div class="flex w-full h-full flex-row gap-x-1">';
            echo        '<div class="w-[20%] lg:w-[30%] z-0 h-full ">';
            echo            '<div class="pizza w-[140px] h-[140px] lg:w-[220px] lg:h-[220px] absolute top-0 -left-10 lg:-left-20 rounded-full bg-gray-300 object-cover bg-center bg-cover bg-no-repeat" style="background-image: url('.$this->image_url.');"></div>';
            echo        '</div>';
            echo        '<div class="w-[80%] lg:w-[70%] z-10 px-10 h-full  flex flex-col items-center justify-center ">';
            echo          '<div class="w-full">';
            echo            '<div class="font-bold text-2xl">พิซซ่า</div>';
            echo            '<div class="font-bold text-2xl">เปปเปอโรนี่</div>';
            echo          '</div>';
            echo          '<div class="w-full">';
            echo            '<div class="flex justify-between items-center">';
            echo                '<div class="flex flex-col">';
            echo                    '<div class="font-bold text-md text-gray-300">14-20 Minute</div>';
            echo                    '<div class="font-bold text-2xl text-green-600">$14</div>';
            echo                '</div>';
            echo                '<i class="fa-solid cursor-pointer fa-pen text-3xl bg-white shadow-lg rounded-lg p-2"></i>';
            echo            '</div>';
            echo          '</div>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }





    }



?>