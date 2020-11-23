<?php
    $danhmuc = DB::table('danhmuc')->select('Id_DM', 'Ten_DM')
    ->orderby('ThuTu', 'asc')->where('AnHien', 1)->get();
?>
<div class="sidebar-box ftco-animate">
    <h3>Tags</h3>
        <div class="tagcloud">
            @foreach($danhmuc as $dm)
                <a href="#" class="tag-cloud-link">{{ $dm->Ten_DM }}</a>
            @endforeach
        </div>
</div>