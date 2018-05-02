<h1>Главная страница</h1>


<?php foreach ($states as $value): ?>
<h1><? echo $value["title"]; ?></h1>
<p><? echo $value["primary_text"]; ?></p>
<hr>
<?php endforeach; ?>
