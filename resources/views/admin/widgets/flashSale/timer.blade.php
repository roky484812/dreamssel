@extends('layouts.admin', ['title' => 'Flash sale', 'active' => 'timer'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Flash Sale Countdown</h4>
                    </div>

                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Day Counter</h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="under-countdown row">
                                    <div class="col-xl-3 col-sm-6 mt-3">
                                        <div class="countdown">
                                            <span id="days-countdown" class="countdown"> 00</span>
                                            <span class="">Days</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mt-3">
                                        <div class="countdown">
                                            <span id="hours-countdown" class="countdown">00</span>
                                            <span class="">Hours</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mt-3">
                                        <div class="countdown">
                                            <span id="minutes-countdown" class="countdown">00</span>
                                            <span class="">Minutes</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mt-3">
                                        <div class="countdown">
                                            <span id="seconds-countdown" class="countdown">00</span>
                                            <span class="">Seconds</span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    <!-- /Row -->
                </div>
                <div class="row">

                    <form action="{{route('admin.flash.sale.set.endtime')}}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Flash Sale</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">YYYY-MM-DD</label>
                                                <input name="date" type="date" class="form-control" placeholder="Enter till Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">HH:MM:SS</label>
                                                <input type="time" class="form-control"
                                                   name="time" placeholder="Enter till time">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="card-footer ">
                                    <div class="row">
                                      
                                        <div class=" col-sm-6">
                                            <button type="submit" id="save" name="status" value="1"
                                                class="btn btn-primary float-end"> Set Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
        <!-- end app-content-->
    </div>
@endsection
@section('custom_css')
@endsection

@section('custom_js')
    <script src="{{ asset('assets/admin/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/countdown/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/countdown/moment-timezone.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Set the end time for the countdown (assuming endTime is fetched from the backend)
            var endTime = moment("{{ $endTime }}");

            // Function to update the countdown display
            function updateCountdown() {
                var currentTime = moment();
                var timeDiff = moment.duration(endTime.diff(currentTime));

                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(timeDiff.asDays());
                var hours = timeDiff.hours();
                var minutes = timeDiff.minutes();
                var seconds = timeDiff.seconds();

                // Update the HTML elements with the countdown values
                $('#days-countdown').text(days);
                $('#hours-countdown').text(hours);
                $('#minutes-countdown').text(minutes);
                $('#seconds-countdown').text(seconds);
                if(days<=0 && hours <= 0 && days <= 0 && seconds <= 0){
                    $('#days-countdown').text(0);
                    $('#hours-countdown').text(0);
                    $('#minutes-countdown').text(0);
                    $('#seconds-countdown').text(0);
                }
            }

            // Initial call to update the countdown
            updateCountdown();

            // Update the countdown every second
            setInterval(updateCountdown, 1000);
        });
    </script>
@endsection
