<?php
$url = "http://rss.nytimes.com/services/xml/rss/nyt/Sports.xml"; // xmld.xml contains above data
$feeds = file_get_contents($url);
$rss = simplexml_load_string($feeds);

$items = [];

foreach($rss->channel->item as $entry) {
    $image = '';
    $image = 'N/A';
    foreach ($entry->children('media', true) as $k => $v) {
        $attributes = $v->attributes();

        if (count($attributes) == 0) {
            continue;
        } else {
            $image = $attributes->url;
        }
        $content_data = (string)$entry->children("media", true)->description;
    }
 

    $items[] = [
        'link' => $entry->link,
        'title' => $entry->title,
        'image' => $image,
        'Desc' =>$content_data,

    ];

}

//print_r($items);

foreach ($items as $item) {
    printf('<img src="%s">', $item['image']);
    printf('<a href="%s">%s</a>', $item['link'], $item['title']);
    printf('<p>%s</p>', $item['Desc']);
}
?>
