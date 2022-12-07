<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expense</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            html {
			height: 100%;
		}
		html, body {
			margin:0;
			font-family: Arial, sans-serif;
			font-style: normal;
			font-variant: normal;
		}
		.pd-5vw{
			padding: 5vw;
		}
		
		.dpd-20{
			padding-bottom: 20px;
		}
		.text-center{
			text-align: center;
		}
	
		.text-purple{
			color: #6435c9;
		}
		.text-grey{
			color: #5f7f89;
		}
		.text-blue{
			color: #4fc1ea;
		}

		.text-size-20-vh{
			font-size: 20vh;
			line-height: normal;
		}

		.text-size-10-vh{
			font-size: 10vh;
		}

		.text-size-5-vh{
			font-size: 5vh;
		}
		.text-size-18{
			font-size: 18px;
		}
		.text-height-1-5{
			line-height: 1.5;
		}

		.bg-404{
			height: 100%;
			position: relative;
			background: #eee;
			background: -moz-linear-gradient(top, rgba(232,247,252,1) 0%, rgba(249,249,249,1) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top, rgba(232,247,252,1) 0%,rgba(249,249,249,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom, rgba(232,247,252,1) 0%,rgba(249,249,249,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8f7fc', endColorstr='#f9f9f9',GradientType=0 ); /* IE6-9 */
		}

  .bottom-copy{
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			min-height: 140px;
			text-align: center;
		}

		
		.gears-grd1{
			stop-color:#4fc1ea; stop-opacity:1
		}
		.gears-grd2{
			stop-color:#6435c9; stop-opacity:1
		}
		
		.gears-img{
			position: absolute;
			text-align: right;
			right: 10vw;
			bottom: 10vh;
			width: 40%;
		}
		.gears-img img{
			max-width: 100%;
		}

		.machine {
			width: 60vmin;
		}

		.small-shadow, .medium-shadow, .large-shadow {
			fill: rgba(0, 0, 0, 0.05); }

		.small {
			-webkit-animation: counter-rotation 2.5s infinite linear;
			-moz-animation: counter-rotation 2.5s infinite linear;
			-o-animation: counter-rotation 2.5s infinite linear;
			animation: counter-rotation 2.5s infinite linear;
			-webkit-transform-origin: 100.136px 225.345px;
			-ms-transform-origin: 100.136px 225.345px;
			transform-origin: 100.136px 225.345px; }

		.small-shadow {
			-webkit-animation: counter-rotation 2.5s infinite linear;
			-moz-animation: counter-rotation 2.5s infinite linear;
			-o-animation: counter-rotation 2.5s infinite linear;
			animation: counter-rotation 2.5s infinite linear;
			-webkit-transform-origin: 110.136px 235.345px;
			-ms-transform-origin: 110.136px 235.345px;
			transform-origin: 110.136px 235.345px; }

		.medium {
			-webkit-animation: rotation 3.75s infinite linear;
			-moz-animation: rotation 3.75s infinite linear;
			-o-animation: rotation 3.75s infinite linear;
			animation: rotation 3.75s infinite linear;
			-webkit-transform-origin: 254.675px 379.447px;
			-ms-transform-origin: 254.675px 379.447px;
			transform-origin: 254.675px 379.447px; }

		.medium-shadow {
			-webkit-animation: rotation 3.75s infinite linear;
			-moz-animation: rotation 3.75s infinite linear;
			-o-animation: rotation 3.75s infinite linear;
			animation: rotation 3.75s infinite linear;
			-webkit-transform-origin: 264.675px 389.447px;
			-ms-transform-origin: 264.675px 389.447px;
			transform-origin: 264.675px 389.447px; }

		.large {
			-webkit-animation: counter-rotation 5s infinite linear;
			-moz-animation: counter-rotation 5s infinite linear;
			-o-animation: counter-rotation 5s infinite linear;
			animation: counter-rotation 5s infinite linear;
			-webkit-transform-origin: 461.37px 173.694px;
			-ms-transform-origin: 461.37px 173.694px;
			transform-origin: 461.37px 173.694px; }

		.large-shadow {  
			-webkit-animation: counter-rotation 5s infinite linear;
			-moz-animation: counter-rotation 5s infinite linear;
			-o-animation: counter-rotation 5s infinite linear;
			animation: counter-rotation 5s infinite linear;
			-webkit-transform-origin: 471.37px 183.694px;
			-ms-transform-origin: 471.37px 183.694px;
			transform-origin: 471.37px 183.694px; }

		@-webkit-keyframes rotation {
			from {-webkit-transform: rotate(0deg);}
			to   {-webkit-transform: rotate(359deg);}
		}
		@-moz-keyframes rotation {
			from {-moz-transform: rotate(0deg);}
			to   {-moz-transform: rotate(359deg);}
		}
		@-o-keyframes rotation {
			from {-o-transform: rotate(0deg);}
			to   {-o-transform: rotate(359deg);}
		}
		@keyframes rotation {
			from {transform: rotate(0deg);}
			to   {transform: rotate(359deg);}
		}

		@-webkit-keyframes counter-rotation {
			from {-webkit-transform: rotate(359deg);}
			to   {-webkit-transform: rotate(0deg);}
		}
		@-moz-keyframes counter-rotation {
			from {-moz-transform: rotate(359deg);}
			to   {-moz-transform: rotate(0deg);}
		}
		@-o-keyframes counter-rotation {
			from {-o-transform: rotate(359deg);}
			to   {-o-transform: rotate(0deg);}
		}
		@keyframes counter-rotation {
			from {transform: rotate(359deg);}
			to   {transform: rotate(0deg);}
		}

		@media only screen and (max-width: 767px) {
			.sm-hide{
				display: none;
			}
			.text-size-10-vh{
				font-size: 6vh;
			}
		}
        </style>
        @vite(['resources/js/app.js'])
    </head>
    <body class="bg-404">
		<section class="pd-5vw">
			<div class="">
				<div class="text-size-5-vh dpd-20 text-blue">
					Trang web đang trong quá trình xây dựng
				</div>
				<div class="text-size-10-vh text-purple dpd-20">
					<strong>
						Xin lỗi vì sự bất tiện này
					</strong>
				</div>
			</div>
			<div class="text-height-1-5 text-grey text-size-18 dpd-20">
				Trang web đang được phát triển và nâng cấp tính năng
			</div>
			<div>
				<a href="https://www.facebook.com" class="btn btn-blue dpd-20">
                    Quay lại trang chủ Google
                </a>
			</div>
			<br>
			<div>
				<a href="{{route('login')}}">Login</a> | 
				<a href="{{route('logout')}}">Register</a>
			</div>
		</section>

		<div class="gears-img sm-hide">
			<svg class="machine"xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 645 526" fill="url(#grad1)">
				<defs>
					<linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
						<stop offset="0%" class="gears-grd1" />
						<stop offset="100%" class="gears-grd2" />
					</linearGradient>
				</defs>
				<defs/>
				<g>
					<path   x="-173,694" y="-173,694" class="large-shadow" d="M645 194v-21l-29-4c-1-10-3-19-6-28l25-14 -8-19 -28 7c-5-8-10-16-16-24L602 68l-15-15 -23 17c-7-6-15-11-24-16l7-28 -19-8 -14 25c-9-3-18-5-28-6L482 10h-21l-4 29c-10 1-19 3-28 6l-14-25 -19 8 7 28c-8 5-16 10-24 16l-23-17L341 68l17 23c-6 7-11 15-16 24l-28-7 -8 19 25 14c-3 9-5 18-6 28l-29 4v21l29 4c1 10 3 19 6 28l-25 14 8 19 28-7c5 8 10 16 16 24l-17 23 15 15 23-17c7 6 15 11 24 16l-7 28 19 8 14-25c9 3 18 5 28 6l4 29h21l4-29c10-1 19-3 28-6l14 25 19-8 -7-28c8-5 16-10 24-16l23 17 15-15 -17-23c6-7 11-15 16-24l28 7 8-19 -25-14c3-9 5-18 6-28L645 194zM471 294c-61 0-110-49-110-110S411 74 471 74s110 49 110 110S532 294 471 294z"/>
				</g>
				<g>
					<path  x="-136,996" y="-136,996" class="medium-shadow" d="M402 400v-21l-28-4c-1-10-4-19-7-28l23-17 -11-18L352 323c-6-8-13-14-20-20l11-26 -18-11 -17 23c-9-4-18-6-28-7l-4-28h-21l-4 28c-10 1-19 4-28 7l-17-23 -18 11 11 26c-8 6-14 13-20 20l-26-11 -11 18 23 17c-4 9-6 18-7 28l-28 4v21l28 4c1 10 4 19 7 28l-23 17 11 18 26-11c6 8 13 14 20 20l-11 26 18 11 17-23c9 4 18 6 28 7l4 28h21l4-28c10-1 19-4 28-7l17 23 18-11 -11-26c8-6 14-13 20-20l26 11 11-18 -23-17c4-9 6-18 7-28L402 400zM265 463c-41 0-74-33-74-74 0-41 33-74 74-74 41 0 74 33 74 74C338 430 305 463 265 463z"/>
				</g>
				<g >
					<path x="-100,136" y="-100,136" class="small-shadow" d="M210 246v-21l-29-4c-2-10-6-18-11-26l18-23 -15-15 -23 18c-8-5-17-9-26-11l-4-29H100l-4 29c-10 2-18 6-26 11l-23-18 -15 15 18 23c-5 8-9 17-11 26L10 225v21l29 4c2 10 6 18 11 26l-18 23 15 15 23-18c8 5 17 9 26 11l4 29h21l4-29c10-2 18-6 26-11l23 18 15-15 -18-23c5-8 9-17 11-26L210 246zM110 272c-20 0-37-17-37-37s17-37 37-37c20 0 37 17 37 37S131 272 110 272z"/>
				</g>
				<g>
					<path x="-100,136" y="-100,136" class="small" d="M200 236v-21l-29-4c-2-10-6-18-11-26l18-23 -15-15 -23 18c-8-5-17-9-26-11l-4-29H90l-4 29c-10 2-18 6-26 11l-23-18 -15 15 18 23c-5 8-9 17-11 26L0 215v21l29 4c2 10 6 18 11 26l-18 23 15 15 23-18c8 5 17 9 26 11l4 29h21l4-29c10-2 18-6 26-11l23 18 15-15 -18-23c5-8 9-17 11-26L200 236zM100 262c-20 0-37-17-37-37s17-37 37-37c20 0 37 17 37 37S121 262 100 262z"/>
				</g>
				<g>
					<path x="-173,694" y="-173,694" class="large" d="M635 184v-21l-29-4c-1-10-3-19-6-28l25-14 -8-19 -28 7c-5-8-10-16-16-24L592 58l-15-15 -23 17c-7-6-15-11-24-16l7-28 -19-8 -14 25c-9-3-18-5-28-6L472 0h-21l-4 29c-10 1-19 3-28 6L405 9l-19 8 7 28c-8 5-16 10-24 16l-23-17L331 58l17 23c-6 7-11 15-16 24l-28-7 -8 19 25 14c-3 9-5 18-6 28l-29 4v21l29 4c1 10 3 19 6 28l-25 14 8 19 28-7c5 8 10 16 16 24l-17 23 15 15 23-17c7 6 15 11 24 16l-7 28 19 8 14-25c9 3 18 5 28 6l4 29h21l4-29c10-1 19-3 28-6l14 25 19-8 -7-28c8-5 16-10 24-16l23 17 15-15 -17-23c6-7 11-15 16-24l28 7 8-19 -25-14c3-9 5-18 6-28L635 184zM461 284c-61 0-110-49-110-110S401 64 461 64s110 49 110 110S522 284 461 284z"/>
				</g>
				<g>
					<path x="-136,996" y="-136,996" class="medium" d="M392 390v-21l-28-4c-1-10-4-19-7-28l23-17 -11-18L342 313c-6-8-13-14-20-20l11-26 -18-11 -17 23c-9-4-18-6-28-7l-4-28h-21l-4 28c-10 1-19 4-28 7l-17-23 -18 11 11 26c-8 6-14 13-20 20l-26-11 -11 18 23 17c-4 9-6 18-7 28l-28 4v21l28 4c1 10 4 19 7 28l-23 17 11 18 26-11c6 8 13 14 20 20l-11 26 18 11 17-23c9 4 18 6 28 7l4 28h21l4-28c10-1 19-4 28-7l17 23 18-11 -11-26c8-6 14-13 20-20l26 11 11-18 -23-17c4-9 6-18 7-28L392 390zM255 453c-41 0-74-33-74-74 0-41 33-74 74-74 41 0 74 33 74 74C328 420 295 453 255 453z"/>
				</g>
			</svg>
		</div>

		<section class="bottom-copy">
			<div class="dpd-20">
				<img src="{{Vite::asset('resources/images/favicon.png')}}" alt="logo.png"/>
			</div>
			<div>&copy; 2022 Quốc Thái Developer</div>
		</section>

	</body>
</html>
