<?php
// \Html::macro('smartNav', function($url, $icon, $title) {
//     $class = $url == request()->url() ? 'active' : '';
//     return "<li class=\"treeview $class\">
//                 <a href=\"$url\">
//                     <i class=\"fa $icon\"></i>
//                     <span>$title<span>
//                     <span class=\"pull-right-container $class\">
//                     <i class=\"fa fa-angle-left pull-right $class\"></i>
//                   </span>
//                 </a>
//             </li>";
// });

\Html::macro('smartNav', function($url, $icon, $title) {
    $class = $url == request()->url() ? 'active' : '';
    return "<li class=\"treeview $class\">
                <a href=\"$url\">
                    <i class=\"fa $icon\"></i>
                    <span>$title<span>
                </a>
            </li>";
});
?>