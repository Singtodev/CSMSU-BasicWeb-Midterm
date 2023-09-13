<?php


class Auth {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($data) {
        $sql = "SELECT * 
            FROM member LEFT OUTER JOIN role
            ON  member.m_role = role.r_id
            WHERE member.m_email = ?
             ";
        $result = $this->db->prepare($sql);
        $result->bind_param('s',$data['m_email']);
        $result->execute();
        $result = $result->get_result();

        if($result->num_rows > 0){
            // password hash 
            $result = $result->fetch_assoc();
            $verifyPassword = password_verify($data['m_password'],$result['m_password']);
            if($verifyPassword){
                $_SESSION['user'] = $result;

                if($result['m_role'] == '2'){
                    echo '<script>window.location.href = "pages/admin.php" </script>>';
                }

                
                if($result['m_role'] == '1'){
                    echo '<script>window.location.href = "pages/home.php" </script>>';
                }

                


                return array("message"=> "Login Success" , "status" => "200" , "data" => $result);
            }else{
                return array("message"=> "Password incorrect Please try again." , "status" => "401");
            }
            
        }else{
            return array("message"=> "User not fond" , "status" => "401");
        }
    }


}


?>