<?php
$clients=[
        '0'=>[
            'name'=>[
             'firstname'=>'fatema',
            'lastname'=>'motiwala' 
            ],
        'location'=>'Mumbai'
        ],
        '1'=>[
            'name'=>[
             'firstname'=>'sakina',
            'lastname'=>'modi' 
            ],
        'location'=>'dubai'
        ]
    ];
foreach($clients as $client){
  echo $client['name']['firstname'].'-';
  echo $client['name']['lastname'].'<br>';
}
?>
