<?php

use Illuminate\Support\Facades\DB;

    if(!function_exists('number_generator')){
        function number_generator($start,$range,$name,$val=""){
            $endYear=$start+$range;
            $retdata='<select name="'.$name.'" class="form-select">
                        <option value="">--Select--</option>';
            for($i=$start;$i<$endYear;$i++){
                $rec=sprintf("%02d",$i);
                $retdata.='<option value="'.$rec.'"'; 
                if($rec==$val){
                    $retdata.='selected="selected"'; 
                }
                $retdata.='>'.$rec.'</option>';
            }
            $retdata.='</select>';
            echo $retdata;
        }
    }
    
    function deptWithOptions($dept){
        $sql1=DB::table('deptoptions')->where('dept',$dept)->orderBy('id','asc')->get();
        // result("select * from deptoptions where dept='$dept' order by id ASC");
        if(!empty($sql1)){
            return $sql1;
        }else{
            return "";
        }
    }

    if(!function_exists('deptList')){
        function deptList($name,$val=""){
            echo '<select name="'.$name.'" required class="form-select" >';
                echo '<option value="" selected>--Select--</option>';
            $sql=DB::table('faculties_dept')->orderBy('id')->get();
            foreach($sql as $ret){
                // $retOptions=deptWithOptions($ret->dept);
                // if(!empty($retOptions)){
                //     foreach($retOptions as $retOption){
                //         echo '<option value="'.$retOption->options.'">'.$retOption->options.'</option>';
                //     }
                // }else{
                    echo '<option'; 
                    echo $val==$ret->dept ? " selected ":"";
                    echo '>'.$ret->dept.'</option>';
                // }
            }
            echo '</select>';
        }
    }