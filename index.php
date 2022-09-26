<?php
    function html2txt($document){ 
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
                 '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
                 '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
                 '@<![\s\S]*?--[ \t\n\r]*>@');      // Strip multi-line comments including     CDATA ); 
        $text = preg_replace($search, '', $document); 
        return $text; 
    }
    function nl2br2($string) { 
        $string = str_replace(array('\n'), "", $string); 
        return $string; 
    }

    $text = isset($_POST['txt1']) ? $_POST['txt1'] : null;
    $posttext = strrpos( $text, 'content')+10;
    $endline = strrpos( $text, 'device_type');
    $endline = $endline-$posttext;
    $text = substr ($text , $posttext ,$endline);

    $text =  str_replace(array('\n', '","'), "", $text);
    $text = nl2br2($text);
    // function rungo($text)
    // {
    //     if (isset($text->elements))
    //         return rungo($text->elements);
    //     elseif (isset($text->content))
    //         return $text->content;
    //     else return [];
    //     // else 
    //     //     return rungo($text->);
    // }
    // $text = nl2br2($text);

    // $text = html2txt($text);
    // $text1;
    // $text2 = '';
    // function run($text)
    // {    $return = array();
    //     $i = 0;
    //     foreach ($text as $child) {
    //         is_array($child) ? $i = 1 : $i = 0;
    //     }
    //     return $i;
    //         return empty($return) ? null : $return;

    // }
    // // $a = run($text);
    // var_dump(rungo($text));


    
    
?>
<form action="" method="POST">
    <textarea name="txt1"cols="30" rows="10"></textarea>
    <input type="submit">
</form>
<div class="result">
    <?php
        if($text==null)
            echo "No result";
        else 
            echo $text;
    ?>
</div>