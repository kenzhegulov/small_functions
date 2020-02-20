<?php
///////////////////////////////////////////
/// Скрипт статистики просмотров станиц ///
///////////////////////////////////////////

/* данные для соединения с MySQL */
$INFO['sql_host'] = "localhost";
$INFO['sql_user'] = "Пользователь_БазыДанных";
$INFO['sql_pass'] = "Пароль";
$INFO['sql_database'] = "Имя_БазыДанных";

/* проверка, есть ли запись в MySQL */
/* таблице с таким id или ее нет */
function searchID($id)
{
$result = mysql_query ("SELECT * FROM `my_log` WHERE `page_id` LIKE '".$id."'");
$num_rows = mysql_num_rows($result);
if ($num_rows>0)
{
    return True;
}
else
{
    return False;
}
}


/* Читает запись из MySQL таблицы */
/* возвращает ассоциированный массив */
function MySQLRead($id)
{
$id = addslashes($id);
$result = mysql_query ("SELECT * FROM `my_log` WHERE `page_id` LIKE '".$id."'");
return (array)mysql_fetch_assoc($result);
}

/* Обновление времени для конкретной записи */
function UpdateTime($id, $time)
{
$id = addslashes($id);
$time = addslashes($time);
$result = mysql_query ("UPDATE `my_log` SET `date` = '".$time."' WHERE `page_id` = '".$id."'");
return $result;
}

/* Обновление счетчиков для записи с указанным id */
function UpdateCounders($id, $all, $today)
{
$id = addslashes($id);
$time = addslashes($time);
$result = mysql_query ("UPDATE `my_log` SET `all` = '".$all."',`today` = '".$today."' WHERE `page_id` = '".$id."'");
return $result;
}

/* Запись всех значений "По умолчанию" */
function Default_Write($id)
{
$id = addslashes($id);
$result = mysql_query ("INSERT INTO `my_log` ( `page_id` , `all` , `today` , `date` ) VALUES ('".$id."' , 1 , 1 , '".(time()+60*60*24)."');");
return $result;
}

$unical_page_id_gid = md5($_SERVER['REQUEST_URI']); // получение md5() хэша из url страницы

$link = mysql_connect($INFO['sql_host'], $INFO['sql_user'], $INFO['sql_pass']); // Соединение с MySQL
mysql_select_db ($INFO['sql_database']); // Выбор базы данных

if (!searchID($unical_page_id_gid)) // существует ли запись с таким id
{
    Default_Write($unical_page_id_gid); // запись всех значений по умолчанию
}
else // если не существует
{
$tmp = MySQLRead($unical_page_id_gid); // считаем значения
$all = $tmp['all'] + 1;
$today = $tmp['today'] +1;
if (time()>=$tmp['date']) // если сутки с момента записи прошли
{
    UpdateTime($unical_page_id_gid, (time()+60*60*24)); // обновим дату
    UpdateCounders($unical_page_id_gid, $all, 1); // обновим счетчики
    define("Today_and_all_counter", "Просмотров: 1. Сегодня: 1");
}
else // если еще нет
{
    /* обновим счетчики */
    UpdateCounders($unical_page_id_gid, $all, $today);
}
/* устанавливаем константу с текущими значениями счетчиков */
define("Today_and_all_counter", "Просмотров: $all. Сегодня: $today");
}

mysql_close($link); // Разрываем соединение с MySQL 
?>