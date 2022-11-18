<x-site.layout title="Dashboard" :include="['menu']">
    <x-site.navbar class="light" />
    <x-site.dashboard.body>
        <section class="gray-bg pt-4">
            <div class="container-fluid">
                <div class="row m-0">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-1">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fa-duotone"
                                        data-icon="briefcase-blank" class="svg-inline--fa fa-briefcase-blank fa-w-16"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <defs>
                                            <style>
                                                .fa-secondary {
                                                    opacity: .4
                                                }
                                            </style>
                                        </defs>
                                        <g class="fa-group">
                                            <path class="fa-primary"
                                                d="M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-288C0 117.5 21.5 96 48 96h416C490.5 96 512 117.5 512 144z"
                                                fill="currentColor" />
                                            <path class="fa-secondary"
                                                d="M176 96H128V48C128 21.5 149.5 0 176 0h160C362.5 0 384 21.5 384 48V96h-48V48h-160V96z"
                                                fill="currentColor" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">##</span></h4>
                                    <p>Applied Jobs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-1">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fa-duotone"
                                        data-icon="briefcase" class="svg-inline--fa fa-briefcase fa-w-16" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <defs>
                                            <style>
                                                .fa-secondary {
                                                    opacity: .4
                                                }
                                            </style>
                                        </defs>
                                        <g class="fa-group">
                                            <path class="fa-primary"
                                                d="M464 96H384V48C384 22.41 361.6 0 336 0h-160C150.4 0 128 22.41 128 48V96H48C22.41 96 0 118.4 0 144V288h512V144C512 118.4 489.6 96 464 96zM336 96h-160V48h160V96z"
                                                fill="currentColor" />
                                            <path class="fa-secondary"
                                                d="M320 336c0 8.844-7.156 16-16 16h-96C199.2 352 192 344.8 192 336V288H0v144C0 457.6 22.41 480 48 480h416c25.59 0 48-22.41 48-48V288h-192V336z"
                                                fill="currentColor" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">##</span></h4>
                                    <p>Pending Invitation</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-1">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fa-duotone"
                                        data-icon="calendar-check" class="svg-inline--fa fa-calendar-check fa-w-14"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <defs>
                                            <style>
                                                .fa-secondary {
                                                    opacity: .4
                                                }
                                            </style>
                                        </defs>
                                        <g class="fa-group">
                                            <path class="fa-primary"
                                                d="M400 64H352V31.1C352 14.33 337.7 0 320 0s-32 14.33-32 31.1V64H160V31.1C160 14.33 145.7 0 128 0S96 14.33 96 31.1V64H48C21.49 64 0 85.49 0 112V192h448V112C448 85.49 426.5 64 400 64zM277.8 280.4l-79.13 92.34l-29.69-29.69c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l48 48c4.5 4.5 10.62 7.031 16.97 7.031c.3125 0 .625 0 .9062-.0313c6.688-.25 12.97-3.281 17.31-8.344l96-112c8.625-10.06 7.469-25.22-2.594-33.84C301.6 269.2 286.4 270.3 277.8 280.4z"
                                                fill="currentColor" />
                                            <path class="fa-secondary"
                                                d="M0 464C0 490.5 21.5 512 48 512h352c26.5 0 48-21.5 48-48V192H0V464zM135 343c9.375-9.375 24.56-9.375 33.94 0l29.69 29.69l79.13-92.34c8.656-10.06 23.81-11.19 33.84-2.594c10.06 8.625 11.22 23.78 2.594 33.84l-96 112c-4.344 5.062-10.62 8.094-17.31 8.344C200.6 431.1 200.3 431.1 200 431.1c-6.344 0-12.47-2.531-16.97-7.031l-48-48C125.7 367.6 125.7 352.4 135 343z"
                                                fill="currentColor" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">##</span></h4>
                                    <p>Completed Jobs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-icon widget-1">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fa-duotone"
                                        data-icon="circle-xmark" class="svg-inline--fa fa-circle-xmark fa-w-16"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <defs>
                                            <style>
                                                .fa-secondary {
                                                    opacity: .4
                                                }
                                            </style>
                                        </defs>
                                        <g class="fa-group">
                                            <path class="fa-primary"
                                                d="M289.9 255.1l47.03-47.03c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0L256 222.1L208.1 175c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l47.03 47.03L175 303c-9.375 9.375-9.375 24.56 0 33.94c9.373 9.373 24.56 9.381 33.94 0L256 289.9l47.03 47.03c9.373 9.373 24.56 9.381 33.94 0c9.375-9.375 9.375-24.56 0-33.94L289.9 255.1z"
                                                fill="currentColor" />
                                            <path class="fa-secondary"
                                                d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256C397.4 512 512 397.4 512 256S397.4 0 256 0zM336.1 303c9.375 9.375 9.375 24.56 0 33.94c-9.381 9.381-24.56 9.373-33.94 0L256 289.9l-47.03 47.03c-9.381 9.381-24.56 9.373-33.94 0c-9.375-9.375-9.375-24.56 0-33.94l47.03-47.03L175 208.1c-9.375-9.375-9.375-24.56 0-33.94s24.56-9.375 33.94 0L256 222.1l47.03-47.03c9.375-9.375 24.56-9.375 33.94 0s9.375 24.56 0 33.94l-47.03 47.03L336.1 303z"
                                                fill="currentColor" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="dashboard-stat-content">
                                    <h4><span class="cto">##</span></h4>
                                    <p>Pending Jobs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-site.dashboard.body>
</x-site.layout>
