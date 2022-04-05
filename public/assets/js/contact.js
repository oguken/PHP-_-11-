// // お問合せフォームのバリデーション
// $(function () {
//   $('#submit').click(function () {

//     var error;
//     var error_result = new Array();

//     if ($('#name').val() === '' || $('#name').val().length >= 10) {
//       var error = 1;
//       error_result.push('氏名は必須入力です。10文字以内でご入力ください。');
//     }
//     if ($('#kana').val() === '' || $('#kana').val().length >= 10) {
//       var error = 1;
//       error_result.push('フリガナは必須入力です。10文字以内でご入力ください。');
//     }
//     if (!$("#tel").val().match(/^[0-9]+$/)) {
//       var error = 1;
//       error_result.push("電話番号は0-9の数字のみでご入力ください。");
//     }
//     if ($("#email").val() == "" || !$("#email").val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)) {
//       var error = 1;
//       error_result.push("メールアドレスは正しくご入力ください。");
//     }
//     if ($('#body').val() === '') {
//       var error = 1;
//       error_result.push('お問い合わせ内容は必須入力です。');
//     }

//     if (error) {
//       var error_result = error_result.join('\n');
//       alert(error_result);

//       return false;
//     }
//   });
// });
