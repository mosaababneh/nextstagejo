@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="companies\create" class="btn btn-primary p-1 m-2">Create new Company</a>

            <div class="card m-2 p-2">

                <div class="card-header">Companies list</div>
                <table class="table m-2">
                    <thead >
                        <tr>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Website</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($companies) > 0)
                        @foreach($companies as $company)

                            <tr id="company{{$company->id}}" >
                            <td>
                            <img src="/logo/{{$company->logo}}" alt="Avatar" style="vertical-align: middle;width: 40px;height: 40px;border-radius: 50%;">

                            </hd>
                            <th scope="row"><a  href="/companies/{{$company->id}}">{{$company->Name}}</a></th>
                            <td>{{$company->email}}</td>
                            <td><a href="{{$company->website}}">{{$company->website}}</a></td>
                            <td>
                            <a href="{{url('companies/'.$company -> id).'/edit/'}}" class="btn btn-success">edit</a>
                            <a class="btn btn-danger DeleteAjax" id="{{$company -> id}}">delete</a>

                            </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                     {!! $companies->links('pagination::bootstrap-4') !!}
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
         url: "/companies/"+id,
        data: {
            '_token': "{{csrf_token()}}",
            'id' :id
        },
        success: function (data) {
            document.getElementById("company"+id).innerHTML = "";

       

        }, error: function (reject) {

        }
    });
});

</script>
@endsection
