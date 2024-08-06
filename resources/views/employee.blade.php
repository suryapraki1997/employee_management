<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Information Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container{
      margin-top: 10px;
      margin-bottom: 10px;
      max-width: 800px;
      border: 1px double gray;
      border-radius: 20px;
    }
    .form-group{
      font-weight: bold;
    }
    .form-control{
      border: none;
      border-bottom: 2px solid gray;
    }
  </style>
</head>

<body>

 
  <div class="container">
    <h2 class="m-3">Employee Information Form</h2>
    <form action="/employeesave" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Name <span class="text-danger fw-bolder">*</span></label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender <span class="text-danger fw-bolder">*</span></label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth <span class="text-danger fw-bolder">*</span></label>
        <input type="date" class="form-control" id="dob" name="dob" required>
      </div>
      <div class="form-group">
        <label for="address">Address <span class="text-danger fw-bolder">*</span></label>
        <input type="text" class="form-control" id="address" name="address" required></input>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile <span class="text-danger fw-bolder">*</span></label>
        <input type="tel" class="form-control" maxlength="10" id="mobile" name="mobile" pattern="[0-9]{10}" required>
      </div>
      <div class="form-group">
        <label for="email">Email <span class="text-danger fw-bolder">*</span></label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <input type="text" value='{{$designation}}' hidden id="decs">
      <div class="form-group">
        <label for="department">Department <span class="text-danger fw-bolder">*</span></label>
        <select class="form-control" id="department" name="department" required onchange="updateDesignations()">
          <option value="">select Department</option>
          @foreach($department as $data)
          <option value="{{$data->id}}">{{$data->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="designation">Designation <span class="text-danger fw-bolder">*</span></label>
        <select class="form-control" id="designation" name="designation" required>
         
        </select> 
      </div>
      <div class="form-group">
        <label for="doj">Date of Joining <span class="text-danger fw-bolder">*</span></label>
        <input type="date" class="form-control" id="doj" name="doj" required>
      </div>
      <div class="form-group">
        <label for="image">Image <span class="text-danger fw-bolder">*</span></label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <button type="submit" class="btn btn-primary mb-4">Submit</button>
    </form>
  </div>

  <script>
    function updateDesignations() {
    var departmentId = document.getElementById('department').value; // Assuming $designations is an associative array of department IDs and their respective designations

    const jsonData = JSON.parse(document.getElementById('decs').value);
    // console.log(departmentId)
    // console.log(jsonData);
    let a =0;
    if(a==0){
      document.getElementById('designation').innerHTML="";
    }
    for (var i=0; i<jsonData.length;i++){
      if (departmentId == jsonData[i]['department_id']){
        let option = document.createElement('option');
        option.value = jsonData[i].id;
        option.text = jsonData[i].name;
        document.getElementById('designation').append(option)
        a++;
      }
    }
    
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>