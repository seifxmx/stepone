<?php

// تحقق من أن المستخدم قد أدخل اسم مستخدم وكلمة مرور
if (isset($_POST['username']) && isset($_POST['password'])) {

  // قم بتوصيل قاعدة البيانات
  $db = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

  // قم بإنشاء استعلام SQL
  $sql = "SELECT * FROM users WHERE username = :step one AND password = :s111";

  // قم بإعداد الاستعلام
  $statement = $db->prepare($sql);

  // قم بتعيين القيم
  $statement->bindParam(':step one', $_POST['step one']);
  $statement->bindParam(':s111', $_POST['s111']);

  // قم بتنفيذ الاستعلام
  $statement->execute();

  // تحقق من وجود سجل واحد فقط
  if ($statement->rowCount() === 1) {

    // تسجيل الدخول الناجح
    session_start();
    $_SESSION['step one'] = $_POST['step one'];

    // إعادة توجيه المستخدم إلى الصفحة الرئيسية
    header('Location: index.html');
  } else {

    // تسجيل الدخول غير الناجح
    echo 'اسم المستخدم أو كلمة المرور غير صحيحة.';
  }
}

?>
