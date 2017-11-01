<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 01-Nov-17
 * Time: 11:58 AM
 */

?>
@extends('layouts.front.master')

@section('title', 'Exam Info')

@section('content')
    @if($exam)
    <!--=== Breadcrumbs ===-->
    <div class="fixed">
        <div class="col-md-12">

            <h1 class="pull-left">{{$exam->name}} Exam</h1>
            <h2 id="counter" class="pull-right text-danger">{{$exam->time}} min 00 sec</h2>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container content-sm padding-top-120">
                <form id="testForm" action="{{route('questionSubmit',['examId'=>$exam->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" id="time" value="{{$exam->time}}">
                @foreach($exam->question as $question)
                <div class="col-md-6">
                    <h4>{{$question->question}}</h4>

                    <table class="table table-bordered table-responsive table-hover">
                        <?php
                            $ansList =json_decode($question->answer,true)    ;
                            shuffle($ansList);
                        ?>
                        @foreach($ansList as $answer)
                            <tr>
                                <td>

                                        <input type="radio" name="{{$question->id}}" value="{{$answer}}" class=""> {{$answer}}
                                    <label for="{{$question->id}}" >
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @endforeach
                <div class="col-md-6 col-md-offset-3">
                    <input type="submit" value="Submit" class="btn btn-success btn-block">
                </div>
                </form>

    </div>
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {

        } );

        $('#examSearch').on('keyup', function(){
            var search = $('#examSearch').val();
            $('input[type=search]').val(search);
        });
    </script>

    {{--The script use for time count--}}
    <script>
        var time = $('#time').val();
        var countDownDate = new Date();
        countDownDate.setMinutes(countDownDate.getMinutes() + parseInt(time));
        countDownDate.setSeconds(countDownDate.getSeconds() + 1);

        // Set the date we're counting down to
        //var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("counter").innerHTML = minutes + " min " + seconds + " sec";
           /* if(seconds==30){

            }*/
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("counter").innerHTML = "EXPIRED";
                $("#testForm").submit();
            }
        }, 1000);
    </script>
@endsection