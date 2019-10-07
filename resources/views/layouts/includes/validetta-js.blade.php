<script src="{{ asset('assets/plugins/validetta/validetta.js') }}"></script>
<script src="{{ asset('assets/plugins/validetta/lang/validettaLang-ID.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#form').validetta({
            realTime: true,
            display: 'inline',
            errorTemplateClass: 'validetta-inline',
        });
    });
</script>