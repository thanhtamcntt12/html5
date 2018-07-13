<?php
$midle_page = ($config_page->show_page%2)+1;

if($config_page->total_page <= $config_page->show_page ){
    $config_page->show_page = $config_page->total_page;
    $start_page = 1;
    $end_page = $config_page->total_page;
}elseif($config_page->current_page <= $midle_page){
    $start_page = 1;
    $end_page = $config_page->total_page;
}else{
    $start_page = $config_page->current_page - $midle_page;
    $end_page = $start_page + $config_page->show_page;
    if($end_page > $config_page->total_page){
        $end_page = $config_page->total_page+1;
        $start_page = $end_page -  $config_page->show_page;
    }
}

$parameters = '';
foreach($config_page->parameters as $key => $value){
    $parameters .= '&'.$key.'='.$value;
}
?>
@if($config_page->total_page >1)
    <ul class="pagination {{$config_page->other_class}}">
        @if($config_page->current_page > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $config_page->url }}?page=1{{ $parameters }}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item pcInlineB">
                <a class="page-link" href="{{ $config_page->url }}?page={{ $config_page->current_page - 1 }}{{ $parameters }}" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                </a>
            </li>
        @endif
        @for($i =0; $i<$config_page->show_page; $i++)
            <?php $page = $start_page + $i ?>
            <li class="page-item  @if($config_page->current_page == $page) active @endif">
                <a class="page-link" href="{{ $config_page->url }}?page={{$page}}{{ $parameters }}">{{ $page }}</a>
            </li>
        @endfor
        @if($config_page->current_page < $config_page->total_page)
            <li class="page-item pcInlineB">
                <a class="page-link" href="{{ $config_page->url }}?page={{ $config_page->current_page + 1 }}{{ $parameters }}" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $config_page->url }}?page={{ $config_page->total_page }}{{ $parameters }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        @endif
    </ul>
@endif