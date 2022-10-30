<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="login-modal">
            <div class="modal-header">
                <h4>Sign In</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i class="ti-close"></i></span></button>
            </div>
            <div class="modal-body">

                <div class="login-form">
                    <form id="login-form">

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="*******">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn dark-2 btn-md full-width pop-login">Login</button>
                        </div>

                    </form>
                </div>

                <div class="form-group mb-3 text-center">
                    <span>Or Signin with</span>
                </div>

                <div class="social_logs mb-4">
                    <ul class="shares_jobs text-center">
                        <li><a href="#" class="share fb"><i class="fa-brands fa-facebook-f"></i></i></i></a></li>
                        <li><a href="{{ route('site.auth.google') }}" class="share gp"><i
                                    class="fa-brands fa-google"></i></a></li>
                        <li><a href="#" class="share ln"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="#"data-bs-toggle="modal"
                        data-bs-target="#signup" class="theme-cl"> Sign Up</a></div>
                <div class="mf-forget"><a href="#"><i class="ti-help"></i>Forget Password</a></div>
            </div>
        </div>
    </div>
</div>
@push('component-scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#login-form', async (e) => {
                e.preventDefault();
                await rebound({
                    form: '#login-form',
                    url: '{{ route('site.login') }}',
                    method: 'POST',
                    successCallback: () => {
                        $('#login').modal('hide');
                    }
                });
            });
            $('#login').on('show.bs.modal', function() {
                $('#signup').modal('hide');
            });
        });
    </script>
@endpush
