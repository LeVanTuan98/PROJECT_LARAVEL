<?php

/*
 * 1. Global variable
 * => Có giá trị ở ngoài hàm
 */


/*
 * 2. Local variable
 * => Chỉ có giá trị trong hàm, ở mỗi lần gọi thì sẽ reset lại ban đầu
 */



/*
 * 3. Static variable
 * => Cũng là một biến loacl nhưng khi có thuộc tính static
 * thì nó có thể nhớ giá trị hiện tại để tiếp tục thực hiện lần sau khi gọi đến hàm đấy
 */
$x = 10;
function myTest() {
    static $x = 0;
    echo "<br> Giá trị của x = $x";
    $x++;
}
myTest();
myTest();
myTest();
myTest();
echo "<br> Giá trị của x = $x";
myTest();
myTest();

/*
 * Kết quả thu được là :
 *  Giá trị của x = 0
    Giá trị của x = 1
    Giá trị của x = 2
    Giá trị của x = 3
    Giá trị của x = 10 => biến global
    Giá trị của x = 4
    Giá trị của x = 5
 */