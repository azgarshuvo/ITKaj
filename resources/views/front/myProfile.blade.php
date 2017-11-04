<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 05-Oct-17
 * Time: 4:15 PM
 */
//dd($userProfile->employment)
?>

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
									<form class="img_upload_form" action="{{route('changeProfileImg')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}

										<input id="images" type="file" name="file" multiple="" />
									</form>
											<div class="btn-u btn-u-sm new_Btn btn-block text-center">Change Image</div>
										</li>
									</ul>

								</div>
								<div class="col-md-7">
									@if($userProfile != null && $userProfile!= "")
										<h2>{{$userProfile->fname}} {{$userProfile->lname}}</h2>
										<span><strong>Position:</strong> @if($userProfile->profile != null && $userProfile->profile != '') {{$userProfile->profile->professional_title}} @endif</span>
										<hr>
										<p>@if($userProfile->profile != null && $userProfile->profile != '') {{$userProfile->profile->professional_overview}} @endif</p>
									@endif
								</div>
							</div>
						</div><!--/end row-->

						{{--<hr>--}}

						{{--<div class="row">--}}
							{{--<!--Social Icons v3-->--}}
							{{--<div class="col-sm-6 sm-margin-bottom-30">--}}
								{{--<div class="panel panel-profile">--}}
									{{--<div class="panel-heading overflow-h">--}}
										{{--<h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Social Contacts <small>(option 1)</small></h2>--}}
										{{--<a href="#"><i class="fa fa-cog pull-right"></i></a>--}}
									{{--</div>--}}
									{{--<div class="panel-body">--}}
										{{--<ul class="list-unstyled social-contacts-v2">--}}
											{{--<li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>--}}
											{{--<li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>--}}
											{{--<li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>--}}
											{{--<li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>--}}
											{{--<li><i class="rounded-x gm fa fa-envelope"></i> <a href="#">edward77@gmail.com</a></li>--}}
										{{--</ul>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<!--End Social Icons v3-->--}}

							{{--<!--Skills-->--}}
							{{--<div class="col-sm-6 sm-margin-bottom-30">--}}
								{{--<div class="panel panel-profile">--}}
									{{--<div class="panel-heading overflow-h">--}}
										{{--<h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Skills</h2>--}}
										{{--<a href="#"><i class="fa fa-cog pull-right"></i></a>--}}
									{{--</div>--}}
									{{--<div class="panel-body">--}}
										{{--<small>HTML/CSS</small>--}}
										{{--<small>92%</small>--}}
										{{--<div class="progress progress-u progress-xxs">--}}
											{{--<div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">--}}
											{{--</div>--}}
										{{--</div>--}}

										{{--<small>Photoshop</small>--}}
										{{--<small>77%</small>--}}
										{{--<div class="progress progress-u progress-xxs">--}}
											{{--<div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">--}}
											{{--</div>--}}
										{{--</div>--}}

										{{--<small>PHP</small>--}}
										{{--<small>85%</small>--}}
										{{--<div class="progress progress-u progress-xxs">--}}
											{{--<div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-u">--}}
											{{--</div>--}}
										{{--</div>--}}

										{{--<small>Javascript</small>--}}
										{{--<small>81%</small>--}}
										{{--<div class="progress progress-u progress-xxs">--}}
											{{--<div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="81" role="progressbar" class="progress-bar progress-bar-u">--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<!--End Skills-->--}}
						{{--</div><!--/end row-->--}}

						<hr>

						<!--Timeline-->
						<div class="panel panel-profile">
							<div class="panel-heading overflow-h">
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Education</h2>
								{{--<a href="#"><i class="fa fa-cog pull-right"></i></a>--}}
							</div>
							<div class="panel-body margin-bottom-40">
								<ul class="timeline-v2 timeline-me">
									@if($userProfile != null && $userProfile != '')
										@if($userProfile->education != null && $userProfile->education != '')
											@foreach($userProfile->education as $education)
												<li>
													<time datetime="" class="cbp_tmtime"><span>{{$education->degree}}</span> <span>{{date("Y", strtotime($education->start_date))}} - @if($education->current == 1)Current @elseif($education->current == 0) {{date("Y", strtotime($education->end_date))}} @endif</span></time>
													<i class="cbp_tmicon rounded-x hidden-xs"></i>
													<div class="cbp_tmlabel">
														<h2>{{$education->institution}}</h2>
														<p>{{$education->area_of_study}}</p>
														<p>{{$education->description}}</p>
													</div>
												</li>
											@endforeach
										@endif
									@endif
								</ul>
							</div>
						</div>
						<!--End Timeline-->
						<!--Timeline-->
						<div class="panel panel-profile">
							<div class="panel-heading overflow-h">
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Experience</h2>
								{{--<a href="#"><i class="fa fa-cog pull-right"></i></a>--}}
							</div>
							<div class="panel-body margin-bottom-40">
								<ul class="timeline-v2 timeline-me">
									@if($userProfile != null && $userProfile != '')
										@if($userProfile->employment != null && $userProfile->employment != '')
											@foreach($userProfile->employment as $employment)
												<li>
													<time datetime="" class="cbp_tmtime"><span>{{$employment->designation}}</span> <span>{{date("Y", strtotime($employment->start_date))}} - @if($employment->current == 1)Current @elseif($employment->current == 0) {{date("Y", strtotime($employment->finish_date))}} @endif</span></time>
													<i class="cbp_tmicon rounded-x hidden-xs"></i>
													<div class="cbp_tmlabel">
														<h2>{{$employment->company_name	}}</h2>
														<p>Country : @if($employment->country != null && $employment->country != '') @foreach($countries as $country) @if($employment->country == $country->id) {{$country->name}} @endif @endforeach @endif</p>
														<p>City : @if($employment->city != null && $employment->city != '') @foreach($cities as $city) @if($city->id == $employment->city) {{$city->name}} @endif @endforeach @endif</p>
													</div>
												</li>
											@endforeach
										@endif
									@endif
								</ul>
							</div>
						</div>
						<!--End Timeline-->
					</div>
				</div>
				<!-- End Profile Content -->
@endsection

@section('script')

    <script type="text/javascript">
        $("input:file").change(function (){
            $("#loader").addClass("loading");
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
                        $("#error").html('Something wrong while profile image upload');
                    }
                    $("#loader").removeClass("loading");
                },
            });


        });


        $('.new_Btn').bind("click" , function () {
            $('#images').click();
        });
    </script>
@endsection