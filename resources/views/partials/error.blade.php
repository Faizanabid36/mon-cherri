@if(session()->has('danger'))
<script type="text/javascript">
	$(document).ready(function(){
		new Noty({
           type: 'error',
           layout: 'centerRight',
           theme: 'nest',
           text: '{!! session()->get("danger") !!}',
           timeout: '4000',
           progressBar: true,
           killer: true,
        }).show();
	})
</script>
@endif