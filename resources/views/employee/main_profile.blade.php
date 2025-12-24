@extends('employee.layout')
@section('title', 'Main Profile Employee')
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
            @endif            
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Main Profile</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('employee.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="" class="form-label">Full Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nama_lengkap"
                            placeholder="Enter Your Full Name"
                            aria-describedby="defaultFormControlHelp" 
                            value="{{ auth()->user()->fullname }}"
                            name="fullname"
                            />
                    </div>
                    <div class="mb-4">
                        <label for="foto_profil" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" id="formFile" name="profile_picture" />
                    </div>
                    <div class="mb-6">
                        <label for="defaultFormControlInput" class="form-label">KTP Number</label>
                        <input
                            type="number"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Enter Your KTP Number"
                            aria-describedby="defaultFormControlHelp"
                            value="{{ auth()->user()->no_ktp }}"
                            name="no_ktp"
                            />
                    </div>
                    <div class="mb-6">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Alamat Anda" required name="address">{{ auth()->user()->address }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="example@gmail.com" 
                            value="{{ auth()->user()->email }}"
                            name="email"
                            />
                    </div>
                    <div class="mb-6">
                        <label for="defaultFormControlInput" class="form-label">Handphone Number</label>
                        <input
                            type="number"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Enter Your Handphone Number"
                            aria-describedby="defaultFormControlHelp"
                            value="{{ auth()->user()->no_hp }}"
                            name="no_hp"
                            />
                    </div>
                    <div class="mb-6">
                        <label class="form-label d-block">Marital Status</label>
                        <div class="form-check form-check-inline mt-4">
                            <input
                            class="form-check-input"
                            type="radio"
                            name="maritalstatus"
                            id="maritalstatus1"
                            value="0"
                            {{ auth()->user()->maritalstatus == 0 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="maritalstatus1">Not married yet</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                            class="form-check-input"
                            type="radio"
                            name="maritalstatus"
                            id="maritalstatus2"
                            value="1" 
                            {{ auth()->user()->maritalstatus == 1 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="maritalstatus2">Married</label>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline mt-4">
                            <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            id="inlineRadio1"
                            value="0" 
                            {{ auth()->user()->gender == 0 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="inlineRadio1">Man</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            id="inlineRadio2"
                            value="1" 
                            {{ auth()->user()->gender == 1 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="inlineRadio2">Woman</label>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="defaultFormControlInput" class="form-label">Mother's Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Masukan Nama Ibu Kandung Anda"
                            aria-describedby="defaultFormControlHelp" 
                            value="{{ auth()->user()->mothers_name }}"
                            name="mothers_name"
                            />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        Change Password
                    </button>
                </form>
            </div>
        </div>
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                <h4 class="mb-2">Change Password</h4>
                <p>Update your password if you feel it is no longer secure.</p>
                </div>
                <form id="changePasswordModal" class="row g-6" action="{{ route('change-password') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="form-password-toggle">
                            <label class="form-label" for="current_password">Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="multiStepsPass2" />
                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"
                                ><i class="ti ti-eye-off"></i
                                ></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="new_password">New Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                type="password"
                                id="new_password"
                                name="new_password"
                                class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="multiStepsPass2" />
                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"
                                ><i class="ti ti-eye-off"></i
                                ></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="new_password_confirmation">Password Confirmation</label>
                            <div class="input-group input-group-merge">
                                <input
                                type="password"
                                id="new_password_confirmation"
                                name="new_password_confirmation"
                                class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="multiStepsPass2" />
                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"
                                ><i class="ti ti-eye-off"></i
                                ></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-3">Submit</button>
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
</div>

@endsection
