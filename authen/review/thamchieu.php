<?php
$cities = array('Hà Nội', 'Nghệ An', 'Hải Phòng', 'Hồ Chí Minh', 'Đà Nẵng');
echo "<br> Mảng city Ban đầu:";
echo "<pre>";
print_r($cities);
echo "</pre>";

/*
 * Loại bỏ các thành phố bắt đầu bằng chữ 'H'
 */
function filterCity(&$cities_argument){
    foreach ($cities_argument as $key => $city){
        if(substr($city,0,1) == 'H') {
            unset($cities_argument[$key]);
        }
    }
    echo "<br> Mảng filtercity trong hàm:";
    echo "<pre>";
    print_r($cities_argument);
    echo "</pre>";

}
filterCity($cities);
// Để hủy bỏ luôn các thành phố bắt đầu bằng 'H' ở mảng ban đầu thì phải truyền tham chiếu vào hàm filterCity
echo "<br> Mảng city sau khi filter:";
echo "<pre>";
print_r($cities);
echo "</pre>";
