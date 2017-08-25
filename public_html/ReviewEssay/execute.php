<?php
include "../database.php";
//$sql="drop table Payments";
$sql="CREATE TABLE PaymentDetails (
id int(11) NOT NULL AUTO_INCREMENT,
item_name varchar(255) NOT NULL,
payer_email varchar(150) NOT NULL,
first_name varchar(150) NOT NULL,
last_name varchar(150) NOT NULL,
amount float NOT NULL,
 currency varchar(50) NOT NULL,
 country varchar(50) NOT NULL,
 txn_id varchar(100) NOT NULL,
 txn_type varchar(100) NOT NULL,
 payer_id varchar(50) NOT NULL,
 payment_status varchar(100) NOT NULL,
 payment_type varchar(100) NOT NULL,
 create_date  datetime NOT NULL,
 payment_date datetime NOT NULL,
 PRIMARY KEY (id)
)";
$conn->query($sql);

?>
