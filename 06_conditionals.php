<?php

$age = 18;
$salary = 300000;

// // Sample if 
// if ($age === 20) {
//     echo "1";
// }

// // Without circle brace
// if ($age === 20) echo "1";
// // Smple if-else
// if ($age > 20) {
//     echo "1";
// }else{
//     echo "2";
// }

// Diffference between == and ===
$age == 20; // true
$age == '20'; // true

$age === 20; // true
$age === '20'; // false

/// if ANO
if ($age == 20 || $salary === 300000) {
    echo "Do something";
}
// if OR

// Ternary if 
echo $age < 22 ? 'Young' : 'Old';
// echo $age <20 ?

// Short ternary
$myAge =  $age ?: 18;
echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name) ? $name: 'John';
$myName = $name ?? 'John';

// switch
$userRole = 'webadmin'; // editor, user, admin
switch ($userRole){
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;
    default:
        echo 'Invalid role';

}