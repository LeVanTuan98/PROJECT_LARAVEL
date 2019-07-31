<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    $danhmuc = array();
    //Danh mục gốc
    $danhmuc[] = array('id' => 0, 'name' => 'Điện tử','parent_id' => -1, 'level' => 0);
    $danhmuc[] = array('id' => 1, 'name' => 'Điện lạnh','parent_id' => -1, 'level' => 0);
    $danhmuc[] = array('id' => 2, 'name' => 'Mẹ và Bé','parent_id' => -1, 'level' => 0);
    $danhmuc[] = array('id' => 3, 'name' => 'Gia dụng','parent_id' => -1, 'level' => 0);
    // Danh mục con cấp 1
    $danhmuc[] = array('id' => 4, 'name' => 'Laptop','parent_id' => 0, 'level' => 0);
    $danhmuc[] = array('id' => 5, 'name' => 'Máy tính bảng','parent_id' => 0, 'level' => 0);
    $danhmuc[] = array('id' => 6, 'name' => 'Điện thoại','parent_id' => 0, 'level' => 0);
    $danhmuc[] = array('id' => 7, 'name' => 'Tivi','parent_id' => 0, 'level' => 0);

    $danhmuc[] = array('id' => 8, 'name' => 'Điều hòa','parent_id' => 1, 'level' => 0);
    $danhmuc[] = array('id' => 9, 'name' => 'Quạt','parent_id' => 1, 'level' => 0);
    $danhmuc[] = array('id' => 10, 'name' => 'Tủ lạnh','parent_id' => 1, 'level' => 0);

    $danhmuc[] = array('id' => 11, 'name' => 'Tã giấy','parent_id' => 2, 'level' => 0);
    $danhmuc[] = array('id' => 12, 'name' => 'Sữa','parent_id' => 2, 'level' => 0);

    $danhmuc[] = array('id' => 13, 'name' => 'Nồi cơm điện','parent_id' => 3, 'level' => 0);
    $danhmuc[] = array('id' => 14, 'name' => 'Máy giặt','parent_id' => 3, 'level' => 0);

    //Danh mục con cấp 2
    $danhmuc[] = array('id' => 15, 'name' => 'Laptop Dell','parent_id' => 4, 'level' => 0);
    $danhmuc[] = array('id' => 16, 'name' => 'Laptop Asus','parent_id' => 4, 'level' => 0);
    $danhmuc[] = array('id' => 17, 'name' => 'IPhone','parent_id' => 6, 'level' => 0);
    $danhmuc[] = array('id' => 18, 'name' => 'Samsung','parent_id' => 6, 'level' => 0);

    // Danh mục con cấp 3
    $danhmuc[] = array('id' => 19, 'name' => 'Asus X554L','parent_id' => 16, 'level' => 0);
    $danhmuc[] = array('id' => 20, 'name' => 'Samsung S10+','parent_id' => 18, 'level' => 0);


    $html_menu = '';
    function BuildMenuHTML($input_category,&$html,$parent_id = -1, $level = 0){
        if (count($input_category) > 0) {
            $html .= "<ul class='menu-level-$level'>";
            foreach ($input_category as $category){
                if ($category['parent_id'] == $parent_id){
                    $category['level'] = $level;
                    $html .= '<li>';
                    $html .= $category['name'];

                    $new_parent_id = $category['id'];
                    $new_level = $level + 1;
                    BuildMenuHTML($input_category,$html,$new_parent_id,$new_level);
                    $html .= '</li>';
                }
            }
            $html .= '</ul>';
        }
    }

    BuildMenuHTML($danhmuc,$html_menu);
    echo $html_menu;
    ?>
</body>
</html>