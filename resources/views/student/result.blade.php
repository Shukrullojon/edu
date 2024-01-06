@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Results</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Question</th>
                    <th class="min-w-100px">A</th>
                    <th class="min-w-100px">B</th>
                    <th class="min-w-100px">C</th>
                    <th class="min-w-100px">D</th>
                    <th class="min-w-100px">Answer</th>
                    <th class="min-w-100px">Event</th>
                </tr>
                </thead>
                <tbody class="fs-6 fw-bold text-gray-600">
                @if(!empty($pu->pur))
                    @foreach($pu->pur as $p)
                        <tr>
                            <td><i>{{ $p->pt->question ?? '' }}</i></td>
                            <td><i>{{ $p->pt->a ?? '' }}</i></td>
                            <td><i>{{ $p->pt->b ?? '' }}</i></td>
                            <td><i>{{ $p->pt->c ?? '' }}</i></td>
                            <td><i>{{ $p->pt->d ?? '' }}</i></td>
                            <td><i>{{ \App\Helpers\PTHelper::answerGet($p->pt->answer ?? 0) }}({{ \App\Helpers\PTHelper::answerGet($p->answer ?? 0) }})</i></td>
                            <td>
                                <i>
                                    @if($p->pt->answer == $p->answer)
                                        ✅
                                    @else
                                        ❌
                                    @endif
                                </i>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
