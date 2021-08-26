<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

<h1 class="text-center">Employee Page</h1>

<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <dv class="card">
                    <div class="card-header">
                        <h3  class="text-center">Employee<br><br><a href="/employees"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">Add Post</a></h3>
                    </div>
                    <div class="card-body">
                        <table id="employeeTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>salary</th>
                                    <th>department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr id="sid"{{$employee->id}}">
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->salary}}</td>
                                    <td>{{$employee->department}}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="editEmployee({{$employee->id}})" class="btn btn-info">Edit</a>
                                        <a href="javascript:void(0)" onclick="deleteEmployee({{$employee->id}})" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>       
            </div>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeeForm">
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" id="name" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">email</label>
                <input type="text"  id="email" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">phone</label>
                <input type="text"  id="phone" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">salary</label>
                <input type="text" id="salary" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">department</label>
                <input type="text" id="department" class="form-control"/>       
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="employeeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="employeeEditForm">
            @csrf
            <input type="hidden" id="id" name="id"/>
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" id="name2" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">email</label>
                <input type="text"  id="email2" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">phone</label>
                <input type="text"  id="phone2" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">salary</label>
                <input type="text" id="salary2" class="form-control"/>       
            </div>
            <div class="form-group">
                <label for="title">department</label>
                <input type="text" id="department2" class="form-control"/>       
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
        $("#employeeForm").submit(function(e){
            e.preventDefault();

            let name = $("#name").val();
            let email = $ ("#email").val();
            let phone = $ ("#phone").val();
            let salary = $ ("#salary").val();
            let department = $ ("#department").val();
            let _token = $ ("input[name=_token").val();

            $.ajax({
                url: "{{route('employee.add')}}",
                type:"POST",
                data:{
                    name:name,
                    email:email,
                    phone:phone,
                    salary:salary,
                    department:department,
                    _token:_token
                },
                success:function(response)
                {
                    if(rsponse)
                        $("#employeeTable tbody").prepend('<tr><td>'+response.name + '</td><td>' + rsponse.email +'</td><td>'+response.phone + '</td><td>' + response.salary + '</td><td>' + response.department + '</td></tr>')
                        $("#employeeForm")[0].reset();
                        $("#employeeModal").modal('hide');
                }
            });
        });
    </script>

    <script>
        function editEmployee(id)
        {
            $.get('/employees/'+id,function(employee){
                $("#id").val(employee.id);
                $("#name2").val(employee.name);
                $("#email2").val(employee.email);
                $("#phone2").val(employee.phone);
                $("#salary2").val(employee.salary);
                $("#department2").val(employee.department);
                $("#employeeEditModal").modal('toggle');
            })
        }

        $("#employeeEditForm").submit(function(e){
            e.preventDefault();     
            let id = $("#id").val();     
            let name = $("#name2").val();
            let email = $ ("#email2").val();
            let phone = $ ("#phone2").val();
            let salary = $ ("#salary2").val();
            let department = $ ("#department2").val();
            let _token = $ ("input[name=_token").val();
            
            $.ajax({
                url:"{{route('employee.update')}}",
                type:"PUT",
                data:{
                    id:id,
                    name:name,
                    email:email,
                    phone:phone,
                    salary:salary,
                    department:department,
                    _token:_token
                },
                success:function(response){
                    $('#sid' + response.id +' id:nth-child(1)').text(response.name);
                    $('#sid' + response.id +' id:nth-child(1)').text(response.email);
                    $('#sid' + response.id +' id:nth-child(1)').text(response.phone);
                    $('#sid' + response.id +' id:nth-child(1)').text(response.salary);
                    $('#sid' + response.id +' id:nth-child(1)').text(response.department);
                    $("#employeeEditModal").modal('toggle');
                    $("$employeeEditForm")(0).reset();
                }
            });
        });
    </script>

    <script>
        function deleteEmployee(id)
        {
            if(confirm("do you realy want to delete this record?"))
            {
                $.ajax({
                    url:'/students/'+id,
                    type:"DELETE",
                    data:{
                        _token: $("input[name=_token").val()
                    },
                    success:function(response)
                    {
                            $("#sid"+id).remove();
                    }
                });
            }
        }
        
    </script>

</body>
</html>