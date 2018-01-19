@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h3>微博列表</h3>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
    @else
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
    @endif
@stop
