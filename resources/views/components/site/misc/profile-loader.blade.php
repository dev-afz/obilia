@pushonce('component-style')
    <style>
        .skeleton .square {
            height: 80px;
            border-radius: 5px;
            background: rgba(130, 130, 130, 0.2);
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, rgba(130, 130, 130, 0.2)), color-stop(18%, rgba(130, 130, 130, 0.3)), color-stop(33%, rgba(130, 130, 130, 0.2)));
            background: linear-gradient(to right, rgba(130, 130, 130, 0.2) 8%, rgba(130, 130, 130, 0.3) 18%, rgba(130, 130, 130, 0.2) 33%);
            background-size: 800px 100px;
            animation: wave-squares 2s infinite ease-out;
        }

        .skeleton .line {
            height: 12px;
            margin-bottom: 6px;
            border-radius: 2px;
            background: rgba(130, 130, 130, 0.2);
            background: -webkit-gradient(linear, left top, right top, color-stop(8%, rgba(130, 130, 130, 0.2)), color-stop(18%, rgba(130, 130, 130, 0.3)), color-stop(33%, rgba(130, 130, 130, 0.2)));
            background: linear-gradient(to right, rgba(130, 130, 130, 0.2) 8%, rgba(130, 130, 130, 0.3) 18%, rgba(130, 130, 130, 0.2) 33%);
            background-size: 800px 100px;
            animation: wave-lines 2s infinite ease-out;
        }

        .skeleton-right {
            flex: 1;
        }

        .skeleton-left {
            flex: 2;
            padding-right: 15px;
        }

        .flex1 {
            flex: 1;
        }

        .flex2 {
            flex: 2;
        }

        .skeleton .line:last-child {
            margin-bottom: 0;
        }

        .h8 {
            height: 8px !important;
        }

        .h10 {
            height: 10px !important;
        }

        .h12 {
            height: 12px !important;
        }

        .h15 {
            height: 15px !important;
        }

        .h17 {
            height: 17px !important;
        }

        .h20 {
            height: 20px !important;
        }

        .h25 {
            height: 25px !important;
        }

        .h30 {
            height: 30px !important;
        }

        .w25 {
            width: 25% !important
        }

        .w30 {
            width: 30% !important
        }

        .w40 {
            width: 40% !important;
        }

        .w50 {
            width: 50% !important
        }

        .w75 {
            width: 75% !important
        }

        .m10 {
            margin-bottom: 10px !important;
        }

        .circle {
            border-radius: 50% !important;
            height: 80px !important;
            width: 80px;
        }

        @keyframes wave-lines {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }

        @keyframes wave-squares {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }
    </style>
@endpushonce




<div class="_dash_grid_box skeleton">
    <div class="_dash_grid_box_thumb">
        <div class="square circle"></div>
    </div>
    <div class="_dash_grid_box_caption text-center d-flex flex-column align-items-center">
        <div class="line w40"></div>

        <div class="line w50 h17"></div>

        <div class="line w40 "></div>
        <div class="line w30 h30 mt-2"></div>
    </div>
    <div class="_dash_usr_information">
        <ul>
            <li class="gap-1">
                <div class="line w75 mb-0"></div>
                <div class="ml-2 line w25 h25"></div>
            </li>
        </ul>
    </div>
</div>
