<?php

$q=$_GET["q"];

if($q=="Reddit") {
  $xml=("https://www.reddit.com/.rss");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

$feed=$xmlDoc->getElementsByTagName('feed')->item(0);
$feed_title = $feed->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$feed_link = $feed->getElementsByTagName('link')
->item(1)->getAttribute('href');
$feed_updated = $feed->getElementsByTagName('updated')
->item(0)->childNodes->item(0)->nodeValue;

echo("<p><a href='" . $feed_link
  . "'>" . $feed_title . "</a>");
echo ("&nbsp&nbsp");
  echo ($feed_updated);
echo("<br>");

$x=$xmlDoc->getElementsByTagName('entry');
for ($i=0; $i<=20; $i++) {
  $item_author_name=$x->item($i)->getElementsByTagName('author')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_author_link=$x->item($i)->getElementsByTagName('author')
  ->item(0)->childNodes->item(1)->nodeValue;
  $item_category=$x->item($i)->getElementsByTagName('category')
  ->item(0)->nodeValue;
  $item_content=$x->item($i)->getElementsByTagName('content')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->getAttribute('href');
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_updated=$x->item($i)->getElementsByTagName('updated')
  ->item(0)->childNodes->item(0)->nodeValue;
 
  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a>");
  echo ("&nbsp&nbsp");
  echo ($item_updated);
  echo ("<br>");
  echo ("<a href='" . $item_author_link
  . "'>" . $item_author_name . "</a>");
  echo ("<br>");
  echo ($item_category);
  echo ("<br>");
  echo ($item_content . "</p>");
}
?>