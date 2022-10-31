<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered signup-pop-form" role="document">
        <div class="modal-content" id="signup-modal">
            <div class="modal-header">
                <h4>Sign-up</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i class="ti-close"></i></span></button>
            </div>
            <div class="modal-body">

                <div class="signup-form">
                    <form id="signup-form">
                        <div class="form-group mb-3">
                            <label>Register As</label>
                            <select name="role" class="form-control">
                                <option value="client">Employer</option>
                                <option value="user">Freelancer</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="*******">
                        </div>

                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="*******">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" disabled
                                class="btn dark-2 btn-md full-width pop-login">Signup</button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <div class="mf-link"><i class="ti-user"></i>Already have an Account?<a href="#"
                        data-bs-toggle="modal" data-bs-target="#login" class="theme-cl"> Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('component-script')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#signup-form', async (e) => {
                e.preventDefault();
                await rebound({
                    form: '#signup-form',
                    url: '{{ route('site.register') }}',
                    method: 'POST',
                    successCallback: () => {
                        $('#signup').modal('hide');
                    }
                });
            });
            $('#signup').on('show.bs.modal', function() {
                $('#login').modal('hide');
            });

            //if confirm password is not same as password on keyup

            $(document).on('keyup', '#signup-form input[name="password_confirmation"]', function() {
                let password = $('#signup-form input[name="password"]').val();
                let confirmPassword = $(this).val();
                if (password != confirmPassword) {
                    $(this).addClass('is-invalid');
                    $('#signup-form button[type="submit"]').attr('disabled', true);
                    if (!$('#signup-form .invalid-feedback').length) {
                        $(this).after('<div class="invalid-feedback">Passwords do not match</div>');
                    }
                } else {
                    $(this).removeClass('is-invalid');
                    $('#signup-form button[type="submit"]').attr('disabled', false);
                    $(this).parent().find('.invalid-feedback').remove();
                }
            });

        });
    </script>
@endpush
