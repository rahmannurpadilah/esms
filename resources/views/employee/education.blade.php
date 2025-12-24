@extends('employee.layout')
@section('title', 'Education Employee')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl mb-6">
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @elseif (session('danger'))
              <div class="alert alert-danger alert-dismissible">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Education Data</h5>
                <div class="d-flex gap-3">
                  <div class="">
                      <button type="button" 
                        class="btn btn-primary" 
                        data-bs-toggle="modal" 
                        data-bs-target="#educationModal" 
                        onclick="openCreateModal()">
                          Add Education
                      </button>
                  </div>
                  <div class="btn-group">
                    <button
                      type="button"
                      class="btn btn-secondary dropdown-toggle"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Download
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('download-csv') }}">Download CSV</a></li>
                      <li><a class="dropdown-item" href="{{ route('download-pdf') }}">Download PDF</a></li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Educational level</th>
                        <th>School name</th>
                        <th>Entry Year</th>
                        <th>Graduation year</th>
                        <th>Choice</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($education as $index => $item)
                      <tr>
                        <td>{{ $education->firstItem() + $index }}</td>
                        <td>{{ $item->educational_level }}</td>
                        <td>{{ $item->school_name }}</td>
                        <td>{{ $item->entry_year }}</td>
                        <td>{{ $item->graduation_year }}</td>
                        <td><span class="badge bg-label-secondary me-1">{{ $item->choice == 1 ? 'Formal' : 'Non-Formal' }}</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button type="button" 
                                class="dropdown-item" 
                                data-bs-toggle="modal" 
                                data-bs-target="#educationModal"
                                data-id="{{ $item->id }}"
                                data-educational_level="{{ $item->educational_level }}"
                                data-school_name="{{ $item->school_name }}"
                                data-entry_year="{{ $item->entry_year }}"
                                data-graduation_year="{{ $item->graduation_year }}"
                                data-choice="{{ $item->choice }}"
                                onclick="openEditModal(this)"
                                >
                                <i class="ti ti-pencil me-1"></i>
                                Edit
                              </button>
                              <a class="dropdown-item" href="{{ route('education-delete', Crypt::encrypt($item->id)) }}" onclick="return confirm('Are you sure about deleting {{ $item->school_name }} school?')"
                                ><i class="ti ti-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    <div class="card-footer d-flex justify-content-center mt-4">
                        {{ $education->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="educationModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-6">
              <h4 class="mb-2" id="modalTitle">Add education data</h4>
              <p>Updating user details will receive a privacy audit.</p>
            </div>
            <form id="educationForm" class="row g-6" method="POST" action="{{ route('education-save') }}">
              @csrf
              <input type="hidden" name="id" id="educate_id">
              <div class="col-12">
                <label class="form-label" for="educational_level">Educational Level</label>
                <select
                  id="educational_level"
                  name="educational_level"
                  class="select2 form-select"
                  aria-label="Default select example"
                  >
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                  <option value="Kursus">Kursus</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label" for="school_name">School Name</label>
                <input
                  type="text"
                  id="school_name"
                  name="school_name"
                  class="form-control"
                  placeholder="Enter the School Name"
                  value="" 
                  required
                  />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="entry_year">Entry Year</label>
                <input
                  type="number"
                  id="entry_year"
                  name="entry_year"
                  class="form-control"
                  placeholder="Enter Entry Year"
                  value="" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="graduation_year">Graduation Year</label>
                <input
                  type="number"
                  id="graduation_year"
                  name="graduation_year"
                  class="form-control"
                  placeholder="Enter Graduation Year"
                  value="" />
              </div>
              <div class="col-12">
                <label class="form-label" for="choice">Choice</label>
                <select
                  id="choice"
                  name="choice"
                  class="select2 form-select"
                  aria-label="Default select example">
                  <option value="1">Formal</option>
                  <option value="0">Non-Formal</option>
                </select>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-3" id="submitBtn">Submit</button>
                <button
                  type="reset"
                  class="btn btn-label-secondary"
                  data-bs-dismiss="modal"
                  aria-label="Close">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
  function openCreateModal(){
    document.getElementById('modalTitle').innerText = 'Add education data';
    document.getElementById('educate_id').value = '';
    document.getElementById('submitBtn').innerText = 'Submit';

    document.getElementById('educational_level').value = '';
    document.getElementById('school_name').value = '';
    document.getElementById('entry_year').value = '';
    document.getElementById('graduation_year').value = '';
    document.getElementById('choice').value = '';
  }
  function openEditModal(item){
    document.getElementById('modalTitle').innerText = 'Change education data';
    document.getElementById('educate_id').value = item.dataset.id;
    document.getElementById('submitBtn').innerText = 'Update';

    document.getElementById('educational_level').value = item.dataset.educational_level;
    document.getElementById('school_name').value = item.dataset.school_name;
    document.getElementById('entry_year').value = item.dataset.entry_year;
    document.getElementById('graduation_year').value = item.dataset.graduation_year;
    document.getElementById('choice').value = item.dataset.choice;
  }
</script>
@endsection
