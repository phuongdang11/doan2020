<?php
    $danhmuc = DB::table('danhmuc')->select('Id_DM', 'Ten_DM')
    ->orderby('ThuTu', 'asc')->where('AnHien', 1)->get();
?>
<div class="sidebar-box ftco-animate">
    <div class="categories">
        <h3>Danh mục</h3>
            @foreach($danhmuc as $dm)
                <li><a href="{{action("ProductController@sptodm",['Id_DM'=>$dm->Id_DM])}}">{{ $dm->Ten_DM }}</a></li>
            @endforeach
    </div>
</div>