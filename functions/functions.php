<?php
    function get_posts($limit, $offset){
        global $db;

        $post_db = "SELECT *  FROM `people_post` ORDER BY p_id DESC LIMIT $limit OFFSET $offset";

        $result = mysqli_query($db, $post_db);

        $posts = mysqli_fetch_all($result, 1);

        return $posts;
    }

    function get_post_by_id($post_id){
        global $db;

        $post_db = "SELECT *  FROM `people_post` WHERE p_id = ".$post_id ;

        $result = mysqli_query($db, $post_db);

        $post = mysqli_fetch_assoc($result);

        return $post;
    }

    function get_categories(){
        
        global $db;
        
        $cat_db = "SELECT * FROM `categories`";

        $result = mysqli_query($db, $cat_db);

        $categories = mysqli_fetch_all($result, 1);

        return $categories;
    }

    function get_category_title($category_id){
        global $db;

        $category_id = mysqli_real_escape_string($db, $category_id);

        $category_title = 'SELECT *  FROM categories WHERE cat_id = "'.$category_id.'"';

        $result = mysqli_query($db, $category_title);

        $cat_title = mysqli_fetch_assoc($result);

        return $cat_title['cat_title'];
    }

    function get_posts_by_category($category_id){
        global $db;

        $category_id = mysqli_real_escape_string($db, $category_id);

        $post_category = "SELECT *  FROM people_post WHERE post_cat = '".$category_id."' ORDER BY p_id DESC ";

        $result = mysqli_query($db, $post_category);

        $posts = mysqli_fetch_all($result, 1);

        return $posts;
    }

    function get_sub_categories(){

    global $db;

    $sub_cat_db = "SELECT * FROM `subcategories`";

    $result = mysqli_query($db, $sub_cat_db);

    $subcategories = mysqli_fetch_all($result, 1);

    return $subcategories;
}

    function get_subcategory_title($subcategory_id){
        global $db;

        $subcategory_id = mysqli_real_escape_string($db, $subcategory_id);

        $subcategory_title = 'SELECT *  FROM subcategories WHERE subcat_id = "'.$subcategory_id.'"';

        $result = mysqli_query($db, $subcategory_title);

        $subcat_title = mysqli_fetch_assoc($result);

        return $subcat_title['subcat_title'];
    }

    function get_posts_by_subcategory($sub_category_id){
        global $db;

        $sub_cat_id = mysqli_real_escape_string($db, $sub_category_id);

        $post_subcategory = "SELECT *  FROM people_post  WHERE post_subcat = '".$sub_cat_id."' ORDER BY p_id DESC ";

        $result = mysqli_query($db, $post_subcategory);

        $sub_posts = mysqli_fetch_all($result, 1);

        return $sub_posts;
    }

    function generate_code($length = 8){
        $string = "";
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ1234567890";
        $num_chars = strlen($chars);

        for($i = 0; $i < $length; $i++){
            $string.=substr($chars, rand(1, $num_chars) - 1, 1);
        }

        return $string;
    }

    function insert_subscribes($name, $email, $tel){
        global $db;

        $name = mysqli_real_escape_string($db ,$name);
        $email = mysqli_real_escape_string($db, $email);
        $tel = mysqli_real_escape_string($db ,$tel);

        $query = "SELECT * FROM `feedback_subscribes` WHERE sub_email = '$email'";

        $result = mysqli_query($db, $query);

        if(!mysqli_num_rows($result)){
            $sub_code = generate_code();

            $insert_query = "INSERT INTO `feedback_subscribes` (sub_name,sub_tel,sub_email,code) VALUES ('$name','$tel','$email','$sub_code')";

            $result = mysqli_query($db, $insert_query);

            var_dump($result);

            if($result){
                return 'created';
            }
            else{
                return 'fail';
            }
        }
        else{
            return 'exist';
        }
    }

    function get_important_post($limit){
        global $db;

        $imp_post = "SELECT *  FROM `people_post` WHERE add_post = '1' ORDER BY birthday DESC LIMIT $limit";

        $result = mysqli_query($db, $imp_post);

        $imp_posts = mysqli_fetch_all($result, 1);

        return $imp_posts;
    }

    function get_last_post($last_limit){
        global $db;

        $last_post = "SELECT * FROM `people_post` WHERE add_post = '1' ORDER BY p_id DESC LIMIT $last_limit";

        $result = mysqli_query($db, $last_post);

        $last_posts = mysqli_fetch_all($result, 1);

        return $last_posts;
    }

    function get_slider($slider_limit){
         global $db;

         $slider = "SELECT * FROM `people_post` LIMIT $slider_limit";

         $result = mysqli_query($db, $slider);

         $slider_posts = mysqli_fetch_all($result, 1);

         return $slider_posts;
     }

    function search($search_f){
         global $db;
         if($search_f == ''){
             $search_posts = false;
             return $search_posts;
         }
         else{
             $search = "SELECT * FROM `people_post` WHERE surname LIKE '%$search_f%' OR people_name LIKE '%$search_f%' OR surname_2 LIKE '%$search_f%'  OR type LIKE '%$search_f%'  OR model_name LIKE '%$search_f%'";
             $result = mysqli_query($db, $search);

             $search_posts = mysqli_fetch_all($result, 1);
             return $search_posts;
         }





     }

    function request_material($type, $model_name, $photo, $tel, $last_see_date, $last_see_time, $last_see_city, $signs_text, $last_see_text, $post_date){
        global $db;
        $category = 4;
        $sub_cat = 0;

        if($type == 'Транспортний засіб') $sub_cat = 18;
        elseif ($type == 'Коштовіність') $sub_cat = 19;
        elseif ($type == 'Мобільний телефон') $sub_cat = 20;
        elseif ($type == 'Зброя') $sub_cat = 21;

        $insert_query = "INSERT INTO `people_post` (type, model_name, photo, tel, last_see_date, last_see_time, last_see_city, signs_text,
                           last_see_text, post_date, post_cat, post_subcat)
                            VALUES ('$type','$model_name','$photo','$tel', '$last_see_date', '$last_see_time', '$last_see_city',
                                    '$signs_text', '$last_see_text', '$post_date','$category','$sub_cat')";

        $result = mysqli_query($db, $insert_query);

        if($result){
            return 'good';
        }
        else{
            return 'bad';
        }
    }

    function request_people($surname, $name, $surname_2, $photo, $last_see_city, $last_see_date,
                            $last_see_time, $sex, $signs_text, $last_see_text, $tel, $birthday, $oos_zone, $post_date){
        global $db;
        $category = 1;
        $sub_cat = 0;

        $now = new DateTime('now');
        $interval = $now->diff(new DateTime($birthday));
        $birthDate = $interval->format('%y');

        if($oos_zone == true) $sub_cat = 17;

        elseif($birthDate < 18) $sub_cat = 16;

        elseif ($birthDate > 18) $sub_cat = 15;

        elseif (($birthDate < 18) && ($oos_zone == true)) $sub_cat = 16;

        print_r($sub_cat) ;

        $insert_query = "INSERT INTO `people_post` (surname, people_name, surname_2, photo, tel, last_see_date, last_see_time, sex, oos_zone, birthday,
                           last_see_city, signs_text, last_see_text, post_date, post_cat, post_subcat)
                         VALUES ('$surname','$name','$surname_2','$photo','$tel ','$last_see_date','$last_see_time','$sex', 
                                '$oos_zone','$birthday', '$last_see_city','$signs_text','$last_see_text','$post_date','$category', '$sub_cat')";

        $result = mysqli_query($db, $insert_query);

        if($result){
            return 'good';
        }
        else{
            return 'bad';
        }
    }

    function get_image($get_img_name, $get_img_tmp){

        $extension = pathinfo($get_img_name, PATHINFO_EXTENSION);

        $new_img_name = uniqid().'.'.$extension;

        move_uploaded_file($get_img_tmp,'../assets/img/uploads/' . $new_img_name);

        $photo = $new_img_name;

        return $photo;
    }

    function admin_check($add, $add_id){
        global $db;

        $update_query = "UPDATE `people_post` SET add_post = '$add' WHERE p_id = '$add_id'";

        $result = mysqli_query($db, $update_query);

        return $result;

    }

    function admin_delete($del_id){
        global $db;

        $insert_query ="DELETE FROM `people_post` WHERE people_post.p_id = '$del_id'";

        $result = mysqli_query($db, $insert_query);


        return $result;

    }
//error_reporting(0);

?>


