<?php
function Registr($email,Pdo $db)
{
    $prepared= $db ->prepare('select * from users where email =:email');
    $prepared->execute(['email'=>trim($email)]);
    return $prepared->fetch(PDO::FETCH_ASSOC);
}
//Регистрация пользователя
function RegUser(Pdo $db,$name,$email,$phone,$ulica,$korpus,$kvartira,$itaj,$commit,$sdacha,$cash,$zvonok)
{
    $prepared= $db ->prepare('INSERT INTO users(name, email, phone,ulica,korpus,kvartira,itaj,commit,sdacha,cash,zvonok) VALUES (:name,:email,:phone,:ulica,:korpus,:kvartira,:itaj,:commit,:sdacha,:cash,:zvonok)');
    $prepared->execute(['email'=>trim($email),'name'=>$name,'phone'=>$phone,'ulica'=>$ulica,'korpus'=>$korpus,'kvartira'=>$kvartira,'itaj'=>$itaj,'commit'=>$commit,'sdacha'=>$sdacha,'cash'=>$cash,'zvonok'=>$zvonok]);
    $id=$db->lastInsertId();
    $prepared= $db ->prepare('select * from users where id =:id');
    $prepared->execute(['id'=>trim($id)]);
    return $prepared->fetch();
}
//оформление заказа
function RegOrder(Pdo $db,$userId,$pismo,$content)
{
    $prepared= $db ->prepare('insert into orders(content, user_id, pismo) values (:content,:user_id,:pismo)
');
    $prepared->execute(['content'=>trim($content),'user_id'=>$userId,'pismo'=>$pismo]);
    $id=$db->lastInsertId();
    $prepared= $db ->prepare('select * from orders where id =:id');
    $prepared->execute(['id'=>trim($id)]);
    return $prepared->fetch();
}
function otpravkaPisma()
{

}