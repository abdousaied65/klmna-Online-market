@extends('admin.layouts.master')
<!-- Internal Data table css -->
<style>
    .drop.show {
        left: -125px !important;
        width: 220px;
    }

    .drop.show a {
        width: auto !important;
    }

    .drop.show a i {
        margin-right: 10px;
    }
</style>
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <h5 class="pull-right alert alert-md alert-success">
                                عرض تقييمات
                                ( {{$unit->unit_name}} )
                            </h5>
                            <a href="{{route('admin.units.reviews')}}" class="btn btn-primary btn-md pull-left"> رجوع للخلف </a>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-center table-hover " id="example-table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center"> اسم الزبون </th>
                                <th class="text-center">نص التقييم</th>
                                <th class="text-center">التقييم</th>
                                <th class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($reviews as $key => $review)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $review->customer->name }}</td>
                                    <td>{{ $review->review_text }}</td>
                                    <td>{{ $review->review_stars }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-md btn-danger delete_review"
                                           review_id="{{ $review->id }}"
                                           review_name="{{ $review->review_text }}" data-toggle="modal" href="#modaldemo9"
                                           title="delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" review="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف فترة</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.review.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="reviewid" id="reviewid">
                            <input class="form-control" name="reviewname" id="reviewname" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.delete_review').on('click', function () {
            var review_id = $(this).attr('review_id');
            var review_name = $(this).attr('review_name');
            $('.modal-body #reviewid').val(review_id);
            $('.modal-body #reviewname').val(review_name);
        });
    });
</script>
