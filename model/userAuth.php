<?php
 class UserAuth {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

  

    public function logoutUser() {
        // Oturumu sonlandırma
        session_start();
        session_destroy();
    }

    public function isLoggedIn() {
        // Oturum kontrolü
        session_start();
        return isset($_SESSION['user_id']);
    }

    public function getCurrentUser() {
        // Oturumu açık olan kullanıcının bilgilerini döndürme
        if ($this->isLoggedIn()) {
            $data = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id = ?";
            return $this->db->read($sql,$data);
        }

        return null;
    }
}