@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-xl-12">
                @if(count($pur))
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td>Student</td>
                                        <td>Number</td>
                                        <td>Correct</td>
                                        <td>Incorrect</td>
                                        <td>Time</td>
                                        <td></td>
                                    </tr>
                                    @foreach($pur as $p)
                                        {{--calculate--}}
                                        @php
                                            $number = count($p->pur);
                                            $correct = 0;
                                            $incorrect = 0;
                                            foreach ($p->pur as $t){
                                                if ($t->answer == $t->pt->answer)
                                                    $correct++;
                                                else
                                                    $incorrect++;
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $p->pc->name }}</td>
                                            <td>{{ auth()->user()->name }}</td>
                                            <td>{{ $number }}</td>
                                            <td>{{ $correct }}</td>
                                            <td>{{ $incorrect }}</td>
                                            <td>{{ $p->pc->minute }} ({{ $p->spend_time }}) min</td>
                                            <td>
                                                <a href="{{ route('studentWorkResult',$p->id) }}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($pu) and $pu->status == 1)
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Test: {{ $pu->pc->name }}</span>
                                <span class="card-label fw-bolder fs-3 mb-1">Minute: {{ $pu->pc->minute }}</span>
                                <span class="card-label fw-bolder fs-3 mb-1"><a
                                        href="{{ route('studentPTStart',$pu->id) }}"
                                        class="btn btn-success">Start</a></span>
                            </h3>
                        </div>
                    </div>
                @endif

                @if(!empty($pu) and $pu->status == 2)
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">{{ $pu->pc->name }}</span>
                                <span class="card-label fw-bolder fs-3 mb-1">Time: <p style="display: inline"
                                                                                      second="{{ $pu->pc->minute*60 }}"
                                                                                      id="time_minute">{{ $pu->pc->minute }}:00</p> minute</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                    <form method="POST" action="{{ route('studentWorkStore') }}">
                                        @csrf
                                        <input type="hidden" id="spend_time" name="spend_time" value="">
                                        <input type="hidden" name="p_u_id" value="{{ $pu->id }}">
                                        @foreach($pu->pc->ptRand as $key => $t)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center position-relative mb-7">
                                                        <div
                                                            class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="fw-bold ms-5">
                                                            <h3 class="fs-5 fw-bolder text-dark">{{ $key+1 }}
                                                                ) {{ $t->question }}</h3>
                                                            <div class="fs-7 text-muted">
                                                                <label>A)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="1"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->a }}</label><br><br>
                                                                <label>B)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="2"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->b }}</label><br><br>
                                                                <label>C)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="3"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->c }}</label><br><br>
                                                                <label>D)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="4"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->d }}</label><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <br>
                                        <tr>
                                            <td>
                                                <button type="submit" class="form-control btn btn-success">Finish
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        setInterval(function () {
            var time_minute = parseInt($("#time_minute").attr('second'));
            time_minute--;
            var minut = parseInt(time_minute / 60);
            var sec = time_minute - minut * 60;
            $("#time_minute").text(minut + ':' + sec);
            $("#spend_time").val(time_minute);
            $("#time_minute").attr('second', time_minute);
        }, 1000);
    </script>
@endsection
