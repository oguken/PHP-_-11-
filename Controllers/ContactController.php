<?php
namespace Controllers;

require_once(ROOT_PATH.'Models/Repositories/ContactRepository.php');
require_once(ROOT_PATH.'Views/ViewBase.php');
require_once(ROOT_PATH.'Controllers/Validators/ContactValidator.php');

use Models\Repositories\ContactRepository;
use Views\ViewBase;
use Controllers\Validators\ContactValidator;


class ContactController
{
    // 入力画面
    public function index()
    {
        $contactList = (new ContactRepository())->findAll();

        ViewBase::render(
            '/Contact/index.php',
            ['contactList' => $contactList,]
        );
    }

    // 確認画面
    public function confirm()
    {
        // POSTのみ受け付ける
        if (!$_POST) {
            header('Location: /contact/index/');
            exit;
        }

        $contactValidator = (new ContactValidator($_POST));
        if ($contactValidator->isValid()) {
            ViewBase::render(
                '/Contact/confirm.php',
                [
                    'name'  => $_POST['name'],
                    'kana'  => $_POST['kana'],
                    'tel'   => $_POST['tel'],
                    'email' => $_POST['email'],
                    'body'  => $_POST['body'],
                ]
            );
            exit;
        }

        ViewBase::render(
            '/Contact/index.php',
            [
                'name'        => $_POST['name'],
                'kana'        => $_POST['kana'],
                'tel'         => $_POST['tel'],
                'email'       => $_POST['email'],
                'body'        => $_POST['body'],
                'errors'      => $contactValidator->getErrors(),
                'contactList' => (new ContactRepository())->findAll(),
            ]
        );
    }

    // 完了画面
    public function complete()
    {
        if (!$_POST) {
            header('Location: /contact/index/');
            exit;
        }
        
        if (!$_POST['name'] 
            && !$_POST['kana']
            && !$_POST['tel']
            && !$_POST['email']
            && !$_POST['body'])
        {
            header('Location: /contact/index/');
            exit;
        }
        
        $contactValidator = (new ContactValidator($_POST));
        if ($contactValidator->isValid()) {
            $contactList = (new ContactRepository())->insert(
                $_POST['name'],
                $_POST['kana'],
                $_POST['tel'],
                $_POST['email'],
                $_POST['body']
            );

            ViewBase::render('/Contact/complete.php');
        }

        // indexへ戻す
        ViewBase::render(
            '/Contact/index.php',
            [
                'name'  => $_POST['name'],
                'kana'  => $_POST['kana'],
                'tel'   => $_POST['tel'],
                'email' => $_POST['email'],
                'body'  => $_POST['body'],
                'errors' => $contactValidator->getErrors(),
                'contactList' => (new ContactRepository())->findAll(),
            ]
        );
    }

    // 更新画面
    public function update()
    {
        $params = [
            'id' => [
                'value' => $_GET['id'],
                'type'  => \PDO::PARAM_INT,
            ],
        ];
        $result = (new ContactRepository())->findBy($params);

        if($result) {
            ViewBase::render(
                '/Contact/update.php',
                [
                    'id'    => $result['id'],
                    'name'  => $result['name'],
                    'kana'  => $result['kana'],
                    'tel'   => $result['tel'],
                    'email' => $result['email'],
                    'body'  => $result['body'],
                ]
            );
        } else {
            // 不正なidの場合
            header('Location: /contact/index/');
        }
    }

    public function updateConfirm()
    {
        // POSTのみ受け付ける
        if (!$_POST) {
            header('Location: /contact/index/');
            exit;
        }

        $contactValidator = (new ContactValidator($_POST));

        if ($contactValidator->isValid()) {
            ViewBase::render(
                '/Contact/update_confirm.php',
                [
                    'id'    => $_POST['id'],
                    'name'  => $_POST['name'],
                    'kana'  => $_POST['kana'],
                    'tel'   => $_POST['tel'],
                    'email' => $_POST['email'],
                    'body'  => $_POST['body'],
                ]
            );
            exit;
        }

        ViewBase::render(
            '/Contact/update.php',
            [
                'id'     => $_POST['id'],
                'name'   => $_POST['name'],
                'kana'   => $_POST['kana'],
                'tel'    => $_POST['tel'],
                'email'  => $_POST['email'],
                'body'   => $_POST['body'],
                'errors' => $contactValidator->getErrors(),
            ]
        );
    }


    // 更新処理
    public function updateOne()
    {
        (new ContactRepository())->update(
            $_POST['id'],
            $_POST['name'],
            $_POST['kana'],
            $_POST['tel'],
            $_POST['email'],
            $_POST['body'],
        );

        header('Location: /contact/index/');
    }

    public function deleteOne()
    {
        $params = [
            'id' => [
                'value' => $_GET['id'],
                'type'  => \PDO::PARAM_INT,
            ],
        ];

        (new ContactRepository())->deleteBy($params);

        header('Location: /contact/index/');
    }
}

