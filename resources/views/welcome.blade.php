@extends('App')

@section('title')
Main
@endsection

@section('content')
<div class="row fullHeight">
<div class="col-xs-12 fullHeight noPadding">
<div id="editor" class="fullHeight">function foo(items) {
    var x = "All this is syntax highlighted";
    return x;
}</div>
</div>
</div>
@endsection

@section('footScripts')
<script src="{{ asset('/files/ace-src/ace.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/javascript");
</script>
<style type="text/css" media="screen">
    .fullHeight{
    	height: 100%;
    }
    .noPadding{
    	padding: 0px;
    }
    .container-fluid{
    	height: 100%;
    }
</style>
@endsection