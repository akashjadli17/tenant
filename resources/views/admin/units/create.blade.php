<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Trigger Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUnitModal">
  Open Create Unit Modal
</button>

<!-- Modal -->
<div class="modal fade" id="createUnitModal" tabindex="-1" aria-labelledby="createUnitLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUnitLabel">Create unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form class="grid grid-cols-1 md:grid-cols-2 gap-4">

          <!-- Unit Name and Property -->
          <div>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter unit name">
          </div>
          <div>
            <label class="form-label">Property</label>
            <select class="form-select">
              <option>Enter Property</option>
            </select>
          </div>

          <!-- Bedroom, Kitchen, Bath -->
          <div>
            <label class="form-label">Bedroom</label>
            <input type="number" class="form-control" placeholder="Enter number of bedroom">
          </div>
          <div>
            <label class="form-label">Kitchen</label>
            <input type="number" class="form-control" placeholder="Enter number of kitchen">
          </div>
          <div>
            <label class="form-label">Bath</label>
            <input type="number" class="form-control" placeholder="Enter number of bath">
          </div>

          <!-- Rent and Rent Type -->
          <div>
            <label class="form-label">Rent</label>
            <input type="text" class="form-control" placeholder="Enter unit rent">
          </div>
          <div>
            <label class="form-label">Rent Type</label>
            <select class="form-select">
              <option>Monthly</option>
              <option>Weekly</option>
            </select>
          </div>

          <!-- Rent Duration -->
          <div class="col-md-12">
            <label class="form-label">Rent Duration</label>
            <input type="number" class="form-control" placeholder="Enter day of month between 1 to 30">
          </div>

          <!-- Deposit Type and Amount -->
          <div>
            <label class="form-label">Deposit Type</label>
            <select class="form-select">
              <option>Fixed</option>
              <option>Percentage</option>
            </select>
          </div>
          <div>
            <label class="form-label">Deposit Amount</label>
            <input type="number" class="form-control" placeholder="Enter deposit amount">
          </div>

          <!-- Late Fee Type and Amount -->
          <div>
            <label class="form-label">Late Fee Type</label>
            <select class="form-select">
              <option>Fixed</option>
              <option>Percentage</option>
            </select>
          </div>
          <div>
            <label class="form-label">Late Fee Amount</label>
            <input type="number" class="form-control" placeholder="Enter late fee amount">
          </div>

          <!-- Incident Receipt Amount -->
          <div class="col-md-12">
            <label class="form-label">Incident Receipt Amount</label>
            <input type="number" class="form-control" placeholder="Enter incident receipt amount">
          </div>

          <!-- Notes -->
          <div class="col-md-12">
            <label class="form-label">Notes</label>
            <textarea class="form-control" rows="3" placeholder="Enter notes"></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>