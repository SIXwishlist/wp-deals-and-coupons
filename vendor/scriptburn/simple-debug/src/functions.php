<?php
if (!function_exists('print_nice'))
{
    function print_nice($rr, $d = false, $extra = "")
    {
        if ($d)
        {
            return ($extra ? "<pre>" . $extra . "</pre>" : '') . "<pre>" . print_r($rr, true) . "</pre>";
        }
        else
        {
            echo (($extra ? "<pre>" . $extra . "</pre>" : '') . "<pre>" . print_r($rr, true) . "</pre>");
        }
    }
}
if (!function_exists('p_n'))
{
    function p_n($rr, $d = false)
    {
        $bt = debug_backtrace();

        $caller1 = $bt[0];
        $caller2 = @$bt[1];

        $caller1['file'] = str_replace(__DIR__, "", @$caller1['file']);
        $str             = $caller1['file'] . "@" . @$caller2['function'] . "():" . @$caller1['line'];

        print_nice($rr, $d, $str);
    }
}
if (!function_exists('p_d'))
{
    function p_d($rr, $d = false)
    {
        $bt = debug_backtrace();

        $caller1 = $bt[0];
        $caller2 = @$bt[1];

        $caller1['file'] = str_replace(__DIR__, "", @$caller1['file']);
        $str             = $caller1['file'] . "@" . @$caller2['function'] . "():" . @$caller1['line'];

        if ($d)
        {
            ob_start();
            var_dump($rr);
            $rr = ob_get_clean();
            $d  = false;
        }
        print_nice($rr, $d, $str);
        die('');
    }
}
if (!function_exists('p_c'))
{
    function p_c($msg)
    {
        $bt = debug_backtrace();

        $caller1 = $bt[0];
        $caller2 = @$bt[1];

        $caller1['file'] = str_replace(__DIR__, "", $caller1['file']);
        $str             = microtime(true) . "-" . $caller1['file'] . "@" . @$caller2['function'] . "():$caller1[line]" . "-->";
        $msg             = json_encode($msg);
        echo ("<script>console.log('$str' );console.log($msg)</script>");
    }
}
if (!function_exists('p_l'))
{
       function p_l($msg, $dump = false)

    {
        $bt = debug_backtrace();

        $caller1 = $bt[0];
        $caller2 = @$bt[1];

        $caller1['file'] = str_replace(__DIR__, "", $caller1['file']);
        $str             = microtime(true) . "-" . $caller1['file'] . "@" . @$caller2['function'] . "():$caller1[line]" . "-->";
        if ($dump !== 1)
        {
            error_log($str);
        }

        if ($dump === true)
        {
            ob_start();
            var_dump($msg);
            $rr = ob_get_clean();
        }
        elseif ($dump)
        {
            return $dump;
        }
        else
        {
           error_log( print_r($msg, 1));
        }

    }
}
