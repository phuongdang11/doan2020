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
        <form class="form-header" action="" method="GET">
            <input class="au-input au-input--xl" id="myInput" onkeyup="myFunction()" type="text" name="query" placeholder="Tìm tên danh mục ..." />
            <button class="au-btn--submit" type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>

        <button class="au-btn au-btn-icon au-btn--blue ">
        <a href="{{ route('tags.create')}}" style="color: white;"><i class="zmdi zmdi-plus"></i>Thêm Tags</a></button>
    </div>      
        <div class="table-responsive table--no-card m-b-30">
            <table id="myTable" class="table table-borderless table-striped table-earning">
                <thead >
                    <th>ID</th>
                    <th>Tên loại</th>
                    <th>Hành động</th>
                </thead>

                <tbody>
                @foreach($tags as $row)
                    <tr>
                        <td>{{ $row->Id_Tag }}</td>
                        <td>{{ $row->Ten_Tag }}</td>
                        <td class="td-actions">
                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <a href="{{route('tags.edit',$row->Id_Tag)}}"><i class="material-icons">Edit</i></a>
                            </button>
                            
                            <form action="{{route('tags.destroy',$row->Id_Tag)}}" method="post" class="btn btn-link btn-sm">
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