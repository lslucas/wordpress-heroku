<?php 

if ( $_REQUEST["array"] )
{	

		
	//debug message
	echo "Array sort completed";
	exit();
}


$elegance_options = get_option('elegance_wp');

$font1 = "'". $elegance_options['font_1'] ."', sans-serif";
$font2 = "'". $elegance_options['font_2'] ."', sans-serif";
$font3 = "'". $elegance_options['font_3'] ."', sans-serif";
$font4 = "'". $elegance_options['font_4'] ."', serif";
$font5 = "'". $elegance_options['font_5'] ."', sans-serif";

$elegance_font_scheme = '
.font1{
	font-family: '.$font1.';
}
.font2{
	font-family: '.$font2.';
}
.font3{
	font-family: '.$font3.';
}
.font4{
	font-family: '.$font4.';
}
.font5{
	font-family: '.$font5.';
}

body, p{
	font-family: '.$font3.';
}


.works-filter li a > span{
	font-family: '.$font1.';
}

.works-filter li:after{
	font-family: '.$font1.';
}
.works-item-inner h3{ 
	font-family: '.$font1.';
}
.works-item-inner p > span{  
	font-family: '.$font4.';
}
.alert > p{
	font-family: '.$font2.';
}';


?>