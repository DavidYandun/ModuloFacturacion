<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Default')</title>
	<link rel="stylesheet"  href="{{asset('plugin/bootstrap/css/bootstrap.css')}}">
</head>
<body>
<table align="center">
<tr>
	<td><font face="Comic Sans MS,arial" size="200">@yield('TituloBanner')</font></td>
</tr>
<tr>
	<td height="20"></td>
</tr>
<tr>
	<td align="center">@include('admin.template.partials.nav')</td>
</tr>
<tr>
	<td height="20"></td>
</tr>
<tr><td width="100%">
	<section>
	@yield('contenido')
<script src="{{asset('plugin/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('plugin/jquery/js/jquery-3.2.1.js')}}"></script>
<script type="{{asset('js/jquery-2.1.4.js')}}"></script>
<script type="{{asset('js/app.js')}}"></script>
</section>
</td></tr>

</table>


</body>
</html>