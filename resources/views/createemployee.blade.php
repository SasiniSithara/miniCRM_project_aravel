@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee Section</div>

                <div class="card-body">

                <h1>Create new employee</h1>
            <form action="{{url('save_employee')}}" method="post">
            
            {{ csrf_field() }}
            <label for="fname">First Name</label>
            <label style="color: red">*</label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name..">
            <br>
            <label for="lname">Last Name</label>
            <label style="color: red">*</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            <br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email Address..">
            <br>
            <label for="phone">Phone Num</label>
            <input type="text" id="phone" name="phone" placeholder="Your phone num..">
            <br>
            <label for="c_id">Company Name</label>
            <select name="c_id" id="c_id">
            <option value="0">Select Company</option>
            @foreach($company as $item)
                <option value="{{$item->c_id}}">{{$item->companyname}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Create">
        </form>
             </div>
               
            </div>
        </div>

    <!-- employee table -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company Name</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($employee as $data)
            <tr>
                <td>{{$data->firstname}}</td>
                <td>{{$data->lastname}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->getCompany()}}</td>
                <td><a href="" onclick="employee_edit({{$data->emp_id}});" data-toggle="modal" data-target="#exampleModal1">Edit</a></td>
                <td><a href="{{url('delete_employee/'.$data->c_id.'')}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company Name</th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
    </table>
    {{$employee->links()}}
    </div>
</div>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="application/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Update Employee Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('update_employee')}}" method="post">
            
            {{ csrf_field() }}
            <label for="emp_id1">Emp_id</label>
            <input type="text" id="emp_id1" name="emp_id">
            <br>
            <label for="fname1">First Name</label>
            <label style="color: red">*</label>
            <input type="text" id="fname1" name="firstname" placeholder="Your first name..">
            <br>
            <label for="lname1">Last Name</label>
            <label style="color: red">*</label>
            <input type="text" id="lname1" name="lastname" placeholder="Your last name..">
            <br>
            <label for="email1">Email</label>
            <input type="email" id="email1" name="email" placeholder="Your Email Address..">
            <br>
            <label for="phone1">Phone Num</label>
            <input type="text" id="phone1" name="phone" placeholder="Your phone num..">
            <br>
            <label for="c_id1">Company Name</label>
            <select name="c_id" id="c_id1">
            <option value="0">Select Company</option>
            @foreach($company as $item)
                <option value="{{$item->c_id}}">{{$item->companyname}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Update Employee">
            </form>
        </div>
      
      
    </div>
  </div>
</div>

<script type="application/javascript">
//Get updating details for selected employee
function employee_edit(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: "{{ url('/createemployee/edit') }}",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            $('#territoryEditModal').modal('show');
            $('#emp_id1').val(data.territory_no);
            $('#fname1').val(data.firstname);
            $('#lname1').val(data.lastname);
            $('#email1').val(data.email);
            $('#phone1').val(data.phone);
            $('#c_id1').val(data.getCompany());
        }
    });
}
</script>

@endsection