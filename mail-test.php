<?php
$params = array('host' => 'smtp.163.com',
            'port' => '25',
            'username' => 'yong_cyril@163.com',
            'password' => 'yongnie0204',
            'auth' => true, );//必须保证这一行

  $recipients = '466671836@qq.com'; //接收人，可以是一个数组来存放多个地址

  $headers['From'] = 'yong_cyril@163.com';
  $headers['To'] = '466671836@qq.com';
  $headers['Subject'] = 'From php';

  $body = 'What the fuck';
  echo 'hello world<br>';
  //选择smtp的发送方式，当然还支持mail()和sendmail
  $mail_object = &Mail::factory('smtp', $params);
  echo 'hello world<br>';
  if (PEAR::isError($e = $mail_object->send($recipients, $headers, $body))) {
      echo 'hello world<br>';
      echo 'Can not send';
      die($e->getMessage()."\n");
  } else {
      echo 'Send';
  }
