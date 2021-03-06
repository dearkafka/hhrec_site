<?php
function curl_post_h($url, $data, $headers) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  if ($headers != null) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  }
  $server_output = curl_exec ($ch);
  curl_close ($ch);
  return $server_output;
}

function curl_post($url, $data) {
  return curl_post_h($url, $data, null);
}

function curl_get_h($url, $headers) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  if ($headers != null) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  }
  $server_output = curl_exec($ch);
  curl_close($ch);
  return $server_output;
}

function curl_get($url) {
  return curl_get_h($url, null);
}

function getHumanDate($date) {
  $monthes = [
      1 => "января",
      2 => "февраля",
      3 => "марта",
      4 => "апреля",
      5 => "мая",
      6 => "июня",
      7 => "июля",
      8 => "августа",
      9 => "сентября",
      10 => "октября",
      11 => "ноября",
      12 => "декабря",

  ];
  $pDate = date_parse($date);
  $hour = $pDate['hour'] < 10 ? (0 . $pDate['hour']) : $pDate['hour'];
  $minute = $pDate['minute'] < 10 ? (0 . $pDate['minute']) : $pDate['minute'];
  return $pDate['day'] . " " . $monthes[$pDate['month']] . " "
  . $pDate['year'] . " в " . $hour . ":" . $minute;
}