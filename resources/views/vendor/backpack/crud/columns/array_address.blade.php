<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 10/10/2016
 * Time: 3:01 PM
 */
?>
{{-- enumerate the values in an array  --}}
<td>
    <?php
    $value = $entry->{$column['name']};
    //    	die(print_r($value));
    // the value should be an array wether or not attribute casting is used
    if (!is_array($value)) {
        $value = json_decode($value, true);
    }
    if ($value && count($value)) {
        $output = $value['value'];
        //die(print_r($s));
        echo $output;
    } else {
        echo '-';
    }
    ?>
</td>