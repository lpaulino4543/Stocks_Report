<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="format.css">
    <link rel="stylesheet" href="format-custom.css">
</head>


<body>

    <h2>Stock Rankings <span class="developer">Developer Lisbeth Paulino</span></h2>

    <form method="post" action="">
    <label> ranking: </label><input class="number" type="number" name="num_files" value="<?php echo isset($_POST['num_files']) ? intval($_POST['num_files']) : 15; ?>" />

        <input type="submit" name="query" value="query" />
    </form>
    <br />

    <p>
    <ol>
        <li>highlight (green) companies with a market cap greater or equal to 40 billion dollars </li>
        <li>highlight (red) companies with a market cap less than or equal to .15 billion dollars </li>
        </p>

        <table>
            <thead>

                <tr>
                    <th>rank</th>
                    <th>symbol</th>
                    <th>company</th>
                    <th>quant</th>
                    <th>sa authors</th>
                    <th>wall street</th>
                    <th>market cap in billions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include 'function.php';
                

                $file = fopen("./data/TopStocks.csv", "r");
                
                $num_files = isset($_POST['num_files']) ? intval($_POST['num_files']) : 15;
                $count = 0;

                $row = fgetcsv($file);

                

                while (!feof($file) && $count < $num_files) { //continues iterating until the end of the file
                

                    $row = fgetcsv($file);
                    $rank = $row[0];
                    $symbol = $row[1];
                    $companyName = $row[2];
                    $quant = $row[3];
                    $saAuthors = $row[4];
                    $wallStreet = $row[5];
                    $marketCap = (float)$row[6];
                    $marketCapInBillion = (float)$row[6] / 1_000_000_000;

                    $highlight = '';

                    if ($marketCapInBillion >= 40) {
                        $highlight = 'high-light';
                    } elseif ($marketCapInBillion <= .15) {
                        $highlight = 'highlight-red';
                    }

                    ?>

                    <tr class="<?= $highlight?>">
                        <td><?= $rank ?></td>
                        <td><?= $symbol ?></td>
                        <td><?= $companyName ?></td>
                        <td class="number"><?= qpa($quant) ?></td>
                        <td class="number"><?= qpa($saAuthors) ?></td>
                        <td class="number"><?= qpa($wallStreet) ?></td>
                        <td class="number"><?= money_in_billions($marketCap) ?></td>
                    </tr>

                    <?php

                    $count++;
                    
                }
                fclose($file);
                ?>


            </tbody>
        </table>
</body>

</html>