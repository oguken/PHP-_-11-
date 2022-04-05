<?php
namespace Controllers\Validators;

class ContactValidator
{
    private array $errors = [];

    public function __construct(array $postParams)
    {
        if (empty($postParams['name']) || mb_strlen($postParams['name']) > 10) {
            $this->errors["name"] = '氏名は必須入力です。10文字以内でご入力ください。';
        }
        
        if (empty($postParams['kana']) || mb_strlen($postParams['kana']) > 10) {
            $this->errors["kana"] = 'フリガナは必須入力です。10文字以内でご入力ください。';
        }
        
        if (empty($postParams['tel']) || preg_match("/^[0-9]+＄/", $postParams['tel'])) {
            $this->errors["tel"] = '電話番号は0-9の数字のみでご入力ください。';
        }
    
        if (empty($postParams['email']) || !filter_var($postParams['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = '正しいEメールアドレスを指定してください。';
        }

        if (empty(trim($postParams['body']))) {
            $this->errors["body"] = 'お問い合わせ内容は必須項目です。';
        }
    }

    public function isValid(): bool
    {
        return !(bool)$this->errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}