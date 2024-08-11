
<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function isValid($s){
        $oc_pairs = array(
            "(" => ")",
            "[" => "]",
            "{" => "}"
        );

        $o_stack = array();
        for($i = 0; $i < strlen($s); $i++){
            if(!array_key_exists($s[$i], $oc_pairs) and !in_array($s[$i], $oc_pairs)){
                continue;
            }
            if(array_key_exists($s[$i], $oc_pairs)){
                $o_stack[] = $s[$i];
                continue;
            }
            if(in_array($s[$i], $oc_pairs)){
                if(!count($o_stack)){
                    return false;
                }
                $last_o =  array_pop($o_stack);
                if($oc_pairs[$last_o] !== $s[$i]){
                    return false;
                }
            }
        }
        if(count($o_stack)){
            return false;
        }
        return true;
    }
}

$solution = new Solution2();

$s = "([{kfjfrro03ut0 v i0ut020-ti}])";
print($solution->isValid($s)?"true\n": "false\n");  # True

$s = "(((fasf[fafsdfasf{dffwrwegt}ertvrv]rvrcwer))";
//print_r($s);
print($solution->isValid($s)?"true\n": "false\n");  # False

$s = "((fasf[fafsdfasf{dffwrwegt}ertvrv]rvrcwer))";
//print_r($s);
print($solution->isValid($s)?"true\n": "false\n");  # True

$s = "((fasf[fafsdfasf{dffwrwegt}ertvrv]rvrcwer))]";
//print_r($s);
print($solution->isValid($s)?"true\n": "false\n");  # False


class Solution2 {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s){
        return empty(array_reduce(
            str_split($s),
            function($stack, $c, $map = [')' => '(', ']' => '[', '}' => '{'], $test = "xxxx"){
                print_r($test);
                return array_key_exists($c, $map) && end($stack) == $map[$c]
                    ? array_slice($stack, 0, -1)
                    : array_merge($stack, [$c]);
            }, []));
    }
}

class Solution3 {
    function isValid($s){
        return empty(array_reduce(
                str_split($s),
                function($carry, $char, $map = array(")"=>"(","]"=>"[","}"=>"{")){
                    return array_key_exists($char, $map) && end($carry) == $map[$char]
                        ? array_slice($carry, 0, -1)
                        : array_merge($carry, array($char));
                },
                []
            )
        );
    }
}
