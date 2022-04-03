<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script type="text/javascript" src="{{asset('assets_admin/scripts/main-login.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('assets_admin/scripts/main.js')}}"></script>
<script>
    function gantiNilai(tagId) {
        let target = document.getElementById(tagId);
        let val = target.value;

        if (val == 1) {
            val = 0;
        }else {
            val = 1;
        }

        console.log(val);
        target.value = val;
    }
</script>

