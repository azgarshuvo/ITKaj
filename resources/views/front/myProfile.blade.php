<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 05-Oct-17
 * Time: 4:15 PM
 */?>

@extends('layouts.front.profileMaster')

@section('title', 'Profile')

@section('content')

<!-- Profile Content -->
				<div class="col-md-9">
					<p class="alert-danger alert hidden" id="error">

					</p>
					<div class="profile-body">
						<div class="profile-bio">
							<div class="row">
								<div class="col-md-5 text-center">
									@if(App\UserProfile::where('user_id',Auth::user()->id)->first()!=null)
										<img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" @if(strlen(App\UserProfile::where('user_id',Auth::user()->id)->first()->img_path)>3)  src="{{asset('profile_img/'.App\UserProfile::where('user_id',Auth::user()->id)->first()->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">
									@else
										<img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="">
									@endif
									<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">

										<li class="list-group-item">


										{{--<a class="btn-u btn-u-sm" href="#">Change Picture</a>--}}
									<form action="{{route('changeProfileImg')}}" id="example-form" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="btn-u btn-u-sm new_Btn btn-block text-center">Change Image</div><br>
										<input id="images" type="file" name="file" multiple="" />
									</form>

								</div>
								<div class="col-md-7">
									<h2>{{Auth::user()->fname}} {{Auth::user()->lname}}</h2>
									<span><strong>Skills:</strong> {{$userProfile->skills}}</span>
									<span><strong>Position:</strong>  {{$userProfile->professional_title}}</span>
									<hr>
									<p>{{$userProfile->professional_overview}}</p>
								</div>
							</div>
						</div><!--/end row-->

						<hr>

						<div class="row">
							<!--Social Icons v3-->
							<div class="col-sm-6 sm-margin-bottom-30">
								<div class="panel panel-profile">
									<div class="panel-heading overflow-h">
										<h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts <small>(option 1)</small></h2>
										<a href="#"><i class="fa fa-cog pull-right"></i></a>
									</div>
									<div class="panel-body">
										<ul class="list-unstyled social-contacts-v2">
											<li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>
											<li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>
											<li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>
											<li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>
											<li><i class="rounded-x gm fa fa-envelope"></i> <a href="#">edward77@gmail.com</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!--End Social Icons v3-->

							<!--Skills-->
							<div class="col-sm-6 sm-margin-bottom-30">
								<div class="panel panel-profile">
									<div class="panel-heading overflow-h">
										<h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Skills</h2>
										<a href="#"><i class="fa fa-cog pull-right"></i></a>
									</div>
									<div class="panel-body">
										<small>HTML/CSS</small>
										<small>92%</small>
										<div class="progress progress-u progress-xxs">
											<div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
											</div>
										</div>

										<small>Photoshop</small>
										<small>77%</small>
										<div class="progress progress-u progress-xxs">
											<div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">
											</div>
										</div>

										<small>PHP</small>
										<small>85%</small>
										<div class="progress progress-u progress-xxs">
											<div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-u">
											</div>
										</div>

										<small>Javascript</small>
										<small>81%</small>
										<div class="progress progress-u progress-xxs">
											<div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="81" role="progressbar" class="progress-bar progress-bar-u">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Skills-->
						</div><!--/end row-->

						<hr>

						<!--Timeline-->
						<div class="panel panel-profile">
							<div class="panel-heading overflow-h">
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Experience</h2>
								<a href="#"><i class="fa fa-cog pull-right"></i></a>
							</div>
							<div class="panel-body margin-bottom-40">
								<ul class="timeline-v2 timeline-me">
									<li>
										<time datetime="" class="cbp_tmtime"><span>Mobile Design</span> <span>2012 - Current</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>BFC NYC Partners</h2>
											<p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
										</div>
									</li>
									<li>
										<time datetime="" class="cbp_tmtime"><span>Web Designer</span> <span>2007 - 2012</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>Freelance</h2>
											<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
										</div>
									</li>
									<li>
										<time datetime="" class="cbp_tmtime"><span>Photodesigner</span> <span>2003 - 2007</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>Toren Condo</h2>
											<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!--End Timeline-->

						<!--Timeline-->
						<div class="panel panel-profile">
							<div class="panel-heading overflow-h">
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
								<a href="#"><i class="fa fa-cog pull-right"></i></a>
							</div>
							<div class="panel-body">
								<ul class="timeline-v2 timeline-me">
									<li>
										<time datetime="" class="cbp_tmtime"><span>Bachelor of IT</span> <span>2003 - 2000</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>Harvard University</h2>
											<p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
										</div>
									</li>
									<li>
										<time datetime="" class="cbp_tmtime"><span>Web Design</span> <span>1997 - 2000</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>Imperial College London</h2>
											<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
										</div>
									</li>
									<li>
										<time datetime="" class="cbp_tmtime"><span>High School</span> <span>1988 - 1997</span></time>
										<i class="cbp_tmicon rounded-x hidden-xs"></i>
										<div class="cbp_tmlabel">
											<h2>Chicago High School</h2>
											<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!--End Timeline-->

						
					
					</div>
				</div>
				<!-- End Profile Content -->

	<script type="text/javascript">
        $("input:file").change(function (){
            //event.preventDefault();
            var fd = new FormData();
            var file_data = $('input[type="file"]')[0].files; // for multiple files
            fd.append("file_", file_data[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{ route('changeProfileImg') }}',
                type: 'POST',
                data: fd,

                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
					if(data.length>0) {
                        var APP_URL = '{{ url('/') }}';
                        var img_ser = APP_URL + "/profile_img/" + data;

                        $('.profile-imge').attr("src", img_ser);
                        $('.left-profile').attr("src", img_ser);
                        $("#error").addClass('hidden');
                    }else{
					    //alert("Hello");
						$("#error").removeClass('hidden');
						$("#error").html('Something wrong while profile image uploadmin');
					}
                },
            });


        });


        $('.new_Btn').bind("click" , function () {
            $('#images').click();
        });
	</script>
@endsection