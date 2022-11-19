<script src="{{asset('assets/js/jquery-min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/color-switcher.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/wow.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/contact-form-script.min.js')}}"></script>
<script src="{{asset('assets/js/summernote.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.js')}}"></script>
<script>
    $('.add_review,.add_report').on('click', function () {
        var unit_id = $(this).attr('unit_id');
        $('.unit_id').val(unit_id);
    });

    $('.add_favorite').on('click', function () {
        var unit_id = $(this).attr('unit_id');
        var customer_id = $('#customer_id').val();
        if (customer_id == "") {
            alert('سجل دخولك اولا');
        } else {
            $.ajax({
                type: 'post',
                url: "{{route('add.favorite')}}",
                data: {
                    "_token": "{{csrf_token()}}",
                    'unit_id': unit_id,
                    'customer_id': customer_id,
                },
                success: function (data) {
                    alert(data.msg);
                },
                error: function (data) {
                    alert(data.msg);
                }
            });
        }
    });
</script>
