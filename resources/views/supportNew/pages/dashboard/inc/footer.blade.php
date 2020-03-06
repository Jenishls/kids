@include('supportNew.pages.global.model')
<div id="my-mdl"></div>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
 </form>
<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#716aca",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
	
	{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> --}}
	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
	<script src="{{asset("js/babel.js")}}"></script>
	<script src="supportNew/js/all.js"></script>
	<script src="{{asset("js/app.js")}}"></script>
	<script>
		var de = '{{$dashboard_route}}'; 
		if(de && de !=''){
			$.ajax(de).then(function(response) {
				$('#kt_body').html(response);
			}, function(error) {
				toastr.error(error.responseText);
			});
		}
	</script> 
		 
</body>
</html>