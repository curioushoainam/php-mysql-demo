<?php

// Set up a connection with a database 
$host = 'localhost';
$databaseName = 'music';
$user = 'root';
$password = '';


try{	
	$dsn = "mysql:host=". $host ."; dbname=". $databaseName;
	// ket noi
	$conn = new PDO($dsn, $user, $password);
	// thong bao thanh cong
	echo "Connected successfully with db  name " . $databaseName .'<br>';
	// thiet lap che do loi
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// ================================================================
	// Đọc dữ liệu
	// Sử đụng Prepare 
 //    $stmt = $conn->prepare("SELECT * FROM artist"); 

 //    // Thực thi câu truy vấn
 //    $stmt->execute();

 //    // Khai báo fetch kiểu mảng kết hợp
 //    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

 //    // Lấy danh sách kết quả
 //    $result = $stmt->fetchAll();	

 //    echo '<pre>';
 //    print_r($result);
 //    echo '</pre>'; 

	// // Lặp kết quả
 //    foreach ($result as $item){
 //        echo $item['artist_id'] . ' - '. $item['name'] . '<br>';
 //    }} 

    // ================================================================
    // Insert dữ liệu
	// $stmt = $conn->prepare("INSERT INTO Album (title, artist_id) 
	// 						VALUES (:title, :artist_id);");
	// $stmt->bindParam(':title', $title);
	// $stmt->bindParam(':artist_id', $artist_id);

	// $title = 'Who Made Who';
	// $artist_id = 2;
	// $stmt->execute();

	// $title = 'IV';
	// $artist_id = 1;
	// $stmt->execute();
	// $stmt = null;

	// echo "Inserted successfully" .'<br>';

	// -----------------------------------------------------------------
    $stmt = $conn->prepare("INSERT INTO Track (title, rating, len, count, album_id, genre_id)
    						VALUES (:title, :rating, :len, :count, :album_id, :genre_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':len', $len);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':album_id', $album_id);
    $stmt->bindParam(':genre_id', $genre_id);

    // Thiết lập giá trị cho tham số  
    $title = 'Black Dog';
    $rating = 5;
    $len = 297;
    $count = 0;
    $album_id = 10;
    $genre_id = 1;
    $stmt->execute();

    $title = 'Stairway';
    $rating = 5;
    $len = 482;
    $count = 0;
    $album_id = 10;
    $genre_id = 1;
    $stmt->execute();

    $title = 'About to Rock';
    $rating = 5;
    $len = 313;
    $count = 0;
    $album_id = 9;
    $genre_id = 2;
    $stmt->execute();

    $title = 'Who Made Who';
    $rating = 5;
    $len = 207;
    $count = 0;
    $album_id = 9;
    $genre_id = 2;
    $stmt->execute();

    echo "Inserted successfully" .'<br>';
    echo "The last id is ". $conn->lastInsertId();

    $stmt = null;

}
catch (PDOException $e) {
	echo "Failed: " . $e->getMessage();
}

// Ngắt kết nối
$conn = null;






?>