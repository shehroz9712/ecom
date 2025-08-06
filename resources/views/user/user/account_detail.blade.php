<div class="icon-box icon-box-side icon-box-light">
    <span class="icon-box-icon icon-account mr-2">
        <i class="w-icon-user"></i>
    </span>
    <div class="icon-box-content">
        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
    </div>
</div>
<form class="form account-details-form" action="{{ route('user.account.update') }}" method="post">
    @csrf
    @method('PUT')
    {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First name *</label>
                                            <input type="text" id="firstname" name="firstname"
                                                value="{{ old('firstname', Auth::user()->first_name) }}"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last name *</label>
                                            <input type="text" id="lastname" name="lastname"
                                                value="{{ old('lastname', Auth::user()->last_name) }}"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div> --}}

    <div class="form-group mb-3">
        <label for="display-name">Display name *</label>
        <input type="text" id="display-name" name="display_name"
            value="{{ old('display_name', Auth::user()->name) }}" class="form-control form-control-md mb-0">
        <p>This will be how your name will be displayed in the account section and in reviews
        </p>
    </div>

    <div class="form-group mb-6">
        <label for="email">Email address *</label>
        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
            class="form-control form-control-md">
    </div>

    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
    <div class="form-group">
        <label class="text-dark" for="current_password">Current Password (leave blank to leave
            unchanged)</label>
        <input type="password" class="form-control form-control-md" id="current_password" name="current_password">
    </div>
    <div class="form-group">
        <label class="text-dark" for="new_password">New Password (leave blank to leave
            unchanged)</label>
        <input type="password" class="form-control form-control-md" id="new_password" name="new_password">
    </div>
    <div class="form-group mb-10">
        <label class="text-dark" for="new_password_confirmation">Confirm Password</label>
        <input type="password" class="form-control form-control-md" id="new_password_confirmation"
            name="new_password_confirmation">
    </div>
    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
</form>
