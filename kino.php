<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kino polskie</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="baner">
        <h2>Filmowa szkoła w Lodzi</h2>
        <img src="obrazszkola.jpg" alt="film"> 
    </div>
  
    <div class="nazwafilmu">
    <?php 
            $base= mysqli_connect("localhost","root","","skolafilmowa");
            $query = "SELECT rezyser, scenarista, premjera, data_w_kinie FROM kinoL WHERE rezyser = 'EVG'";
            $res=mysqli_query($base,$query);
            while($r=mysqli_fetch_row($res)){
                echo "<div class='info'><h3>$r[0] - $r[1] </h3><h4>$r[2]</h4><p>w dniu: $r[3]</p></div> " ;

            }
    ?>
    </div>

    <div class="glowny">
        <h2>Nazwa filmu</h2>
    </div>

    <div class="lewy">
        <p>Podaj dane (1 - reżyser, 2 - scenarysta, 3 - aktor, 4 - aktorka): </p>
        <form action="kino.php" method="POST">
            <input type="number" name="dane">
            <input type="submit" value="Sprawdź">
        </form>

        <ol>
        <?php
                if(!empty($_POST['dane'])){
                    $id = $_POST['dane'];
                    $query2 = "SELECT imie, nazwisko FROM rezyser WHERE dane_id=$id ;";
                    $res2=mysqli_query($base,$query2);
                    while($r2=mysqli_fetch_row($res2)){
                        echo "<li><p>$r2[0] $r2[1]</p></li>";
        
                    }
                }
            
            
            mysqli_close($base);
            ?>

        </ol>
    </div>

    <div class="prawy">
        <img src="wajda.png" alt="rezyser">
        <p>Andrzej Wajda</p> 
    </div>
</body>
</html>