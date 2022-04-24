@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="/{{$company->id}}/employees/create" class="btn btn-primary p-1 m-2">Create new employe</a>
        <a href="/companies" class="btn btn-outline-success">Back</a>

            <div class="card m-2 p-2">

                <div class="card-header">Companies list</div>
                <table class="table m-2">
                    <thead >
                        <tr>
                        <th scope="col">First name</th>
                        <th scope="col">last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">created_at</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($employees) > 0)
                        @foreach($employees as $employe)
                            <tr id="employe{{$employe->id}}" >
                            <th scope="row">{{$employe->First_name}}</th>
                            <th scope="row">{{$employe->last_name}}</th>
                            <td>{{$employe->email}}</td>
                            <td>{{$employe->phone}}</td>
                            <td>{{$employe->created_at}}</td>
                            <td>
                            <a href="{{url('/'.$company->id.'/employees/'.$employe -> id).'/edit/'}}" class="btn btn-success">edit</a>
                            <a class="btn btn-danger DeleteAjax" id="{{$employe -> id}}">delete</a>

                            </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>

                </table>
                 <div class="d-flex justify-content-center">
                     {!! $employees->links('pagination::bootstrap-4') !!}
                </div>
                
            </div>
            

        </div>
    </div>
</div>

<script>


$(document).on('click', '.DeleteAjax', function (e) {
    e.preventDefault();

      var id =  $(this).attr('id');
      console.log(id);

    $.ajax({
        type: 'delete',
        _method: 'DELETE',
        url: "/{{$company->id}}/employees/"+id,
        data: {
            '_token': "{{csrf_token()}}",
            'id' :id
        },
        success: function (data) {
            document.getElementById("employe"+id).innerHTML = "";

       

        }, error: function (reject) {

        }
    });
});

</script>
@endsection
