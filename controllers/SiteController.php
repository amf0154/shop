<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = Product::getLatestProducts(6);

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {

        $userEmail = false;
        $userText = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'gleb@sgsrv.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'FEEDBACK from shop.sgsrv.ru';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    
    /**
     * Actions для страниц
     */
     
    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    public function actionDelivery()
    {
        require_once(ROOT . '/views/site/delivery.php');
        return true;
    }
        public function actionRewiew()
    {
        require_once(ROOT . '/views/site/rewiew.php');
        return true;
    }
            public function actionPay()
    {
        require_once(ROOT . '/views/site/pay.php');
        return true;
    }
}
