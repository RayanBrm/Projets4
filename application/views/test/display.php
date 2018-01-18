<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test result</title>
</head>
<body>
    <h1>Liste des tests unitaires</h1>
    <h3>Test : <?= $PassedTest.'/'.$NumberOfTest ?></h3>
<?php
foreach ($report as $currentReport){
    foreach ($currentReport as $key => $value){
        echo "<h1>$key test</h1>";
        foreach ($value as $testReport){
            echo $testReport;
        }
        echo "<br>";
    }
}
?>

</body>
</html>