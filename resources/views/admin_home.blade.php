
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entities as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->address }}</td>
                        <td class = 'status'>{{ $data->status }}</td>
                    <td><button class = "btn btn-primary change-status"  data-id="{{$data->id}}"><span>{{ $data->status == 'Active'?"Inactive": "Active" }}</span> User</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination Link --}}
            {{ $entities->links() }}

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){

    
    $('.change-status').on('click',function(){
        var $ele =  $(this)
        var id = $ele.data('id');
       // alert(id);
        var url = '{{ route("admin.changeUserStatus", ":id") }}';
        url = url.replace(':id', id);
       
        $.ajax({
            url:url,
            type:'get',
            dataType:'json',
			success:function(data, textStatus, jqXHR) {
                console.log(data);
                    if(data.status == "SUCCESS")
                    {
                        var existStatus = $ele.closest('tr').find('.status').text();
                        $ele.find('span').text(existStatus);
                        $ele.closest('tr').find('.status').text(data.data)
                    }
            }
        })
    });
});
</script>
@endsection
