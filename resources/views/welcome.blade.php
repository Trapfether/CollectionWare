@extends('App')

@section('title')
Main
@endsection

@section('content')
<div class="row">
<div class="col-xs-12 noPadding">
    <a href="\editor"> Try Editor </a>
</div>
</div>
@endsection

@section('footScripts')
<script src="{{ asset('/files/ace-src/ace.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/pastel_on_dark");
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
    #editor{
        position: fixed;
        left: 0px;
        right: 210px;
        bottom: 100px;
        top: 50px;
    }
    #sidePanel-wrapper {
        width: 210px;
        top:50px;
        bottom: 0px;
        right: 0px;
        position: fixed;
        background: #f1f2f7;
        border-left: 3px solid #2a3542;
        z-index: 50;
        font-size: 13px;
    }
    #bottomPanel-wrapper {
        height: 100px;
        bottom: 0px;
        right: 210px;
        left: 0px;
        position: fixed;
        background: #f1f2f7;
        border-top: 3px solid #2a3542;
        z-index: 50;
        font-size: 13px;
    }
</style>
@endsection