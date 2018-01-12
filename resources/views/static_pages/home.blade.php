@extends('layouts.default')


@section('content')
    <div class="jumbotron">
    	<h1>Hello Laravel</h1>
    	<p class="lead">
    		您现在看到的是<a href="/">Laravel的艰难学习历程</a>
    	</p>
    	<p>
    		实践是学习的最好方法。
    	</p>
    	<p>
    		<a  class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在注册</a>
    	</p>
    </div>
@stop
