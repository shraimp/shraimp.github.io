<?php
include 'dataBase.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/main.css" rel="stylesheet" />
    <title>Book View</title>


<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: #b78a62;
        font-family: 'Poppins',sans-serif;
    }
    .small-container{
        max-width: 1000px;
        margin: auto;
        padding-left: 25px;
        padding-right: 20px;
        border-radius: 30px;
        border: solid black;
    }
    .row{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .single-product{
        margin-top: 80px;
    }

    .col-2 img{
        max-width: 100%;
        padding: 50px 0;
        height: 500px;
    }
    .small-img-col{
        flex-basis: 24%;
        cursor: pointer;
    }
    .single-product .col-2 img{
        padding: 0;
    }
    .single-product .col-2{
        padding: 20px;
    }
    .col-2{
        flex-basis: 50%;
        min-width: 300px;
    }
    .col-2 h1{
        font-size: 50px;
        line-height: 60px;
        margin: 25px 0 ;
    }
    .single-product h4{
        margin: 20px 0;
        font-size: 22px;
        font-weight: bold;
    }

    .single-product input{
        width: 50px;
        height: 40px;
        padding-left: 10px;
        font-size: 20px;
        margin-right: 10px;
        border: 1px solid black;
    }

    input:focus{
        outline: none;
    }

    a{
        text-decoration: none;
        color: black;
    }
    .single-product .fa{
        color: black;
        margin-left: 10px;
    }
    p{
        color: black;
    }
    .btn{
        display: inline-block;
        background: #ff523b;
        color: #ffffff;
        padding: 8px 30px;
        margin: 30px 0;
        border-radius: 30px;
        transition: background 0.5s;
    }
    .btn:hover{
        background: #563434;
    }

</style>

</head>
<body>
<section id="header">
    <div class="header">
        <div class="nav-bar">
            <div class="brand">
                <a><h1><span>MOHD's</span>Library</h1></a>
            </div>
            <div class="nav-list">
                <div class="hamburger"><div class="bar"></div></div>
                <ul>
                    <li><a href="index.html" data-after="Home" >Search</a></li>
                    <li><a href="books.php" data-after="Service" >All Books</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>



        <?php
        if(isset($_GET['p']) ){
            $book_name = $_GET['p'];
        }

        if(isset($_GET['search'])){
            $book_name = $_GET['search'];
        }

        $sql = ' SELECT * FROM book WHERE book_name= "'.$book_name.'"';

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){

                echo '
<div class="small-container single-product">
    <div class="row">
                   <div class="col-2">
            <img src="images/'.$row['img'].'" width="100%">
        </div>

        <div class="col-2">
            <h1>'.$row['book_name'].' ('.$row['book_date'].')</h1>
            <h3 style="font-size: 24px"> By: '.$row['book_auther'].'</h3>
            <h4> Price: '.$row['book_price'].'</h4>
            <input type="number" value="1">
            <a href="" class="btn" style="font-size: 16px"> Buy The Book</a>
            <h3 style="font-size: 16px"> Book Description <i class="fa fa-indent"></i></h3>
            <br>
            <p>
               '.$row['book_desc'].'
            </p>
        </div>
    </div>
</div>

                ';
            }
        }

        ?>
</body>
</html>
