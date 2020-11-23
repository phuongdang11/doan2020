@if(session()->get('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                {{ Session::forget('msg') }}
            </button>
        </div>
@endif
<div class="col-lg-12 col-md-12">
    <div class="chua">
        <form class="form-header" action="{{ url('/danhmuc') }}" method="GET">
            <input class="au-input au-input--xl" id="myInput" onkeyup="myFunction()" type="text" name="query" placeholder="Tìm tên bình luận ..." />
            <button class="au-btn--submit" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>

        <button class="au-btn au-btn-icon au-btn--blue ">
        <a href="{{ route('binhluan.create')}}" style="color: white;"><i class="zmdi zmdi-plus"></i>Thêm Bình Luận</a></button>
    </div>      
        <div class="table-responsive table--no-card m-b-30">
            <table id="myTable" class="table table-borderless table-striped table-earning">
                <thead >
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>Ngày Đăng</th>
                    <th>Khách Hàng</th>
                    <th>Tin Tức</th>
                    <th>Thứ tự</th>
                    <th>Ẩn hiện</th>
                    <th>Hành động</th>
                </thead>

                <tbody>
                @foreach($bl as $row)
                    <tr>
                        <td>{{ $row->Id_BL }}</td>
                        <td>{{ $row->Noi_Dung }}</td>
                        <td>{{ $row->created_at }}</td>
                        <?php
                            $kh = DB::table('khachhang')->select('Id_KH', 'Ten_KH')->where('Id_KH', '=', $row->Id_KH)->first();
                        ?>
                        <td>{{ $kh->Ten_KH }}</td>
                        <td>{{ $row->Id_TT }}</td>
                        <td>{{ $row->ThuTu }}</td>
                        <td>{{ $row->AnHien }}</td>
                        <td class="td-actions">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <a href="{{route('binhluan.edit',$row->Id_BL)}}"><i class="material-icons">Edit</i></a>
                            </button>
                            
                            <form action="{{route('binhluan.destroy',$row->Id_BL)}}" method="post" class="btn btn-link btn-sm">
                                {{  csrf_field() }}
                                {!! method_field('delete') !!}
                                <button onclick="return confirm('Bạn có chắc muốn xóa ?');"  class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">Close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>
<style>
    .mt-150{
        margin-top: 100px;
    }
    button.au-btn.au-btn-icon.au-btn--blue {
        margin-bottom: 20px;
    }
    .chua{
        width: 100%;
        float: left;
    }

    .chua .form-header {
        float: left;
        margin-right: 30px;
    }
</style>