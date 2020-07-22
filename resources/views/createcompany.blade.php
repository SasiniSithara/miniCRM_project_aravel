@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Section</div>

                <div class="card-body">

                <h1>Create new company</h1>
            <form action="{{url('save_company')}}" method="post">
            
            {{ csrf_field() }}
            <label for="cname">Company Name</label>
            <label style="color: red">*</label>
            <input type="text" id="cname" name="companyname" placeholder="Your new company name..">
            <br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email Address..">
            <br>

            <label for="website">Website Name</label>
            <input type="text" id="website" name="website" placeholder="Your web site name..">
            <br>

            

            <input type="submit" value="Create">
        </form>
             </div>
               
            </div>
        </div>

    <!-- company table -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>WebSite</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($company as $data)
            <tr>
                <td>{{$data->companyname}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->website}}</td>
                <td><a href="" onclick="company_edit({{$data->c_id}});" data-toggle="modal" data-target="#exampleModal">Edit</a></td>
                <td><a href="{{url('delete_company/'.$data->c_id.'')}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>WebSite</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    {{$company->links()}}
   
    </div>
</div>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="application/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



<!-- Update Company Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('update_company')}}" method="post">
            
            {{ csrf_field() }}
            <label for="cid1">Company Id</label>
            <input type="text" id="cid1" name="c_id" >
            <br>

            <label for="cname1">Company Name</label>
            <label style="color: red">*</label>
            <input type="text" id="cname1" name="companyname" placeholder="Your new company name..">
            <br>

            <label for="email1">Email</label>
            <input type="email1" id="email1" name="email" placeholder="Your Email Address..">
            <br>

            <label for="website1">Website Name</label>
            <input type="text" id="website1" name="website" placeholder="Your web site name..">
            <br>

            

            <input type="submit" value="Update Company">
            </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      
    </div>
  </div>
</div>



    
  

<script type="application/javascript" >
//Get updating details for selected company
function company_edit(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: "{{ url('/createcompany/edit') }}",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            $('#exampleModal').modal('show');
            $('#cid1').val(data.c_id);
            $('#cname1').val(data.companyname);
            $('#email1').val(data.email);
            $('#website1').val(data.website);
            
        }
    });
}
</script>

@endsection