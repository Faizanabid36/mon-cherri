@if(session()->has('success'))
<script type="text/javascript">
	$(document).ready(function(){
		new Noty({
           type: 'success',
           layout: 'centerRight',
           theme: 'nest',
           text: '{!! session()->get("success") !!}',
           timeout: '4000',
           progressBar: true,
           killer: true,
        }).show();
	})
</script>
@endif