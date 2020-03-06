<?php

use App\Model\Template;


function default_template()
{
    $template = Template::where('is_active', 1)->where('is_deleted', 0)->first();
    $layout = $template->folder;
    return $layout;
}

function default_exp_date()
{
    $date = date('m/d/Y', strtotime("+3 months", strtotime(now())));
    return $date;
}
