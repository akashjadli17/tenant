<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Property Create</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-5">

  <div class="container bg-white p-4 rounded shadow">
    <h4 class="mb-4 font-semibold">Property Create</h4>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="propertyTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#details">Property Details</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#images">Property Images</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#unit">Unit</button>
      </li>
    </ul>

    <!-- Tab Panes -->
    <div class="tab-content">

      <!-- Property Details Tab -->
      <div class="tab-pane fade show active" id="details">
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="form-label">Type</label>
            <select class="form-select">
              <option>Select Type</option>
            </select>
          </div>
          <div>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter Property Name">
          </div>
          <div>
            <label class="form-label">Thumbnail Image</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" placeholder="Enter Property Description"></textarea>
          </div>
          <div>
            <label class="form-label">Country</label>
            <input type="text" class="form-control" placeholder="Enter Property Country">
          </div>
          <div>
            <label class="form-label">State</label>
            <input type="text" class="form-control" placeholder="Enter Property State">
          </div>
          <div>
            <label class="form-label">City</label>
            <input type="text" class="form-control" placeholder="Enter Property City">
          </div>
          <div>
            <label class="form-label">Zip Code</label>
            <input type="text" class="form-control" placeholder="Enter Property Zip Code">
          </div>
          <div class="col-md-12">
            <label class="form-label">Address</label>
            <textarea class="form-control" placeholder="Enter Property Address"></textarea>
          </div>
        </form>
      </div>

      <!-- Property Images Tab -->
      <div class="tab-pane fade" id="images">
        <div class="border-dashed border-2 border-gray-400 p-4 text-center rounded mt-3">
          <p class="text-gray-600">Drop files here or click to upload.</p>
          <input type="file" class="form-control mt-2" multiple>
        </div>
      </div>

      <!-- Unit Tab -->
      <div class="tab-pane fade" id="unit">
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
          <div><input type="text" class="form-control" placeholder="Enter unit name"></div>
          <div><input type="number" class="form-control" placeholder="Enter number of bedroom"></div>
          <div><input type="number" class="form-control" placeholder="Enter number of kitchen"></div>
          <div><input type="number" class="form-control" placeholder="Enter number of bath"></div>
          <div><input type="text" class="form-control" placeholder="Enter unit rent"></div>
          <div>
            <select class="form-select">
              <option>Monthly</option>
              <option>Weekly</option>
            </select>
          </div>
          <div><input type="number" class="form-control" placeholder="Enter day of month between 1 to 30"></div>
          <div>
            <select class="form-select"><option>Fixed</option></select>
          </div>
          <div><input type="number" class="form-control" placeholder="Enter deposit amount"></div>
          <div>
            <select class="form-select"><option>Fixed</option></select>
          </div>
          <div><input type="number" class="form-control" placeholder="Enter late fee amount"></div>
          <div><input type="number" class="form-control" placeholder="Enter incident receipt amount"></div>
          <div class="col-md-12"><textarea class="form-control" placeholder="Enter notes"></textarea></div>
        </form>
        <button class="btn btn-success mt-4 float-end">Create</button>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
