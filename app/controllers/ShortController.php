<?php

class ShortController
{
    private $shortModel;

    public function __construct()
    {
        $this->isLogged();

        require_once 'app/models/ShortModel.php';
        $this->shortModel = new ShortModel();
    }

    public function index()
    {
        $id_user = $_SESSION["id-user"];

        $title = "Listku";
        $user = $this->shortModel->getUserById($id_user);
        $shorts = $this->shortModel->getAllShorts($id_user);
        require_once 'app/views/short/templates/header.php';
        require_once 'app/views/short/index.php';
        require_once 'app/views/short/templates/footer.php';
    }

    private function redirect($url)
    {
        header('Location: ' . BASE_URL . $url);
        exit;
    }

    private function isLogged()
    {
        if (!isset($_SESSION['id-user'])) {
            $this->redirect('/user');
        }
    }

}

?>